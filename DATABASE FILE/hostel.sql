-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 08, 2025 at 04:38 PM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u406441005_hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `content`, `image`) VALUES
(11, 'Vidyamarg Hostels – The Best Accommodations for Students in Patna', 'Finding the right hostel is crucial for students preparing for NEET, IIT, foundation batches, and other competitive exams. Vidyamarg simplifies this process by offering a comprehensive listing of boys\', girls\', and co-living hostels in Patna, ensuring a safe and comfortable stay for students.\r\n\r\nOur verified hostels provide a study-friendly environment, well-equipped with modern amenities, hygienic food, and secure premises. Whether you are looking for a peaceful single room or an affordable shared space, Vidyamarg helps you explore the best accommodations tailored to your needs.\r\n\r\nWe understand that students require more than just a place to stay. That’s why Vidyamarg also provides counseling and mentorship support, helping students manage academic stress and stay motivated. With well-maintained facilities, high-speed Wi-Fi, nutritious meals, and 24/7 security, we ensure that students can focus entirely on their studies without any distractions.\r\n\r\nFor those looking for co-living spaces, we offer budget-friendly and community-driven accommodations, fostering collaboration and a sense of belonging among students. Our hostels are strategically located near top coaching institutes and colleges, making daily commutes easier.\r\n\r\nWith Vidyamarg, finding the perfect hostel is now effortless. Explore, compare, and book from our verified listings to make an informed decision for a stress-free student life.\r\n\r\nWhy Choose Vidyamarg?\r\n✅ Verified hostels with complete details\r\n✅ Safe and secure accommodations for boys and girls\r\n✅ Budget-friendly co-living spaces\r\n✅ Study-friendly environment with mentorship support\r\n✅ Hygienic food, Wi-Fi, and modern amenities\r\n\r\nFind your perfect hostel in Patna today with Vidyamarg', 'condos-pool.png');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) NOT NULL,
  `auser` varchar(50) NOT NULL,
  `aemail` varchar(50) NOT NULL,
  `apass` varchar(50) NOT NULL,
  `adob` date NOT NULL,
  `aphone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `auser`, `aemail`, `apass`, `adob`, `aphone`) VALUES
(9, 'admin', 'admin@gmail.com', '6812f136d636e737248d365016f8cfd5139e387c', '1994-12-06', '1470002569'),
(10, 'Super_admin', 'pdsolution62@gmail.com', '$2y$10$dIyNGE2chcRY20Q9sWATLeJw1Q3iiYuf71It5j1lgfL', '2025-02-07', '9431070923'),
(18, 'support', 'support@vidyamarg.org', '99d9f299f6663460ba7b6ec7731e5e9013d83542', '2025-03-01', '9431070923');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cid` int(50) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `sid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cid`, `cname`, `sid`) VALUES
(9, 'Patna', 2),
(10, 'Patna', 3),
(11, 'Patna', 4),
(12, 'Patna', 7),
(13, 'Patna', 10),
(14, 'Patna', 15);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(8, 'Mani Raj', 'pdsolution62@gmail.com', '9431070923', 'Demo ', 'Demotext');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `fdescription` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `fdescription`, `status`, `date`) VALUES
(7, 28, 'This is a demo feedback in order to use set it as Testimonial for the site. Just a simply dummy text rather than using lorem ipsum text lines.', 1, '2022-07-23 16:07:08'),
(8, 33, 'This is great. This is just great. Hmmm, just a dummy text for users feedback.', 1, '2022-07-23 21:51:09'),
(9, 37, 'For students in Patna aspiring to crack NEET, IIT-JEE, and other competitive exams, choosing the right coaching and guidance is crucial.', 0, '2025-03-03 09:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `interest` varchar(50) NOT NULL,
  `class` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `message` text DEFAULT NULL,
  `submitted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `pid` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `pcontent` longtext NOT NULL,
  `type` varchar(100) NOT NULL,
  `bhk` varchar(50) NOT NULL,
  `stype` varchar(100) NOT NULL,
  `bedroom` int(50) NOT NULL,
  `bathroom` int(50) NOT NULL,
  `balcony` int(50) NOT NULL,
  `kitchen` int(50) NOT NULL,
  `hall` int(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `size` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `feature` longtext NOT NULL,
  `pimage` varchar(300) NOT NULL,
  `pimage1` varchar(300) NOT NULL,
  `pimage2` varchar(300) NOT NULL,
  `pimage3` varchar(300) NOT NULL,
  `pimage4` varchar(300) NOT NULL,
  `uid` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mapimage` varchar(300) NOT NULL,
  `topmapimage` varchar(300) NOT NULL,
  `groundmapimage` varchar(300) NOT NULL,
  `totalfloor` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `isFeatured` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `title`, `pcontent`, `type`, `bhk`, `stype`, `bedroom`, `bathroom`, `balcony`, `kitchen`, `hall`, `floor`, `size`, `price`, `location`, `city`, `state`, `feature`, `pimage`, `pimage1`, `pimage2`, `pimage3`, `pimage4`, `uid`, `status`, `mapimage`, `topmapimage`, `groundmapimage`, `totalfloor`, `date`, `isFeatured`) VALUES
(25, 'Vidbrant Hostel', '', 'house', '4 BHK', 'Boys', 4, 2, 0, 1, 1, '2nd Floor', 1869, 219690, 'East Boring Canal Road', 'Patna', 'Bihar', '<p>&nbsp;</p>\r\n<!---feature area start--->\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Swiming Pool : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">GYM : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Type : </span>Appartment</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Dining Capacity : </span>10 People</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Church/Temple : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>\r\n<!---feature area end---->\r\n<p>&nbsp;</p>', 'zillhms1.jpg', 'zillhms2.jpg', 'zillhms3.jpg', 'zillhms4.jpg', 'zillhms5.jpg', 30, 'available', 'floorplan_sample.jpg', 'zillhms7.jpg', 'zillhms6.jpg', '2 Floor', '2022-07-21 22:29:20', 0),
(30, 'Sisodia Palace', '<p>Sisodia Palace Hostels offer well-furnished rooms designed for comfort and convenience. Each room is spacious, equipped with essential amenities, and provides a peaceful environment for a comfortable stay. With clean and secure accommodations, students and professionals can enjoy a hassle-free living experience.</p>', 'Single Room', '2 BHK', 'Girls', 3, 2, 2, 1, 1, '2nd Floor', 500, 4000, 'East Boring Road', 'Patna', 'Bihar', '<p>&nbsp;</p>\r\n<!---feature area start--->\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Swiming Pool : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">GYM : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Dining Capacity : </span>10 People</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Church/Temple : </span>No</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>\r\n<!---feature area end---->\r\n<p>&nbsp;</p>', 'daya.jpg', 'girls.jpg', 'devi.jpg', 'img_4.jpg', 'hero_2.jpg', 37, 'available', 'sliderd-1.jpg', 'sliderd-2.jpg', 'lalit.gif', '5 Floor', '2025-02-28 09:20:07', 1),
(31, 'Nagendra Hostel', '<p>Hii this is a demo text for Nagendra Hostel in boring road patna bihar</p>', 'Co-living', '2 BHK', 'Luxury', 4, 2, 2, 1, 1, '2nd Floor', 1200, 4000, 'Tempu stand , kankarbagh mig 331', 'Panch Shiv Mandir', 'Kankarbagh ', '<p>&nbsp;</p>\r\n<!---feature area start--->\r\n<h1 class=\"text-center mt-4\">Hostel Amenities</h1>\r\n<div class=\"container mt-4\">\r\n<div class=\"row\"><!-- General Amenities -->\r\n<div class=\"col-md-4\">\r\n<h5 class=\"text-primary\">General Amenities</h5>\r\n<ul>\r\n<li><strong>Washing Machine:</strong> Yes</li>\r\n<li><strong>Lift:</strong> No</li>\r\n<li><strong>Warden Contact:</strong> 9431070923</li>\r\n<li><strong>CCTV Camera:</strong> Yes</li>\r\n</ul>\r\n</div>\r\n<!-- Connectivity & Power -->\r\n<div class=\"col-md-4\">\r\n<h5 class=\"text-primary\">Connectivity &amp; Power</h5>\r\n<ul>\r\n<li><strong>WiFi:</strong> Yes</li>\r\n<li><strong>Power Backup:</strong> No</li>\r\n<li><strong>Food:</strong> 3 Times</li>\r\n<li><strong>Cleaning:</strong> Daily</li>\r\n</ul>\r\n</div>\r\n<!-- Accommodation -->\r\n<div class=\"col-md-4\">\r\n<h5 class=\"text-primary\">Accommodation</h5>\r\n<ul>\r\n<li><strong>Parking:</strong> Available</li>\r\n<li><strong>Guest Room for Parents:</strong> Yes</li>\r\n<li><strong>Attached Washroom:</strong> Yes</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row mt-3\"><!-- Building Details -->\r\n<div class=\"col-md-4\">\r\n<h5 class=\"text-primary\">Building Details</h5>\r\n<ul>\r\n<li><strong>Building Age:</strong> 5 Years</li>\r\n<li><strong>FSSAI License:</strong> Yes</li>\r\n<li><strong>Fire Safety:</strong> Available</li>\r\n</ul>\r\n</div>\r\n<!-- Transport & Library -->\r\n<div class=\"col-md-4\">\r\n<h5 class=\"text-primary\">Transport &amp; Library</h5>\r\n<ul>\r\n<li><strong>Transport Facility:</strong> Yes</li>\r\n<li><strong>Library:</strong> Available</li>\r\n<li><strong>Nearby Institute Distance:</strong> 500m</li>\r\n</ul>\r\n</div>\r\n<!-- Cooling & Heating -->\r\n<div class=\"col-md-4\">\r\n<h5 class=\"text-primary\">Cooling &amp; Heating</h5>\r\n<ul>\r\n<li><strong>Geyser:</strong> No</li>\r\n<li><strong>AC Availability:</strong> Yes</li>\r\n<li><strong>Cooler Available:</strong> No</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row mt-3\"><!-- Room & Washroom -->\r\n<div class=\"col-md-4\">\r\n<h5 class=\"text-primary\">Room &amp; Washroom</h5>\r\n<ul>\r\n<li><strong>Attached Washroom:</strong> Yes</li>\r\n<li><strong>Wardrobe for Every Student:</strong> Yes</li>\r\n<li><strong>Bed Type:</strong> Bed Box</li>\r\n</ul>\r\n</div>\r\n<!-- Staff & Security -->\r\n<div class=\"col-md-4\">\r\n<h5 class=\"text-primary\">Staff &amp; Security</h5>\r\n<ul>\r\n<li><strong>Staff Behavior:</strong> Friendly</li>\r\n<li><strong>Warden Contact:</strong> Not Provided</li>\r\n<li><strong>Hostel Near By:</strong> Not Provided</li>\r\n</ul>\r\n</div>\r\n<!-- Study & Comfort -->\r\n<div class=\"col-md-4\">\r\n<h5 class=\"text-primary\">Study &amp; Comfort</h5>\r\n<ul>\r\n<li><strong>Study Table:</strong> Available</li>\r\n<li><strong>Chair for Every Student:</strong> Yes</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<!---feature area end---->\r\n<p>&nbsp;</p>', 'Vidyamarg.png', 'Vidyamarg.png', 'Vidyamarglogo.png', 'Vidyamarg (1).png', 'Capture.PNG', 37, 'available', 'Vidyamarglogo.png', 'file-FYXJCdCGLovtBCgdFPbCVh.webp', 'Vidyamarg.png', '3 Floor', '2025-03-03 09:07:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `sid` int(50) NOT NULL,
  `sname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`sid`, `sname`) VALUES
(2, 'Boring Road'),
(3, 'Beilly Road'),
(4, 'Rajapur Pul'),
(7, 'Kidwaipuri'),
(9, 'S K Purram'),
(10, 'Hanuman Nagar'),
(15, 'Kankarbagh');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `class` varchar(10) NOT NULL,
  `interested_for` enum('Engineering','Medical','Foundation') NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `email`, `phone`, `gender`, `class`, `interested_for`, `message`, `created_at`) VALUES
(1, 'Prince Kumar', 'pdsolution62@gmail.com', '09431070923', 'male', '11', 'Medical', 'demo text', '2025-03-04 12:15:35'),
(4, 'Mani Raj', 'vidyamarg@gmail.com', '09431070933', 'male', '10', 'Medical', 'demo text', '2025-03-04 12:26:56'),
(6, 'Aakash', 'aag@gmail.com', '8888887777', 'male', '13', 'Medical', 'demo text', '2025-03-04 12:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(50) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `uphone` varchar(20) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `uimage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `uemail`, `uphone`, `upass`, `utype`, `uimage`) VALUES
(30, 'Mani Raj', 'mani@mail.com', '7896665555', '6812f136d636e737248d365016f8cfd5139e387c', 'user', 'avatarm7-min.jpg'),
(36, 'kundan', 'pdsolution62@gmail.com', '9431070923', '8869edd2a1f8f89defa8f929bcfa7236fd090bb3', 'builder', 'avatarm7-min.jpg'),
(37, 'kundan', 'mrp@agent.com', '9431070923', '8869edd2a1f8f89defa8f929bcfa7236fd090bb3', 'agent', 'avatarm7-min.jpg'),
(38, 'Mani ', 'mrp@sample.com', '9525645184', '8869edd2a1f8f89defa8f929bcfa7236fd090bb3', 'user', 'avatarm7-min.jpg'),
(39, 'Chanakya girls hostel ', 'officialraouny@gmail.com', '7667474631', 'd2babfc8ca4a0f57decb9d8b8843fef36ccf32ab', 'builder', 'Snapchat-871676321.jpg'),
(40, 'prashant', 'vidyamarg7@gmail.com', '7667474631', '12d8c51cacefc966404f19e55bfec15cacc297cb', 'user', 'WhatsApp Image 2025-03-08 at 12.11.26_b2ca0798.jpg'),
(41, 'Alok kumar', 'user1@agent.com', '9999988888', '99d9f299f6663460ba7b6ec7731e5e9013d83542', 'agent', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
