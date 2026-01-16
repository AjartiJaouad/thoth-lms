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


    public function showRegister()
    {
        $this->view('student/register');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];


            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            if ($this->studentModel->register($name, $email, $hashedPassword)) {
                $this->view('student/login');
                exit;
            } else {
                die("erouer");
            }
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            $user = $this->studentModel->findUserByEmail($email);


            if ($user && password_verify($password, $user->PASSWORD)) {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_name'] = $user->name;
                header('Location: dashboard');
                exit;
            } else {
                die("le mote de pas ou lemail inccorect");
            }
        }
        $this->view('student/login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: login');
        exit;
    }
    public function home()
    {
        $this->view('home');
    }
}
