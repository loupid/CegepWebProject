<?php


namespace app;


class User
{
    public static function isLogged(){
        return isset($_SESSION['user']) && !is_null($_SESSION['user']);
    }

    public static function setUser($value){
        $_SESSION['user'] = $value;
    }

    public static function logout(){
        unset($_SESSION['user']);
    }
}