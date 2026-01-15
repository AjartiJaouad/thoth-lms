<?php
require_once __DIR__ . '/../core/Controller.php';


class HomeController extends Controller {
    public function index() {
        echo "<h1>Success!</h1>";
        // $this->view('home', ['title' => 'Thoth LMS']);
    }
}