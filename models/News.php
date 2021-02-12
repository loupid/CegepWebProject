<?php

namespace models;

class News implements \Model
{
    public $id;
    public $title;
    public $publisher_id;
    public $link;
    public $file_id;
    public $category;
    public $description;
    public $hide;

    public static function create($db, $array = [])
    {
        // TODO: Implement create() method.
    }

    public static function update($id, $db, $array = [])
    {
        // TODO: Implement update() method.
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }
}