<?php

namespace App\Models\Rrhh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RT extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'extranet.rts';
    protected $fillable = ['id', 'titulo', 'descripcion'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
