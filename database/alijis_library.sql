-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2025 at 08:37 AM
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
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `downloads_name` varchar(50) NOT NULL,
  `downloads_path` varchar(100) NOT NULL,
  `downloads_type` varchar(50) NOT NULL,
  `downloads_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `downloads_name`, `downloads_path`, `downloads_type`, `downloads_date`) VALUES
(2, 'DataTables example - Bootstrap 5.pdf', './assets/download/DataTables example - Bootstrap 5.pdf', 'pdf', '2025-03-24 05:57:17'),
(3, 'DTR.pdf', './assets/download/DTR.pdf', 'pdf', '2025-03-24 06:48:09'),
(4, 'CHMSC-L-F08-books-recommended (1).doc', './assets/download/CHMSC-L-F08-books-recommended (1).doc', 'doc', '2025-03-24 07:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `faq_question` varchar(100) NOT NULL,
  `faq_answer` text NOT NULL,
  `faq_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `faq_question`, `faq_answer`, `faq_date`) VALUES
(1, 'How do I borrow reading materials from the CHMSC Alijis Campus Library?', 'To borrow reading materials from the CHMSC Alijis Campus Library, students, faculty, and staff must have a valid, properly validated library card. Students can borrow up to three books from the Circulation or Filipiniana sections and unlimited fiction books for one week, while faculty members can borrow unlimited books from these sections with renewals allowed every two weeks. Administrative support staff may borrow one book for one week. Borrowing starts at 3:00 P.M., and borrowed books must be returned by 10:00 A.M. the next day to avoid overdue fines. Books can be renewed up to twice a semester, and overdue materials must be returned before borrowing new items. If you have overdue materials, you cannot borrow additional books until the fines are settled.', '2025-03-28 05:06:27'),
(2, 'What library services are available in CHMSC Alijis Campus Library?', 'The CHMSC Alijis Campus Library offers a variety of services to its users. These include borrowing/check-out services for students, faculty, and staff with valid library cards, and the returning/check-in of borrowed materials at the counter. Overnight or home use of books is allowed under specific guidelines for different groups (undergraduate students, faculty, and administrative staff). The library also provides book renewals, allowing books to be renewed twice a semester. For researchers, the library offers internet and computer-aided research services, with access to databases like IGI Global and Phil.elib. Reference and information services include chat assistance with librarians, online document delivery, bibliographic requests, and telephone inquiries. The library also facilitates printing and scanning services for library users and offers free Wi-Fi (access code available upon request). Additionally, referral letters are provided for faculty and students who wish to conduct research in neighboring libraries. The library regularly conducts virtual library orientation sessions for freshmen, transferees, and faculty. Lastly, library updates and announcements are shared via their Facebook page and email communications.', '2025-03-28 05:48:26'),
(3, 'What is the penalty for overdue books?', 'The penalty for overdue books at the CHMSC Alijis Campus Library includes fines and restrictions on library access. For students, overdue books from the Circulation and Filipiniana sections are fined Php 1.00 per hour for each book returned after 10:00 A.M. on the due date (excluding holidays, Saturdays, and Sundays), while overdue fiction books incur a fine of Php 1.00 per day. Students are given a maximum of three (3) working days to return overdue books; if the books are not returned within this time, the student will be banned from library services for the rest of the semester, even if the book is returned or the fine is paid during the ban period. For researchers (outsiders), an overdue fine of Php 30.00 per day is charged, provided they have a referral letter from their home institution’s librarian.', '2025-03-28 05:49:48'),
(4, 'Does the CHMSC Alijis Campus Library have a scanner?', 'Yes, the CHMSC Alijis Campus Library provides scanning services to its users. Library users, including faculty and students, can request assistance with scanning reading materials, research references, and other books available in the library.', '2025-03-28 05:50:07');

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
-- Table structure for table `foundation`
--

CREATE TABLE `foundation` (
  `id` int(11) NOT NULL,
  `foundationName` varchar(15) NOT NULL,
  `foundationTxt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foundation`
--

INSERT INTO `foundation` (`id`, `foundationName`, `foundationTxt`) VALUES
(1, 'Mission', 'The College Library commits itself to provide its academic community with essential and appropriate services, required facilities, and balanced collection of materials and resources necessary in meeting the current and future needs of school programs and users’ informational, instructional, and personal requirements. It assumes a pivotal role in institutional development through its commitment to achieve success and efficient delivery of services in various aspects of institutional instruction, research, and public service.'),
(2, 'Vision', 'By 2022, the library will be a one stop learning venue by providing various library information resources and services.'),
(3, 'Goal', 'To enhance the intellectual, physical, artistic, social, aesthetic and spiritual growth and development of students through wise and responsible use of library resources.'),
(4, 'Objectives', 'The library aims to support its mission and vision by providing essential services and resources. It supports the College\'s instruction, research, extension, and production programs while continuously developing a well-balanced collection of library resources. The library ensures that facilities are available to maximize the effective use of these resources and organizes information sources for easy access by customers. Additionally, it collaborates with faculty members to assist in their instructional and research needs. Lastly, the library is committed to offering services tailored to customers with special needs, ensuring inclusivity and accessibility for all.');

-- --------------------------------------------------------

--
-- Table structure for table `guidelines`
--

CREATE TABLE `guidelines` (
  `id` int(11) NOT NULL,
  `guidelineName` varchar(100) NOT NULL,
  `guidelines_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guidelines`
--

INSERT INTO `guidelines` (`id`, `guidelineName`, `guidelines_date`) VALUES
(1, 'Library Access & Identification', '2025-03-27 08:04:01'),
(2, 'Personal Belongings & Responsibility', '2025-03-27 08:08:57'),
(3, 'Entrance & Exit Procedures', '2025-03-27 08:09:23'),
(4, 'Library Conduct & Behavior', '2025-03-27 08:09:58'),
(5, 'Library Materials Usage & Care', '2025-03-27 08:10:45'),
(6, 'Borrowing, Overdue, and Fines', '2025-03-27 08:11:25'),
(7, 'Special Conditions', '2025-03-27 08:11:52'),
(8, 'Library Access & Identification', '2025-03-28 01:16:12'),
(9, 'Library Access & Identification', '2025-03-28 01:16:12'),
(10, 'Library Access & Identification', '2025-03-28 01:16:12'),
(11, 'Library Access & Identification', '2025-03-28 01:16:35'),
(12, 'Library Access & Identification', '2025-03-28 01:16:46'),
(13, 'Library Access & Identification', '2025-03-28 01:18:08'),
(14, 'Special Conditions', '2025-03-28 01:18:17'),
(15, 'Library Access & Identification', '2025-03-28 01:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `guideline_rules`
--

CREATE TABLE `guideline_rules` (
  `id` int(11) NOT NULL,
  `guideline_id` int(11) DEFAULT NULL,
  `guideline_rules_txt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guideline_rules`
--

INSERT INTO `guideline_rules` (`id`, `guideline_id`, `guideline_rules_txt`) VALUES
(2, 1, 'A visitor must present an Identification card and visitor’s I.D. issued by the College Security Guard.'),
(3, 2, 'Valuable things such as cell phones, money, laptops, jewelry, etc., should not be left in the depository area. The person in charge is not accountable for the loss of these items.'),
(4, 2, 'Personal book/s may be brought inside the library provided that permission is first sought from the person assigned at the entrance.'),
(5, 3, 'Customers must log in their library card number in the computer at the entrance upon entering the library.'),
(6, 3, 'Appropriate ways should be utilized for entrance to and exit from the library.'),
(7, 3, 'Customers going in and out of the library are required to have their things checked and inspected before leaving.'),
(8, 4, 'Silence should be observed at all times.'),
(9, 4, 'Eating, sleeping, smoking, and project making are strictly prohibited.'),
(10, 4, 'Orderly and proper use of library furniture and equipment must be observed.'),
(11, 4, 'Cell phones should be set in silent mode.'),
(12, 4, 'Taking pictures of unpublished materials is prohibited.'),
(13, 5, 'Books and other reading materials should be handled with care.'),
(14, 5, 'Books taken from the open shelves area should be placed on the designated shelves or area for easy return by the library staff to appropriate shelves.'),
(15, 5, 'Library material reported lost or damaged must be replaced by the borrower with the latest edition of the same title. If such material is not available in the market, replacement of any current library material of the same subject is allowed, provided the value is not less than the actual amount of the lost or damaged one.'),
(16, 5, 'All library materials must be properly processed before taken out of the library. Anybody caught stealing any library materials shall be subjected to disciplinary action.'),
(17, 5, 'Customers (students, faculty, and staff) are not allowed to borrow any library materials for use by other customers.'),
(18, 5, 'Library card should be used to borrow books and other reading materials.'),
(19, 6, 'Students are given a maximum of three (3) working days to return overdue books, or else they will be banned from library services for the rest of the current semester. The ban is not lifted even if the book is returned or the fine is paid during the ban period.'),
(20, 6, 'Students who borrowed books for home use and who cannot return on the due date can make use of the borrower’s entry slip to avail of library services but for three (3) working days only, as far as policy in banning is concerned.'),
(21, 6, 'A fine slip is issued to students who have overdue fines and is valid for three (3) working days only. It can be used to avail of library services provided a student is not yet banned.'),
(22, 6, 'Payment of fines for overdue library materials and library card replacement should be made at the cashier’s office.'),
(23, 7, 'Charging of cell phones is strictly prohibited.'),
(24, 7, 'Home use of books is not allowed three days before the mid-term and final examinations as well as during the said examinations. It will resume on the last date of mid-term examination. Moreover, during and after signing of clearance, photocopying is allowed provided the clearance form is attached with the library card.'),
(35, 15, 'Library customers with valid identification cards are allowed entrance to the library. For CHMSC students, they must be in proper uniform, with school I.D. and library card.');

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
(25, 'asd', 'adasd', '2025-03-18 02:59:17'),
(26, 'asd', 'asda', '2025-03-24 02:34:42'),
(27, 'asdahfdgh', 'dghghdh', '2025-03-24 02:37:17'),
(28, '678568fityuity', 'u678fgifui', '2025-03-24 02:41:42'),
(29, 'asda', 'sdasdasd', '2025-03-24 03:06:38'),
(30, '546ydrtydrty', '4567h557h7', '2025-03-24 03:11:45');

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
(51, 7, './assets/img/libraryNews/menu.png'),
(54, 28, ''),
(55, 29, ''),
(56, 30, ''),
(57, 11, './assets/img/libraryNews/ribbon.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
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
-- Indexes for table `foundation`
--
ALTER TABLE `foundation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guidelines`
--
ALTER TABLE `guidelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guideline_rules`
--
ALTER TABLE `guideline_rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guideline_id` (`guideline_id`);

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
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `foundation`
--
ALTER TABLE `foundation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guidelines`
--
ALTER TABLE `guidelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `guideline_rules`
--
ALTER TABLE `guideline_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `library_news`
--
ALTER TABLE `library_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `library_news_img`
--
ALTER TABLE `library_news_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedbacks_reply`
--
ALTER TABLE `feedbacks_reply`
  ADD CONSTRAINT `feedbacks_reply_ibfk_1` FOREIGN KEY (`feedbacks_id`) REFERENCES `feedbacks` (`id`);

--
-- Constraints for table `guideline_rules`
--
ALTER TABLE `guideline_rules`
  ADD CONSTRAINT `guideline_rules_ibfk_1` FOREIGN KEY (`guideline_id`) REFERENCES `guidelines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `library_news_img`
--
ALTER TABLE `library_news_img`
  ADD CONSTRAINT `library_news_img_ibfk_1` FOREIGN KEY (`library_news_id`) REFERENCES `library_news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
