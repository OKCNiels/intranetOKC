<div class="top sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar bg-transparent horizontal-main">
        <div class="container">
            <div class="row">
                <div class="main-sidemenu navbar px-0 pt-0">
                    <a class="navbar-brand ps-0 d-none d-lg-block" href="{{ route('web') }}">
                        <img alt="" class="logo-2" src="{{ asset('web/images/LOGO-extranet.png') }}" style=" width: 68px; ">
                        <img src="{{ asset('web/images/LOGO-extranet.png') }}" class="logo-3" alt="logo" style=" width: 68px; ">
                    </a>
                    <ul class="side-menu ms-auto {{(Route::currentRouteName()==='web'?'home':'')}} mt-3">
                        <li class="slide">
                            <a class="side-menu__item active" data-bs-toggle="slide" href="{{ route('empresa') }}"><span
                                    class="side-menu__label">Empresa</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('politicas') }}"><span
                                    class="side-menu__label">Politicas</span></a>
                        </li>
                        {{-- <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('aplicaciones') }}"><span
                                    class="side-menu__label">Aplicaciones</span></a>
                        </li> --}}
                    </ul>
                    <div class="header-nav-right d-none d-lg-flex mt-3">
                        {{-- <a href="register.html"
                            class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto d-lg-none d-xl-block d-block"
                            target="_blank">New User
                        </a> --}}
                        <a href="{{ route('login') }}" class="btn ripple btn-min w-sm btn-okc-extranet me-2 my-auto d-lg-none d-xl-block d-block"
                            target="_blank">Ingresar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
