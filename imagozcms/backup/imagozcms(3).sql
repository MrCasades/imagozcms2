-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 18 2019 г., 20:20
-- Версия сервера: 10.1.31-MariaDB
-- Версия PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `imagozcms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `authorname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `www` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `authorrole`
--

CREATE TABLE `authorrole` (
  `idauthor` int(11) NOT NULL,
  `idrole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authorrole`
--

INSERT INTO `authorrole` (`idauthor`, `idrole`) VALUES
(1, 'Администратор'),
(2, 'Редактор'),
(20, 'Автор'),
(23, 'Автор'),
(24, 'Автор'),
(28, 'Администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentdate` datetime NOT NULL,
  `idauthor` int(11) NOT NULL,
  `idpost` int(11) DEFAULT NULL,
  `idnews` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `meta`
--

CREATE TABLE `meta` (
  `id` int(11) NOT NULL,
  `metaname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `metapost`
--

CREATE TABLE `metapost` (
  `idmeta` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `idnews` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `newsblock`
--

CREATE TABLE `newsblock` (
  `id` int(11) NOT NULL,
  `news` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `newstitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translittitle` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newsdate` datetime NOT NULL,
  `viewcount` int(11) NOT NULL DEFAULT '0',
  `votecount` int(11) NOT NULL DEFAULT '0',
  `totalnumber` int(11) NOT NULL DEFAULT '0',
  `averagenumber` float NOT NULL DEFAULT '0',
  `imghead` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgalt` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idauthor` int(11) NOT NULL,
  `idcategory` int(11) NOT NULL,
  `premoderation` enum('NO','YES') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `posttitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translittitle` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postdate` datetime NOT NULL,
  `viewcount` int(11) NOT NULL DEFAULT '0',
  `votecount` int(11) NOT NULL DEFAULT '0',
  `totalnumber` int(11) NOT NULL DEFAULT '0',
  `averagenumber` float NOT NULL DEFAULT '0',
  `imghead` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgalt` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idauthor` int(11) NOT NULL,
  `idcategory` int(11) NOT NULL,
  `premoderation` enum('NO','YES') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` varchar(255) NOT NULL,
  `descr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `descr`) VALUES
('Автор', 'Написание и редактирование статей'),
('Администратор', 'Добавление, удаление и редактирование авторов'),
('Редактор', 'Редактирование статей');

-- --------------------------------------------------------

--
-- Структура таблицы `votedauthor`
--

CREATE TABLE `votedauthor` (
  `idpost` int(11) NOT NULL,
  `idnews` int(11) NOT NULL,
  `idauthor` int(11) NOT NULL,
  `vote` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `authorrole`
--
ALTER TABLE `authorrole`
  ADD PRIMARY KEY (`idauthor`,`idrole`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idauthor` (`idauthor`),
  ADD KEY `idpost` (`idpost`),
  ADD KEY `idnews` (`idnews`);

--
-- Индексы таблицы `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `metapost`
--
ALTER TABLE `metapost`
  ADD PRIMARY KEY (`idmeta`,`idpost`,`idnews`);

--
-- Индексы таблицы `newsblock`
--
ALTER TABLE `newsblock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idauthor` (`idauthor`),
  ADD KEY `idcategory` (`idcategory`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idauthor` (`idauthor`),
  ADD KEY `idcategory` (`idcategory`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `votedauthor`
--
ALTER TABLE `votedauthor`
  ADD PRIMARY KEY (`idpost`,`idnews`,`idauthor`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `meta`
--
ALTER TABLE `meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `newsblock`
--
ALTER TABLE `newsblock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idauthor`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`idpost`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
