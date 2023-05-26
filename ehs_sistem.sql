-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2023 pada 05.59
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwalkerja`
--

CREATE TABLE `jadwalkerja` (
  `id_jadwal` int(11) NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `shift_id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwalkerja`
--

INSERT INTO `jadwalkerja` (`id_jadwal`, `date_in`, `date_out`, `shift_id`, `karyawan_id`, `created_at`, `updated_at`) VALUES
(1, '2023-05-17', '2023-05-19', 2, 5, '2023-05-17 04:21:12', NULL),
(2, '2023-05-17', '2023-05-19', 2, 8, '2023-05-17 04:21:12', NULL),
(3, '2023-05-17', '2023-05-19', 2, 9, '2023-05-17 04:21:12', NULL),
(4, '2023-05-23', '2023-05-26', 1, 6, '2023-05-23 06:43:05', NULL),
(5, '2023-05-23', '2023-05-26', 1, 5, '2023-05-23 06:43:06', NULL),
(6, '2023-05-23', '2023-05-26', 1, 7, '2023-05-23 06:43:06', NULL),
(7, '2023-05-23', '2023-05-26', 2, 8, '2023-05-23 06:44:58', NULL),
(8, '2023-05-23', '2023-05-26', 3, 9, '2023-05-23 06:45:23', NULL),
(9, '2023-05-24', '2023-05-26', 2, 6, '2023-05-24 04:45:21', NULL),
(10, '2023-05-24', '2023-05-26', 2, 5, '2023-05-24 04:45:21', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwalkerjaot`
--

CREATE TABLE `jadwalkerjaot` (
  `id_ot` int(11) NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `total` int(111) NOT NULL,
  `shift_id` int(3) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwalkerjaot`
--

INSERT INTO `jadwalkerjaot` (`id_ot`, `date_in`, `date_out`, `time_in`, `time_out`, `total`, `shift_id`, `karyawan_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '2023-05-23', '2023-05-23', '16:30:00', '21:30:00', 5, 1, 10, 'Perbaiki mesin ', '2023-05-23 14:40:57', '2023-05-24 04:22:22'),
(2, '2023-05-23', '2023-05-23', '16:30:00', '21:30:00', 5, 1, 8, 'Perbaiki mesin ', '2023-05-23 14:40:57', '2023-05-24 04:22:25'),
(3, '2023-05-23', '2023-05-23', '16:30:00', '21:30:00', 5, 1, 7, 'Perbaiki mesin ', '2023-05-23 14:40:57', '2023-05-24 04:22:29'),
(4, '2023-05-24', '2023-05-24', '16:30:00', '20:30:00', 4, 1, 7, 'Membersihkan Area WWT', '2023-05-24 03:33:24', NULL),
(5, '2023-05-24', '2023-05-24', '16:30:00', '20:30:00', 4, 1, 8, 'Membersihkan Area WWT', '2023-05-24 03:33:24', NULL),
(6, '2023-05-24', '2023-05-24', '17:30:00', '21:30:00', 4, 1, 9, 'Perbaiki mesin ', '2023-05-24 09:08:38', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nm_karyawan` varchar(255) NOT NULL,
  `posisi_id` int(11) NOT NULL,
  `foto_karyawan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nm_karyawan`, `posisi_id`, `foto_karyawan`, `created_at`, `updated_at`) VALUES
(2, '1625', 'Sugiyanto', 1, 'pa_sugi.jpg', '2023-05-16 04:59:42', '2023-05-17 01:05:23'),
(3, '1617', 'Ahmad Zaelani', 2, 'pa_jeri.jpg', '2023-05-17 01:04:54', NULL),
(4, '2819', 'Nonik Suhaya Cahaya Purnamasari', 3, 'mba_nonik.jpg', '2023-05-17 01:06:00', NULL),
(5, '1646', 'Akhmadi Shofiya Alrizqi', 4, 'mas_akhmadi.jpg', '2023-05-17 01:06:41', NULL),
(6, '3204', 'Muhamad Fiqri Kurnia', 4, 'mas_fiqri.jpg', '2023-05-17 01:07:26', NULL),
(7, '1041', 'Subkhan', 4, 'pa_subkhan.jpg', '2023-05-17 01:07:59', NULL),
(8, '0583', 'Bambang Sarjono', 4, 'pa_bambang.jpg', '2023-05-17 01:08:31', NULL),
(9, '2269', 'Hasan Rudi', 4, 'pa_hasan.jpg', '2023-05-17 01:09:15', NULL),
(10, '3913', 'Ihan Pratama', 5, 'mas_ihan.jpg', '2023-05-17 01:09:46', NULL),
(11, '0731', 'Dedi Ruhmat', 3, 'pa_dedi.jpg', '2023-05-17 01:14:57', NULL);

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
(1, 'Kostik soda tangki besar', 'Menaikkan kadar PH', 'm3', '7850', 'full', '2023-02-15 02:41:56', '2023-04-05 08:15:04'),
(2, 'Kostik soda tangki kecil', 'Menaikkan kadar PH', 'm3', '7000', 'full', '2023-02-15 02:41:56', '2023-04-10 02:16:30'),
(3, 'Kostik flake', 'Menaikkan kadar PH', 'kg', '0', 'full', '2023-02-15 02:41:56', '2023-04-05 08:15:04'),
(4, 'Kuriflok', 'Menggumpalkan asam', 'kg', '250', 'full', '2023-02-15 02:41:56', '2023-04-05 08:15:04'),
(5, 'Fecl3', 'Mengikat asam dalam proses', 'kg', '350', 'full', '2023-02-15 02:42:46', '2023-04-10 02:16:30'),
(6, 'HCL', 'Menurunkan PH', 'Lt', '1300', 'full', '2023-02-15 02:42:46', '2023-04-10 02:16:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `max_kostikdemin`
--

CREATE TABLE `max_kostikdemin` (
  `id` int(11) NOT NULL,
  `max_kostikdemin` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `max_kostikdemin`
--

INSERT INTO `max_kostikdemin` (`id`, `max_kostikdemin`, `created_at`) VALUES
(1, '2500', '2023-05-20 15:26:27'),
(2, '2800', '2023-05-20 15:26:51'),
(3, '500', '2023-05-22 03:24:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `max_kostikmixbed`
--

CREATE TABLE `max_kostikmixbed` (
  `id` int(11) NOT NULL,
  `max_kostikmixbed` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `max_kostikmixbed`
--

INSERT INTO `max_kostikmixbed` (`id`, `max_kostikmixbed`, `created_at`) VALUES
(1, '3800', '2023-05-20 15:02:32'),
(2, '500', '2023-05-22 03:23:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `max_kostikwwt`
--

CREATE TABLE `max_kostikwwt` (
  `id` int(11) NOT NULL,
  `max_kostik` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `max_kostikwwt`
--

INSERT INTO `max_kostikwwt` (`id`, `max_kostik`, `created_at`) VALUES
(1, '1000', '2023-05-20 14:29:05'),
(2, '2500', '2023-05-20 14:29:32'),
(3, '3000', '2023-05-20 14:29:54'),
(4, '800', '2023-05-20 14:30:12'),
(5, '3725', '2023-05-22 02:37:55'),
(6, '2500', '2023-05-23 03:21:52');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Kadept', '2023-05-16 04:27:02', NULL),
(2, 'Kasi', '2023-05-16 04:27:02', NULL),
(3, 'Kasubsi', '2023-05-16 04:27:18', NULL),
(4, 'PIC WWT', '2023-05-16 04:27:18', NULL),
(5, 'PIC Safety', '2023-05-16 04:27:25', NULL);

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
(1, 'NSC2819', 'office28', 4, 1, '2023-02-10 03:46:31', '2023-05-22 01:51:35'),
(2, 'AZAE1617', 'office16', 3, 1, '2023-02-10 03:46:31', '2023-05-22 01:51:44'),
(5, 'SGY1625', 'office25', 2, 1, '2023-05-22 01:54:11', NULL),
(6, 'DRU0731', 'office07', 11, 1, '2023-05-22 01:54:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indeks untuk tabel `jadwalkerja`
--
ALTER TABLE `jadwalkerja`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `constraint_shift` (`shift_id`),
  ADD KEY `constraint_karyawan` (`karyawan_id`);

--
-- Indeks untuk tabel `jadwalkerjaot`
--
ALTER TABLE `jadwalkerjaot`
  ADD PRIMARY KEY (`id_ot`),
  ADD KEY `shift_constraint` (`shift_id`),
  ADD KEY `karyawan_constraint` (`karyawan_id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `constraint_posisi` (`posisi_id`);

--
-- Indeks untuk tabel `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indeks untuk tabel `max_kostikdemin`
--
ALTER TABLE `max_kostikdemin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `max_kostikmixbed`
--
ALTER TABLE `max_kostikmixbed`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `max_kostikwwt`
--
ALTER TABLE `max_kostikwwt`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemakaian_material`
--
ALTER TABLE `pemakaian_material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constraint_pemakaian` (`material_id`);

--
-- Indeks untuk tabel `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`);

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
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwalkerja`
--
ALTER TABLE `jadwalkerja`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jadwalkerjaot`
--
ALTER TABLE `jadwalkerjaot`
  MODIFY `id_ot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `max_kostikdemin`
--
ALTER TABLE `max_kostikdemin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `max_kostikmixbed`
--
ALTER TABLE `max_kostikmixbed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `max_kostikwwt`
--
ALTER TABLE `max_kostikwwt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pemakaian_material`
--
ALTER TABLE `pemakaian_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `shift`
--
ALTER TABLE `shift`
  MODIFY `id_shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwalkerja`
--
ALTER TABLE `jadwalkerja`
  ADD CONSTRAINT `constraint_karyawan` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_shift` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`id_shift`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwalkerjaot`
--
ALTER TABLE `jadwalkerjaot`
  ADD CONSTRAINT `karyawan_constraint` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shift_constraint` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`id_shift`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `constraint_posisi` FOREIGN KEY (`posisi_id`) REFERENCES `posisi` (`id_posisi`) ON DELETE CASCADE ON UPDATE CASCADE;

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
