-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 02:52 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bansach`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `idBook` int(11) NOT NULL,
  `nameBook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageBook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titleBook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptionBook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priceBook` int(11) DEFAULT NULL,
  `idCategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`idBook`, `nameBook`, `imageBook`, `titleBook`, `descriptionBook`, `priceBook`, `idCategory`) VALUES
(1, 'Nghin le mot dem', 'gmail.png', 'Nghin le mot dem', 'mot cuon tuyen thuyet kinh dien noi tieng the gioi', 2000, 1),
(2, 'tấm cám', 'CSS3.png', 'tấm cám', '<p>tấm cám</p>', 2000, 1),
(3, 'Công chúa ngủ trong rừng', 'logo.jpeg', 'công chúa ngủ trong rừng', '<p>công chúa ngủ trong rừng</p>', 2000, 1),
(4, 'Cô bé quàng khăn đỏ', 'betheme-animal-shelter-cacf461498b76b21e37c8a1c97c32a0229ec7a32c5338c92ac96d1e514e23cdb.jpg', 'cô bé quàng khăn đỏ', '<p>cô bé quàng khăn đỏ</p>', 2000, 1),
(5, 'lap  trinh c++', 'nodejs.png', 'lap trinh co ban ', '<p>lap trinh co ban&nbsp;</p>', 3000, 2),
(6, 'lap  trinh c++', 'img1.jpg', 'lap trinh co ban ', 'lap trinh co ban ', 3000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `idCategory` int(11) NOT NULL,
  `nameCategory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptionCategory` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`idCategory`, `nameCategory`, `descriptionCategory`) VALUES
(1, 'Tiểu thuyết', 'mô tả tiểu thuyết'),
(2, 'Khoa Học', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idCustomer` int(11) NOT NULL,
  `nameCustomer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatarCustomer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailCustomer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passwordCustomer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addressCustomer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneCustomer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idCustomer`, `nameCustomer`, `avatarCustomer`, `emailCustomer`, `passwordCustomer`, `addressCustomer`, `phoneCustomer`) VALUES
(1, 'le xuan loc', '', 'xuanloc120297@gmail.com', '123', 'hy', '972424'),
(2, 'lexuanloc', 'logo.jpeg', 'xuanloc120297@gmail.com', '202cb962ac59075b964b07152d234b70', 'hÃ  ná»™i, hÃ  ná»™i', '0192736464');

-- --------------------------------------------------------

--
-- Table structure for table `orderbooks`
--

CREATE TABLE `orderbooks` (
  `idOrder` int(11) NOT NULL,
  `idCustomer` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `time_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderbooks`
--

INSERT INTO `orderbooks` (`idOrder`, `idCustomer`, `total`, `time_order`, `day_order`) VALUES
(1, 1, 5000, '', ''),
(2, 1, 5000, '', ''),
(3, 1, 5000, '', ''),
(4, 1, 5000, '', ''),
(5, 1, 5000, '', ''),
(6, 1, 0, '', ''),
(7, 1, 0, '', ''),
(8, 1, 0, '', ''),
(9, 1, 0, '', ''),
(10, 1, 0, '', ''),
(11, 1, 0, '', ''),
(12, 1, 0, '', ''),
(13, 1, 0, '', ''),
(14, 1, 0, '', ''),
(15, 1, 0, '', ''),
(16, 1, 5000, '', ''),
(17, 1, 2000, '', ''),
(18, 1, 2000, ' 10:23:32', '25-04-2019'),
(19, 1, 0, ' 10:24:30', '25-04-2019'),
(20, 1, 0, ' 11:43:14', '25-04-2019'),
(21, 1, 0, ' 11:45:35', '25-04-2019'),
(22, 1, 0, ' 11:47:18', '25-04-2019'),
(23, 1, 0, ' 11:47:40', '25-04-2019'),
(24, 1, 0, ' 11:47:40', '25-04-2019'),
(25, 1, 0, ' 11:48:35', '25-04-2019'),
(26, 1, 0, ' 11:48:36', '25-04-2019'),
(27, 1, 0, ' 11:48:36', '25-04-2019'),
(28, 1, 0, ' 11:48:37', '25-04-2019'),
(29, 1, 0, ' 11:48:53', '25-04-2019'),
(30, 1, 2000, ' 15:11:43', '25-04-2019'),
(31, 1, 2000, ' 15:17:26', '25-04-2019'),
(32, 1, 2000, ' 15:26:17', '25-04-2019'),
(33, 1, 2000, ' 15:28:45', '25-04-2019'),
(34, 1, 2000, ' 15:29:55', '25-04-2019'),
(35, 1, 2000, ' 15:30:32', '25-04-2019'),
(36, 1, 2000, ' 15:30:34', '25-04-2019'),
(37, 1, 2000, ' 15:35:07', '25-04-2019'),
(38, 1, 2000, ' 15:35:10', '25-04-2019'),
(39, 1, 2000, ' 15:36:20', '25-04-2019'),
(40, 1, 4000, ' 15:41:16', '25-04-2019'),
(41, 1, 4000, ' 15:45:11', '25-04-2019'),
(42, 1, 4000, ' 15:45:55', '25-04-2019'),
(43, 1, 4000, ' 15:50:44', '25-04-2019'),
(44, 1, 4000, ' 15:52:27', '25-04-2019'),
(45, 1, 8000, ' 15:58:26', '25-04-2019'),
(46, 1, 8000, ' 16:04:49', '25-04-2019'),
(47, 1, 8000, ' 16:06:37', '25-04-2019'),
(48, 1, 4000, ' 16:08:52', '25-04-2019'),
(49, 1, 7000, ' 16:11:58', '25-04-2019'),
(50, 1, 7000, ' 16:14:32', '25-04-2019'),
(51, 1, 5000, ' 16:18:43', '25-04-2019'),
(52, 1, 5000, ' 16:29:39', '25-04-2019'),
(53, 1, 5000, ' 16:30:05', '25-04-2019'),
(54, 1, 5000, ' 16:30:32', '25-04-2019'),
(55, 1, 5000, ' 16:31:05', '25-04-2019'),
(56, 1, 2000, ' 22:50:59', '25-04-2019'),
(57, 1, 2000, ' 09:31:39', '26-04-2019'),
(58, 1, 4000, ' 10:48:31', '26-04-2019'),
(59, 1, 4000, ' 10:48:53', '26-04-2019'),
(60, 1, 4000, ' 10:49:54', '26-04-2019'),
(61, 1, 4000, ' 10:52:38', '26-04-2019'),
(62, 1, 2000, ' 21:45:13', '28-04-2019'),
(63, 1, 4000, ' 21:46:37', '28-04-2019'),
(64, 1, 4000, ' 21:53:53', '28-04-2019'),
(65, 1, 2000, ' 22:33:51,PM', '28-04-2019,PM'),
(66, 1, 2000, ' 22:34:17,PM', '28-04-2019,PM'),
(67, 1, 2000, ' 22:34:49,PM', '28-04-2019,PM'),
(68, 1, 2000, ' 22:34:57,PM', '28-04-2019,PM'),
(69, 1, 2000, ' 22:35:44 PM', '28-04-2019 PM'),
(70, 1, 2000, ' 22:36:08 PM', '28-04-2019 PM'),
(71, 1, 2000, ' 22:36:15 PM', '28-04-2019 PM'),
(72, 1, 4000, ' 22:36:32 PM', '28-04-2019 PM'),
(73, 1, 4000, ' 22:36:56', '28-04-2019'),
(74, 1, 4000, ' 22:37:21', '28-04-2019'),
(75, 1, 4000, ' 22:37:37 PM', '28-04-2019 PM'),
(76, 2, 6000, ' 22:52:16 PM', '28-04-2019');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `idOrderdetail` int(11) NOT NULL,
  `idOrder` int(11) DEFAULT NULL,
  `idBook` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`idOrderdetail`, `idOrder`, `idBook`, `amount`) VALUES
(1, 5, 1, 1),
(2, 6, 1, 1),
(3, 7, 1, 1),
(4, 8, 1, 1),
(5, 9, 1, 1),
(7, 16, 2, 1),
(8, 16, 6, 1),
(9, 17, 3, 1),
(10, 18, 3, 1),
(11, 30, 3, 1),
(12, 31, 3, 1),
(13, 32, 3, 1),
(14, 33, 3, 1),
(15, 34, 3, 1),
(16, 35, 3, 1),
(17, 36, 3, 1),
(18, 37, 3, 1),
(19, 38, 3, 1),
(20, 39, 3, 1),
(21, 40, 3, 1),
(22, 40, 4, 1),
(23, 41, 3, 1),
(24, 41, 4, 1),
(25, 42, 3, 1),
(26, 42, 4, 1),
(27, 43, 3, 1),
(28, 43, 4, 1),
(29, 44, 3, 1),
(30, 44, 4, 1),
(31, 45, 3, 1),
(32, 45, 4, 1),
(33, 46, 3, 1),
(34, 46, 4, 1),
(35, 47, 3, 1),
(36, 47, 4, 1),
(37, 48, 3, 1),
(38, 48, 4, 1),
(39, 49, 3, 1),
(40, 49, 4, 1),
(41, 49, 6, 1),
(42, 50, 3, 1),
(43, 50, 4, 1),
(44, 50, 6, 1),
(45, 51, 3, 1),
(46, 51, 6, 1),
(47, 52, 3, 1),
(48, 52, 6, 1),
(49, 53, 3, 1),
(50, 53, 6, 1),
(51, 54, 3, 1),
(52, 54, 6, 1),
(53, 55, 3, 1),
(54, 55, 6, 1),
(55, 56, 3, 1),
(56, 57, 3, 1),
(57, 58, 2, 1),
(58, 58, 3, 1),
(59, 59, 2, 1),
(60, 59, 3, 1),
(61, 60, 2, 1),
(62, 60, 3, 1),
(63, 61, 2, 1),
(64, 61, 3, 1),
(65, 62, 4, 1),
(66, 63, 4, 1),
(67, 63, 3, 1),
(68, 64, 4, 1),
(69, 64, 3, 1),
(70, 65, 3, 1),
(71, 66, 3, 1),
(72, 67, 3, 1),
(73, 68, 3, 1),
(74, 69, 3, 1),
(75, 70, 3, 1),
(76, 71, 3, 1),
(77, 72, 3, 2),
(78, 73, 3, 2),
(79, 74, 3, 2),
(80, 75, 3, 2),
(81, 76, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `nameUser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailUser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passwordUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressUser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneUser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `nameUser`, `emailUser`, `passwordUser`, `addressUser`, `phoneUser`) VALUES
(1, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'hung yen', '092944929');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`idBook`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCustomer`);

--
-- Indexes for table `orderbooks`
--
ALTER TABLE `orderbooks`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `idCustomer` (`idCustomer`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`idOrderdetail`),
  ADD KEY `idBook` (`idBook`),
  ADD KEY `idOrder` (`idOrder`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `idBook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idCustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderbooks`
--
ALTER TABLE `orderbooks`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `idOrderdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `categorys` (`idCategory`);

--
-- Constraints for table `orderbooks`
--
ALTER TABLE `orderbooks`
  ADD CONSTRAINT `orderbooks_ibfk_1` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`idBook`) REFERENCES `books` (`idBook`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`idOrder`) REFERENCES `orderbooks` (`idOrder`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
