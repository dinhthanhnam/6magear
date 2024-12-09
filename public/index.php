<?php
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/LaptopController.php';
require_once __DIR__ . '/../app/Controllers/CategoryController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Controllers/CartController.php';
$router = new Router();
session_start();

// Add routes
$router->add('/', [HomeController::class, 'index']); // Route tĩnh
$router->add('/login', [AuthController::class, 'login']);
$router->add('/register', [AuthController::class, 'register']);
$router->add('/userdashboard', function() {
  require __DIR__ . "/../app/Views/userdashboard.php";
});
$router->add('/logout', [AuthController::class, 'logout']);
$router->add('/cart', [CartController::class, 'index']);
$router->add('/New', [CategoryController::class, 'newProduct']); // Route tĩnh
$router->add('/products/{id:\d+}', [LaptopController::class, 'index']); // Route động với id số
$router->add('/{brand:[a-zA-Z]+}', [CategoryController::class, 'index']);
 // Route động với brand chữ
// Dispatch
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($url);
