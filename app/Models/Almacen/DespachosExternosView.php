<?php

namespace App\Models\Almacen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DespachosExternosView extends Model
{
    use HasFactory;
    protected $table = 'almacen.despachos_externos_view';
    protected $primaryKey = 'id_requerimiento';
    public $timestamps = false;
}
