<?php

namespace App\Models\RecursosHumanos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voto extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'rrhh.votos';
    protected $fillable = ['usuario_id', 'votacion_id', 'participante_id', 'fecha_registro', 'created_id', 'updated', 'deleted_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
