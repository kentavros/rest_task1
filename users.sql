-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 10 2017 г., 16:14
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `user6`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(6, 'sasha', '14e1b600b1fd579f47433b88e8d85291', 'e84f6802f25224fe2c1d15fb740d6e26'),
(7, 'Petia', '14e1b600b1fd579f47433b88e8d85291', 'firstHash'),
(8, 'fedia', '9db06bcff9248837f86d1a6bcf41c9e7', 'firstHash'),
(9, 'kostia', '9db06bcff9248837f86d1a6bcf41c9e7', 'firstHash'),
(12, 'dddddd', '14e1b600b1fd579f47433b88e8d85291', 'a793e21ef92e82bcdc7b0af03ebcf33c'),
(13, 'aaaaaa', '14e1b600b1fd579f47433b88e8d85291', 'firstHash'),
(17, 'aaaaa', '14e1b600b1fd579f47433b88e8d85291', 'firstHash'),
(20, 'qqqqqq', '2f7b52aacfbf6f44e13d27656ecb1f59', 'firstHash'),
(21, 'aaaa', 'ec6a6536ca304edf844d1d248a4f08dc', 'firstHash');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
