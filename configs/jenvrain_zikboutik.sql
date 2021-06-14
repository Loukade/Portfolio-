-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 30 jan. 2020 à 11:11
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jenvrain_zikboutik`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Jazz'),
(2, 'Rock'),
(3, 'Blues'),
(4, 'Enfants');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `date`, `contenu`) VALUES
(1, '10/01/2018', 'contenu news'),
(2, '12/01/2018', 'contenu news');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `prix` decimal(6,2) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `prix`, `image`, `idCategorie`) VALUES
(1, 'Bireli Lagrene & Friends', 'Live Jazz à Vienne', '22.99', 'lagrene_vienne.jpg', 1),
(2, 'Norah Jones', 'Live In New Orleans', '12.20', 'norah_jones_new_orleans.jpg', 1),
(3, 'Diana Krall', 'Live In Paris', '15.81', 'diana_krall_paris.jpg', 1),
(4, 'Miles Davis', 'Live At Montreux', '83.69', 'miles_davis_montreux.jpg', 1),
(5, 'Bruce Springsteen', 'Live In New York City', '9.99', 'springsteen_newyork.jpg', 2),
(6, 'U2', 'Live in Chicago', '18.00', 'u2_chicago.jpg', 2),
(7, 'Mark Knopfler', 'Real Live Roadrunning', '16.99', 'knopfler_roadrunning.jpg', 2),
(8, 'Pink Floyd', 'Live at Pompei', '9.99', 'pink_floyd_pompei.jpg', 2),
(9, 'Queen ', 'Live at Wembley', '9.40', 'queen_wembley.jpg', 2),
(10, 'AC/DC', 'Live At River Plate', '36.60', 'acdc_river_plate.jpg', 2),
(11, 'B.B. King', 'Live', '19.97', 'bbking_live.jpg', 3),
(12, 'Eric Clapton', 'Crossroads Guitar Festival', '34.96', 'clapton_crossroads.jpg', 3),
(13, 'John Lee Hooker', 'I\'m in the mood for Love', '19.34', 'hooker_love.jpg', 3),
(14, 'Stevie Ray Vaughan & Double Trouble', 'Live at the El Mocambo', '6.99', 'stevie_ray.jpg', 3),
(15, 'Steve Ray Vaughan', 'Live At Montreux', '9.99', 'vaughan_montreux.jpg', 3),
(16, 'René la taupe !', 'Live Héraultais !...', '1000.99', 'rene_taupe.jpg', 4),
(23, 'testsddd', 'testdsds', '2158.00', 'sddssd.jpg', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
