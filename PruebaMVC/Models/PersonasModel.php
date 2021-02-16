<?php
class PersonasModel
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=personas;charset=utf8', 'root', '');
    }

    function getPersonas()//devuelve todas las personas.
    {
        $sentencia = $this->db->prepare("SELECT * FROM persona");//preparo una sentencia.
        $sentencia->execute();//ejecuto la sentencia.
        return $sentencia->fetchAll(PDO::FETCH_OBJ);//obtengo los datos.
    }

    function getPersona($id_persona)//devuelve una persona segun la id (investigar como se hace).
    {
        $sentencia = $this->db->prepare("SELECT * FROM persona WHERE id=?");//preparo una sentencia.
        $sentencia->execute(array($id_persona));//ejecuto la sentencia.
        return $sentencia->fetch(PDO::FETCH_OBJ);//obtengo los datos.
    }

    function insertPersona($nombre, $apellido)//agrega una persona a la base de datos.
    {
        $sentencia = $this->db->prepare("INSERT INTO persona(nombre, apellido) VALUES(?,?)");//preparo la sentencia, dejo los campos como incognita porque es mas seguro enviar los valores en el execute.
        $sentencia->execute(array($nombre, $apellido));//ejecuto la sentencia mandando un arreglo asociativo con los valores de los campos.
    }

    function deletePersona($id_persona)//devuelve una persona segun la id.
    {
        $sentencia = $this->db->prepare("DELETE FROM persona WHERE id=?");//preparo la sentncia.
        $sentencia->execute(array($id_persona));//ejecuto la sentencia enviando la id de la persona.
    }

    function updatePersona($id_persona, $nombre, $apellido)//modifica una persona.
    {
        $sentencia = $this->db->prepare("UPDATE persona SET nombre=?, apellido=? WHERE id=?");
        $sentencia->execute(array($nombre, $apellido, $id_persona));
    }
}
