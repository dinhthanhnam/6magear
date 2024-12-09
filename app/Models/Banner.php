<?php
require_once __DIR__ . '/../../core/DB.php';

class Banner
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function getAll()
    {   
        $stmt = $this->db->prepare("SELECT * FROM banners WHERE deleted_at IS NULL LIMIT 5");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}