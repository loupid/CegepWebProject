<?php

namespace controllers;

class PicturesController extends Controller
{
    public function index() {
        return $this->view('pictures/index');
    }
}
