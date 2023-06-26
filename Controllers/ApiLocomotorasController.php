<?php
require_once "./Models/locomotorasModel.php";
// require_once "./Views/ApiLocomotorasView.php";
require_once "./Views/APIView.php";


class APILocomotorasController
{
    private $model;
    private $view;
    private $data;

    function __construct()
    {
        $this->model = new locomotorasModel();
        $this->view = new APIView();
        // $this->view = new ApiLocomotorasView();
        $this->data = file_get_contents("php://input");
    }
    function getData()
    {
        return json_decode($this->data);
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

    public function insertLocomotora()
    {
        $body = $this->getData();
        // $id_locomotora = $body->id_locomotora;
        $modelo = $body->modelo;
        $anio_fabricacion = $body->anio_fabricacion;
        $lugar_fabricacion = $body->lugar_fabricacion;

        $locomotora = $this->model->insertLocomotora($modelo, $anio_fabricacion, $lugar_fabricacion);

        $locomotoraNueva = $this->model->getLocomotora($locomotora);
        if ($locomotoraNueva)
            $this->view->response("Se ha insertado un nuevo vagón correctamente", 200);
        else
            $this->view->response("Error al insertar tarea", 500);
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
    public function orderByColumna()
    {
        if (isset($_GET['columna']) && isset($_GET['orden'])) {
            $columna = '';
            $orden = '';
            switch ($_GET['columna']) {
                case 'anio_fabricacion':
                    $columna = 'anio_fabricacion';
                    break;
                case 'modelo':
                    $columna = 'modelo';
                    break;
                case 'lugar_fabricacion':
                    $columna = 'lugar_fabricacion';
                    break;
                default:
                    return $this->view->response("Columna inexistente", 404);
                    break;
            }
            switch ($_GET['orden']) {
                case 'asc':
                    $orden = "asc";
                    break;
                case 'desc':
                    $orden = "desc";
                    break;
                default:
                    return $this->view->response("Orden inexistente", 404);
                    break;
            }
            $orderByColumna = $this->model->orderByColumna($columna, $orden);
            return $this->view->response($orderByColumna, 200);
        } else {
            return $this->view->response("Parametros no seteados", 404);
        }
    }
    public function filterByColumna()
    {
        if (isset($_GET['anio'])) {
            $filterByColumna = $this->model->filterByColumna($_GET['anio']);
            return $this->view->response($filterByColumna, 200);
        }
        else{
            return $this->view->response("Parametro no seteado", 404);

        }
    }
}
