<?php

require_once "./helper/Helper.php";
require_once "./helper/Mailer.php";
require_once "./views/UserView.php";
require_once "./models/UserModel.php";

class LoginController extends SecuredController
{
    private $title;
    private $action;
    private $model;
    private $view;
    private $subtitle;
    private $link;

    public function __construct()
    {
        $this->title = "Movie Club";
        $this->subtitle = 'Login';
        $this->action = "check-login";
        $this->link = "./";
        $this->model = new UserModel();
        $this->view = new UserView();
    }

    public function login()
    {
        $user = array(
            'id_user' => '',
            'email' => '',
            'password' => '',
        );
        $this->view->userForm($this->title, $user, $this->link, $this->isAdmin, $this->subtitle, $this->action);
    }

    public function checkLogin($email = "", $password = "")
    {
        if (($email == "") && ($password == "")) {
            $email = $_POST['email'];
            $password = $_POST['password'];
        }

        $user = $this->model->getUserEmail($email);

        $userEmpty = array(
            'id_user' => '',
            'email' => '',
            'password' => '',
        );

        if (!empty($user)) {
            if (password_verify($password, $user['password'])) {
                session_start();

                $_SESSION['user'] = array($email, $user['admin'], $user['id_user']);

                header(HOME);
            } else {
                $this->view->userForm($this->title, $userEmpty, $this->link, $this->isAdmin, $this->subtitle, $this->action, "Email or password are incorrect");
            }
        } else {
            $this->view->userForm($this->title, $userEmpty, $this->link, $this->isAdmin, $this->subtitle, $this->action, "User not found");
        }
    }

    public function createRandomCode()
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789";
        srand((float) microtime() * 1000000);
        $i = 0;
        $pass = '';

        while ($i <= 7) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }

        return time() . $pass;
    }

    public function sendMessage()
    {
        $email = $_POST['email'];

        if (isset($email)) {

            $user = $this->model->getUserEmail($email);

            $code = $this->createRandomCode();

            $date = date("Y-m-d H:i:s", strtotime('+24 hours'));

            if (isset($user)) {
                $this->model->updateCode($date, $code, $user['id_user']);

                $mailer = new Mailer();
                $body = 'Hello!
                <br>We receive a request from ' . Helper::getOS() . ' in ' . Helper::getBrowser() . ' browser to recover the password
                <br>To recover your account please enter the following link:
                <br>Recovery link <a href="http://' . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . '/reset-password/' . $code . '">HERE</a>
                <br>If you did not ask to recover it, ignore this message.';
                $subject = 'Recover Password';

                $message = $mailer->sendMail($email, $subject, $body);
                $this->recoverPassword($message);
            } else {
                $message = "This user doesn't exist";
                $this->recoverPassword($message);
            }
        }
    }

    public function resetPassword($params)
    {
        $code = $params[0];

        if (isset($code)) {
            $user = $this->model->getUserCode($code);

            if (isset($user)) {

                $current = date("Y-m-d H:i:s");

                if (strtotime($current) < strtotime($user["date"])) {

                $message = "";
                $subtitle = "Reset Password";
                $link = "../";
                $this->action = "update-password";
                $this->view->userForm($this->title, $user, $link, $this->login, $subtitle, $this->action, $message);
              } else {
                header(HOME);
              }
            }
        }
    }

    public function recoverPassword($message = '')
    {
        $subtitle = "Recover password";
        $this->view->showRecoverPassword($this->title, $subtitle, $this->link, $this->login, $message);
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header(HOME);
    }
}
