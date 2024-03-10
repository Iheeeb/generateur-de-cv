-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 10 mars 2024 à 15:08
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `user`
--

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

DROP TABLE IF EXISTS `cv`;
CREATE TABLE IF NOT EXISTS `cv` (
  `num_cv` int NOT NULL AUTO_INCREMENT,
  `nometprenom` varchar(30) NOT NULL,
  `datenais` date NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `apropos` longtext NOT NULL,
  `arabe` int NOT NULL,
  `francais` int NOT NULL,
  `anglais` int NOT NULL,
  `email` varchar(40) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `fb` varchar(50) NOT NULL,
  `ig` varchar(50) NOT NULL,
  `li` varchar(60) NOT NULL,
  `photo` varchar(60) NOT NULL,
  `realisateur` varchar(30) NOT NULL,
  PRIMARY KEY (`num_cv`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

DROP TABLE IF EXISTS `diplome`;
CREATE TABLE IF NOT EXISTS `diplome` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_cv` int NOT NULL,
  `dip` varchar(50) NOT NULL,
  `date_dip` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_cv_dip` (`num_cv`)
) ENGINE=MyISAM AUTO_INCREMENT=907 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_cv` int NOT NULL,
  `exp` varchar(50) NOT NULL,
  `date_exp` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_cv_exp` (`num_cv`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('iheb baccar', 'azerty'),
('omar ben ammar', 'omar123'),
('houssem langar', '123456A'),
('hedi jhen', '123456'),
('bichr aziz aiissi', 'HOBIBEKBEK');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
