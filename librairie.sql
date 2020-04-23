-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 23 avr. 2020 à 21:35
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `librairie`
--

-- --------------------------------------------------------

--
-- Structure de la table `emprunts`
--

CREATE TABLE `emprunts` (
  `empnum` char(255) NOT NULL,
  `empdate` date NOT NULL,
  `empdateret` date NOT NULL,
  `empcodelivre` char(255) NOT NULL,
  `empnumlect` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emprunts`
--

INSERT INTO `emprunts` (`empnum`, `empdate`, `empdateret`, `empcodelivre`, `empnumlect`) VALUES
('Lask216', '2020-04-21', '2020-04-29', 'skfaPo67', '216');

-- --------------------------------------------------------

--
-- Structure de la table `lecteurs`
--

CREATE TABLE `lecteurs` (
  `lecnum` char(16) NOT NULL,
  `lecnom` char(16) DEFAULT NULL,
  `lecprenom` char(16) DEFAULT NULL,
  `lecadresse` char(80) DEFAULT NULL,
  `lecville` char(16) DEFAULT NULL,
  `leccodepostal` char(10) DEFAULT NULL,
  `lecmotdepasse` char(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lecteurs`
--

INSERT INTO `lecteurs` (`lecnum`, `lecnom`, `lecprenom`, `lecadresse`, `lecville`, `leccodepostal`, `lecmotdepasse`) VALUES
('216', 'Lamy', 'Elena', '7 rue du Paradis', 'Paris', '75012', 'Elena'),
('221', 'Theos', 'Pablo', '3 passage Secret', 'Paris', '75004', 'Pablo'),
('342', 'Camden', 'Nicolas', '24 av du Papillon', 'Paris', '75013', 'Nicolas'),
('528', 'Line', 'Margo', '22 rue de la Liberté', 'Paris', '75005', 'Margo'),
('Li874870086', 'SKAOU', 'FATIMA', 'RUE 951 NR 598 HAY DOHA DCHEIRA INZEGANE', 'AGADIR', 'JB506956', 'fatima'),
('LI890987', 'samahri', 'zineb', 'hiii', 'agadir', 'samahri', 'zineb');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `livcode` char(255) NOT NULL,
  `livnomaut` char(255) DEFAULT NULL,
  `livprenomaut` char(255) DEFAULT NULL,
  `livtitre` char(255) DEFAULT NULL,
  `livcategorie` char(255) DEFAULT NULL,
  `livISBN` char(255) DEFAULT NULL,
  `livdejareserve` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`livcode`, `livnomaut`, `livprenomaut`, `livtitre`, `livcategorie`, `livISBN`, `livdejareserve`) VALUES
('AsIsSc08', 'Asimov', 'Isaac', 'Fondation', 'Science-fiction', '2070415708', 1),
('BaJaJu63', 'Barrie', 'James M.', 'Peter Pan', 'Junior', '2290333263', 0),
('DiPhSc43', 'Dick', 'Philip K.', 'Blade Runner', 'Science-fiction', '2290314943', 1),
('KaElRo58', 'Kazan', 'Elia', 'L’arrangement', 'Roman', '2234023858', 1),
('KuMiRo38', 'Kundera', 'Milan', 'La plaisanterie', 'Roman', '2070703738', 0),
('skfaPo67', 'skaou', 'fatima', 'rulito', 'Policier', '2234567', 1),
('VeJuRo22', 'Verne', 'Jules', 'L île mysterieuse', 'Roman', '0812966422', 1),
('WaAlRo37', 'Walker', 'Alice', 'La couleur pourpre', 'Roman', '2290021237', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `emprunts`
--
ALTER TABLE `emprunts`
  ADD PRIMARY KEY (`empnum`),
  ADD KEY `empcodelivre` (`empcodelivre`),
  ADD KEY `empnumlect` (`empnumlect`);

--
-- Index pour la table `lecteurs`
--
ALTER TABLE `lecteurs`
  ADD PRIMARY KEY (`lecnum`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`livcode`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunts`
--
ALTER TABLE `emprunts`
  ADD CONSTRAINT `emprunts_ibfk_1` FOREIGN KEY (`empcodelivre`) REFERENCES `livres` (`livcode`),
  ADD CONSTRAINT `emprunts_ibfk_2` FOREIGN KEY (`empnumlect`) REFERENCES `lecteurs` (`lecnum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
