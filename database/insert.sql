INSERT INTO laptops (id, name, price, brand, created_at, updated_at, deleted_at, hot) VALUES
(1, 'ASUS ROG Zephyrus M GU502GU-AZ090T Gaming', '34.600.000đ', 'ASUS', NOW(), NOW(), NULL, 1),
(2, 'ASUS TUF FX705DT-H7138T Gaming Laptop', '42.600.000₫', 'ASUS', NOW(), NOW(), NULL, 0),
(3, 'ACER Swift 7 SF714-52T-7134 Laptop Black', '49.600.000₫', 'ACER', NOW(), NOW(), NULL, 0),
(4, 'ASUS ROG Strix SCAR III G531GN-VAZ160T Laptop', '44.600.000₫', 'ASUS', NOW(), NOW(), NULL, 0),
(5, 'ASUS ProArt StudioBook Pro 17 W700G1T-AV046T Laptop', '45.600.000₫', 'ASUS', NOW(), NOW(), NULL, 1),
(6, 'LG Gram 17Z90N-V.AH75A5 Laptop Silver', '39.600.000₫', 'LG', NOW(), NOW(), NULL, 0),
(7, 'HP Omen 15-dh0172TX Gaming Laptop', '44.600.000₫', 'HP', NOW(), NOW(), NULL, 0),
(8, 'ASUS VivoBook 15 A512FA-EJ1281T Laptop', '15.600.000₫', 'ASUS', NOW(), NOW(), NULL, 1),
(9, 'ACER Predator Helios 300 PH315-52-78HH Gaming Laptop', '35.600.000₫', 'ACER', NOW(), NOW(), NULL, 0),
(10, 'MSI Modern 15 A10M-068VN Laptop Space Gray', '18.600.000đ', 'MSI', NOW(), NOW(), NULL, 0),
(11, 'LG Gram 2023 16Z90R-G.AH76A5', '37.490.000đ', 'LG', NOW(), NOW(), NULL, 0),
(12, 'Laptop LG Gram 14Z90R-G.AH75A5', '33.990.000đ', 'LG', NOW(), NOW(), NULL, 1),
(13, 'Laptop LG Gram 14ZD90N-V.AX55A5 ', '26.590.000đ', 'LG', NOW(), NOW(), NULL, 0),
(14, 'Laptop MSI GL65 9SDK 054VN', '29.990.000đ', 'MSI', NOW(), NOW(), NULL, 1),
(15, 'Laptop MSI Katana 15 B13VGK-1211VN', '37.990.000đ ', 'MSI', NOW(), NOW(), NULL, 0),
(16, 'Laptop MSI Modern 15 B12MO-487VN ', '16.990.000₫', 'MSI', NOW(), NOW(), NULL, 0),
(17, 'Laptop Gaming ACER Nitro V ANV15-51-55CA NH.QN8SV.004', '26.990.000₫', 'ACER', NOW(), NOW(), NULL, 1),
(18, 'Laptop Gaming ACER Aspire 7 A715-76G-5806 - NH.QMFSV.002', '18.590.000₫', 'ACER', NOW(), NOW(), NULL, 0),
(19, 'Laptop Gaming ACER Nitro 5 Tiger AN515-58-52SP NH.QFHSV.001', '21.490.000₫', 'ACER', NOW(), NOW(), NULL, 0),
(20, 'Laptop HP 14S-dq5100TU 7C0Q0PA', '13.490.000₫', 'HP', NOW(), NOW(), NULL, 0),
(21, 'Laptop HP Pavilion 15-eg3093TU 8C5L4PA', '17.990.000₫', 'HP', NOW(), NOW(), NULL, 0),
(22, 'Laptop HP ENVY X360 13-bf0090TU 76B13PA', '27.490.000₫', 'HP', NOW(), NOW(), NULL, 1),
(23, 'Laptop ASUS TUF Gaming F15 FX507ZC4-HN074W', '19.490.000₫', 'ASUS2', NOW(), NOW(), NULL, 0),
(24, 'Laptop HP Pavilion 14-dv2074TU 7C0P3PA', '17.490.000₫', 'HP', NOW(), NOW(), NULL, 0),
(25, 'Laptop LG Gram 2023 14Z90R-G.AH75A5', '20.490.000₫', 'LG', NOW(), NOW(), NULL, 0),
(26, 'Laptop MSI Cyborg 15 A12VE 240VN', '21.990.000₫', 'MSI', NOW(), NOW(), NULL, 1),
(27, 'Laptop ASUS Zenbook 14 OLED UX3405MA-PP475W', '35.990.000₫', 'ASUS2', NOW(), NOW(), NULL, 0),
(28, 'Laptop ASUS Zenbook 14 OLED UM3402YA-KM405W', '14.990.000₫', 'ASUS2', NOW(), NOW(), NULL, 1),
(29, 'Laptop ASUS ExpertBook B1 B1402CVA-NK0176W', '14.990.000₫', 'ASUS2', NOW(), NOW(), NULL, 0),
(30, 'Laptop ASUS ROG Strix SCAR 18 G834JYR-R6011W', '127.990.000₫', 'ASUS2', NOW(), NOW(), NULL, 0);


INSERT INTO banners (title, banner_path, created_at, updated_at, deleted_at) VALUES
('Banner 1 abc', 'img/banner/banner1.jpg', NOW(), NOW(), NULL),
('Banner 2 abc', 'img/banner/banner2.jpg', NOW(), NOW(), NULL),
('Banner 3 abc', 'img/banner/banner3.jpg', NOW(), NOW(), NULL);

INSERT INTO news (title, news_img_path, news_link, active, created_at, updated_at, deleted_at) VALUES
('Lenovo bất ngờ ra mắt Lenovo GeekPro G5000 2024 - Nhiều cải tiến đáng kể', 'img/banner/news1.jpg','https://laplaptopaz.vn/lenovo-bat-ngo-ra-mat-lenovo-geekpro-g5000-2024-nhieu-cai-tien-dang-ke.html', 1, NOW(), NOW(), NULL),
('TOP 4 Laptop Bán Chạy Nhất Chương Trình Hè Rực Rỡ Deal Hết Cỡ', 'img/banner/news2.jpg', 'https://laptopaz.vn/top-4-laptop-ban-chay-nhat-chuong-trinh-he-ruc-ro-deal-het-co.html', 1, NOW(), NOW(), NULL),
('So sánh Core i7-14650HX vs Core i7-13650HX - Chênh lệch đáng kể?', 'img/banner/news3.jpg', 'https://laptopaz.vn/so-sanh-core-i7-14650hx-vs-core-i7-13650hx-chenh-lech-dang-ke.html', 1, NOW(), NOW(), NULL),
('HÈ RỰC RỠ DEAL HẾT CỠ - TẶNG TỚI 5 TRIỆU ĐỒNG!', 'img/banner/news4.jpg', 'https://laptopaz.vn/he-ruc-ro-deal-het-co-tang-toi-5-trieu-dong.html', 1, NOW(), NOW(), NULL);

