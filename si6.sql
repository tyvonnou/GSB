-- phpMyAdmin SQL Dump
-- version 4.2.0
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 22 Septembre 2017 à 09:09
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `si6`
--

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE IF NOT EXISTS `etat` (
  `id` char(2) NOT NULL,
  `libelle` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`id`, `libelle`) VALUES
('CL', 'Saisie cloturée'),
('CR', 'Saisie en cours'),
('RB', 'Remboursée'),
('VA', 'Valide');

-- --------------------------------------------------------

--
-- Structure de la table `fichefrais`
--

CREATE TABLE IF NOT EXISTS `fichefrais` (
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `annee` varchar(255) NOT NULL,
  `nbJustificatifs` int(11) DEFAULT NULL,
  `montantValide` decimal(10,2) DEFAULT NULL,
  `dateModif` date DEFAULT NULL,
  `idEtat` char(2) DEFAULT 'CR'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fichefrais`
--

INSERT INTO `fichefrais` (`idVisiteur`, `mois`, `annee`, `nbJustificatifs`, `montantValide`, `dateModif`, `idEtat`) VALUES
('1', '12', '2015', 6, '466.00', '2017-03-30', 'VA');

-- --------------------------------------------------------

--
-- Structure de la table `fraisforfait`
--

CREATE TABLE IF NOT EXISTS `fraisforfait` (
  `id` char(3) NOT NULL,
  `libelle` char(20) DEFAULT NULL,
  `montant` decimal(5,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fraisforfait`
--

INSERT INTO `fraisforfait` (`id`, `libelle`, `montant`) VALUES
('ETP', 'Frais Etape', '110.00'),
('KM', 'Frais Kilometrique', '0.62'),
('NUI', 'Nuitee', '85.00'),
('REP', 'Repas Restaurant', '25.00');

-- --------------------------------------------------------

--
-- Structure de la table `lignefraisforfait`
--

CREATE TABLE IF NOT EXISTS `lignefraisforfait` (
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `idFraisForfait` char(3) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lignefraisforfait`
--

INSERT INTO `lignefraisforfait` (`idVisiteur`, `mois`, `idFraisForfait`, `quantite`) VALUES
('1', 'dec', 'KM', 2),
('1', 'dec', 'ETP', 1),
('1', 'dec', 'NUI', 3),
('1', 'dec', 'REP', 4);

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE IF NOT EXISTS `visiteur` (
  `id` char(4) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30) DEFAULT NULL,
  `login` char(20) DEFAULT NULL,
  `mdp` char(40) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`, `Type`) VALUES
('1', 'Paul', 'LeVisiteur', 'Visiteur', 'Visiteur', '12 rue de Quimper', '29200', 'Brest', '2017-02-01', 'V'),
('2', 'Jaques', 'LeComptable', 'Comptable', 'Comptable', '5 rue de brest', '29200', 'Brest', '2017-04-10', 'C'),
('3', 'George', 'L''admin', 'Admin', 'Admin', '12 rue de quimper', '29200', 'Brest', '2017-07-09', 'A'),
('4', 'Eric', 'LeVisiteur2', 'Visiteur2', 'Visiteur2', 'rue de pierre', '29200', 'Brest', '2017-01-01', 'V');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
 ADD PRIMARY KEY (`idVisiteur`,`mois`);

--
-- Index pour la table `fraisforfait`
--
ALTER TABLE `fraisforfait`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignefraisforfait`
--
ALTER TABLE `lignefraisforfait`
 ADD PRIMARY KEY (`idVisiteur`,`mois`,`idFraisForfait`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
 ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
