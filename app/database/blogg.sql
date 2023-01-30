-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 10 maj 2022 kl 09:09
-- Serverversion: 10.4.24-MariaDB
-- PHP-version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `D0019E_V22_akaloa0`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `post`
--

INSERT INTO `post` (`id`, `userid`, `title`, `image`, `body`, `published`, `created_at`) VALUES
(37, 22, 'hehe got em!', '1651402443_414R5UgYySL.jpg', 'aipadfmadpofmds', 1, '2022-05-01 12:54:03'),
(38, 22, 'alkfmadmf', '1651402453_agile-konsten-att-slutfora-projekt.jpg', 'paklmdvpsdmv', 1, '2022-05-01 12:54:13'),
(39, 22, 'pamscp', '1651402464_nedladdning (1).jpg', 'aölmscpasc', 1, '2022-05-01 12:54:24'),
(40, 22, 'sss', '1651403242_10_03_snow_card.jpg', 'zss', 1, '2022-05-01 13:07:22'),
(41, 23, 'hej hej hej ', '1651408231_414R5UgYySL.jpg', 'kanske', 1, '2022-05-01 14:30:31');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created_at`) VALUES
(22, 0, 'rikard', 'rikard@hot.com', '$2y$10$.4dkbTAi8HhXFXwZRos2i.wZHaPib5mtVueVci/9iMFmrxC.eBdjy', '2022-05-01 10:27:40'),
(23, 0, 'kalle', 'kalle@ma.se', '$2y$10$ZfDob4vx/xUnNNpUi5X7v.MfE03d5m7EOUyDuRhobJ0mfGngIcX5S', '2022-05-01 12:26:06'),
(24, 0, 'joan', 'kall@la.se', '$2y$10$IsY.5yDg7iOouj95y4k0suR4SFjs7kAVwPpg7boNOgG.y0KFsyfZG', '2022-05-01 12:31:35');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
