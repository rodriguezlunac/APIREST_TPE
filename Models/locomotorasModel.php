<?php
class locomotorasModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_trenes;charset=utf8', 'root', '');
    }

 
}
