<?php
require_once('app/models/task.model.php');
require_once('api.view.php');

class APITokenController
{

    // private $model;
    // private $view;
    // private $data;
    // public function __construct()
    // {
        // $this->model = new usuariosModel();
    //     $this->view = new APIView();
    //     $this->data = file_get_contents("php://input");
    // }
    
    // private function verificaToken()
    // {
    //     global $parametros;


    //     $token = $parametros['token'];
    //     print_r($_SERVER);
    //     $requestHeaders = apache_request_headers();
    //     print_r($requestHeaders);
    //     $auth = $requestHeaders['Authorization'];
    //     $data = explode(' ', $auth);
    //     $info = base64_decode($data[1]);
    //     echo($info);
    //     die;
    // }

    // private function verificaBasico()
    // {
    //     global $parametros;

    //     $user = $_SERVER['PHP_AUTH_USER'];
    //     $pass = $_SERVER['PHP_AUTH_PW'];

    //     if (($parametros['password'] == $pass) &&
    //         ($parametros['user'] == $user)
    //     ) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }


}
