<?php

namespace controllers;

use app\Session;
use models\Link;
use PDO;

class LinksController extends Controller
{

    public function index()
    {
        $query = $this->getDatabase()->prepare("select * from links;");
        $query->setFetchMode(PDO::FETCH_CLASS, Link::class);
        $query->execute();
        $linkList = $query->fetchAll();
        return $this->view('links/index', ['linkList' => $linkList]);
    }

    public function linksList()
    {
        $query = $this->getDatabase()->prepare("select * from links;");
        $query->setFetchMode(PDO::FETCH_CLASS, Link::class);
        $query->execute();
        $linkList = $query->fetchAll();
        return $this->view('admin/links/linksList', ['linkList' => $linkList], 1);
    }

    public function create()
    {
        return $this->view('admin/links/linksCreate', [], 1);
    }

    public function created()
    {
        Link::create($this->getDatabase(), $_POST);
        return $this->redirectToRoute('linksList');
    }

    /* Pourquoi est-ce que le edit a un param et le delete non? Pourquoi ne pas utiliser la même chose? */

    public function update($id)
    {
        $query = $this->getDatabase()->prepare("select * from links where id = ?;");
        $query->setFetchMode(PDO::FETCH_CLASS, Link::class);
        $query->execute([0 => $id]);
        $link = $query->fetch();
        Session::put('linkId', $id);
        return $this->view('admin/links/linksEdit', ['link' => $link], 1);
    }

    public function updated(){
        $data = $_POST;
        Link::update(Session::get('linkId'), $this->getDatabase(), $data);
        return $this->redirectToRoute('linksList');
    }

    public function delete()
    {
        $match = $this->router->match();
        Link::delete($match['params']['id'], $this->getDatabase());
        return $this->redirectToRoute('linksList');
    }
}
