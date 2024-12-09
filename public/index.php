<?php
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/LaptopController.php';
require_once __DIR__ . '/../app/Controllers/CategoryController.php';
$router = new Router();

// Add routes
$router->add('/', [HomeController::class, 'index']); // Route tĩnh
$router->add('/New', [CategoryController::class, 'newProduct']); // Route tĩnh
$router->add('/products/{id:\d+}', [LaptopController::class, 'index']); // Route động với id số
$router->add('/{brand:[a-zA-Z]+}', [CategoryController::class, 'index']); // Route động với brand chữ
// Dispatch
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($url);
