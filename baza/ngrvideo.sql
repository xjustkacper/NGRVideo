-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Cze 2023, 23:35
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
  `opis` varchar(1000) NOT NULL,
  `rezyser` varchar(20) NOT NULL,
  `rokprodukcji` int(4) NOT NULL,
  `czastrwania` int(4) NOT NULL,
  `idKategoria` int(20) NOT NULL,
  `Jezyk` varchar(30) NOT NULL,
  `url_baner` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `filmy`
--

INSERT INTO `filmy` (`idFilmy`, `idLinki`, `Tytul`, `opis`, `rezyser`, `rokprodukcji`, `czastrwania`, `idKategoria`, `Jezyk`, `url_baner`) VALUES
(17, 1, 'Noc żywych trupów', 'Barbara i Johnny wybrali się w dość daleką podróż, aby odwiedzić grób ich ojca. Johnny był bardzo niechętny tej podróży, dał się jednak przekonać. Gdy docierają na miejsce, John próbuje nastraszyć Barbarę. W pewnym momencie dostrzegają dziwnie idącego człowieka, który powoli zbliża się do nich...', 'George A. Romero', 1968, 86, 7, 'USA', '/banery/noc.jpg'),
(18, 2, 'Znachor', 'Historia znanego chirurga Wilczura, którego opuszcza ukochana żona. Zrozpaczony lekarz zaczyna pić i wdaje się w burdę, co skutkuje utratą pamięci. ', 'Jerzy Hoffman', 1982, 128, 3, 'Polska', '/banery/znachor.jpg'),
(19, 3, 'Plan 9 From Outer Space', 'Małe miasteczko mierzy się z nalotami UFO. Mieszkańcy zaczynają obserwować cmentarz, na którym lądują statki kosmiczne. Jak okazuje się, kosmici pragną wskrzeszać umarłych, aby zapanować nad ich umysłami. Jednocześnie obcy pragną zabić wszystkich żywych ludzi dla ich dobra. ', 'Ed Wood ', 1959, 79, 6, 'USA', '/banery/plan9.jpg'),
(20, 4, 'Karnawał dusz', 'Mary Henry uległa poważnemu wypadkowi, ale uszła z życiem. Stara się dojść do siebie i przyjmuje posadę organistki w kościele. Zaczyna prześladować ją tajemniczy, upiorny mężczyzna. ', 'Herk Harvey', 1962, 91, 7, 'USA', '/banery/karnawal.jpg'),
(21, 5, 'Segno di Zorro', 'Ramon Martinez y Rayol, a half Basque/half Castilian caballero leaves his native Spain for Mexico at the request of his mother. She tells him that the father he was told was dead, is actually alive and living in Mexico and has asked for his son\'s help. When he arrives in Mexico he finds that his father has died under mysterious circumstances. Determining that his father has met with foul play, he uses \"the sign of Zorro\", to lead a campaign against a corrupt generalissimo. Along the way he wins the heart of a beautiful senorita. ', 'Mario Caiano', 1963, 90, 1, 'Francja/Hiszpania/Włochy', '/banery/zorro.jpg'),
(22, 6, 'The Man Who Knew Too Much', 'Spędzając urlop w Szwajcarii, urzędnik Bob Lawrence, staje się świadkiem morderstwa na angielskim agencie. Chcąc zmusić go do milczenia, przestępcy porywają jego córkę. Decyduje się, wraz z małżonką, bez pomocy policji, odzyskać dziecko. Nie udaje im się uniknąć pojmania. Życie rodziny zostaje zagrożone. ', 'Alfred Hitchcock', 1934, 75, 8, 'USA', '/banery/theman.jpg'),
(23, 7, 'Beneath the 12-Mile Reef', 'Mike (Gilbert Roland) and Tony Petrakis (Robert Wagner) are Greek American father and son sponge-diving entrepreneurs who find themselves in competition with the Rhys family, Conch fishermen who are prepared to resort to violence and murder to maintain their established fishing grounds off the Gulf Coast of Florida. Run-ins between the two clans lead to an exchange of threats and all-out brawls. Further complications ensue when Tony Petrakis meets Gwyneth Rhys (Terry Moore), and the two fall in love. ', 'Robert D. Webb', 1953, 102, 5, 'USA', '/banery/12mile.png'),
(24, 8, 'Narzeczona potwora', 'Szalony naukowiec, doktor Eric Vornoff, chce stworzyć armię nadludzi. Eksperymentuje na ludziach przy użyciu maszyny opartej na działaniu energii atomowej. ', 'Ed Wood', 1955, 69, 7, 'USA', '/banery/napo.jpg'),
(25, 9, 'Sinners in Paradise', 'A passenger aircraft crashes in mid-Pacific and some of the survivors reach an island inhabited only by an American, Jim Taylor, with his Chinese servant, Ping. He declines to help them, telling them to build their own shelter and gather their own food and, though he has a boat and fuel, refusing to take them off. The reason why he wants to remain undisturbed, we learn, is that he is wanted for murder. In time his attitude to the intruders softens as they, despite endless bickering, manage to form a working community and he finds himself increasingly drawn to an attractive young nurse, Anne Wesson, who is running away from her husband. When the boat is prepared for a trip to civilization, two crooked businessmen from the party steal it with Ping on board. In a fight, he kills them both and, fatally wounded, brings the boat back. The rest can then escape. ', 'James Whale', 1938, 65, 5, 'USA', '/banery/sinners.jpg'),
(26, 10, 'Mystery House', 'At a hunting lodge retreat, banker Hubert Kingery (Eric Stanely) announces to five fellow officers that one of them has forged documents and embezzled $500,000. Before the evening is over, Kingery is shot dead and the police officially rule it a suicide. Kingery\'s daughter Gwen (Anne Nagel) does not agree and asks for help from her aunt\'s nurse, Sarah Keate (Ann Sheridan), who suggests her detective boyfriend, Lance O\'Leary (Dick Purcell), for the case. O\'Leary has all of the suspects return to the lodge and begins his investigation. Stuck in the snowbound shelter, the suspects and victims begin to pile up. ', 'Noel M. Smith', 1938, 56, 8, 'USA', '/banery/mystery.jpg'),
(27, 11, 'Piętro Wyżej', 'Komedia pomyłek, która opowiada o perypetiach dwóch sąsiadów w kamienicy przy ul. Szczęśliwej 13: starszego Hipolita Pączka (który mieszka niżej) oraz młodszego Henryka Pączka (lokatora mieszkającego piętro wyżej). Poza nazwiskiem dzieli ich niemal wszystko. Pierwszy jest miłośnikiem muzyki poważnej, drugi – znanym spikerem radiowym i jazzmanem. Prowadzą ze sobą nieustanną wojnę, gdyż właściciel kamienicy nie może usunąć kłopotliwego lokatora. Sytuację jeszcze bardziej komplikuje przyjazd młodej krewnej Hipolita – Lodzi, w której (z wzajemnością) zakochuje się Henryk.\r\n\r\nPoza komizmem sytuacyjnym i dowcipnymi dialogami powodzenie filmowi zapewniły również szlagiery („Seksapil – to nasza broń kobieca”, „Umówiłem się z nią na dziewiątą”, „Dziś ta, jutro tamta”) w wykonaniu Eugeniusza Bodo. ', 'Leon Trystan', 1937, 84, 4, 'Polska', '/banery/pw.jpg'),
(28, 12, 'They Made Me a Criminal', 'Johnnie Bradfield is a southpaw world champion boxer falsely accused of murder. He disappears and is presumed dead. The only witnesses who could have exonerated him were his manager and girlfriend, both of whom have died in an automobile accident. Detective Monty Phelan believes that Johnnie is still alive and hasn\'t given up on searching for him. Johnnie, meanwhile, is hiding out on Grandma Rafferty\'s farm in Arizona. There, he meets with some juvenile delinquents, who are under the guardianship of Tommy\'s sister Peggy. ', 'Busby Berkeley', 1939, 92, 2, 'USA', '/banery/criminal.jpg');

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
(1, 'Western'),
(2, 'Kryminał'),
(3, 'Melodramat'),
(4, 'Komedia'),
(5, 'Przygodowy'),
(6, 'Sci-Fi'),
(7, 'Horror'),
(8, 'Thriller');

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

--
-- Zrzut danych tabeli `komentarze`
--

INSERT INTO `komentarze` (`idKomentarze`, `idProfilUzytkownika`, `idFilmy`, `komentarz`) VALUES
(45, 11, 18, 'Aż się popłakałem '),
(46, 11, 28, 'D:'),
(47, 11, 21, 'Marna podróba zorro'),
(48, 10, 25, 'bardzo stary film');

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
(1, 'https://www.youtube.com/embed/FdSYma5HshE'),
(2, 'https://www.youtube.com/embed/4mO800K_i1w'),
(3, 'https://www.youtube.com/embed/qsb74pW7goU'),
(4, 'https://www.youtube.com/embed/vNYg4YWkp0k'),
(5, 'https://www.youtube.com/embed/a8RSKsl3sXc'),
(6, 'https://www.youtube.com/embed/gDt2qK_ZNQk'),
(7, 'https://www.youtube.com/embed/A8Wq00CVVSc'),
(8, 'https://www.youtube.com/embed/M0sjBKTUSp8'),
(9, 'https://www.youtube.com/embed/57SkKSKL0qA'),
(10, 'https://www.youtube.com/embed/5e3Blpf54oQ'),
(11, 'https://www.youtube.com/embed/PzeS9NJNepw'),
(12, 'https://www.youtube.com/embed/gWPItlODoys');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `idOceny` int(100) NOT NULL,
  `idFilmy` int(100) NOT NULL,
  `idProfilUzytkownika` int(100) NOT NULL,
  `LiczbaGwiazdek` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `oceny`
--

INSERT INTO `oceny` (`idOceny`, `idFilmy`, `idProfilUzytkownika`, `LiczbaGwiazdek`) VALUES
(38, 18, 11, 5),
(39, 17, 11, 4),
(40, 19, 11, 3),
(41, 24, 11, 3),
(42, 28, 11, 5),
(43, 21, 11, 1),
(44, 27, 11, 5),
(45, 18, 10, 5),
(46, 17, 10, 4),
(47, 26, 10, 2),
(48, 25, 10, 4),
(49, 24, 10, 4),
(50, 20, 10, 3),
(51, 28, 10, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profiluzytkownika`
--

CREATE TABLE `profiluzytkownika` (
  `idProfilUzytkownika` int(100) NOT NULL,
  `idUzytkownik` int(100) NOT NULL,
  `DataRejestracji` date NOT NULL,
  `url_profilowe` varchar(200) NOT NULL,
  `opis` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `profiluzytkownika`
--

INSERT INTO `profiluzytkownika` (`idProfilUzytkownika`, `idUzytkownik`, `DataRejestracji`, `url_profilowe`, `opis`) VALUES
(10, 11, '2023-06-06', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Flogos-download.com%2Fwp-content%2Fuploads%2F2019%2F06%2FGimp_Logo_blackwhite.png', 'Witam oto opis :0'),
(11, 12, '2023-06-06', 'https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2F1000logos.net%2Fwp-content%2Fuploads%2F2017%2F03%2FLINUX-LOGO.png', 'Admin, ale tylko z nazwy :tf:');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reklama`
--

CREATE TABLE `reklama` (
  `idReklama` int(11) NOT NULL,
  `url_reklama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `reklama`
--

INSERT INTO `reklama` (`idReklama`, `url_reklama`) VALUES
(1, '/reklamy/reklama1.gif'),
(2, '/reklamy/reklama2.gif');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ulubionefilmy`
--

CREATE TABLE `ulubionefilmy` (
  `idUlubioneFilmy` int(50) NOT NULL,
  `idFilmy` int(50) NOT NULL,
  `idProfilUzytkownika` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ulubionefilmy`
--

INSERT INTO `ulubionefilmy` (`idUlubioneFilmy`, `idFilmy`, `idProfilUzytkownika`) VALUES
(14, 18, 11),
(15, 27, 11),
(16, 17, 10),
(17, 18, 10);

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
(11, 'User', 'User', '', ''),
(12, 'Admin', 'Admin', '', '');

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
-- Indeksy dla tabeli `reklama`
--
ALTER TABLE `reklama`
  ADD PRIMARY KEY (`idReklama`);

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
  MODIFY `idFilmy` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `idKategorie` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `idKomentarze` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT dla tabeli `linki`
--
ALTER TABLE `linki`
  MODIFY `idLinki` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `idOceny` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT dla tabeli `profiluzytkownika`
--
ALTER TABLE `profiluzytkownika`
  MODIFY `idProfilUzytkownika` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `reklama`
--
ALTER TABLE `reklama`
  MODIFY `idReklama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `ulubionefilmy`
--
ALTER TABLE `ulubionefilmy`
  MODIFY `idUlubioneFilmy` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `idUzytkownicy` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
