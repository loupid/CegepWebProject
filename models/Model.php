<?php

interface Model
{
    public function create($array = []);

    public static function update($id, $db, $array = []);

    public function delete($id);
}