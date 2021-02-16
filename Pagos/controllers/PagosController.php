<?php
    require_once "./View/TasksView.php";
    require_once "./Model/TasksModel.php";

    class PagosController{
        private $view;
        private $model;
        function __construct()
        {
            $this->view = new TaskView();
            $this->model = new TasksModel();
        }

        function home(){
            $tasks = $this->model->GetTasks();
            $this->view->ShowHome($tasks);
        }

        function insertPago(){
            $this->model->InsertPago($_POST['deudor'],$_POST['cuotaNro'],$_POST['monto'],$_POST['fecha']);
            $this->view->ShowHomeLocation();
        }

        function borrarPago($params = null){
            $task_id = $params[':ID'];
            $this->model->DeleteTaskDelModelo($task_id);
            $this->view->ShowHomeLocation();
        }
    }