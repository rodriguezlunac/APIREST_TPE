<?php
class locomotorasModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_trenes;charset=utf8', 'root', '');
    }
    public function getLocomotoras()
    {
        $sentencia = $this->db->prepare("SELECT * FROM  locomotora");
        $sentencia->execute();
        $locomotoras = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $locomotoras;
    }

    public function getLocomotora($id_locomotora)
    {
        $sentencia = $this->db->prepare("SELECT * FROM  locomotora WHERE id_locomotora=?");
        $sentencia->execute([$id_locomotora]);
        $locomotora = $sentencia->fetch(PDO::FETCH_OBJ);
        return $locomotora;
    }
    public function insertLocomotora($modelo, $anio_fabricacion, $lugar_fabricacion)
    {
        $sentencia = $this->db->prepare("INSERT INTO locomotora(modelo, anio_fabricacion, lugar_fabricacion) VALUES(?,?,?)");
        $sentencia->execute([$modelo, $anio_fabricacion, $lugar_fabricacion]);
    }

    public function deleteLocomotora($id_locomotora)
    {
        $sentencia = $this->db->prepare("DELETE FROM locomotora WHERE id_locomotora=?");
        $sentencia->execute([$id_locomotora]);
    }

    public function updateLocomotora($id_locomotora, $modelo, $anio_fabricacion, $lugar_fabricacion)
    {
        $sentencia = $this->db->prepare("UPDATE locomotora SET modelo = ?, anio_fabricacion = ?, lugar_fabricacion = ? WHERE id_locomotora = ? ");
        $sentencia->execute([$modelo, $anio_fabricacion, $lugar_fabricacion, $id_locomotora]);
    }
}
