<?php

require_once "./libs/Smarty.class.php";

class UserView
{
    function userForm($title, $user, $link, $login, $subtitle, $action, $message = '') {
        $smarty = new Smarty();

        $smarty->assign('user', $user);
        $smarty->assign('link', $link);
        $smarty->assign('login', $login);
        $smarty->assign('subtitle', $subtitle);
        $smarty->assign('title', $title);
        $smarty->assign('action', $action);
        $smarty->assign('message', $message);

        $smarty->display('templates/userForm.tpl');
    }

    function showUsers($title, $link, $subtitle, $email, $login, $users) {
        $smarty = new Smarty();

        $smarty->assign('users', $users);
        $smarty->assign('title', $title);
        $smarty->assign('link', $link);
        $smarty->assign('login', $login);
        $smarty->assign('email', $email);
        $smarty->assign('subtitle', $subtitle);

        $smarty->display('templates/users.tpl');

    }

    function showRecoverPassword($title, $subtitle, $link, $login, $message = '') {
        $smarty = new Smarty();
        $smarty->assign('title', $title);
        $smarty->assign('subtitle', $subtitle);
        $smarty->assign('login', $login);
        $smarty->assign('link', $link);
        $smarty->assign('message', $message);

        $smarty->display('templates/recover-password.tpl');
    }

}
