<?php
class AlbumModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=musicfy;charset=utf8', 'root', '');//inicializo la db como lo hariamos para trabajar en XAMP
    }

    public function getByArtist($artist_id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM album WHERE id_artista=?");
        $sentencia->execute(array($artist_id));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}
