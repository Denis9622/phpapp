-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Фев 04 2025 г., 19:46
-- Версия сервера: 5.7.24
-- Версия PHP: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `text` text NOT NULL,
  `date` int(11) UNSIGNED NOT NULL,
  `avtor` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `intro`, `text`, `date`, `avtor`) VALUES
(1, 'lorem lorem lorem', 'loremloremlorem lorem lorem lorem', 'lorem lorem lorem lorem', 1738690550, 'Denys');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `mess` text CHARACTER SET utf8mb4 NOT NULL,
  `article_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `mess`, `article_id`) VALUES
(1, 'Denys', 'Architecto tota . Architecto tota', 1),
(2, 'Denys', 'Architecto tota . Architecto tota', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `login`, `pass`) VALUES
(1, 'Denys', 'Denys@gmail.com', 'Denys', '$2y$10$9ALe0R6N/hFR4T5oMa6g7OWDQEW774QZOw38aNX7MNWkWJQO34aKG'),
(2, 'Denys', 'Denys@gmail.com', 'Denys', 'b071faefe790e6a65bffd8838627849f'),
(3, 'Denys', 'Denys@gmail.com', 'Denys', 'b071faefe790e6a65bffd8838627849f');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
