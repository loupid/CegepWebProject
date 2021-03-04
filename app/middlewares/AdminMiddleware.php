<?php

namespace middlewares;

use app\Session;
use app\User;

class AdminMiddleware extends Middleware implements IMiddleware
{
    public function handle($route_param = [])
    {
        // TODO: Implement handle() method. we will have to see if we are connected if not redirect to admin
        user::timeLogged();
        if (!User::isLogged()) {
            $this->addNotification('authError');
            return $this->redirectToRoute('adminIndex');
        }
    }
}