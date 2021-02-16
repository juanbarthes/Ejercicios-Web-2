<?php

require_once "./views/GenreView.php";
require_once "./models/GenreModel.php";
require_once "SecuredController.php";

class GenreController extends SecuredController
{
    private $title;
    private $subtitle;
    private $view;
    private $model;
    private $link;

    public function __construct()
    {
        parent::__construct();
        $this->title = "Movie Club";
        $this->view = new GenreView();
        $this->model = new GenreModel();
        $this->link = "./";
    }

    public function insertGenre()
    {
        if ($this->isAdmin) {

            $name = $_POST['name'];
            $description = $_POST['description'];

            if (isset($name, $description)) {

                $genre = $this->model->getGenreName($name);

                if (empty($genre)) {
                    $this->model->insertGenre($name, $description);
                }

                header(HOME);
            }
        }
    }

    public function deleteGenre($params)
    {
        if ($this->isAdmin) {
            $this->model->deleteGenre($params);
            header(HOME);
        }
    }

    public function editGenre()
    {
        if ($this->isAdmin) {

            $id_genre = $_POST['id_genre'];
            $name = $_POST['name'];
            $description = $_POST['description'];

            if (isset($name, $description)) {

                $genre = $this->model->getGenreName($name);

                if (empty($genre)) {
                    $this->model->editGenre($id_genre, $name, $description);
                } else {
                    if (($genre["id_genre"] == $id_genre)) {
                        $this->model->editGenre($id_genre, $name, $description);
                    }
                }
                header(HOME);
            }
        }
    }

    public function home()
    {
        $genres = $this->model->getGenres();
        $this->view->home($this->title, $this->isAdmin, $this->link, $genres, $this->login, $this->email);
    }

    public function addGenreForm()
    {
        if ($this->isAdmin) {
            $genre = array("name" => '', "description" => '');
            $this->subtitle = "Add Genre form";
            $link = "./";
            $action = "insert-genre";
            $this->view->genreForm($this->title, $this->subtitle, $this->login, $this->email, $link, $action, $genre);
        }
    }

    public function editGenreForm($id)
    {
        if ($this->isAdmin) {
            $genre = $this->model->getGenre($id[0]);
            $this->subtitle = "Edit genre form";
            $link = "../";
            $action = "update-genre";
            $this->view->genreForm($this->title, $this->subtitle, $this->login, $this->email, $link, $action, $genre, $id[0]);
        }
    }
}
