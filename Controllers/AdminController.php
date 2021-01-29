<?php


namespace controllers;


class AdminController extends Controller
{
    public function index()
    {
        return $this->view('admin/index');
    }

    public function confirm()
    {
        //this will extract all value of
//        extract($_POST);
//        $name;
        //validation and decide if you return to the list with a succes or to the same view with an errorst

        return $this->view('admin/index', $_POST);
    }
}