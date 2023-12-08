-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 08 déc. 2023 à 11:17
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
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `path` varchar(200) NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_deleted` int(11) UNSIGNED NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `body`, `path`, `category_id`, `author_id`) VALUES
(1, 'green plante', 'a healthy green plante', '', 'images/greenPlant.jpg', 1, 1),
(2, 'PC', 'A PC Gaming', '', 'images/pc.jpg', 2, 1),
(3, 'ej', 'ej', 'sijd', '../images/1701772370blog7.jpg', 1, 14),
(10, 'wwejjeje', 'wwejebh', 'wwbaz', '1702029733blog27.jpg', 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'bio'),
(2, 'life style'),
(3, 'tech'),
(4, 'ke,'),
(5, 'ke,'),
(6, 'aa');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'abdeslam.hannouni@gmail.com', 'e547248b1ddddb433960ea6d0c33b307f31df3e5438af5ef9c4d5dd12c3d273d', '2023-12-07 18:56:23'),
(2, 'abdeslam.hannouni@gmail.com', '04e20d1ea128bf1c24a16a198b535cbc95c7b514fe1ac8ebd93c86f6c95ee5e0', '2023-12-07 18:56:27'),
(3, 'abdeslam.hannouni@gmail.com', 'dcea1f2294b574efa496aaf2d2415cb2e3a24e5caab0edb45e6f32efd202084d', '2023-12-07 18:59:17'),
(4, 'abdeslam.hannouni@gmail.com', 'f10b6a7a57dfccdd514a48666ce8461ed46d2cd2f1745c68529275e5002dfd55', '2023-12-07 19:12:12'),
(5, 'abdeslam.hannouni@gmail.com', 'c35b5eb938fc6173ee3c2d6e933fcd37fdef8fd969d8db8e89185aebc920f23d', '2023-12-07 19:12:20'),
(6, 'abdeslam.hannouni@gmail.com', 'd3be524a53a5821a2e18e9844bdec31645b579cf6d63193dda62a8aa1863c0ed', '2023-12-07 19:15:19'),
(7, 'abdeslam.hannouni@gmail.com', 'f503490c94d4f7723e16c15b00d8e1f2322b64fcd0f3276c2192c1450415a142', '2023-12-07 19:46:02'),
(8, 'abdeslam.hannouni@gmail.com', 'bc2cda72e1c5a0dba91e9bdbec7e436439f218ea27dac86490215a333fa6090b', '2023-12-07 19:51:43'),
(9, 'abdeslam.hannouni@gmail.com', '37100398478920323f40180bb358f1ac96bb0e387bf272dfa41a9278d9af1249', '2023-12-07 19:53:33'),
(10, 'abdeslam.hannouni@gmail.com', '77e068ccc5a82d184f0a36d2cee6f94ff37f399753d02e15a1227ac8b498c74f', '2023-12-07 19:58:16'),
(11, 'abdeslam.hannouni@gmail.com', '556f15f1e979f5ba419ab548e2d63ed0598d7bdf99a9ea3d9ac05b3f055b0528', '2023-12-07 21:23:47');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(1, 'hamza', 'meski', 'HAMZA7onx', 'meskihamza5@gmail.com', '22', 'images/hamza.jpg', 0),
(2, 'moaad', 'meski', 'moaad meski', 'moaad@gmail.com', '16', 'images/moaad.jpg', 0),
(3, 'naoufal', 'naoufal', 'naoufal', 'naoufal@gmail.com', '$2y$10$WSBa77l2hcFrD70kyBzIv.d8wSxwuHol2f4Xa4Em.hAIAyi9VHpky', '1701721402avatar7.jpg', 0),
(4, 'abas', 'abas', 'abas', 'abas@gmail.com', '$2y$10$na9XlZ1h0hVlbtI47omN3usK96Cllxb1rewQyORimzGBmIh.L3.N6', '1701967750blog11.jpg', 0),
(5, 'Blair', 'Brock', 'xanoxewuwi', 'abdeslam.hannouni@gmail.com', '$2y$10$NEDbCnK1aUPesCMN/.o4xOuZ4lGZce1VnCMfFnJmfcN1VoSb5JS5q', '1701975538avatar10.jpg', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_token` (`token`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
