<?php

namespace controllers;

use app\Session;

abstract class Controller
{

    protected $router;
    private $db;

    public function __construct($router, $db)
    {
        $this->router = $router;
        $this->db = $db;
    }

    protected function view(string $view, array $data = [], int $isAdmin = 0)
    {
        // Declare each key/value pair as a variable
        extract($data);
        // Construct the view with the variables
        try {
            if ($isAdmin == 0 || $isAdmin == 1) {
                ob_start();
                require __DIR__ . '/../../src/views/' . $view . '.php';
                $content = ob_get_clean();
                if ($isAdmin == 0)
                    require __DIR__ . '/../../src/views/layouts/layout.php';
                else if ($isAdmin == 1)
                    require __DIR__ . '/../../src/views/layouts/adminLayout.php';
            } else if ($isAdmin == 2) {
                require __DIR__ . '/../../src/views/' . $view . '.php';
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    protected function getRouter()
    {
        return $this->router;
    }

    protected function getDatabase()
    {
        return $this->db;
    }

    protected function redirectToUrl(string $url, array $data = [])
    {
        foreach ($data as $k => $v) {
            Session::put($k, $v);
        }
        header('Location: ' . $url);
    }

    protected function redirectToRoute(string $route, array $data = [])
    {
        $url = $this->router->generate($route);

        //maybe to change this to extract($data);
        foreach ($data as $k => $v) {
            Session::put($k, $v);
        }

        header('Location: ' . $url);
        return true;
    }

    protected function addNotification($notificationName)
    {
        $message = require __DIR__ . '/../../app/config/messageNotify.php';
        Session::put('notifAdmin', $message[$notificationName]);
    }

    protected function addLoginNotification($notificationName)
    {
        $message = require __DIR__ . '/../../app/config/messageNotify.php';
        Session::put('notifLogin', $message[$notificationName]);
    }
}
