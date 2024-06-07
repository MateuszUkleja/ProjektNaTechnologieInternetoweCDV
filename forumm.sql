-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Cze 2024, 17:27
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `forumm`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `created_at`) VALUES
(1, 1, 1, 'dwadwad', '2024-06-06 15:51:40'),
(2, 1, 1, 'dwadawda', '2024-06-06 15:51:45'),
(3, 1, 1, 'dwadawda', '2024-06-06 15:52:31'),
(4, 1, 1, 'dwadawda', '2024-06-06 15:52:45'),
(5, 1, 1, 'dwadawda', '2024-06-06 15:55:32'),
(6, 1, 1, 'dwadawda', '2024-06-06 15:55:45'),
(7, 2, 1, 'aha', '2024-06-06 16:32:17'),
(8, 2, 1, 'aha', '2024-06-06 16:32:21'),
(9, 4, 1, '2131321', '2024-06-06 19:17:19'),
(10, 1, 1, '432', '2024-06-07 12:53:54'),
(11, 1, 1, '432', '2024-06-07 12:53:56'),
(12, 1, 1, '432', '2024-06-07 12:53:58'),
(13, 2, 1, 'super', '2024-06-07 14:16:54'),
(14, 2, 1, 'dwa', '2024-06-07 14:17:33'),
(15, 2, 1, 'dw', '2024-06-07 14:17:35'),
(16, 2, 1, 'dw', '2024-06-07 14:18:10'),
(17, 3, 1, '32131', '2024-06-07 14:18:32'),
(18, 5, 1, '', '2024-06-07 15:00:55'),
(19, 5, 1, '', '2024-06-07 15:01:25'),
(20, 5, 1, 'dwa', '2024-06-07 15:01:37'),
(21, 5, 1, 'dwa', '2024-06-07 15:01:55'),
(22, 5, 1, 'dwa', '2024-06-07 15:01:59'),
(23, 6, 1, 'ja mam takiego w spodniach ', '2024-06-07 15:08:21');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `category`, `user_id`, `created_at`) VALUES
(1, '123', '214214124', '', 1, '2024-06-06 15:36:16'),
(2, 'dwa', 'sad', '', 1, '2024-06-06 15:38:24'),
(3, 'łowisko', 'jakie łowisko polecasz?', '', 1, '2024-06-06 15:59:51'),
(4, 'sklepy z przynętami w Poznaniu', 'czy znacie jakieś fajne sklepy ?', '', 2, '2024-06-06 17:08:39'),
(5, 'Jakie łowisko na szczupaki', 'czy znacie jakieś łowisko w którym jest w chuj szczupaków? XD', '', 1, '2024-06-07 14:21:02'),
(6, 'Czy złapałeś już dojebanego okonia ?', 'okoń skurwysyn został złapany XD', '', 1, '2024-06-07 15:07:58');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'kasztan', '$2y$10$4GIcxz3tD41IwdZ5.Cr0qOLiiTLQZmv0b7Yn6qFik46Q3ACWWYVz6', 'ukleja1@gmail.com'),
(2, 'maciek', '$2y$10$uybF4UkPBjENbbxkAipiMuG1BwsakG8DRrcXpR.NiSD348NAxF0pW', 'maciek@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
