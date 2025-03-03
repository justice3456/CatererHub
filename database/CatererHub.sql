-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2024 at 08:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CatererHub`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`admin_id`, `email`, `password_hash`, `created_at`) VALUES
(1, 'admin.admin@catererHub.com', '$2y$10$G3dRzgtxhC11dSRyJ7yAz.A7G/XOcWz7mUY6xSHiDjvQ8aeCNKPja', '2024-12-03 19:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `Ad_Interactions`
--

CREATE TABLE `Ad_Interactions` (
  `id` int(11) NOT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `event_planner_id` int(11) DEFAULT NULL,
  `status` enum('requested','pending','completed','rejected') DEFAULT 'requested',
  `due_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `caterer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Ad_Interactions`
--

INSERT INTO `Ad_Interactions` (`id`, `ad_id`, `event_planner_id`, `status`, `due_date`, `created_at`, `caterer_id`) VALUES
(7, 18, 24, 'requested', NULL, '2024-12-03 05:50:49', 53),
(8, 15, 24, 'requested', NULL, '2024-12-03 05:50:56', 53),
(9, 19, 24, 'requested', NULL, '2024-12-03 05:51:06', 53),
(10, 5, 24, 'requested', NULL, '2024-12-03 05:51:11', 52);

-- --------------------------------------------------------

--
-- Table structure for table `Caterers`
--

CREATE TABLE `Caterers` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `event_types` set('wedding','party','funeral','corporate','individual') DEFAULT NULL,
  `dietary_restrictions` set('vegan','vegetarian','gluten_free') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `service_areas` set('Accra','Kumasi','Takoradi','Tamale','Cape Coast','Ho','Sunyani','Bolgatanga','Wa','Tema','Koforidua') DEFAULT NULL,
  `featured_status` enum('featured','not_featured') DEFAULT 'not_featured'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Caterers`
--

INSERT INTO `Caterers` (`id`, `business_name`, `contact_email`, `contact_phone`, `password`, `event_types`, `dietary_restrictions`, `created_at`, `service_areas`, `featured_status`) VALUES
(49, 'Mummy\'s Food', 'justicequasgsrainejnr@gmail.com', '0256934566', '$2y$10$OByuo9Z2vYCC5rJmTgqJSu3rq2DPwE.uRNKqZN9eIixeuaro3hpVO', 'party', 'vegetarian,gluten_free', '2024-11-25 13:26:15', 'Takoradi', 'not_featured'),
(51, 'Mummy\'s Food', 'justicequasgsrasinejnr@gmail.com', '0256934566', '$2y$10$9almV1/UKKbc8e.VBw9N0eCl/RUw14QONKc7egkpqJAQG2EvPW/Y.', 'party', 'vegetarian,gluten_free', '2024-11-25 13:28:17', 'Takoradi', 'not_featured'),
(52, 'A new meal', 'justicequagrainejnr@gmail.com', '0256934566', '$2y$10$6L.J/OLaFOJG6sm.E405BuBu0jO.tgeNmbDAlNu5B5hAJ8DUyskEW', 'funeral,individual', 'vegetarian', '2024-11-25 13:35:05', 'Cape Coast', 'featured'),
(53, 'Mumms Food', 'justicequagraianejnr@gmail.com', '0256934566', '$2y$10$8e5Bm5BEhyh6fvVROfrL8.cITCdHH2VHX7sAB50BfncDR93.9Rx9.', 'wedding,corporate,individual', 'vegetarian,gluten_free', '2024-11-25 13:37:57', 'Tema', 'not_featured');

-- --------------------------------------------------------

--
-- Table structure for table `Caterer_Ads`
--

CREATE TABLE `Caterer_Ads` (
  `ad_id` int(11) NOT NULL,
  `caterer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `promotion_status` enum('promotion','no_promotion') DEFAULT 'no_promotion',
  `event_types` enum('wedding','party','funeral','corporate','individual') DEFAULT NULL,
  `promotion_start_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Caterer_Ads`
--

INSERT INTO `Caterer_Ads` (`ad_id`, `caterer_id`, `title`, `description`, `image_path`, `created_at`, `promotion_status`, `event_types`, `promotion_start_date`) VALUES
(4, 52, 'Water and drinks', 'Water and drinks', '../../caterer_images/ad_images//6748061d22359Caterer\'s Hub Logo.jpeg', '2024-11-28 05:56:45', NULL, NULL, NULL),
(5, 52, 'Another add', 'Watever', '../../caterer_images/ad_images//67480889b7724Caterer\'s Hub Logo.jpeg', '2024-11-28 06:07:05', NULL, NULL, NULL),
(9, 52, 'Something Interesting', 'There is something else that is interesting', '../../caterer_images/ad_images//6748601d17746IMG_0610.jpg', '2024-11-28 12:20:45', NULL, NULL, NULL),
(11, 52, 'A new add', 'Hmm', '../../caterer_images/ad_images//674d28a64bd53alexander-kovacs-uo9TCt61o30-unsplash.jpg', '2024-12-02 03:25:26', 'promotion', 'party', '2024-12-03 00:00:00'),
(12, 53, 'Jollof and Yam', 'Something to eat', '../../caterer_images/ad_images//674e110ebdaa4clapperboard.png', '2024-12-02 19:57:02', NULL, NULL, NULL),
(14, 53, 'Another one', 'Hmm', '../../caterer_images/ad_images//674e5af02c93fcamera.png', '2024-12-03 01:12:16', NULL, 'funeral', NULL),
(15, 53, 'Get new add', 'Description', '../../caterer_images/ad_images//674e5b07c1aaccamera.png', '2024-12-03 01:12:39', NULL, 'party', NULL),
(16, 53, 'mnf', 'ksjn fjk', '../../caterer_images/ad_images//674e5b13a09e6clapperboard.png', '2024-12-03 01:12:51', NULL, 'funeral', NULL),
(18, 53, 'jksnfnsj', 'skjgfnkdsjnd', '../../caterer_images/ad_images//674e5b467bb8ecreative.png', '2024-12-03 01:13:42', NULL, 'party', NULL),
(19, 53, 'kjnkfjs', 'ksjfn kjsfs', '../../caterer_images/ad_images//674e5cd0a3507ad.png', '2024-12-03 01:20:16', NULL, 'wedding', NULL),
(21, 52, 'ksjnfj jgd s df', 'sdkfjnfjssdj vcsfdhvjs jfhv fsjd vjfs vfsv', '../../caterer_images/ad_images//674f1bfe22d9ebusiness_profile_picture.png', '2024-12-03 14:55:58', 'no_promotion', 'party', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Caterer_Images`
--

CREATE TABLE `Caterer_Images` (
  `id` int(11) NOT NULL,
  `caterer_id` int(11) DEFAULT NULL,
  `profile_picture_path` varchar(255) DEFAULT NULL,
  `banner_picture_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Caterer_Images`
--

INSERT INTO `Caterer_Images` (`id`, `caterer_id`, `profile_picture_path`, `banner_picture_path`) VALUES
(13, 52, '../../caterer_images/profile_pictures/674b8d4b80b70foodgif.gif', '../../caterer_images/profile_banner/674b8d4b81034Screenshot 2024-11-29 at 10.29.30.png'),
(25, 53, '../../caterer_images/profile_pictures/674e10cf5b07ead.png', '../../caterer_images/profile_banner/674e10cf5b532alexander-kovacs-uo9TCt61o30-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Event_Planners`
--

CREATE TABLE `Event_Planners` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` enum('Accra','Kumasi','Takoradi','Tamale','Cape Coast','Ho','Sunyani','Bolgatanga','Wa','Tema','Koforidua') DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Event_Planners`
--

INSERT INTO `Event_Planners` (`id`, `username`, `email`, `phone_number`, `password`, `location`, `image_path`) VALUES
(24, 'Justice Two', 'justicequagrainejnr@gmail.com', '0578954578', '$2y$10$7OQ6PRqG3EDA5CVEqRCiZOO/AxpJ.J4YHgbWbXI30wsOiQrDBs8Mu', 'Ho', '../../eventplanner_images/profile_pictures/674efc311a957ad.png');

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE `Posts` (
  `id` int(11) NOT NULL,
  `caterer_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Posts`
--

INSERT INTO `Posts` (`id`, `caterer_id`, `content`, `image_path`, `video_path`, `created_at`) VALUES
(1, 52, 'What will you like', '../../caterer_images/post_images/674d05c8e3844foodgif.gif', NULL, '2024-12-02 00:56:40'),
(2, 52, 'What will you like', '../../caterer_images/post_images/674d05ede849ffoodgif.gif', NULL, '2024-12-02 00:57:17'),
(3, 52, 'Something new', '../../caterer_images/post_images/674d099876e3a2.20747770.jpg', NULL, '2024-12-02 01:12:56'),
(4, 52, 'Another one', '../../caterer_images/post_images/674d0b0a7e6ccdemo_profile.jpg', NULL, '2024-12-02 01:19:06'),
(5, 52, 'Somwth', NULL, '../../caterer_videos/post_videos/674d1282ed930.mp4', '2024-12-02 01:50:58'),
(6, 52, 'Dance', NULL, '../../caterer_videos/post_videos/674d13aff1552.mp4', '2024-12-02 01:55:59'),
(7, 52, 'ksjnkfd', NULL, '../../caterer_videos/post_videos/674d13d09e504.webm', '2024-12-02 01:56:32'),
(8, 52, 'Hmm', '../../caterer_images/post_images/674d13ebc6746.png', NULL, '2024-12-02 01:56:59'),
(9, 52, 'another post no text', NULL, NULL, '2024-12-02 02:23:09'),
(10, 52, 'New video post', NULL, '../../caterer_videos/post_videos/674d28b499619.webm', '2024-12-02 03:25:40'),
(11, 53, 'My first post over here wow', NULL, NULL, '2024-12-03 12:54:00'),
(12, 52, '', NULL, NULL, '2024-12-03 14:45:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `Ad_Interactions`
--
ALTER TABLE `Ad_Interactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ad_id` (`ad_id`),
  ADD KEY `event_planner_id` (`event_planner_id`),
  ADD KEY `fk_caterer` (`caterer_id`);

--
-- Indexes for table `Caterers`
--
ALTER TABLE `Caterers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_email` (`contact_email`);

--
-- Indexes for table `Caterer_Ads`
--
ALTER TABLE `Caterer_Ads`
  ADD PRIMARY KEY (`ad_id`),
  ADD KEY `caterer_id` (`caterer_id`);

--
-- Indexes for table `Caterer_Images`
--
ALTER TABLE `Caterer_Images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `caterer_id` (`caterer_id`);

--
-- Indexes for table `Event_Planners`
--
ALTER TABLE `Event_Planners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caterer_id` (`caterer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Ad_Interactions`
--
ALTER TABLE `Ad_Interactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Caterers`
--
ALTER TABLE `Caterers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `Caterer_Ads`
--
ALTER TABLE `Caterer_Ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Caterer_Images`
--
ALTER TABLE `Caterer_Images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `Event_Planners`
--
ALTER TABLE `Event_Planners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Ad_Interactions`
--
ALTER TABLE `Ad_Interactions`
  ADD CONSTRAINT `ad_interactions_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `Caterer_Ads` (`ad_id`),
  ADD CONSTRAINT `ad_interactions_ibfk_2` FOREIGN KEY (`event_planner_id`) REFERENCES `Event_Planners` (`id`),
  ADD CONSTRAINT `fk_caterer` FOREIGN KEY (`caterer_id`) REFERENCES `Caterers` (`id`);

--
-- Constraints for table `Caterer_Ads`
--
ALTER TABLE `Caterer_Ads`
  ADD CONSTRAINT `caterer_ads_ibfk_1` FOREIGN KEY (`caterer_id`) REFERENCES `Caterers` (`id`);

--
-- Constraints for table `Caterer_Images`
--
ALTER TABLE `Caterer_Images`
  ADD CONSTRAINT `caterer_images_ibfk_1` FOREIGN KEY (`caterer_id`) REFERENCES `Caterers` (`id`);

--
-- Constraints for table `Posts`
--
ALTER TABLE `Posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`caterer_id`) REFERENCES `Caterers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
