<?php
require_once __DIR__ . '/../../core/DB.php';

class Laptop
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }
    public function show($id)
    {   
        $stmt = $this->db->prepare("SELECT * FROM laptops WHERE deleted_at IS NULL AND id = '$id' LIMIT 1");
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM laptops 
                                WHERE deleted_at IS NULL 
                                LIMIT 5");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getNew()
    {
        $stmt = $this->db->query("SELECT * FROM laptops 
                                WHERE deleted_at IS NULL 
                                ORDER BY created_at DESC
                                LIMIT 10");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getNumber($number = null)
    {   
        if($number != null) {
            $stmt = $this->db->query("SELECT * FROM laptops 
                                    WHERE deleted_at IS NULL 
                                    ORDER BY created_at DESC 
                                    LIMIT $number");
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        else {
            $this->getAll();
        }
    }

    public function getHot()
    {
        $stmt = $this->db->query("SELECT * FROM laptops WHERE deleted_at IS NULL AND hot = 1 LIMIT 8");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getBrand4($brand)
    {
        $stmt = $this->db->query("SELECT * FROM laptops WHERE deleted_at IS NULL AND brand = '$brand' LIMIT 4");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function getBrandAll($brand)
    {
        $stmt = $this->db->query("SELECT * FROM laptops WHERE deleted_at IS NULL AND brand = '$brand'");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
