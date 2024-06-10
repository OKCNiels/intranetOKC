<?php

namespace App\Models\RecursosHumanos;

use App\Models\Configuracion\Usuario;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CuponHistorial extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rrhh.cupon_historial';
    protected $fillable = ['id_cupon', 'id_usuario', 'descripcion'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $appends = ['formato_fecha'];

    public function cupon()
    {
        return $this->belongsTo(Cupon::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario')->withTrashed();
    }

    public function getFormatoFechaAttribute()
    {
        return date('d/m/Y H:i A', strtotime($this->created_at));
    }
}
