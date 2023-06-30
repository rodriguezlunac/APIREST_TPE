<?php
require_once "./Views/APIView.php";

class APIErrorController{
    private $view;


    function __construct()
    {
        $this->view = new APIView();
    }

    public function ErrorDePagina(){
        $this->view->response("URL invalida", 404);
    }
}