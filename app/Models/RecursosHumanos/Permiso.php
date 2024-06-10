<?php

namespace App\Models\RecursosHumanos;

use App\Models\Configuracion\Usuario;
use App\Models\Division;
use App\Models\Grupo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permiso extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rrhh.permisos';
    protected $fillable = [
        'id_trabajador', 'id_grupo', 'id_division', 'id_autoriza', 'tipo_permiso_detalle_id', 'fecha', 'dias', 'fecha_inicio', 'fecha_fin',
        'horas', 'hora_inicio', 'hora_fin', 'detalle', 'flag_sustento', 'sustento', 'link_sustento', 'aprobado', 'validado', 'id_usuario', 'activo'
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $appends = ['formato_fecha', 'formato_fecha_inicio', 'formato_fecha_fin', 'formato_hora_inicio', 'formato_hora_fin'];

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

    public function tipo_permiso_detalle()
    {
        return $this->belongsTo(TipoPermisoDetalle::class)->withTrashed();
    }

    public function getFormatoFechaAttribute()
    {
        return date('d/m/Y', strtotime($this->fecha));
    }

    public function getFormatoFechaInicioAttribute()
    {
        return ($this->fecha_inicio) ? date('d/m/Y', strtotime($this->fecha_inicio)) : 'S.F';
    }

    public function getFormatoFechaFinAttribute()
    {
        return ($this->fecha_fin) ? date('d/m/Y', strtotime($this->fecha_fin)) : 'S.F';
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
