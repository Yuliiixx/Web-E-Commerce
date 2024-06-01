-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 07:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('Pending','Processed','Delivered','Cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(3, 'Clothing', '2024-05-31 20:18:03', '2024-05-31 20:18:03'),
(4, 'Shoes', '2024-05-31 20:18:22', '2024-05-31 20:18:22'),
(5, 'Accesories', '2024-05-31 20:18:39', '2024-05-31 20:18:39'),
(6, 'Bag', '2024-05-31 20:20:12', '2024-05-31 20:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000002_create_kategori_table', 1),
(3, '0001_01_01_000002_create_produk_table', 1),
(4, '0001_01_01_000000_create_user_table', 2),
(5, '2024_05_31_153128_create_personal_access_tokens_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `jumlah_pembayaran` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `no_resi` varchar(50) DEFAULT NULL,
  `status` enum('Pending','Processed','Delivered','Cancelled') NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `gambar`, `harga`, `keterangan`, `created_at`, `updated_at`) VALUES
(6, 3, 'Black 1950s Butterfly Patchwork Vintage Dress', '1717253353.jpg', 299000.00, 'Petticoats added for volume sold separately. Composition: 100% Polyester Stretch: No Stretch Closure: Front Buttons Length: Knee-Length Butterfly mesh stitching', '2024-06-01 07:49:13', '2024-06-01 07:49:13'),
(7, 3, 'Cute Sweater Strawberry', '1717253958.jpg', 199000.00, 'The latest swater with original quality and affordable prices can support your appearance', '2024-06-01 07:59:18', '2024-06-01 07:59:18'),
(8, 3, 'Cute Sweater Flower', '1717254015.jpg', 199000.00, 'The latest swater with original quality and affordable prices can support your appearance', '2024-06-01 08:00:15', '2024-06-01 08:00:15'),
(9, 5, 'Black and white sunglasses', '1717254230.jpg', 99000.00, 'Look with the latest fashion style using glasses', '2024-06-01 08:03:50', '2024-06-01 08:03:50'),
(10, 5, 'Hair Accessories', '1717254371.jpg', 10000.00, 'Sustainably made in England with the finest couture silk, these Scrunchies are renowned \'the best silk scrunchies on the market\' by Glamour Magazine', '2024-06-01 08:06:11', '2024-06-01 08:06:11'),
(11, 6, 'bamboo circular bag', '1717254773.jpg', 150000.00, 'Bamboo bags are cute, structured straw bags in rectangular and circular styles that girls love.', '2024-06-01 08:12:53', '2024-06-01 08:12:53'),
(12, 6, 'Bag Black Cute', '1717254826.jpg', 150000.00, 'Cute bag with good quality', '2024-06-01 08:13:46', '2024-06-01 08:13:46'),
(13, 4, 'Converse black', '1717255084.jpg', 799000.00, 'The selection of Converse shoe collections in casual style is right. Not only that, this branded sneakers model also makes it easy to wear and provides more active free movement.', '2024-06-01 08:18:04', '2024-06-01 08:18:17'),
(14, 4, 'Converse Chuck Taylor All Star', '1717255198.jpg', 899000.00, 'The selection of Converse shoe collections in casual style is right. Not only that, this branded sneakers model also makes it easy to wear and provides more active free movement.', '2024-06-01 08:19:58', '2024-06-01 08:20:07'),
(15, 5, 'Rhinestone Flower Decor Bracelet', '1717255442.jpg', 59000.00, 'Yellow gold fashionable collar glass link embellished jewelry', '2024-06-01 08:24:02', '2024-06-01 09:15:58'),
(16, 5, 'Flower Bracelet', '1717255588.jpg', 15000.00, 'Flower bracelet cute', '2024-06-01 08:26:28', '2024-06-01 08:26:28'),
(18, 6, 'Pink bag', '1717255843.jpg', 200000.00, 'Gorgeous pink clutch bag', '2024-06-01 08:30:43', '2024-06-01 08:30:43'),
(19, 3, 'Hoodies Women Casual', '1717256785.jpg', 250000.00, 'Hoodies women casual aesthetic kawaii pink', '2024-06-01 08:46:25', '2024-06-01 08:46:25'),
(20, 3, 'Jaket Women Casual', '1717256815.jpg', 250000.00, 'Jaket women casual aesthetic kawaii pink', '2024-06-01 08:46:55', '2024-06-01 08:46:55'),
(21, 3, 'Sweater', '1717257074.jpg', 150000.00, 'Sweater cute aesthetic', '2024-06-01 08:51:14', '2024-06-01 08:51:14'),
(22, 3, 'Sweater love', '1717257098.jpg', 150000.00, 'Sweater cute aesthetic love', '2024-06-01 08:51:38', '2024-06-01 08:51:38'),
(23, 4, 'Women shoes', '1717257263.jpg', 299000.00, 'Women shoes with good quality', '2024-06-01 08:54:23', '2024-06-01 08:54:23'),
(24, 4, 'Sandal Rose Pink', '1717257384.jpg', 99000.00, 'This pair of Oran Sandals are in Rose Petale calfskin with the iconic H crossover strap and rose petale leather soles.', '2024-06-01 08:56:24', '2024-06-01 08:56:24'),
(25, 4, 'New Balance', '1717257445.jpg', 699000.00, 'New Balance MR530SG Blanc / Indigo naturel - White / 10', '2024-06-01 08:57:25', '2024-06-01 08:57:25'),
(26, 4, 'New Balance', '1717257484.jpg', 699000.00, 'New Balance Kids 480 (Little Kid) Girl\'s Shoes White/Orb Pink : 13.5 Little Kid W', '2024-06-01 08:58:04', '2024-06-01 08:58:04'),
(27, 5, 'Paisley Silk Bandana', '1717257647.jpg', 49000.00, 'Accent your look with this bandana, made with luxuriously soft silk.', '2024-06-01 09:00:47', '2024-06-01 09:00:47'),
(28, 5, 'Minimalist Solid Headband', '1717257774.jpg', 99000.00, 'Pink casual collar fabric plain wide headband embellished women accessories', '2024-06-01 09:02:54', '2024-06-01 09:02:54'),
(29, 6, 'Tote Bag', '1717257909.jpg', 150000.00, 'Indulge in luxury with our Handmade Genuine Leather Tote Shopping Bag.', '2024-06-01 09:05:09', '2024-06-01 09:05:09'),
(30, 6, 'Miu Miu Bag', '1717258123.jpg', 499000.00, 'Miu Miu Wander matelassé shoulder bag Highlights black lambskin nappa leather matelassé effect gold-tone', '2024-06-01 09:08:43', '2024-06-01 09:09:40'),
(32, 6, 'Tote Bag', '1717258338.jpg', 150000.00, 'Tote bag with soft and cute material', '2024-06-01 09:12:18', '2024-06-01 09:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6kqoBP8UeRdhK1u69aX8sX6R67TYFPOjtCsX43Gr', NULL, '192.168.43.102', 'PostmanRuntime/7.37.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZG0yUmw1Umd5ZmV1Q0NQUW51d0pLVFpFZnJRbXRrVzVsTzI0bXFoUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xOTIuMTY4LjQzLjEwMjo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1717250148),
('bpcFoKSt81ybOIzZIhzf2hTOSFYxg5y7hv4zXFKN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMkVLc1NIaXhGU0ZBTlc2aWEyZWVmVFlXRE4xYm43RzNYMjJsT2dnRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1717215536),
('Ity5YfieH4vd2T5IHqd5RWmNBjYfpL0LaUuvOheV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWnNFbldjdXRkeVNDVFZiUUdLeURHcUNUYzlHdFl6M25pd2E5REdxTCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3JlZ2lzdGVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1717221383),
('LDxXyhPLhQ9sHSGj4wWCyT7rZQksTe8Zm8wCpF9W', NULL, '192.168.43.102', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVklvWHo0UmREdjhzVll3aW1EYzM1MEkwYUczbDdhZThUanhRekxSZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xOTIuMTY4LjQzLjEwMjo4MDAwL2hvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMxOiJodHRwOi8vMTkyLjE2OC40My4xMDI6ODAwMC9ob21lIjt9fQ==', 1717252016),
('zhc3B84If7bzuZrA6rqm9MPcLHpG3AZe9ge9xQgJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWDlDbHd3eW00bTk3SndYYTd4amJZWEJsWkhMYkt2b0NscXk1cFY2ViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9fQ==', 1717258601);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `produk_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_username_unique` (`username`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`),
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
