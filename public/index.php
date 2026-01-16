<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../app/core/Database.php';
require_once '../app/core/Controller.php';
require_once __DIR__ . '/../app/core/Router.php';


$router = new Router();

$router->get('/dashboard', 'StudentController@dashboard'); 
$router->get('/', 'StudentController@home');

$router->get('/register', 'StudentController@showRegister');
$router->post('/register', 'StudentController@register');
$router->get('/login', 'StudentController@showLogin');
$router->post('/login', 'StudentController@login'); 
$router->get('/logout', 'StudentController@logout'); 
$router->post('/logout', 'StudentController@logout'); 


$router->dispatch();
