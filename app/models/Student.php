<?php
class Student
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    public function findUserByEmail($email) {
        $this->db->query("SELECT * FROM students WHERE email = :email");
        $this->db->bind(' :email , $email');
        
    }
    public function register($name, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $this->db->query("INSERT INTO students (name, email, password) VALUES (:name, :email, :password)");
        
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $hashedPassword);
        
        return $this->db->execute();
    }
}