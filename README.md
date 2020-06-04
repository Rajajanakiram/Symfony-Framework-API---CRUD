# myproject


-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 04, 2020 at 05:57 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weather`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200602144026', '2020-06-02 14:40:57'),
('20200602152025', '2020-06-02 15:20:34'),
('20200603054236', '2020-06-03 05:43:28'),
('20200603054309', '2020-06-03 05:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `weather`
--

DROP TABLE IF EXISTS `weather`;
CREATE TABLE IF NOT EXISTS `weather` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_weather` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4CD0D36E8BAC62AF` (`city_id`),
  UNIQUE KEY `UNIQ_4CD0D36EBD6D436E` (`city_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weather`
--

INSERT INTO `weather` (`id`, `city_id`, `city_name`, `city_weather`, `country_id`, `active`) VALUES
(1, 1252646, 'Keelakarai', '{\"coord\":{\"lon\":78.78,\"lat\":9.23},\"weather\":[{\"id\":804,\"main\":\"Clouds\",\"description\":\"overcast clouds\",\"icon\":\"04d\"}],\"base\":\"stations\",\"main\":{\"temp\":305.21,\"feels_like\":304.87,\"temp_min\":305.21,\"temp_max\":305.21,\"pressure\":1009,\"humidity\":53,\"sea_level\":1009,\"grnd_level\":1008},\"wind\":{\"speed\":6.65,\"deg\":209},\"clouds\":{\"all\":100},\"dt\":1591164983,\"sys\":{\"country\":\"IN\",\"sunrise\":1591143855,\"sunset\":1591189331},\"timezone\":19800,\"id\":1252646,\"name\":\"Kilakarai\",\"cod\":200}', 'IN', 1),
(2, 1252653, 'Zunheboto', '{\"coord\":{\"lon\":94.52,\"lat\":25.97},\"weather\":[{\"id\":804,\"main\":\"Clouds\",\"description\":\"overcast clouds\",\"icon\":\"04n\"}],\"base\":\"stations\",\"main\":{\"temp\":289.67,\"feels_like\":291.44,\"temp_min\":289.67,\"temp_max\":289.67,\"pressure\":1006,\"humidity\":97,\"sea_level\":1006,\"grnd_level\":853},\"wind\":{\"speed\":0.33,\"deg\":105},\"clouds\":{\"all\":99},\"dt\":1591197226,\"sys\":{\"country\":\"IN\",\"sunrise\":1591138199,\"sunset\":1591187431},\"timezone\":19800,\"id\":1252653,\"name\":\"Zunheboto\",\"cod\":200}', 'IN', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

