<?php

namespace controllers;

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

        return $this->view('admin/clothes/offers/offersList', [], 1);
    }

    public function offersCreate()
    {

        #TODO: Get data to be sent to the view

        return $this->view('admin/clothes/offers/offersCreate', [], 1);
    }

    public function offersCreated()
    {

        #TODO: Get data from post and insert in database

        return $this->view('admin/clothes/offers/offersCreated', [], 1);
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