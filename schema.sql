-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 05, 2024 at 01:36 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `aktor`
--

CREATE TABLE `aktor` (
                         `id_aktora` int(11) NOT NULL,
                         `imie` varchar(50) DEFAULT NULL,
                         `nazwisko` varchar(50) DEFAULT NULL,
                         `adres` varchar(255) DEFAULT NULL,
                         `telefon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aktor`
--

INSERT INTO `aktor` (`id_aktora`, `imie`, `nazwisko`, `adres`, `telefon`) VALUES
                                                                              (1, 'Jan', 'Kowalski', 'ul. Kwiatowa 12, 00-123 Warszawa', '555-123-456'),
                                                                              (2, 'Anna', 'Nowak', 'ul. Wiosenna 5, 80-456 Gdańsk', '555-987-654'),
                                                                              (3, 'Piotr', 'Wiśniewski', 'ul. Leśna 9, 50-101 Wrocław', '555-654-321'),
                                                                              (4, 'Katarzyna', 'Kamińska', 'ul. Polna 11, 60-203 Poznań', '555-321-987'),
                                                                              (5, 'Michał', 'Zieliński', 'ul. Słoneczna 17, 31-212 Kraków', '555-111-222'),
                                                                              (6, 'Joanna', 'Wójcik', 'ul. Krótka 3, 40-301 Katowice', '555-333-444'),
                                                                              (7, 'Tomasz', 'Mazur', 'ul. Długa 7, 90-201 Łódź', '555-444-555'),
                                                                              (8, 'Magdalena', 'Lewandowska', 'ul. Spacerowa 8, 70-122 Szczecin', '555-555-666'),
                                                                              (9, 'Paweł', 'Krawczyk', 'ul. Różana 6, 85-321 Bydgoszcz', '555-666-777'),
                                                                              (10, 'Agnieszka', 'Szymańska', 'ul. Brzozowa 15, 75-501 Koszalin', '555-777-888');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `film`
--

CREATE TABLE `film` (
                        `id_filmu` int(11) NOT NULL,
                        `tytul` varchar(50) DEFAULT NULL,
                        `data_produkcji` date DEFAULT NULL,
                        `budzet` float DEFAULT NULL,
                        `id_rezysera` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_filmu`, `tytul`, `data_produkcji`, `budzet`, `id_rezysera`) VALUES
                                                                                        (1, 'Człowiek z marmuru', '1977-02-25', 5000000, 1),
                                                                                        (2, 'Europa Europa', '1990-08-16', 8000000, 2),
                                                                                        (3, 'Nóż w wodzie', '1962-10-09', 2000000, 3),
                                                                                        (4, 'Trzy kolory: Czerwony', '1994-06-22', 7000000, 4),
                                                                                        (5, 'Lista Schindlera', '1993-11-30', 22000000, 5),
                                                                                        (6, 'Ida', '2013-10-25', 3000000, 6),
                                                                                        (7, 'Body/Ciało', '2015-03-06', 3500000, 7),
                                                                                        (8, 'Katedra', '2002-11-12', 500000, 8),
                                                                                        (9, 'Essential Killing', '2010-09-09', 4000000, 9),
                                                                                        (10, 'Dom zły', '2009-11-27', 2500000, 10),
                                                                                        (11, 'Wesele', '2004-09-10', 3500000, 10),
                                                                                        (12, 'Powidoki', '2016-12-25', 6000000, 1),
                                                                                        (13, 'Plac Zbawiciela', '2006-10-15', 2800000, 2),
                                                                                        (14, 'Pianista', '2002-05-24', 35000000, 3),
                                                                                        (15, 'Podwójne życie Weroniki', '1991-09-15', 5000000, 4),
                                                                                        (16, 'Bogowie', '2014-10-10', 8000000, 5),
                                                                                        (17, 'Zimna wojna', '2018-05-08', 12000000, 6),
                                                                                        (18, 'Twarz', '2018-04-06', 4500000, 7),
                                                                                        (19, 'Animowana Symfonia', '2008-03-19', 750000, 8),
                                                                                        (20, '11 minut', '2015-09-09', 5000000, 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezyser`
--

CREATE TABLE `rezyser` (
                           `id_rezysera` int(11) NOT NULL,
                           `imie` varchar(50) DEFAULT NULL,
                           `nazwisko` varchar(50) DEFAULT NULL,
                           `data_urodzenia` date DEFAULT NULL,
                           `telefon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rezyser`
--

INSERT INTO `rezyser` (`id_rezysera`, `imie`, `nazwisko`, `data_urodzenia`, `telefon`) VALUES
                                                                                           (1, 'Andrzej', 'Wajda', '1926-03-06', '555-123-111'),
                                                                                           (2, 'Agnieszka', 'Holland', '1948-11-28', '555-234-222'),
                                                                                           (3, 'Roman', 'Polanski', '1933-08-18', '555-345-333'),
                                                                                           (4, 'Krzysztof', 'Kieślowski', '1941-06-27', '555-456-444'),
                                                                                           (5, 'Janusz', 'Kamiński', '1959-06-27', '555-567-555'),
                                                                                           (6, 'Paweł', 'Pawlikowski', '1957-09-15', '555-678-666'),
                                                                                           (7, 'Małgorzata', 'Szumowska', '1973-02-26', '555-789-777'),
                                                                                           (8, 'Tomasz', 'Bagiński', '1976-01-10', '555-890-888'),
                                                                                           (9, 'Jerzy', 'Skolimowski', '1938-05-05', '555-901-999'),
                                                                                           (10, 'Wojciech', 'Smarzowski', '1963-01-18', '555-012-123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rola`
--

CREATE TABLE `rola` (
                        `id_roli` int(11) NOT NULL,
                        `nazwa` varchar(255) DEFAULT NULL,
                        `gaza` float DEFAULT NULL,
                        `id_filmu` int(11) DEFAULT NULL,
                        `id_rezysera` int(11) DEFAULT NULL,
                        `id_aktora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rola`
--

INSERT INTO `rola` (`id_roli`, `nazwa`, `gaza`, `id_filmu`, `id_rezysera`, `id_aktora`) VALUES
                                                                                            (1, 'Główna rola', 500000, 1, NULL, 1),
                                                                                            (2, 'Drugoplanowa rola', 200000, 2, NULL, 2),
                                                                                            (3, 'Główny antagonista', 350000, 3, NULL, 3),
                                                                                            (4, 'Postać drugoplanowa', 150000, 4, NULL, 4),
                                                                                            (5, 'Rola epizodyczna', 80000, 5, NULL, 5),
                                                                                            (6, 'Główna bohaterka', 450000, 6, 6, NULL),
                                                                                            (7, 'Bohater drugoplanowy', 220000, 7, 7, NULL),
                                                                                            (8, 'Postać komediowa', 120000, 8, 8, NULL),
                                                                                            (9, 'Postać epizodyczna', 75000, 9, 9, NULL),
                                                                                            (10, 'Czarny charakter', 300000, 10, 10, NULL),
                                                                                            (11, 'Główna rola kobieca', 550000, 11, NULL, 1),
                                                                                            (12, 'Drugoplanowy antagonista', 180000, 12, NULL, 2),
                                                                                            (13, 'Bohater epizodyczny', 130000, 13, NULL, 3),
                                                                                            (14, 'Postać historyczna', 500000, 14, NULL, 4),
                                                                                            (15, 'Bohater komediowy', 250000, 15, NULL, 5),
                                                                                            (16, 'Antagonistka', 400000, 16, 6, NULL),
                                                                                            (17, 'Główna postać dziecięca', 100000, 17, 7, NULL),
                                                                                            (18, 'Rola trzecioplanowa', 60000, 18, 8, NULL),
                                                                                            (19, 'Postać wspomagająca', 200000, 19, 9, NULL),
                                                                                            (20, 'Postać rodzica', 175000, 20, 10, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wytwornia`
--

CREATE TABLE `wytwornia` (
                             `id_wytworni` int(11) NOT NULL,
                             `Nazwa` varchar(255) DEFAULT NULL,
                             `Adres` varchar(255) DEFAULT NULL,
                             `Data_zalozenia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wytwornia`
--

INSERT INTO `wytwornia` (`id_wytworni`, `Nazwa`, `Adres`, `Data_zalozenia`) VALUES
                                                                                (1, 'FilmStudio Alpha', 'ul. Księżycowa 15, 01-123 Warszawa', '1990-05-12'),
                                                                                (2, 'Silver Screen Productions', 'ul. Filmowa 3, 80-234 Gdańsk', '1985-09-23'),
                                                                                (3, 'Golden Eagle Entertainment', 'ul. Gwiaździsta 7, 50-345 Wrocław', '2000-07-15'),
                                                                                (4, 'Starry Night Studios', 'ul. Galaktyczna 12, 60-456 Poznań', '1995-11-30'),
                                                                                (5, 'DreamWorld Pictures', 'ul. Słoneczna 9, 31-567 Kraków', '2002-03-10');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wyt_film`
--

CREATE TABLE `wyt_film` (
                            `id_wytworni` int(11) DEFAULT NULL,
                            `id_filmu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wyt_film`
--

INSERT INTO `wyt_film` (`id_wytworni`, `id_filmu`) VALUES
                                                       (1, 1),
                                                       (2, 2),
                                                       (3, 3),
                                                       (4, 4),
                                                       (5, 5),
                                                       (1, 6),
                                                       (2, 7),
                                                       (3, 8),
                                                       (4, 9),
                                                       (5, 10),
                                                       (1, 11),
                                                       (2, 12),
                                                       (3, 13),
                                                       (4, 14),
                                                       (5, 15),
                                                       (1, 16),
                                                       (2, 17),
                                                       (3, 18),
                                                       (4, 19),
                                                       (5, 20);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `aktor`
--
ALTER TABLE `aktor`
    ADD PRIMARY KEY (`id_aktora`);

--
-- Indeksy dla tabeli `film`
--
ALTER TABLE `film`
    ADD PRIMARY KEY (`id_filmu`),
  ADD KEY `id_rezysera` (`id_rezysera`);

--
-- Indeksy dla tabeli `rezyser`
--
ALTER TABLE `rezyser`
    ADD PRIMARY KEY (`id_rezysera`);

--
-- Indeksy dla tabeli `rola`
--
ALTER TABLE `rola`
    ADD PRIMARY KEY (`id_roli`),
  ADD KEY `id_filmu` (`id_filmu`),
  ADD KEY `id_rezysera` (`id_rezysera`),
  ADD KEY `id_aktora` (`id_aktora`);

--
-- Indeksy dla tabeli `wytwornia`
--
ALTER TABLE `wytwornia`
    ADD PRIMARY KEY (`id_wytworni`);

--
-- Indeksy dla tabeli `wyt_film`
--
ALTER TABLE `wyt_film`
    ADD KEY `id_wytworni` (`id_wytworni`),
  ADD KEY `id_filmu` (`id_filmu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktor`
--
ALTER TABLE `aktor`
    MODIFY `id_aktora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
    MODIFY `id_filmu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rezyser`
--
ALTER TABLE `rezyser`
    MODIFY `id_rezysera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rola`
--
ALTER TABLE `rola`
    MODIFY `id_roli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wytwornia`
--
ALTER TABLE `wytwornia`
    MODIFY `id_wytworni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film`
--
ALTER TABLE `film`
    ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_rezysera`) REFERENCES `rezyser` (`id_rezysera`);

--
-- Constraints for table `rola`
--
ALTER TABLE `rola`
    ADD CONSTRAINT `rola_ibfk_1` FOREIGN KEY (`id_filmu`) REFERENCES `film` (`id_filmu`),
  ADD CONSTRAINT `rola_ibfk_2` FOREIGN KEY (`id_rezysera`) REFERENCES `rezyser` (`id_rezysera`),
  ADD CONSTRAINT `rola_ibfk_3` FOREIGN KEY (`id_aktora`) REFERENCES `aktor` (`id_aktora`);

--
-- Constraints for table `wyt_film`
--
ALTER TABLE `wyt_film`
    ADD CONSTRAINT `wyt_film_ibfk_1` FOREIGN KEY (`id_wytworni`) REFERENCES `wytwornia` (`id_wytworni`),
  ADD CONSTRAINT `wyt_film_ibfk_2` FOREIGN KEY (`id_filmu`) REFERENCES `film` (`id_filmu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
