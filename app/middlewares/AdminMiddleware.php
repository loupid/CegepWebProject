<?php

namespace middlewares;

use app\Session;
use app\User;

class AdminMiddleware extends Middleware implements IMiddleware
{
    public function handle($route_param = [])
    {
        // TODO: Implement handle() method. we will have to see if we are connected if not redirect to admin
        if (!User::isLogged()) {
            return $this->redirectToRoute('adminIndex', [
                'error' => [
                    0 => [
                        'message' => "Vous n'y avez pas accès. Veuillez vous connecter.",
                        'color' => 'red-600',
                        'colorIcon' => 'red-700'
                    ]
                ],
            ]);
        }
    }

}