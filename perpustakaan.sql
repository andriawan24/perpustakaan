-- MariaDB dump 10.17  Distrib 10.4.6-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: perpustakaan
-- ------------------------------------------------------
-- Server version	10.4.6-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anggota`
--

DROP TABLE IF EXISTS `anggota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anggota` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` bigint(20) unsigned NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp_ortu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_kunjungan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anggota_id_kelas_foreign` (`id_kelas`),
  CONSTRAINT `anggota_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anggota`
--

LOCK TABLES `anggota` WRITE;
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
INSERT INTO `anggota` VALUES (4,'Naufal Fawwaz',1,'Jl. Sawahlega no. 35 RT02 RW06','087787871366','08156087878','fawaznaufal23@gmail.com','$2y$10$EF3MadfuwB6qWYE0WgTSS.7xLdMnagpWEub89lypMzgion5/5eXxy',0,'2019-12-16 08:47:14','2019-12-16 08:47:14'),(5,'Naufal Fawwaz Andriawan',1,'Jl. Sawahlega no. 35 RT02 RW06','087787871366','08156087878','fawaznaufal32@gmail.com','$2y$10$AqbImM9Fg3xX73D4e.MLNOT7m.Njl/weM2/s9kArJbqzclhApEpgi',0,'2019-12-18 03:12:01','2019-12-18 03:12:01');
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buku` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_regis` datetime NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku`
--

LOCK TABLES `buku` WRITE;
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` VALUES (1,'Aliquam commodi debitis inventore.','Genta Zulaika','CV Yulianti Marpaung',5,'2019-12-16 00:00:00','0'),(2,'Et enim ut.','Aurora Mandasari','CV Prayoga',21,'2019-12-16 00:00:00','0'),(3,'Cum dolores optio.','Titin Belinda Pertiwi S.Farm','CV Yuliarti Sinaga',18,'2019-12-16 00:00:00','0'),(4,'Cum consequatur omnis.','Putri Permata','CV Tampubolon',9,'2019-12-16 00:00:00','0'),(5,'Iusto est qui recusandae.','Patricia Yani Rahimah S.Ked','PT Mardhiyah (Persero) Tbk',11,'2019-12-16 00:00:00','0'),(6,'Velit in dolore unde dicta et.','Dadi Waskita','PT Budiyanto',27,'2019-12-16 00:00:00','0'),(7,'Aut rem eveniet dolores et.','Ella Nasyiah S.Sos','PT Prasetya Hartati (Persero) Tbk',20,'2019-12-16 00:00:00','0'),(8,'Libero nisi perferendis voluptate.','Gara Gunawan','CV Oktaviani',3,'2019-12-16 00:00:00','0'),(9,'Sed ea suscipit suscipit eaque.','Endah Rahimah','PT Firmansyah',25,'2019-12-16 00:00:00','0'),(10,'Quis animi sed.','Surya Gadang Napitupulu','PT Yuniar',21,'2019-12-16 00:00:00','0'),(11,'Aut voluptate in est voluptate.','Rika Tari Anggraini M.Ak','Perum Hidayanto (Persero) Tbk',18,'2019-12-16 00:00:00','0'),(12,'Odio sapiente dolor magnam porro.','Wirda Yessi Nasyidah','PT Sitorus Tbk',19,'2019-12-16 00:00:00','0'),(13,'Labore aliquam omnis est possimus.','Michelle Mayasari','Perum Mustofa Wahyuni Tbk',26,'2019-12-16 00:00:00','0'),(14,'Labore sit quo.','Genta Wulandari','Perum Uwais Tbk',26,'2019-12-16 00:00:00','0'),(15,'Rerum doloremque voluptatem assumenda sed.','Michelle Purwanti','CV Lailasari Tbk',11,'2019-12-16 00:00:00','0'),(16,'Nobis numquam ex et.','Rudi Prabowo','PT Prasetya Tbk',1,'2019-12-16 00:00:00','0'),(17,'Et nulla aperiam laudantium.','Kuncara Pradipta','Perum Gunawan Wasita (Persero) Tbk',26,'2019-12-16 00:00:00','0'),(18,'Similique dolores dolore voluptatum.','Siska Lalita Utami','PT Sitorus',16,'2019-12-16 00:00:00','0'),(19,'Reiciendis aspernatur deleniti quia laboriosam.','Niyaga Kuswoyo S.IP','PT Mandala Firgantoro',13,'2019-12-16 00:00:00','0'),(20,'Est reiciendis praesentium velit repudiandae non.','Salsabila Rahayu','PD Ardianto',21,'2019-12-16 00:00:00','0'),(21,'Tempora sit unde laborum.','Eva Ira Hastuti S.Psi','PD Rajata Mangunsong',12,'2019-12-16 00:00:00','0'),(22,'Ut dolor accusantium et.','Cager Wahyudin','PD Damanik Permadi Tbk',13,'2019-12-16 00:00:00','0');
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_walikelas` bigint(20) unsigned NOT NULL,
  `id_ketuamurid` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kelas_id_walikelas_foreign` (`id_walikelas`),
  KEY `kelas_id_ketuamurid_foreign` (`id_ketuamurid`),
  CONSTRAINT `kelas_id_ketuamurid_foreign` FOREIGN KEY (`id_ketuamurid`) REFERENCES `ketua_murid` (`id`) ON DELETE CASCADE,
  CONSTRAINT `kelas_id_walikelas_foreign` FOREIGN KEY (`id_walikelas`) REFERENCES `wali_kelas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (1,'XII RPL 1',12,16);
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ketua_murid`
--

DROP TABLE IF EXISTS `ketua_murid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ketua_murid` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ketua_murid`
--

LOCK TABLES `ketua_murid` WRITE;
/*!40000 ALTER TABLE `ketua_murid` DISABLE KEYS */;
INSERT INTO `ketua_murid` VALUES (1,'759489','Suci Riyanti','Kpg. Imam Bonjol No. 596, Banjar 55609, Jambi','(+62) 379 5911 8241','(+62) 296 2763 3968','mulyani.padma@sitorus.asia','2019-12-16 08:45:07','2019-12-16 08:45:07'),(2,'4477','Hana Aryani','Jln. Baranangsiang No. 734, Metro 61416, Gorontalo','(+62) 405 4343 9516','(+62) 446 5422 8307','genta94@yahoo.com','2019-12-16 08:45:07','2019-12-16 08:45:07'),(3,'96','Dacin Luwes Haryanto','Kpg. Suprapto No. 95, Yogyakarta 43655, SulSel','(+62) 403 7042 419','(+62) 623 2910 6507','genta.hutagalung@yahoo.com','2019-12-16 08:45:07','2019-12-16 08:45:07'),(4,'280988','Bakiadi Pranowo','Gg. Tubagus Ismail No. 213, Lhokseumawe 41758, BaBel','(+62) 289 1381 245','(+62) 853 1964 5026','puput96@yahoo.co.id','2019-12-16 08:45:07','2019-12-16 08:45:07'),(5,'8044','Opan Darmanto Sinaga M.TI.','Kpg. Ki Hajar Dewantara No. 694, Tidore Kepulauan 89560, Bengkulu','021 1919 464','(+62) 363 8843 183','natsir.jatmiko@yahoo.com','2019-12-16 08:45:07','2019-12-16 08:45:07'),(6,'4176','Lala Palastri S.H.','Psr. Bakin No. 272, Padang 26712, SumBar','0562 0986 477','0581 5254 543','pwacana@yahoo.com','2019-12-16 08:45:07','2019-12-16 08:45:07'),(7,'596718','Umaya Asmuni Sitorus','Dk. Dr. Junjunan No. 342, Surakarta 55370, Lampung','0786 3613 0246','(+62) 692 2332 039','laila.purnawati@gmail.com','2019-12-16 08:45:07','2019-12-16 08:45:07'),(8,'765','Ratna Palastri S.Pt','Psr. Arifin No. 410, Blitar 51221, SulTeng','(+62) 463 5854 370','0526 2132 405','ppratiwi@safitri.in','2019-12-16 08:45:07','2019-12-16 08:45:07'),(9,'36','Tirta Siregar','Psr. Ketandan No. 840, Bandar Lampung 36539, SulUt','021 4066 9356','0972 0900 5532','farah90@gmail.com','2019-12-16 08:45:07','2019-12-16 08:45:07'),(10,'6193337','Tasnim Winarno','Kpg. Babah No. 414, Tegal 61074, NTB','(+62) 27 7428 4717','0811 407 358','ina.damanik@hutasoit.or.id','2019-12-16 08:45:07','2019-12-16 08:45:07'),(11,'689044','Jaga Marbun S.Pt','Ds. Basmol Raya No. 820, Tarakan 83895, KalTeng','(+62) 507 8913 0429','0766 2208 648','samosir.laila@yahoo.co.id','2019-12-16 08:45:44','2019-12-16 08:45:44'),(12,'158','Alambana Budiyanto','Gg. Diponegoro No. 940, Metro 85639, Papua','0408 8520 9162','0619 1241 1542','elisa22@yahoo.com','2019-12-16 08:45:44','2019-12-16 08:45:44'),(13,'18861943','Intan Lalita Wulandari','Jln. Babadan No. 620, Tangerang Selatan 33849, SumBar','(+62) 704 4389 226','0914 4248 9379','xnainggolan@pudjiastuti.co','2019-12-16 08:45:44','2019-12-16 08:45:44'),(14,'169','Maria Permata','Kpg. Suprapto No. 441, Batu 51404, Jambi','029 3376 1363','0464 4684 348','silvia.widiastuti@yahoo.co.id','2019-12-16 08:45:44','2019-12-16 08:45:44'),(15,'6547','Nilam Halima Yulianti','Ds. Baladewa No. 431, Bima 39284, KalTeng','0490 7382 994','(+62) 634 3069 2826','mansur.uli@rahimah.my.id','2019-12-16 08:45:44','2019-12-16 08:45:44'),(16,'28','Ellis Wahyuni','Dk. Ki Hajar Dewantara No. 102, Bukittinggi 50044, SulTra','(+62) 883 3150 0279','(+62) 966 4896 546','vusada@pangestu.com','2019-12-16 08:45:44','2019-12-16 08:45:44'),(17,'79426210','Darmanto Opung Budiyanto M.M.','Jr. Pattimura No. 674, Cimahi 71243, SulTeng','(+62) 827 5297 443','0369 7557 8715','wulan99@prastuti.asia','2019-12-16 08:45:44','2019-12-16 08:45:44'),(18,'85','Raden Mahendra S.Ked','Jr. Hasanuddin No. 931, Bitung 11387, Gorontalo','0779 7571 4893','(+62) 622 7678 0388','daliono23@wahyuni.co.id','2019-12-16 08:45:44','2019-12-16 08:45:44'),(19,'580','Sakura Rachel Nasyiah','Jr. Baja Raya No. 765, Bandung 61256, Riau','0354 0488 1856','(+62) 527 7652 336','anugroho@yahoo.com','2019-12-16 08:45:44','2019-12-16 08:45:44'),(20,'44092929','Sari Mardhiyah M.Ak','Psr. Dewi Sartika No. 841, Denpasar 99992, SumUt','(+62) 209 6124 848','0724 3446 7791','maryati.yani@mahendra.co','2019-12-16 08:45:44','2019-12-16 08:45:44');
/*!40000 ALTER TABLE `ketua_murid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kunjungan_anggota`
--

DROP TABLE IF EXISTS `kunjungan_anggota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kunjungan_anggota` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_anggota` bigint(20) unsigned NOT NULL,
  `waktu_kunjungan` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Ditambah otomatis',
  PRIMARY KEY (`id`),
  KEY `kunjungan_anggota_id_anggota_foreign` (`id_anggota`),
  CONSTRAINT `kunjungan_anggota_id_anggota_foreign` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kunjungan_anggota`
--

LOCK TABLES `kunjungan_anggota` WRITE;
/*!40000 ALTER TABLE `kunjungan_anggota` DISABLE KEYS */;
INSERT INTO `kunjungan_anggota` VALUES (1,4,'2019-12-18 00:00:00'),(2,4,'2019-12-18 09:26:16'),(3,4,'2019-12-18 09:33:15'),(4,4,'2019-12-18 09:44:47'),(5,4,'2019-12-18 09:56:15'),(6,4,'2019-12-18 17:01:21'),(7,4,'2019-12-18 17:01:25'),(8,4,'2019-12-18 17:01:43'),(9,4,'2019-12-18 17:02:29'),(10,5,'2019-12-18 17:12:25'),(11,4,'2019-12-18 21:03:50'),(12,4,'2019-12-18 21:08:58'),(13,4,'2019-12-19 10:44:42');
/*!40000 ALTER TABLE `kunjungan_anggota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kunjungan_murid`
--

DROP TABLE IF EXISTS `kunjungan_murid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kunjungan_murid` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` bigint(20) unsigned NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_kunjungan` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `kunjungan_murid_id_kelas_foreign` (`id_kelas`),
  CONSTRAINT `kunjungan_murid_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kunjungan_murid`
--

LOCK TABLES `kunjungan_murid` WRITE;
/*!40000 ALTER TABLE `kunjungan_murid` DISABLE KEYS */;
INSERT INTO `kunjungan_murid` VALUES (1,'Naufal Fawwaz',1,'Jl. Sawahlega No. 35 RT.03 RW.06','08812048769','2019-12-18 17:04:50'),(2,'Naufal Fawwaz',1,'Jl. Sawahlega No. 35 RT.03 RW.06','08812048769','2019-12-18 21:04:57');
/*!40000 ALTER TABLE `kunjungan_murid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_08_18_141120_create_bukus_table',1),(2,'2019_08_18_142110_create_wali_kelas_table',1),(3,'2019_08_18_142333_create_ketua_murids_table',1),(4,'2019_08_18_142551_create_kelas_table',1),(5,'2019_08_18_142934_create_peminjams_table',1),(6,'2019_08_18_144340_create_anggotas_table',1),(7,'2019_08_18_150112_create_peminjam_anggotas_table',1),(8,'2019_09_19_165842_create_kunjungananggota_table',1),(9,'2019_09_19_170014_create_kunjunganmurid_table',1),(10,'2019_09_19_180726_create_user_table',1),(11,'2019_09_19_181028_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peminjam_anggota`
--

DROP TABLE IF EXISTS `peminjam_anggota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peminjam_anggota` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_anggota` bigint(20) unsigned NOT NULL,
  `id_buku` bigint(20) unsigned NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('pinjam','kembali') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dikembalikan_pada` date DEFAULT NULL,
  `denda` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `peminjam_anggota_id_anggota_foreign` (`id_anggota`),
  KEY `peminjam_anggota_id_buku_foreign` (`id_buku`),
  CONSTRAINT `peminjam_anggota_id_anggota_foreign` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`) ON DELETE CASCADE,
  CONSTRAINT `peminjam_anggota_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjam_anggota`
--

LOCK TABLES `peminjam_anggota` WRITE;
/*!40000 ALTER TABLE `peminjam_anggota` DISABLE KEYS */;
/*!40000 ALTER TABLE `peminjam_anggota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peminjam_kelas`
--

DROP TABLE IF EXISTS `peminjam_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peminjam_kelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  `id_kelas` bigint(20) unsigned NOT NULL,
  `id_buku` bigint(20) unsigned NOT NULL,
  `ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('pinjam','kembali') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peminjam_kelas_id_kelas_foreign` (`id_kelas`),
  KEY `peminjam_kelas_id_buku_foreign` (`id_buku`),
  CONSTRAINT `peminjam_kelas_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE,
  CONSTRAINT `peminjam_kelas_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjam_kelas`
--

LOCK TABLES `peminjam_kelas` WRITE;
/*!40000 ALTER TABLE `peminjam_kelas` DISABLE KEYS */;
/*!40000 ALTER TABLE `peminjam_kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wali_kelas`
--

DROP TABLE IF EXISTS `wali_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wali_kelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wali_kelas`
--

LOCK TABLES `wali_kelas` WRITE;
/*!40000 ALTER TABLE `wali_kelas` DISABLE KEYS */;
INSERT INTO `wali_kelas` VALUES (1,'5','Ayu Melani','Ki. Banda No. 448, Tual 97577, Lampung','0820 539 965','cagustina@ardianto.go.id','2019-12-16 08:45:07','2019-12-16 08:45:07'),(2,'7','Diana Novitasari S.H.','Gg. Imam Bonjol No. 725, Administrasi Jakarta Pusat 41129, JaTeng','0462 0996 089','kambali.mardhiyah@gmail.com','2019-12-16 08:45:07','2019-12-16 08:45:07'),(3,'9','Vera Yulianti M.Kom.','Ds. Lumban Tobing No. 554, Pariaman 72105, SulTra','(+62) 638 5151 6506','hidayanto.gandi@budiman.mil.id','2019-12-16 08:45:07','2019-12-16 08:45:07'),(4,'5','Yance Anggraini','Jr. R.M. Said No. 793, Banjar 36967, KalBar','(+62) 984 1104 235','yolanda.kamidin@haryanto.biz.id','2019-12-16 08:45:07','2019-12-16 08:45:07'),(5,'2','Muni Marbun','Kpg. Batako No. 945, Gunungsitoli 21614, KalTim','(+62) 967 2155 6303','hmandasari@nurdiyanti.my.id','2019-12-16 08:45:07','2019-12-16 08:45:07'),(6,'5','Rachel Kusmawati','Ki. Yogyakarta No. 869, Magelang 27534, JaTim','0438 3911 6458','uhastuti@habibi.desa.id','2019-12-16 08:45:07','2019-12-16 08:45:07'),(7,'0','Olivia Cici Wahyuni M.TI.','Psr. Yoga No. 16, Pagar Alam 97710, Bali','021 8438 311','luthfi91@zulkarnain.go.id','2019-12-16 08:45:07','2019-12-16 08:45:07'),(8,'5','Dipa Ajiono Utama','Psr. Reksoninten No. 611, Binjai 42119, JaTim','(+62) 946 4923 8418','gilda80@yahoo.co.id','2019-12-16 08:45:07','2019-12-16 08:45:07'),(9,'6','Shania Rahmi Puspita M.Kom.','Gg. Madiun No. 958, Batam 48635, KalBar','(+62) 425 6250 462','zulfa.winarno@yulianti.net','2019-12-16 08:45:07','2019-12-16 08:45:07'),(10,'3','Tira Melinda Padmasari','Kpg. Bank Dagang Negara No. 486, Padang 65514, Aceh','0779 6695 9262','zfirmansyah@yahoo.co.id','2019-12-16 08:45:07','2019-12-16 08:45:07'),(11,'2','Dalima Widiastuti','Gg. Bakau Griya Utama No. 640, Jayapura 53688, SumBar','(+62) 551 6872 4116','dadi.santoso@agustina.biz.id','2019-12-16 08:45:07','2019-12-16 08:45:07'),(12,'0','Prasetyo Saka Winarno M.Farm','Jln. Supomo No. 853, Tangerang 25201, Jambi','0459 6938 3481','darsirah09@yahoo.com','2019-12-16 08:45:44','2019-12-16 08:45:44'),(13,'7','Ozy Raditya Dabukke M.Pd','Psr. Bara No. 282, Prabumulih 47818, KalBar','(+62) 815 5591 6615','nadine46@uyainah.my.id','2019-12-16 08:45:44','2019-12-16 08:45:44'),(14,'5','Intan Pudjiastuti M.M.','Ds. Urip Sumoharjo No. 107, Surabaya 90400, JaTeng','0871 3042 4100','hpudjiastuti@puspita.biz.id','2019-12-16 08:45:44','2019-12-16 08:45:44'),(15,'0','Alika Wijayanti','Jr. Kyai Gede No. 65, Tual 64263, SulUt','(+62) 21 6115 624','psimbolon@gmail.co.id','2019-12-16 08:45:44','2019-12-16 08:45:44'),(16,'8','Nalar Hidayat M.Pd','Jln. Ciwastra No. 676, Administrasi Jakarta Pusat 98771, Jambi','0269 8312 393','mahfud.kusmawati@halim.desa.id','2019-12-16 08:45:44','2019-12-16 08:45:44'),(17,'2','Tari Purnawati','Jln. Astana Anyar No. 402, Tual 43453, Bali','0863 9525 3932','puspasari.embuh@lailasari.desa.id','2019-12-16 08:45:44','2019-12-16 08:45:44'),(18,'1','Artawan Nainggolan','Jr. Ekonomi No. 863, Kotamobagu 46864, Papua','(+62) 312 8358 4653','namaga.maman@yahoo.co.id','2019-12-16 08:45:44','2019-12-16 08:45:44'),(19,'1','Salimah Puspita S.IP','Ki. Bappenas No. 442, Pekanbaru 51162, Papua','(+62) 608 3768 2849','eva.sitorus@gmail.com','2019-12-16 08:45:44','2019-12-16 08:45:44'),(20,'2','Luthfi Hutagalung','Jr. Basket No. 362, Prabumulih 15075, NTB','(+62) 358 4244 173','saptono.hasta@gmail.com','2019-12-16 08:45:44','2019-12-16 08:45:44'),(21,'7','Kamaria Kusmawati M.Ak','Ki. Kalimantan No. 935, Metro 26291, JaBar','0791 8416 9624','wnajmudin@hartati.web.id','2019-12-16 08:45:44','2019-12-16 08:45:44'),(22,'7','Wani Nadia Pudjiastuti S.Pt','Psr. Gedebage Selatan No. 257, Administrasi Jakarta Utara 32599, DIY','0341 9565 2050','maulana.restu@yahoo.co.id','2019-12-16 08:45:44','2019-12-16 08:45:44');
/*!40000 ALTER TABLE `wali_kelas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-19 13:16:35
