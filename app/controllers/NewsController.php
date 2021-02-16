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
//        return $this->redirectToRoute('newsList', [
//            'error' => [
//                0 => [
//                    'color' => 'green-500',
//                    'message' => 'Une nouvelle actualité a été ajouté.',
//                    'colorIcon' => 'green-700'
//                ]
//            ]
//        ]);
    }

    public function newsList() {
        $this->addNotification('error');
        return $this->view('Admin/news/newsList',[], 1);
    }

    public function newsEdit() {
        return $this->view('Admin/news/newsEdit',[], 1);
    }
}