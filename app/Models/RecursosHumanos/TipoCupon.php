<?php

namespace App\Models\RecursosHumanos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoCupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rrhh.tipo_cupon';
    protected $fillable = ['descripcion'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
