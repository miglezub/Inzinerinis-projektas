-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 07:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

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
(9, 'adadada', 'almantas_gaizauskas', 'almantas_gaizauskas', '2019-04-17 12:43:35', 'no', 6),
(10, 'sdgvsdzv', 'almantas_gaizauskas', 'almantas_gaizauskas', '2019-04-18 10:19:50', 'no', 7),
(11, 'asdfasv', 'migle_zubaviciute', 'migle_zubaviciute', '2019-04-18 10:22:08', 'no', 8),
(12, 'labas', 'almantas_gaizauskas', 'migle_zubaviciute', '2019-04-25 18:15:08', 'no', 10),
(13, 'Test', 'test_user', 'test_user', '2019-05-07 01:35:24', 'no', 14),
(14, 'Test3', 'test_user', 'test_user', '2019-05-07 01:35:35', 'no', 14),
(15, 'test', 'test_user', 'almantas_gaizauskas', '2019-05-22 19:42:44', 'no', 11),
(16, 'test', 'test_user', 'almantas_gaizauskas', '2019-05-22 19:43:11', 'no', 12),
(17, 'test', 'test_user', 'almantas_gaizauskas', '2019-05-22 19:49:41', 'no', 7);

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `user_to`, `user_from`) VALUES
(1, 'test_user', 'almantas_gaizauskas');

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
(9, 'almantas_gaizauskas', 6),
(10, 'almantas_gaizauskas', 7),
(12, 'migle_zubaviciute', 8),
(14, 'test_user', 13),
(21, 'test_user', 14),
(23, 'test_user', 1),
(25, 'test_user', 10),
(26, 'test_user', 12),
(27, 'test_user', 11),
(28, 'test_user', 4);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_to`, `user_from`, `body`, `date`, `opened`, `viewed`, `deleted`) VALUES
(31, 'petras_lukas', 'test_user', 'hi', '2019-05-22 16:39:03', 'no', 'no', 'no'),
(32, 'test_user', 'petras_lukas', 'hi', '2019-05-22 16:39:03', 'no', 'no', 'no'),
(33, 'migle_zubaviciute', 'test_user', 'test', '2019-05-22 18:33:29', 'no', 'no', 'no'),
(34, 'petras_lukas', 'test_user', 'test', '2019-05-22 18:33:39', 'no', 'no', 'no'),
(35, 'test_user', 'test_user', 'test', '2019-05-22 18:33:47', 'yes', 'yes', 'no'),
(36, 'almantas_gaizauskas', 'test_user', 'test', '2019-05-22 18:34:00', 'no', 'no', 'no'),
(37, 'lukas_petras', 'test_user', 'test', '2019-05-22 18:34:48', 'no', 'no', 'no'),
(38, 'karolis_petras', 'test_user', 'test', '2019-05-22 18:34:58', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `link` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_to`, `user_from`, `message`, `link`, `datetime`, `opened`, `viewed`) VALUES
(1, 'almantas_gaizauskas', 'test_user', 'Test User commented on your post', 'post.php?id=12', '2019-05-22 19:43:11', 'no', 'no'),
(2, 'migle_zubaviciute', 'test_user', '', 'post.php?id=12', '2019-05-22 19:43:11', 'no', 'no'),
(3, 'test_user', 'almantas_gaizauskas', 'Test User commented on your post', 'post.php?id=7', '2019-05-22 19:49:41', 'no', 'no'),
(4, 'almantas_gaizauskas', 'test_user', 'Test User liked your post', 'post.php?id=4', '2019-05-22 19:49:52', 'no', 'no'),
(5, 'almantas_gaizauskas', 'test_user', 'Test User liked your post', 'post.php?id=18', '2019-05-22 19:50:09', 'no', 'no'),
(6, 'almantas_gaizauskas', 'test_user', 'Test User posted on your profile', 'post.php?id=19', '2019-05-22 19:50:59', 'no', 'no');

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
(1, 'Hey, kaip gyvuojate?', 'petras_lukas', 'none', '2019-04-15 12:29:23', 'no', 'no', 1),
(2, 'labuka', 'almantas_gaizauskas', 'none', '2019-04-15 12:56:00', 'no', 'no', 0),
(3, 'labuka', 'almantas_gaizauskas', 'none', '2019-04-15 13:04:06', 'no', 'no', 1),
(4, 'labuka', 'almantas_gaizauskas', 'none', '2019-04-15 13:04:25', 'no', 'no', 1),
(5, 'labuka', 'almantas_gaizauskas', 'none', '2019-04-15 13:05:51', 'no', 'yes', 1),
(6, 'labuka', 'almantas_gaizauskas', 'none', '2019-04-15 13:06:07', 'no', 'no', 2),
(7, 'labas rytas', 'almantas_gaizauskas', 'none', '2019-04-18 10:19:35', 'no', 'no', 1),
(8, 'pirmas postas', 'migle_zubaviciute', 'none', '2019-04-18 10:22:01', 'no', 'yes', 1),
(9, 'asgag', 'migle_zubaviciute', 'none', '2019-04-24 22:21:44', 'no', 'yes', 0),
(10, 'laba dienaaaaaa', 'migle_zubaviciute', 'none', '2019-04-25 18:05:51', 'no', 'no', 1),
(11, 'hello', 'almantas_gaizauskas', 'migle_zubaviciute', '2019-04-25 18:37:37', 'no', 'no', 1),
(12, 'hahahaha', 'almantas_gaizauskas', 'migle_zubaviciute', '2019-04-25 18:40:42', 'no', 'no', 1),
(13, 'Hello!', 'test_user', 'none', '2019-05-07 01:32:21', 'no', 'no', 1),
(14, 'How is everyone?', 'test_user', 'none', '2019-05-07 01:32:31', 'no', 'no', 1),
(15, 'Test', 'test_user', 'none', '2019-05-08 14:46:41', 'no', 'no', 0),
(16, 'Hello', 'test_user', 'none', '2019-05-22 14:59:43', 'no', 'no', 0),
(17, 'test', 'test_user', 'petras_lukas', '2019-05-22 19:35:55', 'no', 'no', 0),
(18, 'test', 'test_user', 'almantas_gaizauskas', '2019-05-22 19:50:09', 'no', 'no', 0),
(19, 'test', 'test_user', 'almantas_gaizauskas', '2019-05-22 19:50:59', 'no', 'no', 0);

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
(0, 'Almantas', 'Gaizauskas', 'almantas_gaizauskas', 'almantas88@gmail.com', 'ec121ff80513ae58ed478d5c5787075b', '2019-04-12', 'assets/images/profile_pics/defaults/3.png', 9, 8, 'no', ',almantas_gaizauskas,petras_lukas,karolis_petras,lukas_petras,migle_zubaviciute,', 'fbd7939d674997cdb4692d34de8633c4', 1),
(1, 'Migle', 'Zubaviciute', 'migle_zubaviciute', 'miglezub@gmail.com', '0e311e5b9704f28b4e8557e8fa3fbe7d', '2019-04-14', 'assets/images/profile_pics/migle_zubaviciutece6863430ad48bb5c9bd65d06ad76ba4n.jpeg', 3, 2, 'no', ',almantas_gaizauskas,test_user,', '01f78be6f7cad02658508fe4616098a9', 1),
(2, 'Lukas', 'Petras', 'lukas_petras', 'lukaspetras@gmail.com', 'ec121ff80513ae58ed478d5c5787075b', '2019-04-14', 'assets/images/profile_pics/defaults/14.png', 0, 0, 'no', ',petras_lukas,karolis_petrasmalmantas_gaizauskas,test_user,', '59b90e1005a220e2ebc542eb9d950b1e', 1),
(3, 'Petras', 'Lukas', 'petras_lukas', 'petraslukas@gmail.com', 'ec121ff80513ae58ed478d5c5787075b', '2019-04-14', 'assets/images/profile_pics/defaults/2.png', 1, 1, 'no', ',almantas_gaizauskas,test_user,', '559cb990c9dffd8675f6bc2186971dc2', 1),
(4, 'Karolis', 'Petras', 'karolis_petras', 'karolispetras@gmail.com', 'ec121ff80513ae58ed478d5c5787075b', '2019-04-14', 'assets/images/profile_pics/defaults/1.png', 0, 0, 'no', ',almantas_gaizauskas,test_user,', '59b90e1005a220e2ebc542eb9d950b1e', 1),
(5, 'Nerijus', 'Lukas', 'nerijus_lukas', 'nerijuslukas@gmail.com', 'ec121ff80513ae58ed478d5c5787075b', '2019-04-14', 'assets/images/profile_pics/defaults/4.png', 0, 0, 'no', ',', '559cb990c9dffd8675f6bc2186971dc2', 1),
(6, 'Test', 'User', 'test_user', 'test@test.com', '147538da338b770b61e592afc92b1ee6', '2019-05-07', 'assets/images/profile_pics/defaults/10.png', 7, 2, 'no', ',petras_lukas,karolis_petras,lukas_petras,migle_zubaviciute,', 'f9028faec74be6ec9b852b0a542e2f39', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
