Một bài php làm vui vui, về website bán laptop, là một bài lý tưởng cho những ai không định hướng theo ngành IT nhưng vẫn cần một sản phẩm đủ hiểu, đủ giải thích cho thầy cô, cũng có một chút phức tạp và thú vị để + điểm bonus, nếu như nó đầy đủ chức năng có thể hướng đến điểm 9 10 nhưng vì mình lười.

Features:
  Code cực gọn gàng và dễ hiểu, tuy không nói là tối ưu nhất hay xịn nhất.
  Sử dụng MVC tự chế, dễ đọc, nhưng chưa đầy đủ, nhất là việc dispatch các route, có thể gặp lỗi, do mình lười.
  Có giải pháp phù hợp cho các route chung và URL động ví dụ như 6magear/products/{1, 2, 3, 4}
  Đăng nhập đăng ký dựa trên session, và gửi mail xác thực đăng ký đến email người dùng, nhưng chỉ là dùng Mailtrap, có thể sửa để dùng với gmail, khá tương tự.
  Sử dụng Instance (thiết kế Singleton) cho class DB.
  Dữ liệu lấy từ db, có bao gồm cả file sql để execute, cấu trúc đơn giản, và ứng dụng ORM (PDO::FETCH_OBJ).
  Có chức năng search, hoạt động bằng fetch cho get request (không cần tải lại trang).
