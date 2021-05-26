<?php

namespace controllers;
use models\Offers;
use PDO;
use models\Clothes;

class ClothesController extends Controller
{
    //
    //      Orders section
    //

    public function ordersIndex()
    {
        #TODO: Get data to be sent to the view
        return $this->view('admin/clothes/orders/ordersList', ['events'=>$test], 1);
    }

    #Redirects to the edit page
    public function ordersEdit($id)
    {

        #TODO: Get the data to be sent to the view

        return $this->view('admin/clothes/orders/ordersEdit', [], 1);
    }

    public function ordersEdited()
    {

        #TODO: Get data from post and update in database

        return $this->view('admin/clothes/orders/ordersList', [], 1);
    }

    public function ordersCreate()
    {

        #TODO: Get data to be sent to the view

        return $this->view('admin/clothes/orders/ordersCreate', [], 1);
    }

    public function ordersCreated()
    {

        #TODO: Get data from post and update in datatabse

        return $this->ordersIndex();
    }

    public function ordersDelete($id){
        #TODO: Check if referenced and Delete data from the database if not
    }

    //
    //      Offers section
    //

    public function offersIndex()
    {

        #TODO: Get data to be sent to the view
        $query = $this->getDatabase()->prepare("select * from offers;");
        $query->setFetchMode(PDO::FETCH_CLASS, Offers::class);
        $query->execute();
        $offersList = $query->fetchAll();
        $clothes_list = [];
        foreach($offersList as $offer){
            if (!array_key_exists($offer->clothes_id, $clothes_list)){
                $query2 = $this->getDatabase()->prepare("select * from clothes where id = ?;");
                $query2->setFetchMode(PDO::FETCH_CLASS, Clothes::class);
                $query2->execute([0=>$offer->clothes_id]);
                $clothe = $query2->fetchAll();
                $clothes_list[$offer->clothes_id] = $clothe;
            }
        }
        return $this->view('admin/clothes/offers/offersList', ["offersList"=>$offersList, "clothes_list"=>$clothes_list], 1);
    }

    public function offersCreate()
    {
        $query = $this->getDatabase()->prepare("select * from clothes;");
        $query->setFetchMode(PDO::FETCH_CLASS, Clothes::class);
        $query->execute();
        $clothes_list = $query->fetchAll();
        $clothesArray = [];
        foreach($clothes_list as $clothe){
            $clothesArray[$clothe->id] = $clothe->name . " " . $clothe->color;
        }
        return $this->view('admin/clothes/offers/offersCreate', ["clothesJSON"=>str_replace('"',"'",json_encode($clothesArray))], 1);
    }

    public function offersCreated()
    {
        $data = $_POST;
        #$data['clé'];
        #TODO: Get data from post and insert in database
        Offers::Create($this->getDatabase(), $data);
        return $this->offersIndex();
    }

    public function offersEdit($id)
    {

        #TODO: Get data to be sent to the view

        return $this->view('admin/clothes/offers/offersEdit', [], 1);
    }

    public function offersEdited()
    {

        #TODO: Get data from post and update in database

        return $this->offersIndex();
    }

    public function offersDelete($id){
        #TODO: Check if referenced and Delete data from the database if not
    }

    //
    //      Clothes section
    //

    public function clothesIndex()
    {

        #TODO: Get data to be sent to the view

        return $this->view('admin/clothes/clothes/clothesList', [], 1);
    }

    public function clothesCreate()
    {

        #TODO: Get the data to be sent to the view

        return $this->view('admin/clothes/clothes/clothesCreate', [], 1);
    }

    public function clothesCreated()
    {

        #TODO: Get data from post and insert in database

        //return $this->view('admin/clothes/clothes/clothesList', [], 1);
    }

    public function clothesEdit($id)
    {

        #TODO: Get the data to be sent to the view

        return $this->view('admin/clothes/clothes/clothesEdit', [], 1);
    }

    public function clothesEdited()
    {

        #TODO: Get data from post and update in database

        return $this->clothesIndex();
    }

    public function clothesDelete($id){
        #TODO: Check if referenced and Delete data from the database if not
    }
}