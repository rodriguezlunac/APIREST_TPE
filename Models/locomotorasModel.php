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
        return $this->db->lastInsertId();
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

    public function orderByColumna($columna, $orden)
    {
        $sentencia = $this->db->prepare("SELECT * FROM locomotora order by $columna $orden");
        $sentencia->execute();
        $oderByColumna = $sentencia->fetchAll(PDO::FETCH_OBJ);
        // var_dump($oderByColumna);
        return $oderByColumna;
    }

    public function filterByColumna($anio)
    {
        $sentencia = $this->db->prepare("SELECT * FROM locomotora WHERE anio_fabricacion>?");
        $sentencia->execute([$anio]);
        $groupByColumna = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $groupByColumna;
    }
    public function count()
    {
        $sentencia = $this->db->prepare("SELECT ceiling(count(*)/10) as cantidad FROM locomotora");
        $sentencia->execute();
        $registros = $sentencia->fetch(PDO::FETCH_OBJ);
        $cantidad = $registros->cantidad;
        return $cantidad;
    }

    public function paginado($pagina)
    {
        $pag = ($pagina - 1) * 10;
        $sentencia = $this->db->prepare("SELECT * FROM locomotora LIMIT 10 OFFSET $pag");

        $sentencia->execute();
        $locomotoras = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $locomotoras;
    }
}
