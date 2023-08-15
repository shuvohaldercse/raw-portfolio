-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 03:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sam-pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_me`
--

CREATE TABLE `about_me` (
  `id` int(11) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_me`
--

INSERT INTO `about_me` (`id`, `about`) VALUES
(1, 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `status`) VALUES
(2, 'sam bd', 'sam@gmail.com', 'lol lol lol lol lol lol lol lol ', 0),
(3, 'sam web', 'samweb@sambd.xyz', 'hi bro', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `alt_tag` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `alt_tag`, `picture`, `status`) VALUES
(2, 'sam boss', '2.PNG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pro_1`
--

CREATE TABLE `pro_1` (
  `id` int(11) NOT NULL,
  `pro1_title` varchar(50) NOT NULL,
  `pro1_short` varchar(150) NOT NULL,
  `pro1_link` varchar(50) NOT NULL,
  `pro1_feedback` varchar(150) NOT NULL,
  `pro1_sender` varchar(30) NOT NULL,
  `pro1_picture` varchar(100) NOT NULL,
  `pro1_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pro_1`
--

INSERT INTO `pro_1` (`id`, `pro1_title`, `pro1_short`, `pro1_link`, `pro1_feedback`, `pro1_sender`, `pro1_picture`, `pro1_status`) VALUES
(2, 'test', 'bla bla', 'https://sam.com', 'goob bro', 'bd', '2.jpg', 1),
(3, 'test1', 'bla bla1', 'www.sam.com1', 'goob bro1', 'bd1', '3.jpg', 1),
(5, 'web development ', 'best project as like wordpress ', 'ww2.sambd.xyz', 'good as well. totally cool', 'jack', '5.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quil`
--

CREATE TABLE `quil` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quil`
--

INSERT INTO `quil` (`id`, `name`, `status`) VALUES
(2, 'web', 1),
(3, 'design', 1),
(4, 'graphics', 1),
(5, 'null', 0),
(6, 'sam', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `ser_name` varchar(100) NOT NULL,
  `ser_desp` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `ser_name`, `ser_desp`, `status`) VALUES
(6, ' Web Developer', '“Finally a developer can fully understand the whole process of creating a GREAT website. Web Design\r\n101, you finally got the book you needed/wanted.”', 1),
(7, 'Web Programmer', 'The Head First series learning technique works well. You feel as though you are working through an\r\nactual design process instead of just reading a how-to manual. It’s a much more holistic approach to\r\nlearning. The books work with your mind, rather than against it', 1),
(9, ' Software Engineer', 'Simplified, but far from dumbed-down. Practical and intuitive. I wish I had access to a book like this\r\nwhen I was getting started', 1),
(10, 'Ethan', 'is an Assistant Professor at Matrix:\r\nThe Center for Humane Arts, Letters & Social Sciences\r\nOnline, an Assistant Professor in the Department of\r\nTelecommunication, Information Studies, and Media,\r\nand an Adjunct Assistant Professor in the Department of\r\nHistory at Michigan State University. In addition, Ethan is\r\na Principal Investigator in the Games for Entertainment &\r\nLearning Lab, and co- founder of both the undergraduate\r\nSpecialization and Game Design Development and the\r\nMA in Serious Game Design at Michigan State University.\r\nEthan teaches in a wide variety of areas including cultural\r\nheritage informatics, user centered & user experience\r\ndesign, game design, serious game design, game studies,\r\nand ancient Egyptian social history & archaeology. In\r\naddition to a wide variety of academic papers and\r\nconference presentations, Ethan has written a number of\r\nbooks on interactive design & web design. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_banner_img`
--

CREATE TABLE `site_banner_img` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_banner_img`
--

INSERT INTO `site_banner_img` (`id`, `picture`, `status`) VALUES
(5, '5.jpg', 1),
(9, '9.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_desp`
--

CREATE TABLE `site_desp` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `ban_text` varchar(50) NOT NULL,
  `short_desp` varchar(150) NOT NULL,
  `footer` varchar(20) NOT NULL,
  `footer_link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_desp`
--

INSERT INTO `site_desp` (`id`, `title`, `s_name`, `ban_text`, `short_desp`, `footer`, `footer_link`) VALUES
(1, 'Sam BD', 'Sam BD', 'Sam Web Studio', 'this is sam official portfulio website here is sam all deteils please see full website and any kind of question please contact us', 'Sam BD', 'https://ww2.sambd.xyz/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `gender`, `picture`, `role`) VALUES
(1, 'Sam', 'sam@gmail.com', '$2y$10$I1HndxMV5NYA/XWiKN1To.EPlB.bfupVqTz4sVAKmvSVYppqEpdk.', 'male', '1.png', 1),
(3, 'sambd', 'sambd@gmail.com', '$2y$10$c4eh6JuwC0NKexxW7NRhA.NSjMeN4zzzhT7Dx2/2EZ/uXWyW0jrwq', 'male', '3.jpg', 1),
(5, 'sambd', 'bdsam@gmail.com', '$2y$10$fcg3NTwbGlNt02gm5LMWH.BuHUvg5PyEKmOMcRwc/2Yrd586Za556', 'male', '5.jpg', 1),
(6, 'bd sam', 'bdsam1@gmail.com', '$2y$10$nVqFXiHc.0NjnzsJsS2CFe/AMEsyJ97kY4a3xOtXVnlC787D0iJj.', 'male', '6.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_1`
--
ALTER TABLE `pro_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quil`
--
ALTER TABLE `quil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_banner_img`
--
ALTER TABLE `site_banner_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_desp`
--
ALTER TABLE `site_desp`
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
-- AUTO_INCREMENT for table `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pro_1`
--
ALTER TABLE `pro_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quil`
--
ALTER TABLE `quil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `site_banner_img`
--
ALTER TABLE `site_banner_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `site_desp`
--
ALTER TABLE `site_desp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
