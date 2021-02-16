<?php
require_once './Model/SongModel.php';
require_once './View/SongView.php';

class SongController  
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new SongModel();
        $this->view = new SongView();
    }

    private function checkLoggedIn() //Verifica si el usuario esta logueado. Deben llamarla todos los Controllers para cada accion que requiera permisos de usuario.
    {
        if (session_status() == PHP_SESSION_NONE) { //para evitar que se llame varias veces a session_start() en un mismo flujo
            session_start();
            if (!empty($_SESSION["EMAIL"])) {
                return true;
            }
        }

        return false;
    }

    public function insertSong()
    {
        if (!$this->checkLoggedIn()) {
            header(LOGIN);//asumo que tengo definido el enrutamiento para que me redireccione al login si el usuario no estuviera loggeado.
        } else {
            $name = $_POST["nombre"];
            $duration = $_POST["duracion"];
            $rate = $_POST["valoracion"];
            $album = $_POST["album"];//como la consigna no especifica asumo que el formulario ya trae de alguna forma la id del album.
            if (isset($name, $duration, $rate, $album)) {
                if (!empty($name) && !empty($duration) && !empty($rate) && !empty($album) ) {
                    if (!$this->duplicate($name)) {
                        $this->model->insert($name, $duration, $rate, $album);
                    }
                }
            }
        }
    }

    private function duplicate($name)//trabajo con el nombre porque el enunciado no aclara como en base a que comparar si 2 canciones son iguales.
    {
        $songs = $this->model->getAll();
        $duplicate = false;
        foreach ($songs as $song) {
            if ($song->nombre == $name) {
                $duplicate = true;
            }
        }
        return $duplicate;
    }
}
