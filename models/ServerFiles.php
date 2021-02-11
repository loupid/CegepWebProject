<?php


namespace models;


class ServerFiles implements \Model
{
    public $id;
    public $name;
    public $path;

    public function create($array = [])
    {
        // TODO: Implement create() method.
    }

    public static function update($id, $db, $array = [])
    {
        // TODO: Implement update() method.
        $query = 'UPDATE serverfiles SET';
        $comma = ' ';
        foreach ($array as $key => $value){
            $query .= $comma . $key . " = '".$value."'";
            $comma = ', ';
        }
        $query .= ' where id = '.$id;
        $db->prepare($query)->execute();    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}