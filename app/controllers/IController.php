<?php


namespace controllers;


interface IController
{
    public function index();
    public function create();
    public function created();
    public function update(int $id);
    public function updated();
    public function delete(int $id);
}