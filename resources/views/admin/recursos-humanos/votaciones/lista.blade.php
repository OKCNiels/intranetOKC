@extends('admin.admin')

@section('titulo') Extranet - Votaciones @endsection

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
</style>
@endsection


@section('content')
<div class="page-header">
    <h1 class="page-title">Gestion de Votaciones</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Recursos humanos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Votaciones</li>
        </ol>
    </div>
</div>
<div class="row">
    @if ($paginacion->total() > 0)
        {{-- <input type="hidden" name="" id="" value="{!!$paginacion->total()!!}"> --}}
        @foreach ($paginacion as $key => $item)
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
                               <button type="button" class="btn btn-primary w-lg mt-3 conteo-votos" data-id="{{ $item->id }}">Ver Conteo</button>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        @endforeach

    @endif

</div>
<div class="row">
    <div class="col-md-12">
        {!!$paginacion->links()!!}
    </div>
</div>
{{-- <div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gestion de Votaciones</h3>
            </div>
            <div class="card-body p-3">
                <div class="inbox-body">
                    <div class="table-responsive">
                        <table class="table table-inbox mb-0" width="100%" id="tabla-data">
                            <thead class="">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Periodo</th>
                                    <th>Fecha de registro</th>
                                    <th >Fecha Inicio</th>
                                    <th >Fecha Final</th>
                                    <th width="30">Acción</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="modal fade effect-flip-vertical" id="modalRegistro">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form id="formulario" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" class="form-control" value="0">
                <input type="hidden" name="flag_sustento" class="form-control" value="false">

                <div class="modal-header">
                    <h4 class="modal-title" id="titulo"></h4>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('template/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('template/plugins/select2/i18n/es.js') }}"></script>

    <script src="{{ asset('template/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    {{-- <script src="{{ asset('template/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/js/buttons.colVis.min.js') }}"></script> --}}
    <script src="{{ asset('template/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>

    <script src="{{ asset('template/js/table-data.js') }}"></script>

    <script src="{{ asset('admin/js/extranet/votaciones/votacion-model.js') }}"></script>
    <script src="{{ asset('admin/js/extranet/votaciones/votacion-view.js') }}"></script>
    <script>
        $(document).ready(function() {
            const view = new VotacionView(new VotacionModel(csrf_token));
            view.listar();
            view.eventos();
        });
    </script>
    @endsection
