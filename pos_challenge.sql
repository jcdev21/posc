-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 12, 2020 at 10:19 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_challenge`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` tinyint NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Sayuran'),
(3, 'Mie'),
(4, 'Kue');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `stock` int NOT NULL,
  `id_category` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `stock`, `id_category`) VALUES
(1, 'Mie Sedap Goreng', '2500', 120, 3),
(2, 'Mie Sedap Kuah s', '2500', 76, 3),
(3, 'Bolu', '28500', 4, 4),
(4, 'Indomie Pop Mie', '6000', 92, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int NOT NULL,
  `code_transaction` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `datas` json NOT NULL,
  `overall_price` int NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `code_transaction`, `datas`, `overall_price`, `date`) VALUES
(1, 'TSC-1', '[{\"id\": \"1\", \"qty\": \"2\", \"name\": \"Mie Sedap Goreng\", \"price\": \"2500\", \"stock\": \"32\", \"category\": \"Mie\"}, {\"id\": \"3\", \"qty\": \"2\", \"name\": \"Bolu\", \"price\": \"28500\", \"stock\": \"5\", \"category\": \"Kue\"}]', 62000, '2020-08-01'),
(2, 'TSC-2', '[{\"id\": \"2\", \"qty\": \"5\", \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"20\", \"category\": \"Mie\"}]', 12500, '2020-08-01'),
(3, 'TSC-3', '[{\"id\": \"1\", \"qty\": \"2\", \"name\": \"Mie Sedap Goreng\", \"price\": \"2500\", \"stock\": \"30\", \"category\": \"Mie\"}, {\"id\": \"3\", \"qty\": 1, \"name\": \"Bolu\", \"price\": \"28500\", \"stock\": \"3\", \"category\": \"Kue\"}, {\"id\": \"2\", \"qty\": 1, \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"15\", \"category\": \"Mie\"}]', 36000, '2020-08-02'),
(4, 'TSC-4', '[{\"id\": \"2\", \"qty\": \"2\", \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"14\", \"category\": \"Mie\"}, {\"id\": \"1\", \"qty\": \"3\", \"name\": \"Mie Sedap Goreng\", \"price\": \"2500\", \"stock\": \"28\", \"category\": \"Mie\"}]', 12500, '2020-08-02'),
(5, 'TSC-1596421294', '[{\"id\": \"2\", \"qty\": 1, \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"12\", \"category\": \"Mie\"}]', 2500, '2020-08-03'),
(6, 'TSC-1596421404', '[{\"id\": \"3\", \"qty\": \"2\", \"name\": \"Bolu\", \"price\": \"28500\", \"stock\": \"2\", \"category\": \"Kue\"}]', 57000, '2020-08-03'),
(7, 'TSC-1596421722', '[{\"id\": \"2\", \"qty\": 1, \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"11\", \"category\": \"Mie\"}, {\"id\": \"1\", \"qty\": \"3\", \"name\": \"Mie Sedap Goreng\", \"price\": \"2500\", \"stock\": \"25\", \"category\": \"Mie\"}, {\"id\": \"3\", \"qty\": \"2\", \"name\": \"Bolu\", \"price\": \"28500\", \"stock\": \"15\", \"category\": \"Kue\"}]', 67000, '2020-08-04'),
(8, 'TSC-1596421757', '[{\"id\": \"1\", \"qty\": 1, \"name\": \"Mie Sedap Goreng\", \"price\": \"2500\", \"stock\": \"22\", \"category\": \"Mie\"}]', 2500, '2020-09-04'),
(9, 'TSC-1596421760', '[{\"id\": \"2\", \"qty\": 1, \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"10\", \"category\": \"Mie\"}]', 2500, '2020-08-05'),
(10, 'TSC-1596421763', '[{\"id\": \"3\", \"qty\": 1, \"name\": \"Bolu\", \"price\": \"28500\", \"stock\": \"13\", \"category\": \"Kue\"}]', 28500, '2020-08-05'),
(11, 'TSC-1596421766', '[{\"id\": \"1\", \"qty\": 1, \"name\": \"Mie Sedap Goreng\", \"price\": \"2500\", \"stock\": \"22\", \"category\": \"Mie\"}]', 2500, '2020-08-06'),
(12, 'TSC-1596421770', '[{\"id\": \"2\", \"qty\": 1, \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"10\", \"category\": \"Mie\"}]', 2500, '2020-08-06'),
(13, 'TSC-1596421779', '[{\"id\": \"3\", \"qty\": 1, \"name\": \"Bolu\", \"price\": \"28500\", \"stock\": \"13\", \"category\": \"Kue\"}]', 28500, '2020-08-07'),
(14, 'TSC-1596426829', '[{\"id\": \"3\", \"qty\": \"10\", \"name\": \"Bolu\", \"price\": \"28500\", \"stock\": \"25\", \"category\": \"Kue\"}, {\"id\": \"1\", \"qty\": \"5\", \"name\": \"Mie Sedap Goreng\", \"price\": \"2500\", \"stock\": \"100\", \"category\": \"Mie\"}, {\"id\": \"2\", \"qty\": \"5\", \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"100\", \"category\": \"Mie\"}]', 310000, '2020-08-07'),
(15, 'TSC-1596598282', '[{\"id\": \"1\", \"qty\": \"5\", \"name\": \"Mie Sedap Goreng\", \"price\": \"2500\", \"stock\": \"95\", \"category\": \"Mie\"}, {\"id\": \"2\", \"qty\": \"5\", \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"95\", \"category\": \"Mie\"}]', 25000, '2020-08-08'),
(16, 'TSC-1596934363', '[{\"id\": \"1\", \"qty\": 1, \"name\": \"Mie Sedap Goreng\", \"price\": \"2500\", \"stock\": \"135\", \"category\": \"Mie\"}, {\"id\": \"2\", \"qty\": 1, \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"90\", \"category\": \"Mie\"}, {\"id\": \"3\", \"qty\": 1, \"name\": \"Bolu\", \"price\": \"28500\", \"stock\": \"15\", \"category\": \"Kue\"}]', 33500, '2020-08-08'),
(17, 'TSC-1596945416', '[{\"id\": \"2\", \"qty\": 1, \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"89\", \"category\": \"Mie\"}]', 2500, '2020-08-09'),
(18, 'TSC-1596947084', '[{\"id\": \"4\", \"qty\": \"2\", \"name\": \"Indomie Pop Mie rasa Gita\", \"price\": \"30000\", \"stock\": \"100\", \"category\": \"Mie\"}, {\"id\": \"2\", \"qty\": \"2\", \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"88\", \"category\": \"Mie\"}]', 65000, '2020-08-09'),
(19, 'TSC-1597021473', '[{\"id\": \"2\", \"qty\": 1, \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"86\", \"category\": \"Mie\"}, {\"id\": \"1\", \"qty\": 1, \"name\": \"Mie Sedap Goreng\", \"price\": \"2500\", \"stock\": \"134\", \"category\": \"Mie\"}, {\"id\": \"4\", \"qty\": 1, \"name\": \"Indomie Pop Mie\", \"price\": \"6000\", \"stock\": \"98\", \"category\": \"Mie\"}]', 11000, '2020-08-10'),
(20, 'TSC-1597021940', '[{\"id\": \"1\", \"qty\": 1, \"name\": \"Mie Sedap Goreng\", \"price\": \"2500\", \"stock\": \"133\", \"category\": \"Mie\"}, {\"id\": \"2\", \"qty\": 1, \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"85\", \"category\": \"Mie\"}, {\"id\": \"4\", \"qty\": \"4\", \"name\": \"Indomie Pop Mie\", \"price\": \"6000\", \"stock\": \"97\", \"category\": \"Mie\"}, {\"id\": \"3\", \"qty\": \"2\", \"name\": \"Bolu\", \"price\": \"28500\", \"stock\": \"14\", \"category\": \"Kue\"}, {\"id\": \"4\", \"qty\": \"4\", \"name\": \"Indomie Pop Mie\", \"price\": \"6000\", \"stock\": \"97\", \"category\": \"Mie\"}]', 98000, '2020-08-10'),
(21, 'TSC-1597026709', '[{\"id\": \"2\", \"qty\": 1, \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"84\", \"category\": \"Mie\"}, {\"id\": \"3\", \"qty\": \"4\", \"name\": \"Bolu\", \"price\": \"28500\", \"stock\": \"12\", \"category\": \"Kue\"}]', 116500, '2020-08-10'),
(22, 'TSC-1597035569', '[{\"id\": \"2\", \"qty\": \"5\", \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"83\", \"category\": \"Mie\"}]', 12500, '2020-08-10'),
(23, 'TSC-1597117149', '[{\"id\": \"1\", \"qty\": 1, \"name\": \"Mie Sedap Goreng\", \"price\": \"2500\", \"stock\": \"132\", \"category\": \"Mie\"}, {\"id\": \"2\", \"qty\": 1, \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"78\", \"category\": \"Mie\"}, {\"id\": \"3\", \"qty\": 1, \"name\": \"Bolu\", \"price\": \"28500\", \"stock\": \"8\", \"category\": \"Kue\"}, {\"id\": \"4\", \"qty\": 1, \"name\": \"Indomie Pop Mie\", \"price\": \"6000\", \"stock\": \"93\", \"category\": \"Mie\"}]', 39500, '2020-08-11'),
(24, 'TSC-1597118639', '[{\"id\": \"1\", \"qty\": 1, \"name\": \"Mie Sedap Goreng\", \"price\": \"2500\", \"stock\": \"131\", \"category\": \"Mie\"}, {\"id\": \"3\", \"qty\": \"2\", \"name\": \"Bolu\", \"price\": \"28500\", \"stock\": \"7\", \"category\": \"Kue\"}, {\"id\": \"2\", \"qty\": 1, \"name\": \"Mie Sedap Kuah s\", \"price\": \"2500\", \"stock\": \"77\", \"category\": \"Mie\"}]', 62000, '2020-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `level_id` int NOT NULL,
  `status` enum('active','disable') NOT NULL,
  `last_login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `email`, `password`, `level_id`, `status`, `last_login`) VALUES
(1, 'Administrator', '081122334455', 'admin@admin.com', '$2y$10$/.LrQhr0GaxYkmxpZxjURO4prabhbkRWIwErjrhaBU0165JPuqhM.', 1, 'active', ''),
(2, 'Kasir', '081122222222', 'kasir@kasir.com', '$2y$10$KSvP8P6UmMwYhG0V7CAhmecDkzJv4UTG2I/ZkNdWz0SKXInBhtSDy', 2, 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `level`) VALUES
(1, 'admin'),
(2, 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `user_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
