<?php
require_once __DIR__ . '/../Models/Laptop.php';

class LaptopController
{
    public function index($id)
    {
        $laptopModel = new Laptop();
        $laptop = $laptopModel->show($id);
        
        var_dump($laptop->name, $laptop->id, $laptop->brand, $laptop->price);
        require __DIR__ . '/../Views/single-laptop.php';
    }
}