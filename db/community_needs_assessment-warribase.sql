-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 10:45 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `community_needs_assessment`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `contribution_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `response` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `contribution_id`, `quiz_id`, `response`) VALUES
(50, 2, 2, '3r2'),
(51, 2, 3, 'Yes'),
(52, 2, 4, 'wr3'),
(53, 2, 1, ' No'),
(54, 2, 2, '3r2'),
(55, 2, 3, 'Yes'),
(56, 2, 4, 'wr3'),
(57, 2, 1, ' No'),
(58, 2, 2, '3r2'),
(59, 2, 3, 'Yes'),
(60, 2, 4, 'wr3'),
(61, 3, 1, 'Yes'),
(62, 3, 2, 'ferferferf'),
(63, 3, 3, 'Yes'),
(64, 3, 4, 'wertyuiop'),
(65, 4, 1, 'Yes'),
(66, 4, 2, 'very far bro'),
(67, 4, 3, 'Yes'),
(68, 4, 4, 'what is going on'),
(69, 5, 1, 'Yes'),
(70, 5, 2, 'wdsfsfd'),
(71, 5, 3, ' No'),
(72, 5, 4, 'fdfd'),
(73, 5, 1, 'Yes'),
(74, 5, 2, 'dfdfdf'),
(75, 5, 3, 'Yes'),
(76, 5, 4, 'dfdf'),
(77, 5, 1, 'Yes'),
(78, 5, 2, 'dfdf'),
(79, 5, 3, ' No'),
(80, 5, 4, 'fdf');

-- --------------------------------------------------------

--
-- Table structure for table `contribution`
--

CREATE TABLE `contribution` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `lga` varchar(500) NOT NULL,
  `community` varchar(500) NOT NULL,
  `ward` varchar(500) NOT NULL,
  `unit` varchar(500) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `disability` varchar(5) NOT NULL,
  `age_range` varchar(10) NOT NULL,
  `education_obtained` varchar(20) NOT NULL,
  `employment_status` varchar(100) NOT NULL,
  `trade_skill` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contribution`
--

INSERT INTO `contribution` (`id`, `name`, `phone_number`, `email`, `lga`, `community`, `ward`, `unit`, `gender`, `disability`, `age_range`, `education_obtained`, `employment_status`, `trade_skill`, `date_created`, `completed`) VALUES
(2, 'SOYOYE OLUWATUNMISE ADELPHINE', '08012345678', 'SOYOYE@test.com', 'wertyuiopoiuytrewertyui', 'wertyuiopoiuytrewert', 'wertyuiop;lkiujytrsdcfvg', 'wertyuiop[poiuytre', 'Female', 'No', '25-34', 'Primary', 'Employed', 'we3r4tyuiop[oiuy6t5r4334', 1652457906, 0),
(3, 'fweewfwef qfewfqwefwef fwefwefwefwefwef wefwef', '22222222222', 'ewe@rer.com', '2r2r23r', 'r23r2r32r', 'wfwfwe', 'fwefwfwf', 'Male', 'Yes', '45-54', 'Primary', 'Out of work and looking for work', 'fwefwf', 1652484732, 0),
(4, 'tgrgtrbtrbb', '55555555555', 'trtrt@t.ff', '4tg4v4tv4', 'v44tv4', 'v4tgvrfgfvf', 'gvfvfgv', 'Male', 'Yes', '45-54', 'Secondary', 'Self-employed', 'vfgvrrvrvr', 1652510300, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1652005394),
('m130524_201442_init', 1652005404),
('m190124_110200_add_verification_token_column_to_user_table', 1652005404);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `options` varchar(1000) DEFAULT NULL,
  `input_type` int(1) NOT NULL DEFAULT 1,
  `sort_order` int(3) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `section_id`, `question`, `options`, `input_type`, `sort_order`, `active`) VALUES
(1, 1, 'Do you have a public primary school in your community? ', 'Yes, No', 1, 1, 1),
(2, 1, 'If no, how far away is the next public primary school?', '', 2, 2, 1),
(3, 2, 'Do you have a public secondary school?', 'Yes, No', 1, 1, 1),
(4, 3, 'What do you want the incoming government to do for you?', '', 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `description`, `sort_order`, `active`) VALUES
(1, 'PRIMARY SCHOOL', 1, 1),
(2, 'SECONDARY SCHOOL', 2, 1),
(3, 'WETIN UNA WANT', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'tvaHgnxcAFcV9Fd6LZoMxf2oGvguABaX', '$2y$13$8WiiDsERDmx3mNvhMLBHye8G/HW9MfQDe2.sM6P/VcoZ4OnsdBBF6', NULL, 'anyirahosemeke@gmail.com', 10, 1652005748, 1652486004, 'CfHCzj4_S0h6QKR4R1pswZiSny_tcK4U_1652005748');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contribution`
--
ALTER TABLE `contribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `contribution`
--
ALTER TABLE `contribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
