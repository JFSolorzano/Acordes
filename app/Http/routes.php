<?php

/*
|--------------------------------------------------------------------------
| Rutas de acordes.club
|--------------------------------------------------------------------------
|
*/
Route::group(array('domain' => 'www.restauranteacordes.com', 'namespace' => 'Club'), function () {

//------------------------------------------AUTENTICACION

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);

    //Registrar
    Route::get('/registrar', [
        'as' => 'clubRegistrar',
        'uses' => 'Auth\AuthController@getRegister'
    ]);

    Route::post('/registrar', [
        'as' => 'clubPostRegistrar',
        'uses' => 'Auth\AuthController@postRegister'
    ]);

    //Ingresar
    Route::get('/ingresar', [
        'as' => 'clubIngresar',
        'uses' => 'Auth\AuthController@getLogin'
    ]);

    Route::post('/ingresar', [
        'as' => 'clubPostIngresar',
        'uses' => 'Auth\AuthController@postLogin'
    ]);

    Route::get('/salir', [
        'as' => 'clubSalir',
        'uses' => 'Auth\AuthController@getLogout'
    ]);

    //Olvide Contrasena
    Route::get('/olvide-mi-contrasena', [
        'as' => 'clubOlvide',
        'uses' => 'Auth\PasswordController@getEmail'
    ]);

    Route::post('/olvide-mi-contrasena', [
        'as' => 'clubPostOlvide',
        'uses' => 'Auth\PasswordController@postEmail'
    ]);

    //Restablecer Contrasena
    Route::get('/restablecer-contrasena/{token}', [
        'as' => 'clubRestablecer',
        'uses' => 'Auth\PasswordController@getReset'
    ]);

    Route::post('/restablecer-contrasena/{token}', [
        'as' => 'clubPostRestablecer',
        'uses' => 'Auth\PasswordController@postReset'
    ]);

    // Social Auth
    Route::get('facebook',[
        'as' => 'clubFacebookAuth',
        'uses' => 'Auth\SocialController@fbRedirect'
    ]);

    Route::get('cuenta/facebook', [
        'as' => 'clubFacebookAuthCallBack',
        'uses' => 'Auth\SocialController@fb'
    ]);

//-------------------------------------------CUENTA

    Route::get('/mi-cuenta', [
        'as' => 'publicCuenta',
        'uses' => 'CuentaCtrl@dashboard'
    ]);

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
        'as' => 'publicMenuEspecifico',
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

    Route::get('/mis-reservaciones', [
        'as' => 'publicMisReservacion',
        'uses' => 'ReservacionCtrl@misReservaciones'
    ]);

    //Formulario
    Route::get('/reservacion/paso-uno', [
        'as' => 'publicReservacionPasoUno',
        'uses' => 'ReservacionCtrl@pasouno'
    ]);

    Route::post('/reservacion/paso-dos', [
        'as' => 'publicReservacionPasoDos',
        'uses' => 'ReservacionCtrl@pasodos'
    ]);

    Route::post('/reservacion/resumen', [
        'as' => 'publicPostReservacionPasoDos',
        'uses' => 'ReservacionCtrl@pasodosPost'
    ]);

    Route::get('/mis-reservaciones/{id}', [
        'as' => 'publicReservacionDetalle',
        'uses' => 'ReservacionCtrl@detalle'
    ]);

    Route::get('/mis-reservaciones/{id}/modificar', [
        'as' => 'publicReservacionModificar',
        'uses' => 'ReservacionCtrl@modificar'
    ]);

    Route::post('/mis-reservaciones/{id}/modificar', 'ReservacionCtrl@actualizar');

    Route::get('/mis-reservaciones/{id}/eliminar', 'ReservacionCtrl@eliminar');

    //---------------------------------------------------SERVICIOS

    Route::get('/solicitar-servicio',[
        'as' => 'publicSolicitarServicio',
        'uses' => 'ServiciosCtrl@solicitud',
        'middleware' => 'auth'
    ]);

    Route::post('/solicitar-servicio',[
        'as' => 'publicPostSolicitarServicio',
        'uses' => 'ServiciosCtrl@solicitar',
        'middleware' => 'auth'
    ]);

    //---------------------------------------------------PREGUNTAS

    Route::get('/preguntas-frecuentes', [
        'as' => 'publicPreguntas',
        'uses' => 'PreguntasCtrl@inicio'
    ]);

    //----------------------------------------------------MENU

    Route::get('/menu/opcion/{slug}', [
        'as' => 'publicMenuOpcion',
        'uses' => 'MenuCtrl@opcion'
    ]);



});

/*
|--------------------------------------------------------------------------
| Rutas de acordes.center
|--------------------------------------------------------------------------
|
*/
Route::group(array('domain' => 'www.restauranteacordes.net', 'namespace' => 'Center'), function () {

    //------------------------------------------REPORTES

    Route::get('botellas-report', ['uses' =>'MenuCtrl@botellas', 'as' => 'BotellasReport']);
    Route::get('sin_alcohol-report', ['uses' =>'MenuCtrl@bebidas_sin_alc', 'as' => 'BebidasSinAlcReport']);
    Route::get('cervezas-report', ['uses' =>'MenuCtrl@cervezas', 'as' => 'CervezasReport']);
    Route::get('con_alcohol-report', ['uses' =>'MenuCtrl@bebidas_con_alc', 'as' => 'BebidasConAlcReport']);
    Route::get('calientes-report', ['uses' =>'MenuCtrl@bebidas_calientes', 'as' => 'CalientesReport']);
    Route::get('especiales-report', ['uses' =>'MenuCtrl@bebidas_especiales', 'as' => 'EspecialesReport']);
    Route::get('picar-report', ['uses' =>'MenuCtrl@picar', 'as' => 'PicarReport']);
    Route::get('fuertes-report', ['uses' =>'MenuCtrl@platos_fuertes', 'as' => 'FuertesReport']);
    Route::get('bocas-report', ['uses' =>'MenuCtrl@bocas', 'as' => 'BocasReport']);
    Route::get('paninis-report', ['uses' =>'MenuCtrl@paninis', 'as' => 'PaninisReport']);
    Route::get('comidas-report', ['uses' =>'MenuCtrl@comidas', 'as' => 'ComidasReport']);
    Route::get('bebidas-report', ['uses' =>'MenuCtrl@bebidas', 'as' => 'BebidasReport']);
    Route::get('servicios-report', ['uses' =>'ServiciosCtrl@servicios', 'as' => 'ServiciosReport']);
    Route::get('promociones-report', ['uses' =>'PromocionesCtrl@promociones', 'as' => 'PromocionesReport']);
    Route::get('usuarios_backend-report', ['uses' =>'UsuariosCtrl@usuarios_backend', 'as' => 'UsuariosReport']);
    Route::get('usuarios_clientes-report', ['uses' =>'UsuariosCtrl@usuarios_clientes', 'as' => 'ClientesReport']);
    //------------------------------------------AUTENTICACION

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);

    Route::get('/registrar', [
        'as' => 'adminRegistrar',
        'uses' => 'Auth\AuthController@getRegister'
    ]);

    Route::post('/registrar', [
        'as' => 'adminPostRegistrar',
        'uses' => 'Auth\AuthController@postRegister'
    ]);

    Route::get('/ingresar', [
        'as' => 'adminIngresar',
        'uses' => 'Auth\AuthController@getLogin'
    ]);

    Route::post('/ingresar', [
        'as' => 'adminPostIngresar',
        'uses' => 'Auth\AuthController@postLogin'
    ]);

    Route::get('/salir', [
        'as' => 'adminSalir',
        'uses' => 'Auth\AuthController@getLogout'
    ]);

    Route::group(array('middleware' => 'auth'), function () {

        Route::get('/', [
            'as' => 'adminInicio',
            'uses' => 'AdministracionCtrl@inicio'
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
        Route::get('/menu', [
            'as' => 'adminMenu',
            'uses' => 'MenuCtrl@inicio'
        ]);

        //Comidas
        Route::get('/menu/comidas', [
            'as' => 'adminMenuComidas',
            'uses' => 'MenuCtrl@inicioComidas'
        ]);

        Route::get('/menu/comidas/para-picar', [
            'as' => 'adminMenuComidasParaPicar',
            'uses' => 'MenuCtrl@inicioParaPicar'
        ]);

        Route::get('/menu/comidas/para-picar/{slug}', [
            'as' => 'adminMenuComidasParaPicarOpcion',
            'uses' => 'MenuCtrl@opcionParaPicar'
        ]);

        Route::get('/menu/comidas/platos-fuertes', [
            'as' => 'adminMenuComidasPlatosFuertes',
            'uses' => 'MenuCtrl@inicioPlatosFuertes'
        ]);

        //Bebidas
        Route::get('/menu/bebidas', [
            'as' => 'adminMenuBebidas',
            'uses' => 'MenuCtrl@inicioBebidas'
        ]);

        Route::get('/menu/bebidas/sin-alcohol', [
            'as' => 'adminMenuBebidasSinAlcohol',
            'uses' => 'MenuCtrl@inicioSinAlcohol'
        ]);

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

});

