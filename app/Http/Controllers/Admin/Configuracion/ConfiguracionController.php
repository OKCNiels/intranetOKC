<?php

namespace App\Http\Controllers\Admin\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    //
    public function dashboard() {
        return view('admin.configuracion.dashboard', get_defined_vars());
    }
}
