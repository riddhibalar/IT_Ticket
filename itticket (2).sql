-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2019 at 11:33 AM
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
-- Database: `itticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fname`, `lname`, `email`, `feedback`) VALUES
('Riddhi', 'Balar', 'rbalar26@gmail.com', 'Thank you ITTICKET. Very cool!'),
('Riddhi', 'Balar', 'rbalar26@gmail.com', 'Nice website.'),
('Riddhi', 'Balar', 'rbalar26@gmail.com', 'Nice website.'),
('Hetul', 'Bhatt', 'hetul21@gmail.com', 'I like this feedback system.'),
('prizesh', 'bhadaniya', 'prizeshbhadaniya807@gmail.com', 'excellent');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id` int(5) UNSIGNED NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `registertime` int(11) UNSIGNED NOT NULL,
  `resolvetime` int(11) DEFAULT NULL,
  `assignment` varchar(10) DEFAULT NULL,
  `resolution` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`id`, `password`, `email`, `subject`, `description`, `registertime`, `resolvetime`, `assignment`, `resolution`) VALUES
(1, NULL, 'hetul21@gmail.com', 'First', 'This is the first issue.', 1552836945, NULL, 'no', NULL),
(2, NULL, 'hetul21@gmail.com', 'First', 'This is the first issue', 1552837275, NULL, 'no', NULL),
(3, NULL, 'hetul21@gmail.com', 'First', 'This is the first issue', 1552837395, NULL, 'no', NULL),
(4, NULL, 'hetul21@gmail.com', 'First', 'This is the first issue', 1552838891, NULL, 'no', NULL),
(5, NULL, 'hetul21@gmail.com', 'First', 'This is the first issue', 1552838970, NULL, 'no', NULL),
(8, NULL, 'hetul21@gmail.com', 'Assignment', 'Assignment should work properly.', 1553163254, NULL, 'Gamma', NULL),
(9, NULL, 'shilpapatel243@gmail.com', 'Internet Is not working', 'Internet is not working', 1553195070, NULL, 'Beta', NULL),
(10, NULL, 'shilpapatel243@gmail.com', 'IT ISUUE', 'Internet is not working', 1553196005, 1554223992, 'Alpha', 'This a drill. Sorry for the emails.'),
(11, NULL, 'prajapati8721@gmail.com', 'Beta testing', 'Can you guys please stop bothering me? Thanks.', 1553196194, NULL, 'Beta', NULL),
(12, NULL, 'shilpapatel243@gmail.com', 'Internet Issue', 'Internet is not working', 1553801006, NULL, 'Beta', NULL),
(13, NULL, 'patelnirmal761@yahoo.com', 'internet', 'uigfourgb g', 1553801157, 1554282149, 'Alpha', 'kdshgvv\r\n'),
(14, NULL, 'patelnirmal761@yahoo.com', 'internet', 'internet is not working.', 1553801338, 1554282327, 'Alpha', 'ppisdj\r\n'),
(15, NULL, 'hetul21@gmail.com', 'Halting Problem', 'My machine is not halting.', 1554225828, 1554225915, 'Gamma', 'Wait and watch.'),
(16, NULL, 'hetul21@gmail.com', 'Pancakes', 'Pancakes are overcooked.', 1554240900, 1554228038, 'Alpha', 'Jffufuf kgfhf'),
(17, NULL, 'riddhi26@gmail.com', 'Hssj', 'Hzhzhzjz hsgdhsj', 1554240248, NULL, 'Beta', NULL),
(18, NULL, 'hetul21@gmail.com', 'Alpha Testing', 'Environment not covering all the cases.', 1554243611, 1554282608, 'Alpha', 'adhioepv\r\n'),
(19, NULL, 'hetul21@gmail.com', 'Alpha Testing 2', 'Again', 1554243686, 1554282694, 'Alpha', 'ahdidvv'),
(20, NULL, 'hetul21@gmail.com', 'Alpha Testing 2', 'Again', 1554243760, 1554282878, 'Alpha', 'auehf'),
(21, NULL, 'hetul21@gmail.com', 'Alpha Testing 2', 'Again', 1554243775, 1554285677, 'Alpha', 'Abdhrys. ushd\r\n'),
(22, NULL, 'hetul21@gmail.com', 'Alpha Testing 2', 'Again', 1554243791, 1554281976, 'Alpha', 'solution.\r\n'),
(23, '8oxOHMSgBn', 'hetul21@gmail.com', 'Popcorn', 'Popcorn kernels bad.', 1554287121, 1554281226, 'Beta', 'Popcorn time.'),
(24, '0zNf4yAdUn', 'hetul21@gmail.com', 'Popcorn', 'Popcorn kernels bad.', 1554287235, NULL, 'Beta', NULL),
(25, 'UYNABiGnK9', 'hetul21@gmail.com', 'Tubelight', 'Tubelights are not working.', 1554297564, NULL, 'Gamma', NULL),
(26, 'lb4x7HqVZJ', 'hetul21@gmail.com', 'Tubelight', 'Tubelights are not working.', 1554297653, NULL, 'Gamma', NULL),
(27, 'FElYUD3aej', 'hetul21@gmail.com', 'Tubelight', 'Tubelights are not working.', 1554297893, NULL, 'Gamma', NULL),
(28, 'IYwa2H1gVX', 'hetul21@gmail.com', 'Tubelight', 'Tubelights are not working.', 1554298087, NULL, 'Gamma', NULL),
(29, 'FfuPZEer9i', 'rbalar26@gmail.com', 'Php not working properly ', 'Gafagag ayagafab ggagah', 1554632187, NULL, 'Beta', NULL),
(30, NULL, 'hetul21@gmail.com', 'Check', 'check main', 1554925403, NULL, 'Gamma', NULL),
(31, NULL, 'hetul21@gmail.com', 'Airtel', 'Airtel prob', 1554935367, 1554955624, 'Alpha', 'AIREL DIO T USE\r\n'),
(32, NULL, 'hetul21@gmail.com', 'ddfu', 'wwnfiwvb', 1554969286, 1554963904, 'Alpha', 'Here goes the solution'),
(33, NULL, 'hetul21@gmail.com', 'ddfu', 'wwnfiwvb', 1554969410, 1554970087, 'Alpha', 'This is a solution '),
(34, NULL, 'hetul21@gmail.com', 'ddfu', 'wwnfiwvb', 1554969459, NULL, 'Alpha', NULL),
(35, NULL, 'hetul21@gmail.com', 'ddfu', 'wwnfiwvb', 1554969494, NULL, 'Alpha', NULL),
(36, NULL, 'hetul21@gmail.com', 'Vodafone', 'Network error.', 1554971843, NULL, 'Beta', NULL),
(37, NULL, 'hetul21@gmail.com', 'Idea', 'Idea is a bad company.', 1554972463, NULL, 'Alpha', NULL),
(38, NULL, 'hetul21@gmail.com', 'Dynamic site', 'I like dynamic sites.', 1554972724, NULL, 'Alpha', NULL),
(39, 'BMTt4djwSe', 'hetul21@gmail.com', 'REgiss', 'REgiss check', 1554973234, 1554969984, 'Alpha', 'This is a solution '),
(40, 'LOd9EHBr2y', 'hetul21@gmail.com', 'Bicycles', 'Throttle not working ', 1554982199, NULL, 'Alpha', NULL),
(41, 'qpYQgf8DTs', 'hetul21@gmail.com', 'Mail', 'Is it working?', 1554983339, NULL, 'Alpha', NULL),
(42, 'hnKlLo7Mvg', 'hetul21@gmail.com', 'Random', 'Email issue', 1554984093, NULL, 'Alpha', NULL),
(43, 'zKmObdF6r3', 'hetul21@gmail.com', 'yellow', 'green', 1554984147, 1554974864, 'Alpha', 'hello world'),
(44, 'bBuo1OE4TD', 'gadarajainik1@gmail.com', 'Wifi drivers not working', 'Ahaha', 1554986419, NULL, 'Alpha', NULL),
(45, '3ZcymJRgzL', 'prizeshbhadaniya807@gmail.com', 'IT', 'vodafone', 1554986718, 1554974814, 'Alpha', 'you should not use js more\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
