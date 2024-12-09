<?php
$title = "Đăng nhập"; // Gán giá trị cho tiêu đề trang
include __DIR__ . '/partials/header.php'; // Include header
require_once __DIR__ . '../../../core/helpers.php';
?>
<div class="container">
  <input type="checkbox" id="check">
  <div class="login form">
    <header>Đăng nhập</header>
    <form action="/login" method="POST">
      <?php
      if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-success">';
        echo "<h4>" . $_SESSION['status'] . "</h4>";
        echo '</div>';
        unset($_SESSION['status']);
      }
      ?>
      <input type="email" name="email" placeholder="Nhập email của bạn">
      <input type="password" name="password" placeholder="Nhập mật khẩu">
      <a href="#">Quên mật khẩu?</a>
      <input type="submit" name="login_btn" class="button" value="Đăng nhập">
    </form>
    <div class="signup">
      <span class="signup">Không có tài khoản?
        <a href="/register">Đăng ký</a>
      </span>
    </div>
  </div>
</div>
<?php
include __DIR__ . '/partials/footer.php';
?>