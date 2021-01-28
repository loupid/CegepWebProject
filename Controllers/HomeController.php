<?php
namespace controllers;

class HomeController extends Controller {

    public function index() {
        return $this->view('home/index');
    }

}