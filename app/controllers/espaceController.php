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


            $arrayDispos = array();
            if(array_key_exists("Lundi", $info)){
                $arrayLundi = array("jour"=>"Lundi", "debut"=>$info["Lundi_debut"], "fin"=>$info["Lundi_fin"]);
                array_push($arrayDispos, $arrayLundi);
                // dump($arrayLundi);
            }

            if(array_key_exists("Mardi", $info)){
                $arrayMardi = array("jour"=>"Mardi", "debut"=>$info["Mardi_debut"], "fin"=>$info["Mardi_fin"]);
                array_push($arrayDispos, $arrayMardi);
                // dump($arrayMardi);
            }

            if(array_key_exists("Mercredi", $info)){
                $arrayMercredi = array("jour"=>"Mercedi", "debut"=>$info["Mercredi_debut"], "fin"=>$info["Mercredi_fin"]);
                array_push($arrayDispos, $arrayMercredi);
                // dump($arrayMercredi);
            }

            if(array_key_exists("Jeudi", $info)){
                $arrayJeudi = array("jour"=>"Jeudi", "debut"=>$info["Jeudi_debut"], "fin"=>$info["Jeudi_fin"]);
                array_push($arrayDispos, $arrayJeudi);
                // dump($arrayJeudi);
            }

            if(array_key_exists("Vendredi", $info)){
                $arrayVendredi = array("jour"=>"Vendredi", "debut"=>$info["Vendredi_debut"], "fin"=>$info["Vendredi_fin"]);
                array_push($arrayDispos, $arrayVendredi);
                // dump($arrayVendredi);
            }
            $arrayDispos = array("dispos"=>$arrayDispos);




            espaceI::create($this->getDatabase(), array("Matricule"=>$data["matricule"], "Prenom"=>$data["prenom"], "Nom"=>$data["nom"], "Courriel"=>$data["courriel"], "Horaire"=>json_encode($arrayDispos)));
            return $this->redirectToRoute('serviceIndex');
    }


    function my_sort($a,$b) 
    { $days_of_week = array("Lundi"=>1,"Lundi_debut"=>2,"Lundi_fin"=>3,"Mardi"=>4,"Mardi_debut"=>5,"Mardi_fin"=>6,"Mercredi"=>7,"Mercredi_debut"=>8,"Mercredi_fin"=>9,"Jeudi"=>10,"Jeudi_debut"=>11,"Jeudi_fin"=>12, "Vendredi"=>13,"Vendredi_debut"=>14, "Vendredi_fin"=>15);  
        if ($days_of_week[$a]==$days_of_week[$b]) 
            return 0;   
        return ($days_of_week[$a]<$days_of_week[$b])?-1:1; 
    }  
}