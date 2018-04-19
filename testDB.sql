-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2018 at 03:16 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `printfulDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `answersTable`
--

CREATE TABLE `answersTable` (
  `answer_id` int(11) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `question_id` int(11) NOT NULL,
  `correct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answersTable`
--

INSERT INTO `answersTable` (`answer_id`, `answer`, `question_id`, `correct`) VALUES
(1, 'Lēcas izliekuma vienība grādos', 1, 0),
(2, 'Apgriezts lielums lēcai piemītošajam fokusa attālumam.', 1, 1),
(3, 'Izliekti spoguļi.', 2, 1),
(4, 'Sfēriskie spoguļi.', 2, 0),
(5, 'Ieliekti spoguļi', 2, 0),
(6, '2 sekundēs.', 3, 1),
(7, '60 sekundēs.', 3, 0),
(8, '30 sekundēs.', 3, 0),
(9, 'Kārlis Skalbe', 5, 0),
(10, 'Brāļi Kaudzītes', 5, 1),
(11, 'Anšlavs Eglītis', 5, 0),
(12, 'Klods Monē', 4, 0),
(13, 'Leonardo da Vinči', 4, 1),
(14, 'Pablo Pikaso', 4, 0),
(15, 'Jānis Jaunsudrabiņš', 5, 0),
(16, 'Imants Ziedonis', 5, 0),
(17, 'Jēzus', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questionsTable`
--

CREATE TABLE `questionsTable` (
  `question_id` int(11) NOT NULL,
  `question` varchar(140) NOT NULL,
  `quizz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questionsTable`
--

INSERT INTO `questionsTable` (`question_id`, `question`, `quizz_id`) VALUES
(1, 'Lēcas optiskais stiprums, jeb dioptrija ir:', 1),
(2, 'Kāda tipa spoguļi atstarotos gaismas starus izkliedē?', 1),
(3, 'Cik ātri 5W motors var pacelt 1kg smagu ķieģeli 1m augstumā no zemes?', 1),
(4, 'Kurš no šiem izcilajiem māksliniekiem šeit neiederas?', 2),
(5, 'Kurš latviešu autors ir sarakstījis grāmatu \'Mērnieku Laiki\' ?', 2);

-- --------------------------------------------------------

--
-- Table structure for table `quizzessTable`
--

CREATE TABLE `quizzessTable` (
  `quiz_id` int(11) NOT NULL,
  `quiz_name` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quizzessTable`
--

INSERT INTO `quizzessTable` (`quiz_id`, `quiz_name`) VALUES
(1, 'Fizika'),
(2, 'Māksla');

-- --------------------------------------------------------

--
-- Table structure for table `resultsTable`
--

CREATE TABLE `resultsTable` (
  `result_id` int(11) NOT NULL,
  `score` float NOT NULL,
  `user_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resultsTable`
--

INSERT INTO `resultsTable` (`result_id`, `score`, `user_name`) VALUES
(1, 66.6667, 0),
(2, 66.6667, 0),
(3, 100, 0),
(4, 50, 0),
(5, 0, 0),
(16, 50, 0),
(17, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usersTable`
--

CREATE TABLE `usersTable` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersTable`
--

INSERT INTO `usersTable` (`user_id`, `user_name`) VALUES
(41, 'Abduls'),
(39, 'Arlabunakti'),
(2, 'Chriss'),
(11, 'Erich9'),
(1, 'John');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answersTable`
--
ALTER TABLE `answersTable`
  ADD PRIMARY KEY (`answer_id`),
  ADD UNIQUE KEY `answer_id` (`answer_id`);

--
-- Indexes for table `questionsTable`
--
ALTER TABLE `questionsTable`
  ADD UNIQUE KEY `question_id` (`question_id`);

--
-- Indexes for table `quizzessTable`
--
ALTER TABLE `quizzessTable`
  ADD PRIMARY KEY (`quiz_id`),
  ADD UNIQUE KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `resultsTable`
--
ALTER TABLE `resultsTable`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `usersTable`
--
ALTER TABLE `usersTable`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answersTable`
--
ALTER TABLE `answersTable`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `resultsTable`
--
ALTER TABLE `resultsTable`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usersTable`
--
ALTER TABLE `usersTable`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
