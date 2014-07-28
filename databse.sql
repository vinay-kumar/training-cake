DROP DATABASE IF EXISTS cakephp;
CREATE DATABASE cakephp;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `default` tinyint(1) DEFAULT 0,
  `sequence` int(11) DEFAULT 0,
  `description` text,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `parent_type` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Menu''s Table' AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT = 1;


DROP TABLE IF EXISTS `page_groups`;
CREATE TABLE IF NOT EXISTS `page_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Page Group''s Table' AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `page_group_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `page_content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Page''s Table' AUTO_INCREMENT=1 ;



DROP TABLE IF EXISTS `features`;
CREATE TABLE IF NOT EXISTS `features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `page_content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Feature''s Table' AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `feature_pages`;
CREATE TABLE IF NOT EXISTS `feature_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `feature_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `sequence` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Feature Page''s Table' AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `feature_id` int(11) DEFAULT NULL,
  `sequence` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Banner''s Table' AUTO_INCREMENT=1 ;
