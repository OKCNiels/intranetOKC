<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Sedes;
use Illuminate\Http\Request;

class SedesController extends Controller
{
    //
    public function listaSedesCombo($id) {

        return response()->json(["success"=>true, "data"=>Sedes::listarSedesPorEmpresa($id)],200);
    }
}
