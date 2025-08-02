-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 04:48 PM
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
-- Database: `si_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(10) NOT NULL,
  `kd_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `pemasok` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kd_barang`, `nama_barang`, `harga_barang`, `jenis_barang`, `satuan`, `pemasok`, `created_at`, `updated_at`) VALUES
(17, 'b-001', 'Kursi Kayu Jati', '500000', 'Kursi', 'Unit', 'PT Jati Sejahtera', '2024-07-04 23:58:55', '2024-07-04 23:58:55'),
(18, 'b-002', 'Meja Kayu Mahoni', '750000', 'Meja', 'Unit', 'CV Mahoni Makmur', '2024-07-04 23:58:55', '2024-07-04 23:58:55'),
(19, 'b-003', 'Lemari Kayu Jati', '1500000', 'Lemari', 'Unit', 'PT Jati Sejahtera', '2024-07-04 23:58:55', '2024-07-04 23:58:55'),
(20, 'b-004', 'Rak Buku Kayu Pinus', '300000', 'Rak', 'Unit', 'CV Pinus Abadi', '2024-07-04 23:58:55', '2024-07-04 23:58:55'),
(21, 'b-005', 'Tempat Tidur Kayu Mahoni', '2000000', 'Tempat Tidur', 'Unit', 'CV Mahoni Makmur', '2024-07-04 23:58:55', '2024-07-04 23:58:55'),
(22, 'b-006', 'Buffet Kayu Jati', '1000000', 'Buffet', 'Unit', 'PT Jati Sejahtera', '2024-07-04 23:58:55', '2024-07-04 23:58:55'),
(23, 'b-007', 'Meja Tamu Kayu Akasia', '600000', 'Meja', 'Unit', 'PT Akasia Jaya', '2024-07-04 23:58:55', '2024-07-04 23:58:55'),
(24, 'b-008', 'Kursi Tamu Kayu Sungkai', '700000', 'Kursi', 'Unit', 'CV Sungkai Indah', '2024-07-04 23:58:55', '2024-07-04 23:58:55'),
(25, 'b-009', 'Lemari Buku Kayu Pinus', '800000', 'Lemari', 'Unit', 'CV Pinus Abadi', '2024-07-04 23:58:55', '2024-07-04 23:58:55'),
(26, 'b-010', 'Nakas Kayu Jati', '400000', 'Nakas', 'Unit', 'PT Jati Sejahtera', '2024-07-04 23:58:55', '2024-07-04 23:58:55'),
(27, 'b-011', 'Meja Belajar Kayu Mahoni', '800000', 'Meja', 'Unit', 'CV Mahoni Makmur', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(28, 'b-012', 'Kursi Makan Kayu Jati', '450000', 'Kursi', 'Unit', 'PT Jati Sejahtera', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(29, 'b-013', 'Buffet TV Kayu Akasia', '1200000', 'Buffet', 'Unit', 'PT Akasia Jaya', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(30, 'b-014', 'Rak Dinding Kayu Pinus', '350000', 'Rak', 'Unit', 'CV Pinus Abadi', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(31, 'b-015', 'Lemari Pakaian Kayu Sungkai', '1600000', 'Lemari', 'Unit', 'CV Sungkai Indah', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(32, 'b-016', 'Meja Kerja Kayu Jati', '900000', 'Meja', 'Unit', 'PT Jati Sejahtera', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(33, 'b-017', 'Tempat Tidur Kayu Akasia', '2500000', 'Tempat Tidur', 'Unit', 'PT Akasia Jaya', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(34, 'b-018', 'Kursi Santai Kayu Mahoni', '550000', 'Kursi', 'Unit', 'CV Mahoni Makmur', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(35, 'b-019', 'Meja Rias Kayu Jati', '1100000', 'Meja', 'Unit', 'PT Jati Sejahtera', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(36, 'b-020', 'Nakas Kayu Mahoni', '450000', 'Nakas', 'Unit', 'CV Mahoni Makmur', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(37, 'b-021', 'Rak Sepatu Kayu Pinus', '400000', 'Rak', 'Unit', 'CV Pinus Abadi', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(38, 'b-022', 'Lemari Hias Kayu Jati', '1300000', 'Lemari', 'Unit', 'PT Jati Sejahtera', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(39, 'b-023', 'Buffet Kayu Mahoni', '1100000', 'Buffet', 'Unit', 'CV Mahoni Makmur', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(40, 'b-024', 'Meja Tulis Kayu Akasia', '700000', 'Meja', 'Unit', 'PT Akasia Jaya', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(41, 'b-025', 'Kursi Kerja Kayu Pinus', '500000', 'Kursi', 'Unit', 'CV Pinus Abadi', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(42, 'b-026', 'Lemari Dapur Kayu Sungkai', '1700000', 'Lemari', 'Unit', 'CV Sungkai Indah', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(43, 'b-027', 'Nakas Kayu Akasia', '450000', 'Nakas', 'Unit', 'PT Akasia Jaya', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(44, 'b-028', 'Meja Kopi Kayu Sungkai', '650000', 'Meja', 'Unit', 'CV Sungkai Indah', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(45, 'b-029', 'Kursi Teras Kayu Jati', '550000', 'Kursi', 'Unit', 'PT Jati Sejahtera', '2024-07-04 23:59:16', '2024-07-04 23:59:16'),
(46, 'b-030', 'Lemari TV Kayu Mahoni', '1400000', 'Lemari', 'Unit', 'CV Mahoni Makmur', '2024-07-04 23:59:16', '2024-07-04 23:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah_stok` int(10) NOT NULL,
  `restock_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `id_barang`, `jumlah_stok`, `restock_at`) VALUES
(44, 17, 10, '2024-07-06 08:14:13'),
(46, 18, 10, '2024-07-06 08:17:45'),
(47, 19, 10, '2024-07-06 08:17:54'),
(48, 20, 10, '2024-07-06 08:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `kd_pelanggan` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `no_telepon` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `kd_pelanggan`, `nama_pelanggan`, `alamat`, `kota`, `no_telepon`, `status`, `jk`, `created_at`, `updated_at`) VALUES
(1, 'P-001', 'Andi Wijaya', 'Jl. Merdeka No. 45', 'Jakarta', 62812345, 'Internal', 'Pria', '2024-06-30 08:57:37', '2024-06-30 08:57:37'),
(2, 'P-002', 'Budi Santoso', 'Jl. Sudirman No. 22', 'Bandung', 62812345, 'Eksternal', 'Pria', '2024-06-30 08:57:37', '2024-06-30 08:57:37'),
(3, 'P-003', 'Citra Dewi', 'Jl. Thamrin No. 10', 'Surabaya', 62812345, 'Internal', 'Wanita', '2024-06-30 08:57:37', '2024-06-30 08:57:37'),
(4, 'P-004', 'Dewi Lestari', 'Jl. Gajah Mada No. 5', 'Semarang', 62812345, 'Eksternal', 'Wanita', '2024-06-30 08:57:37', '2024-06-30 08:57:37'),
(5, 'P-005', 'Eko Susanto', 'Jl. Diponegoro No. 8', 'Yogyakarta', 62812345, 'Internal', 'Pria', '2024-06-30 08:57:37', '2024-06-30 08:57:37'),
(6, 'P-006', 'Rahma Aghnaita', ' Jl. Teuku Umar 30', ' Batang', 62812345, 'Internal', 'Wanita', '2024-07-01 15:24:19', '2024-07-01 15:24:19'),
(7, 'P-007', 'Galih Pratama', 'Jl. Gatot Subroto No. 30', 'Bandung', 62812345, 'Eksternal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(8, 'P-008', 'Hana Fitriani', 'Jl. Diponegoro No. 15', 'Surabaya', 62812345, 'Internal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(9, 'P-009', 'Indra Wijaya', 'Jl. Riau No. 18', 'Semarang', 62812345, 'Eksternal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(10, 'P-010', 'Joko Susilo', 'Jl. Pahlawan No. 6', 'Yogyakarta', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(11, 'P-011', 'Kartika Sari', 'Jl. Asia Afrika No. 25', 'Jakarta', 62812345, 'Eksternal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(12, 'P-012', 'Lukman Hakim', 'Jl. Kaliurang No. 11', 'Bandung', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(13, 'P-013', 'Mega Anggraeni', 'Jl. K.H. Ahmad Dahlan No. 7', 'Surabaya', 62812345, 'Eksternal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(14, 'P-014', 'Nanda Pratama', 'Jl. Dago No. 14', 'Semarang', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(15, 'P-015', 'Oktavia Nurfitri', 'Jl. Diponegoro No. 20', 'Yogyakarta', 62812345, 'Eksternal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(16, 'P-016', 'Pandu Wijaya', 'Jl. Cendrawasih No. 9', 'Jakarta', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(17, 'P-017', 'Qori Azizah', 'Jl. M.T. Haryono No. 21', 'Bandung', 62812345, 'Eksternal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(18, 'P-018', 'Rendi Saputra', 'Jl. Soekarno Hatta No. 16', 'Surabaya', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(19, 'P-019', 'Sinta Damayanti', 'Jl. Pahlawan No. 28', 'Semarang', 62812345, 'Eksternal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(20, 'P-020', 'Tono Susanto', 'Jl. Mangkubumi No. 17', 'Yogyakarta', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(21, 'P-021', 'Umar Abdullah', 'Jl. Proklamasi No. 19', 'Jakarta', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(22, 'P-022', 'Vina Puspita', 'Jl. Soekarno Hatta No. 23', 'Bandung', 62812345, 'Eksternal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(23, 'P-023', 'Wahyu Kusuma', 'Jl. Thamrin No. 29', 'Surabaya', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(24, 'P-024', 'Xena Putri', 'Jl. Riau No. 32', 'Semarang', 62812345, 'Eksternal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(25, 'P-025', 'Yoga Pratama', 'Jl. Diponegoro No. 37', 'Yogyakarta', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(26, 'P-026', 'Zara Indriani', 'Jl. Gatot Subroto No. 40', 'Jakarta', 62812345, 'Eksternal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(27, 'P-027', 'Andika Wijaya', 'Jl. Pahlawan No. 45', 'Bandung', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(28, 'P-028', 'Bunga Sari', 'Jl. Asia Afrika No. 50', 'Surabaya', 62812345, 'Eksternal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(29, 'P-029', 'Cahyo Nugroho', 'Jl. Kaliurang No. 55', 'Semarang', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(30, 'P-030', 'Dini Fitriani', 'Jl. Diponegoro No. 60', 'Yogyakarta', 62812345, 'Eksternal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(31, 'P-031', 'Eko Prasetyo', 'Jl. Merdeka No. 67', 'Jakarta', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(32, 'P-032', 'Fitri Amelia', 'Jl. Sudirman No. 70', 'Bandung', 62812345, 'Eksternal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(33, 'P-033', 'Galih Saputra', 'Jl. Thamrin No. 75', 'Surabaya', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(34, 'P-034', 'Hana Damayanti', 'Jl. Gajah Mada No. 80', 'Semarang', 62812345, 'Eksternal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(35, 'P-035', 'Indra Setiawan', 'Jl. Diponegoro No. 85', 'Yogyakarta', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(36, 'P-036', 'Jihan Pratiwi', 'Jl. Raya No. 90', 'Jakarta', 62812345, 'Eksternal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(37, 'P-037', 'Krisna Wijaya', 'Jl. Asia Afrika No. 95', 'Bandung', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(38, 'P-038', 'Laras Ayu', 'Jl. Kebon Sirih No. 100', 'Surabaya', 62812345, 'Eksternal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(39, 'P-039', 'Maulana Ibrahim', 'Jl. Pahlawan No. 105', 'Semarang', 62812345, 'Internal', 'Pria', '2024-07-02 02:00:00', '2024-07-02 02:00:00'),
(40, 'P-040', 'Nadia Fitria', 'Jl. Gatot Subroto No. 110', 'Yogyakarta', 62812345, 'Eksternal', 'Wanita', '2024-07-02 02:00:00', '2024-07-02 02:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(10) NOT NULL,
  `kd_penjualan` int(10) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `subtotal_harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `kasir` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `kd_penjualan`, `id_pelanggan`, `id_barang`, `subtotal_harga`, `total_harga`, `kasir`, `created_at`, `updated_at`) VALUES
(487, 1, 6, 17, 500000, 500000, 'Rahma', '2024-07-06 08:18:47', '2024-07-06 08:18:47'),
(488, 1, 6, 17, 500000, 500000, 'Rahma', '2024-07-06 08:18:47', '2024-07-06 08:18:47'),
(489, 1, 6, 18, 750000, 750000, 'Rahma', '2024-07-06 08:18:47', '2024-07-06 08:18:47'),
(490, 1, 6, 19, 1500000, 1500000, 'Rahma', '2024-07-06 08:18:47', '2024-07-06 08:18:47'),
(491, 1, 6, 20, 300000, 300000, 'Rahma', '2024-07-06 08:18:47', '2024-07-06 08:18:47'),
(492, 1, 6, 20, 300000, 300000, 'Rahma', '2024-07-06 08:18:47', '2024-07-06 08:18:47'),
(493, 1, 6, 20, 300000, 300000, 'Rahma', '2024-07-06 08:18:47', '2024-07-06 08:18:47'),
(494, 2, 38, 18, 750000, 750000, 'Rahma', '2024-07-06 08:21:02', '2024-07-06 08:21:02'),
(495, 2, 38, 18, 750000, 750000, 'Rahma', '2024-07-06 08:21:02', '2024-07-06 08:21:02'),
(496, 2, 38, 20, 300000, 300000, 'Rahma', '2024-07-06 08:21:02', '2024-07-06 08:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `inserted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `id_barang`, `jumlah_barang`, `inserted_at`) VALUES
(17, 17, 8, '2024-07-06 08:11:44'),
(18, 18, 7, '2024-07-06 08:11:44'),
(19, 19, 9, '2024-07-06 08:11:44'),
(20, 20, 6, '2024-07-06 08:11:44'),
(21, 21, 0, '2024-07-06 08:11:44'),
(22, 22, 0, '2024-07-06 08:11:44'),
(23, 23, 0, '2024-07-06 08:11:44'),
(24, 24, 0, '2024-07-06 08:11:44'),
(25, 25, 0, '2024-07-06 08:11:44'),
(26, 26, 0, '2024-07-06 08:11:44'),
(27, 27, 0, '2024-07-06 08:11:44'),
(28, 28, 0, '2024-07-06 08:11:44'),
(29, 29, 0, '2024-07-06 08:11:44'),
(30, 30, 0, '2024-07-06 08:11:44'),
(31, 31, 0, '2024-07-06 08:11:44'),
(32, 32, 0, '2024-07-06 08:11:44'),
(33, 33, 0, '2024-07-06 08:11:44'),
(34, 34, 0, '2024-07-06 08:11:44'),
(35, 35, 0, '2024-07-06 08:11:44'),
(36, 36, 0, '2024-07-06 08:11:44'),
(37, 37, 0, '2024-07-06 08:11:44'),
(38, 38, 0, '2024-07-06 08:11:44'),
(39, 39, 0, '2024-07-06 08:11:44'),
(40, 40, 0, '2024-07-06 08:11:44'),
(41, 41, 0, '2024-07-06 08:11:44'),
(42, 42, 0, '2024-07-06 08:11:44'),
(43, 43, 0, '2024-07-06 08:11:44'),
(44, 44, 0, '2024-07-06 08:11:44'),
(45, 45, 0, '2024-07-06 08:11:44'),
(46, 46, 0, '2024-07-06 08:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Admin','User') NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kasir', 'kasir@email.com', 'Admin', '12345', 12345, '2024-06-30 09:08:45', '2024-06-30 09:08:45'),
(2, 'Komisaris', 'Komisaris@email.com', 'Admin', '12345', 12345, '2024-06-30 09:08:45', '2024-06-30 09:08:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=497;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
