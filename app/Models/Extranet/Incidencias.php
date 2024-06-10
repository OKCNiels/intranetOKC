<?php

namespace App\Models\Extranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incidencias extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'extranet.incidencias';
    protected $fillable = ['responsable_id', 'fecha', 'division_id', 'sede_id', 'grupo_id',
    'observacion'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
