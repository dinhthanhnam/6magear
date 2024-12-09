<?php
require_once __DIR__ . '/../../core/DB.php';

class News
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM news 
                                WHERE deleted_at IS NULL 
                                LIMIT 5");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}