<?php
require_once __DIR__ . '/../core/Controller.php';

class HomeController
{

    private $dcontr;

    public function index()
    {
        $this->dcontr = new Controller();
        $data = ['title' => 'Bienvenue sur Thoth'];
        $this->dcontr->view('home', $data);
    }
}
?>