<?php
require_once 'libs/Router.php';
require_once 'Controllers/APILocomotorasController.php';
require_once 'Controllers/APIVagonesController.php';
require_once 'Controllers/APIErrorController.php';

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$resource = $_GET["resource"];
$method = $_SERVER["REQUEST_METHOD"];

// crea el router
$router = new Router();

// define la tabla de ruteo

//TRAE TODOS LOS VAGONES
$router->addRoute('vagones', 'GET', 'APIVagonesController', 'get');
//TRAE LOS VAGONES ORDENADOS POR COLUMNA Y ORDEN
$router->addRoute('vagones/ordenados', 'GET', 'APIVagonesController', 'orderByColumna');
//TRAE LOS VAGONES POR FILTRO DE AÑO DE FABRICACION MAYOR A UN VALOR
$router->addRoute('vagones/filtro', 'GET', 'APIVagonesController', 'filterByColumna');
//PAGINADO
$router->addRoute('vagones/paginado', 'GET', 'APIVagonesController', 'paginado');
//TRAE UN VAGON ESPECIFICO POR ID
$router->addRoute('vagon/:ID', 'GET', 'APIVagonesController', 'get');
//INSERTA UN VAGON
$router->addRoute('vagones', 'POST', 'APIVagonesController', 'insertVagon');
//ELIMINA UN VAGON POR ID 
$router->addRoute('vagon/:ID', 'DELETE', 'APIVagonesController', 'deleteVagon');
//MODIFICA UN VAGON POR ID
$router->addRoute('vagon/:ID', 'PUT', 'APIVagonesController', 'updateVagon');
//TRAE TODAS LAS LOCOMOTORAS
$router->addRoute('locomotoras', 'GET', 'APILocomotorasController', 'get');
//TRAE LAS LOCOMOTORAS POR FILTRO DE CAPACIDAD MAXIMA MAYOR A UN VALOR
$router->addRoute('locomotoras/filtro', 'GET', 'APILocomotorasController', 'filterByColumna');
//TRAE LAS LOCOMOTORAS ORDENADAS POR COLUMNA Y ORDEN
$router->addRoute('locomotoras/ordenadas', 'GET', 'APILocomotorasController', 'orderByColumna');
//PAGINADO
$router->addRoute('locomotoras/paginado', 'GET', 'APILocomotorasController', 'paginado');
//TRAE UNA LOCOMOTORA ESPECIFICA POR ID
$router->addRoute('locomotora/:ID', 'GET', 'APILocomotorasController', 'get');
//iNSERTA UNA LOCOMOTORA
$router->addRoute('locomotoras', 'POST', 'APILocomotorasController', 'insertLocomotora');
//ELIMINA UNA LOCOMOTORA POR ID
$router->addRoute('locomotora/:ID', 'DELETE', 'APILocomotorasController', 'deleteLocomotora');
//MODIFICA UNA LOCOMOTORA POR ID
$router->addRoute('locomotora/:ID', 'PUT', 'APILocomotorasController', 'updateLocomotora');


//ver como hacer andar el default del router
$router->addRoute('/', 'GET', 'APIErrorController', 'ErrorDePagina');

// rutea
$router->route($resource, $method);