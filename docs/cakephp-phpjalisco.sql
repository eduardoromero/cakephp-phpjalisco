-- Adminer 4.2.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `cakephp-phpjalisco`;
CREATE DATABASE `cakephp-phpjalisco` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cakephp-phpjalisco`;

DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(128) DEFAULT NULL,
  `state_id` varchar(64) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cities` (`id`, `city`, `state_id`, `created`, `modified`) VALUES
(1,	'Guadalajara',	'14',	'2016-01-26 23:48:14',	'2016-01-26 23:48:14'),
(2,	'Puerto Vallarta',	'14',	'2016-01-26 23:48:23',	'2016-01-26 23:48:23'),
(3,	'Bahía de Banderas',	'17',	'2016-01-26 23:49:07',	'2016-01-26 23:49:07'),
(4,	'Manzanillo',	'7',	'2016-01-26 23:49:16',	'2016-01-26 23:49:16'),
(5,	'Cabo Pulmo',	'2',	'2016-01-26 23:49:36',	'2016-01-26 23:49:36'),
(6,	'Cabo San Lucas',	'2',	'2016-01-26 23:49:42',	'2016-01-26 23:49:42'),
(7,	'San José del Cabo',	'2',	'2016-01-26 23:49:47',	'2016-01-26 23:49:47'),
(8,	'La Paz',	'2',	'2016-01-26 23:49:56',	'2016-01-26 23:49:56'),
(9,	'Todo Santos',	'2',	'2016-01-26 23:50:04',	'2016-01-26 23:51:22');

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `cover` tinyint(4) DEFAULT NULL,
  `rental_id` binary(36) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_media_rentals_idx` (`rental_id`),
  CONSTRAINT `fk_media_rentals` FOREIGN KEY (`rental_id`) REFERENCES `rentals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Media can be a Photo or a Video';


DROP TABLE IF EXISTS `owners`;
CREATE TABLE `owners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `email` varchar(192) DEFAULT NULL,
  `average_rating` float DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `owners` (`id`, `name`, `email`, `average_rating`, `created`, `modified`) VALUES
(1,	'Eduardo',	'earomero@gmail.com',	NULL,	'2016-01-26 00:46:51',	'2016-01-26 11:27:50'),
(2,	'Martin Moscosa',	'mmoscosa@gmail.com',	NULL,	'2016-01-26 00:48:27',	'2016-01-26 00:48:27'),
(3,	'Tania Carrillo',	'tania.cg@gmail.com',	NULL,	'2016-01-26 00:59:15',	'2016-01-26 00:59:15');

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text,
  `created` datetime DEFAULT NULL,
  `rental_id` binary(36) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ratings_rentals1_idx` (`rental_id`),
  CONSTRAINT `fk_ratings_rentals1` FOREIGN KEY (`rental_id`) REFERENCES `rentals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ratings` (`id`, `username`, `rating`, `comment`, `created`, `rental_id`) VALUES
(1,	'eromero',	2,	'Supremo!',	'2016-01-27 23:50:38',	UNHEX('35366138353261652D626635632D346566642D383833362D323339623363613862393735')),
(2,	'mmoscosa',	3,	'+ -',	'2016-01-27 23:56:43',	UNHEX('35366138353261652D626635632D346566642D383833362D323339623363613862393735')),
(3,	'foxteck',	4,	'^_^',	'2016-01-27 23:59:07',	UNHEX('35366138353261652D626635632D346566642D383833362D323339623363613862393735')),
(4,	'eromero',	5,	'',	'2016-01-28 00:10:06',	UNHEX('35366139623061642D376461632D343561652D616539332D303832323363613862393735')),
(5,	'mmoscosa',	5,	'',	'2016-01-28 00:18:27',	UNHEX('35366139623061642D376461632D343561652D616539332D303832323363613862393735')),
(6,	'cakemaster',	2,	'L E G E N ... wait for it ... D A R Y ',	'2016-01-28 00:19:23',	UNHEX('35366138353261652D626635632D346566642D383833362D323339623363613862393735'));

DROP TABLE IF EXISTS `rentals`;
CREATE TABLE `rentals` (
  `id` binary(36) NOT NULL,
  `title` varchar(128) NOT NULL,
  `domicilio` text,
  `lat` float DEFAULT NULL,
  `lon` float DEFAULT NULL,
  `fee` float DEFAULT '0',
  `average_rating` float DEFAULT NULL,
  `owner_id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `promoted` tinyint(4) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rentals_owners1_idx` (`owner_id`),
  CONSTRAINT `fk_rentals_owners1` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `rentals` (`id`, `title`, `domicilio`, `lat`, `lon`, `fee`, `average_rating`, `owner_id`, `city_id`, `state_id`, `promoted`, `created`, `modified`) VALUES
(UNHEX('35366138353261652D626635632D346566642D383833362D323339623363613862393735'),	'Departamento Super-amueblado en Chapultepec',	'Lerdo de Tejada 2222\r\nCol Americana\r\n',	20.6597,	-103.35,	1500,	0,	1,	5,	2,	1,	'2016-01-26 23:16:30',	'2016-01-28 01:40:16'),
(UNHEX('35366139623061642D376461632D343561652D616539332D303832323363613862393735'),	'EpicNest',	'Av. Chapultepec Sur 284 - 103\r\nCol. Americana',	20.6717,	-103.371,	180,	5,	2,	1,	14,	0,	'2016-01-28 00:09:49',	'2016-01-28 00:18:27');

-- 2016-01-28 08:11:22
