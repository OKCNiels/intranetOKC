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
                    <h3 class="card-title">{{$tipo}}</h3>
                    {{-- <div class="card-options">
                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                        <a href="javascript:void(0)" class="card-options-remove" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div> --}}
                </div>
                <form action="" id="guardar">
                    @csrf
                    <input type="hidden" name="id" value="{{($modulo?$modulo->id:0)}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group  ">
                                    <label class="form-label">Url <span class="text-red">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text" id="basic-addon3">{{Request::root()}}</span>
                                        <input type="text" name="url" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="{{($modulo?$modulo->url:null)}}" placeholder="/nueva-ruta/inicio">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Nombre <span class="text-red">*</span></label>
                                    <input type="text" name="nombre" class="form-control form-control-sm" placeholder="Ingresa el nombre del modulo" value="{{($modulo?$modulo->nombre:null)}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group select2-sm">
                                    <label class="form-label">Modulos  <span class="text-red">*</span></label>
                                    <select name="padre_id" class="form-control form-select form-select-sm select2" required>
                                        <option value="0">Modulo principal</option>
                                        @foreach ($modulos_padre as $item)
                                        <option value="{{$item->id}}" {{($item->id===$modulo->padre_id?'selected':'')}}>{{$item->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Icono </label>
                                    <input type="text" name="icono" class="form-control form-control-sm" placeholder="Ingresa el icono del modulo" value="{{($modulo?$modulo->icono:null)}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="custom-switch form-switch mb-0">
                                        <input type="checkbox" name="visible" value="true" class="custom-switch-input" {{($modulo ?($modulo->visible===true?'checked':'') : 'checked')}} >
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Visble</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="custom-switch form-switch mb-0">
                                        <input type="checkbox" name="estado" value="true" class="custom-switch-input" {{($modulo ?($modulo->estado===true?'checked':'') : 'checked')}} >
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Estado</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Descripcion <span class="text-red">*</span></label>
                                        <textarea class="form-control mb-4" name="descripcion" placeholder="Descripcion del modulo" rows="8" required>{{($modulo?$modulo->descripcion:null)}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row mb-3">
                            <div class="p-2"><a class="btn btn-primary" href="{{ route('panel.configuraciones.menus.lista') }}" ><i class="fa fa-arrow-left"></i> Volver</a></div>
                            <div class="p-2 ms-auto"><button class="btn btn-primary" ><i class="fa fa-save"></i> Guardar</button></div>
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

    {{-- <script src="{{ asset('admin/js/Configuracion/modulos/modulo-view.js') }}"></script>
    <script src="{{ asset('admin/js/Configuracion/modulos/modulo-model.js') }}"></script>
    <script>
        $(document).ready(function() {
            const moduloView = new ModuloView(new ModuloModel(csrf_token));
            moduloView.eventos();
        });
    </script> --}}

<script src="{{ asset('admin/js/Intranet/menu/menu-view.js') }}"></script>
<script src="{{ asset('admin/js/Intranet/menu/menu-model.js') }}"></script>
<script>
    $(document).ready(function() {
        const menuView = new MenuView(new MenuModel(csrf_token));
        // menuView.listar();
        menuView.eventos();
    });
</script>
@endsection
