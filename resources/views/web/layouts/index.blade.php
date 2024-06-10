<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Intranet de OK Computer">
    <meta name="author" content="OK Computer E.I.R.L">
    <meta name="keywords" content="TEMPLATE DE ADMINISTRACIÓN">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web/images/LOGO-extranet.png') }}">

    <!-- TITLE -->
    <title>OK COMPUTER EXTRANET</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('template/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- STYLE CSS -->
     <link href="{{ asset('template/css/style-intranet.css') }}" rel="stylesheet">

	<!-- Plugins CSS -->
    <link href="{{ asset('template/css/plugins.css') }}" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('template/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- INTERNAL Switcher css -->
    {{-- <link href="{{ asset('template/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('template/switcher/demo.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('template/switcher/v-5.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/extranet.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body class="app ltr landing-page horizontal">
    <div id="global-loader">
        <img src="{{ asset('template/images/loader.svg') }}"" class="loader-img" alt="Loader">
    </div>
    <div class="page">
        <div class="page-main">
            {{-- @include('web.layouts.menu') --}}
            <div class="hor-header header">
                <div class="container main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle text-danger" data-bs-toggle="sidebar"
                            href="javascript:void(0)"></a>
                        <a class="logo-horizontal " href="{{ route('web') }}">
                            <img src="{{ asset('web/images/LOGO-extranet.png') }}" class="header-brand-img desktop-logo" alt="logo" style=" width: 80px; ">
                            <img src="{{ asset('web/images/LOGO-extranet.png') }}" class="header-brand-img light-logo1" style=" width: 80px; "
                                alt="logo">
                        </a>
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical text-danger"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse bg-white px-0" id="navbarSupportedContent-4">
                                    <!-- SEARCH -->
                                    <div class="header-nav-right p-5">
                                        {{-- <a href="register.html" class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto"
                                            target="_blank">New User
                                        </a> --}}
                                        <a href="{{ route('login') }}" class="btn ripple btn-min w-sm btn-okc-extranet me-2 my-auto"
                                            target="_blank">Ingresar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="landing-top-header overflow-hidden {{(Route::currentRouteName()==='web'?'':'bg-okc-white')}} ">
                @include('web.layouts.menu')


                @yield('page-title')

            </div>


            <div class="main-content mt-0">
                <div class="side-app">
                    <div class="main-container">
                        <div class="">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('web.layouts.footer')
    </div>

    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <script src="{{ asset('template/js/jquery.min.js') }}"></script>

    <script src="{{ asset('template/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('template/plugins/counters/counterup.min.js') }}"></script>
    <script src="{{ asset('template/plugins/counters/waypoints.min.js') }}"></script>
    <script src="{{ asset('template/plugins/counters/counters-1.js') }}"></script>

    <script src="{{ asset('template/plugins/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('template/plugins/company-slider/slider.js') }}"></script>

    <script src="{{ asset('template/plugins/rating/jquery-rate-picker.js') }}"></script>
    <script src="{{ asset('template/plugins/rating/rating-picker.js') }}"></script>

    <script src="{{ asset('template/plugins/ratings-2/jquery.star-rating.js') }}"></script>
    <script src="{{ asset('template/plugins/ratings-2/star-rating.js') }}"></script>

    <script src="{{ asset('template/js/sticky.js') }}"></script>

    <script src="{{ asset('template/js/landing.js') }}"></script>
    <script src="{{ asset('template/js/escrito-maquina.js') }}"></script>

    <script src="{{ asset('template/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        var csrf_token = '{{ csrf_token() }}';
    </script>
     @routes
     {{-- <script src="{{ asset('web/assets/js/jquery/jquery.min.js') }}"></script> --}}
     <script src="{{ asset('web/assets/js/web-view.js') }}"></script>
     <script src="{{ asset('web/assets/js/web-model.js') }}"></script>
     <script>
         const sessionWindows = new WebView(new WebModel(csrf_token));
        //  sessionWindows.sesionWindows();
     </script>
    @yield('scripts')
</body>

</html>
