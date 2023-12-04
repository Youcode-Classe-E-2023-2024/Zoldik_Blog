-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 04 déc. 2023 à 11:16
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `annonce`
--

-- --------------------------------------------------------

--
-- Structure de la table `annoncer`
--

CREATE TABLE `annoncer` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annoncer`
--

INSERT INTO `annoncer` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(1, 'don', 'jhon', 'don', 'don@gmail.com', '$2y$10$Vc4tD2450ADh0QN0qnz4.eQMh8KaBo3tGcAFgKc.BbFGTGCUrKCSS', '1701034070avatar2.jpg', 0),
(12, 'naoufal', 'lb', 'nlb', 'nlb@gmail.com', '$2y$10$J21C5atMbk/EoLNuNNHQE.nHdbsIEYF/mlMURf/wzVkoIvKXSLp9i', '1701211827avatar11.jpg', 1),
(13, 'as', 'as', 'ss', 'ss@gmail.com', '$2y$10$pm5hj3Cf99FPzoAHiWi.lemvbW5Pj/.uLyHbhQas82NLAd9pwDbf6', '1701224773avatar10.jpg', 1),
(14, 'aa', 'aa', 'aa', 'aa@gmail.com', '$2y$10$r2AL1BrLOkpkElwZFycEcuWI.6.qTBx03hpwQnQ1NJ4L1hU5Ks8ly', '1701283310avatar10.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(5, 'tv', 'tv'),
(6, 'art', 'gbfv'),
(7, 'mecanique', 'mc');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `aut_id` int(11) UNSIGNED NOT NULL,
  `is_featured` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `price`, `category_id`, `aut_id`, `is_featured`) VALUES
(8, 'zd', 'defr', 'Array', 22, 5, 12, 0),
(15, 'test', 'ljhqefaqef', '1701283029blog22.jpg', 1234, 5, 13, 0),
(16, 'hz', 'hjfbhe', '1701350203blog17.jpg', 200, 5, 14, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annoncer`
--
ALTER TABLE `annoncer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_annonce_category` (`category_id`),
  ADD KEY `FK_annonce_aut` (`aut_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annoncer`
--
ALTER TABLE `annoncer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_annonce_aut` FOREIGN KEY (`aut_id`) REFERENCES `annoncer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_annonce_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
