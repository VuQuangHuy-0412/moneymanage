-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for money_manage
DROP DATABASE IF EXISTS `money_manage`;
CREATE DATABASE IF NOT EXISTS `money_manage` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `money_manage`;

-- Dumping structure for table money_manage.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `admin_user` (`user_id`),
  CONSTRAINT `admin_user` FOREIGN KEY (`user_id`) REFERENCES `user_information` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table money_manage.admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`admin_id`, `user_id`, `name`, `email`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(2, 1, 'Vũ Quang Huy', 'vqhuybkhn@gmail.com', '2021-04-25 14:09:55', '2021-04-25 14:10:05', 1, 1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table money_manage.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` bit(1) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='danh sách các danh mục ';

-- Dumping data for table money_manage.category: ~0 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table money_manage.response_feedback
DROP TABLE IF EXISTS `response_feedback`;
CREATE TABLE IF NOT EXISTS `response_feedback` (
  `response_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `feedback_id` bigint(20) NOT NULL,
  `user_response_id` bigint(20) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`response_id`),
  KEY `FK1_feedback_id` (`feedback_id`),
  KEY `FK2_user_id` (`user_response_id`),
  CONSTRAINT `FK1_feedback_id` FOREIGN KEY (`feedback_id`) REFERENCES `user_feedback` (`feedback_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK2_user_id` FOREIGN KEY (`user_response_id`) REFERENCES `user_information` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table money_manage.response_feedback: ~0 rows (approximately)
/*!40000 ALTER TABLE `response_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `response_feedback` ENABLE KEYS */;

-- Dumping structure for table money_manage.user_account
DROP TABLE IF EXISTS `user_account`;
CREATE TABLE IF NOT EXISTS `user_account` (
  `user_id` bigint(20) NOT NULL,
  `user_account_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_account` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_password` longtext NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_account_id`),
  KEY `FK1_user_id` (`user_id`),
  CONSTRAINT `FK1_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_information` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table money_manage.user_account: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_account` DISABLE KEYS */;
INSERT INTO `user_account` (`user_id`, `user_account_id`, `user_account`, `email`, `created_at`, `user_password`, `update_at`) VALUES
	(1, 1, 'vqhuybkhn@gmail.com', 'vqhuybkhn@gmail.com', '2021-04-22 19:55:39', '12345678', '2021-04-22 19:55:39'),
	(5, 5, 'kethatbai20000@gmail.com', 'kethatbai20000@gmail.com', '2021-04-24 16:13:49', '12345678', '2021-04-24 16:13:49');
/*!40000 ALTER TABLE `user_account` ENABLE KEYS */;

-- Dumping structure for table money_manage.user_activity
DROP TABLE IF EXISTS `user_activity`;
CREATE TABLE IF NOT EXISTS `user_activity` (
  `activity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `money_amount` bigint(20) NOT NULL,
  `describe` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`activity_id`),
  KEY `FK3_user_id` (`user_id`),
  KEY `FK1_category_id` (`category_id`),
  CONSTRAINT `FK1_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK3_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_information` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Số tiên chi tiêu theo danh mục bởi người dùng';

-- Dumping data for table money_manage.user_activity: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_activity` ENABLE KEYS */;

-- Dumping structure for table money_manage.user_category
DROP TABLE IF EXISTS `user_category`;
CREATE TABLE IF NOT EXISTS `user_category` (
  `user_category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `describe` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_category_id`),
  KEY `FK4_user_id` (`user_id`),
  KEY `FK2_category_id` (`category_id`),
  CONSTRAINT `FK2_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK4_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_information` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='bảng chỉ ra user sử dụng category nào\\r\\n';

-- Dumping data for table money_manage.user_category: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_category` ENABLE KEYS */;

-- Dumping structure for table money_manage.user_feedback
DROP TABLE IF EXISTS `user_feedback`;
CREATE TABLE IF NOT EXISTS `user_feedback` (
  `feedback_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`feedback_id`),
  KEY `FK5_user_id` (`user_id`),
  CONSTRAINT `FK5_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_information` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='bảng lưu thông tin feedback của user';

-- Dumping data for table money_manage.user_feedback: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_feedback` ENABLE KEYS */;

-- Dumping structure for table money_manage.user_information
DROP TABLE IF EXISTS `user_information`;
CREATE TABLE IF NOT EXISTS `user_information` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `active_user` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table money_manage.user_information: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_information` DISABLE KEYS */;
INSERT INTO `user_information` (`user_id`, `user_name`, `date_of_birth`, `gender`, `active_user`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'Vũ Quang Huy', '2000-12-04', 0, 1, 'vqhuybkhn@gmail.com', '2021-04-22 19:55:39', '2021-04-22 19:55:39'),
	(5, 'Vũ Quang Huy', '2000-12-04', 0, 1, 'kethatbai20000@gmail.com', '2021-04-24 16:13:49', '2021-04-24 16:13:49');
/*!40000 ALTER TABLE `user_information` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
