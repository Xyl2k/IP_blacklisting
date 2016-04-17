-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 17 Avril 2016 à 15:41
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blacklist`
--

-- --------------------------------------------------------

--
-- Structure de la table `blocked_ip`
--

DROP TABLE IF EXISTS `blocked_ip`;
CREATE TABLE IF NOT EXISTS `blocked_ip` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) DEFAULT NULL,
  `added` int(11) NOT NULL,
  `country` varchar(8) NOT NULL DEFAULT 'Unknown',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hostile_act`
--

DROP TABLE IF EXISTS `hostile_act`;
CREATE TABLE IF NOT EXISTS `hostile_act` (
  `ip` varchar(15) NOT NULL,
  `per` tinyint(3) NOT NULL DEFAULT '0',
  KEY `per` (`per`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
