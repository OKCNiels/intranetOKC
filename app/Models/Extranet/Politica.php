<?php

namespace App\Models\Extranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Politica extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'extranet.politicas';
    protected $fillable = ['id', 'titulo', 'descripcion_corta', 'descripcion'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
