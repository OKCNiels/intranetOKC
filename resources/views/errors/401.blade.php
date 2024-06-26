<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo-okc-icono.png') }}">

    <!-- TITLE -->
    <title>Sash – Bootstrap 5 Admin & Dashboard Template</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.') }}" rel="stylesheet">

    <!-- STYLE CSS -->
     <link href="{{ asset('assets/css/style.') }}" rel="stylesheet">

	<!-- Plugins CSS -->
    <link href="{{ asset('assets/css/plugins.') }}" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/css/icons.') }}" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="{{ asset('assets/switcher/css/switcher.') }}" rel="stylesheet">
    <link href="{{ asset('assets/switcher/demo.') }}" rel="stylesheet">

</head>

<body class="login-img">

    <!-- BACKGROUND-IMAGE -->
    <div class="">

        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- End GLOBAL-LOADER -->

        <!-- PAGE -->
        <div class="page">
            <!-- PAGE-CONTENT OPEN -->
            <div class="page-content error-page error2  text-white">
                <div class="container text-center">
                    <div class="error-template">
                        <h1 class="display-1 mb-2">4<span class="custom-emoji"><svg xmlns="http://www.w3.org/2000/svg" height="140" width="140" data-name="Layer 1" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" fill="#a2a1ff"/><path fill="#6563ff" d="M14.99951,17.0918a.99473.99473,0,0,1-.64209-.23438,3.766,3.766,0,0,0-4.71484,0,.99955.99955,0,1,1-1.28516-1.53125,5.81162,5.81162,0,0,1,7.28516,0,.99974.99974,0,0,1-.64307,1.76563Z"/><circle cx="15" cy="10" r="1" fill="#6563ff"/><circle cx="9" cy="10" r="1" fill="#6563ff"/></svg></span>1</h1>
                        <h5 class="error-details">
                            Sorry, an error has occured, Requested page not found!
                        </h5>
                        <div class="text-center">
                            <a class="btn btn-secondary mt-5 mb-5" href="{{ route('web') }}"> <i class="fa fa-long-arrow-left"></i> Back to Home </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PAGE-CONTENT OPEN CLOSED -->
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE -->

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Custom-switcher -->
    <script src="{{ asset('assets/js/custom-swicher.js') }}"></script>

    <!-- Switcher js -->
    <script src="{{ asset('assets/switcher/js/switcher.js') }}"></script>

</body>

</html>
