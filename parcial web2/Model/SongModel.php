<?php

class SongModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=musicfy;charset=utf8', 'root', '');

    }

    public function getAll()
    {
        $sentencia = $this->db->prepare("SELECT * FROM song");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

     public function insert($name, $duration, $rate, $album)
     {
        $sentencia = $this->db->prepare("INSERT INTO song(nombre, duracion, valoracion, reproducciones, id_album) VALUES(?,?,?,?,?)");
        $sentencia->execute(array($name, $duration, $rate, 0, $album));
     }

}
