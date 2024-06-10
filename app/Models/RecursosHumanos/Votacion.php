<?php

namespace App\Models\RecursosHumanos;

use App\Models\Administracion\Periodo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Votacion extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'rrhh.votaciones';
    protected $fillable = ['nombre', 'periodo_id', 'fecha_registro', 'fecha_inicio','fecha_final', 'created_id', 'updated', 'deleted_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodo_id', 'id_periodo');
    }
}
