<?php

require_once './Model/VuelosModel.php';

class VuelosController
{

    private $model;

    public function __construct()
    {
        $this->model = new VuelosModel();
    }

    public function get()
    {
        $vuelos = $this->model->getVuelos();
        print_r($vuelos);
    }
}
