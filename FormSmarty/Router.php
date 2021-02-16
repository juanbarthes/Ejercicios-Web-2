<?php
require_once "controllers/FormController.php";
require_once "RouterClass.php";

 // CONSTANTES PARA RUTEO
 define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

 $r = new Router();

//Ruta por defecto.
$r->setDefaultRoute("FormController", "Home");

// rutas
$r->addRoute("validate", "POST", "FormController", "Home");

//Run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
