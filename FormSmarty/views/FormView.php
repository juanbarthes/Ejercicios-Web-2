<?php
require_once "./libs/smarty/Smarty.class.php";

class FormView  
{
    private $title;
    private $smarty;

    public function __construct()
    {
        $this->title = "Registro de Usuario";
        $this->smarty = new Smarty();
        $this->smarty->assign("titulo", $this->title);
    }

    public function showSuccess($name, $email)
    {
        $this->smarty->assign("nombre", $name);
        $this->smarty->assign("email", $email);
        $this->smarty->display("templates/success.tpl");
    }

    public function showHome($name =null, $email=null, $error=null)
    {
        $this->smarty->assign("nombre", $name);
        $this->smarty->assign("email", $email);
        $this->smarty->assign("error", $error);
        $this->smarty->display("templates/content.tpl");
    }

    public function showHomeLocation()
    {
        header("Location: ".BASE_URL."home");
    }
}
