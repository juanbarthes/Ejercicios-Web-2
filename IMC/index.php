<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora IMC</title>
</head>
<body>
    <h1>Calculadora de IMC</h1>
    <form action="index.php" method="post">
        <label for="weight">Peso(kg)</label>
        <input type="number" name="weight" required>
        <label for="height">Altura(cm)</label>
        <input type="number" name="height" required>
        <input type="submit" value="Calcular">
    </form>
</body>
</html>

<?php
    if (isset($_POST) && (!empty($_POST))) {
        if (isset($_POST["weight"]) && is_numeric($_POST["weight"])) {
            $weight = $_POST["weight"];
        }
        if (isset($_POST) && (!empty($_POST))) {
            if (isset($_POST["height"]) && is_numeric($_POST["height"])) {
                $height = $_POST["height"]/100;//la pasamos a metros porque estaba expresada en cms.
            }
    }
    if (isset($weight) && isset($height)) {
        $imc = getIMC($weight, $height);
        $status = getStatus($imc);
        echo("<p>Resultado IMC: " . $imc . " puntos</p>");
        echo("<p>Su estado es: " . $status . "</p>");
    }
}

function getIMC($weight, $height){
    return $weight / $height;
}

function getStatus($imc){
    if ($imc < 18.50) {
        return "Bajo peso";
    }
        else if($imc <= 24.99){
            return "Normal";
        }
        else if($imc < 30){
            return "Sobrepeso";
        }
        else {
            return "Obesidad";
        }
    }?>

