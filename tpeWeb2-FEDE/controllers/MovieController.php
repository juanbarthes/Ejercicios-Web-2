<?php

require_once "./views/MovieView.php";
require_once "./models/MovieModel.php";
require_once "./models/ImageModel.php";
require_once "SecuredController.php";

class MovieController extends SecuredController
{
    private $title;
    private $subtitle;
    private $view;
    private $model;
    private $link;
    private $modelImages;

    public function __construct()
    {
        parent::__construct();
        $this->title = "Movie Club";
        $this->view = new MovieView();
        $this->model = new MovieModel();
        $this->modelImages = new ImageModel();
    }

    private function isJPG($imagenesTipos)
    {
        foreach ($imagenesTipos as $tipo) {
            if ($tipo != 'image/jpeg') {
                return false;
            }
        }
        return true;
    }

    public function insertMovie()
    {
        if ($this->isAdmin) {
            $pathTempImages = $_FILES['imagesToUpload']['tmp_name'];

            $name = $_POST['name'];
            $description = $_POST['description'];
            $id_genre = $_POST['id_genre'];
            $year = $_POST['year'];
            $rating = $_POST['rating'];


            if (isset($name, $description, $id_genre, $year, $rating, $pathTempImages)) {

                $movie = $this->model->getMovieName($name);

                if (empty($movie)) {
                    if ($this->isJPG($_FILES['imagesToUpload']['type'])) {
                        $this->model->insertMovie($name, $id_genre, $description, $year, $rating);
                        $movie = $this->model->getMovieName($name);
                        $this->modelImages->insertImages($movie['id_movie'], $pathTempImages);
                    }
                }
            }

            header(HOME);
        }
    }

    public function deleteImagePath($params)
    {
        if ($this->isAdmin) {
            $p1 = $params[0];
            $p2 = $params[1];
            $path = $p1 . "/" . $p2;
            $id_movie = $this->modelImages->getIdMoviePath($path);
            $this->modelImages->deleteMovieImagePath($path);
            unlink($path);
            header(MOVIE . $id_movie["fk_id_movie"]);
        }
    }

    public function deleteMovie($params)
    {
        if ($this->isAdmin) {
            $images = $this->modelImages->getImagesId($params[0]);
            $this->modelImages->deleteMovieImagesId($params[0]);
            for ($i = 0; $i < count($images); $i++) {
                unlink("./" . $images[$i]['path']);
            }
            $this->model->deleteMovie($params[0]);
            header(HOME);
        }
    }

    public function showMovie($id)
    {
        $movie = $this->model->getMovie($id[0]);
        $genre = $this->model->getGenreId($movie['id_genre']);
        $images = $this->modelImages->getImagesId($id[0]);
        $this->link = "../";
        $id_user = $this->id;
        $this->view->showMovie($this->title, $this->isAdmin, $this->link, $movie, $this->login, $genre['name'], $images, $this->email, $id_user);
    }

    public function showMovies($params)
    {
        $movies = $this->model->getMovies();
        $this->link = "../";
        $this->view->showMovies($this->title, $this->isAdmin, $this->link, $movies, $this->login, $this->email);
    }

    public function showMoviesGenre($params)
    {
        $movies = $this->model->getMoviesGenre($params[0]);
        $this->link = "../";
        $this->view->showMovies($this->title, $this->isAdmin, $this->link, $movies, $this->login, $this->email);
    }

    public function addMovieForm()
    {
        if ($this->isAdmin) {
            $movie = array("id_movie" => "", "id_genre" => "", "name" => "", "description" => "", "year" => "", "rating" => "");
            $genres = $this->model->getDropDrown();
            $link = "./";
            $action = "insert-movie";
            $this->subtitle = 'Add movie form';
            $this->view->movieForm($this->title, $this->subtitle, $this->login, $this->email, $link, $genres, $movie, $action);
        }
    }

    public function editMovieForm($id_movie)
    {
        if ($this->isAdmin) {
            $movie = $this->model->getMovie($id_movie[0]);
            $genres = $this->model->getDropDrown();
            $this->subtitle = 'Edit movie form';
            $link = "../";
            $action = "edit-movies";
            $this->view->movieForm($this->title, $this->subtitle, $this->login, $this->email, $link, $genres, $movie, $action, $id_movie[0]);
        }
    }

    public function editMovie()
    {
        if ($this->isAdmin) {

            $pathTempImages = $_FILES['imagesToUpload']['tmp_name'];
            $name = $_POST['name'];
            $id_movie = $_POST['id_movie'];
            $description = $_POST['description'];
            $id_genre = $_POST['id_genre'];
            $year = $_POST['year'];
            $rating = $_POST['rating'];

            if (isset($name, $description, $id_genre, $year, $rating)) {

                $movie = $this->model->getMovieName($name);

                if ((empty($movie)) || ($movie['id_movie'] == $id_movie)) {
                    if ($pathTempImages[0] != "") {
                        $this->model->editMovie($id_movie, $id_genre, $name, $description, $year, $rating);
                        $movie = $this->model->getMovieName($name);
                        $this->modelImages->insertImages($movie['id_movie'], $pathTempImages);
                    } else {
                        $this->model->editMovie($id_movie, $id_genre, $name, $description, $year, $rating);
                    }
                }
            }

            header(HOME);
        }
    }
}
