<?php
class vagonesModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_trenes;charset=utf8', 'root', '');
    }

    public function getVagones()
    {
        $sentencia = $this->db->prepare("SELECT vagon.* , locomotora.modelo as locomotora_modelo FROM vagon JOIN locomotora ON vagon.locomotora_id = locomotora.id_locomotora;");
        $sentencia->execute();
        $vagon = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vagon;
    }

    public function getVagonesDeLocomotora($locomotora_id)
    {
        $sentencia = $this->db->prepare("SELECT vagon.* , locomotora.modelo as locomotora_modelo FROM vagon JOIN locomotora ON vagon.locomotora_id = locomotora.id_locomotora WHERE locomotora_id = ?");
        $sentencia->execute([$locomotora_id]);
        $vagon = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vagon;
    }

    public function getVagon($id_vagon)
    {
        $sentencia = $this->db->prepare("SELECT vagon.* , locomotora.modelo as locomotora_modelo FROM vagon JOIN locomotora ON vagon.locomotora_id = locomotora.id_locomotora WHERE (id_vagon) = ?");
        $sentencia->execute([$id_vagon]);
        $vagon = $sentencia->fetch(PDO::FETCH_OBJ);
        return $vagon;
    }

    function deleteVagon($id_vagon)
    {
        $sentencia = $this->db->prepare("DELETE FROM vagon WHERE id_vagon=?");
        $sentencia->execute([$id_vagon]);
    }

    public function insertVagon($nro_vagon, $tipo, $capacidad_max, $modelo, $descripcion, $locomotora_id)
    {
        $sentencia = $this->db->prepare("INSERT INTO vagon(nro_vagon, tipo, capacidad_max, modelo, descripcion, locomotora_id) VALUES(?,?,?,?,?,?)");
        $sentencia->execute([$nro_vagon, $tipo, $capacidad_max, $modelo, $descripcion, $locomotora_id]);
        return $this->db->lastInsertId();
    }

    public function updateVagon($id_vagon, $nro_vagon, $tipo, $capacidad_max, $modelo, $descripcion, $locomotora_id)
    {
        $sentencia = $this->db->prepare("UPDATE vagon SET nro_vagon = ?, tipo = ?, capacidad_max = ?, modelo = ?, descripcion = ?, locomotora_id = ? WHERE id_vagon = ? ");
        $sentencia->execute([$nro_vagon, $tipo, $capacidad_max, $modelo, $descripcion, $locomotora_id, $id_vagon]);
    }
    public function orderByColumna($columna, $orden)
    {
        $sentencia = $this->db->prepare("SELECT vagon.* , locomotora.modelo as locomotora_modelo FROM vagon  JOIN locomotora  ON vagon.locomotora_id =locomotora.id_locomotora ORDER BY  $columna $orden");
        $sentencia->execute();
        $oderByColumna = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $oderByColumna;
    }

    public function filterByColumna($capacidad_max)
    {
        $sentencia = $this->db->prepare("SELECT vagon.* , locomotora.modelo as locomotora_modelo FROM vagon  JOIN locomotora  ON vagon.locomotora_id =locomotora.id_locomotora WHERE  capacidad_max>?");
        $sentencia->execute([$capacidad_max]);
        $groupByColumna = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $groupByColumna;
    }

    public function countPaginas()
    {
        $sentencia = $this->db->prepare("SELECT ceiling(count(*)/10) as cantidad FROM vagon");
        $sentencia->execute();
        $registros = $sentencia->fetch(PDO::FETCH_OBJ);
        $cantidad = $registros->cantidad;
        return $cantidad;
    }

    public function paginado($pagina)
    {
        $pag = ($pagina - 1) * 10;
        $sentencia = $this->db->prepare("SELECT * FROM vagon LIMIT 10 OFFSET $pag");
        $sentencia->execute();
        $vagones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vagones;
    }
}
