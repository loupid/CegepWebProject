<?php
namespace app;

class Session
{

    public static function get($key){
        $value = $_SESSION[$key];
        self::forget($key);
        return $value;
    }

    public static function put($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function exist($key){
        return isset($_SESSION[$key]);
    }

    public static function has($key){
        return self::exist($key) && !is_null($_SESSION[$key]);
    }

    public static function forget($key){
        unset($_SESSION[$key]);
    }
}