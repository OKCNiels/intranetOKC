<?php

namespace App\Models\Almacen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenDespachos extends Model
{
    use HasFactory;
    protected $table = 'almacen.orden_despacho';
    protected $primaryKey = 'id_od';
    public $timestamps = false;
}
