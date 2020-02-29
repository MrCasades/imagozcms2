-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 07 2019 г., 08:44
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

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `authorname`, `email`, `password`, `www`, `regdate`) VALUES
(1, 'Casades', 'casades@list.ru', '59ea5f292351bb83eadefc15e753ec45', 'imagoz.ru', '0000-00-00 00:00:00'),
(2, 'Марио Пьюзо', 'n.kot60@mail.ru', '44101487f93e77a53ed6785f441a769b', '', '2018-10-19 00:02:33'),
(3, 'JinGr', 'jg@mm', 'db30ba16350bb3423e68d298f5a98962', 'mysite.ru', '2018-10-19 00:03:02'),
(4, 'JinGr1', 'jg@mm1', 'ee1e2c348d9574c6ab1aa0bd518c9630', '12', '2018-10-23 22:44:57'),
(7, 'GoobBoy', '156789@jl', 'eb2abe061b4b618eed1ac9de4aabdde1', '123', '2018-11-26 23:08:42'),
(10, 'Liss', '156@jkl', 'eb2abe061b4b618eed1ac9de4aabdde1', '', '2018-11-27 23:56:57'),
(11, 'ВапQ', 'qw@lip.ru', 'eb2abe061b4b618eed1ac9de4aabdde1', '123', '2018-12-02 14:26:26'),
(12, 'CollGyi121', 'hgf@ki', 'eb2abe061b4b618eed1ac9de4aabdde1', '', '2018-12-02 14:31:19'),
(13, 'CollGyi455', '125@hju', 'eb2abe061b4b618eed1ac9de4aabdde1', '221', '2018-12-02 14:41:06'),
(15, 'ghj', 'dfg@kjl', 'eb2abe061b4b618eed1ac9de4aabdde1', '', '2018-12-02 14:43:05'),
(16, '256', '56@jh', 'eb2abe061b4b618eed1ac9de4aabdde1', '123', '2018-12-02 14:44:54'),
(17, 'CollGyi445', '12555@ty', 'eb2abe061b4b618eed1ac9de4aabdde1', '', '2018-12-02 18:30:41'),
(18, 'CollGyi4554', '445@kjl', 'eb2abe061b4b618eed1ac9de4aabdde1', '', '2018-12-03 00:18:41'),
(19, 'Lissq', '123@123', 'eb2abe061b4b618eed1ac9de4aabdde1', '', '2018-12-03 00:45:41'),
(20, 'Max', 'max@list', 'eb2abe061b4b618eed1ac9de4aabdde1', '122', '2018-12-15 00:02:40'),
(21, 'Kat', '123@321', 'eb2abe061b4b618eed1ac9de4aabdde1', '', '2018-12-30 10:37:44'),
(22, 'lona', 'l@l', 'eb2abe061b4b618eed1ac9de4aabdde1', '', '2018-12-30 13:41:20'),
(23, 'kool', 'k@k', 'eb2abe061b4b618eed1ac9de4aabdde1', 're', '2018-12-30 13:42:39'),
(24, 'Qwerq', 'v@k12', 'eb2abe061b4b618eed1ac9de4aabdde1', 'hj', '2019-01-03 15:56:06');

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
(24, 'Автор');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `categoryname`) VALUES
(1, 'Электроника'),
(2, 'Мобильные телефоны'),
(3, 'Компьютерные игры'),
(4, 'Изображение дня'),
(6, 'Железо'),
(7, 'Микроконтроллеры!'),
(12, 'Разное'),
(14, 'Гаджеты'),
(16, 'Gadget');

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

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `comment`, `commentdate`, `idauthor`, `idpost`, `idnews`) VALUES
(5, '5454545', '2018-12-13 00:48:04', 1, 17, 0),
(7, '5454211222', '2018-12-13 23:37:53', 1, 17, 0),
(8, '36558', '2018-12-13 23:38:53', 1, 17, 0),
(9, '262625мып', '2018-12-13 23:41:49', 1, 7, 0),
(11, '787ttete', '2018-12-14 22:22:55', 1, 16, 0),
(12, '11111', '2018-12-14 22:36:02', 1, 17, 0),
(13, '4447', '2018-12-14 22:43:40', 1, 8, 0),
(14, '584845!dd', '2018-12-14 23:31:15', 1, 17, 0),
(15, 'It\'s 1 comment', '2018-12-14 23:32:16', 1, 9, 0),
(16, 'Ddgsrw', '2018-12-15 00:03:06', 20, 16, 0),
(17, 'yertrju', '2018-12-15 00:03:21', 20, 17, 0),
(18, '454548', '2018-12-15 00:06:45', 20, 6, 0),
(19, '54545', '2018-12-15 00:08:20', 20, 6, 0),
(20, '54545', '2018-12-15 00:08:27', 20, 6, 0),
(21, '5454554', '2018-12-15 00:09:35', 20, 17, 0),
(22, '5454554', '2018-12-15 00:10:53', 20, 17, 0),
(23, '145454', '2018-12-15 00:12:01', 20, 17, 0),
(24, '145454', '2018-12-15 00:12:48', 20, 17, 0),
(25, '565655', '2018-12-15 00:12:56', 20, 17, 0),
(26, '565655', '2018-12-15 00:19:31', 20, 17, 0),
(27, '565655', '2018-12-15 00:19:38', 20, 17, 0),
(28, 'ggjffjkfjk', '2018-12-15 00:19:53', 20, 16, 0),
(29, '54656555лдлд', '2018-12-15 00:25:59', 20, 17, 0),
(30, '54456рмппвав', '2018-12-15 00:26:06', 20, 17, 0),
(31, 'YES!!!', '2018-12-15 00:28:26', 1, 17, 0),
(33, '7845746', '2018-12-15 13:36:55', 1, 17, 0),
(34, 'ghdfghfgh\r\nhdfh\r\n\r\n\r\nhdhdf\r\nfhf\r\n454\r\n\r\n5454', '2018-12-15 23:55:37', 1, 16, 0),
(35, '_hdrhye_', '2018-12-15 23:56:00', 1, 16, 0),
(36, '__ey__', '2018-12-15 23:56:32', 1, 16, 0),
(37, '![Логотип Google][logo]', '2018-12-16 00:04:23', 1, 16, 0),
(38, '[Логотип Google][logo]', '2018-12-16 00:04:38', 1, 16, 0),
(39, '[Логотип Google][www.11.ru]', '2018-12-16 00:05:00', 1, 16, 0),
(40, '***Жирный курсив***', '2018-12-16 00:05:52', 1, 16, 0),
(41, '# Заголовок первого уровня', '2018-12-16 00:06:20', 1, 16, 0),
(42, '![альт картинки](http://static.diy.ru/media/uploaded/bn/2012/12/19/valyanie-iz-shersti-novogodnyaya-yolka-svoimi-rukami.jpg \"опциональный тайтл картинки\")', '2018-12-16 00:07:19', 1, 16, 0),
(43, '[название ссылки](http://diy.ru \"опциональный тайтл ссылки\")  ', '2018-12-16 00:08:34', 1, 17, 0),
(44, '[название ссылки](http://diy.ru)  ', '2018-12-16 00:12:42', 1, 17, 0),
(45, '![альт картинки](http://static.diy.ru/media/uploaded/bn/2012/12/19/valyanie-iz-shersti-novogodnyaya-yolka-svoimi-rukami.jpg)', '2018-12-16 00:15:34', 1, 11, 0),
(46, '**LoL** \r\n\r\nIt\'s *bad*', '2018-12-16 00:48:55', 1, 19, 0),
(47, '[![логотип](http://static.diy.ru/media/uploaded/bn/2012/12/19/valyanie-iz-shersti-novogodnyaya-yolka-svoimi-rukami.jpg)](http://static.diy.ru/media/uploaded/bn/2012/12/19/valyanie-iz-shersti-novogodnyaya-yolka-svoimi-rukami.jpg)', '2018-12-16 01:07:21', 1, 19, 0),
(54, 'Лулз!!!2233', '2018-12-20 00:01:43', 1, 39, 0),
(56, '*цепе!!ыпып*', '2018-12-20 00:08:58', 1, 39, 0),
(57, '__Йцй__', '2018-12-20 00:21:44', 1, 17, 0),
(58, '1 Komment', '2018-12-28 15:09:51', 1, 49, 0),
(59, 'Cool!!!!', '2018-12-31 08:49:21', 1, 18, 0),
(60, 'Gadgets', '2019-01-03 15:25:49', 1, 66, 0),
(61, 'My First Post!!!\r\n\r\n###First!!!', '2019-01-04 11:03:37', 23, 67, 0),
(63, 'Йцуке!!!', '2019-01-06 11:40:50', 1, 67, 0),
(64, 'Succ!!!!@121', '2019-01-06 18:33:26', 1, 63, 0),
(65, '^))))', '2019-01-06 19:11:08', 1, 1, 0),
(73, 'Qwerty', '2019-01-07 00:57:15', 1, 65, NULL),
(74, 'Qwerty!!!', '2019-01-07 00:57:31', 1, NULL, 1),
(75, '23445sds', '2019-01-07 00:57:51', 1, NULL, 1),
(76, 'Hier comment!', '2019-01-07 11:14:42', 1, NULL, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `meta`
--

CREATE TABLE `meta` (
  `id` int(11) NOT NULL,
  `metaname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `meta`
--

INSERT INTO `meta` (`id`, `metaname`) VALUES
(1, 'Об электронике'),
(3, 'Мобильные приложения'),
(4, 'IT-индустрия'),
(5, 'Action'),
(6, 'Mortal Combat'),
(7, 'Need For Speed'),
(8, 'BestGames'),
(9, 'Skyrim&Oblivion');

-- --------------------------------------------------------

--
-- Структура таблицы `metapost`
--

CREATE TABLE `metapost` (
  `idmeta` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `idnews` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `metapost`
--

INSERT INTO `metapost` (`idmeta`, `idpost`, `idnews`) VALUES
(1, 7, 0),
(1, 8, 0),
(1, 16, 0),
(1, 17, 0),
(1, 19, 0),
(1, 39, 0),
(1, 45, 0),
(1, 46, 0),
(1, 49, 0),
(1, 62, 0),
(1, 64, 0),
(1, 65, 0),
(1, 66, 0),
(1, 67, 0),
(3, 0, 2),
(3, 7, 0),
(3, 8, 0),
(3, 9, 0),
(3, 16, 0),
(3, 18, 0),
(3, 19, 0),
(3, 20, 0),
(3, 42, 0),
(3, 43, 0),
(3, 44, 0),
(3, 45, 0),
(3, 47, 0),
(3, 49, 0),
(3, 50, 0),
(3, 60, 0),
(3, 61, 0),
(3, 63, 0),
(3, 64, 0),
(4, 0, 2),
(4, 1, 0),
(4, 5, 0),
(4, 11, 0),
(4, 19, 0),
(4, 41, 0),
(4, 42, 0),
(4, 46, 0),
(4, 50, 0),
(4, 60, 0),
(4, 62, 0),
(4, 63, 0),
(4, 66, 0),
(5, 49, 0),
(5, 64, 0),
(5, 67, 0),
(6, 67, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `newsblock`
--

CREATE TABLE `newsblock` (
  `id` int(11) NOT NULL,
  `news` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `newstitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsdate` datetime NOT NULL,
  `viewcount` int(11) NOT NULL DEFAULT '0',
  `votecount` int(11) NOT NULL DEFAULT '0',
  `totalnumber` int(11) NOT NULL DEFAULT '0',
  `averagenumber` float NOT NULL DEFAULT '0',
  `idauthor` int(11) NOT NULL,
  `idcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `newsblock`
--

INSERT INTO `newsblock` (`id`, `news`, `newstitle`, `newsdate`, `viewcount`, `votecount`, `totalnumber`, `averagenumber`, `idauthor`, `idcategory`) VALUES
(1, 'Its My First News', 'First News', '0000-00-00 00:00:00', 53, 3, 13, 4.33333, 1, 2),
(2, 'My second news!!!', 'Second News', '2019-01-07 11:14:17', 27, 3, 13, 4.33333, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `posttitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postdate` datetime NOT NULL,
  `viewcount` int(11) NOT NULL DEFAULT '0',
  `votecount` int(11) NOT NULL DEFAULT '0',
  `totalnumber` int(11) NOT NULL DEFAULT '0',
  `averagenumber` float NOT NULL DEFAULT '0',
  `idauthor` int(11) NOT NULL,
  `idcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `post`, `posttitle`, `postdate`, `viewcount`, `votecount`, `totalnumber`, `averagenumber`, `idauthor`, `idcategory`) VALUES
(1, 'FirstPost!!! It\'s CooLLL!!!\r\n##Header', 'MyFirst11', '2018-10-27 00:38:29', 7, 1, 5, 5, 0, 1),
(5, 'LALALALALAL!!', '4Td Post!!!', '2018-10-27 14:04:30', 4, 1, 5, 5, 0, 2),
(6, 'GOOOOOOOOOOOOOD!!!', '4Td Post!!!ww', '2018-10-27 14:42:59', 1, 0, 0, 0, 0, 0),
(7, '!!!!!', '5TD POST', '2018-10-27 14:50:42', 9, 1, 2, 2, 1, 1),
(8, '6Td Post', '6Td', '2018-10-27 15:11:41', 0, 0, 0, 0, 1, 1),
(9, '7Td Post', '7Td', '2018-10-27 15:16:37', 1, 0, 0, 0, 0, 2),
(10, 'TTTTTTTTTTTTTTTTTTTTTTTTT', '8Td', '2018-10-27 15:33:16', 4, 1, 4, 4, 2, 1),
(11, 'RRRRRRRRRRRRRRR', '9Td', '2018-10-27 15:37:08', 8, 1, 4, 4, 4, 2),
(12, '15155515151', '10', '2018-10-27 15:48:00', 0, 0, 0, 0, 3, 2),
(13, 'FFFFFFFFFFFF', '11T', '2018-10-27 16:12:34', 1, 0, 0, 0, 4, 2),
(16, 'Cooool!!!Coool!!!', '9Td!!!', '2018-10-27 22:21:52', 8, 1, 3, 3, 2, 1),
(17, 'LOOOOOOOOOOOOOOOOOOOOOOOOONG\r\nfgrs etrwt 4w346w4 y3y63 y3y3y635 y5y35y6 \r\ngrgwrtr t346356gt gtwtwrt rt346345634rey \r\nerwrw4  w4t4wt4  t34wt24\r\n t4t4t24t t43t34 ty54754h 636 \r\n46346 563ghe\r\n', 'Long Post!!!', '2018-12-08 23:37:33', 20, 1, 4, 4, 0, 1),
(18, '*Post*\r\n\r\n##Post\r\n-Ped\r\n-Fat\r\n-Y', 'Erere', '2018-12-16 00:44:24', 13, 2, 8, 4, 0, 2),
(19, '###Post\r\n\r\n* rt\r\n* gh\r\n* fs\r\n\r\n**red**', 'Header!!!!', '2018-12-16 00:48:07', 15, 2, 8, 4, 0, 2),
(20, '![ForTest](http://localhost/imagozcms/111149.jpg)\r\n\r\nСостоялся анонс любопытного устройства от ZTE. Китайские инженеры создали гаджет, совмещающий функции лазерного проектора и «таблетки». Называется новинка Spro Plus.\r\n\r\nАппарат обеспечивает картинку диагональю 80 дюймов с разрешением 1366 на 768 пикселей. Оптимальное расстояние для работы — 2,4 метра. Яркость светового потока составляет 500 люмен.\r\nТакже девайс имеет микрофоны HARMAN и 2 динамика JBL (каждый мощностью 4 Вт). Заявлена поддержка голосовой связи. Неплохое решение для презентаций, конференций и прочих мероприятий.\r\n\r\n![ForTest](http://localhost/imagozcms/49402.jpg)\r\n\r\nЕсли говорить о планшетной части, в наличии 3 ГБ оперативной памяти, программная платформа Android 6.0 Marshmallow, Bluetooth 4.1 и 8,4-дюймовый дисплей (2560 на 1600 точек).\r\nВариант только с Wi-Fi b/g/n/ac оборудован 4-ядерным чипом Snapdragon 801 и встроенной графикой Adreno 330. Что касается версии с модемом LTE, она оборудована процессором Snapdragon 625 (с ускорителем Adreno 506).\r\n\r\nВместимость накопителя зависит от комплектации. На выбор модификации с 32 ГБ и 128 ГБ. Дополняют конфигурацию аккумуляторная батарея емкостью 12100 мАч и слот для карт microSD до 2 ТБ.\r\n\r\nВ открытой продаже Spro Plus появится грядущим летом. Цену ZTE объявит позже.\r\n', 'Планшет ZTE', '2018-12-16 21:44:11', 31, 2, 9, 4.5, 0, 1),
(39, 'rururu', 'yutrur', '2018-12-18 21:06:32', 12, 1, 3, 3, 0, 2),
(41, '1212', '121212', '2018-12-21 23:42:10', 12, 1, 4, 4, 0, 3),
(42, 'екнцу__346__\r\nеров', 'уекн', '2018-12-22 00:02:35', 5, 1, 3, 3, 0, 1),
(43, 'ререре', '56', '2018-12-22 00:50:45', 13, 2, 7, 4, 0, 3),
(44, 'Cool!!!', '!212', '2018-12-26 23:39:29', 13, 2, 9, 4.5, 0, 2),
(45, 'Qweee', 'AuthorIns', '2018-12-26 23:58:33', 17, 4, 13, 3.25, 1, 2),
(46, 'Йцукен', 'Йцуук', '2018-12-27 00:11:16', 26, 2, 5, 2.5, 1, 3),
(47, 'пцпцн', 'RETR', '2018-12-27 00:14:09', 16, 2, 7, 3.5, 1, 1),
(49, 'Xzx\r\n\r\ngfgd\r\nfdef\r\ngsg', 'FileTest!CoolDFDF', '2018-12-27 23:26:25', 123, 7, 34, 5, 1, 3),
(50, 'ЙААААААQwdwd\r\n\r\nАААААААА\r\n\r\n_ВАарпар_', 'Yt Моя Статья!!!', '2018-12-28 15:19:26', 128, 1, 3, 3, 20, 1),
(60, 'wtwt', 'wtwtw', '2019-01-03 00:41:49', 5, 1, 4, 4, 0, 2),
(61, 'theh', '24536', '2019-01-03 00:45:00', 1, 0, 0, 0, 0, 1),
(62, 'dhdh\r\njf\r\nhjf', 'rtey', '2019-01-03 00:54:17', 3, 0, 0, 0, 0, 0),
(63, 'BSBSF', 'GS', '2019-01-03 01:01:18', 10, 1, 4, 4, 0, 2),
(64, 'ergherfhj', 'turur', '2019-01-03 01:08:47', 9, 1, 3, 3, 1, 2),
(65, 'erye3y', '53y76e3y', '2019-01-03 01:09:41', 19, 2, 7, 3.5, 20, 3),
(66, 'jrjrfj@@34234', 'fjjf', '2019-01-03 01:13:49', 22, 2, 6, 3, 1, 1),
(67, 'Qwerty\r\n#Qwerty', 'Loool@@', '2019-01-04 11:02:54', 50, 2, 9, 4.5, 23, 3);

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
  `idauthor` int(11) NOT NULL,
  `idnews` int(11) NOT NULL,
  `vote` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `votedauthor`
--

INSERT INTO `votedauthor` (`idpost`, `idauthor`, `idnews`, `vote`) VALUES
(0, 1, 1, 5),
(0, 20, 2, 4),
(1, 1, 0, 5),
(5, 1, 0, 5),
(7, 1, 0, 2),
(10, 1, 0, 4),
(11, 20, 0, 4),
(16, 20, 0, 3),
(17, 1, 0, 4),
(18, 1, 0, 4),
(18, 20, 0, 4),
(19, 1, 0, 4),
(19, 20, 0, 4),
(20, 1, 0, 5),
(20, 20, 0, 4),
(39, 20, 0, 3),
(41, 1, 0, 4),
(42, 1, 0, 3),
(43, 1, 0, 5),
(43, 20, 0, 2),
(44, 1, 0, 5),
(44, 23, 0, 4),
(45, 1, 0, 5),
(45, 20, 0, 4),
(45, 22, 0, 3),
(45, 23, 0, 1),
(46, 1, 0, 3),
(46, 20, 0, 2),
(47, 1, 0, 4),
(47, 20, 0, 3),
(49, 1, 0, 5),
(49, 20, 0, 4),
(50, 1, 0, 0),
(50, 20, 0, 3),
(60, 1, 0, 4),
(63, 1, 0, 4),
(64, 1, 0, 3),
(65, 1, 0, 4),
(65, 20, 0, 3),
(66, 1, 0, 2),
(66, 20, 0, 4),
(67, 1, 0, 5),
(67, 23, 0, 4);

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
  ADD PRIMARY KEY (`idmeta`,`idpost`);

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
  ADD PRIMARY KEY (`idpost`,`idauthor`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT для таблицы `meta`
--
ALTER TABLE `meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `newsblock`
--
ALTER TABLE `newsblock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
