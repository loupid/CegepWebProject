<?php

namespace middlewares;

interface IMiddleware
{
    public function handle($route_param = []);
}