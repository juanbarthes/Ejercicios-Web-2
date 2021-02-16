<?php
    require_once "operaciones.php";
    require_once "pi.php";
    require_once "index.php";

    if (isset($_GET["action"]) && !empty($_GET["action"])) {
        $action = $_GET["action"];
    }
    else{
        $action = "home";
    }

    $params = explode("/", $action);
    switch ($params[0]) {
        case 'sumar':
            getSuma($params[1], $params[2]);
            break;
        case 'restar':
            getResta($params[1], $params[2]);
            break;
        case 'multiplicar':
            getProducto($params[1], $params[2]);
             break;
        case 'dividir':
            getDivision($params[1], $params[2]);
            break;
        case 'pi':
            showPi();
            break;
        case 'home':
            echo "usaste la calculadora desde los iputs";
            break;
    }