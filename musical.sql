-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 03:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musical`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_mail` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_mail`, `admin_password`) VALUES
(1, 'Mansi Patel', 'mansipatel17.imscit17@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `instrument_id` int(11) NOT NULL,
  `academy_id` int(11) NOT NULL,
  `course_cost` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `instrument_id`, `academy_id`, `course_cost`) VALUES
(1, 'Modern Pop Piano', 1, 12, '2500'),
(2, 'Jazz Piano', 1, 7, '3000'),
(3, 'Latin Piano', 1, 7, '3500'),
(4, 'Blues Piano', 1, 4, '2000'),
(5, 'Pro Drum', 2, 10, '3000'),
(6, 'Advance Level Drum', 2, 9, '3000'),
(7, 'Classical  Drum', 2, 3, '2500'),
(8, 'Bongo Drum', 2, 12, '4000');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `enrollment_date` date NOT NULL,
  `enrollment_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollment_id`, `user_id`, `course_id`, `enrollment_date`, `enrollment_amount`) VALUES
(1, 1, 1, '2020-04-07', 2500),
(2, 0, 1, '2020-04-08', 2500),
(3, 2, 1, '2020-04-08', 2500),
(4, 2, 2, '2020-04-08', 3000),
(5, 3, 1, '2020-04-08', 2500),
(6, 3, 2, '2020-04-08', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_date` date NOT NULL,
  `feedback_description` varchar(50) NOT NULL,
  `feedback_rating` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `academy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instrument`
--

CREATE TABLE `instrument` (
  `instrument_id` int(11) NOT NULL,
  `instrument_name` varchar(50) NOT NULL,
  `instrument_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instrument`
--

INSERT INTO `instrument` (`instrument_id`, `instrument_name`, `instrument_photo`) VALUES
(1, 'Piano', 'images/instrument-photos/piano.png'),
(2, 'Drum', 'images/instrument-photos/drum.png');

-- --------------------------------------------------------

--
-- Table structure for table `musical_academy`
--

CREATE TABLE `musical_academy` (
  `musical_academy_id` int(11) NOT NULL,
  `musical_academy_name` varchar(50) NOT NULL,
  `musical_academy_logo` varchar(50) NOT NULL,
  `musical_academy_mobileno` varchar(11) NOT NULL,
  `musical_academy_email` varchar(50) NOT NULL,
  `musical_academy_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `musical_academy`
--

INSERT INTO `musical_academy` (`musical_academy_id`, `musical_academy_name`, `musical_academy_logo`, `musical_academy_mobileno`, `musical_academy_email`, `musical_academy_password`) VALUES
(2, 'Musical Academy', 'logo1', '9574621820', 'musicalacademy09@gmail.com', '123'),
(3, 'star academy', 'logo2', '128545675', 'star@gmail.com', '123'),
(4, 'Rhythm Academy', 'logo3', '7894561231', 'rhythmacademy@gmail.com', '123'),
(5, 'Piano  Academy', 'logo3', '5467891225', 'piano@gmail.com', '123'),
(6, 'Music School', 'logo4', '4567891235', 'music@gmail.com', '123'),
(7, 'Real Piano Teacher', 'logo5', '5243672156', 'realpiano@gmail.com', '123'),
(8, 'Music Tutor', 'logo6', '275648964', 'musictutor@gmail.com', '123'),
(9, 'Bang Bang Academy', 'logo7', '9876524852', 'bang@gmail.com', '123'),
(10, 'saregama Academy', 'logo8', '9574621822', 'saregama@gmail.com', '123'),
(11, 'Rockstar Academy', 'logo', '9537648595', 'rock@gmail.com', '123'),
(12, 'Raj Musical Academy', 'images/musical-logo/1586339924.png', '9012034590', 'rajmusic@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `enrollment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tune`
--

CREATE TABLE `tune` (
  `tune_id` int(11) NOT NULL,
  `tune_name` varchar(50) NOT NULL,
  `tune_url` varchar(50) NOT NULL,
  `instrument_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_gender`) VALUES
(1, 'Jinali Sanghvi', 'jinali.imscit17@gmail.com', 'Jinaa#004', ''),
(2, 'Sourabh Shah', 'sourabh@gmail.com', '123456', ''),
(3, 'Aaryan Patel', 'aaryanpatel@gmail.com', '12345678', '');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video_id` int(11) NOT NULL,
  `video_title` varchar(50) NOT NULL,
  `video_description` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `video_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_id`, `video_title`, `video_description`, `course_id`, `video_url`) VALUES
(1, 'Piano-Inroduction', 'Piano Basic Introduction', 1, 'https://youtu.be/827jmswqnEA'),
(2, 'Piano-beginner', 'Piano Beginner tutorials', 2, 'https://youtu.be/hTmjb9CtsTQ'),
(3, 'Piano-Learn To Play', 'Basic Knowelge -How To Play', 3, 'https://youtu.be/EPxqPw1N1Qk'),
(4, 'Drum Introduction', 'Drum Basic Introduction', 7, 'https://youtu.be/HdiiXOkomKo'),
(5, 'Drum-beginner', 'Drum Beginner tutorials', 7, 'https://youtu.be/t0Jj0YsKl9Q'),
(6, 'Drum-Learn To Play', 'Basic Knowledge -How To Play', 6, 'https://youtu.be/ondTlJEmPYA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `instrument`
--
ALTER TABLE `instrument`
  ADD PRIMARY KEY (`instrument_id`);

--
-- Indexes for table `musical_academy`
--
ALTER TABLE `musical_academy`
  ADD PRIMARY KEY (`musical_academy_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tune`
--
ALTER TABLE `tune`
  ADD PRIMARY KEY (`tune_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instrument`
--
ALTER TABLE `instrument`
  MODIFY `instrument_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `musical_academy`
--
ALTER TABLE `musical_academy`
  MODIFY `musical_academy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tune`
--
ALTER TABLE `tune`
  MODIFY `tune_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
