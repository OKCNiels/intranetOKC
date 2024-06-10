<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisiones extends Model
{
    use HasFactory;
    protected $table = 'administracion.division';
    protected $primaryKey = 'id_division';
    public $timestamps = false;
}
