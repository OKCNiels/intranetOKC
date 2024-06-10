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
                                <li><a href="{{route('web')}}">Home</a></li>
                                <li>Politicas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->
@endsection
@section('content')

    <section class="blog-with-sidebar section-padding">
        <div class="container">
            @if (sizeof($politicas)>0)
            <div class="row">

                @foreach ($politicas as $item)
                <div class="col-md-4">
                    <a href="{{ route('politica', ['id'=>$item->id]) }}">
                        <div class="card overflow-hidden">
                            <div class="" style="
                                    background-image: url('{{ asset('web/assets/images/features').'/'.$item->imagen }}');
                                    background-size: contain;
                                    background-position: center;
                                    background-repeat: no-repeat;
                                    background-color: white;
                                    height: 200px;
                                    width: 100%;
                            ">
                            </div>
                            <div class="card-body ">
                                <h5 class="card-title">{{$item->titulo}}</h5>
                                <p class="card-text overflow-politicas-y">{{$item->descripcion_corta}}</p>
                            </div>
                        </div>

                        {{-- <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="" style="
                                    background-image: url('{{ asset('web/assets/images/features').'/'.$item->imagen }}');
                                    background-size: contain;
                                    background-position: center;
                                    background-repeat: no-repeat;
                                    background-color: white;
                                    height: 200px;
                                    width: 100%;
                                ">
                                </div>
                                <div class="overflow-politicas-y">
                                    <h4>{{$item->titulo}}</h4>
                                    <p>{{$item->descripcion_corta}}</p>
                                </div>

                            </div>
                        </div> --}}
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ $politicas->links() }}
                </div>
            </div>
            @endif

        </div>
    </section>
@endsection
