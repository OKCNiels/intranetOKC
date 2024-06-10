@extends('web.layouts.index')
@section('css')
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/evo-calendar/css/evo-calendar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/evo-calendar/css/evo-calendar.royal-navy.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/assets/css/calendario.css') }}">

@endsection
@section('page-title')
<section class="hero hero-style-3 demo-screen-headline main-demo main-demo-1 spacing-top reveal" id="home">
    <div class="container">
        <div class="inner">
            <p>La comunicación es el motor del cambio.</p>
            <div id="typed-strings">
                <p class="gl-hero-text-paragraph"> a la Extranet de OK Computer!. </p>
            </div>
            <h2>Bienvenidos <span class="gl-hero-text-paragraph gl-color-text" id="gl-slogan"></span></h2>
            <a href="{{route('login')}}" class="theme-btn btn-okc-extranet">Ingresar</a>
        </div>
        <div class="rocket-man">
            <img src="{{ asset('web/assets/images/rocket-man.png') }}" alt>
        </div>
    </div>
    <div class="cloud-section">
        <div class="cloud-1">
            <img src="{{ asset('web/assets/images/cloud-1.png') }}" alt>
        </div>
        <div class="cloud-2">
            <img src="{{ asset('web/assets/images/cloud-2.png') }}" alt>
        </div>
        <div class="cloud-3">
            <img src="{{ asset('web/assets/images/cloud-3.png') }}" alt>
        </div>
    </div>
</section>
@endsection
@section('content')

    @include('web.calendario-eventos')
    <section class="cta-3 section-padding reveal revealrotate ">
        <div class="container">
            <div class="row">
                <div class="col col-md-6 ">
                    <div class="img-holder">
                        <img src="{{ asset('template/images/cta-3-mac.png') }}" alt>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cta-text">
                        <h2>INTRODUCCIÓN</h2>
                        <p>En Ok Computer estamos comprometidos en el desarrollo integral de nuestra empresa y todos sus colaboradores, a través de las buenas prácticas y conociendo los derechos y obligaciones de ambas partes. Es por eso que ponemos a disposición el presente Manual del Empleado</p>
                        <a href="{{route('manual')}}" target="_blank" class="theme-btn-s3">Mas detalle</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    @if(session()->has('success'))
        <script>
            Swal.fire(
                'Alerta',
                '{!!session()->get('success')!!}',
                'warning'
            )
        </script>
    @endif
    <script src="{{ asset('template/plugins/evo-calendar/js/evo-calendar.min.js') }}"></script>
    <script>
        sessionWindows.calendario();
    </script>
@endsection
