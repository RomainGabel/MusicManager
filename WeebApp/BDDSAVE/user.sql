-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 18 Janvier 2013 à 15:29
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
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `IDUser` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nom` text NOT NULL,
  `Prenom` text NOT NULL,
  `Login` text NOT NULL,
  `Pswd` text NOT NULL,
  `Mail` text NOT NULL,
  PRIMARY KEY (`IDUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table contenant les utilisateurs du site web' AUTO_INCREMENT=17 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`IDUser`, `Nom`, `Prenom`, `Login`, `Pswd`, `Mail`) VALUES
(1, 'gabel', 'romain', 'rgabel', 'test', 'romain.gabel@gmail.com'),
(5, 'nicolas', 'vincent', 'vnicolas', 'test', 'test@gmail.com'),
(10, 'peeters', 'floriane', 'fpeeters', 'sdfds', 'test@gmail.com'),
(11, 'peeters', 'aline', 'appeters', 'test', 'test@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
