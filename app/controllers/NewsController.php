<?php

namespace controllers;

use app\FileManager;
use app\Session;
use app\User;
use models\News;
use PDO;

class NewsController extends Controller
{
    public function newsList()
    {
        $query = $this->getDatabase()->prepare("select * from news;");
        $query->setFetchMode(PDO::FETCH_CLASS, News::class);
        $query->execute();
        $newsList = $query->fetchAll();
        return $this->view('Admin/news/newsList', ['newsList' => $newsList], 1);
    }

    public function getAll()
    {
        $query = $this->getDatabase()->prepare("select n.id, title, link, category, description, file_name, n.creation_date, concat(a.firstname, ' ', a.lastname) as publisher from news n inner join admins a where n.publisher_id = a.id order by creation_date desc;");
        $query->setFetchMode(PDO::FETCH_CLASS, News::class);
        $query->execute();
        $newsList = $query->fetchAll();
        return $this->view('news/index', ['newsList' => $newsList, 'ordreActif' => ''], 0);
    }
    //Recherche actualite
    public function getAllWhere()
    {
        $action = "";
        if (!empty($_POST['search'])) {
            $action = $_POST['search'];
        }
        $query = $this->getDatabase()->prepare("select n.id, title, link, category, description, file_name, n.creation_date, concat(a.firstname, ' ', a.lastname) as publisher from news n inner join admins a where n.publisher_id = a.id and upper(title) like upper( :search ) order by creation_date desc;");
        $query->setFetchMode(PDO::FETCH_CLASS, News::class);
        $query->execute(array(':search' => '%'.$action.'%'));
        $newsList = $query->fetchAll();
        return $this->view('news/index', ['newsList' => $newsList, 'search' => $action, 'ordreActif' => ''], 0);
    }

    public function getAllWhereOA()
    {
        $action = "";
        if (!empty($_POST['search'])) {
            $action = $_POST['search'];
        }
        $query = $this->getDatabase()->prepare("select n.id, title, link, category, description, file_name, n.creation_date, concat(a.firstname, ' ', a.lastname) as publisher from news n inner join admins a where n.publisher_id = a.id and upper(title) like upper( :search ) order by title;");
        $query->setFetchMode(PDO::FETCH_CLASS, News::class);
        $query->execute(array(':search' => '%'.$action.'%'));
        $newsList = $query->fetchAll();
        return $this->view('news/index', ['newsList' => $newsList, 'search' => $action, 'ordreActif' => 'nom'], 0);
    }

    public function getNews($id)
    {
        $query = $this->getDatabase()->prepare("select n.id, title, link, category, description, file_name, n.creation_date, concat(a.firstname, ' ', a.lastname) as publisher from news n inner join admins a where n.publisher_id = a.id and n.id = ? order by creation_date desc;");
        $query->setFetchMode(PDO::FETCH_CLASS, News::class);
        $query->execute([0=>$id]);
        $news = $query->fetch();
        Session::put('newsId', $id);
        return $this->view('news/newsDetails', ['news' => $news], 0);
    }

    public function create()
    {
        return $this->view('Admin/news/newsCreate', [], 1);
    }

    public function created()
    {
        $data = $_POST;
        //this will save the image in the folder images/UploadedImages/
        FileManager::saveFile();
        //this will get the imageName
        $data['file_name'] = FileManager::getFileName();
        $data['publisher_id'] = User::getUserId();
        News::create($this->getDatabase(), $data);
        $this->addNotification('addNews');
        return $this->redirectToRoute('newsList');
    }

    public function update($id)
    {
        $query = $this->getDatabase()->prepare("select * from news where id = ?;");
        $query->setFetchMode(PDO::FETCH_CLASS, News::class);
        $query->execute([0=>$id]);
        $news = $query->fetch();
        Session::put('newsId', $id);
        return $this->view('Admin/news/newsEdit', ['news' => $news], 1);
    }

    public function updated()
    {
        $data = $_POST;

        //this will save the image in the folder images/UploadedImages/
        FileManager::saveFile();

        if (FileManager::getFileName() !== $data['file_name'] && FileManager::getFileName() !== '') {
            $data['file_name'] = FileManager::getFileName();
        }

        if (!isset($data['hide'])) {
            $data['hide'] = 0;
        }

        $data['publisher_id'] = User::getUserId();

        News::update(Session::get('newsId'), $this->getDatabase(), $data);
        $this->addNotification('updateNews');

        return $this->redirectToRoute('newsList');
    }

    public function delete()
    {
        $con = $this->getDatabase();
        $match = $this->router->match();
        News::delete($match['params']['id'], $con);
        $this->redirectToRoute('newsList');
    }
}
