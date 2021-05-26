<?php

namespace controllers;

use models\Job;
use PDO;

class ServiceController extends Controller
{


    public function index()
    {
        $query = $this->getDatabase()->prepare("select * from jobs where `hide` = 1");
        $query->setFetchMode(PDO::FETCH_CLASS, Job::class);
        $query->execute();
        $jobs = $query->fetchAll();
        return $this->view('services/index', ['jobs' => $jobs]);
    }

    public function getJob()
    {
        $data = $_POST;


        $query = $this->getDatabase()->prepare("select * from jobs where `id` = ?");
//        $query->setFetchMode(PDO::FETCH_CLASS, Job::class);
        $query->execute([0 => $data['id']]);
        $job = $query->fetch();
        echo json_encode($job);
    }
}
