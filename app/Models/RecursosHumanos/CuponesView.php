<?php

namespace App\Models\RecursosHumanos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuponesView extends Model
{
    use HasFactory;

    protected $table = 'rrhh.cupones_view';
    protected $appends = ['formato_fecha', 'formato_hora_inicio', 'formato_hora_fin', 'formato_total_horas'];

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

    public function getFormatoTotalHorasAttribute() {
        $formato = '';
        if ($this->horas > 0) {
            $hora = ($this->horas > 1) ? ' horas' : ' hora';
            $formato = $this->horas.$hora;
        }
        return $formato;
    }
}
