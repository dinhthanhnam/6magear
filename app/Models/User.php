<?php
require_once __DIR__ . '/../../core/DB.php';

class User
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function findById($id)
    {
        $stmt = $this->db->query("SELECT * FROM users 
                                WHERE deleted_at IS NULL 
                                AND id = '$id'");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function findByEmail($email)
    {
        $stmt = $this->db->query("SELECT * FROM users 
                                WHERE deleted_at IS NULL 
                                AND email = '$email'");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}