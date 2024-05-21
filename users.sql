-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 06:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_fullname`, `user_username`, `user_password`, `user_type`, `date_created`, `date_updated`) VALUES
(10, 1, 'admin new', 'admin', '$2y$10$F4ir2gpowsOQNBz3kW2NI..k4CNIklgPRVtJI2nnOf96hgyBunk1q', 'Admin', '2024-05-20 18:02:47', '2024-05-20 18:02:47'),
(11, 3, 'kdot', 'kdot', '$2y$10$2chIOfx8enxYWqbAUyrfIeiAM8IiP/AQ7CvLRnJMWi2GozVyEdhHm', 'Admin', '2024-05-20 19:17:52', '2024-05-20 19:17:52'),
(21, 9, 'he a 69 god', 'fan', '$2y$10$T.ZTKc2LojAog/zQBMwn2uzmHaPfuxav8E03TBgoAE4rJyEF9kiLq', 'Admin', '2024-05-20 19:35:02', '2024-05-20 19:35:02'),
(22, 11, 'bbl drizzy', 'drizzy', '$2y$10$wG2c6jKKBvJXErDFau/P.eWArBA41.WvV2Vi4Ifzs4RWRuGz7MRme', 'Admin', '2024-05-20 19:42:00', '2024-05-20 19:42:00'),
(23, 2, 'katsumi saigo', 'katsu', '$2y$10$5luR2mmdvkSE9PRZ0pP/xOo7HdYZDy7o8qreX26LB.4RwHxmtSdiC', 'Admin', '2024-05-20 23:20:43', '2024-05-20 23:20:43'),
(26, 1000, 'juansa s', 'sss3', '$2y$10$rqsIGGaut6gihMSbosJ12OVxFQKGlD6ykHTYriAtGBYBG5XBiA.OK', 'Student', '2024-05-21 03:29:14', '2024-05-21 03:29:14'),
(27, 1001, 'news new', 'new', '$2y$10$kvtoPv25K/Ga727f3WWNRe5AL9TYdKlJTkw9Q3dnf.J2kDI5Suy8K', 'Student', '2024-05-21 03:52:48', '2024-05-21 03:52:48'),
(38, 33, 'thorfins karlsefni', 'thorfin', '$2y$10$aPfKkGPNqkP3koZTI8ICr.vW9euTCfaNMZTiprgz.32wiTzozGHsS', 'Teacher', '2024-05-21 10:13:56', '2024-05-21 10:13:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
