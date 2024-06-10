<?php

namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribuyente extends Model
{
    use HasFactory;
    protected $table = 'contabilidad.adm_contri';
    protected $fillable = [
        'id_tipo_contribuyente',
        'id_doc_identidad',
        'nro_documento',
        'razon_social',
        'telefono',
        'celular',
        'direccion_fisca',
        'ubigeo',
        'id_pais',
        'estado',
        'fecha_registro',
        'email',
        'transportista',
        'id_rubro',
        'id_cliente_gerencial_old',
        'id_empresa_gerencial_old'
    ];
    protected $primaryKey = 'id_contribuyente';
    public $timestamps = false;
}
