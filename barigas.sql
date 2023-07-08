-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 06:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barigas`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barangId` int(12) NOT NULL,
  `NamaBarang` varchar(255) NOT NULL,
  `hargaBarang` int(12) NOT NULL,
  `barangDesc` text NOT NULL,
  `barangKategoriId` int(12) NOT NULL,
  `barangPubDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barangId`, `NamaBarang`, `hargaBarang`, `barangDesc`, `barangKategoriId`, `barangPubDate`) VALUES
(1, 'Barbel', 85000, 'Barbel kuat dan ergonomis untuk latihan kekuatan. Didesain dengan pegangan yang nyaman dan aman. Tersedia berbagai bobot untuk intensitas latihan yang disesuaikan. Ideal untuk latihan di rumah atau pusat kebugaran. Tingkatkan kekuatan Anda dengan barbel ini.', 1, '2023-06-27 13:57:39'),
(2, 'Raket tenis', 1000000, 'Raket tenis', 1, '2023-06-30 19:54:04'),
(3, 'celana', 75000, 'celana', 2, '2023-06-30 19:54:04'),
(10, 'Vitamin C', 90000, 'Vitamin C', 3, '2023-06-30 20:46:17'),
(11, 'vitamin D', 100000, 'vitamin D', 3, '2023-06-30 20:47:18'),
(12, 'baju', 80000, 'baju', 2, '2023-06-30 20:55:38'),
(13, 'bola Basket', 900000, 'bola Basket', 1, '2023-07-01 00:02:24'),
(14, 'jaket', 150000, 'jaket', 2, '2023-07-01 01:29:23'),
(15, 'Suplemen asam amino', 120000, 'Suplemen asam amino', 3, '2023-07-01 01:31:57'),
(16, 'Yoga mat', 250000, 'Yoga mat', 1, '2023-07-01 01:57:31'),
(17, 'sepatu', 800000, 'sepatu', 2, '2023-07-01 02:00:12'),
(18, 'PROTEIN POWDER', 500000, 'PROTEIN POWDER', 3, '2023-07-01 02:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `deliveryName` varchar(35) NOT NULL,
  `deliveryPhone` bigint(25) NOT NULL,
  `deliveryTime` int(200) NOT NULL COMMENT 'Dalam Menit',
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `orderId`, `deliveryName`, `deliveryPhone`, `deliveryTime`, `dateTime`) VALUES
(3, 1, 'budi', 33333333333, 5, '2023-07-01 03:07:16'),
(5, 3, 'budi', 33333333333, 5, '2023-07-01 03:12:44'),
(6, 4, 'budi', 33333333333, 5, '2023-07-01 03:12:52'),
(7, 5, 'budi', 33333333333, 5, '2023-07-01 03:13:08'),
(8, 6, 'budi', 33333333333, 5, '2023-07-01 03:13:20'),
(9, 7, 'budi', 33333333333, 5, '2023-07-01 03:13:31'),
(10, 8, 'budi', 33333333333, 5, '2023-07-01 03:13:39'),
(11, 9, 'budi', 33333333333, 1, '2023-07-01 03:14:11'),
(12, 10, 'budi', 33333333333, 5, '2023-07-01 03:14:20'),
(13, 25, 'budi', 33333333333, 5, '2023-07-01 03:14:46'),
(14, 24, 'budi', 33333333333, 5, '2023-07-01 03:14:53'),
(15, 23, 'budi', 33333333333, 5, '2023-07-01 03:15:03'),
(16, 22, 'budi', 33333333333, 5, '2023-07-01 03:15:11'),
(17, 21, 'budi', 33333333333, 5, '2023-07-01 03:15:24'),
(18, 11, 'budi', 33333333333, 5, '2023-07-01 03:15:44'),
(19, 12, 'budi', 33333333333, 5, '2023-07-01 03:16:04'),
(20, 13, 'budi', 33333333333, 5, '2023-07-01 03:16:17'),
(21, 14, 'budi', 33333333333, 6, '2023-07-01 03:16:45'),
(22, 15, 'budi', 33333333333, 5, '2023-07-01 03:16:52'),
(23, 16, 'budi', 33333333333, 5, '2023-07-01 03:17:14'),
(24, 17, 'budi', 33333333333, 5, '2023-07-01 03:17:24'),
(25, 18, 'budi', 33333333333, 5, '2023-07-01 03:17:33'),
(26, 19, 'budi', 33333333333, 5, '2023-07-01 03:17:46'),
(27, 20, 'budi', 33333333333, 5, '2023-07-01 03:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategoriId` int(12) NOT NULL,
  `namaKategori` varchar(255) NOT NULL,
  `kategoriDesc` text NOT NULL,
  `kategoriCreateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategoriId`, `namaKategori`, `kategoriDesc`, `kategoriCreateDate`) VALUES
(1, 'Peralatan', 'berupa alat-alat olahraga', '2023-06-21 22:40:01'),
(2, 'Pakaian', 'Pakaian untuk mendukung kegiatan olahraga', '2023-06-21 22:42:59'),
(3, 'multi-vit', 'menyediakan vitamin dan suplemen', '2023-06-21 22:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `barangId` int(21) NOT NULL,
  `itemQuantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `orderId`, `barangId`, `itemQuantity`) VALUES
(1, 1, 1, 1),
(2, 1, 10, 1),
(3, 2, 1, 1),
(4, 3, 3, 1),
(5, 3, 12, 1),
(6, 3, 11, 1),
(7, 4, 1, 1),
(8, 4, 11, 1),
(9, 5, 1, 1),
(10, 5, 2, 1),
(11, 5, 10, 1),
(12, 5, 3, 1),
(13, 6, 10, 2),
(14, 6, 11, 1),
(15, 6, 1, 2),
(16, 6, 2, 1),
(17, 7, 3, 3),
(18, 7, 2, 1),
(19, 7, 1, 2),
(20, 8, 12, 1),
(21, 8, 3, 1),
(22, 8, 10, 1),
(23, 8, 11, 1),
(24, 9, 13, 1),
(25, 9, 10, 1),
(26, 10, 1, 1),
(27, 10, 11, 1),
(28, 10, 10, 1),
(29, 11, 3, 1),
(30, 11, 11, 1),
(31, 11, 1, 1),
(32, 12, 3, 1),
(33, 12, 12, 3),
(34, 13, 11, 1),
(35, 13, 10, 1),
(36, 14, 13, 1),
(37, 15, 1, 1),
(38, 15, 10, 1),
(39, 15, 11, 1),
(40, 16, 3, 1),
(41, 16, 1, 2),
(42, 17, 15, 1),
(43, 17, 14, 1),
(44, 17, 3, 1),
(45, 18, 15, 1),
(46, 18, 10, 1),
(47, 18, 14, 1),
(48, 19, 17, 1),
(49, 19, 10, 1),
(50, 19, 1, 1),
(51, 20, 16, 1),
(52, 20, 18, 1),
(53, 20, 14, 1),
(54, 21, 16, 1),
(55, 21, 18, 1),
(56, 22, 17, 1),
(57, 22, 14, 2),
(58, 23, 13, 1),
(59, 23, 14, 1),
(60, 23, 12, 2),
(61, 24, 16, 1),
(62, 24, 1, 1),
(63, 24, 10, 1),
(64, 24, 15, 1),
(65, 25, 18, 1),
(66, 25, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `address` varchar(255) NOT NULL,
  `kodePos` int(21) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `total` int(200) NOT NULL,
  `paymentMode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = cod\r\n1 = online',
  `orderStatus` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '0 = order place\r\n1 = order confirmed\r\n2 = preparing your order\r\n3 = order otw\r\n4 = order nyampe\r\n5 = order deny\r\n6 = order cancel',
  `orderDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `address`, `kodePos`, `phoneNo`, `total`, `paymentMode`, `orderStatus`, `orderDate`) VALUES
(1, 7, 'kaliuaran, sleman', 122132, 1111111111111, 175000, '0', '1', '2023-01-23 07:17:31'),
(2, 3, 'brebes, jakarta', 123456, 22222222222, 85000, '0', '6', '2023-01-24 12:25:56'),
(3, 43, 'kayangan, pekanbaru', 123456, 55555555555, 255000, '0', '1', '2023-01-24 16:43:50'),
(4, 43, 'kayangan, pekan baru', 123456, 55555555555, 185000, '0', '1', '2023-02-03 09:47:34'),
(5, 40, 'padang, padang', 123456, 0, 1250000, '0', '4', '2023-02-08 10:46:21'),
(6, 41, 'kenangan, mimpi indah', 123456, 33333333333, 1450000, '0', '1', '2023-02-15 15:19:41'),
(7, 44, 'jln perpisahan, meratapi', 123456, 66666666666, 1395000, '0', '1', '2023-02-23 23:53:50'),
(8, 45, 'jl.pertemuan, sleman', 122132, 777777777777, 345000, '0', '1', '2023-03-03 14:12:58'),
(9, 40, 'padang, padang', 123456, 0, 990000, '0', '1', '2023-03-07 18:04:20'),
(10, 44, 'jl perpisahan, meratapi', 123456, 66666666666, 275000, '0', '1', '2023-03-15 12:44:29'),
(11, 45, 'jl pertemuan, sleman', 123456, 777777777777, 260000, '0', '1', '2023-03-22 07:15:33'),
(12, 43, 'kayangan, pekan baru', 123456, 55555555555, 315000, '0', '1', '2023-03-30 16:13:46'),
(13, 42, 'jl perpisahan, sleman', 123456, 44444444444, 190000, '0', '1', '2023-04-06 07:33:31'),
(14, 3, 'brebes, jakarta', 123456, 22222222222, 900000, '0', '1', '2023-04-11 14:22:09'),
(15, 7, 'kaliurang, sleman', 123456, 111111111111, 275000, '0', '1', '2023-04-22 13:13:11'),
(16, 40, 'padang , padang', 123456, 0, 245000, '0', '1', '2023-04-26 18:26:51'),
(17, 41, 'aaaaa, bbbbb', 122132, 33333333333, 345000, '0', '1', '2023-05-04 08:41:22'),
(18, 45, 'jl.pertemuan, sleman', 122132, 777777777777, 360000, '0', '1', '2023-05-11 07:23:44'),
(19, 42, 'jln perpisahan, meratapi', 123456, 66666666666, 975000, '0', '1', '2023-05-18 19:35:26'),
(20, 43, 'kayangan, pekan baru', 123456, 55555555555, 900000, '0', '1', '2023-05-20 14:45:04'),
(21, 7, 'kaliuaran, sleman', 122132, 1111111111111, 750000, '0', '1', '2023-05-25 12:35:52'),
(22, 45, 'jl.pertemuan, sleman', 122132, 777777777777, 1100000, '0', '1', '2023-06-06 19:15:39'),
(23, 3, 'brebes, jakarta', 123456, 22222222222, 1210000, '0', '4', '2023-06-16 06:28:26'),
(24, 44, 'jln perpisahan, meratapi', 123456, 66666666666, 545000, '0', '4', '2023-06-20 16:30:12'),
(25, 40, 'padang, padang', 123456, 0, 590000, '0', '3', '2023-06-27 09:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(21) NOT NULL,
  `userName` varchar(21) NOT NULL,
  `firstName` varchar(21) NOT NULL,
  `lastName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `userType` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 = user\r\n1= admin\r\n2 = manager',
  `password` varchar(255) NOT NULL,
  `joinDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `firstName`, `lastName`, `email`, `phone`, `userType`, `password`, `joinDate`) VALUES
(1, 'admin', 'admin', 'barigas', 'barigas@gmail.com', 81255421255, '1', '$2y$10$d8LddfbEJN1YHryqX3ZZIepI6ADksmpSNIcsEaIb3jaDhSU4h5eg6', '2023-06-27 14:01:19'),
(2, 'manager', 'manager', 'barigas', 'barigas523@gmail.com', 822121221212, '2', '$2y$10$ZpQLn9OS/4kaGH5iDtumWu6I9K3YkJc8LYOvqaGqpYgSulyLo71YW', '2023-06-27 14:01:45'),
(3, 'obye', 'ob', 'yey', 'lalat906@gmail.com', 222222222222, '0', '$2y$10$RKViN3S0nUQS.xZDZRUOtOXE.6pRrqpCeAjfg2egXS.E2dKMhDyR2', '2023-06-22 23:25:44'),
(7, 'fani', 'fani', 'ni', 'fani@gmail.com', 111111111111, '0', '$2y$10$wjZ1zZUFetStHcYXDxUIr.eX/TXYrHNPYHfHE6SDrUJ3zZ6FCZ.b2', '2023-06-30 21:11:17'),
(40, 'ahmad', 'ahmad', 'mad', 'ahmad@gmail.com', 0, '0', '$2y$10$WExQka8qI7ZZqpOA4dxkhO0Nb33NZQrs8smPwj1M32LLJmXVKk5TS', '2023-06-30 23:25:54'),
(41, 'dewi', 'dewi', 'wi', 'dewi@gmail.com', 33333333333, '0', '$2y$10$T5dYNG5AJkcFAy8TpjlKwu1Mt1gsbj.NxVu1VqyJoDtsHeth9AEGa', '2023-06-30 23:26:48'),
(42, 'siti', 'siti', 'ti', 'siti@gmail.com', 44444444444, '0', '$2y$10$Y6EaJ9iYKUA9MIDyw2r5W.30ketDboI5TBFuLYgD/5cHMQNBtnuV2', '2023-06-30 23:27:25'),
(43, 'agus', 'agus', 'us', 'agus@gmail.com', 55555555555, '0', '$2y$10$HUGwS6MVLpMNl9GX1Jtq0OUSA9vdDgy7sBe7CP/sJL1JM/jZ8QjvC', '2023-06-30 23:28:18'),
(44, 'nita', 'nita', 'ta', 'nita@gmail.com', 66666666666, '0', '$2y$10$FeY2tkeANlQkdAgQFYd0yOTnXCoaDpTQJsP5aQsBSubBUPjZUugQi', '2023-06-30 23:29:03'),
(45, 'wawan', 'wawan', 'wan', 'wawan@gmail.com', 77777777777, '0', '$2y$10$P2sHNfuPTyteI9tSMIHnjuaFoN8zCZnoBVNvZxuWwk0SkrTItfWe6', '2023-06-30 23:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `viewcart`
--

CREATE TABLE `viewcart` (
  `cartItemId` int(11) NOT NULL,
  `barangId` int(11) NOT NULL,
  `itemQuantity` int(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `addedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `viewcart`
--

INSERT INTO `viewcart` (`cartItemId`, `barangId`, `itemQuantity`, `userId`, `addedDate`) VALUES
(76, 12, 1, 40, '2023-07-01 02:49:02'),
(77, 3, 1, 40, '2023-07-01 02:49:03'),
(78, 17, 1, 40, '2023-07-01 02:49:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barangId`),
  ADD KEY `barangKategoriId` (`barangKategoriId`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriId`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderId` (`orderId`,`barangId`),
  ADD KEY `barangId` (`barangId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewcart`
--
ALTER TABLE `viewcart`
  ADD PRIMARY KEY (`cartItemId`),
  ADD KEY `barangId` (`barangId`,`userId`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barangId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategoriId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `viewcart`
--
ALTER TABLE `viewcart`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`barangKategoriId`) REFERENCES `kategori` (`kategoriId`);

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`);

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`barangId`) REFERENCES `barang` (`barangId`),
  ADD CONSTRAINT `orderitems_ibfk_3` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`);

--
-- Constraints for table `viewcart`
--
ALTER TABLE `viewcart`
  ADD CONSTRAINT `viewcart_ibfk_1` FOREIGN KEY (`barangId`) REFERENCES `barang` (`barangId`),
  ADD CONSTRAINT `viewcart_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
