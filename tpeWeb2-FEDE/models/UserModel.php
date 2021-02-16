<?php

class UserModel
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

    function insertUser($email, $password, $admin = 0, $code = "")
    {
        $date = date("Y-m-d H:i:s");
        $sentence = $this->db->prepare('INSERT INTO users (email, password, admin, code, date) VALUE (?, ?, ?, ?, ?)');
        $sentence->execute(array($email, $password, $admin, $code, $date));
    }

    function getUserId($id)
    {
        $sentence = $this->db->prepare('SELECT * FROM users WHERE id_user = ?');
        $sentence->execute(array($id));
        return ($sentence->fetch(PDO::FETCH_ASSOC));
    }

    function getUsers()
    {
        $sentence = $this->db->prepare('SELECT * FROM users');
        $sentence->execute();
        return ($sentence->fetchAll(PDO::FETCH_OBJ));
    }

    function getUserEmail($email)
    {
        $sentence = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $sentence->execute(array($email));
        return ($sentence->fetch(PDO::FETCH_ASSOC));
    }

    function updateUserPrivileges($id, $admin)
    {
        $sentence = $this->db->prepare('UPDATE users SET admin = ? WHERE id_user = ?');
        $sentence->execute(array($admin, $id));
    }

    function updateCode($date, $code, $id)
    {
        $sentence = $this->db->prepare('UPDATE users SET date = ?, code = ? WHERE id_user = ?');
        $sentence->execute(array($date, $code, $id));
    }

    function getUserCode($code)
    {
        $sentence = $this->db->prepare('SELECT * FROM users WHERE code = ?');
        $sentence->execute(array($code));
        return ($sentence->fetch(PDO::FETCH_ASSOC));
    }

    function deleteUser($id)
    {
        $sentence = $this->db->prepare('DELETE FROM users WHERE id_user = ?');
        $sentence->execute(array($id));
    }

    function updatePasswordUser($id, $password)
    {
        $sentence = $this->db->prepare('UPDATE users SET password = ? WHERE id_user = ?');
        $sentence->execute(array($password, $id));
    }
}
