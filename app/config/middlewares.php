<?php

use middlewares\AdminMiddleware;
/*
 * ici on doit ajouter le nom de la route ainsi mettre la classe qui gere l'acces
 */
return [
    "adminDashboard" => [
        AdminMiddleware::class
    ],
    "adminsList" => [
        AdminMiddleware::class
    ],
    "adminCreate" => [
        AdminMiddleware::class
    ],
    "adminUpdate" => [
        AdminMiddleware::class
    ],
    "eventsList" => [
        AdminMiddleware::class
    ],
    "eventCreate" => [
        AdminMiddleware::class
    ],
    "eventUpdate" => [
        AdminMiddleware::class
    ],
    "newsList" => [
        AdminMiddleware::class
    ],
    "newsCreate" => [
        AdminMiddleware::class
    ],
    "newsUpdate" => [
        AdminMiddleware::class
    ]
];
