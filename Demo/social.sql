-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 09:06 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(1, 'Wake up', 'almantas_gaizauskas', 'petras_lukas', '2019-04-14 17:25:31', 'no', 45),
(2, '', 'almantas_gaizauskas', 'almantas_gaizauskas', '2019-04-14 18:32:11', 'no', 42),
(3, '', 'almantas_gaizauskas', 'petras_lukas', '2019-04-14 19:20:38', 'no', 45),
(4, 'banana', 'almantas_gaizauskas', 'petras_lukas', '2019-04-15 12:14:08', 'no', 45),
(5, 'Labas', 'almantas_gaizauskas', 'almantas_gaizauskas', '2019-04-15 12:28:48', 'no', 0),
(6, 'Nu jo', 'almantas_gaizauskas', 'almantas_gaizauskas', '2019-04-15 12:31:45', 'no', 0),
(7, 'Normaliai, kaip tu?', 'almantas_gaizauskas', 'petras_lukas', '2019-04-15 12:41:53', 'no', 1),
(8, 'aaaa', 'almantas_gaizauskas', 'almantas_gaizauskas', '2019-04-15 13:06:01', 'no', 2),
(9, 'adadada', 'almantas_gaizauskas', 'almantas_gaizauskas', '2019-04-17 12:43:35', 'no', 6);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `post_id`) VALUES
(3, 'almantas_gaizauskas', 5),
(5, 'petras_lukas', 6),
(6, 'petras_lukas', 3),
(7, 'almantas_gaizauskas', 6);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`) VALUES
(0, 'Labas Almantai', 'almantas_gaizauskas', 'none', '2019-04-15 12:15:45', 'no', 'no', 0),
(1, 'Hey, kaip gyvuojate?', 'petras_lukas', 'none', '2019-04-15 12:29:23', 'no', 'no', 0),
(2, 'labuka', 'almantas_gaizauskas', 'none', '2019-04-15 12:56:00', 'no', 'no', 0),
(3, 'labuka', 'almantas_gaizauskas', 'none', '2019-04-15 13:04:06', 'no', 'no', 1),
(4, 'labuka', 'almantas_gaizauskas', 'none', '2019-04-15 13:04:25', 'no', 'no', 0),
(5, 'labuka', 'almantas_gaizauskas', 'none', '2019-04-15 13:05:51', 'no', 'no', 1),
(6, 'labuka', 'almantas_gaizauskas', 'none', '2019-04-15 13:06:07', 'no', 'no', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`, `hash`, `active`) VALUES
(0, 'Almantas', 'Gaizauskas', 'almantas_gaizauskas', 'almantas88@gmail.com', 'ec121ff80513ae58ed478d5c5787075b', '2019-04-12', 'assets/images/profile_pics/defaults/3.png', 6, 4, 'no', ',lukas_petras,petras_lukas,karolis_petras,', 'fbd7939d674997cdb4692d34de8633c4', 1),
(1, 'Migle', 'Zubaviciute', 'migle_zubaviciute', 'miglezub@gmail.com', 'ec121ff80513ae58ed478d5c5787075b', '2019-04-14', 'assets/images/profile_pics/defaults/4.png', 0, 0, 'no', ',', '01f78be6f7cad02658508fe4616098a9', 1),
(2, 'Lukas', 'Petras', 'lukas_petras', 'lukaspetras@gmail.com', 'ec121ff80513ae58ed478d5c5787075b', '2019-04-14', 'assets/images/profile_pics/defaults/14.png', 0, 0, 'no', ',almantas_gaizauskas,', '59b90e1005a220e2ebc542eb9d950b1e', 1),
(3, 'Petras', 'Lukas', 'petras_lukas', 'petraslukas@gmail.com', 'ec121ff80513ae58ed478d5c5787075b', '2019-04-14', 'assets/images/profile_pics/defaults/2.png', 1, 0, 'no', ',almantas_gaizauskas,', '559cb990c9dffd8675f6bc2186971dc2', 1),
(4, 'Karolis', 'Petras', 'karolis_petras', 'karolispetras@gmail.com', 'ec121ff80513ae58ed478d5c5787075b', '2019-04-14', 'assets/images/profile_pics/defaults/1.png', 0, 0, 'no', ',almantas_gaizauskas,', '59b90e1005a220e2ebc542eb9d950b1e', 1),
(5, 'Nerijus', 'Lukas', 'nerijus_lukas', 'nerijuslukas@gmail.com', 'ec121ff80513ae58ed478d5c5787075b', '2019-04-14', 'assets/images/profile_pics/defaults/4.png', 0, 0, 'no', ',', '559cb990c9dffd8675f6bc2186971dc2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
