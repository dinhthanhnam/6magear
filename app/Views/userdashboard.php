<?php
$title = "Trang Tài khoản"; // Gán giá trị cho tiêu đề trang
include __DIR__ . '/partials/header.php'; // Include header
require_once __DIR__ . '../../../core/helpers.php';
?>
<div class="container">
  <div class="user-dashboard">
    <h5>User Dashboard</h5>
  </div>
  <div class="user-info">
    <h4>Thông tin tài khoản</h4>
    <hr>
    <h5>Username: <?= $_SESSION['auth_user']['name'] ?> </h5>
    <h5>Email: <?= $_SESSION['auth_user']['email'] ?> </h5>
    <h5>Số điện thoại: <?= $_SESSION['auth_user']['phone'] ?> </h5>
  </div>
</div>
<?php
include __DIR__ . '/partials/footer.php';
?>