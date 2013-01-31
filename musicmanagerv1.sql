-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 31 Janvier 2013 à 16:50
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `musicmanagerv1`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `IdAlbum` tinyint(10) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(20) NOT NULL,
  `Auteur` varchar(20) NOT NULL,
  PRIMARY KEY (`IdAlbum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `album`
--

INSERT INTO `album` (`IdAlbum`, `Titre`, `Auteur`) VALUES
(1, 'Parachutes', 'Coldplay2'),
(2, 'Oral Fixation', 'Shakira2');

-- --------------------------------------------------------

--
-- Structure de la table `chanson`
--

CREATE TABLE IF NOT EXISTS `chanson` (
  `IdChanson` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `Titre` varchar(20) NOT NULL,
  `Dure` varchar(20) NOT NULL COMMENT 'En seconde',
  `IdAlbum` tinyint(10) NOT NULL COMMENT 'FK Album.IdAlbum',
  `IdChanteur` tinyint(10) unsigned NOT NULL COMMENT 'Il y a une table intérmediaire',
  PRIMARY KEY (`IdChanson`),
  KEY `fk_album_id` (`IdAlbum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `chanson`
--

INSERT INTO `chanson` (`IdChanson`, `Titre`, `Dure`, `IdAlbum`, `IdChanteur`) VALUES
(1, 'Don''t Panic', '300', 1, 1),
(2, 'Spies', '250', 1, 1),
(3, 'How Do You Do', '200', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `chanteur`
--

CREATE TABLE IF NOT EXISTS `chanteur` (
  `IdChanteur` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Type` varchar(20) NOT NULL,
  PRIMARY KEY (`IdChanteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `chanteur`
--

INSERT INTO `chanteur` (`IdChanteur`, `Nom`, `Type`) VALUES
(1, 'Coldplay', 'Groupe'),
(2, 'Shakira', 'Chanteur');

-- --------------------------------------------------------

--
-- Structure de la table `interchansonchanteur`
--

CREATE TABLE IF NOT EXISTS `interchansonchanteur` (
  `IdInter` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `IdChanson` tinyint(10) unsigned NOT NULL,
  `IdChanteur` tinyint(10) unsigned NOT NULL,
  PRIMARY KEY (`IdInter`),
  KEY `fk_Chanson_ID` (`IdChanson`),
  KEY `fk_Chanteur_ID` (`IdChanteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `interchansonchanteur`
--

INSERT INTO `interchansonchanteur` (`IdInter`, `IdChanson`, `IdChanteur`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `inter_user_chanson`
--

CREATE TABLE IF NOT EXISTS `inter_user_chanson` (
  `IdInterUC` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `IdUser` tinyint(10) unsigned NOT NULL COMMENT 'Ref sur userid',
  `IdChanson` tinyint(10) unsigned NOT NULL COMMENT 'ref sur chansonId',
  PRIMARY KEY (`IdInterUC`),
  KEY `fk_user_id` (`IdUser`),
  KEY `fk_chanson_idchanson` (`IdChanson`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table de correspondance USER CHANSON' AUTO_INCREMENT=6 ;

--
-- Contenu de la table `inter_user_chanson`
--

INSERT INTO `inter_user_chanson` (`IdInterUC`, `IdUser`, `IdChanson`) VALUES
(1, 1, 3),
(3, 2, 2),
(4, 2, 3),
(5, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `IdUser` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nom` char(20) NOT NULL,
  `Prenom` char(20) NOT NULL,
  `Login` char(20) NOT NULL,
  `Pswd` char(20) NOT NULL,
  `Mail` char(20) NOT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table contenant les utilisateurs du site web' AUTO_INCREMENT=14 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`IdUser`, `Nom`, `Prenom`, `Login`, `Pswd`, `Mail`) VALUES
(1, 'gabel', 'romain', 'rgabel', 'test', 'romain.gabel@gmail.c'),
(2, 'nicolas', 'vincent', 'vnicolas', 'test', 'test@gmail.com');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `chanson`
--
ALTER TABLE `chanson`
  ADD CONSTRAINT `fk_album_id` FOREIGN KEY (`IdAlbum`) REFERENCES `album` (`IdAlbum`);

--
-- Contraintes pour la table `interchansonchanteur`
--
ALTER TABLE `interchansonchanteur`
  ADD CONSTRAINT `fk_Chanteur_ID` FOREIGN KEY (`IdChanteur`) REFERENCES `chanteur` (`IdChanteur`),
  ADD CONSTRAINT `fk_Chanson_ID` FOREIGN KEY (`IdChanson`) REFERENCES `chanson` (`IdChanson`);

--
-- Contraintes pour la table `inter_user_chanson`
--
ALTER TABLE `inter_user_chanson`
  ADD CONSTRAINT `fk_chanson_idchanson` FOREIGN KEY (`IdChanson`) REFERENCES `chanson` (`IdChanson`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IDUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
