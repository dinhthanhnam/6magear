<?php
require_once __DIR__ . '/../Models/Laptop.php';
require_once __DIR__ . '/../Models/Banner.php';
require_once __DIR__ . '/../Models/News.php';
class HomeController
{
    public function index()
    {
        $laptopModel = new Laptop();
        $bannerModel = new Banner();
        $newsModel = new News();
        $news = $newsModel->getAll();
        $banners = $bannerModel->getAll();
        $laptopsNew = $laptopModel->getNumber(4);
        $laptopsHot = $laptopModel->getHot();
        $laptopsAcer = $laptopModel->getBrand4('ACER');
        $laptopsAsus = $laptopModel->getBrand4('ASUS');
        $laptopsHP = $laptopModel->getBrand4('HP');
        $laptopsLG = $laptopModel->getBrand4('LG');
        $laptopsMSI = $laptopModel->getBrand4('MSI');
        require __DIR__ . '/../Views/home.php';
    }
}
