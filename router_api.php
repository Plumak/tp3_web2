<?php
require_once ('./libs/router.php');
require_once ('controller.php');

$router = new Router();

$router->addRoute('jugadores', 'GET', 'JugApiController', 'obtenerJugadores');
$router->addRoute('jugadores/:ID', 'GET', 'JugApiController', 'obtenerJugador');
$router->addRoute('jugadores', 'POST', 'JugApiController', 'crearJugador');
$router->addRoute('jugadores/:ID', 'PUT', 'JugApiController', 'actualizarJugador');


$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>