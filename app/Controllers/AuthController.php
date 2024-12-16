<?php
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../../core/DB.php';
require __DIR__ . '/../../lib/PHPMailer/Exception.php';
require __DIR__ . '/../../lib/PHPMailer/PHPMailer.php';
require __DIR__ . '/../../lib/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require __DIR__ . "/../Views/login.php";
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['login_btn'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                if (empty($email) || empty($password)) {
                    $_SESSION['status'] = 'Vui lòng nhập đầy đủ thông tin.';
                    header('Location: login');
                    exit;
                }

                try {
                    // Kết nối tới cơ sở dữ liệu
                    $db = DB::getInstance();

                    // Truy vấn để kiểm tra thông tin đăng nhập
                    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
                    $stmt->execute(['email' => $email]);

                    if ($stmt->rowCount() > 0) {
                        $user = $stmt->fetch(PDO::FETCH_OBJ);

                        // Kiểm tra mật khẩu
                        if (password_verify($password, $user->password)) {
                            // Kiểm tra trạng thái xác minh tài khoản
                            if ($user->verify_status == 1) {
                                $_SESSION['authenticated'] = true;
                                $_SESSION['auth_user'] = [
                                    'id' => $user->id,
                                    'name' => $user->name,
                                    'phone' => $user->phone,
                                    'email' => $user->email,
                                ];
                                $_SESSION['status'] = 'Đăng nhập thành công.';
                                header('Location: userdashboard');
                                exit;
                            } else {
                                $_SESSION['status'] = 'Tài khoản chưa được xác minh. Vui lòng kiểm tra email.';
                                header('Location: login');
                                exit;
                            }
                        } else {
                            $_SESSION['status'] = 'Sai mật khẩu. Vui lòng thử lại.';
                            header('Location: login');
                            exit;
                        }
                    } else {
                        $_SESSION['status'] = 'Không tìm thấy tài khoản với email này.';
                        header('Location: login');
                        exit;
                    }
                } catch (PDOException $e) {
                    error_log($e->getMessage()); // Ghi log lỗi để debug
                    $_SESSION['status'] = 'Có lỗi xảy ra, vui lòng thử lại.';
                    header('Location: login');
                    exit;
                }
            }
        } else {
            header('Location: login');
            exit;
        }
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require __DIR__ . "/../Views/register.php";
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST["register_btn"])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];
                $verify_token = md5(rand());

                // Kiểm tra các trường có được nhập đầy đủ hay không
                if (empty($name) || empty($phone) || empty($email) || empty($password) || empty($confirm_password)) {
                    $_SESSION['status'] = "Vui lòng điền đầy đủ tất cả các trường.";
                    header("Location: register");
                    exit(0);
                }

                // Kiểm tra confirm_password có trùng khớp với password không
                if ($password !== $confirm_password) {
                    $_SESSION['status'] = 'Mật khẩu xác nhận không khớp.';
                    header('Location: register');
                    exit(0);
                }

                try {
                    // Kết nối cơ sở dữ liệu
                    $db = DB::getInstance();

                    // Kiểm tra email tồn tại
                    $stmt = $db->prepare("SELECT email FROM users WHERE email = :email");
                    $stmt->execute(['email' => $email]);

                    if ($stmt->rowCount() > 0) {
                        $_SESSION['status'] = 'Email này đã đăng ký cho tài khoản khác';
                        header('Location: register');
                        exit;
                    }

                    // Hash mật khẩu
                    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

                    // Thêm người dùng mới
                    $stmt = $db->prepare("INSERT INTO users (name, phone, email, password, verify_token)
                        VALUES (:name, :phone, :email, :password, :verify_token)");
                    $query_success = $stmt->execute([
                        'name' => $name,
                        'phone' => $phone,
                        'email' => $email,
                        'password' => $password_hashed,
                        'verify_token' => $verify_token
                    ]);

                    if ($query_success) {
                        $this->sendemail_verify($name, $email, $verify_token);
                        // Có thể thêm logic gửi email xác nhận ở đây
                        $_SESSION['status'] = "Đăng ký thành công! Bạn có thể đăng nhập!";
                        header("Location: login");
                        exit;
                    } else {
                        $_SESSION['status'] = "Đăng ký thất bại";
                        header("Location: register");
                        exit;
                    }
                } catch (PDOException $e) {
                    error_log($e->getMessage()); // Ghi lại lỗi để debug
                    $_SESSION['status'] = "Có lỗi xảy ra. Vui lòng thử lại.";
                    header("Location: register");
                    exit;
                }
            }
        }
    }

    public function sendemail_verify($name, $email, $verify_token)
    {
        //Mailtrap là miễn phí, đăng ký và dùng thôi
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';    // Máy chủ SMTP của Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'nhập user name vào đây';
        $mail->Password = 'nhập mật khẩu vào đây';       // App Password đã tạo
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 2525;          

        $mail->setFrom('6magear@gmail.com', '6magear');   // Địa chỉ gửi đi
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $email_template = "
          <div style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
              <table width='100%' cellpadding='0' cellspacing='0' style='max-width: 600px; margin: 0 auto; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;'>
                  <tr>
                      <td style='background-color: #4CAF50; padding: 20px; text-align: center;'>
                          <h1 style='color: #ffffff; margin: 0;'>Chào mừng bạn đến với 6maGear!</h1>
                      </td>
                  </tr>
                  <tr>
                      <td style='padding: 20px;'>
                          <h2 style='color: #4CAF50;'>Xin chào $name,</h2>
                          <p>Bạn đã thực hiện đăng ký tài khoản trên trang của chúng tôi.</p>
                          <p>Nếu đây là hành động của bạn, vui lòng bấm vào nút bên dưới để xác nhận email và hoàn thành quá trình đăng ký:</p>
                          <div style='text-align: center; margin: 20px 0;'>
                              <a href='http://localhost:8000/verify_email.php?token=$verify_token' style='display: inline-block; padding: 12px 20px; color: #ffffff; background-color: #4CAF50; text-decoration: none; border-radius: 5px; font-weight: bold;'>Xác nhận Email</a>
                          </div>
                          <p style='font-size: 14px; color: #555;'>Nếu bạn không thực hiện đăng ký này, vui lòng bỏ qua email này. Liên hệ với chúng tôi nếu bạn cần hỗ trợ.</p>
                          <p>Trân trọng,<br>Đội ngũ Hỗ trợ</p>
                      </td>
                  </tr>
                  <tr>
                      <td style='background-color: #f0f0f0; padding: 15px; text-align: center; font-size: 12px; color: #888;'>
                          <p>&copy; 2024 Lập trình PHP</p>
                      </td>
                  </tr>
              </table>
          </div>
      ";

        $mail->Body = $email_template;

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        };
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: /");
        exit;
    }
}
