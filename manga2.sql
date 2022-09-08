-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `manga2`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`ID`, `category`) VALUES
(1, 'Horreur'),
(2, 'Thriller'),
(3, 'Ninja'),
(4, 'Aventure'),
(5, 'Action'),
(6, 'Romance'),
(7, 'Vampire'),
(8, 'Humour'),
(9, 'Shonen');

-- --------------------------------------------------------

--
-- Structure de la table `manga`
--

CREATE TABLE `manga` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `manga`
--

INSERT INTO `manga` (`ID`, `name`, `picture`, `category`) VALUES
(1, 'Doubt', 'doubt.jpg', 1),
(2, 'Judge', 'judge.jpg', 2),
(3, 'Boruto', 'boruto.jpg', 3),
(4, 'Pandora Hearts', 'pandora_hearts.jpg', 4),
(5, 'Tsubasa reservoir chronicle', 'tsubasa_reservoir_chronicle.jpg', 6),
(6, 'Secret', 'secret.jpg', 2),
(7, 'Dragon Ball', 'dragonball.jpg', 9);

-- --------------------------------------------------------

--
-- Structure de la table `tome`
--

CREATE TABLE `tome` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `manga` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tome`
--

INSERT INTO `tome` (`ID`, `name`, `manga`, `picture`, `quantite`) VALUES
(1, 'tome 1', 1, 'doubt_tome_1.jpg', 1),
(2, 'tome 2', 1, 'doubt_tome_2.jpg', 1),
(3, 'Tome 1', 2, 'judge_tome_1.jpg', 1),
(4, 'Tome 1', 3, 'boruto_tome_1.jpg', 0),
(5, 'Tome 2', 3, 'boruto_tome_2.jpg', 0),
(6, 'Tome 1', 4, 'pandora_hearts_tome_1.jpg', 1),
(10, 'Tome 2', 4, 'pandora_hearts_tome_2.jpg', 1),
(12, 'Tome 3', 4, 'pandora_hearts_tome_3.jpg', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `category` (`category`);

--
-- Index pour la table `tome`
--
ALTER TABLE `tome`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `manga` (`manga`),
  ADD KEY `quantite` (`quantite`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `manga`
--
ALTER TABLE `manga`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `tome`
--
ALTER TABLE `tome`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `manga`
--
ALTER TABLE `manga`
  ADD CONSTRAINT `manga_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`ID`);

--
-- Contraintes pour la table `tome`
--
ALTER TABLE `tome`
  ADD CONSTRAINT `tome_ibfk_1` FOREIGN KEY (`manga`) REFERENCES `manga` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
