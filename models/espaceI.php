<?php

namespace models;

class espaceI implements \IModel
{
    public $ID;
    public $Prenom;
    public $Nom;
    public $Courriel;
    public $horaire;

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
        $query = "INSERT INTO espace_i (" . $attributes . " ) VALUES (" . $values . ")";
        $db->prepare($query)->execute($data);
    }

    public static function update($id, $db, $array = [])
    {
        $query = "UPDATE espace_i SET";
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
        $query = "DELETE FROM espace_i WHERE ID = '" . $id . "'";
        $db->prepare($query)->execute();
    }

    public static function deleteAll($db)
    {
        $query = "DELETE FROM espace_i";
        $db->prepare($query)->execute();
    }


}
