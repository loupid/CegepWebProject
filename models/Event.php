<?php


namespace models;


class Event implements \IModel
{
    public $id;
    public $publisher_id;
    public $title;
    public $organizer;
    public $address;
    public $link;
    public $file_name;
    public $category;
    public $price;
    public $description;
    public $start_date;
    public $end_date;
    public $hide;

    public static function create($db, $array = [])
    {
        // TODO: Implement create() method.
        $attributes = "";
        $values = "";
        $comma = " ";
        $data = array_values($array);
        foreach ($array as $key => $value) {
            if ($key == 'start_date' || $key == 'end_date'){
                $attributes .= $comma . $key ;
                $values .= $comma . "STR_TO_DATE( ?, '%d/%m/%Y %H:%i:%s')";
            } else {
                $attributes .= $comma . $key;
                $values .= $comma . '?';
            }
            $comma = ",";
        }
        $query = "INSERT INTO events (" . $attributes.") VALUES (" . $values . ")";
        $test = $db->prepare($query);
        $test->execute($data);
    }

    public static function update($id, $db, $array = [])
    {
        // TODO: Implement update() method. Avoid sql injection
        $query = "UPDATE events SET";
        $comma = ' ';
        foreach ($array as $key => $value){
            if ($key == "start_date" || $key == "end_date"){
                $query .= $comma . $key . " = STR_TO_DATE('".$value."', '%d/%m/%Y %H:%i:%s')";
            }
            else {
                $query .= $comma . $key . " = '".$value."'";
            }
            $comma = ", ";
        }
        $query .= " where id = ".$id;
        $db->prepare($query)->execute();
    }

    public static function delete($id, $db)
    {
        // TODO: Implement delete() method.
        $query = "DELETE FROM events WHERE id = '" . $id."'";
        $db->prepare($query)->execute();
    }
}
