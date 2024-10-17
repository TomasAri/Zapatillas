<?php
require_once './aplicacion/middlewares/Session.auth.php';
require_once './aplicacion/middlewares/Verify.auth.php';
require_once './libs/res.php';
require_once './aplicacion/controllers/fabricas.controllers.php';
require_once './aplicacion/controllers/modelos.controllers.php';
require_once './aplicacion/controllers/auth.controllers.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

$action = 'listar';
    if (!empty( $_GET['action'])) {
        $action = $_GET['action'];
    }

$params = explode('/', $action);

switch($params[0]){
    case 'listar':
        sessionAuth($res);
        $controller = new fabricasControllers($res);
        $controller->showFabricas();
        break;
    case 'listarmodelo':
        sessionAuth($res);
        $controller = new modelosControllers($res);
        $controller -> showModelos();
        break;
    case 'detallesfabrica':
        sessionAuth($res);
        $controller = new fabricasControllers($res);
        $controller2 = new modelosControllers($res);
        $models = $controller2-> showModelosid($params[1]);
        $controller->showFabricaDetails($params[1], $models); // El segundo parámetro es el ID de la fábrica
        break;
    case 'detallesmodelo':
        sessionAuth($res);
        $controller = new modelosControllers($res);
        $controller -> showModeloDetails($params[1]);
        break;
    case 'showAddFabrica':
        sessionAuth($res);
        verifyAuth($res);
        $controller = new fabricasControllers($res);
        $controller -> ListaaddFab();
        break; 
    case 'addFabrica':
        sessionAuth($res);
        verifyAuth($res);
        $controller = new fabricasControllers($res);
        $controller -> addFab();
        break; 
    case 'showLogin':
        $controller = new AuthControllers();
        $controller -> showLogin();
        break;
    case 'login':
        $controller = new AuthControllers();
        $controller -> login();
        break;
    case 'logout':
        $controller = new AuthControllers();
        $controller->logout();
        break;
    default:
        echo '404 Page Not Found';
        break;
}