<?php
require_once('./helper/Router.php');
require_once('./api/controllers/CommentsApiController.php');

// CONSTANTES PARA RUTEO
define('HOME', 'Location: http://' . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
define('MOVIES', 'Location: http://' . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . '/movies/');
define('USERS', 'Location: http://' . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . '/users/');

$router = new Router();

// rutas

$router->addRoute("comments/:ID/average", "GET", "CommentsApiController", "getAverage");
$router->addRoute("comments", "GET", "CommentsApiController", "getComments");
$router->addRoute("comments", "GET", "CommentsApiController", "getComments");
$router->addRoute("comments/:ID", "GET", "CommentsApiController", "getCommentsMovieOrderBy");
$router->addRoute("comments", "POST", "CommentsApiController", "addComment");
$router->addRoute("comments/:ID", "DELETE", "CommentsApiController", "deleteComment");

//run
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
