-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 06 sep. 2023 à 08:52
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_finance`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'achat'),
(2, 'vente');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `solde` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `nom`, `type`, `solde`) VALUES
(1, 'compte banquaire', 'vente', 25400),
(2, 'comptebanquaire1', 'depense', 35400000),
(3, 'compte banquaire8', 'achat', 9000000),
(4, 'compte banquaire8', 'depence', 5000),
(5, 'compte banquaire9', 'vente', 9000),
(7, 'compte banquaire10', 'vente', 745000),
(9, 'compte banquaire11', 'vente', 745000),
(10, 'compte banquaire11', 'vente', 745000),
(11, 'compte banquaire12', 'depence', 8595000),
(12, 'compte banquaire12', 'depence', 8595000),
(13, 'compte banquaire17', 'depence', 5000),
(14, 'compte banquaire17', 'depence', 5000);

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `trans_description` longtext NOT NULL,
  `trans_date` date NOT NULL,
  `montant` int(25) NOT NULL,
  `trans_type` enum('debit','credit') NOT NULL,
  `destinateur` varchar(50) NOT NULL,
  `deleted` enum('true','false') NOT NULL DEFAULT 'false',
  `categorie_id` int(11) NOT NULL,
  `compte_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `transaction`
--

INSERT INTO `transaction` (`id`, `trans_description`, `trans_date`, `montant`, `trans_type`, `destinateur`, `deleted`, `categorie_id`, `compte_id`) VALUES
(4, 'jekhj', '0000-00-00', 100, 'credit', 'abdirahman', 'false', 1, 1),
(5, 'abdhfhgf', '2023-08-31', 170000000, 'debit', 'Ahmed', 'false', 2, 5),
(6, 'cartable', '2023-08-24', 20000, 'credit', 'haj', 'true', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(25) NOT NULL,
  `del` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `adresse`, `telephone`, `email`, `passwd`, `del`) VALUES
(0, 'Mouhiyadin', 'balbala', 77051234, 'john@example.com', '6e0b7076126a29d5dfcbd5483', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorie_id` (`categorie_id`),
  ADD KEY `fk_compte_id` (`compte_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telephone` (`telephone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_categorie_id` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `fk_compte_id` FOREIGN KEY (`compte_id`) REFERENCES `compte` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
