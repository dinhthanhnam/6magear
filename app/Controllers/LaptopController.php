<?php
require_once __DIR__ . '/../Models/Laptop.php';

class LaptopController
{
    public function index($id)
    {
        $laptopModel = new Laptop();
        $laptop = $laptopModel->show($id);
        require __DIR__ . '/../Views/single-laptop.php';
    }
}