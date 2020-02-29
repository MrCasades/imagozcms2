-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 12 2019 г., 10:47
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
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `posttitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translittitle` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postdate` datetime NOT NULL,
  `viewcount` int(11) NOT NULL DEFAULT '0',
  `votecount` int(11) NOT NULL DEFAULT '0',
  `totalnumber` int(11) NOT NULL DEFAULT '0',
  `averagenumber` float NOT NULL DEFAULT '0',
  `imghead` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgalt` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idauthor` int(11) NOT NULL,
  `idcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `post`, `posttitle`, `translittitle`, `postdate`, `viewcount`, `votecount`, `totalnumber`, `averagenumber`, `imghead`, `imgalt`, `idauthor`, `idcategory`) VALUES
(1, 'FirstPost!!! It\'s CooLLL!!!\r\n##Header', 'MyFirst11', NULL, '2018-10-27 00:38:29', 10, 2, 9, 4.5, NULL, NULL, 0, 1),
(5, 'LALALALALAL!!', '4Td Post!!!', NULL, '2018-10-27 14:04:30', 4, 1, 5, 5, NULL, NULL, 0, 2),
(6, 'GOOOOOOOOOOOOOD!!!', '4Td Post!!!ww', NULL, '2018-10-27 14:42:59', 1, 0, 0, 0, NULL, NULL, 0, 0),
(7, '!!!!!', '5TD POST', '5TD_POST', '2018-10-27 14:50:42', 11, 1, 2, 2, '', 'qwerty', 1, 1),
(8, '6Td Post', '6Td', NULL, '2018-10-27 15:11:41', 1, 0, 0, 0, NULL, NULL, 1, 1),
(9, '7Td Post', '7Td', NULL, '2018-10-27 15:16:37', 1, 0, 0, 0, NULL, NULL, 0, 2),
(10, 'TTTTTTTTTTTTTTTTTTTTTTTTT', '8Td', NULL, '2018-10-27 15:33:16', 4, 1, 4, 4, NULL, NULL, 2, 1),
(11, 'RRRRRRRRRRRRRRR', '9Td', NULL, '2018-10-27 15:37:08', 12, 1, 4, 4, 'img-1547232925.jpg', NULL, 4, 2),
(12, '15155515151', '10', NULL, '2018-10-27 15:48:00', 1, 0, 0, 0, NULL, NULL, 3, 2),
(13, 'FFFFFFFFFFFF', '11T', NULL, '2018-10-27 16:12:34', 1, 0, 0, 0, NULL, NULL, 4, 2),
(16, 'Cooool!!!Coool!!!', '9Td!!!', NULL, '2018-10-27 22:21:52', 8, 1, 3, 3, NULL, NULL, 2, 1),
(17, 'LOOOOOOOOOOOOOOOOOOOOOOOOONG\r\nfgrs etrwt 4w346w4 y3y63 y3y3y635 y5y35y6 \r\ngrgwrtr t346356gt gtwtwrt rt346345634rey \r\nerwrw4  w4t4wt4  t34wt24\r\n t4t4t24t t43t34 ty54754h 636 \r\n46346 563ghe\r\n', 'Long Post!!!', NULL, '2018-12-08 23:37:33', 28, 1, 4, 4, NULL, NULL, 0, 1),
(18, '*Post*\r\n\r\n##Post\r\n-Ped\r\n-Fat\r\n-Y', 'Erere', NULL, '2018-12-16 00:44:24', 13, 2, 8, 4, NULL, NULL, 0, 2),
(19, '###Post\r\n\r\n* rt\r\n* gh\r\n* fs\r\n\r\n**red**', 'Header!!!!', NULL, '2018-12-16 00:48:07', 16, 2, 8, 4, NULL, NULL, 0, 2),
(20, '![ForTest](http://localhost/imagozcms/111149.jpg)\r\n\r\nСостоялся анонс любопытного устройства от ZTE. Китайские инженеры создали гаджет, совмещающий функции лазерного проектора и «таблетки». Называется новинка Spro Plus.\r\n\r\nАппарат обеспечивает картинку диагональю 80 дюймов с разрешением 1366 на 768 пикселей. Оптимальное расстояние для работы — 2,4 метра. Яркость светового потока составляет 500 люмен.\r\nТакже девайс имеет микрофоны HARMAN и 2 динамика JBL (каждый мощностью 4 Вт). Заявлена поддержка голосовой связи. Неплохое решение для презентаций, конференций и прочих мероприятий.\r\n\r\n![ForTest](http://localhost/imagozcms/49402.jpg)\r\n\r\nЕсли говорить о планшетной части, в наличии 3 ГБ оперативной памяти, программная платформа Android 6.0 Marshmallow, Bluetooth 4.1 и 8,4-дюймовый дисплей (2560 на 1600 точек).\r\nВариант только с Wi-Fi b/g/n/ac оборудован 4-ядерным чипом Snapdragon 801 и встроенной графикой Adreno 330. Что касается версии с модемом LTE, она оборудована процессором Snapdragon 625 (с ускорителем Adreno 506).\r\n\r\nВместимость накопителя зависит от комплектации. На выбор модификации с 32 ГБ и 128 ГБ. Дополняют конфигурацию аккумуляторная батарея емкостью 12100 мАч и слот для карт microSD до 2 ТБ.\r\n\r\nВ открытой продаже Spro Plus появится грядущим летом. Цену ZTE объявит позже.\r\n', 'Планшет ZTE', NULL, '2018-12-16 21:44:11', 31, 2, 9, 4.5, NULL, NULL, 0, 1),
(39, 'rururu', 'yutrur', NULL, '2018-12-18 21:06:32', 21, 2, 8, 4, 'img-1547217830.jpg', NULL, 0, 2),
(41, '1212', '121212', NULL, '2018-12-21 23:42:10', 13, 1, 4, 4, NULL, NULL, 0, 3),
(42, 'екнцу__346__\r\nеров', 'уекн', NULL, '2018-12-22 00:02:35', 5, 1, 3, 3, NULL, NULL, 0, 1),
(43, 'ререре', '56', NULL, '2018-12-22 00:50:45', 13, 2, 7, 4, NULL, NULL, 0, 3),
(44, 'Cool!!!', '!212', NULL, '2018-12-26 23:39:29', 14, 2, 9, 4.5, NULL, NULL, 0, 2),
(46, 'Йцукен', 'Йцуук', NULL, '2018-12-27 00:11:16', 31, 2, 5, 2.5, 'img-1547146861.jpg', NULL, 1, 3),
(47, 'пцпцн', 'RETR', NULL, '2018-12-27 00:14:09', 25, 3, 11, 3.66667, 'img-1547146848.jpg', NULL, 1, 1),
(60, 'wtwt', 'wtwtw', NULL, '2019-01-03 00:41:49', 13, 2, 7, 3.5, 'img-1547217812.jpg', NULL, 0, 2),
(66, 'ЕуыеАшду!!!№4', 'FileTest', NULL, '2019-01-10 00:35:41', 16, 1, 4, 4, 'img-1547146827.jpg', NULL, 1, 1),
(70, 'й2уеке', 'RETR', NULL, '2019-01-11 00:07:59', 8, 1, 4, 4, 'img-1547150879.jpg', NULL, 1, 12),
(71, 'srywrtyw', 'hyue', NULL, '2019-01-11 23:50:50', 4, 0, 0, 0, 'img-1547236250.jpg', NULL, 1, 1),
(72, 'rwerywy', 'rseheh', NULL, '2019-01-11 23:51:06', 1, 0, 0, 0, 'img-1547236266.jpg', NULL, 1, 0),
(73, 'eywey', 'ywywgh', NULL, '2019-01-11 23:51:25', 7, 2, 9, 4.5, 'img-1547236285.jpg', NULL, 1, 1),
(74, 'e5y3y', 'wtw2t', NULL, '2019-01-11 23:51:40', 3, 0, 0, 0, 'img-1547236300.jpg', NULL, 1, 1),
(75, 'ehw4y', 'e5hyesyq3a', NULL, '2019-01-11 23:52:08', 8, 1, 5, 5, 'img-1547236328.jpg', NULL, 1, 1),
(76, 'ryue46uw', 'xjsru', NULL, '2019-01-11 23:52:43', 10, 0, 0, 0, 'img-1547236363.jpg', NULL, 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idauthor` (`idauthor`),
  ADD KEY `idcategory` (`idcategory`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
