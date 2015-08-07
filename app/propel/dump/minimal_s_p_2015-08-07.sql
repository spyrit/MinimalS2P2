# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Hôte: 127.0.0.1 (MySQL 5.6.25)
# Base de données: minimal_s_p
# Temps de génération: 2015-08-07 08:35:12 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table auteur
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auteur`;

CREATE TABLE `auteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_maj` datetime DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `auteur_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `auteur` WRITE;
/*!40000 ALTER TABLE `auteur` DISABLE KEYS */;

INSERT INTO `auteur` (`id`, `nom`, `prenom`, `date_creation`, `date_maj`, `slug`)
VALUES
	(1,'Hugo','Victor','0000-00-00 00:00:00','0000-00-00 00:00:00','hugo-victor'),
	(2,'Blaise','Pascal','0000-00-00 00:00:00','0000-00-00 00:00:00','blaise-pascal'),
	(3,'Tolkien','John Ronald Reuel','2015-08-06 17:15:49','2015-08-06 17:15:49','tolkien'),
	(4,'qdqd','dqq','2015-08-07 10:00:17','2015-08-07 10:01:27','qdqd');

/*!40000 ALTER TABLE `auteur` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table livre
# ------------------------------------------------------------

DROP TABLE IF EXISTS `livre`;

CREATE TABLE `livre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur_id` int(11) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_maj` datetime DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `livre_slug` (`slug`),
  KEY `livre_fi_965aab` (`auteur_id`),
  CONSTRAINT `livre_fk_965aab` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `livre` WRITE;
/*!40000 ALTER TABLE `livre` DISABLE KEYS */;

INSERT INTO `livre` (`id`, `titre`, `auteur_id`, `date_creation`, `date_maj`, `slug`)
VALUES
	(10,'test 2',3,'2015-08-07 10:33:18','2015-08-07 10:33:18','test-2');

/*!40000 ALTER TABLE `livre` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
