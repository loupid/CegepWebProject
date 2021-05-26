<?php

namespace controllers;

use app\Session;
use models\Job;
use PDO;

class JobController extends Controller
{
    public function index()
    {
        $query = $this->getDatabase()->prepare("select * from jobs");
        $query->setFetchMode(PDO::FETCH_CLASS, Job::class);
        $query->execute();
        $jobs = $query->fetchAll();
        return $this->view('admin/jobs/jobsList', ['jobs' => $jobs], 1);
    }

    public function create()
    {
        return $this->view('admin/jobs/jobCreate', [], 1);
    }

    public function created()
    {
        $data = $_POST;
        $data['publicationDate'] = date('Y-m-d H:i:s');
        $data['start'] = date("Y-m-d H:i:s", strtotime($data['start']));
        if (!isset($data['hide'])) {
            $data['hide'] = 0;
        } else {
            $data['hide'] = 1;
        }

        Job::create($this->getDatabase(), $data);
        $this->addNotification('addJob');
        return $this->redirectToRoute('jobIndex');
    }

    public function update($id)
    {
        $query = $this->getDatabase()->prepare("select * from jobs where id = ?;");
        $query->setFetchMode(PDO::FETCH_CLASS, Job::class);
        $query->execute([0 => $id]);
        $job = $query->fetch();
        Session::put('jobId', $id);
        return $this->view('Admin/jobs/jobEdit', ['job' => $job], 1);
    }

    public function updated()
    {
        $data = $_POST;
        if (!isset($data['hide'])) {
            $data['hide'] = 0;
        } else {
            $data['hide'] = 1;
        }

        $data['start'] = date("Y-m-d H:i:s", strtotime($data['start']));
        //this will save the image in the folder images/UploadedImages/
        Job::update(Session::get('jobId'), $this->getDatabase(), $data);
        $this->addNotification('updateJob');
        return $this->redirectToRoute('jobIndex');
    }

    public function delete()
    {
        $con = $this->getDatabase();
        $match = $this->router->match();
        Job::delete($match['params']['id'], $con);
        $this->index();
    }

}