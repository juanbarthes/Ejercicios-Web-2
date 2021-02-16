<?php

require_once('libs/Smarty.class.php');

class MovieView
{
    public function showMovie($title, $isAdmin , $link, $movie, $login, $genre, $images, $email = "null", $id_user = "null")
    {
        $smarty = new Smarty();
        $smarty->assign('id_user', $id_user);
        $smarty->assign('title', $title);
        $smarty->assign('isAdmin', $isAdmin);
        $smarty->assign('link', $link);
        $smarty->assign('movie', $movie);
        $smarty->assign('login', $login);
        $smarty->assign('email', $email);
        $smarty->assign('genre', $genre);
        $smarty->assign('images', $images);

        $smarty->display('templates/movie.tpl');
    }

    public function showMovies($title, $isAdmin, $link, $movies, $login, $email)
    {
        $smarty = new Smarty();
        $smarty->assign('title', $title);
        $smarty->assign('isAdmin', $isAdmin);
        $smarty->assign('link', $link);
        $smarty->assign('movies', $movies);
        $smarty->assign('login', $login);
        $smarty->assign('email', $email);

        $smarty->display('templates/all-movies.tpl');
    }

    public function movieForm($title, $subtitle, $login, $email, $link, $genres, $movie, $action, $id_movie = -1) {
        $smarty = new Smarty();
        $smarty->assign('title', $title);
        $smarty->assign('subtitle', $subtitle);
        $smarty->assign('genres', $genres);
        $smarty->assign('id', $id_movie);
        $smarty->assign('link', $link);
        $smarty->assign('movie', $movie);
        $smarty->assign('action', $action);
        $smarty->assign('login', $login);
        $smarty->assign('email', $email);

        $smarty->display('templates/movieForm.tpl');
    }
}