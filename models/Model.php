<?php


interface Model
{
    public function create($array = []);

    public function update($id, $array = []);

    public function delete($id);
}