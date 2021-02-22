-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 30 nov 2020 om 10:44
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpsgame`
-- 
CREATE DATABASE `rpsgame`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Admin`
--

CREATE TABLE `Admin` (
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Admin`
--

INSERT INTO `Admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Berichten`
--

CREATE TABLE `Berichten` (
  `ID` int(11) NOT NULL,
  `berichten` text DEFAULT NULL,
  `Tijd` varchar(255) DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `name` varchar(200) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Berichten`
--

INSERT INTO `Berichten` (`ID`, `berichten`, `Tijd`, `image`, `name`) VALUES
(556, 'dit is een bericht', '2020-11-02 15:36:30', NULL, ''),
(557, 'dit is een bericht zonder reactie', '2020-11-03 13:06:30', NULL, ''),
(558, 'dit is een bericht zonder een foto ', '2020-11-04 16:45:48', NULL, ''),
(559, 'dit is een bericht met wel een foto', '2020-11-04 16:46:06', NULL, '96462.jpg'),
(560, 'grappige kat', '2020-11-04 16:55:37', NULL, 'giphy.gif'),
(561, 'this is funny', '2020-11-05 11:32:27', NULL, 'trump.gif'),
(562, 'leuk giphy heb je verstuurd ', '2020-11-05 11:37:12', NULL, ''),
(563, 'dit is een coole bericht', '2020-11-11 09:25:59', NULL, ''),
(564, 'asdasd', '2020-11-12 15:37:19', NULL, ''),
(565, 'dit is een super bericht', '2020-11-17 09:22:35', NULL, ''),
(566, 'dit is een test bericht', '2020-11-17 09:23:15', NULL, ''),
(567, 'dit is een super bericht', '2020-11-17 09:32:42', NULL, ''),
(568, 'asdasd', '2020-11-17 09:37:20', NULL, ''),
(569, 'dit is een super bericht', '2020-11-17 11:29:27', NULL, ''),
(570, 'dit is een super bericht', '2020-11-17 11:38:31', NULL, ''),
(571, 'dit is een super bericht', '2020-11-17 12:09:17', NULL, ''),
(572, 'dit is een super bericht', '2020-11-17 12:12:53', NULL, ''),
(573, 'dit is een testing bericht', '2020-11-19 17:03:18', NULL, ''),
(574, 'dit is een bericht met een foto met meerder reacties', '2020-11-19 17:11:55', NULL, 'dog.gif');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Gasten`
--

CREATE TABLE `Gasten` (
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Gasten`
--

INSERT INTO `Gasten` (`username`, `password`) VALUES
('piet', 'wachtwoord'),
('Batman', 'Batmobiel');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Gebruikers`
--

CREATE TABLE `Gebruikers` (
  `ID` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `connectiee` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Gebruikers`
--

INSERT INTO `Gebruikers` (`ID`, `username`, `connectiee`) VALUES
(1, 'jansen', '1'),
(2, 'yassin', '2'),
(3, 'flash', '3'),
(4, 'piet', '4'),
(5, 'bob', '5'),
(6, 'superman', '6'),
(7, 'Greenlatern', '7'),
(8, NULL, '11'),
(9, NULL, '12'),
(10, NULL, '13'),
(11, NULL, '14'),
(12, NULL, '15'),
(13, NULL, '16'),
(14, NULL, '17'),
(15, NULL, '18'),
(16, NULL, '19'),
(17, NULL, '20'),
(18, NULL, '21');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Profiel`
--

CREATE TABLE `Profiel` (
  `ID` int(255) DEFAULT NULL,
  `naam` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `leeftijd` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Profiel`
--

INSERT INTO `Profiel` (`ID`, `naam`, `email`, `leeftijd`) VALUES
(NULL, 'groen', 'groen132@gmail.com', '23'),
(2, 'yassin', 'yassin@test.nl', '22'),
(3, 'flashsnel', 'flashsnel23@test.nl', '23'),
(5, 'bobby', 'bobby34@gmail.com', '23');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Reactie`
--

CREATE TABLE `Reactie` (
  `ID` int(11) NOT NULL,
  `React` text DEFAULT NULL,
  `Connectie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Reactie`
--

INSERT INTO `Reactie` (`ID`, `React`, `Connectie`) VALUES
(3, 'leuke foto gozer', 556),
(4, 'coole post ', 557),
(5, 'dit is echt een leuke foto', 558),
(6, 'zieke post dude ', 559),
(7, 'super grappige post', 560),
(8, 'leuke foto ', 561),
(9, 'echt leuk man ', 562),
(10, 'leuke foto zeg', 556),
(11, 'dit is een test reactie', 556),
(12, 'dit is een leuke foto', 556),
(13, 'dit is een niewue reactie', 556),
(14, 'kijken of dit gaat werken ', 556),
(15, 'oke dit werkt eindelijk', 556),
(16, 'werkt dit ook ?', 557),
(17, 'coole bergen', 559),
(18, 'super bergen ', 559),
(19, 'aiit coole bergen', 559),
(20, 'werkt dit ? ', 573),
(21, 'lolololl', 573),
(22, 'coole hond ', 574),
(23, 'super hond haha !!!', 574),
(24, 'hahah super man hond', 574);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Resultaten`
--

CREATE TABLE `Resultaten` (
  `ID` int(5) NOT NULL,
  `PC` text NOT NULL,
  `Speler` text DEFAULT NULL,
  `win` text DEFAULT NULL,
  `lose` text DEFAULT NULL,
  `draw` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Resultaten`
--

INSERT INTO `Resultaten` (`ID`, `PC`, `Speler`, `win`, `lose`, `draw`) VALUES
(297, 'sciccors', 'rock', 'Gewonnen', NULL, NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Berichten`
--
ALTER TABLE `Berichten`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Gebruikers`
--
ALTER TABLE `Gebruikers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Reactie`
--
ALTER TABLE `Reactie`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Resultaten`
--
ALTER TABLE `Resultaten`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Berichten`
--
ALTER TABLE `Berichten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=575;

--
-- AUTO_INCREMENT voor een tabel `Gebruikers`
--
ALTER TABLE `Gebruikers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `Reactie`
--
ALTER TABLE `Reactie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT voor een tabel `Resultaten`
--
ALTER TABLE `Resultaten`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
