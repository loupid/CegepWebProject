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
    ],
    "linksList" => [
        AdminMiddleware::class
    ],
    "linksCreate" => [
        AdminMiddleware::class
    ],
    "linksUpdate" => [
        AdminMiddleware::class
    ],
    "ordersIndex" => [
        AdminMiddleware::class
    ],
    "ordersCreate" => [
        AdminMiddleware::class
    ],
    "ordersEdit" => [
        AdminMiddleware::class
    ],
    "ordersDelete" => [
        AdminMiddleware::class
    ],
    "ordersCreated" => [
        AdminMiddleware::class
    ],
    "ordersEdited" => [
        AdminMiddleware::class
    ],
    "offersIndex" => [
        AdminMiddleware::class
    ],
    "offersCreate" => [
        AdminMiddleware::class
    ],
    "offersEdit" => [
        AdminMiddleware::class
    ],
    "offersDelete" => [
        AdminMiddleware::class
    ],
    "offersCreated" => [
        AdminMiddleware::class
    ],
    "offersEdited" => [
        AdminMiddleware::class
    ],
    "clothesIndex" => [
        AdminMiddleware::class
    ],
    "clothesCreate" => [
        AdminMiddleware::class
    ],
    "clothesEdit" => [
        AdminMiddleware::class
    ],
    "clothesDelete" => [
        AdminMiddleware::class
    ],
    "clothesCreated" => [
        AdminMiddleware::class
    ],
    "clothesEdited" => [
        AdminMiddleware::class
    ]

];
