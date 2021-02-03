<?php


namespace controllers;
use app\User;

class AdminController extends Controller
{
    public function index()
    {
        return $this->view('login/index',[], 2);
    }

    public function adminsList()
    {
        return $this->view('admin/adminsList', [], 1);
    }

    public function create()
    {
        return $this->view('admin/adminCreate', [], 1);
    }

    public function login()
    {
        extract($_POST);

        $con = $this->getDatabase();
        $query = $con->prepare("select count(*) as nbr, id as id from admins where email = ? and password = ?;");
        $query->execute(array($email, $password));
        $result = $query->fetch();

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

    public function getAdminsList() {
        $con = $this->getDatabase();
        $query = $con->prepare("select CONCAT(firstname, ' ', lastname ) as Administrateur, username as `Nom d''utilisateur`, email as Courriel, from admins;");
        $query->execute();
        return $query->fetch();
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