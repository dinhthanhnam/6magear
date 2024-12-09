<?php
require_once __DIR__ . '/../Models/User.php';

class CartController
{
    public function index()
    {
        require __DIR__ . '/../Views/cart.php';
    }
}