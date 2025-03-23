-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2025 at 04:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alijis_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `accountUsername` varchar(100) NOT NULL,
  `accountPassword` varchar(100) NOT NULL,
  `accountLogin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `accountUsername`, `accountPassword`, `accountLogin`) VALUES
(1, 'admin', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `feedbackName` varchar(50) NOT NULL,
  `feedbackEmail` varchar(50) NOT NULL,
  `feedbackMsg` varchar(255) NOT NULL,
  `feedbackTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `feedbackIsRead` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `feedbackName`, `feedbackEmail`, `feedbackMsg`, `feedbackTime`, `feedbackIsRead`) VALUES
(1, 'danilo burdagol', 'danilo@gmail.com', 'qwertyuiopasdfghjkl123456789', '2025-03-10 06:26:50', 1),
(2, 'harold', 'harold@gmail.com', 'as;dalskdjasd', '2025-03-10 06:28:24', 1),
(3, 'asldjalk', 'asdasd@gmail.com', 'alksjdalksdj21e', '2025-03-10 06:30:03', 1),
(4, 'John Doe', 'john.doe@example.com', 'Excellent product, very user-friendly!', '2025-03-11 03:18:27', 1),
(5, 'Jane Smith', 'jane.smith@example.com', 'Had some issues with delivery, but customer service resolved them quickly.', '2025-03-11 03:18:27', 1),
(6, 'Michael Johnson', 'michael.johnson@example.com', 'Good overall, but the design could be improved.', '2025-03-11 03:18:27', 1),
(7, 'Emily Davis', 'emily.davis@example.com', 'Fast delivery and great product quality!', '2025-03-11 03:18:27', 1),
(8, 'Chris Brown', 'chris.brown@example.com', 'The product is great, but it took too long to arrive.', '2025-03-11 03:18:27', 1),
(9, 'Patricia Wilson', 'patricia.wilson@example.com', 'Affordable and works as expected, no complaints!', '2025-03-11 03:18:27', 1),
(10, 'James Lee', 'james.lee@example.com', 'Not quite what I expected, could use more features.', '2025-03-11 03:18:27', 1),
(11, 'Linda Martin', 'linda.martin@example.com', 'Wonderful experience, would definitely recommend!', '2025-03-11 03:18:27', 1),
(12, 'Robert Harris', 'robert.harris@example.com', 'Decent product, but packaging could have been better.', '2025-03-11 03:18:27', 1),
(13, 'Jessica Clark', 'jessica.clark@example.com', 'Customer service was incredibly helpful, thank you!', '2025-03-11 03:18:27', 1),
(14, 'William Lewis', 'william.lewis@example.com', 'The product is fine, but I had issues with the website interface.', '2025-03-11 03:18:27', 1),
(15, 'Sarah Walker', 'sarah.walker@example.com', 'Amazing quality for the price, exceeded my expectations!', '2025-03-11 03:18:27', 1),
(16, 'David Hall', 'david.hall@example.com', 'Works as advertised, but I feel the price could be a little lower.', '2025-03-11 03:18:27', 1),
(17, 'Megan Allen', 'megan.allen@example.com', 'Website navigation was tricky, but the product itself is great.', '2025-03-11 03:18:27', 1),
(18, 'Daniel Young', 'daniel.young@example.com', 'The product is decent, but it could use a bit more refinement.', '2025-03-11 03:18:27', 1),
(19, 'Nancy King', 'nancy.king@example.com', 'Not satisfied with the quality, the item broke after a week.', '2025-03-11 03:18:27', 1),
(20, 'Joseph Scott', 'joseph.scott@example.com', 'Great product, easy to use, will purchase again!', '2025-03-11 03:18:27', 1),
(21, 'Laura Adams', 'laura.adams@example.com', 'Very happy with the purchase, would recommend to others!', '2025-03-11 03:18:27', 1),
(22, 'Brian Nelson', 'brian.nelson@example.com', 'Good quality product, but had issues with the delivery process.', '2025-03-11 03:18:27', 1),
(23, 'danilo', 'harold.cruz0407@gmail.com', 'alsjdasd', '2025-03-13 01:58:55', 1),
(24, 'asdadasd', 'asdasdajs@gmail.com', 'jashdjasndasd', '2025-03-14 04:02:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks_reply`
--

CREATE TABLE `feedbacks_reply` (
  `id` int(11) NOT NULL,
  `feedbacks_id` int(11) NOT NULL,
  `feedbacks_reply_msg` varchar(250) NOT NULL,
  `feedbacks_reply_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks_reply`
--

INSERT INTO `feedbacks_reply` (`id`, `feedbacks_id`, `feedbacks_reply_msg`, `feedbacks_reply_time`) VALUES
(1, 23, 'Mwaha', '2025-03-13 03:23:15'),
(2, 1, 'zxvzxbzdfb', '2025-03-13 03:25:11'),
(3, 24, 'asdasd', '2025-03-21 02:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `library_news`
--

CREATE TABLE `library_news` (
  `id` int(11) NOT NULL,
  `library_news_subject` varchar(50) NOT NULL,
  `library_news_txt` text NOT NULL,
  `library_news_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_news`
--

INSERT INTO `library_news` (`id`, `library_news_subject`, `library_news_txt`, `library_news_date`) VALUES
(4, 'New Books Available', 'We have added a collection of new books to our shelves. Visit us to explore!', '2025-03-18 01:18:27'),
(5, 'Library Opening Hours Update', 'Starting next week, the library will open at 9 AM every day, including weekends.', '2025-03-18 01:18:27'),
(6, 'Author Visit', 'Join us this Friday for an exclusive author talk and book signing event.', '2025-03-18 01:18:27'),
(7, 'Summer Reading Challenge', 'Sign up for our summer reading challenge and earn rewards for reading!', '2025-03-18 01:18:27'),
(8, 'Library Renovation', 'The library will be undergoing renovations next month. Expect some temporary closures.', '2025-03-18 01:18:27'),
(9, 'Online Resources Update', 'Our online database has been updated with new journals and research papers.', '2025-03-18 01:18:27'),
(10, 'Holiday Closures', 'The library will be closed for the holiday season from December 24th to January 1st.', '2025-03-18 01:18:27'),
(11, 'Book Donation Drive', 'We are accepting book donations! Drop off gently used books at our front desk.', '2025-03-18 01:18:27'),
(12, 'Children’s Story Hour', 'Join us every Saturday at 10 AM for a fun-filled children’s story hour.', '2025-03-18 01:18:27'),
(13, 'Volunteer Opportunities', 'We are looking for volunteers to help with library events. Apply at the front desk.', '2025-03-18 01:18:27'),
(14, 'New Book Collection: History of Art', 'We are excited to announce the addition of a new collection on the History of Art. This collection includes rare books, journals, and detailed visual guides. Whether you are a student of art history or an enthusiast, we invite you to explore these treasures. The books are available on the second floor of the library.', '2025-03-18 02:24:06'),
(15, 'Library Extended Hours During Finals', 'To support our students during finals week, the library will extend its hours. Starting from May 10th, the library will remain open until midnight every day. We encourage students to take advantage of the quiet study spaces and additional resources available during this time. Free coffee will also be available in the student lounge.', '2025-03-18 02:24:06'),
(16, 'New Digital Archives Launched', 'We are proud to announce the launch of our new digital archives, which provide online access to thousands of historical documents, photos, and newspapers from the 20th century. The archives are accessible to all library members and can be accessed from the library’s website or in-house computers.', '2025-03-18 02:24:06'),
(17, 'Library Book Club Registration Open', 'Our library book club is now accepting new members! This month, we will be reading \"The Great Gatsby\" by F. Scott Fitzgerald. The first meeting will be held on March 25th at 6 PM. If you are interested in discussing great literature and meeting new people, come join us for a lively conversation!', '2025-03-18 02:24:06'),
(18, 'Summer Internship Program at the Library', 'The library is now offering a summer internship program for high school and college students. Interns will have the opportunity to work alongside library staff, assist with events, and gain valuable experience in library science. Applications are due by April 15th, so don’t miss your chance to apply.', '2025-03-18 02:24:06'),
(19, 'Weekly Author Meet and Greet', 'We are hosting a weekly author meet and greet every Thursday at 4 PM. Each week, a new local author will come to talk about their work and the writing process. This is a wonderful opportunity to meet authors, ask questions, and get your books signed! Check our website for the list of upcoming authors.', '2025-03-18 02:24:06'),
(20, 'Library Now Offering Virtual Learning Tools', 'In response to the growing demand for online education, the library is now offering a variety of virtual learning tools. This includes access to online courses, tutoring sessions, and interactive learning platforms. All library members can access these tools for free through the library’s website.', '2025-03-18 02:24:06'),
(21, 'Join Our Book Donation Campaign', 'We are kicking off a new campaign to collect books for underprivileged schools in the community. Please donate new or gently used books at the library front desk. Your donations will help us provide resources to children in need and encourage reading in local schools. All donations are greatly appreciated.', '2025-03-18 02:24:06'),
(22, 'New Library Mobile App Launched', 'We are thrilled to announce the launch of our brand-new mobile app! The app allows you to browse the catalog, reserve books, check your account, and receive notifications about upcoming events—all from your phone. Download it today from the App Store or Google Play!', '2025-03-18 02:24:06'),
(23, 'Library Art Exhibit: Local Artists Showcase', 'The library is hosting an art exhibit showcasing works by local artists. The exhibit will feature paintings, sculptures, photography, and mixed-media pieces. The exhibit is open to the public from April 1st to April 15th, and we invite everyone to come and support our talented community artists.', '2025-03-18 02:24:06'),
(24, 'asd', 'asdasd', '2025-03-18 02:30:45'),
(25, 'asd', 'adasd', '2025-03-18 02:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `library_news_img`
--

CREATE TABLE `library_news_img` (
  `id` int(11) NOT NULL,
  `library_news_id` int(11) DEFAULT NULL,
  `library_news_img_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_news_img`
--

INSERT INTO `library_news_img` (`id`, `library_news_id`, `library_news_img_path`) VALUES
(30, 4, './assets/img/libraryNews/gI_150360_original-logos_2016_Aug_6439-57aca7e20ca97nogiftofhstory.png'),
(31, 4, './assets/img/libraryNews/unionmiddle.png'),
(32, 5, './assets/img/libraryNews/unionright.png'),
(33, 5, './assets/img/libraryNews/unionleft.png'),
(34, 5, './assets/img/libraryNews/Union (1).png'),
(35, 6, './assets/img/libraryNews/CloseIcon.png'),
(36, 6, './assets/img/libraryNews/Close.png'),
(37, 7, './assets/img/libraryNews/Frame 1.png'),
(38, 7, './assets/img/libraryNews/Group 839 (1).png'),
(39, 7, './assets/img/libraryNews/Group 839.png'),
(40, 8, './assets/img/libraryNews/background sa level complete page.png'),
(41, 8, './assets/img/libraryNews/ribbon.png'),
(42, 8, './assets/img/libraryNews/Star sa lvl complete page.png'),
(43, 9, './assets/img/libraryNews/Star filled.png'),
(44, 9, './assets/img/libraryNews/Star hollow.png'),
(45, 10, './assets/img/libraryNews/word.png'),
(46, 10, './assets/img/libraryNews/brain.png'),
(48, 24, './assets/img/libraryNews/harold.jpg'),
(50, 7, './assets/img/libraryNews/avatar container.png'),
(51, 7, './assets/img/libraryNews/menu.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks_reply`
--
ALTER TABLE `feedbacks_reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_id` (`feedbacks_id`);

--
-- Indexes for table `library_news`
--
ALTER TABLE `library_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_news_img`
--
ALTER TABLE `library_news_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `library_news_id` (`library_news_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `feedbacks_reply`
--
ALTER TABLE `feedbacks_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `library_news`
--
ALTER TABLE `library_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `library_news_img`
--
ALTER TABLE `library_news_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedbacks_reply`
--
ALTER TABLE `feedbacks_reply`
  ADD CONSTRAINT `feedbacks_reply_ibfk_1` FOREIGN KEY (`feedbacks_id`) REFERENCES `feedbacks` (`id`);

--
-- Constraints for table `library_news_img`
--
ALTER TABLE `library_news_img`
  ADD CONSTRAINT `library_news_img_ibfk_1` FOREIGN KEY (`library_news_id`) REFERENCES `library_news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
