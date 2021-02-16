<?php

class ArtistModel  
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=musicfy;charset=utf8', 'root', '');
    }

    public function getArtist($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM artist WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}
