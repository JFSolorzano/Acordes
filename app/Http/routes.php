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
    Route::get('facebook', [
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
        'uses' => 'CuentaCtrl@dashboard',
        'middleware' => 'auth'

    ]);

//-------------------------------------------INICIO

    Route::get('/', [
        'as' => 'publicInicio',
        'uses' => 'InicioCtrl@inicio'
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
        'uses' => 'ReservacionCtrl@misReservaciones',
        'middleware' => 'auth'
    ]);

    //Formulario
    Route::get('/reservacion/paso-uno', [
        'as' => 'publicReservacionPasoUno',
        'uses' => 'ReservacionCtrl@pasouno',
        'middleware' => 'auth'

    ]);

    Route::post('/reservacion/paso-dos', [
        'as' => 'publicReservacionPasoDos',
        'uses' => 'ReservacionCtrl@pasodos',
        'middleware' => 'auth'
    ]);

    Route::post('/reservacion/resumen', [
        'as' => 'publicPostReservacionPasoDos',
        'uses' => 'ReservacionCtrl@pasodosPost',
        'middleware' => 'auth'
    ]);

    Route::get('/mis-reservaciones/{id}', [
        'as' => 'publicReservacionDetalle',
        'uses' => 'ReservacionCtrl@detalle',
        'middleware' => 'auth'
    ]);

    Route::get('/mis-reservaciones/{id}/modificar', [
        'as' => 'publicReservacionModificar',
        'uses' => 'ReservacionCtrl@modificar',
        'middleware' => 'auth'
    ]);

    Route::post('/mis-reservaciones/{id}/modificar', [
        'as' => 'publicPostReservacionModificar',
        'uses' => 'ReservacionCtrl@actualizar'
    ]);

    Route::post('/mis-reservaciones/{id}/eliminar', [
        'as' => 'publicReservacionEliminar',
        'uses' => 'ReservacionCtrl@eliminar'
    ]);

    //---------------------------------------------------SERVICIOS

    Route::get('/solicitar-servicio', [
        'as' => 'publicSolicitarServicio',
        'uses' => 'ServiciosCtrl@solicitud',
        'middleware' => 'auth'
    ]);

    Route::post('/solicitar-servicio', [
        'as' => 'publicPostSolicitarServicio',
        'uses' => 'ServiciosCtrl@solicitar',
        'middleware' => 'auth'
    ]);

    //---------------------------------------------------PREGUNTAS

    Route::get('/preguntas-frecuentes', [
        'as' => 'publicPreguntas',
        'uses' => 'PreguntasCtrl@inicio'
    ]);

    //------------------OPINION

    Route::get('/danos-tu-opinion', [
        'as' => 'publicOpinion',
        'uses' => 'CuentaCtrl@opinion',
        'middleware' => 'auth'
    ]);

    Route::post('/danos-tu-opinion', [
        'as' => 'publicPostOpinion',
        'uses' => 'CuentaCtrl@opinionPost',
        'middleware' => 'auth'
    ]);

    //----------------------------------------------------MENU

    Route::get('/menu', [
        'as' => 'publicMenu',
        'uses' => 'MenuCtrl@inicio'
    ]);

    Route::get('/menu/{id}', [
        'as' => 'publicMenuEspecifico',
        'uses' => 'MenuCtrl@inicio'
    ]);

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

    Route::get('reporte-de-botellas', ['uses' => 'MenuCtrl@botellas', 'as' => 'BotellasReport']);
    Route::get('reporte-sin-alcohol', ['uses' => 'MenuCtrl@bebidas_sin_alc', 'as' => 'BebidasSinAlcReport']);
    Route::get('reporte-de-cervezas', ['uses' => 'MenuCtrl@cervezas', 'as' => 'CervezasReport']);
    Route::get('reporte-con-alcohol', ['uses' => 'MenuCtrl@bebidas_con_alc', 'as' => 'BebidasConAlcReport']);
    Route::get('reporte-de-bebidas-calientes', ['uses' => 'MenuCtrl@bebidas_calientes', 'as' => 'CalientesReport']);
    Route::get('reporte-de-especiales', ['uses' => 'MenuCtrl@bebidas_especiales', 'as' => 'EspecialesReport']);
    Route::get('reporte-de-para-picar', ['uses' => 'MenuCtrl@picar', 'as' => 'PicarReport']);
    Route::get('reporte-de-fuertes', ['uses' => 'MenuCtrl@platos_fuertes', 'as' => 'FuertesReport']);
    Route::get('reporte-de-bocas', ['uses' => 'MenuCtrl@bocas', 'as' => 'BocasReport']);
    Route::get('reporte-de-paninis', ['uses' => 'MenuCtrl@paninis', 'as' => 'PaninisReport']);
    Route::get('reporte-de-comidas', ['uses' => 'MenuCtrl@comidas', 'as' => 'ComidasReport']);
    Route::get('reporte-de-bebidas', ['uses' => 'MenuCtrl@bebidas', 'as' => 'BebidasReport']);
    Route::get('reporte-de-servicios', ['uses' => 'ServiciosCtrl@servicios', 'as' => 'ServiciosReport']);
    Route::get('reporte-de-promociones', ['uses' => 'PromocionesCtrl@promociones', 'as' => 'PromocionesReport']);
    Route::get('reporte-de-usuarios', ['uses' => 'UsuariosCtrl@usuarios_backend', 'as' => 'UsuariosReport']);
    Route::get('reporte-de-clientes', ['uses' => 'UsuariosCtrl@usuarios_clientes', 'as' => 'ClientesReport']);
    Route::get('reporte-de-informacion-empresarial',
        ['uses' => 'EmpresaCtrl@informacion_empresarial', 'as' => 'EmpresaReport']);
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


//================================================RESERVACIONES

        Route::get('/reservaciones/hoy', [
            'as' => 'adminReservacionesHoy',
            'uses' => 'ReservacionesCtrl@hoy',
        ]);

        Route::post('/reservaciones/hoy/aprobar', [
            'as' => 'adminPostReservacionesHoy',
            'uses' => 'ReservacionesCtrl@hoyPost'
        ]);

        Route::get('/reservaciones/esta-semana', [
            'as' => 'adminEmpresa',
            'uses' => 'EmpresaCtrl@inicio',
            //'middleware' => 'empresa'
        ]);

        Route::get('/reservaciones/este-mes', [
            'as' => 'adminEmpresa',
            'uses' => 'EmpresaCtrl@inicio',
            //'middleware' => 'empresa'
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


//================================================OPINIONES

        Route::get('/opiniones', [
            'as' => 'adminOpiniones',
            'uses' => 'OpinionesCtrl@inicio',
        ]);

        Route::post('/opiniones', [
            'as' => 'adminPostOpiniones',
            'uses' => 'OpinionesCtrl@guardar',
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

        Route::post('/cargar/imagen',[
           'as' => 'adminCargarImagen',
            'uses' => 'UsuariosCtrl@imagen'
        ]);

        Route::post('/empleados/nuevo-registro', [
            'as'=> 'adminPostEmpleadosCrear',
            'uses'=>'EmpleadosCtrl@insertar'
        ]);

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

        Route::get('/promociones/{id}/detalles',[
            'as' => 'adminPromocionesDetalles',
            'uses' => 'PromocionesCtrl@Detalles'
        ]);

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

        Route::get('/servicios/{id}/detalles',[
            'as' => 'adminServiciosDetalles',
            'uses' => 'ServiciosCtrl@Detalles'
        ]);

//================================================MENU

        //Restaurante
        Route::get('/menu', [
            'as' => 'adminMenu',
            'uses' => 'MenuCtrl@inicio',
            //'middleware' => 'restaurante'
        ]);
        //Rutas para botellas
        Route::get('/menu/botellas', [
            'as' => 'adminMenuBotellas',
            'uses' => 'MenuCtrl@inicioBotellas'
        ]);

        //BOTELLAS
        Route::get('/menu/botellas/{id}/editar', [
            'as' => 'adminMenuBotellasEditar',
            'uses' => 'MenuCtrl@botellasEditar'
        ]);

        Route::get('/menu/botellas/{id}/eliminar', 'MenuCtrl@eliminarBotellas');

        Route::get('/menu/botellas/{id}/detalles',[
            'as' => 'adminMenuBotellasDetalles',
            'uses' => 'MenuCtrl@botellasDetalles'
        ]);

        //Ruta para sin alcohol

        Route::get('/menu/sin-alcohol', [
            'as' => 'adminMenuSinAlcohol',
            'uses' => 'MenuCtrl@inicioSinAlcohol'
        ]);

        Route::get('/menu/sin-alcohol/{id}/editar', [
            'as' => 'adminMenuSinAlcoholEditar',
            'uses' => 'MenuCtrl@SinAlcoholEditar'
        ]);

        Route::get('/menu/sin-alcohol/{id}/eliminar', 'MenuCtrl@eliminarSinAlcohol');

        Route::get('/menu/sin-alcohol/{id}/detalles',[
            'as' => 'adminMenuSinAlcoholDetalles',
            'uses' => 'MenuCtrl@SinAlcoholDetalles'
        ]);

        //Ruta para cervezas

        Route::get('/menu/cervezas', [
            'as' => 'adminMenuCervezas',
            'uses' => 'MenuCtrl@inicioCervezas'
        ]);

        Route::get('/menu/cervezas/{id}/editar', [
            'as' => 'adminMenuCervezasEditar',
            'uses' => 'MenuCtrl@CervezasEditar'
        ]);

        Route::post('/menu/cervezas/{id}/actualizar', 'MenuCtrl@actualizarCervezas');

        Route::get('/menu/cervezas/{id}/eliminar', 'MenuCtrl@eliminarCervezas');

        Route::get('/menu/cervezas/{id}/detalles',[
            'as' => 'adminMenuCervezasDetalles',
            'uses' => 'MenuCtrl@CervezasDetalles'
        ]);

        //Ruta para con alcohol

        Route::get('/menu/con-alcohol', [
            'as' => 'adminMenuConAlcohol',
            'uses' => 'MenuCtrl@inicioconAlcohol'
        ]);

        Route::get('/menu/con-alcohol/{id}/editar', [
            'as' => 'adminMenuConAlcoholEditar',
            'uses' => 'MenuCtrl@ConAlcoholEditar'
        ]);

        Route::get('/menu/con-alcohol/{id}/eliminar', 'MenuCtrl@eliminarConAlcohol');

        Route::get('/menu/con-alcohol/{id}/detalles',[
            'as' => 'adminMenuconAlcoholDetalles',
            'uses' => 'MenuCtrl@ConAlcoholDetalles'
        ]);

        //Ruta para bebidas calientes

        Route::get('/menu/bebidas-calientes', [
            'as' => 'adminMenuCalientes',
            'uses' => 'MenuCtrl@inicioCalientes'
        ]);

        Route::get('/menu/bebidas-calientes/{id}/editar', [
            'as' => 'adminMenuCalientesEditar',
            'uses' => 'MenuCtrl@CalientesEditar'
        ]);

        Route::post('/menu/bebidas-calientes/{id}/actualizar', 'MenuCtrl@actualizarCalientes');

        Route::get('/menu/bebidas-calientes/{id}/eliminar', 'MenuCtrl@eliminarCalientes');

        Route::get('/menu/bebidas-calientes/{id}/detalles',[
            'as' => 'adminMenuCalientesDetalles',
            'uses' => 'MenuCtrl@CalientesDetalles'
        ]);

        //Ruta para bebidas especiales

        Route::get('/menu/bebidas-especiales', [
            'as' => 'adminMenuEspeciales',
            'uses' => 'MenuCtrl@inicioEspeciales'
        ]);

        Route::get('/menu/bebidas-especiales/{id}/editar', [
            'as' => 'adminMenuEspecialesEditar',
            'uses' => 'MenuCtrl@EspecialesEditar'
        ]);

        Route::post('/menu/bebidas-especiales/{id}/actualizar', 'MenuCtrl@actualizarEspeciales');

        Route::get('/menu/bebidas-especiales/{id}/eliminar', 'MenuCtrl@eliminarEspeciales');

        Route::get('/menu/bebidas-especiales/{id}/detalles',[
            'as' => 'adminMenuEspecialesDetalles',
            'uses' => 'MenuCtrl@EspecialesDetalles'
        ]);

        //Ruta para para picar

        Route::get('/menu/para-picar', [
            'as' => 'adminMenuParaPicar',
            'uses' => 'MenuCtrl@inicioParaPicar'
        ]);

        Route::get('/menu/para-picar/{id}/editar', [
            'as' => 'adminMenuParaPicarEditar',
            'uses' => 'MenuCtrl@ParaPicarEditar'
        ]);

        Route::post('/menu/para-picar/{id}/actualizar', 'MenuCtrl@actualizarParaPicar');

        Route::get('/menu/para-picar/{id}/eliminar', 'MenuCtrl@eliminarParaPicar');

        Route::get('/menu/para-picar/{id}/detalles',[
            'as' => 'adminMenuParaPicarDetalles',
            'uses' => 'MenuCtrl@ParaPicarDetalles'
        ]);


        //Ruta para platos fuertes

        Route::get('/menu/platos-fuertes', [
            'as' => 'adminMenuPlatosFuertes',
            'uses' => 'MenuCtrl@inicioPlatosFuertes'
        ]);

        Route::get('/menu/platos-fuertes/{id}/editar', [
            'as' => 'adminMenuPlatosFuertesEditar',
            'uses' => 'MenuCtrl@PlatosFuertesEditar'
        ]);

        Route::post('/menu/platos-fuertes/{id}/actualizar', 'MenuCtrl@actualizarPlatosFuertes');

        Route::get('/menu/platos-fuertes/{id}/eliminar', 'MenuCtrl@eliminarPlatosFuertes');

        Route::get('/menu/platos-fuertes/{id}/detalles',[
            'as' => 'adminMenuPlatosFuertesDetalles',
            'uses' => 'MenuCtrl@PlatosFuertesDetalles'
        ]);

        //Ruta para bocas

        Route::get('/menu/bocas', [
            'as' => 'adminMenuBocas',
            'uses' => 'MenuCtrl@inicioBocas'
        ]);

        Route::get('/menu/bocas/{id}/editar', [
            'as' => 'adminMenuBocasEditar',
            'uses' => 'MenuCtrl@BocasEditar'
        ]);

        Route::post('/menu/bocas/{id}/actualizar', 'MenuCtrl@actualizarBocas');

        Route::get('/menu/bocas/{id}/eliminar', 'MenuCtrl@eliminarBocas');

        Route::get('/menu/bocas/{id}/detalles',[
            'as' => 'adminMenuBocasDetalles',
            'uses' => 'MenuCtrl@BocasDetalles'
        ]);

        //Ruta para paninis

        Route::get('/menu/paninis', [
            'as' => 'adminMenuPaninis',
            'uses' => 'MenuCtrl@inicioPaninis'
        ]);

        Route::get('/menu/paninis/{id}/editar', [
            'as' => 'adminMenuPaninisEditar',
            'uses' => 'MenuCtrl@PaninisEditar'
        ]);

        Route::post('/menu/paninis/{id}/actualizar', 'MenuCtrl@actualizarPaninis');

        Route::get('/menu/paninis/{id}/eliminar', 'MenuCtrl@eliminarPaninis');

        Route::get('/menu/paninis/{id}/detalles',[
            'as' => 'adminMenuPaninisDetalles',
            'uses' => 'MenuCtrl@PaninisDetalles'
        ]);

        //GENERALES-----------------

        Route::get('/menu/nuevo-registro', [
            'as' => 'adminMenusNuevo',
            'uses' => 'MenuCtrl@nuevaOpcion',
            //'middleware' => 'restaurante'
        ]);

        Route::post('/menu/nuevo-registro', 'MenuCtrl@insertar');

        Route::get('/menu/{id}/editar', [
            'as' => 'adminMenusEditar',
            'uses' => 'MenuCtrl@editar'
        ]);

        Route::post('/menu/{id}/actualizar', 'MenuCtrl@actualizar');

        Route::get('/menu/{id}/eliminar', 'MenuCtrl@eliminar');

        Route::get('/menu/{id}/detalles',[
            'as' => 'adminMenuDetalles',
            'uses' => 'MenuCtrl@Detalles'
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

