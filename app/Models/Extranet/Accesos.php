<?php

namespace App\Models\Extranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accesos extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'extranet.accesos';
    protected $fillable = ['accion_id', 'usuario_id', 'menu_id', 'created_id', 'updated_id',
    'deleted_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
