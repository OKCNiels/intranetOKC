@extends('web.layouts.index')
@section('page-title')
<div class="demo-screen-headline main-demo main-demo-1 spacing-top reveal"></div>
    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{-- <h2>Empresa</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('web')}}">Home</a></li>
                        <li>Empresa</li>
                    </ol> --}}

                    <div class="d-flex flex-column ">
                        <div class="p-2">
                            <h2>Empresa</h2>
                        </div>
                        <div class="p-2 align-self-center">
                            <ol class="breadcrumb">
                                <li><a href="{{route('web')}}">Home</a></li>
                                <li>Empresa</li>
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


    <!-- start about-us-section -->
    <section class="about-us-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-6">
                    <div class="about-text">
                        <h2>MENSAJEDE NUESTRO <span>GERENTE GENERAL</span></h2>
                        <p>Primeramente, agradecerles el esfuerzo conjunto
                            desarrollado con el paso de los años que ha
                            permitido a OK COMPUTER E.l.R.L. se posicione como
                            una empresa lder en tecnología enfocado en nuestras
                            ventas y proyectos adjudicados a este empresa.</p>
                        <p>Somos una empresa comprometida a gestionar su
                            negocio con los más altos niveles de ética e
                            integridad y, basándonos en este compromiso,
                            hemos implementado el presente Código de Conducta que detalla específicamente las
                            conductas que se esperan de nuestros colaboradores y otras partes interesadas al
                            momento de enfrentar diferentes situaciones.</p>

                        <p>Hoy sabemos que se vienen retos aún más desafiantes para tener un liderazgo
                            sostenido y consolidado, y que la forma cómo alcanzamos nuestras metas es muy
                            importante. Por ello, debemos actuar siempre sobre la base firme de nuestros
                            valores corporativos y exigencias éticas en cada una de nuestras actividades
                            diarias, dentro y fuera de la oficina.
                            </p>
                    </div>
                    {{-- <div class="skill-progress-bar">
                        <div class="skills">
                            <div class="skill">
                                <h6>Hostings</h6>
                                <div class="progress">
                                    <div class="progress-bar" data-percent="85"></div>
                                </div>
                            </div>
                            <div class="skill">
                                <h6>Domains</h6>
                                <div class="progress">
                                    <div class="progress-bar" data-percent="98"></div>
                                </div>
                            </div>
                            <div class="skill">
                                <h6>Others</h6>
                                <div class="progress">
                                    <div class="progress-bar" data-percent="92"></div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col col-md-5 col-md-offset-1">
                    <div class="img-holder" style="background-image: url({{asset('web/images/gerente-general.jpeg')}});background-size: cover;">
                        {{-- <img src="{{asset('web/assets/images/jefe.png')}}" alt> --}}
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end about-us-section -->

    <section class="testimonials-section testimonials-section-full section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-8 col-md-offset-2">
                    <div class="section-title-s4">
                        <h2> <span>MISIÓN, VISIÓN Y VALORES</span></h2>
                        <p>Nuestra misión, visión y valores se definen de la siguiente manera.</p>
                    </div>
                </div>
            </div>

            <div class="row testimonials-grids">
                <div class="col col-md-4 col-sm-6">
                    <div class="grid overflow-y">
                        <div class="client-quote border-bottom-0">
                            <h3>Misión de Ok Computer E.I.R.L.</h3>
                            <p>“Ser una organización en constante transformación, enfocada en la sostenibilidad de nuestro
                                crecimiento y participación en el mercado, mejorando la calidad de las soluciones
                                proporcionadas a nuestros clientes, dentro de un ecosistema empresarial sostenible.”</p>
                        </div>
                        {{-- <div class="client-info">
                            <div class="client-pic">
                                <img src="assets/images/testimonials/img-1.jpg" alt>
                            </div>
                            <div class="client-details">
                                <h4>John Olliver</h4>
                                <span>CTO, Hostgator</span>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col col-md-4 col-sm-6">
                    <div class="grid overflow-y">
                        <div class="client-quote border-bottom-0">
                            <h3>Visión de Ok Computer E.I.R.L.</h3>
                            <p>“Nuestra visión, es ser un referente en el mercado nacional de comercialización de equipos
                                informáticos y ejecución de proyectos tecnológicos con un elevado valor añadido en
                                innovación y calidad, desarrollando talentos y habilidades en un excelente ambiente laboral,
                                motivados por buscar y satisfacer continuamente las necesidades de nuestros clientes,
                                contribuyendo con responsabilidad social y cuidado del medio ambiente.” </p>
                        </div>
                        {{-- <div class="client-info">
                            <div class="client-pic">
                                <img src="assets/images/testimonials/img-2.jpg" alt>
                            </div>
                            <div class="client-details">
                                <h4>Lara Zarsson</h4>
                                <span>CTO, Hostgator</span>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col col-md-4 col-sm-6">
                    <div class="grid overflow-y">
                        <div class="client-quote border-bottom-0">
                            <h3>Valores de Ok Computer E.I:R.L. </h3>
                            <ul class="list-check list-style">
                                <li class="check">“Nos sentimos identificados con nuestra organización y a la vez respetamos la identidad de las personas como valor esencial de la compañía.”</li>
                                <li class="check">“Somos innovadores, lo que nos hace diferentes, ser diferentes nos hace sentirnos importantes, ser importantes nos hace indispensables para nuestros clientes.”</li>
                                <li class="check">“Somos íntegros tanto dentro, como fuera de la organización, siendo respetuosos, sinceros, honestos y mejores personas cada día.”</li>
                                <li class="check">“Somos apasionados en lo que hacemos, y esta pasión decanta en el cumplimiento de los objetivos de la compañía, la calidad ofrecida a nuestros clientes, y el crecimiento personal de cada uno de nuestros colaboradores.”</li>
                            </ul>
                        </div>
                        {{-- <div class="client-info">
                            <div class="client-pic">
                                <img src="assets/images/testimonials/img-3.jpg" alt>
                            </div>
                            <div class="client-details">
                                <h4>Maria Anatoli</h4>
                                <span>CTO, Hostgator</span>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
@endsection
