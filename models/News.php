<?php

namespace models;

class News implements \IModel
{
    public $id;
    public $title;
    public $publisher_id;
    public $link;
    public $file_name;
    public $category;
    public $description;
    public $hide;
    public $creation_date;

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
        $query = "INSERT INTO news (" . $attributes . ",creation_date) VALUES (" . $values . ", STR_TO_DATE( ?, '%d/%m/%Y %H:%i:%s'))";

        //add the creation date for the news
        array_push($data, date("d/m/Y H:i:s"));
        $db->prepare($query)->execute($data);
    }

    public static function update($id, $db, $array = [])
    {
        // TODO: Implement update() method.
        $query = "UPDATE news SET";
        $comma = ' ';
        foreach ($array as $key => $value){
            $query .= $comma . $key . " = '".$value."'";
            $comma = ', ';
        }
        $query .= " where id = ".$id;
        $db->prepare($query)->execute();
    }

    public static function delete($id, $db)
    {
        $query = "DELETE FROM news WHERE id = '" . $id."'";
        $db->prepare($query)->execute();
    }


}