<?php
$title = "Trang chủ 6maGear"; // Gán giá trị cho tiêu đề trang
include __DIR__ . '/partials/header.php'; // Include header
require_once __DIR__ . '../../../core/helpers.php';
?>
<main>
  <div class="frame">
    <!-- Banner -->
    <div class="banner">
      <div class="banner-info">
        <?php 
          foreach($banners as $banner) {
            $path = asset($banner->banner_path);
            echo "<img src='$path' alt='$banner->title' class='banner-image' />";
          }
        ?>
        <ul>
          <li>
            <a href="https://www.youtube.com/watch?v=mdVkrOJpMyQ&t=2s" target="_blank">Hướng dẫn mua hàng Online </a>
          </li>
          <li>
            <a href="https://laptopaz.vn/danh-gia-laptopaz-nhung-phan-hoi-tu-phia-khach-hang.html" target="_blank">Nhận xét từ khách hàng</a>
          </li>
          <li>
            <a href="https://cellphones.com.vn/laptop-khuyen-mai" target="_blank">Siêu khuyến mãi <br />
              Nhiều ưu đãi</a>
          </li>
        </ul>
      </div>
      <div class="news">
        <div class="nav-line-1">
          <span>TIN TỨC</span>
        </div>
        <ul>
        <?php 
          foreach($news as $item) {
            $img_path = asset($item->news_img_path);
            echo "<li>
                    <a href='$item->news_link' target='_blank'>
                      <img src='$img_path' alt=''>
                      <p>
                        $item->title
                      </p>
                    </a>
                  </li>";
          }
        ?>
        </ul>
      </div>
    </div>

    <h2 style="color: white; background-color: red; padding: 5px 5px 5px 5px; align-items: center; text-align:center;">GIỜ VÀNG GIÁ SỐC</h2>

    <div class="scroll-container">
      <img src="img/banner/sale-1.png" alt="Cinque Terre" style="margin-right: 20px;" width="200px">
      <img src="img/banner/sale-2.png" alt="Forest" style="margin-right: 20px;" width="200px">
      <img src="img/banner/sale-3.png" alt="Northern Lights" style="margin-right: 20px;" width="200px">
      <img src="img/banner/sale-4.png" alt="Mountains" style="margin-right: 20px;" width="200px">
      <img src="img/banner/sale-5.png" alt="Mountains" style="margin-right: 20px;" width="200px">
      <img src="img/banner/sale-1.png" alt="Cinque Terre" style="margin-right: 20px;" width="200px">
      <img src="img/banner/sale-2.png" alt="Forest" style="margin-right: 20px;" width="200px">
      <img src="img/banner/sale-3.png" alt="Northern Lights" style="margin-right: 20px;" width="200px">
      <img src="img/banner/sale-4.png" alt="Mountains" style="margin-right: 20px;" width="200px">
      <img src="img/banner/sale-5.png" alt="Mountains" style="margin-right: 20px;" width="200px">
      <img src="img/banner/sale-1.png" alt="Cinque Terre" style="margin-right: 20px;" width="200px">
      <img src="img/banner/sale-2.png" alt="Forest" style="margin-right: 20px;" width="200px">
      <img src="img/banner/sale-3.png" alt="Northern Lights" style="margin-right: 20px;" width="200px">
      <img src="img/banner/sale-4.png" alt="Mountains" style="margin-right: 20px;" width="200px">
      <img src="img/banner/sale-5.png" alt="Mountains" style="margin-right: 20px;" width="200px">
    </div>
    <!-- New Product -->
    <div class="ads">
      <div>
        <div class="nav-line">
          <span>SẢN PHẨM MỚI</span>
        </div>
        <ul class="new-products">
        <?php
          if (empty($laptopsNew)) {
            echo "<p>Không có laptop nào.</p>";
          } else {
            foreach ($laptopsNew as $laptop) {
              include(__DIR__.'/partials/product-template.php');
            }
          }
        ?>
        </ul>
      </div>
      <img class="img-ads" src="<?= asset('img/products/ads.jpg') ?>" alt="Quảng cáo" />
    </div>
    <!-- Hot Product -->
    <div class="nav-line-1">
      <span>HÀNG HOT</span>
    </div>
    <ul class="hot-products">
      <?php
        if (empty($laptopsHot)) {
          echo "<p>Không có laptop nào.</p>";
        } else {
          foreach ($laptopsHot as $laptop) {
            include(__DIR__.'/partials/product-template.php');
          }
        }
      ?>
    </ul>
    <!-- Acer Product -->
    <div class="nav-line-1">
      <span>LAPTOP ACER</span>
    </div>
    <ul class="acer-products">
      <?php
        if (empty($laptopsAcer)) {
          echo "<p>Không có laptop nào.</p>";
        } else {
          foreach ($laptopsAcer as $laptop) {
            include(__DIR__.'/partials/product-template.php');
          }
        }
      ?>
    </ul>
    <!-- Asus Product -->
    <div class="nav-line-1">
      <span>LAPTOP ASUS</span>
    </div>
    <ul class="asus-products">
      <?php
        if (empty($laptopsAsus)) {
          echo "<p>Không có laptop nào.</p>";
        } else {
          foreach ($laptopsAsus as $laptop) {
            include(__DIR__.'/partials/product-template.php');
          }
        }
      ?>
    </ul>
    <!-- HP Product -->
    <div class="nav-line-1">
      <span>LAPTOP HP</span>
    </div>
    <ul class="HP-products">
      <?php
        if (empty($laptopsHP)) {
          echo "<p>Không có laptop nào.</p>";
        } else {
          foreach ($laptopsHP as $laptop) {
            include(__DIR__.'/partials/product-template.php');
          }
        }
      ?>
    </ul>
    <!-- LG Product -->
    <div class="nav-line-1">
      <span>LAPTOP LG</span>
    </div>
    <ul class="LG-products">
    <?php
        if (empty($laptopsLG)) {
          echo "<p>Không có laptop nào.</p>";
        } else {
          foreach ($laptopsLG as $laptop) {
            include(__DIR__.'/partials/product-template.php');
          }
        }
      ?>
    </ul>
    <!-- MSI Product -->
    <div class="nav-line-1">
      <span>LAPTOP MSI</span>
    </div>
    <ul class="MSI-products">
      <?php
        if (empty($laptopsMSI)) {
          echo "<p>Không có laptop nào.</p>";
        } else {
          foreach ($laptopsMSI as $laptop) {
            include(__DIR__.'/partials/product-template.php');
          }
        }
      ?>
    </ul>
  </div>
  <div>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
  </div>
</main>

<?php 
include __DIR__ . '/partials/footer.php';
?>