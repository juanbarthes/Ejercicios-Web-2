<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de multiplicar</title>
</head>
<body>
    <h1>Tablas de multiplicar!</h1>
    <form action="index.php" method="post">
    <label for="rLimit">Limite de filas</label>
    <input type="number" name="rLimit" required>
    <label for="cLimit">Limite de filas</label>
    <input type="number" name="cLimit" required>
    <input type="submit" value="Generar">
    </form>
</body>
</html>

<?php
    if (isset($_POST)) {
        if (isset($_POST["rLimit"]) && is_numeric($_POST["rLimit"])) {
            $rLimit = $_POST["rLimit"];
            if (isset($_POST["cLimit"]) && is_numeric($_POST["cLimit"])) {
                $cLimit = $_POST["cLimit"];
            }
        }
        if (isset($rLimit) && isset($cLimit)) {
            echo "<table>" . generarTabla($rLimit, $cLimit) . "</table>";
        }
    }

    function generarTabla($rLimit, $cLimit)
    {
        $table = "";
        for ($i=0; $i < $rLimit; $i++) { 
            $table .= generarFila($i+1, $cLimit);
        }
        return "<tbody>" . $table . "</tbody>";
    }

    function generarFila($number, $cLimit)
    {
        $row = "";
        for ($i=1; $i <= $cLimit; $i++) { 
            $row .= "<td>". ($number * $i) . "</td>";
        }
        return "<tr>" . $row . "</tr>";
    }