<?php

class StudentController extends Controller {

    public function showRegister() {
        $this->view('student/register');
    }

   
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            require_once '../app/models/Student.php';
            $studentModel = new Student();

            if ($studentModel->register($name, $email, $password)) {
                header('Location: /login');
            } else {
                die("Une erreur est survenue lors de l'inscription.");
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            require_once '../app/models/Student.php';
            $studentModel = new Student();
            $user = $studentModel->findUserByEmail($email);

            if ($user) {
                if (password_verify($password, $user->password)) {
                    $_SESSION['user_id'] = $user->id;
                    $_SESSION['user_name'] = $user->name;
                    
                    header('Location: /');
                } else {
                    echo "Mot de passe incorrect.";
                    $this->view('student/login');
                }
            } else {
                echo "Utilisateur non trouve.";
                $this->view('student/login');
            }
        } else {
            $this->view('student/login');
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /login');
        exit;
    }
}