
@extends('admin.configuracion.app-configuracion')
@section('configuracion-header')
<div class="page-header">
    <h1 class="page-title">Gestion de usuarios</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Configuración</a></li>
            <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
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
                <h3 class="card-title">GESTION DE LISTADO DE USUARIOS</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed" id="tabla-data" width="100%">
                                <thead>
                                    <tr>
                                        <th width="30">N°</th>
                                        <th width="20">Nombre Corto</th>
                                        <th width="20">Email</th>
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


    <script src="{{ asset('admin/js/Configuracion/usuarios/usuario-model.js') }}"></script>
    <script src="{{ asset('admin/js/Configuracion/usuarios/usuario-view.js') }}"></script>
    <script>
        $(document).ready(function() {
            const moduloView = new UsuarioView(new UsuarioModel(csrf_token));
            moduloView.listar();
            moduloView.eventos();
        });
    </script>
@endsection
