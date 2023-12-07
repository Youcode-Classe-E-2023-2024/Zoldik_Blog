-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `description` varchar(200) NOT NULL,
  `path` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `description`, `path`, `category_id`, `author_id`) VALUES
(1, 'green plante', '\"In the quiet of the morning, the sun painted the sky with hues of pink and gold. Birds chirped in harmony, creating a symphony of nature\'s awakening. A gentle breeze whispered through the leaves, carrying with it the promise of a new day filled with possibilities. As the world stirred from its slumber, the soft glow of dawn embraced everything in its tranquil warmth.\"', 'a healthy green plante', 'images/greenPlant.jpg', 1, 5),
(2, 'PC', 'Lost in the labyrinth of city lights, where the hustle and bustle create a rhythm of their own. Neon signs flicker like distant stars in the urban night sky. Sidewalks echo with the footsteps of strangers, each with a story untold. Amidst the urban symphony, secrets linger in the corners, and dreams take flight in the shadows. The city, a tapestry of lives woven together, pulsates with energy, a timeless dance in the heart of the metropolis.', 'A PC Gaming', 'images/pc.jpg', 2, 4),
(3, 'MONSTER PC', '\"In the realm of pixels and polygons, PC gaming stands as a vibrant universe where fantasy meets technology. A custom-built rig hums with power, its illuminated components casting a soft glow in the dimly lit room. The click-clack of mechanical keys echoes in the air as a player immerses into the digital landscapes, navigating worlds with precision.  Graphics rendered in breathtaking detail, frame rates dancing at the edge of seamless reality, PC gaming is an odyssey of visual delight. The hum of cooling fans is the heartbeat of an epic adventure, where every click, every keystroke, propels the player deeper into the realms of virtual escapism.  Multiplayer battles unfold in real-time, connecting players across continents in a shared pursuit of victory. Discord channels become war rooms, strategy discussed in hushed tones as the glow of multiple monitors lights up faces in the quest for supremacy.  Mods and customization turn games into personal expressions, transforming virtual realms into unique playgrounds. From esports arenas to casual solo quests, the PC gaming community thrives on the diversity of experiences, a testament to the boundless creativity fueled by cutting-edge technology.  In this digital frontier, where frames per second matter as much as the plot twists, PC gaming is not just a hobby; it\'s a culture, a passion, a fusion of art and technology that unlocks the doors to limitless possibilities', 'THE BEST PC FOR YOU IS A GREAT CHOISE BELIEVE ME THERE NO GREAT OPTION THAT IT', 'images/pc.jpg', 2, 6),
(4, 'mobiles', 'In the fast-paced world of mobile technology, we\'ve witnessed a remarkable journey from the days of bulky brick phones to the sleek and sophisticated foldable smartphones of today. The evolution of mobile devices has not only transformed the way we communicate but has also reshaped entire industries.\r\n\r\nThe Early Days: Brick Phones and Limited Connectivity\r\n\r\nIn the 1980s, mobile phones were synonymous with large, heavy \"brick\" devices. These early mobiles were primarily used for voice calls, and their limited battery life and bulky designs made them a luxury item. Connectivity was limited to basic voice communication, and the concept of sending text messages was still in its infancy.\r\n\r\nThe Rise of Smartphones: Touchscreens, Apps, and Connectivity\r\n\r\nThe 2000s marked a revolutionary era with the advent of smartphones. Devices like the BlackBerry and the iPhone introduced touchscreens, ushering in a new era of user interaction. App stores emerged, offering a plethora of applications that transformed smartphones into multipurpose devices. Mobile internet connectivity became faster and more widespread, enabling users to browse the web, check emails, and engage in social media.\r\n\r\nThe Era of High-Performance: Cameras, Processors, and AI\r\n\r\nAs smartphones became an integral part of our daily lives, manufacturers focused on enhancing performance and adding features. High-quality cameras, powerful processors, and artificial intelligence capabilities became standard, turning smartphones into powerful multimedia tools. The boundary between a phone and a professional camera blurred as mobile photography advanced significantly.\r\n\r\nFoldable Phones: Redefining Form and Function\r\n\r\nIn recent years, the industry has witnessed the introduction of foldable smartphones. These innovative devices feature flexible displays that can be folded or unfolded to provide users with a larger screen real estate when needed. Companies like Samsung, Huawei, and Motorola have embraced this technology, pushing the boundaries of what a smartphone can be.', '', 'images/mobile.jpg', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'bio'),
(2, 'life style'),
(3, 'tech');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `commenter_id` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `commenter_id`, `time`) VALUES
(1, '', 0, 0),
(2, '', 0, 0),
(4, '', 0, 0),
(5, '', 0, 0),
(9, '', 0, 0),
(10, '', 0, 0),
(11, '', 0, 0),
(12, '', 0, 0),
(13, '', 0, 0),
(14, '', 0, 0),
(15, '', 0, 0),
(16, '', 0, 0),
(17, '', 0, 0),
(18, '', 0, 0),
(19, '', 0, 0),
(20, '', 0, 0),
(21, '', 0, 0),
(22, '', 0, 0),
(23, '', 0, 0),
(24, '', 0, 0),
(25, '', 0, 0),
(26, '', 0, 0),
(27, '', 0, 0),
(28, '', 0, 0),
(29, '', 0, 0),
(30, '', 0, 0),
(31, '', 0, 0),
(32, '', 0, 0),
(33, '', 0, 0),
(34, '', 0, 0),
(35, '', 0, 0),
(36, '', 0, 0),
(37, '', 0, 0),
(38, '', 0, 0),
(39, '', 0, 0),
(40, '', 0, 0),
(41, '', 0, 0),
(43, 'Spider man', 6, 0),
(44, '', 0, 0),
(46, '', 0, 0),
(47, '', 0, 0),
(48, '', 0, 0),
(49, '', 0, 0),
(52, '', 0, 0),
(54, '', 0, 0),
(56, '', 0, 0),
(57, '', 0, 0),
(58, '', 0, 0),
(59, '', 0, 0),
(60, '', 0, 0),
(61, '', 0, 0),
(62, '', 0, 0),
(63, '', 0, 0),
(64, '', 0, 0),
(67, '', 0, 0),
(69, '', 0, 0),
(70, '', 0, 0),
(71, '', 0, 0),
(72, '', 0, 0),
(73, '', 0, 0),
(74, '', 0, 0),
(75, '', 0, 0),
(76, '', 0, 0),
(77, '', 0, 0),
(78, '', 0, 0),
(79, '', 0, 0),
(80, '', 0, 0),
(81, '', 0, 0),
(83, '', 0, 0),
(84, '', 0, 0),
(86, '', 0, 0),
(87, '', 0, 0),
(88, '', 0, 0),
(89, '', 0, 0),
(90, '', 0, 0),
(92, '', 0, 0),
(93, '', 0, 0),
(94, '', 0, 0),
(97, '', 0, 0),
(98, '', 0, 0),
(99, '', 0, 0),
(102, '', 0, 0),
(103, '', 0, 0),
(104, '', 0, 0),
(105, '', 0, 0),
(106, '', 0, 0),
(108, '', 0, 0),
(109, '', 0, 0),
(110, '', 0, 0),
(111, '', 0, 0),
(113, '', 0, 0),
(114, '', 0, 0),
(117, '', 0, 0),
(118, '', 0, 0),
(120, '', 0, 0),
(121, '', 0, 0),
(123, '', 0, 0),
(124, '', 0, 0),
(127, '', 0, 0),
(128, '', 0, 0),
(129, '', 0, 0),
(130, '', 0, 0),
(131, '', 0, 0),
(133, '', 0, 0),
(134, '', 0, 0),
(136, '', 0, 0),
(138, '', 0, 0),
(139, '', 0, 0),
(140, '', 0, 0),
(142, '', 0, 0),
(144, '', 0, 0),
(145, '', 0, 0),
(146, '', 0, 0),
(147, '', 0, 0),
(148, '', 0, 0),
(150, '', 0, 0),
(151, '', 0, 0),
(152, '', 0, 0),
(154, '', 0, 0),
(155, '', 0, 0),
(156, '', 0, 0),
(158, '', 0, 0),
(159, '', 0, 0),
(160, '', 0, 0),
(162, '', 0, 0),
(163, '', 0, 0),
(164, '', 0, 0),
(165, '', 0, 0),
(167, '', 0, 0),
(168, '', 0, 0),
(169, '', 0, 0),
(170, '', 0, 0),
(171, '', 0, 0),
(172, '', 0, 0),
(173, '', 0, 0),
(175, '', 0, 0),
(176, '', 0, 0),
(177, '', 0, 0),
(178, '', 0, 0),
(179, '', 0, 0),
(180, '', 0, 0),
(181, '', 0, 0),
(183, '', 0, 0),
(184, '', 0, 0),
(185, '', 0, 0),
(186, '', 0, 0),
(188, '', 0, 0),
(189, '', 0, 0),
(190, 'Here', 5, 0),
(191, '', 0, 0),
(192, 'Fuck', 5, 0),
(193, '', 0, 0),
(194, '', 0, 0),
(195, '', 0, 0),
(197, '', 0, 0),
(198, '', 0, 0),
(199, '', 0, 0),
(200, '', 0, 0),
(201, '', 0, 0),
(202, '', 0, 0),
(203, '', 0, 0),
(204, '', 0, 0),
(205, '', 0, 0),
(206, 'Greatness', 5, 0),
(207, '', 0, 0),
(208, 'Goodness', 5, 0),
(209, '', 0, 0),
(210, '', 0, 0),
(211, '', 0, 0),
(212, '', 0, 0),
(214, '', 0, 0),
(215, '', 0, 0),
(216, '', 0, 0),
(217, '', 0, 0),
(218, '', 0, 0),
(220, '', 0, 0),
(221, '', 0, 0),
(222, 'Yeah that&#39;s cool', 4, 0),
(223, '', 0, 0),
(224, '', 0, 0),
(225, '', 0, 0),
(226, '', 0, 0),
(227, '', 0, 0),
(228, '', 0, 0),
(229, '', 0, 0),
(230, '', 0, 0),
(231, '', 0, 0),
(233, '', 0, 0),
(234, '', 0, 0),
(236, '', 0, 0),
(237, '', 0, 0),
(238, '', 0, 0),
(240, '', 0, 0),
(241, '', 0, 0),
(242, 'Fuck', 6, 0),
(243, '', 0, 0),
(244, '', 0, 0),
(245, '', 0, 0),
(246, 'It is jack', 5, 0),
(247, '', 0, 0),
(248, '', 0, 0),
(250, '', 0, 0),
(251, '', 0, 0),
(252, '', 0, 0),
(254, '', 0, 0),
(255, '', 0, 0),
(256, '', 0, 0),
(257, '', 0, 0),
(258, '', 0, 0),
(259, '', 0, 0),
(260, '', 0, 0),
(262, '', 0, 0),
(263, '', 0, 0),
(265, '', 0, 0),
(266, '', 0, 0),
(267, '', 0, 0),
(268, '', 0, 0),
(269, '', 0, 0),
(270, '', 0, 0),
(271, '', 0, 0),
(272, '', 0, 0),
(273, '', 0, 0),
(274, '', 0, 0),
(275, '', 0, 0),
(276, '', 0, 0),
(277, '', 0, 0),
(278, '', 0, 0),
(279, '', 0, 0),
(280, '', 0, 0),
(282, '', 0, 0),
(283, '', 0, 0),
(284, '', 0, 0),
(285, '', 0, 0),
(286, '', 0, 0),
(287, '', 0, 0),
(288, '', 0, 0),
(289, '', 0, 0),
(290, '', 0, 0),
(291, '', 0, 0),
(292, '', 0, 0),
(293, '', 0, 0),
(294, '', 0, 0),
(295, '', 0, 0),
(296, '', 0, 0),
(297, '', 0, 0),
(298, '', 0, 0),
(299, '', 0, 0),
(300, '', 0, 0),
(301, '', 0, 0),
(303, '', 0, 0),
(304, '', 0, 0),
(305, '', 0, 0),
(306, '', 0, 0),
(307, '', 0, 0),
(308, '', 0, 0),
(309, '', 0, 0),
(310, '', 0, 0),
(311, '', 0, 0),
(312, '', 0, 0),
(313, '', 0, 0),
(314, '', 0, 0),
(315, '', 0, 0),
(316, '', 0, 0),
(317, '', 0, 0),
(318, '', 0, 0),
(319, '', 0, 0),
(320, '', 0, 0),
(321, '', 0, 0),
(322, '', 0, 0),
(323, '', 0, 0),
(324, '', 0, 0),
(325, '', 0, 0),
(326, '', 0, 0),
(327, '', 0, 0),
(328, '', 0, 0),
(329, '', 0, 0),
(330, '', 0, 0),
(331, '', 0, 0),
(332, '', 0, 0),
(333, '', 0, 0),
(334, '', 0, 0),
(335, '', 0, 0),
(336, '', 0, 0),
(337, '', 0, 0),
(338, '', 0, 0),
(339, '', 0, 0),
(340, '', 0, 0),
(341, '', 0, 0),
(342, '', 0, 0),
(343, '', 0, 0),
(344, '', 0, 0),
(345, '', 0, 0),
(346, '', 0, 0),
(347, '', 0, 0),
(348, '', 0, 0),
(349, '', 0, 0),
(350, '', 0, 0),
(351, '', 0, 0),
(352, '', 0, 0),
(353, '', 0, 0),
(354, '', 0, 0),
(355, '', 0, 0),
(356, '', 0, 0),
(357, '', 0, 0),
(358, '', 0, 0),
(359, '', 0, 0),
(360, '', 0, 0),
(361, '', 0, 0),
(362, 'Hi zin', 4, 0),
(363, '', 0, 0),
(364, '', 0, 0),
(365, '', 0, 0),
(366, '', 0, 0),
(367, '', 0, 0),
(368, 'To be Honest', 4, 0),
(369, '', 0, 0),
(370, '', 0, 0),
(371, '', 0, 0),
(372, '', 0, 0),
(373, '', 0, 0),
(374, '', 0, 0),
(375, '', 0, 0),
(376, '', 0, 0),
(377, '', 0, 0),
(378, '', 0, 0),
(379, 'y', 4, 0),
(380, '', 0, 0),
(381, '', 0, 0),
(382, '', 0, 0),
(383, '', 0, 0),
(384, '', 0, 0),
(385, '', 0, 0),
(386, '', 0, 0),
(387, '', 0, 0),
(389, '', 0, 0),
(390, 'CLICK ME ME ME ME ME ', 3, 0),
(391, '', 0, 0),
(392, '', 0, 0),
(393, '', 0, 0),
(394, '', 0, 0),
(395, '', 0, 0),
(396, '', 0, 0),
(397, '', 0, 0),
(398, '', 0, 0),
(399, '', 0, 0),
(400, '', 0, 0),
(401, '', 0, 0),
(402, '', 0, 0),
(403, '', 0, 0),
(404, '', 0, 0),
(405, '', 0, 0),
(406, '', 0, 0),
(407, '', 0, 0),
(408, '', 0, 0),
(409, '', 0, 0),
(410, '', 0, 0),
(411, '', 0, 0),
(412, '', 0, 0),
(413, '', 0, 0),
(414, '', 0, 0),
(415, '', 0, 0),
(416, '', 0, 0),
(417, '', 0, 0),
(418, '', 0, 0),
(419, '', 0, 0),
(420, '', 0, 0),
(421, '', 0, 0),
(422, '', 0, 0),
(423, '', 0, 0),
(424, '', 0, 0),
(425, '', 0, 0),
(426, '', 0, 0),
(427, '', 0, 0),
(428, '', 0, 0),
(429, '', 0, 0),
(430, '', 0, 0),
(431, '', 0, 0),
(432, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(3, 'Mohammed', 'MESKI', 'MHD', 'mohammed@gmail.com', '$2y$10$bAgoqOGzCyQzulyaKwqnf.IS1PPUP7d01OV2lkK6gM6WRbAMKTbwS', 'uploads/', 0),
(4, 'hamza', 'meski', 'HAMZA7onx', 'hamza@gmail.com', '$2y$10$fH0AW4DIR9/5LDz0yTD4C.elX0Fl78T54wK4Cs/1ehlX.sfwgqaUC', 'uploads/', 0),
(5, 'moaad', 'meski', 'smart', 'moaad@gmail.com', '$2y$10$hFuCY6McmDuaqMlwtvxPt.hTpwx1tuoFHcGoHXYrawrR/mP/murYu', 'uploads/', 0),
(18, 'Anass', 'ANASS', 'anassy', 'anass@gmail.com', '$2y$10$RyX3DIWslDYubnP86/IbZuUhvLrntZWMzzTJD2kCYSdV8yyTWVZ9O', 'uploads/', 1),
(19, 'moaad', 'MOAAD', 'moaady', 'smart@gmail.com', '$2y$10$PfrUnf0eBEXWCXzDG2sVBe3wmVg5iPlsFcne9Bv4CPS5s87wjsXx6', 'uploads/younes.jpg', 0),
(20, 'friend', 'friendex', 'friendy', 'friend@gmail.com', '$2y$10$ANJuINiIm56yrrfpkc/nQ.K5IPIlGssYK2jsGO59OYXHZAFR29gte', 'uploads/t1.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=433;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
