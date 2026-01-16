<?php
class Enrollment
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    public function enroll($student_id, $course_id)
    {
        $this->db->query("INSERT INTO enrollments (student_id, course_id) VALUES (:student_id, :course_id)");
        $this->db->bind(':student_id', $student_id);
        $this->db->bind(':course_id', $course_id);
        return $this->db->execute();
    }
    public function getStudentCourses($student_id)
    {
        $this->db->query("SELECT courses.* FROM courses 
                          JOIN enrollments ON courses.id = enrollments.course_id 
                          WHERE enrollments.student_id = :student_id");
        $this->db->bind(':student_id', $student_id);
        $this->db->execute();
        return $this->db->stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
