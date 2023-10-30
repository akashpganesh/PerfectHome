-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 03:15 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_houserent`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Akash', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agreement`
--

CREATE TABLE `tbl_agreement` (
  `agreement_id` int(50) NOT NULL,
  `agreement_file` varchar(50) NOT NULL,
  `agreement_fromdate` date NOT NULL,
  `agreement_todate` date NOT NULL,
  `renter_id` int(50) NOT NULL,
  `leaseholder_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agreement`
--

INSERT INTO `tbl_agreement` (`agreement_id`, `agreement_file`, `agreement_fromdate`, `agreement_todate`, `renter_id`, `leaseholder_id`) VALUES
(19, 'Rental-Agreement-Format.jpg', '2023-01-01', '2023-11-30', 13, 0),
(20, 'Rental-Agreement-Format.jpg', '2023-02-01', '2023-12-31', 0, 22),
(21, 'Rental-Agreement-Format.jpg', '2023-03-15', '2024-02-15', 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_discription` varchar(50) NOT NULL,
  `renter_id` int(50) NOT NULL,
  `leaseholder_id` int(11) NOT NULL,
  `complaint_type` int(50) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_discription`, `renter_id`, `leaseholder_id`, `complaint_type`, `complaint_reply`) VALUES
(16, 'No Electricity', 0, 22, 1, ''),
(17, 'bad behaviour', 0, 22, 2, ''),
(18, 'snfkkfns', 0, 22, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `dist_id` int(50) NOT NULL,
  `dist_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`dist_id`, `dist_name`) VALUES
(5, 'Thiruvananthapuram'),
(6, 'Kollam'),
(7, 'Pathanamthitta'),
(8, 'Alappuzha'),
(9, 'Kottayam'),
(10, 'Idukki'),
(11, 'Ernakulam'),
(12, 'Thrissur'),
(13, 'Palakkad'),
(14, 'Malappuram'),
(15, 'Kozhikode'),
(16, 'Wayanad'),
(17, 'Kannur'),
(18, 'Kasaragod');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(50) NOT NULL,
  `feedback_subject` varchar(50) NOT NULL,
  `feedback_discription` varchar(100) NOT NULL,
  `user_id` int(50) NOT NULL,
  `owner_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_house`
--

CREATE TABLE `tbl_house` (
  `house_id` int(50) NOT NULL,
  `house_name` varchar(50) NOT NULL,
  `owner_id` int(50) NOT NULL,
  `house_contact` varchar(50) NOT NULL,
  `house_address` varchar(50) NOT NULL,
  `place_id` int(50) NOT NULL,
  `house_photo` varchar(50) NOT NULL,
  `house_status` int(50) NOT NULL DEFAULT 0,
  `house_price` varchar(100) NOT NULL,
  `house_securityamount` varchar(100) NOT NULL,
  `type_id` int(50) NOT NULL,
  `house_facilities` longtext NOT NULL,
  `house_beds` int(50) NOT NULL,
  `house_baths` int(50) NOT NULL,
  `house_landmark` varchar(50) NOT NULL,
  `house_rentpayment` int(50) NOT NULL DEFAULT 0,
  `house_area` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_house`
--

INSERT INTO `tbl_house` (`house_id`, `house_name`, `owner_id`, `house_contact`, `house_address`, `place_id`, `house_photo`, `house_status`, `house_price`, `house_securityamount`, `type_id`, `house_facilities`, `house_beds`, `house_baths`, `house_landmark`, `house_rentpayment`, `house_area`) VALUES
(24, 'Woodlands', 10, '9876354037', 'Woodlands,\r\nPiravom,\r\nErnakulam', 39, 'house4.jpg', 1, '6000', '30000', 2, '1 hall\r\n1 dining room\r\n1 kitchen', 4, 4, 'BPC College', 0, 0),
(25, 'Oaklands', 11, '9838293893', 'Ocklands,\r\nMuvattupuzha,\r\nErnakulam', 36, 'ELEVATED-HOUSE-DESIGN-FEATURE-compressed.jpg', 1, '8000', '40000', 2, '1 hall\r\n1 dining room\r\n1 kitchen', 3, 3, '', 0, 0),
(26, 'Winterfell', 12, '8937492035', 'Winterfell,\r\nKothamangalam,\r\nErnakulam', 37, 'house2.jpg', 3, '7000', '40000', 2, '1 hall\r\n1 dinning room\r\n1 kitchen', 3, 3, '', 6, 0),
(27, 'Fairview', 12, '8937492035', 'Fairview,\r\nPala,\r\nKottayam', 26, 'hero_bg_1.jpg', 1, '5000', '20000', 2, '1 hall\r\n1 dinning room\r\n1 kitchen', 3, 3, '', 0, 1000),
(28, 'The Hollies', 12, '8937492035', 'The Hollies,\r\nKochi,\r\nErnakulam', 33, 'house12.jpg', 1, '9000', '40000', 4, '1 hall\r\n1 dinning room\r\n1 kitchen', 4, 4, '', 0, 1200),
(29, 'Treetops', 11, '9838293893', 'Treetops,\r\nIrinjalakuda,\r\nThrissur', 42, 'hero_bg_4.jpg', 1, '5000', '20000', 2, '1 hall\r\n1 dinning room\r\n1 kitchen', 3, 2, '', 0, 900),
(30, 'Dreams ville', 13, '8396287676', 'Dreams Ville,\r\nEttumanoor,\r\nKottayam', 28, 'Double-Floor-Kerala-Home-Design-1.jpg', 3, '7000', '30000', 1, '1 hall,\r\n1 dinning room,\r\n1 kitchen', 3, 2, '', 10, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_housegallary`
--

CREATE TABLE `tbl_housegallary` (
  `gallary_id` int(50) NOT NULL,
  `gallary_caption` varchar(50) NOT NULL,
  `gallary_filename` varchar(200) NOT NULL,
  `house_id` int(50) NOT NULL,
  `lease_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_housegallary`
--

INSERT INTO `tbl_housegallary` (`gallary_id`, `gallary_caption`, `gallary_filename`, `house_id`, `lease_id`) VALUES
(22, 'image1', '05_interiordesignercagla_Screen_Shot_2022-03-24_at_2.52.10_PM.png', 26, 0),
(23, 'image2', 'vastu-for-home-gardens-10-tips-to-attract-positivity-and-fortune-to-your-home2-1366x768.webp', 26, 0),
(24, 'image3', 'open-kictchen-design-ideas.jpg', 26, 0),
(25, 'image1', 'b4b99b23-d0a9-1ef6-7857-42ec4018c25c.webp', 27, 0),
(26, 'image2', 'home-house-building-exterior-interior-design-showing-tropical-pool-villa-green-garden-146979093.jpg', 27, 0),
(27, 'image3', 'interior-design-trends-2022-home-libraries-1653410954.jpg', 27, 0),
(28, 'image1', 'download.jpg', 28, 0),
(29, 'image2', 'contemporary-dining-room-design-ideas.jpg', 28, 0),
(30, 'image3', 'modern-house-interiors.webp', 28, 0),
(31, 'image1', 'TheSoloist Inspiration.jpg', 0, 13),
(32, 'image2', 'photo-1617806118233-18e1de247200.jpg', 0, 13),
(33, 'image3', 'House-Interior-Design.jpg', 0, 13),
(34, 'image1', 'Dining_Room_0719_Beck_8.30.183448.0-1-scaled.jpg.optimal.jpg', 24, 0),
(35, 'image2', 'photo-1616046229478-9901c5536a45.jpg', 24, 0),
(36, 'image3', 'photo-1560185893-a55cbc8c57e8.jpg', 24, 0),
(37, 'image1', 'edc100122brockschmidt-web-001-1664480031.jpg', 0, 11),
(38, 'image2', 'open-kictchen-design-ideas.jpg', 0, 11),
(39, 'image3', 'montecito-style-calabasas-grace-home-furnishings-img_d68173fa0b2c18ef_4-7292-1-f9e6ea8.jpg', 0, 11),
(40, 'image1', 'istockphoto-1208205959-612x612.jpg', 25, 0),
(41, 'image2', 'Dining_Room_0719_Beck_8.30.183448.0-1-scaled.jpg.optimal.jpg', 25, 0),
(42, 'image3', 'TheSoloist Inspiration.jpg', 25, 0),
(43, 'image1', 'download.jpg', 29, 0),
(44, 'image2', 'contemporary-dining-room-design-ideas.jpg', 29, 0),
(45, 'image3', 'photo-1616046229478-9901c5536a45.jpg', 29, 0),
(46, 'image1', 'Interior-designers-in-HSR-Layout-1024x683.jpg', 0, 8),
(47, 'image2', 'interior-design-trends-2022-home-libraries-1653410954.jpg', 0, 8),
(48, 'image3', 'photo-1560185893-a55cbc8c57e8.jpg', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_housetype`
--

CREATE TABLE `tbl_housetype` (
  `type_id` int(50) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_housetype`
--

INSERT INTO `tbl_housetype` (`type_id`, `type_name`) VALUES
(1, 'Traditional House'),
(2, 'Modern House'),
(3, 'Appartment'),
(4, 'Villa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lease`
--

CREATE TABLE `tbl_lease` (
  `lease_id` int(50) NOT NULL,
  `lease_name` varchar(50) NOT NULL,
  `lease_address` varchar(50) NOT NULL,
  `place_id` int(50) NOT NULL,
  `lease_landmark` varchar(50) NOT NULL,
  `lease_facilities` varchar(50) NOT NULL,
  `lease_beds` int(50) NOT NULL,
  `lease_baths` int(50) NOT NULL,
  `lease_cent` varchar(50) NOT NULL,
  `lease_amount` double NOT NULL,
  `owner_id` int(50) NOT NULL,
  `type_id` int(50) NOT NULL,
  `lease_maxyear` int(50) NOT NULL,
  `lease_photo` varchar(50) NOT NULL,
  `lease_contact` varchar(50) NOT NULL,
  `lease_advance` double NOT NULL,
  `lease_status` int(50) NOT NULL DEFAULT 0,
  `lease_paymentstatus` int(50) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lease`
--

INSERT INTO `tbl_lease` (`lease_id`, `lease_name`, `lease_address`, `place_id`, `lease_landmark`, `lease_facilities`, `lease_beds`, `lease_baths`, `lease_cent`, `lease_amount`, `owner_id`, `type_id`, `lease_maxyear`, `lease_photo`, `lease_contact`, `lease_advance`, `lease_status`, `lease_paymentstatus`) VALUES
(8, 'Hillside', 'Hillside,\r\nCherthala,\r\nAlappuzha\r\n', 20, '', '1 hall,\r\n1 dinning room,\r\n1 kitchen', 3, 3, '1000', 200000, 11, 1, 10, 'img_21.jpg', '9838293893', 40000, 3, 2),
(10, 'Wayside', 'Wayside,\r\nThodupuzha,\r\nIdukki', 31, '', '1 hall,\r\n1 dinning room,\r\n1 kitchen', 3, 3, '1000', 200000, 10, 2, 8, 'Contemporary-Modern-House-Design-6.1539270983.8601', '9876354037', 40000, 2, 1),
(11, 'Silverwood', 'Silverwood,\r\nThodupuzha,\r\nIdukki\r\n', 31, '', '1 hall,\r\n1 dinning room,\r\n1 kitchen', 3, 2, '1000', 250000, 10, 2, 8, 'header1.jpg', '9876354037', 40000, 1, 1),
(12, 'Old Cottage', 'Old Cottage,\r\nKothamangalam,\r\nErnakulam', 37, '', '1 hall,\r\n1 dinning room,\r\n1 kitchen', 4, 3, '1200', 200000, 13, 1, 10, 'house3.jpg', '8396287676', 50000, 1, 1),
(13, 'Little Oaks', 'Little Oaks', 33, '', '1 hall\r\n1 dinning room\r\n1 kitchen', 3, 3, '1000', 175000, 12, 4, 8, 'download-23.jpg', '8937492035', 20000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leaseholder`
--

CREATE TABLE `tbl_leaseholder` (
  `leaseholder_id` int(50) NOT NULL,
  `lease_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `leaseholder_status` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leaseholder`
--

INSERT INTO `tbl_leaseholder` (`leaseholder_id`, `lease_id`, `user_id`, `leaseholder_status`) VALUES
(22, 8, 41, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leaserequest`
--

CREATE TABLE `tbl_leaserequest` (
  `leasereq_id` int(50) NOT NULL,
  `lease_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `leasereq_contact` varchar(50) NOT NULL,
  `leasereq_fromdate` date NOT NULL,
  `leasereq_proof` varchar(50) NOT NULL,
  `leasereq_year` int(50) NOT NULL,
  `leasereq_status` int(50) NOT NULL DEFAULT 0,
  `leasereq_status2` int(50) NOT NULL DEFAULT 0,
  `leasereq_status3` int(50) NOT NULL DEFAULT 1,
  `leasereq_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leaserequest`
--

INSERT INTO `tbl_leaserequest` (`leasereq_id`, `lease_id`, `user_id`, `leasereq_contact`, `leasereq_fromdate`, `leasereq_proof`, `leasereq_year`, `leasereq_status`, `leasereq_status2`, `leasereq_status3`, `leasereq_date`) VALUES
(10, 8, 41, '', '2023-02-01', 'image-170-1024x683.png', 8, 1, 1, 1, '2023-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leaverequest`
--

CREATE TABLE `tbl_leaverequest` (
  `leavereq_id` int(50) NOT NULL,
  `leavereq_reason` varchar(50) NOT NULL,
  `renter_id` int(50) NOT NULL,
  `leaseholder_id` int(50) NOT NULL,
  `leavereq_status` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_owner`
--

CREATE TABLE `tbl_owner` (
  `owner_id` int(50) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `owner_email` varchar(50) NOT NULL,
  `owner_password` varchar(50) NOT NULL,
  `owner_contact` varchar(50) NOT NULL,
  `place_id` int(50) NOT NULL,
  `owner_photo` varchar(50) NOT NULL,
  `owner_proof` varchar(50) NOT NULL,
  `owner_status` varchar(50) NOT NULL DEFAULT '0',
  `owner_gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_owner`
--

INSERT INTO `tbl_owner` (`owner_id`, `owner_name`, `owner_email`, `owner_password`, `owner_contact`, `place_id`, `owner_photo`, `owner_proof`, `owner_status`, `owner_gender`) VALUES
(10, 'Athul Sunny', 'athul12@gmail.com', 'athul321', '9876354037', 39, 'person_1.jpg', 'image-170-1024x683.png', '1', 'Male'),
(11, 'Anandhu Narayanan', 'anandhu12@gmail.com', 'anandhu321', '9838293893', 26, 'person_4.jpg', 'image-170-1024x683.png', '1', 'Male'),
(12, 'Akash P Ganesh', 'akashpganesh2002@gmail.com', 'akash321', '8937492035', 36, 'img-avatar-3.jpg', 'image-170-1024x683.png', '1', 'Male'),
(13, 'Vysakh', 'vysakh@gmail.com', 'vysakh321', '8396287676', 37, 'staff-4.jpg', 'image-170-1024x683.png', '1', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(50) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `dist_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `dist_id`) VALUES
(4, 'Thiruvananthapuram city', 5),
(5, 'Neyyattinkara', 5),
(6, 'Nedumangad', 5),
(7, 'Attingal', 5),
(8, 'Varkala', 5),
(9, 'Punalur', 6),
(11, 'Karunagappali', 6),
(12, 'Kundara', 6),
(13, 'Ranni', 7),
(14, 'Adur', 7),
(15, 'Thiruvalla', 7),
(16, 'Aranmula', 7),
(17, 'Konni', 7),
(18, 'Alappuzha', 8),
(19, 'Chengannur', 8),
(20, 'Cherthala', 8),
(21, 'Haripad', 8),
(22, 'Kayamkulam', 8),
(23, 'Mavelikara', 8),
(24, 'Kottayam', 9),
(25, 'Changanassery', 9),
(26, 'Pala', 9),
(27, 'Erattupetta', 9),
(28, 'Ettumanoor', 9),
(29, 'Vaikom', 9),
(30, 'Kattappana', 10),
(31, 'Thodupuzha', 10),
(32, 'Ernakulam', 11),
(33, 'Kochi', 11),
(34, 'Aluva', 11),
(35, 'Angamaly', 11),
(36, 'Muvattupuzha', 11),
(37, 'Kothamangalam', 11),
(38, 'Perumbavoor', 11),
(39, 'Piravom', 11),
(40, 'Chalakudy', 12),
(41, 'Chavakkad', 12),
(42, 'Irinjalakuda', 12),
(43, 'Guruvayur', 12),
(44, 'Kodungallur', 12),
(45, 'Vadakkanchery', 12),
(46, 'Thrissur', 12),
(47, 'Manarkkad', 13),
(48, 'Ottappalam', 13),
(49, 'Palakkad', 13),
(50, 'Pattambi', 13),
(51, 'Shornur', 13),
(52, 'Malappuram', 14),
(53, 'Manjeri', 14),
(54, 'Kondotty', 14),
(55, 'Karippur', 14),
(56, 'Calicut City', 15),
(57, 'Koyilandy', 15),
(58, 'Perambra', 15),
(59, 'Ramanattukara', 15),
(60, 'Kalpetta', 16),
(61, 'Mananthavady', 16),
(62, 'Sulthan Bathery', 16),
(63, 'Kannur', 17),
(64, 'Taliparambu', 17),
(65, 'Payyanur', 17),
(66, 'Kuthuparambu', 17),
(67, 'Kasargod', 18),
(68, 'Kanhangad', 18),
(69, 'Uppala', 18),
(71, 'Nileshwaram', 18),
(73, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rent`
--

CREATE TABLE `tbl_rent` (
  `rent_id` int(50) NOT NULL,
  `rent_date` date NOT NULL,
  `rent_comment` varchar(50) NOT NULL,
  `rent_month` varchar(50) NOT NULL,
  `rent_year` varchar(50) NOT NULL,
  `renter_id` int(50) NOT NULL,
  `rent_amount` int(50) NOT NULL,
  `rent_months` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rent`
--

INSERT INTO `tbl_rent` (`rent_id`, `rent_date`, `rent_comment`, `rent_month`, `rent_year`, `renter_id`, `rent_amount`, `rent_months`) VALUES
(25, '2023-03-08', '', 'Mar', '2023', 13, 21000, 3),
(26, '2023-04-29', '', 'Apr', '2023', 13, 7000, 1),
(27, '2023-09-05', '', 'Sep', '2023', 13, 35000, 5),
(28, '2023-09-05', '', 'Sep', '2023', 14, 42000, 6),
(29, '2023-10-27', '', 'Oct', '2023', 13, 7000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_renter`
--

CREATE TABLE `tbl_renter` (
  `renter_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `house_id` int(50) NOT NULL,
  `renter_date` date NOT NULL,
  `renter_status` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_renter`
--

INSERT INTO `tbl_renter` (`renter_id`, `user_id`, `house_id`, `renter_date`, `renter_status`) VALUES
(13, 41, 30, '2023-03-07', 0),
(14, 41, 26, '2023-03-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rentrequest`
--

CREATE TABLE `tbl_rentrequest` (
  `rentreq_id` int(50) NOT NULL,
  `house_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `rentreq_contact` varchar(50) NOT NULL,
  `rentreq_proof` varchar(50) NOT NULL,
  `rentreq_fromdate` date NOT NULL,
  `rentreq_status` int(50) NOT NULL DEFAULT 0,
  `rentreq_status2` int(11) NOT NULL DEFAULT 0,
  `rentreq_status3` int(50) NOT NULL DEFAULT 1,
  `rentreq_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rentrequest`
--

INSERT INTO `tbl_rentrequest` (`rentreq_id`, `house_id`, `user_id`, `rentreq_contact`, `rentreq_proof`, `rentreq_fromdate`, `rentreq_status`, `rentreq_status2`, `rentreq_status3`, `rentreq_date`) VALUES
(11, 30, 41, '', 'image-170-1024x683.png', '2023-01-01', 1, 1, 1, '2022-12-26'),
(12, 26, 41, '9876543878', 'image-170-1024x683.png', '2023-03-15', 1, 1, 1, '2023-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_gender` varchar(50) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_status` int(50) NOT NULL DEFAULT 0,
  `place_id` int(50) NOT NULL,
  `user_photo` varchar(50) NOT NULL,
  `user_proof` varchar(50) NOT NULL,
  `user_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_gender`, `user_contact`, `user_email`, `user_password`, `user_status`, `place_id`, `user_photo`, `user_proof`, `user_address`) VALUES
(36, 'Visal Balakrishnan', 'Male', '9835761285', 'visal@gmail.com', 'visal123', 1, 39, 'staff-3.jpg', '', ''),
(37, 'Athul Binu', 'Male', '9543764525', 'athul@gmail.com', 'athul123', 1, 36, 'agent-1.jpg', '', ''),
(38, 'Arjun Krishna', 'Male', '9834764827', 'arjun@gmail.com', 'arjun123', 1, 36, 'team-5.jpg', '', ''),
(39, 'Basil Rajan', 'Male', '9763428653', 'basil@gmail.com', 'basil123', 1, 36, '3.jpg', '', ''),
(40, 'Anandhu Shaji', 'Male', '9853850824', 'anandhu@gmail.com', 'anandhu123', 1, 37, 'agent-6.jpg', '', ''),
(41, 'Akash P Ganesh', 'Male', '9743593046', 'akashpganesh2002@gmail.com', 'akash123', 0, 37, 'person_2 (2).jpg', '', ''),
(42, 'Vysakh Shibu', 'Male', '9876354037', 'vysakhshibu6@gmail.com', 'vysakh123', 0, 37, '1.jpg', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_agreement`
--
ALTER TABLE `tbl_agreement`
  ADD PRIMARY KEY (`agreement_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`dist_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_house`
--
ALTER TABLE `tbl_house`
  ADD PRIMARY KEY (`house_id`);

--
-- Indexes for table `tbl_housegallary`
--
ALTER TABLE `tbl_housegallary`
  ADD PRIMARY KEY (`gallary_id`);

--
-- Indexes for table `tbl_housetype`
--
ALTER TABLE `tbl_housetype`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_lease`
--
ALTER TABLE `tbl_lease`
  ADD PRIMARY KEY (`lease_id`);

--
-- Indexes for table `tbl_leaseholder`
--
ALTER TABLE `tbl_leaseholder`
  ADD PRIMARY KEY (`leaseholder_id`);

--
-- Indexes for table `tbl_leaserequest`
--
ALTER TABLE `tbl_leaserequest`
  ADD PRIMARY KEY (`leasereq_id`);

--
-- Indexes for table `tbl_leaverequest`
--
ALTER TABLE `tbl_leaverequest`
  ADD PRIMARY KEY (`leavereq_id`);

--
-- Indexes for table `tbl_owner`
--
ALTER TABLE `tbl_owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_rent`
--
ALTER TABLE `tbl_rent`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `tbl_renter`
--
ALTER TABLE `tbl_renter`
  ADD PRIMARY KEY (`renter_id`);

--
-- Indexes for table `tbl_rentrequest`
--
ALTER TABLE `tbl_rentrequest`
  ADD PRIMARY KEY (`rentreq_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_agreement`
--
ALTER TABLE `tbl_agreement`
  MODIFY `agreement_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `dist_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_house`
--
ALTER TABLE `tbl_house`
  MODIFY `house_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_housegallary`
--
ALTER TABLE `tbl_housegallary`
  MODIFY `gallary_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_housetype`
--
ALTER TABLE `tbl_housetype`
  MODIFY `type_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_lease`
--
ALTER TABLE `tbl_lease`
  MODIFY `lease_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_leaseholder`
--
ALTER TABLE `tbl_leaseholder`
  MODIFY `leaseholder_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_leaserequest`
--
ALTER TABLE `tbl_leaserequest`
  MODIFY `leasereq_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_leaverequest`
--
ALTER TABLE `tbl_leaverequest`
  MODIFY `leavereq_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_owner`
--
ALTER TABLE `tbl_owner`
  MODIFY `owner_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_rent`
--
ALTER TABLE `tbl_rent`
  MODIFY `rent_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_renter`
--
ALTER TABLE `tbl_renter`
  MODIFY `renter_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_rentrequest`
--
ALTER TABLE `tbl_rentrequest`
  MODIFY `rentreq_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
