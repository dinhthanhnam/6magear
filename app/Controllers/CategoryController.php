<?php
require_once __DIR__ . '/../Models/Laptop.php';

class CategoryController
{
    public function index($brand)
    {
        $laptopModel = new Laptop();
        $laptops = $laptopModel->getBrandAll(strtoupper($brand));
        require __DIR__ . '/../Views/category.php';
    }
    public function newProduct()
    {
        $laptopModel = new Laptop();
        $laptops = $laptopModel->getNew();
        require __DIR__ . '/../Views/category.php';
    }
}