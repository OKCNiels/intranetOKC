<?php

// use App\Http\Controllers\Admin\Configuracion\ModuloController;

use App\Http\Controllers\Admin\AplicacionesController;
use App\Http\Controllers\Admin\Configuracion\AccionesController;
use App\Http\Controllers\Admin\Configuracion\ConfiguracionController;
use App\Http\Controllers\Admin\Configuracion\UsuarioController;
use App\Http\Controllers\Admin\Control\IncidenciasController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Intranet\CalendarioController;
use App\Http\Controllers\Admin\Intranet\MenuController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Auth\AuthController;
// use App\Http\Controllers\Admin\Publicidad\CalendarioController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Auth\PagesController;
use App\Http\Controllers\Admin\CuponesController;
use App\Http\Controllers\Admin\DivisionesController;
use App\Http\Controllers\Admin\GuiaController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\RecursosHumanosController;
use App\Http\Controllers\Admin\ScriptController;
use App\Http\Controllers\Admin\SedesController;
use App\Http\Controllers\Admin\Vacaciones\CalendarioController as VacacionesCalendarioController;
use App\Http\Controllers\Admin\VotacionesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('web.main');
// })->name('web');

// Route::redirect('/', 'login');
Route::get('/', [HomeController::class, 'web'])->name('web');
Route::get('calendario',[HomeController::class, 'calendario'])->name('calendario');
// Route::get('/b5', [HomeController::class, 'webb5'])->name('web');
Route::get('empresa',[HomeController::class, 'empresa'])->name('empresa');
Route::get('politicas',[HomeController::class, 'politicas'])->name('politicas');
Route::get('manual',[HomeController::class, 'manual'])->name('manual');
Route::get('politicas/{id}',[HomeController::class, 'politica'])->name('politica');



// Route::get('login', [AuthController::class, 'login'])->name('login')->middleware(['session.externo']);
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('loginsession-login', [AuthController::class, 'sessionLogin'])->name('session-login');

Route::group(['middleware' => ['web', 'guest']], function(){

    Route::get('connect', [AuthController::class, 'connect'])->name('connect');
});
// ->name('panel.')->prefix('panel')
Route::middleware(['usuario.externo'])->group(function () {
    Route::get('dashboard', [AdminHomeController::class, 'index'])->name('dashboard');
    Route::get('aplicaciones', [AplicacionesController::class, 'aplicaciones'])->name('aplicaciones');
    // Route::get('dashboard-externo', [DashboardController::class, 'dashboardExterno'])->name('dashboard-externo');
    Route::get('logout-externo', [AuthController::class, 'logoutExterno'])->name('logout-externo');
    Route::get('perfil', [DashboardController::class, 'perfil'])->name('perfil');

    // --------------extranet de edgar-------------------
    Route::name('script.')->prefix('script')->group(function () {
        Route::get('empresas-guias', [ScriptController::class, 'empresasGuias'])->name('empresas-guias');
        Route::get('guias-destino-entidad', [ScriptController::class, 'guiasDestinoEntidad'])->name('guias-destino-entidad');
    });
    // --------------extranet de edgar-------------------

    Route::name('promociones.')->prefix('promociones')->group(function () {
        Route::get('cupones', [CuponesController::class, 'cupones'])->name('cupones');
    });

    Route::name('recursos-humanos.')->prefix('recursos-humanos')->group(function () {
        Route::name('permisos.')->prefix('permisos')->group(function () {
            Route::get('index', [RecursosHumanosController::class, 'index'])->name('index');
            Route::post('listar', [RecursosHumanosController::class, 'listar'])->name('listar');
            Route::post('guardar', [RecursosHumanosController::class, 'guardar'])->name('guardar');
            Route::get('editar/{id}', [RecursosHumanosController::class, 'editar'])->name('editar');
            Route::post('actualizar', [RecursosHumanosController::class, 'actualizar'])->name('actualizar');
            Route::post('aprobar', [RecursosHumanosController::class, 'aprobar'])->name('aprobar');
            Route::post('denegar', [RecursosHumanosController::class, 'denegar'])->name('denegar');
            Route::post('guardar-sustento', [RecursosHumanosController::class, 'guardarSustento'])->name('guardar-sustento');
            Route::post('historial', [RecursosHumanosController::class, 'historial'])->name('historial');
            Route::post('imprimir', [RecursosHumanosController::class, 'imprimir'])->name('imprimir');
        });

        Route::name('cupones.')->prefix('cupones')->group(function () {
            Route::get('index', [CuponesController::class, 'index'])->name('index');
            Route::post('listar', [CuponesController::class, 'listar'])->name('listar');
            Route::post('guardar', [CuponesController::class, 'guardar'])->name('guardar');
            Route::get('editar/{id}', [CuponesController::class, 'editar'])->name('editar');
            Route::post('actualizar', [CuponesController::class, 'actualizar'])->name('actualizar');
            Route::post('aprobar', [CuponesController::class, 'aprobar'])->name('aprobar');
            Route::post('denegar', [CuponesController::class, 'denegar'])->name('denegar');
            Route::post('historial', [CuponesController::class, 'historial'])->name('historial');
            Route::post('imprimir', [CuponesController::class, 'imprimir'])->name('imprimir');
        });

        Route::name('helpers.')->prefix('helpers')->group(function () {
            Route::post('listar-division', [AdminHomeController::class, 'listarDivision'])->name('listar-division');
            Route::post('listar-detalle-permisos', [AdminHomeController::class, 'listarDetallePermiso'])->name('listar-detalle-permisos');
            Route::post('listar-detalle-cupones', [AdminHomeController::class, 'listarDetalleCupon'])->name('listar-detalle-cupones');
        });

        Route::name('votaciones.')->prefix('votaciones')->group(function () {
            Route::get('lista', [VotacionesController::class, 'lista'])->name('lista');
            Route::post('listar', [VotacionesController::class, 'listar'])->name('listar');
            Route::post('guardar', [VotacionesController::class, 'guardar'])->name('guardar');
            Route::get('editar/{id}', [VotacionesController::class, 'editar'])->name('editar');
            Route::put('eliminar', [VotacionesController::class, 'eliminar'])->name('eliminar');

            Route::post('cedula', [VotacionesController::class, 'cedula'])->name('cedula');
            Route::post('votacion', [VotacionesController::class, 'votacion'])->name('votacion');
            Route::post('conteo', [VotacionesController::class, 'conteo'])->name('conteo');
            Route::post('graficos', [VotacionesController::class, 'graficos'])->name('graficos');
        });
        // Route::name('solicitudes.')->prefix('solicitudes')->group(function () {
        Route::name('vacaciones.')->prefix('vacaciones')->group(function () {
            Route::get('calendario', [VacacionesCalendarioController::class, 'calendario'])->name('calendario');
            Route::post('listar', [VacacionesCalendarioController::class, 'listar'])->name('listar');
            Route::post('guardar', [VacacionesCalendarioController::class, 'guardar'])->name('guardar');
            Route::get('editar/{id}', [VacacionesCalendarioController::class, 'editar'])->name('editar');
            Route::put('eliminar', [VacacionesCalendarioController::class, 'eliminar'])->name('eliminar');
        });
        // });
    });

    Route::name('control.')->prefix('control')->group(function () {
        Route::name('guias.')->prefix('guias')->group(function () {
            Route::get('index', [GuiaController::class, 'index'])->name('index');
            Route::post('listar', [GuiaController::class, 'listar'])->name('listar');
            Route::post('guardar-almacen', [GuiaController::class, 'guardarAlmacen'])->name('guardar-almacen');
            Route::post('guardar-despacho', [GuiaController::class, 'guardarDespacho'])->name('guardar-despacho');
            Route::post('actualizar-despacho', [GuiaController::class, 'actualizarDespacho'])->name('actualizar-despacho');
            Route::post('guardar-archivador', [GuiaController::class, 'guardarArchivador'])->name('guardar-archivador');
            Route::post('guardar-observacion', [GuiaController::class, 'guardarObservacion'])->name('guardar-observacion');
            Route::post('busqueda', [GuiaController::class, 'buscarCuadro'])->name('busqueda');
            Route::get('informacion-despacho/{id}', [GuiaController::class, 'informacionDespacho'])->name('informacion-despacho');
            Route::get('historial/{id}', [GuiaController::class, 'historial'])->name('historial');
            Route::put('anular/{id}', [GuiaController::class, 'anular'])->name('anular');
            Route::put('eliminar/{id}', [GuiaController::class, 'eliminar'])->name('eliminar');
            Route::post('exportar', [GuiaController::class, 'exportar'])->name('exportar');

            Route::post('agencia-transportista', [GuiaController::class, 'agenciaTransportista'])->name('agencia-transportista');
            Route::post('guardar-almacen-masivo', [GuiaController::class, 'guardarAlmacenMasivo'])->name('guardar-almacen-masivo');
            Route::get('editar/{id}', [GuiaController::class, 'editar'])->name('editar');
            Route::post('buscar-codigo', [GuiaController::class, 'buscarCodigo'])->name('buscar-codigo');

            Route::post('buscar-codigo-orden-despacho', [GuiaController::class, 'buscarCodigoOrdenDespacho'])->name('buscar-codigo-orden-despacho');
            Route::post('buscar-od', [GuiaController::class, 'buscarOD'])->name('buscar-od');
            Route::post('enviar-gr-control', [GuiaController::class, 'enviarGRControl'])->name('enviar-gr-control');
            Route::post('reporte-filtros', [GuiaController::class, 'reporteFiltros'])->name('reporte-filtros');
        });

        Route::name('incidencias.')->prefix('incidencias')->group(function () {
            Route::get('lista', [IncidenciasController::class, 'lista'])->name('lista');
            Route::post('listar', [IncidenciasController::class, 'listar'])->name('listar');
            Route::post('formulario', [IncidenciasController::class, 'formulario'])->name('formulario');
            Route::post('guardar', [IncidenciasController::class, 'guardar'])->name('guardar');
            Route::get('editar', [IncidenciasController::class, 'actualizarDespacho'])->name('editar');
            Route::put('eliminar/{id}', [IncidenciasController::class, 'eliminar'])->name('eliminar');

        });

    });

    Route::name('sedes.')->prefix('sedes')->group(function () {

        Route::get('lista-sedes-combo/{id}', [SedesController::class, 'listaSedesCombo'])->name('lista-sedes-combo');

    });
    Route::name('divisiones.')->prefix('divisiones')->group(function () {

        Route::get('lista-divisiones-combo/{id}', [DivisionesController::class, 'listaDivisionesCombo'])->name('lista-divisiones-combo');

    });

    // -----------------------------------------------------

    Route::name('configuraciones.')->prefix('configuraciones')->group(function () {
        Route::get('dashboard', [ConfiguracionController::class, 'dashboard'])->name('dashboard');
        // Route::name('menus.')->prefix('menus')->group(function () {
        //     Route::get('lista', [MenuController::class, 'lista'])->name('lista');
        //     Route::post('listar', [MenuController::class, 'listar'])->name('listar');
        //     Route::post('formulario-menu', [MenuController::class, 'formularioMenu'])->name('formulario-menu');
        //     Route::post('guardar', [MenuController::class, 'guardar'])->name('guardar');
        //     Route::put('eliminar/{id}', [MenuController::class, 'eliminar'])->name('eliminar');

        // });
        Route::name('usuarios.')->prefix('usuarios')->group(function () {
            Route::get('lista', [UsuarioController::class, 'lista'])->name('lista');
            Route::post('listar', [UsuarioController::class, 'listar'])->name('listar');
            Route::post('formulario-modulo', [UsuarioController::class, 'formularioModulo'])->name('formulario-modulo');
            Route::post('guardar', [UsuarioController::class, 'guardar'])->name('guardar');
            Route::put('eliminar/{id}', [UsuarioController::class, 'eliminar'])->name('eliminar');

        });
        Route::name('acciones.')->prefix('acciones')->group(function () {
            Route::get('lista', [AccionesController::class, 'lista'])->name('lista');
            Route::post('listar', [AccionesController::class, 'listar'])->name('listar');
            // Route::post('formulario-modulo', [AccionesController::class, 'formularioModulo'])->name('formulario-modulo');
            Route::post('guardar', [AccionesController::class, 'guardar'])->name('guardar');
            Route::get('editar/{id}', [AccionesController::class, 'editar'])->name('editar');
            Route::put('eliminar/{id}', [AccionesController::class, 'eliminar'])->name('eliminar');

        });
    });

    // Route::name('publicidades.')->prefix('publicidades')->group(function () {
    //     Route::name('calendario.')->prefix('calendario')->group(function () {
    //         Route::get('inicio', [CalendarioController::class, 'inicio'])->name('inicio');
    //         Route::post('guardar', [CalendarioController::class, 'guardar'])->name('guardar');
    //         Route::get('listar', [CalendarioController::class, 'listar'])->name('listar');
    //         Route::post('mover', [CalendarioController::class, 'mover'])->name('mover');
    //         Route::get('editar', [CalendarioController::class, 'editar'])->name('editar');
    //     });
    // });



    // -------------------------------------------------
    // Dentro de este grupo de rutas solo pueden ir rutas declaradas que competen a microsofft 365
    Route::group(['middleware' => ['web', 'MsGraphAuthenticated'], 'prefix' => 'app'], function(){
        // Route::get('/', [PagesController::class, 'app'])->name('app');

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');



    });
});


// comentado

// #rutas de la web
// // Route::get('/', [HomeController::class, 'web'])->name('web');
// Route::get('calendario',[HomeController::class, 'calendario'])->name('calendario');
// // Route::get('/b5', [HomeController::class, 'webb5'])->name('web');
// Route::get('empresa',[HomeController::class, 'empresa'])->name('empresa');
// Route::get('politicas',[HomeController::class, 'politicas'])->name('politicas');
// Route::get('manual',[HomeController::class, 'manual'])->name('manual');
// Route::get('politicas/{id}',[HomeController::class, 'politica'])->name('politica');

// Route::get('aplicaciones',[HomeController::class, 'aplicaciones'])->name('aplicaciones');
// Route::get('/old', [HomeController::class, 'web_2'])->name('web_2');
// // Route::get('politicas-de-la-empresa',[HomeController::class, 'okpoliticas'])->name('politics');
// // Route::get('nuestra-empresa',[HomeController::class, 'empresa'])->name('empresa');



// #---------------

// #rutas de administrador de la intranet
// Auth::routes();
// Route::get('prueba', [DashboardController::class, 'prueba']);
// Route::get('salir', [AuthLoginController::class, 'salir'])->name('salir');

// Route::get('login', [AuthLoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [AuthLoginController::class, 'login'])->name('session');


// Route::name('script.')->prefix('script')->group(function () {
//     Route::get('sesionwindows', [HomeController::class, 'sesionWindows'])->name('sesionwindows');
//     Route::get('conectar-usuario/{email}/{password}', [HomeController::class, 'conectarUsairo'])->name('conectar-usuario');
// });
// // #rutas de la intranet
// Route::middleware('admin')->name('panel.')->prefix('panel')->group(function () {
//      Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
//      Route::get('perfil', [DashboardController::class, 'perfil'])->name('perfil');
//     //  Route::get('perfil', [DashboardController::class, 'perfil'])->name('perfil');


//     Route::name('configuraciones.')->prefix('configuraciones')->group(function () {
//         //enlista los modulos
//         // Route::name('modulos.')->prefix('modulos')->group(function () {
//         //     Route::get('lista', [ModuloController::class, 'lista'])->name('lista');
//         //     Route::post('listar', [ModuloController::class, 'listar'])->name('listar');
//         //     Route::post('formulario-modulo', [ModuloController::class, 'formularioModulo'])->name('formulario-modulo');
//         //     Route::post('guardar', [ModuloController::class, 'guardar'])->name('guardar');
//         //     Route::put('eliminar/{id}', [ModuloController::class, 'eliminar'])->name('eliminar');

//         // });
//         Route::name('menus.')->prefix('menus')->group(function () {
//             Route::get('lista', [MenuController::class, 'lista'])->name('lista');
//             Route::post('listar', [MenuController::class, 'listar'])->name('listar');
//             Route::post('formulario-menu', [MenuController::class, 'formularioMenu'])->name('formulario-menu');
//             Route::post('guardar', [MenuController::class, 'guardar'])->name('guardar');
//             Route::put('eliminar/{id}', [MenuController::class, 'eliminar'])->name('eliminar');

//         });
//         Route::name('usuarios.')->prefix('usuarios')->group(function () {
//             Route::get('lista', [UsuarioController::class, 'lista'])->name('lista');
//             Route::post('listar', [UsuarioController::class, 'listar'])->name('listar');
//             Route::post('formulario-modulo', [UsuarioController::class, 'formularioModulo'])->name('formulario-modulo');
//             Route::post('guardar', [UsuarioController::class, 'guardar'])->name('guardar');
//             Route::put('eliminar/{id}', [UsuarioController::class, 'eliminar'])->name('eliminar');

//         });
//     });

//     Route::name('publicidades.')->prefix('publicidades')->group(function () {
//         Route::name('calendario.')->prefix('calendario')->group(function () {
//             Route::get('inicio', [CalendarioController::class, 'inicio'])->name('inicio');
//             Route::post('guardar', [CalendarioController::class, 'guardar'])->name('guardar');
//             Route::get('listar', [CalendarioController::class, 'listar'])->name('listar');
//             Route::post('mover', [CalendarioController::class, 'mover'])->name('mover');
//             Route::get('editar', [CalendarioController::class, 'editar'])->name('editar');
//         });
//     });

// });
#-----------------------------
