<?php

namespace App\Models\RecursosHumanos;

use App\Models\Division;
use App\Models\Grupo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rrhh.cupones';
    protected $fillable = [
        'codigo', 'id_trabajador', 'id_grupo', 'id_division', 'id_autoriza', 'tipo_cupon_detalle_id', 'fecha', 'horas', 'hora_inicio', 'hora_fin',
        'aprobado', 'validado', 'id_usuario', 'activo'
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $appends = ['formato_fecha', 'formato_hora_inicio', 'formato_hora_fin'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo', 'id_grupo');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'id_division', 'id_division');
    }

    public function autoriza()
    {
        return $this->belongsTo(Usuario::class, 'id_autoriza', 'id_usuario')->withTrashed();
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario')->withTrashed();
    }

    public function tipo_cupon_detalle()
    {
        return $this->belongsTo(TipoCuponDetalle::class)->withTrashed();
    }

    public function getFormatoFechaAttribute()
    {
        return date('d/m/Y', strtotime($this->fecha));
    }

    public function getFormatoHoraInicioAttribute()
    {
        return ($this->hora_inicio) ? date('H:i A', strtotime($this->hora_inicio)) : 'S.H';
    }

    public function getFormatoHoraFinAttribute()
    {
        return ($this->hora_fin) ? date('H:i A', strtotime($this->hora_fin)) : 'S.H';
    }
}
