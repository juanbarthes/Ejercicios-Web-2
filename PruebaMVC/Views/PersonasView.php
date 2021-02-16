<?php
class PersonasView
{
    private $title;
    
    function __construct()
    {
        $this->title = "Lista de personas";
    }

    function showHome($personas)
    {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>';
        echo "<h1>". $this->title. "</h1>";
        echo "<br>";
        foreach ($personas as $persona) {
            echo "Nombre: ". $persona->nombre. " Apellido: ". $persona->apellido;
            echo "<hr>";
        }
        echo '<form action="insert" method="post">
            <input type="text" name="nombre" id="nombre" placeholder="su nombre">
            <input type="text" name="apellido" id="apellido" placeholder="su apellido">
            <input type="submit" value="enviar">
        </form>';
        echo "<hr>";
        echo "<h1>Borrar</h1>";
        echo '<form action="delete" method="post">
            <input type="number" name="id_persona" id="id_persona" placeholder="id de persona">
            <input type="submit" value="enviar">
        </form>';
        echo "<hr>";
       echo "<h1>Actualizar</h1>";
        echo '<form action="update" method="post">
            <input type="number" name="id_persona" id="id_persona" placeholder="id de persona">
            <input type="text" name="nombre" id="nombre" placeholder="su nombre">
            <input type="text" name="apellido" id="apellido" placeholder="su apellido">
            <input type="submit" value="enviar">
        </form>';
        echo '</body>
        </html>';
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    
}
