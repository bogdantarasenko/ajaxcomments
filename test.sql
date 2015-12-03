-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 03 2015 г., 08:27
-- Версия сервера: 5.5.45
-- Версия PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `imgpath` text NOT NULL,
  `comment` text NOT NULL,
  `datetime` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `email`, `fio`, `telephone`, `imgpath`, `comment`, `datetime`) VALUES
(29, 'apogel@yandex.ru', 'tarasenko bogdan viktorovich', 2147483647, '5.jpg', 'lorem ipsum', 1449087945),
(30, 'apogel41@yandex.ru', 'Vasya Pupkin Pupkinovich', 32424224, '0', 'some test text', 1449088828),
(31, 'apoge324l@yandex.ua', 'larar croft', 23423, '0', 'asdaadasdaa', 1449088900),
(32, 'age324l@yandex.ua', 'asda dfdf', 2342345, '0', 'asdaadasdaa sdffs sdfsdfs sdfsf', 1449089065),
(33, 'age324l@yandex.ua', 'asda dfdf', 2342345, '0', 'asdaadasdaa sdffs sdfsdfs sdfsf', 1449089575),
(40, ' ', ' ', 0, '0', ' ', 1449090382),
(41, 'apogel@yandex.ru', 'sdf', 1343252, '0', 'adadsd a da  asd a a das dasd', 1449090563);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
