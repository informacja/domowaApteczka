-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 12 Maj 2022, 10:32
-- Wersja serwera: 10.1.48-MariaDB-0+deb9u2
-- Wersja PHP: 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `przelio2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `apteczki`
--

CREATE TABLE `apteczki` (
  `apteczki_id` int(11) UNSIGNED NOT NULL,
  `apteczki_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `apteczki`
--

INSERT INTO `apteczki` (`apteczki_id`, `apteczki_name`) VALUES
(98, ''),
(97, 'Anielska'),
(2, 'Biuro'),
(1, 'Domowa'),
(100, 'JJ'),
(96, 'Moja'),
(44, 'Szpital');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `leki_specyfikacja`
--

CREATE TABLE `leki_specyfikacja` (
  `idleki` int(11) UNSIGNED NOT NULL,
  `nazwa` varchar(80) NOT NULL,
  `subst_czynna` varchar(100) NOT NULL,
  `ean` varchar(15) NOT NULL,
  `op_zb` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `leki_specyfikacja`
--

INSERT INTO `leki_specyfikacja` (`idleki`, `nazwa`, `subst_czynna`, `ean`, `op_zb`) VALUES
(1, 'Espumisan', 'simetikon', '5909990168712', '10 tabletek'),
(2, 'Aleric Deslo Active', 'desloratadyna', '5909991013301', '10 tabletek'),
(3, 'Aripilek', 'Aripiprazolum', '5909991232832', '28 tabletek'),
(4, 'Ranofren', 'Olanzapinum', '5909990640249', '28 tabletek'),
(5, 'Allegra', 'Feksofenadyna', '5909990862337', '10 tabletek'),
(6, 'Hitaxa ', 'Desloratadyna', '5909990981328', '10 tabletek'),
(7, 'Otrivin ', 'Ksylometazolina', '5909990944514', '1 ml'),
(8, 'Telfast 180 ', 'feksofenadyna', '69099770940317', '20 tabletek'),
(9, 'Apap', 'Paracetamolum', '5909991107123', '12 tabletek'),
(10, 'No spa', 'Drotaweryna', '6907890007123', '20 tabletek'),
(11, 'Calcium', 'Wit D3', '7407890017123', '30 tabletek'),
(25, 'Florcontrol', 'kwas acetylosalicylowy', '4049827182410', '20 sztuk'),
(28, 'Biotyna, tabletki powlekane', 'Kofeina', '4788990861139', '20 tabletek'),
(31, 'D-Vitum', 'Wit D3', '7109190118711', '120 tabletek');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `leki_wydane_wprowadzone`
--

CREATE TABLE `leki_wydane_wprowadzone` (
  `idleki_wydane` int(11) UNSIGNED NOT NULL,
  `leki_w_apteczce_idleki_w_apteczce` int(11) NOT NULL,
  `users_idusers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `leki_wydane_wprowadzone`
--

INSERT INTO `leki_wydane_wprowadzone` (`idleki_wydane`, `leki_w_apteczce_idleki_w_apteczce`, `users_idusers`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(24, 7, 2),
(25, 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `leki_w_apteczce`
--

CREATE TABLE `leki_w_apteczce` (
  `idleki_w_apteczce` int(11) UNSIGNED NOT NULL,
  `apteczki_idapteczki` int(11) NOT NULL,
  `leki_specyfikacja_idleki` int(11) DEFAULT NULL,
  `ilosc_kupiona` decimal(10,0) DEFAULT NULL,
  `ilosc_pozostala` decimal(10,0) DEFAULT NULL,
  `data_waznosci` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `leki_w_apteczce`
--

INSERT INTO `leki_w_apteczce` (`idleki_w_apteczce`, `apteczki_idapteczki`, `leki_specyfikacja_idleki`, `ilosc_kupiona`, `ilosc_pozostala`, `data_waznosci`, `status`, `price`) VALUES
(1, 1, 1, '1', '1', '2022-05-03', 1, 6.09),
(2, 2, 1, '1', '1', '2022-05-03', 0, 10),
(3, 1, 1, '5', '5', '2022-05-27', 1, 11.5),
(4, 1, 1, '7', '2', '2022-05-31', 1, 9),
(5, 1, 2, '2', '2', '2022-11-12', 1, 17.99),
(6, 1, 1, '5', '1', '2022-05-02', 0, 15.7),
(7, 1, 1, '10', '5', '2023-05-02', 1, 13.49),
(8, 1, 1, '1', '0', '2023-09-12', 1, 11.09),
(9, 1, 1, '5', '3', '2024-07-17', 1, 16.99),
(10, 1, 1, '3', '3', '2021-07-17', 1, 23),
(11, 1, 1, '1', '0', '2024-05-12', 1, 41.99),
(25, 1, 2, '3', '2', '2022-05-08', 1, 11),
(28, 0, 3, '3', '3', '2024-10-01', 1, 4.99),
(29, 2, 4, '3', '3', '2023-06-01', 5, 7.89),
(30, 1, 7, '3', '2', '2022-05-12', 1, 33),
(31, 1, 25, '6', '6', '2022-05-11', 0, 36);

--
-- Wyzwalacze `leki_w_apteczce`
--
DELIMITER $$
CREATE TRIGGER `afterInsert` AFTER INSERT ON `leki_w_apteczce` FOR EACH ROW INSERT INTO logs VALUES (NULL, NOW(), NEW.status,idleki_w_apteczce)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `afterUpdate` AFTER UPDATE ON `leki_w_apteczce` FOR EACH ROW INSERT INTO logs VALUES (NULL, NOW(), NEW.status,idleki_w_apteczce)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `modify` date NOT NULL,
  `status` int(11) NOT NULL,
  `idLeku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `logs`
--

INSERT INTO `logs` (`id`, `modify`, `status`, `idLeku`) VALUES
(1, '2022-05-03', 1, 31),
(2, '2022-05-04', 0, 31);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_rights` int(11) NOT NULL,
  `apteczki_idapteczki` int(11) NOT NULL,
  `user_password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_name`, `user_status`, `user_rights`, `apteczki_idapteczki`, `user_password_hash`) VALUES
(1, 'piotr@student.agh.edu.pl', 'Piotr Wawryka', -1, -1, 1, '$2y$10$1Uaf/TpzSoqG1Evw0xwKPO096XFCa31TeEgo8k3Pbfk0GWmglDl1W'),
(33, 'piotrwagh@gmail.com', 'Piotr', -1, -1, 1, '$2y$10$oCzAacYqDaLbyUZKq/2Nk.1dS7SQvv7LRX1dapltP9dlXSrYFKRr6'),
(45, 'piotrspam@op.pl', 'Jan Kowalski', -1, -1, 2, '$2y$10$1Uaf/TpzSoqG1Evw0xwKPO096XFCa31TeEgo8k3Pbfk0GWmglDl1W'),
(46, 'angelika.p1@onet.pl', 'Angelika Przeliorz', -1, -1, 7, '$2y$10$qCsbpBGM44YdmfmpXWQOOO3zgMFfMV7usHz4oBsykd8nl5CdLNq6W'),
(50, 'test@test.test', 'JÄ™drzej Juryk', -1, -1, 100, '$2y$10$su4Z/sj1lBXRLMVI1xTCjOOhIcxRi8NCK8uVd/LUhiXQLXxDcpZSS');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `apteczki`
--
ALTER TABLE `apteczki`
  ADD PRIMARY KEY (`apteczki_id`),
  ADD UNIQUE KEY `apteczki_name` (`apteczki_name`);

--
-- Indexes for table `leki_specyfikacja`
--
ALTER TABLE `leki_specyfikacja`
  ADD PRIMARY KEY (`idleki`);

--
-- Indexes for table `leki_wydane_wprowadzone`
--
ALTER TABLE `leki_wydane_wprowadzone`
  ADD PRIMARY KEY (`idleki_wydane`);

--
-- Indexes for table `leki_w_apteczce`
--
ALTER TABLE `leki_w_apteczce`
  ADD PRIMARY KEY (`idleki_w_apteczce`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `apteczki_idapteczki` (`apteczki_idapteczki`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `apteczki`
--
ALTER TABLE `apteczki`
  MODIFY `apteczki_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT dla tabeli `leki_specyfikacja`
--
ALTER TABLE `leki_specyfikacja`
  MODIFY `idleki` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT dla tabeli `leki_wydane_wprowadzone`
--
ALTER TABLE `leki_wydane_wprowadzone`
  MODIFY `idleki_wydane` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT dla tabeli `leki_w_apteczce`
--
ALTER TABLE `leki_w_apteczce`
  MODIFY `idleki_w_apteczce` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;
--
-- AUTO_INCREMENT dla tabeli `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `leki_specyfikacja`
--
ALTER TABLE `leki_specyfikacja`
  ADD CONSTRAINT `leki_specyfikacja_ibfk_1` FOREIGN KEY (`idleki`) REFERENCES `leki_w_apteczce` (`idleki_w_apteczce`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
