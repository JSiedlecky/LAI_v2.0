-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Gru 2016, 00:32
-- Wersja serwera: 10.1.13-MariaDB
-- Wersja PHP: 7.0.6

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
(1, 'Jakub', 'Siedlecki', 'kuba.quba@gmail.com', '+48 535 205 100', 'Cisco', 'Rok', 'Tydzien', 'Brak dodatkowych informacji', NULL),
(4, 'Jan', 'Olszański', 'jan@jan', '+48 535 205 100', 'Aplikacje', ' - ', ' - ', 'Brak dodatkowych informacji', NULL),
(5, 'adasd', 'dasaa', 'a@asd', '+48 535 205 100', 'Cisco', 'Dwa lata', 'Tydzien', 'Brak dodatkowych informacji', NULL);

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
(4, 'Płatności', 'payments'),
(5, 'Newsletter', 'newsletter'),
(6, 'Użytkownicy', 'users'),
(7, 'Uczniowie', 'students'),
(8, 'Aktualności', 'news');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `idn` int(11) NOT NULL,
  `title` text NOT NULL,
  `brief` text NOT NULL,
  `date` date NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`idn`, `title`, `brief`, `date`, `content`) VALUES
(1, 'Wystartowała nowa strona gliwickiego LAI', 'Tak jak w tytule. Pare słów więcej żeby sprawdzić ucinanie ...', '2016-12-12', 'Tak jak w tytule. Pare słów więcej żeby sprawdzić ucinanie znaków, to znaczy słów.');

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
(1, 'kuba.quba@gmail.com'),
(2, 'kij242@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payments`
--

CREATE TABLE `payments` (
  `idpay` int(11) NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `payment_for` text CHARACTER SET utf8 NOT NULL,
  `idpayer` int(11) NOT NULL,
  `payer` text CHARACTER SET utf8 NOT NULL,
  `payment_date` date NOT NULL,
  `additional` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `payments`
--

INSERT INTO `payments` (`idpay`, `amount`, `payment_for`, `idpayer`, `payer`, `payment_date`, `additional`) VALUES
(1, '100.00', 'CISCO_0', 1, 'Jakub Siedlecki', '2016-12-15', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `permissions`
--

CREATE TABLE `permissions` (
  `idperm` int(11) NOT NULL,
  `idu` int(11) NOT NULL,
  `isGm` int(11) NOT NULL,
  `applications` int(11) NOT NULL,
  `groups` int(11) NOT NULL,
  `payments` int(11) NOT NULL,
  `newsletter` int(11) NOT NULL,
  `users` int(11) NOT NULL,
  `students` int(11) NOT NULL,
  `news` int(11) NOT NULL,
  `app_add` int(11) NOT NULL,
  `app_delete` int(11) NOT NULL,
  `app_sort` int(11) NOT NULL,
  `app_action` int(11) NOT NULL,
  `group_add` int(11) NOT NULL,
  `group_modify` int(11) NOT NULL,
  `group_delete` int(11) NOT NULL,
  `group_sort` int(11) NOT NULL,
  `pay_add` int(11) NOT NULL,
  `pay_modify` int(11) NOT NULL,
  `pay_delete` int(11) NOT NULL,
  `nl_old` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `permissions`
--

INSERT INTO `permissions` (`idperm`, `idu`, `isGm`, `applications`, `groups`, `payments`, `newsletter`, `users`, `students`, `news`, `app_add`, `app_delete`, `app_sort`, `app_action`, `group_add`, `group_modify`, `group_delete`, `group_sort`, `pay_add`, `pay_modify`, `pay_delete`, `nl_old`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(14, 14, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quotes`
--

CREATE TABLE `quotes` (
  `idq` int(11) NOT NULL,
  `quote` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `quotes`
--

INSERT INTO `quotes` (`idq`, `quote`) VALUES
(1, '– To wódka? – słabym głosem zapytała Małgorzata.(...)\r\n– Na litość boską, królowo – zachrypiał – czy ośmieliłbym się nalać damie wódki? To czysty spirytus.'),
(2, 'Dopóki nie skorzystałem z Internetu, nie wiedziałem, że na świecie jest tylu idiotów'),
(3, 'Jeśli nie masz wyjścia... Zrób je!'),
(4, 'Teraz prędko zanim dotrze do nas, że to bez sensu'),
(5, 'Jeśli nie powinniśmy podjadać w nocy - to ja się pytam po co jest światełko w lodówce?'),
(6, 'W walce między sercem a mózgiem zwycięża w końcu żołądek. http://cytatybaza.pl/autorzy/stanislaw-jerzy-lec.html?cid=101'),
(7, 'ZUS z pewnością jest instytucją przestępczą, ale nie można nazwać jej zorganizowaną. ');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `send_newsletters`
--

CREATE TABLE `send_newsletters` (
  `idsn` int(11) NOT NULL,
  `subject` text CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `send_newsletters`
--

INSERT INTO `send_newsletters` (`idsn`, `subject`, `content`, `date`) VALUES
(1, 'SUPER NOWY NEWSLETTER', 'LOREM IPSUM DOLOR.', '2016-12-12 19:16:52'),
(2, 'SUPER NOWY NEWSLETTER', 'SUPI', '2016-12-12 23:07:53');

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
(1, 'Jakub', 'Siedlecki', 'kuba.quba@gmail.com', '+48 535 205 100', 0, 0, 0, 0, 1),
(2, 'Jan', 'Olszański', 'jan@jan', '+48 535 205 100', 0, 0, 0, 0, 1);

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
(1, 'Jakub Siedlecki', 'admin', 'admin@admin', '$2a$04$r8EpkA8XczU9h2BbBoX.wOS57KMIZ5XSz1nbFKuTScsykcqwPZaxu', '2016-12-12 23:37:35', 1),
(14, 'Jan Olszewski', 'admin1', 'admin@admin', '$2y$11$uYl2A4EbBzp9rZhL6pP8cecKv//freYbnbGiUIVe/kZOJCPXty2QW', '2016-12-12 23:35:16', 0);

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
  ADD PRIMARY KEY (`idn`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`idperm`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`idq`);

--
-- Indexes for table `send_newsletters`
--
ALTER TABLE `send_newsletters`
  ADD PRIMARY KEY (`idsn`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
  MODIFY `idg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `left_menu`
--
ALTER TABLE `left_menu`
  MODIFY `idlm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT dla tabeli `news`
--
ALTER TABLE `news`
  MODIFY `idn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `payments`
--
ALTER TABLE `payments`
  MODIFY `idpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `permissions`
--
ALTER TABLE `permissions`
  MODIFY `idperm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT dla tabeli `quotes`
--
ALTER TABLE `quotes`
  MODIFY `idq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT dla tabeli `send_newsletters`
--
ALTER TABLE `send_newsletters`
  MODIFY `idsn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `students`
--
ALTER TABLE `students`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
