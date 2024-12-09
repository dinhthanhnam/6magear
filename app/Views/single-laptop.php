<?php
$title = 'Mua ' . $laptop->name; // Gán giá trị cho tiêu đề trang
include __DIR__ . '/partials/header.php'; // Include header
require_once __DIR__ . '../../../core/helpers.php';
?>

<div style="padding-top: 80px;" class="frame">
  <!-- Acer Product -->
  <div class="nav-line-2">
    <span>LAPTOP <?= $laptop->brand ?></span>
  </div>
  <div class="product-container">
    <!-- Đoạn mã HTML cho ảnh chính và các ảnh nhỏ -->
    <div class="product-images">
      <img class="main-image" src="<?= asset('img/products/'.$laptop->id.'/image1.jpg') ?>">
      <div class="thumbnail-images">
        <img class="thumbnail" src="<?= asset('img/products/'.$laptop->id.'/image1.jpg') ?>" alt="Thumbnail 1">
        <img class="thumbnail" src="<?= asset('img/products/'.$laptop->id.'/image2.jpg') ?>" alt="Thumbnail 2">
        <img class="thumbnail" src="<?= asset('img/products/'.$laptop->id.'/image3.jpg') ?>" alt="Thumbnail 3">
        <img class="thumbnail" src="<?= asset('img/products/'.$laptop->id.'/image4.jpg') ?>" alt="Thumbnail 4">
      </div>
    </div>
    <div class="fullscreen-image-container">
      <span class="close-btn">&times;</span>
      <img class="fullscreen-image" src="" alt="Fullscreen Image">
    </div>
    <div class="product-details">
      <div class="breadcrumbs">
        <a href="/">Trang chủ</a> / <a href="/Acer">Laptop <?= $laptop->brand ?></a>
      </div>
      <h1 class="product-title"><?= $laptop->name ?></h1>
      <p class="product-price">Giá: <?= $laptop->price ?></p>
      <p class="product-specifications">
        <strong>Thông số kỹ thuật:</strong> <br>
        Mainboard: HP Chipset Q87 – 4 Khe Ram <br>
        CPU: Intel® Xeon® Processor Core I5 <br>
        Tản Nhiệt Khí: HP 800 G1 Tiêu Chuẩn <br>
        RAM: 8GB DDR3 1600Mhz <br>
        Ổ cứng: SSD 128G + HDD 1TB NEW <br>
        Card đồ họa: NVIDIA Geforce GTX 1650 4G DDR5 128bit 896 CUDA Core <br>
      </p>
      <div class="buttons">
        <button class="add-to-cart"> <span class="cart-icon">&#x1F6D2;</span> Thêm vào giỏ hàng</button>
        <button class="checkout"> <span class="payment-icon">&#x1F4B5;</span> Thanh toán ngay</button>
      </div>
    </div>
  </div>
  <div class="popup-container" id="popupContainer">
    <div class="popup">
      <span class="close" onclick="closePopup()">&times;</span>
      <h2 class="popup-title">Thông báo</h2>
      <p class="popup-content">Nội dung thông báo ở đây.</p>
      <button class="confirm-btn" onclick="closePopup()">Xác nhận</button>
    </div>
  </div>
  <div class="nav-line-3">
    <span>Mô Tả Chi Tiết</span>
  </div>
  <div class="product-description">
    <ul>
      <li><strong>CPU:</strong> Intel Core i7-9750H 2.6GHz up to 4.5GHz 12MB</li>
      <li><strong>RAM:</strong> 8GB DDR4 2666MHz (2x SO-DIMM socket, up to 32GB SDRAM)</li>
      <li><strong>Ổ cứng:</strong> 256GB SSD M.2 PCIE G3X4 (Support RAID 0) (2 slots)</li>
      <li><strong>Card đồ họa:</strong> NVIDIA GeForce GTX 1660Ti 6GB GDDR6</li>
      <li><strong>Màn hình:</strong> 15.6″ FHD (1920 x 1080) IPS, Anti-Glare, 144Hz, 3ms, 300nits</li>
      <li><strong>Cổng giao tiếp:</strong> 2x USB 3.1, 1x USB 3.1 Gen 2, 1x USB Type C (Thunderbolt), Mini Display Port, HDMI</li>
      <li><strong>Keyboard:</strong> RGB 4 Zone</li>
      <li><strong>Audio:</strong> Waves MaxxAudio® Sound Technology</li>
      <li><strong>Đọc thẻ nhớ:</strong> None</li>
      <li><strong>Chuẩn LAN:</strong> 10/100/1000/Gigabits Base T</li>
      <li><strong>Chuẩn WIFI:</strong> 802.11 AC (2X2) with MU-MIMO</li>
      <li><strong>Bluetooth:</strong> v5.0</li>
      <li><strong>Webcam:</strong> Acer Crystal Eye 720p</li>
      <li><strong>Hệ điều hành:</strong> Windows 10 Home</li>
      <li><strong>Pin:</strong> 4 Cell 48 WHrs</li>
      <li><strong>Trọng lượng:</strong> 2.4 kg</li>
      <li><strong>Màu sắc:</strong> Abyssal Black</li>
      <li><strong>Kích thước:</strong> 361.4 x 254.15 x 22.9 (mm)</li>
    </ul>
  </div>
  <div class="nav-line-3">
    <span>Đánh giá</span>
  </div>
  <div class="ratings-section">
    <div class="rating-bar">
      <div class="rating-label">5 &#9733;</div>
      <div class="rating-meter">
        <div class="rating-meter-fill" style="width: 80%;"></div>
      </div>
      <div class="rating-count">100 đánh giá</div>
    </div>
    <div class="rating-bar">
      <div class="rating-label">4 &#9733;</div>
      <div class="rating-meter">
        <div class="rating-meter-fill" style="width: 60%;"></div>
      </div>
      <div class="rating-count">50 đánh giá</div>
    </div>
    <div class="rating-bar">
      <div class="rating-label">3 &#9733;</div>
      <div class="rating-meter">
        <div class="rating-meter-fill" style="width: 40%;"></div>
      </div>
      <div class="rating-count">20 đánh giá</div>
    </div>
    <div class="rating-bar">
      <div class="rating-label">2 &#9733;</div>
      <div class="rating-meter">
        <div class="rating-meter-fill" style="width: 20%;"></div>
      </div>
      <div class="rating-count">10 đánh giá</div>
    </div>
    <div class="rating-bar">
      <div class="rating-label">1 &#9733;</div>
      <div class="rating-meter">
        <div class="rating-meter-fill" style="width: 10%;"></div>
      </div>
      <div class="rating-count">5 đánh giá</div>
    </div>
  </div>
  <div class="rating-form">
    <h3 class="review-heading">Đánh giá sản phẩm</h3>
    <form action="#" method="post" id="review-form">
      <div class="rating-stars">
        <input type="radio" id="star5" name="rating" value="5">
        <label for="star5" title="5 sao"></label>
        <input type="radio" id="star4" name="rating" value="4">
        <label for="star4" title="4 sao"></label>
        <input type="radio" id="star3" name="rating" value="3">
        <label for="star3" title="3 sao"></label>
        <input type="radio" id="star2" name="rating" value="2">
        <label for="star2" title="2 sao"></label>
        <input type="radio" id="star1" name="rating" value="1">
        <label for="star1" title="1 sao"></label>
      </div>
      <textarea name="review" id="review" cols="30" rows="5" placeholder="Nhận xét của bạn"></textarea>
      <input type="text" name="name" id="name" placeholder="Họ và tên">
      <input type="email" name="email" id="email" placeholder="Email">
      <button type="submit" class="submit-review-button">Gửi đánh giá</button>
    </form>
  </div>
</div>

<?php 
include __DIR__ . '/partials/footer.php';
?>