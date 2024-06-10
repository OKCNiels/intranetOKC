@extends('web.layouts.index')
@section('css')
<style>
@import url("https://fonts.googleapis.com/css2?family=Oswald:wght@200;600&display=swap");
/* body {
  font-family: "Oswald", sans-serif;
  background-color: #212121;
} */
body #card-software {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
}
body #card-software .row {
  align-items: center;
  height: 130vh;
}

/* .card {
  position: relative;
  height: 400px;
  width: 100%;
  margin: 10px 0;
  transition: ease all 2.3s;
  perspective: 1200px;
} */
.card {
  position: relative;
  height: 220px;
  /* width: 50%; */
  /* margin: 10px 0; */
  transition: ease all 2.3s;
  perspective: 1200px;
}
.card:hover .cover {
  transform: rotateX(0deg) rotateY(-180deg);
}
.card:hover .cover:before {
  transform: translateZ(30px);
}
.card:hover .cover:after {
  /* background-color: black; */
  background-color: #fff;
}
.card:hover .cover h1 {
  transform: translateZ(100px);
}
.card:hover .cover .price {
  transform: translateZ(60px);
}
.card:hover .cover a {
  transform: translateZ(-60px) rotatey(-180deg);
}
.card .cover {
  position: absolute;
  height: 60%;
  width: 60%;
  transform-style: preserve-3d;
  transition: ease all 2.3s;
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
}
.card .cover:before {
  content: "";
  position: absolute;
  /* border: 5px solid rgba(255, 255, 255, 0.5); */
  /* box-shadow: 0 0 12px rgba(0, 0, 0, 0.3); */
  top: 20px;
  left: 20px;
  right: 20px;
  bottom: 20px;
  z-index: 2;
  transition: ease all 2.3s;
  transform-style: preserve-3d;
  transform: translateZ(0px);
}
.card .cover:after {
  content: "";
  position: absolute;
  top: 0px;
  left: 0px;
  right: 0px;
  bottom: 0px;
  z-index: 2;
  transition: ease all 1.3s;
  /* background: rgba(0, 0, 0, 0.4); */
  border-left-color: #fff !important;
}
.card .cover.item-mgc {
    background-image: url({{asset('web/images/mgc_logo.png')}});
    background-color: #fff;
    background-size: contain;
}
.card .cover.item-gerencial {
  /* background-image: url({{asset('web/images/logo-okc-icono.png')}});
  background-size: contain;
    background-color: #fff; */
    background-color: #fff;
    border-width: 0px .1px 0px 0px;
    border-style: solid;
    border-color: white;
}
.card .cover.item-gerencial::before {
    content: "\e940";
    font-size: 4.05rem;
    color: #656585;
    font-family: feather!important;
    background-color: #fff
}
.card .cover.item-agil {
  /* background-image: url({{asset('web/images/logo-okc-icono.png')}});
  background-color: #fff;
  background-size: contain; */
  background-color: #fff;
    border-width: 0px .1px 0px 0px;
    border-style: solid;
    border-color: white;

}
.card .cover.item-agil::before {
    content: "\e940";
    font-size: 4.05rem;
    color: #656585;
    font-family: feather!important;
    background-color: #fff
}
.card .cover h1 {
  font-weight: 600;
  position: absolute;
  bottom: 55px;
  left: 50px;
  color: white;
  transform-style: preserve-3d;
  transition: ease all 2.3s;
  z-index: 3;
  font-size: 3em;
  transform: translateZ(0px);
}
.card .cover .price {
  font-weight: 200;
  position: absolute;
  top: 100px;
  /* right: 50px; */
  color: #0b0f08;
  transform-style: preserve-3d;
  transition: ease all 2.3s;
  z-index: 4;
  font-size: .85em;
  transform: translateZ(0px);
}
.card .card-back {
  position: absolute;
  height: 100%;
  width: 100%;
  background: #0b0f08;
  transform-style: preserve-3d;
  transition: ease all 2.3s;
  transform: translateZ(-1px);
  display: flex;
  align-items: center;
  justify-content: center;
  border-left-color: #fff !important;
}
.card .card-back a {
  transform-style: preserve-3d;
  transition: ease transform 2.3s, ease background 0.5s;
  transform: translateZ(-1px) rotatey(-180deg);
  background: transparent;
  border: 1px solid white;
  font-weight: 200;
  /* font-size: 1.3em; */
  color: white;
  padding: 4px 10px;
  outline: none;
  text-decoration: none;
}
.card .card-back a:hover {
  background-color: white;
  color: #0b0f08;
}
</style>
@endsection
@section('page-title')
<div class="demo-screen-headline main-demo main-demo-1 spacing-top reveal"></div>

    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="d-flex flex-column ">
                        <div class="p-2">
                            <h2>Aplicaciones</h2>
                        </div>
                        <div class="p-2 align-self-center">
                            <ol class="breadcrumb">
                                <li><a href="{{route('web')}}">Home</a></li>
                                <li>Aplicaciones</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@section('content')

    <section class="blog-with-sidebar section-padding">
        <div class="container">
            <div class="row" id="card-software">
                {{-- <div class="col-md-12 mb-5">
                    <div class="row"> --}}
                        <div class="col-md-2 me-5">
                            <div class="card">
                                <div class="cover item-mgc">
                                    {{-- <h1 class="text-dark">MGC</h1> --}}
                                    {{-- <span class="price">MGC</span> --}}
                                    <div class="card-back">
                                        <a href="https://mgcp.okccloud.com/login">Ingresar</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 ms-5 me-3">
                            <div class="card">
                                <div class="cover item-gerencial">
                                    {{-- <h1  class="text-dark">Gerencial</h1> --}}
                                    <span class="price">Gerencial</span>
                                    <div class="card-back">
                                        {{-- <i class="fe fe-codepen"></i> --}}
                                        <a href="https://gerencial.okccloud.com/">Ingresar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 ms-5 me-3">
                            <div class="card">
                                <div class="cover item-agil">
                                    {{-- <h1 class="text-dark">Agil</h1> --}}
                                    <span class="price">Agil</span>
                                    <div class="card-back">
                                        <a href="https://erp.okccloud.com/login">Ingresar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 ms-5 me-3">
                            <div class="card">
                                <div class="cover item-agil">
                                    {{-- <h1 class="text-dark">Agil</h1> --}}
                                    <span class="price">Requerimientos</span>
                                    <div class="card-back">
                                        <a href="https://requerimientos.okccloud.com/">Ingresar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 ms-5">
                            <div class="card">
                                <div class="cover item-agil">
                                    {{-- <h1 class="text-dark">Agil</h1> --}}
                                    <span class="price">R.R.H.H.</span>
                                    <div class="card-back">
                                        <a href="https://rrhh.okccloud.com/">Ingresar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
