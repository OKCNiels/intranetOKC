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
                <h3 class="card-title">{{$tipo}} Incidencia</h3>
            </div>
            <form action="" method="POST" id="guardar">
                @csrf
                <input type="hidden" value="{{$id}}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Responsable: <span class="text-red">*</span></label>
                                <input type="text" name="" class="form-control form-control-sm" value="{{Auth::user()->name}}" required>
                                <input type="hidden" name="responsable_id" value="{{Auth::user()->id_usuario}}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Fecha: <span class="text-red">*</span></label>
                                <input type="date" name="fecha" class="form-control form-control-sm" value="{{date('Y-m-d')}}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group select2-sm">
                                <label for="empresa_id" class="form-label">Empresas: <span class="text-red">*</span></label>
                                <select name="empresa_id" class="form-control form-select form-select-sm select2" required>
                                    <option value="" >Seleccione...</option>
                                    @foreach ($empresas as $key=>$value)
                                    <option value="{{$value->id_empresa}}">{{$value->codigo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group select2-sm">
                                <label for="exampleInputEmail1" class="form-label">Sede: <span class="text-red">*</span></label>
                                <select name="sede_id" class="form-control form-select form-select-sm select2" disabled required>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group select2-sm">
                                <label for="exampleInputEmail1" class="form-label">Grupo: <span class="text-red">*</span></label>
                                <select name="grupo_id" class="form-control form-select form-select-sm select2" required>
                                    <option value="">Seleccione...</option>
                                    @foreach ($grupos as $key=>$value)
                                    <option value="{{$value->id_grupo}}">{{$value->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group select2-sm">
                                <label for="division_id" class="form-label">Area/Division: <span class="text-red">*</span></label>
                                <select name="division_id" class="form-control form-select form-select-sm select2" disabled required>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Descripcion: <span class="text-red">*</span></label>
                                <textarea type="email" name="observacion" cols="30" rows="3" class="form-control form-control-sm"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <a href="{{ route('control.incidencias.lista') }}" class="btn btn-danger" ><i class="fa fa-arrow-circle-left"></i> Volver</a>
                            <button type="submit" class="btn btn-success" ><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
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
            $('.select2').select2({
                minimumResultsForSearch: Infinity,
                width: '100%'
            });
            const view = new IncidenciaView(new IncidenciaModel(csrf_token));
            view.listar();
            view.eventos();
        });
    </script>
@endsection
