@extends('admin.admin')
@section('titulo')Lista de Modulos @endsection
@section('content')
     <!-- PAGE-HEADER -->
     <div class="page-header">
        <h1 class="page-title">Modulos</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{explode('/',Request::path())[1]}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{explode('/',Request::path())[2]}}</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <!-- Row -->
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-status bg-blue br-te-7 br-ts-7"></div>
                <div class="card-header">
                    <h3 class="card-title">GESTION DE LISTADO DE MODULOS</h3>
                    {{-- <div class="card-options">
                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                        <a href="javascript:void(0)" class="card-options-remove" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-condensed" id="tabla-data" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="30">N°</th>
                                            <th width="10">Nombre</th>
                                            <th width="20">Padre</th>
                                            <th width="20">Visible</th>
                                            <th width="20">Estado</th>
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
@section('script')
    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>

    <!-- DATA TABLE JS-->
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>


    {{-- <script src="{{ asset('admin/js/Configuracion/modulos/modulo-view.js') }}"></script>
    <script src="{{ asset('admin/js/Configuracion/modulos/modulo-model.js') }}"></script> --}}

    <script src="{{ asset('admin/js/Intranet/menu/menu-view.js') }}"></script>
    <script src="{{ asset('admin/js/Intranet/menu/menu-model.js') }}"></script>
    <script>
        $(document).ready(function() {
            const menuView = new MenuView(new MenuModel(csrf_token));
            menuView.listar();
            menuView.eventos();
        });
    </script>
@endsection
