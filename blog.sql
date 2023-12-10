-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- H
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 04:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28


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
-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS blog;
USE blog;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `description` varchar(200) NOT NULL,
  `path` varchar(200) NOT NULL,

  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL
  

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--


INSERT INTO `articles` (`id`, `title`, `body`, `description`, `path`, `category_id`, `author_id`) VALUES
(1, 'Green Plant', 'In the quiet of the morning, the sun painted the sky with hues of pink and gold. Birds chirped in harmony, creating a symphony of nature\'s awakening. A gentle breeze whispered through the leaves, carrying with it the promise of a new day filled with possibilities. As the world stirred from its slumber, the soft glow of dawn embraced everything in its tranquil warmth.', 'A healthy green plant', 'images/greenPlant.jpg', 1, 5),
(2, 'PC', 'Lost in the labyrinth of city lights, where the hustle and bustle create a rhythm of their own. Neon signs flicker like distant stars in the urban night sky. Sidewalks echo with the footsteps of strangers, each with a story untold. Amidst the urban symphony, secrets linger in the corners, and dreams take flight in the shadows. The city, a tapestry of lives woven together, pulsates with energy, a timeless dance in the heart of the metropolis.', 'A PC Gaming', 'images/pc.jpg', 2, 4),
(3, 'Monster PC', 'In the realm of pixels and polygons, PC gaming stands as a vibrant universe where fantasy meets technology. A custom-built rig hums with power, its illuminated components casting a soft glow in the dimly lit room. The click-clack of mechanical keys echoes in the air as a player immerses into the digital landscapes, navigating worlds with precision. Graphics rendered in breathtaking detail, frame rates dancing at the edge of seamless reality, PC gaming is an odyssey of visual delight. The hum of cooling fans is the heartbeat of an epic adventure, where every click, every keystroke, propels the player deeper into the realms of virtual escapism. Multiplayer battles unfold in real-time, connecting players across continents in a shared pursuit of victory. Discord channels become war rooms, strategy discussed in hushed tones as the glow of multiple monitors lights up faces in the quest for supremacy. Mods and customization turn games into personal expressions, transforming virtual realms into unique playgrounds. From esports arenas to casual solo quests, the PC gaming community thrives on the diversity of experiences, a testament to the boundless creativity fueled by cutting-edge technology. In this digital frontier, where frames per second matter as much as the plot twists, PC gaming is not just a hobby; it\'s a culture, a passion, a fusion of art and technology that unlocks the doors to limitless possibilities.', 'THE BEST PC FOR YOU IS A GREAT CHOICE BELIEVE ME THERE NO GREAT OPTION THAT IT', 'images/pc.jpg', 2, 6);


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
(4, 'ke,'),
(6, 'aaaa');

-- --------------------------------------------------------

--

-- Table structure for table `comments`
--
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `commenter_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `commenter_id`, `article_id`, `time`) VALUES
(1, '', 0, 0, 0),
(2, '', 0, 0, 0),
(3, 'HELLO HELLO', 3, 0, 0),
(4, '', 0, 0, 0),
(5, '', 0, 0, 0);

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

(3, 'Mohammed', 'MESKI', 'MHD', 'mohammed@gmail.com', '$2y$10$bAgoqOGzCyQzulyaKwqnf.IS1PPUP7d01OV2lkK6gM6WRbAMKTbwS', 'uploads/', 0),
(4, 'hamza', 'meski', 'HAMZA7onx', 'hamza@gmail.com', '$2y$10$fH0AW4DIR9/5LDz0yTD4C.elX0Fl78T54wK4Cs/1ehlX.sfwgqaUC', 'uploads/', 0),
(5, 'moaad', 'meski', 'smart', 'moaad@gmail.com', '$2y$10$hFuCY6McmDuaqMlwtvxPt.hTpwx1tuoFHcGoHXYrawrR/mP/murYu', 'uploads/', 0),
(18, 'Anass', 'ANASS', 'anassy', 'anass@gmail.com', '$2y$10$RyX3DIWslDYubnP86/IbZuUhvLrntZWMzzTJD2kCYSdV8yyTWVZ9O', 'uploads/', 1),
(19, 'moaad', 'MOAAD', 'moaady', 'smart@gmail.com', '$2y$10$PfrUnf0eBEXWCXzDG2sVBe3wmVg5iPlsFcne9Bv4CPS5s87wjsXx6', 'uploads/younes.jpg', 0),
(20, 'friend', 'friendex', 'friendy', 'friend@gmail.com', '$2y$10$ANJuINiIm56yrrfpkc/nQ.K5IPIlGssYK2jsGO59OYXHZAFR29gte', 'uploads/t1.png', 1);


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

-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`

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

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=906;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

