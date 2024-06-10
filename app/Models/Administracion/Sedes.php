<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sedes extends Model
{
    use HasFactory;
    protected $table = 'administracion.sis_sede';
    protected $primaryKey = 'id_grupo';
    public $timestamps = false;

    public static function listarSedesPorEmpresa($idEmpresa)
    {
        $data = Sedes::select(
                'sis_sede.*', 'ubi_dis.descripcion as ubigeo_descripcion',
                DB::raw("concat(ubi_dis.descripcion, ' ',ubi_prov.descripcion,' ' ,ubi_dpto.descripcion)  AS ubigeo_descripcion")

            )
            ->leftJoin('configuracion.ubi_dis','ubi_dis.id_dis','=','sis_sede.id_ubigeo')
            ->leftJoin('configuracion.ubi_prov', 'ubi_dis.id_prov', '=', 'ubi_prov.id_prov')
            ->leftJoin('configuracion.ubi_dpto', 'ubi_prov.id_dpto', '=', 'ubi_dpto.id_dpto')

            ->where('sis_sede.id_empresa','=',$idEmpresa)
            ->orderBy('sis_sede.id_empresa', 'asc')
            ->get();
        return $data;
    }
}
