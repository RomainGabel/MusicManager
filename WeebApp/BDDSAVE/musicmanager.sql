-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 31 Janvier 2013 à 07:42
-- Version du serveur: 5.5.25
-- Version de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `musicmanager`
--

-- --------------------------------------------------------

--
-- Structure de la table `Album`
--

CREATE TABLE `Album` (
  `IdAlbum` tinyint(10) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(20) NOT NULL,
  `Auteur` varchar(20) NOT NULL,
  PRIMARY KEY (`IdAlbum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `Album`
--

INSERT INTO `Album` (`IdAlbum`, `Titre`, `Auteur`) VALUES
(1, 'Parachutes', 'Coldplay2'),
(2, 'Oral Fixation', 'Shakira2');

-- --------------------------------------------------------

--
-- Structure de la table `Chanson`
--

CREATE TABLE `Chanson` (
  `IdChanson` tinyint(10) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(20) NOT NULL,
  `Dure` varchar(20) NOT NULL COMMENT 'En seconde',
  `IdAlbum` tinyint(10) NOT NULL,
  `IdChanteur` tinyint(10) NOT NULL COMMENT 'Il y a une table intérmediaire',
  PRIMARY KEY (`IdChanson`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `Chanson`
--

INSERT INTO `Chanson` (`IdChanson`, `Titre`, `Dure`, `IdAlbum`, `IdChanteur`) VALUES
(1, 'Don''t Panic', '300', 1, 0),
(2, 'Spies', '250', 1, 0),
(3, 'How Do You Do', '200', 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Chanteur`
--

CREATE TABLE `Chanteur` (
  `IdChanteur` tinyint(10) unsigned NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  PRIMARY KEY (`IdChanteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Chanteur`
--

INSERT INTO `Chanteur` (`IdChanteur`, `Nom`, `Prenom`) VALUES
(0, 'Groupe', 'Coldplay');

-- --------------------------------------------------------

--
-- Structure de la table `InterChansonChanteur`
--

CREATE TABLE `InterChansonChanteur` (
  `IdInter` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `IdChanson` tinyint(10) unsigned NOT NULL,
  `IdChanteur` tinyint(10) NOT NULL,
  PRIMARY KEY (`IdInter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `InterChansonChanteur`
--

INSERT INTO `InterChansonChanteur` (`IdInter`, `IdChanson`, `IdChanteur`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `IDUser` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nom` text NOT NULL,
  `Prenom` text NOT NULL,
  `Login` text NOT NULL,
  `Pswd` text NOT NULL,
  `Mail` text NOT NULL,
  PRIMARY KEY (`IDUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table contenant les utilisateurs du site web' AUTO_INCREMENT=14 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`IDUser`, `Nom`, `Prenom`, `Login`, `Pswd`, `Mail`) VALUES
(1, 'gabel', 'romain', 'rgabel', 'test', 'romain.gabel@gmail.com'),
(5, 'nicolas', 'vincent', 'vnicolas', 'test', 'test@gmail.com'),
(10, 'peeters', 'floriane', 'fpeeters', 'sdfds', 'test@gmail.com'),
(11, 'peeters', 'aline', 'appeters', 'test', 'test@gmail.com'),
(12, 'romain', 'gabel', 'test', 'azerty', 'compte.rg@gmail.com'),
(13, 'romain', 'gabel', 'pembellot', 'azerty', 'jpembelo@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
