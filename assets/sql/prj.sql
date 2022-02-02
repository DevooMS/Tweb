-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 01, 2022 alle 14:42
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prj`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `id` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `time` varchar(25) NOT NULL,
  `content` longtext NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `status` varchar(25) NOT NULL,
  `address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`id`, `email`, `time`, `content`, `total`, `status`, `address`) VALUES
('140361f92f9161dce', 'admin@gmail.com', ' 02-03-13 14:03:13', '[{\"item_name\":\"Cover samsung galaxy a12\",\"item_id\":\"R-064-B08CKHQP33\",\"item_quantity\":1,\"item_price\":\"4.99\"},{\"item_id\":\"S-012-B093LB3HF5\",\"item_name\":\"Vetro Temperato Teclast M40\",\"item_price\":\"5.99\",\"item_quantity\":1}]', '10.98', 'pending', '{\"email\":\"Admin@gmail.com\",\"firstname\":\"Ming\",\"lastname\":\"Su\",\"vat_number\":\"49897610\",\"address\":\"Via Roma 53\",\"city\":\"Turin\",\"country\":\"Italy\",\"confirm\":\"1\",\"type\":\"admin\"}'),
('140861f930b3364b9', 'user@gmail.com', ' 02-08-03 14:08:03', '[{\"item_name\":\"Cover samsung galaxy a12\",\"item_id\":\"R-064-B08CKHQP33\",\"item_quantity\":1,\"item_price\":\"4.99\"}]', '4.99', 'delivered', '{\"email\":\"User@gmail.com\",\"firstname\":\"Andrea\",\"lastname\":\"Peirone\",\"vat_number\":\"215876004\",\"address\":\"Via Roma 51\",\"city\":\"Savigliano\",\"country\":\"Italy\",\"confirm\":\"1\",\"type\":\"user\"}'),
('142561f934b88957d', 'alberto.chiera@gmail.com', ' 02-25-12 14:25:12', '[{\"item_name\":\"Xiaomi Redmi Note 10 5G \",\"item_id\":\"S-012-B093LBC9VZ\",\"item_quantity\":1,\"item_price\":\"499.00\"}]', '499.00', 'pending', '{\"email\":\"Alberto.chiera@gmail.com\",\"firstname\":\"alberto\",\"lastname\":\"chiera\",\"vat_number\":\"31231781\",\"address\":\"\",\"city\":\"\",\"country\":\"\",\"confirm\":\"0\",\"type\":\"user\"}');

-- --------------------------------------------------------

--
-- Struttura della tabella `product`
--

CREATE TABLE `product` (
  `namep` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `skuid` varchar(50) NOT NULL,
  `qty` int(255) NOT NULL,
  `cost` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `product`
--

INSERT INTO `product` (`namep`, `brand`, `skuid`, `qty`, `cost`) VALUES
('Cover samsung galaxy a12', 'Flaxy', 'R-064-B08CKHQP33', 6, '4.99'),
('Xiaomi Redmi Note 10 5G ', 'Xiaomi', 'S-012-B093LBC9VZ', 13, '499.00'),
('Samsung Galaxy Z Flip 3 5g', 'Samsung', 'R-064-B09KY3K3J7', 12, '899.56'),
('Vetro Temperato Teclast M40', 'Telcast', 'S-012-B093LB3HF5', 7, '5.99'),
('Iphone X', 'Apple', 'Z-015-B093FG3HF5', 16, '1099.00'),
('Macbook Pro 15 M1', 'Apple', 'U-023-ZZZ3LB3HF5', 19, '2999.00');

-- --------------------------------------------------------

--
-- Struttura della tabella `register`
--

CREATE TABLE `register` (
  `email` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `vat_number` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `utype` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `confirm` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `register`
--

INSERT INTO `register` (`email`, `firstname`, `lastname`, `vat_number`, `password`, `utype`, `address`, `city`, `country`, `confirm`) VALUES
('user@gmail.com', 'Andrea', 'Peirone', '215876004', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'user', 'Via Roma 51', 'Savigliano', 'Italy', 1),
('admin@gmail.com', 'Ming', 'Su', '49897610', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'admin', 'Via Roma 53', 'Turin', 'Italy', 1),
('luca@gmail.com', 'Luca', 'Mana', '13289321', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'user', '', '', '', 1),
('fede@gmail.com', 'Federico', 'Manzo', '13215123', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'user', '', '', '', 0),
('alberto.chiera@gmail.com', 'alberto', 'chiera', '31231781', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'user', '', '', '', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
