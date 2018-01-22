CREATE TABLE `tbl_contoh` (
  `id_contoh` char(10) NOT NULL,
  `isi` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_contoh`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_contoh` (`id_contoh`, `isi`) VALUES ('C00','ini adalah contoh restore database' );
SELECT * FROM `tbl_contoh`;
