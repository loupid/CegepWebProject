<?php

namespace models;

class InscriptionTutorat implements \IModel
{
    public $ID;
    public $matricule;
    public $prenom;
    public $nom;
    public $courriel;
    public $cours;
    public $statut;

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

    public static function delete($matricule, $db)
    {
        $query = "DELETE FROM tutorat WHERE matricule = '" . $matricule . "'";
        $db->prepare($query)->execute();
    }


}
