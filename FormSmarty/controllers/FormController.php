<?php
require_once "./views/FormView.php";

class FormController  
{
    private $view;
    private $model;

    public function __construct()
    {
        $this->view = new FormView();
    }

    public function Home()
    {
        $this->validate();
    }

    public function validate()
    {
        $name = "";
        $email = "";
        $error = "";
        if (sizeof($_POST) != 0) {
            if ($_POST["name"] != "") {
                $name = $_POST["name"];
                if ($_POST["email"] != "") {
                    $email = $_POST["email"];
                    if ($_POST["password1"] != "") {
                        if ($_POST["password1"] == $_POST["password2"]) {
                            $this->view->showSuccess($name, $email);
                        }
                        else {
                            $error = "Las contraseñas no coinciden";
                        }
                    }
                }
                else {
                    $error = "Complete todos los campos obligatorios";
                }
            }
            else {
                $error = "Complete todos los campos obligatorios";
            }
        }
        else {
            $this->view->showHome($name, $email);
            //$this->view->showHomeLocation();
        }
        if ($error != "") {
            $this->view->showHome($name, $email, $error);
            //$this->view->showHomeLocation();
        }
    }
}

