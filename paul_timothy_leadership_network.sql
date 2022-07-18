-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 09:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paul_timothy_leadership_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_registration`
--

CREATE TABLE `admin_registration` (
  `id` int(11) NOT NULL,
  `firstname` char(32) NOT NULL,
  `surname` char(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pwd_reset_token` int(11) NOT NULL,
  `status` text NOT NULL DEFAULT 'Moderator',
  `check_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_registration`
--

INSERT INTO `admin_registration` (`id`, `firstname`, `surname`, `username`, `phone_number`, `email`, `password`, `pwd_reset_token`, `status`, `check_status`) VALUES
(1, 'George', 'Ntsiful', 'jerry', '0247834206', 'georgentsifulk@gmail.com', '$2y$10$apl732qNFzcuMQHN1mv9QO8vcr.ABQyAUV3QIBN/YKUdFkUR25w6y', 0, 'Administrator', 'Active'),
(2, 'Raymond', 'Affedzie', 'berth_ray', '0247692388', 'raymondaffedzie@gmail.com', '$2y$10$U7Pnn2F/Zg1Fb4SIZueLieQ2j69aS3axPNBZ3tdgME4Vhp76j8p62', 467999, 'Administrator', 'Active'),
(3, 'Stephen', 'Mensah', 'stephy', '0553053239', 'stephenymensah@gmail.com', '$2y$10$yNjrJvHTn8b0j0NIygCyHO2BKZ.K4rtlvRI8vw53TQOV/fVq55y2W', 769504, 'Administrator', 'Active'),
(4, 'Jane', 'Doe', 'janedoe', '0123456789', 'janedoe@email.com', '$2y$10$EUvq3w9ZIDvBgZjdoZ0HiO.B.WaRfUUnxNhVXeS5J96CDYpS0/Jxq', 0, 'Moderator', 'Active'),
(5, 'John', 'Doe', 'john', '+0912345678', 'johndoe@email.com', '$2y$10$1JZNRTKht05m7kBxYnlH/.A9DFF5iiHlGw7KQJiW6q74920/Ulioq', 0, 'Moderator', 'Inactive'),
(7, 'Klint', 'Berth', 'klint', '0251346987', 'klintberth@email.com', '$2y$10$CXg84CWnyQ5hNq7GqXayee2MV/ibI.lB4uiabQB4eiS7T7lBE7F9e', 0, 'Moderator', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `carousel_id` varchar(15) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `admin_id` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `tittle` varchar(200) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `venue` varchar(200) NOT NULL,
  `town` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `info_email` varchar(60) DEFAULT NULL,
  `info_contact` varchar(20) DEFAULT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `tittle`, `content`, `date`, `time`, `venue`, `town`, `country`, `info_email`, `info_contact`, `admin_id`) VALUES
(1, 'Girls In Information Technology Training', '1. Web Development 2. Multimedia authoring (Adobe photoshop, Adobe premiere) 3. Microsoft Office Suite', '2022-07-25', '07:30:00', 'Irrba Training Center', 'Takoradi', 'Ghana', 'irrbawebsdev@gmail.com', '0205823707', 2),
(3, 'Musical Concert', 'A musical event organized by musical groups in University of Education, Winneba. This program is meant to bring joy to the university community.', '2022-08-05', '18:30:00', 'Jophous Anamoah Conference Center', 'Winneba', 'Ghana', 'irbbawebsdev@gmail.com', '0205823707', 2);

-- --------------------------------------------------------

--
-- Table structure for table `events_likes`
--

CREATE TABLE `events_likes` (
  `evntlike_id` varchar(15) NOT NULL,
  `event_id` varchar(15) NOT NULL,
  `member_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `surname` varchar(35) NOT NULL,
  `email` varchar(65) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `means_of_contact` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `firstname`, `surname`, `email`, `phone_number`, `password`, `means_of_contact`, `status`) VALUES
(1, 'Raymond', 'Affedzie', 'raymondaffedzie@gmail.com', '0205823707', '$2y$10$yGovB.AbEBAKD8etU3AJv.qagepsjP1S2sVfVlTHR6WPEknxSZSTW', 'email', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `motivation`
--

CREATE TABLE `motivation` (
  `motiv_id` varchar(15) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_extension` varchar(5) NOT NULL,
  `admin_id` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `new_id` int(11) NOT NULL,
  `tittle` text NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `publisher_name` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `source` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`new_id`, `tittle`, `content`, `image`, `publisher_name`, `admin_id`, `date`, `source`) VALUES
(1, 'Contrary to popular belief', 'Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. \r\n\r\nLorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32', 'news62d5751fc2fcd9.34375530.jpg', 'Jog Joe', 2, '2022-07-12', 'Lorem Ipsum'),
(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', 'news62d571d1069620.66713739.jpg', 'Dummy Text', 2, '2022-07-13', 'Lorem Ipsum'),
(5, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'news62d5755fa367c0.53931035.jpg', 'Lorem Ipsum', 2, '2022-07-18', 'https://www.lipsum.com/');

-- --------------------------------------------------------

--
-- Table structure for table `news_comments`
--

CREATE TABLE `news_comments` (
  `nwscmnt_id` varchar(15) NOT NULL,
  `news_id` varchar(15) NOT NULL,
  `member_id` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news_like`
--

CREATE TABLE `news_like` (
  `nwslike_id` varchar(15) NOT NULL,
  `news_id` varchar(15) NOT NULL,
  `member_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `pwd_reset_id` int(11) NOT NULL,
  `pwd_reset_email` varchar(60) NOT NULL,
  `pwd_reset_token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`pwd_reset_id`, `pwd_reset_email`, `pwd_reset_token`) VALUES
(31, 'raymondaffedzie@gmail.com', 467999),
(32, 'stephenymensah@gmail.com', 769504);

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `story_id` varchar(250) NOT NULL,
  `tittle` text NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `date` date NOT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(40) NOT NULL,
  `member_id` varchar(10) NOT NULL,
  `status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `story_approval`
--

CREATE TABLE `story_approval` (
  `stapproval_id` int(11) NOT NULL,
  `story_id` varchar(250) NOT NULL,
  `admin_id` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `story_comments`
--

CREATE TABLE `story_comments` (
  `stcomnt_id` int(11) NOT NULL,
  `story_id` varchar(250) NOT NULL,
  `member_id` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `story_likes`
--

CREATE TABLE `story_likes` (
  `stlike_id` int(11) NOT NULL,
  `story_id` varchar(250) NOT NULL,
  `member_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subcriptions`
--

CREATE TABLE `subcriptions` (
  `sub_id` varchar(15) NOT NULL,
  `product` varchar(20) NOT NULL,
  `member_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `video_library`
--

CREATE TABLE `video_library` (
  `file_id` varchar(15) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_extension` varchar(5) DEFAULT NULL,
  `tittle` varchar(255) NOT NULL,
  `admin_id` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_registration`
--
ALTER TABLE `admin_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EMAIL` (`email`),
  ADD UNIQUE KEY `PHONE_NUMBER` (`phone_number`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`carousel_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `events_likes`
--
ALTER TABLE `events_likes`
  ADD PRIMARY KEY (`evntlike_id`),
  ADD UNIQUE KEY `member_id` (`member_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `motivation`
--
ALTER TABLE `motivation`
  ADD PRIMARY KEY (`motiv_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`new_id`);

--
-- Indexes for table `news_comments`
--
ALTER TABLE `news_comments`
  ADD PRIMARY KEY (`nwscmnt_id`);

--
-- Indexes for table `news_like`
--
ALTER TABLE `news_like`
  ADD PRIMARY KEY (`nwslike_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`pwd_reset_id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`story_id`);

--
-- Indexes for table `story_approval`
--
ALTER TABLE `story_approval`
  ADD PRIMARY KEY (`stapproval_id`),
  ADD KEY `story_id` (`story_id`);

--
-- Indexes for table `story_comments`
--
ALTER TABLE `story_comments`
  ADD PRIMARY KEY (`stcomnt_id`);

--
-- Indexes for table `story_likes`
--
ALTER TABLE `story_likes`
  ADD PRIMARY KEY (`stlike_id`),
  ADD UNIQUE KEY `member_id` (`member_id`);

--
-- Indexes for table `subcriptions`
--
ALTER TABLE `subcriptions`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `video_library`
--
ALTER TABLE `video_library`
  ADD PRIMARY KEY (`file_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_registration`
--
ALTER TABLE `admin_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `pwd_reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `story_approval`
--
ALTER TABLE `story_approval`
  MODIFY `stapproval_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `story_comments`
--
ALTER TABLE `story_comments`
  MODIFY `stcomnt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `story_likes`
--
ALTER TABLE `story_likes`
  MODIFY `stlike_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
