<?php


namespace controllers;


class NewsController extends Controller
{
    public function create()
    {
        return $this->view('Admin/news/newsCreate',[], 1);
    }

    public function newsList()
    {
        return $this->view('Admin/news/newsList',[], 1);
    }
}