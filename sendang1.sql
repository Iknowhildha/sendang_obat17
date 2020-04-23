/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - sendang
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `sendang`;

/*Table structure for table `detail_transaksi` */

DROP TABLE IF EXISTS `detail_transaksi`;

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(11) DEFAULT NULL,
  `id_obat` varchar(11) DEFAULT NULL,
  `id_stok` int(11) DEFAULT NULL,
  `harga` int(50) DEFAULT NULL,
  `qty` int(50) DEFAULT NULL,
  `total` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_transaksi` */

insert  into `detail_transaksi`(`id_transaksi`,`id_obat`,`id_stok`,`harga`,`qty`,`total`) values 
(7,'bjwue7863',4,4000,4,16000),
(7,'28AJSHD2',1,5000,3,15000),
(8,'nxsdwk6732',5,3000,1,3000),
(8,'732jhdd89',2,5000,1,5000),
(9,'snxd89328',7,21000,1,21000),
(9,'nxsdwk6732',5,3000,4,12000),
(12,'nxsdwk6732',5,3000,1,3000),
(15,'nxsdwk6732',5,3000,5,15000),
(16,'nxsdwk6732',5,3000,5,15000),
(17,'nxsdwk6732',5,3000,25,75000);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`) values 
(1,'Obat bebasb'),
(2,'Obat Bebas Terbatas'),
(3,'Obat Keras (dengan resep dokter)'),
(4,'Jamu (Empirical based herbal medicine)'),
(5,'Obat Herbal Terstandar (Scientific based herbal medicine)');

/*Table structure for table `obat` */

DROP TABLE IF EXISTS `obat`;

CREATE TABLE `obat` (
  `id_obat` varchar(11) NOT NULL,
  `nama_obat` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `obat` */

insert  into `obat`(`id_obat`,`nama_obat`,`id_kategori`,`keterangan`) values 
('28AJSHD2','Livron B Plex',1,'vitamin tubuhh'),
('732jhdd89','Antimo Dimenhydrinate',2,'obat anti mabuk'),
('bjwue7863','Pilkita Pegal Linu Cair',4,'Menghilangkan rasa linu'),
('nxid68ded','Stimuno Forte Imunomodulator',6,'Obat untuk daya tahan tubuh'),
('nxsdwk6732','Tolak Angin Sidomuncul',5,'Mencegah masuk angin'),
('snxd89328','Penisilin',3,'obat diabetes');

/*Table structure for table `stok` */

DROP TABLE IF EXISTS `stok`;

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL AUTO_INCREMENT,
  `stok_masuk` int(11) DEFAULT NULL,
  `stok_sekarang` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `harga_beli` int(100) DEFAULT NULL,
  `harga_jual` int(100) DEFAULT NULL,
  `profit` int(100) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_kadaluarsa` date DEFAULT NULL,
  `id_obat` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_stok`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `stok` */

insert  into `stok`(`id_stok`,`stok_masuk`,`stok_sekarang`,`satuan`,`harga_beli`,`harga_jual`,`profit`,`tgl_masuk`,`tgl_kadaluarsa`,`id_obat`) values 
(5,50,0,'strip',2500,3000,500,'2020-03-16','2024-03-24','nxsdwk6732'),
(6,55,40,'strip',22000,23000,1000,'2020-03-17','2024-03-25','nxid68ded'),
(7,40,40,'strip',20000,21000,1000,'2020-03-18','2025-03-27','snxd89328');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `no_invoice` varchar(50) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `total_bayar` int(100) DEFAULT NULL,
  `jumlah_bayar` int(100) DEFAULT NULL,
  `kembalian` int(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id_transaksi`,`no_invoice`,`tgl_transaksi`,`total_bayar`,`jumlah_bayar`,`kembalian`,`user_id`) values 
(7,'SDG00120200410','2020-04-10',31000,35000,4000,1),
(8,'SDG00220200410','2020-04-10',8000,10000,2000,1),
(9,'SDG00320200412','2020-04-12',33000,35000,2000,2),
(10,'SDG00420200416','2020-04-16',3000,10000,7000,1),
(11,'SDG00520200416','2020-04-16',15000,35000,20000,1),
(12,'SDG00620200416','2020-04-16',3000,10000,7000,1),
(13,'SDG00720200416','2020-04-16',105000,150000,45000,1),
(14,'SDG00820200416','2020-04-16',15000,20000,5000,1),
(15,'SDG00920200416','2020-04-16',15000,20000,5000,1),
(16,'SDG01020200416','2020-04-16',15000,20000,5000,1),
(17,'SDG01120200416','2020-04-16',75000,150000,75000,1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `alamat` text,
  `level` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`,`nama`,`nohp`,`alamat`,`level`) values 
(1,'hildha','hildha','Hildha Wahidah','087774532655','Kediri','Owner'),
(2,'rizia','rizia','Rizia Ardhyanti','089786453245','Ngajuk','Pegawai');

/* Trigger structure for table `detail_transaksi` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `pengurangan_stok` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `pengurangan_stok` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
UPDATE stok 
set stok_sekarang = stok_sekarang - NEW.qty
where 
id_stok = NEW.id_stok;
END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
