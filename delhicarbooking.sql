-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2018 at 03:14 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delhicarbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_carbooking`
--

CREATE TABLE `admin_carbooking` (
  `cbadmin_id` int(20) NOT NULL,
  `cbadmin_username` varchar(50) NOT NULL,
  `cbaddmin_password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_carbooking`
--

INSERT INTO `admin_carbooking` (`cbadmin_id`, `cbadmin_username`, `cbaddmin_password`) VALUES
(1, 'cbadmin_admin', 'cbadmin_pass@123');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `booking_id` int(20) NOT NULL,
  `cust_reference_no` varchar(200) DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `Customer_type` varchar(20) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `additional` text NOT NULL,
  `booking_from` varchar(255) NOT NULL,
  `booking_to` varchar(255) NOT NULL,
  `pick_date` varchar(255) NOT NULL,
  `drop_date` varchar(255) NOT NULL,
  `trip_type` varchar(255) NOT NULL,
  `vehicle_name` varchar(255) NOT NULL,
  `total_charges` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `transaction_number` varchar(255) NOT NULL,
  `booking_status` varchar(255) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `booking_number` varchar(20) NOT NULL,
  `booking_transection_id` varchar(200) DEFAULT NULL,
  `booking_payment_status` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_id`, `cust_reference_no`, `customer_name`, `Customer_type`, `customer_email`, `customer_phone`, `customer_address`, `additional`, `booking_from`, `booking_to`, `pick_date`, `drop_date`, `trip_type`, `vehicle_name`, `total_charges`, `payment_status`, `transaction_number`, `booking_status`, `booking_date`, `booking_number`, `booking_transection_id`, `booking_payment_status`) VALUES
(1, NULL, 'Rinku Vishwakarma', 'Mr', 'rinku.ordius0507@gmail.com', '9935339097', 'New Delhi', '', 'Delhi ', 'Manali ', '10/18/2018 12:43 PM', '2018-10-19', 'One way', 'Assured-Innova(6+1)AC', '7503', 'Pending', 'Pending', 'Pending', '2018-10-18 07:13:44', 'DCB5bc8', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `catalog_id` int(20) NOT NULL,
  `triptype_id` int(20) NOT NULL,
  `trip_id` int(20) NOT NULL,
  `vehicle_id` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`catalog_id`, `triptype_id`, `trip_id`, `vehicle_id`, `status`) VALUES
(8, 3, 5, '4, 5', 'Active'),
(7, 3, 4, '4, 6, 5', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `inqu_id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `inquiry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`inqu_id`, `name`, `email`, `mobile`, `address`, `city`, `country`, `message`, `inquiry_date`) VALUES
(2, 'Lal Bahadur', 'lal.bahadur1210@gmail.com', '9718789479', 'F-1, Sector-3, Noida', 'Noida', 'India', 'I am looking for Cab services', '2018-10-14 21:07:59'),
(3, 'Lal Bahadur', 'lal@gmail.com', '9718789479', 'h5', 'noida', 'India', 'hi', '2018-10-14 22:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `city_id` int(20) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `city_code` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`city_id`, `city_name`, `city_code`) VALUES
(1, 'Abids ', ''),
(2, 'Agartala ', ''),
(3, 'Agra ', ''),
(4, 'Ahmedabad ', ''),
(5, 'Ahmednagar ', ''),
(6, 'Aizawl ', ''),
(7, 'Ajmer ', ''),
(8, 'Akola ', ''),
(9, 'Alappuzha ', ''),
(10, 'Alibag ', ''),
(11, 'Aligarh ', ''),
(12, 'Allahabad ', ''),
(13, 'Almora ', ''),
(14, 'Alwar ', ''),
(15, 'Ambaji ', ''),
(16, 'Amlapuram ', ''),
(17, 'Amravati ', ''),
(18, 'Amreli ', ''),
(19, 'Amritsar ', ''),
(20, 'Anand ', ''),
(21, 'Anandpur Sahib ', ''),
(22, 'Angul ', ''),
(23, 'Anna Salai ', ''),
(24, 'Arambagh ', ''),
(25, 'Asansol ', ''),
(26, 'Auli ', ''),
(27, 'Aurangabad ', ''),
(28, 'Ayodhya ', ''),
(29, 'Azamgarh ', ''),
(30, 'Badaun ', ''),
(31, 'Badrinath ', ''),
(32, 'Balasore ', ''),
(33, 'Ballia ', ''),
(34, 'Banaswara ', ''),
(35, 'Bangalore ', ''),
(36, 'Bankura ', ''),
(37, 'Baran ', ''),
(38, 'Barasat ', ''),
(39, 'Bardhaman ', ''),
(40, 'Bareilly ', ''),
(41, 'Baripada ', ''),
(42, 'Barnala ', ''),
(43, 'Barrackpore ', ''),
(44, 'Barwani ', ''),
(45, 'Basti ', ''),
(46, 'Beawar ', ''),
(47, 'Beed ', ''),
(48, 'Bellary ', ''),
(49, 'Bettiah ', ''),
(50, 'Bhadohi ', ''),
(51, 'Bhadrak ', ''),
(52, 'Bhagalpur ', ''),
(53, 'Bharatpur ', ''),
(54, 'Bharuch ', ''),
(55, 'Bhavnagar ', ''),
(56, 'Bhilai ', ''),
(57, 'Bhilwara ', ''),
(58, 'Bhind ', ''),
(59, 'Bhiwani ', ''),
(60, 'Bhopal ', ''),
(61, 'Bhubaneshwar ', ''),
(62, 'Bhuj ', ''),
(63, 'Bidar ', ''),
(64, 'Bijapur ', ''),
(65, 'Bijnor ', ''),
(66, 'Bikaner ', ''),
(67, 'Bilaspur ', ''),
(68, 'Bilimora ', ''),
(69, 'Bodh Gaya ', ''),
(70, 'Bokaro ', ''),
(71, 'Bundi ', ''),
(72, 'Burhanpur ', ''),
(73, 'Buxur ', ''),
(74, 'Calangute ', ''),
(75, 'Chamba ', ''),
(76, 'Chandauli ', ''),
(77, 'Chandausi ', ''),
(78, 'Chandigarh ', ''),
(79, 'Chandrapur ', ''),
(80, 'Chennai ', ''),
(81, 'Chhapra ', ''),
(82, 'Chhindwara ', ''),
(83, 'Chidambaram ', ''),
(84, 'Chiplun ', ''),
(85, 'Chitradurga ', ''),
(86, 'Chittaurgarh ', ''),
(87, 'Chittoor ', ''),
(88, 'Churu ', ''),
(89, 'Coimbatore ', ''),
(90, 'Cooch Behar ', ''),
(91, 'Cuddapah ', ''),
(92, 'Cuttack ', ''),
(93, 'Dahod ', ''),
(94, 'Dalhousie ', ''),
(95, 'Davangere ', ''),
(96, 'Dehradun ', ''),
(97, 'Dehri ', ''),
(98, 'Delhi ', ''),
(99, 'Deoria ', ''),
(100, 'Dewas ', ''),
(101, 'Dhanbad ', ''),
(102, 'Dharamshala', ''),
(103, 'Dholpur ', ''),
(104, 'Didwana ', ''),
(105, 'Dispur ', ''),
(106, 'Diu Island', ''),
(107, 'Durgapur ', ''),
(108, 'Dwarka ', ''),
(109, 'Ernakulam ', ''),
(110, 'Erode ', ''),
(111, 'Etah ', ''),
(112, 'Etawah ', ''),
(113, 'Faizabad ', ''),
(114, 'Faridabad ', ''),
(115, 'Ferozpur ', ''),
(116, 'Gandhinagar ', ''),
(117, 'Gangapur ', ''),
(118, 'Gangtok ', ''),
(119, 'Garia', ''),
(120, 'Gaya ', ''),
(121, 'Ghaziabad ', ''),
(122, 'Godhra', ''),
(123, 'Gokul ', ''),
(124, 'Gonda ', ''),
(125, 'Gorakhpur ', ''),
(126, 'Greater Mumbai ', ''),
(127, 'Greater Noida ', ''),
(128, 'Gulbarga ', ''),
(129, 'Gulmarg ', ''),
(130, 'Guna ', ''),
(131, 'Guntur ', ''),
(132, 'Gurgaon ', ''),
(133, 'Guwahati ', ''),
(134, 'Gwalior ', ''),
(135, 'Haflong ', ''),
(136, 'Hajipur ', ''),
(137, 'Haldia ', ''),
(138, 'Haldwani ', ''),
(139, 'Hampi ', ''),
(140, 'Hanumangarh ', ''),
(141, 'Hapur ', ''),
(142, 'Hardoi ', ''),
(143, 'Haridwar ', ''),
(144, 'Hubli ', ''),
(145, 'Hyderabad ', ''),
(146, 'Imphal ', ''),
(147, 'Indore ', ''),
(148, 'Itanagar ', ''),
(149, 'Itarsi ', ''),
(150, 'Jabalpur ', ''),
(151, 'Jagadhri ', ''),
(152, 'Jaipur ', ''),
(153, 'Jaisalmer ', ''),
(154, 'Jalandhar ', ''),
(155, 'Jalna ', ''),
(156, 'Jalore ', ''),
(157, 'Jamalpur ', ''),
(158, 'Jammu ', ''),
(159, 'Jamshedpur ', ''),
(160, 'Jaunpur ', ''),
(161, 'Jhajjar ', ''),
(162, 'Jhalawar ', ''),
(163, 'Jhansi ', ''),
(164, 'Jodhpur ', ''),
(165, 'Junagadh ', ''),
(166, 'Kanchipuram ', ''),
(167, 'Kangra ', ''),
(168, 'Kanpur ', ''),
(169, 'Kanyakumari ', ''),
(170, 'Kapurthala ', ''),
(171, 'Karaikudi ', ''),
(172, 'Karnal ', ''),
(173, 'Kasauli ', ''),
(174, 'Katihar ', ''),
(175, 'Katni ', ''),
(176, 'Khajuraho ', ''),
(177, 'Khandala ', ''),
(178, 'Khandwa ', ''),
(179, 'khargone ', ''),
(180, 'Kishanganj ', ''),
(181, 'Kishangarh', ''),
(182, 'Kochi ', ''),
(183, 'Kodaikanal ', ''),
(184, 'Kohima ', ''),
(185, 'Kolhapur ', ''),
(186, 'Kolkata ', ''),
(187, 'Kollam ', ''),
(188, 'Kota ', ''),
(189, 'Kottayam ', ''),
(190, 'Kovalam ', ''),
(191, 'Kozhikode ', ''),
(192, 'Kumarakom ', ''),
(193, 'Kumbakonam ', ''),
(194, 'Kurukshetra ', ''),
(195, 'Lalitpur ', ''),
(196, 'Latur ', ''),
(197, 'Lavasa ', ''),
(198, 'Laxmangarh ', ''),
(199, 'Leh ', ''),
(200, 'Lucknow ', ''),
(201, 'Ludhiana ', ''),
(202, 'Madikeri ', ''),
(203, 'Madurai ', ''),
(204, 'Mahabaleshwar ', ''),
(205, 'Mahabalipuram ', ''),
(206, 'Mahbubnagar ', ''),
(207, 'Malegaon ', ''),
(208, 'Manali ', ''),
(209, 'Mandu Fort ', ''),
(210, 'Mangalore ', ''),
(211, 'Manipal ', ''),
(212, 'Margoa ', ''),
(213, 'Mathura ', ''),
(214, 'Meerut ', ''),
(215, 'Mirzapur ', ''),
(216, 'Mohali ', ''),
(217, 'Mokokchung ', ''),
(218, 'Moradabad ', ''),
(219, 'Morena ', ''),
(220, 'Motihari ', ''),
(221, 'Mount Abu ', ''),
(222, 'Muktsar ', ''),
(223, 'Mumbai ', ''),
(224, 'Munger ', ''),
(225, 'Munnar ', ''),
(226, 'Mussoorie ', ''),
(227, 'Muzaffarnagar ', ''),
(228, 'Mysore ', ''),
(229, 'Nagaon ', ''),
(230, 'Nagercoil ', ''),
(231, 'Nagpur ', ''),
(232, 'Naharlagun ', ''),
(233, 'Naihati ', ''),
(234, 'Nainital ', ''),
(235, 'Nalgonda ', ''),
(236, 'Namakkal ', ''),
(237, 'Nanded ', ''),
(238, 'Narnaul ', ''),
(239, 'Nasik ', ''),
(240, 'Nathdwara ', ''),
(241, 'Navsari ', ''),
(242, 'Neemuch ', ''),
(243, 'Noida ', ''),
(244, 'Ooty ', ''),
(245, 'Orchha ', ''),
(246, 'Palakkad ', ''),
(247, 'Palanpur ', ''),
(248, 'Pali ', ''),
(249, 'Palwal ', ''),
(250, 'Panaji ', ''),
(251, 'Panchkula ', ''),
(252, 'Pandharpur ', ''),
(253, 'Panipat ', ''),
(254, 'Panvel ', ''),
(255, 'Pathanamthitta ', ''),
(256, 'Patiala ', ''),
(257, 'Patna ', ''),
(258, 'Patna Sahib ', ''),
(259, 'Periyar ', ''),
(260, 'Phagwara ', ''),
(261, 'Pilibhit ', ''),
(262, 'Pinjaur ', ''),
(263, 'Pollachi ', ''),
(264, 'Pondicherry ', ''),
(265, 'Ponnani ', ''),
(266, 'Porbandar ', ''),
(267, 'Port Blair ', ''),
(268, 'Porur ', ''),
(269, 'Pudukkottai ', ''),
(270, 'Punalur ', ''),
(271, 'Pune ', ''),
(272, 'Puri ', ''),
(273, 'Purnia ', ''),
(274, 'Pushkar ', ''),
(275, 'Raipur ', ''),
(276, 'Rajahmundry ', ''),
(277, 'Rajkot ', ''),
(278, 'Rameswaram ', ''),
(279, 'Ranchi ', ''),
(280, 'Ratlam ', ''),
(281, 'Raxual ', ''),
(282, 'Rewa ', ''),
(283, 'Rewari ', ''),
(284, 'Rishikesh ', ''),
(285, 'Rourkela ', ''),
(286, 'Sagar ', ''),
(287, 'Saharanpur ', ''),
(288, 'Salem ', ''),
(289, 'Salt Lake ', ''),
(290, 'Samastipur ', ''),
(291, 'Sambalpur ', ''),
(292, 'Sambhal ', ''),
(293, 'Sanchi ', ''),
(294, 'Sangareddy ', ''),
(295, 'Sangli ', ''),
(296, 'Sangrur ', ''),
(297, 'Sarnath ', ''),
(298, 'Sasaram ', ''),
(299, 'Satara ', ''),
(300, 'Satna ', ''),
(301, 'Secunderabad ', ''),
(302, 'Sehore ', ''),
(303, 'Serampore ', ''),
(304, 'Shillong ', ''),
(305, 'Shimla ', ''),
(306, 'Shirdi ', ''),
(307, 'ShivaGanga ', ''),
(308, 'Shivpuri ', ''),
(309, 'Sikar ', ''),
(310, 'Silvassa ', ''),
(311, 'Singrauli ', ''),
(312, 'Sirhind ', ''),
(313, 'Sirsa ', ''),
(314, 'Sitamrahi ', ''),
(315, 'Siwan ', ''),
(316, 'Somnath ', ''),
(317, 'Sonipat ', ''),
(318, 'Sopore ', ''),
(319, 'Srikakulam ', ''),
(320, 'Srinagar ', ''),
(321, 'Srirangapattna ', ''),
(322, 'Sultanpur ', ''),
(323, 'Surat ', ''),
(324, 'Surendranagar ', ''),
(325, 'Suri ', ''),
(326, 'Tawang ', ''),
(327, 'Tezpur ', ''),
(328, 'Thalassery ', ''),
(329, 'Thanjavur ', ''),
(330, 'Thekkady ', ''),
(331, 'Theni ', ''),
(332, 'Thiruvananthpuram ', ''),
(333, 'Thiruvannamalai ', ''),
(334, 'Thiruvannamalai ', ''),
(335, 'Thrippunithura ', ''),
(336, 'Thrissur ', ''),
(337, 'Tiruchchirappalli ', ''),
(338, 'Tirumala ', ''),
(339, 'Tirunelveli ', ''),
(340, 'Tirupati ', ''),
(341, 'Tirur ', ''),
(342, 'Trichy ', ''),
(343, 'Trippur ', ''),
(344, 'Tumkur ', ''),
(345, 'Tuni ', ''),
(346, 'Udaipur ', ''),
(347, 'Udhampur ', ''),
(348, 'Udupi ', ''),
(349, 'Ujjain ', ''),
(350, 'Ujjain Fort ', ''),
(351, 'Unnao ', ''),
(352, 'Vadodra ', ''),
(353, 'Valsad ', ''),
(354, 'Vapi ', ''),
(355, 'Varanasi ', ''),
(356, 'Varkala ', ''),
(357, 'Vasco da Gama ', ''),
(358, 'Vellore ', ''),
(359, 'Vidisha ', ''),
(360, 'Vijayawada ', ''),
(361, 'Vishakhapatnam ', ''),
(362, 'Vizianagaram ', ''),
(363, 'Vrindavan ', ''),
(364, 'Warangal ', ''),
(365, 'Washim ', ''),
(366, 'Yamunanagar ', ''),
(367, 'Yelahanka ', '');

-- --------------------------------------------------------

--
-- Table structure for table `rate_list`
--

CREATE TABLE `rate_list` (
  `rate_id` int(20) NOT NULL,
  `from_loc` varchar(255) NOT NULL,
  `to_loc` varchar(255) NOT NULL,
  `pricesudan` varchar(255) NOT NULL,
  `pricesuv` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_list`
--

INSERT INTO `rate_list` (`rate_id`, `from_loc`, `to_loc`, `pricesudan`, `pricesuv`) VALUES
(1, 'Delhi', 'Chandigarh', 'Rs.3500', 'Rs.4500'),
(2, 'Delhi', 'ambala', 'Rs.3500', 'Rs.4500'),
(3, 'Delhi', 'shimla', 'Rs.6000', 'Rs.7000'),
(4, 'Delhi', 'manali', 'Rs.8500', 'Rs.10500'),
(5, 'Delhi', 'Kullu', 'Rs.8500', 'Rs.10500'),
(6, 'Delhi', 'Kasol', 'Rs.8500', 'Rs.10500'),
(7, 'Delhi', 'patiala', 'Rs.4500', 'Rs.5500'),
(8, 'Delhi', 'ludhiana', 'Rs.5000', 'Rs.6500'),
(9, 'Delhi', 'jalandhar', 'Rs.6000', 'Rs.7500'),
(10, 'Delhi', 'amritsar', 'Rs.7500', 'Rs.9500'),
(11, 'Delhi', 'dharamshala', 'Rs.8000', 'Rs.10500'),
(12, 'Delhi', 'jammu', 'Rs.10000', 'Rs.12000'),
(13, 'Delhi', 'Katra', 'Rs.10750', 'Rs.13000'),
(14, 'Delhi', 'Rishikesh', 'Rs.4000', 'Rs.5200'),
(15, 'Delhi', 'Dehradhun', 'Rs.4200', 'Rs.5400'),
(16, 'Delhi', 'Roorkee', 'Rs.4000', 'Rs.5200'),
(17, 'Delhi', 'Mussorier', 'Rs.6200', 'Rs.7000'),
(18, 'Gurgaon', 'Haridwar', 'Rs.4200', 'Rs.5300'),
(19, 'Gurgaon', 'Rishikesh', 'Rs.4200', 'Rs.5300'),
(20, 'Gurgaon', 'Dehradhun', 'Rs.4400', 'Rs.5600'),
(21, 'Gurgaon', 'Roorkee', 'Rs.4300', 'Rs.5400'),
(22, 'Gurgaon', 'Mussorier', 'Rs.6300', 'Rs.7300'),
(23, 'Haridwar', 'Delhi', 'Rs.4000', 'Rs.5000'),
(24, 'Haridwar', 'Noida', 'Rs.4000', 'Rs.5000'),
(25, 'Haridwar', 'Gurgaon', 'Rs.4200', 'Rs.5200'),
(26, 'Rishikesh', 'Delhi', 'Rs.4200', 'Rs.5200'),
(27, 'Rishikesh', 'Noida', 'Rs.4200', 'Rs.4200'),
(28, 'Rishikesh', 'Gurgaon', 'Rs.4400', 'Rs.5400'),
(29, 'Dehradhun', 'Delhi', 'Rs.4200', 'Rs.5200'),
(30, 'Dehradhun', 'Noida', 'Rs.4200', 'Rs.5200'),
(31, 'Dehradhun', 'Gurgaon', 'Rs.4200', 'Rs.5200'),
(32, 'Roorkee', 'Delhi', 'Rs.4800', 'Rs.6000'),
(33, 'Roorkee', 'Noida', 'Rs.4800', 'Rs.6000'),
(34, 'Roorkee', 'Gurgaon', 'Rs.5100', 'Rs.6400'),
(35, 'Delhi', 'Agra', 'Rs.3500', 'Rs.4500'),
(36, 'Delhi', 'Jaipur', 'Rs.3800', 'Rs.4800'),
(37, 'Jaipur', 'Delhi', 'Rs.3800', 'Rs.4800');

-- --------------------------------------------------------

--
-- Table structure for table `tour_locations`
--

CREATE TABLE `tour_locations` (
  `place_id` int(20) NOT NULL,
  `title` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `about` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_locations`
--

INSERT INTO `tour_locations` (`place_id`, `title`, `city`, `image`, `about`, `status`) VALUES
(1, 'Wonder of world Taj Mahal', 'Delhi', 'agra.jpg', 'The Taj Mahal of Agra is one of the Seven Wonders of the World, for reasons more than just looking magnificent. Itâ€™s the history of Taj Mahal that adds a soul to its magnificence: a soul that is filled with love, loss, remorse, and love again', 'Active'),
(2, 'Manali Hill Station', 'Manali', 'manali.jpg', 'When sound of exhilaration seems to be coming far above from sky and only colorful para-gliders could be spotted above head, the site is most probably Solang Valley of Manali Hill Station, which has a uniqueness that stands', 'Active'),
(3, 'Haridwar', 'Haridwar', 'haridwar.jpg', 'Haridwar is the place where people from across the India visit for pilgrimage and to take a holy dip into the holy river Ganges. Haridwar city is an ancient and it is one of the most sacred cities in India. The diverse nature of the Hindu.', 'Active'),
(4, 'Leh Ladakh Tour', 'Leh Ladakh', 'leh-ladakh-tour.jpg', 'We, discover Ladakh Adventure Tours & Travel based in Leh Ladakh is a certified Travel Company, recognized by Jammu & Kashmir Tourism department. welcome you to visit this beautiful part of India. Geographically surrounded', 'Active'),
(5, 'Mussoorie Tour', 'Mussoorie', 'mussoorie.jpg', 'Mussoorie, the proverbial Queen of Hill stations, as professed by the British gentry who evaded hot, desultory summers of Delhi and Kolkata by spending time here.Being at an average altitude of 2,000 metres (6,600 ft), Mussoorie,', 'Active'),
(6, 'Rishikesh Tour', 'Rishikesh', 'rishikesh.jpg', 'Rishikesh is town in the Dehradun District of Uttarakhand state in India. Total population of Rishikesh is 75,020 (53% male and 47 % female) as of 2001. Rishikesh is situated at 409 meters above sea level in the foothill', 'Active'),
(7, 'Pink city of india jaipur', 'Jaipur', 'jaipur.jpg', 'Jaipur was founded on 18th November 1727 by Maharaja Sawai Jai Singh II, a Kachawaha Rajput, who ruled from 1699-1744. Initially his capital was Amber (now pronounced as Amer), lies at a distance of 11 km from Jaipur.', 'Active'),
(8, 'Famous wildlife jim corbett', 'Nainital', 'corbett.jpg', 'Jim Corbett National Park, which is a part of the larger Corbett Tiger Reserve, a Project Tiger Reserve lies in the Nainital district of Uttarakhand. The magical landscape of Corbett is well known and fabled for its tiger richness.', 'Active'),
(9, 'Krishna Temples Mathura', 'Mathura', 'mathura.jpg', 'Shri Krishna Janmbhoomi is a religious temple in Mathura, Uttar Pradesh. The temple is built around the prison cell where the ancient Hindu god Lord Krishna is said to have been born.', 'Active'),
(10, 'jammu katra Vaishno Devi', 'Jammu', 'jammu.jpg', 'It is very difficult, like any other old shrines, to trace back the history of Vaishno Devi; however geological studies indicate that the holy shrine of Vaishno Devi is almost a million years old.', 'Active'),
(11, 'Mehandipur Balaji', 'Mehandipur\r\n', 'Mehandipur.jpg\r\n', 'The temple of Balaji built in mehandipur is very famous especially in northern part of india.The first mahant of the temple was shri ganeshpuriji maharaj and the present mahant of the temple\r\n', 'Active'),
(12, 'Romantic Place Dharamshala', 'Dharamsala', 'Dharamshala.jpg', 'It is a beautiful city of Himachal Pradesh in India. The former name of Dharamsala was Bhagsu. Dharamsala houses the Dalai Lamas residence also the Central Tibetan Administration.', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `trip_id` int(20) NOT NULL,
  `trip_name` varchar(255) NOT NULL,
  `trip_from` varchar(255) NOT NULL,
  `trip_end` varchar(255) NOT NULL,
  `distance` varchar(255) NOT NULL,
  `tripimage` text NOT NULL,
  `abouttrip` text NOT NULL,
  `vehicle_id` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`trip_id`, `trip_name`, `trip_from`, `trip_end`, `distance`, `tripimage`, `abouttrip`, `vehicle_id`, `status`, `title`, `description`, `keywords`) VALUES
(1, 'Dehli to Manali Taxi booking Services', 'Delhi ', 'Manali ', '531', 'Solang-Valley2.jpg', 'Delhi to Manali Taxi\r\nLooking for a great trip from Delhi to Manali by cab? You can avail excellent taxi services on Delhi to Manali cabs from Delhiyatracab. Delhiyatracab, Indiaâ€™s largest intercity cab service provider brings to you the most cost-effective options for Delhi to Manali cabs.\r\n\r\nLocated in the beautiful mountains of Himachal Pradesh near the kullu valley, Manali is a perfect treat for the travellers who wish cover the places in the mountain ranges. Visiting Manali in the best season will make your trip memorable.\r\n\r\nYou can visit places of interest like temples near Manali and also enjoy the activities trekking, skiing etc at Manali. The city is located on the banks of the Beas river. People usually like to opt the Manali package for a visit to Kullu and Rohtang pass.\r\n\r\nDelhiyatracab having its presence in this sector for more than 10 years has continuously ensured to provide reliable, quality and timely services for Delhi to Manali cab. You can book any type of car for Delhi to Manali taxi service depending on your requirement a necessity.\r\n\r\nIf you are looking for cab or taxi for your trip, then avail the services for Delhi to Manali Car rental at Delhiyatracab which is the best cab service provider in all major cities across India. Be assured to get amazing cab service in Delhi by booking at Delhiyatracab.\r\n\r\nOur professional drives will ensure that your travel from Delhi to Manali will be comfortable and memorable. Booking for taxi from Delhi to Manali is now a hassle free experience with the user friendly interface of Delhiyatracab.\r\n\r\nBook Delhi to Manali taxi service at Delhiyatracab and travel in comfort in optimal time Book taxi services in Delhi, and be assured to have a safe and memorable journey. Delhi to Manali cab booking is no more a tedious job.\r\n\r\nWhile undergoing your journey from Delhi to Manali, thereâ€™s a great opportunity to explore breathtaking mountain views and also take halts in between at picturesque places for enjoying the views and clicking pictures. You must choose Delhi to Manali taxi at Delhiyatracab to make sure that you have a mesmerizing and memorable trip.\r\n\r\nIf you book Cabs in Delhi through local players it could be troublesome for you but by booking through Delhiyatracab, you will get bookings at best prices in a seamless manner. We are a customer centric brand and our customer focussed approach will ensure that you along with your friends and family will have an exciting and memorable road trip to Manali.\r\n\r\nWe are proud to claim that Delhiyatracab offers you the best services for traveling from Delhi to Manali by car. Our courteous drivers will ensure your safety and the timely services will make you feel convenient. Hire taxi from Delhi to Manali in very minimal steps here at Delhiyatracab.\r\n\r\nOur Top routes from Delhi are Delhi to Agra, Delhi to Shimla, Delhi to Jaipur, Delhi to Mussoorie, Delhi to Vrindavan and Delhi to Haridwar. Book cabs at Delhiyatracab to top travel destinations from Delhi.\r\n\r\nDelhi to Manali distance\r\nThe Delhi to Manali distance is 550 km and can be covered in 10-12 hours by cab. While travelling to Manali, few other places that can be visited are Chandigarh, Kalka, Shimla and Kullu. Delhiyatracab offers excellent Delhi to Manali cab packages which cover sightseeing of these places.\r\n\r\nDelhi to Manali Car Rental Options\r\nBoth AC and non AC cabs are available and you can book taxis like Tata Indica, Tata Indigo, Toyota Innova and others depending on your requirement. Delhi to Manali cab booking with your choice of vehicle makes your entire journey easier and simple.\r\n\r\nPlease have a look at the Delhi to Manali cab rental options. You can choose one of these cabs for your great trip.', '7, 5, 4, 8, 3, 1, 2, 9, 6', 'Active', 'Dehli to Manali Taxi Services | Dehli Cab Booking Services', 'delhiyatracab.com biggest provider of Car rental in India â€“ Book Your Car Rental Anytime, Cabs, Instant services at best rates in Delhi/NCR ! Call Us 24x7!', 'Welcome To Delhi YatraCab, Car Hire in Delhi, Cheap Car Taxi Rental in Delhi, Car Hire Company, Car Rental Services in Delhi, Rent a Car in New Delhi, Tour Packages, Delhi Sightseeing Tour By Car, Delhi To Agra Tour By Car, Agra Taj Mahal Tour Car Hire, Delhi Same Day Tour Car Rental, Car/Taxi Hire For Shimla Manali Tour, Rajasthan Tour Cab Rental, Haridwar Rishikesh Tour Car Hire, North india tour By Car, Around delhi tour taxi hire, Tour from delhi car hire, Car hire India holidays weekend tours, India Rajasthan Tour Packages by car, Golden Triangle Delhi Agra Jaipur Tour by car, India Pilgrimage Tour taxi hire, Himachal Holidays Tour car hire, Delhi Same day tours car rental, India wildlife tour packages car hire, Delhi Outstation Tour Car Rental, Outstation Taxi Hire From in Delhi, Outstation Cab Rental, Delhi Outstation Taxi Service, Delhi Taxi Service, Delhi Cab Taxi Hire, Taxi For Hire in Delhi, Delhi Outstation Car Rental Service, Hire Car and Driver in Delhi, Delhi Tour Car Hire, Car Hire in Delhi Airpot, Car Rental With Driver, Delhi Tour Car Hire, Cab Hire in Delhi, Taxi Hire in Delhi, Car On Rent in Delhi For Outstation, Taxi On Rent in Delhi, Private Taxi Hire in Delhi, Delhi Taxi Hire Company, Cheap Car Rental Delhi, Hire Cabs in Delhi, Car Rental Service in Delhi, Rent A Cab Delhi, Hire A Taxi in Delhi, Taxi For Hire, Cabs On Rent Delhi, Taxi, Car,  Cab, Rental, Hire, Services, Rental, Cabs, in, Delhi, Outstation, Car Hire in Delhi Around Tour, Delhi Tour Car Rental,  Car Hire in Delhi, Budget Car Hire in Delhi, Cheap Car Hire in Delhi, Outstation Tour Taxi Rental Service, Car, Cab, Taxi, Hire, Services Outstation, Tour, Packages, Airport, Carhireindelhi, cab for agra, taxi for agra,car rental for agra, car rental for agra, car rental for agra, car rental for agra, taxi hire for agra, taxi hire for agra, taxi hire for agra, taxi hire for agra, taxi hire for agra, innova hire for outstation, innova cab for outstation, hire taxi for agra, rent taxi for agra, book taxi for agra, Innova Cab Rental In Delhi, Book Innova Taxi From Airport, Toyota Innova Hire Delhi, 7 Seater Taxi In Delhi, Book Innva Taxi, Toyota Innova Car Hire, Innova Car Rental In Delhi, Innova Taxi Hire Delhi, Innova Car Hire In Delhi, Online Innova Car Booking, Innova Hire, Book Innova Taxi In Delhi, Innova Online Car Booking, Innova In Delhi For Rent, Book Innova For Outstation, Toyota Innova Taxi Delhi, Innova Cab For Outstation, Toyota Innova On Rent In Delhi, Toyota Innova Hire, Toyota Innova Online Booking, Innova For Rent With Driver, Book Innova Cab Online, Innova Car Rental For Outstation, Innova Car Rental In Delhi, Innova On Rent In Delhi, Innova Taxi Service In Delhi, Innova Car Hire Delhi, Innova For Outstation');

-- --------------------------------------------------------

--
-- Table structure for table `triptypes`
--

CREATE TABLE `triptypes` (
  `triptype_id` int(10) NOT NULL,
  `triptype_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `triptypes`
--

INSERT INTO `triptypes` (`triptype_id`, `triptype_name`) VALUES
(3, 'One way'),
(4, 'round');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(20) NOT NULL,
  `vehicle_name` varchar(255) NOT NULL,
  `price_km` varchar(255) NOT NULL,
  `driver_charges` varchar(255) NOT NULL,
  `number_sittings` varchar(255) NOT NULL,
  `number_baggages` varchar(255) NOT NULL,
  `ac_type` varchar(255) NOT NULL,
  `other_info` varchar(255) NOT NULL,
  `vehicle_images` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `vehicle_name`, `price_km`, `driver_charges`, `number_sittings`, `number_baggages`, `ac_type`, `other_info`, `vehicle_images`, `status`) VALUES
(1, 'Tempo-Traveller(12+1)AC', '19', '400', '12+1', '2', 'Yes', 'Tolls,Parking and State Permits as per actuals', 'tempo-12.jpg', 'Active'),
(2, 'Tempo-Traveller(16+1)AC', '25', '400', '16+1', '2', 'Yes', 'Tolls,Parking and State Permits as per actuals', 'tempo-16.jpg', 'Active'),
(3, 'Sedan(4-Passengers)', '9', '250', '4+1', '2', 'Yes', 'Tolls,Parking and State Permits as per actual', 'dzire.jpg', 'Active'),
(4, 'Ertiga(4-Passengers)', '11', '250', '4+1', '2', 'Yes', 'Tolls,Parking and State Permits as per actual', 'ertiga.jpg', 'Active'),
(5, 'Assured-Innova(6+1)AC', '13', '300', '6+1', '2', 'Yes', 'Tolls,Parking and State Permits as per actual', 'innova.jpg', 'Active'),
(6, 'Xylo (7+1) AC', '13', '250', '7+1', '2', 'Yes', 'Tolls,Parking and State Permits as per actual', 'xylo.jpg', 'Active'),
(7, 'Assured-Innova (7+1) AC', '13', '250', '7+1', '2', 'Yes', 'Tolls,Parking and State Permits as per actual', 'innova2.jpg', 'Active'),
(8, 'Innova-Crysta', '15', '300', '7+1', '2', 'Yes', 'Tolls,Parking and State Permits as per actual', 'innova-crysta.jpg', 'Active'),
(9, 'Tempo-Traveller(9+1)AC', '18', '300', '10+1', '2', 'Yes', 'Tolls,Parking and State Permits as per actual', 'tempo-9.jpg', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_carbooking`
--
ALTER TABLE `admin_carbooking`
  ADD PRIMARY KEY (`cbadmin_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`catalog_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inqu_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `rate_list`
--
ALTER TABLE `rate_list`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `tour_locations`
--
ALTER TABLE `tour_locations`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`trip_id`);

--
-- Indexes for table `triptypes`
--
ALTER TABLE `triptypes`
  ADD PRIMARY KEY (`triptype_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_carbooking`
--
ALTER TABLE `admin_carbooking`
  MODIFY `cbadmin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `catalog_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inqu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `city_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT for table `rate_list`
--
ALTER TABLE `rate_list`
  MODIFY `rate_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tour_locations`
--
ALTER TABLE `tour_locations`
  MODIFY `place_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `trip_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `triptypes`
--
ALTER TABLE `triptypes`
  MODIFY `triptype_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
