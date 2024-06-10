<!doctype html>
<html lang="en" dir="ltr" style="--primary-rgb: 166, 2, 7;">

<head>

    <meta charset="UTF-8">
    <meta name='viewport'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Extranet de OK Computer">
    <meta name="author" content="OK Computer E.I.R.L">
    <meta name="keywords" content="TEMPLATE DE ADMINISTRACIÓN">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web/images/LOGO-extranet.png') }}">

    <title>@yield('titulo')</title>
    <link id="style" href="{{ asset('template/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style-intranet.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/icons.css') }}" rel="stylesheet">

    <link href="{{ asset('template/plugins/lobibox/dist/css/lobibox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/basic.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body class="app sidebar-mini ltr light-mode">

    <div id="global-loader">
        {{-- <img src="{{ asset('template/images/loader.svg') }}" class="loader-img" alt="Loader"> --}}
        <div class="dimmer active loader-img">
            <div class="spinner"></div>
        </div>
    </div>

    <div class="page">
        <div class="page-main">

            @include('admin.layouts.app-header')

            @include('admin.layouts.app-sidebar')

            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <div class="main-container container-fluid">

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        @include('admin.layouts.app-sidebar-right')
        <div class="modal fade" id="country-selector">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content country-select-modal">
                    <div class="modal-header">
                        <h6 class="modal-title">Choose Country</h6><button aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <ul class="row p-3">
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block active">
                                    <span class="country-selector"><img alt="" src="{{ asset('template/images/flags-img/us_flag.jpg') }}"
                                            class="me-3 language"></span>USA
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="{{ asset('template/images/flags-img/italy_flag.jpg') }}"
                                        class="me-3 language"></span>Italy
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="{{ asset('template/images/flags-img/spain_flag.jpg') }}"
                                        class="me-3 language"></span>Spain
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="{{ asset('template/images/flags-img/india_flag.jpg') }}"
                                        class="me-3 language"></span>India
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="{{ asset('template/images/flags-img/french_flag.jpg') }}"
                                        class="me-3 language"></span>French
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="{{ asset('template/images/flags-img/russia_flag.jpg') }}"
                                        class="me-3 language"></span>Russia
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="{{ asset('template/images/flags-img/germany_flag.jpg') }}"
                                        class="me-3 language"></span>Germany
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="{{ asset('template/images/flags-img/argentina.jpg') }}"
                                        class="me-3 language"></span>Argentina
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="" src="{{ asset('template/images/flags-img/malaysia.jpg') }}"
                                        class="me-3 language"></span>Malaysia
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="" src="{{ asset('template/images/flags-img/turkey.jpg') }}"
                                        class="me-3 language"></span>Turkey
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>

    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <script src="{{ asset('template/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('template/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('template/plugins/sidemenu/sidemenu.js') }}"></script>
    <script src="{{ asset('template/js/themeColors.js') }}"></script>
    <script src="{{ asset('template/js/sticky.js') }}"></script>
    <script src="{{ asset('template/js/custom.js') }}"></script>
    <script src="{{ asset('template/plugins/lobibox/dist/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('template/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('template/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jquery-number/jquery.number.min.js') }}"></script>
    <script src="{{ asset('template/js/util.js') }}"></script>

	{{-- <script src="{{ asset('template/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('template/js/typehead.js') }}"></script> --}}

    {{-- <script src="{{ asset('template/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('template/js/sweet-alert.js') }}"></script> --}}

	{{-- <script src="{{ asset('template/plugins/select2/select2.full.min.js') }}"></script>
	<script src="{{ asset('template/js/select2.js') }}"></script> --}}

    {{-- <script src="{{ asset('template/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('template/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('template/plugins/p-scroll/pscroll-1.js') }}"></script> --}}

    {{-- <script src="{{ asset('template/plugins/sidemenu/sidemenu-intranet.js') }}"></script>

    <script src="{{ asset('template/plugins/sidebar/sidebar.js') }}"></script>

    <script src="{{ asset('template/js/themeColors.js') }}"></script>

    <script src="{{ asset('template/js/sticky.js') }}"></script>

    <script src="{{ asset('template/js/custom.js') }}"></script>

    <script src="{{ asset('template/js/custom-swicher.js') }}"></script>

    <script src="{{ asset('template/switcher/js/switcher.js') }}"></script> --}}

    <script src="{{ asset('admin/js/intranet-view.js') }}"></script>
    <script src="{{ asset('admin/js/intranet-model.js') }}"></script>
    <script src="{{ asset('admin/js/eventos.js') }}"></script>
    @routes
    <script>
        var csrf_token = '{{ csrf_token() }}';
        const idioma = {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate":
            {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria":
            {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        };

        const intranetView = new IntranetView(new IntranetModel(csrf_token));
        intranetView.renderizarModulos();
    </script>
    @yield('scripts')

</body>

</html>
