<?php

namespace middlewares;

use app\Session;
use app\User;

class AdminMiddleware extends Middleware implements IMiddleware
{
    public function handle($route_param = [])
    {
        user::timeLogged();
        if (!User::isLogged()) {
            $this->addLoginNotification('authError');
            $this->redirectToRoute('adminIndex');
        }
    }
}