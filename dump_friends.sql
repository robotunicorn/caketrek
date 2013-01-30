CREATE TABLE `friends` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `follower_id` int(11) unsigned NOT NULL,
  `following_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_following_follower` (`follower_id`,`following_id`),
  KEY `follower` (`follower_id`),
  KEY `following` (`following_id`)
) ENGINE=MyISAM