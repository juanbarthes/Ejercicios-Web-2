<?php
require_once './Model/TasksModel.php';
require_once 'ApiController.php';

class ApiTasksController extends ApiController {

  
    function __construct() {
        parent::__construct();
        $this->model = new TasksModel();
        $this->view = new APIView();
    }

    public function GetTasks($params = null) {
        $tasks = $this->model->GetTasks();
        $this->view->response($tasks, 200);
    }

    public function GetTask($params = null) {
        $id = $params[':ID'];
        $task = $this->model->GetTask($id);

        if (!empty($task)) // verifica si la tarea existe
            $this->view->response($task, 200);
        else
            $this->view->response("La tarea con el id=$id no existe", 404);
    }
    
    public function DeleteTask($params = null) {
        $id = $params[':ID'];
        $result =  $task = $this->model->DeleteTaskDelModelo($id);

        if($result > 0)
            $this->view->response("La tarea con el id=$id fue eliminada", 200);
        else
            $this->view->response("La tarea con el id=$id no existe", 404);
    }

    public function InsertTask($params = null){
        $body = $this->getData();

        $idTask = $this->model->InsertTask($body->title,$body->description,$body->completed,$body->priority);

        if (!empty($idTask)) // verifica si la tarea existe
            $this->view->response( $this->model->GetTask($idTask), 201);
        else
            $this->view->response("La tarea no se pudo insertar", 404);
    }

    public function UpdateTask($params = null){
        $id = $params[':ID'];
        $body = $this->getData();

        $task = $this->model->GetTask($id);
        if (empty($task)) {
            $this->view->response("La tarea con el id=$id no existe", 404);
        }else {
            $result = $this->model->UpdateTask($id,$body->title,$body->description,$body->completed,$body->priority);
            if($result > 0)
                $this->view->response( $this->model->GetTask($id), 200);
            else
                $this->view->response("La tarea con el id=$id no fue actualizada", 204);
        }
    }
}