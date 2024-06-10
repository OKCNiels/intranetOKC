<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de permiso</title>
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
    <h1 class="a-center">SOLICITUD DE PERMISO</h1>
    <br><br>
    <h5 style="margin-bottom: 8px;">1. Datos del cupón</h5>
        <div class="contenedor">
        <table class="table table-result">
            <tbody>
                <tr>
                    <td class="color" width="100" align="left">Fecha solicitud</td>
                    <td width="20" align="center">:</td>
                    <td>{{ $permiso->formato_fecha }}</td>
                </tr>
                <tr>
                    <td class="color" width="100" align="left">Tipo permiso</td>
                    <td width="20" align="center">:</td>
                    <td>{{ $permiso->tipo_permiso }}</td>
                </tr>
                <tr>
                    <td class="color" width="100" align="left">Tipo solicitud</td>
                    <td width="20" align="center">:</td>
                    <td>{{ $permiso->tipo_solicitud }}</td>
                </tr>
                <tr>
                    <td class="color" width="100" align="left">Grupo</td>
                    <td width="20" align="center">:</td>
                    <td>{{ $permiso->grupo }}</td>
                </tr>
                <tr>
                    <td class="color" width="100" align="left">Área</td>
                    <td width="20" align="center">:</td>
                    <td>{{ $permiso->division }}</td>
                </tr>
                <tr>
                    <td class="color" width="100" align="left">Autoriza</td>
                    <td width="20" align="center">:</td>
                    <td>{{ $permiso->datos_autoriza }}</td>
                </tr>
                <tr>
                    <td class="color" width="100" align="left">Descripción del permiso</td>
                    <td width="20" align="center">:</td>
                    <td colspan="5">{{ $permiso->permiso }}</td>
                </tr>
                <tr>
                    <td class="color" width="100" align="left">F. Inicio y F. Fin</td>
                    <td width="20" align="center">:</td>
                    <td colspan="2">{{ $permiso->formato_fecha_inicio }} al {{ $permiso->formato_fecha_fin }} ({{ $permiso->formato_total_dias }})</td>
                </tr>
                <tr>
                    <td class="color" width="100" align="left">Horario del permiso</td>
                    <td width="20" align="center">:</td>
                    <td colspan="2">{{ $permiso->formato_hora_inicio }} al {{ $permiso->formato_hora_fin }} ({{ $permiso->formato_total_horas }})</td>
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