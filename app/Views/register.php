<?php
$title = "Đăng ký"; // Gán giá trị cho tiêu đề trang
include __DIR__ . '/partials/header.php'; // Include header
require_once __DIR__ . '../../../core/helpers.php';
?>
<div class="container">
  <div class="registration form">
    <header>Đăng ký</header>
    <form action="/register" method="POST">
      <?php
      if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-danger">';
        echo "<h4>" . $_SESSION['status'] . "</h4>";
        echo '</div>';
        unset($_SESSION['status']);
      }
      ?>
      <input type="name" name="name" placeholder="Nhập tên của bạn">
      <input type="email" name="email" placeholder="Nhập email của bạn">
      <input type="text" name="phone" placeholder="Nhập điện thoại của bạn" >
      <input type="password" name="password" placeholder="Tạo mật khẩu">
      <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu">
      <input type="submit" name="register_btn" class="button" value="Đăng ký">
    </form>
    <div class="signin">
      <span class="signin">Đã có tài khoản
        <a href="/login">Đăng nhập</a>
      </span>
    </div>
  </div>
</div>
<?php
include __DIR__ . '/partials/footer.php';
?>