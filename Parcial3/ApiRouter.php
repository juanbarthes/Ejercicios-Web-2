<?php
    require_once 'RouterClass.php';
    require_once 'Controller/ApiVuelosController.php';
    require_once 'Controller/ApiController.php';
    
    // CONSTANTES PARA RUTEO
    define('LOGIN', 'Location: http://' . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . '/login');
    define('BASE_URL', 'Location: http://' . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . '/home');
    define('PRODUCTOS', 'Location: http://' . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . '/productos');


    $r = new Router();

    /*--EndPoints--
    /api/vuelo/nro_vuelo (detalles de un vuelo)
    /api/ciudades (lista de ciudades)
    /api/vuelos (Insertar vuelo con POST)
    /api/vuelos/estado (Obtener vuelos segun su estado)
    /api/vuelos/ciudad (Obtener vuelos segun ciudad)
    /api/vuelos/fecha (obtener vuelos segun fecha)
    */
    // rutas
    //ruta, metodo, controlador, funcion
    /*---vuelos---*/
    $r->addRoute('vuelos', 'GET', 'ApiVuelosController', 'get');
    $r->addRoute('vuelos/:ID', 'GET', 'ApiVuelosController', 'get');
    $r->addRoute('vuelos', 'POST', 'ApiVuelosController', 'insertar');
    $r->addRoute('vuelos/:ID', 'POST', 'ApiVuelosController', 'editar');
    $r->addRoute('vuelos/:ID', 'DELETE', 'ApiVuelosController', 'borrar');
    $r->addRoute('vuelos/:ID', 'PUT', 'ApiVuelosController', 'editar');

 


    //Ruta por defecto.
    //$r->setDefaultRoute("CategoriasController", "home");

    //run
    $r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
