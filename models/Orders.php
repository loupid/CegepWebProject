<?php


namespace models;


class Orders implements \IModel
{

    public $id;
    public $matricula;
    public $first_name;
    public $last_name;
    public $order_date;
    public $paid_amount;
    public $delivered;

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
        $query = "INSERT INTO orders (" . $attributes . " ) VALUES (" . $values . ")";
        $db->prepare($query)->execute($data);
    }

    public static function update($id, $db, $array = [])
    {
        $query = "UPDATE orders SET";
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
        $query = "DELETE FROM orders WHERE id = '" . $id . "'";
        $db->prepare($query)->execute();
    }

}