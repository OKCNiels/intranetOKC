<?php

namespace App\Models\Configuracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Usuario extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'configuracion.sis_usua';
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['id_trabajador', 'usuario', 'clave', 'estado', 'fecha_registro', 'acceso', 'rol', 'nombre_corto', 'codvend_softlink', 'email', 'deleted_at', 'renovar', 'password', 'nombre_largo', 'name', 'email_verified_at', 'remember_token', 'password_intranet'];
    // protected $hidden = ['created_at', 'updated_at'];

    public $timestamps = false;

    public function getAllRol()
	{
		$rol = DB::table('configuracion.usuario_rol')
			->select('usuario_rol.*', 'sis_rol.descripcion')
			->join('configuracion.sis_rol', 'sis_rol.id_rol', '=', 'usuario_rol.id_rol')
			->where('usuario_rol.id_usuario', $this->id_usuario)
			->where('usuario_rol.estado', 1)
			->orderBy('usuario_rol.id_usuario_rol', 'desc')->first();
		return ($rol) ? $rol->descripcion : 'SN';
	}
}
