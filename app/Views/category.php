<?php
  if(isset($brand)) {
    $title = 'Trang Laptop '.$brand;
  } else {
    $title = 'Trang Laptop Mới';
  }
include __DIR__ . '/partials/header.php'; // Include header
require_once __DIR__ . '../../../core/helpers.php';
?>
<div style="padding-top: 80px;" class="frame">
  <!-- Tiêu đề -->
  <div class="nav-line-2">
    <span>LAPTOP <?php echo isset($brand) ? htmlspecialchars($brand) : 'Mới'; ?></span>
  </div>

  <!-- Danh sách sản phẩm -->
  <ul class="acer-products">
    <?php if (empty($laptops)): ?>
      <p>Không có laptop nào.</p>
    <?php else: ?>
      <?php foreach ($laptops as $laptop): ?>
        <?php include(__DIR__ . '/partials/product-template.php'); ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </ul>

  <!-- Phân trang -->
  <div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <a href="?page=<?php echo $i; ?>" class="<?php echo $i == $page ? 'active' : ''; ?>">
        <?php echo $i; ?>
      </a>
    <?php endfor; ?>
  </div>
</div>

<div class="khach">
  <img src="img/Rating/r1.jpg" alt="" style="padding-bottom: 30px;">
</div>
<div class="contact">
  <h3>Địa chỉ mua bán Laptop uy tín tại Hà Nội và trên toàn quốc - LaptopAZ.vn</h3>
  <h3>Cơ sở 1: Số 18 Ngõ 121 - Thái Hà - Đống Đa - Hà Nội</h3>
  <h3>Cơ sở 2: Số 56 Trần Phú - Hà Đông - Hà Nội</h3>
  <h3>Liên hệ ngay: Hotline 0825.233.233</h3>
  <h4>Chuyển hàng đi toàn quốc nhận máy đúng như mô tả mới phải thanh toán xem chi tiết tại đây</h4>
  <a href="https://www.facebook.com/messages/t/110101228608585">Liên hệ với nhân viên tư vấn</a>
</div>

<?php
include __DIR__ . '/partials/footer.php';
?>