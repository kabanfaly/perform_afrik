-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2016 at 10:14 PM
-- Server version: 5.5.47
-- PHP Version: 5.3.10-1ubuntu3.21

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `perform_afrik`
--

-- --------------------------------------------------------

--
-- Table structure for table `pa_camion`
--

DROP TABLE IF EXISTS `pa_camion`;
CREATE TABLE IF NOT EXISTS `pa_camion` (
  `id_camion` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) NOT NULL,
  PRIMARY KEY (`id_camion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `pa_camion`
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
-- Table structure for table `pa_dechargement`
--

DROP TABLE IF EXISTS `pa_dechargement`;
CREATE TABLE IF NOT EXISTS `pa_dechargement` (
  `id_dechargement` int(11) NOT NULL AUTO_INCREMENT,
  `id_magasin` int(11) NOT NULL,
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
  `qualite` double NOT NULL,
  `prix` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id_dechargement`),
  KEY `id_camion` (`id_camion`,`id_ville`,`id_fournisseur`),
  KEY `id_camion_2` (`id_camion`),
  KEY `id_fournisseur` (`id_fournisseur`),
  KEY `id_ville` (`id_ville`),
  KEY `id_magasin` (`id_magasin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pa_dechargement`
--

INSERT INTO `pa_dechargement` (`id_dechargement`, `id_magasin`, `id_camion`, `id_ville`, `id_fournisseur`, `date`, `bon_sac`, `sac_dechire`, `sac_total`, `poids_brut`, `poids_net`, `poids_refracte`, `humidite`, `qualite`, `prix`, `total`) VALUES
(1, 3, 1, 9, 1, '2016-03-08', 20, 10, 30, 125, 58040, 57940, 0, 0, 0, 0),
(2, 4, 19, 13, 8, '2015-08-06', 53, 2, 55, 125, 255, 186, 0, 10, 200, 30),
(3, 3, 21, 13, 9, '2016-02-17', 56, 10, 66, 125, 125, 11, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pa_fournisseur`
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
-- Dumping data for table `pa_fournisseur`
--

INSERT INTO `pa_fournisseur` (`id_fournisseur`, `nom`, `telephone`, `adresse`) VALUES
(1, 'Kanté   Fatoumata', '', ''),
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
-- Table structure for table `pa_magasin`
--

DROP TABLE IF EXISTS `pa_magasin`;
CREATE TABLE IF NOT EXISTS `pa_magasin` (
  `id_magasin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_magasin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pa_magasin`
--

INSERT INTO `pa_magasin` (`id_magasin`, `nom`) VALUES
(3, 'Magasin 1'),
(4, 'Magasin 2');

-- --------------------------------------------------------

--
-- Table structure for table `pa_preference`
--

DROP TABLE IF EXISTS `pa_preference`;
CREATE TABLE IF NOT EXISTS `pa_preference` (
  `id_preference` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `valeur` text NOT NULL,
  PRIMARY KEY (`id_preference`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pa_preference`
--

INSERT INTO `pa_preference` (`id_preference`, `nom`, `valeur`) VALUES
(2, 'parameters', '{"COMPANY":"PERFORM WORLD","PHONE":"Tel: (+225) 20 22 57 02 \\/ 77 77 03 03","FAX":"","EMAIL":"performworld15@gmail.com","ADDRESS":"Plateau Immeuble du Mali, 21 BP 2924, Abidjan 21, C\\u00f4te D''Ivoire."}');

-- --------------------------------------------------------

--
-- Table structure for table `pa_profil`
--

DROP TABLE IF EXISTS `pa_profil`;
CREATE TABLE IF NOT EXISTS `pa_profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `droits_colonnes_dechargement` text NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pa_profil`
--

INSERT INTO `pa_profil` (`id_profil`, `nom`, `droits_colonnes_dechargement`) VALUES
(1, 'Manager', '{"id_camion":true,"id_magasin":true,"id_ville":true,"id_fournisseur":true,"date":true,"bon_sac":true,"sac_dechire":true,"sac_total":true,"poids_brut":true,"poids_net":true,"poids_refracte":true,"humidite":true,"qualite":true,"prix":true,"total":true}'),
(2, 'Comptabilité', '{"id_camion":true,"id_ville":true,"id_fournisseur":true,"date":true,"bon_sac":true,"sac_dechire":true,"sac_total":true,"poids_brut":true,"poids_net":true,"poids_refracte":true,"humidite":false,"qualite":false,"prix":true,"total":true}'),
(3, 'Transit', '{"id_camion":true,"id_ville":false,"id_fournisseur":false,"date":false,"bon_sac":true,"sac_dechire":true,"sac_total":true,"poids_brut":true,"poids_net":true,"poids_refracte":true,"humidite":false,"qualite":false,"prix":false,"total":false}'),
(4, 'Magasin', '{"id_camion":true,"id_ville":true,"id_fournisseur":true,"date":true,"bon_sac":true,"sac_dechire":true,"sac_total":true,"poids_brut":true,"poids_net":true,"poids_refracte":true,"humidite":true,"qualite":true,"prix":false,"total":false}');

-- --------------------------------------------------------

--
-- Table structure for table `pa_utilisateur`
--

DROP TABLE IF EXISTS `pa_utilisateur`;
CREATE TABLE IF NOT EXISTS `pa_utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `statut` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `login` (`login`),
  KEY `profile` (`id_profil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pa_utilisateur`
--

INSERT INTO `pa_utilisateur` (`id_utilisateur`, `nom`, `prenom`, `login`, `mot_de_passe`, `id_profil`, `statut`) VALUES
(2, 'Admin', 'Administrateur', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(4, 'Transit', 'Transit', 'transit', 'dcef234a574fa354c82127c50b83174a', 3, 1),
(6, 'Comptabilite', 'Comptabilite', 'compta', '3b3a542046e2770f4877af00ed182a9b', 2, 1),
(7, 'Mag 1', 'Mag 1', 'magasin1', '2f45fc781cd1f28ee732d78b1d1d3b72', 4, 1),
(8, 'Mag 2', 'Mag 2', 'magasin2', '2f45fc781cd1f28ee732d78b1d1d3b72', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pa_utilisateur_magasin`
--

DROP TABLE IF EXISTS `pa_utilisateur_magasin`;
CREATE TABLE IF NOT EXISTS `pa_utilisateur_magasin` (
  `id_utilisateur_magasin` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_magasin` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur_magasin`),
  KEY `id_utilisateur` (`id_utilisateur`,`id_magasin`),
  KEY `id_magasin` (`id_magasin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pa_utilisateur_magasin`
--

INSERT INTO `pa_utilisateur_magasin` (`id_utilisateur_magasin`, `id_utilisateur`, `id_magasin`) VALUES
(2, 7, 3),
(1, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pa_ville`
--

DROP TABLE IF EXISTS `pa_ville`;
CREATE TABLE IF NOT EXISTS `pa_ville` (
  `id_ville` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ville`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `pa_ville`
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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pa_dechargement`
--
ALTER TABLE `pa_dechargement`
  ADD CONSTRAINT `pa_dechargement_ibfk_1` FOREIGN KEY (`id_camion`) REFERENCES `pa_camion` (`id_camion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pa_dechargement_ibfk_2` FOREIGN KEY (`id_fournisseur`) REFERENCES `pa_fournisseur` (`id_fournisseur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pa_dechargement_ibfk_3` FOREIGN KEY (`id_ville`) REFERENCES `pa_ville` (`id_ville`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pa_dechargement_ibfk_4` FOREIGN KEY (`id_magasin`) REFERENCES `pa_magasin` (`id_magasin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pa_utilisateur`
--
ALTER TABLE `pa_utilisateur`
  ADD CONSTRAINT `pa_utilisateur_ibfk_2` FOREIGN KEY (`id_profil`) REFERENCES `pa_profil` (`id_profil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pa_utilisateur_magasin`
--
ALTER TABLE `pa_utilisateur_magasin`
  ADD CONSTRAINT `pa_utilisateur_magasin_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `pa_utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pa_utilisateur_magasin_ibfk_2` FOREIGN KEY (`id_magasin`) REFERENCES `pa_magasin` (`id_magasin`) ON DELETE CASCADE ON UPDATE CASCADE;
