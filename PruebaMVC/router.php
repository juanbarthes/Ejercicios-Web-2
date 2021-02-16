<?php
require_once "Controllers/PersonasController.php";
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
$controller_personas = new PersonasController();

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode("/", $action);

switch ($params[0]) {
    case 'home':
        $controller_personas->home();
    break;
    case 'insert':
        $controller_personas->insertPersona();
    break;
    case 'delete':
         {
            $controller_personas->deletePersona();
        }
    break;
    case 'update':
        $controller_personas->updatePersona();
    break;
    
    default:
        # code...
        break;
}