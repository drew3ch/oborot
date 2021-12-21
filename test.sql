-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 21 2021 г., 16:25
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `namelastname` varchar(300) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `datetime`, `namelastname`, `phone`, `comment`) VALUES
(6, '2021-12-21 16:21:51', 'Чернов Андрей', '89169958337', 'Комментарий\r\n'),
(7, '2021-12-21 16:22:11', 'Chernov Andrew', '89169958337', 'Comment'),
(8, '2021-12-21 16:23:33', 'asdasda asdsadad', '123123213123', '123'),
(9, '2021-12-21 16:24:42', 'asdasd sdsad', '123123123123', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
