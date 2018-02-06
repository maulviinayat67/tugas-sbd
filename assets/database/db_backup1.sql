#
# TABLE STRUCTURE FOR: tbl_jabatan
#

DROP TABLE IF EXISTS `tbl_jabatan`;

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` char(10) NOT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `level` enum('kasir','manajer','pemesan') DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_jabatan` (`id_jabatan`, `jabatan`, `level`) VALUES (J00, Pemesan, pemesan);
INSERT INTO `tbl_jabatan` (`id_jabatan`, `jabatan`, `level`) VALUES (J01, Manajer, manajer);
INSERT INTO `tbl_jabatan` (`id_jabatan`, `jabatan`, `level`) VALUES (J02, Pegawai tidak Tetap, kasir);
INSERT INTO `tbl_jabatan` (`id_jabatan`, `jabatan`, `level`) VALUES (J03, Pegawai Tetap, kasir);
INSERT INTO `tbl_jabatan` (`id_jabatan`, `jabatan`, `level`) VALUES (J04, Pegawai tidak Tetap, kasir);
INSERT INTO `tbl_jabatan` (`id_jabatan`, `jabatan`, `level`) VALUES (J05, HRD, manajer);
INSERT INTO `tbl_jabatan` (`id_jabatan`, `jabatan`, `level`) VALUES (J06, Pegawai Tetap, kasir);
INSERT INTO `tbl_jabatan` (`id_jabatan`, `jabatan`, `level`) VALUES (J07, Pegawai Tetap, kasir);
INSERT INTO `tbl_jabatan` (`id_jabatan`, `jabatan`, `level`) VALUES (J08, Pegawai tidak Tetap, kasir);
INSERT INTO `tbl_jabatan` (`id_jabatan`, `jabatan`, `level`) VALUES (J09, Pegawai Tetap, kasir);


#
# TABLE STRUCTURE FOR: tbl_makanan
#

DROP TABLE IF EXISTS `tbl_makanan`;

CREATE TABLE `tbl_makanan` (
  `id_makanan` char(10) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tipe` enum('makanan','minuman') DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `gambar` blob,
  PRIMARY KEY (`id_makanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MK001, Kepiting Asam Manis, makanan, 15000, 1.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MK002, Udang Goreng Tepung Asam Manis, makanan, 70000, 2.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MK003, Udang Telur Asin, makanan, 70000, 3.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MK004, Ikan Bakar Gurame, makanan, 60000, 4.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MK005, Kepiting Telur Asin, makanan, 150000, 5.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MK006, Lobster Asam Manis Pedas, makanan, 120000, 6.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MK007, Ikan Bawal Asam Manis, makanan, 60000, 7.JPG);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MK008, Kerang Kepa Taucho, makanan, 40000, 8.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MK009, Ikan Nilla Goreng, makanan, 40000, 9.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MK010, Cumi Asam Manis, makanan, 70000, 10.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MN001, Jus Mangga, minuman, 10000, 1.png);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MN002, Es Teh Manis, minuman, 5000, 2.png);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MN003, Jus Sirsak, minuman, 10000, 31.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MN004, Teh Tarik, minuman, 10000, 41.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MN005, Strawberry Yogurt Smoothie, minuman, 20000, 51.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MN006, Mango Greek Yogurt Smoothie, minuman, 25000, 61.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MN007, Jus Lemon , minuman, 10000, 71.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MN008, Jus Alpukat, minuman, 10000, 81.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MN009, Jus Apel, minuman, 10000, 91.jpg);
INSERT INTO `tbl_makanan` (`id_makanan`, `nama`, `tipe`, `harga`, `gambar`) VALUES (MN010, Jus Pisang, minuman, 10000, 101.jpg);


#
# TABLE STRUCTURE FOR: tbl_meja
#

DROP TABLE IF EXISTS `tbl_meja`;

CREATE TABLE `tbl_meja` (
  `id_meja` char(10) NOT NULL,
  `isTersedia` enum('tersedia','tidak tersedia') DEFAULT NULL,
  PRIMARY KEY (`id_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_meja` (`id_meja`, `isTersedia`) VALUES (MJ01, tidak tersedia);
INSERT INTO `tbl_meja` (`id_meja`, `isTersedia`) VALUES (MJ02, tersedia);
INSERT INTO `tbl_meja` (`id_meja`, `isTersedia`) VALUES (MJ03, tidak tersedia);
INSERT INTO `tbl_meja` (`id_meja`, `isTersedia`) VALUES (MJ04, tersedia);
INSERT INTO `tbl_meja` (`id_meja`, `isTersedia`) VALUES (MJ05, tersedia);
INSERT INTO `tbl_meja` (`id_meja`, `isTersedia`) VALUES (MJ06, tidak tersedia);
INSERT INTO `tbl_meja` (`id_meja`, `isTersedia`) VALUES (MJ07, tidak tersedia);
INSERT INTO `tbl_meja` (`id_meja`, `isTersedia`) VALUES (MJ08, tidak tersedia);
INSERT INTO `tbl_meja` (`id_meja`, `isTersedia`) VALUES (MJ09, tidak tersedia);
INSERT INTO `tbl_meja` (`id_meja`, `isTersedia`) VALUES (MJ10, tidak tersedia);


#
# TABLE STRUCTURE FOR: tbl_pegawai
#

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

INSERT INTO `tbl_pegawai` (`id_pegawai`, `id_jabatan`, `username`, `nama`, `password`) VALUES (P000, J00, homepage, -, homepagepass);
INSERT INTO `tbl_pegawai` (`id_pegawai`, `id_jabatan`, `username`, `nama`, `password`) VALUES (P001, J01, manajer01, Ahmad Sholikhin, manajerpass);
INSERT INTO `tbl_pegawai` (`id_pegawai`, `id_jabatan`, `username`, `nama`, `password`) VALUES (P002, J02, kasir01, Ridwan Hakim, kasirpass);
INSERT INTO `tbl_pegawai` (`id_pegawai`, `id_jabatan`, `username`, `nama`, `password`) VALUES (P003, J03, kasir02, Anna Septiana, kasirpass);
INSERT INTO `tbl_pegawai` (`id_pegawai`, `id_jabatan`, `username`, `nama`, `password`) VALUES (P004, J04, kasir03, Umar Abdul Aziz, kasirpass);
INSERT INTO `tbl_pegawai` (`id_pegawai`, `id_jabatan`, `username`, `nama`, `password`) VALUES (P005, J05, manajer02, Muhammad Faisal, managerpass);
INSERT INTO `tbl_pegawai` (`id_pegawai`, `id_jabatan`, `username`, `nama`, `password`) VALUES (P006, J06, kasir04, Asep Supriatna, kasirpass);
INSERT INTO `tbl_pegawai` (`id_pegawai`, `id_jabatan`, `username`, `nama`, `password`) VALUES (P007, J07, kasir05, Dinda Ananda, kasirpass);
INSERT INTO `tbl_pegawai` (`id_pegawai`, `id_jabatan`, `username`, `nama`, `password`) VALUES (P008, J08, kasir06, Yusuf Muhammad, kasirpass);


#
# TABLE STRUCTURE FOR: tbl_pemesanan
#

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

INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `id_pegawai`, `tanggal`, `nama_pemesan`) VALUES (PE1, P002, 2018-01-01 00:00:00, Asep Pamungkas);
INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `id_pegawai`, `tanggal`, `nama_pemesan`) VALUES (PE10, P000, 2018-01-23 11:05:06, maulvi);
INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `id_pegawai`, `tanggal`, `nama_pemesan`) VALUES (PE11, P001, 2018-01-24 07:55:08, Komaruddin);
INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `id_pegawai`, `tanggal`, `nama_pemesan`) VALUES (PE2, P001, 2018-01-02 00:00:00, Dadang Sudrajat);
INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `id_pegawai`, `tanggal`, `nama_pemesan`) VALUES (PE3, P000, 2018-01-03 00:00:00, Tatang Wijaya);
INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `id_pegawai`, `tanggal`, `nama_pemesan`) VALUES (PE4, P002, 2018-01-03 00:00:00, Badru Subarjah);
INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `id_pegawai`, `tanggal`, `nama_pemesan`) VALUES (PE5, P001, 2018-01-03 00:00:00, Imas Sumana);
INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `id_pegawai`, `tanggal`, `nama_pemesan`) VALUES (PE6, P000, 2018-01-16 02:25:35, Jujun Jubaedah);
INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `id_pegawai`, `tanggal`, `nama_pemesan`) VALUES (PE7, P001, 2018-01-17 05:46:12, Dadang Kusnadi);
INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `id_pegawai`, `tanggal`, `nama_pemesan`) VALUES (PE8, P000, 2018-01-17 05:47:09, Puad Syarifudin);
INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `id_pegawai`, `tanggal`, `nama_pemesan`) VALUES (PE9, P001, 2018-01-17 09:06:40, Maman Komarudin);


#
# TABLE STRUCTURE FOR: tbl_pesanmeja
#

DROP TABLE IF EXISTS `tbl_pesanmeja`;

CREATE TABLE `tbl_pesanmeja` (
  `id_pemesanan` char(10) NOT NULL,
  `id_meja` char(10) NOT NULL,
  KEY `id_pemesanan` (`id_pemesanan`),
  KEY `id_meja` (`id_meja`),
  CONSTRAINT `tbl_pesanmeja_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `tbl_pemesanan` (`id_pemesanan`),
  CONSTRAINT `tbl_pesanmeja_ibfk_2` FOREIGN KEY (`id_meja`) REFERENCES `tbl_meja` (`id_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_pesanmeja` (`id_pemesanan`, `id_meja`) VALUES (PE1, MJ01);
INSERT INTO `tbl_pesanmeja` (`id_pemesanan`, `id_meja`) VALUES (PE2, MJ02);
INSERT INTO `tbl_pesanmeja` (`id_pemesanan`, `id_meja`) VALUES (PE3, MJ03);
INSERT INTO `tbl_pesanmeja` (`id_pemesanan`, `id_meja`) VALUES (PE4, MJ09);
INSERT INTO `tbl_pesanmeja` (`id_pemesanan`, `id_meja`) VALUES (PE5, MJ05);
INSERT INTO `tbl_pesanmeja` (`id_pemesanan`, `id_meja`) VALUES (PE6, MJ06);
INSERT INTO `tbl_pesanmeja` (`id_pemesanan`, `id_meja`) VALUES (PE7, MJ04);
INSERT INTO `tbl_pesanmeja` (`id_pemesanan`, `id_meja`) VALUES (PE8, MJ07);
INSERT INTO `tbl_pesanmeja` (`id_pemesanan`, `id_meja`) VALUES (PE8, MJ10);
INSERT INTO `tbl_pesanmeja` (`id_pemesanan`, `id_meja`) VALUES (PE9, MJ01);
INSERT INTO `tbl_pesanmeja` (`id_pemesanan`, `id_meja`) VALUES (PE9, MJ09);
INSERT INTO `tbl_pesanmeja` (`id_pemesanan`, `id_meja`) VALUES (PE11, MJ02);


#
# TABLE STRUCTURE FOR: tbl_struk
#

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

INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE1, MK001, 1);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE1, MN002, 2);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE2, MK002, 2);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE2, MN001, 3);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE3, MK010, 2);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE3, MN004, 2);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE3, MN009, 4);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE4, MN007, 5);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE5, MK001, 2);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE5, MK004, 3);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE5, MN002, 5);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE5, MN006, 3);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE6, MK003, 1);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE7, MN006, 1);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE8, MK006, 2);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE9, MK010, 3);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE9, MN007, 2);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE9, MN003, 3);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE11, MK001, 2);
INSERT INTO `tbl_struk` (`id_pemesanan`, `id_makanan`, `jmlh`) VALUES (PE11, MN001, 1);


