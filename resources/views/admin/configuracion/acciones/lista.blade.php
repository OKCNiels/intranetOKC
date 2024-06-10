
@extends('admin.configuracion.app-configuracion')
@section('configuracion-header')
<div class="page-header">
    <h1 class="page-title">Gestion de Acciones</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Configuración</a></li>
            <li class="breadcrumb-item active" aria-current="page">Acciones</li>
        </ol>
    </div>
</div>
@endsection
@section('configuracion-contenido')
<div class="row ">
    <div class="col-md-12">
        <div class="card">
            {{-- <div class="card-status bg-blue br-te-7 br-ts-7"></div> --}}
            <div class="card-header">
                <h3 class="card-title">GESTION DE LISTADO DE ACCIONES</h3>
                <div class="card-options">
                    <a href="javascript:void(0)" class="btn btn-success btn-sm" id="nuevo"><i class="fa fa-plus"></i> Nueva Acción</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed" id="tabla-data" width="100%">
                                <thead>
                                    <tr>
                                        <th width="30">N°</th>
                                        <th width="20">Nombre</th>
                                        <th width="20">Descripción</th>
                                        <th width="50">Acción</th>
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
</div>

<div class="modal fade effect-flip-vertical" id="modal-accesos">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form id="guardar" autocomplete="off">
                @csrf
                <input type="hidden" name="id" class="form-control" value="0">

                <div class="modal-header">
                    <h4 class="modal-title">Nuevo Acceso</h4>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="nombre">Nombre <span class="text-red">*</span></label>
                              <input type="text" name="nombre" id="nombre" class="form-control form-control-sm" placeholder="Nombre..." aria-describedby="helpId" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="descripcion">Descripción <span class="text-red">*</span></label>
                              <textarea class="form-control form-control-sm" name="descripcion" id="descripcion" cols="12" rows="3" placeholder="Descripción..." required></textarea>
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
@endsection
@section('scripts')
    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('template/plugins/select2/select2.full.min.js') }}"></script>

    <!-- DATA TABLE JS-->
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


    <script src="{{ asset('admin/js/extranet/configuracion/acciones/accion-model.js') }}"></script>
    <script src="{{ asset('admin/js/extranet/configuracion/acciones/accion-view.js') }}"></script>
    <script>
        $(document).ready(function() {
            const view = new AccionView(new AccionModel(csrf_token));
            view.listar();
            view.eventos();
        });
    </script>
@endsection
