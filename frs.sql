-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 15, 2024 at 11:05 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frs`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`post_id`, `title`, `content`, `category_id`, `status`, `created_at`) VALUES
(1, 'Top Security Tips for 2024', 'Here are the top security trends to follow this year...', 1, 1, '2024-11-02 12:33:47'),
(2, 'Common Fraud Schemes to Avoid', 'Learn how to recognize common fraud schemes...', 2, 1, '2024-11-02 12:33:47'),
(3, 'How to Protect Your Identity Online', 'Identity theft is a major concern...', 3, 1, '2024-11-02 12:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Security Tips'),
(2, 'Fraud Prevention'),
(3, 'Identity Protection');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_answer` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`) VALUES
(1, 'What is phishing?', 'A technique to guess someone’s password', 'A method to steal sensitive information by pretending to be a trustworthy source', 'A type of virus that affects only mobile devices', 'A technique to encrypt data', 'B'),
(2, 'Which of the following is a strong password?', 'password123', '123456', 'Qw3rty$7!', 'admin', 'C'),
(3, 'If you receive an email from an unknown sender asking for personal information, what should you do?', 'Reply with your information to check if it’s a scam', 'Click the links to verify their authenticity', 'Ignore the email or mark it as spam', 'Forward the email to friends for their opinion', 'C'),
(4, 'What is a common sign of a phishing website?', 'The URL starts with https://', 'The website has high-quality images and design', 'The URL has misspellings or strange characters', 'The website has a contact us page', 'C'),
(5, 'What is two-factor authentication?', 'A method that allows multiple people to log in with the same password', 'A security process that requires two different forms of identification', 'A technique to generate complex passwords', 'A process that makes it impossible to log in from mobile devices', 'B'),
(6, 'Which of the following is a common type of online fraud?', 'Pump and Dump scheme', 'Waterfall Scheme', 'Triangle Scheme', 'Rain Scheme', 'A'),
(7, 'What should you do if you suspect an email to be a phishing attempt?', 'Reply to verify their authenticity', 'Report the email as phishing', 'Save the email for future reference', 'Ignore it completely', 'B'),
(8, 'What is a common characteristic of a secure website?', 'It has a lengthy URL', 'The address begins with \"http://\"', 'The address begins with \"https://\"', 'It uses only capital letters in the URL', 'C'),
(9, 'What is malware?', 'A protective software', 'A type of email scam', 'Software designed to cause harm to a computer system', 'A tool for encrypting emails', 'C'),
(10, 'How can you protect yourself from online fraud?', 'Share your passwords with trusted friends', 'Avoid two-factor authentication', 'Keep your software and systems updated', 'Use the same password across multiple sites', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `r_id` int(11) NOT NULL,
  `r_title` varchar(100) DEFAULT NULL,
  `r_cat` varchar(100) NOT NULL,
  `r_comm` varchar(100) NOT NULL,
  `r_offer` varchar(100) DEFAULT NULL,
  `r_offer2` varchar(100) DEFAULT NULL,
  `r_bearer` varchar(100) DEFAULT NULL,
  `r_platform` varchar(100) DEFAULT NULL,
  `r_profile` varchar(100) DEFAULT NULL,
  `r_todo` varchar(100) DEFAULT NULL,
  `r_payment` varchar(100) DEFAULT NULL,
  `r_amount` int(11) DEFAULT NULL,
  `r_date` date NOT NULL,
  `r_any` varchar(500) DEFAULT NULL,
  `r_track` varchar(100) NOT NULL,
  `r_status` int(11) NOT NULL DEFAULT '0',
  `r_count` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`r_id`, `r_title`, `r_cat`, `r_comm`, `r_offer`, `r_offer2`, `r_bearer`, `r_platform`, `r_profile`, `r_todo`, `r_payment`, `r_amount`, `r_date`, `r_any`, `r_track`, `r_status`, `r_count`, `date`) VALUES
(1, 'New Form of fraud', 'Something else', 'Physical', 'No', 'No', NULL, 'Email Address', 'ibrahimwali4u@gmail.com', 'Here is the real deal', 'Bank Transfer', 1000, '2022-10-17', 'This is the first time', 'a383833368d8986c00f3e648483338190cfd', 0, 0, '2022-10-18 23:45:30'),
(2, NULL, 'Something else', 'Physical', 'No', 'No', NULL, 'Email Address', 'ibrahimwali4u@gmail.com', 'Here is the real deal', 'Bank Transfer', 1000, '2022-10-17', 'This is the first time', 'dd15560949068b2e38e9742ede3dc9b31597', 0, 0, '2022-10-19 00:07:15'),
(3, 'Data processing scam', 'money', 'Text Message', 'No', 'Yes', NULL, 'Twitter', 'ibwalii', 'Message back', 'Bank Transfer', 9993, '2022-10-17', 'Hello for desc', '97c0bccbcce235527256e9401d83874b7dea', 1, 0, '2022-10-19 00:10:15'),
(4, NULL, 'An Impersator', 'Text Message', 'Yes', 'Yes', NULL, 'Insagram', '', '', 'Bank Transfer', 5000, '2024-11-01', 'hello', '42c34ba5774ff159b88662d370c450e29157', 0, 0, '2024-11-03 15:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `reports_comments`
--

CREATE TABLE `reports_comments` (
  `rc_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `rc_name` varchar(100) NOT NULL,
  `rc_email` varchar(100) NOT NULL,
  `rc_remark` varchar(500) NOT NULL,
  `rc_status` int(11) NOT NULL,
  `rc_priv` int(11) NOT NULL,
  `rc_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports_comments`
--

INSERT INTO `reports_comments` (`rc_id`, `r_id`, `rc_name`, `rc_email`, `rc_remark`, `rc_status`, `rc_priv`, `rc_date`) VALUES
(1, 3, 'ibrahim', 'ibrahimwali4u@gmail.com', 'A message from comment', 0, 0, '2022-10-21 06:37:01'),
(2, 3, 'Wali', 'wali@gmail.com', 'It is the trend now', 0, 0, '2022-10-21 06:37:05'),
(3, 3, 'admin', 'admin@admin.com', 'It is designated a high risk', 1, 1, '2022-10-21 07:10:59'),
(4, 3, 'admin', 'admin@admin.com', 'It is designated a high risk.', 1, 1, '2022-10-21 20:21:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `reports_comments`
--
ALTER TABLE `reports_comments`
  ADD PRIMARY KEY (`rc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports_comments`
--
ALTER TABLE `reports_comments`
  MODIFY `rc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
