<?php

namespace controllers;

use models\Event;
use PDO;

class EventController extends Controller
{
    public function create()
    {
        return $this->view('Admin/events/eventCreate', [], 1);
    }

    public function eventsList()
    {
        return $this->view('Admin/events/eventsList', [], 1);
    }

    public function getAll()
    {
        $query = $this->getDatabase()->prepare("select title, start_date, category, organizer, address, price, description, end_date, file_name, link from events;");
        $query->setFetchMode(PDO::FETCH_CLASS, Event::class);
        $query->execute();
        $events = $query->fetchAll();
        return $this->view('events/index', ['events' => $events], 0);
    }

    public function save()
    {

    }
}
