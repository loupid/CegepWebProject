<?php


namespace models;


class OrderOffers implements \IModel
{

    public $order_id;
    public $offer_id;
    public $size;
    public $amount;

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
        $query = "INSERT INTO order_offers (" . $attributes . " ) VALUES (" . $values . ")";
        $db->prepare($query)->execute($data);
    }

    public static function update($id, $db, $array = [])
    {
        $query = "UPDATE order_offers SET";
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
        $query = "DELETE FROM order_offers WHERE id = '" . $id . "'";
        $db->prepare($query)->execute();
    }

}