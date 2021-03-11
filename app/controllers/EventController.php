<?php

namespace controllers;

use app\FileManager;
use app\Session;
use app\User;
use models\Event;
use PDO;

class EventController extends Controller
{
    
    
    public function getAll()
    {
        $query = $this->getDatabase()->prepare("select title, start_date, category, organizer, address, price, description, end_date, file_name, link from events;");
        $query->setFetchMode(PDO::FETCH_CLASS, Event::class);
        $query->execute();
        $events = $query->fetchAll();
        return $this->view('events/index', ['events' => $events], 0);
    }
    
    public function eventsList() {
        $query = $this->getDatabase()->prepare("select * from events;");
        $query->setFetchMode(PDO::FETCH_CLASS, Event::class);
        $query->execute();
        $eventsList = $query->fetchAll();
        return $this->view('Admin/events/eventsList',['eventsList' => $eventsList], 1);
    }

    public function create() {
        return $this->view('Admin/events/eventCreate',[], 1);
    }

    public function created(){
        $data = $_POST;
        $data['start_date'] = date("d/m/Y H:i:s", strtotime($data['start_date']));
        $data['end_date'] = date("d/m/Y H:i:s", strtotime($data['end_date']));
        //this will save the image in the folder images/UploadedImages/
        FileManager::saveFile();
        //this will get the imageName
        $data['file_name'] = FileManager::getFileName();
        $data['publisher_id'] = User::getUserId();
        Event::create($this->getDatabase(), $data);
        $this->addNotification('addEvent');
        return $this->redirectToRoute('eventsList');
    }

    public function update($id) {
        $query = $this->getDatabase()->prepare("select * from events where id = ?;");
        $query->setFetchMode(PDO::FETCH_CLASS, Event::class);
        $query->execute([0=>$id]);
        $event = $query->fetch();
        Session::put('eventsId',$id);
        return $this->view('Admin/events/eventEdit',['event' => $event], 1);
    }

    public function updated(){
        $data = $_POST;

        $data['start_date'] = date("d/m/Y H:i:s", strtotime($data['start_date']));
        $data['end_date'] = date("d/m/Y H:i:s", strtotime($data['end_date']));

        //this will save the image in the folder images/UploadedImages/
        FileManager::saveFile();

        if (FileManager::getFileName() !== $data['file_name'] && FileManager::getFileName() !== ''){
            $data['file_name'] = FileManager::getFileName();
        }

        if (!isset($data['hide'])){
            $data['hide'] = 0;
        }

        $data['publisher_id'] = User::getUserId();

        Event::update(Session::get('eventsId'), $this->getDatabase(), $data);
        $this->addNotification('updateEvent');

        return $this->redirectToRoute('eventsList');
    }

    public function delete() {
        $con = $this->getDatabase();
        $match = $this->router->match();
        Event::delete($match['params']['id'], $con);
        $this->eventsList();
    }
}
