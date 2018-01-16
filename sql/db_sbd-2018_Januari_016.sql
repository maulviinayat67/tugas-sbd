/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.13-MariaDB : Database - db_tugas_sbd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_tugas_sbd` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_tugas_sbd`;

/*Table structure for table `tbl_jabatan` */

DROP TABLE IF EXISTS `tbl_jabatan`;

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` char(10) NOT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `level` enum('kasir','manajer','pemesan') DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_jabatan` */

insert  into `tbl_jabatan`(`id_jabatan`,`jabatan`,`level`) values 
('J00','Pemesan','pemesan'),
('J01','Manajer','manajer'),
('J02','Pegawai tidak Tetap','kasir'),
('J03','Pegawai Tetap','kasir'),
('J04','Pegawai tidak Tetap','kasir'),
('J05','HRD','manajer'),
('J06','Pegawai Tetap','kasir'),
('J07','Pegawai Tetap','kasir'),
('J08','Pegawai tidak Tetap','kasir'),
('J09','Pegawai Tetap','kasir');

/*Table structure for table `tbl_makanan` */

DROP TABLE IF EXISTS `tbl_makanan`;

CREATE TABLE `tbl_makanan` (
  `id_makanan` char(10) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tipe` enum('makanan','minuman') DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `gambar` blob,
  PRIMARY KEY (`id_makanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_makanan` */

insert  into `tbl_makanan`(`id_makanan`,`nama`,`tipe`,`harga`,`gambar`) values 
('MK001','Kepiting Asam Manis','makanan',15000,'1.jpg'),
('MK002','Udang Goreng Tepung Asam Manis','makanan',70000,'2.jpg'),
('MK003','Udang Telur Asin','makanan',70000,'3.jpg'),
('MK004','Ikan Bakar Gurame','makanan',60000,'4.jpg'),
('MK005','Kepiting Telur Asin','makanan',150000,'5.jpg'),
('MK006','Lobster Asam Manis Pedas','makanan',120000,'6.jpg'),
('MK007','Ikan Bawal Asam Manis','makanan',60000,'7.JPG'),
('MK008','Kerang Kepa Taucho','makanan',40000,'8.jpg'),
('MK009','Ikan Nilla Goreng','makanan',40000,'9.jpg'),
('MK010','Cumi Asam Manis','makanan',70000,'10.jpg'),
('MN001','Jus Mangga','minuman',10000,'1.png'),
('MN002','Es Teh Manis','minuman',5000,'2.png'),
('MN003','Jus Sirsak','minuman',10000,'31.jpg'),
('MN004','Teh Tarik','minuman',10000,'41.jpg'),
('MN005','Strawberry Yogurt Smoothie','minuman',20000,'51.jpg'),
('MN006','Mango Greek Yogurt Smoothie','minuman',25000,'61.jpg'),
('MN007','Jus Lemon ','minuman',10000,'71.jpg'),
('MN008','Jus Alpukat','minuman',10000,'81.jpg'),
('MN009','Jus Apel','minuman',10000,'91.jpg'),
('MN010','Jus Pisang','minuman',10000,'101.jpg');

/*Table structure for table `tbl_meja` */

DROP TABLE IF EXISTS `tbl_meja`;

CREATE TABLE `tbl_meja` (
  `id_meja` char(10) NOT NULL,
  `isTersedia` enum('tersedia','tidak tersedia') DEFAULT NULL,
  PRIMARY KEY (`id_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_meja` */

insert  into `tbl_meja`(`id_meja`,`isTersedia`) values 
('MJ01','tidak tersedia'),
('MJ02','tidak tersedia'),
('MJ03','tidak tersedia'),
('MJ04','tidak tersedia'),
('MJ05','tidak tersedia'),
('MJ06','tidak tersedia'),
('MJ07','tersedia'),
('MJ08','tersedia'),
('MJ09','tidak tersedia'),
('MJ10','tersedia');

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

insert  into `tbl_pegawai`(`id_pegawai`,`id_jabatan`,`username`,`nama`,`password`) values 
('P000','J00','homepage','-','homepagepass'),
('P001','J01','manajer01','Ahmad Sholikhin','manajerpass'),
('P002','J02','kasir01','Ridwan Hakim','kasirpass'),
('P003','J03','kasir02','Anna Septiana','kasirpass'),
('P004','J04','kasir03','Umar Abdul Aziz','kasirpass'),
('P005','J05','manajer02','Muhammad Faisal','managerpass'),
('P006','J06','kasir04','Asep Supriatna','kasirpass'),
('P007','J07','kasir05','Dinda Ananda','kasirpass'),
('P008','J08','kasir06','Yusuf Muhammad','kasirpass');

/*Table structure for table `tbl_pemesanan` */

DROP TABLE IF EXISTS `tbl_pemesanan`;

CREATE TABLE `tbl_pemesanan` (
  `id_pemesanan` char(10) NOT NULL,
  `id_pegawai` char(10) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pemesanan`),
  KEY `id_pegawai` (`id_pegawai`),
  CONSTRAINT `tbl_pemesanan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_pegawai` (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pemesanan` */

insert  into `tbl_pemesanan`(`id_pemesanan`,`id_pegawai`,`tanggal`,`nama_pemesan`) values 
('PE1','P000','2018-01-01 00:00:00','Asep Pamungkas'),
('PE2','P000','2018-01-02 00:00:00','Dadang Sudrajat'),
('PE3','P000','2018-01-03 00:00:00','Tatang Wijaya'),
('PE4','P000','2018-01-03 00:00:00','Badru Subarjah'),
('PE5','P000','2018-01-03 00:00:00','Imas Sumana'),
('PE6','P000','2018-01-16 02:25:35','Jujun Jubaedah');

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

insert  into `tbl_pesanmeja`(`id_pemesanan`,`id_meja`) values 
('PE1','MJ01'),
('PE2','MJ02'),
('PE3','MJ03'),
('PE4','MJ09'),
('PE5','MJ05'),
('PE6','MJ06');

/*Table structure for table `tbl_struk` */

DROP TABLE IF EXISTS `tbl_struk`;

CREATE TABLE `tbl_struk` (
  `id_pemesanan` char(10) NOT NULL,
  `id_makanan` char(10) NOT NULL,
  `jmlh` int(11) NOT NULL,
  KEY `id_pemesanan` (`id_pemesanan`),
  KEY `id_makanan` (`id_makanan`),
  CONSTRAINT `tbl_struk_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `tbl_pemesanan` (`id_pemesanan`),
  CONSTRAINT `tbl_struk_ibfk_2` FOREIGN KEY (`id_makanan`) REFERENCES `tbl_makanan` (`id_makanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_struk` */

insert  into `tbl_struk`(`id_pemesanan`,`id_makanan`,`jmlh`) values 
('PE1','MK001',1),
('PE1','MN002',2),
('PE2','MK002',2),
('PE2','MN001',3),
('PE3','MK010',2),
('PE3','MN004',2),
('PE3','MN009',4),
('PE4','MN007',5),
('PE5','MK001',2),
('PE5','MK004',3),
('PE5','MN002',5),
('PE5','MN006',3),
('PE6','MK003',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
