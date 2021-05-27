<?php

namespace controllers;

use models\espaceI;
use PDO;

class espaceController extends Controller
{
    public function index()
    {
        $query = $this->getDatabase()->prepare("select * from espace_i");
        $query->setFetchMode(PDO::FETCH_CLASS, espaceI::class);
        $query->execute();
        $aidants = $query->fetchAll();
        return $this->view('admin/espaceI/espaceList', ['aidants' => $aidants], 1);
    }

    public function delete()
    {
        $con = $this->getDatabase();
        $match = $this->router->match();
        espaceI::delete($match['params']['id'], $con);
        return $this->redirectToRoute('espaceIndex');
    }

    public function deleteAll()
    {
        $con = $this->getDatabase();
        $match = $this->router->match();
        espaceI::deleteAll($con);
        return $this->redirectToRoute('espaceIndex');
    }


}