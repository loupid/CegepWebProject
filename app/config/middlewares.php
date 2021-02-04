<?php

use middlewares\AdminMiddleware;
/*
 * ici on doit ajouter le nom de la route ainsi mettre la classe qui gere l'acces
 */
return [
    "adminDashboard" => [
        AdminMiddleware::class,
    ],
    "adminsList" => [
        AdminMiddleware::class,
    ]
];
