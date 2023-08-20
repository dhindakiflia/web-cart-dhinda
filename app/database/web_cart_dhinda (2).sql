-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Agu 2023 pada 22.45
-- Versi server: 8.0.29
-- Versi PHP: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_cart_dhinda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `id_product_type` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `qty`, `id_product_type`, `id_user`, `created_at`, `updated_at`) VALUES
(39, 1, 12, 1, '2023-08-20 12:57:53', '2023-08-20 12:57:53'),
(41, 1, 13, 6, '2023-08-20 15:40:47', '2023-08-20 15:40:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_20_022422_create_product_category_table', 2),
(6, '2023_07_20_022554_create_product_table', 3),
(7, '2023_07_21_140717_create_product_pict_table', 4),
(8, '2023_07_21_141603_create_product_type_table', 5),
(9, '2023_07_23_063912_create_cart_table', 6),
(10, '2023_07_24_071022_create_order_table', 7),
(11, '2023_07_24_073128_create_order_table', 8),
(12, '2023_07_24_075124_create_user_detail', 9),
(13, '2023_07_24_140946_create_payment_table', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` bigint UNSIGNED NOT NULL,
  `order_date` datetime NOT NULL,
  `order_time` time NOT NULL,
  `discount` int NOT NULL,
  `total` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id`, `order_date`, `order_time`, `discount`, `total`, `status`, `id_user`, `created_at`, `updated_at`) VALUES
(23, '2023-07-25 10:03:00', '10:03:34', 10000, 280000, 'open', 1, '2023-07-24 15:03:38', '2023-08-20 13:11:48'),
(24, '2023-07-24 10:13:00', '10:13:40', 10000, 135000, 'open', 1, '2023-07-24 15:13:45', '2023-08-20 13:12:09'),
(27, '2023-07-25 05:49:12', '05:49:12', 10000, 154500, 'open', 1, '2023-07-24 22:49:19', '2023-08-20 13:12:15'),
(28, '2023-08-20 07:47:04', '07:47:04', 10000, 280000, 'open', 1, '2023-08-20 00:47:22', '2023-08-20 13:12:25'),
(29, '2023-08-20 06:28:42', '06:28:42', 10000, 143000, 'open', 1, '2023-08-20 11:28:51', '2023-08-20 13:12:35'),
(30, '2023-08-20 06:45:27', '06:45:27', 10000, 65000, 'open', 1, '2023-08-20 11:45:41', '2023-08-20 13:12:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order` bigint UNSIGNED NOT NULL,
  `id_product_type` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`id_order`, `id_product_type`, `qty`, `created_at`, `updated_at`) VALUES
(23, 2, 1, '2023-07-24 15:03:38', '2023-07-24 15:03:38'),
(23, 3, 1, '2023-07-24 15:03:38', '2023-07-24 15:03:38'),
(24, 1, 1, '2023-07-24 15:13:45', '2023-07-24 15:13:45'),
(27, 5, 1, '2023-07-24 22:49:19', '2023-07-24 22:49:19'),
(27, 8, 1, '2023-07-24 22:49:20', '2023-07-24 22:49:20'),
(28, 2, 2, '2023-08-20 00:47:23', '2023-08-20 00:47:23'),
(29, 11, 1, '2023-08-20 11:28:51', '2023-08-20 11:28:51'),
(30, 8, 1, '2023-08-20 11:45:42', '2023-08-20 11:45:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id` bigint UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_order` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id`, `payment_date`, `method`, `receipt`, `id_order`, `created_at`, `updated_at`) VALUES
(1, '2023-08-20', 'tf', 'tf.jpg', 27, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `stock`, `desc`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'Vista Tote-Slingbag', 145000, 45, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 1, '2023-07-21 14:57:01', '2023-08-20 00:47:23'),
(2, 'Jiro Tote-Slingbag', 75000, 37, '', 1, '2023-07-21 14:57:01', '2023-08-20 11:45:42'),
(3, 'Wacko Tote-Slingbag', 89500, 28, '', 1, '2023-07-21 15:00:42', NULL),
(4, 'Nobu Tote-Slingbag', 95000, 35, '', 1, '2023-07-21 15:00:42', NULL),
(5, 'Ziggy Tote-Backpack', 125000, 76, '', 2, '2023-07-21 15:03:46', '2023-07-24 22:45:21'),
(6, 'Ursa Tote-Backpack', 143000, 40, '', 2, '2023-07-21 15:03:46', '2023-08-20 11:28:52'),
(7, 'Sunday Slingbag', 85000, 60, '', 3, '2023-07-21 15:06:16', NULL),
(8, 'Saturday Slingbag', 95000, 37, '', 3, '2023-07-21 15:06:16', NULL),
(9, 'Otter Slingbag', 89500, 54, '', 3, '2023-07-21 15:07:55', NULL),
(10, 'PIXY Phone Wallet', 69000, 46, '', 4, '2023-07-21 15:08:51', NULL),
(11, 'LEVY Sling Pouch', 69000, 26, '', 4, '2023-07-21 15:08:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category`
--

CREATE TABLE `product_category` (
  `id` bigint UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_category`
--

INSERT INTO `product_category` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Tote-Sling Bag', NULL, NULL),
(2, 'Tote-Backpack', NULL, NULL),
(3, 'Sling Bag', NULL, NULL),
(4, 'Sling Pouch', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_pict`
--

CREATE TABLE `product_pict` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_product` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_pict`
--

INSERT INTO `product_pict` (`id`, `name`, `status`, `id_product`, `created_at`, `updated_at`) VALUES
(1, '/images/product/vista.webp', '1', 1, '2023-07-21 15:11:00', NULL),
(2, '/images/product/jiro.webp', '1', 2, '2023-07-21 16:00:31', NULL),
(3, '/images/product/wacko.webp', '1', 3, NULL, NULL),
(4, '/images/product/nobu.webp', '1', 4, '2023-07-21 16:02:02', NULL),
(5, '/images/product/ziggy.webp', '1', 5, NULL, NULL),
(6, '/images/product/tote-backpack.webp', '1', 6, NULL, NULL),
(7, '/images/product/vista2.webp', '0', 1, NULL, NULL),
(8, '/images/product/vista3.webp', '0', 1, NULL, NULL),
(9, '/images/product/wacko1.webp', '0', 3, NULL, NULL),
(10, '/images/product/jiro2.webp', '0', 2, NULL, NULL),
(11, '/images/product/nobu2.webp', '0', 4, NULL, NULL),
(12, '/images/product/ziggy2.webp', '0', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_type`
--

CREATE TABLE `product_type` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `id_product` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_type`
--

INSERT INTO `product_type` (`id`, `type`, `picture`, `stock`, `id_product`, `created_at`, `updated_at`) VALUES
(1, 'Black', '/images/product/vistablack.webp', 18, 1, NULL, '2023-07-24 22:20:15'),
(2, 'Brown', '/images/product/vistabrown.webp', 17, 1, NULL, '2023-08-20 00:47:23'),
(3, 'White', '/images/product/vistawhite.webp', 9, 1, NULL, '2023-07-24 15:03:39'),
(4, 'White', '/images/product/vista.webp', 10, 3, NULL, NULL),
(5, 'Brown', '/images/product/tote-slingbag.webp', 17, 3, NULL, '2023-07-24 22:49:19'),
(8, 'Black', '/images/product/jiroblack.webp', 18, 2, NULL, '2023-08-20 11:45:42'),
(9, 'Brown', '/images/product/jirobrown.webp', 20, 2, NULL, NULL),
(10, 'Army', '/images/product/ursaarmy.webp', 12, 6, NULL, '2023-07-24 22:20:15'),
(11, 'Mocca', '/images/product/tote-backpack.webp', 9, 6, NULL, '2023-08-20 11:28:51'),
(12, 'Army', '/images/product/nobuarmy.webp', 14, 4, NULL, '2023-07-24 22:45:21'),
(13, 'Brown', '/images/product/nobu.webp', 20, 4, NULL, NULL),
(14, 'Army', '/images/product/armyziggy.webp', 37, 5, NULL, '2023-07-24 22:45:21'),
(15, 'Black', '/images/product/blackziggy.webp', 40, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'testuser', 'testuser@gmail.com', NULL, '$2y$10$qM.Pc6scMM2qgQJqiTyiNOEOtADdUWG.5MHfBzB.odmF5KffQaA3W', NULL, '2023-07-18 06:41:02', '2023-07-18 06:41:02'),
(6, 'userr', 'userr@user.com', NULL, '$2y$10$s/PoLRRpFn4vBep00ITPFuNp/QuSTXN6dk.RP1Y.8XKiM2eMvdYO.', NULL, '2023-08-20 15:22:02', '2023-08-20 15:22:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_detail`
--

CREATE TABLE `user_detail` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_detail`
--

INSERT INTO `user_detail` (`id`, `name`, `address`, `phone`, `status`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Stephanie Chan', 'Jl. Anggur No.8 RT 2/ RW 1 Kel.Aur Kuning, Kec.Aur Birugo Tigo Baleh, Kota Bukittinggi, Provinsi Sumatera Barat', '085555895555', 'utama', 1, NULL, NULL),
(2, 'Yuyuk', 'Jl.Durian Runtuh, RT 6/ RW 3, Kabupaten Anggur Muda', '08555555', 'utama', 6, '2023-08-20 15:32:58', '2023-08-20 15:32:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `id` int NOT NULL,
  `voucher_code` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `discount` int NOT NULL,
  `status` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `voucher`
--

INSERT INTO `voucher` (`id`, `voucher_code`, `date`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GAJIAN', '2023-08-20', 10000, 'active', '2023-08-20 17:30:43', '2023-08-20 18:36:42'),
(2, 'AKHIRBULAN', '2023-08-20', 10000, 'inactive', '2023-08-20 17:30:43', '2023-08-20 18:45:26'),
(3, 'GAJIAN1', '2023-08-20', 10000, 'active', '2023-08-20 20:23:20', '2023-08-20 20:23:20'),
(4, 'GAJIAN08', '2023-08-20', 10000, 'active', '2023-08-20 20:23:20', '2023-08-20 20:23:20'),
(5, 'MERDEKA', '2023-08-20', 10000, 'active', '2023-08-20 20:23:20', '2023-08-20 20:23:20'),
(6, 'TUJUHBELAS', '2023-08-20', 10000, 'active', '2023-08-20 20:23:20', '2023-08-20 20:23:20'),
(7, 'AGUSTUSAN', '2023-08-20', 10000, 'active', '2023-08-20 20:23:20', '2023-08-20 20:23:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_product_type` (`id_product_type`,`id_user`),
  ADD KEY `cart_id_user_user_id` (`id_user`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id_user_user_id` (`id_user`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `order_detail_id_order_foreign` (`id_order`),
  ADD KEY `order_detail_id_product_type_foreign` (`id_product_type`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_id_order_foreign` (`id_order`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_category_foreign` (`id_category`);

--
-- Indeks untuk tabel `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_pict`
--
ALTER TABLE `product_pict`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_pict_id_product_foreign` (`id_product`);

--
-- Indeks untuk tabel `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_type_id_product_foreign` (`id_product`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indeks untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-user-detail` (`id_user`);

--
-- Indeks untuk tabel `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `product_pict`
--
ALTER TABLE `product_pict`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_id_product_type_foreign` FOREIGN KEY (`id_product_type`) REFERENCES `product_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_id_user_user_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_id_user_user_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_id_product_type_foreign` FOREIGN KEY (`id_product_type`) REFERENCES `product_type` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `product_category` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_pict`
--
ALTER TABLE `product_pict`
  ADD CONSTRAINT `product_pict_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_type`
--
ALTER TABLE `product_type`
  ADD CONSTRAINT `product_type_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user-user-detail` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
