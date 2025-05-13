-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 04:57 AM
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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `aboutImg` varchar(255) NOT NULL,
  `aboutTxt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `aboutImg`, `aboutTxt`) VALUES
(1, './assets/img/about/alijis-campus.png', '<h2><span style=\"color: rgb(45, 194, 107);\"><strong data-start=\"148\" data-end=\"196\">Welcome to the Alijis Campus Library&nbsp;</strong></span></h2>\r\n<p>Our library system is dedicated to supporting the instruction, research, extension, and production programs of the College. We strive to develop a well-balanced collection of resources and provide facilities that promote effective and meaningful use of library materials. By organizing accessible and reliable information sources, we aim to make your search for knowledge easier and more efficient. We also work closely with faculty members to support their academic needs and extend our services to customers with special requirements. Through this system, we bring the library closer to you&mdash;anytime, anywhere.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `accountImg` varchar(100) DEFAULT NULL,
  `accountEmail` varchar(100) DEFAULT NULL,
  `accountUsername` varchar(100) NOT NULL,
  `accountPassword` varchar(255) NOT NULL,
  `accountDateAdded` timestamp NOT NULL DEFAULT current_timestamp(),
  `accountDateUpdated` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `accountImg`, `accountEmail`, `accountUsername`, `accountPassword`, `accountDateAdded`, `accountDateUpdated`, `status`) VALUES
(1, NULL, 'harold.cruz0407@gmail.com', 'admin', '$2y$10$mstWkXUvlWnR8KlDl6sXkeaQiRytwQzW/2pthUFhqgV5dZpgVePBu', '2025-05-04 11:33:01', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `tableName` varchar(100) NOT NULL,
  `pageName` varchar(100) NOT NULL,
  `archiveDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `automated_circulation`
--

CREATE TABLE `automated_circulation` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `txt` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `automated_circulation`
--

INSERT INTO `automated_circulation` (`id`, `title`, `txt`, `date`, `status`) VALUES
(1, 'Borrowing & Checkout', '<p>Any bonafide CHMSU student who has a properly - validated Library card can borrow books from the College Library subject to its rules and regulations. However, a student, faculty or staff who has an overdue record is not allowed to borrow another item until the material is returned and fine is paid.</p>', '2025-04-10 05:09:45', 1),
(2, 'Returning & Check-In', '<p>All borrowed books and other library resources should be returned at the counter. Overdue fines are charged for items returned late</p>', '2025-04-10 05:10:12', 1),
(3, 'Overnight or Home Use', '<div class=\" mt-4\">\n<h2 class=\"fs-6 text-success ms-3\"><span style=\"color: rgb(45, 194, 107);\">Undergraduate Students</span></h2>\n<ol class=\"d-flex flex-column gap-1 mt-3\">\n<li>Three (3) book titles from Circulation or Filipiniana sections are allowed.</li>\n<li>Unlimited fiction book for a period of one (1) week is allowed.</li>\n<li>Borrowing of books from Circulation and Filipiniana starts at 3:00 P.M.</li>\n<li>Borrowed books should be returned on or before 10:00 A.M. of the due date to avoid overdue fines.</li>\n<li>A fine slip issued to student who has overdue fines is valid for three (3) working days only. It can be used to avail of library services provided a student is not yet banned.</li>\n<li>A student is given a maximum of three (3) working days to return overdue book, or else he will be banned from library services for the rest of the current semester. The ban is not lifted even if the book is returned or fine is paid during the ban period.</li>\n<li>Students who borrowed book for home use and who cannot return on due date can make use of borrower&rsquo;s entry slip to avail of library services only for three working days as stipulated in the banning policy.</li>\n</ol>\n</div>\n<div class=\"mt-4\">\n<h2 class=\"fs-6 text-success ms-3\"><span style=\"color: rgb(45, 194, 107);\">Faculty Members</span></h2>\n<ol class=\"d-flex flex-column gap-1 mt-3\">\n<li>Unlimited number of books is allowed from Circulation and Filipiniana sections and renewable every 2 weeks.</li>\n<li>Two (2) serial titles for 1 week are allowed unless needed by another user.</li>\n<li>Borrowed books should be returned on due date otherwise they will be charged overdue fines.</li>\n<li>Borrowed books should be returned on or before 10:00 A.M. of the due date to avoid overdue fines.</li>\n<li>The Dean shall countersign the book card before the book can be borrowed by part-time faculty.</li>\n</ol>\n</div>\n<div class=\"mt-4\">\n<h2 class=\"fs-6 text-success ms-3\"><span style=\"color: rgb(45, 194, 107);\">Administrative Support Staff</span></h2>\n<ol class=\"d-flex flex-column gap-1 mt-3\">\n<li>One (1) book title for 1 week is allowed.</li>\n<li>Borrowed books should be returned on due date to avoid overdue fines.</li>\n</ol>\n</div>\n<div class=\"mt-4\">\n<h2 class=\"fs-6 text-success ms-3\"><span style=\"color: rgb(45, 194, 107);\">Administrative Support Staff</span></h2>\n<ol class=\"d-flex flex-column gap-1 mt-3\">\n<li>One (1) book title for 1 week is allowed.</li>\n<li>Borrowed books should be returned on due date to avoid overdue fines.</li>\n</ol>\n</div>', '2025-04-10 05:11:16', 1),
(4, 'Book Renewal', '<p>To renew the books, they must be presented to the counter for a change of due date, unless otherwise called for by another user. They can be renewed twice a semester.</p>', '2025-04-10 05:12:46', 1),
(5, 'Charges & Fines', '<div class=\" mt-4\">\n<h2 class=\"fs-6 text-success ms-3\"><span style=\"color: rgb(45, 194, 107);\">Researcher (outsider)</span></h2>\n<ol class=\"d-flex flex-column gap-1 mt-3\">\n<li>\n<div>Php 30.00/day is charged provided there is referral letter from the librarian of the school where they come from</div>\n</li>\n</ol>\n</div>\n<div class=\"mt-4\">\n<h2 class=\"fs-6 text-success ms-3\"><span style=\"color: rgb(45, 194, 107);\">Photocopy</span></h2>\n<ol class=\"d-flex flex-column gap-1 mt-3\">\n<li>\n<div>Php 5.00/hour or a fraction of an hour is charged for every material returned 30 minutes after it was discharged from the counter</div>\n</li>\n</ol>\n</div>\n<div class=\"mt-4\">\n<h2 class=\"fs-6 text-success ms-3\"><span style=\"color: rgb(45, 194, 107);\">Circulation and Filipiniana Section</span></h2>\n<ol class=\"d-flex flex-column gap-1 mt-3\">\n<li>\n<div>Php 1.00/hour for every book returned after 10:00 A.M. of the due date excluding holidays, Saturdays and Sundays.</div>\n</li>\n</ol>\n</div>\n<div class=\"mt-4\">\n<h2 class=\"fs-6 text-success ms-3\"><span style=\"color: rgb(45, 194, 107);\">Fictional Books</span></h2>\n<ol class=\"d-flex flex-column gap-1 mt-3\">\n<li>\n<div>Php 1.00/day for every book returned after its due date</div>\n</li>\n</ol>\n</div>', '2025-04-10 05:13:34', 1),
(6, 'asdasd', '<p>asdasd</p>', '2025-04-10 07:29:31', 0),
(7, 'test', '<p>test asdasd</p>', '2025-05-13 01:38:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `contactsEmail` varchar(50) NOT NULL,
  `contactsTelNum` varchar(10) NOT NULL,
  `contactsAddress` varchar(255) NOT NULL,
  `contactsWebsite` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contactsEmail`, `contactsTelNum`, `contactsAddress`, `contactsWebsite`) VALUES
(1, 'chmsulibrary@gmail.com', '0344341429', 'Brgy. Alijis, Bacolod City,\r\nNegros Occidental', 'https://alijislibrary.chmsu.edu.ph/');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `downloads_name` varchar(50) NOT NULL,
  `downloads_path` varchar(100) NOT NULL,
  `downloads_type` varchar(50) NOT NULL,
  `downloads_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `downloads_name`, `downloads_path`, `downloads_type`, `downloads_date`, `status`) VALUES
(1, 'CHMSC-L-F08-books-recommended.doc', './assets/download/CHMSC-L-F08-books-recommended.doc', 'doc', '2025-05-04 09:11:35', 1),
(2, 'CHMSC-L-F16-AVR-REQUEST-FORM2.xlsx', './assets/download/CHMSC-L-F16-AVR-REQUEST-FORM2.xlsx', 'xlsx', '2025-05-04 09:11:43', 1),
(3, 'DataTables example - Bootstrap 5.pdf', './assets/download/DataTables example - Bootstrap 5.pdf', 'pdf', '2025-05-13 01:22:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ejournal`
--

CREATE TABLE `ejournal` (
  `id` int(11) NOT NULL,
  `eJournalImg` varchar(255) NOT NULL,
  `eJournalTitle` varchar(255) NOT NULL,
  `eJournalTxt` text NOT NULL,
  `eJournalLink` text NOT NULL,
  `eJournalDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ejournal`
--

INSERT INTO `ejournal` (`id`, `eJournalImg`, `eJournalTitle`, `eJournalTxt`, `eJournalLink`, `eJournalDate`, `status`) VALUES
(1, './assets/img/eJournals/5.jpg', 'International Journal of Automotive Technology', 'The International Journal of Automotive Technology publishes original research in all fields of automation technology, science and engineering.\r\n \r\nCovers all aspects of thermal engineering, flow analysis, structural analysis, modal analysis, control, vehicular electronics, mechatronis, electro-mechanical engineering and optimum design methods.\r\n\r\nDiscussions of previously published papers are welcome.\r\nExtends from the basic science to technology applications with analytical, experimental and numerical studies.', 'https://link.springer.com/journal/12239', '2025-04-11 02:44:12', 1),
(2, './assets/img/eJournals/41Sqc++JslL._AC_UF1000,1000_QL80_.jpg', 'Journal of Information Technology Education: Research (JITE: Research)', 'The Journal of Information Technology Education: Research (JITE: Research)  publishes scholarly articles on the use of information technology in education.This includes using technology to enhance learning and to support teaching and teaching administration. In addition, articles with a sound underpinning of pedagogical principles on the teaching of information technology are also welcome. The journal publishes conceptual, theoretical, and empirical papers.\r\n\r\nAll manuscripts are submitted electronically, desk reviewed, and then double-blind peer reviewed. We provide our published authors with widespread readership which comes from efficient processing and timely publishing online after final acceptance This approach ensures widest readership in the research and industrial communities and highest citing of the published works.', 'https://www.informingscience.org/Journals/JITEResearch/Overview', '2025-04-11 02:46:09', 1),
(3, './assets/img/eJournals/118852_spjin_36_2_72ppiRGB_150pixw.jpg', 'Journal of Information Technology & Software Engineering', 'This is an operating system based on the Linux kernel. It was designed primarily for touch screen mobile devices, such as smart phones and tablet computers, with variants for television, cars and wrist wear. One of the most widely used mobile OS these days is ANDROID. Android is a software bunch comprising not only operating system but also middleware and key applications.\r\n\r\nJournal of Information Technology & Software Engineering is participating in the Fast Editorial Execution and Review Process (FEE-Review Process) with an additional prepayment of $99 apart from the regular article processing fee. Fast Editorial Execution and Review Process is a special service for the article that enables it to get a faster response in the pre-review stage from the handling editor as well as a review from the reviewer. An author can get a faster response of pre-review maximum in 3 days since submission, and a review process by the reviewer maximum in 5 days, followed by revision/publication in 2 days. If the article gets notified for revision by the handling editor, then it will take another 5 days for external review by the previous reviewer or alternative reviewer.', 'https://www.longdom.org/information-technology-software-engineering.html', '2025-04-11 02:48:00', 1),
(4, './assets/img/eJournals/american-journal-of-computer-science-and-engineering-survey-flyer.jpg', 'American Journal of Computer Science and Engineering Science and Engineering Survey', 'American Journal of Computer Science and Engineering Survey (AJCSES) is a peer review open access journal publishing the state of the art research in computer science and engineering survey.\r\n\r\nAmerican Journal of Computer Science and Engineering Survey (AJCSES) is devoted to the publication referred papers on cutting-edge research in all the scientific areas of Computer Engineering and novel insights into its technology.  Journal intends to provide its researchers, practitioners and academics the latest and remarkable researches made by different scientists and industrial experts by providing free access to the published articles.\r\n\r\nManuscripts elucidating research surveys, technical reports, overviews, latest innovations and advancements in applied computer science and allied sciences are solicited.', 'https://www.primescholars.com/computer-science-and-engineering-survey.html', '2025-04-11 02:49:13', 1),
(5, './assets/img/eJournals/createthumb.jpg', 'Logical Methods in Computer Science', 'Logical Methods in Computer Science is a fully refereed, open access, free, electronic journal. It welcomes papers on theoretical and practical areas in computer science involving logical methods, taken in a broad sense; some particular areas within its scope are listed below. Papers are refereed in the traditional way, with two or more referees per paper. Copyright is retained by the author.\r\n\r\nFull-text access to all papers is freely available. No registration or subscription is required.\r\n\r\nThe journal is published by Logical Methods in Computer Science e.V., a non-profit organization whose purpose is to facilitate the dissemination of scientific results pertaining to logic in computer science.\r\n\r\nPapers can be submitted electronically as pdf-files. On acceptance, authors are asked to provide a source tex file as specified in the Information for Authors. Even though the Journal is divided into volumes for convenience, papers are published on the internet as soon as they are accepted for publication. The goal is to have a fast turnaround of about nine months from submission to publication.', 'https://lmcs.episciences.org/page/purpose', '2025-04-11 02:52:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `faq_question` varchar(100) NOT NULL,
  `faq_answer` text NOT NULL,
  `faq_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `faq_question`, `faq_answer`, `faq_date`, `status`) VALUES
(1, 'How do I borrow reading materials from the CHMSC Alijis Campus Library?', 'To borrow reading materials from the CHMSC Alijis Campus Library, students, faculty, and staff must have a valid, properly validated library card. Students can borrow up to three books from the Circulation or Filipiniana sections and unlimited fiction books for one week, while faculty members can borrow unlimited books from these sections with renewals allowed every two weeks. Administrative support staff may borrow one book for one week. Borrowing starts at 3:00 P.M., and borrowed books must be returned by 10:00 A.M. the next day to avoid overdue fines. Books can be renewed up to twice a semester, and overdue materials must be returned before borrowing new items. If you have overdue materials, you cannot borrow additional books until the fines are settled.', '2025-03-28 05:06:27', 0),
(2, 'What library services are available in CHMSC Alijis Campus Library?', 'The CHMSC Alijis Campus Library offers a variety of services to its users. These include borrowing/check-out services for students, faculty, and staff with valid library cards, and the returning/check-in of borrowed materials at the counter. Overnight or home use of books is allowed under specific guidelines for different groups (undergraduate students, faculty, and administrative staff). The library also provides book renewals, allowing books to be renewed twice a semester. For researchers, the library offers internet and computer-aided research services, with access to databases like IGI Global and Phil.elib. Reference and information services include chat assistance with librarians, online document delivery, bibliographic requests, and telephone inquiries. The library also facilitates printing and scanning services for library users and offers free Wi-Fi (access code available upon request). Additionally, referral letters are provided for faculty and students who wish to conduct research in neighboring libraries. The library regularly conducts virtual library orientation sessions for freshmen, transferees, and faculty. Lastly, library updates and announcements are shared via their Facebook page and email communications.', '2025-03-28 05:48:26', 1),
(3, 'What is the penalty for overdue books?', 'The penalty for overdue books at the CHMSC Alijis Campus Library includes fines and restrictions on library access. For students, overdue books from the Circulation and Filipiniana sections are fined Php 1.00 per hour for each book returned after 10:00 A.M. on the due date (excluding holidays, Saturdays, and Sundays), while overdue fiction books incur a fine of Php 1.00 per day. Students are given a maximum of three (3) working days to return overdue books; if the books are not returned within this time, the student will be banned from library services for the rest of the semester, even if the book is returned or the fine is paid during the ban period. For researchers (outsiders), an overdue fine of Php 30.00 per day is charged, provided they have a referral letter from their home institution’s librarian.', '2025-03-28 05:49:48', 1),
(6, 'Does the CHMSC Alijis Campus Library have a scanner?', 'Yes, the CHMSU Alijis Campus Library provides scanning services to its users. Library users, including faculty and students, can request assistance with scanning reading materials, research references, and other books available in the library.', '2025-03-31 01:55:58', 1),
(7, 'asda', 'sdasdad', '2025-05-13 02:02:39', 0);

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
  `feedbackIsRead` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `feedbackName`, `feedbackEmail`, `feedbackMsg`, `feedbackTime`, `feedbackIsRead`, `status`) VALUES
(1, 'test', 'test@gmail.com', 'test', '2025-05-09 06:34:01', 1, 1),
(2, 'test', 'test@gmail.com', 'test', '2025-05-09 06:35:36', 1, 1);

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
(1, 1, 'test', '2025-05-09 06:34:50'),
(2, 2, 'test', '2025-05-09 06:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `foundation`
--

CREATE TABLE `foundation` (
  `id` int(11) NOT NULL,
  `foundationName` varchar(15) NOT NULL,
  `foundationTxt` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foundation`
--

INSERT INTO `foundation` (`id`, `foundationName`, `foundationTxt`, `status`) VALUES
(1, 'Mission', 'The College Library commits itself to provide its academic community with essential and appropriate services, required facilities, and balanced collection of materials and resources necessary in meeting the current and future needs of school programs and users’ informational, instructional, and personal requirements. It assumes a pivotal role in institutional development through its commitment to achieve success and efficient delivery of services in various aspects of institutional instruction, research, and public service.', 1),
(2, 'Vision', 'By 2022, the library will be a one stop learning venue by providing various library information resources and services.', 1),
(3, 'Goal', 'To enhance the intellectual, physical, artistic, social, aesthetic and spiritual growth and development of students through wise and responsible use of library resources.', 1),
(4, 'Objectives', 'The library aims to support its mission and vision by providing essential services and resources. It supports the College\'s instruction, research, extension, and production programs while continuously developing a well-balanced collection of library resources. The library ensures that facilities are available to maximize the effective use of these resources and organizes information sources for easy access by customers. Additionally, it collaborates with faculty members to assist in their instructional and research needs. Lastly, the library is committed to offering services tailored to customers with special needs, ensuring inclusivity and accessibility for all.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `gallery_path` varchar(255) NOT NULL,
  `gallery_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_path`, `gallery_date`, `status`) VALUES
(1, './assets/img/galleryImg/0e9c4f94-4fdc-4734-a72b-37323475c5a9.jpg', '2025-05-13 01:29:29', 0),
(2, './assets/img/galleryImg/abstract-background-drawing-a-flag-and-ribbon-transparent-vector-illustration-free-png.png', '2025-05-13 01:29:29', 0),
(3, './assets/img/galleryImg/images (1)sa - Copy.jpg', '2025-05-13 01:29:29', 0),
(4, './assets/img/galleryImg/images (1)sa.jpg', '2025-05-13 01:29:29', 0),
(5, './assets/img/galleryImg/a_carnival_themed_poster_with_text_victorias (6) - Copy.jpeg', '2025-05-13 01:29:29', 0),
(6, './assets/img/galleryImg/a_carnival_themed_poster_with_text_victorias (6).jpeg', '2025-05-13 01:29:50', 0),
(7, './assets/img/galleryImg/a_carnival_themed_poster_with_text_victorias (5) - Copy - Copy.jpeg', '2025-05-13 01:29:50', 0),
(8, './assets/img/galleryImg/a_carnival_themed_poster_with_text_victorias (5) - Copy.jpeg', '2025-05-13 01:29:50', 0),
(9, './assets/img/galleryImg/a_carnival_themed_poster_with_text_victorias (5).jpeg', '2025-05-13 01:29:50', 0),
(10, './assets/img/galleryImg/a_carnival_themed_poster_with_text_victorias (4).jpeg', '2025-05-13 01:29:50', 0);

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
(1, 'Borrowing, Overdue, and Fines', '2025-05-13 01:50:55'),
(2, 'Entrance & Exit Procedures', '2025-05-13 01:56:48'),
(3, 'Entrance & Exit Procedures', '2025-05-13 01:57:06'),
(4, 'Entrance & Exit Procedures', '2025-05-13 01:57:51'),
(5, 'Library Access & Identification', '2025-05-13 01:58:08'),
(6, 'Library Conduct & Behavior', '2025-05-13 01:58:41'),
(7, 'Library Materials Usage & Care', '2025-05-13 02:00:48'),
(8, 'Personal Belongings & Responsibility', '2025-05-13 02:01:09'),
(9, 'Special Conditions', '2025-05-13 02:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `guideline_rules`
--

CREATE TABLE `guideline_rules` (
  `id` int(11) NOT NULL,
  `guideline_id` int(11) DEFAULT NULL,
  `guideline_rules_txt` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guideline_rules`
--

INSERT INTO `guideline_rules` (`id`, `guideline_id`, `guideline_rules_txt`, `status`) VALUES
(1, 1, 'Students are given a maximum of three (3) working days to return overdue books, or else they will be banned from library services for the rest of the current semester. The ban is not lifted even if the book is returned or the fine is paid during the ban period. ', 1),
(2, 1, 'Students who borrowed books for home use and who cannot return on the due date can make use of the borrower’s entry slip to avail of library services but for three (3) working days only, as far as policy in banning is concerned.', 1),
(3, 1, 'A fine slip is issued to students who have overdue fines and is valid for three (3) working days only. It can be used to avail of library services provided a student is not yet banned.', 1),
(4, 1, 'Payment of fines for overdue library materials and library card replacement should be made at the cashier’s office.', 1),
(5, 2, 'Customers must log in their library card number in the computer at the entrance upon entering the library.', 1),
(6, 3, 'Appropriate ways should be utilized for entrance to and exit from the library.', 1),
(7, 4, 'Customers going in and out of the library are required to have their things checked and inspected before leaving.', 1),
(8, 5, 'Library customers with valid identification cards are allowed entrance to the library. For CHMSC students, they must be in proper uniform, with school I.D. and library card.', 1),
(9, 5, 'A visitor must present an Identification card and visitor’s I.D. issued by the College Security Guard.', 1),
(10, 6, 'Silence should be observed at all times.', 1),
(11, 6, 'Eating, sleeping, smoking, and project making are strictly prohibited.', 1),
(12, 6, 'Orderly and proper use of library furniture and equipment must be observed.', 1),
(13, 6, 'Cell phones should be set in silent mode.', 1),
(14, 6, 'Taking pictures of unpublished materials is prohibited.', 1),
(15, 7, 'Books and other reading materials should be handled with care.', 1),
(16, 7, 'Books taken from the open shelves area should be placed on the designated shelves or area for easy return by the library staff to appropriate shelves.', 1),
(17, 7, 'Library material reported lost or damaged must be replaced by the borrower with the latest edition of the same title. If such material is not available in the market, replacement of any current library material of the same subject is allowed, provided the value is not less than the actual amount of the lost or damaged one.', 1),
(18, 7, 'All library materials must be properly processed before taken out of the library. Anybody caught stealing any library materials shall be subjected to disciplinary action.', 1),
(19, 7, 'Customers (students, faculty, and staff) are not allowed to borrow any library materials for use by other customers.', 1),
(20, 7, 'Library card should be used to borrow books and other reading materials.', 1),
(21, 8, 'Valuable things such as cell phones, money, laptops, jewelry, etc., should not be left in the depository area. The person in charge is not accountable for the loss of these items.', 1),
(22, 8, 'Personal book/s may be brought inside the library provided that permission is first sought from the person assigned at the entrance.', 1),
(23, 9, 'Charging of cell phones is strictly prohibited.', 1),
(24, 9, 'Home use of books is not allowed three days before the mid-term and final examinations as well as during the said examinations. It will resume on the last date of mid-term examination. Moreover, during and after signing of clearance, photocopying is allowed provided the clearance form is attached with the library card.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `information_dissemination`
--

CREATE TABLE `information_dissemination` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `txt` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information_dissemination`
--

INSERT INTO `information_dissemination` (`id`, `title`, `txt`, `date`, `status`) VALUES
(1, 'Library Announcement', '<p>Posting of library announcements/latest news through&nbsp;<span style=\"color: rgb(45, 194, 107);\"><a style=\"color: rgb(45, 194, 107);\" href=\"https://www.facebook.com/LIBRARYALIJIS\" target=\"_blank\" rel=\"noopener\">https://www.facebook.com/LIBRARYALIJIS&nbsp;</a></span></p>', '2025-04-10 05:59:47', 1),
(2, 'New Aquisitions', '<p>Sending e-mail to faculty the list of newly acquired books, magazines and ejournals subscription.</p>', '2025-04-10 06:00:14', 1),
(3, 'Referral Letter', '<p>This service assist Carlos Hilado Memorial State University faculty and students who may wish to do further research to neighboring libraries upon their request.</p>', '2025-04-10 06:00:34', 1),
(4, 'Referrence and Information', '<h2 class=\"fs-6 text-success ms-3\"><span style=\"color: rgb(45, 194, 107);\">ACL provides</span></h2>\n<ol class=\"d-flex flex-column gap-1 mt-3 \">\n<li>Chat a librarian -<span style=\"color: rgb(45, 194, 107);\">&nbsp;<a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"https://www.facebook.com/LIBRARYALIJIS/\" target=\"_blank\" rel=\"noopener\">facebook.com/LIBRARYALIJIS</a></span></li>\n<li>E-newsletter</li>\n<li>Online Document Delivery\n<ul>\n<li>List of New Acquisition</li>\n<li>List of Table of Content (TOC) of scholarly journals</li>\n</ul>\n</li>\n<li>Online Bibliography request -&nbsp;<a class=\"text-success\" href=\"mailto: chmscalibrary@gmail.com\"><span style=\"color: rgb(45, 194, 107);\">chmscalibrary@gmail.com</span></a>\n<ul>\n<li>This service provide a bibliographic information of a certain book and other related reference resources upon the request of the faculty.</li>\n</ul>\n</li>\n<li>E-Pathfinder</li>\n<li>Research reference assistance/consultation</li>\n<li>Telephone inquiry &ndash;&nbsp;<span style=\"color: rgb(45, 194, 107);\"><a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"tel: 4341429\">434-1429</a></span></li>\n</ol>', '2025-04-10 06:01:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `internet_computer_aided_research`
--

CREATE TABLE `internet_computer_aided_research` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `txt` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internet_computer_aided_research`
--

INSERT INTO `internet_computer_aided_research` (`id`, `title`, `txt`, `date`, `status`) VALUES
(1, 'Faculty', '<h2 class=\"fs-6 text-success ms-3\"><span style=\"color: rgb(45, 194, 107);\">Administrative Support Staff</span></h2>\n<ol class=\"d-flex flex-column gap-1 mt-3 \">\n<li>Silence must be observed at all times.</li>\n<li>Students, faculty, staff and visitors/researchers can avail of the services provided in this area.</li>\n<li>Social Networking Sites such as; Facebook, Twitter, Youtube, Google+, etc. are strictly prohibited.</li>\n<li>A customer must approach the Computer Administrator at the counter to be allowed access to the computer.</li>\n<li>Each researcher is allowed 30 minutes per day. An extension time is given as permitted by the Computer Administrator.</li>\n<li>Transferring of data to the USB is allowed.</li>\n<li>Proper care of the computer units and their accessories must be observed.</li>\n<li>Databases such as IGI Global and Phil.elib are available.</li>\n<li>Cleanliness must be observed all the time.</li>\n</ol>', '2025-04-10 05:53:38', 1),
(2, 'Issurance of Library Card', '<p>ACL clienteles is required to present library card upon entry in the library and in using its facilities and learning resources.</p>', '2025-04-10 05:56:20', 1),
(3, 'Free Wifi Connect', '<p>Kindly ask our library staff for the access code</p>', '2025-04-10 05:56:40', 1),
(4, 'Printing and Scanning', '<p>These services provide quality assistance to library users by scanning reading materials, research references and their favorite books available in the library. Faculty and students may request online through&nbsp;<a class=\"text-success\" href=\"mailto:                                                    chmsalibrary@gmail.com\" target=\"_blank\" rel=\"noopener\">chmsalibrary@gmail.com</a>&nbsp;or&nbsp;<a class=\"text-success\" href=\"https://www.facebook.com/LIBRARYALIJIS/\" target=\"_blank\" rel=\"noopener\">Library Alijis</a>.</p>', '2025-04-10 05:57:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `library_hours`
--

CREATE TABLE `library_hours` (
  `id` int(11) NOT NULL,
  `semesterName` varchar(50) NOT NULL,
  `semesterDateStart` time NOT NULL,
  `semesterDateEnd` time NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_hours`
--

INSERT INTO `library_hours` (`id`, `semesterName`, `semesterDateStart`, `semesterDateEnd`, `status`) VALUES
(1, 'Regular Semester', '07:30:00', '18:00:00', 1),
(2, 'Summer Break', '08:00:00', '17:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `library_news`
--

CREATE TABLE `library_news` (
  `id` int(11) NOT NULL,
  `library_news_subject` varchar(50) NOT NULL,
  `library_news_txt` text NOT NULL,
  `library_news_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_news`
--

INSERT INTO `library_news` (`id`, `library_news_subject`, `library_news_txt`, `library_news_date`, `status`) VALUES
(1, 'New Books Available', 'We have just received a fresh batch of new fiction and non-fiction books for our collection this month. Make sure to stop by and explore a variety of genres, including mystery, romance, science, and history. Don\'t miss out on the latest titles!', '2025-05-04 09:09:53', 1),
(2, 'Library Maintenance Notice', 'The library will be closed on May 10 for scheduled maintenance. This is to ensure that all our facilities are in top shape for your comfort and convenience. Please plan your visit accordingly and we apologize for any inconvenience caused.', '2025-05-04 09:09:53', 1),
(3, 'Extended Library Hours', '<p>During exam week, the library will be open until 10 PM to accommodate students needing extra study time. Our quiet zones, study rooms, and Wi-Fi will be available, so you can focus on your exams without any disruptions. Take advantage of these extended hours!</p>', '2025-05-04 09:09:53', 1),
(4, 'Reading Contest 2025', 'Join our Summer Reading Contest and get a chance to win exciting prizes! Read books from any genre, submit your entries, and earn points for every book you finish. The contest runs from June 1 to August 31, 2025. Don\'t miss this chance to win while enjoying great books!', '2025-05-04 09:09:53', 1),
(5, 'Free Research Workshop', '<p>We are hosting a free workshop on academic research skills this Friday at 3 PM. The workshop will cover topics such as citation, how to use databases, and effective research techniques. It is open to all students, so feel free to join and enhance your academic skills!</p>', '2025-05-04 09:09:53', 1),
(6, 'etst asdasd', '<p>test asda asdasd</p>', '2025-05-13 01:02:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `library_news_img`
--

CREATE TABLE `library_news_img` (
  `id` int(11) NOT NULL,
  `library_news_id` int(11) DEFAULT NULL,
  `library_news_img_path` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_news_img`
--

INSERT INTO `library_news_img` (`id`, `library_news_id`, `library_news_img_path`, `status`) VALUES
(4, 6, './assets/img/libraryNews/a_carnival_themed_poster_with_text_victorias (6).jpeg', 0),
(5, 6, './assets/img/libraryNews/a_carnival_themed_poster_with_text_victorias (5) - Copy - Copy.jpeg', 1),
(6, 6, './assets/img/libraryNews/a_carnival_themed_poster_with_text_victorias (6).jpeg', 1),
(7, 6, './assets/img/libraryNews/a_carnival_themed_poster_with_text_victorias (5) - Copy - Copy.jpeg', 1),
(8, 6, './assets/img/libraryNews/a_carnival_themed_poster_with_text_victorias (5) - Copy.jpeg', 1),
(9, 6, './assets/img/libraryNews/a_carnival_themed_poster_with_text_victorias (5).jpeg', 1),
(10, 6, './assets/img/libraryNews/a_carnival_themed_poster_with_text_victorias (4).jpeg', 1),
(11, 6, './assets/img/libraryNews/a_carnival_themed_poster_with_text_victorias (3).jpeg', 1),
(12, 6, './assets/img/libraryNews/a_carnival_themed_poster_with_text_victorias (2).jpeg', 1),
(13, 6, './assets/img/libraryNews/a_carnival_themed_poster_with_text_victorias (1).jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `library_objectives`
--

CREATE TABLE `library_objectives` (
  `id` int(11) NOT NULL,
  `objectives_icon` varchar(100) NOT NULL,
  `objectives_text` text NOT NULL,
  `objectives_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_objectives`
--

INSERT INTO `library_objectives` (`id`, `objectives_icon`, `objectives_text`, `objectives_date`, `status`) VALUES
(1, 'group', 'Promote extension projects through outreach engagement activity in the identified areas and/or barangays.', '2025-05-01 03:54:52', 0),
(2, 'group', 'Promote extension projects through outreach engagement activity in the identified areas and/or barangays.', '2025-05-01 03:55:12', 0),
(3, 'laptop_mac', 'Provide free lectur activities that addresses their learning needs.', '2025-05-01 04:15:14', 1),
(4, 'groups', 'Promote extension projects through outreach engagement activity in the identified areas and/or barangays.', '2025-05-01 12:35:15', 1),
(5, 'school', 'Coordinate with faculty members in conducting library outreach for free lectures and training that are related in their field of expertise and/or specialization.', '2025-05-01 12:35:45', 1),
(6, 'diversity_3', 'Coordinate with the college community and extension coordinator and local government units in conducting outreach projects and events to assist the delivery of library activities.', '2025-05-01 12:36:02', 1),
(7, 'search', 'Research reference consultation that provide personalized research reference consultations to assist community members, students, and professionals in finding relevant and reliable resources for their academic, professional, or personal research needs.', '2025-05-01 12:36:21', 1),
(8, 'database', 'Face-to-face tutorial on the use of subscribed databases, online library system and online public access catalog (OPAC).', '2025-05-01 12:36:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `loginDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_current_events`
--

CREATE TABLE `news_current_events` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `txt` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_current_events`
--

INSERT INTO `news_current_events` (`id`, `title`, `txt`, `date`, `status`) VALUES
(1, 'National', '<div class=\"d-flex align-items-center justify-content-between\">\n<p class=\"p-0 m-0\">CNN Philippines - <span style=\"color: rgb(45, 194, 107);\"><a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"https://cnnphilippines.com/\" target=\"_blank\" rel=\"noopener\">https://cnnphilippines.com/</a></span></p>\n</div>\n<div class=\"d-flex align-items-center justify-content-between\">\n<p class=\"p-0 m-0\">Philippine Daily Inquirer - <span style=\"color: rgb(45, 194, 107);\"><a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"https://www.inquirer.com.ph/\" target=\"_blank\" rel=\"noopener\">https://www.inquirer.com.ph/</a></span></p>\n</div>\n<div class=\"d-flex align-items-center justify-content-between\">\n<p class=\"p-0 m-0\">Manila Bulletin - <span style=\"color: rgb(45, 194, 107);\"><a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"https://mb.com.ph/news/\" target=\"_blank\" rel=\"noopener\">https://mb.com.ph/news/</a></span></p>\n</div>\n<div class=\"d-flex align-items-center justify-content-between\">\n<p class=\"p-0 m-0\">The Philippine Star - <span style=\"color: rgb(45, 194, 107);\"><a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"https://www.philstar.com/\" target=\"_blank\" rel=\"noopener\">https://www.philstar.com/</a></span></p>\n</div>', '2025-04-10 06:06:23', 1),
(2, 'Local', '<div class=\"d-flex align-items-center justify-content-between\">\n<p class=\"p-0 m-0\">The Visayan Daily Star - <span style=\"color: rgb(45, 194, 107);\"><a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"https://news.visayandailystar.com/\" target=\"_blank\" rel=\"noopener\">https://news.visayandailystar.com/</a></span></p>\n</div>\n<div class=\"d-flex align-items-center justify-content-between\">\n<p class=\"p-0 m-0\">SunStar BACOLOD - <span style=\"color: rgb(45, 194, 107);\"><a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"https://www.sunstar.com.ph/\" target=\"_blank\" rel=\"noopener\">https://www.sunstar.com.ph/</a></span></p>\n</div>', '2025-04-10 06:06:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `online_reference`
--

CREATE TABLE `online_reference` (
  `id` int(11) NOT NULL,
  `online_reference_path` varchar(255) NOT NULL,
  `online_reference_type` varchar(100) NOT NULL,
  `online_reference_name` varchar(100) NOT NULL,
  `online_reference_desc` text NOT NULL,
  `online_reference_link` text NOT NULL,
  `online_reference_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `online_reference`
--

INSERT INTO `online_reference` (`id`, `online_reference_path`, `online_reference_type`, `online_reference_name`, `online_reference_desc`, `online_reference_link`, `online_reference_date`, `status`) VALUES
(1, './assets/img/onlineReferenceTools/reference3.png', 'Dictionaries', 'Merriam Webster', 'It is an American company that publishes reference books and is mostly known for its dictionaries. It is the oldest dictionary publisher in the United States.', 'https://www.merriam-webster.com/', '2025-03-31 02:53:06', 1),
(2, './assets/img/onlineReferenceTools/reference4.png', 'Dictionaries', 'OneLook Multi-Dictionary Search', 'Search in hundreds of general and specialized dictionaries at once. Great for obscure words or when you want to compare different dictionaries.', 'http://itools.com/tool/onelook-multi-dictionary-search', '2025-03-31 02:58:04', 1),
(3, './assets/img/onlineReferenceTools/reference5.jpg', 'Dictionaries', 'OneLook Multi-Dictionary Search', 'The only dictionary and search engine you need for computer and internet technology definitions.', 'https://www.webopedia.com/', '2025-03-31 02:58:41', 1),
(4, './assets/img/onlineReferenceTools/reference3.png', 'Dictionaries', 'Webster Gateway', 'It provides a hypertext point-and-click interface for accessing various dictionary services on the Internet.', 'https://www.merriam-webster.com/dictionary/gateway', '2025-03-31 02:59:20', 1),
(5, './assets/img/onlineReferenceTools/reference6.png', 'Encyclopedias', 'Britannica Online', 'It is the world standard in knowledge since 1768', 'https://www.britannica.com/', '2025-03-31 02:59:52', 1),
(6, './assets/img/onlineReferenceTools/reference7.png', 'Encyclopedias', 'The Probert Encyclopaedia', 'The Probert Encyclopaedia\r\nIt\'s an independent reference encyclopaedia aimed at professionals and students alike, documenting all manner of subjects through over 235,000 accurate, concise and fully interlinked articles.', 'https://www.probert-encyclopaedia.co.uk/', '2025-03-31 03:00:33', 1),
(7, './assets/img/onlineReferenceTools/reference8.png', 'Encyclopedias', 'Encyberpedia', 'It is an electronic encyclopedia with its own content as well as over 10,000 links to the best reference sites on the Internet.', 'https://scripophily.net/encyberpedia-com-domain-name/general.htm', '2025-03-31 03:00:58', 1),
(8, './assets/img/onlineReferenceTools/reference9.jpg', 'Maps', 'Google Maps', 'Find local businesses, view maps and get driving directions in Google Maps', 'https://www.google.com/maps', '2025-03-31 03:01:28', 1),
(9, './assets/img/onlineReferenceTools/reference10.png', 'Maps', 'World Atlas', 'A complete atlas of the world featuring several thousand place names and colorful, accurate maps.', 'https://www.worldatlas.com/', '2025-03-31 03:01:56', 1),
(10, './assets/img/onlineReferenceTools/reference11.png', 'Maps', 'MapQuest', 'Find directions and explore towns and cities worldwide. Users can display addresses on a map, view nearby businesses, get driving directions and maps, and plan a trip with city information.', 'https://www.mapquest.com/', '2025-03-31 03:06:46', 1),
(11, './assets/img/onlineReferenceTools/reference1.png', 'General References', 'The World Fact Book', 'Provides basic intelligence on the history, people, government, economy, energy, geography, communications, transportation, military, terrorism, and transnational issues for 266 world entities.', 'https://www.cia.gov/the-world-factbook/', '2025-03-31 03:07:25', 1),
(13, './assets/img/onlineReferenceTools/reference2.png', 'General References', 'Information Please Almanac', 'It allows searching or browsing in sports, entertainment, US, world, people, living, society, business & economy & technology.', 'https://www.infoplease.com/almanacs', '2025-03-31 06:52:04', 0),
(14, './assets/img/onlineReferenceTools/images (1)sa - Copy.jpg', 'Dictionaries', 'test', 'test', 'https://sadad.com', '2025-05-13 01:25:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `online_subscription_databases`
--

CREATE TABLE `online_subscription_databases` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `txt` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `online_subscription_databases`
--

INSERT INTO `online_subscription_databases` (`id`, `title`, `txt`, `date`, `status`) VALUES
(1, 'IGI Global Publisher of Timely Knowledge', '<p>Providing Peer-Reviewed, Timely, and Innovative Research Content for Over 30 Years</p>\n<p>For Username and Password, you may contact:</p>\n<ul>\n<li style=\"color: rgb(45, 194, 107);\"><span style=\"color: rgb(45, 194, 107);\"><a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"https://www.facebook.com/LIBRARYALIJIS/\" target=\"_blank\" rel=\"noopener\">facebook.com/LIBRARYALIJIS</a></span></li>\n<li style=\"color: rgb(45, 194, 107);\"><span style=\"color: rgb(45, 194, 107);\"><a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"mailto: chmscalibrary@gmail.com\">chmscalibrary@gmail.com</a></span></li>\n<li style=\"color: rgb(45, 194, 107);\"><span style=\"color: rgb(45, 194, 107);\"><a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"tel: 4341429\">434-1429</a></span></li>\n</ul>\n<p><span style=\"color: rgb(45, 194, 107);\"><a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"https://www.igi-global.com/gateway/login/?returnurl=%2fgateway%2f\" target=\"_blank\" rel=\"noopener\">URL: https://www.igi-global.com/gateway/</a></span></p>', '2025-04-10 06:03:45', 1),
(2, 'Philippine E-Journals (PEJ)', '<p>The Philippine E-Journals (PEJ) is an online collection of academic publications of different higher education institutions and professional organizations. Its sophisticated database allows users to easily locate abstracts, full journal articles, and links to related research materials.</p>\n<p>For Username and Password, you may contact:</p>\n<ul>\n<li style=\"color: rgb(45, 194, 107);\"><span style=\"color: rgb(45, 194, 107);\"><a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"https://www.facebook.com/LIBRARYALIJIS/\" target=\"_blank\" rel=\"noopener\">facebook.com/LIBRARYALIJIS</a></span></li>\n<li style=\"color: rgb(45, 194, 107);\"><span style=\"color: rgb(45, 194, 107);\"><a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"mailto: chmscalibrary@gmail.com\">chmscalibrary@gmail.com</a></span></li>\n<li style=\"color: rgb(45, 194, 107);\"><span style=\"color: rgb(45, 194, 107);\"><a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"tel: 4341429\">434-1429</a></span></li>\n</ul>\n<p><span style=\"color: rgb(45, 194, 107);\"><a class=\"text-success\" style=\"color: rgb(45, 194, 107);\" href=\"https://ejournals.ph/\" target=\"_blank\" rel=\"noopener\">URL: https://ejournals.ph/</a></span></p>', '2025-04-10 06:04:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opensource_databases`
--

CREATE TABLE `opensource_databases` (
  `id` int(11) NOT NULL,
  `opensource_databases_img` text NOT NULL,
  `opensource_databases_link` text NOT NULL,
  `opensource_databases_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `opensource_databases`
--

INSERT INTO `opensource_databases` (`id`, `opensource_databases_img`, `opensource_databases_link`, `opensource_databases_date`, `status`) VALUES
(1, './assets/img/openSourceDatabase/doablogo.png', 'https://www.doabooks.org/', '2025-04-08 05:25:15', 1),
(2, './assets/img/openSourceDatabase/doaj-logo.png', 'https://doaj.org/', '2025-04-08 06:18:10', 1),
(3, './assets/img/openSourceDatabase/google-scholar.jpg', 'https://scholar.google.com/', '2025-04-10 00:49:37', 1),
(4, './assets/img/openSourceDatabase/a_carnival_themed_poster_with_text_victorias (5) - Copy.jpeg', 'https://asdas.com', '2025-05-13 01:26:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `periodicals`
--

CREATE TABLE `periodicals` (
  `id` int(11) NOT NULL,
  `periodicalsTitle` varchar(100) NOT NULL,
  `periodicalsType` varchar(50) NOT NULL,
  `periodicalsCategory` varchar(100) NOT NULL,
  `periodicalsAuthor` varchar(100) NOT NULL,
  `periodicalsDesc` text NOT NULL,
  `periodicalsDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periodicals`
--

INSERT INTO `periodicals` (`id`, `periodicalsTitle`, `periodicalsType`, `periodicalsCategory`, `periodicalsAuthor`, `periodicalsDesc`, `periodicalsDate`, `status`) VALUES
(1, 'Art+ Magazine Issue 77: Jomike Tejido', 'Magazine', 'Arts & Culture', 'Jomike Tejido', 'Sense of Wonder: In pursuing the fruitful life of an artist, Jomike Tejido creates works that hark back to the simple joys of art-making and creating.', '2025-05-04 09:03:06', 1),
(2, 'Art+ Magazine Issue 78: Patrick Esmao', 'Magazine', 'Arts & Culture', 'Patrick Esmao', 'Inside this issue:\r\n\r\nElmer Borlongan\r\nAlfredo Roces\r\nPaul Eric Roca\r\nMark Nicdao\r\nPio Abad\r\n', '2025-05-04 09:05:36', 1),
(3, 'test', 'Magazine', 'Health & Wellness', 'test', 'test', '2025-05-13 01:40:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `periodical_images`
--

CREATE TABLE `periodical_images` (
  `id` int(11) NOT NULL,
  `periodical_id` int(11) DEFAULT NULL,
  `image_url` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periodical_images`
--

INSERT INTO `periodical_images` (`id`, `periodical_id`, `image_url`, `status`) VALUES
(1, 1, './assets/img/magazine&journal/Screenshot 2025-05-04 170241.png', 1),
(2, 2, './assets/img/magazine&journal/Screenshot 2025-05-04 170529.png', 1),
(3, 3, './assets/img/magazine&journal/0e9c4f94-4fdc-4734-a72b-37323475c5a9.jpg', 1),
(4, 3, './assets/img/magazine&journal/a_carnival_themed_poster_with_text_victorias (5) - Copy - Copy.jpeg', 1),
(5, 3, './assets/img/magazine&journal/a_carnival_themed_poster_with_text_victorias (5) - Copy.jpeg', 1),
(6, 3, './assets/img/magazine&journal/a_carnival_themed_poster_with_text_victorias (5).jpeg', 1),
(7, 3, './assets/img/magazine&journal/a_carnival_themed_poster_with_text_victorias (4).jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `personnelImg` text NOT NULL,
  `personnelRole` varchar(100) NOT NULL,
  `personnelName` varchar(100) NOT NULL,
  `personnelDateAdded` timestamp NOT NULL DEFAULT current_timestamp(),
  `personnelDateUpdated` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id`, `personnelImg`, `personnelRole`, `personnelName`, `personnelDateAdded`, `personnelDateUpdated`, `status`) VALUES
(1, './assets/img/personnel/librarian1.png', 'Head Librarian', 'Ms. Ma Loreta J. Santes RL, MSLS ', '2025-04-22 02:03:03', '2025-04-22 04:03:03', 1),
(2, './assets/img/personnel/librarian2.png', 'Librarian for Library Service', 'Ms. Maricel S. Sanoria RL, MSLS', '2025-04-22 02:03:49', NULL, 1),
(3, './assets/img/personnel/librarian3.png', 'Library Clerk', 'Ms. Rhinalyn S. Gela', '2025-04-22 02:04:31', NULL, 1),
(4, './assets/img/personnel/librarian4.png', 'Library Clerk', 'Ms. Estarlyn M. Vendero', '2025-04-22 02:04:47', NULL, 1),
(5, './assets/img/personnel/librarian5.png', 'Library Clerk', 'Mr. Anthony J. Espinosa', '2025-04-22 02:05:01', '2025-05-13 02:16:31', 1),
(6, './assets/img/personnel/books1.png', 'Director asdas', 'testdasdasd', '2025-05-13 02:16:43', '2025-05-13 02:22:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `sectionsImg` varchar(255) NOT NULL,
  `sectionsTitle` varchar(100) NOT NULL,
  `sectionsTxt` text NOT NULL,
  `sectionsDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `sectionsImg`, `sectionsTitle`, `sectionsTxt`, `sectionsDate`, `status`) VALUES
(1, './assets/img/about/filipiniana.jpg', 'Filipiniana', '<p>Welcome to the <span style=\"color: rgb(45, 194, 107);\">Filipiniana Section of Library</span>, a dedicated section for materials that celebrate the rich culture, history, and heritage of the Philippines. Here, you&rsquo;ll find a wide collection of books, periodicals, and documents written by Filipino authors or about the Philippines. Our collection includes literature, historical records, local studies, and government publications that aim to promote national pride and cultural awareness. Whether you\'re a student, researcher, or casual reader, the Filipiniana Library offers resources that highlight the beauty and identity of the Filipino people. Welcome to the Filipiniana Library &mdash; a dedicated section for materials that celebrate the rich culture, history, and heritage of the Philippines. Here, you&rsquo;ll find a wide collection of books, periodicals, and documents written by Filipino authors or about the Philippines. Our collection includes literature, historical records, local studies, and government publications that aim to promote national pride and cultural awareness. Whether you\'re a student, researcher, or casual reader, the Filipiniana Library offers resources that highlight the beauty and identity of the Filipino people. asdasd</p>', '2025-04-29 08:31:41', 1),
(2, './assets/img/sections/c6b76d23-da9a-4f99-b1fe-0c20d09ed6f5.jpg', 'Baggage Counter', '<p>Secure your belongings with ease! The Baggage Counter is provided for students and visitors to safely store their bags and personal items while using the library. Please claim your number tag and ensure all items are properly placed before entering. The library is not liable for unclaimed or misplaced items after closing hours.</p>', '2025-04-29 08:41:23', 1),
(3, './assets/img/sections/2120cee5-503c-4b64-8c8e-7dfd17119284.jpg', 'Circulation Section', '<p class=\"\" data-start=\"119\" data-end=\"418\">This is the main hub for borrowing and returning library materials. Library users can check out books, renew loans, and settle overdue fines at the Circulation Section. Please present a valid library ID when borrowing. For assistance or inquiries about your account, our staff will be happy to help.</p>', '2025-04-29 08:43:00', 1),
(5, './assets/img/sections/periodicals-section.jpg', 'Periodicals Section', '<p>The Periodicals Section houses newspapers, magazines, journals, and other regularly published materials. These resources are available for reading inside the library and provide up-to-date information on a variety of subjects. Materials in this section are for room use only and cannot be borrowed.</p>', '2025-04-29 08:45:29', 1),
(7, './assets/img/sections/journals-section.jpg', 'Journals Section', '<p class=\"\" data-start=\"91\" data-end=\"396\">This section contains academic and scholarly journals that support research and in-depth study. Journals are organized by subject and publication date, and are available for room use only. Whether for thesis work or advanced learning, this section provides valuable resources for students and researchers.</p>', '2025-04-29 08:49:02', 1),
(8, './assets/img/sections/abstract-background-drawing-a-flag-and-ribbon-transparent-vector-illustration-free-png.png', 'test', '<p>test</p>', '2025-05-13 01:42:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `socialsIcon` varchar(100) NOT NULL,
  `socialsLink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `socialsIcon`, `socialsLink`) VALUES
(1, 'fab fa-x-twitter', 'https://x.com/chmsu_library'),
(2, 'fab fa-youtube', 'https://www.youtube.com/@chmsualijislibrary4548'),
(3, 'fab fa-facebook', 'https://www.facebook.com/LIBRARYALIJIS/');

-- --------------------------------------------------------

--
-- Table structure for table `virtual_library_orientation`
--

CREATE TABLE `virtual_library_orientation` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `txt` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `virtual_library_orientation`
--

INSERT INTO `virtual_library_orientation` (`id`, `title`, `txt`, `date`, `status`) VALUES
(1, 'Freshmen & Transferees', '<p>The orientation is scheduled before the start of an academic year to make them aware of library policy, rules and regulations and acquaint their selves of the facilities, resources and services that are available in the library.</p>', '2025-04-10 05:50:14', 1),
(2, 'Faculty', '<p>The activity can guide and cater their needs of references for their classes/subjects using the e-learning tools and printed resources that are available in the library.</p>', '2025-04-10 05:52:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `visitor_type` varchar(50) NOT NULL,
  `visitor_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `visitor_type`, `visitor_date`) VALUES
(1, 'Alumni', '2025-05-13 01:01:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `automated_circulation`
--
ALTER TABLE `automated_circulation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ejournal`
--
ALTER TABLE `ejournal`
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
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
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
-- Indexes for table `information_dissemination`
--
ALTER TABLE `information_dissemination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internet_computer_aided_research`
--
ALTER TABLE `internet_computer_aided_research`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_hours`
--
ALTER TABLE `library_hours`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `library_objectives`
--
ALTER TABLE `library_objectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `news_current_events`
--
ALTER TABLE `news_current_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_reference`
--
ALTER TABLE `online_reference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_subscription_databases`
--
ALTER TABLE `online_subscription_databases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opensource_databases`
--
ALTER TABLE `opensource_databases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periodicals`
--
ALTER TABLE `periodicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periodical_images`
--
ALTER TABLE `periodical_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periodical_id` (`periodical_id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `virtual_library_orientation`
--
ALTER TABLE `virtual_library_orientation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `automated_circulation`
--
ALTER TABLE `automated_circulation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ejournal`
--
ALTER TABLE `ejournal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedbacks_reply`
--
ALTER TABLE `feedbacks_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foundation`
--
ALTER TABLE `foundation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `guidelines`
--
ALTER TABLE `guidelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guideline_rules`
--
ALTER TABLE `guideline_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `information_dissemination`
--
ALTER TABLE `information_dissemination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `internet_computer_aided_research`
--
ALTER TABLE `internet_computer_aided_research`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `library_hours`
--
ALTER TABLE `library_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `library_news`
--
ALTER TABLE `library_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `library_news_img`
--
ALTER TABLE `library_news_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `library_objectives`
--
ALTER TABLE `library_objectives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_current_events`
--
ALTER TABLE `news_current_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `online_reference`
--
ALTER TABLE `online_reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `online_subscription_databases`
--
ALTER TABLE `online_subscription_databases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `opensource_databases`
--
ALTER TABLE `opensource_databases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `periodicals`
--
ALTER TABLE `periodicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `periodical_images`
--
ALTER TABLE `periodical_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `virtual_library_orientation`
--
ALTER TABLE `virtual_library_orientation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `admin_id` FOREIGN KEY (`admin_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `login_history`
--
ALTER TABLE `login_history`
  ADD CONSTRAINT `login_history_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `periodical_images`
--
ALTER TABLE `periodical_images`
  ADD CONSTRAINT `periodical_images_ibfk_1` FOREIGN KEY (`periodical_id`) REFERENCES `periodicals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
