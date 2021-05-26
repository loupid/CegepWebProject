<?php

namespace models;

class Job implements \IModel
{
    public $id;
    public $title;
    public $phone;
    public $category;
    public $duration;
    public $start;
    public $salairy;
    public $description;
    public $skills;
    public $city;
    public $publicationDate;
    public $employer;
    public $show;


    public static function create($db, $array = [])
    {
    }

    public static function update($id, $db, $array = [])
    {

    }

    public static function delete($id, $db)
    {
    }

    private static function executeQuery($id, $array, $db)
    {
    }
}
