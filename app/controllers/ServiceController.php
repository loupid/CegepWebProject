<?php

namespace controllers;

use app\FileManager;
use app\Session;
use app\User;
use models\Event;
use PDO;

class ServiceController extends Controller
{


    public function index()
    {
        return $this->view('services/index');
    }


    public function getAll()
    {
        $query = $this->getDatabase()->prepare("select title, start_date, category, organizer, address, price, description, end_date, file_name, link from events;");
        $query->setFetchMode(PDO::FETCH_CLASS, Event::class);
        $query->execute();
        $events = $query->fetchAll();
        return $this->view('events/index', ['events' => $events], 0);
    }


}
