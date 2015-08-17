<?php

/*
|--------------------------------------------------------------------------
| Rutas de acordes.club
|--------------------------------------------------------------------------
|
*/
Route::group(array( 'domain' => 'restauranteacordes.com', 'namespace' => 'Club' ), function () {

//------------------------------------------AUTENTICACION

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);

    Route::get( '/registrar' , [
        'as' => 'clubRegistrar' ,
        'uses' => 'Auth\AuthController@getRegister'
    ] );

    Route::post( '/registrar' , [
        'as' => 'clubPostRegistrar' ,
        'uses' => 'Auth\AuthController@postRegister'
    ] );

    Route::get( '/ingresar' , [
        'as' => 'clubIngresar' ,
        'uses' => 'Auth\AuthController@getLogin'
    ] );

    Route::post( '/ingresar' , [
        'as' => 'clubPostIngresar' ,
        'uses' => 'Auth\AuthController@postLogin'
    ] );

    Route::get( '/salir' , [
        'as' => 'clubSalir' ,
        'uses' => 'Auth\AuthController@getLogout'
    ] );

//-------------------------------------------INICIO

    Route::get('/', [
        'as' => 'publicInicio',
        'uses' => 'InicioCtrl@inicio'
    ]);

    Route::get('/menu', [
        'as' => 'publicMenu',
        'uses' => 'MenuCtrl@inicio'
    ]);

    Route::get('/menu/{id}', [
        'as' => 'publicMenu',
        'uses' => 'MenuCtrl@inicio'
    ]);

    Route::get('/promociones', [
        'as' => 'publicPromociones',
        'uses' => 'PromocionesCtrl@inicio'
    ]);

    Route::get('/servicios', [
        'as' => 'publicServicios',
        'uses' => 'ServiciosCtrl@inicio'
    ]);

    Route::get('/informacion-empresarial', [
        'as' => 'publicInformacionEmpresarial',
        'uses' => 'InformacionEmpresarialCtrl@inicio'
    ]);

//================================================RESERVACION

    Route::get('/reservacion', [
        'as' => 'publicReservacion',
        'uses' => 'ReservacionCtrl@inicio'
    ]);

    Route::get('/reservacion/ingresar', [
        'as' => 'publicReservacionIngresar',
        'uses' => 'ReservacionCtrl@ingresar'
    ]);

    Route::get('/mis-reservaciones', [
        'as' => 'publicMisReservacion',
        'uses' => 'ReservacionCtrl@misReservaciones'
    ]);

    Route::get('/nueva-reservacion', [
        'as' => 'publicReservacionCrear',
        'uses' => 'ReservacionCtrl@crear'
    ]);

    Route::post('/nueva-reservacion', 'ReservacionCtrl@insertar');

    Route::get('/mis-reservaciones/{id}', [
        'as' => 'publicReservacionDetalle',
        'uses' => 'ReservacionCtrl@detalle'
    ]);

    Route::get('/mis-reservaciones/{id}/modificar', [
        'as' => 'publicReservacionModificar',
        'uses' => 'ReservacionCtrl@modificar'
    ]);

    Route::post('/mis-reservaciones/{id}/modificar','ReservacionCtrl@actualizar');

    Route::get('/mis-reservaciones/{id}/eliminar', 'ReservacionCtrl@eliminar');

});

/*
|--------------------------------------------------------------------------
| Rutas de acordes.center
|--------------------------------------------------------------------------
|
*/
Route::group(array( 'domain' => 'restauranteacordes.admin', 'namespace' => 'Center', 'middleware' => 'auth' , ), function () {

    Route::get('/', [
        'as' => 'adminInicio',
        'uses' => 'AdministracionCtrl@inicio'
    ]);

    Route::get('/salir', [
        'as' => 'adminSalir',
        'uses' => 'AdministracionCtrl@salir'
    ]);

//================================================EMPRESA

    Route::get('/empresa', [
        'as' => 'adminEmpresa',
        'uses' => 'EmpresaCtrl@inicio',
        //'middleware' => 'empresa'
    ]);

    Route::get('/empresa/{id}/editar', [
        'as' => 'adminEmpresaEditar',
        'uses' => 'EmpresaCtrl@editar'
    ]);

    Route::post('/empresa/{id}/actualizar', [
        'as' => 'adminEmpresaActualizar',
        'uses' => 'EmpresaCtrl@actualizar'
    ]);

//================================================EMPLEADOS

    Route::get('/empleados', [
        'as' => 'adminEmpleados',
        'uses' => 'EmpleadosCtrl@inicio',
        //'middleware' => 'empleados'
    ]);

    Route::get('/empleados/nuevo-registro', [
        'as' => 'adminEmpleadosCrear',
        'uses' => 'EmpleadosCtrl@crear',
        //'middleware' => 'empleados'
    ]);

    Route::post('/empleados/nuevo-registro', 'EmpleadosCtrl@insertar');

    Route::get('/empleados/{id}/editar', [
        'as' => 'adminEmpleadosEditar',
        'uses' => 'EmpleadosCtrl@editar'
    ]);

    Route::post('/empleados/{id}/actualizar', 'EmpleadosCtrl@actualizar');

    Route::get('/empleados/{id}/eliminar', 'EmpleadosCtrl@eliminar');

//================================================PREGUNTAS FRECUENTES

    Route::get('/preguntas-frecuentes', [
        'as' => 'adminPreguntas',
        'uses' => 'PreguntasCtrl@inicio',
        //'middleware' => 'faq'
    ]);

    Route::get('/preguntas-frecuentes/nuevo-registro', [
        'as' => 'adminPreguntasCrear',
        'uses' => 'PreguntasCtrl@crear',
        //'middleware' => 'faq'
    ]);

    Route::post('/preguntas-frecuentes/nuevo-registro', 'PreguntasCtrl@insertar');

    Route::get('/preguntas-frecuentes/{id}/editar', [
        'as' => 'adminPreguntasEditar',
        'uses' => 'PreguntasCtrl@editar'
    ]);

    Route::post('/preguntas-frecuentes/{id}/actualizar', 'PreguntasCtrl@actualizar');

    Route::get('/preguntas-frecuentes/{id}/eliminar', 'PreguntasCtrl@eliminar');

//================================================PROMOCIONES

    Route::get('/promociones', [
        'as' => 'adminPromociones',
        'uses' => 'PromocionesCtrl@inicio',
        //'middleware' => 'promociones'
    ]);

    Route::get('/promociones/nuevo-registro', [
        'as' => 'adminPromocionesCrear',
        'uses' => 'PromocionesCtrl@crear',
        //'middleware' => 'promociones'
    ]);

    Route::post('/promociones/nuevo-registro', 'PromocionesCtrl@insertar');

    Route::get('/promociones/{id}/editar', [
        'as' => 'adminPromocionesEditar',
        'uses' => 'PromocionesCtrl@editar'
    ]);

    Route::post('/promociones/{id}/actualizar', 'PromocionesCtrl@actualizar');

    Route::get('/promociones/{id}/eliminar', 'PromocionesCtrl@eliminar');

//===============================================REDES SOCIALES

    Route::get('/redes-sociales', [
        'as' => 'adminRedes',
        'uses' => 'RedesCtrl@inicio',
        //'middleware' => 'redes'
    ]);

    Route::get('/redes-sociales/nuevo-registro', [
        'as' => 'adminRedesCrear',
        'uses' => 'RedesCtrl@crear',
        //'middleware' => 'redes'
    ]);

    Route::post('/redes-sociales/nuevo-registro', 'RedesCtrl@insertar');

    Route::get('/redes-sociales/{id}/editar', [
        'as' => 'adminRedesEditar',
        'uses' => 'RedesCtrl@editar'
    ]);

    Route::post('/redes-sociales/{id}/actualizar', 'RedesCtrl@actualizar');

    Route::get('/redes-sociales/{id}/eliminar', 'RedesCtrl@eliminar');

//================================================SERVICIOS

    Route::get('/servicios', [
        'as' => 'adminServicios',
        'uses' => 'ServiciosCtrl@inicio',
        //'middleware' => 'servicios'
    ]);

    Route::get('/servicios/nuevo-registro', [
        'as' => 'adminServiciosCrear',
        'uses' => 'ServiciosCtrl@crear',
        //'middleware' => 'servicios'
    ]);

    Route::post('/servicios/nuevo-registro', 'ServiciosCtrl@insertar');


    Route::get('/servicios/{id}/editar', [
        'as' => 'adminServiciosEditar',
        'uses' => 'ServiciosCtrl@editar'
    ]);

    Route::post('/servicios/{id}/actualizar', 'ServiciosCtrl@actualizar');

    Route::get('/servicios/{id}/eliminar', 'ServiciosCtrl@eliminar');

//================================================MENU

    //Restaurante
    Route::get('/menu-restaurante', [
        'as' => 'adminMenuRestaurante',
        'uses' => 'MenuCtrl@inicioRestaurante',
        //'middleware' => 'restaurante'
    ]);

    Route::get('/menu-restaurante/nuevo-registro', [
        'as' => 'adminMenuRestauranteNuevo',
        'uses' => 'MenuCtrl@nuevoRestaurante',
        //'middleware' => 'restaurante'
    ]);

    Route::post('/menu-restaurante/nuevo-registro', 'MenuCtrl@crearRestaurante');

    Route::get('/menu-restaurante/{id}/editar', [
        'as' => 'adminMenuRestauranteEditar',
        'uses' => 'MenuCtrl@editarRestaurante'
    ]);

    Route::post('/menu-restaurante/{id}/actualizar', 'MenuCtrl@actualizarRestaurante');

    Route::get('/menu-restaurante/{id}/eliminar', 'MenuCtrl@eliminarRestaurante');

    //Bar
    Route::get('/menu-bar', [
        'as' => 'adminMenuBar',
        'uses' => 'MenuCtrl@inicioBar',
        //'middleware' => 'restaurante'
    ]);

    Route::get('/menu-bar/nuevo-registro', [
        'as' => 'adminMenuBarNuevo',
        'uses' => 'MenuCtrl@nuevoBar',
        //'middleware' => 'restaurante'
    ]);

    Route::post('/menu-bar/nuevo-registro', 'MenuCtrl@crearBar');

    Route::get('/menu-bar/{id}/editar', [
        'as' => 'adminMenuBarEditar',
        'uses' => 'MenuCtrl@editarBar'
    ]);

    Route::post('/menu-bar/{id}/actualizar', 'MenuCtrl@actualizarBar');

    Route::get('/menu-bar/{id}/eliminar', 'MenuCtrl@eliminarBar');

//================================================SUCURSALES

    Route::get('/sucursales', [
        'as' => 'adminSucursales',
        'uses' => 'SucursalesCtrl@inicio',
        //'middleware' => 'sucursales'
    ]);

    Route::get('/sucursales/nuevo-registro', [
        'as' => 'adminSucursalesNuevo',
        'uses' => 'SucursalesCtrl@nuevo',
        //'middleware' => 'sucursales'
    ]);

    Route::post('/sucursales/nuevo-registro', 'SucursalesCtrl@crear');

    Route::get('/sucursales/{id}/editar', [
        'as' => 'adminSucursalesEditar',
        'uses' => 'SucursalesCtrl@editar'
    ]);

    Route::post('/sucursales/{id}/actualizar', 'SucursalesCtrl@actualizar');

    Route::get('/sucursales/{id}/eliminar', 'SucursalesCtrl@eliminar');

//================================================Usuarios

    Route::get('/usuarios', [
        'as' => 'adminUsuarios',
        'uses' => 'UsuariosCtrl@inicio',
        //'middleware' => 'faq'
    ]);

    Route::get('/usuarios/nuevo-registro', [
        'as' => 'adminUsuariosNuevo',
        'uses' => 'UsuariosCtrl@nuevo',
        //'middleware' => 'faq'
    ]);

    Route::post('/usuarios/nuevo-registro', 'UsuariosCtrl@crear');

    Route::get('/usuarios/{id}/editar', [
        'as' => 'adminUsuariosEditar',
        'uses' => 'UsuariosCtrl@editar'
    ]);

    Route::post('/usuarios/{id}/actualizar', 'UsuariosCtrl@actualizar');

    Route::get('/usuarios/{id}/eliminar', 'UsuariosCtrl@eliminar');

    Route::get('/cambiar-contrasena', [
        'as' => 'adminContrasena',
        'uses' => 'UsuariosCtrl@cambiarContrasena'
    ]);

});

//===================================================AUTENTICACION

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get( '/registrar' , [
    'as' => 'registrar' ,
    'uses' => 'Auth\AuthController@getRegister'
] );

Route::post( '/registrar' , [
    'as' => 'post.registrar' ,
    'uses' => 'Auth\AuthController@postRegister'
] );

Route::get( '/ingresar' , [
    'as' => 'ingresar' ,
    'uses' => 'Auth\AuthController@getLogin'
] );

Route::post( '/ingresar' , [
    'as' => 'post.ingresar' ,
    'uses' => 'Auth\AuthController@postLogin'
] );

Route::get( '/salir' , [
    'as' => 'salir' ,
    'uses' => 'Auth\AuthController@getLogout'
] );