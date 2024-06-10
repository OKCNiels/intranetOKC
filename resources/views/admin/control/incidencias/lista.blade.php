@extends('admin.admin')

@section('titulo') Guías de Remisión @endsection

@section('css')
@endsection


@section('content')
<div class="page-header">
    <h1 class="page-title">Control de Incidencias</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Control</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gestion de Incidencias</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Incidencias</h3>
                <div class="card-options">
                    <a class="btn btn-sm btn-success" href="#" id="nuevo">
                        <i class="fe fe-plus"></i>
                        Nueva Incidencia
                    </a>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="inbox-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" width="100%" id="tabla-data">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Responsable</th>
                                    <th>Fecha</th>
                                    <th>Area/Division</th>
                                    <th>Sede</th>
                                    <th>Grupo</th>
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
            <form id="guardar" autocomplete="off">
                @csrf
                <input type="hidden" name="id" class="form-control" value="0">

                <div class="modal-header">
                    <h4 class="modal-title">Nueva Incidencia</h4>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
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
    <script src="{{ asset('template/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>

    <script src="{{ asset('admin/js/extranet/control/incidencias/incidencia-view.js') }}"></script>
    <script src="{{ asset('admin/js/extranet/control/incidencias/incidencia-model.js') }}"></script>
    <script>
        $(document).ready(function() {
            const view = new IncidenciaView(new IncidenciaModel(csrf_token));
            view.listar();
            view.eventos();
        });
    </script>
@endsection
