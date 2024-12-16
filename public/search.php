<?php
require_once __DIR__ . '/../core/DB.php';

header('Content-Type: application/json');  // Đảm bảo trả về dữ liệu dưới dạng JSON

if (isset($_GET['query'])) {
    $search_query = $_GET['query'];  // Lấy từ khóa tìm kiếm từ GET
    // Kết nối cơ sở dữ liệu
    $db = DB::getInstance();

    // Truy vấn dữ liệu với từ khóa tìm kiếm
    $stmt = $db->query("SELECT * FROM laptops WHERE name LIKE '%$search_query%'");
    // Lấy kết quả dưới dạng mảng
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Trả kết quả dưới dạng JSON
    echo json_encode($results);
} else {
    echo json_encode([]); // Nếu không có từ khóa tìm kiếm, trả về mảng rỗng
}
