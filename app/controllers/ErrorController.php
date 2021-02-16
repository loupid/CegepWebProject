<?php

namespace controllers;

class ErrorController extends Controller
{
    public function error($errorView){
        http_response_code(404);
        return $this->view('errors/' . $errorView);
    }
}