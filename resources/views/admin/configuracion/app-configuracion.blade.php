@extends('admin.admin')
@section('titulo')Configuración @endsection
@section('content')
    <!-- PAGE-HEADER -->

    @yield('configuracion-header')
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <!-- Row -->
    <div class="row ">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="list-group list-group-transparent mb-0 file-manager file-manager-border">
                        <h4>General</h4>
                        <div>
                            <a href="{{ route('configuraciones.usuarios.lista') }}" class="list-group-item  d-flex align-items-center px-0 border-top">
                                <i class="fe fe-users fs-18 me-2 text-success p-2"></i>Usuarios
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('configuraciones.acciones.lista') }}" class="list-group-item  d-flex align-items-center px-0 border-top">
                                <i class="fe fe-sliders fs-18 me-2 text-danger p-2"></i>Acciones
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @yield('configuracion-contenido')
        </div>
    </div>
@endsection
@section('scripts')
@endsection
