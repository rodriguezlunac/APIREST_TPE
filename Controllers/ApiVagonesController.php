<?php
require_once "./Models/vagonesModel.php";
require_once "./Views/ApiVagonesView.php";


class vagonesController
{
    private $model;
    private $view;
    private $data;


    function __construct()
    {
        $this->model = new vagonesModel();
        $this->view = new ApiVagonesView();
        $this->data = file_get_contents("php://input");
    }
    function getData()
    {
        return json_decode($this->data);
    }
    public function insertVagon($params = [])
    {
        $body = $this->getData();

        $nro_vagon = $body->nro_vagon;
        $tipo = $body->tipo;
        $capacidad_max = $body->capacidad_max;
        $modelo = $body->modelo;
        $descripcion = $body->descripcion;
        $locomotora_id = $body->locomotora_id;
        $vagon = $this->model->insertVagon($nro_vagon, $tipo, $capacidad_max, $modelo, $descripcion, $locomotora_id);
    }
    public function updateVagon($params=[]){
        $id_vagon=$params[":ID"];
        $vagon =$this->model->getVagon($id_vagon);
        if($vagon){
            $body = $this->getData();

            $nro_vagon = $body->nro_vagon;
            $tipo = $body->tipo;
            $capacidad_max = $body->capacidad_max;
            $modelo = $body->modelo;
            $descripcion = $body->descripcion;
            $locomotora_id = $body->locomotora_id;
            $vagon = $this->model->updateVagon($id_vagon, $nro_vagon, $tipo, $capacidad_max, $modelo, $descripcion, $locomotora_id);
            $this->view->response("Vagón con id: " . $id_vagon . " fue modificado con exito", 200);
        }
        else{
            $this->view->response("Vagón con id: " . $id_vagon . " no fue encontrado", 404);

        }
    }
    function get($params = [])
    {
        if (empty($params)) {

            $vagones = $this->model->getVagones();
            return $this->view->response($vagones, 200);
        } else {
            $vagon = $this->model->getVagon($params[":ID"]);
            if (!empty($vagon)) {
                return $this->view->response($vagon, 200);
            }
        }
    }
    public function deleteVagon($params = [])
    {
        $id_vagon = $params[":ID"];
        $vagon = $this->model->getVagon($id_vagon);
        if ($vagon) {
            $this->model->deleteVagon($id_vagon);
            $this->view->response("Vagón con id: " . $id_vagon . " fue eliminado con exito", 200);
        } else {
            $this->view->response("Vagón con id: " . $id_vagon . " no fue encontrado", 404);
        }
    }
}
