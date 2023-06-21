<?php
require_once 'libs/Router.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('locomotoras', 'GET', 'ApiLocomotorasController', 'getLocomotoras');
$router->addRoute('locomotoras', 'POST', 'ApiLocomotorasController', 'insertarLocomotora');
$router->addRoute('locomotoras/:ID', 'GET', 'ApiLocomotorasController', 'getLocomotora');
$router->addRoute('locomotoras/:ID', 'DELETE', 'ApiLocomotoraController', 'deleteLocomotora');
// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);