-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2023 at 06:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngrvideo`
--

-- --------------------------------------------------------

--
-- Table structure for table `Filmy`
--

CREATE TABLE `Filmy` (
  `idFilmy` int(100) NOT NULL,
  `idLinki` int(100) NOT NULL,
  `Tytul` varchar(30) NOT NULL,
  `opis` varchar(150) NOT NULL,
  `rezyser` varchar(20) NOT NULL,
  `rokprodukcji` int(4) NOT NULL,
  `czastrwania` int(4) NOT NULL,
  `idKategoria` int(20) NOT NULL,
  `Jezyk` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Kategorie`
--

CREATE TABLE `Kategorie` (
  `idKategorie` int(20) NOT NULL,
  `Nazwa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Komentarze`
--

CREATE TABLE `Komentarze` (
  `idKomentarze` int(11) NOT NULL,
  `idProfilUzytkownika` int(11) NOT NULL,
  `idFilmy` int(11) NOT NULL,
  `komentarz` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Linki`
--

CREATE TABLE `Linki` (
  `idLinki` int(100) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Oceny`
--

CREATE TABLE `Oceny` (
  `idOceny` int(100) NOT NULL,
  `idFilmy` int(100) NOT NULL,
  `idProfilUzytkownika` int(100) NOT NULL,
  `LiczbaGwiazdek` int(5) NOT NULL,
  `SredniaOcen` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ProfilUzytkownika`
--

CREATE TABLE `ProfilUzytkownika` (
  `idProfilUzytkownika` int(100) NOT NULL,
  `idUzytkownik` int(100) NOT NULL,
  `DataRejestracji` date NOT NULL,
  `url_profilowe` varchar(50) NOT NULL,
  `opis` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `UlubioneFilmy`
--

CREATE TABLE `UlubioneFilmy` (
  `idUlubioneFilmy` int(50) NOT NULL,
  `idFilmy` int(50) NOT NULL,
  `idProfilUzytkownika` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Uzytkownicy`
--

CREATE TABLE `Uzytkownicy` (
  `idUzytkownicy` int(100) NOT NULL,
  `login` varchar(15) NOT NULL,
  `haslo` varchar(15) NOT NULL,
  `PytaniePomocnicze` varchar(30) NOT NULL,
  `OdpowiedzPomocnicza` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Filmy`
--
ALTER TABLE `Filmy`
  ADD PRIMARY KEY (`idFilmy`),
  ADD KEY `idLinki` (`idLinki`),
  ADD KEY `idKategoria` (`idKategoria`);

--
-- Indexes for table `Kategorie`
--
ALTER TABLE `Kategorie`
  ADD PRIMARY KEY (`idKategorie`);

--
-- Indexes for table `Komentarze`
--
ALTER TABLE `Komentarze`
  ADD PRIMARY KEY (`idKomentarze`),
  ADD KEY `idFilmy` (`idFilmy`),
  ADD KEY `idProfilUzytkownika` (`idProfilUzytkownika`);

--
-- Indexes for table `Linki`
--
ALTER TABLE `Linki`
  ADD PRIMARY KEY (`idLinki`);

--
-- Indexes for table `Oceny`
--
ALTER TABLE `Oceny`
  ADD PRIMARY KEY (`idOceny`),
  ADD KEY `idFilmy` (`idFilmy`),
  ADD KEY `idProfilUzytkownika` (`idProfilUzytkownika`);

--
-- Indexes for table `ProfilUzytkownika`
--
ALTER TABLE `ProfilUzytkownika`
  ADD PRIMARY KEY (`idProfilUzytkownika`),
  ADD KEY `idUzytkownik` (`idUzytkownik`);

--
-- Indexes for table `UlubioneFilmy`
--
ALTER TABLE `UlubioneFilmy`
  ADD PRIMARY KEY (`idUlubioneFilmy`),
  ADD KEY `idFilmy` (`idFilmy`);

--
-- Indexes for table `Uzytkownicy`
--
ALTER TABLE `Uzytkownicy`
  ADD PRIMARY KEY (`idUzytkownicy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Filmy`
--
ALTER TABLE `Filmy`
  MODIFY `idFilmy` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Kategorie`
--
ALTER TABLE `Kategorie`
  MODIFY `idKategorie` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Komentarze`
--
ALTER TABLE `Komentarze`
  MODIFY `idKomentarze` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Linki`
--
ALTER TABLE `Linki`
  MODIFY `idLinki` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Oceny`
--
ALTER TABLE `Oceny`
  MODIFY `idOceny` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ProfilUzytkownika`
--
ALTER TABLE `ProfilUzytkownika`
  MODIFY `idProfilUzytkownika` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `UlubioneFilmy`
--
ALTER TABLE `UlubioneFilmy`
  MODIFY `idUlubioneFilmy` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Uzytkownicy`
--
ALTER TABLE `Uzytkownicy`
  MODIFY `idUzytkownicy` int(100) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Filmy`
--
ALTER TABLE `Filmy`
  ADD CONSTRAINT `Filmy_ibfk_1` FOREIGN KEY (`idLinki`) REFERENCES `Linki` (`idLinki`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Filmy_ibfk_2` FOREIGN KEY (`idKategoria`) REFERENCES `Kategorie` (`idKategorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Komentarze`
--
ALTER TABLE `Komentarze`
  ADD CONSTRAINT `Komentarze_ibfk_1` FOREIGN KEY (`idFilmy`) REFERENCES `Filmy` (`idFilmy`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Komentarze_ibfk_2` FOREIGN KEY (`idProfilUzytkownika`) REFERENCES `ProfilUzytkownika` (`idProfilUzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Oceny`
--
ALTER TABLE `Oceny`
  ADD CONSTRAINT `Oceny_ibfk_1` FOREIGN KEY (`idFilmy`) REFERENCES `Filmy` (`idFilmy`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Oceny_ibfk_2` FOREIGN KEY (`idProfilUzytkownika`) REFERENCES `ProfilUzytkownika` (`idProfilUzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ProfilUzytkownika`
--
ALTER TABLE `ProfilUzytkownika`
  ADD CONSTRAINT `ProfilUzytkownika_ibfk_1` FOREIGN KEY (`idUzytkownik`) REFERENCES `Uzytkownicy` (`idUzytkownicy`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `UlubioneFilmy`
--
ALTER TABLE `UlubioneFilmy`
  ADD CONSTRAINT `UlubioneFilmy_ibfk_1` FOREIGN KEY (`idFilmy`) REFERENCES `Filmy` (`idFilmy`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
