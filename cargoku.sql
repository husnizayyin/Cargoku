-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 10:28 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cargoku`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_consolidate`
--

CREATE TABLE `add_consolidate` (
  `id` int(11) NOT NULL,
  `idcon` int(11) NOT NULL,
  `con_tmp` int(11) NOT NULL,
  `order_inv` varchar(60) DEFAULT NULL,
  `s_name` varchar(255) DEFAULT NULL,
  `r_qnty` varchar(128) DEFAULT NULL,
  `r_weight` varchar(128) DEFAULT NULL,
  `v_weight` varchar(60) DEFAULT NULL,
  `r_description` text,
  `r_costtotal` double NOT NULL,
  `created` date NOT NULL,
  `r_hour` time NOT NULL,
  `act_status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `add_container`
--

CREATE TABLE `add_container` (
  `id` int(11) NOT NULL,
  `idcon` int(11) NOT NULL,
  `letter_or` varchar(6) DEFAULT NULL,
  `tracking` varchar(120) DEFAULT NULL,
  `order_inv` varchar(60) DEFAULT NULL,
  `username` varchar(60) NOT NULL,
  `r_name` varchar(255) DEFAULT NULL,
  `r_email` varchar(255) DEFAULT NULL,
  `r_address` varchar(255) DEFAULT NULL,
  `r_phone` varchar(255) DEFAULT NULL,
  `r_dest` varchar(255) DEFAULT NULL,
  `r_city` varchar(255) DEFAULT NULL,
  `r_postal` varchar(255) DEFAULT NULL,
  `origin_port` varchar(120) DEFAULT NULL,
  `destination_port` varchar(120) DEFAULT NULL,
  `origin_off` varchar(255) DEFAULT NULL,
  `package` varchar(255) NOT NULL,
  `r_tax` varchar(128) DEFAULT NULL,
  `total_tax` varchar(60) DEFAULT NULL,
  `r_insurance` varchar(128) DEFAULT NULL,
  `total_insurance` varchar(60) DEFAULT NULL,
  `ship_mode` varchar(128) DEFAULT NULL,
  `n_weight` varchar(128) DEFAULT NULL,
  `g_weight` varchar(60) DEFAULT NULL,
  `s_description` text,
  `length` varchar(128) DEFAULT NULL,
  `width` varchar(128) DEFAULT NULL,
  `height` varchar(128) DEFAULT NULL,
  `incoterms` varchar(128) DEFAULT NULL,
  `pay_mode` varchar(40) DEFAULT NULL,
  `r_curren` varchar(128) DEFAULT NULL,
  `r_costtotal` double NOT NULL,
  `payment_status` tinyint(4) NOT NULL,
  `s_week` varchar(6) DEFAULT NULL,
  `expiration_date` varchar(20) NOT NULL,
  `deli_time` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `r_hour` time NOT NULL,
  `courier` varchar(255) NOT NULL,
  `status_courier` varchar(128) DEFAULT NULL,
  `act_status` tinyint(1) NOT NULL,
  `level` varchar(120) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `add_courier`
--

CREATE TABLE `add_courier` (
  `id` int(11) NOT NULL,
  `letter_or` varchar(6) DEFAULT NULL,
  `tracking` varchar(120) DEFAULT NULL,
  `order_inv` varchar(60) DEFAULT NULL,
  `s_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(60) NOT NULL,
  `r_name` varchar(255) DEFAULT NULL,
  `r_email` varchar(255) DEFAULT NULL,
  `r_address` varchar(255) DEFAULT NULL,
  `r_phone` varchar(255) DEFAULT NULL,
  `rc_phone` varchar(120) DEFAULT NULL,
  `r_dest` varchar(255) DEFAULT NULL,
  `r_city` varchar(255) DEFAULT NULL,
  `r_postal` varchar(255) DEFAULT NULL,
  `origin_off` varchar(255) DEFAULT NULL,
  `code_offnew` varchar(120) DEFAULT NULL,
  `package` varchar(255) NOT NULL,
  `r_tax` varchar(128) DEFAULT NULL,
  `total_tax` varchar(60) DEFAULT NULL,
  `r_insurance` varchar(128) DEFAULT NULL,
  `total_insurance` varchar(60) DEFAULT NULL,
  `itemcat` varchar(255) NOT NULL,
  `r_qnty` varchar(128) DEFAULT NULL,
  `r_weight` varchar(128) DEFAULT NULL,
  `v_weight` varchar(60) DEFAULT NULL,
  `r_description` text,
  `length` varchar(128) DEFAULT NULL,
  `width` varchar(128) DEFAULT NULL,
  `height` varchar(128) DEFAULT NULL,
  `r_custom` varchar(128) DEFAULT NULL,
  `pay_mode` varchar(40) DEFAULT NULL,
  `r_curren` varchar(128) DEFAULT NULL,
  `r_costtotal` double NOT NULL,
  `payment_status` tinyint(4) NOT NULL,
  `deli_time` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `r_hour` time NOT NULL,
  `courier` varchar(255) NOT NULL,
  `service_options` varchar(120) DEFAULT NULL,
  `collection_courier` varchar(255) DEFAULT NULL,
  `c_driver` varchar(120) DEFAULT NULL,
  `status_courier` varchar(128) DEFAULT NULL,
  `act_status` tinyint(1) NOT NULL,
  `reasons` text,
  `deliver_date` varchar(40) DEFAULT NULL,
  `delivery_hour` varchar(40) DEFAULT NULL,
  `person_receives` varchar(120) DEFAULT NULL,
  `name_employee` varchar(120) DEFAULT NULL,
  `level` varchar(120) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_courier`
--

INSERT INTO `add_courier` (`id`, `letter_or`, `tracking`, `order_inv`, `s_name`, `address`, `phone`, `country`, `city`, `postal`, `email`, `username`, `r_name`, `r_email`, `r_address`, `r_phone`, `rc_phone`, `r_dest`, `r_city`, `r_postal`, `origin_off`, `code_offnew`, `package`, `r_tax`, `total_tax`, `r_insurance`, `total_insurance`, `itemcat`, `r_qnty`, `r_weight`, `v_weight`, `r_description`, `length`, `width`, `height`, `r_custom`, `pay_mode`, `r_curren`, `r_costtotal`, `payment_status`, `deli_time`, `created`, `r_hour`, `courier`, `service_options`, `collection_courier`, `c_driver`, `status_courier`, `act_status`, `reasons`, `deliver_date`, `delivery_hour`, `person_receives`, `name_employee`, `level`) VALUES
(1, 'AWB', '00000001', 'AWB00000001', 'dadang konelo', 'Tasikmalaya', '62082222222222', 'Indonesia', '', '46155', 'dadang@email.com', 'dadang', 'maman', 'mamangaul@mail.com', 'perumahan buncitmas', '082222222222', '0698787979', 'Indonesia', 'mampang', '46155', 'OFFICE 1', NULL, 'Parcel', '19', '7.3587', '5', '0.05', 'Sport &amp; Leisure', '1', '10.00', '0', 'cepet', '3', '2', '3', '1', 'Credit Card', 'USD', 38.73, 0, '1 Hari', '2020-11-20', '13:57:03', 'PO.Primajasa', 'Priority Mail', '11/20/2020 1:58 PM', NULL, 'Approved', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'AWB', '00000002', 'AWB00000002', 'dadang konelo', 'Tasikmalaya', '62082222222222', 'Indonesia', '', '46155', 'dadang@email.com', 'dadang', 'aan', 'aan@mail.com', 'perumahan buncitmas', '082222222222', '082222222222', 'Indonesia', 'mampang', '46155', 'OFFICE 1', NULL, 'Parcel', '19', '15.2', '5', '0.05', 'Audio Video', '1', '1.00', '0', 'eqbfK', '2', '2', '2', '1', 'Credit Card', 'USD', 80, 0, '1 Hari', '2020-11-20', '14:09:00', 'PO.Primajasa', 'Priority Mail', '11/20/2020 2:09 PM', NULL, 'Approved', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'AWB', '00000003', 'AWB00000003', 'dadang konelo', 'Tasikmalaya', '082222222222', 'Indonesia', '', '46155', 'dadang@email.com', 'dadang', 'aan', 'aan@mail.com', 'perumahan buncitmas', '082222222222', '082222222222', 'Indonesia', 'mampang', '46155', 'OFFICE 1', 'AG1598', 'Plastic boxes', '2', '1.8981', '1', '0.2', 'Accessory (no-battery)', '1', '3', '0', 'tes', '3', '2', '2', '4', 'Cash', 'IDR', 9.99, 0, '1 Hari', '2020-11-20', '16:08:06', 'PO.Primjasa', 'Priority Mail', '11/20/2020 4:07 PM', '', 'Delivered', 2, NULL, '11/20/2020', '12:30:18am', 'aan', 'mr x', 'admin'),
(4, 'AWB', '00000004', 'AWB00000004', 'maman gaul', '', '6267657485', 'Indonesia', '', '675432', 'maman@gmail.com', 'maman', 'Agung', 'Agung@gmail.com', 'Tanjung Priok', '56774232', '563563776', 'Jakarta', 'Jakarta Utara', '45672', 'OFFICE 1', NULL, 'Reguler dibawah 1kg', '19', '34.6503', '5', '150', 'Accessory (no-battery)', '1', '1.00', '0', 'tes', '30', '20', '5', '3000', 'Credit Card', 'USD', 182.37, 0, '', '2020-11-20', '17:55:58', 'PO.Primajasa', 'Langsung', '11/21/2020 5:56 PM', NULL, 'Approved', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'AWB', '00000005', 'AWB00000005', 'maman gaul', 'Mampang', '67657485', 'Indonesia', 'Jakarta Selatan', '675432', 'maman@gmail.com', 'maman', 'Agung', 'Agung@gmail.com', 'perumahan buncitmas', '082222222222', '1', 'Indonesia', 'mampang', '46155', 'OFFICE 1', 'AG1598', 'Documet', '-25', '4.7386', '5', '29.45', 'Accessory (no-battery)', '2', '1', '0.12', 'hiuhi', '20', '15', '2', '589', 'Cash', 'IDR', 24.94, 0, '1 Hari', '2020-11-20', '18:04:46', 'PO. Budiman', 'Langsung', '11/20/2020 6:04 PM', '', 'Menunggu Loading', 1, NULL, NULL, NULL, NULL, NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `name_item` varchar(120) DEFAULT NULL,
  `detail_item` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_item`, `detail_item`) VALUES
(1, 'Accessory (no-battery)', 'Accessory (no-battery)'),
(2, 'Accessory (with battery)', 'Accessory (with battery)'),
(3, 'Audio Video', 'Audio Video'),
(4, 'Bags & Luggages', 'Bags & Luggages'),
(5, 'Books & Collectibles', 'Books & Collectibles'),
(6, 'Cameras', 'Cameras'),
(7, 'Computers & Laptops', 'Computers & Laptops'),
(8, 'Documents', 'Documents'),
(9, 'Dry Food & Supplements', 'Dry Food & Supplements'),
(10, 'Fashion', 'Fashion'),
(11, 'Gaming', 'Gaming'),
(12, 'Health & Beauty', 'Health & Beauty'),
(13, 'Home Appliances', 'Home Appliances'),
(14, 'Home Decor', 'Home Decor'),
(15, 'Jewelry', 'Jewelry'),
(16, 'Mobile Phones', 'Mobile Phones'),
(17, 'Pet Accessory', 'Pet Accessory'),
(18, 'Sauce', 'Sauce'),
(19, 'Sport & Leisure', 'Sport & Leisure'),
(20, 'Tablets', 'Tablets'),
(21, 'Toys', 'Toys'),
(22, 'Watches', 'Watches');

-- --------------------------------------------------------

--
-- Table structure for table `consolidate`
--

CREATE TABLE `consolidate` (
  `id` int(11) NOT NULL,
  `idcon` int(11) NOT NULL,
  `letter_or` varchar(6) DEFAULT NULL,
  `tracking` varchar(120) DEFAULT NULL,
  `order_inv` varchar(60) DEFAULT NULL,
  `order_cons` varchar(60) DEFAULT NULL,
  `seals` varchar(60) DEFAULT NULL,
  `username` varchar(60) NOT NULL,
  `r_name` varchar(255) DEFAULT NULL,
  `r_email` varchar(255) DEFAULT NULL,
  `r_address` varchar(255) DEFAULT NULL,
  `r_phone` varchar(255) DEFAULT NULL,
  `r_dest` varchar(255) DEFAULT NULL,
  `c_address` varchar(255) DEFAULT NULL,
  `r_declarate` varchar(60) DEFAULT NULL,
  `r_qnty` varchar(60) DEFAULT NULL,
  `r_weight` varchar(60) DEFAULT NULL,
  `code_off` varchar(128) DEFAULT NULL,
  `code_offnew` varchar(120) DEFAULT NULL,
  `r_curren` varchar(128) DEFAULT NULL,
  `c_add_pound` varchar(60) DEFAULT NULL,
  `reexpedition` varchar(60) DEFAULT NULL,
  `r_costtotal` double NOT NULL,
  `pay_mode` varchar(60) NOT NULL,
  `payment_status` tinyint(4) NOT NULL,
  `deli_time` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `r_hour` time NOT NULL,
  `courier` varchar(255) NOT NULL,
  `service_options` varchar(120) DEFAULT NULL,
  `c_driver` varchar(255) DEFAULT NULL,
  `status_courier` varchar(128) DEFAULT NULL,
  `act_status` tinyint(1) NOT NULL,
  `comments` text,
  `deliver_date` varchar(40) DEFAULT NULL,
  `delivery_hour` varchar(40) DEFAULT NULL,
  `person_receives` varchar(120) DEFAULT NULL,
  `name_employee` varchar(120) DEFAULT NULL,
  `level` varchar(120) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cons_products`
--

CREATE TABLE `cons_products` (
  `id` int(11) NOT NULL,
  `idcon` int(11) NOT NULL,
  `con_tmp` int(11) NOT NULL,
  `trackings` varchar(120) DEFAULT NULL,
  `order_invs` varchar(60) DEFAULT NULL,
  `order_cons` varchar(60) NOT NULL,
  `s_names` varchar(255) NOT NULL,
  `r_qntys` varchar(128) DEFAULT NULL,
  `r_weights` varchar(128) DEFAULT NULL,
  `v_weights` varchar(60) DEFAULT NULL,
  `r_descriptions` text,
  `r_costtotals` double NOT NULL,
  `createds` date NOT NULL,
  `r_hours` time NOT NULL,
  `levels` varchar(120) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cons_tmp`
--

CREATE TABLE `cons_tmp` (
  `id` int(11) NOT NULL,
  `idcon` int(11) NOT NULL,
  `con_tmp` int(11) NOT NULL,
  `trackings` varchar(120) DEFAULT NULL,
  `order_invs` varchar(60) DEFAULT NULL,
  `order_cons` varchar(60) DEFAULT NULL,
  `s_names` varchar(255) DEFAULT NULL,
  `r_qntys` varchar(128) DEFAULT NULL,
  `r_weights` varchar(128) DEFAULT NULL,
  `v_weights` varchar(60) DEFAULT NULL,
  `r_descriptions` text,
  `r_costtotals` double NOT NULL,
  `createds` date NOT NULL,
  `r_hours` time NOT NULL,
  `levels` varchar(120) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `courier_com`
--

CREATE TABLE `courier_com` (
  `id` int(10) NOT NULL,
  `name_com` varchar(100) DEFAULT NULL,
  `address_cou` varchar(120) DEFAULT NULL,
  `phone_cou` varchar(20) DEFAULT NULL,
  `country_cou` varchar(100) DEFAULT NULL,
  `city_cou` varchar(100) DEFAULT NULL,
  `postal_cou` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_com`
--

INSERT INTO `courier_com` (`id`, `name_com`, `address_cou`, `phone_cou`, `country_cou`, `city_cou`, `postal_cou`) VALUES
(90, 'PO. Budiman', 'Tasikmalaya', '676348596', 'Indonesia', 'Tasikmalaya', '46155'),
(89, 'PO.Primajasa', 'Tasikmalaya', '076546265362', 'Indonesia', 'Tasikmalaya', '46155');

-- --------------------------------------------------------

--
-- Table structure for table `courier_track`
--

CREATE TABLE `courier_track` (
  `id` int(10) NOT NULL,
  `t_id` varchar(20) DEFAULT NULL,
  `order_track` varchar(100) DEFAULT NULL,
  `t_dest` varchar(255) DEFAULT NULL,
  `t_city` varchar(250) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `rc_phone` varchar(60) DEFAULT NULL,
  `t_date` varchar(100) DEFAULT NULL,
  `t_hour` varchar(120) DEFAULT NULL,
  `status_courier` varchar(120) DEFAULT NULL,
  `code_offnew` varchar(120) DEFAULT NULL,
  `t_level` varchar(120) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_track`
--

INSERT INTO `courier_track` (`id`, `t_id`, `order_track`, `t_dest`, `t_city`, `comments`, `rc_phone`, `t_date`, `t_hour`, `status_courier`, `code_offnew`, `t_level`) VALUES
(1, '3', 'AWB00000003', 'Indonesia', 'Bandung', 'Transit agen', '082222222222', '11/20/2020', '11:08:44pm', 'In Transit', 'AG1598', 'admin'),
(2, '3', 'AWB00000003', 'Indonesia', 'Jakarta', 'sampai kantor cabang', '082222222222', '11/20/2020', '12:28:59am', 'Received Office', 'AG1598', 'admin'),
(3, '5', 'AWB00000005', 'Indonesia', 'agen mampang', 'menunggu loading', '1', '11/21/2020', '01:05:03am', 'Menunggu Loading', 'AG1598', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `c_tracking`
--

CREATE TABLE `c_tracking` (
  `id` int(100) NOT NULL,
  `n_order` varchar(255) DEFAULT NULL,
  `order_track` varchar(120) DEFAULT NULL,
  `name_off` varchar(250) DEFAULT NULL,
  `role_user` varchar(250) DEFAULT NULL,
  `created_courier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_container`
--

CREATE TABLE `detail_container` (
  `id` int(11) NOT NULL,
  `idcon` int(20) NOT NULL,
  `order_inv` varchar(60) NOT NULL,
  `detail_container` text NOT NULL,
  `detail_weight` varchar(255) NOT NULL,
  `detail_qty` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `tprice` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `act_status` varchar(6) NOT NULL,
  `level` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail_container_tmp`
--

CREATE TABLE `detail_container_tmp` (
  `id` int(11) NOT NULL,
  `idcon` int(20) NOT NULL,
  `order_inv` varchar(60) NOT NULL,
  `detail_container` text NOT NULL,
  `detail_weight` varchar(255) NOT NULL,
  `detail_qty` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `tprice` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `act_status` varchar(6) NOT NULL,
  `level` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `help` text,
  `body` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `subject`, `help`, `body`) VALUES
(1, 'Registration Email', 'Please verify your email', 'This template is used to send Registration Verification Email, when Configuration->Registration Verification is set to YES', '<!doctype html>\r\n<html>\r\n\r\n<head>\r\n<link href=\'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600\' rel=\'stylesheet\' type=\'text/css\'>\r\n</head>\r\n\r\n<body style=\'margin: 0; padding: 20px; font-family: Montserrat, Arial, sans serif; font-size: 12px;font-weight:400;word-break: break-word;color:#555;line-height: 18px;\'>\r\n	<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n		<table align=\'center\' border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\' style=\'max-width:500px; margin:40px auto;border-collapse: collapse;border-radius: 2px;overflow: hidden;\'> \r\n\r\n			<tr bgcolor=\'#f62d51\' height=\'5px\'>\r\n				<td align=\'center\' style=\'font-family: Montserrat, Arial, sans serif; color: #fff;text-transform: uppercase;font-size: 20px;justify-content: center;align-items: center;letter-spacing: 4px;font-weight: 600;\'>\r\n				</td>\r\n			</tr>\r\n			<tr bgcolor=\'#f9f9f9\'>\r\n				<td style=\'padding:40px;\'>\r\n					<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n						<tr><td><img src=\"[URL]/uploads/logo.png\" class=\"logo\"/></td></tr>\r\n						<br><br><br>\r\n						<tr>\r\n							<td style=\'font-family: Montserrat, Arial, sans serif; margin:0; color:#846add; font-size:20px; font-weight:400;\'>\r\n							Hi!\r\n							</td>\r\n						</tr>\r\n						<td style=\'font-family: Montserrat, Arial, sans serif; margin:5px 0 0; font-size: 12px; font-weight:400;word-break: break-word;color:#333;line-height: 22px; position: relative; top: 10px;\'>\r\n							[NAME]! Thanks for registering.\r\n						</td>\r\n						<tr height=\'30\'></tr>\r\n						<tr>\r\n							<td style=\"margin: 40px 0;line-height: 22px; font-family: \'Montserrat\', Arial, sans serif; font-size: 12px;font-weight:100; word-break: break-word; color:#333;\">\r\n								You&#039;re now a member of [SITE_NAME].\r\n								<br>\r\n								Here are your login details. Please keep them in a safe place:\r\n								<br><br>\r\n								Username: <b>[USERNAME]</b>\r\n								<br>\r\n								Password: <b>[PASSWORD]</b>\r\n								<br><br>\r\n									The administrator of this site has requested all new accounts\r\n									to be activated by the users who created them thus your account\r\n									is currently inactive. To activate your account,\r\n									please visit the link below and enter the following:\r\n								<br><br>\r\n								<span style=\'color:#846add;\'>Activate Information:</span><br><br>\r\n								<span>\r\n								Token: [TOKEN]\r\n								<br>\r\n								Email: [EMAIL]\r\n								<br><br>\r\n								&lt;a href=&quot;[URL]/activate.php&quot;&gt;Click here to activate tour account&lt;/a&gt;\r\n								</span>\r\n								<br><br><br>\r\n								Thanks,<br>\r\n								[SITE_NAME] Team,<br>\r\n								&lt;a href=&quot;[URL]&quot;&gt;[URL]&lt;/a&gt;&lt;/em&gt;&lt;/td&gt;\r\n							</td>\r\n						</tr>\r\n						<tr height=\'50\'></tr>\r\n						<tr>\r\n							<td style=\'margin:40px 0; line-height: 22px; font-family: Montserrat, Arial, sans serif; font-size: 12px; font-weight:400; word-break: break-word; color:#333; padding-top: 10px; border-top: 1px solid #e2e2e2;\'>\r\n								To reply to this message you can simply reply this email.\r\n							</td>\r\n						</tr>\r\n					</table>\r\n				</td>\r\n			</tr>\r\n		</table> \r\n	</table>\r\n</body>\r\n</html>'),
(2, 'Forgot Password Email', 'Password Reset', 'This template is used for retrieving lost user password', '<!doctype html>\r\n<html>\r\n\r\n<head>\r\n<link href=\'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600\' rel=\'stylesheet\' type=\'text/css\'>\r\n</head>\r\n\r\n<body style=\'margin: 0; padding: 20px; font-family: Montserrat, Arial, sans serif; font-size: 12px;font-weight:400;word-break: break-word;color:#555;line-height: 18px;\'>\r\n	<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n		<table align=\'center\' border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\' style=\'max-width:500px; margin:40px auto;border-collapse: collapse;border-radius: 2px;overflow: hidden;\'> \r\n\r\n			<tr bgcolor=\'#f62d51\' height=\'5px\'>\r\n				<td align=\'center\' style=\'font-family: Montserrat, Arial, sans serif; color: #fff;text-transform: uppercase;font-size: 20px;justify-content: center;align-items: center;letter-spacing: 4px;font-weight: 600;\'>\r\n				</td>\r\n			</tr>\r\n			<tr bgcolor=\'#f9f9f9\'>\r\n				<td style=\'padding:40px;\'>\r\n					<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n						<tr><td><img src=\"[URL]/uploads/logo.png\" class=\"logo\"/></td></tr>\r\n						<br><br><br>\r\n						<tr>\r\n							<td style=\'font-family: Montserrat, Arial, sans serif; margin:0; color:#846add; font-size:20px; font-weight:400;\'>\r\n							Hi!\r\n							</td>\r\n						</tr>\r\n						<td style=\'font-family: Montserrat, Arial, sans serif; margin:5px 0 0; font-size: 12px; font-weight:400;word-break: break-word;color:#333;line-height: 22px; position: relative; top: 10px;\'>\r\n							&lt;strong&gt;[USERNAME]&lt;/strong&gt;\r\n						</td>\r\n						<tr height=\'30\'></tr>\r\n						<tr>\r\n							<td style=\"margin: 40px 0;line-height: 22px; font-family: \'Montserrat\', Arial, sans serif; font-size: 12px;font-weight:100; word-break: break-word; color:#333;\">\r\n								You&#039;re now a member of [SITE_NAME].\r\n								<br>\r\n								It seems that you or someone requested a new password for you.\r\n								We have generated a new password, as requested:\r\n								<br><br>\r\n								Your new password: <b>[PASSWORD]</b>\r\n								<br><br>\r\n								To use the new password you need to activate it. To do this click the link provided below and login with your new password.\r\n								<br><br>\r\n								&lt;a href=&quot;[LINK]&quot;&gt;[LINK]&lt;/a&gt;&lt;br /&gt;\r\n								<br><br>\r\n								You can change your password after you sign in.&lt;hr /&gt;\r\n								Password requested from IP: [IP]&lt;/td&gt;\r\n								<br><br><br>\r\n								Thanks,<br>\r\n								[SITE_NAME] Team,<br>\r\n								&lt;a href=&quot;[URL]&quot;&gt;[URL]&lt;/a&gt;&lt;/em&gt;&lt;/td&gt;\r\n							</td>\r\n						</tr>\r\n						<tr height=\'50\'></tr>\r\n						<tr>\r\n							<td style=\'margin:40px 0; line-height: 22px; font-family: Montserrat, Arial, sans serif; font-size: 12px; font-weight:400; word-break: break-word; color:#333; padding-top: 10px; border-top: 1px solid #e2e2e2;\'>\r\n								To reply to this message you can simply reply this email.\r\n							</td>\r\n						</tr>\r\n					</table>\r\n				</td>\r\n			</tr>\r\n		</table> \r\n	</table>\r\n</body>\r\n</html>'),
(3, 'Welcome Mail From Admin', 'You have been registered', 'This template is used to send welcome email, when user is added by administrator', '											&lt;!doctype html&gt;\n&lt;html&gt;\n\n&lt;head&gt;\n&lt;link href=&#039;https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600&#039; rel=&#039;stylesheet&#039; type=&#039;text/css&#039;&gt;\n&lt;/head&gt;\n\n&lt;body style=&#039;margin: 0; padding: 20px; font-family: Montserrat, Arial, sans serif; font-size: 12px;font-weight:400;word-break: break-word;color:#555;line-height: 18px;&#039;&gt;\n	&lt;table border=&#039;0&#039; cellpadding=&#039;0&#039; cellspacing=&#039;0&#039; width=&#039;100%&#039;&gt;\n		&lt;table align=&#039;center&#039; border=&#039;0&#039; cellpadding=&#039;0&#039; cellspacing=&#039;0&#039; width=&#039;100%&#039; style=&#039;max-width:500px; margin:40px auto;border-collapse: collapse;border-radius: 2px;overflow: hidden;&#039;&gt; \n\n			&lt;tr bgcolor=&#039;#f62d51&#039; height=&#039;5px&#039;&gt;\n				&lt;td align=&#039;center&#039; style=&#039;font-family: Montserrat, Arial, sans serif; color: #fff;text-transform: uppercase;font-size: 20px;justify-content: center;align-items: center;letter-spacing: 4px;font-weight: 600;&#039;&gt;\n				&lt;/td&gt;\n			&lt;/tr&gt;\n			&lt;tr bgcolor=&#039;#f9f9f9&#039;&gt;\n				&lt;td style=&#039;padding:40px;&#039;&gt;\n					&lt;table border=&#039;0&#039; cellpadding=&#039;0&#039; cellspacing=&#039;0&#039; width=&#039;100%&#039;&gt;\n						&lt;tr&gt;&lt;td&gt;&lt;img src=&quot;[URL]/uploads/logo.png&quot; class=&quot;logo&quot;/&gt;&lt;/td&gt;&lt;/tr&gt;\n						&lt;br&gt;&lt;br&gt;\n						&lt;tr height=&#039;30&#039;&gt;&lt;/tr&gt;\n						&lt;tr&gt;\n							&lt;td style=&#039;font-family: Montserrat, Arial, sans serif; margin:0; color:#846add; font-size:17px; font-weight:400;&#039;&gt;\n							Hi! [NAME]!, Welcome You have been Registered\n							&lt;/td&gt;\n						&lt;/tr&gt;\n						&lt;tr height=&#039;15&#039;&gt;&lt;/tr&gt;\n						&lt;td style=&#039;font-family: Montserrat, Arial, sans serif; margin:5px 0 0; font-size: 12px; font-weight:400;word-break: break-word;color:#333;line-height: 22px; position: relative; top: 10px;&#039;&gt;\n							You&#039;re now a member of [SITE_NAME].\n						&lt;/td&gt;\n						&lt;tr height=&#039;30&#039;&gt;&lt;/tr&gt;\n						&lt;tr&gt;\n							&lt;td style=&quot;margin: 40px 0;line-height: 22px; font-family: &#039;Montserrat&#039;, Arial, sans serif; font-size: 12px;font-weight:100; word-break: break-word; color:#333;&quot;&gt;\n								Here are your login details. Please keep them in a safe place:\n								&lt;br&gt;&lt;br&gt;\n								Username: &lt;b&gt;[USERNAME]&lt;/b&gt;\n								&lt;br&gt;\n								Password: &lt;b&gt;[PASSWORD]&lt;/b&gt;								\n								&lt;br&gt;&lt;br&gt;&lt;br&gt;\n								Thanks,&lt;br&gt;\n								[SITE_NAME] Team,&lt;br&gt;\n								&lt;a href=&quot;[URL]&quot;&gt;[URL]&lt;/a&gt;&lt;/em&gt;&lt;/td&gt;\n							&lt;/td&gt;\n						&lt;/tr&gt;\n						&lt;tr height=&#039;50&#039;&gt;&lt;/tr&gt;\n						&lt;tr&gt;\n							&lt;td style=&#039;margin:40px 0; line-height: 22px; font-family: Montserrat, Arial, sans serif; font-size: 12px; font-weight:400; word-break: break-word; color:#333; padding-top: 10px; border-top: 1px solid #e2e2e2;&#039;&gt;\n								To reply to this message you can simply reply this email.\n							&lt;/td&gt;\n						&lt;/tr&gt;\n					&lt;/table&gt;\n				&lt;/td&gt;\n			&lt;/tr&gt;\n		&lt;/table&gt; \n	&lt;/table&gt;\n&lt;/body&gt;\n&lt;/html&gt;										'),
(4, 'Default Newsletter', 'Newsletter', 'This is a default newsletter template', '<!doctype html>\r\n<html>\r\n\r\n<head>\r\n<link href=\'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600\' rel=\'stylesheet\' type=\'text/css\'>\r\n</head>\r\n\r\n<body style=\'margin: 0; padding: 20px; font-family: Montserrat, Arial, sans serif; font-size: 12px;font-weight:400;word-break: break-word;color:#555;line-height: 18px;\'>\r\n	<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n		<table align=\'center\' border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\' style=\'max-width:500px; margin:40px auto;border-collapse: collapse;border-radius: 2px;overflow: hidden;\'> \r\n\r\n			<tr bgcolor=\'#f62d51\' height=\'5px\'>\r\n				<td align=\'center\' style=\'font-family: Montserrat, Arial, sans serif; color: #fff;text-transform: uppercase;font-size: 20px;justify-content: center;align-items: center;letter-spacing: 4px;font-weight: 600;\'>\r\n				</td>\r\n			</tr>\r\n			<tr bgcolor=\'#f9f9f9\'>\r\n				<td style=\'padding:40px;\'>\r\n					<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n						<tr><td><img src=\"[URL]/uploads/logo.png\" class=\"logo\"/></td></tr>\r\n						<br><br><br>\r\n						<tr height=\'15\'></tr>\r\n						<tr>\r\n							<td style=\'font-family: Montserrat, Arial, sans serif; margin:0; color:#846add; font-size:20px; font-weight:400;\'>\r\n							Hi! [NAME]!\r\n							</td>\r\n						</tr>\r\n						<tr height=\'30\'></tr>\r\n						<tr>\r\n							<td style=\"margin: 40px 0;line-height: 22px; font-family: \'Montserrat\', Arial, sans serif; font-size: 12px;font-weight:100; word-break: break-word; color:#333;\">\r\n								You&#039;re now a member of [SITE_NAME].								\r\n								<br><br>\r\n									You are receiving this email as a part of your newsletter subscription.\r\n									&lt;hr&gt;\r\n									Here goes your newsletter content\r\n									&lt;hr&gt;\r\n								<br><br><br>\r\n								Thanks,<br>\r\n								[SITE_NAME] Team,<br>\r\n								&lt;a href=&quot;[URL]&quot;&gt;[URL]&lt;/a&gt;&lt;/em&gt;&lt;/td&gt;\r\n							</td>\r\n						</tr>\r\n						<tr height=\'50\'></tr>\r\n						<tr>\r\n							<td style=\'margin:40px 0; line-height: 22px; font-family: Montserrat, Arial, sans serif; font-size: 12px; font-weight:400; word-break: break-word; color:#333; padding-top: 10px; border-top: 1px solid #e2e2e2;\'>\r\n								&lt;span style=&quot;font-size: 11px;&quot;&gt;&lt;em&gt;To stop receiving future newsletters please login into your account         and uncheck newsletter subscription box.&lt;/em&gt;&lt;/span&gt;\r\n								<br><br>\r\n								To reply to this message you can simply reply this email.\r\n							</td>\r\n						</tr>\r\n					</table>\r\n				</td>\r\n			</tr>\r\n		</table> \r\n	</table>\r\n</body>\r\n</html>'),
(7, 'Welcome Email', 'Welcome', 'This template is used to welcome newly registered user when Configuration-&gt;Registration Verification and Configuration-&gt;Auto Registration are both set to YES', '<!doctype html>\r\n<html>\r\n\r\n<head>\r\n<link href=\'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600\' rel=\'stylesheet\' type=\'text/css\'>\r\n</head>\r\n\r\n<body style=\'margin: 0; padding: 20px; font-family: Montserrat, Arial, sans serif; font-size: 12px;font-weight:400;word-break: break-word;color:#555;line-height: 18px;\'>\r\n	<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n		<table align=\'center\' border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\' style=\'max-width:500px; margin:40px auto;border-collapse: collapse;border-radius: 2px;overflow: hidden;\'> \r\n\r\n			<tr bgcolor=\'#f62d51\' height=\'5px\'>\r\n				<td align=\'center\' style=\'font-family: Montserrat, Arial, sans serif; color: #fff;text-transform: uppercase;font-size: 20px;justify-content: center;align-items: center;letter-spacing: 4px;font-weight: 600;\'>\r\n				</td>\r\n			</tr>\r\n			<tr bgcolor=\'#f9f9f9\'>\r\n				<td style=\'padding:40px;\'>\r\n					<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n						<tr><td><img src=\"[URL]/uploads/logo.png\" class=\"logo\"/></td></tr>\r\n						<br><br><br>\r\n						<tr height=\'15\'></tr>\r\n						<tr>\r\n							<td style=\'font-family: Montserrat, Arial, sans serif; margin:0; color:#846add; font-size:20px; font-weight:400;\'>\r\n							Hi!\r\n							</td>\r\n						</tr>\r\n						<td style=\'font-family: Montserrat, Arial, sans serif; margin:5px 0 0; font-size: 12px; font-weight:400;word-break: break-word;color:#333;line-height: 22px; position: relative; top: 10px;\'>\r\n							Welcome [NAME]! Thanks for registering.\r\n						</td>\r\n						<tr height=\'30\'></tr>\r\n						<tr>\r\n							<td style=\"margin: 40px 0;line-height: 22px; font-family: \'Montserrat\', Arial, sans serif; font-size: 12px;font-weight:100; word-break: break-word; color:#333;\">\r\n								You&#039;re now a member of [SITE_NAME].\r\n								<br>\r\n								Here are your login details. Please keep them in a safe place:\r\n								<br><br>\r\n								Username: <b>[USERNAME]</b>\r\n								<br>\r\n								Password: <b>[PASSWORD]</b>\r\n								<br><br><br>\r\n								Thanks,<br>\r\n								[SITE_NAME] Team,<br>\r\n								&lt;a href=&quot;[URL]&quot;&gt;[URL]&lt;/a&gt;&lt;/em&gt;&lt;/td&gt;\r\n							</td>\r\n						</tr>\r\n						<tr height=\'50\'></tr>\r\n						<tr>\r\n							<td style=\'margin:40px 0; line-height: 22px; font-family: Montserrat, Arial, sans serif; font-size: 12px; font-weight:400; word-break: break-word; color:#333; padding-top: 10px; border-top: 1px solid #e2e2e2;\'>\r\n								To reply to this message you can simply reply this email.\r\n							</td>\r\n						</tr>\r\n					</table>\r\n				</td>\r\n			</tr>\r\n		</table> \r\n	</table>\r\n</body>\r\n</html>'),
(10, 'Contact Request', 'Contact Inquiry', 'This template is used to send default Contact Request Form', '<!doctype html>\r\n<html>\r\n\r\n<head>\r\n<link href=\'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600\' rel=\'stylesheet\' type=\'text/css\'>\r\n</head>\r\n\r\n<body style=\'margin: 0; padding: 20px; font-family: Montserrat, Arial, sans serif; font-size: 12px;font-weight:400;word-break: break-word;color:#555;line-height: 18px;\'>\r\n	<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n		<table align=\'center\' border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\' style=\'max-width:500px; margin:40px auto;border-collapse: collapse;border-radius: 2px;overflow: hidden;\'> \r\n\r\n			<tr bgcolor=\'#f62d51\' height=\'5px\'>\r\n				<td align=\'center\' style=\'font-family: Montserrat, Arial, sans serif; color: #fff;text-transform: uppercase;font-size: 20px;justify-content: center;align-items: center;letter-spacing: 4px;font-weight: 600;\'>\r\n\r\n				</td>\r\n			</tr>\r\n			<tr bgcolor=\'#f9f9f9\'>\r\n				<td style=\'padding:40px;\'>\r\n					<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n						<tr><td><img src=\"[URL]/uploads/logo.png\" class=\"logo\"/></td></tr>\r\n						<br><br><br>\r\n						<tr height=\'15\'></tr>\r\n						<tr>\r\n							<td style=\'font-family: Montserrat, Arial, sans serif; margin:0; color:#846add; font-size:20px; font-weight:400;\'>\r\n							Hello Admin\r\n							</td>\r\n						</tr>\r\n						<tr height=\'30\'></tr>\r\n						<tr>\r\n							<td style=\"margin: 40px 0;line-height: 22px; font-family: \'Montserrat\', Arial, sans serif; font-size: 12px;font-weight:100; word-break: break-word; color:#333;\">\r\n								<br><br>\r\n									You have a new contact request:         \r\n									&lt;hr /&gt;\r\n									[MESSAGE]         \r\n									&lt;hr /&gt;\r\n								<br><br>\r\n								<span style=\'color:#846add;\'>Information:</span><br><br>\r\n								<span>\r\n								From: &lt;strong&gt;[SENDER] - [NAME]&lt;/strong&gt;&lt;br /&gt;\r\n								Subject: &lt;strong&gt;[MAILSUBJECT]&lt;/strong&gt;&lt;br /&gt;\r\n								Senders IP: &lt;strong&gt;[IP]&lt;/strong&gt;\r\n								</span>\r\n							</td>\r\n						</tr>\r\n						<tr height=\'50\'></tr>\r\n						<tr>\r\n							<td style=\'margin:40px 0; line-height: 22px; font-family: Montserrat, Arial, sans serif; font-size: 12px; font-weight:400; word-break: break-word; color:#333; padding-top: 10px; border-top: 1px solid #e2e2e2;\'>\r\n								To reply to this message you can simply reply this email.\r\n							</td>\r\n						</tr>\r\n					</table>\r\n				</td>\r\n			</tr>\r\n		</table> \r\n	</table>\r\n</body>\r\n</html>'),
(12, 'Single Email', 'Single User Email', 'This template is used to email single user', '<!doctype html>\r\n<html>\r\n\r\n<head>\r\n<link href=\'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600\' rel=\'stylesheet\' type=\'text/css\'>\r\n</head>\r\n\r\n<body style=\'margin: 0; padding: 20px; font-family: Montserrat, Arial, sans serif; font-size: 12px;font-weight:400;word-break: break-word;color:#555;line-height: 18px;\'>\r\n	<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n		<table align=\'center\' border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\' style=\'max-width:500px; margin:40px auto;border-collapse: collapse;border-radius: 2px;overflow: hidden;\'> \r\n\r\n			<tr bgcolor=\'#f62d51\' height=\'5px\'>\r\n				<td align=\'center\' style=\'font-family: Montserrat, Arial, sans serif; color: #fff;text-transform: uppercase;font-size: 20px;justify-content: center;align-items: center;letter-spacing: 4px;font-weight: 600;\'>\r\n\r\n				</td>\r\n			</tr>\r\n			<tr bgcolor=\'#f9f9f9\'>\r\n				<td style=\'padding:40px;\'>\r\n					<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n						<tr><td><img src=\"[URL]/uploads/logo.png\" class=\"logo\"/></td></tr>\r\n						<br><br><br>\r\n						<tr height=\'15\'></tr>\r\n						<tr>\r\n							<td style=\'font-family: Montserrat, Arial, sans serif; margin:0; color:#846add; font-size:20px; font-weight:400;\'>\r\n							Hello [NAME]\r\n							</td>\r\n						</tr>\r\n						<tr height=\'30\'></tr>\r\n						<tr>\r\n							<td style=\"margin: 40px 0;line-height: 22px; font-family: \'Montserrat\', Arial, sans serif; font-size: 12px;font-weight:100; word-break: break-word; color:#333;\">\r\n								<br><br>\r\n									Your message goes here...         \r\n									\r\n								<br><br>\r\n								<span style=\'color:#846add;\'>Thanks,</span><br><br>\r\n								<span>\r\n								[SITE_NAME] Team\r\n								</span>\r\n							</td>\r\n						</tr>\r\n						<tr height=\'50\'></tr>\r\n						<tr>\r\n							<td style=\'margin:40px 0; line-height: 22px; font-family: Montserrat, Arial, sans serif; font-size: 12px; font-weight:400; word-break: break-word; color:#333; padding-top: 10px; border-top: 1px solid #e2e2e2;\'>\r\n								To reply to this message you can simply reply this email.\r\n							</td>\r\n						</tr>\r\n					</table>\r\n				</td>\r\n			</tr>\r\n		</table> \r\n	</table>\r\n</body>\r\n</html>'),
(13, 'Notify Admin', 'New User Registration', 'This template is used to notify admin of new registration when Configuration->Registration Notification is set to YES', '<!doctype html>\r\n<html>\r\n\r\n<head>\r\n<link href=\'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600\' rel=\'stylesheet\' type=\'text/css\'>\r\n</head>\r\n\r\n<body style=\'margin: 0; padding: 20px; font-family: Montserrat, Arial, sans serif; font-size: 12px;font-weight:400;word-break: break-word;color:#555;line-height: 18px;\'>\r\n	<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n		<table align=\'center\' border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\' style=\'max-width:500px; margin:40px auto;border-collapse: collapse;border-radius: 2px;overflow: hidden;\'> \r\n\r\n			<tr bgcolor=\'#6610f2\' height=\'5px\'>\r\n				<td align=\'center\' style=\'font-family: Montserrat, Arial, sans serif; color: #fff;text-transform: uppercase;font-size: 20px;justify-content: center;align-items: center;letter-spacing: 4px;font-weight: 600;\'>\r\n				</td>\r\n			</tr>\r\n			<tr bgcolor=\'#f9f9f9\'>\r\n				<td style=\'padding:40px;\'>\r\n					<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n						<tr>\r\n							<td style=\'font-family: Montserrat, Arial, sans serif; margin:0; color:#846add; font-size:20px; font-weight:400;\'>\r\n							Hello Admin!\r\n							</td>\r\n						</tr>\r\n						\r\n						<td style=\'font-family: Montserrat, Arial, sans serif; margin:5px 0 0; font-size: 12px; font-weight:400;word-break: break-word;color:#333;line-height: 22px; position: relative; top: 10px;\'>\r\n							You have a new user registration. You can login into your admin panel to view details:\r\n						</td>\r\n						<tr height=\'30\'></tr>\r\n						<tr>\r\n							<td style=\"margin: 40px 0;line-height: 22px; font-family: \'Montserrat\', Arial, sans serif; font-size: 12px;font-weight:100; word-break: break-word; color:#333;\">\r\n								Username: <b>[USERNAME]</b>\r\n								<br>\r\n								Name: <b>[NAME]</b>\r\n								<br>\r\n								IP:   <b>[IP]</b>\r\n								<br>\r\n							</td>\r\n						</tr>\r\n					</table>\r\n				</td>\r\n			</tr>\r\n		</table> \r\n	</table>\r\n</body>\r\n</html>'),
(14, 'Registration Pending', 'Registration Verification Pending', 'This template is used to send Registration Verification Email, when Configuration->Auto Registration is set to NO', '<!doctype html>\r\n<html>\r\n\r\n<head>\r\n<link href=\'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600\' rel=\'stylesheet\' type=\'text/css\'>\r\n</head>\r\n\r\n<body style=\'margin: 0; padding: 20px; font-family: Montserrat, Arial, sans serif; font-size: 12px;font-weight:400;word-break: break-word;color:#555;line-height: 18px;\'>\r\n	<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n		<table align=\'center\' border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\' style=\'max-width:500px; margin:40px auto;border-collapse: collapse;border-radius: 2px;overflow: hidden;\'> \r\n\r\n			<tr bgcolor=\'#f62d51\' height=\'5px\'>\r\n				<td align=\'center\' style=\'font-family: Montserrat, Arial, sans serif; color: #fff;text-transform: uppercase;font-size: 20px;justify-content: center;align-items: center;letter-spacing: 4px;font-weight: 600;\'>\r\n				</td>\r\n			</tr>\r\n			<tr bgcolor=\'#f9f9f9\'>\r\n				<td style=\'padding:40px;\'>\r\n					<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n						<tr><td><img src=\"[URL]/uploads/logo.png\" class=\"logo\"/></td></tr>\r\n						<br><br><br>\r\n						<tr height=\'15\'></tr>\r\n						<tr>\r\n							<td style=\'font-family: Montserrat, Arial, sans serif; margin:0; color:#846add; font-size:20px; font-weight:400;\'>\r\n							Hi!\r\n							</td>\r\n						</tr>\r\n						<td style=\'font-family: Montserrat, Arial, sans serif; margin:5px 0 0; font-size: 12px; font-weight:400;word-break: break-word;color:#333;line-height: 22px; position: relative; top: 10px;\'>\r\n							Welcome [NAME]! Thanks for registering.\r\n						</td>\r\n						<tr height=\'30\'></tr>\r\n						<tr>\r\n							<td style=\"margin: 40px 0;line-height: 22px; font-family: \'Montserrat\', Arial, sans serif; font-size: 12px;font-weight:100; word-break: break-word; color:#333;\">\r\n								You&#039;re now a member of [SITE_NAME].\r\n								<br>\r\n								Here are your login details. Please keep them in a safe place:\r\n								<br><br>\r\n								Username: &lt;strong&gt;[USERNAME]&lt;/strong&gt;&lt;br /&gt;\r\n								Password: &lt;strong&gt;[PASSWORD]&lt;/strong&gt;         &lt;hr /&gt;\r\n								The administrator of this site has requested all new accounts&lt;br /&gt;\r\n								to be activated by the users who created them thus your account&lt;br /&gt;\r\n								is currently pending verification process.\r\n								<br><br><br>\r\n								Thanks,<br>\r\n								[SITE_NAME] Team,<br>\r\n								&lt;a href=&quot;[URL]&quot;&gt;[URL]&lt;/a&gt;&lt;/em&gt;&lt;/td&gt;\r\n							</td>\r\n						</tr>\r\n						<tr height=\'50\'></tr>\r\n						<tr>\r\n							<td style=\'margin:40px 0; line-height: 22px; font-family: Montserrat, Arial, sans serif; font-size: 12px; font-weight:400; word-break: break-word; color:#333; padding-top: 10px; border-top: 1px solid #e2e2e2;\'>\r\n								To reply to this message you can simply reply this email.\r\n							</td>\r\n						</tr>\r\n					</table>\r\n				</td>\r\n			</tr>\r\n		</table> \r\n	</table>\r\n</body>\r\n</html>'),
(16, 'Notification Courier', 'sales@shipmentscript.com', 'This template is used to notify user when manual account activation is completed', '<!doctype html>\r\n<html>\r\n\r\n<head>\r\n<link href=\'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600\' rel=\'stylesheet\' type=\'text/css\'>\r\n</head>\r\n\r\n<body style=\'margin: 0; padding: 20px; font-family: Montserrat, Arial, sans serif; font-size: 12px;font-weight:400;word-break: break-word;color:#555;line-height: 18px;\'>\r\n	<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n		<table align=\'center\' border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\' style=\'max-width:500px; margin:40px auto;border-collapse: collapse;border-radius: 2px;overflow: hidden;\'> \r\n\r\n			<tr bgcolor=\'#f62d51\' height=\'5px\'>\r\n				<td align=\'center\' style=\'font-family: Montserrat, Arial, sans serif; color: #fff;text-transform: uppercase;font-size: 20px;justify-content: center;align-items: center;letter-spacing: 4px;font-weight: 600;\'>\r\n				</td>\r\n			</tr>\r\n			<tr bgcolor=\'#f9f9f9\'>\r\n				<td style=\'padding:40px;\'>\r\n					<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n						<tr><td><img src=\"[URL]/uploads/logo.png\" class=\"logo\"/></td></tr>\r\n						<br><br><br>\r\n						<tr height=\'15\'></tr>\r\n						<tr>\r\n							<td style=\'font-family: Montserrat, Arial, sans serif; margin:0; color:#846add; font-size:20px; font-weight:400;\'>\r\n							Hi!\r\n							</td>\r\n						</tr>\r\n						<td style=\'font-family: Montserrat, Arial, sans serif; margin:5px 0 0; font-size: 12px; font-weight:400;word-break: break-word;color:#333;line-height: 22px; position: relative; top: 10px;\'>\r\n							[NAME], [SNAME] Shipping a package for you!.\r\n						</td>\r\n						<tr height=\'30\'></tr>\r\n						<tr>\r\n							<td style=\"margin: 40px 0;line-height: 22px; font-family: \'Montserrat\', Arial, sans serif; font-size: 12px;font-weight:100; word-break: break-word; color:#333;\">\r\n								These are the data of your shipment [NAME].\r\n								<br><br>\r\n								# Tracking: <b>[TRACKING]</b>\r\n								<br>\r\n								Status: <b>[COURIER]</b>\r\n								<br>\r\n								Destination: <b>[DESTINATION]</b>\r\n								<br>\r\n								Address: <b>[ADDRESS]</b>\r\n								<br>\r\n								Date of shipment: <b>[DELIVERY_TIME]</b>\r\n								<br>\r\n								Shipping details: <b>[DESCRIPTION]</b>\r\n								<br><br>\r\n								<br><br>\r\n								&lt;a href=&quot;[URL]/track_shipment.php&quot;&gt;See your shipment&lt;/a&gt;\r\n								</span>\r\n								<br><br><br>\r\n								Thanks,<br>\r\n								[SITE_NAME] Team,<br>\r\n								&lt;a href=&quot;[URL]&quot;&gt;[URL]&lt;/a&gt;\r\n							</td>\r\n						</tr>\r\n						<tr height=\'50\'></tr>\r\n						<tr>\r\n							<td style=\'margin:40px 0; line-height: 22px; font-family: Montserrat, Arial, sans serif; font-size: 12px; font-weight:400; word-break: break-word; color:#333; padding-top: 10px; border-top: 1px solid #e2e2e2;\'>\r\n								To reply to this message you can simply reply this email.\r\n							</td>\r\n						</tr>\r\n					</table>\r\n				</td>\r\n			</tr>\r\n		</table> \r\n	</table>\r\n</body>\r\n</html>'),
(17, 'Account Activation', 'Your account have been activated', 'This template is used to notify user when manual account activation is completed', '<!doctype html>\r\n<html>\r\n\r\n<head>\r\n<link href=\'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600\' rel=\'stylesheet\' type=\'text/css\'>\r\n</head>\r\n\r\n<body style=\'margin: 0; padding: 20px; font-family: Montserrat, Arial, sans serif; font-size: 12px;font-weight:400;word-break: break-word;color:#555;line-height: 18px;\'>\r\n	<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n		<table align=\'center\' border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\' style=\'max-width:500px; margin:40px auto;border-collapse: collapse;border-radius: 2px;overflow: hidden;\'> \r\n\r\n			<tr bgcolor=\'#36bea6\' height=\'5px\'>\r\n				<td align=\'center\' style=\'font-family: Montserrat, Arial, sans serif; color: #fff;text-transform: uppercase;font-size: 20px;justify-content: center;align-items: center;letter-spacing: 4px;font-weight: 600;\'>\r\n				</td>\r\n			</tr>\r\n			<tr bgcolor=\'#f9f9f9\'>\r\n				<td style=\'padding:40px;\'>\r\n					<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n						<tr><td><img src=\"[URL]/uploads/logo.png\" class=\"logo\"/></td></tr>\r\n						<br><br><br>\r\n						<tr height=\'15\'></tr>\r\n						<tr>\r\n							<td style=\'font-family: Montserrat, Arial, sans serif; margin:0; color:#846add; font-size:20px; font-weight:400;\'>\r\n							Hello, [NAME]!\r\n							</td>\r\n						</tr>\r\n						<tr height=\'30\'></tr>\r\n						<tr>\r\n							<td style=\"margin: 40px 0;line-height: 22px; font-family: \'Montserrat\', Arial, sans serif; font-size: 12px;font-weight:100; word-break: break-word; color:#333;\">\r\n								You&#039;re now a member of [SITE_NAME].\r\n								<br><br>\r\n								Your account is now fully activated, and you may login at \r\n								<br><br>\r\n								&lt;a href=&quot;[URL]&quot;&gt;[URL]&lt;/a&gt;\r\n								<br><br><br>\r\n								Thanks,<br>\r\n								[SITE_NAME] Team,<br>\r\n								&lt;a href=&quot;[URL]&quot;&gt;[URL]&lt;/a&gt;&lt;/em&gt;&lt;/td&gt;\r\n							</td>\r\n						</tr>\r\n						<tr height=\'50\'></tr>\r\n						<tr>\r\n							<td style=\'margin:40px 0; line-height: 22px; font-family: Montserrat, Arial, sans serif; font-size: 12px; font-weight:400; word-break: break-word; color:#333; padding-top: 10px; border-top: 1px solid #e2e2e2;\'>\r\n								To reply to this message you can simply reply this email.\r\n							</td>\r\n						</tr>\r\n					</table>\r\n				</td>\r\n			</tr>\r\n		</table> \r\n	</table>\r\n</body>\r\n</html>'),
(18, 'Approved Courier Online', 'Your shipment has ben approved', 'This template is used to approved shipments', '<!doctype html>\r\n<html>\r\n\r\n<head>\r\n<link href=\'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600\' rel=\'stylesheet\' type=\'text/css\'>\r\n</head>\r\n\r\n<body style=\'margin: 0; padding: 20px; font-family: Montserrat, Arial, sans serif; font-size: 12px;font-weight:400;word-break: break-word;color:#555;line-height: 18px;\'>\r\n	<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n		<table align=\'center\' border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\' style=\'max-width:500px; margin:40px auto;border-collapse: collapse;border-radius: 2px;overflow: hidden;\'> \r\n\r\n			<tr bgcolor=\'#f62d51\' height=\'5px\'>\r\n				<td align=\'center\' style=\'font-family: Montserrat, Arial, sans serif; color: #fff;text-transform: uppercase;font-size: 20px;justify-content: center;align-items: center;letter-spacing: 4px;font-weight: 600;\'>\r\n				</td>\r\n			</tr>\r\n			<tr bgcolor=\'#f9f9f9\'>\r\n				<td style=\'padding:40px;\'>\r\n					<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>\r\n						<tr><td><img src=\"[URL]/uploads/logo.png\" class=\"logo\"/></td></tr>\r\n						<br><br><br>\r\n						<tr height=\'15\'></tr>\r\n						<tr>\r\n							<td style=\'font-family: Montserrat, Arial, sans serif; margin:0; color:#846add; font-size:20px; font-weight:400;\'>\r\n							Hi!\r\n							</td>\r\n						</tr>\r\n						<td style=\'font-family: Montserrat, Arial, sans serif; margin:5px 0 0; font-size: 12px; font-weight:400;word-break: break-word;color:#333;line-height: 22px; position: relative; top: 10px;\'>\r\n							[NAME], Your shipment was approved.\r\n						</td>\r\n						<tr height=\'30\'></tr>\r\n						<tr>\r\n							<td style=\"margin: 40px 0;line-height: 22px; font-family: \'Montserrat\', Arial, sans serif; font-size: 12px;font-weight:100; word-break: break-word; color:#333;\">\r\n								These are the data of your shipment [NAME].\r\n								<br><br>\r\n								# Tracking: <b>[TRACKING]</b>\r\n								<br>\r\n								Status: <b>[COURIER]</b>\r\n								<br>								\r\n								<br><br>\r\n								<br><br>\r\n								&lt;a href=&quot;[URL]/login.php&quot;&gt;log in&lt;/a&gt;\r\n								</span>\r\n								<br><br><br>\r\n								Thanks,<br>\r\n								[SITE_NAME] Team,<br>\r\n								&lt;a href=&quot;[URL]&quot;&gt;[URL]&lt;/a&gt;\r\n							</td>\r\n						</tr>\r\n						<tr height=\'50\'></tr>\r\n						<tr>\r\n							<td style=\'margin:40px 0; line-height: 22px; font-family: Montserrat, Arial, sans serif; font-size: 12px; font-weight:400; word-break: break-word; color:#333; padding-top: 10px; border-top: 1px solid #e2e2e2;\'>\r\n								To reply to this message you can simply reply this email.\r\n							</td>\r\n						</tr>\r\n					</table>\r\n				</td>\r\n			</tr>\r\n		</table> \r\n	</table>\r\n</body>\r\n</html>');

-- --------------------------------------------------------

--
-- Table structure for table `incoterm`
--

CREATE TABLE `incoterm` (
  `id` int(11) NOT NULL,
  `inco_name` varchar(200) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incoterm`
--

INSERT INTO `incoterm` (`id`, `inco_name`, `detail`) VALUES
(1, 'EXW', 'EXW - ExWorks'),
(2, 'FCA', 'FCA - Free Carrier'),
(3, 'FAS', 'FAS - Free Alongside Ship'),
(4, 'FOB', 'FOB - Free On Board'),
(5, 'CFR', 'CFR - Cost and Freight'),
(6, 'CIF', 'CIF - Cost, Insurance, Freight'),
(7, 'CIP', 'CIP - Carriage and Insurance Paid'),
(8, 'CPT', 'CPT - Carriage Paid To'),
(9, 'DAF', 'DAF - Delivered At Frontier'),
(10, 'DES', 'DES - Delivered Ex Ship'),
(11, 'DEQ', 'DEQ - Delivered Ex Quay'),
(12, 'DDU', 'DDU - Delivered Duty Unpaid'),
(13, 'DDP', 'DDP - Delivered Duty Paid'),
(14, 'DAT', 'DAT – Delivered at Terminal (named terminal at port or place of destination)'),
(15, 'DAP', 'DAP - Delivered At Place (named place of destination)');

-- --------------------------------------------------------

--
-- Table structure for table `met_payment`
--

CREATE TABLE `met_payment` (
  `id` int(11) NOT NULL,
  `met_payment` varchar(200) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `met_payment`
--

INSERT INTO `met_payment` (`id`, `met_payment`, `detail`) VALUES
(1, 'Cash', 'Cash Payment'),
(5, 'Wire Transfer', 'Payment with Wire transfer');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(55) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `author` varchar(55) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created` date NOT NULL DEFAULT '0000-00-00',
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `body`, `author`, `created`, `active`) VALUES
(6, 'Welcome to our Client Area!', '&lt;p&gt;We are pleased to announce the new release DEPRIXA PRO v3.2.6.2&lt;br&gt;&lt;/p&gt;', 'Administrator', '2019-02-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int(10) NOT NULL,
  `name_off` varchar(100) DEFAULT NULL,
  `code_off` varchar(60) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `phone_off` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `name_off`, `code_off`, `address`, `city`, `phone_off`) VALUES
(83, 'OFFICE 3', 'AG1560', 'HELICVONIASD', 'fsdfsdf', '55215'),
(78, 'OFFICE 1', 'AG1598', 'HELICONIAS', 'APARTADO', '454544'),
(82, 'OFFICE 2', 'AG1599', 'HELICVONIASD', 'APARTADO', '55215');

-- --------------------------------------------------------

--
-- Table structure for table `packaging`
--

CREATE TABLE `packaging` (
  `id` int(5) NOT NULL,
  `name_pack` varchar(120) DEFAULT NULL,
  `detail_pack` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packaging`
--

INSERT INTO `packaging` (`id`, `name_pack`, `detail_pack`) VALUES
(22, 'Kayu', 'Khusus Elektronik'),
(23, 'Karung', 'Sayuran, Buah, dll'),
(24, 'Box', 'Packing box'),
(25, 'Documet', 'Dokumen');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(50) DEFAULT NULL,
  `c_nit` varchar(30) DEFAULT NULL,
  `c_phone` varchar(30) DEFAULT NULL,
  `cell_phone` varchar(30) DEFAULT NULL,
  `c_address` varchar(60) DEFAULT NULL,
  `c_country` varchar(60) DEFAULT NULL,
  `c_city` varchar(60) DEFAULT NULL,
  `c_postal` varchar(30) DEFAULT NULL,
  `site_email` varchar(40) DEFAULT NULL,
  `interms` text,
  `signing_customer` varchar(60) DEFAULT NULL,
  `signing_company` varchar(60) DEFAULT NULL,
  `site_url` varchar(200) DEFAULT NULL,
  `reg_allowed` tinyint(1) NOT NULL DEFAULT '1',
  `user_limit` tinyint(1) NOT NULL DEFAULT '0',
  `reg_verify` tinyint(1) NOT NULL DEFAULT '0',
  `notify_admin` tinyint(1) NOT NULL DEFAULT '0',
  `auto_verify` tinyint(1) NOT NULL DEFAULT '0',
  `account_paypal` varchar(60) DEFAULT NULL,
  `client_id` varchar(250) DEFAULT NULL,
  `user_perpage` varchar(4) NOT NULL DEFAULT '10',
  `thumb_w` varchar(4) NOT NULL,
  `thumb_h` varchar(4) NOT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `favicon` varchar(50) DEFAULT NULL,
  `backup` varchar(60) DEFAULT NULL,
  `mailer` enum('PHP','SMTP') NOT NULL DEFAULT 'PHP',
  `smtp_host` varchar(100) DEFAULT NULL,
  `smtp_user` varchar(50) DEFAULT NULL,
  `smtp_pass` varchar(50) DEFAULT NULL,
  `smtp_port` varchar(6) DEFAULT NULL,
  `is_ssl` tinyint(1) NOT NULL DEFAULT '0',
  `version` varchar(5) DEFAULT NULL,
  `prefix` varchar(6) DEFAULT NULL,
  `track_digit` varchar(15) DEFAULT NULL,
  `prefix_con` varchar(6) DEFAULT NULL,
  `track_container` varchar(12) DEFAULT NULL,
  `prefix_consolidate` varchar(6) DEFAULT NULL,
  `track_consolidate` varchar(12) DEFAULT NULL,
  `tax` varchar(4) DEFAULT NULL,
  `insurance` varchar(4) DEFAULT NULL,
  `value_weight` varchar(16) DEFAULT NULL,
  `meter` varchar(16) DEFAULT NULL,
  `c_value_pound` varchar(4) DEFAULT NULL,
  `c_add_pound` varchar(4) DEFAULT NULL,
  `c_handling` varchar(4) DEFAULT NULL,
  `c_fuel` varchar(4) DEFAULT NULL,
  `c_reexpedition` varchar(4) DEFAULT NULL,
  `c_logistic` varchar(4) DEFAULT NULL,
  `c_surcharges` varchar(4) DEFAULT NULL,
  `c_safe` varchar(4) DEFAULT NULL,
  `c_nationalization` varchar(4) DEFAULT NULL,
  `c_tariffs` varchar(4) DEFAULT NULL,
  `c_vat` varchar(4) DEFAULT NULL,
  `currency` varchar(120) NOT NULL,
  `timezone` varchar(120) NOT NULL,
  `language` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `c_nit`, `c_phone`, `cell_phone`, `c_address`, `c_country`, `c_city`, `c_postal`, `site_email`, `interms`, `signing_customer`, `signing_company`, `site_url`, `reg_allowed`, `user_limit`, `reg_verify`, `notify_admin`, `auto_verify`, `account_paypal`, `client_id`, `user_perpage`, `thumb_w`, `thumb_h`, `logo`, `favicon`, `backup`, `mailer`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_port`, `is_ssl`, `version`, `prefix`, `track_digit`, `prefix_con`, `track_container`, `prefix_consolidate`, `track_consolidate`, `tax`, `insurance`, `value_weight`, `meter`, `c_value_pound`, `c_add_pound`, `c_handling`, `c_fuel`, `c_reexpedition`, `c_logistic`, `c_surcharges`, `c_safe`, `c_nationalization`, `c_tariffs`, `c_vat`, `currency`, `timezone`, `language`) VALUES
(1, 'cargoku', '08746737483726472', '0987535362362', '57865985545', 'Tasikmalaya', 'Indonesia', 'Tasikmalaya', '46155', 'husnizayn@cargoku.com', 'ACCEPTED: This invoice complies with the requirements of article 774 of the commercial code modified by law 1231 of 2008 and therefore constitutes a security title. The person who signs declares to be duly authorized by the buyer to do so. The cancellation after the due date causes default interest at the current legal maximum rate.', 'Customer Signing', 'Company Signing', 'http://localhost/Cargoku', 1, 0, 0, 1, 1, 'osorio2380@yahoo.es', 'AZh1tcwI9IuTWqKlU_YV1fPDZ0HrXtRflE87FsI_kIpTPjItBSYewsMpKQeLB-PdukPKP0Pb_pIJJKKZ', '0', '200', '200', 'logo.png', 'favicon.png', '08-Feb-2019_21-26-47.sql', 'PHP', 'n3plcpnl0258.prod.ams3.secureserver.net', 'sales@shipmentscript.com', 'xxxxxxxxx', '465', 1, '3.2.6', 'AWB', '8', 'MSCU', '8', 'COEE', '8', '19', '5', '3.25', '5000', '12', '2.75', '6', '5', '15', '2', '5', '1.5', '0.20', '10', '19', 'IDR', 'Asia/Jakarta', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_line`
--

CREATE TABLE `shipping_line` (
  `id` int(11) NOT NULL,
  `ship_line` varchar(200) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_line`
--

INSERT INTO `shipping_line` (`id`, `ship_line`, `detail`) VALUES
(1, 'Atlantic Container Line', 'Freight forwarding - Atlantic Container Line'),
(2, 'American President Lines', 'Freight forwarding - American President Lines (APL)'),
(3, 'Atlantic Ro-Ro Carriers', 'Atlantic Ro-Ro Carriers'),
(4, 'China Shipping', 'Freight forwarding - China Shipping'),
(5, 'CMA CGM', 'Freight forwarding - CMA CGM Group'),
(6, 'Evergreen Marine Corp.', 'Freight forwarding - Evergreen Marine Corp (EMC)'),
(7, 'Fesco Transportation Group', 'FESCO Transportation Group'),
(8, 'Hanjin Shipping', 'Hanjin Shipping - Container Carrier'),
(9, 'Hamburg Süd Group', 'Hamburg Süd Group - Ocean Freight'),
(10, 'Hapag Lloyd', 'Freight forwarding - Hapag-Lloyd'),
(11, 'Maersk Sealand', 'Freight forwarding - Maersk Line'),
(12, 'MSC Mediterranean Shipping Company', 'Freight forwarding - Mediterranean Shipping Company'),
(13, 'OOCL Logistics', 'OOCL Vessel &amp; Rail Tracking'),
(14, 'Safmarine', 'Safmarine Container Lines'),
(15, 'Zim Integrated Shipping Services', 'Freight forwarding - ZIM Integrated Shipping Services'),
(16, 'Wallenius Lines', 'Freight forwarding - Wallenius Logistics');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_mode`
--

CREATE TABLE `shipping_mode` (
  `id` int(11) NOT NULL,
  `ship_mode` varchar(200) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_mode`
--

INSERT INTO `shipping_mode` (`id`, `ship_mode`, `detail`) VALUES
(7, 'Langsung', 'Non Transit'),
(8, 'Transit', 'Transit');

-- --------------------------------------------------------

--
-- Table structure for table `ship_rate`
--

CREATE TABLE `ship_rate` (
  `id` int(11) NOT NULL,
  `n_courier` varchar(255) DEFAULT NULL,
  `services` varchar(120) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `rate` varchar(10) DEFAULT NULL,
  `deli_time` varchar(120) DEFAULT NULL,
  `typeweight` varchar(120) DEFAULT NULL,
  `free_ship` varchar(120) DEFAULT NULL,
  `drop_off` varchar(120) DEFAULT NULL,
  `created` datetime NOT NULL,
  `brand` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ship_rate`
--

INSERT INTO `ship_rate` (`id`, `n_courier`, `services`, `weight`, `rate`, `deli_time`, `typeweight`, `free_ship`, `drop_off`, `created`, `brand`) VALUES
(6, 'PO. Primajasa', 'PO.Primajasa', '10', '80.000', '1 Hari', '10', 'parcel', 'Free', '2020-11-20 13:48:27', '');

-- --------------------------------------------------------

--
-- Table structure for table `sms_templates`
--

CREATE TABLE `sms_templates` (
  `id` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `help` text,
  `body1` text,
  `body2` text,
  `body3` text,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_templates`
--

INSERT INTO `sms_templates` (`id`, `name`, `help`, `body1`, `body2`, `body3`, `active`) VALUES
(1, 'Shipping notification', 'This template is used to notify the destination customer of your pending shipment', 'Deprixa Pro has sent you package, shipping number #', 'date of shipment', 'Check the status of your shipment, link:', 1),
(2, 'Status update Courier', 'This template is used to notify the recipient of the status of the shipment', 'Your shipment has changed its status', 'new location', '# shipping', 1),
(3, 'Approval of the shipment', 'This template is used by the system administrator to approve managed shipments online', 'the reserved shipment on his dashboard was', 'delivery number', 'approved date', 1),
(16, 'Notification paypal payments or credit cards', 'This template is used when the client wants to pay online and the incoming payment is notified by text message to the system administrator', 'Hi Admin !, you have a payment made by PAYPAL, total amount of', 'transaction date', 'Tracking #', 1);

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE `styles` (
  `id` int(11) NOT NULL,
  `mod_style` varchar(200) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`id`, `mod_style`, `detail`, `color`) VALUES
(2, 'Diterima Di Agen', 'Sampai Agen', '#74c22b'),
(7, 'On route', 'On route for delivery (only when it is door to door)', '#ff264f'),
(8, 'Delivered', 'Delivered', '#43bd00'),
(10, 'Approved', 'Approved Booking', '#ffa6a6'),
(11, 'Pending', 'Pending', '#ff8e0d'),
(12, 'Rejected', 'Booking Online Cancelled', '#ff0505'),
(13, 'Pakt Diterima Agen', 'Diterima Agen', '#0088cc'),
(14, 'Paket Diterima Agen', 'Diterima Agen', '#0088cc'),
(15, 'Paket Transit', 'Transit', '#0088cc'),
(16, 'Paket Pending', 'Pending', '#0088cc'),
(17, 'Menunggu Loading', 'Antri Loading', '#0088cc'),
(19, 'Paket Diantar', 'Diantar', '#0088cc'),
(20, 'Akan Dikirim', 'Proses loading', '#0088cc'),
(21, 'Sedang Dikirim', 'Proses perjalanan', '#0088cc');

-- --------------------------------------------------------

--
-- Table structure for table `textsms`
--

CREATE TABLE `textsms` (
  `id` int(11) NOT NULL,
  `namesms` varchar(55) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `account_sid` varchar(120) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `auth_token` varchar(55) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `twilio_number` varchar(120) DEFAULT NULL,
  `active_twi` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `textsms`
--

INSERT INTO `textsms` (`id`, `namesms`, `account_sid`, `auth_token`, `twilio_number`, `active_twi`) VALUES
(6, 'Twilio', 'AC1357c40d3e37e016cbdf8df20106deba', '701c6008343a2fd707c8cdbbc238f845', '+13203378467', 0);

-- --------------------------------------------------------

--
-- Table structure for table `textsmsnexmo`
--

CREATE TABLE `textsmsnexmo` (
  `id` int(11) NOT NULL,
  `namesms` varchar(55) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `api_key` varchar(120) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `api_secret` varchar(55) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `nexmo_number` varchar(120) DEFAULT NULL,
  `active_nex` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `textsmsnexmo`
--

INSERT INTO `textsmsnexmo` (`id`, `namesms`, `api_key`, `api_secret`, `nexmo_number`, `active_nex`) VALUES
(6, 'Nexmo', 'bb21885b', 'XPx2bNMsOIgNGcX6', '+447449764031', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `transaction_amount` varchar(250) NOT NULL,
  `transaction_state` varchar(250) NOT NULL,
  `transaction_track` varchar(250) NOT NULL,
  `transaction_date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `cookie_id` varchar(64) NOT NULL DEFAULT '0',
  `token` varchar(128) NOT NULL DEFAULT '0',
  `userlevel` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `email` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `country` varchar(60) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal` varchar(255) DEFAULT NULL,
  `avatar` varchar(60) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastlogin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastip` varchar(16) DEFAULT NULL,
  `notes` text,
  `code_phone` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `enrollment` varchar(20) DEFAULT NULL,
  `vehiclecode` varchar(20) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `terms` varchar(120) DEFAULT NULL,
  `active` enum('y','n','b','t') NOT NULL DEFAULT 'n'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `cookie_id`, `token`, `userlevel`, `email`, `fname`, `lname`, `country`, `city`, `postal`, `avatar`, `ip`, `created`, `lastlogin`, `lastip`, `notes`, `code_phone`, `phone`, `address`, `enrollment`, `vehiclecode`, `gender`, `newsletter`, `terms`, `active`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', 9, 'site@mail.com', 'Husni', 'zayn', 'Indonesia', 'Tasikmalaya', '46155', '', '', '2020-11-20 13:32:34', '2020-11-21 06:47:49', '::1', '', '+62', '82132287324', 'Jl.Pasanggrahan', NULL, NULL, 'male', 0, NULL, 'y'),
(2, 'dadang', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', 1, 'dadang@email.com', 'dadang', 'konelo', 'Indonesia', 'Tasikmalata', '46155', '', '', '2020-11-20 13:43:49', '2020-11-20 17:07:53', '::1', NULL, '62', '082222222222', 'Tasikmalaya', NULL, NULL, NULL, 0, 'yes', 'y'),
(3, 'maman', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', 1, 'maman@gmail.com', 'maman', 'gaul', 'Indonesia', 'Jakarta Selatan', '675432', '', '', '2020-11-20 17:49:44', '2020-11-20 17:52:34', '::1', NULL, '62', '67657485', 'Mampang', NULL, NULL, '', 0, 'yes', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zone_id` int(10) NOT NULL,
  `country_code` char(2) COLLATE utf8_bin NOT NULL,
  `zone_name` varchar(35) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zone_id`, `country_code`, `zone_name`) VALUES
(1, 'AD', 'Europe/Andorra'),
(2, 'AE', 'Asia/Dubai'),
(3, 'AF', 'Asia/Kabul'),
(4, 'AG', 'America/Antigua'),
(5, 'AI', 'America/Anguilla'),
(6, 'AL', 'Europe/Tirane'),
(7, 'AM', 'Asia/Yerevan'),
(8, 'AO', 'Africa/Luanda'),
(9, 'AQ', 'Antarctica/McMurdo'),
(10, 'AQ', 'Antarctica/Casey'),
(11, 'AQ', 'Antarctica/Davis'),
(12, 'AQ', 'Antarctica/DumontDUrville'),
(13, 'AQ', 'Antarctica/Mawson'),
(14, 'AQ', 'Antarctica/Palmer'),
(15, 'AQ', 'Antarctica/Rothera'),
(16, 'AQ', 'Antarctica/Syowa'),
(17, 'AQ', 'Antarctica/Troll'),
(18, 'AQ', 'Antarctica/Vostok'),
(19, 'AR', 'America/Argentina/Buenos_Aires'),
(20, 'AR', 'America/Argentina/Cordoba'),
(21, 'AR', 'America/Argentina/Salta'),
(22, 'AR', 'America/Argentina/Jujuy'),
(23, 'AR', 'America/Argentina/Tucuman'),
(24, 'AR', 'America/Argentina/Catamarca'),
(25, 'AR', 'America/Argentina/La_Rioja'),
(26, 'AR', 'America/Argentina/San_Juan'),
(27, 'AR', 'America/Argentina/Mendoza'),
(28, 'AR', 'America/Argentina/San_Luis'),
(29, 'AR', 'America/Argentina/Rio_Gallegos'),
(30, 'AR', 'America/Argentina/Ushuaia'),
(31, 'AS', 'Pacific/Pago_Pago'),
(32, 'AT', 'Europe/Vienna'),
(33, 'AU', 'Australia/Lord_Howe'),
(34, 'AU', 'Antarctica/Macquarie'),
(35, 'AU', 'Australia/Hobart'),
(36, 'AU', 'Australia/Currie'),
(37, 'AU', 'Australia/Melbourne'),
(38, 'AU', 'Australia/Sydney'),
(39, 'AU', 'Australia/Broken_Hill'),
(40, 'AU', 'Australia/Brisbane'),
(41, 'AU', 'Australia/Lindeman'),
(42, 'AU', 'Australia/Adelaide'),
(43, 'AU', 'Australia/Darwin'),
(44, 'AU', 'Australia/Perth'),
(45, 'AU', 'Australia/Eucla'),
(46, 'AW', 'America/Aruba'),
(47, 'AX', 'Europe/Mariehamn'),
(48, 'AZ', 'Asia/Baku'),
(49, 'BA', 'Europe/Sarajevo'),
(50, 'BB', 'America/Barbados'),
(51, 'BD', 'Asia/Dhaka'),
(52, 'BE', 'Europe/Brussels'),
(53, 'BF', 'Africa/Ouagadougou'),
(54, 'BG', 'Europe/Sofia'),
(55, 'BH', 'Asia/Bahrain'),
(56, 'BI', 'Africa/Bujumbura'),
(57, 'BJ', 'Africa/Porto-Novo'),
(58, 'BL', 'America/St_Barthelemy'),
(59, 'BM', 'Atlantic/Bermuda'),
(60, 'BN', 'Asia/Brunei'),
(61, 'BO', 'America/La_Paz'),
(62, 'BQ', 'America/Kralendijk'),
(63, 'BR', 'America/Noronha'),
(64, 'BR', 'America/Belem'),
(65, 'BR', 'America/Fortaleza'),
(66, 'BR', 'America/Recife'),
(67, 'BR', 'America/Araguaina'),
(68, 'BR', 'America/Maceio'),
(69, 'BR', 'America/Bahia'),
(70, 'BR', 'America/Sao_Paulo'),
(71, 'BR', 'America/Campo_Grande'),
(72, 'BR', 'America/Cuiaba'),
(73, 'BR', 'America/Santarem'),
(74, 'BR', 'America/Porto_Velho'),
(75, 'BR', 'America/Boa_Vista'),
(76, 'BR', 'America/Manaus'),
(77, 'BR', 'America/Eirunepe'),
(78, 'BR', 'America/Rio_Branco'),
(79, 'BS', 'America/Nassau'),
(80, 'BT', 'Asia/Thimphu'),
(81, 'BW', 'Africa/Gaborone'),
(82, 'BY', 'Europe/Minsk'),
(83, 'BZ', 'America/Belize'),
(84, 'CA', 'America/St_Johns'),
(85, 'CA', 'America/Halifax'),
(86, 'CA', 'America/Glace_Bay'),
(87, 'CA', 'America/Moncton'),
(88, 'CA', 'America/Goose_Bay'),
(89, 'CA', 'America/Blanc-Sablon'),
(90, 'CA', 'America/Toronto'),
(91, 'CA', 'America/Nipigon'),
(92, 'CA', 'America/Thunder_Bay'),
(93, 'CA', 'America/Iqaluit'),
(94, 'CA', 'America/Pangnirtung'),
(95, 'CA', 'America/Atikokan'),
(96, 'CA', 'America/Winnipeg'),
(97, 'CA', 'America/Rainy_River'),
(98, 'CA', 'America/Resolute'),
(99, 'CA', 'America/Rankin_Inlet'),
(100, 'CA', 'America/Regina'),
(101, 'CA', 'America/Swift_Current'),
(102, 'CA', 'America/Edmonton'),
(103, 'CA', 'America/Cambridge_Bay'),
(104, 'CA', 'America/Yellowknife'),
(105, 'CA', 'America/Inuvik'),
(106, 'CA', 'America/Creston'),
(107, 'CA', 'America/Dawson_Creek'),
(108, 'CA', 'America/Fort_Nelson'),
(109, 'CA', 'America/Vancouver'),
(110, 'CA', 'America/Whitehorse'),
(111, 'CA', 'America/Dawson'),
(112, 'CC', 'Indian/Cocos'),
(113, 'CD', 'Africa/Kinshasa'),
(114, 'CD', 'Africa/Lubumbashi'),
(115, 'CF', 'Africa/Bangui'),
(116, 'CG', 'Africa/Brazzaville'),
(117, 'CH', 'Europe/Zurich'),
(118, 'CI', 'Africa/Abidjan'),
(119, 'CK', 'Pacific/Rarotonga'),
(120, 'CL', 'America/Santiago'),
(121, 'CL', 'America/Punta_Arenas'),
(122, 'CL', 'Pacific/Easter'),
(123, 'CM', 'Africa/Douala'),
(124, 'CN', 'Asia/Shanghai'),
(125, 'CN', 'Asia/Urumqi'),
(126, 'CO', 'America/Bogota'),
(127, 'CR', 'America/Costa_Rica'),
(128, 'CU', 'America/Havana'),
(129, 'CV', 'Atlantic/Cape_Verde'),
(130, 'CW', 'America/Curacao'),
(131, 'CX', 'Indian/Christmas'),
(132, 'CY', 'Asia/Nicosia'),
(133, 'CY', 'Asia/Famagusta'),
(134, 'CZ', 'Europe/Prague'),
(135, 'DE', 'Europe/Berlin'),
(136, 'DE', 'Europe/Busingen'),
(137, 'DJ', 'Africa/Djibouti'),
(138, 'DK', 'Europe/Copenhagen'),
(139, 'DM', 'America/Dominica'),
(140, 'DO', 'America/Santo_Domingo'),
(141, 'DZ', 'Africa/Algiers'),
(142, 'EC', 'America/Guayaquil'),
(143, 'EC', 'Pacific/Galapagos'),
(144, 'EE', 'Europe/Tallinn'),
(145, 'EG', 'Africa/Cairo'),
(146, 'EH', 'Africa/El_Aaiun'),
(147, 'ER', 'Africa/Asmara'),
(148, 'ES', 'Europe/Madrid'),
(149, 'ES', 'Africa/Ceuta'),
(150, 'ES', 'Atlantic/Canary'),
(151, 'ET', 'Africa/Addis_Ababa'),
(152, 'FI', 'Europe/Helsinki'),
(153, 'FJ', 'Pacific/Fiji'),
(154, 'FK', 'Atlantic/Stanley'),
(155, 'FM', 'Pacific/Chuuk'),
(156, 'FM', 'Pacific/Pohnpei'),
(157, 'FM', 'Pacific/Kosrae'),
(158, 'FO', 'Atlantic/Faroe'),
(159, 'FR', 'Europe/Paris'),
(160, 'GA', 'Africa/Libreville'),
(161, 'GB', 'Europe/London'),
(162, 'GD', 'America/Grenada'),
(163, 'GE', 'Asia/Tbilisi'),
(164, 'GF', 'America/Cayenne'),
(165, 'GG', 'Europe/Guernsey'),
(166, 'GH', 'Africa/Accra'),
(167, 'GI', 'Europe/Gibraltar'),
(168, 'GL', 'America/Godthab'),
(169, 'GL', 'America/Danmarkshavn'),
(170, 'GL', 'America/Scoresbysund'),
(171, 'GL', 'America/Thule'),
(172, 'GM', 'Africa/Banjul'),
(173, 'GN', 'Africa/Conakry'),
(174, 'GP', 'America/Guadeloupe'),
(175, 'GQ', 'Africa/Malabo'),
(176, 'GR', 'Europe/Athens'),
(177, 'GS', 'Atlantic/South_Georgia'),
(178, 'GT', 'America/Guatemala'),
(179, 'GU', 'Pacific/Guam'),
(180, 'GW', 'Africa/Bissau'),
(181, 'GY', 'America/Guyana'),
(182, 'HK', 'Asia/Hong_Kong'),
(183, 'HN', 'America/Tegucigalpa'),
(184, 'HR', 'Europe/Zagreb'),
(185, 'HT', 'America/Port-au-Prince'),
(186, 'HU', 'Europe/Budapest'),
(187, 'ID', 'Asia/Jakarta'),
(188, 'ID', 'Asia/Pontianak'),
(189, 'ID', 'Asia/Makassar'),
(190, 'ID', 'Asia/Jayapura'),
(191, 'IE', 'Europe/Dublin'),
(192, 'IL', 'Asia/Jerusalem'),
(193, 'IM', 'Europe/Isle_of_Man'),
(194, 'IN', 'Asia/Kolkata'),
(195, 'IO', 'Indian/Chagos'),
(196, 'IQ', 'Asia/Baghdad'),
(197, 'IR', 'Asia/Tehran'),
(198, 'IS', 'Atlantic/Reykjavik'),
(199, 'IT', 'Europe/Rome'),
(200, 'JE', 'Europe/Jersey'),
(201, 'JM', 'America/Jamaica'),
(202, 'JO', 'Asia/Amman'),
(203, 'JP', 'Asia/Tokyo'),
(204, 'KE', 'Africa/Nairobi'),
(205, 'KG', 'Asia/Bishkek'),
(206, 'KH', 'Asia/Phnom_Penh'),
(207, 'KI', 'Pacific/Tarawa'),
(208, 'KI', 'Pacific/Enderbury'),
(209, 'KI', 'Pacific/Kiritimati'),
(210, 'KM', 'Indian/Comoro'),
(211, 'KN', 'America/St_Kitts'),
(212, 'KP', 'Asia/Pyongyang'),
(213, 'KR', 'Asia/Seoul'),
(214, 'KW', 'Asia/Kuwait'),
(215, 'KY', 'America/Cayman'),
(216, 'KZ', 'Asia/Almaty'),
(217, 'KZ', 'Asia/Qyzylorda'),
(218, 'KZ', 'Asia/Aqtobe'),
(219, 'KZ', 'Asia/Aqtau'),
(220, 'KZ', 'Asia/Atyrau'),
(221, 'KZ', 'Asia/Oral'),
(222, 'LA', 'Asia/Vientiane'),
(223, 'LB', 'Asia/Beirut'),
(224, 'LC', 'America/St_Lucia'),
(225, 'LI', 'Europe/Vaduz'),
(226, 'LK', 'Asia/Colombo'),
(227, 'LR', 'Africa/Monrovia'),
(228, 'LS', 'Africa/Maseru'),
(229, 'LT', 'Europe/Vilnius'),
(230, 'LU', 'Europe/Luxembourg'),
(231, 'LV', 'Europe/Riga'),
(232, 'LY', 'Africa/Tripoli'),
(233, 'MA', 'Africa/Casablanca'),
(234, 'MC', 'Europe/Monaco'),
(235, 'MD', 'Europe/Chisinau'),
(236, 'ME', 'Europe/Podgorica'),
(237, 'MF', 'America/Marigot'),
(238, 'MG', 'Indian/Antananarivo'),
(239, 'MH', 'Pacific/Majuro'),
(240, 'MH', 'Pacific/Kwajalein'),
(241, 'MK', 'Europe/Skopje'),
(242, 'ML', 'Africa/Bamako'),
(243, 'MM', 'Asia/Yangon'),
(244, 'MN', 'Asia/Ulaanbaatar'),
(245, 'MN', 'Asia/Hovd'),
(246, 'MN', 'Asia/Choibalsan'),
(247, 'MO', 'Asia/Macau'),
(248, 'MP', 'Pacific/Saipan'),
(249, 'MQ', 'America/Martinique'),
(250, 'MR', 'Africa/Nouakchott'),
(251, 'MS', 'America/Montserrat'),
(252, 'MT', 'Europe/Malta'),
(253, 'MU', 'Indian/Mauritius'),
(254, 'MV', 'Indian/Maldives'),
(255, 'MW', 'Africa/Blantyre'),
(256, 'MX', 'America/Mexico_City'),
(257, 'MX', 'America/Cancun'),
(258, 'MX', 'America/Merida'),
(259, 'MX', 'America/Monterrey'),
(260, 'MX', 'America/Matamoros'),
(261, 'MX', 'America/Mazatlan'),
(262, 'MX', 'America/Chihuahua'),
(263, 'MX', 'America/Ojinaga'),
(264, 'MX', 'America/Hermosillo'),
(265, 'MX', 'America/Tijuana'),
(266, 'MX', 'America/Bahia_Banderas'),
(267, 'MY', 'Asia/Kuala_Lumpur'),
(268, 'MY', 'Asia/Kuching'),
(269, 'MZ', 'Africa/Maputo'),
(270, 'NA', 'Africa/Windhoek'),
(271, 'NC', 'Pacific/Noumea'),
(272, 'NE', 'Africa/Niamey'),
(273, 'NF', 'Pacific/Norfolk'),
(274, 'NG', 'Africa/Lagos'),
(275, 'NI', 'America/Managua'),
(276, 'NL', 'Europe/Amsterdam'),
(277, 'NO', 'Europe/Oslo'),
(278, 'NP', 'Asia/Kathmandu'),
(279, 'NR', 'Pacific/Nauru'),
(280, 'NU', 'Pacific/Niue'),
(281, 'NZ', 'Pacific/Auckland'),
(282, 'NZ', 'Pacific/Chatham'),
(283, 'OM', 'Asia/Muscat'),
(284, 'PA', 'America/Panama'),
(285, 'PE', 'America/Lima'),
(286, 'PF', 'Pacific/Tahiti'),
(287, 'PF', 'Pacific/Marquesas'),
(288, 'PF', 'Pacific/Gambier'),
(289, 'PG', 'Pacific/Port_Moresby'),
(290, 'PG', 'Pacific/Bougainville'),
(291, 'PH', 'Asia/Manila'),
(292, 'PK', 'Asia/Karachi'),
(293, 'PL', 'Europe/Warsaw'),
(294, 'PM', 'America/Miquelon'),
(295, 'PN', 'Pacific/Pitcairn'),
(296, 'PR', 'America/Puerto_Rico'),
(297, 'PS', 'Asia/Gaza'),
(298, 'PS', 'Asia/Hebron'),
(299, 'PT', 'Europe/Lisbon'),
(300, 'PT', 'Atlantic/Madeira'),
(301, 'PT', 'Atlantic/Azores'),
(302, 'PW', 'Pacific/Palau'),
(303, 'PY', 'America/Asuncion'),
(304, 'QA', 'Asia/Qatar'),
(305, 'RE', 'Indian/Reunion'),
(306, 'RO', 'Europe/Bucharest'),
(307, 'RS', 'Europe/Belgrade'),
(308, 'RU', 'Europe/Kaliningrad'),
(309, 'RU', 'Europe/Moscow'),
(310, 'RU', 'Europe/Simferopol'),
(311, 'RU', 'Europe/Volgograd'),
(312, 'RU', 'Europe/Kirov'),
(313, 'RU', 'Europe/Astrakhan'),
(314, 'RU', 'Europe/Saratov'),
(315, 'RU', 'Europe/Ulyanovsk'),
(316, 'RU', 'Europe/Samara'),
(317, 'RU', 'Asia/Yekaterinburg'),
(318, 'RU', 'Asia/Omsk'),
(319, 'RU', 'Asia/Novosibirsk'),
(320, 'RU', 'Asia/Barnaul'),
(321, 'RU', 'Asia/Tomsk'),
(322, 'RU', 'Asia/Novokuznetsk'),
(323, 'RU', 'Asia/Krasnoyarsk'),
(324, 'RU', 'Asia/Irkutsk'),
(325, 'RU', 'Asia/Chita'),
(326, 'RU', 'Asia/Yakutsk'),
(327, 'RU', 'Asia/Khandyga'),
(328, 'RU', 'Asia/Vladivostok'),
(329, 'RU', 'Asia/Ust-Nera'),
(330, 'RU', 'Asia/Magadan'),
(331, 'RU', 'Asia/Sakhalin'),
(332, 'RU', 'Asia/Srednekolymsk'),
(333, 'RU', 'Asia/Kamchatka'),
(334, 'RU', 'Asia/Anadyr'),
(335, 'RW', 'Africa/Kigali'),
(336, 'SA', 'Asia/Riyadh'),
(337, 'SB', 'Pacific/Guadalcanal'),
(338, 'SC', 'Indian/Mahe'),
(339, 'SD', 'Africa/Khartoum'),
(340, 'SE', 'Europe/Stockholm'),
(341, 'SG', 'Asia/Singapore'),
(342, 'SH', 'Atlantic/St_Helena'),
(343, 'SI', 'Europe/Ljubljana'),
(344, 'SJ', 'Arctic/Longyearbyen'),
(345, 'SK', 'Europe/Bratislava'),
(346, 'SL', 'Africa/Freetown'),
(347, 'SM', 'Europe/San_Marino'),
(348, 'SN', 'Africa/Dakar'),
(349, 'SO', 'Africa/Mogadishu'),
(350, 'SR', 'America/Paramaribo'),
(351, 'SS', 'Africa/Juba'),
(352, 'ST', 'Africa/Sao_Tome'),
(353, 'SV', 'America/El_Salvador'),
(354, 'SX', 'America/Lower_Princes'),
(355, 'SY', 'Asia/Damascus'),
(356, 'SZ', 'Africa/Mbabane'),
(357, 'TC', 'America/Grand_Turk'),
(358, 'TD', 'Africa/Ndjamena'),
(359, 'TF', 'Indian/Kerguelen'),
(360, 'TG', 'Africa/Lome'),
(361, 'TH', 'Asia/Bangkok'),
(362, 'TJ', 'Asia/Dushanbe'),
(363, 'TK', 'Pacific/Fakaofo'),
(364, 'TL', 'Asia/Dili'),
(365, 'TM', 'Asia/Ashgabat'),
(366, 'TN', 'Africa/Tunis'),
(367, 'TO', 'Pacific/Tongatapu'),
(368, 'TR', 'Europe/Istanbul'),
(369, 'TT', 'America/Port_of_Spain'),
(370, 'TV', 'Pacific/Funafuti'),
(371, 'TW', 'Asia/Taipei'),
(372, 'TZ', 'Africa/Dar_es_Salaam'),
(373, 'UA', 'Europe/Kiev'),
(374, 'UA', 'Europe/Uzhgorod'),
(375, 'UA', 'Europe/Zaporozhye'),
(376, 'UG', 'Africa/Kampala'),
(377, 'UM', 'Pacific/Midway'),
(378, 'UM', 'Pacific/Wake'),
(379, 'US', 'America/New_York'),
(380, 'US', 'America/Detroit'),
(381, 'US', 'America/Kentucky/Louisville'),
(382, 'US', 'America/Kentucky/Monticello'),
(383, 'US', 'America/Indiana/Indianapolis'),
(384, 'US', 'America/Indiana/Vincennes'),
(385, 'US', 'America/Indiana/Winamac'),
(386, 'US', 'America/Indiana/Marengo'),
(387, 'US', 'America/Indiana/Petersburg'),
(388, 'US', 'America/Indiana/Vevay'),
(389, 'US', 'America/Chicago'),
(390, 'US', 'America/Indiana/Tell_City'),
(391, 'US', 'America/Indiana/Knox'),
(392, 'US', 'America/Menominee'),
(393, 'US', 'America/North_Dakota/Center'),
(394, 'US', 'America/North_Dakota/New_Salem'),
(395, 'US', 'America/North_Dakota/Beulah'),
(396, 'US', 'America/Denver'),
(397, 'US', 'America/Boise'),
(398, 'US', 'America/Phoenix'),
(399, 'US', 'America/Los_Angeles'),
(400, 'US', 'America/Anchorage'),
(401, 'US', 'America/Juneau'),
(402, 'US', 'America/Sitka'),
(403, 'US', 'America/Metlakatla'),
(404, 'US', 'America/Yakutat'),
(405, 'US', 'America/Nome'),
(406, 'US', 'America/Adak'),
(407, 'US', 'Pacific/Honolulu'),
(408, 'UY', 'America/Montevideo'),
(409, 'UZ', 'Asia/Samarkand'),
(410, 'UZ', 'Asia/Tashkent'),
(411, 'VA', 'Europe/Vatican'),
(412, 'VC', 'America/St_Vincent'),
(413, 'VE', 'America/Caracas'),
(414, 'VG', 'America/Tortola'),
(415, 'VI', 'America/St_Thomas'),
(416, 'VN', 'Asia/Ho_Chi_Minh'),
(417, 'VU', 'Pacific/Efate'),
(418, 'WF', 'Pacific/Wallis'),
(419, 'WS', 'Pacific/Apia'),
(420, 'YE', 'Asia/Aden'),
(421, 'YT', 'Indian/Mayotte'),
(422, 'ZA', 'Africa/Johannesburg'),
(423, 'ZM', 'Africa/Lusaka'),
(424, 'ZW', 'Africa/Harare');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_consolidate`
--
ALTER TABLE `add_consolidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_container`
--
ALTER TABLE `add_container`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_courier`
--
ALTER TABLE `add_courier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consolidate`
--
ALTER TABLE `consolidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cons_products`
--
ALTER TABLE `cons_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cons_tmp`
--
ALTER TABLE `cons_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier_com`
--
ALTER TABLE `courier_com`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier_track`
--
ALTER TABLE `courier_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_tracking`
--
ALTER TABLE `c_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_container`
--
ALTER TABLE `detail_container`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_container_tmp`
--
ALTER TABLE `detail_container_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incoterm`
--
ALTER TABLE `incoterm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `met_payment`
--
ALTER TABLE `met_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packaging`
--
ALTER TABLE `packaging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_line`
--
ALTER TABLE `shipping_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_mode`
--
ALTER TABLE `shipping_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_rate`
--
ALTER TABLE `ship_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_templates`
--
ALTER TABLE `sms_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `textsms`
--
ALTER TABLE `textsms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `textsmsnexmo`
--
ALTER TABLE `textsmsnexmo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zone_id`),
  ADD KEY `idx_country_code` (`country_code`),
  ADD KEY `idx_zone_name` (`zone_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_consolidate`
--
ALTER TABLE `add_consolidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `add_container`
--
ALTER TABLE `add_container`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_courier`
--
ALTER TABLE `add_courier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `consolidate`
--
ALTER TABLE `consolidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cons_products`
--
ALTER TABLE `cons_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cons_tmp`
--
ALTER TABLE `cons_tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courier_com`
--
ALTER TABLE `courier_com`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `courier_track`
--
ALTER TABLE `courier_track`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `c_tracking`
--
ALTER TABLE `c_tracking`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_container`
--
ALTER TABLE `detail_container`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_container_tmp`
--
ALTER TABLE `detail_container_tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `incoterm`
--
ALTER TABLE `incoterm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `met_payment`
--
ALTER TABLE `met_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `packaging`
--
ALTER TABLE `packaging`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_line`
--
ALTER TABLE `shipping_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `shipping_mode`
--
ALTER TABLE `shipping_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ship_rate`
--
ALTER TABLE `ship_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sms_templates`
--
ALTER TABLE `sms_templates`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `textsms`
--
ALTER TABLE `textsms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `textsmsnexmo`
--
ALTER TABLE `textsmsnexmo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zone_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
