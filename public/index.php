<?php
 require '../vendor/autoload.php';
 $router = new AltoRouter();
 $router->map('GET','/', function () {
     echo "nowwwob";
 });
 $router->map('GET','/main', function () {
     require '../views/main.php';
 });

 $match = $router->match();
 if ($match !== null){
     require '../elements/header.php';
     $match['target']();
     require '../elements/footer.php';
 }
 else{
     echo 'patate';
 }

 ?>
