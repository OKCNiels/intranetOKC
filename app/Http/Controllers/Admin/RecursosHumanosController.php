<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grupo;
use App\Models\RecursosHumanos\Aprobador;
use App\Models\RecursosHumanos\Permiso;
use App\Models\RecursosHumanos\PermisoHistorial;
use App\Models\RecursosHumanos\PermisosView;
use App\Models\RecursosHumanos\TipoPermiso;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class RecursosHumanosController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $grupos = Grupo::where('id_estado', '!=', 7)->orderBy('descripcion', 'asc')->get();
        $responsables = Aprobador::with(['usuario' => function($query) {
            $query->select('id_usuario', 'nombre_corto')->orderBy('nombre_corto', 'asc');
        }])->get();
        $tpermisos = TipoPermiso::orderBy('descripcion', 'asc')->get();
        foreach ($responsables as $key => $value) {
            // return $value;
        }

        return view('admin.recursos-humanos.permisos.index', get_defined_vars());
    }

    public function listar(Request $request)
    {
        $aprobadores = Aprobador::where('id_usuario', Auth::user()->id_usuario)->exists();
        if ($aprobadores) {
            $data = PermisosView::select(['*']);
        } else {
            $data = PermisosView::select(['*'])->where('id_usuario', Auth::user()->id_usuario);
        }

        return DataTables::of($data)
        ->editColumn('fecha', function ($data) { return date('d/m/Y', strtotime($data->fecha)); })
        ->addColumn('fechas_permiso', function ($data) { return date('d/m/Y', strtotime($data->fecha_inicio)). '<br>'. date('d/m/Y', strtotime($data->fecha_fin)); })
        ->addColumn('dia_hora', function ($data) {
            $txtDia = '-'; $txtHora = '-';
            if ($data->dias > 0) {
                $dia = ($data->dias > 1) ? ' (días)' : ' (día)';
                $txtDia = $data->dias.$dia;
            }
            if ($data->horas > 0) {
                $hora = ($data->horas > 1) ? ' (horas)' : ' (hora)';
                $txtHora = $data->horas.$hora;
            }
            return ($txtDia != '') ? $txtDia.'<br>'.$txtHora : $txtHora;
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
                } else {
                    if ($data->id_usuario == Auth::user()->id_usuario) {
                        $opcion .= '<li><a href="javascript:void(0)" onclick="sustento('.$data->id.');">Agregar sustento</a></li>';
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
        ->rawColumns(['dia_hora', 'fechas_permiso', 'accion', 'estado_final'])->make(true);
    }

    public function guardar(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = Permiso::firstOrNew(['id' => $request->id]);
                $data->id_trabajador = Auth::user()->id_trabajador;
                $data->id_grupo = $request->grupo_id;
                $data->id_division = $request->area_id;
                $data->tipo_permiso_detalle_id = $request->tipo_permiso_detalle_id;
                $data->flag_sustento = $request->flag_sustento;
                $data->id_autoriza = $request->responsable_id;
                $data->fecha = $request->fecha;
                $data->detalle = Str::upper($request->detalle);
                $data->cupon = $request->cupon;
                $data->fecha_inicio = $request->fecha_inicio;
                $data->fecha_fin = $request->fecha_fin;
                $data->dias = $request->dias;
                $data->hora_inicio = $request->hora_inicio;
                $data->hora_fin = $request->hora_fin;
                $data->horas = $request->horas;
                $data->id_usuario = Auth::user()->id_usuario;

                if ($request->hasFile('archivo')) {
                    $file = $request->file('archivo');
                    $file_name = uniqid().'-'.time().'.'.$file->getClientOriginalExtension();
                    $file_path = public_path().'/admin/documentos/permisos/sustentos/'.$file_name;
                    $file->move(public_path().'/admin/documentos/permisos/sustentos/', $file_name);
                    $data->sustento = $file_name;
                    $data->link_sustento = $file_path;
                }
            $data->save();

            $historial = new PermisoHistorial();
                $historial->id_permiso = $data->id;
                $historial->descripcion = 'CREACIÓN DE LA SOLICITUD DE PERMISO';
                $historial->id_usuario = Auth::user()->id_usuario;
            $historial->save();

            DB::commit();
            $respuesta = 'ok';
            $alerta = 'success';
            $mensaje = ($request->id > 0) ? 'Se ha editado el permiso' : 'Se ha registrado el permiso';
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
        $permiso = Permiso::with('tipo_permiso_detalle')->find($id);
        return response()->json($permiso, 200);
    }

    public function aprobar(Request $request)
    {
        DB::beginTransaction();
        try {
            $permiso = Permiso::find($request->id_permiso);
                if ($request->tipo_permiso == 1) {
                    $permiso->aprobado = true;
                }
                if ($request->tipo_permiso == 2) {
                    $permiso->validado = true;
                }
            $permiso->save();

            $historial = new PermisoHistorial();
                $historial->id_permiso = $request->id_permiso;
                $historial->descripcion = Str::upper($request->detalle);
                $historial->id_usuario = Auth::user()->id_usuario;
            $historial->save();

            DB::commit();
            $respuesta = 'ok';
            $alerta = 'success';
            $mensaje = ($request->tipo_permiso == 1) ? 'Se aprobó el permiso' : 'La jefatura de RRHH validó la solicitud';
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
            $permiso = Permiso::find($request->id_permiso);
                $permiso->activo = 2;
            $permiso->save();

            $historial = new PermisoHistorial();
                $historial->id_permiso = $request->id_permiso;
                $historial->descripcion = Str::upper('DENEGADO: '.$request->detalle);
                $historial->id_usuario = Auth::user()->id_usuario;
            $historial->save();

            DB::commit();
            $respuesta = 'ok';
            $alerta = 'success';
            $mensaje = 'Se denegó el permiso';
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

    public function guardarSustento(Request $request)
    {

        DB::beginTransaction();
        try {
            $data = Permiso::find($request->id_permiso);
            if ($request->hasFile('archivo')) {
                $file = $request->file('archivo');
                $file_name = uniqid().'-'.time().'.'.$file->getClientOriginalExtension();
                $file_path = public_path().'/admin/documentos/permisos/sustentos/'.$file_name;
                $file->move(public_path().'/admin/documentos/permisos/sustentos/', $file_name);
                $data->sustento = $file_name;
                $data->link_sustento = $file_path;
            }
            $data->save();

            $historial = new PermisoHistorial();
                $historial->id_permiso = $data->id;
                $historial->descripcion = 'SUSTENTO DEL PERMISO POSTERIOR A LA EJECUCIÓN DEL MISMO';
                $historial->id_usuario = Auth::user()->id_usuario;
            $historial->save();

            DB::commit();
            $respuesta = 'ok';
            $alerta = 'success';
            $mensaje = 'Se ha registrado el sustento del permiso';
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

        $permiso = PermisosView::find($request->id);
        $historial = PermisoHistorial::with('usuario')->where('id_permiso', $request->id)->orderBy('created_at', 'asc')->get();
        // return $historial;exit;
        return response()->json(array('permiso' => $permiso, 'historial' => $historial), 200);
    }

    public function imprimir(Request $request) {
        $permiso = PermisosView::find($request->id);
        $historial = PermisoHistorial::with('usuario')->where('id_permiso', $request->id)->orderBy('created_at', 'asc')->get();
        $pdf = Pdf::loadView('admin/exportar/pdf/permiso', get_defined_vars());
        return $pdf->stream('solicitud_permiso.pdf');
    }
}
