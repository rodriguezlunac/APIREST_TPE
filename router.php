<?php
require_once "Controllers/ApiLocomotorasController.php";
require_once "Controllers/ApiVagonesController.php";
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');


$controllerLocomotora = new locomotorasController;
$controllerVagon = new vagonesController;

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'Ferrocarriles';
}

$params = explode('/', $action);

switch ($params[0]) {
}