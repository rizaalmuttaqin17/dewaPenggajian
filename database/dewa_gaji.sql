-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Sep 2021 pada 21.43
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
(10, 1, '2021-09-12', '02:20:20', NULL, 'Pulang', 'N', '2021-09-11 18:20:20', '2021-09-11 18:20:20', NULL),
(12, 1, '2021-09-11', '03:07:41', '03:10:14', 'Pulang', 'Y', '2021-09-11 19:07:41', '2021-09-11 19:07:41', NULL),
(13, 2, '2021-09-12', '03:40:38', '03:42:19', 'Pulang', 'Y', '2021-09-11 19:40:38', '2021-09-11 19:40:38', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji_bulanan`
--

CREATE TABLE `gaji_bulanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `total_gaji` int(11) DEFAULT NULL,
  `tanggal_gajian` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Admin', '2000000', '2021-08-01 03:32:13', '2021-08-01 03:32:13', NULL),
(2, 'ad', '2000', '2021-09-11 12:03:32', '2021-09-11 12:03:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kantor_setting`
--

CREATE TABLE `kantor_setting` (
  `id` int(11) NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `dimulai_absen_menit` time DEFAULT NULL COMMENT 'dimulai absensi sebelum menit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kantor_setting`
--

INSERT INTO `kantor_setting` (`id`, `jam_masuk`, `jam_pulang`, `dimulai_absen_menit`) VALUES
(1, '08:00:00', '17:00:00', '07:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan_gaji`
--

CREATE TABLE `potongan_gaji` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_jabatan` int(10) UNSIGNED NOT NULL,
  `potongan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `potongan_gaji`
--

INSERT INTO `potongan_gaji` (`id`, `id_jabatan`, `potongan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 10000, '2021-08-04 14:13:31', '2021-08-04 14:13:31', NULL);

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
  `foto` text DEFAULT 'nofoto.jpg',
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
(1, 1, 'Admin', NULL, 'admin@gmail.com', 'nopoto.png', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL),
(2, 1, 'Karyawan Ganteng', '2021-09-10', 'karyawan@gmail.com', 'nopoto.png', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, 'User', NULL, NULL, NULL);

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
  ADD KEY `fk_potongan_gaji_jabatan_idx` (`id_jabatan`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `gaji_bulanan`
--
ALTER TABLE `gaji_bulanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `fk_potongan_gaji_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
