-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: db_tugas_sbd
-- ------------------------------------------------------
-- Server version 	5.5.5-10.1.13-MariaDB
-- Date: Tue, 06 Feb 2018 10:25:10 +0700

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_jabatan`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_jabatan` (
  `id_jabatan` char(10) NOT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `level` enum('kasir','manajer','pemesan') DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_jabatan`
--

LOCK TABLES `tbl_jabatan` WRITE;
/*!40000 ALTER TABLE `tbl_jabatan` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `tbl_jabatan` VALUES ('J00','Pemesan','pemesan'),('J01','Manajer','manajer'),('J02','Pegawai tidak Tetap','kasir'),('J03','Pegawai Tetap','kasir'),('J04','Pegawai tidak Tetap','kasir'),('J05','HRD','manajer'),('J06','Pegawai Tetap','kasir'),('J07','Pegawai Tetap','kasir'),('J08','Pegawai tidak Tetap','kasir'),('J09','Pegawai Tetap','kasir');
/*!40000 ALTER TABLE `tbl_jabatan` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `tbl_makanan`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_makanan` (
  `id_makanan` char(10) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tipe` enum('makanan','minuman') DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `gambar` blob,
  PRIMARY KEY (`id_makanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_makanan`
--

LOCK TABLES `tbl_makanan` WRITE;
/*!40000 ALTER TABLE `tbl_makanan` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `tbl_makanan` VALUES ('MK001','Kepiting Asam Manis','makanan',15000,0x312E6A7067),('MK002','Udang Goreng Tepung Asam Manis','makanan',70000,0x322E6A7067),('MK003','Udang Telur Asin','makanan',70000,0x332E6A7067),('MK004','Ikan Bakar Gurame','makanan',60000,0x342E6A7067),('MK005','Kepiting Telur Asin','makanan',150000,0x352E6A7067),('MK006','Lobster Asam Manis Pedas','makanan',120000,0x362E6A7067),('MK007','Ikan Bawal Asam Manis','makanan',60000,0x372E4A5047),('MK008','Kerang Kepa Taucho','makanan',40000,0x382E6A7067),('MK009','Ikan Nilla Goreng','makanan',40000,0x392E6A7067),('MK010','Cumi Asam Manis','makanan',70000,0x31302E6A7067),('MN001','Jus Mangga','minuman',10000,0x312E706E67),('MN002','Es Teh Manis','minuman',5000,0x322E706E67),('MN003','Jus Sirsak','minuman',10000,0x33312E6A7067),('MN004','Teh Tarik','minuman',10000,0x34312E6A7067),('MN005','Strawberry Yogurt Smoothie','minuman',20000,0x35312E6A7067),('MN006','Mango Greek Yogurt Smoothie','minuman',25000,0x36312E6A7067),('MN007','Jus Lemon ','minuman',10000,0x37312E6A7067),('MN008','Jus Alpukat','minuman',10000,0x38312E6A7067),('MN009','Jus Apel','minuman',10000,0x39312E6A7067),('MN010','Jus Pisang','minuman',10000,0x3130312E6A7067);
/*!40000 ALTER TABLE `tbl_makanan` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `tbl_meja`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_meja` (
  `id_meja` char(10) NOT NULL,
  `isTersedia` enum('tersedia','tidak tersedia') DEFAULT NULL,
  PRIMARY KEY (`id_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_meja`
--

LOCK TABLES `tbl_meja` WRITE;
/*!40000 ALTER TABLE `tbl_meja` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `tbl_meja` VALUES ('MJ01','tersedia'),('MJ02','tidak tersedia'),('MJ03','tidak tersedia'),('MJ04','tidak tersedia'),('MJ05','tidak tersedia'),('MJ06','tidak tersedia'),('MJ07','tidak tersedia'),('MJ08','tersedia'),('MJ09','tersedia'),('MJ10','tidak tersedia');
/*!40000 ALTER TABLE `tbl_meja` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `tbl_pegawai`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pegawai` (
  `id_pegawai` char(10) NOT NULL,
  `id_jabatan` char(10) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`),
  KEY `id_jabatan` (`id_jabatan`),
  CONSTRAINT `tbl_pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tbl_jabatan` (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pegawai`
--

LOCK TABLES `tbl_pegawai` WRITE;
/*!40000 ALTER TABLE `tbl_pegawai` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `tbl_pegawai` VALUES ('P000','J00','homepage','-','homepagepass'),('P001','J01','manajer01','Ahmad Sholikhin','manajerpass'),('P002','J02','kasir01','Ridwan Hakim','kasirpass'),('P003','J03','kasir02','Anna Septiana','kasirpass'),('P004','J04','kasir03','Umar Abdul Aziz','kasirpass'),('P005','J05','manajer02','Muhammad Faisal','managerpass'),('P006','J06','kasir04','Asep Supriatna','kasirpass'),('P007','J07','kasir05','Dinda Ananda','kasirpass'),('P008','J08','kasir06','Yusuf Muhammad','kasirpass');
/*!40000 ALTER TABLE `tbl_pegawai` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `tbl_pemesanan`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pemesanan` (
  `id_pemesanan` char(10) NOT NULL,
  `id_pegawai` char(10) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pemesanan`),
  KEY `id_pegawai` (`id_pegawai`),
  CONSTRAINT `tbl_pemesanan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_pegawai` (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pemesanan`
--

LOCK TABLES `tbl_pemesanan` WRITE;
/*!40000 ALTER TABLE `tbl_pemesanan` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `tbl_pemesanan` VALUES ('PE1','P002','2018-01-01 00:00:00','Asep Pamungkas'),('PE2','P000','2018-01-02 00:00:00','Dadang Sudrajat'),('PE3','P000','2018-01-03 00:00:00','Tatang Wijaya'),('PE4','P002','2018-01-03 00:00:00','Badru Subarjah'),('PE5','P000','2018-01-03 00:00:00','Imas Sumana'),('PE6','P000','2018-01-16 02:25:35','Jujun Jubaedah'),('PE7','P000','2018-01-17 05:46:12','Dadang Kusnadi'),('PE8','P000','2018-01-17 05:47:09','Puad Syarifudin'),('PE9','P001','2018-01-17 09:06:40','Maman Komarudin');
/*!40000 ALTER TABLE `tbl_pemesanan` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `tbl_pesanmeja`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pesanmeja` (
  `id_pemesanan` char(10) NOT NULL,
  `id_meja` char(10) NOT NULL,
  KEY `id_pemesanan` (`id_pemesanan`),
  KEY `id_meja` (`id_meja`),
  CONSTRAINT `tbl_pesanmeja_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `tbl_pemesanan` (`id_pemesanan`),
  CONSTRAINT `tbl_pesanmeja_ibfk_2` FOREIGN KEY (`id_meja`) REFERENCES `tbl_meja` (`id_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pesanmeja`
--

LOCK TABLES `tbl_pesanmeja` WRITE;
/*!40000 ALTER TABLE `tbl_pesanmeja` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `tbl_pesanmeja` VALUES ('PE1','MJ01'),('PE2','MJ02'),('PE3','MJ03'),('PE4','MJ09'),('PE5','MJ05'),('PE6','MJ06'),('PE7','MJ04'),('PE8','MJ07'),('PE8','MJ10'),('PE9','MJ01'),('PE9','MJ09');
/*!40000 ALTER TABLE `tbl_pesanmeja` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `tbl_struk`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_struk` (
  `id_pemesanan` char(10) NOT NULL,
  `id_makanan` char(10) NOT NULL,
  `jmlh` int(11) NOT NULL,
  KEY `id_pemesanan` (`id_pemesanan`),
  KEY `id_makanan` (`id_makanan`),
  CONSTRAINT `tbl_struk_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `tbl_pemesanan` (`id_pemesanan`),
  CONSTRAINT `tbl_struk_ibfk_2` FOREIGN KEY (`id_makanan`) REFERENCES `tbl_makanan` (`id_makanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_struk`
--

LOCK TABLES `tbl_struk` WRITE;
/*!40000 ALTER TABLE `tbl_struk` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `tbl_struk` VALUES ('PE1','MK001',1),('PE1','MN002',2),('PE2','MK002',2),('PE2','MN001',3),('PE3','MK010',2),('PE3','MN004',2),('PE3','MN009',4),('PE4','MN007',5),('PE5','MK001',2),('PE5','MK004',3),('PE5','MN002',5),('PE5','MN006',3),('PE6','MK003',1),('PE7','MN006',1),('PE8','MK006',2),('PE9','MK010',3),('PE9','MN007',2),('PE9','MN003',3);
/*!40000 ALTER TABLE `tbl_struk` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Tue, 06 Feb 2018 10:25:11 +0700
