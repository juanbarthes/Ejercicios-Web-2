<?php

require_once "./views/UserView.php";
require_once "./models/UserModel.php";

class UserController extends SecuredController
{
    private $title;
    private $subtitle;
    private $action;
    private $view;
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->title = "Movie Club";
        $this->action = "insert-user";
        $this->link = "./";
        $this->model = new UserModel();
        $this->view = new UserView();
    }

    public function insertUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->model->getUserEmail($email);

        if (empty($user) && (isset($email, $password))) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $this->model->insertUser($email, $hash);
            $loginController = new LoginController();
            $loginController->checklogin($email, $password);
        } else {
            $this->subtitle = 'Register';
            $this->subtitle = 'Register';
            $user = array(
                'id_user' => '',
                'email' => '',
                'password' => '',
            );
            $this->view->userForm($this->title, $user, $this->link, $this->isAdmin, $this->subtitle, $this->action, 'This email is already used, please try use another one');
        }
    }

    public function addUser()
    {
        $this->subtitle = 'Register';
        $user = array(
            'id_user' => '',
            'email' => '',
            'password' => '',
        );
        $this->view->userForm($this->title, $user, $this->link, $this->isAdmin, $this->subtitle, $this->action);
    }

    public function showUsers()
    {
        if ($this->isAdmin) {
            $this->subtitle = 'Users';
            $users = $this->model->getUsers();
            $this->link = "../";
            $this->view->showUsers($this->title, $this->link, $this->subtitle, $this->email, $this->isAdmin, $users);
        } else {
            header(HOME);
        }
    }

    public function userPrivileges($params)
    {
        if ($this->isAdmin) {
            $id = $params[0];
            if ($this->id != $id) {
                if ($params[1] == 0)
                    $admin = 1;
                else
                    $admin = 0;
                $this->model->updateUserPrivileges($id, $admin);
            }
        }
        header(USERS);
    }

    public function deleteUser($params)
    {
        if ($this->isAdmin) {
            $id = $params[0];
            if ($this->id != $id) {
                $this->model->deleteUser($id);
            }
            
        }
        header(USERS);
    }

    public function resetPassword()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->model->getUserEmail($email);

        if (!empty($user) && (isset($email, $password))) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $this->model->updatePasswordUser($user['id_user'], $hash);
        }
        header(HOME);
    }
}
