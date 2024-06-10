<?php

namespace App\Http\Controllers\Admin\Intranet;

use App\Http\Controllers\Controller;
use App\Models\Extranet\Calendario;
use App\Models\Extranet\Menus;
use App\Models\Extranet\TipoEvento;
use Exception;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    //
    public function inicio()
    {
        #variables que renderizan el menu y sus modulos usarlos en todos los controladores
        $modulos_padre = Menus::where('visible',true)->where('estado',true)->where('padre_id',0)->get();
        $modulos_hijos = Menus::where('visible',true)->where('estado',true)->where('padre_id','!=',0)->get();
        #----------------------------------------------------------------

        $tipo_eventos = TipoEvento::all();

        return view('admin.publicidad.calendario.inicio', get_defined_vars());
    }
    public function guardar(Request $request)
    {

        // return $request->root();exit;
        try {

            if ($request->filled('eliminarEvento')) {
                $calendario = Calendario::find($request->id);
                $calendario->delete();
            }else{
                $calendario = Calendario::firstOrNew(['id' => $request->id]);
                $calendario->tipo_evento_id     = $request->tipo_evento_id;
                $calendario->titulo             = $request->titulo;
                $calendario->descripcion = $request->descripcion;
                if ($request->hasFile('imagen')) {
                    $file = $request->file('imagen');
                    $destinoPath = 'admin/images/publicidad/calendario/';
                    $file_name = time().'-'.$file->getClientOriginalName();
                    $upload_success = $request->file('imagen')->move($destinoPath,$file_name);
                    $calendario->imagen = $request->root().'/'.$destinoPath.$file_name;
                }

                $calendario->fecha_inicio       = $request->fecha_inicio;
                $calendario->fecha_final        = $request->fecha_final;
                $calendario->hora_inicio        = $request->hora_inicio;
                $calendario->hora_final         = $request->hora_final;

                $calendario->save();
            }




            return response()->json(["sucess"=>true, "mensaje"=>"Se registro con éxito"],200);
        } catch (Exception $ex) {
            return response()->json(["sucess"=>false, "mensaje"=>$ex],200);
        }
    }
    public function listar()
    {
        $calendario = Calendario::all();
        $eventosCalendario = array();
        foreach ($calendario as $key => $value) {
            array_push($eventosCalendario,array(
                "id"    => $value->id,
                "title" => $value->titulo,
                "start" => $value->fecha_inicio."T".$value->hora_inicio,
                "end"   => $value->fecha_final."T".$value->hora_final,
                "color" => '#5e72e4',
            ));
        }
        return response()->json($eventosCalendario,200);
    }
    public function mover(Request $request)
    {
        try {
            $calendario = Calendario::firstOrNew(['id' => $request->id]);
            $calendario->fecha_inicio       = $request->fecha_inicio;
            $calendario->fecha_final        = $request->fecha_final;
            $calendario->save();
            return response()->json(["sucess"=>true, "mensaje"=>"Se registro con éxito"],200);
        } catch (Exception $ex) {
            return response()->json(["sucess"=>false, "mensaje"=>"No se pudo cambiar la fecha"],200);
        }
        return response()->json($request,200);
    }
    public function editar(Request $request)
    {
        $calendario = Calendario::find($request->id);
        return response()->json(["success"=>true,"data"=>$calendario],200);
    }
}
