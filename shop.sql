-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 03 2020 г., 12:54
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `product_code`, `quantity`, `sale_id`) VALUES
(13, 'PD1003', 1, 1),
(14, 'PD1002', 1, 1),
(15, 'PD1001', 1, 2),
(16, 'PD1003', 2, 2),
(17, 'PD1002', 1, 3),
(18, 'PD1003', 1, 3),
(19, 'PD1002', 1, 4),
(20, 'PD1003', 1, 4),
(21, 'PD1001', 1, 5),
(22, 'PD1003', 1, 5),
(23, 'PD1007', 1, 6),
(24, 'PD1007', 10, 7),
(25, 'PD1007', 1, 8),
(26, 'PD1007', 1, 9),
(27, 'PD1007', 1, 10),
(28, 'PD1009', 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `price`) VALUES
(7, 'PD1007', 'Noutbuk ', 'Noutbuk Asus ZenBook UX433FAC / Intel I5-1021U / DDR4 8GB / SSD 512GB / 14&quot; FHD LED / Intel UHD Graphics / No DVD / ENG-RUS (Blue, Grey)', 'Screenshot_1.png', '700000.00'),
(8, 'PD1008', 'Canon Skaner ', 'Skaner Canon CanoScan LiDE 300', 'canon.png', '1200000.00'),
(9, 'PD1009', 'Xiaomi Redmi 8A', 'Smartfon Xiaomi Redmi 8A 2/32GB Black (Global Version)', 'phone.png', '1300000.00');

-- --------------------------------------------------------

--
-- Структура таблицы `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_price` float NOT NULL,
  `order_date` date NOT NULL,
  `order_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `sales`
--

INSERT INTO `sales` (`id`, `total_price`, `order_date`, `order_by`, `status`) VALUES
(10, 2000000, '2020-05-02', 4, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `phone`, `address`, `password`, `created`) VALUES
(4, 'Islam', 'islam@gmail.com', '998931234567', 'Nukus', 'e10adc3949ba59abbe56e057f20f883e', '2020-05-02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
