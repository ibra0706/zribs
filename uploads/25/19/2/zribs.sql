-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 12. okt 2021 ob 07.38
-- Različica strežnika: 10.4.17-MariaDB
-- Različica PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `zribs`
--

-- --------------------------------------------------------

--
-- Struktura tabele `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `ime` varchar(10) CHARACTER SET utf8 NOT NULL,
  `priimek` varchar(30) CHARACTER SET utf8 NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8 NOT NULL,
  `geslo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabele `dijaki`
--

CREATE TABLE `dijaki` (
  `id_dijaki` int(11) NOT NULL,
  `ime` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Priimek` varchar(30) CHARACTER SET utf8 NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8 NOT NULL,
  `geslo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabele `doddaja_nalog`
--

CREATE TABLE `doddaja_nalog` (
  `id_dijaki` int(11) NOT NULL,
  `id_ucitlja` int(11) NOT NULL,
  `id_naloge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabele `naloge`
--

CREATE TABLE `naloge` (
  `id_naloge` int(11) NOT NULL,
  `navodila` text NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `datum_oddaje` datetime NOT NULL,
  `datum_rok` datetime NOT NULL,
  `id_predmet` int(11) NOT NULL,
  `id_ucitlja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabele `predmeti`
--

CREATE TABLE `predmeti` (
  `id_predmet` int(11) NOT NULL,
  `ime_predmeta` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabele `pripadanje`
--

CREATE TABLE `pripadanje` (
  `id_dijaki` int(11) NOT NULL,
  `id_predmet` int(11) NOT NULL,
  `id_ucitlja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabele `ucitelji`
--

CREATE TABLE `ucitelji` (
  `id_ucitlja` int(11) NOT NULL,
  `ime` varchar(20) NOT NULL,
  `priimek` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `geslo` varchar(255) NOT NULL,
  `geslo_vidno` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `ucitelji`
--

INSERT INTO `ucitelji` (`id_ucitlja`, `ime`, `priimek`, `mail`, `geslo`, `geslo_vidno`) VALUES
(2, 'Luka', 'kr neki nje asd', 'luka.cresnar@gmail.com', '$2y$10$N2wTe2chmukesbFG0EdskuFzPYDi0uvVPtQXZbfZgsBRSDe.6woae', ''),
(3, 'ibra', 'neaw', 'neki.sad.asd', '$2y$10$g002P5xP4LK.Jmh0NtmbpOtSCrPfLCnGvsV2OGuwgjQU0HqirBFae', 'KarKoli');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeksi tabele `dijaki`
--
ALTER TABLE `dijaki`
  ADD PRIMARY KEY (`id_dijaki`);

--
-- Indeksi tabele `doddaja_nalog`
--
ALTER TABLE `doddaja_nalog`
  ADD KEY `id_dijaki` (`id_dijaki`),
  ADD KEY `id_ucitlja` (`id_ucitlja`),
  ADD KEY `id_naloge` (`id_naloge`);

--
-- Indeksi tabele `naloge`
--
ALTER TABLE `naloge`
  ADD PRIMARY KEY (`id_naloge`),
  ADD KEY `id_ucitlja` (`id_ucitlja`),
  ADD KEY `id_predmet` (`id_predmet`);

--
-- Indeksi tabele `predmeti`
--
ALTER TABLE `predmeti`
  ADD PRIMARY KEY (`id_predmet`);

--
-- Indeksi tabele `pripadanje`
--
ALTER TABLE `pripadanje`
  ADD KEY `id_dijaki` (`id_dijaki`),
  ADD KEY `id_ucitlja` (`id_ucitlja`),
  ADD KEY `id_predmet` (`id_predmet`);

--
-- Indeksi tabele `ucitelji`
--
ALTER TABLE `ucitelji`
  ADD PRIMARY KEY (`id_ucitlja`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `dijaki`
--
ALTER TABLE `dijaki`
  MODIFY `id_dijaki` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `naloge`
--
ALTER TABLE `naloge`
  MODIFY `id_naloge` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `predmeti`
--
ALTER TABLE `predmeti`
  MODIFY `id_predmet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `ucitelji`
--
ALTER TABLE `ucitelji`
  MODIFY `id_ucitlja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `doddaja_nalog`
--
ALTER TABLE `doddaja_nalog`
  ADD CONSTRAINT `doddaja_nalog_ibfk_1` FOREIGN KEY (`id_dijaki`) REFERENCES `dijaki` (`id_dijaki`),
  ADD CONSTRAINT `doddaja_nalog_ibfk_2` FOREIGN KEY (`id_ucitlja`) REFERENCES `ucitelji` (`id_ucitlja`),
  ADD CONSTRAINT `doddaja_nalog_ibfk_3` FOREIGN KEY (`id_naloge`) REFERENCES `naloge` (`id_naloge`);

--
-- Omejitve za tabelo `naloge`
--
ALTER TABLE `naloge`
  ADD CONSTRAINT `naloge_ibfk_1` FOREIGN KEY (`id_ucitlja`) REFERENCES `ucitelji` (`id_ucitlja`),
  ADD CONSTRAINT `naloge_ibfk_2` FOREIGN KEY (`id_predmet`) REFERENCES `predmeti` (`id_predmet`);

--
-- Omejitve za tabelo `pripadanje`
--
ALTER TABLE `pripadanje`
  ADD CONSTRAINT `pripadanje_ibfk_1` FOREIGN KEY (`id_dijaki`) REFERENCES `dijaki` (`id_dijaki`),
  ADD CONSTRAINT `pripadanje_ibfk_2` FOREIGN KEY (`id_ucitlja`) REFERENCES `ucitelji` (`id_ucitlja`),
  ADD CONSTRAINT `pripadanje_ibfk_3` FOREIGN KEY (`id_predmet`) REFERENCES `predmeti` (`id_predmet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
