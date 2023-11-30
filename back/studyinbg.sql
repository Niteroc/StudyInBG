-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 29 nov. 2023 à 19:31
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `studyinbg`
--
CREATE DATABASE IF NOT EXISTS `studyinbg` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `studyinbg`;

-- --------------------------------------------------------

--
-- Structure de la table `element`
--

DROP TABLE IF EXISTS `element`;
CREATE TABLE IF NOT EXISTS `element` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idrubrique` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` tinyint DEFAULT NULL,
  `description` text NOT NULL,
  `adresse` text NOT NULL,
  `image` longblob,
  PRIMARY KEY (`id`),
  KEY `idrubrique` (`idrubrique`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `element`
--

INSERT INTO `element` (`id`, `idrubrique`, `nom`, `prix`, `description`, `image`) VALUES
(1, 1, 'Shtastlivetsa - San Stefano Plaza', 3, 'San Stefano St 22, 1504 Sofia Center, Sofia', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `rubrique`
--

DROP TABLE IF EXISTS `rubrique`;
CREATE TABLE IF NOT EXISTS `rubrique` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `rubrique`
--

INSERT INTO `rubrique` (`id`, `nom`, `description`) VALUES
(1, 'Restaurant', 'Découvrez une sélection exquise de restaurants à Sofia, la capitale animée de la Bulgarie. Notre plateforme vous invite à explorer une gamme diversifiée de restaurants locaux, offrant une cuisine allant des délices traditionnels bulgares à une variété de saveurs internationales. Que vous recherchiez une expérience gastronomique authentique, des plats raffinés ou des délices culinaires uniques, notre guide vous offre un aperçu détaillé des restaurants pittoresques, des adresses branchées et des joyaux cachés disséminés dans les quartiers animés de Sofia. Préparez-vous à savourer des moments délicieux tout en explorant les délices culinaires de cette ville captivante.'),
(2, 'Divers', 'Plongez dans une mosaïque de sujets captivants et variés au travers de notre page \"Divers\". Cet espace polyvalent et dynamique regorge d\'informations fascinantes qui touchent à une multitude de domaines. De l\'exploration des tendances actuelles à des articles insolites, en passant par des sujets culturels, des réflexions sur le bien-être, des suggestions de voyages et bien plus encore, notre page \"Divers\" offre un kaléidoscope d\'articles stimulants et divertissants. Que vous cherchiez l\'inspiration, des connaissances nouvelles ou tout simplement une lecture enrichissante, plongez dans notre contenu éclectique et explorez la richesse des sujets abordés avec passion et curiosité.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
