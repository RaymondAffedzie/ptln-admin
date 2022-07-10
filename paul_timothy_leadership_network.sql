-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2022 at 09:18 PM
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
  `status` text NOT NULL DEFAULT 'Moderator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_registration`
--

INSERT INTO `admin_registration` (`id`, `firstname`, `surname`, `username`, `phone_number`, `email`, `password`, `pwd_reset_token`, `status`) VALUES
(1, 'George Kwamina', 'Ntsiful', 'jerry', '0247834206', 'georgentsifulkwamina@gmail.com', '$2y$10$apl732qNFzcuMQHN1mv9QO8vcr.ABQyAUV3QIBN/YKUdFkUR25w6y', 0, 'Administrator'),
(2, 'Raymond', 'Affedzie', 'berth_ray', '0247692388', 'raymondaffedzie@gmail.com', '$2y$10$U7Pnn2F/Zg1Fb4SIZueLieQ2j69aS3axPNBZ3tdgME4Vhp76j8p62', 467999, 'Administrator'),
(3, 'Stephen', 'Mensah', 'stephy', '0553053239', 'stephenymensah@gmail.com', '$2y$10$yNjrJvHTn8b0j0NIygCyHO2BKZ.K4rtlvRI8vw53TQOV/fVq55y2W', 769504, 'Administrator'),
(4, 'Jane', 'Doe', 'janedoe', '0123456789', 'janedoe@email.com', '$2y$10$EUvq3w9ZIDvBgZjdoZ0HiO.B.WaRfUUnxNhVXeS5J96CDYpS0/Jxq', 0, 'Moderator');

-- --------------------------------------------------------

--
-- Table structure for table `be_part_of_us`
--

CREATE TABLE `be_part_of_us` (
  `member_id` varchar(15) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `surname` varchar(35) NOT NULL,
  `email` varchar(65) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `means_of_contact` varchar(15) NOT NULL,
  `category_of_joining` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `event_id` varchar(15) NOT NULL,
  `tittle` varchar(200) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `venue` varchar(200) NOT NULL,
  `town` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `info-email` varchar(60) DEFAULT NULL,
  `info-contact` varchar(20) DEFAULT NULL,
  `admin_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `new_id` varchar(15) NOT NULL,
  `tittle` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `publisher_name` varchar(60) NOT NULL,
  `admin_id` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `source` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `story_id` varchar(15) NOT NULL,
  `tittle` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `date` date NOT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(40) NOT NULL,
  `member_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `story_approval`
--

CREATE TABLE `story_approval` (
  `stapproval_id` varchar(15) NOT NULL,
  `story_id` varchar(15) NOT NULL,
  `admin_id` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `story_comments`
--

CREATE TABLE `story_comments` (
  `stcomnt_id` varchar(15) NOT NULL,
  `story_id` varchar(15) NOT NULL,
  `member_id` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `story_likes`
--

CREATE TABLE `story_likes` (
  `stlike_id` varchar(15) NOT NULL,
  `story_id` varchar(15) NOT NULL,
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
-- Indexes for table `be_part_of_us`
--
ALTER TABLE `be_part_of_us`
  ADD PRIMARY KEY (`member_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `pwd_reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events_likes`
--
ALTER TABLE `events_likes`
  ADD CONSTRAINT `events_likes_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `be_part_of_us` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_comments`
--
ALTER TABLE `news_comments`
  ADD CONSTRAINT `news_comments_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `be_part_of_us` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_comments_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`new_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_like`
--
ALTER TABLE `news_like`
  ADD CONSTRAINT `news_like_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `be_part_of_us` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `story_approval`
--
ALTER TABLE `story_approval`
  ADD CONSTRAINT `story_approval_ibfk_1` FOREIGN KEY (`story_id`) REFERENCES `story` (`story_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `story_comments`
--
ALTER TABLE `story_comments`
  ADD CONSTRAINT `story_comments_ibfk_1` FOREIGN KEY (`story_id`) REFERENCES `story` (`story_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `story_comments_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `be_part_of_us` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `story_likes`
--
ALTER TABLE `story_likes`
  ADD CONSTRAINT `story_likes_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `be_part_of_us` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcriptions`
--
ALTER TABLE `subcriptions`
  ADD CONSTRAINT `subcriptions_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `be_part_of_us` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
