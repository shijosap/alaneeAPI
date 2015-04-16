/*
SQLyog Community v11.31 (64 bit)
MySQL - 5.5.20 : Database - soccerteam
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`soccerteam` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `soccerteam`;

/*Table structure for table `players` */

DROP TABLE IF EXISTS `players`;

CREATE TABLE `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) DEFAULT NULL,
  `firstname` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_url` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_team_id` (`team_id`),
  CONSTRAINT `fk_team_id` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `players` */

insert  into `players`(`id`,`team_id`,`firstname`,`lastname`,`image_url`) values (1,1,'Apoula Edima','Edel Bete','ATLETICO_DE_KOLKATA/Apoula_Edima_Edel_Bete.jpg'),(2,1,'Arnab','Mondal','ATLETICO_DE_KOLKATA/Arnab_Mondal.jpg'),(3,1,'Biswajit','Saha','ATLETICO_DE_KOLKATA/Biswajit_Saha.jpg'),(4,1,'Borja','Fernandez','ATLETICO_DE_KOLKATA/Borja_Fernandez.jpg'),(5,1,'Denzil','Franco','ATLETICO_DE_KOLKATA/Denzil_Franco.jpg'),(6,1,'Jose','Miguel','ATLETICO_DE_KOLKATA/Jose_Miguel.jpg'),(7,1,'Kingshuk','Debanath','ATLETICO_DE_KOLKATA/Kingshuk_Debanath.jpg'),(8,1,'Luis','Garcia','ATLETICO_DE_KOLKATA/Luis_Garcia.jpg'),(9,1,'Nallappan','Mohanraj','ATLETICO_DE_KOLKATA/Nallappan_Mohanraj.jpg'),(10,1,'Subhasish Roy','Chowdhury','ATLETICO_DE_KOLKATA/Subhasish_Roy_Chowdhury.jpg'),(11,1,'Sylvain','Monsoreau','ATLETICO_DE_KOLKATA/Sylvain_Monsoreau.jpg'),(12,2,'Abhijit','Mondal','CHENNAIYIN_FC/Abhijit_Mondal.jpg'),(13,2,'Abhiskek','Das','CHENNAIYIN_FC/Abhiskek_Das.jpg'),(14,2,'Alessandro','Nesta','CHENNAIYIN_FC/Alessandro_Nesta.jpg'),(15,2,'Bernard','Mendy','CHENNAIYIN_FC/Bernard_Mendy.jpg'),(16,2,'Dhanachandra','Singh','CHENNAIYIN_FC/Dhanachandra_Singh.jpg'),(17,2,'Elano','Blumer','CHENNAIYIN_FC/Elano_Blumer.jpg'),(18,2,'Francesco','Franzese','CHENNAIYIN_FC/Francesco_Franzese.jpg'),(19,2,'Gennaro','Bracigliano','CHENNAIYIN_FC/Gennaro_Bracigliano.jpg'),(20,2,'Gouramangi','Singh','CHENNAIYIN_FC/Gouramangi_Singh.jpg'),(21,2,'Jairo','Andres','CHENNAIYIN_FC/Jairo_Andres.jpg'),(22,2,'Shilton','Paul','CHENNAIYIN_FC/Shilton_Paul.jpg'),(23,3,'Alessandro','Del Piero','DELHI_DYNAMOS_FC/Alessandro_Del_Piero.jpg'),(24,3,'Anwar','Ali','DELHI_DYNAMOS_FC/Anwar_Ali.jpg'),(25,3,'Govin','Singh','DELHI_DYNAMOS_FC/Govin_Singh.jpg'),(26,3,'Jagroop','Singh','DELHI_DYNAMOS_FC/Jagroop_Singh.jpg'),(27,3,'Kristof','Van Hout','DELHI_DYNAMOS_FC/Kristof_Van_Hout.jpg'),(28,3,'Marek','Cech','DELHI_DYNAMOS_FC/Marek_Cech.jpg'),(29,3,'Munmun','Timothy Lugun','DELHI_DYNAMOS_FC/Munmun_Timothy_Lugun.jpg'),(30,3,'Naoba','Singh','DELHI_DYNAMOS_FC/Naoba_Singh.jpg'),(31,3,'Robert','Lalthlamuana','DELHI_DYNAMOS_FC/Robert_Lalthlamuana.jpg'),(32,3,'Shouvik','Gosh','DELHI_DYNAMOS_FC/Shouvik_Gosh.jpg'),(33,3,'Stijn','Houben','DELHI_DYNAMOS_FC/Stijn_Houben.jpg'),(34,4,'Andre','Clarindo','FC_GOA/Andre_Clarindo.jpg'),(35,4,'Debabrata','Roy','FC_GOA/Debabrata_Roy.jpg'),(36,4,'Gregory','Arnolin','FC_GOA/Gregory_Arnolin.jpg'),(37,4,'Gurpreet','Singh Chabhal','FC_GOA/Gurpreet_Singh_Chabhal.jpg'),(38,4,'Jan','Seda','FC_GOA/Jan_Seda.jpg'),(39,4,'Laxmikanth','Kattimani','FC_GOA/Laxmikanth_Kattimani.jpg'),(40,4,'Narayan','Das','FC_GOA/Narayan_Das.jpg'),(41,4,'Prabir','Das','FC_GOA/Prabir_Das.jpg'),(42,4,'Robert','Pires','FC_GOA/Robert_Pires.jpg'),(43,4,'Rowilson','Rodrigues','FC_GOA/Rowilson_Rodrigues.jpg'),(44,4,'Youness','Bengelloun','FC_GOA/Youness_Bengelloun.jpg');

/*Table structure for table `team` */

DROP TABLE IF EXISTS `team`;

CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `logo_url` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `team` */

insert  into `team`(`id`,`name`,`logo_url`) values (1,'ATLETICO DE KOLKATA','ATLETICO_DE_KOLKATA/499.png'),(2,'CHENNAIYIN_FC','CHENNAIYIN_FC/505.png'),(3,'DELHI DYNAMOS FC','DELHI_DYNAMOS_FC/500.png'),(4,'FC GOA','FC_GOA/496.png');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
