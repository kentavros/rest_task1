-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 10 2017 г., 16:15
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
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `engine` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `max_speed` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `year`, `engine`, `color`, `max_speed`, `price`) VALUES
(1, 'vaz', '2108', 1987, 1300, 'chhery', 150, 1000),
(2, 'bmw', '525', 2000, 2500, 'black', 200, 3000),
(3, 'fiat', 'doblo', 2015, 1600, 'beige', 180, 10000),
(4, 'volvo', 'xc90', 2017, 2400, 'grey', 185, 16000),
(5, 'infiniti', 'q50', 2017, 3696, 'grey', 250, 30000),
(6, 'toyota', 'camry', 2017, 2500, 'blue', 200, 10000),
(7, 'skoda', 'fabia', 2017, 1600, 'green', 150, 5000),
(8, 'opel', 'vivara', 2016, 2500, 'white', 170, 13000),
(9, 'skoda', 'Octavia', 2016, 1900, 'gold', 220, 13000),
(10, 'subaru', 'impreza wrx', 2014, 2500, 'blue', 300, 15000),
(11, 'mitsubishi', 'lancer ', 2013, 1600, 'grey', 180, 10000),
(12, 'mitsubishi', 'lancer evolution', 2012, 3500, 'blue', 320, 17000),
(13, 'zaparojec', 'viva forever', 2015, 5500, 'yellow', 350, 60000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
