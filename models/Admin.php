<?php
//put here the same properties as the DB
namespace models;

class Admin implements \Model
{
    public $id;
    public $firstname;
    public $lastname;
    public $password;
    public $email;
    public $creationdate;
    public $lastconnectiondate;

    public function create($array = [])//['*']
    {
        // TODO: Implement create() method.

    }

    public static function update($id, $db, $array = [])
    {
        // TODO: Implement update() method.
        $query = 'UPDATE admins SET';
        $comma = ' ';
        foreach ($array as $key => $value){
            $query .= $comma . $key . " = STR_TO_DATE('".$value."', '%d/%m/%Y %H:%i:%s')";
            $comma = ', ';
        }
        $query .= ' where id = '.$id;
        $db->prepare($query)->execute();
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}