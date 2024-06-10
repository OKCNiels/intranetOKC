<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Divisiones;
use Illuminate\Http\Request;

class DivisionesController extends Controller
{
    //
    public function listaDivisionesCombo($id) {
        $area = Divisiones::where('estado',1)->where('grupo_id',$id)->get();
        return response()->json(["success"=>true,"data"=>$area],200);
    }
}
