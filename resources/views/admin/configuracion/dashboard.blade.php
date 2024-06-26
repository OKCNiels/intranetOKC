 @extends('admin.configuracion.app-configuracion')
 @section('configuracion-header')
 <div class="page-header">
    <h1 class="page-title">Configuración</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Configuración</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>
 @endsection
 @section('configuracion-contenido')
 <div class="row row-sm">
    <div class="col-xl-12 col-xxl-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2 col-sm-2 col-md-12">
                        <div class="mt-3 mb-5">
                            <span class="settings-icon bg-primary-transparent text-primary"><i class="fe fe-settings"></i></span>
                        </div>
                    </div>
                    <div class="col-xl-10 col-sm-10 col-md-12">
                        <a href="javascript:void(0)">
                            <h4 class="mb-1 text-dark">General</h4>
                        </a>
                        <p>General settings such as, site title, logo, other general and advanced settings.</p>
                        <a href="javascript:void(0)">Change Settings <i class="ion-chevron-right fs-10 ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-xxl-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2 col-sm-2 col-md-12">
                        <div class="mt-3 mb-5">
                            <span class="settings-icon bg-secondary-transparent text-secondary border-secondary"><i class="fe fe-home"></i></span>
                        </div>
                    </div>
                    <div class="col-xl-10 col-sm-10 col-md-12">
                        <a href="javascript:void(0)">
                            <h4 class="mb-1 text-dark">Dashboard</h4>
                        </a>
                        <p>In this settings we can change sidemenu and main page can be Controlled.</p>
                        <a href="javascript:void(0)">Change Settings <i class="ion-chevron-right fs-10 ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-xxl-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2 col-sm-2 col-md-12">
                        <div class="mt-3 mb-5">
                            <span class="settings-icon bg-danger-transparent text-danger border-danger"><i class="fe fe-bell"></i></span>
                        </div>
                    </div>
                    <div class="col-xl-10 col-sm-10 col-md-12">
                        <a href="javascript:void(0)">
                            <h4 class="mb-1 text-dark">Notifications</h4>
                        </a>
                        <p>Notifications settings we can control the notifications privacy and security.</p>
                        <a href="javascript:void(0)">Change Settings <i class="ion-chevron-right fs-10 ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-xxl-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2 col-sm-2 col-md-12">
                        <div class="mt-3 mb-5">
                            <span class="settings-icon bg-warning-transparent text-warning border-warning"><i class="fe fe-grid"></i></span>
                        </div>
                    </div>
                    <div class="col-xl-10 col-sm-10 col-md-12">
                        <a href="javascript:void(0)">
                            <h4 class="mb-1 text-dark">Webapps</h4>
                        </a>
                        <p>Web apps settings such as Apps,Elements & Mail related to web apps can be Controlled.</p>
                        <a href="javascript:void(0)">Change Settings <i class="ion-chevron-right fs-10 ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-xxl-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2 col-sm-2 col-md-12">
                        <div class="mt-3 mb-5">
                            <span class="settings-icon bg-success-transparent text-success border-success"><i class="fe fe-flag"></i></span>
                        </div>
                    </div>
                    <div class="col-xl-10 col-sm-10 col-md-12">
                        <a href="javascript:void(0)">
                            <h4 class="mb-1 text-dark">Region & language</h4>
                        </a>
                        <p>Region & language settings we can Add, Delete and edit your Region & language.</p>
                        <a href="javascript:void(0)">Change Settings <i class="ion-chevron-right fs-10 ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-xxl-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2 col-sm-2 col-md-12">
                        <div class="mt-3 mb-5">
                            <span class="settings-icon bg-pink-transparent text-pink border-pink"><i class="fe fe-cast"></i></span>
                        </div>
                    </div>
                    <div class="col-xl-10 col-sm-10 col-md-12">
                        <a href="javascript:void(0)">
                            <h4 class="mb-1 text-dark">Blog</h4>
                        </a>
                        <p>Blog settings such as, enable blog, max mosts in page and more can be controlled.</p>
                        <a href="javascript:void(0)">Change Settings <i class="ion-chevron-right fs-10 ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-xxl-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2 col-sm-2 col-md-12">
                        <div class="mt-3 mb-5">
                            <span class="settings-icon bg-info-transparent text-info border-info"><i class="fe fe-search"></i></span>
                        </div>
                    </div>
                    <div class="col-xl-10 col-sm-10 col-md-12">
                        <a href="javascript:void(0)">
                            <h4 class="mb-1 text-dark">SEO</h4>
                        </a>
                        <p>Search Engine Optimization settings such as, meta tags and social media can be controlled..</p>
                        <a href="javascript:void(0)">Change Settings <i class="ion-chevron-right fs-10 ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-xxl-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2 col-sm-2 col-md-12">
                        <div class="mt-3 mb-5">
                            <span class="settings-icon bg-danger-transparent text-orange border-orange"><i class="fe fe-mail"></i></span>
                        </div>
                    </div>
                    <div class="col-xl-10 col-sm-10 col-md-12">
                        <a href="javascript:void(0)">
                            <h4 class="mb-1 text-dark">SMTP</h4>
                        </a>
                        <p>Email SMTP settings such as, contact us and others related to email can be controlled.</p>
                        <a href="javascript:void(0)">Change Settings <i class="ion-chevron-right fs-10 ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection
