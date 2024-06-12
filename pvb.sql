-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 12 jun 2024 om 09:47
-- Serverversie: 5.7.39
-- PHP-versie: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pvb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `homepage`
--

CREATE TABLE `homepage` (
  `id` int(11) NOT NULL,
  `heading1` varchar(255) NOT NULL,
  `content1` varchar(500) NOT NULL,
  `heading2` varchar(255) NOT NULL,
  `content2` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `homepage`
--

INSERT INTO `homepage` (`id`, `heading1`, `content1`, `heading2`, `content2`) VALUES
(1, 'Over Voedselbank Overvecht', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eleifend elit at purus molestie, id laoreet massa gravida. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis interdum pharetra lobortis. Suspendisse hendrerit arcu eget lectus sagittis, sed rutrum metus aliquam. Quisque nisi urna, ultrices et convallis', 'Zo berekenen we of jij in aanmerking komt voor een voedselpakket', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eleifend elit at purus molestie, id laoreet massa gravida. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis interdum pharetra lobortis. Suspendisse hendrerit arcu eget lectus sagittis, sed rutrum metus aliquam. Quisque nisi urna, ultrices et convallis');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `inschrijving`
--

CREATE TABLE `inschrijving` (
  `id` int(255) NOT NULL,
  `voornaam` text NOT NULL,
  `achternaam` text NOT NULL,
  `straat` varchar(100) NOT NULL,
  `huisnummer` varchar(4) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `plaats` varchar(255) NOT NULL,
  `emailadres` varchar(50) NOT NULL,
  `inschrijfdatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `inschrijving`
--

INSERT INTO `inschrijving` (`id`, `voornaam`, `achternaam`, `straat`, `huisnummer`, `postcode`, `plaats`, `emailadres`, `inschrijfdatum`) VALUES
(2, 'jan', '9', '9', '9', '9', '9', 'jos@glu.nl', '2024-06-12 09:32:14'),
(22, '9', '9', '9', '9', '9', '9', 'test@test.nl', '2024-06-12 09:43:43');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `normbedragen`
--

CREATE TABLE `normbedragen` (
  `id` int(10) UNSIGNED NOT NULL,
  `aantal_leden` int(11) NOT NULL,
  `normbedrag` decimal(6,2) NOT NULL,
  `opmerkingen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `normbedragen`
--

INSERT INTO `normbedragen` (`id`, `aantal_leden`, `normbedrag`, `opmerkingen`) VALUES
(1, 1, '230.00', 'Voor u zelf'),
(2, 2, '400.00', 'Met 1 gezinslid (kind of partner)'),
(3, 3, '420.00', 'Met 2 gezinsleden'),
(4, 4, '515.00', 'Met 3 gezinsleden'),
(5, 5, '610.00', 'Met 4 gezinsleden'),
(6, 6, '705.00', 'Met 5 gezinsleden'),
(7, 7, '800.00', 'Met 6 gezinsleden'),
(8, 8, '895.00', 'Met 7 gezinsleden'),
(9, 9, '990.00', 'Met 8 gezinsleden');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `inschrijving`
--
ALTER TABLE `inschrijving`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailadres` (`emailadres`);

--
-- Indexen voor tabel `normbedragen`
--
ALTER TABLE `normbedragen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `inschrijving`
--
ALTER TABLE `inschrijving`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT voor een tabel `normbedragen`
--
ALTER TABLE `normbedragen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
