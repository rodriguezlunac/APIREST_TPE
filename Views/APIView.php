<?php
class APIView{
    public function response($data, $status)
    {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        echo json_encode($data);
    }

    private function _requestStatus($code)
    {
        $status = array(
            200 => "Solicitud exitosa",
            201 => "Creado con exito",
            400 => "El servidor no puede procesar la petición debido a un error del cliente",
            404 => "El servidor no puede encontrar el recurso solicitado",
            500 => "Error interno del servidor",
        );

        return array_key_exists($code, $status) ? $status[$code] : $status[500];
    }
}