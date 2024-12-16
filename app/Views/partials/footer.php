<?php
require_once __DIR__ . '/../../../core/helpers.php';
?>
<footer>
  <div class="info" 0>
    <h4>Thông Tin</h4>
    <div><i class="fas fa-map-marker-alt"></i><span class="info-text">Cơ sở 1: Số 18, ngõ 121, Thái Hà, Đống Đa, Hà Nội</span></div>
    <div><i class="fas fa-map-marker-alt"></i><span class="info-text">Cơ sở 2: Số 56 Trần Phú, Hà Đông, Hà Nội</span></div>
    <div><i class="fas fa-phone"></i><span class="info-text">Hotline: 0825 233 233</span></div>
    <div><i class="far fa-envelope"></i><span class="info-text">Email: Chotrolaptopaz@gmail.com</span></div>
  </div>
  <div class="policy">
    <h4>Chính Sách</h4>
    <a href="https://laptopaz.vn/chinh-sach-doi-tra-hang.html">
      <div>Chính sách đổi trả hàng</div>
    </a>
    <a href="https://laptopaz.vn/chinh-sach-bao-tri-bao-hanh.html">
      <div>Chính sách bảo hành</div>
    </a>
    <a href="https://laptopaz.vn/huong-dan-mua-hang-thanh-toan.html">
      <div>Hướng dẫn mua hàng</div>
    </a>
    <a href="https://laptopaz.vn/huong-dan-mua-hang-thanh-toan.html">
      <div>Chính sách bảo mật</div>
    </a>
  </div>
  <div class="fanpage">
    <h4 style="padding-bottom: 15px;">
      Fanpage
    </h4>
    <iframe
      src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Flaptopaz.vn&tabs=timeline&width=340&height=331&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true"></iframe>
  </div>
</footer>
<script>
  // Lắng nghe sự kiện khi người dùng gõ vào ô tìm kiếm
  document.getElementById('search').addEventListener('input', function() {
    let query = this.value;

    // Nếu không có gì để tìm kiếm, ẩn phần kết quả
    if (query.trim() === '') {
      document.getElementById('search-results').innerHTML = '';
      document.getElementById('search-results').style.display = 'none';
      return;
    }

    // Gửi yêu cầu đến server
    fetch(window.location.origin + '/search.php?query=' + encodeURIComponent(query))
      .then((response) => response.json())
      .then((data) => {
        let resultHTML = '';

        if (data.length > 0) {
          data.forEach((item) => {
            let thumbnail = 'http://localhost:8000/assets/img/products/'+ item.id + '.jpg';
            let link = 'http://localhost:8000/products/'+ item.id;
            resultHTML += `
              <a class="search-item" href="${link}">
                <img src="${thumbnail}" alt="Thumbnail" class="thumbnail" />
                <div class="item-info">
                  <p class="item-name">Tên: ${item.name}</p>
                  <p class="item-price">Giá: ${item.price}</p>
                </div>
              </a>
            `;
          });
        } else {
          resultHTML = '<p>Không tìm thấy kết quả nào!</p>';
        }

        const resultsContainer = document.getElementById('search-results');
        resultsContainer.innerHTML = resultHTML;
        resultsContainer.style.display = 'block'; // Hiển thị kết quả
      })
      .catch((error) => {
        console.error('Lỗi tìm kiếm:', error);
        document.getElementById('search-results').innerHTML = '<p>Lỗi xảy ra khi tìm kiếm!</p>';
      });
  });
</script>
<script src="<?= asset('js/main.js') ?>"></script>
</body>

</html>