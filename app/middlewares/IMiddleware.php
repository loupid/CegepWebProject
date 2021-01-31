<?php

namespace middlewares;

interface IMiddleware
{
    public function handle($request, $route_param = []);
}