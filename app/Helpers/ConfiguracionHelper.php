<?php
namespace App\Helpers;

use Carbon\Carbon;

class ConfiguracionHelper
{
    public static function generarCodigo($serie = '', $separador = '', $cantidad = 0, $modulo, $periodo = 'NO', $valorPeriodo = 0, $tipo = 1, $id_empresa = 0, $id_grupo = 0)
    {
		$numero = ConfiguracionHelper::contadorModular($modulo);
        $correlativo = ConfiguracionHelper::leftZero($cantidad, $numero);
		$inicial = '';
		switch ($tipo) {
			case 1:
				$inicial = $serie;
			break;
			// case 2:
			// 	$inicial = ConfiguracionHelper::codigoEmpresa($id_empresa);
			// break;
			// case 3:
			// 	$inicial = ConfiguracionHelper::codigoGrupo($id_grupo);
			// break;
			// case 4:
			// 	$inicial = $serie.ConfiguracionHelper::codigoGrupo($id_grupo);
			// break;
		}
		$anio = ($periodo == 'NO') ? '' : ConfiguracionHelper::generarCodigoAnual($valorPeriodo);
        return $inicial.$anio.$separador.$correlativo;
    }
    /*
	 * Función para autogenerar un correlativo de números donde se rellena de ceros a la izquierda
	 */
    public static function leftZero($lenght, $number){
		$nLen = strlen($number);
		$zeros = '';
		for($i = 0; $i < ($lenght - $nLen); $i++){
			$zeros = $zeros.'0';
		}
		return $zeros.$number;
	}

    /*
	 * Función para extraer el último registro a nivel de módulos (tablas)
	 */
	public static function contadorModular($modulo)
	{
		$correlativo = 0;
		switch ($modulo) {
			case 'cargo':
				// $correlativo = Cargo::count() + 1;
			break;
		}
		return $correlativo;
	}
    /*
	 * Función que extrae un string del año en ejecución o periodo seleccionado (2 últimos dígitos)
	 * Si el año tiene valor 0 la función tomará el año en curso
	 * Si el año tiene un valor (Ejm: 20233) ese será el año a ejecutar
	 */
	public static function generarCodigoAnual($anio)
	{
		$valor = ($anio > 0) ? $anio : Carbon::now()->format('Y');
		return substr($valor, 2);
	}
}
