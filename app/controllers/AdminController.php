<?php


namespace controllers;


class AdminController extends Controller
{
    public function index()
    {
        return $this->view('admin/index');
    }

    public function login()
    {
        extract($_POST);

        $con = $this->getDatabase();
        $query = $con->prepare("select count(*) as nbr from admins where email = '$email' and password = '$password';");
        $query->execute();
        $result = $query->fetch();

        $error = array();
        array_push($error,'Le courriel ou le mot de passe est incorrect');
        if ($result['nbr'] == 1){
            $this->redirectToRoute('dashboardAdmin');
        }
        else $this->redirectToRoute('indexAdmin', [
            'error'=>$error
        ]);
    }

    public function dashboard(){
        return $this->view('admin/dashboard');
    }
}