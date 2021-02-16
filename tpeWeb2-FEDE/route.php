<?php

require_once "config/ConfigApp.php";
require_once "controllers/GenreController.php";
require_once "controllers/MovieController.php";
require_once "controllers/UserController.php";
require_once "controllers/LoginController.php";
require_once "controllers/SecuredController.php";

function parseURL($url)
{
    $urlExploded = explode('/', $url);
    $arrayReturn[ConfigApp::$ACTION] = $urlExploded[0];
    $arrayReturn[ConfigApp::$PARAMS] = isset($urlExploded[1]) ? array_slice($urlExploded, 1) : null;
    return $arrayReturn;
}

if (isset($_GET['action'])) {
    $urlData = parseURL($_GET['action']);
    $action = $urlData[ConfigApp::$ACTION];
    if (array_key_exists($action, ConfigApp::$ACTIONS)) {
        $params = $urlData[ConfigApp::$PARAMS];
        $action = explode('#', ConfigApp::$ACTIONS[$action]);
        $controller = new $action[0]();
        $metodo = $action[1];
        if (isset($params) && $params != null) {
            echo $controller->$metodo($params);
        } else {
            echo $controller->$metodo();
        }
    } else {
        $controller = new GenreController();
    }
}
