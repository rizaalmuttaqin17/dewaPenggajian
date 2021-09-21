-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Sep 2021 pada 16.41
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dewa_gaji`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `tanggal_absen` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `terlambat` enum('Y','N') DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `id_user`, `tanggal_absen`, `jam_masuk`, `jam_keluar`, `keterangan`, `terlambat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(22, 9, '2021-09-21', '22:05:03', '22:05:04', 'Pulang', 'Y', '2021-09-21 14:05:03', '2021-09-21 14:05:03', NULL),
(23, 1, '2021-09-21', '22:33:06', '22:33:09', 'Pulang', 'Y', '2021-09-21 14:33:06', '2021-09-21 14:33:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji_bulanan`
--

CREATE TABLE `gaji_bulanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `total_gaji` int(11) DEFAULT NULL,
  `gaji_pokok` int(11) DEFAULT NULL,
  `tunjangan` int(11) DEFAULT NULL,
  `potongan` int(11) DEFAULT NULL,
  `pph` int(11) DEFAULT NULL,
  `tanggal_gajian` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `gaji_bulanan`
--

INSERT INTO `gaji_bulanan` (`id`, `id_user`, `total_gaji`, `gaji_pokok`, `tunjangan`, `potongan`, `pph`, `tanggal_gajian`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 1, 4867200, 5000000, 100000, 30000, 202800, '2021-09-21', '2021-09-21 14:03:42', '2021-09-21 14:03:42', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari_libur`
--

CREATE TABLE `hari_libur` (
  `id` int(11) NOT NULL,
  `tgl_libur` date DEFAULT NULL,
  `keterangan_libur` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `hari_libur`
--

INSERT INTO `hari_libur` (`id`, `tgl_libur`, `keterangan_libur`) VALUES
(1, '2021-08-17', 'Hari Kemerdekaan Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `jabatan` varchar(45) DEFAULT NULL,
  `gaji_pokok` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`, `gaji_pokok`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '5000000', '2021-08-01 03:32:13', '2021-08-01 03:32:13', NULL),
(2, 'Karyawan', '3000000', '2021-09-11 12:03:32', '2021-09-11 12:03:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kantor_setting`
--

CREATE TABLE `kantor_setting` (
  `id` int(11) NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `dimulai_absen_menit` time DEFAULT NULL COMMENT 'dimulai absensi sebelum menit',
  `potongan_gaji_terlambat` int(20) DEFAULT NULL,
  `potongan_gaji_absen` int(20) DEFAULT NULL,
  `potongan_gaji_pph` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kantor_setting`
--

INSERT INTO `kantor_setting` (`id`, `jam_masuk`, `jam_pulang`, `dimulai_absen_menit`, `potongan_gaji_terlambat`, `potongan_gaji_absen`, `potongan_gaji_pph`) VALUES
(1, '08:00:00', '17:00:00', '07:00:00', 15000, 25000, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan_gaji`
--

CREATE TABLE `potongan_gaji` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `potongan` int(11) NOT NULL,
  `tanggal_potongan` date DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `potongan_gaji`
--

INSERT INTO `potongan_gaji` (`id`, `id_user`, `potongan`, `tanggal_potongan`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 10000, '2021-09-19', 'Telat', '2021-08-04 14:13:31', '2021-08-04 14:13:31', NULL),
(2, 2, 15000, '2021-09-19', 'Terlambat', NULL, NULL, NULL),
(3, 1, 15000, '2021-09-20', 'Terlambat', NULL, NULL, NULL),
(4, 5, 15000, '2021-09-20', 'Terlambat', NULL, NULL, NULL),
(5, 5, 15000, '2021-09-21', 'Terlambat', NULL, NULL, NULL),
(6, 1, 15000, '2021-09-21', 'Terlambat', NULL, NULL, NULL),
(7, 9, 15000, '2021-09-21', 'Terlambat', NULL, NULL, NULL),
(8, 1, 15000, '2021-09-21', 'Terlambat', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_jabatan` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(145) DEFAULT NULL,
  `tgl_aktif` date DEFAULT NULL,
  `email` varchar(145) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tempat_lahir` varchar(145) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `tunjangan` int(11) DEFAULT NULL,
  `role` enum('Admin','User') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_jabatan`, `name`, `tgl_aktif`, `email`, `foto`, `password`, `tempat_lahir`, `tanggal_lahir`, `kontak`, `tunjangan`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Eko Pujianto', '2021-09-18', 'ekopujianto48@gmail.com', ' 1.jpg', '25d55ad283aa400af464c76d713c07ad', 'Samarinda', '0000-00-00', '082157819525', 100000, 'Admin', '2021-09-17 17:36:52', '2021-09-17 17:56:22', NULL),
(2, 2, 'Karyawan Ganteng', '2021-09-30', 'karyawan@gmail.com', '2.jpg', '25d55ad283aa400af464c76d713c07ad', 'Samarinda', '2021-09-15', '123', 100000, 'User', '2021-09-17 17:36:49', '2021-09-18 17:26:44', NULL),
(5, 2, 'Eko Pujianto2', '2021-09-09', 'ekopujianto@gmail.com', 'Eko Pujianto1632109694.jpg', '25d55ad283aa400af464c76d713c07ad', 'Samarinda', '2021-09-14', '082157819525', 10000, 'User', '2021-09-20 03:48:14', '2021-09-21 03:33:40', NULL),
(8, 2, 'Eko Pujiantoo', '2021-09-21', 'admin', '', '21232f297a57a5a743894a0e4a801fc3', 'Samarinda', '2021-09-21', '082157819525', 100000, 'User', '2021-09-21 03:29:37', '2021-09-21 03:33:34', NULL),
(9, 2, 'Dewa', '2021-09-21', 'dewa@gmail.com', 'Dewa1632233061.jpeg', '25d55ad283aa400af464c76d713c07ad', 'Samarinda', '2021-03-12', '082157819525', 100000, 'User', '2021-09-21 14:04:21', '2021-09-21 14:04:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_absensi_user_idx` (`id_user`);

--
-- Indeks untuk tabel `gaji_bulanan`
--
ALTER TABLE `gaji_bulanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gaji_bulanan_user_idx` (`id_user`);

--
-- Indeks untuk tabel `hari_libur`
--
ALTER TABLE `hari_libur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kantor_setting`
--
ALTER TABLE `kantor_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_potongan_gaji_users` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_jabatan_idx` (`id_jabatan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `gaji_bulanan`
--
ALTER TABLE `gaji_bulanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `hari_libur`
--
ALTER TABLE `hari_libur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kantor_setting`
--
ALTER TABLE `kantor_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `fk_absensi_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `gaji_bulanan`
--
ALTER TABLE `gaji_bulanan`
  ADD CONSTRAINT `fk_gaji_bulanan_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  ADD CONSTRAINT `FK_potongan_gaji_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
