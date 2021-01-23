<?php
 require '../vendor/autoload.php';

 $router = new App\Router('views');

 $router->get('/','home')
     ->get('/main-[i:age]-[a:name]','main', 'main')
     ->run();