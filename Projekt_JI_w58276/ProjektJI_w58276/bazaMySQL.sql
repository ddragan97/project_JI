-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Mar 2020, 10:13
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projji`
--
CREATE DATABASE IF NOT EXISTS `projji` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projji`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `elektryczne`
--

CREATE TABLE `elektryczne` (
  `Id` int(4) NOT NULL,
  `Autor` varchar(32) CHARACTER SET utf8 NOT NULL,
  `Tytul` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Opis` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `elektryczne`
--

INSERT INTO `elektryczne` (`Id`, `Autor`, `Tytul`, `Opis`) VALUES
(1, 'test', 'Test 1', 'gfdgfd dfgdfgh dfh dfhdfhgfh'),
(2, 'test', 'Układ elektryczny', 'Grdfbhygjufx ztf gfdf'),
(3, 'test', 'Test 3', 'gtsdfbhf test'),
(4, 'test', 'Test 4', 'gdfhgfgfhyhygkdgkjhgk'),
(5, 'test', 'Test 5', 'test test test test'),
(6, 'test', 'Test 6', 'test test testtttt testtt');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `foto`
--

CREATE TABLE `foto` (
  `Id` int(4) NOT NULL,
  `Nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `foto`
--

INSERT INTO `foto` (`Id`, `Nazwa`) VALUES
(1, 'd1.jpg'),
(2, 'd2.jpg'),
(3, 'k1.jpg'),
(4, 'k2.jpg'),
(5, 'p1.jpg'),
(6, 'p2.jpg'),
(7, 't1.jpg'),
(8, 't2.jpg'),
(9, 'y1.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `Id` int(4) NOT NULL,
  `Sciezka` varchar(20) NOT NULL,
  `Opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `komentarze`
--

INSERT INTO `komentarze` (`Id`, `Sciezka`, `Opis`) VALUES
(1, '1mechaniczne', 'Test kom 1'),
(2, '1mechaniczne', 'Test kom 2'),
(3, '2elektryczne', 'Testowanie '),
(4, '2elektryczne', 'Test 2'),
(5, '2elektryczne', 'Test 3'),
(6, '2elektryczne', 'Test 4'),
(7, '1mechaniczne', 'T3'),
(8, '2mechaniczne', 'Test'),
(9, '4elektryczne', 'Test'),
(10, '1elektryczne', 'Test'),
(11, '1elektryczne', 'Test 2'),
(12, '4mechaniczne', 'Test 1 do Test 4'),
(13, '4mechaniczne', 'Test 2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mechaniczne`
--

CREATE TABLE `mechaniczne` (
  `Id` int(4) NOT NULL,
  `Autor` varchar(32) NOT NULL,
  `Tytul` varchar(255) NOT NULL,
  `Opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `mechaniczne`
--

INSERT INTO `mechaniczne` (`Id`, `Autor`, `Tytul`, `Opis`) VALUES
(1, 'test', 'Stukanie w silniku', 'Test test test test test test test test test'),
(2, 'test', 'Test 2', 'test 2 test 2 test 2'),
(3, 'test', 'Test3', 'test 3 test 3 test 3'),
(4, 'test', 'Test4', 'Test 4 test test test'),
(5, 'test', 'Test 5', 'test test'),
(6, 'test', 'Test 6', 'testy'),
(7, 'test', 'Test 7', 'Test 7 '),
(8, 'test', 'Dodaj nowe test', 'Dodawanie nowego postu'),
(9, 'test', 'Test długi', 'fdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfhfdhfghgfdhdffgdhgfhdfghdgfh');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `nick` varchar(32) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`nick`, `pass`) VALUES
('test', '$2y$10$lYNgVpkgurNXBsBvSdttS.cvxwyDRs3FYHB0WTKT6QrBokZpHC.em');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `elektryczne`
--
ALTER TABLE `elektryczne`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `mechaniczne`
--
ALTER TABLE `mechaniczne`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `elektryczne`
--
ALTER TABLE `elektryczne`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `foto`
--
ALTER TABLE `foto`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `mechaniczne`
--
ALTER TABLE `mechaniczne`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
