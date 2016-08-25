-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Sie 2016, 16:39
-- Wersja serwera: 10.1.9-MariaDB
-- Wersja PHP: 5.6.15

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
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `module` text NOT NULL,
  `years` text,
  `days` text,
  `addInfo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `applications`
--

INSERT INTO `applications` (`id`, `name`, `surname`, `email`, `phone`, `module`, `years`, `days`, `addInfo`) VALUES
(1, 'test', 'testowski', 'test@testowski', '+48 111 222 333', 'cisco', 'dwalata', 'tygodzien', 'Brak dodatkowych informacji'),
(2, 'test', 'testowski', 'test@testowski', '+48 111 222 333', 'cisco', 'dwalata', 'tygodzien', 'Brak dodatkowych informacji'),
(3, 'test', 'testowski', 'test@testowski', '+48 111 222 333', 'cisco', 'dwalata', 'tygodzien', 'Brak dodatkowych informacji'),
(4, 'jakyb', 'jk', 'kuba@kuba', '+48 111 222 333', 'cisco', 'dwalata', 'tygodzien', 'Brak dodatkowych informacji'),
(5, 'jakyb', 'jk', 'kuba@kuba', '+48 111 222 333', 'aplikacje', ' - ', ' - ', 'Brak dodatkowych informacji');

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
(1, 'Aplikacje uczniów', 'applications');

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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `permissions_list`
--

CREATE TABLE `permissions_list` (
  `idperm` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 'Test Testowski', 'lai', 'test@test.com', '$2a$04$2QlXa/TvDE4rOHUQVcFNS.FUoQNZJujuQCDjGPDJsHMnAYrQ3Qi8O', '2016-07-09 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_permissions`
--

CREATE TABLE `users_permissions` (
  `iduperm` int(11) NOT NULL,
  `idperm` int(11) NOT NULL,
  `idu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions_list`
--
ALTER TABLE `permissions_list`
  ADD PRIMARY KEY (`idperm`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `left_menu`
--
ALTER TABLE `left_menu`
  MODIFY `idlm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `permissions_list`
--
ALTER TABLE `permissions_list`
  MODIFY `idperm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
