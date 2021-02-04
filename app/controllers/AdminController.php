<?php


namespace controllers;

use app\User;
use http\Env\Request;
use models\Admin;
use PDO;

class AdminController extends Controller
{
    public function index()
    {
        return $this->view('login/index',[], 2);
    }

    public function adminsList()
    {
        $query = $this->getDatabase()->prepare("select id, firstname, lastname, email, creationdate, lastconnectiondate from admins;");
        $query->setFetchMode(PDO::FETCH_CLASS, Admin::class);
        $query->execute();
        $admins = $query->fetchall();

        return $this->view('admin/adminsList', [ 'admins' => $admins ], 1);
    }

    public function create()
    {
        return $this->view('admin/adminCreate', [], 1);
    }

    public function login()
    {
        extract($_POST);
        $admin = new Admin();
        $con = $this->getDatabase();
        $query = $con->prepare("select count(*) as nbr, id as id from admins where email = ? and password = ?;");
        $query->execute([$email, $password]);
        $result = $query->fetch();

        Admin::update($result['id'], $this->getDatabase(), ['lastconnectiondate' => date("d/m/Y H:i:s")]);


        if ($result['nbr'] == 1){
            User::logout();
            User::setUser($email);
            $this->redirectToRoute('adminDashboard');
        }
        else $this->redirectToRoute('adminIndex', [
            'error' => [
                0 => [
                    'message' => 'Le courriel ou le mot de passe est incorrect.',
                    'color' => 'red-600',
                    'colorIcon' => 'red-700'
                ]
            ]
        ]);
    }

    public function logout(){
        User::logout();
        return $this->redirectToRoute('adminIndex', [
            'error' => [
                0 => [
                    'message' => 'Vous êtes bien déconnecté(e).',
                    'color' => 'green-500',
                    'colorIcon' => 'green-700'
                ]
            ]
        ]);
    }

    public function dashboard(){
        return $this->view('admin/dashboard', [], 1);
    }
}
