<?php
require_once "./Models/vagonesModel.php";
require_once "./Views/APIView.php";

//VER QUE SIEMPRE TIRA 500 EN POSTMAN POR MAS QUE ANDE
class APIVagonesController
{
    private $model;
    private $view;
    private $data;

    function __construct()
    {
        $this->model = new vagonesModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    private function getData()
    {
        return json_decode($this->data);
    }

    public function get($params = [])
    {
        //FALTA CONTEMPLAR LA URI /VAGONES/456 TIENE QUE TIRAR ERROR
        if (empty($params)) {
            $vagones = $this->model->getVagones();
            if (!empty($vagones)) {
                return $this->view->response($vagones, 200);
            } else {
                return $this->view->response("No hay vagones", 404);
            }
        } else {
            $vagon = $this->model->getVagon($params[":ID"]);
            if (!empty($vagon)) {
                return $this->view->response($vagon, 200);
            } else {
                return $this->view->response("No se ha encontrado un vagon con id: " . $params[":ID"], 404);
            }
        }
    }

    public function insertVagon()
    {
        $body = $this->getData();
        // Verificar si se proporcionan todos los parámetros necesarios
        $requiredParams = ['nro_vagon', 'tipo', 'capacidad_max', 'modelo', 'descripcion', 'locomotora_id'];
        foreach ($requiredParams as $param) {
            if (!property_exists($body, $param)) {
                return $this->view->response("Falta/n parametros", 400);
            }
        }
        // Obtener los valores de los parámetros
        $nro_vagon = $body->nro_vagon;
        $tipo = $body->tipo;
        $capacidad_max = $body->capacidad_max;
        $modelo = $body->modelo;
        $descripcion = $body->descripcion;
        $locomotora_id = $body->locomotora_id;
        // Insertar el vagón en la base de datos
        $vagon = $this->model->insertVagon($nro_vagon, $tipo, $capacidad_max, $modelo, $descripcion, $locomotora_id);
        // Verificar si la inserción fue exitosa
        if ($vagon) {
            $vagonNuevo = $this->model->getVagon($vagon);
            if ($vagonNuevo) {
                return $this->view->response("Se ha insertado un nuevo vagón correctamente", 200);
            } else {
                $this->view->response("Error al insertar tarea", 400);
            }
        }
    }

    public function updateVagon($params = [])
    {
        $id_vagon = $params[":ID"];
        $vagon = $this->model->getVagon($id_vagon);
        if ($vagon) {
            $body = $this->getData();

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
            $vagon = $this->model->updateVagon($id_vagon, $nro_vagon, $tipo, $capacidad_max, $modelo, $descripcion, $locomotora_id);
            $this->view->response("Vagón con id: " . $id_vagon . " fue modificado con exito", 200);
        } else {
            $this->view->response("Vagón con id: " . $id_vagon . " no fue encontrado", 404);
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
        if (isset($_GET['capacidad_max'])) {
            $filterColumna = $this->model->filterByColumna($_GET['capacidad_max']);
            return $this->view->response($filterColumna, 200);
        } else {
            return $this->view->response("Parametro no seteado", 400);
        }
    }
    //VER INYECCION

    public function paginado()
    {
        $cantidad = $this->model->countPaginas();
        if (isset($_GET['pagina']) && ($_GET['pagina']) <= $cantidad) {
            $pagina = $_GET['pagina'];
            $vagones = $this->model->paginado($pagina);
            return $this->view->response($vagones, 200);
        } else {
            return $this->view->response("No existe la pagina número " . $_GET['pagina'], 404);
        }
    }
}
