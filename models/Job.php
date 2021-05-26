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
        $attributes = "";
        $values = "";
        $data = array_values($array);
        $comma = " ";
        foreach ($array as $key => $value) {
            $attributes .= $comma . $key;
            $values .= $comma . '?';
            $comma = ',';
        }
        $query = "INSERT INTO jobs (" . $attributes . " ) VALUES (" . $values . ")";
        $db->prepare($query)->execute($data);
    }

    public static function update($id, $db, $array = [])
    {
        $query = "UPDATE jobs SET";
        $comma = ' ';
        $ap = '`';
        foreach ($array as $key => $value) {
            $query .= $comma . $ap . $key . $ap . " = '" . $value . "'";
            $comma = ", ";
        }
        $query .= " where id = " . $id;

        $db->prepare($query)->execute();
    }

    public static function delete($id, $db)
    {
        // TODO: Implement delete() method.
        $query = "DELETE FROM jobs WHERE id = '" . $id . "'";
        $db->prepare($query)->execute();
    }

    private static function executeQuery($id, $array, $db)
    {
    }
}
