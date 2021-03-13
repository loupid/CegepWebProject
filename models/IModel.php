<?php

interface IModel
{
    public static function create($db, $array = []);

    public static function update($id, $db, $array = []);

    public static function delete($id, $db);
}
