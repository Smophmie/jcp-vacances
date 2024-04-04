-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 avr. 2024 à 07:46
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
-- Base de données : `jcpvacances`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category-name` varchar(40) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`category_id`, `category-name`) VALUES
(1, 'Mer'),
(2, 'Montagne'),
(3, 'Campagne');

-- --------------------------------------------------------

--
-- Structure de la table `packs`
--

DROP TABLE IF EXISTS `packs`;
CREATE TABLE IF NOT EXISTS `packs` (
  `pack_id` int NOT NULL AUTO_INCREMENT,
  `pack-name` varchar(20) NOT NULL,
  PRIMARY KEY (`pack_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `packs`
--

INSERT INTO `packs` (`pack_id`, `pack-name`) VALUES
(1, 'Classique'),
(2, 'Séjour 2 pour 1');

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `region_id` int NOT NULL AUTO_INCREMENT,
  `region-name` int NOT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role-name` varchar(20) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`role_id`, `role-name`) VALUES
(1, 'Administrateur'),
(2, 'Client');

-- --------------------------------------------------------

--
-- Structure de la table `travels`
--

DROP TABLE IF EXISTS `travels`;
CREATE TABLE IF NOT EXISTS `travels` (
  `travel_id` int NOT NULL AUTO_INCREMENT,
  `pack_id` int NOT NULL,
  `category_id` int NOT NULL,
  `title` varchar(300) NOT NULL,
  `duration` varchar(300) NOT NULL,
  `price` double NOT NULL,
  `price-infos` varchar(1000) NOT NULL,
  `bnb-infos` varchar(1000) NOT NULL,
  `bnb-photo-url` varchar(300) NOT NULL,
  `visits-infos` varchar(1000) NOT NULL,
  `visits-photo-url` varchar(300) NOT NULL,
  PRIMARY KEY (`travel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `travels`
--

INSERT INTO `travels` (`travel_id`, `pack_id`, `category_id`, `title`, `duration`, `price`, `price-infos`, `bnb-infos`, `bnb-photo-url`, `visits-infos`, `visits-photo-url`) VALUES
(35, 1, 1, 'Golfe du Morbihan', '2 jours', 900, 'Option à 100€ pour un dîner au bord du Golfe du Morbihan', 'Hotel vue sur Golfe', 'https://localhost/jcp-vacances/upload/hebergement.jpg', 'Randonnées autour du Golfe, petit tour en bateau pour découvrir les îles du Golfe', 'https://localhost/jcp-vacances/upload/golfe-du-morbihan.jpg'),
(36, 1, 2, 'Séjour randonnée dans le Sancy', '1 semaine', 700, 'ABCD', 'Chalet à la Bourboule', '', 'Randonnées au Sancy, découverte des villages montagnards du secteur', ''),
(34, 1, 3, 'Séjour à Loubeyrat', '2 jours', 3000, 'Option diner dans la cabane pour 150€ de plus', 'Cabane dans les arbres', 'https://localhost/jcp-vacances/upload/new-image.jpeg', 'Château de Chazeron, Gour de Tazenat', 'https://localhost/jcp-vacances/upload/phochazeron_4852146.jpeg'),
(30, 2, 2, 'Détente à Aix-les-Bains', '10 jours', 800, 'Option dîner aux chandelles avec vue sur le lac (en terrasse si le temps le permet) pour 100€ de plus.', 'Hôtel Bordelac avec terrasse et vue sur le lac', 'https://localhost/jcp-vacances/upload/63ba42273b242ac6554da803b1.jpg', 'Promenez-vous dans la ville et admirez les bâtiments de style art-déco.', 'https://localhost/jcp-vacances/upload/63ba42273b242ac6554da803b1.jpg'),
(37, 1, 2, 'Alpes', '10 jours', 300, '', 'ugmou', '', 'zrefer', ''),
(38, 1, 1, 'Surf à Biarritz', '1 semaine', 950, '', 'Hôtel en plein centre de biarritz', 'https://localhost/jcp-vacances/upload/Hôtel Biarritz.jpg', 'Surfez sur les immenses vagues biarrotes, promenez-vous dans les jolis villages du pays basques et dégustez les spécialités locales.', 'https://localhost/jcp-vacances/upload/maison typique pays basque.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `username`, `password`) VALUES
(1, 1, 'user365', 'user365'),
(2, 2, 'user366', 'user366');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
