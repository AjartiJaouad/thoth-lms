<?php
require_once __DIR__ . '/../core/Controller.php';

class StudentController extends Controller
{
    private $studentModel;

    public function __construct()
    {
        require_once __DIR__ . '/../models/Student.php';
        $this->studentModel = new Student();
    }

    // Afficher le formulaire d'inscription
    public function showRegister()
    {
        $this->view('student/register');
    }

    // Traiter l'inscription
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            if ($this->studentModel->register($name, $email, $hashedPassword)) {
                header('Location: /login'); 
                exit;
            } else {
                $error = "Erreur lors de l'inscription !";
                $this->view('student/register', ['error' => $error]);
            }
        }
    }

    public function showLogin()
    {
        $this->view('student/login'); 
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            $user = $this->studentModel->findUserByEmail($email);

            if ($user && password_verify($password, $user->PASSWORD)) {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_name'] = $user->name;
                header('Location: /dashboard');
                exit;
            } else {
                $error = "Email ou mot de passe incorrect !";
                $this->view('student/login', ['error' => $error]);
            }
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: /login');
        exit;
    }

    public function home()
    {
        $this->view('home');
    }
}
