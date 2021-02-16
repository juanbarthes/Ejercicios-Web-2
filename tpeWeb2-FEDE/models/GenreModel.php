<?php

class GenreModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO(
            'mysql:host=localhost;'
                . 'dbname=db_movies;charset=utf8',
            'root',
            ''
        );
    }

    function getGenreName($name)
    {
        $sentence = $this->db->prepare('SELECT * FROM genres WHERE name = ?');
        $sentence->execute(array($name));
        return ($sentence->fetch(PDO::FETCH_ASSOC));
    }

    function getGenre($id)
    {
        $sentence = $this->db->prepare('SELECT * FROM genres WHERE id_genre = ?');
        $sentence->execute([$id]);
        return ($sentence->fetch(PDO::FETCH_ASSOC));
    }

    function getGenres()
    {
        $sentence = $this->db->prepare('SELECT * FROM genres');
        $sentence->execute();
        return ($sentence->fetchAll(PDO::FETCH_ASSOC));
    }

    function insertGenre($name, $description)
    {
        $sentence = $this->db->prepare('INSERT INTO genres (name, description) VALUES (?, ?)');
        $sentence->execute([$name, $description]);
        header(HOME);
    }

    function deleteGenre($id)
    {
        $sentence = $this->db->prepare("DELETE FROM genres WHERE id_genre = ?");
        $sentence->execute($id);
    }

    function editGenre($id_genre, $name, $description)
    {
        $sentence = $this->db->prepare('UPDATE genres SET name = ?, description = ? WHERE id_genre = ?');
        $sentence->execute([$name, $description, $id_genre]);
    }
}
