<?php

namespace models;

class Link implements \IModel
{
    public $id;
    public $title;
    public $link;
    public $category;
    public $description;

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
        $query = "INSERT INTO links (" . $attributes . " ) VALUES (" . $values . ")";
        $db->prepare($query)->execute($data);
    }

    public static function update($id, $db, $array = [])
    {
        $query = "UPDATE links SET";
        $comma = ' ';
        foreach ($array as $key => $value) {
            $query .= $comma . $key . " = '" . $value . "'";
            $comma = ', ';
        }
        $query .= " where id = " . $id;
        $db->prepare($query)->execute();
    }

    public static function delete($id, $db)
    {
        $query = "DELETE FROM links WHERE id = '" . $id . "'";
        $db->prepare($query)->execute();
    }


}
