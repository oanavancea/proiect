-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 03:03 PM
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
-- Database: `webdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_test`
--

CREATE TABLE `users_test` (
  `id` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(50) NOT NULL,
  `hashedPass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_test`
--

INSERT INTO `users_test` (`id`, `userName`, `userEmail`, `userPass`, `hashedPass`) VALUES
(34, 'myuser67', 'same@email.ro', '123', '$2y$10$oKbjXmx/HU6laDxBHTjUKeGwukWbYiYHGXAEtZ7J/x9UUaCV.qNRW'),
(35, 'myuser8', 'same@email.ro', '123', '$2y$10$18t0eiX2GJrn3Urpq73js.G7ju7Jnmdckxfmap.3uWlxuQvd8XDiS'),
(37, 'myuser6', 'same@email.ro', '123', '$2y$10$kehBFOnYfDzl/ve43t//9ukvW/gzz1k1g.0psBx5OQeFgwLXHrxhm'),
(79, 'Georgi', 'g.email@123.ro', '456553', '$2y$10$hwI6lio7lbz7o3n6UuyutOh2XmpTpAf7YuCPwkA6Iovh4YM5mgEXW'),
(93, 'myuser', 'generic@email.ro', '123', '$2y$10$t/d0xkNbzSZdxyk/qDkhI.59UxrUp/uNNsTJyAzGqgIP01bbJsTJS'),
(112, 'myuser78', 'generic@email.ro', '123', '$2y$10$C1eSmCjNSc1tKoji8B5h/uoEO41.jCf8/PJVMBt.wERWrDxDXwUre'),
(120, 'Daniel', 'generic@email.ro', '123', '$2y$10$zPAGv0s4A/oz0u8BohsbbOmcyX81Zj3UEj94VwzDf2SAw0zgg7TCG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_test`
--
ALTER TABLE `users_test`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_test`
--
ALTER TABLE `users_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
