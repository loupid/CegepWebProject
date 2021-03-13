<?php
//put here the same properties as the DB
namespace models;

class Admin implements \IModel
{
    public $id;
    public $firstname;
    public $lastname;
    public $password;
    public $email;
    public $workphone;
    public $desk;
    public $cellphone;
    public $status;
    public $creation_date;
    public $last_connection_date;


    public static function create($db, $array = [])
    {
        if ($array['confirm_password'] == $array['password']) {
            $attributes = "";
            $values = "";
            $array['password'] = password_hash($array['password'], PASSWORD_BCRYPT);
            unset($array['confirm_password']);
            $data = array_values($array);
            foreach ($array as $key => $value) {
                $attributes .= $key . ",";
                $values .= '?,';
            }
            $query = "INSERT INTO ADMINS (" . $attributes . "creation_date) VALUES (" . $values . "STR_TO_DATE( ?, '%d/%m/%Y %H:%i:%s'))";

            //add the value for the date in the array $data
            array_push($data, date("d/m/Y H:i:s"));
            $db->prepare($query)->execute($data);
        } //todo error message
    }

    public static function update($id, $db, $array = [])
    {
        // TODO: Implement update() method.
        if ($array['confirm_password'] == $array['password'] && isset($array['password'])) {
            $array['password'] = password_hash($array['password'], PASSWORD_BCRYPT);
            unset($array['confirm_password']);
            self::executeQuery($id, $array, $db);
        }
        else {
            self::executeQuery($id, $array, $db);
        }
    }

    public static function delete($id, $db)
    {
        $query = "DELETE FROM admins WHERE id = '" . $id . "'";
        $db->prepare($query)->execute();
    }

    private static function executeQuery($id, $array, $db){
        $query = "UPDATE admins SET";
        $comma = " ";
        foreach ($array as $key => $value) {
            if ($key == "creation_date" || $key == "last_connection_date") {
                $query .= $comma . $key . " = STR_TO_DATE('" . $value . "', '%d/%m/%Y %H:%i:%s')";
            } else {
                $query .= $comma . $key . " = '" . $value . "'";
            }
            $comma = ", ";
        }
        $query .= " where id = " . $id;
        $db->prepare($query)->execute();
    }
}
