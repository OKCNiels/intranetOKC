<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('dashboard') }}">
                <img src="{{ asset('web/images/LOGO-extranet.png') }}" class="header-brand-img desktop-logo" alt="logo" style="width: 70px;">
                <img src="{{ asset('web/images/LOGO-extranet.png') }}" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ asset('web/images/LOGO-extranet.png') }}" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('web/images/LOGO-extranet.png') }}" class="header-brand-img light-logo1"
                    alt="logo" style="width: 70px;">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu" data-main="side-menu">
            <div class="slide-left disabled" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('dashboard') }}"><i
                        class="side-menu__icon fe fe-home"></i><span
                        class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                <li class="sub-category">
                    <h3>UI Kit</h3>
                </li>
                <li>
                    <a class="side-menu__item has-link" href="{{route('aplicaciones')}}"><i
                        class="side-menu__icon fe fe-zap"></i><span
                        class="side-menu__label">Aplicaciones</span>
                    </a>
                </li>
                <li class="sub-category">
                    <h3>RECURSOS HUMANOS</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-layers"></i>
                        <span class="side-menu__label">Solicitudes</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li><a href="{{ route('recursos-humanos.permisos.index') }}" class="slide-item"> Permisos</a></li>
                                            <li><a href="{{ route('recursos-humanos.cupones.index') }}" class="slide-item"> Cupones</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('recursos-humanos.votaciones.lista') }}">
                        <i class="side-menu__icon fe fe-list"></i>
                        <span class="side-menu__label">Votaciones</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-layers"></i>
                        <span class="side-menu__label">Vacaciones</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li><a href="{{ route('recursos-humanos.vacaciones.calendario') }}" class="slide-item"> Calendario</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="sub-category">
                    <h3>CONTROL DE GUIAS DE REMISION</h3>
                </li>

                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('control.guias.index') }}">
                        <i class="side-menu__icon fe fe-file-text"></i>
                        <span class="side-menu__label">Guías de Remisión</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('control.incidencias.lista') }}">
                        <i class="side-menu__icon fe fe-file-text"></i>
                        <span class="side-menu__label">Incidencias</span>
                    </a>
                </li>
                {{-- @foreach ($modulos_padre as $item)
                    @if (!empty($item->target))
                    <li>
                        <a class="side-menu__item has-link" href="{{$item->url}}" target="{{$item->target}}"><i
                            class="side-menu__icon {{$item->icono}}"></i><span
                            class="side-menu__label">{{$item->nombre}}</span><span class="badge bg-green br-5 side-badge blink-text pb-1">ver</span>
                        </a>
                    </li>
                    @endif
                    <li class="slide">
                        @if (empty($item->target))
                            <a class="side-menu__item {{$item->hijos}}" data-bs-toggle="slide" href="javascript:void(0)"><i
                                    class="side-menu__icon {{$item->icono}}"></i><span
                                    class="side-menu__label"> {{$item->nombre}}</span><i
                                    class="angle fe fe-chevron-right"></i>
                            </a>
                            <ul class="slide-menu mega-slide-menu">
                                <li class="panel sidetab-menu">
                                    <div class="panel-body tabs-menu-body p-0 border-0">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="side5">
                                                <ul class="sidemenu-list mega-menu-list">
                                                    <li class="side-menu-label1"><a href="javascript:void(0)"> {{$item->nombre}}</a></li>
                                                    @foreach ($modulos_hijos as $item_hijo)
                                                        @if ($item->id === $item_hijo->padre_id)
                                                            <li><a href="{{$item_hijo->url}}" class="slide-item"> {{$item_hijo->nombre}}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        @else

                        @endif


                    </li>
                @endforeach --}}
                {{-- <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-package"></i><span
                            class="side-menu__label">Configuraciones</span><i
                            class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu mega-slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side5">
                                        <ul class="sidemenu-list mega-menu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Configuraciones</a></li>
                                            <li><a href="{{ route('configuraciones.modulos.lista') }}" class="slide-item"> Modulos</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-slack"></i><span
                            class="side-menu__label">Solicitudes</span><i
                            class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="tab-menu-heading p-0 pb-2 border-0">
                                <div class="tabs-menu ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li><a href="#side1" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
                                        <li><a href="#side2" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Solicitudes</a></li>
                                            <li><a href="cards.html" class="slide-item"> Cards design</a></li>
                                            <li><a href="cards.html" class="slide-item"> Vacaciones</a></li>
                                            <li><a href="cards.html" class="slide-item"> Dias libres</a></li>
                                            <li><a href="cards.html" class="slide-item"> Adelanto de pago</a></li>
                                            <li><a href="cards.html" class="slide-item"> Prestamos</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-package"></i><span
                            class="side-menu__label">Publicidad</span><i
                            class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu mega-slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="tab-menu-heading p-0 pb-2 border-0">
                                <div class="tabs-menu ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li><a href="#side5" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
                                        <li><a href="#side6" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side5">
                                        <ul class="sidemenu-list mega-menu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Publicidad</a></li>
                                            <li><a href="{{ route('publicidad.calendario.inicio') }}" class="slide-item"> Calendario</a></li>
                                            <li><a href="buttons.html" class="slide-item"> Dias libres</a></li>
                                            <li><a href="colors.html" class="slide-item"> Adelanto de pago</a></li>
                                            <li><a href="avatarsquare.html" class="slide-item"> Prestamos</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="side-menu__item has-link" href="{{route('web')}}" target="_blank"><i
                        class="side-menu__icon fe fe-zap"></i><span
                        class="side-menu__label">Landing Page</span><span class="badge bg-green br-5 side-badge blink-text pb-1">New</span>
                    </a>
                </li> --}}
            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
</div>

