<?php

namespace App\Models\Extranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calendario extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'extranet.calendario';
    protected $fillable = ['tipo_evento_id', 'titulo', 'descripcion', 'imagen', 'fecha_inicio',
    'fecha_final', 'hora_inicio', 'hora_final', 'dia_total'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
