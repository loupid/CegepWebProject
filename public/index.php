<?php
 require '../vendor/autoload.php';

 $router = new App\Router('views');

 include '../routes.php';
 $router->run();