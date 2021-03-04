<?php


namespace controllers;

use app\Session;
use app\User;
use models\Admin;
use models\Event;
use PDO;

class AdminController extends Controller
{
    public function index()
    {
        return $this->view('login/index', [], 2);
    }

    public function dashboard()
    {
        $query = $this->getDatabase()->prepare("select title, start_date, category, organizer, address, price from events;");
        $query->setFetchMode(PDO::FETCH_CLASS, Event::class);
        $query->execute();
        $events = $query->fetchAll();
        return $this->view('admin/dashboard', ['events'=>json_encode($events)], 1);
    }

    public function adminsList()
    {
        $query = $this->getDatabase()->prepare("select * from admins where id != ?;");
        $query->setFetchMode(PDO::FETCH_CLASS, Admin::class);
        $query->execute([0 => User::getUserId()]);
        $admins = $query->fetchAll();
        return $this->view('admin/adminsList', ['admins' => $admins], 1);
    }

    public function create()
    {
        return $this->view('admin/adminCreate', [], 1);
    }

    public function created() {
        $con = $this->getDatabase();
        Admin::create($con, $_POST);
        $this->addNotification('addAdmin');
        return $this->redirectToRoute('adminsList');
    }

    public function update($id) {
        $query = $this->getDatabase()->prepare("select * from Admins where id = ?;");
        $query->setFetchMode(PDO::FETCH_CLASS, Admin::class);
        $query->execute([0=>$id]);
        $admin = $query->fetch();
        Session::put('adminId',$id);;
        return $this->view('admin/adminEdit', ['admin'=>$admin], 1);
    }

    public function updated() {
        $data = $_POST;

        if (!isset($data['active'])){
            $data['active'] = 0;
        }

        Admin::update(Session::get('adminId'), $this->getDatabase(), $data);
        $this->addNotification('updateAdmin');
        return $this->redirectToRoute('adminsList');
    }

    public function updateProfil($id) {
        $query = $this->getDatabase()->prepare("select * from Admins where id = ?;");
        $query->setFetchMode(PDO::FETCH_CLASS, Admin::class);
        $query->execute([0=>$id]);
        $admin = $query->fetch();
        Session::put('adminId',$id);;
        return $this->view('admin/adminEditProfil', ['admin' => $admin], 1);
    }

    public function updatedProfil() {
        $data = $_POST;

        if (!isset($data['active'])){
            $data['active'] = 0;
        }

        Admin::update(Session::get('adminId'), $this->getDatabase(), $data);
        $this->addNotification('updateAdminProfil');
        return $this->redirectToRoute('adminsList');
    }

    public function delete() {
        $con = $this->getDatabase();
        $match = $this->router->match();
        Admin::delete($match['params']['id'], $con);
        return $this->redirectToRoute('adminsList');
    }

    public function login()
    {
        extract($_POST);
        $con = $this->getDatabase();
        $query = $con->prepare("select id, password from admins where email = ?;");
        $query->execute(array($email));
        $result = $query->fetch();
        if (password_verify($password, $result['password'])) {
            User::logout();
            User::setUser($email);
            User::setUserId($result['id']);
            User::login();
            Admin::update($result['id'], $this->getDatabase(), ['last_connection_date' => date("d/m/Y H:i:s")]);
            $this->redirectToRoute('adminDashboard');
        } else{
            $this->addNotification('loginError');
            $this->redirectToRoute('adminIndex');
        }
    }

    public function logout(){
        User::logout();
        $this->addNotification('logout');
        return $this->redirectToRoute('adminIndex');
    }

    public function breadcrum($names)
    {
        $crumbs = array_combine($names, array_map('ucfirst', array_diff(explode("/", $_SERVER["REQUEST_URI"]), [""])));

        foreach ($names as $key => $value)
        ?>
            <a href="<?= $this->router->generate($key) ?>" class="mx-1 hover:text-indigo-600"><?= $value ?></a>
        <?php
    }
}
