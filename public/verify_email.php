<?php
  require_once __DIR__ . '/../core/DB.php';

  $db = DB::getInstance();
  
  if (isset($_GET['token'])) {
    $token = $_GET['token'];
    
    // Kiểm tra token trong cơ sở dữ liệu
    $stmt = $db->prepare("SELECT verify_token, verify_status FROM users WHERE verify_token = :token");
    $stmt->execute(['token' => $token]);
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row['verify_status'] == '0') {
            // Cập nhật trạng thái xác thực
            $update_query = "UPDATE users SET verify_status = '1' WHERE verify_token = :token LIMIT 1";
            $update_stmt = $db->prepare($update_query);
            $update_stmt->execute(['token' => $token]);
            
            if ($update_stmt->rowCount() > 0) {
                $_SESSION['status'] = 'Xác thực Email thành công.';
            } else {
                $_SESSION['status'] = 'Xác thực Email thất bại.';
            }
        } else {
            $_SESSION['status'] = 'Email đã được xác thực, bạn có thể đăng nhập.';
        }
    } else {
        $_SESSION['status'] = 'Token này không tồn tại.';
    }
    header('Location: login');
    exit();
} else {
    $_SESSION['status'] = 'Không tìm thấy token.';
    header('Location: login');
    exit();
}
?>