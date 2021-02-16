<?php
require_once "./libs/smarty/Smarty.class.php";
class FrutasView
{
    private $title;
    private $smarty;
    public function __construct()
    {
        $this->title = "Lista de Frutas";
        $this->smarty = new Smarty();
    }
    public function showFrutas($fruits)
    {
        $this->smarty->assign("titulo", $this->title);
        $this->smarty->assign("frutas", $fruits);
        $this->smarty->display("./templates/Content.tpl");
    }
    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }
}