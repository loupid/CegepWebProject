<?php

namespace controllers;

use app\FileManager;
use models\News;

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
        return $this->view('Admin/news/newsList',[], 1);
    }

    public function newsEdit() {
        return $this->view('Admin/news/newsEdit',[], 1);
    }
}