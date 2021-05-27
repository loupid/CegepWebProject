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


    public function created()
    {
        $data = $_POST;
        $info = array_slice($data, 4);
        dump ($data); 
        uksort($info,    function($a,$b) 
    { $days_of_week = array("Lundi"=>1,"Lundi_debut"=>2,"Lundi_fin"=>3,"Mardi"=>4,"Mardi_debut"=>5,"Mardi_fin"=>6,"Mercredi"=>7,"Mercredi_debut"=>8,"Mercredi_fin"=>9,"Jeudi"=>10,"Jeudi_debut"=>11,"Jeudi_fin"=>12, "Vendredi"=>13,"Vendredi_debut"=>14, "Vendredi_fin"=>15);  
        if ($days_of_week[$a]==$days_of_week[$b]) 
            return 0;   
        return ($days_of_week[$a]<$days_of_week[$b])?-1:1; 
    });
        dump($info);
        $array = array();
        for ($ctr = 0; ctr < $info.length()/3; $ctr++) {
            $array.push(array($info[$ctr]))
        }
        /*$info = array('matricule' => $data['matricule'], 'prenom' => $data['prenom'], 'nom' => $data['nom'], 'courriel' =>$data['courriel']);*/
        
        /*espaceI::create($this->getDatabase(), $data);*/
        /*$this->addNotification('addEvent');*/
        return $this->redirectToRoute('serviceIndex');
    }


    function my_sort($a,$b) 
    { $days_of_week = array("Lundi"=>1,"Lundi_debut"=>2,"Lundi_fin"=>3,"Mardi"=>4,"Mardi_debut"=>5,"Mardi_fin"=>6,"Mercredi"=>7,"Mercredi_debut"=>8,"Mercredi_fin"=>9,"Jeudi"=>10,"Jeudi_debut"=>11,"Jeudi_fin"=>12, "Vendredi"=>13,"Vendredi_debut"=>14, "Vendredi_fin"=>15);  
        if ($days_of_week[$a]==$days_of_week[$b]) 
            return 0;   
        return ($days_of_week[$a]<$days_of_week[$b])?-1:1; 
    }  
}