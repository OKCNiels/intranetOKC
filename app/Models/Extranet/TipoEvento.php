<?php

namespace App\Models\Extranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoEvento extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'extranet.tipo_eventos';
    protected $fillable = ['descripcion'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
