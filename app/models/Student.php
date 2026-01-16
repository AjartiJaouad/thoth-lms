<?php
class Student {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function register($name, $email, $password) {
        $this->db->query("INSERT INTO students (name, email, PASSWORD) VALUES (:name, :email, :password)");
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        return $this->db->execute();
    }

    public function findUserByEmail($email) {
        $this->db->query("SELECT * FROM students WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->single();
    }
}