/*
SQLyog - Free MySQL GUI v5.02
Host - 5.0.27-community-nt : Database - estatego
*********************************************************************
Server version : 5.0.27-community-nt
*/


create database if not exists `estatego`;

USE `estatego`;

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL,
  `caption` varchar(255) collate utf8_unicode_ci NOT NULL,
  `image` varchar(255) collate utf8_unicode_ci NOT NULL,
  `top_blog` int(11) NOT NULL,
  `content` longtext collate utf8_unicode_ci NOT NULL,
  `author` varchar(255) collate utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `blogs` */

insert into `blogs` values 
(1,'Title One','Caption One','banner1.png',1,'We will be having the introductory session to our CLOUD COMPUTING TRAINING PROGRAM on the 23rd of April at 3pm Nigerian Time (14:00 GMT). \r\n\r\nThe training session is free, so you will be able get the intro to the course and understand what you want to learn, then you can take a decision.\r\n\r\nClick the link below to signup for the course so that we can send you a session invite.','Au Bending','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(2,'Title Two','Caption Two','banner.jpg',0,'We will be having the introductory session to our CLOUD COMPUTING TRAINING PROGRAM on the 23rd of April at 3pm Nigerian Time (14:00 GMT). \r\n\r\nThe training session is free, so you will be able get the intro to the course and understand what you want to learn, then you can take a decision.\r\n\r\nClick the link below to signup for the course so that we can send you a session invite.','Issa Ajao','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(3,'Title Three','Caption Three','banner1.png',0,'We will be having the introductory session to our CLOUD COMPUTING TRAINING PROGRAM on the 23rd of April at 3pm Nigerian Time (14:00 GMT). \r\n\r\nThe training session is free, so you will be able get the intro to the course and understand what you want to learn, then you can take a decision.\r\n\r\nClick the link below to signup for the course so that we can send you a session invite.','Yet Olans','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(4,'Title Four','Caption Four','banner.jpg',0,'We will be having the introductory session to our CLOUD COMPUTING TRAINING PROGRAM on the 23rd of April at 3pm Nigerian Time (14:00 GMT). \r\n\r\nThe training session is free, so you will be able get the intro to the course and understand what you want to learn, then you can take a decision.\r\n\r\nClick the link below to signup for the course so that we can send you a session invite.','John Smith','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(5,'Title Five','Caption Five','banner1.png',0,'We will be having the introductory session to our CLOUD COMPUTING TRAINING PROGRAM on the 23rd of April at 3pm Nigerian Time (14:00 GMT). \r\n\r\nThe training session is free, so you will be able get the intro to the course and understand what you want to learn, then you can take a decision.\r\n\r\nClick the link below to signup for the course so that we can send you a session invite.','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(6,'Title Six','Caption Six','banner.jpg',0,'We will be having the introductory session to our CLOUD COMPUTING TRAINING PROGRAM on the 23rd of April at 3pm Nigerian Time (14:00 GMT). \r\n\r\nThe training session is free, so you will be able get the intro to the course and understand what you want to learn, then you can take a decision.\r\n\r\nClick the link below to signup for the course so that we can send you a session invite.','','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `uuid` varchar(255) collate utf8_unicode_ci NOT NULL,
  `connection` text collate utf8_unicode_ci NOT NULL,
  `queue` text collate utf8_unicode_ci NOT NULL,
  `payload` longtext collate utf8_unicode_ci NOT NULL,
  `exception` longtext collate utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `homes` */

DROP TABLE IF EXISTS `homes`;

CREATE TABLE `homes` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(30) collate utf8_unicode_ci NOT NULL,
  `description` longtext collate utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `homes` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `migration` varchar(255) collate utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert into `migrations` values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2023_02_06_221804_create_homes_table',2),
(6,'2023_04_03_193226_create_blogs_table',3),
(7,'2023_04_20_143724_blogs',3);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `token` varchar(255) collate utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL default NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `tokenable_type` varchar(255) collate utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `token` varchar(64) collate utf8_unicode_ci NOT NULL,
  `abilities` text collate utf8_unicode_ci,
  `last_used_at` timestamp NULL default NULL,
  `created_at` timestamp NULL default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL default NULL,
  `password` varchar(255) collate utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) collate utf8_unicode_ci default NULL,
  `created_at` timestamp NULL default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */
