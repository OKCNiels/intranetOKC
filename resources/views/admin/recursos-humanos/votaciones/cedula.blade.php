@extends('admin.admin')

@section('titulo') Extranet - Cedula @endsection

@section('css')
<style>
    .img-candidato{
        width: 100px;
    }
    /* img.img-candidato {
        width: 100px;
    } */
    a.list-group-item > label.custom-control {
        cursor: pointer;
    }
    a.active {
        background-color: #007ea7 !important;
        border-color: rgba(232, 38, 70, 0.1) !important;
        color: #ffffff !important;
    }
</style>
@endsection


@section('content')
<div class="page-header">
    <h1 class="page-title">Cédula</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Recursos humanos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Votaciones</li>
            <li class="breadcrumb-item active" aria-current="page">Cédula</li>
        </ol>
    </div>
</div>
<div class="row justify-content-md-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('recursos-humanos.votaciones.votacion') }}" id="form-cedula">
                    @csrf
                    <input type="hidden" name="votacion_id" value="{{ $votaciones->id }}">
                    <div class="row">
                        <div class="col-md-12 text-center mb-5">
                            <h3>{{ $votaciones->nombre }}</h3>
                            <p>{{ $votaciones->descripcion }}</p>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-8">
                            <div class="list-group">
                                @foreach ($candidatos as $key => $item)
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <label class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="candidato" value="{{ $item->id_usuario }}">
                                            <span class="custom-control-label opacity-0"></span>

                                            <div class="d-flex flex-row mb-3 align-items-center">
                                                <div class="p-2 ">
                                                    {{-- <img src="{{asset('template/images/persona-candidato.png')}}" alt="thumb1" class=" img-candidato"> --}}
                                                    <img src="{{ asset('').$item->path }}" alt="thumb1" class=" img-candidato">

                                                </div>
                                                <div class="">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h5 class="mb-1 fw-bold">Candidato {{ $key + 1 }}</h5>

                                                        {{-- <small class="text-muted">3 days ago</small> --}}
                                                    </div>
                                                    <p class="mb-1">Número de Documento : {{ $item->nro_documento }}</p>
                                                    <p class="mb-1">Apellidos : {{ $item->apellido_paterno.' '.$item->apellido_materno }}</p>
                                                    <p class="mb-1">Nombres : {{ $item->nombres }}</p>
                                                </div>
                                            </div>

                                            {{-- <small class="text-muted">Donec id elit non mi porta.</small> --}}
                                        </label>
                                    </a>
                                @endforeach
                                <a href="javascript:void(0)" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="candidato" value="0">
                                        <span class="custom-control-label opacity-0"></span>
                                        <div class="d-flex flex-row mb-3 align-items-center">
                                            <div class="p-2 ">
                                                <img src="{{asset('template/images/users/7.jpg')}}" alt="thumb1" class=" img-candidato">

                                            </div>
                                            <div class="">
                                                <div class="d-flex w-100 justify-content-between">

                                                    {{-- <small class="text-muted">3 days ago</small> --}}
                                                </div>
                                                <p class="mb-1 fw-bold">Voto Nulo</p>
                                            </div>
                                        </div>

                                        {{-- <small class="text-muted">Donec id elit non mi porta.</small> --}}
                                    </label>
                                </a>


                            </div>
                        </div>

                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-8 text-center mt-4">
                            <button type="submit" class="btn btn-success w-lg"><i class="fa fa-send"></i> Enviar Voto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

    <script src="{{ asset('admin/js/extranet/votaciones/votacion-model.js') }}"></script>
    <script src="{{ asset('admin/js/extranet/votaciones/votacion-view.js') }}"></script>
    <script>
        $(document).ready(function() {
            const view = new VotacionView(new VotacionModel(csrf_token));
            // view.listar();
            view.eventos();
        });
    </script>
    @endsection
