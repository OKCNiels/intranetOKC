<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Grupo;
use App\Models\RecursosHumanos\Aprobador;
use App\Models\RecursosHumanos\Cupon;
use App\Models\RecursosHumanos\CuponesView;
use App\Models\RecursosHumanos\CuponHistorial;
use App\Models\RecursosHumanos\TipoCupon;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CuponesController extends Controller
{
    //
    public function index() {
        $grupos = Grupo::where('id_estado', '!=', 7)->orderBy('descripcion', 'asc')->get();
        $responsables = Aprobador::with(['usuario' => function($query) {
            $query->select('id_usuario', 'nombre_corto')->orderBy('nombre_corto', 'asc');
        }])->get();
        $tipoCupon = TipoCupon::orderBy('descripcion', 'asc')->get();
        return view('admin.recursos-humanos.cupones.index', get_defined_vars());
    }

    public function listar(Request $request)
    {
        $aprobadores = Aprobador::where('id_usuario', Auth::user()->id_usuario)->exists();
        if ($aprobadores) {
            $data = CuponesView::select(['*']);
        } else {
            $data = CuponesView::select(['*'])->where('id_usuario', Auth::user()->id_usuario);
        }

        return DataTables::of($data)
        ->editColumn('fecha', function ($data) { return date('d/m/Y', strtotime($data->fecha)); })
        ->addColumn('horas_permiso', function ($data) { return date('H:i A', strtotime($data->hora_inicio)). '<br>'. date('H:i A', strtotime($data->hora_fin)); })
        ->addColumn('hora', function ($data) {
            $txtHora = '-';
            if ($data->horas > 0) {
                $hora = ($data->horas > 1) ? ' horas' : ' hora';
                $txtHora = $data->horas.$hora;
            }
            return $txtHora;
        })
        ->addColumn('estado_final', function ($data) {
            $estado = '';
            switch ($data->estado) {
                case 'ELABORADO':
                    $estado = '<i class="fa fa-file-text-o text-primary icono-rrhh"></i><br>'.$data->estado;
                break;
                case 'APROBADO':
                    $estado = '<i class="fa fa-star inbox-started icono-rrhh"></i><br>'.$data->estado;
                break;
                case 'DENEGADO':
                    $estado = '<i class="fa fa-exclamation-circle text-danger icono-rrhh"></i><br>'.$data->estado;
                break;
                case 'FINALIZADO':
                    $estado = '<i class="fa fa-check text-success icono-rrhh"></i><br>'.$data->estado;
                break;
            }
            return $estado;
        })
        ->addColumn('accion', function ($data) {
            $opcion = '<li><a href="javascript:void(0)" onclick="historial('.$data->id.')">Ver historial</a></li>';

            if ($data->activo == 1) {
                if ($data->check_validado == 'NO') {
                    if ($data->check_aprobado == 'NO') {
                        if ($data->id_autoriza == Auth::user()->id_usuario) {
                            $opcion .= '<li><a href="javascript:void(0)" onclick="aprobar('.$data->id.', 1);">Aprobar</a></li>
                                        <li><a href="javascript:void(0)" onclick="denegar('.$data->id.');">Denegar</a></li>';
                        }
                        if ($data->id_usuario == Auth::user()->id_usuario) {
                            $opcion .= '<li><a href="javascript:void(0)" onclick="editar('.$data->id.');">Editar</a></li>';
                        }
                    } else {
                        if (Auth::user()->id_usuario == 2 || Auth::user()->id_usuario == 1) {
                            $opcion .= '<li><a href="javascript:void(0)" onclick="aprobar('.$data->id.', 2);">Validar</a></li>
                                        <li><a href="javascript:void(0)" onclick="denegar('.$data->id.');">Denegar</a></li>';
                        }
                    }
                }
            }

            return '<div class="btn-group mt-2 mb-2">
                <button type="button" class="btn btn-primary btn-sm btn-pill dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fe fe-settings"></i> <span class="caret"></span>
                    </button>
                <ul class="dropdown-menu" role="menu" style="">
                    '.$opcion.'
                </ul>
            </div>';
        })
        ->rawColumns(['horas_permiso', 'accion', 'estado_final'])->make(true);
    }

    public function guardar(Request $request)
    {

        DB::beginTransaction();
        try {
            $data = Cupon::firstOrNew(['id' => $request->id]);
                if ($request->id == 0) {
                    $data->codigo = $this->generarCodigo();
                }
                $data->id_trabajador = Auth::user()->id_trabajador;
                $data->id_grupo = $request->grupo_id;
                $data->id_division = $request->area_id;
                $data->tipo_cupon_detalle_id = $request->tipo_cupon_detalle_id;
                $data->id_autoriza = $request->responsable_id;
                $data->fecha = $request->fecha;
                $data->hora_inicio = $request->hora_inicio;
                $data->hora_fin = $request->hora_fin;
                $data->horas = $request->horas;
                $data->id_usuario = Auth::user()->id_usuario;
            $data->save();

            $historial = new CuponHistorial();
                $historial->id_cupon = $data->id;
                $historial->descripcion = 'CREACIÓN DE LA SOLICITUD DE CUPONES';
                $historial->id_usuario = Auth::user()->id_usuario;
            $historial->save();

            DB::commit();
            $respuesta = 'ok';
            $alerta = 'success';
            $mensaje = ($request->id > 0) ? 'Se ha editado el cupón' : 'Se ha registrado el cupón';
            $error = '';
        } catch (Exception $ex) {
            DB::rollBack();
            $respuesta = 'error';
            $alerta = 'error';
            $mensaje = 'Hubo un problema al registrar. Por favor intente de nuevo';
            $error = $ex;
        }
        return response()->json(array('respuesta' => $respuesta, 'alerta' => $alerta, 'mensaje' => $mensaje, 'error' => $error), 200);
    }

    public function editar($id) {
        $cupon = Cupon::with('tipo_cupon_detalle')->find($id);
        return response()->json($cupon, 200);
    }

    public function aprobar(Request $request)
    {
        DB::beginTransaction();
        try {
            $cupon = Cupon::find($request->id_cupon);
                if ($request->tipo_cupon == 1) {
                    $cupon->aprobado = true;
                }
                if ($request->tipo_cupon == 2) {
                    $cupon->validado = true;
                }
            $cupon->save();

            $historial = new CuponHistorial();
                $historial->id_cupon = $request->id_cupon;
                $historial->descripcion = Str::upper($request->detalle);
                $historial->id_usuario = Auth::user()->id_usuario;
            $historial->save();

            DB::commit();
            $respuesta = 'ok';
            $alerta = 'success';
            $mensaje = ($request->tipo_cupon == 1) ? 'Se aprobó el cupón' : 'La jefatura de RRHH validó la solicitud';
            $error = '';
        } catch (Exception $ex) {
            DB::rollBack();
            $respuesta = 'error';
            $alerta = 'error';
            $mensaje = 'Hubo un problema al registrar. Por favor intente de nuevo';
            $error = $ex;
        }
        return response()->json(array('respuesta' => $respuesta, 'alerta' => $alerta, 'mensaje' => $mensaje, 'error' => $error), 200);
    }

    public function denegar(Request $request)
    {
        DB::beginTransaction();
        try {
            $cupon = Cupon::find($request->id_cupon);
                $cupon->activo = 2;
            $cupon->save();

            $historial = new CuponHistorial();
                $historial->id_cupon = $request->id_cupon;
                $historial->descripcion = Str::upper('DENEGADO: '.$request->detalle);
                $historial->id_usuario = Auth::user()->id_usuario;
            $historial->save();

            DB::commit();
            $respuesta = 'ok';
            $alerta = 'success';
            $mensaje = 'Se denegó el cupón';
            $error = '';
        } catch (Exception $ex) {
            DB::rollBack();
            $respuesta = 'error';
            $alerta = 'error';
            $mensaje = 'Hubo un problema al registrar. Por favor intente de nuevo';
            $error = $ex;
        }
        return response()->json(array('respuesta' => $respuesta, 'alerta' => $alerta, 'mensaje' => $mensaje, 'error' => $error), 200);
    }

    public function historial(Request $request)
    {
        $cupon = CuponesView::find($request->id);
        $historial = CuponHistorial::with('usuario')->where('id_cupon', $request->id)->orderBy('created_at', 'asc')->get();
        return response()->json(array('cupon' => $cupon, 'historial' => $historial), 200);
    }

    public function imprimir(Request $request) {
        $cupon = CuponesView::find($request->id);
        $historial = CuponHistorial::with('usuario')->where('id_cupon', $request->id)->orderBy('created_at', 'asc')->get();
        $pdf = Pdf::loadView('admin/exportar/pdf/cupon', get_defined_vars());
        return $pdf->stream('solicitud_cupon.pdf');
    }

    public function generarCodigo() {
        $numero = Cupon::count() + 1;
        $correlativo = str_pad($numero, 4, "0", STR_PAD_LEFT);
        return 'CUPON-'.$correlativo;
    }
}
