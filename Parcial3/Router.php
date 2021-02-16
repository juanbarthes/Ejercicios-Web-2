<?php
    require_once 'RouterClass.php';
    require_once 'Controller/VuelosController.php';
    
    // CONSTANTES PARA RUTEO
    define('LOGIN', 'Location: http://' . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . '/login');
    define('BASE_URL', 'Location: http://' . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . '/home');
    define('PRODUCTOS', 'Location: http://' . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . '/productos');


    $r = new Router();

    //ruta, metodo, controlador, funcion
    $r->addRoute('vuelos', 'GET', 'VuelosController', 'get');


    //Ruta por defecto.
    //$r->setDefaultRoute("VuelosController", "home");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
