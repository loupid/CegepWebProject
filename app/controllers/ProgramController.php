<?php


namespace controllers;


class ProgramController extends Controller
{
    public function index(){
        return $this->view('program/index');
    }
}