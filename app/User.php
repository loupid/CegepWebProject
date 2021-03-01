<?php

namespace app;

class User
{
    public $inactive = 7200;

    public static function login() {
        $_SESSION["timeout"] = time() + 7200;
    }
    public static function isLogged() {
        return isset($_SESSION['user']) && !is_null($_SESSION['user']);
    }

    public static function setUser($value) {
        $_SESSION['user'] = $value;
    }

    public static function timeLogged(){
        if (time() > $_SESSION['timeout']) {
            session_unset();
            session_destroy();
        } else {
            $_SESSION["timeout"] = time() + 7200;
        }
    }

    public static function logout() {
        unset($_SESSION['user']);
    }

    public static function setUserId($id) {
        $_SESSION['userId'] = $id;
    }

    public static function getUserId() {
        return $_SESSION['userId'];
    }
}