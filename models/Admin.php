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

    public function update($id, $array = [])
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}