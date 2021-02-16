<?php

require_once('libs/Smarty.class.php');

class GenreView
{

    public function home($title, $isAdmin, $link, $genres, $login, $email)
    {
        $smarty = new Smarty();
        $smarty->assign('title', $title);
        $smarty->assign('isAdmin', $isAdmin);
        $smarty->assign('link', $link);
        $smarty->assign('genres', $genres);
        $smarty->assign('login', $login);
        $smarty->assign('email', $email);

        $smarty->display('templates/index.tpl');
    }

    public function genreForm($title, $subtitle, $login, $email, $link, $action, $genre, $id = -1, $message = "") {
        $smarty = new Smarty();
        $smarty->assign('title', $title);
        $smarty->assign('subtitle', $subtitle);
        $smarty->assign('login', $login);
        $smarty->assign('email', $email);
        $smarty->assign('link', $link);
        $smarty->assign('action', $action);
        $smarty->assign('genre', $genre);
        $smarty->assign('id', $id);
        $smarty->assign('message', $message);

        $smarty->display('templates/genreForm.tpl');
    }
}