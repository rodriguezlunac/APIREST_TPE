<?php
require_once "./Models/vagonesModel.php";
require_once "./Views/APIView.php";
require_once "./Models/locomotorasModel.php";

class APIVagonesController
{
    private $model;
    private $view;
    private $locomotorasModel;
    private $data;

    function __construct()
    {
        $this->model = new vagonesModel();
        $this->view = new APIView();
        $this->locomotorasModel = new locomotorasModel();
        $this->data = file_get_contents("php://input");
    }

    private function getData()
    {
        return json_decode($this->data);
    }

    public function get($params = [])
    {
        if (empty($params)) {
            $vagones = $this->model->getVagones();
            if (!empty($vagones)) {
                return $this->view->response($vagones, 200);
            } else {
                return $this->view->response("No hay vagones", 404);
            }
        } else {
            if (is_numeric($params[':ID'])&& $params[':ID']>0) {
                $vagon = $this->model->getVagon($params[":ID"]);
                if (!empty($vagon)) {
                    return $this->view->response($vagon, 200);
                } else {
                    return $this->view->response("No se ha encontrado un vagon con id: " . $params[":ID"], 404);
                }
            } else {
                $this->view->response("Se espera un valor numérido para el id y mayor a 0", 400);

            }
        }
    }

    public function insertVagon()
    {
        $body = $this->getData();
        if (is_null($body)) {
            return $this->view->response("Error en los datos para ingresar un vagon", 400);
        }
        $requiredParams = ['nro_vagon', 'tipo', 'capacidad_max', 'modelo', 'descripcion', 'locomotora_id'];
        foreach ($requiredParams as $param) {
            if (!property_exists($body, $param)) {
                return $this->view->response("Falta/n parametros", 400);
            }
        }
        $nro_vagon = $body->nro_vagon;
        $tipo = $body->tipo;
        $capacidad_max = $body->capacidad_max;
        $modelo = $body->modelo;
        $descripcion = $body->descripcion;
        $locomotora_id = $body->locomotora_id;
        $locomotora = $this->locomotorasModel->getLocomotora($locomotora_id);
        if ($locomotora) {
            if (!is_null($nro_vagon) && !is_null($tipo) && !is_null($capacidad_max) && !is_null($modelo) && !is_null($descripcion) && !is_null($locomotora_id) && is_numeric($nro_vagon) && is_numeric($capacidad_max) && $capacidad_max > 0) {
                $vagon = $this->model->insertVagon($nro_vagon, $tipo, $capacidad_max, $modelo, $descripcion, $locomotora_id);
                $vagonNuevo = $this->model->getVagon($vagon);
                if ($vagonNuevo) {
                    return $this->view->response("Se ha insertado un nuevo vagón correctamente", 201);
                } else {
                    $this->view->response("Error al insertar el vagón", 400);
                }
            } else {
                $this->view->response("Error al insertar el vagón", 400);
            }
        } else {
            $this->view->response("Error al insertar el vagón, la locomotora con id " . $locomotora_id . " no existe", 400);
        }
    }

    public function updateVagon($params = [])
    {
        $id_vagon = $params[":ID"];
        if(is_numeric($params[":ID"])  && $params[":ID"]>0){

        $vagon = $this->model->getVagon($id_vagon);
        if ($vagon) {
            $body = $this->getData();
            if (is_null($body)) {
                return $this->view->response("Error en los datos para modificar un vagon", 400);
            }
            $requiredParams = ['nro_vagon', 'tipo', 'capacidad_max', 'modelo', 'descripcion', 'locomotora_id'];
            foreach ($requiredParams as $param) {
                if (!property_exists($body, $param)) {
                    return $this->view->response("Falta/n parametros", 400);
                }
            }
            $nro_vagon = $body->nro_vagon;
            $tipo = $body->tipo;
            $capacidad_max = $body->capacidad_max;
            $modelo = $body->modelo;
            $descripcion = $body->descripcion;
            $locomotora_id = $body->locomotora_id;
            $locomotora = $this->locomotorasModel->getLocomotora($locomotora_id);
            if ($locomotora) {
                if (!is_null($nro_vagon) && !is_null($tipo) && !is_null($capacidad_max) && !is_null($modelo) && !is_null($descripcion) && !is_null($locomotora_id) && is_numeric($nro_vagon) && is_numeric($capacidad_max) && ($capacidad_max > 0)) {
                    $vagon = $this->model->updateVagon($id_vagon, $nro_vagon, $tipo, $capacidad_max, $modelo, $descripcion, $locomotora_id);
                    $this->view->response("Vagón con id: " . $id_vagon . " fue modificado con exito", 201);
                } else {
                    $this->view->response("Error al insertar el vagón", 400);
                }
            } else {
                $this->view->response("Error al modificar el vagón, la locomotora con id " . $locomotora_id . " no existe", 404);
            }
        } else {
            $this->view->response("Vagón con id: " . $id_vagon . " no fue encontrado", 404);
        }
    }
    else{
        $this->view->response("Se espera un valor numérido para el id y mayor a 0", 400);

    }
    }

    public function deleteVagon($params = [])
    {
        $id_vagon = $params[":ID"];
        if (is_numeric($params[":ID"]) && $params[":ID"]>0 ) {

            $vagon = $this->model->getVagon($id_vagon);
            if ($vagon) {
                $this->model->deleteVagon($id_vagon);
                $this->view->response("Vagón con id: " . $id_vagon . " fue eliminado con exito", 200);
            } else {
                $this->view->response("Vagón con id: " . $id_vagon . " no fue encontrado", 404);
            }
        } else {
            $this->view->response("Se espera un valor numérido para el id o mayor a 0", 400);
        }
    }


    public function orderByColumna()
    {
        if (isset($_GET['columna']) && isset($_GET['orden'])) {
            $columna = '';
            $orden = '';
            switch ($_GET['columna']) {
                case 'nro_vagon':
                    $columna = 'nro_vagon';
                    break;
                case 'tipo':
                    $columna = 'tipo';
                    break;
                case 'capacidad_max':
                    $columna = 'capacidad_max';
                    break;
                case 'modelo':
                    $columna = 'modelo';
                    break;
                case 'descripcion':
                    $columna = 'descripcion';
                    break;
                case 'locomotora_id':
                    $columna = 'locomotora_id';
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
        if (isset($_GET['capacidad_max']) && (is_numeric($_GET['capacidad_max']))) {
            if ($_GET['capacidad_max'] > 0) {

                $filterColumna = $this->model->filterByColumna($_GET['capacidad_max']);
                return $this->view->response($filterColumna, 200);
            } else {
                return $this->view->response("Capacidad máxima no válida", 404);
            }
        } else {
            return $this->view->response("Parametro no seteado", 400);
        }
    }

    public function paginado()
    {
        $cantidad = $this->model->countPaginas();
        if (isset($_GET['pagina']) && (is_numeric(($_GET['pagina'])))) {
            $pagina = $_GET['pagina'];
            if ($pagina > 0 && $pagina <= $cantidad) {
                $vagones = $this->model->paginado($pagina);
                return $this->view->response($vagones, 200);
            } else {
                if ($pagina <= 0) {
                    return $this->view->response("Número de página no valido", 400);
                } else {
                    return $this->view->response("No existe la pagina número " . $pagina, 404);
                }
            }
        } else {
            return $this->view->response("Parametro no seteado o se espera un valor numérico", 400);
        }
    }
}
