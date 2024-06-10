<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Empresas;
use App\Models\Control\GuiaAlmacen;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    //
    public function empresasGuias()  {
        $array = array();
        $array_excluidos = array();
        $guias = GuiaAlmacen::select('id', 'empresa')->distinct('empresa')->get();
        foreach ($guias as $key => $value) {
            if (!empty($value->empresa)) {
                $empresas = Empresas::select('razon_social')
                ->join('contabilidad.adm_contri','adm_contri.id_contribuyente','=','adm_empresa.id_contribuyente')
                ->where('razon_social','like','%'.$value->empresa.'%')
                ->first();
                if ($empresas) {
                    array_push($array, $empresas);
                } else {
                    array_push($array_excluidos, $value);
                }
            }
        }

        $empresas = Empresas::select('adm_empresa.id_empresa','adm_contri.razon_social')
        ->join('contabilidad.adm_contri','adm_contri.id_contribuyente','=','adm_empresa.id_contribuyente')
        ->where('razon_social','like','%'.$value->empresa.'%')
        ->get();

        return response()->json([$guias, $array, $empresas],200);
    }
    public function guiasDestinoEntidad() {
        $guias = GuiaAlmacen::all();
        foreach ($guias as $key => $value) {
            $text_1 = ($value->destino?$value->destino :$value->entidad);
            $text_2 = ($value->entidad?$value->entidad :$value->destino);

            $update = GuiaAlmacen::find($value->id);
            $update->destino = $text_1;
            $update->entidad = $text_2;
            $update->save();

        }
        return response()->json($guias,200);
    }
}
