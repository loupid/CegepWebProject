<?php

namespace controllers;

use models\InscriptionTutorat;
use PDO;

class TutoratController extends Controller
{
    public function index()
    {
        $query = $this->getDatabase()->prepare("select * from tutorat");
        $query->setFetchMode(PDO::FETCH_CLASS, InscriptionTutorat::class);
        $query->execute();
        $etudiants = $query->fetchAll();
        return $this->view('admin/tutorat/tutoratlist', ['etudiants' => $etudiants], 1);
    }

    public function delete()
    {
        $con = $this->getDatabase();
        $match = $this->router->match();
        InscriptionTutorat::delete($match['params']['matricule'], $con);
        return $this->redirectToRoute('tutorattable');
    }

    public function deleteAll()
    {
        $con = $this->getDatabase();
        $match = $this->router->match();
        InscriptionTutorat::deleteAll($con);
        return $this->redirectToRoute('tutorattable');
    }

    public function created()
    {
        $data = $_POST;
        InscriptionTutorat::create($this->getDatabase(), $data);
        /*$this->addNotification('addEvent');*/
        return $this->redirectToRoute('serviceIndex');
    }
}