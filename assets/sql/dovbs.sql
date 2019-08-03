-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2017 at 07:30 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dovbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `vbs_aboutus`
--

CREATE TABLE `vbs_aboutus` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `meta_tag` varchar(512) NOT NULL,
  `meta_description` varchar(512) NOT NULL,
  `seo_keywords` varchar(500) NOT NULL,
  `is_bottom` enum('0','1') NOT NULL DEFAULT '0',
  `sort_order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_aboutus`
--

INSERT INTO `vbs_aboutus` (`id`, `name`, `description`, `meta_tag`, `meta_description`, `seo_keywords`, `is_bottom`, `sort_order`, `parent_id`, `status`) VALUES
(5, 'User Features', '<ul>\r\n	<li>User friendly Interface.</li>\r\n	<li>Simple registration, login process.</li>\r\n	<li>3 step booking process.</li>\r\n	<li>Google locations.</li>\r\n	<li>Route map, distance and cost calculations for given source and destination.</li>\r\n	<li>Waiting time option for return journey.</li>\r\n	<li>Bookings history.</li>\r\n	<li>Email support for booking status.</li>\r\n	<li>Profile settings.</li>\r\n	<li>Multi language support.</li>\r\n</ul>\r\n', 'Advanced Car Booking System, Vehicle Booking System, Online Vehicle Booking System, Easy Cab Booking Application, Travel Booking System, Online Travel Booking System, Taxi Dispatch System, Taxi Online Booking Application, Cabs Management Software Application, Taxi Management System, Taxi Cab Website Booking System', 'Advanced Car Booking System, Vehicle Booking System, Online Vehicle Booking System, Easy Cab Booking Application, Travel Booking System, Online Travel Booking System, Taxi Dispatch System, Taxi Online Booking Application, Cabs Management Software Application, Taxi Management System, Taxi Cab Website Booking System.', 'Advanced Car Booking System, Vehicle Booking System, Online Vehicle Booking System, Easy Cab Booking Application, Travel Booking System, Online Travel Booking System, Taxi Dispatch System, Taxi Online Booking Application, Cabs Management Software Application, Taxi Management System, Taxi Cab Website Booking System', '1', 3, 1, 'Active'),
(4, 'Executive Features', '<ul>\n	<li>Add bookings.</li>\n	<li>Bookings can be handled by just one click (Confirmation/Cancellation).</li>\n	<li>Current day bookings.</li>\n	<li>Search bookings.</li>\n	<li>Overall bookings.</li>\n	<li>Notifications for unread/new bookings.</li>\n	<li>Multi language support.</li>\n</ul>\n', 'Advanced Car Booking System, Vehicle Booking System, Online Vehicle Booking System, Easy Cab Booking Application, Travel Booking System, Online Travel Booking System, Taxi Dispatch System, Taxi Online Booking Application, Cabs Management Software Application, Taxi Management System, Taxi Cab Website Booking System', '', 'Advanced Car Booking System, Vehicle Booking System, Online Vehicle Booking System, Easy Cab Booking Application, Travel Booking System, Online Travel Booking System, Taxi Dispatch System, Taxi Online Booking Application, Cabs Management Software Application, Taxi Management System, Taxi Cab Website Booking System', '1', 2, 1, 'Active'),
(3, 'Admin Features', '<ul>\r\n	<li>Categorize vehicles.</li>\r\n	<li>Add/Delete vehicle features.</li>\r\n	<li>Add/Delete vehicle &nbsp;with available features.</li>\r\n	<li>Day/Night&nbsp; time settings.</li>\r\n	<li>Day/Night cost settings for each individual vehicle.</li>\r\n	<li>Add booking.</li>\r\n	<li>Current day bookings.</li>\r\n	<li>Overall bookings.</li>\r\n	<li>Bookings can be handled by just one click (Confirmation/Cancellation).</li>\r\n	<li>Notifications for unread/new bookings.</li>\r\n	<li>Add/Delete packages.</li>\r\n	<li>Add/Delete airports.</li>\r\n	<li>Search bookings for customer query management.</li>\r\n	<li>Chart reports for Business status.</li>\r\n	<li>Add/Delete/Block Executives/Telecallers.</li>\r\n	<li>Add/Delete/Block Users.</li>\r\n	<li>Multi theme User Interface.</li>\r\n	<li>Support for currency settings.</li>\r\n	<li>Google locations for selected country.</li>\r\n	<li>Dynamic front end pages.</li>\r\n	<li>Profile settings.</li>\r\n	<li>Testimonial settings.</li>\r\n	<li>Social network settings.</li>\r\n	<li>Email settings.</li>\r\n	<li>Paypal settings.</li>\r\n	<li>Waiting time settings.</li>\r\n	<li>FAQ&rsquo;S&nbsp;</li>\r\n	<li>Multi language support.</li>\r\n</ul>\r\n', 'Advanced Car Booking System, Vehicle Booking System, Online Vehicle Booking System, Easy Cab Booking Application, Travel Booking System, Online Travel Booking System, Taxi Dispatch System, Taxi Online Booking Application, Cabs Management Software Application, Taxi Management System, Taxi Cab Website Booking System', '', 'Advanced Car Booking System, Vehicle Booking System, Online Vehicle Booking System, Easy Cab Booking Application, Travel Booking System, Online Travel Booking System, Taxi Dispatch System, Taxi Online Booking Application, Cabs Management Software Application, Taxi Management System, Taxi Cab Website Booking System', '', 1, 1, 'Active'),
(2, 'System Features', '<ul>\r\n	<li>Easy installation.</li>\r\n	<li>Easy booking process In 3 steps.</li>\r\n	<li>SEO friendly.</li>\r\n	<li>Multi language support.</li>\r\n	<li>Multi theme support.</li>\r\n	<li>Beautifully organized dashboards for Users, Executives and Admins.</li>\r\n	<li>Easy navigation without confusions.</li>\r\n	<li>Well documented.</li>\r\n	<li>24/7 support from Digital Vidya Team.</li>\r\n	<li>Secure and valid code, where user can customize as per requirements.</li>\r\n	<li>Android IOS Mobile Apps with source code</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:18pt\">Not enough? Just drop us a feature we will happen it for you</p>\r\n', 'System Features', 'asdfasdfasd', 'Advanced Car Booking System, Vehicle Booking System, Online Vehicle Booking System, Easy Cab Booking Application, Travel Booking System, Online Travel Booking System, Taxi Dispatch System, Taxi Online Booking Application, Cabs Management Software Application, Taxi Management System, Taxi Cab Website Booking System', '1', 1, 1, 'Active'),
(1, 'Features', '', 'Pages', '', '', '', 0, 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_airports`
--

CREATE TABLE `vbs_airports` (
  `id` int(11) NOT NULL,
  `airport_name` varchar(512) NOT NULL,
  `airport_google_address` varchar(512) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_airports`
--

INSERT INTO `vbs_airports` (`id`, `airport_name`, `airport_google_address`, `status`) VALUES
(1, 'TEST', '', 'Active'),
(2, 'Shamshabad Airport', '', 'Active'),
(3, 'Begumpet Airport', '', 'Active'),
(4, 'Chennai Airport', '', 'Active'),
(5, 'Coimbatore Airport', '', 'Active'),
(6, 'Cochin Airport', '', 'Active'),
(7, 'Banglore Airport', '', 'Active'),
(8, 'Mysore Airport', '', 'Active'),
(9, 'Vizag Airport', '', 'Active'),
(10, 'Goa Airport', '', 'Active'),
(11, 'Tirupati Airport', '', 'Active'),
(12, 'Vijayawada Airport', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_assign_cars_driver`
--

CREATE TABLE `vbs_assign_cars_driver` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vbs_bookings`
--

CREATE TABLE `vbs_bookings` (
  `id` int(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_ref` varchar(512) NOT NULL,
  `pick_date` date NOT NULL,
  `pick_time` varchar(512) NOT NULL,
  `pick_point` varchar(512) NOT NULL DEFAULT '',
  `drop_point` varchar(512) NOT NULL DEFAULT '',
  `distance` float NOT NULL,
  `distance_type` varchar(512) NOT NULL DEFAULT '',
  `total_time` varchar(50) DEFAULT NULL,
  `vehicle_selected` int(11) NOT NULL,
  `cost_of_journey` float NOT NULL,
  `payment_type` enum('cash','paypal','credit card','stripe','payu') NOT NULL DEFAULT 'cash',
  `payment_received` float NOT NULL DEFAULT '0',
  `is_conformed` enum('pending','confirm','cancelled') NOT NULL DEFAULT 'pending',
  `bookdate` date NOT NULL,
  `return_journey` enum('Yes','No') DEFAULT NULL,
  `waiting_time` varchar(10) DEFAULT NULL,
  `waiting_cost` float(10,2) DEFAULT NULL,
  `registered_name` varchar(512) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(512) NOT NULL,
  `transaction_id` varchar(512) NOT NULL,
  `payer_id` varchar(512) NOT NULL,
  `payer_email` varchar(512) NOT NULL,
  `package_type` int(11) NOT NULL,
  `info_to_drivers` varchar(512) NOT NULL,
  `payer_name` varchar(512) NOT NULL,
  `is_new` int(11) NOT NULL,
  `coupon_applied` enum('Yes','No') DEFAULT NULL,
  `coupon_code` varchar(50) DEFAULT NULL,
  `coupon_discount_amount` float(10,2) DEFAULT NULL,
  `tax_applied` enum('Yes','No') DEFAULT NULL,
  `tax_amount` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_bookings`
--

INSERT INTO `vbs_bookings` (`id`, `user_id`, `booking_ref`, `pick_date`, `pick_time`, `pick_point`, `drop_point`, `distance`, `distance_type`, `total_time`, `vehicle_selected`, `cost_of_journey`, `payment_type`, `payment_received`, `is_conformed`, `bookdate`, `return_journey`, `waiting_time`, `waiting_cost`, `registered_name`, `phone`, `email`, `transaction_id`, `payer_id`, `payer_email`, `package_type`, `info_to_drivers`, `payer_name`, `is_new`, `coupon_applied`, `coupon_code`, `coupon_discount_amount`, `tax_applied`, `tax_amount`) VALUES
(1, 28, '171127121437', '1970-01-01', '12 : 14 : PM', '\"Punjagutta, Hyderabad, Telangana, India\"', '\"Ameerpet, Hyderabad, Telangana, India\"', 2.5, 'Km', '8 mins (Approx)', 1, 100, '', 0, 'pending', '2017-11-27', 'No', NULL, NULL, 'Gollapalli JohnPeter', 7569861197, 'gollapallijohnpeter@gmail.com', '', '', '', 0, '', '', 0, 'No', NULL, NULL, 'Yes', 20.00),
(2, 28, '171127162803', '1970-01-01', '04 : 28 : PM', '\"Punjagutta, Hyderabad, Telangana, India\"', '\"Begumpet, Hyderabad, Telangana, India\"', 4, 'Km', '9 mins (Approx)', 1, 100, '', 1, 'pending', '2017-11-27', 'No', NULL, NULL, 'Gollapalli JohnPeter', 7569861197, 'gollapallijohnpeter@gmail.com', 'txn_1BSk7wEJ9YFDHSWmT54N4DfT', 'cus_BqQzS2Ca6G4ZeT', 'gollapallijohnpeter@gmail.com', 0, '', '', 0, 'No', NULL, NULL, 'Yes', 20.00),
(3, 28, '171127193249', '1970-01-01', '07 : 32 : PM', '\"Begumpet, Hyderabad, Telangana, India\"', '\"Ameerpet, Hyderabad, Telangana, India\"', 3, 'Km', '9 mins (Approx)', 1, 100, 'stripe', 1, 'pending', '2017-11-27', 'No', NULL, NULL, 'Gollapalli JohnPeter', 7569861197, 'gollapallijohnpeter@gmail.com', 'txn_1BSnHEEJ9YFDHSWmzOKy5nSw', 'cus_BqUFaNAG6UyfP1', 'gollapallijohnpeter@gmail.com', 0, '', '', 0, 'No', NULL, NULL, 'Yes', 20.00),
(4, 28, '171127195410', '1970-01-01', '07 : 54 : PM', '\"Begumpet, Hyderabad, Telangana, India\"', '\"Secunderabad, Telangana, India\"', 5.1, 'Km', '13 mins (Approx)', 1, 110, 'stripe', 1, 'pending', '2017-11-27', 'No', NULL, NULL, 'Gollapalli JohnPeter', 7569861197, 'gollapallijohnpeter@gmail.com', 'txn_1BSnMPEJ9YFDHSWmelDX911p', 'cus_BqULSCUF0pIJaW', 'gollapallijohnpeter@gmail.com', 0, '', '', 0, 'No', NULL, NULL, 'Yes', 20.00),
(5, 28, '171127200854', '1970-01-01', '08 : 08 : PM', '\"Begumpet, Hyderabad, Telangana, India\"', '\"Kukatpally, Hyderabad, Telangana, India\"', 12.1, 'Km', '31 mins (Approx)', 1, 196, 'stripe', 1, 'pending', '2017-11-27', 'No', NULL, NULL, 'Gollapalli JohnPeter', 7569861197, 'gollapallijohnpeter@gmail.com', 'txn_1BSnZZEJ9YFDHSWmIGnonwOC', 'cus_BqUYQuq5L6Eo51', 'gollapallijohnpeter@gmail.com', 0, '', '', 0, 'No', NULL, NULL, 'Yes', 20.00),
(6, 28, '171129114904', '1970-01-01', '11 : 49 : AM', '\"Begumpet, Hyderabad, Telangana, India\"', '\"Ameerpet, Hyderabad, Telangana, India\"', 3, 'Km', '9 mins (Approx)', 1, 100, 'cash', 0, 'pending', '2017-11-29', 'No', NULL, NULL, 'Gollapalli JohnPeter', 7569861197, 'gollapallijohnpeter@gmail.com', '', '', '', 0, '', '', 0, 'No', NULL, NULL, 'Yes', 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `vbs_calendar|timezones`
--

CREATE TABLE `vbs_calendar|timezones` (
  `CountryCode` char(2) NOT NULL,
  `Coordinates` char(15) NOT NULL,
  `TimeZone` char(32) NOT NULL,
  `Comments` varchar(85) NOT NULL,
  `UTC offset` char(8) NOT NULL,
  `UTC DST offset` char(8) NOT NULL,
  `Notes` varchar(79) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_calendar|timezones`
--

INSERT INTO `vbs_calendar|timezones` (`CountryCode`, `Coordinates`, `TimeZone`, `Comments`, `UTC offset`, `UTC DST offset`, `Notes`) VALUES
('CI', '+0519-00402', 'Africa/Abidjan', '', '+00:00', '+00:00', ''),
('GH', '+0533-00013', 'Africa/Accra', '', '+00:00', '+00:00', ''),
('ET', '+0902+03842', 'Africa/Addis_Ababa', '', '+03:00', '+03:00', ''),
('DZ', '+3647+00303', 'Africa/Algiers', '', '+01:00', '+01:00', ''),
('ER', '+1520+03853', 'Africa/Asmara', '', '+03:00', '+03:00', ''),
('', '', 'Africa/Asmera', '', '+03:00', '+03:00', 'Link to Africa/Asmara'),
('ML', '+1239-00800', 'Africa/Bamako', '', '+00:00', '+00:00', ''),
('CF', '+0422+01835', 'Africa/Bangui', '', '+01:00', '+01:00', ''),
('GM', '+1328-01639', 'Africa/Banjul', '', '+00:00', '+00:00', ''),
('GW', '+1151-01535', 'Africa/Bissau', '', '+00:00', '+00:00', ''),
('MW', '-1547+03500', 'Africa/Blantyre', '', '+02:00', '+02:00', ''),
('CG', '-0416+01517', 'Africa/Brazzaville', '', '+01:00', '+01:00', ''),
('BI', '-0323+02922', 'Africa/Bujumbura', '', '+02:00', '+02:00', ''),
('EG', '+3003+03115', 'Africa/Cairo', '', '+02:00', '+02:00', 'DST has been canceled since 2011'),
('MA', '+3339-00735', 'Africa/Casablanca', '', '+00:00', '+01:00', ''),
('ES', '+3553-00519', 'Africa/Ceuta', 'Ceuta & Melilla', '+01:00', '+02:00', ''),
('GN', '+0931-01343', 'Africa/Conakry', '', '+00:00', '+00:00', ''),
('SN', '+1440-01726', 'Africa/Dakar', '', '+00:00', '+00:00', ''),
('TZ', '-0648+03917', 'Africa/Dar_es_Salaam', '', '+03:00', '+03:00', ''),
('DJ', '+1136+04309', 'Africa/Djibouti', '', '+03:00', '+03:00', ''),
('CM', '+0403+00942', 'Africa/Douala', '', '+01:00', '+01:00', ''),
('EH', '+2709-01312', 'Africa/El_Aaiun', '', '+00:00', '+00:00', ''),
('SL', '+0830-01315', 'Africa/Freetown', '', '+00:00', '+00:00', ''),
('BW', '-2439+02555', 'Africa/Gaborone', '', '+02:00', '+02:00', ''),
('ZW', '-1750+03103', 'Africa/Harare', '', '+02:00', '+02:00', ''),
('ZA', '-2615+02800', 'Africa/Johannesburg', '', '+02:00', '+02:00', ''),
('SS', '+0451+03136', 'Africa/Juba', '', '+03:00', '+03:00', ''),
('UG', '+0019+03225', 'Africa/Kampala', '', '+03:00', '+03:00', ''),
('SD', '+1536+03232', 'Africa/Khartoum', '', '+03:00', '+03:00', ''),
('RW', '-0157+03004', 'Africa/Kigali', '', '+02:00', '+02:00', ''),
('CD', '-0418+01518', 'Africa/Kinshasa', 'west Dem. Rep. of Congo', '+01:00', '+01:00', ''),
('NG', '+0627+00324', 'Africa/Lagos', '', '+01:00', '+01:00', ''),
('GA', '+0023+00927', 'Africa/Libreville', '', '+01:00', '+01:00', ''),
('TG', '+0608+00113', 'Africa/Lome', '', '+00:00', '+00:00', ''),
('AO', '-0848+01314', 'Africa/Luanda', '', '+01:00', '+01:00', ''),
('CD', '-1140+02728', 'Africa/Lubumbashi', 'east Dem. Rep. of Congo', '+02:00', '+02:00', ''),
('ZM', '-1525+02817', 'Africa/Lusaka', '', '+02:00', '+02:00', ''),
('GQ', '+0345+00847', 'Africa/Malabo', '', '+01:00', '+01:00', ''),
('MZ', '-2558+03235', 'Africa/Maputo', '', '+02:00', '+02:00', ''),
('LS', '-2928+02730', 'Africa/Maseru', '', '+02:00', '+02:00', ''),
('SZ', '-2618+03106', 'Africa/Mbabane', '', '+02:00', '+02:00', ''),
('SO', '+0204+04522', 'Africa/Mogadishu', '', '+03:00', '+03:00', ''),
('LR', '+0618-01047', 'Africa/Monrovia', '', '+00:00', '+00:00', ''),
('KE', '-0117+03649', 'Africa/Nairobi', '', '+03:00', '+03:00', ''),
('TD', '+1207+01503', 'Africa/Ndjamena', '', '+01:00', '+01:00', ''),
('NE', '+1331+00207', 'Africa/Niamey', '', '+01:00', '+01:00', ''),
('MR', '+1806-01557', 'Africa/Nouakchott', '', '+00:00', '+00:00', ''),
('BF', '+1222-00131', 'Africa/Ouagadougou', '', '+00:00', '+00:00', ''),
('BJ', '+0629+00237', 'Africa/Porto-Novo', '', '+01:00', '+01:00', ''),
('ST', '+0020+00644', 'Africa/Sao_Tome', '', '+00:00', '+00:00', ''),
('', '', 'Africa/Timbuktu', '', '+00:00', '+00:00', 'Link to Africa/Bamako'),
('LY', '+3254+01311', 'Africa/Tripoli', '', '+01:00', '+02:00', ''),
('TN', '+3648+01011', 'Africa/Tunis', '', '+01:00', '+01:00', ''),
('NA', '-2234+01706', 'Africa/Windhoek', '', '+01:00', '+02:00', ''),
('', '', 'AKST9AKDT', '', '−09:00', '−08:00', 'Link to America/Anchorage'),
('US', '+515248-1763929', 'America/Adak', 'Aleutian Islands', '−10:00', '−09:00', ''),
('US', '+611305-1495401', 'America/Anchorage', 'Alaska Time', '−09:00', '−08:00', ''),
('AI', '+1812-06304', 'America/Anguilla', '', '−04:00', '−04:00', ''),
('AG', '+1703-06148', 'America/Antigua', '', '−04:00', '−04:00', ''),
('BR', '-0712-04812', 'America/Araguaina', 'Tocantins', '−03:00', '−03:00', ''),
('AR', '-3436-05827', 'America/Argentina/Buenos_Aires', 'Buenos Aires (BA, CF)', '−03:00', '−03:00', ''),
('AR', '-2828-06547', 'America/Argentina/Catamarca', 'Catamarca (CT), Chubut (CH)', '−03:00', '−03:00', ''),
('', '', 'America/Argentina/ComodRivadavia', '', '−03:00', '−03:00', 'Link to America/Argentina/Catamarca'),
('AR', '-3124-06411', 'America/Argentina/Cordoba', 'most locations (CB, CC, CN, ER, FM, MN, SE, SF)', '−03:00', '−03:00', ''),
('AR', '-2411-06518', 'America/Argentina/Jujuy', 'Jujuy (JY)', '−03:00', '−03:00', ''),
('AR', '-2926-06651', 'America/Argentina/La_Rioja', 'La Rioja (LR)', '−03:00', '−03:00', ''),
('AR', '-3253-06849', 'America/Argentina/Mendoza', 'Mendoza (MZ)', '−03:00', '−03:00', ''),
('AR', '-5138-06913', 'America/Argentina/Rio_Gallegos', 'Santa Cruz (SC)', '−03:00', '−03:00', ''),
('AR', '-2447-06525', 'America/Argentina/Salta', '(SA, LP, NQ, RN)', '−03:00', '−03:00', ''),
('AR', '-3132-06831', 'America/Argentina/San_Juan', 'San Juan (SJ)', '−03:00', '−03:00', ''),
('AR', '-3319-06621', 'America/Argentina/San_Luis', 'San Luis (SL)', '−03:00', '−03:00', ''),
('AR', '-2649-06513', 'America/Argentina/Tucuman', 'Tucuman (TM)', '−03:00', '−03:00', ''),
('AR', '-5448-06818', 'America/Argentina/Ushuaia', 'Tierra del Fuego (TF)', '−03:00', '−03:00', ''),
('AW', '+1230-06958', 'America/Aruba', '', '−04:00', '−04:00', ''),
('PY', '-2516-05740', 'America/Asuncion', '', '−04:00', '−03:00', ''),
('CA', '+484531-0913718', 'America/Atikokan', 'Eastern Standard Time - Atikokan, Ontario and Southampton I, Nunavut', '−05:00', '−05:00', ''),
('', '', 'America/Atka', '', '−10:00', '−09:00', 'Link to America/Adak'),
('BR', '-1259-03831', 'America/Bahia', 'Bahia', '−03:00', '−03:00', ''),
('MX', '+2048-10515', 'America/Bahia_Banderas', 'Mexican Central Time - Bahia de Banderas', '−06:00', '−05:00', ''),
('BB', '+1306-05937', 'America/Barbados', '', '−04:00', '−04:00', ''),
('BR', '-0127-04829', 'America/Belem', 'Amapa, E Para', '−03:00', '−03:00', ''),
('BZ', '+1730-08812', 'America/Belize', '', '−06:00', '−06:00', ''),
('CA', '+5125-05707', 'America/Blanc-Sablon', 'Atlantic Standard Time - Quebec - Lower North Shore', '−04:00', '−04:00', ''),
('BR', '+0249-06040', 'America/Boa_Vista', 'Roraima', '−04:00', '−04:00', ''),
('CO', '+0436-07405', 'America/Bogota', '', '−05:00', '−05:00', ''),
('US', '+433649-1161209', 'America/Boise', 'Mountain Time - south Idaho & east Oregon', '−07:00', '−06:00', ''),
('', '', 'America/Buenos_Aires', '', '−03:00', '−03:00', 'Link to America/Argentina/Buenos_Aires'),
('CA', '+690650-1050310', 'America/Cambridge_Bay', 'Mountain Time - west Nunavut', '−07:00', '−06:00', ''),
('BR', '-2027-05437', 'America/Campo_Grande', 'Mato Grosso do Sul', '−04:00', '−03:00', ''),
('MX', '+2105-08646', 'America/Cancun', 'Central Time - Quintana Roo', '−06:00', '−05:00', ''),
('VE', '+1030-06656', 'America/Caracas', '', '−04:30', '−04:30', ''),
('', '', 'America/Catamarca', '', '−03:00', '−03:00', 'Link to America/Argentina/Catamarca'),
('GF', '+0456-05220', 'America/Cayenne', '', '−03:00', '−03:00', ''),
('KY', '+1918-08123', 'America/Cayman', '', '−05:00', '−05:00', ''),
('US', '+415100-0873900', 'America/Chicago', 'Central Time', '−06:00', '−05:00', ''),
('MX', '+2838-10605', 'America/Chihuahua', 'Mexican Mountain Time - Chihuahua away from US border', '−07:00', '−06:00', ''),
('', '', 'America/Coral_Harbour', '', '−05:00', '−05:00', 'Link to America/Atikokan'),
('', '', 'America/Cordoba', '', '−03:00', '−03:00', 'Link to America/Argentina/Cordoba'),
('CR', '+0956-08405', 'America/Costa_Rica', '', '−06:00', '−06:00', ''),
('CA', '+4906-11631', 'America/Creston', 'Mountain Standard Time - Creston, British Columbia', '−07:00', '−07:00', ''),
('BR', '-1535-05605', 'America/Cuiaba', 'Mato Grosso', '−04:00', '−03:00', ''),
('CW', '+1211-06900', 'America/Curacao', '', '−04:00', '−04:00', ''),
('GL', '+7646-01840', 'America/Danmarkshavn', 'east coast, north of Scoresbysund', '+00:00', '+00:00', ''),
('CA', '+6404-13925', 'America/Dawson', 'Pacific Time - north Yukon', '−08:00', '−07:00', ''),
('CA', '+5946-12014', 'America/Dawson_Creek', 'Mountain Standard Time - Dawson Creek & Fort Saint John, British Columbia', '−07:00', '−07:00', ''),
('US', '+394421-1045903', 'America/Denver', 'Mountain Time', '−07:00', '−06:00', ''),
('US', '+421953-0830245', 'America/Detroit', 'Eastern Time - Michigan - most locations', '−05:00', '−04:00', ''),
('DM', '+1518-06124', 'America/Dominica', '', '−04:00', '−04:00', ''),
('CA', '+5333-11328', 'America/Edmonton', 'Mountain Time - Alberta, east British Columbia & west Saskatchewan', '−07:00', '−06:00', ''),
('BR', '-0640-06952', 'America/Eirunepe', 'W Amazonas', '−04:00', '−04:00', ''),
('SV', '+1342-08912', 'America/El_Salvador', '', '−06:00', '−06:00', ''),
('', '', 'America/Ensenada', '', '−08:00', '−07:00', 'Link to America/Tijuana'),
('BR', '-0343-03830', 'America/Fortaleza', 'NE Brazil (MA, PI, CE, RN, PB)', '−03:00', '−03:00', ''),
('', '', 'America/Fort_Wayne', '', '−05:00', '−04:00', 'Link to America/Indiana/Indianapolis'),
('CA', '+4612-05957', 'America/Glace_Bay', 'Atlantic Time - Nova Scotia - places that did not observe DST 1966-1971', '−04:00', '−03:00', ''),
('GL', '+6411-05144', 'America/Godthab', 'most locations', '−03:00', '−02:00', ''),
('CA', '+5320-06025', 'America/Goose_Bay', 'Atlantic Time - Labrador - most locations', '−04:00', '−03:00', ''),
('TC', '+2128-07108', 'America/Grand_Turk', '', '−05:00', '−04:00', ''),
('GD', '+1203-06145', 'America/Grenada', '', '−04:00', '−04:00', ''),
('GP', '+1614-06132', 'America/Guadeloupe', '', '−04:00', '−04:00', ''),
('GT', '+1438-09031', 'America/Guatemala', '', '−06:00', '−06:00', ''),
('EC', '-0210-07950', 'America/Guayaquil', 'mainland', '−05:00', '−05:00', ''),
('GY', '+0648-05810', 'America/Guyana', '', '−04:00', '−04:00', ''),
('CA', '+4439-06336', 'America/Halifax', 'Atlantic Time - Nova Scotia (most places), PEI', '−04:00', '−03:00', ''),
('CU', '+2308-08222', 'America/Havana', '', '−05:00', '−04:00', ''),
('MX', '+2904-11058', 'America/Hermosillo', 'Mountain Standard Time - Sonora', '−07:00', '−07:00', ''),
('US', '+394606-0860929', 'America/Indiana/Indianapolis', 'Eastern Time - Indiana - most locations', '−05:00', '−04:00', ''),
('US', '+411745-0863730', 'America/Indiana/Knox', 'Central Time - Indiana - Starke County', '−06:00', '−05:00', ''),
('US', '+382232-0862041', 'America/Indiana/Marengo', 'Eastern Time - Indiana - Crawford County', '−05:00', '−04:00', ''),
('US', '+382931-0871643', 'America/Indiana/Petersburg', 'Eastern Time - Indiana - Pike County', '−05:00', '−04:00', ''),
('US', '+375711-0864541', 'America/Indiana/Tell_City', 'Central Time - Indiana - Perry County', '−06:00', '−05:00', ''),
('US', '+384452-0850402', 'America/Indiana/Vevay', 'Eastern Time - Indiana - Switzerland County', '−05:00', '−04:00', ''),
('US', '+384038-0873143', 'America/Indiana/Vincennes', 'Eastern Time - Indiana - Daviess, Dubois, Knox & Martin Counties', '−05:00', '−04:00', ''),
('US', '+410305-0863611', 'America/Indiana/Winamac', 'Eastern Time - Indiana - Pulaski County', '−05:00', '−04:00', ''),
('', '', 'America/Indianapolis', '', '−05:00', '−04:00', 'Link to America/Indiana/Indianapolis'),
('CA', '+682059-1334300', 'America/Inuvik', 'Mountain Time - west Northwest Territories', '−07:00', '−06:00', ''),
('CA', '+6344-06828', 'America/Iqaluit', 'Eastern Time - east Nunavut - most locations', '−05:00', '−04:00', ''),
('JM', '+1800-07648', 'America/Jamaica', '', '−05:00', '−05:00', ''),
('', '', 'America/Jujuy', '', '−03:00', '−03:00', 'Link to America/Argentina/Jujuy'),
('US', '+581807-1342511', 'America/Juneau', 'Alaska Time - Alaska panhandle', '−09:00', '−08:00', ''),
('US', '+381515-0854534', 'America/Kentucky/Louisville', 'Eastern Time - Kentucky - Louisville area', '−05:00', '−04:00', ''),
('US', '+364947-0845057', 'America/Kentucky/Monticello', 'Eastern Time - Kentucky - Wayne County', '−05:00', '−04:00', ''),
('', '', 'America/Knox_IN', '', '−06:00', '−05:00', 'Link to America/Indiana/Knox'),
('BQ', '+120903-0681636', 'America/Kralendijk', '', '−04:00', '−04:00', 'Link to America/Curacao'),
('BO', '-1630-06809', 'America/La_Paz', '', '−04:00', '−04:00', ''),
('PE', '-1203-07703', 'America/Lima', '', '−05:00', '−05:00', ''),
('US', '+340308-1181434', 'America/Los_Angeles', 'Pacific Time', '−08:00', '−07:00', ''),
('', '', 'America/Louisville', '', '−05:00', '−04:00', 'Link to America/Kentucky/Louisville'),
('SX', '+180305-0630250', 'America/Lower_Princes', '', '−04:00', '−04:00', 'Link to America/Curacao'),
('BR', '-0940-03543', 'America/Maceio', 'Alagoas, Sergipe', '−03:00', '−03:00', ''),
('NI', '+1209-08617', 'America/Managua', '', '−06:00', '−06:00', ''),
('BR', '-0308-06001', 'America/Manaus', 'E Amazonas', '−04:00', '−04:00', ''),
('MF', '+1804-06305', 'America/Marigot', '', '−04:00', '−04:00', 'Link to America/Guadeloupe'),
('MQ', '+1436-06105', 'America/Martinique', '', '−04:00', '−04:00', ''),
('MX', '+2550-09730', 'America/Matamoros', 'US Central Time - Coahuila, Durango, Nuevo León, Tamaulipas near US border', '−06:00', '−05:00', ''),
('MX', '+2313-10625', 'America/Mazatlan', 'Mountain Time - S Baja, Nayarit, Sinaloa', '−07:00', '−06:00', ''),
('', '', 'America/Mendoza', '', '−03:00', '−03:00', 'Link to America/Argentina/Mendoza'),
('US', '+450628-0873651', 'America/Menominee', 'Central Time - Michigan - Dickinson, Gogebic, Iron & Menominee Counties', '−06:00', '−05:00', ''),
('MX', '+2058-08937', 'America/Merida', 'Central Time - Campeche, Yucatán', '−06:00', '−05:00', ''),
('US', '+550737-1313435', 'America/Metlakatla', 'Metlakatla Time - Annette Island', '−08:00', '−08:00', ''),
('MX', '+1924-09909', 'America/Mexico_City', 'Central Time - most locations', '−06:00', '−05:00', ''),
('PM', '+4703-05620', 'America/Miquelon', '', '−03:00', '−02:00', ''),
('CA', '+4606-06447', 'America/Moncton', 'Atlantic Time - New Brunswick', '−04:00', '−03:00', ''),
('MX', '+2540-10019', 'America/Monterrey', 'Mexican Central Time - Coahuila, Durango, Nuevo León, Tamaulipas away from US border', '−06:00', '−05:00', ''),
('UY', '-3453-05611', 'America/Montevideo', '', '−03:00', '−02:00', ''),
('CA', '+4531-07334', 'America/Montreal', 'Eastern Time - Quebec - most locations', '−05:00', '−04:00', ''),
('MS', '+1643-06213', 'America/Montserrat', '', '−04:00', '−04:00', ''),
('BS', '+2505-07721', 'America/Nassau', '', '−05:00', '−04:00', ''),
('US', '+404251-0740023', 'America/New_York', 'Eastern Time', '−05:00', '−04:00', ''),
('CA', '+4901-08816', 'America/Nipigon', 'Eastern Time - Ontario & Quebec - places that did not observe DST 1967-1973', '−05:00', '−04:00', ''),
('US', '+643004-1652423', 'America/Nome', 'Alaska Time - west Alaska', '−09:00', '−08:00', ''),
('BR', '-0351-03225', 'America/Noronha', 'Atlantic islands', '−02:00', '−02:00', ''),
('US', '+471551-1014640', 'America/North_Dakota/Beulah', 'Central Time - North Dakota - Mercer County', '−06:00', '−05:00', ''),
('US', '+470659-1011757', 'America/North_Dakota/Center', 'Central Time - North Dakota - Oliver County', '−06:00', '−05:00', ''),
('US', '+465042-1012439', 'America/North_Dakota/New_Salem', 'Central Time - North Dakota - Morton County (except Mandan area)', '−06:00', '−05:00', ''),
('MX', '+2934-10425', 'America/Ojinaga', 'US Mountain Time - Chihuahua near US border', '−07:00', '−06:00', ''),
('PA', '+0858-07932', 'America/Panama', '', '−05:00', '−05:00', ''),
('CA', '+6608-06544', 'America/Pangnirtung', 'Eastern Time - Pangnirtung, Nunavut', '−05:00', '−04:00', ''),
('SR', '+0550-05510', 'America/Paramaribo', '', '−03:00', '−03:00', ''),
('US', '+332654-1120424', 'America/Phoenix', 'Mountain Standard Time - Arizona', '−07:00', '−07:00', ''),
('HT', '+1832-07220', 'America/Port-au-Prince', '', '−05:00', '−04:00', ''),
('', '', 'America/Porto_Acre', '', '−04:00', '−04:00', 'Link to America/Rio_Branco'),
('BR', '-0846-06354', 'America/Porto_Velho', 'Rondonia', '−04:00', '−04:00', ''),
('TT', '+1039-06131', 'America/Port_of_Spain', '', '−04:00', '−04:00', ''),
('PR', '+182806-0660622', 'America/Puerto_Rico', '', '−04:00', '−04:00', ''),
('CA', '+4843-09434', 'America/Rainy_River', 'Central Time - Rainy River & Fort Frances, Ontario', '−06:00', '−05:00', ''),
('CA', '+624900-0920459', 'America/Rankin_Inlet', 'Central Time - central Nunavut', '−06:00', '−05:00', ''),
('BR', '-0803-03454', 'America/Recife', 'Pernambuco', '−03:00', '−03:00', ''),
('CA', '+5024-10439', 'America/Regina', 'Central Standard Time - Saskatchewan - most locations', '−06:00', '−06:00', ''),
('CA', '+744144-0944945', 'America/Resolute', 'Central Standard Time - Resolute, Nunavut', '−06:00', '−05:00', ''),
('BR', '-0958-06748', 'America/Rio_Branco', 'Acre', '−04:00', '−04:00', ''),
('', '', 'America/Rosario', '', '−03:00', '−03:00', 'Link to America/Argentina/Cordoba'),
('BR', '-0226-05452', 'America/Santarem', 'W Para', '−03:00', '−03:00', ''),
('MX', '+3018-11452', 'America/Santa_Isabel', 'Mexican Pacific Time - Baja California away from US border', '−08:00', '−07:00', ''),
('CL', '-3327-07040', 'America/Santiago', 'most locations', '−04:00', '−03:00', ''),
('DO', '+1828-06954', 'America/Santo_Domingo', '', '−04:00', '−04:00', ''),
('BR', '-2332-04637', 'America/Sao_Paulo', 'S & SE Brazil (GO, DF, MG, ES, RJ, SP, PR, SC, RS)', '−03:00', '−02:00', ''),
('GL', '+7029-02158', 'America/Scoresbysund', 'Scoresbysund / Ittoqqortoormiit', '−01:00', '+00:00', ''),
('US', '+364708-1084111', 'America/Shiprock', 'Mountain Time - Navajo', '−07:00', '−06:00', 'Link to America/Denver'),
('US', '+571035-1351807', 'America/Sitka', 'Alaska Time - southeast Alaska panhandle', '−09:00', '−08:00', ''),
('BL', '+1753-06251', 'America/St_Barthelemy', '', '−04:00', '−04:00', 'Link to America/Guadeloupe'),
('CA', '+4734-05243', 'America/St_Johns', 'Newfoundland Time, including SE Labrador', '−03:30', '−02:30', ''),
('KN', '+1718-06243', 'America/St_Kitts', '', '−04:00', '−04:00', ''),
('LC', '+1401-06100', 'America/St_Lucia', '', '−04:00', '−04:00', ''),
('VI', '+1821-06456', 'America/St_Thomas', '', '−04:00', '−04:00', ''),
('VC', '+1309-06114', 'America/St_Vincent', '', '−04:00', '−04:00', ''),
('CA', '+5017-10750', 'America/Swift_Current', 'Central Standard Time - Saskatchewan - midwest', '−06:00', '−06:00', ''),
('HN', '+1406-08713', 'America/Tegucigalpa', '', '−06:00', '−06:00', ''),
('GL', '+7634-06847', 'America/Thule', 'Thule / Pituffik', '−04:00', '−03:00', ''),
('CA', '+4823-08915', 'America/Thunder_Bay', 'Eastern Time - Thunder Bay, Ontario', '−05:00', '−04:00', ''),
('MX', '+3232-11701', 'America/Tijuana', 'US Pacific Time - Baja California near US border', '−08:00', '−07:00', ''),
('CA', '+4339-07923', 'America/Toronto', 'Eastern Time - Ontario - most locations', '−05:00', '−04:00', ''),
('VG', '+1827-06437', 'America/Tortola', '', '−04:00', '−04:00', ''),
('CA', '+4916-12307', 'America/Vancouver', 'Pacific Time - west British Columbia', '−08:00', '−07:00', ''),
('', '', 'America/Virgin', '', '−04:00', '−04:00', 'Link to America/St_Thomas'),
('CA', '+6043-13503', 'America/Whitehorse', 'Pacific Time - south Yukon', '−08:00', '−07:00', ''),
('CA', '+4953-09709', 'America/Winnipeg', 'Central Time - Manitoba & west Ontario', '−06:00', '−05:00', ''),
('US', '+593249-1394338', 'America/Yakutat', 'Alaska Time - Alaska panhandle neck', '−09:00', '−08:00', ''),
('CA', '+6227-11421', 'America/Yellowknife', 'Mountain Time - central Northwest Territories', '−07:00', '−06:00', ''),
('AQ', '-6617+11031', 'Antarctica/Casey', 'Casey Station, Bailey Peninsula', '+11:00', '+08:00', ''),
('AQ', '-6835+07758', 'Antarctica/Davis', 'Davis Station, Vestfold Hills', '+05:00', '+07:00', ''),
('AQ', '-6640+14001', 'Antarctica/DumontDUrville', 'Dumont-d\'Urville Station, Terre Adelie', '+10:00', '+10:00', ''),
('AQ', '-5430+15857', 'Antarctica/Macquarie', 'Macquarie Island Station, Macquarie Island', '+11:00', '+11:00', ''),
('AQ', '-6736+06253', 'Antarctica/Mawson', 'Mawson Station, Holme Bay', '+05:00', '+05:00', ''),
('AQ', '-7750+16636', 'Antarctica/McMurdo', 'McMurdo Station, Ross Island', '+12:00', '+13:00', ''),
('AQ', '-6448-06406', 'Antarctica/Palmer', 'Palmer Station, Anvers Island', '−04:00', '−03:00', ''),
('AQ', '-6734-06808', 'Antarctica/Rothera', 'Rothera Station, Adelaide Island', '−03:00', '−03:00', ''),
('AQ', '-9000+00000', 'Antarctica/South_Pole', 'Amundsen-Scott Station, South Pole', '+12:00', '+13:00', 'Link to Antarctica/McMurdo'),
('AQ', '-690022+0393524', 'Antarctica/Syowa', 'Syowa Station, E Ongul I', '+03:00', '+03:00', ''),
('AQ', '-7824+10654', 'Antarctica/Vostok', 'Vostok Station, Lake Vostok', '+06:00', '+06:00', ''),
('SJ', '+7800+01600', 'Arctic/Longyearbyen', '', '+01:00', '+02:00', 'Link to Europe/Oslo'),
('YE', '+1245+04512', 'Asia/Aden', '', '+03:00', '+03:00', ''),
('KZ', '+4315+07657', 'Asia/Almaty', 'most locations', '+06:00', '+06:00', ''),
('JO', '+3157+03556', 'Asia/Amman', '', '+03:00', '+03:00', ''),
('RU', '+6445+17729', 'Asia/Anadyr', 'Moscow+08 - Bering Sea', '+12:00', '+12:00', ''),
('KZ', '+4431+05016', 'Asia/Aqtau', 'Atyrau (Atirau, Gur\'yev), Mangghystau (Mankistau)', '+05:00', '+05:00', ''),
('KZ', '+5017+05710', 'Asia/Aqtobe', 'Aqtobe (Aktobe)', '+05:00', '+05:00', ''),
('TM', '+3757+05823', 'Asia/Ashgabat', '', '+05:00', '+05:00', ''),
('', '', 'Asia/Ashkhabad', '', '+05:00', '+05:00', 'Link to Asia/Ashgabat'),
('IQ', '+3321+04425', 'Asia/Baghdad', '', '+03:00', '+03:00', ''),
('BH', '+2623+05035', 'Asia/Bahrain', '', '+03:00', '+03:00', ''),
('AZ', '+4023+04951', 'Asia/Baku', '', '+04:00', '+05:00', ''),
('TH', '+1345+10031', 'Asia/Bangkok', '', '+07:00', '+07:00', ''),
('LB', '+3353+03530', 'Asia/Beirut', '', '+02:00', '+03:00', ''),
('KG', '+4254+07436', 'Asia/Bishkek', '', '+06:00', '+06:00', ''),
('BN', '+0456+11455', 'Asia/Brunei', '', '+08:00', '+08:00', ''),
('', '', 'Asia/Calcutta', '', '+05:30', '+05:30', 'Link to Asia/Kolkata'),
('MN', '+4804+11430', 'Asia/Choibalsan', 'Dornod, Sukhbaatar', '+08:00', '+08:00', ''),
('CN', '+2934+10635', 'Asia/Chongqing', 'central China - Sichuan, Yunnan, Guangxi, Shaanxi, Guizhou, etc.', '+08:00', '+08:00', 'Covering historic Kansu-Szechuan time zone.'),
('', '', 'Asia/Chungking', '', '+08:00', '+08:00', 'Link to Asia/Chongqing'),
('LK', '+0656+07951', 'Asia/Colombo', '', '+05:30', '+05:30', ''),
('', '', 'Asia/Dacca', '', '+06:00', '+06:00', 'Link to Asia/Dhaka'),
('SY', '+3330+03618', 'Asia/Damascus', '', '+02:00', '+03:00', ''),
('BD', '+2343+09025', 'Asia/Dhaka', '', '+06:00', '+06:00', ''),
('TL', '-0833+12535', 'Asia/Dili', '', '+09:00', '+09:00', ''),
('AE', '+2518+05518', 'Asia/Dubai', '', '+04:00', '+04:00', ''),
('TJ', '+3835+06848', 'Asia/Dushanbe', '', '+05:00', '+05:00', ''),
('PS', '+3130+03428', 'Asia/Gaza', 'Gaza Strip', '+02:00', '+03:00', ''),
('CN', '+4545+12641', 'Asia/Harbin', 'Heilongjiang (except Mohe), Jilin', '+08:00', '+08:00', 'Covering historic Changpai time zone.'),
('PS', '+313200+0350542', 'Asia/Hebron', 'West Bank', '+02:00', '+03:00', ''),
('HK', '+2217+11409', 'Asia/Hong_Kong', '', '+08:00', '+08:00', ''),
('MN', '+4801+09139', 'Asia/Hovd', 'Bayan-Olgiy, Govi-Altai, Hovd, Uvs, Zavkhan', '+07:00', '+07:00', ''),
('VN', '+1045+10640', 'Asia/Ho_Chi_Minh', '', '+07:00', '+07:00', ''),
('RU', '+5216+10420', 'Asia/Irkutsk', 'Moscow+05 - Lake Baikal', '+09:00', '+09:00', ''),
('', '', 'Asia/Istanbul', '', '+02:00', '+03:00', 'Link to Europe/Istanbul'),
('ID', '-0610+10648', 'Asia/Jakarta', 'Java & Sumatra', '+07:00', '+07:00', ''),
('ID', '-0232+14042', 'Asia/Jayapura', 'west New Guinea (Irian Jaya) & Malukus (Moluccas)', '+09:00', '+09:00', ''),
('IL', '+3146+03514', 'Asia/Jerusalem', '', '+02:00', '+03:00', ''),
('AF', '+3431+06912', 'Asia/Kabul', '', '+04:30', '+04:30', ''),
('RU', '+5301+15839', 'Asia/Kamchatka', 'Moscow+08 - Kamchatka', '+12:00', '+12:00', ''),
('PK', '+2452+06703', 'Asia/Karachi', '', '+05:00', '+05:00', ''),
('CN', '+3929+07559', 'Asia/Kashgar', 'west Tibet & Xinjiang', '+08:00', '+08:00', 'Covering historic Kunlun time zone.'),
('NP', '+2743+08519', 'Asia/Kathmandu', '', '+05:45', '+05:45', ''),
('', '', 'Asia/Katmandu', '', '+05:45', '+05:45', 'Link to Asia/Kathmandu'),
('IN', '+2232+08822', 'Asia/Kolkata', '', '+05:30', '+05:30', 'Note: Different zones in history, see Time in India.'),
('RU', '+5601+09250', 'Asia/Krasnoyarsk', 'Moscow+04 - Yenisei River', '+08:00', '+08:00', ''),
('MY', '+0310+10142', 'Asia/Kuala_Lumpur', 'peninsular Malaysia', '+08:00', '+08:00', ''),
('MY', '+0133+11020', 'Asia/Kuching', 'Sabah & Sarawak', '+08:00', '+08:00', ''),
('KW', '+2920+04759', 'Asia/Kuwait', '', '+03:00', '+03:00', ''),
('', '', 'Asia/Macao', '', '+08:00', '+08:00', 'Link to Asia/Macau'),
('MO', '+2214+11335', 'Asia/Macau', '', '+08:00', '+08:00', ''),
('RU', '+5934+15048', 'Asia/Magadan', 'Moscow+08 - Magadan', '+12:00', '+12:00', ''),
('ID', '-0507+11924', 'Asia/Makassar', 'east & south Borneo, Sulawesi (Celebes), Bali, Nusa Tenggara, west Timor', '+08:00', '+08:00', ''),
('PH', '+1435+12100', 'Asia/Manila', '', '+08:00', '+08:00', ''),
('OM', '+2336+05835', 'Asia/Muscat', '', '+04:00', '+04:00', ''),
('CY', '+3510+03322', 'Asia/Nicosia', '', '+02:00', '+03:00', ''),
('RU', '+5345+08707', 'Asia/Novokuznetsk', 'Moscow+03 - Novokuznetsk', '+07:00', '+07:00', ''),
('RU', '+5502+08255', 'Asia/Novosibirsk', 'Moscow+03 - Novosibirsk', '+07:00', '+07:00', ''),
('RU', '+5500+07324', 'Asia/Omsk', 'Moscow+03 - west Siberia', '+07:00', '+07:00', ''),
('KZ', '+5113+05121', 'Asia/Oral', 'West Kazakhstan', '+05:00', '+05:00', ''),
('KH', '+1133+10455', 'Asia/Phnom_Penh', '', '+07:00', '+07:00', ''),
('ID', '-0002+10920', 'Asia/Pontianak', 'west & central Borneo', '+07:00', '+07:00', ''),
('KP', '+3901+12545', 'Asia/Pyongyang', '', '+09:00', '+09:00', ''),
('QA', '+2517+05132', 'Asia/Qatar', '', '+03:00', '+03:00', ''),
('KZ', '+4448+06528', 'Asia/Qyzylorda', 'Qyzylorda (Kyzylorda, Kzyl-Orda)', '+06:00', '+06:00', ''),
('MM', '+1647+09610', 'Asia/Rangoon', '', '+06:30', '+06:30', ''),
('SA', '+2438+04643', 'Asia/Riyadh', '', '+03:00', '+03:00', ''),
('', '', 'Asia/Saigon', '', '+07:00', '+07:00', 'Link to Asia/Ho_Chi_Minh'),
('RU', '+4658+14242', 'Asia/Sakhalin', 'Moscow+07 - Sakhalin Island', '+11:00', '+11:00', ''),
('UZ', '+3940+06648', 'Asia/Samarkand', 'west Uzbekistan', '+05:00', '+05:00', ''),
('KR', '+3733+12658', 'Asia/Seoul', '', '+09:00', '+09:00', ''),
('CN', '+3114+12128', 'Asia/Shanghai', 'east China - Beijing, Guangdong, Shanghai, etc.', '+08:00', '+08:00', 'Covering historic Chungyuan time zone.'),
('SG', '+0117+10351', 'Asia/Singapore', '', '+08:00', '+08:00', ''),
('TW', '+2503+12130', 'Asia/Taipei', '', '+08:00', '+08:00', ''),
('UZ', '+4120+06918', 'Asia/Tashkent', 'east Uzbekistan', '+05:00', '+05:00', ''),
('GE', '+4143+04449', 'Asia/Tbilisi', '', '+04:00', '+04:00', ''),
('IR', '+3540+05126', 'Asia/Tehran', '', '+03:30', '+04:30', ''),
('', '', 'Asia/Tel_Aviv', '', '+02:00', '+03:00', 'Link to Asia/Jerusalem'),
('', '', 'Asia/Thimbu', '', '+06:00', '+06:00', 'Link to Asia/Thimphu'),
('BT', '+2728+08939', 'Asia/Thimphu', '', '+06:00', '+06:00', ''),
('JP', '+353916+1394441', 'Asia/Tokyo', '', '+09:00', '+09:00', ''),
('', '', 'Asia/Ujung_Pandang', '', '+08:00', '+08:00', 'Link to Asia/Makassar'),
('MN', '+4755+10653', 'Asia/Ulaanbaatar', 'most locations', '+08:00', '+08:00', ''),
('', '', 'Asia/Ulan_Bator', '', '+08:00', '+08:00', 'Link to Asia/Ulaanbaatar'),
('CN', '+4348+08735', 'Asia/Urumqi', 'most of Tibet & Xinjiang', '+08:00', '+08:00', 'Covering historic Sinkiang-Tibet time zone.'),
('LA', '+1758+10236', 'Asia/Vientiane', '', '+07:00', '+07:00', ''),
('RU', '+4310+13156', 'Asia/Vladivostok', 'Moscow+07 - Amur River', '+11:00', '+11:00', ''),
('RU', '+6200+12940', 'Asia/Yakutsk', 'Moscow+06 - Lena River', '+10:00', '+10:00', ''),
('RU', '+5651+06036', 'Asia/Yekaterinburg', 'Moscow+02 - Urals', '+06:00', '+06:00', ''),
('AM', '+4011+04430', 'Asia/Yerevan', '', '+04:00', '+04:00', ''),
('PT', '+3744-02540', 'Atlantic/Azores', 'Azores', '−01:00', '+00:00', ''),
('BM', '+3217-06446', 'Atlantic/Bermuda', '', '−04:00', '−03:00', ''),
('ES', '+2806-01524', 'Atlantic/Canary', 'Canary Islands', '+00:00', '+01:00', ''),
('CV', '+1455-02331', 'Atlantic/Cape_Verde', '', '−01:00', '−01:00', ''),
('', '', 'Atlantic/Faeroe', '', '+00:00', '+01:00', 'Link to Atlantic/Faroe'),
('FO', '+6201-00646', 'Atlantic/Faroe', '', '+00:00', '+01:00', ''),
('', '', 'Atlantic/Jan_Mayen', '', '+01:00', '+02:00', 'Link to Europe/Oslo'),
('PT', '+3238-01654', 'Atlantic/Madeira', 'Madeira Islands', '+00:00', '+01:00', ''),
('IS', '+6409-02151', 'Atlantic/Reykjavik', '', '+00:00', '+00:00', ''),
('GS', '-5416-03632', 'Atlantic/South_Georgia', '', '−02:00', '−02:00', ''),
('FK', '-5142-05751', 'Atlantic/Stanley', '', '−03:00', '−03:00', ''),
('SH', '-1555-00542', 'Atlantic/St_Helena', '', '+00:00', '+00:00', ''),
('', '', 'Australia/ACT', '', '+10:00', '+11:00', 'Link to Australia/Sydney'),
('AU', '-3455+13835', 'Australia/Adelaide', 'South Australia', '+09:30', '+10:30', ''),
('AU', '-2728+15302', 'Australia/Brisbane', 'Queensland - most locations', '+10:00', '+10:00', ''),
('AU', '-3157+14127', 'Australia/Broken_Hill', 'New South Wales - Yancowinna', '+09:30', '+10:30', ''),
('', '', 'Australia/Canberra', '', '+10:00', '+11:00', 'Link to Australia/Sydney'),
('AU', '-3956+14352', 'Australia/Currie', 'Tasmania - King Island', '+10:00', '+11:00', ''),
('AU', '-1228+13050', 'Australia/Darwin', 'Northern Territory', '+09:30', '+09:30', ''),
('AU', '-3143+12852', 'Australia/Eucla', 'Western Australia - Eucla area', '+08:45', '+08:45', ''),
('AU', '-4253+14719', 'Australia/Hobart', 'Tasmania - most locations', '+10:00', '+11:00', ''),
('', '', 'Australia/LHI', '', '+10:30', '+11:00', 'Link to Australia/Lord_Howe'),
('AU', '-2016+14900', 'Australia/Lindeman', 'Queensland - Holiday Islands', '+10:00', '+10:00', ''),
('AU', '-3133+15905', 'Australia/Lord_Howe', 'Lord Howe Island', '+10:30', '+11:00', ''),
('AU', '-3749+14458', 'Australia/Melbourne', 'Victoria', '+10:00', '+11:00', ''),
('', '', 'Australia/North', '', '+09:30', '+09:30', 'Link to Australia/Darwin'),
('', '', 'Australia/NSW', '', '+10:00', '+11:00', 'Link to Australia/Sydney'),
('AU', '-3157+11551', 'Australia/Perth', 'Western Australia - most locations', '+08:00', '+08:00', ''),
('', '', 'Australia/Queensland', '', '+10:00', '+10:00', 'Link to Australia/Brisbane'),
('', '', 'Australia/South', '', '+09:30', '+10:30', 'Link to Australia/Adelaide'),
('AU', '-3352+15113', 'Australia/Sydney', 'New South Wales - most locations', '+10:00', '+11:00', ''),
('', '', 'Australia/Tasmania', '', '+10:00', '+11:00', 'Link to Australia/Hobart'),
('', '', 'Australia/Victoria', '', '+10:00', '+11:00', 'Link to Australia/Melbourne'),
('', '', 'Australia/West', '', '+08:00', '+08:00', 'Link to Australia/Perth'),
('', '', 'Australia/Yancowinna', '', '+09:30', '+10:30', 'Link to Australia/Broken_Hill'),
('', '', 'Brazil/Acre', '', '−04:00', '−04:00', 'Link to America/Rio_Branco'),
('', '', 'Brazil/DeNoronha', '', '−02:00', '−02:00', 'Link to America/Noronha'),
('', '', 'Brazil/East', '', '−03:00', '−02:00', 'Link to America/Sao_Paulo'),
('', '', 'Brazil/West', '', '−04:00', '−04:00', 'Link to America/Manaus'),
('', '', 'Canada/Atlantic', '', '−04:00', '−03:00', 'Link to America/Halifax'),
('', '', 'Canada/Central', '', '−06:00', '−05:00', 'Link to America/Winnipeg'),
('', '', 'Canada/East-Saskatchewan', '', '−06:00', '−06:00', 'Link to America/Regina'),
('', '', 'Canada/Eastern', '', '−05:00', '−04:00', 'Link to America/Toronto'),
('', '', 'Canada/Mountain', '', '−07:00', '−06:00', 'Link to America/Edmonton'),
('', '', 'Canada/Newfoundland', '', '−03:30', '−02:30', 'Link to America/St_Johns'),
('', '', 'Canada/Pacific', '', '−08:00', '−07:00', 'Link to America/Vancouver'),
('', '', 'Canada/Saskatchewan', '', '−06:00', '−06:00', 'Link to America/Regina'),
('', '', 'Canada/Yukon', '', '−08:00', '−07:00', 'Link to America/Whitehorse'),
('', '', 'CET', '', '+01:00', '+02:00', ''),
('', '', 'Chile/Continental', '', '−04:00', '−03:00', 'Link to America/Santiago'),
('', '', 'Chile/EasterIsland', '', '−06:00', '−05:00', 'Link to Pacific/Easter'),
('', '', 'CST6CDT', '', '−06:00', '−05:00', ''),
('', '', 'Cuba', '', '−05:00', '−04:00', 'Link to America/Havana'),
('', '', 'EET', '', '+02:00', '+03:00', ''),
('', '', 'Egypt', '', '+02:00', '+02:00', 'Link to Africa/Cairo'),
('', '', 'Eire', '', '+00:00', '+01:00', 'Link to Europe/Dublin'),
('', '', 'EST', '', '−05:00', '−05:00', ''),
('', '', 'EST5EDT', '', '−05:00', '−04:00', ''),
('', '', 'Etc./GMT', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Etc./GMT+0', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Etc./UCT', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Etc./Universal', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Etc./UTC', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Etc./Zulu', '', '+00:00', '+00:00', 'Link to UTC'),
('NL', '+5222+00454', 'Europe/Amsterdam', '', '+01:00', '+02:00', ''),
('AD', '+4230+00131', 'Europe/Andorra', '', '+01:00', '+02:00', ''),
('GR', '+3758+02343', 'Europe/Athens', '', '+02:00', '+03:00', ''),
('', '', 'Europe/Belfast', '', '+00:00', '+01:00', 'Link to Europe/London'),
('RS', '+4450+02030', 'Europe/Belgrade', '', '+01:00', '+02:00', ''),
('DE', '+5230+01322', 'Europe/Berlin', '', '+01:00', '+02:00', 'In 1945, the Trizone did not follow Berlin\'s switch to DST, see Time in Germany'),
('SK', '+4809+01707', 'Europe/Bratislava', '', '+01:00', '+02:00', 'Link to Europe/Prague'),
('BE', '+5050+00420', 'Europe/Brussels', '', '+01:00', '+02:00', ''),
('RO', '+4426+02606', 'Europe/Bucharest', '', '+02:00', '+03:00', ''),
('HU', '+4730+01905', 'Europe/Budapest', '', '+01:00', '+02:00', ''),
('MD', '+4700+02850', 'Europe/Chisinau', '', '+02:00', '+03:00', ''),
('DK', '+5540+01235', 'Europe/Copenhagen', '', '+01:00', '+02:00', ''),
('IE', '+5320-00615', 'Europe/Dublin', '', '+00:00', '+01:00', ''),
('GI', '+3608-00521', 'Europe/Gibraltar', '', '+01:00', '+02:00', ''),
('GG', '+4927-00232', 'Europe/Guernsey', '', '+00:00', '+01:00', 'Link to Europe/London'),
('FI', '+6010+02458', 'Europe/Helsinki', '', '+02:00', '+03:00', ''),
('IM', '+5409-00428', 'Europe/Isle_of_Man', '', '+00:00', '+01:00', 'Link to Europe/London'),
('TR', '+4101+02858', 'Europe/Istanbul', '', '+02:00', '+03:00', ''),
('JE', '+4912-00207', 'Europe/Jersey', '', '+00:00', '+01:00', 'Link to Europe/London'),
('RU', '+5443+02030', 'Europe/Kaliningrad', 'Moscow-01 - Kaliningrad', '+03:00', '+03:00', ''),
('UA', '+5026+03031', 'Europe/Kiev', 'most locations', '+02:00', '+03:00', ''),
('PT', '+3843-00908', 'Europe/Lisbon', 'mainland', '+00:00', '+01:00', ''),
('SI', '+4603+01431', 'Europe/Ljubljana', '', '+01:00', '+02:00', 'Link to Europe/Belgrade'),
('GB', '+513030-0000731', 'Europe/London', '', '+00:00', '+01:00', ''),
('LU', '+4936+00609', 'Europe/Luxembourg', '', '+01:00', '+02:00', ''),
('ES', '+4024-00341', 'Europe/Madrid', 'mainland', '+01:00', '+02:00', ''),
('MT', '+3554+01431', 'Europe/Malta', '', '+01:00', '+02:00', ''),
('AX', '+6006+01957', 'Europe/Mariehamn', '', '+02:00', '+03:00', 'Link to Europe/Helsinki'),
('BY', '+5354+02734', 'Europe/Minsk', '', '+03:00', '+03:00', ''),
('MC', '+4342+00723', 'Europe/Monaco', '', '+01:00', '+02:00', ''),
('RU', '+5545+03735', 'Europe/Moscow', 'Moscow+00 - west Russia', '+04:00', '+04:00', ''),
('', '', 'Europe/Nicosia', '', '+02:00', '+03:00', 'Link to Asia/Nicosia'),
('NO', '+5955+01045', 'Europe/Oslo', '', '+01:00', '+02:00', ''),
('FR', '+4852+00220', 'Europe/Paris', '', '+01:00', '+02:00', ''),
('ME', '+4226+01916', 'Europe/Podgorica', '', '+01:00', '+02:00', 'Link to Europe/Belgrade'),
('CZ', '+5005+01426', 'Europe/Prague', '', '+01:00', '+02:00', ''),
('LV', '+5657+02406', 'Europe/Riga', '', '+02:00', '+03:00', ''),
('IT', '+4154+01229', 'Europe/Rome', '', '+01:00', '+02:00', ''),
('RU', '+5312+05009', 'Europe/Samara', 'Moscow+00 - Samara, Udmurtia', '+04:00', '+04:00', ''),
('SM', '+4355+01228', 'Europe/San_Marino', '', '+01:00', '+02:00', 'Link to Europe/Rome'),
('BA', '+4352+01825', 'Europe/Sarajevo', '', '+01:00', '+02:00', 'Link to Europe/Belgrade'),
('UA', '+4457+03406', 'Europe/Simferopol', 'central Crimea', '+02:00', '+03:00', ''),
('MK', '+4159+02126', 'Europe/Skopje', '', '+01:00', '+02:00', 'Link to Europe/Belgrade'),
('BG', '+4241+02319', 'Europe/Sofia', '', '+02:00', '+03:00', ''),
('SE', '+5920+01803', 'Europe/Stockholm', '', '+01:00', '+02:00', ''),
('EE', '+5925+02445', 'Europe/Tallinn', '', '+02:00', '+03:00', ''),
('AL', '+4120+01950', 'Europe/Tirane', '', '+01:00', '+02:00', ''),
('', '', 'Europe/Tiraspol', '', '+02:00', '+03:00', 'Link to Europe/Chisinau'),
('UA', '+4837+02218', 'Europe/Uzhgorod', 'Ruthenia', '+02:00', '+03:00', ''),
('LI', '+4709+00931', 'Europe/Vaduz', '', '+01:00', '+02:00', ''),
('VA', '+415408+0122711', 'Europe/Vatican', '', '+01:00', '+02:00', 'Link to Europe/Rome'),
('AT', '+4813+01620', 'Europe/Vienna', '', '+01:00', '+02:00', ''),
('LT', '+5441+02519', 'Europe/Vilnius', '', '+02:00', '+03:00', ''),
('RU', '+4844+04425', 'Europe/Volgograd', 'Moscow+00 - Caspian Sea', '+04:00', '+04:00', ''),
('PL', '+5215+02100', 'Europe/Warsaw', '', '+01:00', '+02:00', ''),
('HR', '+4548+01558', 'Europe/Zagreb', '', '+01:00', '+02:00', 'Link to Europe/Belgrade'),
('UA', '+4750+03510', 'Europe/Zaporozhye', 'Zaporozh\'ye, E Lugansk / Zaporizhia, E Luhansk', '+02:00', '+03:00', ''),
('CH', '+4723+00832', 'Europe/Zurich', '', '+01:00', '+02:00', ''),
('', '', 'GB', '', '+00:00', '+01:00', 'Link to Europe/London'),
('', '', 'GB-Eire', '', '+00:00', '+01:00', 'Link to Europe/London'),
('', '', 'GMT', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'GMT+0', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'GMT-0', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'GMT0', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Greenwich', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Hong Kong', '', '+08:00', '+08:00', 'Link to Asia/Hong_Kong'),
('', '', 'HST', '', '−10:00', '−10:00', ''),
('', '', 'Iceland', '', '+00:00', '+00:00', 'Link to Atlantic/Reykjavik'),
('MG', '-1855+04731', 'Indian/Antananarivo', '', '+03:00', '+03:00', ''),
('IO', '-0720+07225', 'Indian/Chagos', '', '+06:00', '+06:00', ''),
('CX', '-1025+10543', 'Indian/Christmas', '', '+07:00', '+07:00', ''),
('CC', '-1210+09655', 'Indian/Cocos', '', '+06:30', '+06:30', ''),
('KM', '-1141+04316', 'Indian/Comoro', '', '+03:00', '+03:00', ''),
('TF', '-492110+0701303', 'Indian/Kerguelen', '', '+05:00', '+05:00', ''),
('SC', '-0440+05528', 'Indian/Mahe', '', '+04:00', '+04:00', ''),
('MV', '+0410+07330', 'Indian/Maldives', '', '+05:00', '+05:00', ''),
('MU', '-2010+05730', 'Indian/Mauritius', '', '+04:00', '+04:00', ''),
('YT', '-1247+04514', 'Indian/Mayotte', '', '+03:00', '+03:00', ''),
('RE', '-2052+05528', 'Indian/Reunion', '', '+04:00', '+04:00', ''),
('', '', 'Iran', '', '+03:30', '+04:30', 'Link to Asia/Tehran'),
('', '', 'Israel', '', '+02:00', '+03:00', 'Link to Asia/Jerusalem'),
('', '', 'Jamaica', '', '−05:00', '−05:00', 'Link to America/Jamaica'),
('', '', 'Japan', '', '+09:00', '+09:00', 'Link to Asia/Tokyo'),
('', '', 'JST-9', '', '+09:00', '+09:00', 'Link to Asia/Tokyo'),
('', '', 'Kwajalein', '', '+12:00', '+12:00', 'Link to Pacific/Kwajalein'),
('', '', 'Libya', '', '+02:00', '+02:00', 'Link to Africa/Tripoli'),
('', '', 'MET', '', '+01:00', '+02:00', ''),
('', '', 'Mexico/BajaNorte', '', '−08:00', '−07:00', 'Link to America/Tijuana'),
('', '', 'Mexico/BajaSur', '', '−07:00', '−06:00', 'Link to America/Mazatlan'),
('', '', 'Mexico/General', '', '−06:00', '−05:00', 'Link to America/Mexico_City'),
('', '', 'MST', '', '−07:00', '−07:00', ''),
('', '', 'MST7MDT', '', '−07:00', '−06:00', ''),
('', '', 'Navajo', '', '−07:00', '−06:00', 'Link to America/Denver'),
('', '', 'NZ', '', '+12:00', '+13:00', 'Link to Pacific/Auckland'),
('', '', 'NZ-CHAT', '', '+12:45', '+13:45', 'Link to Pacific/Chatham'),
('WS', '-1350-17144', 'Pacific/Apia', '', '+13:00', '+14:00', ''),
('NZ', '-3652+17446', 'Pacific/Auckland', 'most locations', '+12:00', '+13:00', ''),
('NZ', '-4357-17633', 'Pacific/Chatham', 'Chatham Islands', '+12:45', '+13:45', ''),
('FM', '+0725+15147', 'Pacific/Chuuk', 'Chuuk (Truk) and Yap', '+10:00', '+10:00', ''),
('CL', '-2709-10926', 'Pacific/Easter', 'Easter Island & Sala y Gomez', '−06:00', '−05:00', ''),
('VU', '-1740+16825', 'Pacific/Efate', '', '+11:00', '+11:00', ''),
('KI', '-0308-17105', 'Pacific/Enderbury', 'Phoenix Islands', '+13:00', '+13:00', ''),
('TK', '-0922-17114', 'Pacific/Fakaofo', '', '+13:00', '+13:00', ''),
('FJ', '-1808+17825', 'Pacific/Fiji', '', '+12:00', '+13:00', ''),
('TV', '-0831+17913', 'Pacific/Funafuti', '', '+12:00', '+12:00', ''),
('EC', '-0054-08936', 'Pacific/Galapagos', 'Galapagos Islands', '−06:00', '−06:00', ''),
('PF', '-2308-13457', 'Pacific/Gambier', 'Gambier Islands', '−09:00', '−09:00', ''),
('SB', '-0932+16012', 'Pacific/Guadalcanal', '', '+11:00', '+11:00', ''),
('GU', '+1328+14445', 'Pacific/Guam', '', '+10:00', '+10:00', ''),
('US', '+211825-1575130', 'Pacific/Honolulu', 'Hawaii', '−10:00', '−10:00', ''),
('UM', '+1645-16931', 'Pacific/Johnston', 'Johnston Atoll', '−10:00', '−10:00', ''),
('KI', '+0152-15720', 'Pacific/Kiritimati', 'Line Islands', '+14:00', '+14:00', ''),
('FM', '+0519+16259', 'Pacific/Kosrae', 'Kosrae', '+11:00', '+11:00', ''),
('MH', '+0905+16720', 'Pacific/Kwajalein', 'Kwajalein', '+12:00', '+12:00', ''),
('MH', '+0709+17112', 'Pacific/Majuro', 'most locations', '+12:00', '+12:00', ''),
('PF', '-0900-13930', 'Pacific/Marquesas', 'Marquesas Islands', '−09:30', '−09:30', ''),
('UM', '+2813-17722', 'Pacific/Midway', 'Midway Islands', '−11:00', '−11:00', ''),
('NR', '-0031+16655', 'Pacific/Nauru', '', '+12:00', '+12:00', ''),
('NU', '-1901-16955', 'Pacific/Niue', '', '−11:00', '−11:00', ''),
('NF', '-2903+16758', 'Pacific/Norfolk', '', '+11:30', '+11:30', ''),
('NC', '-2216+16627', 'Pacific/Noumea', '', '+11:00', '+11:00', ''),
('AS', '-1416-17042', 'Pacific/Pago_Pago', '', '−11:00', '−11:00', ''),
('PW', '+0720+13429', 'Pacific/Palau', '', '+09:00', '+09:00', ''),
('PN', '-2504-13005', 'Pacific/Pitcairn', '', '−08:00', '−08:00', ''),
('FM', '+0658+15813', 'Pacific/Pohnpei', 'Pohnpei (Ponape)', '+11:00', '+11:00', ''),
('', '', 'Pacific/Ponape', '', '+11:00', '+11:00', 'Link to Pacific/Pohnpei'),
('PG', '-0930+14710', 'Pacific/Port_Moresby', '', '+10:00', '+10:00', ''),
('CK', '-2114-15946', 'Pacific/Rarotonga', '', '−10:00', '−10:00', ''),
('MP', '+1512+14545', 'Pacific/Saipan', '', '+10:00', '+10:00', ''),
('', '', 'Pacific/Samoa', '', '−11:00', '−11:00', 'Link to Pacific/Pago_Pago'),
('PF', '-1732-14934', 'Pacific/Tahiti', 'Society Islands', '−10:00', '−10:00', ''),
('KI', '+0125+17300', 'Pacific/Tarawa', 'Gilbert Islands', '+12:00', '+12:00', ''),
('TO', '-2110-17510', 'Pacific/Tongatapu', '', '+13:00', '+13:00', ''),
('', '', 'Pacific/Truk', '', '+10:00', '+10:00', 'Link to Pacific/Chuuk'),
('UM', '+1917+16637', 'Pacific/Wake', 'Wake Island', '+12:00', '+12:00', ''),
('WF', '-1318-17610', 'Pacific/Wallis', '', '+12:00', '+12:00', ''),
('', '', 'Pacific/Yap', '', '+10:00', '+10:00', 'Link to Pacific/Chuuk'),
('', '', 'Poland', '', '+01:00', '+02:00', 'Link to Europe/Warsaw'),
('', '', 'Portugal', '', '+00:00', '+01:00', 'Link to Europe/Lisbon'),
('', '', 'PRC', '', '+08:00', '+08:00', 'Link to Asia/Shanghai'),
('', '', 'PST8PDT', '', '−08:00', '−07:00', ''),
('', '', 'ROC', '', '+08:00', '+08:00', 'Link to Asia/Taipei'),
('', '', 'ROK', '', '+09:00', '+09:00', 'Link to Asia/Seoul'),
('', '', 'Singapore', '', '+08:00', '+08:00', 'Link to Asia/Singapore'),
('', '', 'Turkey', '', '+02:00', '+03:00', 'Link to Europe/Istanbul'),
('', '', 'UCT', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Universal', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'US/Alaska', '', '−09:00', '−08:00', 'Link to America/Anchorage'),
('', '', 'US/Aleutian', '', '−10:00', '−09:00', 'Link to America/Adak'),
('', '', 'US/Arizona', '', '−07:00', '−07:00', 'Link to America/Phoenix'),
('', '', 'US/Central', '', '−06:00', '−05:00', 'Link to America/Chicago'),
('', '', 'US/East-Indiana', '', '−05:00', '−04:00', 'Link to America/Indiana/Indianapolis'),
('', '', 'US/Eastern', '', '−05:00', '−04:00', 'Link to America/New_York'),
('', '', 'US/Hawaii', '', '−10:00', '−10:00', 'Link to Pacific/Honolulu'),
('', '', 'US/Indiana-Starke', '', '−06:00', '−05:00', 'Link to America/Indiana/Knox'),
('', '', 'US/Michigan', '', '−05:00', '−04:00', 'Link to America/Detroit'),
('', '', 'US/Mountain', '', '−07:00', '−06:00', 'Link to America/Denver'),
('', '', 'US/Pacific', '', '−08:00', '−07:00', 'Link to America/Los_Angeles'),
('', '', 'US/Pacific-New', '', '−08:00', '−07:00', 'Link to America/Los_Angeles'),
('', '', 'US/Samoa', '', '−11:00', '−11:00', 'Link to Pacific/Pago_Pago'),
('', '', 'UTC', '', '+00:00', '+00:00', ''),
('', '', 'W-SU', '', '+04:00', '+04:00', 'Link to Europe/Moscow'),
('', '', 'WET', '', '+00:00', '+01:00', ''),
('', '', 'Zulu', '', '+00:00', '+00:00', 'Link to UTC');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_cost_type_values`
--

CREATE TABLE `vbs_cost_type_values` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL DEFAULT '0',
  `type` enum('flat','incremental') NOT NULL DEFAULT 'flat',
  `day_flat_rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `night_flat_rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `from_distance_value` int(11) NOT NULL DEFAULT '0',
  `to_distance_value` int(11) NOT NULL DEFAULT '0',
  `day_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `night_cost` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_cost_type_values`
--

INSERT INTO `vbs_cost_type_values` (`id`, `vehicle_id`, `type`, `day_flat_rate`, `night_flat_rate`, `from_distance_value`, `to_distance_value`, `day_cost`, `night_cost`) VALUES
(15, 8, 'incremental', '0.00', '0.00', 30, 100, '130.00', '160.00'),
(16, 7, 'flat', '90.00', '130.00', 0, 0, '0.00', '0.00'),
(18, 4, 'flat', '7.00', '7.00', 0, 0, '0.00', '0.00'),
(19, 3, 'flat', '6.00', '6.00', 0, 0, '0.00', '0.00'),
(20, 2, 'flat', '4.00', '4.00', 0, 0, '0.00', '0.00'),
(21, 1, 'flat', '10.00', '12.00', 0, 0, '0.00', '0.00'),
(22, 5, 'flat', '80.00', '90.00', 0, 0, '0.00', '0.00'),
(29, 9, 'incremental', '0.00', '0.00', 1, 100, '200.00', '250.00'),
(30, 9, 'incremental', '0.00', '0.00', 101, 150, '230.00', '300.00'),
(31, 9, 'incremental', '0.00', '0.00', 151, 400, '300.00', '350.00'),
(85, 10, 'flat', '5.00', '10.00', 0, 0, '0.00', '0.00'),
(95, 6, 'incremental', '0.00', '0.00', 1, 50, '10.00', '20.00'),
(96, 6, 'incremental', '0.00', '0.00', 51, 100, '20.00', '30.00'),
(97, 6, 'incremental', '0.00', '0.00', 101, 150, '30.00', '40.00');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_country`
--

CREATE TABLE `vbs_country` (
  `country_code_alpha2` char(2) NOT NULL,
  `country_code_alpha3` char(3) NOT NULL,
  `country_code_numeric` varchar(3) NOT NULL,
  `country_name` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_country`
--

INSERT INTO `vbs_country` (`country_code_alpha2`, `country_code_alpha3`, `country_code_numeric`, `country_name`) VALUES
('ao', 'ago', '024', 'Angola'),
('ai', 'aia', '660', 'Anguilla'),
('aq', 'ata', '010', 'Antarctica'),
('ag', 'atg', '028', 'Antigua and Barbuda'),
('ar', 'arg', '032', 'Argentina'),
('am', 'arm', '051', 'Armenia'),
('aw', 'abw', '533', 'Aruba'),
('au', 'aus', '036', 'Australia'),
('at', 'aut', '040', 'Austria'),
('az', 'aze', '031', 'Azerbaijan'),
('bs', 'bhs', '044', 'Bahamas'),
('bh', 'bhr', '048', 'Bahrain'),
('bd', 'bgd', '050', 'Bangladesh'),
('bb', 'brb', '052', 'Barbados'),
('by', 'blr', '112', 'Belarus'),
('be', 'bel', '056', 'Belgium'),
('bz', 'blz', '084', 'Belize'),
('bj', 'ben', '204', 'Benin'),
('bm', 'bmu', '060', 'Bermuda'),
('bt', 'btn', '064', 'Bhutan'),
('bo', 'bol', '068', 'Bolivia, Plurinational State of'),
('ba', 'bih', '070', 'Bosnia and Herzegovina'),
('bw', 'bwa', '072', 'Botswana'),
('bv', 'bvt', '074', 'Bouvet Island'),
('br', 'bra', '076', 'Brazil'),
('io', 'iot', '086', 'British Indian Ocean Territory'),
('bn', 'brn', '096', 'Brunei Darussalam'),
('bg', 'bgr', '100', 'Bulgaria'),
('bf', 'bfa', '854', 'Burkina Faso'),
('bi', 'bdi', '108', 'Burundi'),
('kh', 'khm', '116', 'Cambodia'),
('cm', 'cmr', '120', 'Cameroon'),
('ca', 'can', '124', 'Canada'),
('cv', 'cpv', '132', 'Cape Verde'),
('ky', 'cym', '136', 'Cayman Islands'),
('cf', 'caf', '140', 'Central African Republic'),
('td', 'tcd', '148', 'Chad'),
('cl', 'chl', '152', 'Chile'),
('cn', 'chn', '156', 'China'),
('cx', 'cxr', '162', 'Christmas Island'),
('cc', 'cck', '166', 'Cocos (Keeling) Islands'),
('co', 'col', '170', 'Colombia'),
('km', 'com', '174', 'Comoros'),
('cg', 'cog', '178', 'Congo'),
('cd', 'cod', '180', 'Congo, the Democratic Republic of the'),
('ck', 'cok', '184', 'Cook Islands'),
('cr', 'cri', '188', 'Costa Rica'),
('ci', 'civ', '384', 'Côte d\'Ivoire'),
('hr', 'hrv', '191', 'Croatia'),
('cu', 'cub', '192', 'Cuba'),
('cy', 'cyp', '196', 'Cyprus'),
('cz', 'cze', '203', 'Czech Republic'),
('dk', 'dnk', '208', 'Denmark'),
('dj', 'dji', '262', 'Djibouti'),
('dm', 'dma', '212', 'Dominica'),
('do', 'dom', '214', 'Dominican Republic'),
('ec', 'ecu', '218', 'Ecuador'),
('eg', 'egy', '818', 'Egypt'),
('sv', 'slv', '222', 'El Salvador'),
('gq', 'gnq', '226', 'Equatorial Guinea'),
('er', 'eri', '232', 'Eritrea'),
('ee', 'est', '233', 'Estonia'),
('et', 'eth', '231', 'Ethiopia'),
('fk', 'flk', '238', 'Falkland Islands (Malvinas)'),
('fo', 'fro', '234', 'Faroe Islands'),
('fj', 'fji', '242', 'Fiji'),
('fi', 'fin', '246', 'Finland'),
('fr', 'fra', '250', 'France'),
('gf', 'guf', '254', 'French Guiana'),
('pf', 'pyf', '258', 'French Polynesia'),
('tf', 'atf', '260', 'French Southern Territories'),
('ga', 'gab', '266', 'Gabon'),
('gm', 'gmb', '270', 'Gambia'),
('ge', 'geo', '268', 'Georgia'),
('de', 'deu', '276', 'Germany'),
('gh', 'gha', '288', 'Ghana'),
('gi', 'gib', '292', 'Gibraltar'),
('gr', 'grc', '300', 'Greece'),
('gl', 'grl', '304', 'Greenland'),
('gd', 'grd', '308', 'Grenada'),
('gp', 'glp', '312', 'Guadeloupe'),
('gu', 'gum', '316', 'Guam'),
('gt', 'gtm', '320', 'Guatemala'),
('gg', 'ggy', '831', 'Guernsey'),
('gn', 'gin', '324', 'Guinea'),
('gw', 'gnb', '624', 'Guinea-Bissau'),
('gy', 'guy', '328', 'Guyana'),
('ht', 'hti', '332', 'Haiti'),
('hm', 'hmd', '334', 'Heard Island and McDonald Islands'),
('va', 'vat', '336', 'Holy See (Vatican City State)'),
('hn', 'hnd', '340', 'Honduras'),
('hk', 'hkg', '344', 'Hong Kong'),
('hu', 'hun', '348', 'Hungary'),
('is', 'isl', '352', 'Iceland'),
('in', 'ind', '356', 'India'),
('id', 'idn', '360', 'Indonesia'),
('ir', 'irn', '364', 'Iran, Islamic Republic of'),
('iq', 'irq', '368', 'Iraq'),
('ie', 'irl', '372', 'Ireland'),
('im', 'imn', '833', 'Isle of Man'),
('il', 'isr', '376', 'Israel'),
('it', 'ita', '380', 'Italy'),
('jm', 'jam', '388', 'Jamaica'),
('jp', 'jpn', '392', 'Japan'),
('je', 'jey', '832', 'Jersey'),
('jo', 'jor', '400', 'Jordan'),
('kz', 'kaz', '398', 'Kazakhstan'),
('ke', 'ken', '404', 'Kenya'),
('ki', 'kir', '296', 'Kiribati'),
('kp', 'prk', '408', 'Korea, Democratic People\'s Republic of'),
('kr', 'kor', '410', 'Korea, Republic of'),
('kw', 'kwt', '414', 'Kuwait'),
('kg', 'kgz', '417', 'Kyrgyzstan'),
('la', 'lao', '418', 'Lao People\'s Democratic Republic'),
('lv', 'lva', '428', 'Latvia'),
('lb', 'lbn', '422', 'Lebanon'),
('ls', 'lso', '426', 'Lesotho'),
('lr', 'lbr', '430', 'Liberia'),
('ly', 'lby', '434', 'Libyan Arab Jamahiriya'),
('li', 'lie', '438', 'Liechtenstein'),
('lt', 'ltu', '440', 'Lithuania'),
('lu', 'lux', '442', 'Luxembourg'),
('mo', 'mac', '446', 'Macao'),
('mk', 'mkd', '807', 'Macedonia, the former Yugoslav Republic of'),
('mg', 'mdg', '450', 'Madagascar'),
('mw', 'mwi', '454', 'Malawi'),
('my', 'mys', '458', 'Malaysia'),
('mv', 'mdv', '462', 'Maldives'),
('ml', 'mli', '466', 'Mali'),
('mt', 'mlt', '470', 'Malta'),
('mh', 'mhl', '584', 'Marshall Islands'),
('mq', 'mtq', '474', 'Martinique'),
('mr', 'mrt', '478', 'Mauritania'),
('mu', 'mus', '480', 'Mauritius'),
('yt', 'myt', '175', 'Mayotte'),
('mx', 'mex', '484', 'Mexico'),
('fm', 'fsm', '583', 'Micronesia, Federated States of'),
('md', 'mda', '498', 'Moldova, Republic of'),
('mc', 'mco', '492', 'Monaco'),
('mn', 'mng', '496', 'Mongolia'),
('me', 'mne', '499', 'Montenegro'),
('ms', 'msr', '500', 'Montserrat'),
('ma', 'mar', '504', 'Morocco'),
('mz', 'moz', '508', 'Mozambique'),
('mm', 'mmr', '104', 'Myanmar'),
('na', 'nam', '516', 'Namibia'),
('nr', 'nru', '520', 'Nauru'),
('np', 'npl', '524', 'Nepal'),
('nl', 'nld', '528', 'Netherlands'),
('an', 'ant', '530', 'Netherlands Antilles'),
('nc', 'ncl', '540', 'New Caledonia'),
('nz', 'nzl', '554', 'New Zealand'),
('ni', 'nic', '558', 'Nicaragua'),
('ne', 'ner', '562', 'Niger'),
('ng', 'nga', '566', 'Nigeria'),
('nu', 'niu', '570', 'Niue'),
('nf', 'nfk', '574', 'Norfolk Island'),
('mp', 'mnp', '580', 'Northern Mariana Islands'),
('no', 'nor', '578', 'Norway'),
('om', 'omn', '512', 'Oman'),
('pk', 'pak', '586', 'Pakistan'),
('pw', 'plw', '585', 'Palau'),
('ps', 'pse', '275', 'Palestinian Territory, Occupied'),
('pa', 'pan', '591', 'Panama'),
('pg', 'png', '598', 'Papua New Guinea'),
('py', 'pry', '600', 'Paraguay'),
('pe', 'per', '604', 'Peru'),
('ph', 'phl', '608', 'Philippines'),
('pn', 'pcn', '612', 'Pitcairn'),
('pl', 'pol', '616', 'Poland'),
('pt', 'prt', '620', 'Portugal'),
('pr', 'pri', '630', 'Puerto Rico'),
('qa', 'qat', '634', 'Qatar'),
('re', 'reu', '638', 'Réunion'),
('ro', 'rou', '642', 'Romania'),
('ru', 'rus', '643', 'Russian Federation'),
('rw', 'rwa', '646', 'Rwanda'),
('bl', 'blm', '652', 'Saint Barthélemy'),
('sh', 'shn', '654', 'Saint Helena'),
('kn', 'kna', '659', 'Saint Kitts and Nevis'),
('lc', 'lca', '662', 'Saint Lucia'),
('mf', 'maf', '663', 'Saint Martin (French part)'),
('pm', 'spm', '666', 'Saint Pierre and Miquelon'),
('vc', 'vct', '670', 'Saint Vincent and the Grenadines'),
('ws', 'wsm', '882', 'Samoa'),
('sm', 'smr', '674', 'San Marino'),
('st', 'stp', '678', 'Sao Tome and Principe'),
('sa', 'sau', '682', 'Saudi Arabia'),
('sn', 'sen', '686', 'Senegal'),
('rs', 'srb', '688', 'Serbia'),
('sc', 'syc', '690', 'Seychelles'),
('sl', 'sle', '694', 'Sierra Leone'),
('sg', 'sgp', '702', 'Singapore'),
('sk', 'svk', '703', 'Slovakia'),
('si', 'svn', '705', 'Slovenia'),
('sb', 'slb', '090', 'Solomon Islands'),
('so', 'som', '706', 'Somalia'),
('za', 'zaf', '710', 'South Africa'),
('gs', 'sgs', '239', 'South Georgia and the South Sandwich Islands'),
('es', 'esp', '724', 'Spain'),
('lk', 'lka', '144', 'Sri Lanka'),
('sd', 'sdn', '736', 'Sudan'),
('sr', 'sur', '740', 'Suriname'),
('sj', 'sjm', '744', 'Svalbard and Jan Mayen'),
('sz', 'swz', '748', 'Swaziland'),
('se', 'swe', '752', 'Sweden'),
('ch', 'che', '756', 'Switzerland'),
('sy', 'syr', '760', 'Syrian Arab Republic'),
('tw', 'twn', '158', 'Taiwan, Province of China'),
('tj', 'tjk', '762', 'Tajikistan'),
('tz', 'tza', '834', 'Tanzania, United Republic of'),
('th', 'tha', '764', 'Thailand'),
('tl', 'tls', '626', 'Timor-Leste'),
('tg', 'tgo', '768', 'Togo'),
('tk', 'tkl', '772', 'Tokelau'),
('to', 'ton', '776', 'Tonga'),
('tt', 'tto', '780', 'Trinidad and Tobago'),
('tn', 'tun', '788', 'Tunisia'),
('tr', 'tur', '792', 'Turkey'),
('tm', 'tkm', '795', 'Turkmenistan'),
('tc', 'tca', '796', 'Turks and Caicos Islands'),
('tv', 'tuv', '798', 'Tuvalu'),
('ug', 'uga', '800', 'Uganda'),
('ua', 'ukr', '804', 'Ukraine'),
('ae', 'are', '784', 'United Arab Emirates'),
('gb', 'gbr', '826', 'United Kingdom'),
('us', 'usa', '840', 'United States'),
('um', 'umi', '581', 'United States Minor Outlying Islands'),
('uy', 'ury', '858', 'Uruguay'),
('uz', 'uzb', '860', 'Uzbekistan'),
('vu', 'vut', '548', 'Vanuatu'),
('ve', 'ven', '862', 'Venezuela, Bolivarian Republic of'),
('vn', 'vnm', '704', 'Viet Nam'),
('vg', 'vgb', '092', 'Virgin Islands, British'),
('vi', 'vir', '850', 'Virgin Islands, U.S.'),
('wf', 'wlf', '876', 'Wallis and Futuna'),
('eh', 'esh', '732', 'Western Sahara'),
('ye', 'yem', '887', 'Yemen'),
('zm', 'zmb', '894', 'Zambia'),
('zw', 'zwe', '716', 'Zimbabwe'),
('af', 'afg', '004', 'Afghanistan'),
('ax', 'ala', '248', 'Åland Islands'),
('al', 'alb', '008', 'Albania'),
('dz', 'dza', '012', 'Algeria'),
('as', 'asm', '016', 'American Samoa'),
('ad', 'and', '020', 'Andorra');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_coupons`
--

CREATE TABLE `vbs_coupons` (
  `coupon_id` int(11) NOT NULL,
  `coupon_title` varchar(100) DEFAULT NULL,
  `coupon_code` varchar(20) DEFAULT NULL,
  `discount_amount` float(10,2) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vbs_coupons`
--

INSERT INTO `vbs_coupons` (`coupon_id`, `coupon_title`, `coupon_code`, `discount_amount`, `from_date`, `to_date`, `created`, `updated`, `status`) VALUES
(1, 'TEST COUPON', 'TEST_CAB', 30.00, '2017-11-18', '2017-11-30', '2017-11-18 16:10:23', '2017-11-18 16:58:14', 'Active'),
(2, 'Christmas Coupon', 'CH123', 100.00, '2017-11-18', '2017-12-10', '2017-11-18 08:21:39', NULL, 'Active'),
(3, 'Newyear Coupon', 'NY123', 150.00, '2017-11-18', '2017-12-20', '2017-11-18 08:24:04', NULL, 'Active'),
(4, 'Discount Coupon', 'DC123', 100.00, '2017-11-18', '2017-12-10', '2017-11-18 08:26:06', NULL, 'Active'),
(5, 'Weekend Coupon', 'WC123', 150.00, '2017-11-18', '2017-12-10', '2017-11-18 08:28:03', NULL, 'Active'),
(6, 'Demo Coupon', 'DM123', 130.00, '2017-11-18', '2017-12-20', '2017-11-18 08:29:37', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_currency`
--

CREATE TABLE `vbs_currency` (
  `currency_code_alpha` char(3) NOT NULL,
  `currency_code_numeric` varchar(3) DEFAULT NULL,
  `currency_name` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `vbs_currency`
--

INSERT INTO `vbs_currency` (`currency_code_alpha`, `currency_code_numeric`, `currency_name`) VALUES
('AFN', '971', 'Afghani'),
('DZD', '12', 'Algerian Dinar'),
('ARS', '32', 'Argentine Peso'),
('AMD', '51', 'Armenian Dram'),
('AWG', '533', 'Aruban Guilder'),
('AUD', '36', 'Australian Dollar'),
('AZN', '944', 'Azerbaijanian Manat'),
('BSD', '44', 'Bahamian Dollar'),
('BHD', '48', 'Bahraini Dinar'),
('THB', '764', 'Baht'),
('PAB', '590', 'Balboa'),
('BBD', '52', 'Barbados Dollar'),
('BYR', '974', 'Belarussian Ruble'),
('BZD', '84', 'Belize Dollar'),
('BMD', '60', 'Bermudian Dollar (customarily known as Bermuda Dollar)'),
('VEF', '937', 'Bolivar Fuerte'),
('BOB', '68', 'Boliviano'),
('XBA', '955', 'Bond Markets Units European Composite Unit (EURCO)'),
('BRL', '986', 'Brazilian Real'),
('BND', '96', 'Brunei Dollar'),
('BGN', '975', 'Bulgarian Lev'),
('BIF', '108', 'Burundi Franc'),
('CAD', '124', 'Canadian Dollar'),
('CVE', '132', 'Cape Verde Escudo'),
('KYD', '136', 'Cayman Islands Dollar'),
('GHS', '936', 'Cedi'),
('XOF', '952', 'CFA Franc BCEAO'),
('XAF', '950', 'CFA Franc BEAC'),
('XPF', '953', 'CFP Franc'),
('CLP', '152', 'Chilean Peso'),
('XTS', '963', 'Codes specifically reserved for testing purposes'),
('COP', '170', 'Colombian Peso'),
('KMF', '174', 'Comoro Franc'),
('CDF', '976', 'Congolese Franc'),
('BAM', '977', 'Convertible Marks'),
('NIO', '558', 'Cordoba Oro'),
('CRC', '188', 'Costa Rican Colon'),
('HRK', '191', 'Croatian Kuna'),
('CUP', '192', 'Cuban Peso'),
('CZK', '203', 'Czech Koruna'),
('GMD', '270', 'Dalasi'),
('DKK', '208', 'Danish Krone'),
('MKD', '807', 'Denar'),
('DJF', '262', 'Djibouti Franc'),
('STD', '678', 'Dobra'),
('DOP', '214', 'Dominican Peso'),
('VND', '704', 'Dong'),
('XCD', '951', 'East Caribbean Dollar'),
('EGP', '818', 'Egyptian Pound'),
('SVC', '222', 'El Salvador Colon'),
('ETB', '230', 'Ethiopian Birr'),
('EUR', '978', 'Euro'),
('XBB', '956', 'European Monetary Unit (E.M.U.-6)'),
('XBD', '958', 'European Unit of Account 17 (E.U.A.-17)'),
('XBC', '957', 'European Unit of Account 9 (E.U.A.-9)'),
('FKP', '238', 'Falkland Islands Pound'),
('FJD', '242', 'Fiji Dollar'),
('HUF', '348', 'Forint'),
('GIP', '292', 'Gibraltar Pound'),
('XAU', '959', 'Gold'),
('HTG', '332', 'Gourde'),
('PYG', '600', 'Guarani'),
('GNF', '324', 'Guinea Franc'),
('GWP', '624', 'Guinea-Bissau Peso'),
('GYD', '328', 'Guyana Dollar'),
('HKD', '344', 'Hong Kong Dollar'),
('UAH', '980', 'Hryvnia'),
('ISK', '352', 'Iceland Krona'),
('INR', '356', 'Indian Rupee'),
('IRR', '364', 'Iranian Rial'),
('IQD', '368', 'Iraqi Dinar'),
('JMD', '388', 'Jamaican Dollar'),
('JOD', '400', 'Jordanian Dinar'),
('KES', '404', 'Kenyan Shilling'),
('PGK', '598', 'Kina'),
('LAK', '418', 'Kip'),
('EEK', '233', 'Kroon'),
('KWD', '414', 'Kuwaiti Dinar'),
('MWK', '454', 'Kwacha'),
('AOA', '973', 'Kwanza'),
('MMK', '104', 'Kyat'),
('GEL', '981', 'Lari'),
('LVL', '428', 'Latvian Lats'),
('LBP', '422', 'Lebanese Pound'),
('ALL', '8', 'Lek'),
('HNL', '340', 'Lempira'),
('SLL', '694', 'Leone'),
('LRD', '430', 'Liberian Dollar'),
('LYD', '434', 'Libyan Dinar'),
('SZL', '748', 'Lilangeni'),
('LTL', '440', 'Lithuanian Litas'),
('LSL', '426', 'Loti'),
('MGA', '969', 'Malagasy Ariary'),
('MYR', '458', 'Malaysian Ringgit'),
('TMT', '934', 'Manat'),
('MUR', '480', 'Mauritius Rupee'),
('MZN', '943', 'Metical'),
('MXN', '484', 'Mexican Peso'),
('MXV', '979', 'Mexican Unidad de Inversion (UDI)'),
('MDL', '498', 'Moldovan Leu'),
('MAD', '504', 'Moroccan Dirham'),
('BOV', '984', 'Mvdol'),
('NGN', '566', 'Naira'),
('ERN', '232', 'Nakfa'),
('NAD', '516', 'Namibia Dollar'),
('NPR', '524', 'Nepalese Rupee'),
('ANG', '532', 'Netherlands Antillian Guilder'),
('ILS', '376', 'New Israeli Sheqel'),
('RON', '946', 'New Leu'),
('TWD', '901', 'New Taiwan Dollar'),
('NZD', '554', 'New Zealand Dollar'),
('BTN', '64', 'Ngultrum'),
('KPW', '408', 'North Korean Won'),
('NOK', '578', 'Norwegian Krone'),
('PEN', '604', 'Nuevo Sol'),
('MRO', '478', 'Ouguiya'),
('TOP', '776', 'Pa\'anga'),
('PKR', '586', 'Pakistan Rupee'),
('XPD', '964', 'Palladium'),
('MOP', '446', 'Pataca'),
('CUC', '931', 'Peso Convertible'),
('UYU', '858', 'Peso Uruguayo'),
('PHP', '608', 'Philippine Peso'),
('XPT', '962', 'Platinum'),
('GBP', '826', 'Pound Sterling'),
('BWP', '72', 'Pula'),
('QAR', '634', 'Qatari Rial'),
('GTQ', '320', 'Quetzal'),
('ZAR', '710', 'Rand'),
('OMR', '512', 'Rial Omani'),
('KHR', '116', 'Riel'),
('MVR', '462', 'Rufiyaa'),
('IDR', '360', 'Rupiah'),
('RUB', '643', 'Russian Ruble'),
('RWF', '646', 'Rwanda Franc'),
('SHP', '654', 'Saint Helena Pound'),
('SAR', '682', 'Saudi Riyal'),
('XDR', '960', 'SDR'),
('RSD', '941', 'Serbian Dinar'),
('SCR', '690', 'Seychelles Rupee'),
('XAG', '961', 'Silver'),
('SGD', '702', 'Singapore Dollar'),
('SBD', '90', 'Solomon Islands Dollar'),
('KGS', '417', 'Som'),
('SOS', '706', 'Somali Shilling'),
('TJS', '972', 'Somoni'),
('LKR', '144', 'Sri Lanka Rupee'),
('SDG', '938', 'Sudanese Pound'),
('SRD', '968', 'Surinam Dollar'),
('SEK', '752', 'Swedish Krona'),
('CHF', '756', 'Swiss Franc'),
('SYP', '760', 'Syrian Pound'),
('BDT', '50', 'Taka'),
('WST', '882', 'Tala'),
('TZS', '834', 'Tanzanian Shilling'),
('KZT', '398', 'Tenge'),
('XXX', '999', 'Codes assigned for transactions where no currency is involved'),
('TTD', '780', 'Trinidad and Tobago Dollar'),
('MNT', '496', 'Tugrik'),
('TND', '788', 'Tunisian Dinar'),
('TRY', '949', 'Turkish Lira'),
('AED', '784', 'UAE Dirham'),
('UGX', '800', 'Uganda Shilling'),
('XFU', NULL, 'UIC-Franc'),
('COU', '970', 'Unidad de Valor Real'),
('CLF', '990', 'Unidades de fomento'),
('UYI', '940', 'Uruguay Peso en Unidades Indexadas'),
('USD', '840', 'US Dollar'),
('USN', '997', 'US Dollar (Next day)'),
('USS', '998', 'US Dollar (Same day)'),
('UZS', '860', 'Uzbekistan Sum'),
('VUV', '548', 'Vatu'),
('CHE', '947', 'WIR Euro'),
('CHW', '948', 'WIR Franc'),
('KRW', '410', 'Won'),
('YER', '886', 'Yemeni Rial'),
('JPY', '392', 'Yen'),
('CNY', '156', 'Yuan Renminbi'),
('ZMK', '894', 'Zambian Kwacha'),
('ZWL', '932', 'Zimbabwe Dollar'),
('PLN', '985', 'Zloty');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_drivers`
--

CREATE TABLE `vbs_drivers` (
  `id` int(11) NOT NULL,
  `photo` varchar(512) NOT NULL,
  `name` varchar(512) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vbs_email_settings`
--

CREATE TABLE `vbs_email_settings` (
  `id` int(11) NOT NULL,
  `smtp_host` varchar(512) CHARACTER SET utf8 NOT NULL,
  `smtp_port` int(11) NOT NULL,
  `smtp_user` varchar(512) CHARACTER SET utf8 NOT NULL,
  `smtp_password` varchar(512) CHARACTER SET utf8 NOT NULL,
  `api_key` varchar(512) CHARACTER SET utf8 NOT NULL,
  `mail_config` enum('webmail','mandrill') CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vbs_email_settings`
--

INSERT INTO `vbs_email_settings` (`id`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_password`, `api_key`, `mail_config`) VALUES
(1, 'mail.mindsworthy.com', 587, 'contact@mindsworthy.com', '9490472748', 'd1iu4IxmBPkoaRsizb3xIg', 'webmail');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_email_templates`
--

CREATE TABLE `vbs_email_templates` (
  `id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(512) NOT NULL,
  `email_template` varchar(10000) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_email_templates`
--

INSERT INTO `vbs_email_templates` (`id`, `subject`, `email_template`, `status`) VALUES
(7, 'user_registration', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome to __SITE_TITLE__ </strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dear <strong>__USER__NAME__</strong>,&nbsp;</p>\r\n\r\n<p>You have successfully Registered in&nbsp;<strong>__SITE_TITLE__</strong></p>\r\n\r\n<p><strong>Your credentials</strong></p>\r\n\r\n<p>Email<strong>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;__EMAIL__</strong></p>\r\n\r\n<p>Password<strong>&nbsp; __PASSWORD__</strong></p>\r\n\r\n<p>We are really excited that you decide to try our services,welcome and thank you for the trust!!</p>\r\n\r\n<p>Please click this link for <strong>__ACCOUNT_ACTIVATOIN_LINK__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Regards,</strong>&nbsp;<br />\r\n<br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Active'),
(8, 'fb_google_registration_template', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>__SITE_LOGO__</strong> &nbsp; &nbsp;</p>\r\n\r\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Welcome&nbsp;to&nbsp;__SITE_TITLE__</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Dear __USER_NAME__&nbsp;,</strong></p>\r\n\r\n<p>You have Successfully Registered in <strong>__SITE_TITLE__</strong></p>\r\n\r\n<p>Email &nbsp; &nbsp; &nbsp;: &nbsp;<strong>__EMAIL__</strong></p>\r\n\r\n<p>Password : <strong>__PASSWORD__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;</p>\r\n\r\n<p><strong>Regards,</strong></p>\r\n\r\n<p><strong>__SITE_TITLE__</strong>&nbsp;| Cab Booking System</p>\r\n', 'Active'),
(57, 'when_user_done_booking_template_mail_to_user', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome&nbsp;to&nbsp;__SITE_TITLE__ </strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dear <strong>__USER_NAME__</strong>,&nbsp;</p>\r\n\r\n<p>You have successfully Booked vehicle in&nbsp;<strong>__SITE_TITLE__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>DETAILS</strong></p>\r\n\r\n<p>Booking Reference Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__BOOKING_REF_NO__</strong></p>\r\n\r\n<p>Pick-Point&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__PICK_POINT__</strong></p>\r\n\r\n<p>Drop-Point&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DROP_POINT__</strong></p>\r\n\r\n<p>Pick Date &amp; Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DATE_TIME__</strong></p>\r\n\r\n<p>Return Journey Required&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__RETURN_JOURNEY__</strong></p>\r\n\r\n<p>Waiting Time &amp; Cost &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__WAITING_TIME__</strong></p>\r\n\r\n<p>Journey K.m./ Miles &amp; Time&nbsp;&nbsp; <strong>__MILES_TIME__</strong></p>\r\n\r\n<p>Car Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__CAR_TYPE__</strong></p>\r\n\r\n<p>Payment Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__PAYMENT_TYPE__</strong></p>\r\n\r\n<p>Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__AMOUNT__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Message to Driver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DRIVER_MSG__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We are really excited that you decide to try our services,welcome and thank you for the trust!!</p>\r\n\r\n<p>For any assistance or questions&nbsp;feel free to contact us at <strong>__CONTACT_US__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp;</p>\r\n\r\n<p><strong>Regards,</strong><br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n', 'Active'),
(58, 'when_user_done_booking_template_mail_to_admin', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome&nbsp;to __SITE_TITLE__ </strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hello Dear Admin,&nbsp;</p>\r\n\r\n<p><strong>__USER_NAME__&nbsp;</strong>has&nbsp;successfully Booked vehicle</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>USER DETAILS</strong></p>\r\n\r\n<p>Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__USER_NAME__</strong></p>\r\n\r\n<p>Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__EMAIL__</strong></p>\r\n\r\n<p>Phone &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__PHONE__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>BOOKING DETAILS</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Booking Reference Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__BOOKING_REF_NO__</strong></p>\r\n\r\n<p>Pick-Point&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__PICK_POINT__</strong></p>\r\n\r\n<p>Drop-Point&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DROP_POINT__</strong></p>\r\n\r\n<p>Pick Date &amp; Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DATE_TIME__</strong></p>\r\n\r\n<p>Return Journey Required&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__RETURN_JOURNEY__</strong></p>\r\n\r\n<p>Waiting Time &amp; Cost &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__WAITING_TIME__</strong></p>\r\n\r\n<p>Journey Miles &amp; Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__MILES_TIME__</strong></p>\r\n\r\n<p>Car Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__CAR_TYPE__</strong></p>\r\n\r\n<p>Payment Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__PAYMENT_TYPE__</strong></p>\r\n\r\n<p>Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__AMOUNT__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Message to Driver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DRIVER_MSG__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We are really excited that you decide to try our services,welcome and thank you for the trust!!</p>\r\n\r\n<p>For any assistance or questions&nbsp;feel free to contact us at <strong>__CONTACT_US__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Regards,</strong><br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n', 'Active'),
(61, 'forgot_password', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Welcome to __SITE_TITLE__</strong></h2>\r\n\r\n<p>A new password was requested for the user <strong>__EMAIL__</strong>,&nbsp;</p>\r\n\r\n<p>Please click on the link to set your&nbsp;password&nbsp;___RESET_YOUR_PASSWORD___</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Regards,</strong>&nbsp;<br />\r\n<br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n', 'Active'),
(62, 'contact_query', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<p><strong>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></p>\r\n\r\n<h2><strong>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome to __SITE_TITLE__</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hello Admin,</p>\r\n\r\n<p><strong>__USER__</strong>&nbsp;would like to contact you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>USER DETAILS</strong></p>\r\n\r\n<p><strong>Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>__USER_NAME__</strong></p>\r\n\r\n<p><strong>Email</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>__EMAIL__</strong></p>\r\n\r\n<p><strong>Phone</strong>&nbsp; &nbsp; &nbsp; <strong>__PHONE__</strong></p>\r\n\r\n<p><strong>Booking Ref No&nbsp;&nbsp;&nbsp;&nbsp; __BOOKING_NO__</strong></p>\r\n\r\n<p><strong>Message</strong>&nbsp;&nbsp; &nbsp;&nbsp;<strong>__MESSAGE__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Regards,</strong>&nbsp;<br />\r\n<br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n', 'Active'),
(63, 'driver_registration', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome to __SITE_TITLE__ </strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dear <strong>__USER__NAME__</strong>,&nbsp;</p>\r\n\r\n<p>You have successfully Registered in&nbsp;<strong>__SITE_TITLE__</strong> as Driver.</p>\r\n\r\n<p><strong>Your credentials</strong></p>\r\n\r\n<p>Email<strong>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;__EMAIL__</strong></p>\r\n\r\n<p>Password<strong>&nbsp; __PASSWORD__</strong></p>\r\n\r\n<p>We are really excited that you decide to try our services,welcome and thank you for the trust!!</p>\r\n\r\n<p>Please click this link for <strong>__ACCOUNT_ACTIVATOIN_LINK__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Regards,</strong>&nbsp;<br />\r\n<br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Active'),
(64, 'executive_registration', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome to __SITE_TITLE__ </strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dear <strong>__USER__NAME__</strong>,&nbsp;</p>\r\n\r\n<p>You have successfully Registered in&nbsp;<strong>__SITE_TITLE__</strong> as Executive.</p>\r\n\r\n<p><strong>Your credentials</strong></p>\r\n\r\n<p>Email<strong>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;__EMAIL__</strong></p>\r\n\r\n<p>Password<strong>&nbsp; __PASSWORD__</strong></p>\r\n\r\n<p>We are really excited that you decide to try our services,welcome and thank you for the trust!!</p>\r\n\r\n<p>Please click this link for <strong>__ACCOUNT_ACTIVATOIN_LINK__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Regards,</strong>&nbsp;<br />\r\n<br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Active'),
(65, 'when_admin_executive_confirm_cancel_delete_booking_template_mail_to_user', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>__SITE_LOGO__</strong></p>\r\n\r\n<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Welcome&nbsp;to&nbsp;__SITE_TITLE__ </strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dear <strong>__USER_NAME__</strong>,&nbsp;</p>\r\n\r\n<p><strong>__SITE_TITLE__</strong> Admin has <strong>__BOOKING_STATUS__</strong> your booking.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>DETAILS</strong></p>\r\n\r\n<p>Booking Reference Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__BOOKING_REF_NO__</strong></p>\r\n\r\n<p>Pick-Point&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__PICK_POINT__</strong></p>\r\n\r\n<p>Drop-Point&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DROP_POINT__</strong></p>\r\n\r\n<p>Pick Date &amp; Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DATE_TIME__</strong></p>\r\n\r\n<p>Return Journey Required&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__RETURN_JOURNEY__</strong></p>\r\n\r\n<p>Waiting Time &amp; Cost &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__WAITING_TIME__</strong></p>\r\n\r\n<p>Journey K.m./ Miles &amp; Time&nbsp;&nbsp; <strong>__MILES_TIME__</strong></p>\r\n\r\n<p>Car Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__CAR_TYPE__</strong></p>\r\n\r\n<p>Payment Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__PAYMENT_TYPE__</strong></p>\r\n\r\n<p>Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__AMOUNT__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Message to Driver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>__DRIVER_MSG__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We are really excited that you decide to try our services,welcome and thank you for the trust!!</p>\r\n\r\n<p>For any assistance or questions&nbsp;feel free to contact us at <strong>__CONTACT_US__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp;</p>\r\n\r\n<p><strong>Regards,</strong><br />\r\n<strong>__SITE_TITLE__</strong> | Cab Booking System</p>\r\n', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_faqs`
--

CREATE TABLE `vbs_faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(512) NOT NULL,
  `answer` varchar(512) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_faqs`
--

INSERT INTO `vbs_faqs` (`id`, `question`, `answer`, `status`) VALUES
(1, 'How to login as customer?', 'First of all you have to register as customer by giving simple personal details or else you can login through social links.', 'Active'),
(2, 'Can I give an email ID for multiple users?', 'No, Email ID must be unique for each and every User.', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_features`
--

CREATE TABLE `vbs_features` (
  `id` int(11) NOT NULL,
  `features` varchar(512) DEFAULT '',
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_features`
--

INSERT INTO `vbs_features` (`id`, `features`, `status`) VALUES
(1, 'AC', 'Active'),
(2, 'Video Coach', 'Active'),
(3, 'Wifi', 'Active'),
(5, 'Non-AC', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_groups`
--

CREATE TABLE `vbs_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_groups`
--

INSERT INTO `vbs_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'executives', 'Executives'),
(4, 'driver', 'Driver');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_instructions`
--

CREATE TABLE `vbs_instructions` (
  `id` int(11) NOT NULL,
  `title` varchar(512) NOT NULL,
  `content` varchar(512) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vbs_login_attempts`
--

CREATE TABLE `vbs_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vbs_package_settings`
--

CREATE TABLE `vbs_package_settings` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(222) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `hours` varchar(10) NOT NULL DEFAULT '',
  `distance` varchar(10) NOT NULL DEFAULT '',
  `min_cost` decimal(10,2) NOT NULL,
  `charge_distance` decimal(10,2) NOT NULL,
  `charge_hour` decimal(10,2) NOT NULL,
  `terms_conditions` longtext NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_package_settings`
--

INSERT INTO `vbs_package_settings` (`id`, `vehicle_id`, `name`, `hours`, `distance`, `min_cost`, `charge_distance`, `charge_hour`, `terms_conditions`, `status`) VALUES
(1, 4, 'Special Package', '3', '90', '100.00', '10.00', '50.00', '<p>1.If min distance is crossed then 10$ per every kilometer.</p>\r\n\r\n<p>2. If it is hourly based 50$ per every hour.</p>\r\n', 'Active'),
(2, 5, 'Test Package', '5', '150', '160.00', '15.00', '40.00', '<p>1.If min distance is crossed then 10$ per every kilometer.</p>\r\n\r\n<p>2. If it is hourly based 50$ per every hour.</p>\r\n', 'Active'),
(3, 6, 'Free Package', '10', '500', '500.00', '7.00', '100.00', '<p>1.If min distance is crossed then 10$ per every kilometer.</p>\r\n\r\n<p>2. If it is hourly based 50$ per every hour.</p>\r\n', 'Active'),
(4, 7, 'New Package', '4', '200', '250.00', '10.00', '50.00', '<p>1.If min distance is crossed then 10$ per every kilometer.</p>\r\n\r\n<p>2. If it is hourly based 50$ per every hour.</p>\r\n', 'Active'),
(5, 8, 'Limited Package', '3', '200', '50.00', '5.00', '40.00', '<p>1.If min distance is crossed then 10$ per every kilometer.</p>\r\n\r\n<p>2. If it is hourly based 50$ per every hour.</p>\r\n', 'Active'),
(6, 10, 'Big Sale Package', '12', '150', '100.00', '10.00', '20.00', '<p>1.If min distance is crossed then 10$ per every kilometer.</p>\r\n\r\n<p>2. If it is hourly based 50$ per every hour.</p>\r\n', 'Active'),
(7, 1, 'Mega Discount Package', '12', '1000', '500.00', '15.00', '100.00', '<p><span style=\"font-size:13.5pt\">1. If min distance is crossed then 10$ per every kilometer.</span></p>\r\n\r\n<p><span style=\"font-size:13.5pt\">2. If it is hourly based 50$ per every hour.</span></p>\r\n', 'Active'),
(8, 2, 'Best Sale Package', '4', '150', '100.00', '7.00', '50.00', '<p><span style=\"font-size:13.5pt\">1. If min distance is crossed then 10$ per every kilometer.</span></p>\r\n\r\n<p><span style=\"font-size:13.5pt\">2. If it is hourly based 50$ per every hour.</span></p>\r\n', 'Active'),
(9, 3, 'Supreme Package', '15', '1500', '200.00', '5.00', '20.00', '<p><span style=\"font-size:13.5pt\">1. If min distance is crossed then 10$ per every kilometer.</span></p>\r\n\r\n<p><span style=\"font-size:13.5pt\">2. If it is hourly based 50$ per every hour.</span></p>\r\n', 'Active'),
(10, 9, 'Demo Package', '5', '400', '500.00', '15.00', '150.00', '<p>1. If min distance is crossed then 10$ per every kilometer.</p>\r\n\r\n<p>2. If it is hourly based 50$ per every hour.</p>\r\n', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_payments`
--

CREATE TABLE `vbs_payments` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL,
  `transaction_id` varchar(512) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_status` enum('success','fail') NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vbs_paypal_settings`
--

CREATE TABLE `vbs_paypal_settings` (
  `id` int(11) NOT NULL,
  `paypal_email` varchar(512) NOT NULL,
  `currency` varchar(512) NOT NULL,
  `account_type` enum('sandbox','live') NOT NULL,
  `logo_image` varchar(512) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_paypal_settings`
--

INSERT INTO `vbs_paypal_settings` (`id`, `paypal_email`, `currency`, `account_type`, `logo_image`, `status`) VALUES
(1, 'digionlineexam@gmail.comm', 'TTD', 'sandbox', 'paypal_logo.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_payu_settings`
--

CREATE TABLE `vbs_payu_settings` (
  `id` int(11) NOT NULL,
  `test_merchant_key` varchar(20) NOT NULL,
  `test_salt` varchar(20) NOT NULL,
  `live_merchant_key` varchar(20) NOT NULL,
  `live_salt` varchar(20) NOT NULL,
  `mode` enum('test','live') NOT NULL DEFAULT 'test'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vbs_payu_settings`
--

INSERT INTO `vbs_payu_settings` (`id`, `test_merchant_key`, `test_salt`, `live_merchant_key`, `live_salt`, `mode`) VALUES
(1, 'do3vAdBt', 'O0nqoiMiY7', 'do3vAdBt', 'O0nqoiMiY7', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_reasons_to_book`
--

CREATE TABLE `vbs_reasons_to_book` (
  `id` int(11) NOT NULL,
  `title` varchar(512) NOT NULL,
  `content` varchar(512) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_reasons_to_book`
--

INSERT INTO `vbs_reasons_to_book` (`id`, `title`, `content`, `status`) VALUES
(1, 'Reasons to book with us', '<ul>\r\n <li>We promise that your minicab will be ready and waiting for you on time for your requested pick up.</li>\r\n <li>We promise that any minicab you book with us will be fully licensed and safe for your travels.</li>\r\n <li>We are competitive in market in regards quality of service and price we quote</li>\r\n <li>We try our level best to satisfy our customers</li>\r\n</ul>\r\n', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_seo_settings`
--

CREATE TABLE `vbs_seo_settings` (
  `id` int(11) NOT NULL,
  `site_description` varchar(512) NOT NULL,
  `meta_description` longtext NOT NULL,
  `site_keywords` varchar(512) NOT NULL,
  `google_analytics` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_seo_settings`
--

INSERT INTO `vbs_seo_settings` (`id`, `site_description`, `meta_description`, `site_keywords`, `google_analytics`) VALUES
(1, '<ul>\r\n <li><a href=\"#\">We promise that your minicab will be ready and waiting for you on time for your requested pick up.</a></li>\r\n <li><a href=\"#\">We are competitive in market in regards quality of service and price we quote</a></li>\r\n <li><a href=\"#\">We promise that any minicab you book with us will be fully licensed and safe for your travels.</a></li>\r\n <li><a href=\"#\">We try our level best to satisfy our customers with excellent service to there expectation</a></li>\r\n</ul>\r\n', 'Hello sdfsd', 'Advanced Car Booking System, Vehicle Booking System, Online Vehicle Booking System, Easy cab booking Application, Travel Booking System, Online Travel Booking System, Taxi Dispatch System, Taxi Online Booking Application, Cabs Management Software Application, Taxi Management System, Taxi Cab Website Booking System', '  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m[removed].insertBefore(a,m)   })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'__gaTracker\');      __gaTracker(\'create\', \'UA-64451071-1\', \'auto\');   __gaTracker(\'set\', \'forceSSL\', true);   __gaTracker(\'set\', \'anonymizeIp\', true);   __gaTracker(\'require\', \'displayfeatures\');   __gaTracker(\'require\', \'linkid\', \'linkid.js\');   __gaTracker(\'send\',\'pageview\');   ');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_sessions`
--

CREATE TABLE `vbs_sessions` (
  `id` varchar(128) CHARACTER SET utf8 NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vbs_sessions`
--

INSERT INTO `vbs_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('3jc529cla4fnvomfh6bjilneqgdgh5q0', '::1', 1511793583, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313739313335303b4642524c485f73746174657c733a33323a226230306561616161663033636232313761623030356462393834373534316539223b6964656e746974797c733a32393a22676f6c6c6170616c6c696a6f686e706574657240676d61696c2e636f6d223b757365726e616d657c733a32303a22476f6c6c6170616c6c69204a6f686e5065746572223b656d61696c7c733a32393a22676f6c6c6170616c6c696a6f686e706574657240676d61696c2e636f6d223b757365725f69647c733a323a223238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353131373634383734223b),
('74h67ibqhg4uvc2klprec5fsuebh6aqa', '::1', 1511760223, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313736303232333b6d6573736167657c733a3233323a22203c64697620636c6173733d27636f6c2d6d642d3132273e0a090909090909090909093c64697620636c6173733d27616c65727420616c6572742d73756363657373273e0a09090909090909090909093c6120687265663d27232720636c6173733d27636c6f73652720646174612d6469736d6973733d27616c657274273e2674696d65733b3c2f613e0a09090909090909090909093c7374726f6e673e53756363657373213c2f7374726f6e673e205375636365737366756c6c79206c6f67676564206f75740a090909090909090909093c2f6469763e0a0909090909090909093c2f6469763e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d4642524c485f73746174657c733a33323a226634643930313066323439343139643661313932376464336535333565633932223b),
('9fgd11hhmmhr8lh3i93v7df5io19toag', '10.0.0.30', 1511760489, 0x4642524c485f73746174657c733a33323a223462613434613739643639323361636536316164363735653236633763346436223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2241646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353131353936353432223b),
('bbprob8769hee3io7annnle2hj2k9lub', '::1', 1511882932, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313838323933323b6d6573736167657c733a3233323a22203c64697620636c6173733d27636f6c2d6d642d3132273e0a090909090909090909093c64697620636c6173733d27616c65727420616c6572742d73756363657373273e0a09090909090909090909093c6120687265663d27232720636c6173733d27636c6f73652720646174612d6469736d6973733d27616c657274273e2674696d65733b3c2f613e0a09090909090909090909093c7374726f6e673e53756363657373213c2f7374726f6e673e205375636365737366756c6c79206c6f67676564206f75740a090909090909090909093c2f6469763e0a0909090909090909093c2f6469763e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d4642524c485f73746174657c733a33323a223664643266303539333635343739666435646434323364393433383038356364223b),
('ca8brpo9og0is7nb69u68dvderglv0ik', '::1', 1511615537, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313631353533373b6d6573736167657c733a3233323a22203c64697620636c6173733d27636f6c2d6d642d3132273e0a090909090909090909093c64697620636c6173733d27616c65727420616c6572742d73756363657373273e0a09090909090909090909093c6120687265663d27232720636c6173733d27636c6f73652720646174612d6469736d6973733d27616c657274273e2674696d65733b3c2f613e0a09090909090909090909093c7374726f6e673e53756363657373213c2f7374726f6e673e205375636365737366756c6c79206c6f67676564206f75740a090909090909090909093c2f6469763e0a0909090909090909093c2f6469763e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d4642524c485f73746174657c733a33323a223233343937336334323365343539303439616538333963323136656235356231223b),
('fcksurd8ca920icuq9175i5jkijlros6', '::1', 1511760081, 0x6a6f75726e65795f64657461696c737c613a33323a7b733a373a227069636b5f7570223b733a34313a222257686974656669656c642c2042656e67616c7572752c204b61726e6174616b612c20496e64696122223b733a393a227069636b5f74797065223b733a313a224c223b733a373a2264726f705f6f66223b733a32383a2222576172616e67616c2c2054656c616e67616e612c20496e64696122223b733a393a2264726f705f74797065223b733a313a224c223b733a31313a22726164696f675f6461726b223b733a363a22315f37323530223b733a373a22636e616d655f31223b733a363a22776572776572223b733a373a22636e616d655f32223b733a363a22726574657274223b733a373a22636e616d655f33223b733a393a22746577747372657772223b733a373a22636e616d655f34223b733a343a2241756469223b733a373a22636e616d655f35223b733a343a2241756469223b733a373a22636e616d655f36223b733a343a2242656e7a223b733a373a22636e616d655f37223b733a343a2242656e7a223b733a373a22636e616d655f38223b733a333a22424d57223b733a373a22636e616d655f39223b733a333a22424d57223b733a383a22636e616d655f3130223b733a363a224a6167756172223b733a31303a22636865636b5f63617273223b733a313a2231223b733a393a227069636b5f64617465223b733a31303a2232382f31312f32303137223b733a393a227069636b5f74696d65223b733a31323a223039203a203533203a20414d223b733a31313a22776169746e52657475726e223b733a323a226f6e223b733a31323a2277616974696e675f74696d65223b733a31333a2231302e30305f3230204d696e73223b733a31343a2272657475726e5f6a6f75726e6579223b733a333a22596573223b733a31313a2277616974696e6754696d65223b733a373a223230204d696e73223b733a31313a2277616974696e67436f7374223b733a353a2231302e3030223b733a31323a227061636b6167655f74797065223b733a313a222d223b733a31313a22626f6f6b696e675f726566223b733a31323a22313731313237303935333430223b733a31353a2263757272656e63795f73796d626f6c223b733a313a2224223b733a393a226e6f5f726570656174223b733a313a2230223b733a383a226361725f636f7374223b733a343a2237323530223b733a31303a22746f74616c5f636f7374223b733a383a2231343531302e3030223b733a31303a22746f74616c5f74696d65223b733a32343a22313120686f7572732035206d696e732028417070726f7829223b733a31343a22746f74616c5f64697374616e6365223b733a363a22373232206b6d223b733a383a226361725f6e616d65223b733a363a22776572776572223b7d757365727c613a343a7b733a383a22757365726e616d65223b733a363a224e4156414e49223b733a353a22656d61696c223b733a32363a226e6176616e69636f6e717565726f727340676d61696c2e636f6d223b733a353a2270686f6e65223b733a31303a2231323132313231323132223b733a31313a22696e666f726d6174696f6e223b733a353a226673646664223b7d4642524c485f73746174657c733a33323a223964346162303866643766366265396266386461623163373931393732323966223b),
('h90h7efauaujvv699e1rq99l8uu8uv80', '::1', 1511936907, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313933363732383b4642524c485f73746174657c733a33323a223963333932646663386531383065393539653135656432323931643030626339223b),
('m1eb0fm7rgctk1jvgqhl4730pqhpdp7j', '::1', 1511882398, 0x4642524c485f73746174657c733a33323a223839646130663339653432353865376630343037333335393239303638396335223b6964656e746974797c733a32393a22676f6c6c6170616c6c696a6f686e706574657240676d61696c2e636f6d223b757365726e616d657c733a32303a22476f6c6c6170616c6c69204a6f686e5065746572223b656d61696c7c733a32393a22676f6c6c6170616c6c696a6f686e706574657240676d61696c2e636f6d223b757365725f69647c733a323a223238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353131383534303232223b6a6f75726e65795f64657461696c737c613a33303a7b733a373a227069636b5f7570223b733a33383a22224d6979617075722c204879646572616261642c2054656c616e67616e612c20496e64696122223b733a393a227069636b5f74797065223b733a313a224c223b733a373a2264726f705f6f66223b733a33393a2222426567756d7065742c204879646572616261642c2054656c616e67616e612c20496e64696122223b733a393a2264726f705f74797065223b733a313a224c223b733a393a227069636b5f64617465223b733a31303a2232392f31312f32303137223b733a393a227069636b5f74696d65223b733a31323a223038203a203235203a20504d223b733a31323a2277616974696e675f74696d65223b733a333a22302030223b733a31313a2277616974696e6754696d65223b733a31303a224e6f2057616974696e67223b733a31313a2277616974696e67436f7374223b733a313a2230223b733a31323a227061636b6167655f74797065223b733a313a222d223b733a31313a22626f6f6b696e675f726566223b733a31323a22313731313238323032353131223b733a393a226e6f5f726570656174223b733a313a2230223b733a383a226361725f636f7374223b733a333a22323438223b733a31303a22746f74616c5f636f7374223b733a333a22323438223b733a31303a22746f74616c5f74696d65223b733a31363a223438206d696e732028417070726f7829223b733a31343a22746f74616c5f64697374616e6365223b733a323a223139223b733a383a226361725f6e616d65223b733a363a22776572776572223b733a31303a22636865636b5f63617273223b733a313a2231223b733a31313a22726164696f675f6461726b223b733a353a22315f323438223b733a373a22636e616d655f31223b733a363a22776572776572223b733a373a22636e616d655f32223b733a363a22726574657274223b733a373a22636e616d655f33223b733a393a22746577747372657772223b733a373a22636e616d655f34223b733a343a2241756469223b733a373a22636e616d655f35223b733a343a2241756469223b733a373a22636e616d655f36223b733a343a2242656e7a223b733a373a22636e616d655f37223b733a343a2242656e7a223b733a373a22636e616d655f38223b733a333a22424d57223b733a373a22636e616d655f39223b733a333a22424d57223b733a383a22636e616d655f3130223b733a363a224a6167756172223b733a31353a2263757272656e63795f73796d626f6c223b733a313a2224223b7d626f6f6b696e67696e666f7c613a32353a7b733a373a22757365725f6964223b733a323a223238223b733a31313a22626f6f6b696e675f726566223b733a31323a22313731313238323032353131223b733a393a227069636b5f64617465223b733a31303a22313937302d30312d3031223b733a393a227069636b5f74696d65223b733a31323a223038203a203235203a20504d223b733a31303a227069636b5f706f696e74223b733a33383a22224d6979617075722c204879646572616261642c2054656c616e67616e612c20496e64696122223b733a31303a2264726f705f706f696e74223b733a33393a2222426567756d7065742c204879646572616261642c2054656c616e67616e612c20496e64696122223b733a383a2264697374616e6365223b733a323a223139223b733a31333a2264697374616e63655f74797065223b733a323a224b6d223b733a31363a2276656869636c655f73656c6563746564223b733a313a2231223b733a31353a22636f73745f6f665f6a6f75726e6579223b643a3236383b733a31323a227061796d656e745f74797065223b733a343a2270617975223b733a31323a2269735f636f6e666f726d6564223b733a373a2270656e64696e67223b733a383a22626f6f6b64617465223b733a31303a22323031372d31312d3238223b733a31353a22726567697374657265645f6e616d65223b733a32303a22476f6c6c6170616c6c69204a6f686e5065746572223b733a353a2270686f6e65223b733a31303a2237353639383631313937223b733a353a22656d61696c223b733a32393a22676f6c6c6170616c6c696a6f686e706574657240676d61696c2e636f6d223b733a31353a22696e666f5f746f5f64726976657273223b733a303a22223b733a31323a227061636b6167655f74797065223b733a313a222d223b733a31303a22746f74616c5f74696d65223b733a31363a223438206d696e732028417070726f7829223b733a31343a2272657475726e5f6a6f75726e6579223b733a323a224e6f223b733a31313a227461785f6170706c696564223b733a333a22596573223b733a31303a227461785f616d6f756e74223b733a353a2232302e3030223b733a31343a22636f75706f6e5f6170706c696564223b733a323a224e6f223b733a31313a22636f75706f6e5f636f6465223b4e3b733a32323a22636f75706f6e5f646973636f756e745f616d6f756e74223b4e3b7d757365727c613a343a7b733a383a22757365726e616d65223b733a32303a22476f6c6c6170616c6c69204a6f686e5065746572223b733a353a22656d61696c223b733a32393a22676f6c6c6170616c6c696a6f686e706574657240676d61696c2e636f6d223b733a353a2270686f6e65223b733a31303a2237353639383631313937223b733a31313a22696e666f726d6174696f6e223b733a303a22223b7d),
('m6f47gcdnbjoh4u613sj217etuvqd17c', '::1', 1511777121, ''),
('p6q75gi6i6qulkhtl6gsadvsct26s02q', '::1', 1511780339, 0x4642524c485f73746174657c733a33323a226234353730373137373136303466626566396338333439363936653463656262223b6964656e746974797c733a32393a22676f6c6c6170616c6c696a6f686e706574657240676d61696c2e636f6d223b757365726e616d657c733a32303a22476f6c6c6170616c6c69204a6f686e5065746572223b656d61696c7c733a32393a22676f6c6c6170616c6c696a6f686e706574657240676d61696c2e636f6d223b757365725f69647c733a323a223238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353131373634373735223b),
('psqhl1rv3m0945l1et8h7vuqkuge13tp', '::1', 1511760227, ''),
('r8vlveava336eg8dur14sr7btgss4hr4', '::1', 1511760227, ''),
('usdkneu8t7khdf1e9d0b35t7r5e7u5tv', '::1', 1511780810, 0x4642524c485f73746174657c733a33323a223330376334313739656366316261396631393565306639373635326535333635223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2241646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353131373630303931223b),
('vpreepqqivik765b00d8i6jgp1roeqdj', '::1', 1511615580, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313631353537393b6d6573736167657c733a3233323a22203c64697620636c6173733d27636f6c2d6d642d3132273e0a090909090909090909093c64697620636c6173733d27616c65727420616c6572742d73756363657373273e0a09090909090909090909093c6120687265663d27232720636c6173733d27636c6f73652720646174612d6469736d6973733d27616c657274273e2674696d65733b3c2f613e0a09090909090909090909093c7374726f6e673e53756363657373213c2f7374726f6e673e205375636365737366756c6c79206c6f67676564206f75740a090909090909090909093c2f6469763e0a0909090909090909093c2f6469763e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d4642524c485f73746174657c733a33323a223939626662323631316362663137333061383531336135356263646532376466223b);

-- --------------------------------------------------------

--
-- Table structure for table `vbs_sessions_20112017`
--

CREATE TABLE `vbs_sessions_20112017` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` bigint(20) NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_sessions_20112017`
--

INSERT INTO `vbs_sessions_20112017` (`id`, `ip_address`, `timestamp`, `data`, `user_agent`, `last_activity`) VALUES
('e6cls1blnb8ug8pe6ldrkh16vj', '::1', 1511011205, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011169\";message|s:22:\"Successfully logged In\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}', '', 0),
('80moomr4g9kdobo5hga5uu71f6', '::1', 1511011206, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011205\";', '', 0),
('a18dllp5ghuq5l3bkfaksdl5qo', '::1', 1511011206, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011206\";', '', 0),
('a16jagtus31gil5hoa7jmll1qj', '::1', 1511011322, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011206\";', '', 0),
('fvf3unksnamssal24f9gj95r4k', '::1', 1511011323, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011322\";', '', 0),
('leipj96gok6ihdgpfacj9irg9d', '::1', 1511011323, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011323\";', '', 0),
('r6q0vepsogmsshkgaou1m79vhh', '::1', 1511011349, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011323\";', '', 0),
('pac5jdom1ft655f4l88s9bsdoi', '::1', 1511011367, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011349\";', '', 0),
('1vqr1nop13q53pvqo6gct7sbu8', '::1', 1511011371, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011367\";', '', 0),
('nqnq1e6q9lp2kcpp9hefdjuf50', '::1', 1511011372, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011371\";', '', 0),
('uhfhsgu7p2oqcpsu089pu77q4s', '::1', 1511011372, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011372\";', '', 0),
('o0v23ooe90rtobmb5gu558q60a', '::1', 1511011373, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011372\";', '', 0),
('lt1k1ma4aeanispv0c79fqipgq', '::1', 1511011377, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011373\";', '', 0),
('s0sv6n5tfmra9fv1tevthv8k1n', '::1', 1511011379, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011377\";message|s:237:\" <div class=\'col-md-12\'>\n										<div class=\'alert alert-success\'>\n											<a href=\'#\' class=\'close\' data-dismiss=\'alert\'>&times;</a>\n											<strong>Success!</strong> Airport Updated Successfully\n										</div>\n									</div>\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}', '', 0),
('meogv8j6hib2eiuedkgfb9ud4e', '::1', 1511011464, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011379\";', '', 0),
('3iu7km8b40419cm1luonn3838a', '::1', 1511011464, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011464\";', '', 0),
('acnb6mcff12u6ntiobdssfgvmn', '::1', 1511011466, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011464\";', '', 0),
('8oc9k9i21dp07111qa7sano6i7', '::1', 1511011469, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011466\";', '', 0),
('f8musne6jdjhburkenklq2ib6r', '::1', 1511011470, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011469\";', '', 0),
('ho6fi1t2kl4c93p1ahlh0pu1rb', '::1', 1511011470, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011470\";', '', 0),
('b78jcvk6pr9ks5qpdufequ8pag', '::1', 1511011471, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011470\";', '', 0),
('cq300ldt2cbth66chm0vgfp69l', '::1', 1511011472, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011471\";', '', 0),
('7jve5pkasfalcutsmpu1v3451u', '::1', 1511011473, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011472\";', '', 0),
('i7pkjm4e39u2b5ovu2vbmdeko0', '::1', 1511011478, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011473\";', '', 0),
('jgm446ktfjui74cgaiv6mj70vk', '::1', 1511011479, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011478\";', '', 0),
('m8ocba6vl0ug1nknj1bhheeosb', '::1', 1511011479, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011479\";', '', 0),
('g9pdrsloj8beflpkn1ame3g5vd', '::1', 1511011480, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011479\";', '', 0),
('8hq2soj9mbg4j6pb8fq1sc2etv', '::1', 1511011482, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011480\";', '', 0),
('kh27r80u42g4hok94d2cq2neh6', '::1', 1511011484, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011482\";', '', 0),
('fbk8vab179n44tvtpnfv870moe', '::1', 1511011486, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011484\";', '', 0),
('6jeqgkna0bf7f1nf4lj7kbjhrb', '::1', 1511011487, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011486\";', '', 0),
('orj82pfcpf4gjac1qvbe28opt8', '::1', 1511011487, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011487\";', '', 0),
('mcbab5ov0gf0086l77ndfiohjl', '::1', 1511011488, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011487\";', '', 0),
('14asdk53f14cq2sjtejjkj883p', '::1', 1511011489, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011488\";', '', 0),
('g6bprqb3213liqiq6a48kadp95', '::1', 1511011492, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011489\";message|s:237:\" <div class=\'col-md-12\'>\n										<div class=\'alert alert-success\'>\n											<a href=\'#\' class=\'close\' data-dismiss=\'alert\'>&times;</a>\n											<strong>Success!</strong> Airport Updated Successfully\n										</div>\n									</div>\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}', '', 0),
('s71pc6mgd7d3g62rr8v5lmm32k', '::1', 1511011492, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011492\";', '', 0),
('6hmf0fltm47lkh6mopbjrl9590', '::1', 1511011493, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011492\";', '', 0),
('33rmcl70vhecht5hfho9uibei3', '::1', 1511011493, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011492\";', '', 0),
('iouj7antf56aomv0v6ahr13bs1', '::1', 1511011754, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011493\";', '', 0),
('4srle0mlde1kodfnkvec107qj8', '::1', 1511011756, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011754\";', '', 0),
('vc60nalcesho0rrl2hkp8oiehp', '::1', 1511011851, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011756\";', '', 0),
('0kb2svr6d8s3ab1t2f9spb09rj', '::1', 1511011853, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011851\";', '', 0),
('s9jflkjfedu1kpkab2lauimes6', '::1', 1511011855, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011853\";', '', 0),
('8134tdvd5apmmos2boj9796je6', '::1', 1511011859, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011855\";message|s:237:\" <div class=\'col-md-12\'>\n										<div class=\'alert alert-success\'>\n											<a href=\'#\' class=\'close\' data-dismiss=\'alert\'>&times;</a>\n											<strong>Success!</strong> Airport Updated Successfully\n										</div>\n									</div>\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}', '', 0),
('u0jt6c2nhm5nas4das16e6rkjs', '::1', 1511011859, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011859\";', '', 0),
('6b6r6jq10a49d1qj52dgfasd88', '::1', 1511011860, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011859\";', '', 0),
('5fc16d1keg6c6acf2nar3128h5', '::1', 1511011860, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011860\";', '', 0),
('gbkaobrn81c9dr0aceaictnkp0', '::1', 1511153561, '', '', 0),
('gmctkvk4n837dqsjil8u7vlofb', '::1', 1511154685, '', '', 0),
('m9ouh1nidpbmim08mjrmv78agl', '::1', 1511154725, '', '', 0),
('f07h11uvl15crqbucqg72fpqjo', '10.0.0.30', 1511154925, '', '', 0),
('svrmmhc0nmsbnneuuka881rl3n', '10.0.0.30', 1511154929, '', '', 0),
('vuv9n2n13q78heglig9jtrljmh', '10.0.0.30', 1511154943, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511011860\";message|s:22:\"Successfully logged In\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}', '', 0),
('pe0rh08gg6m1d6892tiuoaiknr', '10.0.0.30', 1511154943, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511154943\";', '', 0),
('i3lg7dfu378aib695vp287hk9n', '10.0.0.30', 1511154944, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511154943\";', '', 0),
('osso36n2lvejdoq7935or6ug08', '10.0.0.30', 1511154950, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511154943\";', '', 0),
('aq6itku40n21nvocoktkoskjea', '10.0.0.30', 1511154951, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511154950\";', '', 0),
('cvq1khrrpmsugonce18qsukc09', '10.0.0.30', 1511154951, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511154951\";', '', 0),
('p05msi92ucdeud8rpfphs5ii1h', '10.0.0.30', 1511154955, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511154951\";', '', 0),
('rn2cnvsq90i5bo94bkjhs9ubam', '10.0.0.30', 1511154960, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511154954\";', '', 0),
('qjgf0hjmd95j7fjdmvv9utlvs2', '10.0.0.30', 1511154964, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511154959\";', '', 0),
('hv6j21leijc3a3jvidllsljseb', '10.0.0.30', 1511154969, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511154964\";', '', 0),
('1vq2lhrvafubaedpa55e7q7lbp', '10.0.0.30', 1511154970, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511154969\";', '', 0),
('lntig22rad1n8jlesdidg9ge8g', '10.0.0.30', 1511154970, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511154970\";', '', 0),
('l566q4vkbqcotkiou84leeutjk', '10.0.0.30', 1511154973, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511154970\";', '', 0),
('nj7pb9qk7gl00i9csj4kqarmbs', '10.0.0.30', 1511155017, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511154973\";', '', 0),
('rmfnk9e62miufkdp079kfc5fkg', '10.0.0.30', 1511155023, 'message|s:227:\" <div class=\'col-md-12\'>\n										<div class=\'alert alert-info\'>\n											<a href=\'#\' class=\'close\' data-dismiss=\'alert\'>&times;</a>\n											<strong>Info!</strong> Please Login to Continue\n										</div>\n									</div>\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}', '', 0),
('l2bps2039mnbg5s0ipd8nrb5cg', '10.0.0.30', 1511155023, '', '', 0),
('ssbh9jh1i4hr5n01mg5ffoko2j', '::1', 1511155039, 'msg|s:11:\"TESTING MSG\";__ci_vars|a:1:{s:3:\"msg\";s:3:\"new\";}', '', 0),
('tqa3vc9755ukola9kq6un6im4t', '::1', 1511155039, '', '', 0),
('hlt18su2puof2cgajtq6h8lvsq', '::1', 1511155048, '', '', 0),
('vam93jchlp55v90irr6fclrg5a', '::1', 1511155057, '', '', 0),
('tm4vvkablbpk6s4mhj93iel2pn', '10.0.0.30', 1511155066, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511155017\";', '', 0),
('skhbfshve1uf58e76nkmbjd7sc', '::1', 1511155103, '', '', 0),
('u8b9qiuemivm59c1frk9qeorhk', '::1', 1511155142, '', '', 0),
('flecehjn0s65hs2khu0g73nr6j', '::1', 1511155145, 'message|s:11:\"TESTING MSG\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}', '', 0),
('tvrqvkg6hrhvklsv62tm0bd5u1', '::1', 1511155145, '', '', 0),
('m804k262u5qq5dj89v1c6109be', '10.0.0.30', 1511155213, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511155066\";', '', 0),
('s81n8i4rug5kql2fbbvqe6qc08', '10.0.0.30', 1511155213, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511155213\";', '', 0),
('inlpfu9pga6vdj033kml0t3346', '10.0.0.30', 1511155213, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511155213\";', '', 0),
('hkrbfph7615v7e4aan4oslpgap', '10.0.0.30', 1511155222, '', '', 0),
('jbgn6usg4b02blqaqmhcg0da4c', '10.0.0.30', 1511155237, 'identity|s:27:\"happychristiana95@gmail.com\";username|s:16:\"Happy Christiana\";email|s:27:\"happychristiana95@gmail.com\";user_id|s:1:\"9\";old_last_login|s:10:\"1511010551\";message|s:22:\"Successfully logged In\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}', '', 0),
('41usp0lr6vpqcupvds2s8fjnvs', '10.0.0.30', 1511155237, 'identity|s:27:\"happychristiana95@gmail.com\";username|s:16:\"Happy Christiana\";email|s:27:\"happychristiana95@gmail.com\";user_id|s:1:\"9\";old_last_login|s:10:\"1511155236\";', '', 0),
('km8o2u22le6dlt1qu00h1gsgap', '10.0.0.30', 1511155237, 'identity|s:27:\"happychristiana95@gmail.com\";username|s:16:\"Happy Christiana\";email|s:27:\"happychristiana95@gmail.com\";user_id|s:1:\"9\";old_last_login|s:10:\"1511155237\";', '', 0),
('bjeik9ulsmdqq08fkj13osk9ma', '::1', 1511155353, '', '', 0),
('pb4esn1qf6cdiocds9a2mmomsc', '::1', 1511155386, '', '', 0),
('59ifin6jsose7g5ciaonuciv5s', '::1', 1511155413, '', '', 0),
('l89nmjjdjp4mfid6e376b1a12c', '::1', 1511155476, '', '', 0),
('uvfbuldnbm8dckvap8ig7bsvho', '::1', 1511155491, '', '', 0),
('vclgdb18mssrgcpn0akk6g0dvd', '::1', 1511155502, '', '', 0),
('gqj0c8290rmp9u1e0i4f36a171', '::1', 1511155692, '', '', 0),
('uinov0evnbstin9egk6h0tahj2', '::1', 1511155695, '', '', 0),
('vokkigq1bgb331rp1fmcdtprb9', '::1', 1511155698, 'message|s:11:\"TESTING MSG\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}', '', 0),
('a0ms2tr2748427kvq1ieiq2qf1', '::1', 1511155698, '', '', 0),
('58q234j47lsn6e664qo60ao3mf', '::1', 1511155701, '', '', 0),
('b09tlqqmgopgj77thc3p1ha138', '::1', 1511155702, '', '', 0),
('b982q6k5el9d1amqtu7tainonf', '::1', 1511155702, '', '', 0),
('nkvklpm3mhge64bdkndp40l1gp', '::1', 1511155789, '', '', 0),
('qqcj0vdgesq6l7spt59vr39ufl', '::1', 1511155790, '', '', 0),
('l5qrm8qhfh0fan8hd57pd83ehd', '::1', 1511155807, '', '', 0),
('abv4au7173kio5d4qakak2fnhh', '::1', 1511155838, '', '', 0),
('5f8loqn76mc07ocafvupfjicne', '::1', 1511155841, 'message|s:11:\"TESTING MSG\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}', '', 0),
('iqmc35fjf9l76dhs966gc9h81i', '::1', 1511155841, '', '', 0),
('plgn89b2i3oeqidh6b361bmpap', '::1', 1511155845, '', '', 0),
('jsot9jn5hbe7m594pv82hukr8f', '::1', 1511155851, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511155213\";message|s:22:\"Successfully logged In\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}', '', 0),
('su6nnk460jdc83ssjha9n8one7', '::1', 1511155852, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511155851\";', '', 0),
('rak1g70h8erbvo0fb7qoq13mr5', '::1', 1511155852, 'identity|s:15:\"admin@admin.com\";username|s:13:\"Administrator\";email|s:15:\"admin@admin.com\";user_id|s:1:\"1\";old_last_login|s:10:\"1511155851\";', '', 0),
('rei39g7u69ur93olg8cd2kapkt', '::1', 1511155854, '', '', 0),
('enubvrei1112m57dqj1sioms6c', '::1', 1511156008, 'message|s:11:\"TESTING MSG\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}', '', 0),
('op3p04v5aj0mmlo3vvb63b0d5c', '::1', 1511156008, '', '', 0),
('a9i37hlt9if7p21ll4muh3kuhq', '::1', 1511156009, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vbs_site_settings`
--

CREATE TABLE `vbs_site_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(512) NOT NULL,
  `address` varchar(512) NOT NULL,
  `city` varchar(512) NOT NULL,
  `state` varchar(512) NOT NULL,
  `country` varchar(512) NOT NULL,
  `zip` varchar(512) NOT NULL,
  `phone` varchar(512) NOT NULL,
  `land_line` varchar(512) NOT NULL,
  `fax` varchar(512) NOT NULL,
  `portal_email` varchar(512) NOT NULL,
  `site_country` varchar(512) NOT NULL,
  `distance_type` enum('Km','Mi') NOT NULL DEFAULT 'Km',
  `waiting_time` enum('Enable','Disable') NOT NULL,
  `airports_status` enum('Enable','Disable') NOT NULL,
  `day_start_time` varchar(512) NOT NULL,
  `day_end_time` varchar(512) NOT NULL,
  `night_start_time` varchar(512) NOT NULL,
  `night_end_time` varchar(512) NOT NULL,
  `site_theme` enum('Red','Yellow') NOT NULL DEFAULT 'Yellow',
  `email_type` enum('PHP mail','Sendmail','Gmail SMTP') NOT NULL,
  `design_by` varchar(512) NOT NULL,
  `url_for_design_by` varchar(512) NOT NULL,
  `rights_reserved_content` varchar(512) NOT NULL,
  `map` varchar(512) NOT NULL,
  `paypal` int(11) NOT NULL DEFAULT '0',
  `stripe` int(11) NOT NULL,
  `payu` int(11) NOT NULL,
  `cash` int(11) NOT NULL DEFAULT '0',
  `credit` int(11) NOT NULL DEFAULT '0',
  `date_formats` enum('mm/dd/YYYY','mm/YYYY/dd','dd/mm/YYYY','dd/YYYY/mm','YYYY/mm/dd','YYYY/dd/mm','mm.dd.YYYY','mm.YYYY.dd','dd.mm.YYYY','dd.YYYY.mm','YYYY.mm.dd','YYYY.dd.mm','mm-dd-YYYY','mm-YYYY-dd','dd-mm-YYYY','dd-YYYY-mm','YYYY-dd-mm','YYYY-mm-dd') NOT NULL,
  `time_zone` varchar(512) NOT NULL,
  `contact_map` varchar(2000) NOT NULL,
  `site_logo` varchar(512) NOT NULL,
  `site_currency` varchar(512) NOT NULL DEFAULT '',
  `driver_charge_night` int(11) NOT NULL DEFAULT '0',
  `currency_symbol` varchar(512) NOT NULL DEFAULT '',
  `site_title` varchar(512) NOT NULL DEFAULT '',
  `default_language` varchar(512) NOT NULL,
  `language_dropdown` enum('Enable','Disable') NOT NULL DEFAULT 'Enable',
  `pick_point_placeholder` varchar(512) NOT NULL DEFAULT '',
  `drop_point_placeholder` varchar(512) NOT NULL DEFAULT '',
  `google_api_key` varchar(100) DEFAULT NULL,
  `fevicon` varchar(50) DEFAULT NULL,
  `country_code` varchar(10) DEFAULT NULL,
  `apply_tax` enum('Yes','No') DEFAULT NULL,
  `tax_amount` float(10,2) DEFAULT NULL,
  `sms_notification` enum('Yes','No') DEFAULT NULL,
  `facebook_app_id` varchar(500) DEFAULT NULL,
  `facebook_app_secret` varchar(500) DEFAULT NULL,
  `google_client_id` varchar(500) DEFAULT NULL,
  `google_client_secret` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_site_settings`
--

INSERT INTO `vbs_site_settings` (`id`, `site_name`, `address`, `city`, `state`, `country`, `zip`, `phone`, `land_line`, `fax`, `portal_email`, `site_country`, `distance_type`, `waiting_time`, `airports_status`, `day_start_time`, `day_end_time`, `night_start_time`, `night_end_time`, `site_theme`, `email_type`, `design_by`, `url_for_design_by`, `rights_reserved_content`, `map`, `paypal`, `stripe`, `payu`, `cash`, `credit`, `date_formats`, `time_zone`, `contact_map`, `site_logo`, `site_currency`, `driver_charge_night`, `currency_symbol`, `site_title`, `default_language`, `language_dropdown`, `pick_point_placeholder`, `drop_point_placeholder`, `google_api_key`, `fevicon`, `country_code`, `apply_tax`, `tax_amount`, `sms_notification`, `facebook_app_id`, `facebook_app_secret`, `google_client_id`, `google_client_secret`) VALUES
(1, 'your My', 'Hitech city', 'Hyderabad', 'Telangana', 'India', '500090', '1234567891', '+040 - 00 333 000', '6756666', 'digitalvidhya4u@gmail.com', 'in', 'Km', 'Enable', 'Enable', '5:00', '20:00', '20:00', '5:00', 'Yellow', 'Sendmail', 'Digital Vidhya', 'http://yoururl.com', '© Digi Advanced Cab Booking System 2017. All rights reserved.', '', 1, 1, 1, 1, 0, 'dd/mm/YYYY', 'Asia/Calcutta', '<script type=\"text/javascript\"> function init_map(){var myOptions = {zoom:17,center:new google.maps.LatLng(17.45143909381126,78.38544047965388),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById(\"gmap_canvas\"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(17.45143909381126, 78.38544047965388)});infowindow = new google.maps.InfoWindow({content:\"<b>Digital Vidhya</b><br/>Plot No.16, 3rd Floor, Triveni Towers Silicon Valley, 100 Feet Road, Madhapur, Hitech City, Hyderabad, Telangana 500081, India<br/>500081 hyderabad,telangana\" });google.maps.event.addListener(marker, \"click\", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, \'load\', init_map);</script>                                                             ', 'site_logo_1.jpg', 'USD', 0, '$', 'Booking System', 'en', 'Enable', '25th Street, San Francisco, CA, United Statez', '19th Street, San Francisco, CA, United Statez', 'AIzaSyDO_lURb8GWwWr1uf2oIlH9Rx1NL9i2gWg', 'fevicon.ico', NULL, 'Yes', 20.00, 'Yes', '514671242257849', '5d73aa9a3482466487b688a3ce05cc51', '979191856851-m9o17a53f19uubgoulb4t26errgjj00u.apps.googleusercontent.com', 'WDGteCscn4gNyhncbCLCgJtx');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_sms_gate_ways`
--

CREATE TABLE `vbs_sms_gate_ways` (
  `sms_gateway_id` int(11) NOT NULL,
  `sms_gateway_name` varchar(50) NOT NULL,
  `is_default` enum('Yes','No') NOT NULL DEFAULT 'No',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_sms_gate_ways`
--

INSERT INTO `vbs_sms_gate_ways` (`sms_gateway_id`, `sms_gateway_name`, `is_default`, `status`) VALUES
(1, 'Cliakatell', 'No', 'Active'),
(2, 'Nexmo', 'No', 'Active'),
(3, 'Plivo', 'No', 'Active'),
(4, 'Solutionsinfini', 'No', 'Active'),
(5, 'Twilio', 'Yes', 'Active'),
(7, 'MSG91', 'No', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_sms_templates`
--

CREATE TABLE `vbs_sms_templates` (
  `sms_template_id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `sms_template` varchar(1000) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_sms_templates`
--

INSERT INTO `vbs_sms_templates` (`sms_template_id`, `subject`, `sms_template`, `status`) VALUES
(6, 'send_coupon', '<p>Use Coupon <strong>__COUPON_CODE__</strong> , Get <strong>__DISCOUNT_AMOUNT__</strong> on booking.</p>\r\n', 'Active'),
(3, 'booking_successful', '<p>Thanks for using <strong>__SITE__TITLE__</strong></p>\r\n\r\n<p>Booking Reference No <strong>__BOOKING_REF__NO__</strong></p>\r\n\r\n<p>Total Cost <strong>__TOTAL__COST__</strong></p>\r\n', 'Active'),
(4, 'booking_status_changed', '<p>Dear <strong>__USER__</strong> ,</p>\r\n\r\n<p>Your Booking has been&nbsp; <strong>__BOOKING_STATUS__</strong></p>\r\n\r\n<p>Booking Reference No&nbsp;&nbsp; <strong>__BOOKING_REF_NO__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Active'),
(5, 'booking_deleted', '<p>Dear <strong>__USER__</strong></p>\r\n\r\n<p>Your booking has been Deleted.</p>\r\n\r\n<p>Booking Reference No&nbsp; <strong>__BOOKING_REF_NO__</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_social_networks`
--

CREATE TABLE `vbs_social_networks` (
  `id` int(11) NOT NULL,
  `facebook` varchar(512) NOT NULL,
  `twitter` varchar(512) NOT NULL,
  `linkedin` varchar(512) NOT NULL,
  `google_plus` varchar(512) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_social_networks`
--

INSERT INTO `vbs_social_networks` (`id`, `facebook`, `twitter`, `linkedin`, `google_plus`) VALUES
(1, 'https://www.facebook.com/Digitalvidhya', 'https://twitter.com/Digitalvidhya', 'https://in.linkedin.com/', 'https://plus.google.com/discover');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_stripe_settings`
--

CREATE TABLE `vbs_stripe_settings` (
  `id` int(11) NOT NULL,
  `stripe_key_test_public` varchar(50) NOT NULL,
  `stripe_key_test_secret` varchar(50) NOT NULL,
  `stripe_key_live_public` varchar(50) NOT NULL,
  `stripe_key_live_secret` varchar(50) NOT NULL,
  `stripe_test_mode` enum('TRUE','FALSE') NOT NULL DEFAULT 'TRUE',
  `currency` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vbs_stripe_settings`
--

INSERT INTO `vbs_stripe_settings` (`id`, `stripe_key_test_public`, `stripe_key_test_secret`, `stripe_key_live_public`, `stripe_key_live_secret`, `stripe_test_mode`, `currency`) VALUES
(1, 'pk_test_BwFHanUSeVVsUwZTv33KCoXG', 'sk_test_jxMAHpVvwcmHvv1343esaLgz', 'pk_test_BwFHanUSeVVsUwZTv33KCoXG', 'sk_test_jxMAHpVvwcmHvv1343esaLgz', 'TRUE', 'INR');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_system_settings_fields`
--

CREATE TABLE `vbs_system_settings_fields` (
  `field_id` int(11) NOT NULL,
  `sms_gateway_id` int(11) DEFAULT NULL,
  `field_name` varchar(256) NOT NULL,
  `field_key` varchar(50) NOT NULL,
  `is_required` char(5) DEFAULT 'No',
  `field_output_value` text,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_system_settings_fields`
--

INSERT INTO `vbs_system_settings_fields` (`field_id`, `sms_gateway_id`, `field_name`, `field_key`, `is_required`, `field_output_value`, `created`, `updated`) VALUES
(125, 1, 'User Name', 'User_Name', 'Yes', 'johnpeter', '2016-07-25 11:20:38', '2017-11-18 01:28:51'),
(126, 1, 'Password', 'Password', 'Yes', 'aYBSNZAOYPdUab', '2016-07-25 12:29:11', '2017-11-18 01:28:51'),
(127, 1, 'From No', 'From_No', 'Yes', '7569861197', '2016-07-25 12:29:47', '2017-11-18 01:28:51'),
(128, 1, 'API Id', 'API_Id', 'Yes', '3614745', '2016-07-25 12:30:10', '2017-11-18 01:28:51'),
(129, 2, 'API KEY', 'API_KEY', 'Yes', 'd0e587bc', '2016-07-26 05:51:28', '2017-05-19 12:46:38'),
(130, 2, 'API SECRET', 'API_SECRET', 'Yes', '66d2cc36a62ab814', '2016-07-26 06:00:50', '2017-05-19 12:46:38'),
(131, 3, 'AUTH ID', 'AUTH_ID', 'Yes', 'MANZQXNJC4MZLHOTHIMD', '2016-07-26 09:26:52', '2017-03-22 07:25:38'),
(132, 3, 'AUTH TOKEN', 'AUTH_TOKEN', 'Yes', 'MDE0ZjE0OTVhMGM5NTVhNzA0MDkwZTY2ZWJiZTE0', '2016-07-26 09:27:16', '2017-03-22 07:25:38'),
(133, 3, 'API VERSION', 'API_VERSION', 'Yes', 'v1', '2016-07-26 09:27:49', '2017-03-22 07:25:38'),
(134, 3, 'END POINT', 'END_POINT', 'Yes', 'https://api.plivo.com', '2016-07-26 09:28:14', '2017-03-22 07:25:38'),
(135, 4, 'Working Key', 'working_key', 'Yes', 'A03b780b9662f5cc19f5541a6e3858478', '2016-07-26 09:29:30', NULL),
(136, 4, 'Sender Id', 'sender_id', 'Yes', 'SIDEMO', '2016-07-26 09:29:53', NULL),
(137, 4, 'API URL', 'api', 'Yes', 'http://alerts.solutionsinfini.com/', '2016-07-26 09:30:15', NULL),
(138, 5, 'Account SID', 'account_sid', 'Yes', 'ACff3b29777137e40375a95a0ea99b1795', '2016-07-26 09:31:21', '2017-10-18 14:45:43'),
(139, 5, 'Auth Token', 'auth_token', 'Yes', '6a7e71d44a2e9d0dd6fedf9b2b600265', '2016-07-26 09:31:54', '2017-10-18 14:45:43'),
(140, 5, 'API Version', 'api_version', 'Yes', '2010-04-01', '2016-07-26 09:32:20', '2017-10-18 14:45:43'),
(141, 5, 'Twilio Phone Number', 'Twilio_Phone_Number', 'Yes', '+15005550006', '2016-07-26 09:32:57', '2017-10-18 14:45:43'),
(142, 7, 'AUTH', 'AUTH', 'Yes', '129908A4YfZq1kO581745f5', '2016-11-17 08:03:11', '2017-11-18 00:45:57'),
(143, 7, 'SENDER_ID', 'SENDER_ID', 'Yes', '102234', '2016-11-17 08:03:11', '2017-11-18 00:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_testimonials_settings`
--

CREATE TABLE `vbs_testimonials_settings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(512) NOT NULL,
  `title` varchar(512) NOT NULL,
  `user_photo` varchar(512) NOT NULL,
  `content` varchar(512) NOT NULL,
  `added_date` date NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_testimonials_settings`
--

INSERT INTO `vbs_testimonials_settings` (`id`, `user_id`, `user_name`, `title`, `user_photo`, `content`, `added_date`, `status`) VALUES
(1, 7, 'Customer One', 'Feedback', '', 'Good product', '2017-11-17', 'Active'),
(2, 0, 'Happy Christiana', 'About Vehicles', 'opel-2920765__340.png', 'Nice vehicles and maintaining time punctuality', '2017-11-18', 'Active'),
(3, 0, 'Sravanthi Ravula', 'About App', 'image(5).jpg', 'Happy to have this App because am able to book the cab from my home', '2017-11-21', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_users`
--

CREATE TABLE `vbs_users` (
  `id` int(25) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(512) NOT NULL,
  `date_of_registration` date NOT NULL,
  `license` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_users`
--

INSERT INTO `vbs_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`, `image`, `date_of_registration`, `license`) VALUES
(1, '127.0.0.1', 'Administrator', '$2y$08$xIoOEWzHjeuyHWy1Gs9B8eea9MRWmdEakrKfZ8cXyystWgappnBsW', '', 'admin@admin.com', '', 'W3EONGQDtY2XqdEjE33niO6d4a4c02cf134c3769', 1510830309, 'JPMWzFVsRko3HOfn1RRz0.', 1268889823, 1511936661, 1, 'Admin', 'istrator', '9898989898', 'Art-Student.jpg', '2014-06-22', NULL),
(7, '::1', 'Customer One', '$2y$08$2gyT5otJOQz5cNHTdSccSuu9jvbk7nO24QofOjHKwBZZ31NX1Sm6y', NULL, 'customer@customer.com', NULL, NULL, NULL, 'IEiCaEBuik8JRbmAQUtztu', 1488879001, 1511173477, 1, 'Customer', 'One', '+91 (123) 4567 890', '', '2017-03-07', NULL),
(8, '::1', 'test Executive', '$2y$08$63poCOGa3Lyq37cfdNVLf.MMYXM6GkRIeFDZ1MXoH4RoY2zMHUIBi', NULL, 'testexecutive@gmail.com', 'd12b614b24ab51de000e5b1fd16fa3246da87340', NULL, NULL, '2CueLzUgMTZcw6W51MuG/.', 1510910015, 1511609255, 1, 'test', 'Executive', '9988776655', '', '2017-11-17', NULL),
(9, '10.0.0.30', 'Happy Christiana', '$2y$08$fi/dgf7fAHP.t2XwajAxhOuvHbLthrQJh4yrx4d0TKy79gAHRtIOa', NULL, 'happychristiana95@gmail.com', NULL, NULL, NULL, 'HucHkA8yGhfICsUOQqtExu', 1510986168, 1511242789, 1, 'Happy', 'Christiana', '7897897891', '', '2017-11-18', NULL),
(10, '10.0.0.30', 'Sravanthi Ravula', '$2y$08$Zz0KHylEgtU0Z7vrM6LLuuU7BtJJCrTtsU24vQX.EHZEmT15w87p6', NULL, 'sravanthir031@gmail.com', NULL, NULL, NULL, 'o0.J65ltGL8UiN2MnvjoH.', 1510986441, 1511609391, 1, 'Sravanthi', 'Ravula', '7897897892', '', '2017-11-18', NULL),
(11, '10.0.0.30', 'Stella Blessy', '$2y$08$RG2UPoiPssncqIvq9.dJme7h8PCnqQUm/o2wkszpySu4dXp5cMYaC', NULL, 'stellablessy4@gmail.com', NULL, NULL, NULL, 'iVxUeE7jT.y8hPYwaRgZOO', 1510986534, 1511010338, 1, 'Stella', 'Blessy', '7897897893', '', '2017-11-18', NULL),
(12, '10.0.0.30', 'Akhila Ravula', '$2y$08$yDTQoV10Y3sXoujIPBEwvOYCx83jg1StUiVkrcf35hRIEJk8IeAVK', NULL, 'akhilar619@gmail.com', NULL, NULL, NULL, NULL, 1510986848, 1510986848, 1, 'Akhila', 'Ravula', '7897897894', '', '2017-11-18', NULL),
(13, '10.0.0.30', 'Biskaram Raju', '$2y$08$Z9l18U3rwReVwdpIrCaq6upsLIBDmnClDhzjbtkab1xT7JVjgqUau', NULL, 'biskaramraju@gmail.com', NULL, NULL, NULL, NULL, 1510990653, 1510990653, 1, 'Biskaram', 'Raju', '7897897895', '', '2017-11-18', NULL),
(14, '10.0.0.30', 'Santhosh Chary', '$2y$08$6rsHHgvx2HL76wlZ7tK02e1owX1smK7kUShpIwWnzYsAG12T.3T9u', NULL, 'santhoshchary@gmail.com', NULL, NULL, NULL, NULL, 1510990740, 1510990740, 1, 'Santhosh', 'Chary', '7897897896', '', '2017-11-18', NULL),
(15, '10.0.0.30', 'Nikitha Shree', '$2y$08$/5j0GLHwqEsyQQqcSVzrs.tDcS7lu74wy4HJBkUiyUD6TQUXiLiYW', NULL, 'nikithashree@gmail.com', NULL, NULL, NULL, NULL, 1510990831, 1510990831, 1, 'Nikitha', 'Shree', '7897897897', '', '2017-11-18', NULL),
(16, '10.0.0.30', 'John Narender', '$2y$08$1aVjCTQiHyWpouIWXetJvecmGHkmjL9jiKy2wCeH1cIIkKhsKk6SG', NULL, 'johnnarender@gmail.com', NULL, NULL, NULL, NULL, 1510990934, 1510990934, 1, 'John', 'Narender', '7897897896', '', '2017-11-18', NULL),
(17, '10.0.0.30', 'Peter Paul', '$2y$08$9QnN/BFZAVcFDPluE2B9r.dzY/zE.sP9FukMo2vxSiY3WiuHjK4Bu', NULL, 'peterpaul@gmail.com', NULL, NULL, NULL, NULL, 1510991001, 1510991001, 1, 'Peter', 'Paul', '7897897898', '', '2017-11-18', NULL),
(18, '10.0.0.30', 'Chandhra Shaker', '$2y$08$LM2OQKuGK4xo0fc/7o3EOedTmuX7yKw0g3aV/a/.zykbtH1/crCQC', NULL, 'chandhrashaker@gmail.com', NULL, NULL, NULL, NULL, 1510991098, 1510991098, 1, 'Chandhra', 'Shaker', '7897897899', '', '2017-11-18', NULL),
(19, '10.0.0.30', 'Naresh Chowdary', '$2y$08$cfOlMBFvpEcmfyg2itiKF.9hK/2OBkjWZ81donmWJMYOAYxtp//ny', NULL, 'nareshchowdary@gmail.com', NULL, NULL, NULL, NULL, 1510991224, 1510991224, 1, 'Naresh', 'Chowdary', '7897897890', '', '2017-11-18', NULL),
(20, '10.0.0.30', 'Ravi Teja', '$2y$08$QZAMJl6nMvmuEpXQSrESbeZ1cdIWsmlgfGTpQ2yXryUnhAuJZH6NW', NULL, 'raviteja@gmail.com', NULL, NULL, NULL, NULL, 1510996751, 1510996751, 1, 'Ravi', 'Teja', '87987985465', '', '2017-11-18', NULL),
(21, '10.0.0.30', 'Madhan Kumar', '$2y$08$GDuuRphmslA1zAPE1tOV0u6yyOvqceQx2B/n7Y26Kjye6eeOl09oe', NULL, 'madhankumar@gmail.com', NULL, NULL, NULL, NULL, 1510996862, 1510996862, 1, 'Madhan', 'Kumar', '87987956465', '', '2017-11-18', NULL),
(22, '10.0.0.30', 'Fayaz Basha', '$2y$08$LDZrRwgSnG.FrJKcFDbVk.AsmsAECUUUvf30gZAuci0VZE3XkYJ/6', NULL, 'fayazbasha@gmail.com', NULL, NULL, NULL, NULL, 1510997047, 1510997047, 1, 'Fayaz', 'Basha', '78756465456', '', '2017-11-18', NULL),
(23, '::1', 'MICH MC', '$2y$08$u7ntTD8DG2.B81c15K/Ag.Mj5Fqvp2rx2smp5Oub4IUvYeHWwZ.IW', NULL, 'driver@gmail.com', NULL, NULL, NULL, 'wCREzD/j32dhs8pcaIeqLe', 1511006334, 1511177153, 1, 'MICH', 'MC', '9878787899', 'user_23.jpg', '2017-11-18', 'license_23.png'),
(24, '::1', 'JOHN HC', '$2y$08$xDAP98Vv/aA7JIzRWbhUzuucPecpI.R8O9WSKcmvV705JjBO0mRna', NULL, 'testdriver@gmail.com', '47ffd06e0302007818c04fe1940408fc18426850', NULL, NULL, NULL, 1511006382, 1511006382, 0, 'JOHN', 'HC', '7896541234', '', '2017-11-18', NULL),
(25, '::1', 'SDF SFD', '$2y$08$LH6stAr96Snq0tq8B4cKS.D/woBUQkgMYXXbMMxyK3AXn1M4jMVhC', NULL, 'sdfd@gmail.com', 'c99494895b1b66d23e7dd4ae02a61a731ff91345', NULL, NULL, NULL, 1511006502, 1511006502, 0, 'SDF', 'SFD', '4563454353454', '', '2017-11-18', NULL),
(26, '10.0.0.30', 'Azhar David', '$2y$08$DiSnLprwkmmvHW9cLtdgseGRnpDPwfA/p/HERB3Uw/Oj0Qa2SzS5y', NULL, 'azhardavid797@gmail.com', NULL, NULL, NULL, 'Zi/HKIIeuIRcydduhQlX7.', 1511010517, 1511180114, 1, 'Azhar', 'David', '7897984556', '', '2017-11-18', NULL),
(27, '::1', 'navani member', '$2y$08$ZHT8A7ZK7EVuGxEEH5RtYuNcS0zbL7Uct4yHv1N8mIirSADcQJnqq', NULL, 'navaniconquerors@gmail.com', NULL, NULL, NULL, 'NE/t/pIUcLxIvm5c0272Yu', 1511167684, 1511609266, 1, 'navani', 'member', '7896541235', '', '2017-11-20', NULL),
(28, '::1', 'Gollapalli JohnPeter', '$2y$08$4vPCNjSJG/oidJuWk809D.PDM6el5Ha2qJQ5PZ2LoGixJ1P/cBw5O', NULL, 'gollapallijohnpeter@gmail.com', NULL, NULL, NULL, 'srvkA5Hm.1dw6PJHun9Nde', 1511764775, 1511936492, 1, 'Gollapalli', 'JohnPeter', '7569861197', '', '2017-11-27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vbs_users_groups`
--

CREATE TABLE `vbs_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_users_groups`
--

INSERT INTO `vbs_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 7, 2),
(3, 8, 3),
(4, 9, 2),
(5, 10, 2),
(6, 11, 3),
(7, 12, 3),
(8, 13, 2),
(9, 14, 2),
(10, 15, 2),
(11, 16, 2),
(12, 17, 2),
(13, 18, 2),
(14, 19, 2),
(15, 20, 3),
(16, 21, 3),
(17, 22, 3),
(18, 23, 4),
(19, 24, 4),
(20, 25, 4),
(21, 26, 4),
(22, 27, 2),
(23, 28, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vbs_vehicle`
--

CREATE TABLE `vbs_vehicle` (
  `id` int(25) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `model` varchar(512) NOT NULL DEFAULT '',
  `name` varchar(512) NOT NULL DEFAULT '',
  `car_number_plate` varchar(25) NOT NULL,
  `description` varchar(512) NOT NULL DEFAULT '',
  `passengers_capacity` int(11) NOT NULL DEFAULT '0',
  `large_luggage_capacity` int(11) NOT NULL DEFAULT '0',
  `small_luggage_capacity` int(11) NOT NULL DEFAULT '0',
  `fuel_type` enum('petrol','diesel','gas') NOT NULL DEFAULT 'diesel',
  `total_vehicles` int(11) NOT NULL DEFAULT '0',
  `waiting_time` enum('enable','disable') DEFAULT NULL,
  `cost_type` enum('flat','incremental') NOT NULL DEFAULT 'flat',
  `ct_flat_min_dist_day` varchar(512) NOT NULL,
  `ct_flat_min_cost_day` decimal(10,2) NOT NULL,
  `ct_flat_min_dist_night` varchar(512) NOT NULL,
  `ct_flat_min_cost_night` decimal(10,2) NOT NULL,
  `image` varchar(512) NOT NULL DEFAULT '',
  `cost_starting_from` varchar(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `is_new` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_vehicle`
--

INSERT INTO `vbs_vehicle` (`id`, `category_id`, `model`, `name`, `car_number_plate`, `description`, `passengers_capacity`, `large_luggage_capacity`, `small_luggage_capacity`, `fuel_type`, `total_vehicles`, `waiting_time`, `cost_type`, `ct_flat_min_dist_day`, `ct_flat_min_cost_day`, `ct_flat_min_dist_night`, `ct_flat_min_cost_night`, `image`, `cost_starting_from`, `status`, `is_new`) VALUES
(1, 1, '5', 'werwer', '45', '', 5, 5, 5, 'diesel', 5, NULL, 'flat', '5', '5.00', '5', '5.00', '1_corvette-171422__340.jpg', '55', 'Active', '1'),
(2, 2, '56', 'retert', '6765', '', 4, 4, 4, 'petrol', 4, NULL, 'flat', '4', '4.00', '4', '4.00', '2_amg-1880381__340.jpg', '44', 'Active', '1'),
(3, 1, '56', 'tewtsrewr', '67', '', 6, 6, 6, 'diesel', 6, NULL, 'flat', '6', '6.00', '6', '6.00', '3_sports-car-1364932__340.jpg', '66', 'Active', '1'),
(4, 1, 'A4', 'Audi', '1234', 'This vehicle is in good condition', 5, 5, 5, 'petrol', 7, NULL, 'flat', '7', '7.00', '7', '7.00', '4_peugeot-203-2509032__340.png', '77', 'Active', '1'),
(5, 1, 'A6', 'Audi', '4321', 'This vehicle is in good condition', 5, 10, 6, 'petrol', 8, NULL, 'flat', '80', '80.00', '90', '90.00', '5_police-car-2671231__340.png', '80', 'Active', '1'),
(6, 1, 'Class A', 'Benz', '6543', 'This vehicle is in good condition', 5, 100, 80, 'petrol', 10, NULL, 'incremental', '100', '130.00', '120', '150.00', '6_mercedes-benz-1579305__340.jpg', '50', 'Active', '1'),
(7, 1, 'Class B', 'Benz', '3456', 'This vehicle is in good condition', 5, 90, 80, 'petrol', 10, NULL, 'flat', '50', '90.00', '80', '130.00', '7_sports-car-1349139__340.jpg', '60', 'Active', '1'),
(8, 1, 'M3', 'BMW', '54654', 'This vehicle is in good condition', 5, 80, 60, 'petrol', 10, NULL, 'incremental', '', '0.00', '', '0.00', '8_opel-2920765__340.png', '50', 'Active', '1'),
(9, 1, 'X3', 'BMW', '454656', 'This vehicle is in good condition', 5, 90, 60, 'petrol', 12, NULL, 'incremental', '', '0.00', '', '0.00', '9_model-1364607__340.jpg', '70', 'Active', '1'),
(10, 2, 'Pace', 'Jaguar', '987987', 'This vehicle is in good condition', 5, 100, 80, 'petrol', 10, NULL, 'flat', '50', '10.00', '50', '20.00', '10_chevrolet-2487000__340.png', '50', 'Active', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_vehicle_categories`
--

CREATE TABLE `vbs_vehicle_categories` (
  `id` int(12) NOT NULL,
  `category` varchar(512) NOT NULL DEFAULT '',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_vehicle_categories`
--

INSERT INTO `vbs_vehicle_categories` (`id`, `category`, `status`) VALUES
(1, 'General', 'Active'),
(2, 'Premium', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_vehicle_features`
--

CREATE TABLE `vbs_vehicle_features` (
  `id` int(12) NOT NULL,
  `vehicle_id` int(12) NOT NULL,
  `feature_id` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vbs_vehicle_features`
--

INSERT INTO `vbs_vehicle_features` (`id`, `vehicle_id`, `feature_id`) VALUES
(15, 1, 1),
(14, 4, 2),
(16, 5, 1),
(49, 6, 3),
(12, 7, 5),
(11, 8, 1),
(21, 9, 3),
(45, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vbs_waitings`
--

CREATE TABLE `vbs_waitings` (
  `id` int(11) NOT NULL,
  `waiting_time` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vbs_waitings`
--

INSERT INTO `vbs_waitings` (`id`, `waiting_time`, `cost`, `status`) VALUES
(1, 20, '10.00', 'Active'),
(2, 30, '20.00', 'Active'),
(3, 50, '30.00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_waiting_time`
--

CREATE TABLE `vbs_waiting_time` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `from_time` int(11) NOT NULL,
  `to_time` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vbs_aboutus`
--
ALTER TABLE `vbs_aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_airports`
--
ALTER TABLE `vbs_airports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_assign_cars_driver`
--
ALTER TABLE `vbs_assign_cars_driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_bookings`
--
ALTER TABLE `vbs_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_cost_type_values`
--
ALTER TABLE `vbs_cost_type_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_coupons`
--
ALTER TABLE `vbs_coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `vbs_drivers`
--
ALTER TABLE `vbs_drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_email_settings`
--
ALTER TABLE `vbs_email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_email_templates`
--
ALTER TABLE `vbs_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_faqs`
--
ALTER TABLE `vbs_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_features`
--
ALTER TABLE `vbs_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_groups`
--
ALTER TABLE `vbs_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_instructions`
--
ALTER TABLE `vbs_instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_login_attempts`
--
ALTER TABLE `vbs_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_package_settings`
--
ALTER TABLE `vbs_package_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_payments`
--
ALTER TABLE `vbs_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_paypal_settings`
--
ALTER TABLE `vbs_paypal_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_payu_settings`
--
ALTER TABLE `vbs_payu_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_reasons_to_book`
--
ALTER TABLE `vbs_reasons_to_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_seo_settings`
--
ALTER TABLE `vbs_seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_sessions`
--
ALTER TABLE `vbs_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `vbs_sessions_20112017`
--
ALTER TABLE `vbs_sessions_20112017`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_site_settings`
--
ALTER TABLE `vbs_site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_sms_gate_ways`
--
ALTER TABLE `vbs_sms_gate_ways`
  ADD PRIMARY KEY (`sms_gateway_id`);

--
-- Indexes for table `vbs_sms_templates`
--
ALTER TABLE `vbs_sms_templates`
  ADD PRIMARY KEY (`sms_template_id`);

--
-- Indexes for table `vbs_social_networks`
--
ALTER TABLE `vbs_social_networks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_stripe_settings`
--
ALTER TABLE `vbs_stripe_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_system_settings_fields`
--
ALTER TABLE `vbs_system_settings_fields`
  ADD PRIMARY KEY (`field_id`);

--
-- Indexes for table `vbs_testimonials_settings`
--
ALTER TABLE `vbs_testimonials_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_users`
--
ALTER TABLE `vbs_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_users_groups`
--
ALTER TABLE `vbs_users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_vehicle`
--
ALTER TABLE `vbs_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_vehicle_categories`
--
ALTER TABLE `vbs_vehicle_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_vehicle_features`
--
ALTER TABLE `vbs_vehicle_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_waitings`
--
ALTER TABLE `vbs_waitings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_waiting_time`
--
ALTER TABLE `vbs_waiting_time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vbs_aboutus`
--
ALTER TABLE `vbs_aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vbs_airports`
--
ALTER TABLE `vbs_airports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vbs_assign_cars_driver`
--
ALTER TABLE `vbs_assign_cars_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vbs_bookings`
--
ALTER TABLE `vbs_bookings`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vbs_cost_type_values`
--
ALTER TABLE `vbs_cost_type_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `vbs_coupons`
--
ALTER TABLE `vbs_coupons`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vbs_drivers`
--
ALTER TABLE `vbs_drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vbs_email_settings`
--
ALTER TABLE `vbs_email_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vbs_email_templates`
--
ALTER TABLE `vbs_email_templates`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `vbs_faqs`
--
ALTER TABLE `vbs_faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vbs_features`
--
ALTER TABLE `vbs_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vbs_groups`
--
ALTER TABLE `vbs_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vbs_instructions`
--
ALTER TABLE `vbs_instructions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vbs_login_attempts`
--
ALTER TABLE `vbs_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vbs_package_settings`
--
ALTER TABLE `vbs_package_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vbs_payments`
--
ALTER TABLE `vbs_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vbs_paypal_settings`
--
ALTER TABLE `vbs_paypal_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vbs_payu_settings`
--
ALTER TABLE `vbs_payu_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vbs_reasons_to_book`
--
ALTER TABLE `vbs_reasons_to_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vbs_seo_settings`
--
ALTER TABLE `vbs_seo_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vbs_site_settings`
--
ALTER TABLE `vbs_site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vbs_sms_gate_ways`
--
ALTER TABLE `vbs_sms_gate_ways`
  MODIFY `sms_gateway_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vbs_sms_templates`
--
ALTER TABLE `vbs_sms_templates`
  MODIFY `sms_template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vbs_social_networks`
--
ALTER TABLE `vbs_social_networks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vbs_stripe_settings`
--
ALTER TABLE `vbs_stripe_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vbs_system_settings_fields`
--
ALTER TABLE `vbs_system_settings_fields`
  MODIFY `field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `vbs_testimonials_settings`
--
ALTER TABLE `vbs_testimonials_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vbs_users`
--
ALTER TABLE `vbs_users`
  MODIFY `id` int(25) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `vbs_users_groups`
--
ALTER TABLE `vbs_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `vbs_vehicle`
--
ALTER TABLE `vbs_vehicle`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vbs_vehicle_categories`
--
ALTER TABLE `vbs_vehicle_categories`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vbs_vehicle_features`
--
ALTER TABLE `vbs_vehicle_features`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `vbs_waitings`
--
ALTER TABLE `vbs_waitings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vbs_waiting_time`
--
ALTER TABLE `vbs_waiting_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
