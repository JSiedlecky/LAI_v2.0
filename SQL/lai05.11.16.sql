-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 05 Lis 2016, 21:51
-- Wersja serwera: 5.7.13
-- Wersja PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `lai`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `surname` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `module` text NOT NULL,
  `years` text,
  `days` text,
  `addInfo` text NOT NULL,
  `status` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `applications`
--

INSERT INTO `applications` (`id`, `name`, `surname`, `email`, `phone`, `module`, `years`, `days`, `addInfo`, `status`) VALUES
(6, 'Jakub', 'Siedlecki', 'jkb.siedlecki@gmail.com', '+48 535 205 100', 'Cisco', 'Dwa lata', 'Tydzien', 'Jestem uczniem klasy 4i w ZSTI', 'Pomyślnie rozpatrzono.'),
(7, 'Jakub', 'Siedlecki', 'jkb.siedlecki@gmail.com', '+48', 'Aplikacje', ' - ', ' - ', 'Jestem uczniakiem klasy 4i w ZSTI elo', NULL),
(8, 'Marek', 'Åamasz', 'mrk.lamasz@gmail.com', '+48 111 111 111', 'Cisco', 'Rok', 'Weekend', 'Jp Jp Jp', NULL),
(9, 'jjj', 'kkkk', 'kkk@jjj', '+48111111111', 'Aplikacje', ' - ', ' - ', 'Brak dodatkowych informacji', NULL),
(11, 'Jan', 'OlszaÅ„ski', 'janek.olszanski@gmail.com', '+48 111 111 111', 'Cisco', 'Rok', 'Tydzien', 'JESTEM JANEM', NULL),
(12, 'Jan', 'OlszaÅ„ski', 'janek.olszanski@gmail.com', '+48 111 111 111', 'Cisco', 'Dwa lata', 'Tydzien', 'HEHEHHE', NULL),
(13, 'Janek', 'OlszaÅ„ski', 'janek.olszanski@gmail.com', '+48 111 111 111', 'Aplikacje', ' - ', ' - ', 'HURR DURR', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groups`
--

CREATE TABLE `groups` (
  `idg` int(11) NOT NULL,
  `group_name` text NOT NULL,
  `module` text NOT NULL,
  `years` int(11) DEFAULT NULL,
  `days` text,
  `students` int(11) NOT NULL,
  `max_students` int(11) NOT NULL DEFAULT '15',
  `active` tinyint(1) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `additional` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `groups`
--

INSERT INTO `groups` (`idg`, `group_name`, `module`, `years`, `days`, `students`, `max_students`, `active`, `start`, `end`, `additional`) VALUES
(4, 'WWW_1', 'www', NULL, NULL, 1, 15, 11, '2016-09-08', '2016-09-08', 'AJ CYKA BLAĆ'),
(5, 'WWW_2', 'www', 0, '', 1, 10, 0, '2016-09-21', '0000-00-00', ''),
(6, 'CISCO_1', 'cisco', 1, 'Tydzień', 0, 3, 0, '2016-09-21', '0000-00-00', ''),
(7, 'CISCO_5', 'cisco', 1, 'Tydzień', 0, 3, 0, '2016-09-21', '0000-00-00', ''),
(8, 'CISCO_7', 'cisco', 2, 'Tydzień', 0, 20, 0, '2016-11-01', '2016-10-15', 'XD');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `left_menu`
--

CREATE TABLE `left_menu` (
  `idlm` int(11) NOT NULL,
  `display_string` text NOT NULL,
  `page_scheme` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `left_menu`
--

INSERT INTO `left_menu` (`idlm`, `display_string`, `page_scheme`) VALUES
(1, 'Aplikacje uczniów', 'applications'),
(2, 'Grupy', 'groups'),
(3, 'Testowanie', 'testing'),
(4, 'Płatności', 'payments');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `brief` text NOT NULL,
  `date` date NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`id`, `title`, `brief`, `date`, `content`) VALUES
(1, 'Wystartowała nowa strona gliwickiego LAI', 'W dniu dzisiejszym wystartowała nowa strona gliwickiego LAI.', '2016-06-01', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'jakub.w.siedlecki@gmail.com'),
(2, 'janek.janek@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payments`
--

CREATE TABLE `payments` (
  `idpay` int(11) NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `payment_for` text CHARACTER SET utf8 NOT NULL,
  `payer` text CHARACTER SET utf8 NOT NULL,
  `payment_date` date NOT NULL,
  `additional` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `payments`
--

INSERT INTO `payments` (`idpay`, `amount`, `payment_for`, `payer`, `payment_date`, `additional`) VALUES
(6, '300.00', 'CISCO_42_2', 'Jakub Siedlecki', '2016-12-30', 'xD'),
(13, '300.00', 'CISCO_1', 'Jakub Siedlecki', '2016-12-31', '2015'),
(14, '500.00', 'CISCO_2', 'Jan Olszański', '2016-10-31', '156123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `students`
--

CREATE TABLE `students` (
  `ids` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `surname` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `phone` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `cisco` int(11) DEFAULT NULL,
  `www` int(11) DEFAULT NULL,
  `cisco_group` int(11) DEFAULT NULL,
  `www_group` int(11) DEFAULT NULL,
  `activity` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `students`
--

INSERT INTO `students` (`ids`, `name`, `surname`, `email`, `phone`, `cisco`, `www`, `cisco_group`, `www_group`, `activity`) VALUES
(1, 'Jakub', 'Siedlecki', 'jakub.w.siedlecki@gmail.com', '+48 535 205 100', 0, 50, 1, 1, 1),
(2, 'Jan', 'Olszański', 'kij242@gmail.com', '+48 111 111 111', 4, NULL, 2, NULL, 1),
(3, 'Marek', 'Łamasz', 'marek.lamasz@gmail.com', '+48 111 111 111', NULL, 0, NULL, 4, 1),
(4, 'sdfs', 'sdfsdf', 'sdfsdf', 'sdfsd', 1, 1, 1, 1, 1),
(9, 'wqe', 'qwe', 'qwe', 'swqda', NULL, NULL, 1, NULL, 0),
(10, 'aaa', 'qwe', 'qwe', 'swqda', NULL, NULL, 1, NULL, 0),
(11, 'aaa', 'vvv', 'aaa@vvv', '545250101', NULL, NULL, 1, NULL, 1),
(15, 'Kuba', 'Siedlecki', 'kuba.quba@gmail.com', '535205100', NULL, 1, NULL, 4, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `idu` int(11) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `login` text NOT NULL,
  `email` text NOT NULL,
  `password` longtext NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `display_lm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`idu`, `display_name`, `login`, `email`, `password`, `last_login`, `display_lm`) VALUES
(1, 'Jakub Siedlecki', 'admin', 'admin@admin', '$2a$04$r8EpkA8XczU9h2BbBoX.wOS57KMIZ5XSz1nbFKuTScsykcqwPZaxu', '2016-07-08 00:00:00', 1),
(2, 'Test Testowski', 'lai', 'test@test.com', '$2a$04$2QlXa/TvDE4rOHUQVcFNS.FUoQNZJujuQCDjGPDJsHMnAYrQ3Qi8O', '2016-07-09 00:00:00', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`idg`);

--
-- Indexes for table `left_menu`
--
ALTER TABLE `left_menu`
  ADD PRIMARY KEY (`idlm`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`idpay`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
  MODIFY `idg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT dla tabeli `left_menu`
--
ALTER TABLE `left_menu`
  MODIFY `idlm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `payments`
--
ALTER TABLE `payments`
  MODIFY `idpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT dla tabeli `students`
--
ALTER TABLE `students`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
