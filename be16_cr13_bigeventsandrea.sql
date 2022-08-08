-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2022 at 05:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be16_cr13_bigeventsandrea`
--
CREATE DATABASE IF NOT EXISTS `be16_cr13_bigeventsandrea` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be16_cr13_bigeventsandrea`;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220806102643', '2022-08-06 12:27:48', 184),
('DoctrineMigrations\\Version20220806114814', '2022-08-06 13:48:24', 97),
('DoctrineMigrations\\Version20220806123928', '2022-08-06 14:39:38', 82),
('DoctrineMigrations\\Version20220806124314', '2022-08-06 14:43:23', 131),
('DoctrineMigrations\\Version20220806144544', '2022-08-06 16:45:52', 100);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `cityname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fk_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `datetime`, `description`, `picture`, `capacity`, `contact_email`, `phonenumber`, `cityname`, `zip`, `address`, `url`, `fk_type_id`) VALUES
(1, 'Rock concert', '2022-08-06 17:00:00', 'Heavy metal experience in heart of Vienna', 'music3.jpg', 3000, 'rockie@gmail.com', 639985326, 'Vienna', 1010, 'Stephansplatz 2.', 'https://www.visitingvienna.com/activities/events-in-vienna/', 1),
(2, 'Ballett', '2022-08-09 20:45:00', 'Swan\'s Lake', 'theater1.jpg', 200, 'swans@gmail.com', 256935523, 'Vienna', 1010, 'Karslplatz 3.', 'https://www.wien.info/en/music-stage-shows/dance/vienna-state-ballet-363826', 3),
(3, 'Techno Party', '2022-08-19 18:15:00', 'Techno Party at Danube', 'music2.jpg', 5000, 'techno@gmail.com', 655856330, 'Vienna', 1210, 'Donaubrücke 263\r\n', 'https://www.himmelundwasser.at/', 1),
(4, 'Football match', '2022-08-14 18:00:00', 'Real Madrid - Chelsea match', 'sport2.jpg', 15000, 'sportevents@gmail.com', 26355893, 'Vienna', 1020, 'Stadion 1.', 'https://www.firstviennafc.at/jetzt-mitglied-werden.html', 2),
(5, 'Mountain Climbing', '2022-08-12 06:30:00', 'Mountain Climbing in Tirol in a small team with guard ', 'sport1.jpg', 15, 'extremsport@gmail.com', 26355963, 'Innsbruck', 2563, 'Adlerstrasse 20.', 'https://www.visitacity.com/en/innsbruck/activities/all-activities?sbn_sec=show&campaginid=418576191&adgroupid=1294125573151231&targetid=kwd-80883068183652:loc-10&utm_source=bing&utm_medium=cpc&utm_campaign=Innsbruck%20ActivitiesA24X%20GL-In-EUR&utm_term=i', 2),
(6, 'Titanic', '2022-08-30 21:00:00', 'Titanic at Vienna Kino', 'theater2.jpg', 200, 'kinovienna@gmail.com', 23650036, 'Vienna', 1010, 'Kärtnerstrasse 20.', 'https://www.cineplexx.at/center/apollo-das-kino/', 4),
(7, 'Imagine Dragons', '2022-08-25 16:00:00', 'Imagine dragons pop concert', 'music1.jpg', 15000, 'viennaevents@gmail.com', 23659223, 'Vienna', 1020, 'Ernst Happel Stadion', 'https://events.at/venue/praterstadion-ernst-happel-stadion', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `typename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `typename`) VALUES
(1, 'Music'),
(2, 'Sport'),
(3, 'Theater'),
(4, 'Movie');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5387574A3563B1BF` (`fk_type_id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `FK_5387574A3563B1BF` FOREIGN KEY (`fk_type_id`) REFERENCES `type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
