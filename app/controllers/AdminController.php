<?php


namespace controllers;

use app\User;
use models\Admin;
use PDO;

class AdminController extends Controller
{
    public function index()
    {
        return $this->view('login/index', [], 2);
    }

    public function adminsList()
    {
        $query = $this->getDatabase()->prepare("select id, firstname, lastname, email, creation_date, last_connection_date, status from admins;");
        $query->setFetchMode(PDO::FETCH_CLASS, Admin::class);
        $query->execute();
        $admins = $query->fetchAll();
        return $this->view('admin/adminsList', ['admins' => $admins], 1);
    }

    public function create()
    {
        return $this->view('admin/adminCreate', [], 1);
    }

    public function delete() {
        $con = $this->getDatabase();
        $match = $this->router->match();
        Admin::delete($match['params']['id'], $con);
        $this->adminsList();
    }

    public function save() {
        $con = $this->getDatabase();
        Admin::create($con, $_POST);
        return $this->redirectToRoute('adminsList', [
            'error' => [
                0 => [
                    'color' => 'green-500',
                    'colorIcon' => 'green-700'
                ]
            ]
        ]);
                    'message' => 'Un nouvel administrateur est enregistré.',
    }

    public function login()
    {
        extract($_POST);
        $con = $this->getDatabase();
        $query = $con->prepare("select password from admins where email = ?;");
        $query->execute(array($email));
        $result = $query->fetch();
        if (password_verify($password, $result['password'])) {
            User::logout();
            User::setUser($email);
            $this->redirectToRoute('adminDashboard');
        } else $this->redirectToRoute('adminIndex', [
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

    public function breadcrum($names)
    {
        $crumbs = array_combine($names, array_map('ucfirst', array_diff(explode("/", $_SERVER["REQUEST_URI"]), [""])));

        foreach ($names as $key => $value)
            ?>
            <a href="<?= $this->router->generate($key) ?>" class="mx-1 hover:text-indigo-600"><?= $value ?></a>>
        <?php
    }

    public function dashboard()
    {
        return $this->view('admin/dashboard', [], 1);
    }

    public function update() {
        return $this->view('admin/adminEdit', [], 1);
    }
}
