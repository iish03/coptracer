DROP TABLE IF EXISTS `cop_users`;

CREATE TABLE `cop_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `cal_color` varchar(25) DEFAULT '#E6FAD8',
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `is_admin` varchar(3) DEFAULT '0',
  `date_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `address_street` varchar(150) DEFAULT NULL,
  `address_city` varchar(100) DEFAULT NULL,
  `address_postalcode` varchar(9) DEFAULT NULL,
  `imagename` varchar(250) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `crypt_type` varchar(20) NOT NULL DEFAULT 'MD5',
  PRIMARY KEY (`id`),
  KEY `user_user_name_idx` (`user_name`),
  KEY `user_user_password_idx` (`user_password`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8

INSERT INTO cop_users VALUES('1', 'admin', '$1$ad000000$hzXFXvL3XVlnUE/X.1n9t/', '#E6FAD8', 'Krishia', 'Valencia', 'female', 'on', '2014-12-29 12:47:49', '0000-00-00 00:00:00', NULL, 'admin@gmail.com', 'Active', 'L18 B3 Belisario Subd.', 'Las Piñas', NULL, NULL, '0', 'PHP5.3MD5');


DROP TABLE IF EXISTS `cop_events`;

CREATE TABLE `cop_events` (
  `id_events` int(11) NOT NULL AUTO_INCREMENT,
  `owener_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `type` varchar(45) CHARACTER SET latin1 NOT NULL,
  `date_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `time_start` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `time_end` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  `location` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_events`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8






