-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 12 Gru 2016, 17:45
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
(6, 'CISCO_1', 'cisco', 1, 'Tydzień', 1, 3, 0, '2016-09-21', '0000-00-00', ''),
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
(1, 'Wystartowała nowa strona gliwickiego LA', 'W dniu dzisiejszym wystartowała nowa strona gliwickiego LA.', '2016-06-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ornare maximus ligula nec efficitur. Sed pretium, dui vel bibendum ornare, erat lacus rutrum risus, in volutpat felis risus vel quam. Aliquam ullamcorper lorem vel dictum faucibus. Etiam nec pellentesque ante. Pellentesque odio erat, euismod eget vehicula quis, pulvinar sed dolor. Nam placerat ipsum dapibus elementum accumsan. Nunc non tincidunt nisi. Maecenas enim quam, vestibulum ut enim sed, viverra porttitor magna. Morbi vel dolor non purus accumsan pretium vitae quis dui. Suspendisse potenti. Nam varius consectetur ex. Donec volutpat nec nulla et consectetur.  Morbi leo augue, rhoncus ut scelerisque a, malesuada porta ipsum. Vestibulum scelerisque velit sed ex bibendum, quis lacinia augue ullamcorper. Sed imperdiet ornare ex in iaculis. Praesent at consectetur enim. In et tortor vel nisl venenatis tempus. Phasellus sollicitudin nunc nec scelerisque semper. Pellentesque feugiat lectus aliquet nisi efficitur molestie. Fusce id orci purus. In leo metus, dapibus a mauris quis, egestas venenatis turpis. Nulla sit amet rhoncus quam. Nulla et aliquam ante. Nunc vitae gravida metus.  Vivamus nunc odio, rhoncus lacinia mattis vel, faucibus id magna. Cras non rhoncus augue. Vestibulum bibendum blandit rhoncus. Nullam eget urna quam. Morbi sed tortor dignissim, sagittis ante vel, semper sapien. Mauris faucibus est ut est placerat eleifend. Nulla imperdiet ac risus eu suscipit. Mauris bibendum sed sem sit amet accumsan. Nunc facilisis non mi sed maximus. Aenean id aliquet odio. Pellentesque porttitor velit vitae semper efficitur. Nunc interdum congue metus ut gravida. Proin sed aliquet nunc. Ut gravida gravida tincidunt. Vestibulum scelerisque hendrerit magna, non volutpat est elementum a.  Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin neque ex, fermentum id pellentesque non, faucibus vel odio. Integer vestibulum lacus id justo rhoncus tempus. Aliquam luctus blandit lacinia. Mauris tellus magna, cursus a accumsan quis, fermentum at arcu. Maecenas tincidunt nunc eros, sit amet hendrerit erat venenatis nec. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas vel sollicitudin lorem. Vestibulum egestas erat a leo euismod rhoncus. In tellus elit, tempor vehicula sem at, rhoncus malesuada nulla. Vivamus gravida urna ac sapien cursus sodales. Morbi lacinia ornare ex, id blandit elit tincidunt et. Nam fringilla, lectus eu ornare facilisis, ante purus tempus mi, eget ullamcorper mauris eros eget urna. Curabitur eu malesuada quam. Donec dapibus pulvinar auctor. Nulla porttitor justo mauris, sit amet fermentum enim interdum sit amet.  Aliquam pulvinar sapien ut porta tempor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum feugiat nisi tempor tempus fermentum. Etiam posuere magna sed quam fermentum porta. Aenean consectetur nibh placerat dolor tincidunt, eu accumsan urna vehicula. Nam sed vulputate elit. Suspendisse tempus non lacus ut aliquet. Quisque blandit ante nec nibh sodales, a luctus erat convallis. Fusce accumsan posuere elit, vitae lobortis sem consectetur in. Curabitur fermentum congue interdum. Praesent eu eros vel sem semper posuere eget ac nunc. Pellentesque a volutpat eros.'),
(2, 'JP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur placerat ...', '2016-12-12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur placerat mi purus, at fringilla sapien luctus vitae. Fusce vel elit quis arcu mollis finibus. Aliquam erat volutpat. Suspendisse laoreet a enim vel volutpat. Nunc rutrum diam at libero venenatis venenatis. Aliquam quis libero vel dui iaculis pharetra et in mauris. Nam dignissim blandit imperdiet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis ut nibh dui. Ut id felis nunc. Vestibulum facilisis felis orci, quis iaculis nunc varius sed. Aliquam erat volutpat. Phasellus feugiat ex a purus vulputate sodales. Duis congue interdum mi, sit amet volutpat sapien iaculis et.\r\n\r\nPhasellus rhoncus scelerisque sagittis. Proin eleifend tempor tellus eu condimentum. Vivamus at tempor libero. Ut sed tempor metus. Proin semper accumsan eros, ut gravida enim dapibus non. Mauris sed pharetra nunc, vitae ornare nunc. Etiam id lorem finibus ex sagittis consectetur. Praesent elementum nibh non interdum scelerisque. Vestibulum quis diam lectus. Sed rutrum nisl non molestie congue. Nulla facilisi. Donec cursus ligula quis nisl scelerisque, vitae tristique elit molestie. Cras non tellus eu eros varius mollis. Pellentesque faucibus magna vel magna finibus, in commodo erat accumsan. Donec porttitor, quam gravida sodales volutpat, ex quam vulputate nisi, eget tempus nibh quam sit amet lectus. Donec dignissim hendrerit mollis.\r\n\r\nNunc porta ipsum quis turpis porttitor, ut pretium turpis ultrices. Ut finibus pretium ligula, vel accumsan est dignissim nec. Sed maximus ante iaculis sem pharetra facilisis. Donec accumsan iaculis magna, sed semper tellus viverra et. Aliquam vitae sollicitudin elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. In leo neque, pharetra non aliquam in, cursus ac nibh. Ut a enim vehicula, posuere justo in, suscipit nulla. Vestibulum vitae metus vel erat tincidunt euismod. Sed pellentesque, justo non ornare sagittis, magna neque rhoncus libero, ac tempor est risus nec nibh. Curabitur et tincidunt elit. Duis dictum, ante vitae scelerisque euismod, risus leo pellentesque nunc, at porttitor odio odio et elit. Nullam turpis dolor, dignissim id neque ut, ornare molestie tortor. Aenean eget nisi sem. Nullam ut libero in nunc laoreet feugiat.\r\n\r\nMaecenas auctor dolor vitae mauris fringilla dictum. Praesent sodales sed metus dictum eleifend. Suspendisse non tempus purus. Proin non viverra quam, vitae lobortis lorem. Nunc sed pulvinar libero. Praesent elementum feugiat aliquet. Praesent libero diam, laoreet vel urna ac, pharetra porta metus. Integer eu vehicula velit. Suspendisse consectetur ante ac mauris mattis, vel tempus lacus rutrum. Curabitur dictum placerat placerat. Maecenas mauris massa, mattis sit amet cursus sit amet, efficitur quis enim.\r\n\r\nUt tincidunt hendrerit dictum. Cras tortor mi, hendrerit iaculis pretium pellentesque, dictum ut diam. Nunc sit amet laoreet lectus. Ut sit amet rutrum tellus, ut scelerisque massa. Vestibulum faucibus suscipit iaculis. Sed vel nisi at metus congue fermentum. Curabitur dapibus facilisis erat at pharetra. Phasellus iaculis vulputate semper. Cras vestibulum, nisi non iaculis tristique, sem neque accumsan felis, vitae iaculis orci eros et lorem. Mauris eget dui orci. Nunc eros metus, finibus in libero sit amet, maximus fringilla leo. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\n');

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
(21, '500.00', 'CISCO_1', 1, 'Jakub Siedlecki', '2016-12-15', 'Jeden'),
(22, '400.00', 'CISCO_2', 2, 'Jan Olszański', '2016-12-09', 'DWA'),
(23, '500.00', 'WWW_4', 3, 'Marek Łamasz', '2016-12-20', 'TRZY'),
(24, '100.00', 'CISCO_1', 4, 'sdfs sdfsdf', '2016-12-31', 'CZTERY'),
(25, '1200.00', 'WWW_2', 15, 'Kuba Siedlecki', '2016-12-24', 'PIĘĆ'),
(26, '300.00', 'CISCO_1_1', 1, 'Jakub Siedlecki', '2016-12-09', NULL),
(27, '500.00', 'CISCO_1', 1, 'Jakub Siedlecki', '2016-12-11', '');

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
(2, 2, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0);

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
(1, 'LETS CHECK IT', 'HUE', '2016-11-09 00:00:00'),
(2, 'JPJP', 'HUE', '2016-11-09 16:32:33'),
(3, 'Poważny test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id leo lorem. Suspendisse volutpat erat et vehicula fermentum. Integer id est eget nibh pretium mollis in a justo. Maecenas consectetur lorem arcu, sed gravida nunc mollis et. Duis vulputate pretium blandit. Phasellus sit amet arcu gravida velit congue viverra. Nulla cursus erat nibh, et consectetur risus malesuada a. Sed pellentesque libero id ornare pulvinar. Mauris interdum lacus turpis, quis ultricies elit pulvinar a. Suspendisse pharetra risus metus, in tempus nibh lobortis sit amet.\r\n\r\nDonec fringilla vitae eros vitae vehicula. Donec ullamcorper iaculis massa. Vivamus at urna vel nisi semper bibendum. Nunc laoreet dignissim leo, pulvinar mollis massa. Cras in nunc feugiat, gravida augue eget, vestibulum massa. In hac habitasse platea dictumst. Phasellus at massa non sem efficitur molestie vel vitae lorem. Nulla lobortis ante nec quam euismod, ut hendrerit nulla malesuada. Fusce vel sem eros. Nulla dictum velit vitae erat molestie, vel maximus dui rhoncus. Nam efficitur molestie quam quis bibendum.', '2016-11-09 18:24:36');

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
(15, 'Kuba', 'Siedlecki', 'kuba.quba@gmail.com', '535205100', NULL, 1, NULL, 2, 1);

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
(1, 'Jakub Siedlecki', 'admin', 'admin@admin', '$2a$04$r8EpkA8XczU9h2BbBoX.wOS57KMIZ5XSz1nbFKuTScsykcqwPZaxu', '2016-12-12 10:11:47', 1),
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
  MODIFY `idlm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT dla tabeli `news`
--
ALTER TABLE `news`
  MODIFY `idn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `payments`
--
ALTER TABLE `payments`
  MODIFY `idpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT dla tabeli `permissions`
--
ALTER TABLE `permissions`
  MODIFY `idperm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `send_newsletters`
--
ALTER TABLE `send_newsletters`
  MODIFY `idsn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
