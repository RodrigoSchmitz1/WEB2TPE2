<?php 

require_once './libs/router.php';
require_once './app/controllers/plataforma-api.controller.php';


$router = new Router();

$router->addRoute('plataformas', 'GET', 'PlataformaApiController', 'showPlataformas');
$router->addRoute('plataformas/:id', 'GET', 'PlataformaApiController', 'showPlataforma');
$router->addRoute('plataformas/:id', 'DELETE', 'PlataformaApiController', 'deleteplataforma');
$router->addRoute('plataformas', 'POST', 'PlataformaApiController', 'addPlataforma');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>