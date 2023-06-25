<?php
require_once 'libs/Router.php';
require_once 'Controllers/APILocomotorasController.php';
require_once 'Controllers/APIVagonesController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('vagones', 'GET', 'APIVagonesController', 'get');
$router->addRoute('vagon/:ID', 'GET', 'APIVagonesController', 'get');
$router->addRoute('vagones', 'POST', 'APIVagonesController', 'insertVagon');
$router->addRoute('vagon/:ID', 'DELETE', 'APIVagonesController', 'deleteVagon');
$router->addRoute('vagon/:ID', 'PUT', 'APIVagonesController', 'updateVagon');
$router->addRoute('locomotoras', 'GET', 'APILocomotorasController', 'get');
$router->addRoute('locomotoras/:ID', 'GET', 'APILocomotorasController', 'get');
$router->addRoute('locomotoras', 'POST', 'APILocomotorasController', 'insertLocomotora');
$router->addRoute('locomotora/:ID', 'DELETE', 'APILocomotorasController', 'deleteLocomotora');
$router->addRoute('locomotora/:ID', 'PUT', 'APILocomotorasController', 'updateLocomotora');
// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);