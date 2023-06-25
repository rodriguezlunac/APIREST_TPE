<?php
require_once 'libs/Router.php';
require_once 'Controllers/ApiLocomotorasController.php';
require_once 'Controllers/ApiVagonesController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('vagones', 'GET', 'ApiVagonesController', 'get');
$router->addRoute('vagon/:ID', 'GET', 'ApiVagonesController', 'get');
$router->addRoute('vagones', 'POST', 'ApiVagonesController', 'insertVagon');
$router->addRoute('vagon/:ID', 'DELETE', 'ApiVagonesController', 'deleteVagon');
$router->addRoute('vagon/:ID', 'PUT', 'ApiVagonesController', 'updateVagon');
$router->addRoute('locomotoras', 'GET', 'ApiLocomotorasController', 'get');
$router->addRoute('locomotoras/:ID', 'GET', 'ApiLocomotorasController', 'get');
$router->addRoute('locomotoras', 'POST', 'ApiLocomotorasController', 'insertLocomotora');
$router->addRoute('locomotora/:ID', 'DELETE', 'ApiLocomotoraController', 'deleteLocomotora');
$router->addRoute('locomotora/:ID', 'PUT', 'ApiLocomotoraController', 'updateLocomotora');
// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);