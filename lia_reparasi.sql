-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 07:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lia_reparasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama_customer`, `no_telepon`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Bahuraksa Dabukke M.Pd', '+6286449953935', 'Ki. Reksoninten No. 892, Samarinda 32754, NTT', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(2, 'Zizi Gabriella Nasyiah', '+6283245524376', 'Ds. Bak Air No. 734, Tangerang 59474, Jateng', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(3, 'Gamani Najmudin', '+6286264215905', 'Ds. Abdul Muis No. 954, Yogyakarta 90342, Lampung', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(4, 'Ibrani Napitupulu', '+6280168953765', 'Jln. Baing No. 222, Palu 93504, Sumbar', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(5, 'Legawa Tugiman Sihombing M.Kom.', '+6284961929516', 'Ki. Cikapayang No. 955, Serang 24652, Lampung', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(6, 'Samiah Astuti', '+6284774299409', 'Ds. Reksoninten No. 169, Pasuruan 94522, Sulteng', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(7, 'Eli Hartati', '+6288971532546', 'Ds. Honggowongso No. 417, Payakumbuh 67697, Jambi', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(8, 'Ratna Yuniar', '+6288717791052', 'Ds. Jamika No. 655, Tangerang 90729, Sumsel', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(9, 'Arsipatra Hutapea S.Ked', '+6283732866708', 'Jln. Sampangan No. 310, Pontianak 81487, Kaltim', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(10, 'Najam Halim S.E.', '+6286358171677', 'Ds. Gajah No. 435, Semarang 73507, NTT', '2023-05-24 19:02:32', '2023-05-24 19:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `nama_barang`, `created_at`, `updated_at`) VALUES
(1, 'Tas', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(2, 'Koper', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(3, 'Sepatu', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(4, 'Sandal', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(5, 'Dompet', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(6, 'Vermak', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(7, 'Aksesoris', '2023-05-24 19:02:32', '2023-05-24 19:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_03_14_014546_create_jenis_barang_table', 1),
(4, '2023_03_14_024209_create_sparepart_table', 1),
(5, '2023_03_14_024402_create_customer_table', 1),
(6, '2023_03_14_024410_create_supplier_table', 1),
(7, '2023_03_14_024504_create_reparasi_header_table', 1),
(8, '2023_03_14_024505_create_reparasi_detail_table', 1),
(9, '2023_03_14_031308_create_transaksi_masuk_table', 1),
(10, '2023_03_14_035033_create_pembelian_header_table', 1),
(11, '2023_03_14_035034_create_pembelian_detail_table', 1),
(12, '2023_05_13_030643_create_transaksi_keluar_table', 1),
(13, '2023_05_13_031115_create_transaksi_keluar_detail_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pembelian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id`, `kode_pembelian`, `nama_barang`, `jumlah`, `satuan`, `biaya`, `created_at`, `updated_at`) VALUES
(15, 'PB-2', 'Resleting', 1, 'PCS', 1111, '2023-05-25 00:24:40', '2023-05-25 00:24:40'),
(17, 'PB-4', 'Bahan imitasi', 2, 'Meter', 55000, '2023-05-25 02:12:51', '2023-05-25 02:12:51'),
(18, 'PB-4', 'Bahan katun', 3, 'Meter', 65000, '2023-05-25 02:12:51', '2023-05-25 02:12:51'),
(20, 'PB-5', 'Tali Tas', 4, 'PCS', 75000, '2023-05-25 07:22:29', '2023-05-25 07:22:29'),
(23, 'PB-3', 'Resleting', 1, 'Dus', 120000, '2023-05-26 21:06:00', '2023-05-26 21:06:00'),
(24, 'PB-1', 'Resleting', 5, 'Meter', 50000, '2023-05-26 21:06:33', '2023-05-26 21:06:33'),
(25, 'PB-1', 'Benang', 5, 'PCS', 30000, '2023-05-26 21:06:33', '2023-05-26 21:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_header`
--

CREATE TABLE `pembelian_header` (
  `kode_pembelian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supplier_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian_header`
--

INSERT INTO `pembelian_header` (`kode_pembelian`, `nama_supplier_id`, `tanggal`, `total`, `created_at`, `updated_at`) VALUES
('PB-1', 1, '2023-05-27', 80000, '2023-05-24 22:46:07', '2023-05-26 21:06:33'),
('PB-2', 1, '2023-05-25', 1111, '2023-05-25 00:24:40', '2023-05-25 00:24:40'),
('PB-3', 2, '2023-05-26', 120000, '2023-05-25 00:26:29', '2023-05-26 21:06:00'),
('PB-4', 2, '2023-05-25', 120000, '2023-05-25 02:12:51', '2023-05-25 02:12:51'),
('PB-5', 3, '2023-05-24', 75000, '2023-05-25 02:13:47', '2023-05-25 07:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reparasi_detail`
--

CREATE TABLE `reparasi_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_reparasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang_id` bigint(20) UNSIGNED NOT NULL,
  `kerusakan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reparasi_detail`
--

INSERT INTO `reparasi_detail` (`id`, `kode_reparasi`, `nama_barang_id`, `kerusakan`, `jumlah`, `biaya`, `created_at`, `updated_at`) VALUES
(1, 'LIA-1', 1, 'aaaaaaaaaa', 1, 50000, '2023-05-24 19:02:52', '2023-05-24 19:02:52'),
(4, 'LIA-2', 1, 'aaaaaa', 1, 100000, '2023-05-25 21:03:51', '2023-05-25 21:03:51'),
(5, 'LIA-2', 3, 'awddwd', 1, 50000, '2023-05-25 21:03:51', '2023-05-25 21:03:51'),
(6, 'LIA-4', 3, 'asdadwd', 1, 120000, '2023-05-26 20:05:00', '2023-05-26 20:05:00'),
(7, 'LIA-3', 2, 'awddwd', 1, 50000, '2023-05-26 20:08:03', '2023-05-26 20:08:03'),
(8, 'LIA-5', 2, 'aaaaaaaaaaaaaaa', 1, 100000, '2023-05-26 21:38:40', '2023-05-26 21:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `reparasi_header`
--

CREATE TABLE `reparasi_header` (
  `kode_reparasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_customer_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reparasi_header`
--

INSERT INTO `reparasi_header` (`kode_reparasi`, `nama_customer_id`, `tanggal`, `total`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
('LIA-1', 1, '2023-05-25', 50000, 'Lunas', '2023-05-24 19:02:52', '2023-05-26 20:09:05'),
('LIA-2', 3, '2023-05-25', 150000, 'Belum lunas', '2023-05-24 19:05:30', '2023-05-25 21:03:51'),
('LIA-3', 4, '2023-05-26', 50000, 'Lunas', '2023-05-24 19:07:14', '2023-05-26 20:09:20'),
('LIA-4', 5, '2023-05-27', 120000, 'Lunas', '2023-05-26 20:05:00', '2023-05-26 20:05:00'),
('LIA-5', 10, '2023-05-28', 100000, 'Belum lunas', '2023-05-26 21:38:40', '2023-05-26 21:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_sparepart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat`, `no_telepon`, `created_at`, `updated_at`) VALUES
(1, 'Toko Hana Tania Laksita S.Sos', 'Ki. B.Agam Dlm No. 755, Pagar Alam 49227, Gorontalo', '0205 6862 3078', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(2, 'PT Elma Astuti', 'Psr. Pasirkoja No. 610, Pagar Alam 73912, Gorontalo', '(+62) 819 6259 7402', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(3, 'Toko Limar Slamet Mandala S.Kom', 'Jln. Sampangan No. 226, Tomohon 61842, Sumbar', '(+62) 676 7660 3500', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(4, 'PT Candra Manullang M.Farm', 'Psr. Rajawali Barat No. 960, Mojokerto 52100, Sultra', '0485 8220 277', '2023-05-24 19:02:32', '2023-05-24 19:02:32'),
(5, 'PT Elvin Waluyo Najmudin', 'Ki. Ters. Pasir Koja No. 492, Pariaman 83181, Jateng', '0534 4469 4650', '2023-05-24 19:02:32', '2023-05-24 19:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_keluar`
--

CREATE TABLE `transaksi_keluar` (
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pembelian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembayaran_lain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `tujuan_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_keluar`
--

INSERT INTO `transaksi_keluar` (`kode_transaksi`, `kode_pembelian`, `pembayaran_lain`, `tanggal`, `tujuan_transaksi`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
('TK-1', 'PB-2', NULL, '2023-05-25', 'Pembaaaaaaaa', '20000', NULL, '2023-05-25 09:11:15', '2023-05-25 09:11:15'),
('TK-3', 'PB-4', NULL, '2023-05-26', 'aaaaaaaa', '100000', NULL, '2023-05-25 18:24:22', '2023-05-25 18:24:22'),
('TK-4', '', 'Pembayaran listrik', '2023-05-27', 'Pembayaran tagihan listrik toko', '100000', NULL, '2023-05-26 22:20:53', '2023-05-26 22:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_keluar_detail`
--

CREATE TABLE `transaksi_keluar_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_masuk`
--

CREATE TABLE `transaksi_masuk` (
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_reparasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `tujuan_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_masuk`
--

INSERT INTO `transaksi_masuk` (`kode_transaksi`, `kode_reparasi`, `tanggal`, `tujuan_pembayaran`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
('TM-2', 'LIA-2', '2023-05-25', 'Pelunasan', 100000, NULL, '2023-05-25 07:39:54', '2023-05-25 07:47:34'),
('TM-3', 'LIA-4', '2023-05-27', 'Pelunasan', 120000, NULL, '2023-05-26 20:05:00', '2023-05-26 20:05:00'),
('TM-4', 'LIA-1', '2023-05-27', 'Pelunasan', 50000, NULL, '2023-05-26 20:09:05', '2023-05-26 20:09:05'),
('TM-5', 'LIA-3', '2023-05-27', 'Pelunasan', 50000, NULL, '2023-05-26 20:09:20', '2023-05-26 20:09:20'),
('TM-6', 'LIA-5', '2023-05-28', 'Uang muka', 50000, NULL, '2023-05-26 21:38:40', '2023-05-26 21:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `jabatan`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Jennie Osinski II', 'Admin', 'admin', '$2y$10$mK.2hYPUecPQieCJbUYL4u6jJneHCB.LviYAoTd9G6pSLW6dsgidy', '2023-05-24 19:02:31', '2023-05-24 19:02:31'),
(2, 'Jacinto O\'Kon', 'Pimpinan', 'admin', '$2y$10$Yc4CPnc1GDsC959xLL3Lf.k9LQpj2crXtI.P2PmS0.UdASTCB2b3e', '2023-05-24 19:02:31', '2023-05-24 19:02:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_detail_kode_pembelian_foreign` (`kode_pembelian`);

--
-- Indexes for table `pembelian_header`
--
ALTER TABLE `pembelian_header`
  ADD PRIMARY KEY (`kode_pembelian`),
  ADD KEY `pembelian_header_nama_supplier_id_foreign` (`nama_supplier_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reparasi_detail`
--
ALTER TABLE `reparasi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reparasi_detail_kode_reparasi_foreign` (`kode_reparasi`),
  ADD KEY `reparasi_detail_nama_barang_id_foreign` (`nama_barang_id`);

--
-- Indexes for table `reparasi_header`
--
ALTER TABLE `reparasi_header`
  ADD PRIMARY KEY (`kode_reparasi`),
  ADD KEY `reparasi_header_nama_customer_id_foreign` (`nama_customer_id`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `transaksi_keluar_detail`
--
ALTER TABLE `transaksi_keluar_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `transaksi_masuk_kode_reparasi_foreign` (`kode_reparasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reparasi_detail`
--
ALTER TABLE `reparasi_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi_keluar_detail`
--
ALTER TABLE `transaksi_keluar_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD CONSTRAINT `pembelian_detail_kode_pembelian_foreign` FOREIGN KEY (`kode_pembelian`) REFERENCES `pembelian_header` (`kode_pembelian`) ON DELETE CASCADE;

--
-- Constraints for table `pembelian_header`
--
ALTER TABLE `pembelian_header`
  ADD CONSTRAINT `pembelian_header_nama_supplier_id_foreign` FOREIGN KEY (`nama_supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reparasi_detail`
--
ALTER TABLE `reparasi_detail`
  ADD CONSTRAINT `reparasi_detail_kode_reparasi_foreign` FOREIGN KEY (`kode_reparasi`) REFERENCES `reparasi_header` (`kode_reparasi`) ON DELETE CASCADE,
  ADD CONSTRAINT `reparasi_detail_nama_barang_id_foreign` FOREIGN KEY (`nama_barang_id`) REFERENCES `jenis_barang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reparasi_header`
--
ALTER TABLE `reparasi_header`
  ADD CONSTRAINT `reparasi_header_nama_customer_id_foreign` FOREIGN KEY (`nama_customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  ADD CONSTRAINT `transaksi_masuk_kode_reparasi_foreign` FOREIGN KEY (`kode_reparasi`) REFERENCES `reparasi_header` (`kode_reparasi`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
