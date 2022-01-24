<?php
require_once 'RouterClass.php';
require_once 'api/ApiTasksController.php';

// instacio el router
$router = new Router();

// armo la tabla de ruteo de la API REST
$router->addRoute('tareas', 'GET', 'ApiTasksController', 'GetTasks');
$router->addRoute('tareas/:ID', 'GET', 'ApiTasksController', 'GetTask');
$router->addRoute('tareas/:ID', 'DELETE', 'ApiTasksController', 'DeleteTask');

$router->addRoute('tareas', 'POST', 'ApiTasksController', 'InsertTask');


$router->addRoute('tareas/:ID', 'PUT', 'ApiTasksController', 'UpdateTask');


 //run
 $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 