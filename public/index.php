<?php
require '../vendor/autoload.php';


require '../database/Database.php';
$router = new AltoRouter();

//$database_config = require '../config/database.php';
//$database_config = $database_config['mysql']; // Set to wanted database config name
//
//$database = new Database($database_config['database']);
//$database->setHost($database_config['host'])
//    ->setPort($database_config['port'])
//    ->setUsername($database_config['username'])
//    ->setPassword($database_config['password']);
//$db_conn = $database->connect();
$db_conn = null;

require '../routes.php';

$match = $router->match();

if (is_array($match)) {
    $exploded = explode('@', $match['target']);

    if (is_array($exploded) && count($exploded) >= 2) {
        $path = '../controllers/' . $exploded[0] . '.php';
        if (file_exists($path)) {
            require '../controllers/Controller.php';
            require '../controllers/' . $exploded[0] . '.php';
            if (class_exists('\\controllers\\' . $exploded[0])) {
                $instance = getControllerClassInstance($exploded[0], $router, $db_conn);
                $response = call_user_func_array(array($instance, $exploded[1]), $match['params']) or die("Couldn't call specified method");
                if (!$response)
                    die("Couldn't return demanded view");
            } else {
                die("Specified controller class not found");
            }
        } else {
            die("Specified controller class not found");
        }
    } else {
        $instance = getControllerClassInstance('Controller', $router, $db_conn);
        $response = call_user_func_array(array($instance, 'view'), array($match['target'], $match['params'])) or die("Couldn't call specified method");
        if (!$response)
            echo "Couldn't return demanded view";
    }
} else {
    ob_start();
    require '../views/error/error.php';
    $content = ob_get_clean();
    require '../elements/layout.php';
}

function getControllerClassInstance($controller, $router, $db)
{
    try {
        $class = new ReflectionClass('\\controllers\\' . $controller);
        return $class->newInstanceArgs(array($router, $db));
    } catch (ReflectionException $e) {
        die($e->getMessage()). 'wer';
    }
}

