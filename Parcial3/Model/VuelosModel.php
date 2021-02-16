<?php

class VuelosModel  
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=vuelos;charset=utf8', 'root', '');
    }

    public function getVuelos()//Obtiene los vuelos de la DB
    {
        $sentencia = $this->db->prepare("SELECT * FROM vuelo");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function getVueloId($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM vuelo WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function getVuelo($nro)
    {
        $sentencia = $this->db->prepare("SELECT * FROM vuelo WHERE nro=?");
        $sentencia->execute(array($nro));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function insertarVuelo($nro, $fecha, $origen, $destino, $estado)
    {
        $sentencia = $this->db->prepare('INSERT INTO vuelo(nro, fecha, origen, destino, estado) VALUES(?,?,?,?,?)');
        $sentencia->execute(array($nro, $fecha, $origen, $destino, $estado));
    }

    public function borrarVuelo($id)
    {
        $sentencia = $this->db->prepare('DELETE FROM vuelo WHERE id=?');
        return $sentencia->execute(array($id));
    }

    public function editarVuelo($id, $nro, $fecha, $origen, $destino, $estado)
    {
        $sentencia = $this->db->prepare('UPDATE vuelo SET nro=?, fecha=?, origen=?, destino=?, estado=? WHERE id=?');
        return $sentencia->execute(array($nro, $fecha, $origen, $destino, $estado, $id));
    }
}
