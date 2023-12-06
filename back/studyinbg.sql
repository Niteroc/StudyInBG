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

INSERT INTO `element` (`id`, `idrubrique`, `nom`, `prix`, `description`, `adresse`, `image`) VALUES
(1, 1, 'Shtastlivetsa - San Stefano Plaza', 3, NULL, 'San Stefano St 22, 1504 Sofia Center, Sofia', NULL);
(2, 3, 'Black Peak - Medium', 3, 'Black Peak (Черни връх). Quatrième pic le plus haut de Bulgarie. Accessible en bus par le centre-ville de Sofia (bus 66 depuis larrêt Vitosha), votre randonnée commencera depuis lAleko Hut. (Si lascension est trop courte pour vous, vous pouvez commencer par différents points disponible sur internet).', 'ПП ВИТОША, ул. „Буйновско ждрело“, 1444 Sofia, Bulgarie', 'https://media-cdn.tripadvisor.com/media/attractions-splice-spp-720x480/07/bf/03/63.jpg');
(3, 3, 'Mousala - Hard', 3, '"Randonnée sur le plus haut sommet des Balkans "" Мусала "" Larrêt de mini-bus pour Samokov se trouve en face de lauberge de Samokov et les horaires semblent un peu aléatoires, alors soyez prudents.', 'Unnamed Road 2010, 2010, Bulgarie', 'https://i0.wp.com/www.tim-tense.com/wp-content/uploads/2022/08/DSC00447.jpg?w=1200&ssl=1');
(4, 3, 'Cascade de Boyana- Easy', 3, 'La cascade de Boyana est la plus grande cascade de la montagne bulgare Vitosha, avec une hauteur de 25 mètres. Autant à faire en été comme en hiver. Hésitez pas à aller voir la Boyana Church qui est sur le chemin pour accéder à la randonnée.', 'ul. "Boyanski Manastir", 1616 Boyana, Sofia, Bulgarie', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/10/d4/a3/8d/boyana-waterfall-hike.jpg?w=1200&h=-1&s=1');
(5, 3, 'Galerie nationale des beaux arts', 3, 'Galerie dart se consacrant à lart non bulgare du monde entier', ' i, pl. "Knyaz Aleksandar I" 1, 1000 Sofia Center, Sofia, Bulgarie', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/11/c7/93/59/caption.jpg?w=1100&h=-1&s=1');
(6, 3, 'Sept lacs de Rila', 3, 'Le meilleur temps pour visiter les sept lacs de Rila est au mois daoût. La verdure, air et eau fraîche attirent des amateurs de montagne pour des séjours souvent de longue durée. En hiver les lacs gèlent.', '2643 Рилски манастир, Bulgarie', 'https://cdn.getyourguide.com/img/tour/59b69b340c810.jpeg/145.jpg');

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
(2, 'Divers', 'Plongez dans une mosaïque de sujets captivants et variés au travers de notre page \"Divers\". Cet espace polyvalent et dynamique regorge dinformations fascinantes qui touchent à une multitude de domaines. De lexploration des tendances actuelles à des articles insolites, en passant par des sujets culturels, des réflexions sur le bien-être, des suggestions de voyages et bien plus encore, notre page \"Divers\" offre un kaléidoscope d\'articles stimulants et divertissants. Que vous cherchiez l\'inspiration, des connaissances nouvelles ou tout simplement une lecture enrichissante, plongez dans notre contenu éclectique et explorez la richesse des sujets abordés avec passion et curiosité.');
(3, 'Activités Extérieures', 'Sofia, une amoureuse de la nature, consacre une partie importante de son temps libre aux activités en plein air. Les matins ensoleillés la voient souvent arpenter des sentiers de randonnée, son sac à dos rempli de provisions. La randonnée devient une échappatoire, une occasion de se reconnecter avec la terre et de respirer lair pur.');
(4, 'Activités Intérieures', 'Sofia, la capitale de la Bulgarie, offre une riche variété dactivités intérieures qui reflètent son mélange unique de tradition et de modernité. Les musées de la ville, tels que le Musée national dhistoire, captivent les visiteurs avec des expositions fascinantes sur lhistoire mouvementée de la Bulgarie, depuis lAntiquité jusquà nos jours. Les amateurs dart peuvent se perdre dans les galeries contemporaines comme la Galerie nationale art étranger, qui abrite une collection impressionnante œuvres internationales.');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
