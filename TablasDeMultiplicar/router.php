<?php
    require_once "index.php";
    if (isset($_GET["action"] && !empty($_GET["action"])) {
        $action = $_GET["action"];
    }
    else {
        $action = "50";
    }

    generarTabla($action, $action);
   