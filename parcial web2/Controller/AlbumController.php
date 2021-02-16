<?php
require_once "./Model/AlbumModel.php";
require_once "./View/AlbumView.php";
class AlbumController 
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new AlbumModel();
        $this->view = new AlbumView();
    }

    public function getByArtist($params = null)
    {
        if (isset($params) && !empty($params[':id'])) {
            $id = $params[':id'];
            $albums = $this->model->getByArtist($id);
            return $albums;
        }
    }
}
