<?php

namespace App\Models\Administracion;

use App\Models\Contabilidad\Contribuyente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Empresas extends Model
{
    use HasFactory;
    protected $table = 'administracion.adm_empresa';
    protected $primaryKey = 'id_empresa';
    protected $fillable = ['id_contribuyente', 'codigo', 'estado', 'logo_empresa'];
    public $timestamps = false;


    public function contribuyente(): BelongsTo
    {
        return $this->belongsTo(Contribuyente::class, 'id_contribuyente');
    }
}
