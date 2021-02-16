<?php
    require_once 'Controllers/FrutasController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "FrutasController", "Home");
    $r->addRoute("mermelada", "GET", "FrutasController", "Home");

    //Ruta por defecto.
    $r->setDefaultRoute("FrutasController", "Home");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>