<?php


namespace models;


class Clothes implements \IModel
{

    public $id;
    public $sku;
    public $name;
    public $color;
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
        $query = "INSERT INTO clothes (" . $attributes . " ) VALUES (" . $values . ")";
        $db->prepare($query)->execute($data);
    }

    public static function update($id, $db, $array = [])
    {
        $query = "UPDATE clothes SET";
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
        $query = "DELETE FROM clothes WHERE id = '" . $id . "'";
        $db->prepare($query)->execute();
    }

}