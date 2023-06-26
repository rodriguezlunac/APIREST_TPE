<?php
class APIView{
    public function response($data, $status)
    {
        header("Content-Type: application/json");
        header("HTTP/1.1" . $status . " " . $this->_requestStatus($status));
        echo json_encode($data);
    }
    private function _requestStatus($code)
    {
        $status = array(
            200 => "Solicitud exitosa",
            // 204 => "No hay contenido para enviar esta solicitud",
            404 => "El servidor no puede encontrar el recurso solicitado",
            500 => "Error interno del servidor"
        );
        return (isset($status[$code])) ? $status[$code] : $status[500];
    }
}