-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 09 Janvier 2015 à 21:50
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `lempiredesvis`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `idadresse` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero de l''adresse',
  `numerorue` int(11) DEFAULT NULL COMMENT 'Numero de la rue',
  `rue` varchar(255) NOT NULL COMMENT 'Rue',
  `etage` int(11) DEFAULT NULL COMMENT 'Numero de l''etage',
  `codepostal` int(11) NOT NULL COMMENT 'Code postal',
  `ville` varchar(55) NOT NULL COMMENT 'Ville',
  `typeAdresse` varchar(24) NOT NULL COMMENT 'Type de l''adresse : Facturation/Livraison',
  `idclient` int(11) NOT NULL COMMENT 'Numero du client lie Ã  l''adresse',
  PRIMARY KEY (`idadresse`),
  KEY `adresse_FI_1` (`idclient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table des adresses' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `applicationpromotion`
--

CREATE TABLE IF NOT EXISTS `applicationpromotion` (
  `idpromo` int(11) NOT NULL COMMENT 'Numero de la promotion',
  `idarticle` int(11) NOT NULL COMMENT 'Article',
  `qqtearticlepromo` int(11) DEFAULT NULL COMMENT 'Quantite d''articles en promotion',
  `prixpromo` double NOT NULL COMMENT 'Prix de l''article en promotion',
  PRIMARY KEY (`idpromo`,`idarticle`),
  KEY `applicationpromotion_FI_2` (`idarticle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Liste des articles par promotion';

--
-- Contenu de la table `applicationpromotion`
--

INSERT INTO `applicationpromotion` (`idpromo`, `idarticle`, `qqtearticlepromo`, `prixpromo`) VALUES
(1, 1, 10, 0.1);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `idarticle` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Article',
  `referencearticle` varchar(55) NOT NULL COMMENT 'Reference de l''article',
  `libellearticle` varchar(255) NOT NULL COMMENT 'Libelle de l''article',
  `descriptionarticle` varchar(2024) DEFAULT NULL COMMENT 'Description article',
  `prixht` double NOT NULL COMMENT 'Prix HT de l''article',
  `qqtestock` int(11) NOT NULL COMMENT 'Quantite en stock',
  `dateajout` date NOT NULL COMMENT 'Date de creation de l''article',
  `idtaux` double NOT NULL COMMENT 'Taux de TVA de l''article',
  PRIMARY KEY (`idarticle`),
  KEY `article_FI_1` (`idtaux`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table des articles' AUTO_INCREMENT=6 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`idarticle`, `referencearticle`, `libellearticle`, `descriptionarticle`, `prixht`, `qqtestock`, `dateajout`, `idtaux`) VALUES
(1, 'vis1-5cm', 'Vis diam 1,5 cm ', 'Vis en acier de diamètre 1,5 cm, 4 cm de hauteur - marque Lempiredesvis', 0.25, 15, '2015-01-01', 1),
(2, 'vis2-0cm', 'Vis diam 2,0 cm', 'Vis en acier de diamètre 2,0 cm, 4 cm de hauteur - marque Lempiredesvis', 0.3, 26, '2015-01-02', 1),
(3, 'martarrclou1', 'Marteau arrache-clou ', 'Marteau arrache-clou, manche en bois, arrchage facilité par la forme ergonomique de la partie acier', 8, 3, '2015-01-06', 1),
(4, 'clou10cmBCT', 'Clou acier 10cm de long', 'Clou en acier signé M. BRICOLLETOUT, 10 cm de longueur à tête plate', 0.17, 165, '2015-01-05', 1),
(5, 'clou3cmEDV', 'Clou acier 3cm long lEDV', 'Clou en acier, 3cm de longueur à tête plate, L''EmpiredesVis', 0.16, 319, '2015-01-07', 1);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE IF NOT EXISTS `avis` (
  `idavis` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Avis',
  `redacteur` varchar(55) NOT NULL COMMENT 'Redacteur de l''article',
  `note` double NOT NULL COMMENT 'Note donne a l''article',
  `descriptionavis` varchar(2024) DEFAULT NULL COMMENT 'Description article',
  `idarticle` int(11) NOT NULL COMMENT 'Article lie a l''avis',
  PRIMARY KEY (`idavis`),
  KEY `avis_FI_1` (`idarticle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Avis des internautes sur un produit' AUTO_INCREMENT=2 ;

--
-- Contenu de la table `avis`
--

INSERT INTO `avis` (`idavis`, `redacteur`, `note`, `descriptionavis`, `idarticle`) VALUES
(1, 'LAsduBrico', 4.6, 'Le marteau arrache-clou déchire !', 3);

-- --------------------------------------------------------

--
-- Structure de la table `catalogue`
--

CREATE TABLE IF NOT EXISTS `catalogue` (
  `idarticle` int(11) NOT NULL COMMENT 'Numero de l''article',
  `idcategorie` int(11) NOT NULL COMMENT 'Numero de la categorie',
  PRIMARY KEY (`idarticle`,`idcategorie`),
  KEY `catalogue_FI_1` (`idcategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogue des articles par categorie';

--
-- Contenu de la table `catalogue`
--

INSERT INTO `catalogue` (`idarticle`, `idcategorie`) VALUES
(4, 1),
(5, 1),
(1, 2),
(2, 2),
(3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idcategorie` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero de la categorie',
  `libellecategorie` varchar(255) NOT NULL COMMENT 'Libelle de la categorie',
  PRIMARY KEY (`idcategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Liste des categories' AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idcategorie`, `libellecategorie`) VALUES
(1, 'Clous'),
(2, 'Vis'),
(3, 'Balais'),
(4, 'Marteau');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idclient` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant du client',
  `login` varchar(55) NOT NULL COMMENT 'Login du client = adresse mail',
  `mdp` varchar(24) NOT NULL COMMENT 'Mot de passe du client',
  `nom` varchar(24) NOT NULL COMMENT 'Nom du client',
  `prenom` varchar(24) NOT NULL COMMENT 'Prenom du client',
  `numtelephone` varchar(10) DEFAULT NULL COMMENT 'Telephone du client',
  PRIMARY KEY (`idclient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table des clients' AUTO_INCREMENT=7 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idclient`, `login`, `mdp`, `nom`, `prenom`, `numtelephone`) VALUES
(1, 'admin@mail.com', 'admin', 'ADMIN', 'admin', '0102030405'),
(2, 'test@mail.com', 'test', 'TEST', 'test', '0607080900'),
(3, 'j.jacqcues@mail.com', 'jeanjacques', 'JEAN', 'Jacques', '0604090256'),
(4, 'Pierre.paul@mail.com', 'pierrepaul', 'PIERRE', 'Paul', '0465460325'),
(5, 'valoche@mail.com', 'valoche', 'TAQUIN', 'Valérie', '0318454486'),
(6, 'Fred@mail.com', 'fred', 'LOPUIS', 'Frédérique', '0518237248');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idcommande` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero de la commande',
  `etatcommande` varchar(24) NOT NULL COMMENT 'Etat de la commande : En preparation/En cours de livraison/Livree',
  `idclient` int(11) NOT NULL COMMENT 'Id du client liÃ© Ã  la commande',
  PRIMARY KEY (`idcommande`),
  KEY `commande_FI_1` (`idclient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table de commandes' AUTO_INCREMENT=3 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idcommande`, `etatcommande`, `idclient`) VALUES
(1, 'Panier', 4),
(2, 'En préparation', 5);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `idarticle` int(11) NOT NULL COMMENT 'Numero de l''article',
  `idcommande` int(11) NOT NULL COMMENT 'Numero de la commande',
  `quantite` int(11) NOT NULL COMMENT 'Quantite du produit selectionne',
  PRIMARY KEY (`idarticle`,`idcommande`),
  KEY `panier_FI_2` (`idcommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Panier d''articles generant une commande';

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`idarticle`, `idcommande`, `quantite`) VALUES
(1, 2, 3),
(3, 1, 1),
(4, 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `idpromo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero de la promotion',
  `titrepromo` varchar(255) NOT NULL COMMENT 'Titre de la promotion',
  `datedebut` date NOT NULL COMMENT 'Date de debut de la promotion',
  `datefin` date NOT NULL COMMENT 'Date de fin de promotion',
  PRIMARY KEY (`idpromo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table des promotions' AUTO_INCREMENT=2 ;

--
-- Contenu de la table `promotion`
--

INSERT INTO `promotion` (`idpromo`, `titrepromo`, `datedebut`, `datefin`) VALUES
(1, 'Soldes du 07.01 au 17.02', '2015-01-07', '2015-02-17');

-- --------------------------------------------------------

--
-- Structure de la table `tauxtva`
--

CREATE TABLE IF NOT EXISTS `tauxtva` (
  `idtaux` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero du taux',
  `libelletaux` varchar(255) DEFAULT NULL COMMENT 'Libelle du taux de TVA',
  `tauxtva` double NOT NULL COMMENT 'Taux de la TVA',
  PRIMARY KEY (`idtaux`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table des taux de TVA' AUTO_INCREMENT=6 ;

--
-- Contenu de la table `tauxtva`
--

INSERT INTO `tauxtva` (`idtaux`, `libelletaux`, `tauxtva`) VALUES
(1, 'Taux normal', 0.2),
(2, 'Taux intermédiaire', 0.1),
(3, 'Taux réduit', 0.055),
(4, 'Taux particulier', 0.021),
(5, 'Taux entreprise/professionnel', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_FK_1` FOREIGN KEY (`idclient`) REFERENCES `client` (`idclient`);

--
-- Contraintes pour la table `applicationpromotion`
--
ALTER TABLE `applicationpromotion`
  ADD CONSTRAINT `applicationpromotion_FK_1` FOREIGN KEY (`idpromo`) REFERENCES `promotion` (`idpromo`),
  ADD CONSTRAINT `applicationpromotion_FK_2` FOREIGN KEY (`idarticle`) REFERENCES `article` (`idarticle`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_FK_1` FOREIGN KEY (`idclient`) REFERENCES `client` (`idclient`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
