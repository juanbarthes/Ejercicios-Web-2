<?php
    class PagosModel{
        private $db;
        function __construct(){
            $this->$db = new PDO('mysql:host=localhost;'.'dbname=pagos;charset=utf8'. 'root'. '');
        }
        function getPagos()
        {
            $sentencia = $this->db->prepare("SELECT * FROM pago");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ;)
        }
        function insertPago($deudor,$cuota,$monto,$fecha){
            $sentencia = $this->db->prepare("INSERT INTO pago(deudor, cuota, monto, fecha) VALUES(?,?,?,?)");
            $sentencia->execute(array($deudor,$cuota,$monto,$fecha));
        }
        function deletePago($deudor){
            $sentencia = $this->db->prepare("DELETE FROM pago WHERE deudor=?");
            $sentencia->execute(array($deudor));
        }
    }