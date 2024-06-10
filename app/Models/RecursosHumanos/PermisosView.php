<?php

namespace App\Models\RecursosHumanos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisosView extends Model
{
    use HasFactory;

    protected $table = 'rrhh.permisos_view';
    protected $appends = ['formato_fecha', 'formato_fecha_inicio', 'formato_fecha_fin', 'formato_hora_inicio', 'formato_hora_fin', 'formato_total_dias', 'formato_total_horas'];

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

    public function getFormatoTotalDiasAttribute() {
        $formato = '-';
        if ($this->dias > 0) {
            $dia = ($this->dias > 1) ? ' (días)' : ' (día)';
            $formato = $this->dias.$dia;
        }
        return $formato;
    }

    public function getFormatoTotalHorasAttribute() {
        $formato = '00:00';
        if ($this->horas > 0) {
            $hora = ($this->horas > 1) ? ' horas' : ' hora';
            $formato = $this->horas.$hora;
        }
        return $formato;
    }
}
