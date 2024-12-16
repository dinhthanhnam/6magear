<?php
  require_once __DIR__ . '/../../../core/helpers.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= isset($title) ? $title : "6maGear"; ?></title>
  <link rel="icon" type="image/png" href="<?= asset('img/logo.png') ?>">
  <link rel="stylesheet" href="<?= asset('css/style.css') ?>" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@0;1&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/b041ca492a.js" crossorigin="anonymous"></script>

</head>

<body>
  <!-- #007bff -->
<header>
    <div class="top-bar">
        <div class="logo-search">
          <a href="/" class="logo">
            <img src="<?= asset('img/logo1.png') ?>" alt="Logo">
          </a>
          <div class="search-bar search-container">
            <input type="ftext" id="search" name="search" placeholder="Bạn muốn tìm sản phẩm gì?">
            <div id="search-results" class="search-results"></div>
            <button><i class="fa fa-search"></i></button>
          </div>
        </div>
        <div class="contact-cart">
          <div class="hotline">
            <i class="fa fa-phone"></i> <span class="hotline-text">HOTLINE</span>
            <span class="hotline-number">0825 233 233</span>
          </div>
          <div class="cart">
            <a href="/cart"><i class="fa fa-shopping-cart"></i> <span>Giỏ hàng</span></a>
          </div>
          <div class="login">
            <?php 
              if(isset($_SESSION['authenticated'])) {
                $name = $_SESSION['auth_user']['name'];
                echo '<a href="/userdashboard"><span>'.$name.'</span></a>';
              } else {
                echo '<a href="/login"> <span>Đăng nhập</span></a>';
              }
            ?>
          <div class="logout" style="font-size: 12px;">
            <?php 
              if(isset($_SESSION['authenticated'])) {
                echo '<a href="/logout"> <span>Đăng xuất</span></a>';
              }
            ?>
          </div>
          </div>
        </div>
      </div>
      <ul class="menu-items">
        <li><a href="/New"><i class="fa fa-laptop"></i> LAPTOP MỚI</a></li>
        <li class="dropdown">
          <a href="/"><i class="fa fa-laptop"></i> LAPTOP</a>
          <ul class="dropdown-content">
            <li><a href="/Acer"><i class="fa fa-laptop"></i> Laptop Acer</a></li>
            <li><a href="/Asus"><i class="fa fa-laptop"></i> Laptop Asus</a></li>
            <li><a href="/HP"><i class="fa fa-laptop"></i> Laptop HP</a></li>
            <li><a href="/LG"><i class="fa fa-laptop"></i> Laptop LG</a></li>
            <li><a href="/MSI"><i class="fa fa-laptop"></i> Laptop MSI</a></li>
          </ul>
        </li>
        <li><a href="https://laptopaz.vn/tin-khuyen-mai.html"><i class="fa fa-tags"></i> KHUYẾN MÃI</a></li>
        <li><a href="https://laptopaz.vn/huong-dan-tra-gop.html"><i class="fa fa-credit-card"></i> TRẢ GÓP</a></li>
      </ul>
</header>
<nav>
    <input class="checkbox" type="checkbox" />
    <img src="<?= asset('img/navigation/menu.png') ?>" alt="" />
    <div class="logo">
        <a href="index.html">
            <h3>6MA Gear</h3>
        </a>
    </div>
    <button class="shopping-cart">
        <img src="img/navigation/shopping-cart.png" alt="" />
    </button>
</nav>