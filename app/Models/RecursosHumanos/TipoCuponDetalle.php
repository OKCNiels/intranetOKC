<?php

namespace App\Models\RecursosHumanos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class TipoCuponDetalle extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rrhh.tipo_cupon_detalle';
    protected $fillable = ['tipo_cupon_id', 'descripcion'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $appends = ['total_cupones'];

    public function tipo_cupon()
    {
        return $this->belongsTo(TipoCupon::class)->withTrashed();
    }

    public function getTotalCuponesAttribute()
    {
        // return Cupon::where('tipo_cupon_detalle_id', $this->id)->count();
        return Cupon::where('tipo_cupon_detalle_id', $this->id)->where('id_usuario', Auth::user()->id_usuario)->count();
    }
}
