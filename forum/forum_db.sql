-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 23, 2025 at 11:29 AM
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
-- Database: `forum_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `created_at`) VALUES
(1, 'Premiera GTA VI', 'Rockstar Games potwierdziło premierę GTA VI na 2025 rok! Nowe miasto, nowi bohaterowie i ogromny świat.', 1, '2025-10-21 17:36:44'),
(2, 'Counter-Strike 2 - nowa era esportu', 'CS2 wprowadza nowy silnik Source 2 i lepszą fizykę granatów. Turnieje już zapowiedziane!', 2, '2025-09-03 14:42:11'),
(3, 'Recenzja Baldur’s Gate 3', 'Jedna z najlepszych gier RPG ostatnich lat. Wciągająca fabuła, świetne postacie i system walki.', 3, '2025-10-05 11:47:27'),
(4, 'PlayStation 6 - plotki i oczekiwania', '        Sony podobno pracuje nad nową konsolą z jeszcze większym naciskiem na AI i streaming gier.\r\n', 4, '2025-08-04 07:54:07'),
(5, 'Najlepsze gry indie 2025', 'Hollow Echoes” i „Starfield Memories” zdobyły serca graczy. Małe studia, wielkie pomysły!', 5, '2025-10-21 17:56:18');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Administrator', 'admin@local', '$2y$10$GhkhhOFVxEC6m0oMqCnr7eglBZHCZwyT1FL03OPCrNVmtAK8Fx1i6', 'admin'),
(2, 'gamer123', 'gamer123@login', '$2y$10$H3NeH8/5950MnifYDY0l8e7ANVNhD6cWl789PuNNg7SzeT6kevCQu', 'user'),
(3, 'RPGfan', 'rpgfan@fan', 'rpgfan123', 'user'),
(4, 'graczpro', 'grczpro@local', '$2y$10$DHUeKXuW.rzuu1VNKAN.CuFK86F7mCxOchYSyNXfwQCIwakhG2pVy', 'user'),
(5, 'Hunter_', 'hunter@muil', '$2y$10$fICeN8Z38h3dIj1fSbj5xuM9yk.hfdblSDJRM8LLZ5LmLmr7HcK6S', 'user');

--
-- Indeksy dla zrzutów tabel
--

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
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
