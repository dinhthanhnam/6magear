<?php
require_once __DIR__ . '/../Models/Laptop.php';

class CategoryController
{
    public function index($brand)
    {
        $laptopModel = new Laptop();
        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1; // Xử lý trang hiện tại
        $data = $laptopModel->getBrandPaginated($brand, $page);

        $laptops = $data['laptops'];
        $totalPages = $data['total_pages'];
        require __DIR__ . '/../Views/category.php';
    }
    public function newProduct()
    {
        $laptopModel = new Laptop();
        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1; // Xử lý trang hiện tại
        $data = $laptopModel->getNewPaginated( $page);

        $laptops = $data['laptops'];
        $totalPages = $data['total_pages'];
        require __DIR__ . '/../Views/category.php';
    }
}