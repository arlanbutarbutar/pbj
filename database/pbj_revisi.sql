-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2023 pada 01.09
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbj`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `kode_keluar` int(11) NOT NULL,
  `kode_stok` int(11) NOT NULL,
  `jumlah_keluar` varchar(25) NOT NULL,
  `pengguna` enum('Biro Umum','Biro Hubungan Masyarakat','Biro Hukum','Biro Kerjasama','Biro Kesejahteraan Rakyat','Biro Organisasi','Biro Pemerintahan','Biro Pengadaan Barang dan Jasa','Biro Perekonomian') NOT NULL,
  `tgl_keluar` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`kode_keluar`, `kode_stok`, `jumlah_keluar`, `pengguna`, `tgl_keluar`, `created_at`, `updated_at`) VALUES
(65, 87, '5', 'Biro Hubungan Masyarakat', '2023-10-16', '2023-11-01 11:54:38', '2023-11-01 11:54:38'),
(66, 89, '10', 'Biro Kerjasama', '2023-10-17', '2023-11-01 11:54:38', '2023-11-01 11:54:38'),
(67, 90, '5', 'Biro Hukum', '2002-12-05', '2023-11-01 11:54:38', '2023-11-01 11:54:38'),
(68, 91, '2', 'Biro Umum', '2023-11-03', '2023-11-03 07:28:16', '2023-11-03 07:28:16'),
(69, 91, '5', 'Biro Hubungan Masyarakat', '2023-11-03', '2023-11-03 07:28:34', '2023-11-03 07:28:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `kode_barang` int(11) NOT NULL,
  `kode_stok` int(11) NOT NULL,
  `jumlah_barang` varchar(25) NOT NULL,
  `thn_produksi` varchar(25) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`kode_barang`, `kode_stok`, `jumlah_barang`, `thn_produksi`, `tgl_masuk`, `created_at`, `updated_at`) VALUES
(116, 86, '10', '2023', '2023-10-09', '2023-11-01 11:55:00', '2023-11-01 11:55:00'),
(123, 86, '5', '2023', '2023-10-12', '2023-11-01 11:55:00', '2023-11-01 11:55:00'),
(125, 89, '40', '2023', '2023-10-17', '2023-11-01 11:55:00', '2023-11-01 11:55:00'),
(126, 91, '10', '2020', '2002-10-10', '2023-11-01 11:55:00', '2023-11-01 11:55:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `kode_login` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`kode_login`, `email`, `password`, `level`) VALUES
(2, 'admin@gmail.com', '1', 'Admin'),
(3, 'pimpinan@gmail.com', '1', 'Pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_barang`
--

CREATE TABLE `stock_barang` (
  `kode_stok` int(11) NOT NULL,
  `jumlah_seluruh` varchar(25) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `image` varchar(99) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stock_barang`
--

INSERT INTO `stock_barang` (`kode_stok`, `jumlah_seluruh`, `nama_barang`, `jenis`, `satuan`, `image`, `created_at`, `updated_at`) VALUES
(89, '50', 'Komputer Acer Aspira', 'Barang Jangka Panjang', 'Unit', '09a9ed81270d725431981c862bdf5d63.png', '2023-11-01 11:55:21', '2023-11-01 11:55:21'),
(90, '5', 'Printer Canon ', 'Barang Jangka Panjang', 'Unit', 'c86ba56d6a259325a4bb5e54ce7bbd4f.png', '2023-11-01 11:55:21', '2023-11-01 11:55:21'),
(91, '18', 'Belpoin', 'Barang Habis Pakai', 'Pack', 'f076ccf078a0b4d5a9c11b219fdee8ce.png', '2023-11-01 11:55:21', '2023-11-01 11:55:21'),
(96, '5', 'Penjepit Kertas', 'Barang Jangka Panjang', 'Pack', 'a49390088d37853a328c891d11448a1a.png', '2023-11-01 11:55:21', '2023-11-01 11:55:21'),
(100, '5', 'Meja Kantor', 'Barang Jangka Panjang', 'Unit', 'f19c54c9c8095148be4a959688b23948.png', '2023-11-01 11:55:21', '2023-11-01 11:55:21'),
(101, '10', 'Map', 'Barang Habis Pakai', 'Dos', '9f039457556bd47bda6a8eef0f1afd3e.png', '2023-11-01 11:55:21', '2023-11-01 11:55:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tracking`
--

CREATE TABLE `tracking` (
  `id_tracking` int(11) NOT NULL,
  `id_stock` int(11) NOT NULL,
  `id_keluar` int(11) NOT NULL,
  `tgl_tracking` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `id_stock`, `id_keluar`, `tgl_tracking`) VALUES
(1, 91, 68, '2023-11-03 07:28:16'),
(2, 91, 69, '2023-11-03 07:28:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`kode_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`kode_login`);

--
-- Indeks untuk tabel `stock_barang`
--
ALTER TABLE `stock_barang`
  ADD PRIMARY KEY (`kode_stok`);

--
-- Indeks untuk tabel `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id_tracking`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `kode_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `kode_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `stock_barang`
--
ALTER TABLE `stock_barang`
  MODIFY `kode_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
