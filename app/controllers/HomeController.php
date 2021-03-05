<?php

namespace controllers;

use models\News;
use PDO;

class HomeController extends Controller
{

    public function index()
    {
        $query = $this->getDatabase()->prepare("select n.id, title, link, category, description, file_name, /*creation_date,*/ concat(a.firstname, ' ', a.lastname) as publisher from news n inner join admins a where n.publisher_id = a.id /*order by creation_date desc*/ limit 3;");
        $query->setFetchMode(PDO::FETCH_CLASS, News::class);
        $query->execute();
        $newsList = $query->fetchAll();
        return $this->view('home/index', ['newsList' => $newsList]);
    }

}