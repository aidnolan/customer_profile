-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.18 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for customer_profile
DROP DATABASE IF EXISTS `customer_profile`;
CREATE DATABASE IF NOT EXISTS `customer_profile` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `customer_profile`;

-- Dumping structure for table customer_profile.customers
DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_email` varchar(320) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cust_password` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `cust_name` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cust_address` varchar(400) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cust_city` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cust_country` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table customer_profile.passengers
DROP TABLE IF EXISTS `passengers`;
CREATE TABLE IF NOT EXISTS `passengers` (
  `passenger_id` int(11) NOT NULL AUTO_INCREMENT,
  `passenger_title` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `passenger_fname` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `passenger_sname` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `passenger_passport_id` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `passenger_cust_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`passenger_id`),
  KEY `passenger_cust_id` (`passenger_cust_id`),
  CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`passenger_cust_id`) REFERENCES `customers` (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table customer_profile.trips
DROP TABLE IF EXISTS `trips`;
CREATE TABLE IF NOT EXISTS `trips` (
  `trip_id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_dep_airport` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `trip_dep_time` datetime NOT NULL,
  `trip_arr_airport` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `trip_arr_time` datetime NOT NULL,
  `trip_cust_id` int(11) DEFAULT NULL,
  `trip_passengers` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`trip_id`),
  KEY `trip_cust_id` (`trip_cust_id`),
  CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`trip_cust_id`) REFERENCES `customers` (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
