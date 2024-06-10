<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Configuracion\Usuario;
use App\Models\Division;
use App\Models\RecursosHumanos\Aprobador;
use App\Models\RecursosHumanos\Participante;
use App\Models\RecursosHumanos\PermisosView;
use App\Models\RecursosHumanos\TipoCuponDetalle;
use App\Models\RecursosHumanos\TipoSolicitud;
use App\Models\RecursosHumanos\Votacion;
use App\Models\RecursosHumanos\Voto;
use Dcblogdev\MsGraph\Facades\MsGraph;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {

        if (Auth::check()) {


            $usuario = Usuario::where('email',Auth::user()->email)->first();

            if (!$usuario) {
                // session()->forget('user');
                // return MsGraph::disconnect()->with('success', 'Usted no cuenta con datos de personal para su ingreso, comuníquese con el área de TI.');
                // $users = DB::table('public.users')->where('id',Auth::user()->id)->first();
                // return $users;exit;
                // $usuario = new Usuario();
                // $usuario->estado = 1;
                // $usuario->fecha_registro = date('Y-m-d H:i:s');
                // $usuario->nombre_corto = Auth::user()->name;
                // $usuario->email = Auth::user()->email;
                // $usuario->nombre_largo = Auth::user()->name;
                // $usuario->password = Hash::make('@Inicio01');
                // $usuario->save();
            }

            $user = array(
                "id_usuario"=>$usuario->id_usuario,
                "id_trabajador"=>$usuario->id_trabajador,
                "id"=>Auth::user()->id,
                "name"=>$usuario->nombre_corto,
                "email"=>$usuario->email,
                "email_verified_at"=>null,
                "created_at"=>null,
                "updated_at"=>null,
            );
            $user = (object)$user;
            // session(['user' => $user]);
        }
        // return Auth::user()->id_usuario;exit;
        // -------------------------

        $aprobadores = Aprobador::where('id_usuario', Auth::user()->id_usuario)->exists();
        if ($aprobadores) {
            $totalPermisos = PermisosView::where('tipo_permiso', 'PERMISO')->count();
            $totalPermisosAprobados = PermisosView::where('tipo_permiso', 'PERMISO')->where('check_aprobado', 'SI')->count();
            $totalPermisosPendientes = PermisosView::where('tipo_permiso', 'PERMISO')->where('check_aprobado', 'NO')->count();
            $totalLicencias = PermisosView::where('tipo_permiso', 'LICENCIA')->count();
            $totalLicenciasAprobados = PermisosView::where('tipo_permiso', 'LICENCIA')->where('check_aprobado', 'SI')->count();
            $totalLicenciasPendientes = PermisosView::where('tipo_permiso', 'LICENCIA')->where('check_aprobado', 'NO')->count();
        } else {
            $totalPermisos = PermisosView::where('tipo_permiso', 'PERMISO')->where('id_usuario', Auth::user()->id_usuario)->count();
            $totalPermisosAprobados = PermisosView::where('tipo_permiso', 'PERMISO')->where('check_aprobado', 'SI')->where('id_usuario', Auth::user()->id_usuario)->count();
            $totalPermisosPendientes = PermisosView::where('tipo_permiso', 'PERMISO')->where('check_aprobado', 'NO')->where('id_usuario', Auth::user()->id_usuario)->count();
            $totalLicencias = PermisosView::where('tipo_permiso', 'LICENCIA')->where('id_usuario', Auth::user()->id_usuario)->count();
            $totalLicenciasAprobados = PermisosView::where('tipo_permiso', 'LICENCIA')->where('check_aprobado', 'SI')->where('id_usuario', Auth::user()->id_usuario)->count();
            $totalLicenciasPendientes = PermisosView::where('tipo_permiso', 'LICENCIA')->where('check_aprobado', 'NO')->where('id_usuario', Auth::user()->id_usuario)->count();
        }

        $porcentajePermisosAprobados = ($totalPermisos > 0) ? number_format((($totalPermisosAprobados * 100) / $totalPermisos), 2) : number_format(0, 2);
        $porcentajePermisosPendientes = ($totalPermisos > 0) ? number_format((($totalPermisosPendientes * 100) / $totalPermisos), 2) : number_format(0, 2);
        $porcentajeLicenciasAprobados = ($totalLicencias > 0) ? number_format((($totalLicenciasAprobados * 100) / $totalLicencias), 2) : number_format(0, 2);
        $porcentajeLicenciasPendientes = ($totalLicencias > 0) ? number_format((($totalLicenciasPendientes * 100) / $totalLicencias), 2) : number_format(0, 2);

        $tipoCupones = TipoCuponDetalle::whereHas('tipo_cupon', function ($query) {
            $query->whereNull('deleted_at');
        })->orderBy('descripcion', 'asc')->get();

        $votaciones = Votacion::where('dashboard','t')->get();
        foreach ($votaciones as $key => $value) {
            $padron_electoral = Participante::where('votacion_id',$value->id)->where('usuario_id',Auth::user()->id_usuario)->first();
            if ($padron_electoral) {
                // busca si ya votaste ;
                $buscar_voto = Voto::where('usuario_id',Auth::user()->id_usuario)->where('votacion_id',$value->id)->first();
                if ($buscar_voto || (date('Y-m-d H:i:s') > $value->fecha_final)) {
                    $value->btn_votacion = false;
                }else{
                    $value->btn_votacion = true;
                }

            }else{
                $value->btn_votacion = false;
            }
        }
        // return Auth::user()->id_usuario;
        return view('admin.dashboard', get_defined_vars());
    }

    public function listarDivision(Request $request)
    {
        $data = Division::where('grupo_id', $request->valor)->get();
        return response()->json($data, 200);
    }

    public function listarDetallePermiso(Request $request)
    {
        $data = TipoSolicitud::where('tipo_permiso_id', $request->valor)->get();
        return response()->json($data, 200);
    }

    public function listarDetalleCupon(Request $request) {
        $data = TipoCuponDetalle::where('tipo_cupon_id', $request->valor)->get();
        return response()->json($data, 200);
    }
}
