<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    use HasFactory;
    protected $table = 'administracion.adm_grupo';
    protected $primaryKey = 'id_grupo';
    public $timestamps = false;
}
