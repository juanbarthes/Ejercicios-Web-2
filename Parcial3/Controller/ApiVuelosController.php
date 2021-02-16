<?php

require_once './Model/VuelosModel.php';
require_once './View/ApiVuelosView.php';
require_once 'ApiController.php';

class ApiVuelosController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new VuelosModel();
    }

    function get($params = [])
    {
        if (empty($params)) {
            $vuelos = $this->model->getVuelos();
            return $this->view->response($vuelos, 200);
        } else {
            $vuelo = $this->model->getVuelo($params[":ID"]);
            if (!empty($vuelo)) {
                return $this->view->response($vuelo, 200);
            } else {
                return $this->view->response('El vuelo solicitado no existe', 500);
            }
        }
    }

    public function insertar()
    {
        $vuelo = $this->getData();

        if (isset($vuelo->nro, $vuelo->fecha, $vuelo->origen, $vuelo->destino, $vuelo->estado)) {
            if (!empty($vuelo->nro) && !empty($vuelo->nro) && !empty($vuelo->nro) && !empty($vuelo->nro) && !empty($vuelo->nro)) {
                $this->model->insertarVuelo($vuelo->nro, $vuelo->fecha, $vuelo->origen, $vuelo->destino, $vuelo->estado);
                $this->get();
            }
        } else {
            $this->view->response('Faltan datos para agregar el vuelo', 404);
        }
    }

    public function borrar($params = null)
    {
        $id = $params[':ID'];
        $aux = $this->model->getVueloId($id);
        if ($aux != null) {
            $this->model->borrarVuelo($id);
            $vuelo = $this->model->getVueloId($id);
            if ($vuelo != null) {
                $this->view->response('No se pudo borrar el vuelo', 500);
            } else {
                $this->get();
            }
        } else {
            $this->view->response('No se pudo borrar el vuelo porque no existe', 500);
        }
    }

    public function editar($params)
    {
        $id = $params[':ID'];
        $body = $this->getData();
        $vuelo = $this->model->editarVuelo($id, $body->nro, $body->fecha, $body->origen, $body->destino, $body->estado);
        if (!$vuelo) {
            $this->view->response('No se pudo actualizar', 500);
        } else {
            $this->get($params);
        }
    }
}
