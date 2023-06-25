<?php
require_once "./Models/locomotorasModel.php";
require_once "./Views/ApiLocomotorasView.php";


class locomotorasController
{
    private $model;
    private $view;
    private $data;



    function __construct()
    {
        $this->model = new locomotorasModel();
        $this->view = new ApiLocomotorasView();
        $this->data = file_get_contents("php://input");
    }
    function getData()
    {
        return json_decode($this->data);
    }
    function getLocomotoras($params = [])
    {
        $locomotoras = $this->model->getLocomotoras();
        return $this->view->response($locomotoras, 200);
    }
    function get($params = [])
    {
        if (empty($params)) {

            $locomotoras = $this->model->getLocomotoras();
            return $this->view->response($locomotoras, 200);
        } else {
            $locomotora = $this->model->getLocomotora($params[":ID"]);
            if (!empty($locomotora)) {
                return $this->view->response($locomotora, 200);
            }
        }
    }
    public function insertLocomotora($params = [])
    {
        $body = $this->getData();
        // $id_locomotora = $body->id_locomotora;
        $modelo = $body->modelo;
        $anio_fabricacion = $body->anio_fabricacion;
        $lugar_fabricacion = $body->lugar_fabricacion;

        $locomotora = $this->model->insertLocomotora($modelo, $anio_fabricacion, $lugar_fabricacion);
    }
    public function updateLocomotora($params = [])
    {
        $id_locomotora = $params[":ID"];
        $locomotora = $this->model->getLocomotora($id_locomotora);
        if ($locomotora) {
            $body = $this->getData();

            $modelo = $body->modelo;
            $anio_fabricacion = $body->anio_fabricacion;
            $lugar_fabricacion = $body->lugar_fabricacion;
            $locomotora = $this->model->updateLocomotora($id_locomotora, $modelo, $anio_fabricacion, $lugar_fabricacion);
            $this->view->response("Locomotora con id: " . $id_locomotora . " fue modificada con exito", 200);
        } else {
            $this->view->response("Locomotora con id: " . $id_locomotora . " no fue encontrada", 404);
        }
    }
    public function deleteLocomotora($params = [])
    {
        $id_locomotora = $params[":ID"];
        $locomotora = $this->model->getLocomotora($id_locomotora);
        if ($locomotora) {
            $this->model->deleteLocomotora($id_locomotora);
            $this->view->response("Locomotora con id: " . $id_locomotora . " fue eliminada con exito", 200);
        } else {
            $this->view->response("Locomotora con id: " . $id_locomotora . " no fue encontrada", 404);
        }
    }
}
