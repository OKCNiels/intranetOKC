<?php

namespace App\Http\Controllers\Admin\Configuracion;

use App\Http\Controllers\Controller;
use App\Models\Configuracion\Modulo;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ModuloController extends Controller
{
    //
    public function lista()
    {
        #variables que renderizan el menu y sus modulos usarlos en todos los controladores
        $modulos_padre = Modulo::where('visible',true)->where('estado',true)->where('padre_id',0)->get();
        $modulos_hijos = Modulo::where('visible',true)->where('estado',true)->where('padre_id','!=',0)->get();
        #----------------------------------------------------------------
        return view('admin.configuracion.modulos.lista', get_defined_vars());
    }
    public function listar()
    {
        $data = Modulo::all();
        return DataTables::of($data)
        ->addColumn('padre', function ($data) {
            $id=(is_int((int)$data->padre_id)?(int)$data->padre_id:0);
            $padre = Modulo::find($data->padre_id);
            return ($padre?$padre->nombre:'#');
        })
        ->addColumn('visible_span', function ($data) {return
            '<span class="badge bg-'.($data->visible===true?'success':'danger').' badge-sm  me-1 mb-1 mt-1">'.($data->visible===true?'visible':'no visible').'</span>';
        })
        ->addColumn('estado_span', function ($data) {return
            '<span class="badge bg-'.($data->estado===true?'success':'danger').' badge-sm  me-1 mb-1 mt-1">'.($data->estado===true?'activo':'desactivo').'</span>';
        })
        ->addColumn('accion', function ($data) { return
            '<div class="btn-group btn-group-sm" role="group">
                <button type="button" class="btn btn-xs editar protip" data-id="'.$data->id.'" data-pt-scheme="dark" data-pt-size="small" data-pt-position="top" data-pt-title="Editar">
                    <i class="fa fa-edit"></i>
                </button>
                <button type="button" class="btn btn-xs eliminar protip" data-id="'.$data->id.'" data-pt-scheme="dark" data-pt-size="small" data-pt-position="top" data-pt-title="Eliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </div>';
        })->rawColumns(['accion','visible_span','estado_span'])->make(true);
    }
    public function formularioModulo(Request $request)
    {
        #variables que renderizan el menu y sus modulos usarlos en todos los controladores
        $modulos_padre = Modulo::where('visible',true)->where('estado',true)->where('padre_id',0)->get();
        $modulos_hijos = Modulo::where('visible',true)->where('estado',true)->where('padre_id','!=',0)->get();
        #----------------------------------------------------------------
        $modulo = Modulo::find($request->id);
        $tipo = $request->tipo;
        return view('admin.configuracion.modulos.modulo-formulario', get_defined_vars());
    }
    public function guardar(Request $request)
    {
        try {
            $modulo = Modulo::firstOrNew(['id' => $request->id]);
            $modulo->url            = $request->url;
            $modulo->nombre         = $request->nombre;
            $modulo->padre_id       = $request->padre_id;
            $modulo->descripcion    = $request->descripcion;
            $modulo->icono          = $request->icono;
            $modulo->estado         = $request->estado;
            $modulo->visible        = $request->visible;
            $modulo->save();

            $respuesta = array("success"=>true,"titulo"=>"Éxito" ,"mensaje"=>"Seguardo correctamente", "tipo"=>"success");
            return response()->json($respuesta,200);
        } catch (Exception $ex) {
            $respuesta = array("success"=>true,"titulo"=>"Alerta" ,"mensaje"=>"Ocurrio un error al guardar", "tipo"=>"warning");
            return response()->json($respuesta,200);
        }

    }
    public function eliminar($id)
    {
        $respuesta = array("success"=>true,"titulo"=>"Éxito" ,"mensaje"=>"Se elimino correctamente", "tipo"=>"success");
        return response()->json($respuesta,200);
    }
}
