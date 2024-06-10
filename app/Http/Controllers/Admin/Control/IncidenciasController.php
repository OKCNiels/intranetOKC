<?php

namespace App\Http\Controllers\Admin\Control;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Empresas;
use App\Models\Administracion\Grupos;
use App\Models\Extranet\Incidencias;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class IncidenciasController extends Controller
{
    //
    public function lista() {
        return view('admin.control.incidencias.lista', get_defined_vars());
    }
    public function listar() {
        $data = Incidencias::all();
        return DataTables::of($data)
        ->addColumn('padre', function ($data) {
            $id=(is_int((int)$data->padre_id)?(int)$data->padre_id:0);
            $padre = Incidencias::find($data->padre_id);
            return ($padre?$padre->nombre:'#');
        })
        // ->addColumn('visible_span', function ($data) {return
        //     '<span class="badge bg-'.($data->visible===true?'success':'danger').' badge-sm  me-1 mb-1 mt-1">'.($data->visible===true?'visible':'no visible').'</span>';
        // })
        // ->addColumn('estado_span', function ($data) {return
        //     '<span class="badge bg-'.($data->estado===true?'success':'danger').' badge-sm  me-1 mb-1 mt-1">'.($data->estado===true?'activo':'desactivo').'</span>';
        // })
        ->addColumn('accion', function ($data) { return
            '<div class="btn-group btn-group-sm" role="group">
                <button type="button" class="btn btn-sm editar protip" data-id="'.$data->id.'" data-pt-scheme="dark" data-pt-size="small" data-pt-position="top" data-pt-title="Editar">
                    <i class="fa fa-edit"></i>
                </button>
                <button type="button" class="btn btn-sm eliminar protip" data-id="'.$data->id.'" data-pt-scheme="dark" data-pt-size="small" data-pt-position="top" data-pt-title="Eliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </div>';
        })->rawColumns(['accion','visible_span','estado_span'])->make(true);
    }
    public function formulario(Request $request) {
        $id = $request->id;
        $tipo = $request->tipo;
        $empresas = Empresas::all();
        $grupos = Grupos::all();
        // return $grupos;exit;
        return view('admin.control.incidencias.formulario', get_defined_vars());
    }
    public function guardar(Request $request) {
        try {
            $data = Incidencias::firstOrNew(['id' => $request->id]);
                $data->responsable_id   = $request->responsable_id;
                $data->fecha            = $request->fecha;
                $data->division_id      = $request->division_id;
                $data->sede_id          = $request->sede_id;
                $data->grupo_id         = $request->grupo_id;
                $data->observacion      = $request->observacion;
                $data->empresa_id       = $request->empresa_id;
            $data->save();

            $response = array("titulo"=>"Éxito", "mensaje"=>"Se guardo con éxito", "tipo"=>"success");
        } catch (Exception $e) {
            $response = array("titulo"=>"Error", "mensaje"=>"Se produjo un error al guardar comuniquese con el área de TI", "tipo"=>"error");
        }

        return response()->json($response,200);
    }
    public function editar() {

    }
    public function eliminar($id) {
        $data = Incidencias::find($id);
        $data->deleted_id = Auth::user()->id_usuario;
        $data->save();
        $data->delete();
        $response = array("titulo"=>"Éxito", "mensaje"=>"Se elimino con éxito", "tipo"=>"success");
        return response()->json($response,200);
    }
}
