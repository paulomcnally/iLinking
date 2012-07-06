-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.92-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema ilinkingsmsc
--

CREATE DATABASE IF NOT EXISTS ilinkingsmsc;
USE ilinkingsmsc;

--
-- Definition of table `androids`
--

DROP TABLE IF EXISTS `androids`;
CREATE TABLE `androids` (
  `android_id` int(10) unsigned NOT NULL auto_increment,
  `android_name` varchar(150) NOT NULL,
  `android_os` varchar(45) NOT NULL,
  `android_os_version` varchar(20) NOT NULL,
  `android_imei` varchar(100) NOT NULL,
  `android_sim_number` varchar(15) NOT NULL,
  `sim_company_id` int(10) unsigned NOT NULL,
  `android_registered` datetime NOT NULL,
  `android_active` tinyint(1) unsigned NOT NULL,
  `android_send_ip` varchar(16) NOT NULL,
  `android_send_port` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`android_id`),
  KEY `SIM_NUMBER` (`android_sim_number`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `androids`
--

/*!40000 ALTER TABLE `androids` DISABLE KEYS */;
INSERT INTO `androids` (`android_id`,`android_name`,`android_os`,`android_os_version`,`android_imei`,`android_sim_number`,`sim_company_id`,`android_registered`,`android_active`,`android_send_ip`,`android_send_port`) VALUES 
 (1,'T-Mobile myTouch 3G','Froyo','2.2.1','354030030845639','50586271148',1,'2011-04-08 22:47:03',1,'192.168.1.80',8080),
 (2,'T-Mobile G1','Donut','1.6','351680033035274','50586872162',2,'2011-05-19 23:34:47',1,'192.168.1.80',8080);
/*!40000 ALTER TABLE `androids` ENABLE KEYS */;


--
-- Definition of table `campaigns`
--

DROP TABLE IF EXISTS `campaigns`;
CREATE TABLE `campaigns` (
  `campaign_id` int(10) unsigned NOT NULL auto_increment,
  `campaign_name` varchar(100) NOT NULL,
  `campaign_description` varchar(255) NOT NULL,
  `campaign_registered` datetime NOT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (`campaign_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaigns`
--

/*!40000 ALTER TABLE `campaigns` DISABLE KEYS */;
INSERT INTO `campaigns` (`campaign_id`,`campaign_name`,`campaign_description`,`campaign_registered`,`active`) VALUES 
 (1,'iLinking','Envía tus SMS a Facebook y Twitter','2011-04-08 23:38:28',1),
 (2,'SMS to Wall Page','Los SMS recibidos los enviará a una página en Facebook','2011-04-08 23:38:28',1);
/*!40000 ALTER TABLE `campaigns` ENABLE KEYS */;


--
-- Definition of table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customer_id` int(10) unsigned NOT NULL auto_increment,
  `customer_name` varchar(150) NOT NULL,
  PRIMARY KEY  (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`customer_id`,`customer_name`) VALUES 
 (1,'Paulo McNally'),
 (2,'Un Techo para mi Pais Nicaragua');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;


--
-- Definition of table `detail`
--

DROP TABLE IF EXISTS `detail`;
CREATE TABLE `detail` (
  `id` bigint(20) unsigned NOT NULL,
  `type` varchar(5) NOT NULL,
  `result` text NOT NULL,
  `end_dt` datetime NOT NULL,
  PRIMARY KEY  USING BTREE (`id`,`type`,`end_dt`),
  KEY `index_last` (`id`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail`
--

/*!40000 ALTER TABLE `detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail` ENABLE KEYS */;


--
-- Definition of table `facebook`
--

DROP TABLE IF EXISTS `facebook`;
CREATE TABLE `facebook` (
  `id` bigint(20) unsigned NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `sig` varchar(45) NOT NULL,
  `name` varchar(200) NOT NULL,
  `registered` datetime NOT NULL,
  `uid` bigint(20) unsigned NOT NULL,
  PRIMARY KEY  (`id`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facebook`
--

/*!40000 ALTER TABLE `facebook` DISABLE KEYS */;
/*!40000 ALTER TABLE `facebook` ENABLE KEYS */;


--
-- Definition of table `keyword_regex`
--

DROP TABLE IF EXISTS `keyword_regex`;
CREATE TABLE `keyword_regex` (
  `keyword_id` int(10) unsigned NOT NULL,
  `regular_expresion` varchar(255) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (`keyword_id`,`regular_expresion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keyword_regex`
--

/*!40000 ALTER TABLE `keyword_regex` DISABLE KEYS */;
INSERT INTO `keyword_regex` (`keyword_id`,`regular_expresion`,`active`) VALUES 
 (2,'^([tT][eE][cC][hH][oO])(.*)',1),
 (3,'^([tT][pP][lL])(.*)',1),
 (4,'^([@][tT][iI][eE][rR][rR][aA][pP][iI][nN][oO][lL][eE][rR][aA])(.*)',1),
 (6,'([0-9]{3}[0-9]{6}[0-9]{4}[a-zA-Z]{1}|[0-9]{3}-[0-9]{6}-[0-9]{4}[a-zA-Z]{1})',1);
/*!40000 ALTER TABLE `keyword_regex` ENABLE KEYS */;


--
-- Definition of table `keywords`
--

DROP TABLE IF EXISTS `keywords`;
CREATE TABLE `keywords` (
  `keyword_id` int(10) unsigned NOT NULL auto_increment,
  `keyword_name` varchar(100) NOT NULL,
  `keyword_registered` varchar(45) NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `campaign_id` int(10) unsigned NOT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  `keyword_config` varchar(255) NOT NULL,
  PRIMARY KEY  (`keyword_id`),
  KEY `CUSTOMERS` (`customer_id`),
  KEY `CAMPAIGN` USING BTREE (`campaign_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywords`
--

/*!40000 ALTER TABLE `keywords` DISABLE KEYS */;
INSERT INTO `keywords` (`keyword_id`,`keyword_name`,`keyword_registered`,`customer_id`,`campaign_id`,`active`,`keyword_config`) VALUES 
 (1,'iLinking','2011-04-08 23:15:18',1,1,1,''),
 (2,'Fans Page - Un Techo para mi Pais','2011-04-08 23:15:18',2,2,1,'{\"fbpage_id\":\"84430094936\"}'),
 (3,'Fans Page - Tipitapa en Linea','2011-04-09 19:51:54',1,2,1,'{\"fbpage_id\":\"167190400868\"}'),
 (4,'@tierrapinolera','2011-04-10 03:47:40',1,2,1,'{\"fbpage_id\":\"125917047422530\"}'),
 (5,'@twittnicas','2011-04-10 12:10:25',1,3,0,'{\"oauth_token\":\"280104390-siiKvl9aj5cHh9g1G7mYaYVjIf3f4QcNYqu4GBrc\",\"oauth_token_secret\":\"G9D0HZpLfWAx2zIIbU72QFvbtizHG9HooJoRkGeg\"}'),
 (6,'CSE - Cedula Catch','2011-05-14 21:44:37',1,3,1,'');
/*!40000 ALTER TABLE `keywords` ENABLE KEYS */;


--
-- Definition of table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `key` varchar(60) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY  (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` (`key`,`value`) VALUES 
 ('post_in_pages','{\"pid\":3920,\"last\":\"2011-05-12 23:42:02\",\"status\":\"Idle\"}');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;


--
-- Definition of table `phones`
--

DROP TABLE IF EXISTS `phones`;
CREATE TABLE `phones` (
  `uid` bigint(20) unsigned NOT NULL,
  `phone` varchar(20) NOT NULL,
  `registered` datetime NOT NULL,
  PRIMARY KEY  USING BTREE (`uid`,`phone`),
  KEY `index_phone` (`uid`,`phone`),
  KEY `index_last` (`uid`,`phone`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phones`
--

/*!40000 ALTER TABLE `phones` DISABLE KEYS */;
/*!40000 ALTER TABLE `phones` ENABLE KEYS */;


--
-- Definition of table `sim_companys`
--

DROP TABLE IF EXISTS `sim_companys`;
CREATE TABLE `sim_companys` (
  `sim_company_id` int(10) unsigned NOT NULL auto_increment,
  `sim_company_name` varchar(60) NOT NULL,
  `sim_company_cost_unit` decimal(10,2) NOT NULL,
  `sim_company_country` varchar(60) NOT NULL,
  `sim_company_country_prefix` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`sim_company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sim_companys`
--

/*!40000 ALTER TABLE `sim_companys` DISABLE KEYS */;
INSERT INTO `sim_companys` (`sim_company_id`,`sim_company_name`,`sim_company_cost_unit`,`sim_company_country`,`sim_company_country_prefix`) VALUES 
 (1,'Claro','0.07','Nicaragua',505),
 (2,'Movistar','0.07','Nicaragua',505);
/*!40000 ALTER TABLE `sim_companys` ENABLE KEYS */;


--
-- Definition of table `sms`
--

DROP TABLE IF EXISTS `sms`;
CREATE TABLE `sms` (
  `sms_id` bigint(20) unsigned NOT NULL auto_increment,
  `sms_sender` varchar(20) NOT NULL,
  `sms_receiver` varchar(20) NOT NULL,
  `sms_text` varchar(255) NOT NULL,
  `start_dt` datetime NOT NULL,
  `keyword_id` int(10) unsigned NOT NULL,
  `sms_type` varchar(10) NOT NULL,
  `end_dt` datetime NOT NULL,
  `sms_id_parent` bigint(20) unsigned NOT NULL,
  PRIMARY KEY  (`sms_id`),
  KEY `SENDER` USING BTREE (`sms_sender`,`start_dt`,`keyword_id`),
  KEY `RECEIVER` USING BTREE (`sms_receiver`,`start_dt`,`keyword_id`),
  KEY `KEYWORD` USING BTREE (`keyword_id`,`start_dt`),
  KEY `TYPE` USING BTREE (`sms_type`,`start_dt`,`sms_sender`,`sms_receiver`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms`
--

/*!40000 ALTER TABLE `sms` DISABLE KEYS */;
/*!40000 ALTER TABLE `sms` ENABLE KEYS */;


--
-- Definition of table `twitter`
--

DROP TABLE IF EXISTS `twitter`;
CREATE TABLE `twitter` (
  `id` bigint(20) unsigned NOT NULL,
  `screen_name` varchar(100) NOT NULL,
  `oauth_token` varchar(255) NOT NULL,
  `oauth_token_secret` varchar(255) NOT NULL,
  `registered` datetime NOT NULL,
  `uid` bigint(20) unsigned NOT NULL,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY  USING BTREE (`id`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `twitter`
--

/*!40000 ALTER TABLE `twitter` DISABLE KEYS */;
/*!40000 ALTER TABLE `twitter` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` bigint(20) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `registered` datetime NOT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  `country` varchar(70) NOT NULL,
  `nick` varchar(60) NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of procedure `get_campaing_by_message`
--

DROP PROCEDURE IF EXISTS `get_campaing_by_message`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`ilinkingsmsc`@`%` PROCEDURE `get_campaing_by_message`(IN msg varchar(160), OUT kid INT, OUT cid INT )
BEGIN
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET kid=1,cid=1;

  SELECT K.keyword_id, K.campaign_id INTO kid,cid
  FROM keyword_regex KR, keywords K
  WHERE KR.keyword_id = K.keyword_id
  AND (SELECT msg REGEXP KR.regular_expresion)=1
  AND KR.active = 1 LIMIT 1;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `get_facebook_access_token`
--

DROP PROCEDURE IF EXISTS `get_facebook_access_token`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`ilinkingsmsc`@`%` PROCEDURE `get_facebook_access_token`(IN _phone VARCHAR(15), OUT _uid BIGINT(20), OUT _access_token VARCHAR(255))
BEGIN
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET _access_token='EMPTY',_uid=0;
  SELECT F.id,F.access_token INTO _uid,_access_token FROM phones P, facebook F WHERE P.phone = _phone AND F.uid = P.uid;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `get_twitter_access_token`
--

DROP PROCEDURE IF EXISTS `get_twitter_access_token`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`ilinkingsmsc`@`%` PROCEDURE `get_twitter_access_token`(IN _phone VARCHAR(15), OUT _oauth_token VARCHAR(255), OUT _oauth_token_secret VARCHAR(255))
BEGIN
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET _oauth_token='EMPTY',_oauth_token_secret='EMPTY';
  SELECT T.oauth_token,T.oauth_token_secret INTO _oauth_token,_oauth_token_secret FROM phones P, twitter T WHERE P.phone = _phone AND T.uid = P.uid;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `number_exist`
--

DROP PROCEDURE IF EXISTS `number_exist`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`ilinkingsmsc`@`%` PROCEDURE `number_exist`(IN _number VARCHAR(15), OUT _exist VARCHAR(3))
BEGIN
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET _exist=0;
  SELECT uid INTO _exist FROM phones WHERE phone = _number;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `sproc_show_max_memory`
--

DROP PROCEDURE IF EXISTS `sproc_show_max_memory`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`ilinkingsmsc`@`%` PROCEDURE `sproc_show_max_memory`( OUT max_memory DECIMAL(10,4))
BEGIN
SELECT ( @@key_buffer_size + @@query_cache_size + @@tmp_table_size  + @@max_connections * ( @@read_buffer_size + @@read_rnd_buffer_size + @@sort_buffer_size + @@join_buffer_size + @@binlog_cache_size  ) ) / 1073741824 AS MAX_MEMORY_GB INTO max_memory;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
