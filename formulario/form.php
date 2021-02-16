<?php
    function validateForm($inputs){
        if (isset($inputs["name"])&&($inputs["name"] != "")) {
        if (isset($inputs["lastname"]) && ($inputs["lastname"] != "")) {
            if (isset($inputs["age"])&& ($inputs["age"] != "")) {
                createList($inputs["name"], $inputs["lastname"], $inputs["age"]);
            }
        }
    }
}

function createList($name, $lastname, $age){
    $list = ""; 
    $list .= createListItem($name);
    $list .= createListItem($lastname);
    $list .= createListItem($age);
    echo "<ul>". $list ."</ul>";
}

function createListItem($item){
    return "<li>" . $item . "</li>";
}

    print_r($_POST);//imprime el arreglo de datos que recibio con el metodo POST
    validateForm($_POST);

?>