-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 17 2018 г., 21:31
-- Версия сервера: 5.5.60-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `homework54`
--

-- --------------------------------------------------------

--
-- Структура таблицы `table_homework`
--

CREATE TABLE IF NOT EXISTS `table_homework` (
  `id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `hometask` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `table_homework`
--

INSERT INTO `table_homework` (`id`, `timestamp`, `subject`, `hometask`) VALUES
(40, 1600041600, 'тут предмет', 'а тут домашка=)');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `table_homework`
--
ALTER TABLE `table_homework`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `table_homework`
--
ALTER TABLE `table_homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
