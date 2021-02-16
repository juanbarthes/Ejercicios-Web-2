<?php

class SecuredController
{
    protected $isAdmin;
    protected $login;
    protected $email;
    protected $id;

    function __construct()
    {
        session_start();
        $this->email = $this->getEmail();
        $this->login = $this->checkLogin();
        $this->isAdmin = $this->isAdmin();
        $this->id = $this->getId();
    }

    function getId()
    {
        if (isset($_SESSION['user']))
            return ($_SESSION['user'][2]);
    }

    function getEmail()
    {
        if (isset($_SESSION['user']))
            return ($_SESSION['user'][0]);
    }

    function checkLogin()
    {
        return (isset($_SESSION['user']));
    }

    function isAdmin()
    {
        if (isset($_SESSION['user'])) {
            return ($_SESSION['user'][1]);
        }
    }
}
