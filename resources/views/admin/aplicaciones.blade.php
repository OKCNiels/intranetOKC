@extends('admin.admin')
@section('titulo')Aplicaciones @endsection
@section('css')
<style>
    .floating {
        animation-name: floating;
        -webkit-animation: floating 1s infinite alternate;
        animation-duration: 3s;
        animation-iteration-count: infinite;
        animation-timing-function: ease-in-out;
        /* -webkit-animation: floating 2s infinite alternate;
        animation: floating 2s infinite alternate; */

    }

    @keyframes floating {
        0% { transform: translate(0,  0px); }
        50%  { transform: translate(0, 15px); }
        100%   { transform: translate(0, -0px); }
    }

    .flotar-contenido {
        animation: bobble 2s infinite;
    }
    @keyframes bobble {
        0% {
            transform: translateY(10px);
            }
        50% {
            transform: translateY(40px);
            }
        100% {
            transform: translateY(10px);
        }
    }
</style>
@endsection
@section('content')
     <!-- PAGE-HEADER -->
     <div class="page-header">
        <h1 class="page-title">Aplicaciones</h1>
        <div>
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Aplicaciones</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <!-- Row -->
    <div class="row ">
        <div class="col-md-2">
            <a href="https://mgc.solutionsokc.pe/login" target="_blank">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{asset('web/images/mgc_logo.png')}}" alt="">
                        {{-- <h6 class="mt-4 mb-2">Agil</h6>
                        <h2 class="mb-2 number-font">Agil</h2> --}}
                        <p class="text-muted">MGCP</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-2">
            <a href="https://erp.solutionsokc.pe/" target="_blank">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{asset('web/images/AGILE-icono.png')}}" alt="">
                        {{-- <h6 class="mt-4 mb-2">Agil</h6>
                        <h2 class="mb-2 number-font">Agil</h2> --}}
                        <p class="text-muted">Agil</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-2">
            <a href="https://gerencial.solutionsokc.pe/" target="_blank">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{asset('web/images/GERENCIA-icono.png')}}" alt="">
                        {{-- <h6 class="mt-4 mb-2">Agil</h6>
                        <h2 class="mb-2 number-font">Agil</h2> --}}
                        <p class="text-muted">Gerencia</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-2">
            <a href="https://rrhh.okccloud.com/" target="_blank">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{asset('web/images/RRHH-icono.png')}}" alt="">
                        {{-- <h6 class="mt-4 mb-2">Agil</h6>
                        <h2 class="mb-2 number-font">Agil</h2> --}}
                        <p class="text-muted">RRHH</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="https://requerimiento.solutionsokc.pe/" target="_blank">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{asset('web/images/REQUERIMIENTOS-icono.png')}}" alt="" style="width: 55px;">
                        {{-- <h6 class="mt-4 mb-2">Agil</h6>
                        <h2 class="mb-2 number-font">Agil</h2> --}}
                        <p class="text-muted">Requerimiento</p>
                        <p  class="text-muted">Consultas hasta el 2021</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $('.card').hover(
            function() {
                $(this).addClass('flotar-contenido');
            }, function() {
                $(this).removeClass('flotar-contenido');
            }
        );
    </script>
@endsection
