-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 05:48 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asfa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admin_image` varchar(500) NOT NULL,
  `mobile_number` int(40) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `email`, `admin_image`, `mobile_number`, `password`) VALUES
(1, 'Safras Faizer', 'safrasfaizer15@gmail.com', 'Uploads/134117.jpg', 773312367, 'safras15'),
(2, 'Abdul Azeez', 'abdulazeez1998@gmail.com', 'Uploads/admin.jpg', 758369742, 'azeez1998');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Drywalls'),
(2, 'Screws'),
(3, 'Riverts'),
(4, 'Anchors'),
(5, 'Nails');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `ID` int(11) NOT NULL,
  `full_name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `message` varchar(80) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`ID`, `full_name`, `email`, `message`, `subject`, `timestamp`) VALUES
(1, 'Abdul Azeez', 'abdulazeez1998@gmail.com', 'Page load problem.', 'Technical Support', '2021-07-12 19:15:53'),
(4, 'Kumar Asalanka', 'kumarasalanka90@email.com', 'Blind Rivert size details!', 'Customer Service', '2021-07-12 19:15:53'),
(8, 'Amir Khan', 'amirkhan1278@gmail.com', 'I need more discounts!!', 'Customer Service', '2021-09-18 23:32:41'),
(9, 'Shazil Ahamed', 'shazilahamed10@gmail.com', 'Some lag issues.', 'Technical Support', '2021-09-18 23:36:50'),
(10, 'Aamina Faizer', 'aminafaizer@gmail.com', 'Shop Open Hours???', 'Customer Service', '2021-10-08 20:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `coupon_type` varchar(70) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_code`, `coupon_value`, `coupon_type`, `cart_min_value`, `status`) VALUES
(1, 'NOV2021', 25, 'Percentage', 20000, 'Valid');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mobile_number` char(100) NOT NULL,
  `email` varchar(55) NOT NULL,
  `company` varchar(40) NOT NULL,
  `address` varchar(500) NOT NULL,
  `address2` varchar(400) NOT NULL,
  `city` varchar(70) NOT NULL,
  `zipcode` int(60) NOT NULL,
  `password` varchar(55) NOT NULL,
  `status` varchar(100) NOT NULL,
  `Registered_Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `mobile_number`, `email`, `company`, `address`, `address2`, `city`, `zipcode`, `password`, `status`, `Registered_Time`) VALUES
(12, 'Ruzni Sadiq', '0114985497', 'ruznisadiq12@gmail.com', 'Star Bucks', 'Mattakuliya', '', 'Colombo', 11290, 'ruzni12', 'Active', '2021-07-09 23:36:33'),
(17, 'Safras Faizer', '0114567888', 'safrasfaizer15@gmail.com', 'ASFA International', 'Wellawatha', 'Kalubowila', 'Colombo 04', 11700, 'safras15', 'Active', '2021-07-09 23:36:33'),
(19, 'Amina Faizer', '0763640182', 'aminafaizer@gmail.com', 'Reliable Fasteners', 'Enderamulla', 'Akbar Town', 'Gampha', 11550, 'amina12', 'Active', '2021-07-09 23:36:33'),
(24, 'Abdul Rasheed', '0775214782', 'abdulrasheed1234@gmail.com', 'Pencil Organization', 'Dehiwala', '', 'Colombo', 11750, 'rasheed1234', 'Active', '2021-07-09 23:36:33'),
(25, 'Neymar Jr', '0777377536', 'neymarjr11@gmail.com', 'Romal Hardware', 'Mount-Lavania', '', 'Panadura', 11208, 'neymar11', 'Blocked', '2021-07-18 17:43:30'),
(27, 'Ruzna Rizvi', '0763547892', 'ruznarizvi707@gmail.com', 'Cement Factory', 'Maligawatte', '', 'Colombo 09', 15000, 'ruzna707', 'Active', '2021-09-13 17:04:24'),
(29, 'Sajid Fazly', '0789654123', 'sajidfazly12@gmail.com', 'Asian Hardware', 'Wellampitiya', '', 'Colombo 09', 15000, 'sajid12', 'Active', '2021-09-15 23:15:35'),
(30, 'Mohamed Sadham', '0767893215', 'mohamedsadham07@gmail.com', 'United Power House', 'Peliyagoda', '', 'Colombo', 19000, 'sadham07', 'Active', '2021-09-16 18:47:37'),
(32, 'Adhil Muneef', '0785937156', 'adhilmuneef22@gmail.com', 'Beruwala Screw Shop', 'No: 9, Aluthgama Road, Beruwala.', '', 'Kaluthara', 17005, 'Adhilmuneef22', 'Active', '2021-09-30 18:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `driver_name` varchar(100) NOT NULL,
  `method` varchar(200) NOT NULL,
  `vehicle_number` varchar(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `driver_name`, `method`, `vehicle_number`, `mobile_number`, `address`) VALUES
(1, 'Sadhath Ali', 'Three-Wheeler', 'YJ-0946', '0783498713', 'No:08, Maradana Road, Colombo 10.'),
(2, 'Nuwan Abesekara', 'Dimo-Lory', 'PW-9330', '0775397152', 'No:12, Inituim Road, Dehiwala.'),
(3, 'Raja Sivasami', 'Jaffna-Transport', 'AU-8543', '0762587413', 'No:2, Kadaloor Road, Jaffna.'),
(4, 'Vimal Dharmapala', 'Anuradhapura-Transport', 'TN-1983', '0783674169', 'No:78/1, Malwatta Road, Kalewela, Anuradhapura.'),
(5, 'Arun Vickramarachi', 'Galle-Transport', 'KY-2910', '0757136974', 'No:311/3/2, Main Road, Galle Fort, Galle.'),
(6, 'Hemantha Kumara', 'Ampara-Transport', 'CW-5412', '0773547892', 'No:82, Malawila Road, Ampara.'),
(7, 'None', 'None', 'None', 'None', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `hr_id` int(11) NOT NULL,
  `hr_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`hr_id`, `hr_name`, `email`, `mobile_number`, `address`, `password`, `created_time`) VALUES
(1, 'Ruzni Sadiq', 'ruznisadiq123@gmail.com', '0779637818', 'Wattala', 'ruzni123', '2021-09-15 19:54:49'),
(2, 'Abdul Malik', 'abdulmalik17@gmail.com', '0778914789', 'Dematagoda', 'abdul17', '2021-09-23 22:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` decimal(40,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `product_price`) VALUES
(91, 87, 1, 'Blind Rivert', 1, '15900'),
(92, 88, 1, 'Blind Rivert', 3, '15900'),
(93, 89, 1, 'Blind Rivert', 3, '15900'),
(94, 89, 2, 'Concrete Nail', 1, '3850'),
(104, 96, 1, 'Blind Rivert', 1, '15900'),
(105, 97, 1, 'Blind Rivert', 6, '15900'),
(108, 99, 2, 'Concrete Nail', 1, '3850'),
(109, 99, 1, 'Blind Rivert', 1, '15900'),
(114, 102, 1, 'Blind Rivert', 7, '15900'),
(115, 102, 3, 'Drywall Screw', 1, '12160'),
(119, 104, 1, 'Blind Rivert', 8, '15900'),
(120, 104, 3, 'Drywall Screw', 1, '12160'),
(121, 104, 4, 'Anchor Bolt', 3, '10080'),
(122, 105, 2, 'Concrete Nail', 5, '3850'),
(123, 106, 1, 'Blind Rivert', 3, '15900'),
(124, 106, 3, 'Drywall Screw', 1, '12160'),
(148, 128, 3, 'Drywall Screw', 1, '12160'),
(149, 128, 1, 'Blind Rivert', 3, '15900'),
(150, 128, 4, 'Anchor Bolt', 1, '10080'),
(151, 129, 53, 'Anchor Bolt', 1, '11200'),
(152, 129, 32, 'Blind Rivert', 3, '14300'),
(153, 129, 9, 'Blue Pocket-Hole Screw', 1, '29000'),
(154, 130, 50, 'Concrete Nail', 1, '3900'),
(155, 130, 6, 'Self-Drilling Screw', 1, '25000'),
(156, 130, 8, 'Drop Anchor', 1, '12000'),
(157, 131, 26, 'Blind Rivert', 3, '18500'),
(158, 131, 3, 'Drywall Screw', 4, '12160'),
(159, 131, 7, 'Anchor DynaBolt', 1, '22000'),
(160, 132, 1, 'Blind Rivert', 1, '15900'),
(161, 132, 4, 'Anchor Bolt', 1, '10080'),
(162, 133, 25, 'Blind Rivert', 8, '13300'),
(163, 133, 9, 'Blue Pocket-Hole Screw', 1, '29000'),
(164, 133, 10, 'Flat Head Wood Screw', 5, '6000'),
(165, 134, 1, 'Blind Rivert', 1, '15900'),
(166, 134, 3, 'Drywall Screw', 1, '12160'),
(167, 135, 3, 'Drywall Screw', 1, '12160'),
(168, 136, 3, 'Drywall Screw', 1, '12160'),
(169, 136, 4, 'Anchor Bolt', 1, '10080'),
(170, 137, 6, 'Self-Drilling Screw', 1, '25000'),
(171, 137, 8, 'Drop Anchor', 1, '12000'),
(172, 138, 4, 'Anchor Bolt', 7, '10080'),
(173, 138, 1, 'Blind Rivert', 12, '15900'),
(222, 205, 1, 'Blind Rivert', 1, '15900'),
(225, 208, 7, 'Anchor DynaBolt', 1, '22000'),
(264, 248, 4, 'Anchor Bolt', 1, '10080'),
(265, 248, 1, 'Blind Rivert', 1, '15900'),
(266, 248, 3, 'Drywall Screw', 1, '12160'),
(269, 250, 1, 'Blind Rivert', 1, '15900'),
(270, 251, 3, 'Drywall Screw', 1, '12160'),
(272, 253, 4, 'Anchor Bolt', 1, '10080'),
(273, 254, 1, 'Blind Rivert', 1, '15900'),
(275, 256, 1, 'Blind Rivert', 1, '15900'),
(278, 259, 1, 'Blind Rivert', 1, '15900'),
(372, 357, 1, 'Blind Rivert', 1, '15900'),
(373, 357, 3, 'Drywall Screw', 1, '12160'),
(374, 358, 1, 'Blind Rivert', 1, '15900'),
(375, 359, 1, 'Blind Rivert', 1, '15900'),
(376, 359, 3, 'Drywall Screw', 1, '12160');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` decimal(40,0) NOT NULL,
  `order_status` varchar(70) NOT NULL,
  `payment_method` varchar(70) NOT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `delivery_address` varchar(500) NOT NULL,
  `payment_image` varchar(900) DEFAULT NULL,
  `order_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `total_price`, `order_status`, `payment_method`, `delivery_id`, `delivery_address`, `payment_image`, `order_datetime`) VALUES
(87, 17, '15900', 'Cancelled', 'Cash', 7, 'Wellawatha', NULL, '2021-07-14 20:41:23'),
(88, 17, '47700', 'Delivered', 'Cash', 1, 'Wellawatha', NULL, '2021-07-14 20:42:28'),
(89, 17, '51550', 'Delivered', 'Cash', 1, 'Kalubowila', NULL, '2021-07-14 20:43:19'),
(96, 17, '15900', 'Cancelled', 'Bank Deposit', 7, 'Kalubowila', NULL, '2021-07-31 13:39:06'),
(97, 17, '95400', 'Cancelled', 'Cheque', 7, 'Kalubowila', NULL, '2021-07-31 14:44:32'),
(99, 17, '19750', 'Delivered', 'Cheque', 1, 'Wellawatha', NULL, '2021-08-12 16:32:03'),
(102, 17, '123460', 'Cancelled', 'Cash', 7, 'Wellawatha', NULL, '2021-08-18 19:53:59'),
(104, 17, '169600', 'Cancelled', 'Cash', 7, 'Kalubowila', NULL, '2021-08-18 20:03:46'),
(105, 17, '19250', 'Delivered', 'Cash', 1, 'Wellawatha', NULL, '2021-08-26 18:08:10'),
(106, 17, '59860', 'Cancelled', 'Cash', 7, 'Wellawatha', NULL, '2021-08-26 23:24:02'),
(128, 27, '69940', 'Delivered', 'Cash', 2, 'Maligawatte', NULL, '2021-09-13 17:27:05'),
(129, 24, '83100', 'Delivered', 'Cheque', 4, 'Dehiwala', NULL, '2021-09-13 23:18:00'),
(130, 19, '40900', 'Delivered', 'Cash', 3, 'Enderamulla', NULL, '2021-09-13 23:43:56'),
(131, 29, '126140', 'Delivered', 'Credit Card', 2, 'Wellampitiya', NULL, '2021-09-15 23:17:20'),
(132, 30, '25980', 'Delivered', 'Cheque', 1, 'Peliyagoda', NULL, '2021-09-16 19:01:07'),
(133, 25, '165400', 'Delivered', 'Cash', 2, 'Mount-Lavania', NULL, '2021-09-20 12:38:35'),
(134, 17, '28060', 'Delivered', 'Cash', 1, 'Wellawatha', NULL, '2021-09-21 16:31:03'),
(135, 17, '12160', 'Delivered', 'Cash', 1, 'Wellawatha', NULL, '2021-09-29 00:18:21'),
(136, 29, '22240', 'Delivered', 'Cash', 5, 'Wellampitiya', NULL, '2021-09-29 19:21:53'),
(137, 24, '37000', 'Delivered', 'Cheque', 3, 'Dehiwala', NULL, '2021-09-29 19:32:47'),
(138, 32, '261360', 'Delivered', 'Cheque', 5, 'No: 9, Aluthgama Road, Beruwala.', NULL, '2021-09-30 18:37:31'),
(205, 19, '15900', 'Delivered', 'Cash', 1, 'Enderamulla', NULL, '2021-10-04 16:20:58'),
(208, 19, '22000', 'Delivered', 'Cash', 2, 'Enderamulla', NULL, '2021-10-04 16:31:23'),
(248, 25, '38140', 'Cancelled', 'Cheque', 7, 'Mount-Lavania', NULL, '2021-10-06 16:44:16'),
(250, 25, '15900', 'Delivered', 'Cash', 5, 'Mount-Lavania', NULL, '2021-10-07 16:06:15'),
(251, 25, '12160', 'Delivered', 'Bank Deposit', 5, 'Mount-Lavania', 'Example_modern_deposit_slip,_filled_in.jpg', '2021-10-07 16:06:48'),
(253, 30, '10080', 'Delivered', 'Bank Deposit', 2, 'Peliyagoda', 'Example_modern_deposit_slip,_filled_in.jpg', '2021-10-07 16:45:23'),
(254, 30, '15900', 'Delivered', 'Cheque', 2, 'Peliyagoda', NULL, '2021-10-07 16:54:53'),
(256, 17, '15900', 'Delivered', 'Cash', 1, 'Wellawatha', NULL, '2021-10-08 00:16:50'),
(259, 17, '15900', 'Delivered', 'Bank Deposit', 2, 'Wellawatha', 'Example_modern_deposit_slip,_filled_in.jpg', '2021-10-08 00:18:55'),
(357, 17, '28060', 'Delivered', 'Credit Card', 2, 'Kalubowila', NULL, '2021-10-16 00:41:07'),
(358, 17, '15900', 'Delivered', 'Cash', 1, 'Wellawatha', NULL, '2021-10-16 00:57:30'),
(359, 27, '28060', 'Delivered', 'Credit Card', 5, 'Maligawatte', NULL, '2021-10-16 12:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_tracking`
--

CREATE TABLE `order_tracking` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_tracking`
--

INSERT INTO `order_tracking` (`id`, `order_id`, `delivery_id`, `order_status`, `reason`, `timestamp`) VALUES
(25, 88, 1, 'Delivered', '', '2021-07-14 21:28:04'),
(26, 87, 7, 'Cancelled', '', '2021-07-15 15:46:58'),
(31, 96, 7, 'Cancelled', '', '2021-07-31 14:56:31'),
(32, 97, 7, 'Cancelled', '', '2021-07-31 15:01:59'),
(34, 89, 1, 'Delivered', 'Products are Delivered....', '2021-07-14 22:03:19'),
(35, 99, 1, 'Delivered', '', '2021-08-12 16:32:35'),
(36, 102, 7, 'Cancelled', '', '2021-08-18 20:00:35'),
(37, 104, 7, 'Cancelled', 'I dont like this', '2021-08-18 20:04:16'),
(39, 105, 1, 'Delivered', '', '2021-08-26 23:24:54'),
(40, 106, 7, 'Cancelled', 'd', '2021-08-27 10:23:30'),
(41, 128, 2, 'Delivered', '', '2021-09-13 17:27:46'),
(45, 129, 4, 'Delivered', '', '2021-09-13 23:40:11'),
(47, 130, 3, 'Delivered', '', '2021-09-13 23:59:02'),
(48, 131, 2, 'Delivered', '', '2021-09-15 23:20:41'),
(49, 132, 1, 'Delivered', '', '2021-09-16 19:01:54'),
(50, 133, 0, 'Accepted', '', '2021-09-20 12:39:02'),
(51, 133, 2, 'Delivered', '', '2021-09-20 12:39:38'),
(52, 134, 0, 'Accepted', '', '2021-09-21 16:34:06'),
(53, 134, 1, 'Delivered', '', '2021-09-21 16:34:47'),
(54, 135, 1, 'Delivered', '', '2021-09-29 17:07:21'),
(55, 136, 5, 'Delivered', '', '2021-09-29 19:33:39'),
(56, 137, 3, 'Delivered', '', '2021-09-29 19:34:13'),
(57, 138, 5, 'Delivered', '', '2021-09-30 20:41:51'),
(58, 251, 0, 'Accepted', '', '2021-10-07 16:08:33'),
(59, 251, 5, 'Delivered', '', '2021-10-07 16:09:09'),
(60, 205, 1, 'Delivered', '', '2021-10-07 17:10:37'),
(61, 208, 2, 'Delivered', '', '2021-10-07 17:11:05'),
(62, 248, 7, 'Cancelled', '', '2021-10-07 17:11:24'),
(63, 250, 5, 'Delivered', '', '2021-10-07 17:11:43'),
(64, 253, 2, 'Delivered', '', '2021-10-07 17:11:59'),
(65, 254, 2, 'Delivered', '', '2021-10-08 00:22:00'),
(66, 256, 1, 'Delivered', '', '2021-10-08 19:26:41'),
(67, 259, 2, 'Delivered', '', '2021-10-08 19:26:54'),
(68, 357, 2, 'Delivered', '', '2021-10-16 12:58:02'),
(69, 358, 1, 'Delivered', '', '2021-10-16 12:58:14'),
(70, 359, 5, 'Delivered', '', '2021-10-16 12:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(55) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_size` varchar(55) NOT NULL,
  `product_quantity` int(60) NOT NULL,
  `product_details` varchar(500) NOT NULL,
  `product_image` varchar(400) NOT NULL,
  `product_price` decimal(40,0) NOT NULL,
  `time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `cat_id`, `product_size`, `product_quantity`, `product_details`, `product_image`, `product_price`, `time`) VALUES
(1, 'Blind Rivert', 3, '1/8x1/2', 1500, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '15900', '2021-10-18 13:32:02'),
(2, 'Concrete Nail', 5, '2', 0, 'Concrete nails are widely used to connect the wooden elements and structures, as well as fixing them soft materials. The structure of the nail has a circular section and a flat or conical head. Roughness before the cap significantly improves the reliability of the connection. ', 'Uploads/Concrete Nail.jpg', '3850', '2021-09-14 19:49:12'),
(3, 'Drywall Screw', 1, '5x5/8', 1000, 'The main purpose for drywall screws is securing full sheets of drywall (usually 4-foot by 8-foot for do-it-yourselfers) or partial sheets of drywall to either wood or metal studs. Drywall screws are good for repairing nail pops.       ', 'Uploads/Drywall Screw.jpg', '12160', '2021-10-18 13:32:09'),
(4, 'Anchor Bolt', 4, '1/2', 400, 'Anchor bolts are designed to attach structural elements to concrete. In our industry, anchor bolts are typically used to attach steel to concrete. One end is embedded into the concrete, while the opposite end is threaded to attach structural support. ', 'Uploads/Anchor Bolt.jpg', '10080', '2021-10-18 13:32:14'),
(5, 'Self-Tapping Screw', 2, '1', 800, 'Self-tapping screws are ideal for items that require regular maintenance and work well when working with two different kinds of material being fastened together. These screws either come with a blunt, flat, sharp or piercing tip. Sharp-tipped self-tapping screws drill their own holes in softer wood and plastic. ', 'Uploads/Self-Tapping Screw.jpg', '23750', '2021-10-18 13:32:18'),
(6, 'Self-Drilling Screw', 2, '1', 800, 'Self drilling screws have a point that acts as a drill bit and sharp cutting threads that tap the hole during installation. Self drilling screws are a commonly used variety of screw for quick drilling into both metal and wood. ', 'Uploads/Self-Drilling Screw.jpg', '25000', '2021-10-18 13:32:22'),
(7, 'Anchor DynaBolt', 4, '8x65', 117, 'The Dynabolt is a sleeve-type anchor that is specified for anchoring into concrete, hollow concrete block, grout-filled concrete block and brick base materials. ', 'Uploads/Anchor DynaBolt.jpg', '22000', '2021-10-16 13:00:09'),
(8, 'Drop Anchor', 4, '1/2', 41, 'Drop anchors should only be used in solid concrete. Their main use is to insert threaded rod to suspend electrical cable trays, HVAC ductwork and fire sprinkler pipe and heads. They can be used in applications that require a flush mounted anchor and when a bolt needs to be inserted and removed. ', 'Uploads/Drop Anchor.jpg', '12000', '2021-10-04 16:36:19'),
(9, 'Blue Pocket-Hole Screw', 2, '1x1/2', 32, 'Pocket hole joint screws are used for pocket hole joints. Pocket screws are generally more expensive, but they are needed for a tight, strong joint. Pocket screws have a wide washer head to prevent screwing too far into the joint and cracking the wood. ', 'Uploads/Blue Pocket-Hole Screw.jpg', '29000', '2021-09-20 12:38:27'),
(10, 'Flat Head Wood Screw', 2, '1', 19, 'Flat head wood screws are designed to adjoin two pieces of wood. Flat head wood screws are partially threaded and are designed to slide through the top pieces of wood so it can pull tight together both boards. ', 'Uploads/Flat Head Wood Screw.jpg', '6000', '2021-10-04 16:27:28'),
(24, 'Blind Rivert', 3, '1/8x3/8', 70, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '14400', '2021-09-14 19:49:12'),
(25, 'Blind Rivert', 3, '1/8x1/4', 42, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '13300', '2021-09-20 12:38:27'),
(26, 'Blind Rivert', 3, '1/8x5/8', 47, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '18500', '2021-09-15 23:16:29'),
(27, 'Blind Rivert', 3, '1/8x3/4', 50, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '20900', '2021-09-14 19:49:12'),
(28, 'Blind Rivert', 3, '1/8x1', 50, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '14900', '2021-09-14 19:49:12'),
(29, 'Blind Rivert', 3, '5/32x3/8', 50, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '19500', '2021-09-14 19:49:12'),
(30, 'Blind Rivert', 3, '5/32x1/2', 50, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '21700', '2021-09-14 19:49:12'),
(31, 'Blind Rivert', 3, '5/32x5/8', 50, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '13350', '2021-09-14 19:49:12'),
(32, 'Blind Rivert', 3, '5/32x3/4', 47, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '14300', '2021-09-14 19:49:12'),
(33, 'Blind Rivert', 3, '5/32x1', 50, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '17650', '2021-09-14 19:49:12'),
(34, 'Blind Rivert', 3, '3/16x3/8', 50, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '14350', '2021-09-14 19:49:12'),
(35, 'Blind Rivert', 3, '3/16x1/2', 50, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '16200', '2021-09-14 19:49:12'),
(36, 'Blind Rivert', 3, '3/16x5/8', 50, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '17900', '2021-09-14 19:49:12'),
(37, 'Blind Rivert', 3, '3/16x3/4', 50, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '19500', '2021-09-14 19:49:12'),
(38, 'Blind Rivert', 3, '3/16x1', 50, 'Blind rivets, also commonly referred to as POP Rivets, are mainly used in applications where there is no access to the rear (blind side) of the joint.   ', 'Uploads/Blind Rivert.jpg', '11900', '2021-09-14 19:49:12'),
(39, 'Drywall Screw', 1, '6x1/2', 50, 'The main purpose for drywall screws is securing full sheets of drywall (usually 4-foot by 8-foot for do-it-yourselfers) or partial sheets of drywall to either wood or metal studs. Drywall screws are good for repairing nail pops.       ', 'Uploads/Drywall Screw.jpg', '10960', '2021-09-14 19:49:12'),
(40, 'Drywall Screw', 1, '6x3/4', 50, 'The main purpose for drywall screws is securing full sheets of drywall (usually 4-foot by 8-foot for do-it-yourselfers) or partial sheets of drywall to either wood or metal studs. Drywall screws are good for repairing nail pops.       ', 'Uploads/Drywall Screw.jpg', '16720', '2021-09-14 19:49:12'),
(41, 'Drywall Screw', 1, '6x1', 50, 'The main purpose for drywall screws is securing full sheets of drywall (usually 4-foot by 8-foot for do-it-yourselfers) or partial sheets of drywall to either wood or metal studs. Drywall screws are good for repairing nail pops.       ', 'Uploads/Drywall Screw.jpg', '19040', '2021-09-14 19:49:12'),
(42, 'Drywall Screw', 1, '7x1', 50, 'The main purpose for drywall screws is securing full sheets of drywall (usually 4-foot by 8-foot for do-it-yourselfers) or partial sheets of drywall to either wood or metal studs. Drywall screws are good for repairing nail pops.       ', 'Uploads/Drywall Screw.jpg', '17160', '2021-09-14 19:49:12'),
(43, 'Drywall Screw', 1, '8x1', 50, 'The main purpose for drywall screws is securing full sheets of drywall (usually 4-foot by 8-foot for do-it-yourselfers) or partial sheets of drywall to either wood or metal studs. Drywall screws are good for repairing nail pops.       ', 'Uploads/Drywall Screw.jpg', '18180', '2021-09-14 19:49:12'),
(44, 'Drywall Screw', 1, '8x2', 50, 'The main purpose for drywall screws is securing full sheets of drywall (usually 4-foot by 8-foot for do-it-yourselfers) or partial sheets of drywall to either wood or metal studs. Drywall screws are good for repairing nail pops.       ', 'Uploads/Drywall Screw.jpg', '23600', '2021-09-14 19:49:12'),
(45, 'Drywall Screw', 1, '8x3', 50, 'The main purpose for drywall screws is securing full sheets of drywall (usually 4-foot by 8-foot for do-it-yourselfers) or partial sheets of drywall to either wood or metal studs. Drywall screws are good for repairing nail pops.       ', 'Uploads/Drywall Screw.jpg', '17040', '2021-09-14 19:49:12'),
(46, 'Drywall Screw', 1, '10x1', 50, 'The main purpose for drywall screws is securing full sheets of drywall (usually 4-foot by 8-foot for do-it-yourselfers) or partial sheets of drywall to either wood or metal studs. Drywall screws are good for repairing nail pops.       ', 'Uploads/Drywall Screw.jpg', '27600', '2021-09-14 19:49:12'),
(47, 'Drywall Screw', 1, '10x2', 50, 'The main purpose for drywall screws is securing full sheets of drywall (usually 4-foot by 8-foot for do-it-yourselfers) or partial sheets of drywall to either wood or metal studs. Drywall screws are good for repairing nail pops.       ', 'Uploads/Drywall Screw.jpg', '33760', '2021-09-14 19:49:12'),
(48, 'Drywall Screw', 1, '10x3', 50, 'The main purpose for drywall screws is securing full sheets of drywall (usually 4-foot by 8-foot for do-it-yourselfers) or partial sheets of drywall to either wood or metal studs. Drywall screws are good for repairing nail pops.       ', 'Uploads/Drywall Screw.jpg', '34800', '2021-09-14 19:49:12'),
(49, 'Concrete Nail', 5, '1x1/2', 20, 'Concrete nails are widely used to connect the wooden elements and structures, as well as fixing them soft materials. The structure of the nail has a circular section and a flat or conical head. Roughness before the cap significantly improves the reliability of the connection. ', 'Uploads/Concrete Nail.jpg', '4050', '2021-09-14 19:49:12'),
(50, 'Concrete Nail', 5, '2x1/2', 19, 'Concrete nails are widely used to connect the wooden elements and structures, as well as fixing them soft materials. The structure of the nail has a circular section and a flat or conical head. Roughness before the cap significantly improves the reliability of the connection. ', 'Uploads/Concrete Nail.jpg', '3900', '2021-09-14 19:49:12'),
(51, 'Anchor Bolt', 4, '1/4', 50, 'Anchor bolts are designed to attach structural elements to concrete. In our industry, anchor bolts are typically used to attach steel to concrete. One end is embedded into the concrete, while the opposite end is threaded to attach structural support. ', 'Uploads/Anchor Bolt.jpg', '12000', '2021-09-14 19:49:12'),
(52, 'Anchor Bolt', 4, '5/16', 50, 'Anchor bolts are designed to attach structural elements to concrete. In our industry, anchor bolts are typically used to attach steel to concrete. One end is embedded into the concrete, while the opposite end is threaded to attach structural support. ', 'Uploads/Anchor Bolt.jpg', '10800', '2021-09-14 19:49:12'),
(53, 'Anchor Bolt', 4, '3/8', 49, 'Anchor bolts are designed to attach structural elements to concrete. In our industry, anchor bolts are typically used to attach steel to concrete. One end is embedded into the concrete, while the opposite end is threaded to attach structural support. ', 'Uploads/Anchor Bolt.jpg', '11200', '2021-09-14 19:49:12'),
(54, 'Self-Tapping Screw', 2, '3/4', 20, 'Self-tapping screws are ideal for items that require regular maintenance and work well when working with two different kinds of material being fastened together. These screws either come with a blunt, flat, sharp or piercing tip. Sharp-tipped self-tapping screws drill their own holes in softer wood and plastic. ', 'Uploads/Self-Tapping Screw.jpg', '22500', '2021-09-14 19:49:12'),
(55, 'Self-Tapping Screw', 2, '1x1/2', 20, 'Self-tapping screws are ideal for items that require regular maintenance and work well when working with two different kinds of material being fastened together. These screws either come with a blunt, flat, sharp or piercing tip. Sharp-tipped self-tapping screws drill their own holes in softer wood and plastic. ', 'Uploads/Self-Tapping Screw.jpg', '19250', '2021-09-14 19:49:12'),
(56, 'Self-Tapping Screw', 2, '2', 20, 'Self-tapping screws are ideal for items that require regular maintenance and work well when working with two different kinds of material being fastened together. These screws either come with a blunt, flat, sharp or piercing tip. Sharp-tipped self-tapping screws drill their own holes in softer wood and plastic. ', 'Uploads/Self-Tapping Screw.jpg', '18900', '2021-09-14 19:49:12'),
(57, 'Self-Tapping Screw', 2, '3', 20, 'Self-tapping screws are ideal for items that require regular maintenance and work well when working with two different kinds of material being fastened together. These screws either come with a blunt, flat, sharp or piercing tip. Sharp-tipped self-tapping screws drill their own holes in softer wood and plastic. ', 'Uploads/Self-Tapping Screw.jpg', '18000', '2021-09-14 19:49:12'),
(58, 'Self-Tapping Screw', 2, '4', 20, 'Self-tapping screws are ideal for items that require regular maintenance and work well when working with two different kinds of material being fastened together. These screws either come with a blunt, flat, sharp or piercing tip. Sharp-tipped self-tapping screws drill their own holes in softer wood and plastic. ', 'Uploads/Self-Tapping Screw.jpg', '24000', '2021-09-14 19:49:12'),
(59, 'Self-Drilling Screw', 2, '1x1/2', 10, 'Self drilling screws have a point that acts as a drill bit and sharp cutting threads that tap the hole during installation. Self drilling screws are a commonly used variety of screw for quick drilling into both metal and wood. ', 'Uploads/Self-Drilling Screw.jpg', '21000', '2021-09-14 19:49:12'),
(60, 'Self-Drilling Screw', 2, '2', 10, 'Self drilling screws have a point that acts as a drill bit and sharp cutting threads that tap the hole during installation. Self drilling screws are a commonly used variety of screw for quick drilling into both metal and wood. ', 'Uploads/Self-Drilling Screw.jpg', '19800', '2021-09-14 19:49:12'),
(61, 'Self-Drilling Screw', 2, '2x1/2', 10, 'Self drilling screws have a point that acts as a drill bit and sharp cutting threads that tap the hole during installation. Self drilling screws are a commonly used variety of screw for quick drilling into both metal and wood. ', 'Uploads/Self-Drilling Screw.jpg', '16500', '2021-09-14 19:49:12'),
(62, 'Self-Drilling Screw', 2, '3', 10, 'Self drilling screws have a point that acts as a drill bit and sharp cutting threads that tap the hole during installation. Self drilling screws are a commonly used variety of screw for quick drilling into both metal and wood. ', 'Uploads/Self-Drilling Screw.jpg', '20000', '2021-09-14 19:49:12'),
(63, 'Anchor DynaBolt', 4, '8x75', 20, 'The Dynabolt is a sleeve-type anchor that is specified for anchoring into concrete, hollow concrete block, grout-filled concrete block and brick base materials. ', 'Uploads/Anchor DynaBolt.jpg', '20800', '2021-09-14 19:49:12'),
(64, 'Anchor DynaBolt', 4, '8x100', 20, 'The Dynabolt is a sleeve-type anchor that is specified for anchoring into concrete, hollow concrete block, grout-filled concrete block and brick base materials. ', 'Uploads/Anchor DynaBolt.jpg', '18600', '2021-09-14 19:49:12'),
(65, 'Anchor DynaBolt', 4, '10x75', 20, 'The Dynabolt is a sleeve-type anchor that is specified for anchoring into concrete, hollow concrete block, grout-filled concrete block and brick base materials. ', 'Uploads/Anchor DynaBolt.jpg', '23400', '2021-09-14 19:49:12'),
(66, 'Anchor DynaBolt', 4, '10x100', 20, 'The Dynabolt is a sleeve-type anchor that is specified for anchoring into concrete, hollow concrete block, grout-filled concrete block and brick base materials. ', 'Uploads/Anchor DynaBolt.jpg', '22000', '2021-09-14 19:49:12'),
(67, 'Anchor DynaBolt', 4, '12x100', 20, 'The Dynabolt is a sleeve-type anchor that is specified for anchoring into concrete, hollow concrete block, grout-filled concrete block and brick base materials. ', 'Uploads/Anchor DynaBolt.jpg', '19200', '2021-09-14 19:49:12'),
(68, 'Anchor DynaBolt', 4, '12x125', 20, 'The Dynabolt is a sleeve-type anchor that is specified for anchoring into concrete, hollow concrete block, grout-filled concrete block and brick base materials. ', 'Uploads/Anchor DynaBolt.jpg', '18000', '2021-09-14 19:49:12'),
(69, 'Anchor DynaBolt', 4, '16x100', 20, 'The Dynabolt is a sleeve-type anchor that is specified for anchoring into concrete, hollow concrete block, grout-filled concrete block and brick base materials. ', 'Uploads/Anchor DynaBolt.jpg', '23200', '2021-09-14 19:49:12'),
(70, 'Anchor DynaBolt', 4, '16x125', 20, 'The Dynabolt is a sleeve-type anchor that is specified for anchoring into concrete, hollow concrete block, grout-filled concrete block and brick base materials. ', 'Uploads/Anchor DynaBolt.jpg', '19200', '2021-09-14 19:49:12'),
(71, 'Drop Anchor', 4, '3/8', 20, 'Drop anchors should only be used in solid concrete. Their main use is to insert threaded rod to suspend electrical cable trays, HVAC ductwork and fire sprinkler pipe and heads. They can be used in applications that require a flush mounted anchor and when a bolt needs to be inserted and removed. ', 'Uploads/Drop Anchor.jpg', '12000', '2021-09-18 16:49:33'),
(72, 'Drop Anchor', 4, '5/16', 10, 'Drop anchors should only be used in solid concrete. Their main use is to insert threaded rod to suspend electrical cable trays, HVAC ductwork and fire sprinkler pipe and heads. They can be used in applications that require a flush mounted anchor and when a bolt needs to be inserted and removed.          ', 'Uploads/Drop Anchor.jpg', '16000', '2021-09-18 16:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `company` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `email`, `mobile_number`, `company`, `address`, `password`, `created_time`) VALUES
(1, 'Yichen Li', 'yichen90@gmail.com', '+86 16521686381', 'China', 'Dong 51hao,Beijing.', 'yichen90', '2021-09-17 22:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `pid`, `cid`, `datetime`) VALUES
(13, 4, 17, '2021-10-05 19:18:01'),
(14, 2, 17, '2021-10-05 19:19:35'),
(15, 1, 17, '2021-10-05 23:08:00'),
(16, 10, 17, '2021-10-05 23:08:26'),
(19, 3, 25, '2021-10-06 16:24:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `UC_customer` (`email`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`hr_id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_tracking`
--
ALTER TABLE `order_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `Categories` (`cat_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `hr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT for table `order_tracking`
--
ALTER TABLE `order_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Categories` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
