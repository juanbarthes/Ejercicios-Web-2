<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid facere nesciunt ducimus aspernatur delectus earum reprehenderit consequuntur iure eveniet temporibus fuga iusto, necessitatibus ratione doloremque illum ullam illo hic et.</p>
</body>
</html>
<?php
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    if (($name != "") && ($lastname != "") && ($age != "")) {
        echo "Nombre:". $name. "<br>". "Apellido:". $lastname. "<br>". "Edad:". $age;
    }