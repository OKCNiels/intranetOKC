<?php

namespace App\Models\RecursosHumanos;

use App\Models\Configuracion\Usuario;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aprobador extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rrhh.aprobadores';
    protected $fillable = ['id_usuario'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }
}
