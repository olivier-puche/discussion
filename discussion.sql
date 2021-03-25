-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 24 fév. 2021 à 13:16
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--
CREATE DATABASE IF NOT EXISTS `discussion` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `discussion`;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, 'hello', 1, '2020-11-26 00:00:00'),
(2, 'Je commence à voir le bout ;-)', 1, '2020-11-26 00:00:00'),
(4, 'Hello! ', 4, '2020-12-01 00:00:00'),
(5, 'Salut!', 3, '2020-12-01 00:00:00'),
(6, 'Génial ! Ça fonctionne ;-)', 1, '2020-12-01 00:00:00'),
(8, 'Job presque terminé', 2, '2020-12-01 00:00:00'),
(9, 'Pourquoi ', 5, '2020-12-01 00:00:00'),
(17, 'test, test, test', 5, '2020-12-01 00:00:00'),
(18, 'Affichage couleur', 2, '2020-12-01 00:00:00'),
(19, 'Je suis toujours là', 5, '2020-12-01 00:00:00'),
(20, 'Dernier test couleurs', 1, '2020-12-01 00:00:00'),
(21, 'Je discute avec Mathis', 2, '2020-12-02 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'FFF', 'f6949a8c7d5b90b4a698660bbfb9431503fbb995'),
(2, 'EEE', '637a81ed8e8217bb01c15c67c39b43b0ab4e20f1'),
(3, 'DDD', '9c969ddf454079e3d439973bbab63ea6233e4087'),
(4, 'rub', '0eb10e9f96754ce58c2a68f8c8cf075a91714d4e'),
(5, 'AAA', '7e240de74fb1ed08fa08d38063f6a6a91462a815'),
(6, 'GGG', '07dcd371560bc43c48f56a2f55739ac66741d59d'),
(7, 'ZZZ', '40fa37ec00c761c7dbb6ebdee6d4a260b922f5f4'),
(8, 'XXX', 'b60d121b438a380c343d5ec3c2037564b82ffef3'),
(9, 'WWW', 'c50267b906a652f2142cfab006e215c9f6fdc8a0'),
(10, 'VVV', 'dbe6cae2f52b55095b513c15321b934146828d76'),
(11, 'YYY', '186154712b2d5f6791d85b9a0987b98fa231779c'),
(12, 'RRR', '8578173555a47d4ea49e697badfda270dee0858f'),
(13, 'OOO', '4ae9fa0a8299a828a886c0eb30c930c7cf302a72'),
(14, 'iris', '3e9afe235a0ebee72d1969e8b4a886d5bd30c515');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
