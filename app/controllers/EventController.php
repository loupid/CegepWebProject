<?php

namespace controllers;

class EventController extends Controller
{
    public function create()
    {
        return $this->view('Admin/events/eventCreate',[], 1);
    }

    public function eventsList()
    {
        return $this->view('Admin/events/eventsList',[], 1);
    }

    public function save(){

    }
}