-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Bulan Mei 2020 pada 11.21
-- Versi server: 5.7.24
-- Versi PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wkr_toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_02_29_163443_create_tbl_admin_table', 1),
(2, '2020_02_29_210358_create_tbl_category_table', 1),
(3, '2020_03_01_094248_create_manufacture_table', 1),
(4, '2020_03_02_064230_create_tbl_products_table', 1),
(5, '2020_03_03_045359_create_tbl_slider_table', 1),
(6, '2020_03_11_055339_create_tbl_customer_table', 1),
(7, '2020_03_11_123220_create_tbl_shipping_table', 1),
(8, '2020_04_06_192202_create_tbl_payment_table', 2),
(9, '2020_04_06_192342_create_tbl_order_table', 2),
(10, '2020_04_06_192408_create_tbl_order_details_table', 2),
(11, '2020_05_01_132123_create_tbl_contact_table', 3),
(12, '2020_05_02_030848_create_tbl_subcriber_table', 4),
(13, '2020_05_02_140342_create_tbl_setting_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'feyto81@gmail.com', 'ae01f89acf4425606ef9b2397c3ac83b', 'feyto', '085290042313', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(2, 'Pakaian anak-anak', 'pakaian anak-anak', 1, NULL, NULL),
(4, 'Peralatan rumah tangga', 'peralatan rumah tangga', 0, NULL, NULL),
(5, 'Handphone', 'handphone', 1, NULL, NULL),
(6, 'pakaian laki-laki', 'pakain laki-laki', 1, NULL, NULL),
(7, 'Laptop', 'laptop', 1, NULL, NULL),
(8, 'Tas', 'taas', 1, NULL, NULL),
(9, 'ebook', 'ebook', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'akbar', 'akbar@gmail.com', 'apresiasi', 'oke bagus desainnya', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `password`, `mobile_number`, `created_at`, `updated_at`) VALUES
(1, 'feyto', 'feyto81@gmail.com', 'ae01f89acf4425606ef9b2397c3ac83b', '086555555', NULL, NULL),
(3, 'kiya', 'kiya@gmail.com', '2d1e5d09fb2dfd2137c72f81e3ddab74', '0883434', NULL, NULL),
(4, 'joko', 'joko@gmail.com', '9ba0009aa81e794e628a04b51eaf7d7f', '083743742', NULL, NULL),
(5, 'wikrama', 'wikrama@gmail.com', '5e60d7d48ad073cb10b95fec5ae51887', '0872635232', NULL, NULL),
(6, 'coba', 'coba@gmail.com', 'coba', '084384374374', NULL, NULL),
(7, 'buku', 'buku@gmail.com', 'buku', '083772636623', NULL, NULL),
(8, 'oke', 'oke@gmail.com', 'oke', '082323232', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_manufacture`
--

CREATE TABLE `tbl_manufacture` (
  `manufacture_id` bigint(20) UNSIGNED NOT NULL,
  `manufacture_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_manufacture`
--

INSERT INTO `tbl_manufacture` (`manufacture_id`, `manufacture_name`, `manufacture_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(3, 'Asus ROG', 'asus manufacture', 1, NULL, NULL),
(4, 'Adidas', 'Kaos tahan banting be like', 1, NULL, NULL),
(5, 'ngeteh', 'sasa', 0, NULL, NULL),
(6, 'kaos', 'Kaos Be like', 1, NULL, NULL),
(7, 'Vivo', 'vivo be like', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_payment` varchar(123) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `product_short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `category_id`, `manufacture_id`, `product_short_description`, `product_long_description`, `product_price`, `product_image`, `product_size`, `product_color`, `publication_status`, `created_at`, `updated_at`) VALUES
(3, 'vivo', 3, 1, 'samsung', 'samsung', '200000.00', 'image/ZcRIU0ZPrQ.jpg', '20 inc', 'white', 1, NULL, NULL),
(5, 'Laptop Asus Rog', 7, 3, 'Spek tinggi', '-Ram 8 GB\r\n-SSD 512 GBNvidia\r\n-USB 3.0\r\n-Keyboard Backlit', '1000000', 'image/ZnfvrI0qU1.jpg', '2 KG', 'Black', 1, NULL, NULL),
(6, 'Kaos', 6, 4, 'Bahan Bagus', 'Murah sekali', '200000', 'image/5hJMFKoAsu.jpg', '20 inc', 'merah', 1, NULL, NULL),
(7, 'vivo 1812', 5, 7, 'Filling good', 'filling good', '2000000', 'image/UcjX4ZtMPU.jpg', '20 inc', 'Purple', 1, NULL, NULL),
(8, 'Tas ransel', 8, 4, '-Bahan lembut\r\n-Anti air\r\n-dll', '-Merupakan produk lokal', '200000', 'image/iGXR03tX7f.jpg', '1 kg', 'black', 1, NULL, NULL),
(9, 'Kaos Laravel', 6, 6, '-kaos bahan katun\r\n-soft', '-kaos bahan katun\r\n-soft', '100000', 'image/JDuhkNX9hP.jpg', 'XL', 'Black', 1, NULL, NULL),
(10, 'ebook fullstack vue', 9, 4, '-penjelasan bahasa indonesia\r\n-dijelaskan dari awal rinci', '-asli buatan anak bangsa\r\n-tutorial bahasa indonesia', '300000', 'image/IKJ3FKxX5J.jpg', '0,1 kg', 'black', 1, NULL, NULL),
(11, 'ebook laravel vue', 9, 4, '-penjelasan bahasa indonesia\r\n-terintegrasi payment gateway midtrans\r\n-terintegrasi raja onkir', 'dan lain lain', '240000', 'image/K38Ty5mY5L.jpg', '0,1 kg', 'pink', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(122) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_link` varchar(122) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_link` varchar(122) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whattapp` varchar(122) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whattapp_api` varchar(122) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rek_bri` varchar(122) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rek_bca` varchar(122) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ovo` varchar(122) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `title_admin`, `facebook_link`, `twitter_link`, `email_link`, `whattapp`, `whattapp_api`, `rek_bri`, `rek_bca`, `ovo`, `created_at`, `updated_at`) VALUES
(4, 'Dewangga Store', 'https://facebook.com/feyto_qbz', 'https://twitter.com/feyto_qbz', 'feyto81@gmail.com', '+6288228740010', 'https://api.whatsapp.com/send?phone=6281234567890&text=Saya%20tertarik%20untuk%20membeli%20produk%20ini%20segera', 'No rekening BRI 023843848 Atas Nama Subari', 'No rekening BCA 0284398493 Atas Nama Subari', '088228740010', '2020-05-04 10:35:19', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_mobile_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expedisi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(123) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(123) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(123) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa` varchar(123) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jalan` varchar(123) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(3, 'slider/MKKXG8PLXB.png', '1', NULL, NULL),
(4, 'slider/EET4i3xSrh.jpg', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_subcriber`
--

CREATE TABLE `tbl_subcriber` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_subcriber`
--

INSERT INTO `tbl_subcriber` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'feyto8@gmail.com', NULL, NULL),
(2, 'feytodewangga70854@gmail.com', '2020-05-01 20:17:10', NULL),
(3, 'feyto81@gmail.com', '2020-05-01 20:19:18', NULL),
(4, 'amaanchaudhary48@gmail.com', '2020-05-01 20:21:10', NULL),
(5, 'admin@gmail.coms', '2020-05-01 20:21:51', NULL),
(6, 'akbar@gmail.com', '2020-05-04 12:18:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  ADD PRIMARY KEY (`manufacture_id`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indeks untuk tabel `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indeks untuk tabel `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indeks untuk tabel `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indeks untuk tabel `tbl_subcriber`
--
ALTER TABLE `tbl_subcriber`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  MODIFY `manufacture_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_subcriber`
--
ALTER TABLE `tbl_subcriber`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
