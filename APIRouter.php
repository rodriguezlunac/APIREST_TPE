<?php
require_once 'libs/Router.php';
require_once 'Controllers/APILocomotorasController.php';
require_once 'Controllers/APIVagonesController.php';
require_once 'Controllers/APIErrorController.php';

define("BASE_URL", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/');

$resource = $_GET["resource"];
$method = $_SERVER["REQUEST_METHOD"];

// crea el router
$router = new Router();

// define la tabla de ruteo

$router->addRoute('vagones', 'GET', 'APIVagonesController', 'get');
$router->addRoute('vagones/ordenados', 'GET', 'APIVagonesController', 'orderByColumna');
$router->addRoute('vagones/filtro', 'GET', 'APIVagonesController', 'filterByColumna');
$router->addRoute('vagones/paginado', 'GET', 'APIVagonesController', 'paginado');
$router->addRoute('vagon/:ID', 'GET', 'APIVagonesController', 'get');
$router->addRoute('vagones', 'POST', 'APIVagonesController', 'insertVagon');
$router->addRoute('vagon/:ID', 'DELETE', 'APIVagonesController', 'deleteVagon');
$router->addRoute('vagon/:ID', 'PUT', 'APIVagonesController', 'updateVagon');
$router->addRoute('locomotoras', 'GET', 'APILocomotorasController', 'get');
$router->addRoute('locomotoras/filtro', 'GET', 'APILocomotorasController', 'filterByColumna');
$router->addRoute('locomotoras/ordenadas', 'GET', 'APILocomotorasController', 'orderByColumna');
$router->addRoute('locomotoras/paginado', 'GET', 'APILocomotorasController', 'paginado');
$router->addRoute('locomotora/:ID', 'GET', 'APILocomotorasController', 'get');
$router->addRoute('locomotoras', 'POST', 'APILocomotorasController', 'insertLocomotora');
$router->addRoute('locomotora/:ID', 'DELETE', 'APILocomotorasController', 'deleteLocomotora');
$router->addRoute('locomotora/:ID', 'PUT', 'APILocomotorasController', 'updateLocomotora');
$router->setDefaultRoute('APIErrorController', 'default');

// rutea
$router->route($resource, $method);
