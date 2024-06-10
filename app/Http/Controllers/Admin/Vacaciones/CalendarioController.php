<?php

namespace App\Http\Controllers\Admin\Vacaciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    //
    public function calendario() {
        return view('admin.vacaciones.calendario', get_defined_vars());
    }
}
