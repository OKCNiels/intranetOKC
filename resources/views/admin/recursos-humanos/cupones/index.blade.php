@extends('admin.admin')

@section('titulo') Cupones @endsection

@section('css')
@endsection

{{-- @section('cabecera')
<div class="page-header">
    <h1 class="page-title">Solicitud de Cupones</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Recursos humanos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cupones</li>
        </ol>
    </div>
</div>
@endsection --}}

@section('content')
<div class="page-header">
    <h1 class="page-title">Solicitud de Cupones</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Recursos humanos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cupones</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de solicitudes de cupones</h3>
            </div>
            <div class="card-body p-3">
                <div class="inbox-body">
                    <div class="table-responsive">
                        <table class="table table-inbox mb-0" width="100%" id="tabla">
                            <thead class="table-primary">
                                <tr>
                                    <th width="25">Fecha</th>
                                    <th>Código</th>
                                    <th>Solicitante</th>
                                    <th>Tipo</th>
                                    <th>Solicitud</th>
                                    <th>Grupo</th>
                                    <th>Área</th>
                                    <th width="25">Total Horas</th>
                                    <th width="25">Desde Hasta</th>
                                    <th width="90">Responsable</th>
                                    <th width="30">Estado</th>
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
</div>

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
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Fecha:</label>
                                <input type="date" name="fecha" class="form-control text-center" value="{{ date('Y-m-d') }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Cuponera:</label>
                                        <select name="tipo_cupon_id" class="form-control form-select select2 select-tipo-cupon" required>
                                            <option value=""></option>
                                            @foreach ($tipoCupon as $cupon)
                                                <option value="{{ $cupon->id }}">{{ $cupon->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="form-label">Tipo de cupón:</label>
                                        <select name="tipo_cupon_detalle_id" class="form-control form-select select2 select-detalle-cupon" required>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Autorizado por:</label>
                                <select name="responsable_id" class="form-control form-select select2 select-responsable" required>
                                    <option value=""></option>
                                    @foreach ($responsables as $responsable)
                                        @if ($responsable->usuario)

                                        <option value="{{ $responsable->usuario->id_usuario }}">{{ $responsable->usuario->nombre_corto }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Grupo:</label>
                                <select name="grupo_id" class="form-control form-select select2 select-grupo" required>
                                    <option value=""></option>
                                    @foreach ($grupos as $grupo)
                                        <option value="{{ $grupo->id_grupo }}">{{ $grupo->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Area:</label>
                                <select name="area_id" class="form-control form-select select2 select-area" required>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Horas:</label>
                                        <select name="horas" class="form-control form-select select2 select-hora" required>
                                            <option value=""></option>
                                            <option value="1">1 hora</option>
                                            <option value="2">2 horas</option>
                                            <option value="3">3 horas</option>
                                            <option value="4">4 horas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Hora Inicio:</label>
                                                <input type="time" name="hora_inicio" class="form-control text-center" value="{{ date('H:00') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Hora Fin:</label>
                                                <input type="time" name="hora_fin" class="form-control text-center" value="{{ date('H:00', strtotime('+1 hour', strtotime(date('H:00')))) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

<div class="modal fade effect-flip-vertical" id="modalAprobacion">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formulario-aprobacion">
                @csrf
                <input type="hidden" name="id_cupon" class="form-control" value="0">
                <input type="hidden" name="tipo_cupon" class="form-control" value="0">
                <input type="hidden" name="modalidad" class="form-control" value="0">

                <div class="modal-header">
                    <h4 class="modal-title">Sustento de la aprobación</h4>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Sustentar aprobación:</label>
                                <textarea name="detalle" class="form-control" placeholder="Escriba el sustento de la aprobación" rows="4" style="resize: none;" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Proceder</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade effect-flip-vertical" id="modalHistorial">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Historial del cupón</h4>
                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-12" id="resultado"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table">
                            <thead class="table-primary">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Detalle de la acción</th>
                                    <th>Usuario</th>
                                </tr>
                            </thead>
                            <tbody id="resultado-historial"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="imprimir" data-key="">Imprimir</button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
            </div>
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
    <script src="{{ asset('template/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('template/js/table-data.js') }}"></script>
    <script>
        let idUsuario = {{ Auth::user()->id_usuario }};
        let rrhhUsuarios = [1, 2];
    </script>
    <script src="{{ asset('admin/js/extranet/cupones.js') }}"></script>
@endsection
