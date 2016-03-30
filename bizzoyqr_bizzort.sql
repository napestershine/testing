-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2016 at 04:54 AM
-- Server version: 5.5.45-37.4-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bizzoyqr_bizzort`
--

-- --------------------------------------------------------

--
-- Table structure for table `businessTypes`
--

CREATE TABLE IF NOT EXISTS `businessTypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `businessType` varchar(255) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `businessTypes`
--

INSERT INTO `businessTypes` (`id`, `businessType`, `updated_on`) VALUES
(1, 'a', '0000-00-00 00:00:00'),
(2, 'b', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE IF NOT EXISTS `buyer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `countryId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `stateId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catOneId` int(11) NOT NULL,
  `catTwoId` int(11) NOT NULL,
  `extra` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nl` tinyint(4) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_business`
--

CREATE TABLE IF NOT EXISTS `buyer_business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `businessType` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `employees` int(11) DEFAULT NULL,
  `revenue` int(11) DEFAULT NULL,
  `ownership` int(11) DEFAULT NULL,
  `add_business` varchar(255) DEFAULT NULL,
  `reg_no` varchar(255) NOT NULL,
  `iec` varchar(255) NOT NULL,
  `tan` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_homepage`
--

CREATE TABLE IF NOT EXISTS `buyer_homepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `summaryd` text,
  `fulld` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_iandf`
--

CREATE TABLE IF NOT EXISTS `buyer_iandf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_profile`
--

CREATE TABLE IF NOT EXISTS `buyer_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `telephone1` varchar(255) DEFAULT NULL,
  `telephone2` varchar(255) DEFAULT NULL,
  `mobile1` varchar(255) DEFAULT NULL,
  `mobile2` varchar(255) DEFAULT NULL,
  `fax1` varchar(255) DEFAULT NULL,
  `fax2` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `catone`
--

CREATE TABLE IF NOT EXISTS `catone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catonename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `catone`
--

INSERT INTO `catone` (`id`, `catonename`, `updated_on`) VALUES
(4, 'Apparel,Textiles & Accessories', '0000-00-00 00:00:00'),
(15, 'Agriculture &amp; Food', '0000-00-00 00:00:00'),
(16, 'Auto &amp; Transportation', '0000-00-00 00:00:00'),
(17, 'Bags, Shoes &amp; Accessories', '0000-00-00 00:00:00'),
(18, 'Electronics', '0000-00-00 00:00:00'),
(19, 'Electrical Equipment, Components &amp; Telecoms', '0000-00-00 00:00:00'),
(20, 'Gifts, Sports &amp; Toys', '0000-00-00 00:00:00'),
(21, 'Health &amp; Beauty', '0000-00-00 00:00:00'),
(22, 'Home, Lights &amp; Construction', '0000-00-00 00:00:00'),
(23, 'Machinery, Industrial Parts &amp; Tools', '0000-00-00 00:00:00'),
(24, 'Metallurgy, Chemicals, Rubber &amp; Plastics', '0000-00-00 00:00:00'),
(25, 'Packaging, Advertising &amp; Office', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cattwo`
--

CREATE TABLE IF NOT EXISTS `cattwo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catone_id` int(11) NOT NULL,
  `cattwoname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_9126E615CDD99262` (`catone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- Dumping data for table `cattwo`
--

INSERT INTO `cattwo` (`id`, `catone_id`, `cattwoname`, `updated_on`) VALUES
(4, 4, 'Apparel', '0000-00-00 00:00:00'),
(5, 4, 'Textile & Leather Product', '0000-00-00 00:00:00'),
(6, 4, 'Fashion Accessories', '0000-00-00 00:00:00'),
(10, 15, 'Agriculture', '0000-00-00 00:00:00'),
(11, 15, 'Food &amp; Beverage', '0000-00-00 00:00:00'),
(12, 4, 'Timepieces, Jewelry, Eyewear', '0000-00-00 00:00:00'),
(13, 16, 'Automobiles &amp; Motorcycles', '0000-00-00 00:00:00'),
(14, 16, 'Transportation', '0000-00-00 00:00:00'),
(15, 17, 'Luggage, Bags &amp; Cases', '0000-00-00 00:00:00'),
(17, 17, 'Shoes &amp; Accessories', '0000-00-00 00:00:00'),
(23, 18, 'Computer Hardware &amp; Software', '0000-00-00 00:00:00'),
(24, 18, 'Home Appliance', '0000-00-00 00:00:00'),
(25, 18, 'Consumer Electronic', '0000-00-00 00:00:00'),
(26, 18, 'Security &amp; Protection', '0000-00-00 00:00:00'),
(27, 19, 'Electrical Equipment &amp; Supplies', '0000-00-00 00:00:00'),
(28, 19, 'Electronic Components &amp; Supplies', '0000-00-00 00:00:00'),
(29, 19, 'Telecommunication', '0000-00-00 00:00:00'),
(30, 20, 'Sports &amp; Entertainment', '0000-00-00 00:00:00'),
(31, 20, 'Gifts &amp; Crafts', '0000-00-00 00:00:00'),
(32, 20, 'Toys &amp; Hobbies', '0000-00-00 00:00:00'),
(33, 21, 'Health &amp; Medical', '0000-00-00 00:00:00'),
(34, 21, 'Beauty &amp; Personal Care', '0000-00-00 00:00:00'),
(35, 22, 'Construction &amp; Real Estate', '0000-00-00 00:00:00'),
(36, 22, 'Home &amp; Garden', '0000-00-00 00:00:00'),
(37, 22, 'Lights &amp; Lighting', '0000-00-00 00:00:00'),
(38, 22, 'Furniture', '0000-00-00 00:00:00'),
(39, 23, 'Machinery', '0000-00-00 00:00:00'),
(40, 23, 'Industrial Parts &amp; Fabrication Services', '0000-00-00 00:00:00'),
(41, 23, 'Tools', '0000-00-00 00:00:00'),
(42, 23, 'Hardware', '0000-00-00 00:00:00'),
(43, 23, 'Measurement &amp; Analysis Instruments', '0000-00-00 00:00:00'),
(44, 24, 'Minerals &amp; Metallurgy', '0000-00-00 00:00:00'),
(45, 24, 'Chemicals', '0000-00-00 00:00:00'),
(46, 24, 'Rubber &amp; Plastics', '0000-00-00 00:00:00'),
(47, 24, 'Energy', '0000-00-00 00:00:00'),
(48, 24, 'Environment', '0000-00-00 00:00:00'),
(49, 25, 'Packaging &amp; Printing', '0000-00-00 00:00:00'),
(50, 25, 'Office &amp; School Supplies', '0000-00-00 00:00:00'),
(51, 25, 'Service Equipment', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comcat`
--

CREATE TABLE IF NOT EXISTS `comcat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `comcat`
--

INSERT INTO `comcat` (`id`, `cat`, `is_active`, `updated_on`) VALUES
(1, 'Buyer', 0, '0000-00-00 00:00:00'),
(2, 'Supplier', 0, '0000-00-00 00:00:00'),
(3, 'Sales Rep', 0, '0000-00-00 00:00:00'),
(4, 'Sourcing Agent', 0, '0000-00-00 00:00:00'),
(5, 'Quality Assurance', 0, '0000-00-00 00:00:00'),
(6, 'Logistics', 0, '0000-00-00 00:00:00'),
(7, 'Events Organiser', 0, '0000-00-00 00:00:00'),
(8, 'Consultant/Others', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comextra`
--

CREATE TABLE IF NOT EXISTS `comextra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extra` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comextra`
--

INSERT INTO `comextra` (`id`, `extra`, `is_active`, `updated_on`) VALUES
(1, 'Inspections', 0, '0000-00-00 00:00:00'),
(2, 'Laboratories', 0, '0000-00-00 00:00:00'),
(3, 'Audits', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=247 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `updated_on`) VALUES
(1, 'Afghanistan', '0000-00-00 00:00:00'),
(2, 'Albania', '0000-00-00 00:00:00'),
(3, 'Algeria', '0000-00-00 00:00:00'),
(4, 'American Samoa', '0000-00-00 00:00:00'),
(5, 'Andorra', '0000-00-00 00:00:00'),
(6, 'Angola', '0000-00-00 00:00:00'),
(7, 'Anguilla', '0000-00-00 00:00:00'),
(8, 'Antarctica', '0000-00-00 00:00:00'),
(9, 'Antigua and Barbuda', '0000-00-00 00:00:00'),
(10, 'Argentina', '0000-00-00 00:00:00'),
(11, 'Armenia', '0000-00-00 00:00:00'),
(12, 'Aruba', '0000-00-00 00:00:00'),
(13, 'Australia', '0000-00-00 00:00:00'),
(14, 'Austria', '0000-00-00 00:00:00'),
(15, 'Azerbaijan', '0000-00-00 00:00:00'),
(16, 'Bahamas', '0000-00-00 00:00:00'),
(17, 'Bahrain', '0000-00-00 00:00:00'),
(18, 'Bangladesh', '0000-00-00 00:00:00'),
(19, 'Barbados', '0000-00-00 00:00:00'),
(20, 'Belarus', '0000-00-00 00:00:00'),
(21, 'Belgium', '0000-00-00 00:00:00'),
(22, 'Belize', '0000-00-00 00:00:00'),
(23, 'Benin', '0000-00-00 00:00:00'),
(24, 'Bermuda', '0000-00-00 00:00:00'),
(25, 'Bhutan', '0000-00-00 00:00:00'),
(26, 'Bolivia', '0000-00-00 00:00:00'),
(27, 'Bosnia and Herzegovina', '0000-00-00 00:00:00'),
(28, 'Botswana', '0000-00-00 00:00:00'),
(29, 'Bouvet Island', '0000-00-00 00:00:00'),
(30, 'Brazil', '0000-00-00 00:00:00'),
(31, 'British Indian Ocean Territory', '0000-00-00 00:00:00'),
(32, 'Brunei Darussalam', '0000-00-00 00:00:00'),
(33, 'Bulgaria', '0000-00-00 00:00:00'),
(34, 'Burkina Faso', '0000-00-00 00:00:00'),
(35, 'Burundi', '0000-00-00 00:00:00'),
(36, 'Cambodia', '0000-00-00 00:00:00'),
(37, 'Cameroon', '0000-00-00 00:00:00'),
(38, 'Canada', '0000-00-00 00:00:00'),
(39, 'Cape Verde', '0000-00-00 00:00:00'),
(40, 'Cayman Islands', '0000-00-00 00:00:00'),
(41, 'Central African Republic', '0000-00-00 00:00:00'),
(42, 'Chad', '0000-00-00 00:00:00'),
(43, 'Chile', '0000-00-00 00:00:00'),
(44, 'China', '0000-00-00 00:00:00'),
(45, 'Christmas Island', '0000-00-00 00:00:00'),
(46, 'Cocos (Keeling) Islands', '0000-00-00 00:00:00'),
(47, 'Colombia', '0000-00-00 00:00:00'),
(48, 'Comoros', '0000-00-00 00:00:00'),
(49, 'Congo', '0000-00-00 00:00:00'),
(50, 'Cook Islands', '0000-00-00 00:00:00'),
(51, 'Costa Rica', '0000-00-00 00:00:00'),
(52, 'Croatia (Hrvatska)', '0000-00-00 00:00:00'),
(53, 'Cuba', '0000-00-00 00:00:00'),
(54, 'Cyprus', '0000-00-00 00:00:00'),
(55, 'Czech Republic', '0000-00-00 00:00:00'),
(56, 'Denmark', '0000-00-00 00:00:00'),
(57, 'Djibouti', '0000-00-00 00:00:00'),
(58, 'Dominica', '0000-00-00 00:00:00'),
(59, 'Dominican Republic', '0000-00-00 00:00:00'),
(60, 'East Timor', '0000-00-00 00:00:00'),
(61, 'Ecuador', '0000-00-00 00:00:00'),
(62, 'Egypt', '0000-00-00 00:00:00'),
(63, 'El Salvador', '0000-00-00 00:00:00'),
(64, 'Equatorial Guinea', '0000-00-00 00:00:00'),
(65, 'Eritrea', '0000-00-00 00:00:00'),
(66, 'Estonia', '0000-00-00 00:00:00'),
(67, 'Ethiopia', '0000-00-00 00:00:00'),
(68, 'Falkland Islands (Malvinas)', '0000-00-00 00:00:00'),
(69, 'Faroe Islands', '0000-00-00 00:00:00'),
(70, 'Fiji', '0000-00-00 00:00:00'),
(71, 'Finland', '0000-00-00 00:00:00'),
(72, 'France', '0000-00-00 00:00:00'),
(73, 'France, Metropolitan', '0000-00-00 00:00:00'),
(74, 'French Guiana', '0000-00-00 00:00:00'),
(75, 'French Polynesia', '0000-00-00 00:00:00'),
(76, 'French Southern Territories', '0000-00-00 00:00:00'),
(77, 'Gabon', '0000-00-00 00:00:00'),
(78, 'Gambia', '0000-00-00 00:00:00'),
(79, 'Georgia', '0000-00-00 00:00:00'),
(80, 'Germany', '0000-00-00 00:00:00'),
(81, 'Ghana', '0000-00-00 00:00:00'),
(82, 'Gibraltar', '0000-00-00 00:00:00'),
(83, 'Guernsey', '0000-00-00 00:00:00'),
(84, 'Greece', '0000-00-00 00:00:00'),
(85, 'Greenland', '0000-00-00 00:00:00'),
(86, 'Grenada', '0000-00-00 00:00:00'),
(87, 'Guadeloupe', '0000-00-00 00:00:00'),
(88, 'Guam', '0000-00-00 00:00:00'),
(89, 'Guatemala', '0000-00-00 00:00:00'),
(90, 'Guinea', '0000-00-00 00:00:00'),
(91, 'Guinea-Bissau', '0000-00-00 00:00:00'),
(92, 'Guyana', '0000-00-00 00:00:00'),
(93, 'Haiti', '0000-00-00 00:00:00'),
(94, 'Heard and Mc Donald Islands', '0000-00-00 00:00:00'),
(95, 'Honduras', '0000-00-00 00:00:00'),
(96, 'Hong Kong', '0000-00-00 00:00:00'),
(97, 'Hungary', '0000-00-00 00:00:00'),
(98, 'Iceland', '0000-00-00 00:00:00'),
(99, 'India', '0000-00-00 00:00:00'),
(100, 'Isle of Man', '0000-00-00 00:00:00'),
(101, 'Indonesia', '0000-00-00 00:00:00'),
(102, 'Iran (Islamic Republic of)', '0000-00-00 00:00:00'),
(103, 'Iraq', '0000-00-00 00:00:00'),
(104, 'Ireland', '0000-00-00 00:00:00'),
(105, 'Israel', '0000-00-00 00:00:00'),
(106, 'Italy', '0000-00-00 00:00:00'),
(107, 'Ivory Coast', '0000-00-00 00:00:00'),
(108, 'Jersey', '0000-00-00 00:00:00'),
(109, 'Jamaica', '0000-00-00 00:00:00'),
(110, 'Japan', '0000-00-00 00:00:00'),
(111, 'Jordan', '0000-00-00 00:00:00'),
(112, 'Kazakhstan', '0000-00-00 00:00:00'),
(113, 'Kenya', '0000-00-00 00:00:00'),
(114, 'Kiribati', '0000-00-00 00:00:00'),
(115, 'Korea, Democratic People''s Republic of', '0000-00-00 00:00:00'),
(116, 'Korea, Republic of', '0000-00-00 00:00:00'),
(117, 'Kosovo', '0000-00-00 00:00:00'),
(118, 'Kuwait', '0000-00-00 00:00:00'),
(119, 'Kyrgyzstan', '0000-00-00 00:00:00'),
(120, 'Lao People''s Democratic Republic', '0000-00-00 00:00:00'),
(121, 'Latvia', '0000-00-00 00:00:00'),
(122, 'Lebanon', '0000-00-00 00:00:00'),
(123, 'Lesotho', '0000-00-00 00:00:00'),
(124, 'Liberia', '0000-00-00 00:00:00'),
(125, 'Libyan Arab Jamahiriya', '0000-00-00 00:00:00'),
(126, 'Liechtenstein', '0000-00-00 00:00:00'),
(127, 'Lithuania', '0000-00-00 00:00:00'),
(128, 'Luxembourg', '0000-00-00 00:00:00'),
(129, 'Macau', '0000-00-00 00:00:00'),
(130, 'Macedonia', '0000-00-00 00:00:00'),
(131, 'Madagascar', '0000-00-00 00:00:00'),
(132, 'Malawi', '0000-00-00 00:00:00'),
(133, 'Malaysia', '0000-00-00 00:00:00'),
(134, 'Maldives', '0000-00-00 00:00:00'),
(135, 'Mali', '0000-00-00 00:00:00'),
(136, 'Malta', '0000-00-00 00:00:00'),
(137, 'Marshall Islands', '0000-00-00 00:00:00'),
(138, 'Martinique', '0000-00-00 00:00:00'),
(139, 'Mauritania', '0000-00-00 00:00:00'),
(140, 'Mauritius', '0000-00-00 00:00:00'),
(141, 'Mayotte', '0000-00-00 00:00:00'),
(142, 'Mexico', '0000-00-00 00:00:00'),
(143, 'Micronesia, Federated States of', '0000-00-00 00:00:00'),
(144, 'Moldova, Republic of', '0000-00-00 00:00:00'),
(145, 'Monaco', '0000-00-00 00:00:00'),
(146, 'Mongolia', '0000-00-00 00:00:00'),
(147, 'Montenegro', '0000-00-00 00:00:00'),
(148, 'Montserrat', '0000-00-00 00:00:00'),
(149, 'Morocco', '0000-00-00 00:00:00'),
(150, 'Mozambique', '0000-00-00 00:00:00'),
(151, 'Myanmar', '0000-00-00 00:00:00'),
(152, 'Namibia', '0000-00-00 00:00:00'),
(153, 'Nauru', '0000-00-00 00:00:00'),
(154, 'Nepal', '0000-00-00 00:00:00'),
(155, 'Netherlands', '0000-00-00 00:00:00'),
(156, 'Netherlands Antilles', '0000-00-00 00:00:00'),
(157, 'New Caledonia', '0000-00-00 00:00:00'),
(158, 'New Zealand', '0000-00-00 00:00:00'),
(159, 'Nicaragua', '0000-00-00 00:00:00'),
(160, 'Niger', '0000-00-00 00:00:00'),
(161, 'Nigeria', '0000-00-00 00:00:00'),
(162, 'Niue', '0000-00-00 00:00:00'),
(163, 'Norfolk Island', '0000-00-00 00:00:00'),
(164, 'Northern Mariana Islands', '0000-00-00 00:00:00'),
(165, 'Norway', '0000-00-00 00:00:00'),
(166, 'Oman', '0000-00-00 00:00:00'),
(167, 'Pakistan', '0000-00-00 00:00:00'),
(168, 'Palau', '0000-00-00 00:00:00'),
(169, 'Palestine', '0000-00-00 00:00:00'),
(170, 'Panama', '0000-00-00 00:00:00'),
(171, 'Papua New Guinea', '0000-00-00 00:00:00'),
(172, 'Paraguay', '0000-00-00 00:00:00'),
(173, 'Peru', '0000-00-00 00:00:00'),
(174, 'Philippines', '0000-00-00 00:00:00'),
(175, 'Pitcairn', '0000-00-00 00:00:00'),
(176, 'Poland', '0000-00-00 00:00:00'),
(177, 'Portugal', '0000-00-00 00:00:00'),
(178, 'Puerto Rico', '0000-00-00 00:00:00'),
(179, 'Qatar', '0000-00-00 00:00:00'),
(180, 'Reunion', '0000-00-00 00:00:00'),
(181, 'Romania', '0000-00-00 00:00:00'),
(182, 'Russian Federation', '0000-00-00 00:00:00'),
(183, 'Rwanda', '0000-00-00 00:00:00'),
(184, 'Saint Kitts and Nevis', '0000-00-00 00:00:00'),
(185, 'Saint Lucia', '0000-00-00 00:00:00'),
(186, 'Saint Vincent and the Grenadines', '0000-00-00 00:00:00'),
(187, 'Samoa', '0000-00-00 00:00:00'),
(188, 'San Marino', '0000-00-00 00:00:00'),
(189, 'Sao Tome and Principe', '0000-00-00 00:00:00'),
(190, 'Saudi Arabia', '0000-00-00 00:00:00'),
(191, 'Senegal', '0000-00-00 00:00:00'),
(192, 'Serbia', '0000-00-00 00:00:00'),
(193, 'Seychelles', '0000-00-00 00:00:00'),
(194, 'Sierra Leone', '0000-00-00 00:00:00'),
(195, 'Singapore', '0000-00-00 00:00:00'),
(196, 'Slovakia', '0000-00-00 00:00:00'),
(197, 'Slovenia', '0000-00-00 00:00:00'),
(198, 'Solomon Islands', '0000-00-00 00:00:00'),
(199, 'Somalia', '0000-00-00 00:00:00'),
(200, 'South Africa', '0000-00-00 00:00:00'),
(201, 'South Georgia South Sandwich Islands', '0000-00-00 00:00:00'),
(202, 'Spain', '0000-00-00 00:00:00'),
(203, 'Sri Lanka', '0000-00-00 00:00:00'),
(204, 'St. Helena', '0000-00-00 00:00:00'),
(205, 'St. Pierre and Miquelon', '0000-00-00 00:00:00'),
(206, 'Sudan', '0000-00-00 00:00:00'),
(207, 'Suriname', '0000-00-00 00:00:00'),
(208, 'Svalbard and Jan Mayen Islands', '0000-00-00 00:00:00'),
(209, 'Swaziland', '0000-00-00 00:00:00'),
(210, 'Sweden', '0000-00-00 00:00:00'),
(211, 'Switzerland', '0000-00-00 00:00:00'),
(212, 'Syrian Arab Republic', '0000-00-00 00:00:00'),
(213, 'Taiwan', '0000-00-00 00:00:00'),
(214, 'Tajikistan', '0000-00-00 00:00:00'),
(215, 'Tanzania, United Republic of', '0000-00-00 00:00:00'),
(216, 'Thailand', '0000-00-00 00:00:00'),
(217, 'Togo', '0000-00-00 00:00:00'),
(218, 'Tokelau', '0000-00-00 00:00:00'),
(219, 'Tonga', '0000-00-00 00:00:00'),
(220, 'Trinidad and Tobago', '0000-00-00 00:00:00'),
(221, 'Tunisia', '0000-00-00 00:00:00'),
(222, 'Turkey', '0000-00-00 00:00:00'),
(223, 'Turkmenistan', '0000-00-00 00:00:00'),
(224, 'Turks and Caicos Islands', '0000-00-00 00:00:00'),
(225, 'Tuvalu', '0000-00-00 00:00:00'),
(226, 'Uganda', '0000-00-00 00:00:00'),
(227, 'Ukraine', '0000-00-00 00:00:00'),
(228, 'United Arab Emirates', '0000-00-00 00:00:00'),
(229, 'United Kingdom', '0000-00-00 00:00:00'),
(230, 'United States', '0000-00-00 00:00:00'),
(231, 'United States minor outlying islands', '0000-00-00 00:00:00'),
(232, 'Uruguay', '0000-00-00 00:00:00'),
(233, 'Uzbekistan', '0000-00-00 00:00:00'),
(234, 'Vanuatu', '0000-00-00 00:00:00'),
(235, 'Vatican City State', '0000-00-00 00:00:00'),
(236, 'Venezuela', '0000-00-00 00:00:00'),
(237, 'Vietnam', '0000-00-00 00:00:00'),
(238, 'Virgin Islands (British)', '0000-00-00 00:00:00'),
(239, 'Virgin Islands (U.S.)', '0000-00-00 00:00:00'),
(240, 'Wallis and Futuna Islands', '0000-00-00 00:00:00'),
(241, 'Western Sahara', '0000-00-00 00:00:00'),
(242, 'Yemen', '0000-00-00 00:00:00'),
(243, 'Yugoslavia', '0000-00-00 00:00:00'),
(244, 'Zaire', '0000-00-00 00:00:00'),
(245, 'Zambia', '0000-00-00 00:00:00'),
(246, 'Zimbabwe', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cunsltOther`
--

CREATE TABLE IF NOT EXISTS `cunsltOther` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `countryId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `stateId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catOneId` int(11) NOT NULL,
  `catTwoId` int(11) NOT NULL,
  `extra` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nl` tinyint(4) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cunsltOther_business`
--

CREATE TABLE IF NOT EXISTS `cunsltOther_business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `businessType` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `employees` int(11) DEFAULT NULL,
  `revenue` int(11) DEFAULT NULL,
  `ownership` int(11) DEFAULT NULL,
  `add_business` varchar(255) DEFAULT NULL,
  `reg_no` varchar(255) NOT NULL,
  `iec` varchar(255) NOT NULL,
  `tan` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cunsltOther_homepage`
--

CREATE TABLE IF NOT EXISTS `cunsltOther_homepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `summaryd` text,
  `fulld` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cunsltOther_iandf`
--

CREATE TABLE IF NOT EXISTS `cunsltOther_iandf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cunsltOther_profile`
--

CREATE TABLE IF NOT EXISTS `cunsltOther_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `telephone1` varchar(255) DEFAULT NULL,
  `telephone2` varchar(255) DEFAULT NULL,
  `mobile1` varchar(255) DEFAULT NULL,
  `mobile2` varchar(255) DEFAULT NULL,
  `fax1` varchar(255) DEFAULT NULL,
  `fax2` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eventOrg`
--

CREATE TABLE IF NOT EXISTS `eventOrg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `countryId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `stateId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catOneId` int(11) NOT NULL,
  `catTwoId` int(11) NOT NULL,
  `extra` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nl` tinyint(4) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eventOrg_business`
--

CREATE TABLE IF NOT EXISTS `eventOrg_business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `businessType` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `employees` int(11) DEFAULT NULL,
  `revenue` int(11) DEFAULT NULL,
  `ownership` int(11) DEFAULT NULL,
  `add_business` varchar(255) DEFAULT NULL,
  `reg_no` varchar(255) NOT NULL,
  `iec` varchar(255) NOT NULL,
  `tan` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eventOrg_homepage`
--

CREATE TABLE IF NOT EXISTS `eventOrg_homepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `summaryd` text,
  `fulld` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eventOrg_iandf`
--

CREATE TABLE IF NOT EXISTS `eventOrg_iandf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eventOrg_profile`
--

CREATE TABLE IF NOT EXISTS `eventOrg_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `telephone1` varchar(255) DEFAULT NULL,
  `telephone2` varchar(255) DEFAULT NULL,
  `mobile1` varchar(255) DEFAULT NULL,
  `mobile2` varchar(255) DEFAULT NULL,
  `fax1` varchar(255) DEFAULT NULL,
  `fax2` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `icat`
--

CREATE TABLE IF NOT EXISTS `icat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `icat`
--

INSERT INTO `icat` (`id`, `catname`, `is_active`, `updated_on`) VALUES
(1, 'Freelancer', 0, '0000-00-00 00:00:00'),
(2, 'Job Seeker', 0, '0000-00-00 00:00:00'),
(3, 'Sales Rep', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `icextra`
--

CREATE TABLE IF NOT EXISTS `icextra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icatId` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `icextra`
--

INSERT INTO `icextra` (`id`, `icatId`, `category`, `is_active`, `updated_on`) VALUES
(1, 1, 'Designer', 0, '0000-00-00 00:00:00'),
(2, 1, 'Inspection', 0, '0000-00-00 00:00:00'),
(3, 1, 'Accounting', NULL, '0000-00-00 00:00:00'),
(4, 1, 'Consultants', NULL, '0000-00-00 00:00:00'),
(5, 1, 'Forwarding Agents\r\n', NULL, '0000-00-00 00:00:00'),
(6, 1, 'Web development\r\n', NULL, '0000-00-00 00:00:00'),
(7, 1, 'Others', NULL, '0000-00-00 00:00:00'),
(8, 2, 'Internship', NULL, '0000-00-00 00:00:00'),
(9, 2, 'Full Time', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `category` int(11) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `time` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logistics`
--

CREATE TABLE IF NOT EXISTS `logistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `countryId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `stateId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catOneId` int(11) NOT NULL,
  `catTwoId` int(11) NOT NULL,
  `extra` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nl` tinyint(4) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logistics_aboutus`
--

CREATE TABLE IF NOT EXISTS `logistics_aboutus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `brands` text,
  `categories` varchar(255) DEFAULT NULL,
  `markets` varchar(255) DEFAULT NULL,
  `clients` longtext,
  `productTags` text,
  `qualityPolicy` longtext,
  `storesNo` int(11) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logistics_business`
--

CREATE TABLE IF NOT EXISTS `logistics_business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `businessType` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `employees` int(11) DEFAULT NULL,
  `revenue` int(11) DEFAULT NULL,
  `ownership` int(11) DEFAULT NULL,
  `add_business` varchar(255) DEFAULT NULL,
  `reg_no` varchar(255) NOT NULL,
  `iec` varchar(255) NOT NULL,
  `tan` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logistics_homepage`
--

CREATE TABLE IF NOT EXISTS `logistics_homepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `summaryd` text,
  `fulld` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logistics_iandf`
--

CREATE TABLE IF NOT EXISTS `logistics_iandf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logistics_profile`
--

CREATE TABLE IF NOT EXISTS `logistics_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `telephone1` varchar(255) DEFAULT NULL,
  `telephone2` varchar(255) DEFAULT NULL,
  `mobile1` varchar(255) DEFAULT NULL,
  `mobile2` varchar(255) DEFAULT NULL,
  `fax1` varchar(255) DEFAULT NULL,
  `fax2` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `qa`
--

CREATE TABLE IF NOT EXISTS `qa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `countryId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `stateId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catOneId` int(11) NOT NULL,
  `catTwoId` int(11) NOT NULL,
  `extra` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nl` tinyint(4) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `qa_business`
--

CREATE TABLE IF NOT EXISTS `qa_business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `businessType` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `employees` int(11) DEFAULT NULL,
  `revenue` int(11) DEFAULT NULL,
  `ownership` int(11) DEFAULT NULL,
  `add_business` varchar(255) DEFAULT NULL,
  `reg_no` varchar(255) NOT NULL,
  `iec` varchar(255) NOT NULL,
  `tan` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `qa_homepage`
--

CREATE TABLE IF NOT EXISTS `qa_homepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `summaryd` text,
  `fulld` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `qa_iandf`
--

CREATE TABLE IF NOT EXISTS `qa_iandf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `qa_profile`
--

CREATE TABLE IF NOT EXISTS `qa_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `telephone1` varchar(255) DEFAULT NULL,
  `telephone2` varchar(255) DEFAULT NULL,
  `mobile1` varchar(255) DEFAULT NULL,
  `mobile2` varchar(255) DEFAULT NULL,
  `fax1` varchar(255) DEFAULT NULL,
  `fax2` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_rep_comp`
--

CREATE TABLE IF NOT EXISTS `sales_rep_comp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `countryId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `stateId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catOneId` int(11) NOT NULL,
  `catTwoId` int(11) NOT NULL,
  `extra` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nl` tinyint(4) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_rep_comp_business`
--

CREATE TABLE IF NOT EXISTS `sales_rep_comp_business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `businessType` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `employees` int(11) DEFAULT NULL,
  `revenue` int(11) DEFAULT NULL,
  `ownership` int(11) DEFAULT NULL,
  `add_business` varchar(255) DEFAULT NULL,
  `reg_no` varchar(255) NOT NULL,
  `iec` varchar(255) NOT NULL,
  `tan` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_rep_comp_homepage`
--

CREATE TABLE IF NOT EXISTS `sales_rep_comp_homepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `summaryd` text,
  `fulld` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_rep_comp_iandf`
--

CREATE TABLE IF NOT EXISTS `sales_rep_comp_iandf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_rep_comp_profile`
--

CREATE TABLE IF NOT EXISTS `sales_rep_comp_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `telephone1` varchar(255) DEFAULT NULL,
  `telephone2` varchar(255) DEFAULT NULL,
  `mobile1` varchar(255) DEFAULT NULL,
  `mobile2` varchar(255) DEFAULT NULL,
  `fax1` varchar(255) DEFAULT NULL,
  `fax2` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sourcingAgent`
--

CREATE TABLE IF NOT EXISTS `sourcingAgent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `countryId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `stateId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catOneId` int(11) NOT NULL,
  `catTwoId` int(11) NOT NULL,
  `extra` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nl` tinyint(4) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sourcingAgent_business`
--

CREATE TABLE IF NOT EXISTS `sourcingAgent_business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `businessType` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `employees` int(11) DEFAULT NULL,
  `revenue` int(11) DEFAULT NULL,
  `ownership` int(11) DEFAULT NULL,
  `add_business` varchar(255) DEFAULT NULL,
  `reg_no` varchar(255) NOT NULL,
  `iec` varchar(255) NOT NULL,
  `tan` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sourcingAgent_homepage`
--

CREATE TABLE IF NOT EXISTS `sourcingAgent_homepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `summaryd` text,
  `fulld` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sourcingAgent_iandf`
--

CREATE TABLE IF NOT EXISTS `sourcingAgent_iandf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sourcingAgent_profile`
--

CREATE TABLE IF NOT EXISTS `sourcingAgent_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `telephone1` varchar(255) DEFAULT NULL,
  `telephone2` varchar(255) DEFAULT NULL,
  `mobile1` varchar(255) DEFAULT NULL,
  `mobile2` varchar(255) DEFAULT NULL,
  `fax1` varchar(255) DEFAULT NULL,
  `fax2` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(100) NOT NULL,
  `countryId` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `countryId`, `updated_on`) VALUES
(1, 'Andhra Pradesh', 99, '0000-00-00 00:00:00'),
(2, 'Ashmore and Cartier Islands', 13, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `countryId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `stateId` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catOneId` int(11) NOT NULL,
  `catTwoId` int(11) NOT NULL,
  `extra` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nl` tinyint(4) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_business`
--

CREATE TABLE IF NOT EXISTS `supplier_business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `businessType` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `employees` int(11) DEFAULT NULL,
  `revenue` int(11) DEFAULT NULL,
  `ownership` int(11) DEFAULT NULL,
  `add_business` varchar(255) DEFAULT NULL,
  `reg_no` varchar(255) DEFAULT NULL,
  `iec` varchar(255) DEFAULT NULL,
  `tan` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_homepage`
--

CREATE TABLE IF NOT EXISTS `supplier_homepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `summaryd` text,
  `fulld` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_iandf`
--

CREATE TABLE IF NOT EXISTS `supplier_iandf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` longtext,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_profile`
--

CREATE TABLE IF NOT EXISTS `supplier_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `designation` int(11) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `telephone1` varchar(255) DEFAULT NULL,
  `telephone2` varchar(255) DEFAULT NULL,
  `mobile1` varchar(255) DEFAULT NULL,
  `mobile2` varchar(255) DEFAULT NULL,
  `fax1` varchar(255) DEFAULT NULL,
  `fax2` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cattwo`
--
ALTER TABLE `cattwo`
  ADD CONSTRAINT `FK_9126E615CDD99262` FOREIGN KEY (`catone_id`) REFERENCES `catone` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
