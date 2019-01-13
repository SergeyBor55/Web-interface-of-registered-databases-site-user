-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 13 2019 г., 17:45
-- Версия сервера: 5.6.38
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `User`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `name`, `surname`, `gender`, `date`, `login`, `password`, `role`) VALUES
(11, 'Jeck', 'Buffun', '1', '1999-07-10', 'Jeck1999', '$2y$10$QcGCkdsliNWeuZE1CKaZ2u4Rr/fh9fvMl5dF7yW.580KFzrwKWOiK', 'admin'),
(12, 'Julia', 'Roberts', '0', '1985-05-21', 'roberts.j.', '$2y$10$uUkLF4/9qe/sPDhRiCVIiOqKmNdF6ZmqZ2ZN4vdV3r9p33XvjAhIe', NULL),
(26, 'Julia', 'Bibicova', '0', '1992-01-01', 'bibic92', '$2y$10$WuXkv/KmB.QaKZFn5ie4secDQnXYwiLxt1USlqXQk9vsuZKxM5WjO', NULL),
(27, 'Bred', 'Pitt', '1', '1979-11-22', 'pit79', '$2y$10$cFzR3jnGjF4J/x/DLKik7eRq0rjJzKYOs/q30DKtN/rnzjUqq4gyO', NULL),
(28, 'Ridly', 'Scoth', '1', '1988-12-23', 'skoth88', '$2y$10$B7M.FoLWt0d38a4/fI51YONwbtWkZZVIin38Tkit0yeJsnd.WsmZa', NULL),
(29, 'Jim', 'Carleone', '1', '1970-09-12', 'boss)', '$2y$10$YQVp4cYFzPmqCBtBUnLHiOGLUA5EwVtxTT5li1kZaxaKIUH042jZe', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
