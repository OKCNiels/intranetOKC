@extends('web.layouts.index')
@section('page-title')
<div class="demo-screen-headline main-demo main-demo-1 spacing-top reveal"></div>
    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="d-flex flex-column ">
                        <div class="p-2">
                            <h2>Politicas</h2>
                        </div>
                        <div class="p-2 align-self-center">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{route('web')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{route('politicas')}}">Politicas</a>
                                </li>
                                <li>{{$politica->titulo}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')


    {{-- <section class="blog-single-main-content section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-12 col-sm-12 blog-single-content">
                    <div class="post">
                        <div class="media">
                            <div class="" style="
                                    background-image: url('{{ asset('web/assets/images/features').'/'.$politica->imagen }}');
                                    background-size: contain;
                                    background-position: center;
                                    background-repeat: no-repeat;
                                    background-color: white;
                                    height: 320px;
                                    width: 100%;
                            ">
                        </div>
                        <br>
                        <div class="post-title-meta">
                            <h2>{{$politica->titulo}}</h2>
                        </div>
                        <div class="post-body">
                            <p>{{$politica->descripcion}}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section> --}}

    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <img class="card-img-top " src="{{ asset('web/assets/images/features').'/'.$politica->imagen }}" alt="Card image cap">
                <div class="card-body">
                    {{-- <div class="d-md-flex">
                        <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i class="fe fe-calendar fs-16 me-1 p-3 bg-secondary-transparent text-secondary bradius"></i>
                            <div class="mt-0 mt-3 ms-1 text-muted font-weight-semibold">Sep-25-2021</div>
                        </a>
                        <a href="profile.html" class="d-flex mb-2"><i class="fe fe-user fs-16 me-1 p-3 bg-primary-transparent text-primary bradius"></i>
                            <div class="mt-0 mt-3 ms-1 text-muted font-weight-semibold">Harry Fisher</div>
                        </a>
                        <div class="ms-auto">
                            <a href="javascript:void(0);" class="d-flex mb-2"><i class="fe fe-message-square fs-16 me-1 p-3 bg-success-transparent text-success bradius"></i>
                                <div class="mt-0 mt-3 ms-1 text-muted font-weight-semibold">13 Comments</div>
                            </a>
                        </div>
                    </div> --}}
                </div>
                <div class="card-body">
                    <h3><a href="javascript:void(0)"> {{$politica->titulo}}</a></h3>
                    <p class="card-text">{{$politica->descripcion}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
