-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mer 29 Juillet 2015 à 01:57
-- Version du serveur: 5.5.44
-- Version de PHP: 5.3.10-1ubuntu3.19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `perform_afrik`
--

-- --------------------------------------------------------

--
-- Structure de la table `pa_admin`
--

DROP TABLE IF EXISTS `pa_admin`;
CREATE TABLE IF NOT EXISTS `pa_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `pa_admin`
--

INSERT INTO `pa_admin` (`id_admin`, `login`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `pa_camion`
--

DROP TABLE IF EXISTS `pa_camion`;
CREATE TABLE IF NOT EXISTS `pa_camion` (
  `id_camion` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) NOT NULL,
  PRIMARY KEY (`id_camion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pa_dechargement`
--

DROP TABLE IF EXISTS `pa_dechargement`;
CREATE TABLE IF NOT EXISTS `pa_dechargement` (
  `id_dechargement` int(11) NOT NULL AUTO_INCREMENT,
  `id_camion` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `id_fournisseur` int(11) NOT NULL,
  `date` date NOT NULL,
  `bon_sac` int(11) NOT NULL,
  `sac_dechire` int(11) NOT NULL,
  `poids_brut` int(11) NOT NULL,
  `poids_net` int(11) NOT NULL,
  `poids_refracte` int(11) NOT NULL,
  `humidite` int(11) NOT NULL,
  PRIMARY KEY (`id_dechargement`),
  KEY `id_camion` (`id_camion`,`id_ville`,`id_fournisseur`),
  KEY `id_camion_2` (`id_camion`),
  KEY `id_fournisseur` (`id_fournisseur`),
  KEY `id_ville` (`id_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pa_fournisseur`
--

DROP TABLE IF EXISTS `pa_fournisseur`;
CREATE TABLE IF NOT EXISTS `pa_fournisseur` (
  `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `adresse` text,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pa_ville`
--

DROP TABLE IF EXISTS `pa_ville`;
CREATE TABLE IF NOT EXISTS `pa_ville` (
  `id_ville` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ville`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `pa_ville`
--

INSERT INTO `pa_ville` (`id_ville`, `nom`) VALUES
(1, 'Abidjan'),
(2, 'Yamoussokoro'),
(3, 'Man'),
(4, 'Daloa');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `pa_dechargement`
--
ALTER TABLE `pa_dechargement`
  ADD CONSTRAINT `pa_dechargement_ibfk_1` FOREIGN KEY (`id_camion`) REFERENCES `pa_camion` (`id_camion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pa_dechargement_ibfk_2` FOREIGN KEY (`id_fournisseur`) REFERENCES `pa_fournisseur` (`id_fournisseur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pa_dechargement_ibfk_3` FOREIGN KEY (`id_ville`) REFERENCES `pa_ville` (`id_ville`) ON DELETE CASCADE ON UPDATE CASCADE;
