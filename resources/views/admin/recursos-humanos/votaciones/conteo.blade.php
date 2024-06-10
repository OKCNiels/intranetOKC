@extends('admin.admin')

@section('titulo') Extranet - Votaciones @endsection

@section('css')
<!-- INTERNAL Switcher css -->

<style>
    .caja{
        width: 10px;
        height: 10px;
    }
</style>
@endsection


@section('content')
<div class="page-header">
    <h1 class="page-title">Conteo de Votos</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Recursos humanos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Votaciones</li>
        </ol>
    </div>
</div>
<div class="row justify-content-md-center">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <small class="text-muted">Votos</small>
                    <h2 class="mb-2 mt-0">{{$padron}}</h2>
                    <div data-circle="success" class="mt-3 mb-3 chart-dropshadow-secondary"></div>
                    <div class="chart-circle-value-3 text-success fs-20"><i class="icon icon-user"></i></div>
                    <p class="mb-0 text-start"><span class="dot-label bg-success me-2"></span>Padron electoral <span class="float-end">100%</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <small class="text-muted">Votos</small>
                    <h2 class="mb-2 mt-0">{{$votos}}</h2>
                    <div data-circle="warning" class="mt-3 mb-3 chart-dropshadow-secondary"></div>
                    <div class="chart-circle-value-3 text-warning fs-20"><i class="icon icon-user"></i></div>
                    <p class="mb-0 text-start"><span class="dot-label bg-warning me-2"></span>Votos realizados <span class="float-end">{{$votos_realizados_porcentaje}}%</span></p>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row justify-content-md-center">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <small class="text-muted">Votos</small>
                    <h2 class="mb-2 mt-0">{{$votos_faltantes}}</h2>
                    <div data-circle="danger" class="mt-3 mb-3 chart-dropshadow-secondary"></div>
                    <div class="chart-circle-value-3 text-danger fs-20"><i class="icon icon-user"></i></div>
                    <p class="mb-0 text-start"><span class="dot-label bg-danger me-2"></span>Votos faltantes <span class="float-end">{{$votos_faltantes_porcentaje}}%</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <small class="text-muted">Votos</small>
                    <h2 class="mb-2 mt-0">{{$votos_blanco}}</h2>
                    <div data-circle="info" class="mt-3 mb-3 chart-dropshadow-secondary"></div>
                    <div class="chart-circle-value-3 text-info fs-20"><i class="icon icon-user"></i></div>
                    <p class="mb-0 text-start"><span class="dot-label bg-info me-2"></span>Votos en Blanco <span class="float-end">{{$votos_blancos_porcentaje}}%</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <small class="text-muted">Votos</small>
                    <h2 class="mb-2 mt-0">{{$votos_nulos}}</h2>
                    <div data-circle="primary" class="mt-3 mb-3 chart-dropshadow-secondary"></div>
                    <div class="chart-circle-value-3 text-primary fs-20"><i class="icon icon-user"></i></div>
                    <p class="mb-0 text-start"><span class="dot-label bg-primary me-2"></span>Votos Nulos <span class="float-end">{{$votos_nulos_porcentaje}}%</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-md-center">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Dashboard de votaciones (%)</h3>
            </div>
            <div class="card-body">
                <div id="votaciones" class="chartPie"></div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card text-center">
            <div class="card-header text-center">
                <h3 class="card-title text-center">Resultado del conteo votos</h3>
            </div>
            <div class="card-body">
                <table class="table table-inbox mb-0" width="100%" id="tabla-data">
                    <thead class="">
                        <tr>
                            <td width="10"></td>
                            <td align="left">Candidato</td>
                            <td>Votos</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidatos as $key=>$item)
                        <tr>
                            <td></td>
                            <td align="left">{{$item->nombre_corto}}</td>
                            <td>{{$item->votos_total}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<div class="row justify-content-md-center">

</div>
@if (Auth::user()->id_usuario === 2 || Auth::user()->id_usuario === 27 || Auth::user()->id_usuario === 1)
<div class="row justify-content-md-center">
    <div class="col-md-8">
        <div class="card text-center">
            <div class="card-header text-center">
                <h3 class="card-title text-center">Padron electoral</h3>
            </div>
            <div class="card-body">
                <table class="table table-inbox mb-0" width="100%" id="tabla-data">
                    <thead class="">
                        <tr>
                            <td>N°</td>
                            <td>Participantes</td>
                            <td>Voto</td>
                            <td>Fecha y hora</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($padron_electoral as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->nombre_corto }}</td>
                            <td>{!! ($item->fecha_voto) ? '<i class="fe fe-check text-success"></i>' : '<i class="fe fe-x text-danger"></i>' !!}</td>
                            <td>{{ ($item->fecha_voto) ? date("d/m/Y  H:i:s A", strtotime($item->fecha_voto)) : '-' }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endif


@endsection

@section('scripts')
    <script src="{{ asset('template/plugins/chartjs/chart.min.js') }}"></script>

    <script src="{{ asset('admin/js/extranet/votaciones/votacion-model.js') }}"></script>
    <script src="{{ asset('admin/js/extranet/votaciones/votacion-view.js') }}"></script>
    <script>
        const VOTOS_REALIZADOS_PORCENTAJE = {{$votos_realizados_porcentaje}};
        const VOTOS_FALTANTES_PORCENTAJE = {{$votos_faltantes_porcentaje}};

        const VOTOS_BLANCO_PORCENTAJE = {{$votos_blancos_porcentaje}};
        const VOTOS_NULOS_PORCENTAJE = {{$votos_nulos_porcentaje}};

        const COLUMNAS = {!! json_encode($array_columnas, JSON_HEX_TAG) !!};
        const NOMBRES = {!! json_encode($array_nombres, JSON_HEX_TAG) !!};
        const COLORES = {!! json_encode($array_colores, JSON_HEX_TAG) !!};

        const idVotacion = {{ $idVotacion }};

        $(document).ready(function() {
            const view = new VotacionView(new VotacionModel(csrf_token));
            // view.listar();
            view.dashboard();
            view.pieChart();

        });

    </script>
@endsection
