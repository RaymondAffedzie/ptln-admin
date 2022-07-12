-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 03:35 PM
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
(5, 'John', 'Doe', 'john', '+0912345678', 'johndoe@email.com', '$2y$10$1JZNRTKht05m7kBxYnlH/.A9DFF5iiHlGw7KQJiW6q74920/Ulioq', 0, 'Moderator', 'Inactive');

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
(1, 'Girls In Information Technology Training', '1. Web Development 2. Multimedia authoring (Adobe photoshop, Adobe premiere) 3. Microsoft Office Suite', '2022-07-25', '07:30:00', 'Irrba Training Center', 'Takoradi', 'Ghana', 'irrbawebsdev@gmail.com', '0205823707', 2);

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
  `publisher_name` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `source` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`new_id`, `tittle`, `content`, `publisher_name`, `admin_id`, `date`, `source`) VALUES
(1, '39 year Old Black Entrepreneur Makes History, Awarded $13.4 Billion Dollar Defense Contract', 'Meet Isaac Barnes, the young founder and President of Eminent Future, whose Black-owned tech firm has been awarded a $13.4 billion dollar defense contract with the U.S. Airforce and the U.S. Spaceforce.Isaac is a marvel, reminiscent of young Black leaders transcending generations of relevant and personable individuals who have made such an extraordinary mark in history.Hailing from Grand Rapids, Michigan, and growing up disadvantaged yet determined, Isaac’s saga is one recognizable, with an unfamiliar progression. After dropping out of college, he would serve piously with the US Marines, where he prospered as a software engineer and data analyst supporting the Commandant of the Marine Corps. Isaac then went on to work for the Secretary of Defense to produce federal websites and digital products that saved millions of dollars for the Department of Defense.Chris Brown Breaks Two Billboard Records With Latest ‘Breezy’ ReleaseIsaac received numerous awards and accolades for his innovations. His passion for technology and being a steward for the people led him to serve with influence under both the Obama and Trump administrations. His team led the 2017 presidential records transition efforts for President Obama.Notwithstanding his apparent success and still seeking the need to serve by leading, Isaac went on to be the first Black multi-millionaire President of a Federal Digital Product and Innovation Company, Eminent Future. Serving as the President of Eminent Future, he has been paramount in securing a defense contract worth more than $13.4 billion whilst positioning the company to be one of the fastest-growing companies in Arlington, Virginia.Isaac emphatically states, “The biggest issue that we have in America is that we are not working together as one unit; we are not combined.” Isaac combines leadership, entrepreneurship, technology, and spirituality to design growth opportunities within and between organizations and inclusive of communities to generate and instill that cohesive unity in America.On the heels of his remarkable accomplishments, Isaac, in conjunction with business partner Jose Risi established two crypto tokens, xMooney, and a stealth project. xMooney encourages its miners to reduce their carbon footprint while ensuring a more stable and secure blockchain.Now, Isaac is using his platform and resources to give back. He is a vocal advocate for diversity in tech and is working to close the black tech gap. His story inspires anyone who wants to make a difference in the world. He believes cryptocurrency and Web3 are the future, and he is creating pathways for more black and brown people to join the movement.', 'BLACK ENTERPRISE Editors', 2, '2022-07-12', 'www.blackenterprice.com');

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
  `story_id` int(11) NOT NULL,
  `tittle` text NOT NULL,
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `pwd_reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `story_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news_comments`
--
ALTER TABLE `news_comments`
  ADD CONSTRAINT `news_comments_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcriptions`
--
ALTER TABLE `subcriptions`
  ADD CONSTRAINT `subcriptions_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
