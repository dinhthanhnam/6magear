<?php
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../../core/DB.php';

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
                            if ($user->verify_status == 0) {
                                $_SESSION['authenticated'] = true;
                                $_SESSION['auth_user'] = [
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

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: /");
        exit;
    }

}
