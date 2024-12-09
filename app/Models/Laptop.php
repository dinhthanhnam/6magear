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
                                WHERE deleted_at IS NULL");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function getNumber($number = null)
    {
        if ($number != null) {
            $stmt = $this->db->query("SELECT * FROM laptops 
                                    WHERE deleted_at IS NULL 
                                    ORDER BY created_at DESC 
                                    LIMIT $number");
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
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

    public function getBrandPaginated($brand, $page)
    {
        $limit = 10;
        $offset = ($page - 1) * $limit;

        // Truy vấn danh sách laptop
        $stmt = $this->db->prepare("
        SELECT * FROM laptops 
        WHERE deleted_at IS NULL AND brand = :brand 
        LIMIT :limit OFFSET :offset
    ");
        $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Truy vấn tổng số laptop
        $stmt2 = $this->db->prepare("
        SELECT COUNT(*) as total 
        FROM laptops 
        WHERE deleted_at IS NULL AND brand = :brand
    ");
        $stmt2->bindParam(':brand', $brand, PDO::PARAM_STR);
        $stmt2->execute();
        $totalLaptops = $stmt2->fetch(PDO::FETCH_OBJ)->total;

        // Tính tổng số trang
        $totalPages = ceil($totalLaptops / $limit);

        return [
            'laptops' => $results,
            'total_pages' => $totalPages
        ];
    }

    public function getNewPaginated($page)
    {
        $limit = 8;
        $offset = ($page - 1) * $limit;

        // Truy vấn danh sách laptop
        $stmt = $this->db->prepare("
        SELECT * FROM laptops 
        WHERE deleted_at IS NULL
        LIMIT :limit OFFSET :offset
    ");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Truy vấn tổng số laptop
        $stmt2 = $this->db->prepare("
        SELECT COUNT(*) as total 
        FROM laptops 
        WHERE deleted_at IS NULL
    ");
        $stmt2->execute();
        $totalLaptops = $stmt2->fetch(PDO::FETCH_OBJ)->total;

        // Tính tổng số trang
        $totalPages = ceil($totalLaptops / $limit);

        return [
            'laptops' => $results,
            'total_pages' => $totalPages
        ];
    }
}
