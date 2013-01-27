-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 27 Janvier 2013 à 15:30
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `treking`
--
CREATE DATABASE `treking` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `treking`;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tourist_id` int(11) DEFAULT NULL,
  `content` text,
  `content_type` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` VALUES(1, 2, 'Cela s''annonce cool j''ai hate d''y être!!!', 2, 1, '2013-01-25');
INSERT INTO `comments` VALUES(2, 4, 'Cela à l''air d''être très peu enrichissant', 1, 2, '2013-01-27');

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` VALUES(1, 'tourists');
INSERT INTO `groups` VALUES(2, 'guides');
INSERT INTO `groups` VALUES(3, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `guides`
--

CREATE TABLE `guides` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tourist_id` int(11) DEFAULT NULL,
  `certify` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `guides`
--

INSERT INTO `guides` VALUES(1, 2, 1);
INSERT INTO `guides` VALUES(2, 8, 1);
INSERT INTO `guides` VALUES(3, 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `journeys`
--

CREATE TABLE `journeys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tourist_id` int(11) DEFAULT NULL,
  `track_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `d_begin` date DEFAULT NULL,
  `d_end` date DEFAULT NULL,
  `effective` tinyint(4) DEFAULT NULL,
  `visibility` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `journeys`
--

INSERT INTO `journeys` VALUES(1, 8, 1, 'La charente c''est super', 'Vive les champs', '2013-01-26', '2013-01-31', 4, 1);
INSERT INTO `journeys` VALUES(2, 7, 2, 'On va se la coller sÃ©vÃ¨re ', 'YAAAY', '2013-03-19', '2013-04-29', 5, 0);
INSERT INTO `journeys` VALUES(3, 8, 4, 'L''amazonie, Ã§a vous gagne', 'Vivez l''aventure Amazonie', '2013-01-29', '2013-03-18', 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `journeys_guides`
--

CREATE TABLE `journeys_guides` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `journey_id` int(11) DEFAULT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `journey_valid` int(11) DEFAULT NULL,
  `guide_valid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `journeys_guides`
--

INSERT INTO `journeys_guides` VALUES(1, 2, 1, 1, 1, NULL);
INSERT INTO `journeys_guides` VALUES(2, 1, 2, 0, 1, NULL);
INSERT INTO `journeys_guides` VALUES(3, 3, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `journeys_tourists`
--

CREATE TABLE `journeys_tourists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `journey_id` int(11) DEFAULT NULL,
  `tourist_id` int(11) DEFAULT NULL,
  `status` tinyint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `journeys_tourists`
--

INSERT INTO `journeys_tourists` VALUES(3, 1, 1, NULL);
INSERT INTO `journeys_tourists` VALUES(4, 2, 7, NULL);
INSERT INTO `journeys_tourists` VALUES(5, 3, 2, NULL);
INSERT INTO `journeys_tourists` VALUES(7, 1, 7, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tourists`
--

CREATE TABLE `tourists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `tourists`
--

INSERT INTO `tourists` VALUES(1, 'mourtaza', 'esmael', 20, 1);
INSERT INTO `tourists` VALUES(2, 'arnaud', 'armand', 39, 2);
INSERT INTO `tourists` VALUES(7, 'jasmine', 'jad', 33, 4);
INSERT INTO `tourists` VALUES(8, 'ba', 'alexis', 23, 5);

-- --------------------------------------------------------

--
-- Structure de la table `tracks`
--

CREATE TABLE `tracks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `guide_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `pays` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tracks`
--

INSERT INTO `tracks` VALUES(1, 1, 'Promenade en Charente ', 'Des champs, encore des champs', 'France ');
INSERT INTO `tracks` VALUES(2, 2, 'Parcours du sommelier', 'Buverie sur bordeaux', 'France');
INSERT INTO `tracks` VALUES(4, 2, 'DÃ©couverte de l''amazonie', 'L''amazonie et ses terres enchantÃ©es vous accueillent ', 'BrÃ©sil, PÃ©rou');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `groups_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` VALUES(1, 'emourtaza@gmail.com', 'pass', 1);
INSERT INTO `users` VALUES(2, 'es@er.com', 'pass', 2);
INSERT INTO `users` VALUES(3, 'jo@jo.com', 'pass', 2);
INSERT INTO `users` VALUES(4, 'ja@ja.fr', 'pass', 2);
INSERT INTO `users` VALUES(5, 'alexis@ba.fr', 'pass', 1);
