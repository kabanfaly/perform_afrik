-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Lun 03 Août 2015 à 00:04
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Structure de la table `pa_profil`
--

DROP TABLE IF EXISTS `pa_profil`;
CREATE TABLE IF NOT EXISTS `pa_profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


INSERT INTO `pa_profil` (`id_profil`, `nom`) VALUES
(1, 'Manger'),
(2, 'Comptabilité'),
(3, 'Transit'),
(4, 'Magasin');

-- --------------------------------------------------------

--
-- Structure de la table `pa_utilisateur`
--

DROP TABLE IF EXISTS `pa_utilisateur`;
CREATE TABLE IF NOT EXISTS `pa_utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `mot_de_passe` varchar(45) NOT NULL,
  `id_profil` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  KEY `profil` (`id_profil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Contenu de la table `pa_camion`
--

INSERT INTO `pa_camion` (`id_camion`, `numero`) VALUES
(1, '1209GJ01/1645FX01'),
(13, '3159FN01/2440ES02'),
(16, '6654FB01'),
(17, '3266EL04/1227AV01'),
(19, '5837GC01/2908GA01'),
(20, '730GH02/412EJ02'),
(21, '1249FJ01/6107EE02'),
(22, '8969EA02/8970EA02'),
(23, '5501PL02/8182FL02'),
(24, '1890FL02/7915AY06'),
(25, '1208GJ01/4143AZ01'),
(26, '4894GJL01/2792GN01'),
(27, '5450CK01/4893CR01'),
(28, '3746EB01/5217CJ01'),
(29, '721EH01/2130BH04'),
(30, '7716FP03/7852EH01'),
(31, '7399CT03/4183AR01'),
(32, '3459FH01/8028CG06'),
(33, '9905FH03/9896FH03'),
(34, '972FP02/');

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
  `sac_total` int(11) NOT NULL,
  `poids_brut` double NOT NULL,
  `poids_net` double NOT NULL,
  `poids_refracte` double NOT NULL,
  `humidite` double NOT NULL,
  PRIMARY KEY (`id_dechargement`),
  KEY `id_camion` (`id_camion`,`id_ville`,`id_fournisseur`),
  KEY `id_camion_2` (`id_camion`),
  KEY `id_fournisseur` (`id_fournisseur`),
  KEY `id_ville` (`id_ville`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `pa_fournisseur`
--

DROP TABLE IF EXISTS `pa_fournisseur`;
CREATE TABLE IF NOT EXISTS `pa_fournisseur` (
  `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `adresse` text,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `pa_fournisseur`
--

INSERT INTO `pa_fournisseur` (`id_fournisseur`, `nom`, `telephone`, `adresse`) VALUES
(1, 'Kanté   Fatoumata', NULL, NULL),
(2, 'Coulibaly Oumar', NULL, NULL),
(3, 'Kone Ismael', NULL, NULL),
(6, 'Yeo', '', ''),
(7, 'Bassole', '', ''),
(8, 'Meite Hamidou', '', ''),
(9, 'Dabo Ibrahim', '', ''),
(10, 'Diaby Hamadou', '', ''),
(11, 'Traore Soumaila', '', ''),
(12, 'Diakite Idrissa', '', ''),
(13, 'Laye Amara', '', ''),
(14, 'Pele', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `pa_ville`
--

DROP TABLE IF EXISTS `pa_ville`;
CREATE TABLE IF NOT EXISTS `pa_ville` (
  `id_ville` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ville`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `pa_ville`
--

INSERT INTO `pa_ville` (`id_ville`, `nom`) VALUES
(8, 'Seguela'),
(9, 'Gohitafla'),
(10, 'Beoumi'),
(11, 'Dianra'),
(12, 'Mankono'),
(13, 'M''bahiakro'),
(14, 'Kani'),
(15, 'Zoukougbe'),
(16, 'Kounayiiri'),
(17, 'Vavoua'),
(18, 'Tiebissou'),
(19, 'Dabakala'),
(20, 'Odienne');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Structure de la table `pa_preference`
--

DROP TABLE IF EXISTS `pa_preference`;
CREATE TABLE IF NOT EXISTS `pa_preference` (
  `id_preference` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `valeur` text NOT NULL,
  PRIMARY KEY (`id_preference`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `pa_preference`
--

INSERT INTO `pa_preference` (`id_preference`, `nom`, `valeur`) VALUES
(2, 'parameters', '{"COMPANY":"PERFORM WORLD","PHONE":"Tel: (+225) 20 22 57 02 \\/ 77 77 03 03","FAX":"","EMAIL":"performworld15@gmail.com","ADDRESS":"Plateau Immeuble du Mali, 21 BP 2924, Abidjan 21, C\\u00f4te D''Ivoire."}');

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

ALTER TABLE `pa_admin` ADD `type` VARCHAR( 45 ) NOT NULL;


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `pa_utilisateur`
--
ALTER TABLE `pa_utilisateur`
  ADD CONSTRAINT `pa_utilisateur_ibfk_2` FOREIGN KEY (`id_profil`) REFERENCES `pa_profil` (`id_profil`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `pa_utilisateur` ADD UNIQUE (`login`)
