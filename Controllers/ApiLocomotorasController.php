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
        $this->data= file_get_contents("php://input");

    }
    function getData(){
        return json_decode($this->data);
    }
    function getLocomotoras($params = [])
    {
        $locomotoras = $this->model->getLocomotoras();
        return $this->view->response($locomotoras, 200);
    }
   
    // function getLocomotoras($params=null){
    //     $id=$params[':ID'];
    // }
    // function getLocomotora($params=null){
    //     $id=$params[':ID'];
    // }
}
