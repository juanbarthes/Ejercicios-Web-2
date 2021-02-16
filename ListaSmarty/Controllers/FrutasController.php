<?php
require_once "./Views/FrutasView.php";
require_once "./Models/FrutasModel.php";
class FrutasController  
{
    private $view;
    private $model;

    public function __construct()
    {
        $this->view = new FrutasView();
        $this->model = new FrutasModel();
    }
    public function Home()
    {
        $frutas = $this->model->getFrutas();
        $this->view->showFrutas($frutas);
    }
}
