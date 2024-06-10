
<!doctype html>
<html lang="en" dir="ltr" style="--primary-rgb: 166, 2, 7;">

<head>

    <meta charset="UTF-8">
    <meta name='viewport'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Extranet de OK Computer">
    <meta name="author" content="OK Computer E.I.R.L">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web/images/LOGO-extranet.png')}}">
    <title>EXTRANET - SESSIÓN</title>
    <link id="style" href="{{ asset('template/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('template/css/plugins.css')}}" rel="stylesheet">
    <link href="{{ asset('template/css/icons.css')}}" rel="stylesheet">

    <style>
        body{
            background-color: #fff !important;
        }
        .bg-extranet{
            /* background-image: @html_link_asset('web/images/portada_fondo.png'); */

            position: relative;
            background-image: url('web/images/portada_fondo.png');
            background-size: cover;
        }
    </style>
</head>

<body class="app sidebar-mini ltr login-img">
{{-- <body class=""> --}}
    <div class="">
        <div id="global-loader">
            <img src="{{ asset('template/images/loader.svg')}}" class="loader-img" alt="Loader">
        </div>
        <div class="page">
            <div class="">
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                            <div class="text-center">
                                <a href="#"><img src="{{ asset('web/images/LOGO-extranet.png')}}" class="header-brand-img" alt="" style=" width: 75px; "></a>
                            </div>
                            <span class="login100-form-title pb-5">
                            </span>
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <ul class="nav panel-tabs">
                                            <li class="mx-0"><a href="#tab5" class="active" data-bs-toggle="tab">INICIAR SESSIÓN</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
                                            <form method="POST" action="">
                                                @csrf
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 form-control ms-0" type="email" name="email" required placeholder="Email"style="font-size: 12px; padding-right: 5px; padding-left: 5px;">
                                                </div>
                                                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 form-control ms-0" type="password" name="password" required placeholder="Password" style="font-size: 12px; padding-right: 5px; padding-left: 5px;">
                                                </div>
                                                <div class="text-end pt-4">
                                                </div>
                                                <div class="container-login100-form-btn">
                                                    <button type="submit" class="login100-form-btn btn-primary mb-3"> Ingresar</button>
                                                    <a class="login100-form-btn btn text-dark" href="#">
                                                        <i class="fa fa-windows text-dark"></i>&nbsp;&nbsp;
                                                        Corporativo
                                                    </a>
                                                </div>
                                            </form>
                                            <div class="text-center pt-3">
                                            </div>
                                            <label class="login-social-icon"><span>Redes Sociales</span></label>
                                            <div class="d-flex justify-content-center">
                                                <a href="https://www.linkedin.com/company/33517122/admin/" target="_blank">
                                                    <div class="social-login me-4 text-center">
                                                        <i class="fa fa-linkedin"></i>
                                                    </div>
                                                </a>
                                                <a href="https://www.facebook.com/photo/?fbid=639150544904431&set=a.192012436284913" target="_blank">
                                                    <div class="social-login me-4 text-center">
                                                        <i class="fa fa-facebook"></i>
                                                    </div>
                                                </a>
                                                <a href="https://www.instagram.com/okcomputerperu/" target="_blank">
                                                    <div class="social-login text-center">
                                                        <i class="fa fa-instagram"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <div id="mobile-num" class="wrap-input100 validate-input input-group mb-4">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <span>+91</span>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0">
                                            </div>
                                            <div id="login-otp" class="justify-content-around mb-5">
                                                <input class="form-control text-center w-15" id="txt1" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt2" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt3" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt4" maxlength="1">
                                            </div>
                                            <span>Note : Login with registered mobile number to generate OTP.</span>
                                            <div class="container-login100-form-btn ">
                                                <a href="javascript:void(0)" class="login100-form-btn btn-primary" id="generate-otp">
                                                    Proceed
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="">

        <div class="row align-self-stretch">
            <div class="col-md-8 text-center bg-extranet">
                <img src="{{ asset('web/images/portada_diseño.png') }}" alt="" style="width: 35%;">
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="d-flex flex-column">
                        <div class="p-2 text-center">
                            <a href="{{ route('web') }}">
                                <img src="{{ asset('web/images/LOGO-extranet.png')}}" class="header-brand-img" alt="" style=" width: 75px; ">
                            </a>
                        </div>
                        <div class="p-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fe fe-user"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fe fe-lock"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <script src="{{ asset('template/js/jquery.min.js')}}"></script>
    <script src="{{ asset('template/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('template/js/show-password.min.js')}}"></script>
    <script src="{{ asset('template/js/generate-otp.js')}}"></script>
    <script src="{{ asset('template/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('template/js/themeColors.js')}}"></script>
    <script src="{{ asset('template/js/custom.js')}}"></script>
    <script src="{{ asset('template/js/custom-swicher.js')}}"></script>
    <script src="{{ asset('template/switcher/js/switcher.js')}}"></script>

</body>

</html>
