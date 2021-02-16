<?php

require_once "./Views/PersonasView.php";
require_once "./Models/PersonasModel.php";

class PersonasController{

    private $view;
    private $model;

    function __construct(){
        $this->view = new PersonasView();
        $this->model = new PersonasModel();
    }

    function home()//el controller se comunica con el model y el view para mostrar datos por pantalla.
    {
        $personas = $this->model->getPersonas();
        $this->view->ShowHome($personas);
    }

    function insertPersona()//el controller se comunica con el model para insertar una persona.
    {
        $nombre = "desconocido";
        $apellido = "desconocido";
        if (isset($_POST["nombre"]) && $_POST["nombre"] != "") {
            $nombre = $_POST["nombre"];
        }
        if (isset($_POST["apellido"]) && $_POST["apellido"] != ""){
            $apellido = $_POST["apellido"];
        }
        $this->model->insertPersona($nombre, $apellido);
        $this->view->ShowHomeLocation();
    }

    function deletePersona()//el controller se comunica con el model para borrar una persona.
    {
        if (isset($_POST["id_persona"])) {
            $id = $_POST["id_persona"];
        }
        if ($id != "") {
            $this->model->deletePersona($id);
        }
        $this->model->deletePersona($id);
        $this->view->ShowHomeLocation(); 
    }

    function updatePersona()//el controller se comunica con el model para borrar una persona.
    {
        if (isset($_POST["id_persona"]) && isset($_POST["nombre"]) && isset($_POST["apellido"])) {
            $id = $_POST["id_persona"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
        }

        if ($id != "") {
            if ($nombre == "") {
                $nombre = "desconocido";
            }
            if ($apellido == "") {
                $apellido = "desconocido";
            }
            $this->model->updatePersona($id, $nombre, $apellido);
        }
        $this->view->ShowHomeLocation(); 
    }
}