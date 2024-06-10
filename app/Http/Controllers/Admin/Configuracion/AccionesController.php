<?php

namespace App\Http\Controllers\Admin\Configuracion;

use App\Http\Controllers\Controller;
use App\Models\Extranet\Acciones;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AccionesController extends Controller
{
    //
    public function lista()
    {
        #----------------------------------------------------------------
        return view('admin.configuracion.acciones.lista', get_defined_vars());
    }
    public function listar()
    {
        $data = Acciones::all();
        return DataTables::of($data)
        // ->addColumn('padre', function ($data) {
        //     $id=(is_int((int)$data->padre_id)?(int)$data->padre_id:0);
        //     $padre = Usuario::find($data->padre_id);
        //     return ($padre?$padre->nombre:'#');
        // })
        // ->addColumn('visible_span', function ($data) {return
        //     '<span class="badge bg-'.($data->visible===true?'success':'danger').' badge-sm  me-1 mb-1 mt-1">'.($data->visible===true?'visible':'no visible').'</span>';
        // })
        // ->addColumn('estado_span', function ($data) {return
        //     '<span class="badge bg-'.($data->estado===true?'success':'danger').' badge-sm  me-1 mb-1 mt-1">'.($data->estado===true?'activo':'desactivo').'</span>';
        // })
        ->addColumn('accion', function ($data) { return
            '<div class="g2" role="group">
                <button type="button" class="btn btn-sm editar protip" data-id="'.$data->id.'" data-pt-scheme="dark" data-pt-size="small" data-pt-position="top" data-pt-title="Editar">
                    <i class="fe fe-edit fs-14"></i>
                </button>
                <button type="button" class="btn btn-sm eliminar protip" data-id="'.$data->id.'" data-pt-scheme="dark" data-pt-size="small" data-pt-position="top" data-pt-title="Eliminar">
                    <i class="fe fe-trash-2 fs-14"></i>
                </button>
            </div>';
        })->rawColumns(['accion','visible_span','estado_span'])->make(true);
    }
    public function guardar(Request $request)
    {
        try {
            $data = Acciones::firstOrNew(['id' => $request->id]);
            $data->nombre         = $request->nombre;
            $data->descripcion    = $request->descripcion;
            $data->estado         = 1;
            if ((int)$request->id>0) {
                $data->updated_at   = date('Y-m-d H:i:s');
                $data->updated_id   = Auth::user()->id_usuario;
                $data->save();


            }else{
                $data->created_at   = date('Y-m-d H:i:s');
                $data->updated_at   = date('Y-m-d H:i:s');
                $data->created_id   = Auth::user()->id_usuario;
                $data->save();
            }

            $respuesta = array("titulo"=>"Éxito", "mensaje"=>"Se guardo con éxito", "tipo"=>"success");
        } catch (Exception $ex) {
            $respuesta = array("titulo"=>"Alerta", "mensaje"=>"Ocurrio un error, intentelo de nuevo o comuníquese con su soporte académico", "tipo"=>"warning");
        }
        return response()->json($respuesta,200);
    }
    public function editar($id) {
        $data = Acciones::find($id);
        $success = true;
        if (!$data) {
            $success = false;
        }
        return response()->json(array("data"=>$data, "success"=>$success),200);
    }
    public function eliminar($id) {
        $data = Acciones::find($id);
        $data->deleted_id   = Auth::user()->id_usuario;
        $data->save();
        $data->delete();
        $respuesta = array("titulo"=>"Éxito", "mensaje"=>"Se elimino con éxito", "tipo"=>"success");
        return response()->json($respuesta,200);
    }
}
