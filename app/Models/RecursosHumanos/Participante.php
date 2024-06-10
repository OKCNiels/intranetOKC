<?php

namespace App\Models\RecursosHumanos;

use App\Models\Configuracion\Usuario;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participante extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'rrhh.participantes';
    protected $fillable = ['usuario_id', 'votacion_id', 'candidato', 'fecha_registro', 'created_id', 'updated', 'deleted_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id_usuario');
    }


}
