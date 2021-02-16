<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h1>Calculadora!!!</h1>
    <form action="calculadora.php" method="post">
        <input name="first" type="number" required>
        <select name="operation" id="">
            <option value="suma"> + </option>
            <option value="resta"> - </option>
            <option value="multiplicacion"> * </option>
            <option value="division"> / </option>
        </select>
        <input name="second" type="number" required>
        <input type="submit" value="Calcular">
    </form>
</body>
</html>

<?php
    function calcular($first, $operation, $second){
        $result = "";
        switch($operation){
            case 'suma':
                $result = "<span>" . ($first + $second) . "</span>";
                break;
            case 'resta':
                $result = "<span>" . ($first - $second) . "</span>";               
                break;
            case 'multiplicacion':
                $result = "<span>" . ($first * $second) . "</span>";
                break;
            case 'division':
                $result = "<span>" . ($first / $second) . "</span>";
                break;
        }
        echo "El resultado es: " . $result;
    }
    if ((isset($_POST["first"]))&&(isset($_POST["operation"]))&&(isset($_POST["second"]))) {
        calcular($_POST["first"], $_POST["operation"], $_POST["second"]);
    }
?>