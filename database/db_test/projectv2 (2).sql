-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 08, 2024 lúc 12:23 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `projectv2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_16_164500_create_orders_table', 1),
(6, '2024_02_24_100606_create_products_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name_sneaker` varchar(200) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Brand` varchar(35) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `Origin` varchar(26) NOT NULL,
  `Material` varchar(50) NOT NULL,
  `Status_Sneaker` varchar(35) NOT NULL,
  `Product_Code` varchar(20) NOT NULL,
  `Price` int(11) NOT NULL,
  `Size` varchar(50) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `Name_sneaker`, `Description`, `Quantity`, `Brand`, `Color`, `Origin`, `Material`, `Status_Sneaker`, `Product_Code`, `Price`, `Size`, `Image`, `created_at`, `updated_at`) VALUES
(27, 'Adidas Originals Equipment White Navy', 'Adidas Originals Equipment White Navy là một đôi giày thể thao phong cách từ thương hiệu Adidas. Được thiết kế với màu trắng chủ đạo kết hợp với chi tiết màu navy, đôi giày này mang lại sự tươi mới và phá cách. Với chất liệu cao cấp và công nghệ tiên tiến, Adidas Originals Equipment White Navy không chỉ mang lại sự thoải mái khi mang mà còn thể hiện phong cách thời trang độc đáo và ấn tượng. Đây là lựa chọn hoàn hảo cho những người yêu thích sự thoải mái và phong cách trong mọi hoạt động hàng ngày và hoạt động thể thao.', 199, 'Adidas', 'Trắng, Đen', 'Germany', 'Vải cao cấp', 'Còn hàng', 'HTH1', 1999, '39,40,41,43', '/storage/product_images/798704.jpg', '2024-03-04 04:59:37', '2024-03-04 04:59:37'),
(28, 'Air Jordan 4 Retro Off-White', '', 19, 'Jordan', 'Trắng', 'Hoa Kỳ', 'Vải cao cấp', 'Còn hàng', 'JDW3', 1999, '45,46,47,48', '/storage/product_images/859703.jpg', '2024-03-04 05:08:48', '2024-03-04 05:09:02'),
(29, 'Converse Run Star Legacy CX \'Black\'', '', 199, 'Converse', 'Đen, Trắng', 'Mỹ', 'Vải', 'Còn hàng', 'CV4', 99, '42,45,46', '/storage/product_images/448870.jpg', '2024-03-04 05:17:15', '2024-03-04 05:17:15'),
(30, 'Dior B23 Low Top Oblique Canvas White Black', '', 18, 'Dior', 'Trắng, Đen', 'Pháp', 'Vải cao cấp', 'Còn hàng', 'HTH-DOB23', 999, '41,42,43,44', '/storage/product_images/803450.jpg', '2024-03-04 05:19:25', '2024-03-04 05:19:25'),
(31, 'Nike Air Force 1 - AF1 Louis Vuitton', 'Nike Air Force 1 - AF1 Louis Vuitton là một phiên bản đặc biệt của dòng giày thể thao Nike Air Force 1, được hợp tác giữa Nike và thương hiệu thời trang hàng đầu Louis Vuitton. Đôi giày này kết hợp giữa phong cách thể thao và sự sang trọng của Louis Vuitton, tạo nên một sản phẩm độc đáo và đẳng cấp.\r\n\r\nVới thiết kế chất liệu da cao cấp và các chi tiết được làm tỉ mỉ, Nike Air Force 1 - AF1 Louis Vuitton thể hiện sự tinh tế và phóng khoáng. Logo của cả hai thương hiệu được đặt ở vị trí đặc biệt, tạo điểm nhấn và giá trị độc đáo cho đôi giày.\r\nĐược ra mắt với số lượng giới hạn, Nike Air Force 1 - AF1 Louis Vuitton không chỉ là một đôi giày thể thao mà còn là một biểu tượng của phong cách và đẳng cấp trong làng sneakers.', 99, 'Nike X Louis Vuitton', 'Trắng, Nâu Caro', 'Hồng Kông', 'Vải cao cấp', 'Còn hàng', 'HTH-NXLV', 2000, '41,42,44,45', '/storage/product_images/634518.jpg', '2024-03-04 05:39:30', '2024-03-04 05:39:30'),
(32, 'Nike Air Force 1 Jewel \'Color of the Month White Bronze\'', 'Nike Air Force 1 Jewel \'Color of the Month White Bronze\' là một phiên bản đặc biệt của dòng giày thể thao Nike Air Force 1 Jewel. Điểm nhấn của đôi giày này là sự kết hợp độc đáo giữa màu trắng và đồng bronz, tạo nên một phong cách tinh tế và sang trọng.\r\n\r\nVới chất liệu da cao cấp và các chi tiết được gia công tỉ mỉ, Nike Air Force 1 Jewel \'Color of the Month White Bronze\' thể hiện sự chất lượng và đẳng cấp của thương hiệu Nike. Đặc biệt, việc sử dụng đồng bronz làm điểm nhấn cho logo và các chi tiết khác tạo ra một vẻ đẹp độc đáo và thu hút.\r\n\r\nĐây không chỉ là một đôi giày thể thao mà còn là một biểu tượng của phong cách và cái đẹp trong làng sneakers, phù hợp cho những người yêu thích sự sang trọng và cá tính.', 1, 'Nike', 'Trắng, bronz', 'Hoa Kỳ', 'Vải cao cấp', 'Còn hàng', 'HTH-AF1J', 2099000, '43,44,45', '/storage/product_images/531289.jpg', '2024-03-04 05:46:30', '2024-03-04 05:46:30'),
(33, 'Nike Air Jordan 1 Retro High OG \'Yellow Toe\'', 'Nike Air Jordan 1 Retro High OG \'Yellow Toe\' là một phiên bản đặc biệt của dòng giày thể thao Air Jordan 1 Retro High OG của Nike. Mẫu này được phát hành với một thiết kế độc đáo, với phần upper chính màu vàng nổi bật, điểm nhấn bởi phần toe màu đen và một phần trang trí màu trắng ở giữa. Đây là một trong những phiên bản được mong chờ của dòng Air Jordan 1, với sự kết hợp tinh tế giữa các màu sắc và chất liệu, tạo nên một cảm giác thời trang và cá tính.', 29, 'Jordan', 'Cam, Đen, Trắng', 'Hoa Kỳ', 'Vải cao cấp', 'Còn hàng', 'HTH-JD1YT', 1999999, '45,46,47', '/storage/product_images/486745.jpg', '2024-03-04 05:52:37', '2024-03-04 05:52:37'),
(34, 'Gucci TIM SC', 'Gucci TIM SC là một loại giày thể thao cao cấp được sản xuất bởi thương hiệu thời trang hàng đầu Gucci. Được thiết kế với chất liệu và công nghệ tiên tiến, giày Gucci TIM SC kết hợp giữa phong cách hiện đại và đẳng cấp với sự thoải mái và tính tiện ích. Với kiểu dáng độc đáo và phong cách sang trọng, đôi giày này thường được ưa chuộng trong cả các bữa tiệc và hoạt động thể thao, đồng thời là biểu tượng của sự phong cách và thể hiện cá tính của người sử dụng.', 12, 'Gucci', 'Trắng', 'Hoa Kỳ', 'Vải cao cấp', 'Còn hàng', 'HTH-HTH-GCT', 1900000, '43', '/storage/product_images/383914.jpg', '2024-03-04 11:22:15', '2024-03-04 11:22:15'),
(35, 'Jordan 1 Retro Low OG SP Travis Scott Olive', 'Jordan 1 Retro Low OG SP Travis Scott Olive là một phiên bản đặc biệt của dòng giày Air Jordan 1 được hợp tác giữa Jordan Brand và rapper nổi tiếng Travis Scott. Đôi giày này mang đậm phong cách cá nhân của Travis Scott, với màu sắc Olive độc đáo và các chi tiết thiết kế độc đáo. Với chất liệu vàng da cao cấp, đế giày cao su chắc chắn và đế Boost phía dưới, đây là một sản phẩm không chỉ đẹp mắt mà còn mang lại sự thoải mái và tiện ích cho người mang. Đây cũng là một trong những đôi giày được săn đón và thu hút sự chú ý lớn từ cộng đồng yêu sneaker và là biểu tượng của phong cách thời trang đương đại.', 1, 'Jordan', 'Nâu, Trắng', 'Hoa Kỳ', 'Vải cao cấp', 'Còn hàng', 'HTH-JD1TS', 1999999, '43, 45,47', '/storage/product_images/764104.jpg', '2024-03-04 11:23:54', '2024-03-04 11:23:54'),
(36, 'MLB Chunky Liner Mid Denim Boston Red Sox \'D.Blue\'', 'MLB Chunky Liner Mid Denim Boston Red Sox \'D.Blue\' là một đôi giày phối màu xanh dương độc đáo, được sản xuất bởi MLB. Với thiết kế chunky, đế giày cao và đường may chắc chắn, đôi giày này mang đến sự thoải mái và phong cách cho người mang. Đặc biệt, logo của đội bóng Boston Red Sox được in trên thân giày, tạo điểm nhấn và tính cá nhân cho sản phẩm. Với sự kết hợp giữa phong cách thể thao và phối màu sắc sành điệu, đôi giày này là một lựa chọn tuyệt vời cho những người yêu thích thể thao và muốn thể hiện phong cách cá nhân của mình.', 98, 'MLB', 'Trắng, Xanh', 'Hoa Kỳ', 'Vải cao cấp', 'Còn hàng', 'HTH-MLBCLM', 1999, '23', '/storage/product_images/142137.jpg', '2024-03-04 11:27:37', '2024-03-04 11:27:37'),
(37, 'Dior Walk\'N\'Dior Oblique Navy Canvas', '\"Dior Walk\'N\'Dior Oblique Navy Canvas\" là một đôi giày thời trang từ thương hiệu nổi tiếng Dior. Thiết kế của nó có thể tích hợp chất liệu vải canvas màu xanh đậm, được in họa tiết Oblique - một trong những đặc trưng nổi bật của Dior. Đôi giày này thường có kiểu dáng đơn giản nhưng sang trọng, phù hợp cho cả các sự kiện hàng ngày và các dịp đặc biệt. Sự kết hợp giữa phong cách hiện đại và chất lượng tinh tế làm cho Dior Walk\'N\'Dior Oblique Navy Canvas trở thành một lựa chọn đẳng cấp trong thế giới thời trang.', 20, 'Dior', 'Trắng, Đen', 'Pháp', 'Vải cao cấp', 'Còn hàng', 'HTH-DOONC', 1921, '43', '/storage/product_images/944148.jpg', '2024-03-08 04:04:33', '2024-03-08 04:04:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `bio` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `address`, `phone_number`, `date_of_birth`, `profile_picture`, `role`, `bio`, `is_active`) VALUES
(1, 'Nguyễn Hoàng Hiệp', NULL, NULL, '$2y$12$oIgmD.3roS/aNr5tfIuD3OAtZ3kgRLYesDHr8lTW8d1hZ3xOXoKru', NULL, '2024-02-24 09:27:55', '2024-02-24 09:27:55', NULL, NULL, NULL, NULL, 'admin', NULL, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_code_unique` (`Product_Code`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
