<?php

require_once './aplicacion/controllers/fabricas.controllers.php';
require_once './aplicacion/controllers/modelos.controllers.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar';
    if (!empty( $_GET['action'])) {
        $action = $_GET['action'];
    }

$action2 = 'listarmodelo';
if (!empty( $_GET['action'])) {
    $action2 = $_GET['action'];
}

$params = explode('/', $action);
$params2 = explode('/', $action2);

switch($params[0]){
    case 'listar':
        $controller = new fabricasControllers();
        $controller->showFabricas();
        break;
    case 'listarmodelo':
        $controller = new modelosControllers();
        $controller -> showModelos();
        break;
    case 'detallesfabrica':
        $controller = new fabricasControllers();
        $controller2 = new modelosControllers();
        $models = $controller2-> showModelosid($params[1]);
        $controller->showFabricaDetails($params[1], $models); // El segundo parámetro es el ID de la fábrica
            break;
    case 'detallesmodelo':
        $controller = new modelosControllers();
        $controller -> showModeloDetails($params[1]);
            break;
}