<?php

class ImageModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO(
            'mysql:host=localhost;'
                . 'dbname=db_movies;charset=utf8',
            'root',
            ''
        );
    }

    private function uploadImages($images)
    {
        $paths = [];
        foreach ($images as $image) {
            $destiny = 'img/' . uniqid() . '.jpg';
            move_uploaded_file($image, $destiny);
            $paths[] = $destiny;
        }
        return $paths;
    }

    function getIdMoviePath($path)
    {
        $sentence = $this->db->prepare('SELECT fk_id_movie FROM images WHERE path = ?');
        $sentence->execute(array($path));
        return ($sentence->fetch(PDO::FETCH_ASSOC));
    }

    function getImagesId($id)
    {
        $sentence = $this->db->prepare('SELECT * FROM images WHERE fk_id_movie = ?');
        $sentence->execute(array($id));
        return ($sentence->fetchAll(PDO::FETCH_ASSOC));
    }

    function insertImages($id, $images)
    {
        $paths = $this->uploadImages($images);
        $sentence_images = $this->db->prepare('INSERT INTO images(fk_id_movie, path) VALUES (?, ?)');
        foreach ($paths as $path) {
            $sentence_images->execute(array($id, $path));
        }
    }

    function deleteMovieImagePath($path)
    {
        $sentence = $this->db->prepare('DELETE FROM images WHERE path = ?');
        $sentence->execute(array($path));
    }

    function deleteMovieImagesId($id)
    {
        $sentence_image = $this->db->prepare('DELETE FROM images WHERE fk_id_movie = ?');
        $sentence_image->execute(array($id));
    }
}
