<?php
require_once "./Models/locomotorasModel.php";
require_once "./Views/APIView.php";

//VER QUE SIEMPRE TIRA 500 EN POSTMAN POR MAS QUE ANDE
class APILocomotorasController
{
    private $model;
    private $view;
    private $data;

    function __construct()
    {
        $this->model = new locomotorasModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    function getData()
    {
        return json_decode($this->data);
    }

    function get($params = [])
    {
        //FALTA CONTEMPLAR LA URI /LOCOMOTORAS/456 TIENE QUE TIRAR ERROR
        if (empty($params)) {

            $locomotoras = $this->model->getLocomotoras();
            if (!empty($locomotoras)) {
                return $this->view->response($locomotoras, 200);
            } else {
                return $this->view->response("No hay locomotoras", 404);
            }
        } else {
            $locomotora = $this->model->getLocomotora($params[":ID"]);
            if (!empty($locomotora)) {
                return $this->view->response($locomotora, 200);
            } else {
                return $this->view->response("No se ha encontrado una locomotora con id: " . $params[":ID"], 404);
            }
        }
    }

    public function insertLocomotora()
    {
        $body = $this->getData();

        $requiredParams = ['modelo', 'anio_fabricacion', 'lugar_fabricacion'];
        foreach ($requiredParams as $param) {
            if (!property_exists($body, $param)) {
                return $this->view->response("Falta/n parametros", 400);
            }
        }

        $modelo = $body->modelo;
        $anio_fabricacion = $body->anio_fabricacion;
        $lugar_fabricacion = $body->lugar_fabricacion;
        if (!empty($modelo) && !empty($anio_fabricacion) && !empty($lugar_fabricacion)) {
            $locomotora = $this->model->insertLocomotora($modelo, $anio_fabricacion, $lugar_fabricacion);
            $locomotoraNueva = $this->model->getLocomotora($locomotora);
        }
        if ($locomotoraNueva)
            $this->view->response("Se ha insertado una nueva locomotora correctamente", 201);
        else
            $this->view->response("Error al insertar locomotora", 400);
    }

    public function updateLocomotora($params = [])
    {
        $id_locomotora = $params[":ID"];
        $locomotora = $this->model->getLocomotora($id_locomotora);
        if ($locomotora) {
            $body = $this->getData();

            $requiredParams = ['modelo', 'anio_fabricacion', 'lugar_fabricacion'];
            foreach ($requiredParams as $param) {
                if (!property_exists($body, $param)) {
                    return $this->view->response("Falta/n parametros", 400);
                }
            }
            $modelo = $body->modelo;
            $anio_fabricacion = $body->anio_fabricacion;
            $lugar_fabricacion = $body->lugar_fabricacion;
            if (!empty($modelo) && !empty($anio_fabricacion) && !empty($lugar_fabricacion)) {
                $locomotora = $this->model->updateLocomotora($id_locomotora, $modelo, $anio_fabricacion, $lugar_fabricacion);
                $this->view->response("Locomotora con id: " . $id_locomotora . " fue modificada con exito", 201);
            }
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
            return $this->view->response("Parametros no seteados", 400);
        }
    }

    public function filterByColumna()
    {
        // var_dump(is_numeric($_GET['anio_fabricacion']));
        if (isset($_GET['anio_fabricacion']) && (is_numeric($_GET['anio_fabricacion']))) {
            $filterByColumna = $this->model->filterByColumna($_GET['anio_fabricacion']);
            return $this->view->response($filterByColumna, 200);
        } else {
            return $this->view->response("Parametro no seteado", 400);
        }
    }

    public function paginado()
    {
        $cantidad = $this->model->countPaginas();
        if (isset($_GET['pagina']) && (is_numeric(($_GET['pagina'])))) {
            $pagina = $_GET['pagina'];
            if ($pagina > 0 &&  $pagina <= $cantidad) {
                $locomotoras = $this->model->paginado($pagina);
                return $this->view->response($locomotoras, 200);
            } else {
                return $this->view->response("No existe la pagina número " . $_GET['pagina'], 404);
            }
        } else {
            return $this->view->response("Parametro no seteado", 404);
        }
    }
}
