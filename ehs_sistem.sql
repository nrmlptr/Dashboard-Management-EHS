-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2023 pada 06.22
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehs_sistem`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(11) NOT NULL,
  `kd_berkas` varchar(255) NOT NULL,
  `no_berkas` varchar(255) NOT NULL,
  `judul_berkas` varchar(255) NOT NULL,
  `nm_berkas` varchar(255) NOT NULL,
  `keterangan_berkas` varchar(255) NOT NULL,
  `tipe_berkas` varchar(100) NOT NULL,
  `ukuran_berkas` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `kd_berkas`, `no_berkas`, `judul_berkas`, `nm_berkas`, `keterangan_berkas`, `tipe_berkas`, `ukuran_berkas`, `created_at`, `updated_at`) VALUES
(1, 'BRK00001', '', '', 'd105d8b59f5b45a91caf7d77cd74906f.pdf', 'tes upload pdf', '.pdf', 25.85, '2023-02-14 03:17:04', NULL),
(2, 'BRK00002', '', 'TES UPLOAD LAGI', '06621dfefd5f7d8073f735a48e97c58f.pdf', 'tes upload 2', '.pdf', 126.8, '2023-02-14 03:25:44', NULL),
(3, 'BRK00003', '', 'Document IKS', 'f6b82ad0e4f3b132ced2e34e2b2f6053.pdf', 'TES UPLOAD 3', '.pdf', 25.97, '2023-02-14 04:25:18', NULL),
(4, 'DOC00004', '', 'cek tombol upload', '0fe21210cf3c2a2cb6b3e86be86b54b8.docx', 'cekcek', '.docx', 15.55, '2023-02-14 04:36:52', NULL),
(5, 'DOC00005', '', 'tes excel dokumen', '4e07b0522c6aa6824ea762c3a8f04512.xlsx', 'cek klo doc excel', '.xlsx', 18.17, '2023-02-14 04:51:02', NULL),
(6, 'DOC00006', '', 'Cek nomor dokumen', '2db7441f2e901fa8ffd50e7b1f161201.pdf', 'Tes dokumen', '.pdf', 820.71, '2023-02-14 06:26:45', NULL),
(7, 'DOC00007', 'SOP-01-231122', 'Cek nomor dokumen2', 'dc4266e99451e6b340f048b6217cc013.pdf', 'cek nodok', '.pdf', 530.94, '2023-02-14 06:27:44', NULL),
(8, 'DOC00008', 'SOP-02-210320', 'CEKNAMA', 'IKS_System_-_POV_PIC_PT_CBI.pdf', 'CEKCEKCEK', '.pdf', 894.44, '2023-02-14 06:45:38', NULL),
(9, 'DOC00009', 'SOP-22-2121212', 'Cek tambah type m4', 'Formatif_2_RPL_-_Nuramalia_Putri_(222101286).pdf', 'cek mp4 ', '.pdf', 228.48, '2023-02-15 06:32:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nm_karyawan` varchar(255) NOT NULL,
  `foto_karyawan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nm_karyawan`, `foto_karyawan`, `created_at`, `updated_at`) VALUES
(1, '1646', 'Akhmadi Shofiya Alrizqi', 'dosen5.png', '2023-02-10 03:39:38', '2023-02-14 01:59:10'),
(2, '3913', 'Ihan Pratama', '', '2023-02-10 03:39:38', NULL),
(3, '2269', 'Hasan Rudi', '', '2023-02-10 03:39:38', NULL),
(4, '0583', 'Bambang Sarjono', '', '2023-02-10 03:39:38', NULL),
(5, '3204', 'Muhamad Fiqri Kurnia', '', '2023-02-10 03:40:18', NULL),
(6, '1041', 'Subkhan', '', '2023-02-10 03:40:18', NULL),
(7, '2819', 'Nonik Suhaya Cahaya Purnamasari', 'hijabers4.png', '2023-02-10 03:42:13', '2023-02-14 01:33:01'),
(8, '0731', 'Dedi Ruhimat', 'dosen22.png', '2023-02-10 03:42:13', '2023-02-14 01:59:25'),
(11, '2121', 'Ahmad Zaelani', 'dosen6.png', '2023-03-23 08:53:55', '2023-03-23 08:54:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `material` varchar(255) NOT NULL,
  `detail_material` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jml_stok` varchar(255) NOT NULL,
  `status` enum('full','aman','limitstok') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `material`
--

INSERT INTO `material` (`id_material`, `material`, `detail_material`, `satuan`, `jml_stok`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kostik soda tangki besar', 'Menaikkan kadar PH', 'm3', '8500', 'full', '2023-02-15 02:41:56', '2023-04-03 03:34:58'),
(2, 'Kostik soda tangki kecil', 'Menaikkan kadar PH', 'm3', '9750', 'full', '2023-02-15 02:41:56', '2023-04-03 03:30:42'),
(3, 'Kostik flake', 'Menaikkan kadar PH', 'kg', '250', 'full', '2023-02-15 02:41:56', '2023-04-03 03:36:17'),
(4, 'Kuriflok', 'Menggumpalkan asam', 'kg', '300', 'full', '2023-02-15 02:41:56', '2023-04-03 03:36:17'),
(5, 'Fecl3', 'Mengikat asam dalam proses', 'kg', '450', 'full', '2023-02-15 02:42:46', '2023-04-03 03:30:42'),
(6, 'HCL', 'Menurunkan PH', 'Lt', '4200', 'full', '2023-02-15 02:42:46', '2023-04-03 03:34:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemakaian_material`
--

CREATE TABLE `pemakaian_material` (
  `id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `nm_user` varchar(255) NOT NULL,
  `jml_pemakaian` varchar(255) NOT NULL,
  `tanggal_pemakaian` date NOT NULL,
  `month` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemakaian_material`
--

INSERT INTO `pemakaian_material` (`id`, `material_id`, `nm_user`, `jml_pemakaian`, `tanggal_pemakaian`, `month`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ihanp ', '500', '2023-04-03', 'April', '2023-04-03 03:30:42', NULL),
(2, 2, 'Ihanp ', '250', '2023-04-03', 'April', '2023-04-03 03:30:42', NULL),
(3, 3, 'Ihanp ', '50', '2023-04-03', 'April', '2023-04-03 03:30:42', NULL),
(4, 4, 'Ihanp ', '50', '2023-04-03', 'April', '2023-04-03 03:30:42', NULL),
(5, 5, 'Ihanp ', '50', '2023-04-03', 'April', '2023-04-03 03:30:42', NULL),
(6, 6, 'Ihanp ', '500', '2023-04-03', 'April', '2023-04-03 03:30:42', NULL),
(7, 1, 'Ihanp ', '1000', '2023-04-04', 'April', '2023-04-03 03:34:58', NULL),
(8, 6, 'Ihanp ', '300', '2023-04-04', 'April', '2023-04-03 03:34:58', NULL),
(9, 4, 'Ihanp ', '150', '2023-04-05', 'April', '2023-04-03 03:36:17', NULL),
(10, 3, 'Ihanp ', '200', '2023-04-05', 'April', '2023-04-03 03:36:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shift`
--

CREATE TABLE `shift` (
  `id_shift` int(11) NOT NULL,
  `nm_shift` varchar(50) NOT NULL,
  `waktu_shift` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `shift`
--

INSERT INTO `shift` (`id_shift`, `nm_shift`, `waktu_shift`, `created_at`, `updated_at`) VALUES
(1, 'Shift 1', '07.00 - 16.30', '2023-02-14 01:39:56', '2023-02-15 03:06:37'),
(2, 'Shift 2', '16.30 - 00.30', '2023-02-14 01:39:56', NULL),
(3, 'Shift 3', '00.30 - 07.30', '2023-02-14 01:40:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `upass` varchar(8) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `akses` int(3) NOT NULL COMMENT '1office,2produksi',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `upass`, `id_pengguna`, `akses`, `created_at`, `updated_at`) VALUES
(1, 'noniks', 'tes123', 7, 1, '2023-02-10 03:46:31', NULL),
(2, 'ihanp', '9999', 2, 2, '2023-02-10 03:46:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indeks untuk tabel `pemakaian_material`
--
ALTER TABLE `pemakaian_material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constraint_pemakaian` (`material_id`);

--
-- Indeks untuk tabel `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id_shift`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constraint_user` (`id_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pemakaian_material`
--
ALTER TABLE `pemakaian_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `shift`
--
ALTER TABLE `shift`
  MODIFY `id_shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemakaian_material`
--
ALTER TABLE `pemakaian_material`
  ADD CONSTRAINT `constraint_pemakaian` FOREIGN KEY (`material_id`) REFERENCES `material` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `constraint_user` FOREIGN KEY (`id_pengguna`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
