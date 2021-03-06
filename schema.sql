-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 30 Janvier 2013 à 15:53
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `caketrek_default`
--

-- --------------------------------------------------------

--
-- Structure de la table `badges`
--

CREATE TABLE IF NOT EXISTS `badges` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `badges`
--

INSERT INTO `badges` (`id`, `name`, `label`, `description`, `created`, `modified`) VALUES
(1, 'rookie', 'Rookie', 'Premiers pas', NULL, NULL),
(2, 'first_blood', 'First Blood', 'Première Journey qui a été annulée', NULL, NULL),
(3, 'natural_born_leader', 'Natural Born Leader', 'A organisé plus de 10 journeys', NULL, NULL),
(4, 'walker', 'Walker', 'A participé à au moins 5 journeys', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `badges_objects`
--

CREATE TABLE IF NOT EXISTS `badges_objects` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `badge_id` int(11) unsigned DEFAULT NULL,
  `object_id` int(11) unsigned DEFAULT NULL,
  `object` char(30) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `badges_objects`
--

INSERT INTO `badges_objects` (`id`, `badge_id`, `object_id`, `object`, `created`) VALUES
(21, 3, 2, 'Tourist', '2013-01-28 13:58:57'),
(20, 2, 2, 'Tourist', '2013-01-28 13:58:57'),
(29, 4, 1, 'Tourist', '2013-01-28 15:02:14'),
(28, 1, 1, 'Tourist', '2013-01-28 15:02:14'),
(26, 1, 1, 'Guide', '2013-01-28 15:01:34'),
(27, 7, 2, 'Zone', '2013-01-28 15:01:50');

-- --------------------------------------------------------

--
-- Structure de la table `badges_users`
--

CREATE TABLE IF NOT EXISTS `badges_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `badge_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `badges_users` (`id`, `badge_id`, `user_id`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 3, 2),
(4, 1, 4),
(5, 2, 1);

--
-- Contenu de la table `badges_users`
--

# Dump of table groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `name`, `created`, `modified`)
VALUES
	(1,'admins','2013-01-29 15:49:11','2013-01-29 15:49:11'),
	(2,'tourists','2013-01-29 15:49:15','2013-01-29 15:49:15'),
	(3,'guides','2013-01-29 15:49:15','2013-01-29 15:49:15'),
	(4,'spammers','2013-01-29 15:49:15','2013-01-29 15:49:15');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table friends
# ------------------------------------------------------------

CREATE TABLE `friends` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `follower_id` int(11) unsigned NOT NULL,
  `following_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_following_follower` (`follower_id`,`following_id`),
  KEY `follower` (`follower_id`),
  KEY `following` (`following_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `guides`
--

CREATE TABLE IF NOT EXISTS `guides` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `slogan` varchar(200) DEFAULT NULL,
  `description` text,
  `tourist_id` int(11) DEFAULT NULL,
  `validated` tinyint(3) unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `guides`
--

INSERT INTO `guides` (`id`, `slogan`, `description`, `tourist_id`, `validated`, `created`, `modified`) VALUES
(1, 'il aime la montagne', '', 2, 1, '2013-01-27 16:31:08', '2013-01-27 16:31:26'),
(2, 'Il aime les fleurs', 'Super Guide', 1, 1, '2013-01-29 16:08:50', '2013-01-29 16:08:50');

-- --------------------------------------------------------

--
-- Structure de la table `journeys`
--

CREATE TABLE IF NOT EXISTS `journeys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tourist_id` int(11) unsigned DEFAULT NULL,
  `guide_id` int(11) unsigned DEFAULT NULL,
  `track_id` int(11) unsigned DEFAULT NULL,
  `zone_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `about` text,
  `body` text,
  `public` tinyint(3) unsigned DEFAULT '0',
  `crew` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `journeys`
--

INSERT INTO `journeys` (`id`, `tourist_id`, `guide_id`, `track_id`, `zone_id`, `name`, `about`, `body`, `public`, `crew`, `created`, `modified`) VALUES
(1, 1, 1, 1, 1, 'Découvrir Kham', 'gboh,,mpkpm', 'Vita est illis semper in fuga', 1, 1, '2013-01-28 17:46:09', '2013-01-30 14:59:45'),
(4, NULL, NULL, 1, 2, 'Track 3', 'fezfefgzeg', 'ertyuh', 1, 48, '2013-01-29 16:16:07', '2013-01-29 16:33:26'),
(12, NULL, NULL, 2, 2, 'Track 8', 'QsDG', NULL, 1, NULL, '2013-01-30 13:58:14', '2013-01-30 13:58:14'),
(6, NULL, NULL, 2, 2, 'Track 5', 'zesrtfyguhj', 'yhujkl', 1, 32, '2013-01-30 10:25:57', '2013-01-30 15:37:06'),
(11, NULL, NULL, 1, 1, 'Track 4', 'dzerty', NULL, 1, NULL, '2013-01-30 11:02:54', '2013-01-30 11:02:54'),
(3, NULL, NULL, 2, 1, 'dsjd', 'hkjhkjh', 'sdshgjhg', 0, 99, '2013-01-29 14:42:53', '2013-01-29 16:19:22'),
(9, NULL, NULL, 2, 2, 'Track 6', 'zsfergdhtf', 'gyhujkl', 1, 20, '2013-01-30 10:49:59', '2013-01-30 15:37:22'),
(10, NULL, NULL, 2, 2, 'Track 7', 'zedrtyu', 'hjklm', 1, 20, '2013-01-30 10:54:00', '2013-01-30 15:37:30');

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ref` varchar(60) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ref` (`ref`),
  KEY `ref_id` (`ref_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `medias`
--

INSERT INTO `medias` (`id`, `ref`, `ref_id`, `file`, `position`) VALUES
(1, 'Tourist', 1, '/uploads/2013/01/llv01.jpg', 0),
(2, 'Tourist', 2, '/uploads/2013/01/llv02.JPG', 0),
(3, 'Tourist', 1, '/profile/2013/1/1/1.jpg', 0),
(4, 'Tourist', 1, '/uploads/profiles/2013/1/1/1.jpg', 0),
(5, 'Tourist', 1, '/uploads/profiles/2013/1/1/1-1.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tourists`
--

CREATE TABLE IF NOT EXISTS `tourists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `bio` text,
  `media_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `tourists`
--

INSERT INTO `tourists` (`id`, `first_name`, `last_name`, `bio`, `media_id`, `user_id`, `created`, `modified`) VALUES
(1, 'Gaspard', 'Beernaert', 'Il aime les grandes plaines de neige, il veut un yak', 5, 1, NULL, '2013-01-28 15:02:14'),
(2, 'Jo', 'Bo', 'Depuis tout petit, il aimait la glace à la chantilly', 2, 2, NULL, '2013-01-28 13:58:57');

-- --------------------------------------------------------

--
-- Structure de la table `tourists_friends`
--

CREATE TABLE IF NOT EXISTS `tourists_friends` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tourist_id` int(11) unsigned DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  `status` char(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tracks`
--

CREATE TABLE IF NOT EXISTS `tracks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` int(10) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `journey_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tracks`
--

INSERT INTO `tracks` (`id`, `name`, `description`, `duration`, `zone_id`, `journey_count`) VALUES
(1, ' Kham', 'micum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, quam qualis hodie sit.', 3, 1, 3),
(2, 'Tassili du Hoggar', 'non est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est', 5, 2, 5);


# Dump of table messages
# ------------------------------------------------------------

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(150) NOT NULL,
  `message` longtext NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `subject`, `message`, `sender_id`, `receiver_id`, `date`) VALUES
(1, 'salut', 'ceci est un test', 2, 1, '2013-01-28 18:54:00'),
(3, 'Vision d''horreur', 'As tu aperçus l''autre soir le petit poucet vert ?', 1, 4, '2013-01-28 19:58:00'),
(4, 'Test coucou 2', 'ceci est un joli test', 2, 1, '2013-01-29 15:23:00');


-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `group_id` int(11) DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`, `updated`, `group_id`)
VALUES
	(1,'gasp','pass','gaspard@gmail.com','2013-01-24 13:29:28','2013-01-25 10:59:58',1),
	(2,'john','pass','jo@lamo.uk','2013-01-24 13:29:55','2013-01-24 16:30:15',NULL),
	(3,'martha','pass','martha@yahoo.com','2013-01-24 18:18:16','2013-01-24 18:18:16',NULL),
	(4,'joseph','pass','joseh@yahoo.com','2013-01-24 18:19:05','2013-01-24 18:19:05',NULL),
	(5,'veteran','pass','veteranmartha@yahoo.com','2013-01-24 18:19:34','2013-01-24 18:19:34',NULL),
	(6,'patrick','pass','patrick@yahoo.com','2013-01-24 18:20:25','2013-01-24 18:20:25',NULL),
	(7,'emile','pass','emile@yahoo.com','2013-01-24 18:57:35',NULL,NULL),
	(8,'ernesto','pass','ernesto@yahoo.com','2013-01-24 18:57:49',NULL,NULL),
	(9,'peter','pass','peter@yahoo.com','2013-01-24 18:57:53',NULL,NULL),
	(10,'beber','pass','beber@yahoo.com','2013-01-24 18:57:57',NULL,NULL),
	(11,'jack','pass','jack@yahoo.com','2013-01-24 18:58:00',NULL,NULL),
	(12,'greg','pass','greg@yahoo.com','2013-01-24 18:58:15',NULL,NULL),
	(13,'emilio','pass','emilio@yahoo.com','2013-01-24 18:58:29',NULL,NULL),
	(14,'michael','pass','michael@yahoo.com','2013-01-24 18:58:45',NULL,NULL),
	(15,'juan','pass','juan@yahoo.com','2013-01-24 18:59:07',NULL,NULL),
	(16,'wolfgang','pass','wolfgang@yahoo.com','2013-01-24 18:59:21',NULL,NULL),
	(17,'dieter','pass','dieter@yahoo.com','2013-01-24 18:59:41',NULL,NULL),
	(18,'sam','pass','sam@yahoo.com','2013-01-24 18:59:51',NULL,NULL),
	(19,'micah','pass','micah@yahoo.com','2013-01-24 19:00:06',NULL,NULL),
	(20,'ferdinand','pass','ferdinand@yahoo.com','2013-01-24 19:00:33',NULL,NULL),
	(21,'jekyll','pass','jekyll@yahoo.com','2013-01-24 19:00:49',NULL,NULL),
	(22,'hide','pass','hide@yahoo.com','2013-01-24 19:01:32',NULL,NULL),
	(23,'sergey','pass','sergey@yahoo.com','2013-01-24 19:33:30','2013-01-24 19:33:30',NULL),
	(24,'maria','pass','maria@yahoo.com','2013-01-24 19:36:44','2013-01-24 19:36:44',NULL),
	(25,'admin','5751c23ea765ca65fd4c2e7f4aae4b7189bc5587','admin@admin.com','2013-01-29 15:50:59','2013-01-29 15:50:59',1),
	(26,'user','679befe1c3f6278a9c6be45eab1ff4d1249424ef','user@user.net','2013-01-29 15:53:37','2013-01-29 15:53:37',2);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table zones
# ------------------------------------------------------------

DROP TABLE IF EXISTS `zones`;

CREATE TABLE `zones` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`description` text NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




INSERT INTO `zones` (`id`, `name`, `description`) VALUES
(1, 'Tibet oriental', 'Quare talis improborum consensio non modo excusatione amicitiae tegenda non est sed potius'),
(2, ' Sahara algérien', 'supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio a');


# notifications by valou

DROP TABLE IF EXISTS `notifications`;


CREATE TABLE `notifications` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` char(160) DEFAULT NULL,
  `tourist_id` int(11) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `viewed` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text,
  `note` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `object_id` int(11) DEFAULT NULL,
  `object_type` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `journeys_tourists`
--

CREATE TABLE IF NOT EXISTS `journeys_tourists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `journey_id` int(11) DEFAULT NULL,
  `tourist_id` int(11) DEFAULT NULL,
  `status` tinyint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `journeys_tourists`
--

INSERT INTO `journeys_tourists` (`id`, `journey_id`, `tourist_id`, `status`) VALUES
(3, 1, 1, NULL),
(4, 2, 7, NULL),
(5, 3, 2, NULL),
(7, 1, 7, NULL);


=======
-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 30 Janvier 2013 à 15:53
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `caketrek_default`
--

-- --------------------------------------------------------

--
-- Structure de la table `badges`
--

CREATE TABLE IF NOT EXISTS `badges` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `badges`
--

INSERT INTO `badges` (`id`, `name`, `label`, `description`, `created`, `modified`) VALUES
(1, 'rookie', 'Rookie', 'Premiers pas', NULL, NULL),
(2, 'first_blood', 'First Blood', 'Première Journey qui a été annulée', NULL, NULL),
(3, 'natural_born_leader', 'Natural Born Leader', 'A organisé plus de 10 journeys', NULL, NULL),
(4, 'walker', 'Walker', 'A participé à au moins 5 journeys', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `badges_objects`
--

CREATE TABLE IF NOT EXISTS `badges_objects` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `badge_id` int(11) unsigned DEFAULT NULL,
  `object_id` int(11) unsigned DEFAULT NULL,
  `object` char(30) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `badges_objects`
--

INSERT INTO `badges_objects` (`id`, `badge_id`, `object_id`, `object`, `created`) VALUES
(21, 3, 2, 'Tourist', '2013-01-28 13:58:57'),
(20, 2, 2, 'Tourist', '2013-01-28 13:58:57'),
(29, 4, 1, 'Tourist', '2013-01-28 15:02:14'),
(28, 1, 1, 'Tourist', '2013-01-28 15:02:14'),
(26, 1, 1, 'Guide', '2013-01-28 15:01:34'),
(27, 7, 2, 'Zone', '2013-01-28 15:01:50');

-- --------------------------------------------------------

--
-- Structure de la table `badges_users`
--

CREATE TABLE IF NOT EXISTS `badges_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `badge_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `badges_users` (`id`, `badge_id`, `user_id`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 3, 2),
(4, 1, 4),
(5, 2, 1);

--
-- Contenu de la table `badges_users`
--

# Dump of table groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `name`, `created`, `modified`)
VALUES
	(1,'admins','2013-01-29 15:49:11','2013-01-29 15:49:11'),
	(2,'tourists','2013-01-29 15:49:15','2013-01-29 15:49:15'),
	(3,'guides','2013-01-29 15:49:15','2013-01-29 15:49:15'),
	(4,'spammers','2013-01-29 15:49:15','2013-01-29 15:49:15');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table friends
# ------------------------------------------------------------

CREATE TABLE `friends` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `follower_id` int(11) unsigned NOT NULL,
  `following_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_following_follower` (`follower_id`,`following_id`),
  KEY `follower` (`follower_id`),
  KEY `following` (`following_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `guides`
--

CREATE TABLE IF NOT EXISTS `guides` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `slogan` varchar(200) DEFAULT NULL,
  `description` text,
  `tourist_id` int(11) DEFAULT NULL,
  `validated` tinyint(3) unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `guides`
--

INSERT INTO `guides` (`id`, `slogan`, `description`, `tourist_id`, `validated`, `created`, `modified`) VALUES
(1, 'il aime la montagne', '', 2, 1, '2013-01-27 16:31:08', '2013-01-27 16:31:26'),
(2, 'Il aime les fleurs', 'Super Guide', 1, 1, '2013-01-29 16:08:50', '2013-01-29 16:08:50');

-- --------------------------------------------------------

--
-- Structure de la table `journeys`
--

CREATE TABLE IF NOT EXISTS `journeys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tourist_id` int(11) unsigned DEFAULT NULL,
  `guide_id` int(11) unsigned DEFAULT NULL,
  `track_id` int(11) unsigned DEFAULT NULL,
  `zone_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `about` text,
  `body` text,
  `public` tinyint(3) unsigned DEFAULT '0',
  `crew` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `journeys`
--

INSERT INTO `journeys` (`id`, `tourist_id`, `guide_id`, `track_id`, `zone_id`, `name`, `about`, `body`, `public`, `crew`, `created`, `modified`) VALUES
(1, 1, 1, 1, 1, 'Découvrir Kham', 'gboh,,mpkpm', 'Vita est illis semper in fuga', 1, 1, '2013-01-28 17:46:09', '2013-01-30 14:59:45'),
(4, NULL, NULL, 1, 2, 'Track 3', 'fezfefgzeg', 'ertyuh', 1, 48, '2013-01-29 16:16:07', '2013-01-29 16:33:26'),
(12, NULL, NULL, 2, 2, 'Track 8', 'QsDG', NULL, 1, NULL, '2013-01-30 13:58:14', '2013-01-30 13:58:14'),
(6, NULL, NULL, 2, 2, 'Track 5', 'zesrtfyguhj', 'yhujkl', 1, 32, '2013-01-30 10:25:57', '2013-01-30 15:37:06'),
(11, NULL, NULL, 1, 1, 'Track 4', 'dzerty', NULL, 1, NULL, '2013-01-30 11:02:54', '2013-01-30 11:02:54'),
(3, NULL, NULL, 2, 1, 'dsjd', 'hkjhkjh', 'sdshgjhg', 0, 99, '2013-01-29 14:42:53', '2013-01-29 16:19:22'),
(9, NULL, NULL, 2, 2, 'Track 6', 'zsfergdhtf', 'gyhujkl', 1, 20, '2013-01-30 10:49:59', '2013-01-30 15:37:22'),
(10, NULL, NULL, 2, 2, 'Track 7', 'zedrtyu', 'hjklm', 1, 20, '2013-01-30 10:54:00', '2013-01-30 15:37:30');

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ref` varchar(60) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ref` (`ref`),
  KEY `ref_id` (`ref_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `medias`
--

INSERT INTO `medias` (`id`, `ref`, `ref_id`, `file`, `position`) VALUES
(1, 'Tourist', 1, '/uploads/2013/01/llv01.jpg', 0),
(2, 'Tourist', 2, '/uploads/2013/01/llv02.JPG', 0),
(3, 'Tourist', 1, '/profile/2013/1/1/1.jpg', 0),
(4, 'Tourist', 1, '/uploads/profiles/2013/1/1/1.jpg', 0),
(5, 'Tourist', 1, '/uploads/profiles/2013/1/1/1-1.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tourists`
--

CREATE TABLE IF NOT EXISTS `tourists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `bio` text,
  `media_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `tourists`
--

INSERT INTO `tourists` (`id`, `first_name`, `last_name`, `bio`, `media_id`, `user_id`, `created`, `modified`) VALUES
(1, 'Gaspard', 'Beernaert', 'Il aime les grandes plaines de neige, il veut un yak', 5, 1, NULL, '2013-01-28 15:02:14'),
(2, 'Jo', 'Bo', 'Depuis tout petit, il aimait la glace à la chantilly', 2, 2, NULL, '2013-01-28 13:58:57');

-- --------------------------------------------------------

--
-- Structure de la table `tourists_friends`
--

CREATE TABLE IF NOT EXISTS `tourists_friends` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tourist_id` int(11) unsigned DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  `status` char(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tracks`
--

CREATE TABLE IF NOT EXISTS `tracks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` int(10) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `journey_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tracks`
--

INSERT INTO `tracks` (`id`, `name`, `description`, `duration`, `zone_id`, `journey_count`) VALUES
(1, ' Kham', 'micum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, quam qualis hodie sit.', 3, 1, 3),
(2, 'Tassili du Hoggar', 'non est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est', 5, 2, 5);


# Dump of table messages
# ------------------------------------------------------------

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(150) NOT NULL,
  `message` longtext NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `subject`, `message`, `sender_id`, `receiver_id`, `date`) VALUES
(1, 'salut', 'ceci est un test', 2, 1, '2013-01-28 18:54:00'),
(3, 'Vision d''horreur', 'As tu aperçus l''autre soir le petit poucet vert ?', 1, 4, '2013-01-28 19:58:00'),
(4, 'Test coucou 2', 'ceci est un joli test', 2, 1, '2013-01-29 15:23:00');


-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `group_id` int(11) DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`, `updated`, `group_id`)
VALUES
	(1,'gasp','pass','gaspard@gmail.com','2013-01-24 13:29:28','2013-01-25 10:59:58',1),
	(2,'john','pass','jo@lamo.uk','2013-01-24 13:29:55','2013-01-24 16:30:15',NULL),
	(3,'martha','pass','martha@yahoo.com','2013-01-24 18:18:16','2013-01-24 18:18:16',NULL),
	(4,'joseph','pass','joseh@yahoo.com','2013-01-24 18:19:05','2013-01-24 18:19:05',NULL),
	(5,'veteran','pass','veteranmartha@yahoo.com','2013-01-24 18:19:34','2013-01-24 18:19:34',NULL),
	(6,'patrick','pass','patrick@yahoo.com','2013-01-24 18:20:25','2013-01-24 18:20:25',NULL),
	(7,'emile','pass','emile@yahoo.com','2013-01-24 18:57:35',NULL,NULL),
	(8,'ernesto','pass','ernesto@yahoo.com','2013-01-24 18:57:49',NULL,NULL),
	(9,'peter','pass','peter@yahoo.com','2013-01-24 18:57:53',NULL,NULL),
	(10,'beber','pass','beber@yahoo.com','2013-01-24 18:57:57',NULL,NULL),
	(11,'jack','pass','jack@yahoo.com','2013-01-24 18:58:00',NULL,NULL),
	(12,'greg','pass','greg@yahoo.com','2013-01-24 18:58:15',NULL,NULL),
	(13,'emilio','pass','emilio@yahoo.com','2013-01-24 18:58:29',NULL,NULL),
	(14,'michael','pass','michael@yahoo.com','2013-01-24 18:58:45',NULL,NULL),
	(15,'juan','pass','juan@yahoo.com','2013-01-24 18:59:07',NULL,NULL),
	(16,'wolfgang','pass','wolfgang@yahoo.com','2013-01-24 18:59:21',NULL,NULL),
	(17,'dieter','pass','dieter@yahoo.com','2013-01-24 18:59:41',NULL,NULL),
	(18,'sam','pass','sam@yahoo.com','2013-01-24 18:59:51',NULL,NULL),
	(19,'micah','pass','micah@yahoo.com','2013-01-24 19:00:06',NULL,NULL),
	(20,'ferdinand','pass','ferdinand@yahoo.com','2013-01-24 19:00:33',NULL,NULL),
	(21,'jekyll','pass','jekyll@yahoo.com','2013-01-24 19:00:49',NULL,NULL),
	(22,'hide','pass','hide@yahoo.com','2013-01-24 19:01:32',NULL,NULL),
	(23,'sergey','pass','sergey@yahoo.com','2013-01-24 19:33:30','2013-01-24 19:33:30',NULL),
	(24,'maria','pass','maria@yahoo.com','2013-01-24 19:36:44','2013-01-24 19:36:44',NULL),
	(25,'admin','5751c23ea765ca65fd4c2e7f4aae4b7189bc5587','admin@admin.com','2013-01-29 15:50:59','2013-01-29 15:50:59',1),
	(26,'user','679befe1c3f6278a9c6be45eab1ff4d1249424ef','user@user.net','2013-01-29 15:53:37','2013-01-29 15:53:37',2);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table zones
# ------------------------------------------------------------

DROP TABLE IF EXISTS `zones`;

CREATE TABLE `zones` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`description` text NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




INSERT INTO `zones` (`id`, `name`, `description`) VALUES
(1, 'Tibet oriental', 'Quare talis improborum consensio non modo excusatione amicitiae tegenda non est sed potius'),
(2, ' Sahara algérien', 'supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio a');


# notifications by valou

DROP TABLE IF EXISTS `notifications`;


CREATE TABLE `notifications` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` char(160) DEFAULT NULL,
  `tourist_id` int(11) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `viewed` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text,
  `note` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `tourist_id` int(11) DEFAULT NULL,
  `object_id` int(11) DEFAULT NULL,
  `object_type` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;


