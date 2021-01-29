<?php


namespace controllers;


class ErrorController extends Controller
{
    public function error($errorView){
        return $this->view('errors/' . $errorView);
    }
}