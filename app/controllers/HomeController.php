<?php
class HomeController extends Controller{
    public function index(){
        $data = ['title'=>'BienVenue sur Thoth '];
        $this->view('home',$data);
    }
}