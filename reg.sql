/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 5.5.41 : Database - reg
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`reg` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `reg`;

/*Table structure for table `course` */

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `course` */

insert  into `course`(`id`,`code`,`name`) values (1,'ICE','Intensive Course for English (ICE)');
insert  into `course`(`id`,`code`,`name`) values (2,'ADELT','Advanced Diploma in English Language Teaching (ADELT)');

/*Table structure for table `register` */

DROP TABLE IF EXISTS `register`;

CREATE TABLE `register` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `courseid` int(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `divisional_secretariat` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `workplace` varchar(100) DEFAULT NULL,
  `workplace_address` varchar(100) DEFAULT NULL,
  `highest_education_qualifications` varchar(100) DEFAULT NULL,
  `file_nic` blob,
  `file_birth_certificate` blob,
  `file_ol` blob,
  `file_al` blob,
  `file_payment` blob,
  `student_number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_course_key_1` (`courseid`),
  CONSTRAINT `fk_course_key_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `register` */

insert  into `register`(`id`,`courseid`,`email`,`name`,`nic`,`number`,`age`,`district`,`divisional_secretariat`,`occupation`,`workplace`,`workplace_address`,`highest_education_qualifications`,`file_nic`,`file_birth_certificate`,`file_ol`,`file_al`,`file_payment`,`student_number`) values (1,1,'test@gmail.com','test','971133992V','0776318154',21,'Dis','Col','SE','Work','Address','O/L',NULL,NULL,NULL,NULL,NULL,'ICE0001');
insert  into `register`(`id`,`courseid`,`email`,`name`,`nic`,`number`,`age`,`district`,`divisional_secretariat`,`occupation`,`workplace`,`workplace_address`,`highest_education_qualifications`,`file_nic`,`file_birth_certificate`,`file_ol`,`file_al`,`file_payment`,`student_number`) values (7,1,'hariharankim@gmail.com','Hariharan','622143143V','0776318136',21,'Kolannawa','Colombo','Software Engineer','Zeno','Address','Diploma','1604973232_68d5bfa477fb4545ead6.pdf','1604973232_7e6db5810a99194467d2.png','','',NULL,'ICE0002');
insert  into `register`(`id`,`courseid`,`email`,`name`,`nic`,`number`,`age`,`district`,`divisional_secretariat`,`occupation`,`workplace`,`workplace_address`,`highest_education_qualifications`,`file_nic`,`file_birth_certificate`,`file_ol`,`file_al`,`file_payment`,`student_number`) values (8,1,'hariharankim@gmail.com','Hariharan','622143143V','0776318136',21,'Kolannawa','Colombo','Software Engineer','Zeno','Address','Diploma','1604974232_ae7ae53e3d570beb2d44.pdf','1604974232_fc44efeb77834ba692b4.png','1604974232_ba05b3edb5079956a6f2.pdf','n/a','1604978225_f9251e4e78ee9e10a4a2.png','ICE0003');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
