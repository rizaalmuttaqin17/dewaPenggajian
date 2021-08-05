-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table dewa_gaji.absensi
CREATE TABLE IF NOT EXISTS `absensi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `tanggal_absen` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_absensi_user_idx` (`id_user`),
  CONSTRAINT `fk_absensi_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table dewa_gaji.absensi: ~0 rows (approximately)
/*!40000 ALTER TABLE `absensi` DISABLE KEYS */;
INSERT INTO `absensi` (`id`, `id_user`, `tanggal_absen`, `jam_masuk`, `jam_keluar`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, '2021-08-04', '22:12:30', '23:13:31', 'Masuk', '2021-08-04 22:12:47', '2021-08-04 22:12:47', NULL),
	(2, 1, '2021-08-05', '07:49:05', '07:49:06', 'Masuk', '2021-08-05 07:49:10', '2021-08-05 07:49:10', NULL);
/*!40000 ALTER TABLE `absensi` ENABLE KEYS */;

-- Dumping structure for table dewa_gaji.gaji_bulanan
CREATE TABLE IF NOT EXISTS `gaji_bulanan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `total_gaji` int(11) DEFAULT NULL,
  `tanggal_gajian` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gaji_bulanan_user_idx` (`id_user`),
  CONSTRAINT `fk_gaji_bulanan_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table dewa_gaji.gaji_bulanan: ~0 rows (approximately)
/*!40000 ALTER TABLE `gaji_bulanan` DISABLE KEYS */;
INSERT INTO `gaji_bulanan` (`id`, `id_user`, `total_gaji`, `tanggal_gajian`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 2000000, '2021-10-04', '2021-08-04 22:13:09', '2021-08-04 22:13:09', NULL);
/*!40000 ALTER TABLE `gaji_bulanan` ENABLE KEYS */;

-- Dumping structure for table dewa_gaji.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(45) DEFAULT NULL,
  `gaji_pokok` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table dewa_gaji.jabatan: ~0 rows (approximately)
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` (`id`, `jabatan`, `gaji_pokok`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Admin', '2000000', '2021-08-01 11:32:13', '2021-08-01 11:32:13', NULL);
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;

-- Dumping structure for table dewa_gaji.potongan_gaji
CREATE TABLE IF NOT EXISTS `potongan_gaji` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(10) unsigned NOT NULL,
  `potongan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_potongan_gaji_jabatan_idx` (`id_jabatan`),
  CONSTRAINT `fk_potongan_gaji_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table dewa_gaji.potongan_gaji: ~0 rows (approximately)
/*!40000 ALTER TABLE `potongan_gaji` DISABLE KEYS */;
INSERT INTO `potongan_gaji` (`id`, `id_jabatan`, `potongan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 10000, '2021-08-04 22:13:31', '2021-08-04 22:13:31', NULL);
/*!40000 ALTER TABLE `potongan_gaji` ENABLE KEYS */;

-- Dumping structure for table dewa_gaji.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(10) unsigned DEFAULT NULL,
  `name` varchar(145) DEFAULT NULL,
  `email` varchar(145) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tempat_lahir` varchar(145) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `tunjangan` int(11) DEFAULT NULL,
  `role` enum('Admin','User') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_jabatan_idx` (`id_jabatan`),
  CONSTRAINT `fk_user_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table dewa_gaji.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `id_jabatan`, `name`, `email`, `password`, `tempat_lahir`, `tanggal_lahir`, `kontak`, `tunjangan`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'Admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
