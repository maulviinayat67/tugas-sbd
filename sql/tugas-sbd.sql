/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.22-MariaDB : Database - db_tugas_sbd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tbl_jabatan` */

DROP TABLE IF EXISTS `tbl_jabatan`;

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` char(10) NOT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_jabatan` */

/*Table structure for table `tbl_makanan` */

DROP TABLE IF EXISTS `tbl_makanan`;

CREATE TABLE `tbl_makanan` (
  `id_makanan` char(10) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tipe` enum('makanan','minuman') DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_makanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_makanan` */

/*Table structure for table `tbl_meja` */

DROP TABLE IF EXISTS `tbl_meja`;

CREATE TABLE `tbl_meja` (
  `id_meja` char(10) NOT NULL,
  `isTersedia` enum('tersedia','tidak tersedia') DEFAULT NULL,
  PRIMARY KEY (`id_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_meja` */

/*Table structure for table `tbl_pegawai` */

DROP TABLE IF EXISTS `tbl_pegawai`;

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

/*Data for the table `tbl_pegawai` */

/*Table structure for table `tbl_pemesanan` */

DROP TABLE IF EXISTS `tbl_pemesanan`;

CREATE TABLE `tbl_pemesanan` (
  `id_pemesanan` char(10) NOT NULL,
  `id_pegawai` char(10) NOT NULL,
  `total_harga` int(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_pemesanan`),
  KEY `id_pegawai` (`id_pegawai`),
  CONSTRAINT `tbl_pemesanan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_pegawai` (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pemesanan` */

/*Table structure for table `tbl_pesanmeja` */

DROP TABLE IF EXISTS `tbl_pesanmeja`;

CREATE TABLE `tbl_pesanmeja` (
  `id_pemesanan` char(10) NOT NULL,
  `id_meja` char(10) NOT NULL,
  KEY `id_pemesanan` (`id_pemesanan`),
  KEY `id_meja` (`id_meja`),
  CONSTRAINT `tbl_pesanmeja_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `tbl_pemesanan` (`id_pemesanan`),
  CONSTRAINT `tbl_pesanmeja_ibfk_2` FOREIGN KEY (`id_meja`) REFERENCES `tbl_meja` (`id_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pesanmeja` */

/*Table structure for table `tbl_struk` */

DROP TABLE IF EXISTS `tbl_struk`;

CREATE TABLE `tbl_struk` (
  `id_pemesanan` char(10) NOT NULL,
  `id_makanan` char(10) NOT NULL,
  KEY `id_pemesanan` (`id_pemesanan`),
  KEY `id_makanan` (`id_makanan`),
  CONSTRAINT `tbl_struk_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `tbl_pemesanan` (`id_pemesanan`),
  CONSTRAINT `tbl_struk_ibfk_2` FOREIGN KEY (`id_makanan`) REFERENCES `tbl_makanan` (`id_makanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_struk` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
