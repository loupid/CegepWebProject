<?php

namespace controllers;

class CoursesController extends Controller
{
    public function index() {
        return $this->view('courses/index');
    }
}