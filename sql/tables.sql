DROP TABLE IF EXISTS `Item`;
CREATE TABLE `Item` (
  `itemId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET latin1 NOT NULL,
  `description` varchar(1024) CHARACTER SET latin1 NOT NULL,
  `price` double(20,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` longblob,
  PRIMARY KEY (`itemId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `Purchase`;
CREATE TABLE `Purchase` (
  `purchaseId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `purchaseDate` datetime NOT NULL,
  `purchasePrice` double(100,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`purchaseId`),
  KEY `userId` (`userId`),
  KEY `itemId` (`itemId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Rating`;
CREATE TABLE `Rating` (
  `ratingId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `rating` tinyint UNSIGNED NOT NULL,
  `comment` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`ratingId`),
  KEY `userId` (`userId`),
  KEY `fk_itemId` (`itemId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `firstName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `lastName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `userLevel` tinyint(4) NOT NULL,
  `userName` varchar(32) CHARACTER SET latin1 NOT NULL DEFAULT '',
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userName_UNIQUE` (`userName`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*user: testUser pass:testing*/
/*user: testAdmin pass:testing*/

INSERT INTO `User` VALUES (1,'testUser@example.com','ae2b1fca515949e5d54fb22b8ed95575',NULL,NULL,NULL,0,'testUser');
INSERT INTO `User` VALUES (2,'testAdmin@example.com','ae2b1fca515949e5d54fb22b8ed95575',NULL,NULL,NULL,1,'testAdmin');


DROP TABLE IF EXISTS `Wishlist`;
CREATE TABLE `Wishlist` (
  `wishListId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `dateAdded` datetime NOT NULL,
  PRIMARY KEY (`wishListId`),
  KEY `userId` (`userId`),
  KEY `fk_itemId1212` (`itemId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;