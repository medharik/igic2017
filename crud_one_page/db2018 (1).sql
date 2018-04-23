-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Lun 23 Avril 2018 à 15:55
-- Version du serveur: 5.5.27
-- Version de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `db2018`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `photo`) VALUES
(10, 'pc portable', 'images/dfad09a0eb60aeb07195b5f718fadb8130239678p5.jpg'),
(11, 'desktop 77', 'images/72fdb2f1a9fe438d44e38f60d73efb3befc24019p7.jpg'),
(12, 'pc miki', 'images/495ece8c926eff01ab8abf10478270d39547b5ebp5.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `prix` float NOT NULL DEFAULT '0',
  `qtestock` int(11) NOT NULL DEFAULT '0',
  `photo` varchar(255) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `photo` (`photo`),
  KEY `categorie_id` (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `qtestock`, `photo`, `categorie_id`) VALUES
(62, 'dell centro 9', 3000, 100, 'images/62d3b469121d9de91e678970b3d7199fe47399dbp5.jpg', 11),
(63, 'sony v6', 8000, 100, 'images/62e44a0bf1ed2ad8806976a3ef73d68044a8c689p7.jpg', 10),
(64, 'mmm', 3000, 90, 'images/94b93a70742cd4cb8b5e038383f852daef03e879logo.png', 10);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_3` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
