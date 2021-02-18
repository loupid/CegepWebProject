<?php

namespace controllers;

use app\FileManager;
use models\News;
use PDO;

class NewsController extends Controller
{
    public function create() {
        return $this->view('Admin/news/newsCreate',[], 1);
    }

    public function save(){
//        //this will save the image in the folder images/UploadedImages/
//        FileManager::saveFile();
//        //this will get the imageName
//        FileManager::getFileName();
        News::Create($this->getDatabase(), $_POST);
        $this->addNotification('addNews');
        return $this->redirectToRoute('newsList');
    }

    public function newsList() {
        $query = $this->getDatabase()->prepare("select * from news;");
        $query->setFetchMode(PDO::FETCH_CLASS, News::class);
        $query->execute();
        $newsList = $query->fetchAll();
        return $this->view('Admin/news/newsList',['newsList' => $newsList], 1);
    }

    public function newsEdit() {
        return $this->view('Admin/news/newsEdit',[], 1);
    }

    public function delete() {
        $con = $this->getDatabase();
        $match = $this->router->match();
        News::delete($match['params']['id'], $con);
        $this->newsList();
    }
}