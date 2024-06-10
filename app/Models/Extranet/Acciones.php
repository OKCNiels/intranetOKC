<?php

namespace App\Models\Extranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acciones extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'extranet.acciones';
    protected $fillable = ['nombre', 'descripcion', 'estado', 'created_id', 'updated_id',
    'deleted_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
