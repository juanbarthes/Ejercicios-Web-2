<?php

class CommentsModel
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

    function getCommentId($id) {
        $sentence = $this->db->prepare('SELECT * FROM comments WHERE id_comment = ?');
        $sentence->execute(array($id));
        return ($sentence->fetch(PDO::FETCH_OBJ));
    }

    function getCommentsMovie($id_movie) {
        $sentence = $this->db->prepare('SELECT * FROM comments WHERE fk_id_movie = ?');
        $sentence->execute(array($id_movie));
        return ($sentence->fetchAll(PDO::FETCH_OBJ));
    }
    
    function getCommentsMovieOrderBy($id_movie, $field, $order) {
        $sentence = $this->db->prepare('SELECT * FROM comments WHERE fk_id_movie = ? ORDER BY ' . $field . " " . $order);
        $sentence->execute(array($id_movie));
        return ($sentence->fetchAll(PDO::FETCH_OBJ));
    }
    
    function getComments() {
        $sentence = $this->db->prepare('SELECT * FROM comments');
        $sentence->execute();
        return ($sentence->fetchAll(PDO::FETCH_OBJ));
    }

    function getAverage($id)
    {
        $sentence = $this->db->prepare('SELECT AVG(score) AS average FROM comments WHERE fk_id_movie = ?');
        $sentence->execute(array($id));
        return ($sentence->fetch(PDO::FETCH_ASSOC));
    }

    function insertComment($comment, $user, $score, $id_movie, $id_user) {
        $sentence = $this->db->prepare('INSERT INTO comments (comment, user, score, fk_id_movie, fk_id_user) VALUES (?, ?, ?, ?, ?)');
        $sentence->execute(array($comment, $user, $score, $id_movie, $id_user));
        return ($this->db->lastInsertId());
    }

    function deleteComment($id) {
        $sentence = $this->db->prepare('DELETE FROM comments WHERE id_comment = ?');
        $sentence->execute(array($id));
    }

    function updateComment($id, $comment, $score, $id_movie, $id_user) {
        $sentence = $this->db->prepare('UPDATE comments SET comment = ?, score = ?, fk_id_movie = ?, fk_id_user = ? WHERE id_comment = ?');
        $sentence->execute(array($comment, $score, $id_movie, $id_user, $id));
    }
}
