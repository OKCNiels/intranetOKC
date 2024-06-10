<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AplicacionesController extends Controller
{
    //
    public function aplicaciones() {
        return view('admin.aplicaciones', get_defined_vars());
    }
}
