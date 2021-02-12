<?php

namespace app;


class FileManager
{
    public static function saveFile(){
        if (0 < $_FILES['file']['error']) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], 'images/UploadedImages/' . $_FILES['file']['name']);
        }
    }

    public static function getFileName(){
        return $_FILES['file']['name'];
    }
}