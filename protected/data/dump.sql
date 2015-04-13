/*
SQLyog Ultimate v9.50 
MySQL - 5.5.25 : Database - fibrum
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fibrum` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `fibrum`;

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_slider` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `gallery` */

insert  into `gallery`(`id`,`path`,`name`,`is_slider`) values (19,'04_13_2015_b1a56eae3b1a2d10877d903f16594cd8','Chrysanthemum.jpg',0),(20,'04_13_2015_04eec622ad203e0c9cb5f8c43958e63e','Koala.jpg',0),(21,'04_13_2015_50df940a0eae832129dac9f678dd6e0f','Chrysanthemum.jpg',0),(22,'04_13_2015_19826b55b5c846a5e2b76b6e02b83990','Desert.jpg',0),(23,'04_13_2015_c4257d13e16bd04a16214f85c5fc0c76','Desert.jpg',0),(24,'04_13_2015_19f389627a7c6f57416ea9badc921cd3','Lighthouse.jpg',0);

/*Table structure for table `text_blocks` */

DROP TABLE IF EXISTS `text_blocks`;

CREATE TABLE `text_blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `text_ru` text,
  `text_en` text,
  `android_enabled` tinyint(1) DEFAULT NULL,
  `ios_enabled` tinyint(1) DEFAULT NULL,
  `desktop_enabled` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `text_blocks` */

insert  into `text_blocks`(`id`,`title`,`text_ru`,`text_en`,`android_enabled`,`ios_enabled`,`desktop_enabled`) values (1,'Android text','<p>\r\n	Android text Русский текст</p>\r\n','<p>\r\n	Android text English text</p>\r\n',1,0,0),(7,'Desktop text','desctop русский \r\n','desctop english \r\n',0,0,1),(8,'IOs text','<p>\r\n	IOs русский&nbsp;</p>\r\n','<p>\r\n	IOs english</p>\r\n',0,1,0);

/*Table structure for table `video` */

DROP TABLE IF EXISTS `video`;

CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `video` */

insert  into `video`(`id`,`path`,`name`,`description`,`enable`) values (1,'_ON6f5l32iw','Name','<p>\r\n	Some descriptionфыв</p>\r\n',1),(2,'yImhp8cvleU','One else video','<p>\r\n	Какое то описание</p>\r\n',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
