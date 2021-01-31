<?php

namespace middlewares;

use app\Session;

class AdminMiddleware extends Middleware implements IMiddleware
{
    public function handle($request, $route_param = [])
    {
        // TODO: Implement handle() method. we will have to see if we are connected if not redirect to admin
//        return $this->redirectToRoute('indexAdmin', [
//            'error' => [
//                "Vous n'y avez pas accès. Veuillez vous connecter."
//            ]
//        ]);
    }

}