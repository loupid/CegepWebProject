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
        $attributes = "";
        $values = "";
        $data = array_values($array);
        $comma = " ";
        foreach ($array as $key => $value) {
            $attributes .= $comma . $key;
            $values .= $comma . '?';
            $comma = ',';
        }
        $query = "INSERT INTO news (" . $attributes . " ) VALUES (" . $values . ")";
        $db->prepare($query)->execute($data);
    }

    public static function update($id, $db, $array = [])
    {
        // TODO: Implement update() method.
        $query = 'UPDATE news SET';
        $comma = ' ';
        foreach ($array as $key => $value){
            $query .= $comma . $key . " = '".$value."'";
            $comma = ', ';
        }
        $query .= ' where id = '.$id;
        //$db->prepare($query)->execute();
    }

    public static function delete($id, $db)
    {
        $query = "DELETE FROM news WHERE id = '" . $id."'";
        $db->prepare($query)->execute();
    }


}