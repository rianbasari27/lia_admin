-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 03:54 AM
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
(1, 'Hari Waluyo Marbun S.IP', '+6286979998481', 'Psr. Samanhudi No. 510, Batu 59983, Babel', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(2, 'Kayla Maida Uyainah', '+6287559044659', 'Jln. Katamso No. 887, Kendari 89174, Jabar', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(3, 'Eja Muni Gunarto', '+6284966736036', 'Gg. Gedebage Selatan No. 672, Sibolga 82432, Sulut', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(4, 'Farhunnisa Lili Purwanti', '+6282093049740', 'Jln. Jend. Sudirman No. 227, Jambi 67406, NTT', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(5, 'Rudi Iswahyudi', '+6285015297019', 'Ki. Ekonomi No. 592, Administrasi Jakarta Timur 27275, Kaltara', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(6, 'Mustika Siregar', '+6284562335744', 'Ds. Sugiyopranoto No. 545, Bitung 99008, NTB', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(7, 'Ade Puspita', '+6289303806494', 'Jln. Merdeka No. 21, Mojokerto 65116, DKI', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(8, 'Oni Yuniar', '+6280166512522', 'Ki. Muwardi No. 337, Tarakan 96189, Lampung', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(9, 'Melinda Utami', '+6283990924091', 'Psr. Untung Suropati No. 937, Surakarta 51707, Jatim', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(10, 'Anggabaya Opung Maheswara', '+6285683105838', 'Jln. Jamika No. 918, Madiun 63622, Sulbar', '2023-05-15 04:09:04', '2023-05-15 04:09:04');

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
(1, 'Tas', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(2, 'Koper', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(3, 'Sepatu', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(4, 'Sandal', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(5, 'Dompet', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(6, 'Vermak', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(7, 'Aksesoris', '2023-05-15 04:09:04', '2023-05-15 04:09:04');

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
(6, '2023_03_14_024504_create_reparasi_header_table', 1),
(7, '2023_03_14_024505_create_reparasi_detail_table', 1),
(8, '2023_03_14_031308_create_transaksi_masuk_table', 1),
(9, '2023_03_14_035033_create_pembelian_header_table', 1),
(10, '2023_03_14_035034_create_pembelian_detail_table', 1),
(11, '2023_05_13_030643_create_transaksi_keluar_header_table', 1),
(12, '2023_05_13_031115_create_transaksi_keluar_detail_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pembelian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sparepart_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_header`
--

CREATE TABLE `pembelian_header` (
  `kode_pembelian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `tempat_pembelian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(29, 'LIA-1', 2, 'sfesfesf', 1, 120000, '2023-05-19 02:40:16', '2023-05-19 02:40:16'),
(30, 'LIA-1', 3, 'aqdwdawd', 1, 50000, '2023-05-19 02:40:16', '2023-05-19 02:40:16'),
(31, 'LIA-2', 3, 'DWDadwad', 1, 100000, '2023-05-19 04:10:43', '2023-05-19 04:10:43'),
(32, 'LIA-2', 2, 'aaaaa', 1, 200000, '2023-05-19 04:10:43', '2023-05-19 04:10:43'),
(33, 'LIA-3', 1, 'adadwadaw', 1, 50000, '2023-05-19 04:29:42', '2023-05-19 04:29:42'),
(34, 'LIA-3', 5, 'adadddd', 1, 20000, '2023-05-19 04:29:42', '2023-05-19 04:29:42'),
(35, 'LIA-4', 5, 'kkkk', 1, 20000, '2023-05-19 08:54:28', '2023-05-19 08:54:28'),
(36, 'LIA-5', 1, 'asdadwwd', 1, 120000, '2023-05-19 23:36:53', '2023-05-19 23:36:53'),
(37, 'LIA-6', 2, 'adawdwd', 1, 200000, '2023-05-19 23:39:14', '2023-05-19 23:39:14'),
(38, 'LIA-7', 3, 'adadwadaw', 1, 100000, '2023-05-21 08:22:17', '2023-05-21 08:22:17'),
(39, 'LIA-8', 1, 'aaaaaa', 1, 200000, '2023-05-21 08:23:26', '2023-05-21 08:23:26');

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
('LIA-1', 3, '2023-05-19', 170000, 'Belum lunas', '2023-05-19 02:40:16', '2023-05-19 02:40:16'),
('LIA-2', 7, '2023-05-19', 300000, 'Lunas', '2023-05-19 04:10:43', '2023-05-21 08:20:16'),
('LIA-3', 8, '2023-05-19', 70000, 'Belum lunas', '2023-05-19 04:29:42', '2023-05-19 04:56:57'),
('LIA-4', 8, '2023-05-19', 20000, 'Lunas', '2023-05-19 08:54:28', '2023-05-19 08:54:28'),
('LIA-5', 10, '2023-05-20', 120000, 'Lunas', '2023-05-19 23:36:53', '2023-05-20 22:11:04'),
('LIA-6', 6, '2023-05-21', 200000, 'Lunas', '2023-05-19 23:39:14', '2023-05-20 06:36:03'),
('LIA-7', 2, '2023-05-21', 100000, 'Lunas', '2023-05-21 08:22:17', '2023-05-21 08:22:17'),
('LIA-8', 2, '2023-05-22', 200000, 'Belum lunas', '2023-05-21 08:23:26', '2023-05-21 08:23:26');

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

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`id`, `nama_sparepart`, `stok`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 'Resleting', 11, 'Pcs', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(2, 'Perekat', 68, 'Meter', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(3, 'Bahan imitasi', 94, 'Dus', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(4, 'Roda koper', 59, 'Kg', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(5, 'Gagang koper', 39, 'Lusin', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(6, 'Sol sepatu', 32, 'Meter', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(7, 'Benang jahit', 28, 'Meter', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(8, 'Kain katun', 29, 'Pcs', '2023-05-15 04:09:04', '2023-05-15 04:09:04');

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

--
-- Dumping data for table `transaksi_keluar_detail`
--

INSERT INTO `transaksi_keluar_detail` (`id`, `kode_transaksi`, `tujuan_transaksi`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'TK-1', 'Pelunasan', 375000, NULL, '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(4, 'TK-2', 'Pembelian haaaaaa', 120000, NULL, '2023-05-15 08:08:20', '2023-05-15 08:08:20'),
(5, 'TK-2', 'Pembelian hiiiiiiiii', 450000, NULL, '2023-05-15 08:08:20', '2023-05-15 08:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_keluar_header`
--

CREATE TABLE `transaksi_keluar_header` (
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `transaksi_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_keluar_header`
--

INSERT INTO `transaksi_keluar_header` (`kode_transaksi`, `tanggal`, `transaksi_tujuan`, `total`, `created_at`, `updated_at`) VALUES
('TK-1', '2023-05-15', 'Toko Indah Lestari', '353000', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
('TK-2', '2023-05-15', 'PT AAAH', '570000', '2023-05-15 08:08:20', '2023-05-15 08:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_masuk`
--

CREATE TABLE `transaksi_masuk` (
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_customer_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `transaksi_masuk` (`kode_transaksi`, `nama_customer_id`, `kode_reparasi`, `tanggal`, `tujuan_pembayaran`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
('TM-1', 3, 'LIA-1', '2023-05-19', 'Uang muka', 100000, NULL, '2023-05-19 02:40:16', '2023-05-19 02:40:16'),
('TM-2', 7, 'LIA-2', '2023-05-19', 'Uang muka', 100000, NULL, '2023-05-19 04:10:43', '2023-05-19 04:10:43'),
('TM-3', 8, 'LIA-4', '2023-05-19', 'Pelunasan', 20000, NULL, '2023-05-19 08:54:28', '2023-05-19 08:54:28'),
('TM-4', 6, 'LIA-6', '2023-05-21', 'Pelunasan', 200000, NULL, '2023-05-20 06:36:03', '2023-05-20 22:10:02'),
('TM-5', 10, 'LIA-5', '2023-05-20', 'Pelunasan', 120000, NULL, '2023-05-20 22:11:04', '2023-05-20 22:11:04'),
('TM-6', 7, 'LIA-2', '2023-05-21', 'Pelunasan', 200000, NULL, '2023-05-21 08:20:16', '2023-05-21 08:20:16'),
('TM-7', 2, 'LIA-7', '2023-05-21', 'Pelunasan', 100000, NULL, '2023-05-21 08:22:17', '2023-05-21 08:22:17'),
('TM-8', 2, 'LIA-8', '2023-05-22', 'Uang muka', 100000, NULL, '2023-05-21 08:23:26', '2023-05-21 08:23:26');

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
(1, 'Estelle Sawayn', 'Admin', 'admin', '$2y$10$toN2vlFZANdkHe4VyxpY1eOdVxvmYx3nQd8Ov7/gzgHXD5u76HMXq', '2023-05-15 04:09:04', '2023-05-15 04:09:04'),
(2, 'Hugh Bartoletti', 'Pimpinan', 'pimpinan', '$2y$10$Bos3MMrB4N.w.TaOODKeN.ZrpBtwF.XE9vSISkdF3kYdL1.dfweaC', '2023-05-15 04:09:04', '2023-05-15 04:09:04');

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
  ADD KEY `pembelian_detail_nama_sparepart_id_foreign` (`nama_sparepart_id`);

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
-- Indexes for table `transaksi_keluar_detail`
--
ALTER TABLE `transaksi_keluar_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_keluar_header`
--
ALTER TABLE `transaksi_keluar_header`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `transaksi_masuk_nama_customer_id_foreign` (`nama_customer_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reparasi_detail`
--
ALTER TABLE `reparasi_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi_keluar_detail`
--
ALTER TABLE `transaksi_keluar_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `pembelian_detail_nama_sparepart_id_foreign` FOREIGN KEY (`nama_sparepart_id`) REFERENCES `sparepart` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reparasi_detail`
--
ALTER TABLE `reparasi_detail`
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
  ADD CONSTRAINT `transaksi_masuk_nama_customer_id_foreign` FOREIGN KEY (`nama_customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
