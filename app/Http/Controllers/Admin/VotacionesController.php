<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RecursosHumanos\Participante;
use App\Models\RecursosHumanos\Votacion;
use App\Models\RecursosHumanos\Voto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotacionesController extends Controller
{
    //
    public function lista() {
        $paginacion = Votacion::paginate(12);
        foreach ($paginacion as $key => $value) {
            $padron_electoral = Participante::where('votacion_id', $value->id)->where('usuario_id', Auth::user()->id_usuario)->first();
            if ($padron_electoral) {
                // busca si ya votaste ;
                $buscar_voto = Voto::where('usuario_id', Auth::user()->id_usuario)->where('votacion_id', $value->id)->first();
                if ($buscar_voto || (date('Y-m-d H:i:s') > $value->fecha_final)) {
                    $value->btn_votacion = false;
                }else{
                    $value->btn_votacion = true;
                }
            }else{
                $value->btn_votacion = false;
            }
        }
        return view('admin.recursos-humanos.votaciones.lista', get_defined_vars());
    }
    public function listar() {

        // $data = Votacion::all();
        // return DataTables::of($data)
        // ->addColumn('pedioro', function ($data) {
        //     $periodo = Periodo::find($data->periodo_id);
        //     // return $periodo->descripcion;
        //     return $data->periodo->descripcion;
        // })
        // ->addColumn('accion', function ($data) { return
        //     '<div class="btn-group mt-2 mb-2">
        //         <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
        //                 <span class="caret"><i class="fe fe-settings me-1 text-dark"></i></span>
        //             </button>
        //         <ul class="dropdown-menu">
        //             <li>
        //                 <a class="dropdown-item" href="javascript:void(0)" data-id="'.$data->id.'">Editar</a>
        //             </li>
        //             <li><a class="dropdown-item" href="javascript:void(0)" data-id="'.$data->id.'">Eliminar</span></a></li>
        //             <li><a class="dropdown-item cedula" href="#" data-id="'.$data->id.'">Generar cédula</span></a></li>
        //         </ul>
        //     </div>
        //     ';
        // })->rawColumns(['accion','visible_span','estado_span'])->make(true);
    }
    public function guardar() {

    }
    public function editar() {

    }
    public function eliminar() {

    }
    public function cedula(Request $request) {
        //busca la votacion de cabecera
        $votaciones = Votacion::find($request->id);
        // busca a la lista de candidatos para seleccionar uno de ellos
        $candidatos = Participante::select('rrhh_perso.nro_documento','rrhh_perso.nombres','rrhh_perso.apellido_paterno','rrhh_perso.apellido_materno', 'sis_usua.id_usuario', 'participantes.path')
        ->where('participantes.candidato','t')
        ->where('participantes.votacion_id',$request->id)
        ->join('configuracion.sis_usua', 'sis_usua.id_usuario', '=', 'participantes.usuario_id')
        ->join('rrhh.rrhh_trab', 'rrhh_trab.id_trabajador', '=', 'sis_usua.id_trabajador')
        ->join('rrhh.rrhh_postu', 'rrhh_postu.id_postulante', '=', 'rrhh_trab.id_postulante')
        ->join('rrhh.rrhh_perso', 'rrhh_perso.id_persona', '=', 'rrhh_postu.id_persona')
        ->get();
        // return $candidatos;exit;
        // busca si estas en el padron;
        $padron_electoral = Participante::where('votacion_id',$request->id)->where('usuario_id',Auth::user()->id_usuario)->first();
        if ($padron_electoral) {
            // busca si ya votaste ;
            $buscar_voto = Voto::where('usuario_id',Auth::user()->id_usuario)->where('votacion_id',$request->id)->first();
            if ($buscar_voto) {
                return view('recursos-humanos.votaciones.lista', get_defined_vars());
            }
            return view('recursos-humanos.votaciones.cedula', get_defined_vars());
        }
        return view('recursos-humanos.votaciones.lista', get_defined_vars());
    }
    public function votacion(Request $request) {
        // return response()->json(["success"=>true],200);
        $respuesta=array();
        try {
            $buscar_voto = Voto::where('usuario_id', Auth::user()->id_usuario)->where('votacion_id', $request->votacion_id)->first();

            if (!$buscar_voto) {
                $data = new Voto();
                    $data->usuario_id = Auth::user()->id_usuario;
                    $data->votacion_id = $request->votacion_id;
                    $data->participante_id = $request->candidato;
                    $data->fecha_registro = date('Y-m-d h:i:s');
                    $data->created_at = date('Y-m-d h:i:s');
                    $data->updated_at = date('Y-m-d h:i:s');
                    $data->created_id = Auth::user()->id_usuario;
                    $data->updated_id = Auth::user()->id_usuario;
                $data->save();
                $respuesta['success']=true;
                $respuesta['titulo']='Éxito';
                $respuesta['mensaje']='Se registro su voto con éxito';
                $respuesta['tipo']='success';
            }else{
                $respuesta['success']=true;
                $respuesta['titulo']='Alerta';
                $respuesta['mensaje']='Usted ya realizo su voto correspondiente.';
                $respuesta['tipo']='warning';
            }


        } catch (Exception $ex) {
            $respuesta['success']=false;
            $respuesta['titulo']='Alerta';
            $respuesta['mensaje']=$ex;
            $respuesta['tipo']='error';
        }
        return response()->json($respuesta,200);
    }
    public function conteo(Request $request)
    {
        $idVotacion = $request->id;
        $padron = Participante::where('votacion_id', $idVotacion)->count();
        // la cantidad de votos realizados
        $votos = Voto::where('votacion_id', $idVotacion)
        ->where('participante_id','!=',0)->whereNotNull('participante_id')
        ->count();
        // porcentaje de votos realizados
        $votos_realizados_porcentaje = round((($votos * 100) / $padron),1);



        //identificamos los votos en blanco
        $votos_blanco = Voto::where('votacion_id', $idVotacion)->whereNull('participante_id')->count();
        // porcentaje de votos faltantes
        $votos_blancos_porcentaje = round((($votos_blanco * 100) / $padron),1);

        //identificamos los votos Nulos
        $votos_nulos = Voto::where('votacion_id', $idVotacion)->where('participante_id',0)->count();
        // porcentaje de votos Nulos
        $votos_nulos_porcentaje = round((($votos_nulos * 100) / $padron),1);

        //identificamos los votos faltantes
        $votos_faltantes =$padron -($votos + $votos_blanco + $votos_nulos);
        // porcentaje de votos faltantes
        $votos_faltantes_porcentaje = round((($votos_faltantes * 100) / $padron),1);
        //candidatos
        $candidatos = Participante::select('participantes.id','participantes.usuario_id', 'sis_usua.nombre_corto')
        ->join('configuracion.sis_usua', 'sis_usua.id_usuario', '=', 'participantes.usuario_id')
        ->where('participantes.votacion_id', $idVotacion)->where('participantes.candidato','t')
        ->get();

        $candidatos_array = array();
        foreach ($candidatos as $key => $value) {
            $value->votos_total = Voto::where('votacion_id', $idVotacion)->where('participante_id',$value->usuario_id)->count();
            $value->votos_porcentaje = round((($value->votos_total * 100) / $padron),1);

            array_push($candidatos_array,$value);
            if (sizeof($candidatos)==($key+1)) {
                array_push($candidatos_array,(object) array(
                    "id"=> 0,
                    "usuario_id"=> 0,
                    "nombre_corto"=> "Votos en Blanco",
                    "votos_total"=> $votos_blanco,
                    "votos_porcentaje"=> $votos_blancos_porcentaje
                ));
                array_push($candidatos_array,(object) array(
                    "id"=> 0,
                    "usuario_id"=> 0,
                    "nombre_corto"=> "Votos Nulos",
                    "votos_total"=> $votos_nulos,
                    "votos_porcentaje"=> $votos_nulos_porcentaje
                ));
            }


        }

        $array_columnas = array();//array de porcentaje
        $array_nombres = [];//array de nombres
        $array_colores = [];//array de colores
        foreach ($candidatos_array as $key => $value) {
            array_push($array_columnas, ["data".($key+1),$value->votos_porcentaje]);
            $array_colores["data".($key+1)]=$this->color_rand();
            $array_nombres["data".($key+1)]=$value->nombre_corto;

        }
        // return $candidatos;exit;

        $padron_electoral = Participante::select('participantes.id','participantes.usuario_id', 'sis_usua.nombre_corto')
        ->join('configuracion.sis_usua', 'sis_usua.id_usuario', '=', 'participantes.usuario_id')
        ->where('participantes.votacion_id', $idVotacion)->get();

        foreach ($padron_electoral as $key => $value) {
            $voto = Voto::where('usuario_id', $value->usuario_id)->first();
            $value->fecha_voto = '';
            if ($voto) {
                $value->fecha_voto = $voto->fecha_registro;
            }
        }
        // return $padron_electoral;exit;
        // return [$this->orderBy($candidatos_array, 'votos_total', 'desc'),$candidatos_array];exit;
        return view('admin.recursos-humanos.votaciones.conteo', get_defined_vars());
    }
    function orderBy($items, $attr, $order)
    {
        $sortedItems = [];
        foreach ($items as $item) {
            $key = is_object($item) ? $item->{$attr} : $item[$attr];
            $sortedItems[$key] = $item;
        }
        if ($order === 'desc') {
            krsort($sortedItems);
        } else {
            ksort($sortedItems);
        }

        return array_values($sortedItems);
    }
    public function color_rand() {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    public function graficos(Request $request) {
        $lista = Participante::where('candidato', true)->where('votacion_id', $request->valor)->get();
        $total = Participante::where('votacion_id', $request->valor)->count();
        $participantes = [];
        $puntuacion = [];

        foreach ($lista as $key) {
            $votos = Voto::where('participante_id', $key->usuario_id)->count();
            $conteo = ($votos * 100) / $total;
            $participantes[] = $key->usuario->nombre_corto;
            $puntuacion[] = number_format($conteo, 2);
        }

        return response()->json(array('candidatos' => $participantes, 'porcentaje' => $puntuacion), 200);
    }
}
