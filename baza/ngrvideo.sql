-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Maj 2023, 16:28
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ngrvideo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filmy`
--

CREATE TABLE `filmy` (
  `idFilmy` int(100) NOT NULL,
  `idLinki` int(100) NOT NULL,
  `Tytul` varchar(30) NOT NULL,
  `opis` varchar(150) NOT NULL,
  `rezyser` varchar(20) NOT NULL,
  `rokprodukcji` int(4) NOT NULL,
  `czastrwania` int(4) NOT NULL,
  `idKategoria` int(20) NOT NULL,
  `Jezyk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `filmy`
--

INSERT INTO `filmy` (`idFilmy`, `idLinki`, `Tytul`, `opis`, `rezyser`, `rokprodukcji`, `czastrwania`, `idKategoria`, `Jezyk`) VALUES
(1, 1, 'Test1', 'Test1', 'test1', 1990, 111, 1, 'Rosja'),
(2, 1, 'test2', 'XD', 'XD', 992, 22, 2, 'Polska');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `idKategorie` int(20) NOT NULL,
  `Nazwa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`idKategorie`, `Nazwa`) VALUES
(1, 'Akcja'),
(2, 'Dramat');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `idKomentarze` int(11) NOT NULL,
  `idProfilUzytkownika` int(11) NOT NULL,
  `idFilmy` int(11) NOT NULL,
  `komentarz` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `linki`
--

CREATE TABLE `linki` (
  `idLinki` int(100) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `linki`
--

INSERT INTO `linki` (`idLinki`, `url`) VALUES
(1, 'http://XD.XD');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `idOceny` int(100) NOT NULL,
  `idFilmy` int(100) NOT NULL,
  `idProfilUzytkownika` int(100) NOT NULL,
  `LiczbaGwiazdek` int(5) NOT NULL,
  `SredniaOcen` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profiluzytkownika`
--

CREATE TABLE `profiluzytkownika` (
  `idProfilUzytkownika` int(100) NOT NULL,
  `idUzytkownik` int(100) NOT NULL,
  `DataRejestracji` date NOT NULL,
  `url_profilowe` varchar(50) NOT NULL,
  `opis` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `profiluzytkownika`
--

INSERT INTO `profiluzytkownika` (`idProfilUzytkownika`, `idUzytkownik`, `DataRejestracji`, `url_profilowe`, `opis`) VALUES
(3, 4, '2023-04-23', '', ''),
(4, 5, '2023-04-23', '', ''),
(5, 6, '2023-04-23', '', ''),
(6, 7, '2023-04-23', '', ''),
(7, 8, '2023-04-23', '', ''),
(8, 9, '2023-04-23', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ulubionefilmy`
--

CREATE TABLE `ulubionefilmy` (
  `idUlubioneFilmy` int(50) NOT NULL,
  `idFilmy` int(50) NOT NULL,
  `idProfilUzytkownika` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `idUzytkownicy` int(100) NOT NULL,
  `login` varchar(15) NOT NULL,
  `haslo` varchar(15) NOT NULL,
  `PytaniePomocnicze` varchar(30) NOT NULL,
  `OdpowiedzPomocnicza` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`idUzytkownicy`, `login`, `haslo`, `PytaniePomocnicze`, `OdpowiedzPomocnicza`) VALUES
(4, 'test', 'test', 'adfsdf', 'dfasdf'),
(5, '856', '756', '57', '75'),
(6, 'test2', 'test2', '', ''),
(7, 'frugo', 'frugo', '', ''),
(8, 'frugo2', 'frugo2', '', ''),
(9, '445', '454', '', '');

--
-- Wyzwalacze `uzytkownicy`
--
DELIMITER $$
CREATE TRIGGER `UsrTrigger` AFTER INSERT ON `uzytkownicy` FOR EACH ROW BEGIN
  INSERT INTO `ProfilUzytkownika` (`idUzytkownik`, `DataRejestracji`, `url_profilowe`, `opis`) 
  VALUES (NEW.`idUzytkownicy`, NOW(), '', '');
END
$$
DELIMITER ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `filmy`
--
ALTER TABLE `filmy`
  ADD PRIMARY KEY (`idFilmy`),
  ADD KEY `idLinki` (`idLinki`),
  ADD KEY `idKategoria` (`idKategoria`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`idKategorie`);

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`idKomentarze`),
  ADD KEY `idFilmy` (`idFilmy`),
  ADD KEY `idProfilUzytkownika` (`idProfilUzytkownika`);

--
-- Indeksy dla tabeli `linki`
--
ALTER TABLE `linki`
  ADD PRIMARY KEY (`idLinki`);

--
-- Indeksy dla tabeli `oceny`
--
ALTER TABLE `oceny`
  ADD PRIMARY KEY (`idOceny`),
  ADD KEY `idFilmy` (`idFilmy`),
  ADD KEY `idProfilUzytkownika` (`idProfilUzytkownika`);

--
-- Indeksy dla tabeli `profiluzytkownika`
--
ALTER TABLE `profiluzytkownika`
  ADD PRIMARY KEY (`idProfilUzytkownika`),
  ADD KEY `idUzytkownik` (`idUzytkownik`);

--
-- Indeksy dla tabeli `ulubionefilmy`
--
ALTER TABLE `ulubionefilmy`
  ADD PRIMARY KEY (`idUlubioneFilmy`),
  ADD KEY `idFilmy` (`idFilmy`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`idUzytkownicy`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `filmy`
--
ALTER TABLE `filmy`
  MODIFY `idFilmy` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `idKategorie` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `idKomentarze` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `linki`
--
ALTER TABLE `linki`
  MODIFY `idLinki` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `idOceny` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `profiluzytkownika`
--
ALTER TABLE `profiluzytkownika`
  MODIFY `idProfilUzytkownika` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `ulubionefilmy`
--
ALTER TABLE `ulubionefilmy`
  MODIFY `idUlubioneFilmy` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `idUzytkownicy` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `filmy`
--
ALTER TABLE `filmy`
  ADD CONSTRAINT `Filmy_ibfk_1` FOREIGN KEY (`idLinki`) REFERENCES `linki` (`idLinki`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Filmy_ibfk_2` FOREIGN KEY (`idKategoria`) REFERENCES `kategorie` (`idKategorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD CONSTRAINT `Komentarze_ibfk_1` FOREIGN KEY (`idFilmy`) REFERENCES `filmy` (`idFilmy`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Komentarze_ibfk_2` FOREIGN KEY (`idProfilUzytkownika`) REFERENCES `profiluzytkownika` (`idProfilUzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `oceny`
--
ALTER TABLE `oceny`
  ADD CONSTRAINT `Oceny_ibfk_1` FOREIGN KEY (`idFilmy`) REFERENCES `filmy` (`idFilmy`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Oceny_ibfk_2` FOREIGN KEY (`idProfilUzytkownika`) REFERENCES `profiluzytkownika` (`idProfilUzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `profiluzytkownika`
--
ALTER TABLE `profiluzytkownika`
  ADD CONSTRAINT `ProfilUzytkownika_ibfk_1` FOREIGN KEY (`idUzytkownik`) REFERENCES `uzytkownicy` (`idUzytkownicy`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `ulubionefilmy`
--
ALTER TABLE `ulubionefilmy`
  ADD CONSTRAINT `UlubioneFilmy_ibfk_1` FOREIGN KEY (`idFilmy`) REFERENCES `filmy` (`idFilmy`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
