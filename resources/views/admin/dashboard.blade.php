@extends('admin.admin')
@section('titulo')Panel Principal @endsection
@section('css')
<style>
    .btn-pulse {
        -webkit-animation: pulse-black 1.5s linear infinite;
    }
    @keyframes pulse-black{
        0%{
            -webkit-transform:scale(1);
            transform:scale(1);
            box-shadow:0 0 0 0 rgb(19, 191, 166)
        }
        70%{
            -webkit-transform:scale(1);
            transform:scale(1);
            box-shadow:0 0 0 10px transparent
        }
        100%{
            -webkit-transform:scale(1);
            transform:scale(1);
            box-shadow:0 0 0 0 transparent
        }
    }
    a.list-group-item span.badge {
        position: absolute;
        inset-block-start: 18px;
        inset-inline-end: 20px;
    }
</style>
@endsection
@section('content')
     <!-- PAGE-HEADER -->
     <div class="page-header">
        <h1 class="page-title">Panel principal</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Recursos humanos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Panel principal</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <!-- Row -->
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body p-4">
                    <div class="list-group list-group-transparent mb-0 file-manager file-manager-border">
                        <h4>Lista de cupones</h4>
                        @foreach ($tipoCupones as $item)
                            <div>
                                <a href="javascript:void(0);" class="list-group-item d-flex align-items-center px-0 border-top">
                                    <i class="{{ $item->icono }} fs-18 me-2 {{ $item->color }} p-2"></i> {{ $item->descripcion }}
                                    <span class="badge rounded-pill bg-info badge-sm br-5 pb-1">{{ $item->total_cupones }}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-order">
                                <h2 class="text-end"><i class="icon-size mdi mdi-account-location float-start text-primary text-primary-shadow border-solid border-primary brround p-3"></i><span>{{ $totalPermisos }}</span></h2>
                                <p class="mb-0 pt-5">Total permisos<span class="float-end">{{ (($totalPermisos > 0) ? '100.00%' : '0.00%')}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widget">
                                <h2 class="text-end"><i class="icon-size mdi mdi-eye float-start text-success text-success-shadow border-solid border-success brround p-3"></i><span>{{ $totalPermisosAprobados }}</span></h2>
                                <p class="mb-0 pt-5">Permisos aprobados<span class="float-end">{{ $porcentajePermisosAprobados }}%</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widget">
                                <h2 class="text-end"><i class="icon-size mdi mdi-alert-outline float-start text-danger text-danger-shadow border-solid border-danger brround p-3"></i><span>{{ $totalPermisosPendientes }}</span></h2>
                                <p class="mb-0 pt-5">Permisos pendientes<span class="float-end">{{ $porcentajePermisosPendientes }}%</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-order">
                                <h2 class="text-end"><i class="icon-size mdi mdi-account-box-outline float-start text-primary text-primary-shadow border-solid border-primary brround p-3"></i><span>{{ $totalLicencias }}</span></h2>
                                <p class="mb-0 pt-5">Total licencias<span class="float-end">{{ (($totalLicencias > 0) ? '100.00%' : '0.00%') }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widget">
                                <h2 class="text-end"><i class="icon-size mdi mdi-account-check float-start text-success text-success-shadow border-solid border-success brround p-3"></i><span>{{ $totalLicenciasAprobados }}</span></h2>
                                <p class="mb-0 pt-5">Licencias aprobadas<span class="float-end">{{ $porcentajeLicenciasAprobados }}%</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widget">
                                <h2 class="text-end"><i class="icon-size mdi mdi-alert-octagram float-start text-danger text-danger-shadow border-solid border-danger brround p-3"></i><span>{{ $totalLicenciasPendientes }}</span></h2>
                                <p class="mb-0 pt-5">Licencias pendientes<span class="float-end">{{ $porcentajeLicenciasPendientes }}%</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if (sizeof($votaciones) > 0)
            @foreach ($votaciones as $key => $item)
                @php
                    $fecha_actual = date('Y-m-d');
                    $class_pulse = '';
                    if ($fecha_actual <= $item->fecha_final) {
                        $class_pulse = 'btn-pulse';
                    }
                @endphp
                <div class="col-md-3">
                    <div class="card service" data-action="ingreso">
                        <div class="card-body">
                            <div class="item-box text-center">
                                <div class=" text-center  mb-4 text-primary"><i class="icon icon-people"></i></div>
                                <div class="item-box-wrap">
                                    <h5 class="mb-2">{{ $item->nombre }}</h5>
                                    <p class="text-muted mb-0">{{ $item->descripcion }}</p>
                                </div>
                            </div>
                            <div class="item-box text-center">
                                @if ($item->btn_votacion === true)
                                    <button type="button" data-id="{{ $item->id }}" class="btn btn-success {{($item->btn_votacion === false)?'':'cedula'}} w-lg mt-3 {{$class_pulse}}"
                                        {{($item->btn_votacion === false)?'disabled':''}}>Ingresar
                                    </button>
                                @endif
                                @if (in_array(Auth::user()->id_usuario, array(2,27,1,162,160,178,127)))
                                <button type="button" class="btn btn-primary mt-3 conteo-votos w-lg" data-id="{{ $item->id }}">Ver Conteo</button>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        @endif
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('[data-action="ingreso"]').on("click", 'button.cedula', (e) => {
                e.preventDefault();
                let id =$(e.currentTarget).attr('data-id'),
                    tipo ="Editar Modulo",
                    form = $('<form action="'+route('recursos-humanos.votaciones.cedula')+'" method="POST">'+
                        '<input type="hidden" name="_token" value="'+csrf_token+'" >'+
                        '<input type="hidden" name="id" value="'+id+'" >'+
                    '</form>');
                $('body').append(form);
                form.submit();
            });
            $('[data-action="ingreso"]').on("click", 'button.conteo-votos', (e) => {
                e.preventDefault();
                let id =$(e.currentTarget).attr('data-id'),
                    form = $('<form action="'+route('recursos-humanos.votaciones.conteo')+'" method="POST">'+
                        '<input type="hidden" name="_token" value="'+csrf_token+'" >'+
                        '<input type="hidden" name="id" value="'+id+'" >'+
                    '</form>');
                $('body').append(form);
                form.submit();
            });
            $(".sidebar-mini").addClass("sidenav-toggled");
        });
    </script>
@endsection
