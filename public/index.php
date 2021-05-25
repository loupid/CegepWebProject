<?php
session_start();
require '../vendor/autoload.php';
require '../app/Session.php';
require '../app/User.php';
require '../app/FileManager.php';
require '../database/database.php';
require '../models/modelsConfig.php';

$router = new AltoRouter();

$database_config = require '../app/config/database.php';
$database_config = $database_config['mysql']; // Set to wanted database config name
//$database_config = $database_config['mysqlSchool']; // Set to wanted database config name

$database = new Database($database_config['database']);
$database->setHost($database_config['host'])
    ->setPort($database_config['port'])
    ->setUsername($database_config['username'])
    ->setPassword($database_config['password']);
$db_conn = $database->connect();

require '../app/config/routes.php';

$match = $router->match();

if (is_array($match)) {

    $middlewares = require '../app/config/middlewares.php';
    if(isset($middlewares[$match['name']])) {
        $middleware = $middlewares[$match['name']];
        if(is_array($middleware)) {
            foreach($middleware as $m) {
                callMiddleware($m, $match['params'], $router, $db_conn);
            }
        } else callMiddleware($middleware, $match['params'], $router, $db_conn);
    }

    $exploded = explode('@', $match['target']);

    if (is_array($exploded) && count($exploded) >= 2) {
        $path = '../app/controllers/' . $exploded[0] . '.php';
        if (file_exists($path)) {
            require '../app/controllers/Controller.php';
            require '../app/controllers/' . $exploded[0] . '.php';
            if (class_exists('\\controllers\\' . $exploded[0])) {
                $instance = getControllerClassInstance($exploded[0], $router, $db_conn);
                call_user_func_array(array($instance, $exploded[1]), $match['params']);
            } else {
                die("Specified controller class not found");
            }
        } else {
            die("Specified controller class not found");
        }
    } else {
        require '../app/controllers/Controller.php';
        $instance = getControllerClassInstance('Controller', $router, $db_conn);
        call_user_func_array(array($instance, 'view'), array($match['target'], $match['params']));
    }
        
} else {
    require '../app/controllers/Controller.php';
    require '../app/controllers/ErrorController.php';
    $instance = getControllerClassInstance('ErrorController', $router, $db_conn);
    call_user_func_array(array($instance, 'error'), array('error', null));
}

function getControllerClassInstance($controller, $router, $db): object
{
    try {
        $class = new ReflectionClass('\\controllers\\' . $controller);
        return $class->newInstanceArgs(array($router, $db));
    } catch (ReflectionException $e) {
        die($e->getMessage());
    }
}

function callMiddleware($middleware, $route_params, $router, $db) {
    try {
        require_once '../app/middlewares/Middleware.php';
        require_once '../app/middlewares/IMiddleware.php';
        require_once '../app/'.str_replace('\\', '/', $middleware).'.php';
        $class = new ReflectionClass($middleware);
        $instance = $class->newInstanceArgs(array($router, $db));
        call_user_func_array(array($instance, 'handle'), $route_params);
    } catch (ReflectionException $e) {
        die("Couldn't load specified middleware");
    }
}
