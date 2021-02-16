<?php
require_once "./Model/ArtistModel.php";
require_once "./View/ArtistView.php";
require_once "AlbumController.php";
class ArtistController
{
    private $model;
    private $view;
    private $albumController;

    public function __construct()
    {
        $this->model = new ArtistModel();
        $this->view = new ArtistView();
        $this->albumController = new AlbumController();
    }

    public function getArtist($params = null)
    {
        $id = $params[':id'];
        if (isset($id) && !empty($id)) {
            $artist = $this->getArtist();
            if (sizeof($artist) > 0) {
                $albums = $this->albumController->getByArtist($params);
                $artist_rate = $this->getRate($albums);
                $this->view->showArtist($artist, $artist_rate, $albums); 
            }
        }
    }

    private function getRate($albums)
    {
        $total = 0;
        $quant = 0;
        foreach ($albums as $album) {
            $total += $album->valoracion;
            $quant++;
        }
        return $total/$quant;
    }
}
