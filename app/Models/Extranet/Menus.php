<?php

namespace App\Models\Extranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menus extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'extranet.menus';
    protected $fillable = ['url', 'nombre','padre_id', 'descripcion', 'icono', 'target', 'estado','visible', 'created_id', 'updated_id', 'deleted_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
