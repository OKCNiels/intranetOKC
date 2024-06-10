<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de cupón</title>
    <style>
        *{
            font-family: "Helvetica";
            color: #222;
        }
        body *{
            margin: 0;
            padding: 0;
        }
        .a-center {
            text-align: center;
        }
        .a-right {
            text-align: right;
        }
        .a-left {
            text-align: left;
        }
        img{
            width: 300px;
        }
        .cabecera{
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
        }
        table{
            width: 100%;
        }
        .table{
            border-collapse: collapse;
        }
        .table td,
        .table th{
            padding: 5px;
            font-size: 11px;
        }
        .table tbody.detalle td,
        .table tbody.detalle th{
            padding: 7px;
            font-size: 11px;
        }
        .table tbody.detalle tr {
            border-bottom: 1px solid #e9edf4;
        }
        .table thead{
            background-color: #d2cdf9;
        }
        .table p{
            margin-top: 5px;
        }
        .terms{
            font-size: 10px;
            padding: 5px;
        }
        .color {
            color: #6c5ffc;
        }
        .contenedor {
            border: 1px solid #e9edf4;
            padding: 4px;
        }
</style>
</head>
<body>
    <br>
    <h1 class="a-center">SOLICITUD DE CUPON</h1>
    <h2 class="a-center">{{ $cupon->codigo }}</h2>
    <br><br>
    <h5 style="margin-bottom: 8px;">1. Datos del cupón</h5>
    <div class="contenedor">
        <table class="table table-result">
            <tbody>
                <tr>
                    <td width="100" class="color" align="left">Fecha solicitud</td>
                    <td width="20" align="center">:</td>
                    <td>{{ $cupon->formato_fecha }}</td>
                </tr>
                <tr>
                    <td width="100" class="color" align="left">Tipo cupon</td>
                    <td width="20" align="center">:</td>
                    <td>{{ $cupon->tipo_cupon }}</td>
                </tr>
                <tr>
                    <td width="100" class="color" align="left">Tipo solicitud</td>
                    <td width="20" align="center">:</td>
                    <td>{{ $cupon->tipo_solicitud }}</td>
                </tr>
                <tr>
                    <td width="100" class="color" align="left">Grupo</td>
                    <td width="20" align="center">:</td>
                    <td>{{ $cupon->grupo }}</td>
                </tr>
                <tr>
                    <td width="100" class="color" align="left">Área</td>
                    <td width="20" align="center">:</td>
                    <td>{{ $cupon->division }}</td>
                </tr>
                <tr>
                    <td width="100" class="color" align="left">Autoriza</td>
                    <td width="20" align="center">:</td>
                    <td>{{ $cupon->datos_autoriza }}</td>
                </tr>
                <tr>
                    <td width="100" class="color" align="left">Horario del cupón</td>
                    <td width="20" align="center">:</td>
                    <td colspan="5">{{ $cupon->formato_hora_inicio }} al {{ $cupon->formato_hora_fin }} ({{ $cupon->formato_total_horas }})</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <h5 style="margin-bottom: 8px;">2. Control de Averías</h5>
    <div class="contenedor">
        <table class="table table-result">
            <thead>
                <tr>
                    <th width="100">Fecha</th>
                    <th>Detalle de la acción</th>
                    <th width="80">Usuario</th>
                </tr>
            </thead>
            <tbody class="detalle">
                @if (count($historial) > 0)
                    @foreach ($historial as $item)
                        <tr>
                            <td>{{ $item->formato_fecha }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td>{{ $item->usuario->nombre_corto }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="3">No se encontraron resultados</td></tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>