<?php
class Course {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

   
    public function getAll() {
        $this->db->query("SELECT * FROM courses");
        $this->db->execute();
        return $this->db->stmt->fetchAll(PDO::FETCH_OBJ);
    }

   
    public function getById($id) {
        $this->db->query("SELECT * FROM courses WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}