-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2018 at 10:30 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gurpreet_rentapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `lft` int(11) DEFAULT '0',
  `rght` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `lft`, `rght`, `name`, `description`, `slug`, `image`, `status`, `created`) VALUES
(1, 0, 1, 2, 'Boats', '<p>boats</p>', 'boats', 'boats.png', 1, '2018-04-09 06:21:45'),
(10, 0, 3, 4, 'Jet Ski', '<p>jet ski</p>', 'jet_ski', 'jet-ski.png', 1, '2018-04-09 06:25:39'),
(11, 0, 5, 6, 'Commercial Fishing Boats', '<p>Commercial Fishing Boats</p>', 'commercial_fishing_boats', 'fishing.png', 1, '2018-04-09 06:26:17'),
(12, 0, 7, 8, 'Yachts', '<p>yachts</p>', 'yachts', 'fsboats.png', 1, '2018-04-09 06:27:12'),
(13, 0, 9, 10, 'Water Sports', '<p>water sports</p>', 'water_sports', 'watersports.png', 1, '2018-04-09 06:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text,
  `status` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `status`, `created`) VALUES
(6, 'Diksha', 'diksha@avainfotech.com', NULL, 'Development', 'Where have you developed your website from.', 1, '2018-01-12 08:48:21'),
(4, 'hfgh', 'fghfgh@gmail.com', NULL, 'fgdf', 'hfghf', 1, '2018-01-11 12:53:17'),
(5, 'fgdg', 'gfgfddhdghd@gmail.com', NULL, 'gdgdfg', 'dgdffhf', 1, '2018-01-11 12:54:29'),
(7, 'cvx', 'cc@gmail.com', NULL, 'vcb', 'vc', 0, '2018-01-12 09:38:24'),
(8, 'rk', 'sfr@gmail.com', NULL, 'fdsfs', 'fsf', 0, '2018-01-12 14:49:08'),
(9, 'rk', 'sfr@gmail.com', NULL, 'fdsfs', 'fsf', 0, '2018-01-12 14:51:13'),
(10, 'kuldeep', 'kuldeepjha@avainfotech.com', '1234567890', 'test', NULL, 0, '2018-04-06 10:04:56'),
(11, 'asdf', 'adsf@sd.df', '3453454', 'dfgsdfgsdf', 'sdfgsdfg', 0, '2018-04-06 10:10:11'),
(12, 'PRATEEK', 'prateek@avainfotech.com', '1417474747474747474747', 'yo', 'heheheheheheheheheheh@#$%^&*(', 0, '2018-04-10 07:10:34'),
(13, 'sadfsadf', 'asdf@sd.df', '12321312', 'dsfaf', 'sdafasdfasdf', 0, '2018-04-10 12:26:20'),
(14, 'dfgsdfg', 'rupak@avainfotech.com', '2342342', 'dfsgdsfg', 'dsfgsdfg', 0, '2018-04-10 12:29:37'),
(15, 'prateek', 'prateek@avainfotech.com', '5585858585858585858', 'jghjghg', 'ghghghghkhjkkkkkkkkkkkkkk', 0, '2018-04-16 10:07:00'),
(16, 'PRATEEK', 'prateek@avainfotech.com', '545454', '44454254', 'hjhfjhgjhgfghfnjh', 0, '2018-04-19 07:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `iso_code_2` varchar(2) NOT NULL,
  `iso_code_3` varchar(3) NOT NULL,
  `address_format` text NOT NULL,
  `postcode_required` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `name`, `iso_code_2`, `iso_code_3`, `address_format`, `postcode_required`, `status`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', '', 0, 1),
(2, 'Albania', 'AL', 'ALB', '', 0, 1),
(3, 'Algeria', 'DZ', 'DZA', '', 0, 1),
(4, 'American Samoa', 'AS', 'ASM', '', 0, 1),
(5, 'Andorra', 'AD', 'AND', '', 0, 1),
(6, 'Angola', 'AO', 'AGO', '', 0, 1),
(7, 'Anguilla', 'AI', 'AIA', '', 0, 1),
(8, 'Antarctica', 'AQ', 'ATA', '', 0, 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', '', 0, 1),
(10, 'Argentina', 'AR', 'ARG', '', 0, 1),
(11, 'Armenia', 'AM', 'ARM', '', 0, 1),
(12, 'Aruba', 'AW', 'ABW', '', 0, 1),
(13, 'Australia', 'AU', 'AUS', '', 0, 1),
(14, 'Austria', 'AT', 'AUT', '', 0, 1),
(15, 'Azerbaijan', 'AZ', 'AZE', '', 0, 1),
(16, 'Bahamas', 'BS', 'BHS', '', 0, 1),
(17, 'Bahrain', 'BH', 'BHR', '', 0, 1),
(18, 'Bangladesh', 'BD', 'BGD', '', 0, 1),
(19, 'Barbados', 'BB', 'BRB', '', 0, 1),
(20, 'Belarus', 'BY', 'BLR', '', 0, 1),
(21, 'Belgium', 'BE', 'BEL', '{firstname} {lastname}\r\n{company}\r\n{address_1}\r\n{address_2}\r\n{postcode} {city}\r\n{country}', 0, 1),
(22, 'Belize', 'BZ', 'BLZ', '', 0, 1),
(23, 'Benin', 'BJ', 'BEN', '', 0, 1),
(24, 'Bermuda', 'BM', 'BMU', '', 0, 1),
(25, 'Bhutan', 'BT', 'BTN', '', 0, 1),
(26, 'Bolivia', 'BO', 'BOL', '', 0, 1),
(27, 'Bosnia and Herzegovina', 'BA', 'BIH', '', 0, 1),
(28, 'Botswana', 'BW', 'BWA', '', 0, 1),
(29, 'Bouvet Island', 'BV', 'BVT', '', 0, 1),
(30, 'Brazil', 'BR', 'BRA', '', 0, 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', '', 0, 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', '', 0, 1),
(33, 'Bulgaria', 'BG', 'BGR', '', 0, 1),
(34, 'Burkina Faso', 'BF', 'BFA', '', 0, 1),
(35, 'Burundi', 'BI', 'BDI', '', 0, 1),
(36, 'Cambodia', 'KH', 'KHM', '', 0, 1),
(37, 'Cameroon', 'CM', 'CMR', '', 0, 1),
(38, 'Canada', 'CA', 'CAN', '', 0, 1),
(39, 'Cape Verde', 'CV', 'CPV', '', 0, 1),
(40, 'Cayman Islands', 'KY', 'CYM', '', 0, 1),
(41, 'Central African Republic', 'CF', 'CAF', '', 0, 1),
(42, 'Chad', 'TD', 'TCD', '', 0, 1),
(43, 'Chile', 'CL', 'CHL', '', 0, 1),
(44, 'China', 'CN', 'CHN', '', 0, 1),
(45, 'Christmas Island', 'CX', 'CXR', '', 0, 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', '', 0, 1),
(47, 'Colombia', 'CO', 'COL', '', 0, 1),
(48, 'Comoros', 'KM', 'COM', '', 0, 1),
(49, 'Congo', 'CG', 'COG', '', 0, 1),
(50, 'Cook Islands', 'CK', 'COK', '', 0, 1),
(51, 'Costa Rica', 'CR', 'CRI', '', 0, 1),
(52, 'Cote D\'Ivoire', 'CI', 'CIV', '', 0, 1),
(53, 'Croatia', 'HR', 'HRV', '', 0, 1),
(54, 'Cuba', 'CU', 'CUB', '', 0, 1),
(55, 'Cyprus', 'CY', 'CYP', '', 0, 1),
(56, 'Czech Republic', 'CZ', 'CZE', '', 0, 1),
(57, 'Denmark', 'DK', 'DNK', '', 0, 1),
(58, 'Djibouti', 'DJ', 'DJI', '', 0, 1),
(59, 'Dominica', 'DM', 'DMA', '', 0, 1),
(60, 'Dominican Republic', 'DO', 'DOM', '', 0, 1),
(61, 'East Timor', 'TL', 'TLS', '', 0, 1),
(62, 'Ecuador', 'EC', 'ECU', '', 0, 1),
(63, 'Egypt', 'EG', 'EGY', '', 0, 1),
(64, 'El Salvador', 'SV', 'SLV', '', 0, 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', '', 0, 1),
(66, 'Eritrea', 'ER', 'ERI', '', 0, 1),
(67, 'Estonia', 'EE', 'EST', '', 0, 1),
(68, 'Ethiopia', 'ET', 'ETH', '', 0, 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', '', 0, 1),
(70, 'Faroe Islands', 'FO', 'FRO', '', 0, 1),
(71, 'Fiji', 'FJ', 'FJI', '', 0, 1),
(72, 'Finland', 'FI', 'FIN', '', 0, 1),
(74, 'France, Metropolitan', 'FR', 'FRA', '{firstname} {lastname}\r\n{company}\r\n{address_1}\r\n{address_2}\r\n{postcode} {city}\r\n{country}', 1, 1),
(75, 'French Guiana', 'GF', 'GUF', '', 0, 1),
(76, 'French Polynesia', 'PF', 'PYF', '', 0, 1),
(77, 'French Southern Territories', 'TF', 'ATF', '', 0, 1),
(78, 'Gabon', 'GA', 'GAB', '', 0, 1),
(79, 'Gambia', 'GM', 'GMB', '', 0, 1),
(80, 'Georgia', 'GE', 'GEO', '', 0, 1),
(81, 'Germany', 'DE', 'DEU', '{company}\r\n{firstname} {lastname}\r\n{address_1}\r\n{address_2}\r\n{postcode} {city}\r\n{country}', 1, 1),
(82, 'Ghana', 'GH', 'GHA', '', 0, 1),
(83, 'Gibraltar', 'GI', 'GIB', '', 0, 1),
(84, 'Greece', 'GR', 'GRC', '', 0, 1),
(85, 'Greenland', 'GL', 'GRL', '', 0, 1),
(86, 'Grenada', 'GD', 'GRD', '', 0, 1),
(87, 'Guadeloupe', 'GP', 'GLP', '', 0, 1),
(88, 'Guam', 'GU', 'GUM', '', 0, 1),
(89, 'Guatemala', 'GT', 'GTM', '', 0, 1),
(90, 'Guinea', 'GN', 'GIN', '', 0, 1),
(91, 'Guinea-Bissau', 'GW', 'GNB', '', 0, 1),
(92, 'Guyana', 'GY', 'GUY', '', 0, 1),
(93, 'Haiti', 'HT', 'HTI', '', 0, 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', '', 0, 1),
(95, 'Honduras', 'HN', 'HND', '', 0, 1),
(96, 'Hong Kong', 'HK', 'HKG', '', 0, 1),
(97, 'Hungary', 'HU', 'HUN', '', 0, 1),
(98, 'Iceland', 'IS', 'ISL', '', 0, 1),
(99, 'India', 'IN', 'IND', '', 0, 1),
(100, 'Indonesia', 'ID', 'IDN', '', 0, 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', '', 0, 1),
(102, 'Iraq', 'IQ', 'IRQ', '', 0, 1),
(103, 'Ireland', 'IE', 'IRL', '', 0, 1),
(104, 'Israel', 'IL', 'ISR', '', 0, 1),
(105, 'Italy', 'IT', 'ITA', '', 0, 1),
(106, 'Jamaica', 'JM', 'JAM', '', 0, 1),
(107, 'Japan', 'JP', 'JPN', '', 0, 1),
(108, 'Jordan', 'JO', 'JOR', '', 0, 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', '', 0, 1),
(110, 'Kenya', 'KE', 'KEN', '', 0, 1),
(111, 'Kiribati', 'KI', 'KIR', '', 0, 1),
(112, 'North Korea', 'KP', 'PRK', '', 0, 1),
(113, 'South Korea', 'KR', 'KOR', '', 0, 1),
(114, 'Kuwait', 'KW', 'KWT', '', 0, 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', '', 0, 1),
(116, 'Lao People\'s Democratic Republic', 'LA', 'LAO', '', 0, 1),
(117, 'Latvia', 'LV', 'LVA', '', 0, 1),
(118, 'Lebanon', 'LB', 'LBN', '', 0, 1),
(119, 'Lesotho', 'LS', 'LSO', '', 0, 1),
(120, 'Liberia', 'LR', 'LBR', '', 0, 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', '', 0, 1),
(122, 'Liechtenstein', 'LI', 'LIE', '', 0, 1),
(123, 'Lithuania', 'LT', 'LTU', '', 0, 1),
(124, 'Luxembourg', 'LU', 'LUX', '', 0, 1),
(125, 'Macau', 'MO', 'MAC', '', 0, 1),
(126, 'FYROM', 'MK', 'MKD', '', 0, 1),
(127, 'Madagascar', 'MG', 'MDG', '', 0, 1),
(128, 'Malawi', 'MW', 'MWI', '', 0, 1),
(129, 'Malaysia', 'MY', 'MYS', '', 0, 1),
(130, 'Maldives', 'MV', 'MDV', '', 0, 1),
(131, 'Mali', 'ML', 'MLI', '', 0, 1),
(132, 'Malta', 'MT', 'MLT', '', 0, 1),
(133, 'Marshall Islands', 'MH', 'MHL', '', 0, 1),
(134, 'Martinique', 'MQ', 'MTQ', '', 0, 1),
(135, 'Mauritania', 'MR', 'MRT', '', 0, 1),
(136, 'Mauritius', 'MU', 'MUS', '', 0, 1),
(137, 'Mayotte', 'YT', 'MYT', '', 0, 1),
(138, 'Mexico', 'MX', 'MEX', '', 0, 1),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', '', 0, 1),
(140, 'Moldova, Republic of', 'MD', 'MDA', '', 0, 1),
(141, 'Monaco', 'MC', 'MCO', '', 0, 1),
(142, 'Mongolia', 'MN', 'MNG', '', 0, 1),
(143, 'Montserrat', 'MS', 'MSR', '', 0, 1),
(144, 'Morocco', 'MA', 'MAR', '', 0, 1),
(145, 'Mozambique', 'MZ', 'MOZ', '', 0, 1),
(146, 'Myanmar', 'MM', 'MMR', '', 0, 1),
(147, 'Namibia', 'NA', 'NAM', '', 0, 1),
(148, 'Nauru', 'NR', 'NRU', '', 0, 1),
(149, 'Nepal', 'NP', 'NPL', '', 0, 1),
(150, 'Netherlands', 'NL', 'NLD', '', 0, 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', '', 0, 1),
(152, 'New Caledonia', 'NC', 'NCL', '', 0, 1),
(153, 'New Zealand', 'NZ', 'NZL', '', 0, 1),
(154, 'Nicaragua', 'NI', 'NIC', '', 0, 1),
(155, 'Niger', 'NE', 'NER', '', 0, 1),
(156, 'Nigeria', 'NG', 'NGA', '', 0, 1),
(157, 'Niue', 'NU', 'NIU', '', 0, 1),
(158, 'Norfolk Island', 'NF', 'NFK', '', 0, 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', '', 0, 1),
(160, 'Norway', 'NO', 'NOR', '', 0, 1),
(161, 'Oman', 'OM', 'OMN', '', 0, 1),
(162, 'Pakistan', 'PK', 'PAK', '', 0, 1),
(163, 'Palau', 'PW', 'PLW', '', 0, 1),
(164, 'Panama', 'PA', 'PAN', '', 0, 1),
(165, 'Papua New Guinea', 'PG', 'PNG', '', 0, 1),
(166, 'Paraguay', 'PY', 'PRY', '', 0, 1),
(167, 'Peru', 'PE', 'PER', '', 0, 1),
(168, 'Philippines', 'PH', 'PHL', '', 0, 1),
(169, 'Pitcairn', 'PN', 'PCN', '', 0, 1),
(170, 'Poland', 'PL', 'POL', '', 0, 1),
(171, 'Portugal', 'PT', 'PRT', '', 0, 1),
(172, 'Puerto Rico', 'PR', 'PRI', '', 0, 1),
(173, 'Qatar', 'QA', 'QAT', '', 0, 1),
(174, 'Reunion', 'RE', 'REU', '', 0, 1),
(175, 'Romania', 'RO', 'ROM', '', 0, 1),
(176, 'Russian Federation', 'RU', 'RUS', '', 0, 1),
(177, 'Rwanda', 'RW', 'RWA', '', 0, 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', '', 0, 1),
(179, 'Saint Lucia', 'LC', 'LCA', '', 0, 1),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', '', 0, 1),
(181, 'Samoa', 'WS', 'WSM', '', 0, 1),
(182, 'San Marino', 'SM', 'SMR', '', 0, 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', '', 0, 1),
(184, 'Saudi Arabia', 'SA', 'SAU', '', 0, 1),
(185, 'Senegal', 'SN', 'SEN', '', 0, 1),
(186, 'Seychelles', 'SC', 'SYC', '', 0, 1),
(187, 'Sierra Leone', 'SL', 'SLE', '', 0, 1),
(188, 'Singapore', 'SG', 'SGP', '', 0, 1),
(189, 'Slovak Republic', 'SK', 'SVK', '{firstname} {lastname}\r\n{company}\r\n{address_1}\r\n{address_2}\r\n{city} {postcode}\r\n{zone}\r\n{country}', 0, 1),
(190, 'Slovenia', 'SI', 'SVN', '', 0, 1),
(191, 'Solomon Islands', 'SB', 'SLB', '', 0, 1),
(192, 'Somalia', 'SO', 'SOM', '', 0, 1),
(193, 'South Africa', 'ZA', 'ZAF', '', 0, 1),
(194, 'South Georgia &amp; South Sandwich Islands', 'GS', 'SGS', '', 0, 1),
(195, 'Spain', 'ES', 'ESP', '', 0, 1),
(196, 'Sri Lanka', 'LK', 'LKA', '', 0, 1),
(197, 'St. Helena', 'SH', 'SHN', '', 0, 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', '', 0, 1),
(199, 'Sudan', 'SD', 'SDN', '', 0, 1),
(200, 'Suriname', 'SR', 'SUR', '', 0, 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', '', 0, 1),
(202, 'Swaziland', 'SZ', 'SWZ', '', 0, 1),
(203, 'Sweden', 'SE', 'SWE', '{company}\r\n{firstname} {lastname}\r\n{address_1}\r\n{address_2}\r\n{postcode} {city}\r\n{country}', 1, 1),
(204, 'Switzerland', 'CH', 'CHE', '', 0, 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', '', 0, 1),
(206, 'Taiwan', 'TW', 'TWN', '', 0, 1),
(207, 'Tajikistan', 'TJ', 'TJK', '', 0, 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', '', 0, 1),
(209, 'Thailand', 'TH', 'THA', '', 0, 1),
(210, 'Togo', 'TG', 'TGO', '', 0, 1),
(211, 'Tokelau', 'TK', 'TKL', '', 0, 1),
(212, 'Tonga', 'TO', 'TON', '', 0, 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', '', 0, 1),
(214, 'Tunisia', 'TN', 'TUN', '', 0, 1),
(215, 'Turkey', 'TR', 'TUR', '', 0, 1),
(216, 'Turkmenistan', 'TM', 'TKM', '', 0, 1),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', '', 0, 1),
(218, 'Tuvalu', 'TV', 'TUV', '', 0, 1),
(219, 'Uganda', 'UG', 'UGA', '', 0, 1),
(220, 'Ukraine', 'UA', 'UKR', '', 0, 1),
(221, 'United Arab Emirates', 'AE', 'ARE', '', 0, 1),
(222, 'United Kingdom', 'GB', 'GBR', '', 1, 1),
(223, 'United States', 'US', 'USA', '{firstname} {lastname}\r\n{company}\r\n{address_1}\r\n{address_2}\r\n{city}, {zone} {postcode}\r\n{country}', 0, 1),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', '', 0, 1),
(225, 'Uruguay', 'UY', 'URY', '', 0, 1),
(226, 'Uzbekistan', 'UZ', 'UZB', '', 0, 1),
(227, 'Vanuatu', 'VU', 'VUT', '', 0, 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', '', 0, 1),
(229, 'Venezuela', 'VE', 'VEN', '', 0, 1),
(230, 'Viet Nam', 'VN', 'VNM', '', 0, 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', '', 0, 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', '', 0, 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', '', 0, 1),
(234, 'Western Sahara', 'EH', 'ESH', '', 0, 1),
(235, 'Yemen', 'YE', 'YEM', '', 0, 1),
(237, 'Democratic Republic of Congo', 'CD', 'COD', '', 0, 1),
(238, 'Zambia', 'ZM', 'ZMB', '', 0, 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', '', 0, 1),
(242, 'Montenegro', 'ME', 'MNE', '', 0, 1),
(243, 'Serbia', 'RS', 'SRB', '', 0, 1),
(244, 'Aaland Islands', 'AX', 'ALA', '', 0, 1),
(245, 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES', '', 0, 1),
(246, 'Curacao', 'CW', 'CUW', '', 0, 1),
(247, 'Palestinian Territory, Occupied', 'PS', 'PSE', '', 0, 1),
(248, 'South Sudan', 'SS', 'SSD', '', 0, 1),
(249, 'St. Barthelemy', 'BL', 'BLM', '', 0, 1),
(250, 'St. Martin (French part)', 'MF', 'MAF', '', 0, 1),
(251, 'Canary Islands', 'IC', 'ICA', '', 0, 1),
(252, 'Ascension Island (British)', 'AC', 'ASC', '', 0, 1),
(253, 'Kosovo, Republic of', 'XK', 'UNK', '', 0, 1),
(254, 'Isle of Man', 'IM', 'IMN', '', 0, 1),
(255, 'Tristan da Cunha', 'TA', 'SHN', '', 0, 1),
(256, 'Guernsey', 'GG', 'GGY', '', 0, 1),
(257, 'Jersey', 'JE', 'JEY', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `product_id`, `user_id`, `created`) VALUES
(2, 43, 25, '2018-04-17 07:03:22'),
(4, 50, 25, '2018-04-18 11:22:04'),
(5, 43, 27, '2018-04-18 11:30:57'),
(6, 53, 27, '2018-04-19 07:42:04'),
(7, 44, 27, '2018-04-19 12:39:12'),
(8, 48, 27, '2018-04-20 06:25:31'),
(9, 50, 27, '2018-04-20 06:25:45'),
(10, 41, 27, '2018-04-20 06:26:00'),
(11, 40, 27, '2018-04-20 09:25:42'),
(12, 39, 25, '2018-04-23 04:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) DEFAULT NULL,
  `start_date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hourly_price` decimal(8,2) DEFAULT '0.00',
  `total_hours` int(5) NOT NULL DEFAULT '0',
  `total_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  `payment_status` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'payment status for paypal/payfort',
  `transaction_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'paypal/payfort transaction id',
  `order_status` int(11) NOT NULL DEFAULT '1' COMMENT 'pending1 ,2 processing ,3 complete ,4 cancel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `product_id`, `start_date`, `start_time`, `end_date`, `end_time`, `hourly_price`, `total_hours`, `total_price`, `created`, `modified`, `payment_status`, `transaction_id`, `order_status`) VALUES
(19, 25, 43, '17-04-2018', '01:00:00', '17-04-2018', '02:00:00', '300.00', 1, '300.00', '2018-04-17 11:05:58', '2018-04-17 11:05:58', 'Pending', '59F01239T93432247', 3),
(20, 27, 43, '17-04-2018', '02:00:00', '17-04-2018', '05:00:00', '300.00', 3, '900.00', '2018-04-17 12:57:30', '2018-04-17 12:57:30', 'Pending', '4C6123374N3575302', 3),
(21, 25, 39, '20-04-2018', '4:00:00 AM', '20-04-2018', '5:00:00 AM', '200.00', 1, '200.00', '2018-04-18 07:05:17', '2018-04-18 07:05:17', 'Pending', '4D344146DS1979519', 3),
(22, 27, 43, '19-04-2018', '10:00:00 AM', '19-04-2018', '3:00:00 PM', '300.00', 5, '1500.00', '2018-04-18 11:31:16', '2018-04-18 11:31:16', NULL, NULL, 1),
(23, 27, 40, '18-04-2018', '2:00:00 PM', '18-04-2018', '5:00:00 PM', '100.00', 3, '300.00', '2018-04-18 12:35:33', '2018-04-18 12:35:33', 'Pending', '6AK16701EX2139623', 3),
(24, 27, 43, '19-04-2018', '1:00:00 PM', '26-04-2018', '3:00:00 PM', '300.00', 170, '51000.00', '2018-04-19 06:12:26', '2018-04-19 06:12:26', NULL, NULL, 1),
(25, 27, 47, '20-04-2018', '4:00:00 PM', '26-04-2018', '5:00:00 PM', '23.00', 145, '3335.00', '2018-04-19 10:46:54', '2018-04-19 10:46:54', NULL, NULL, 1),
(26, 27, 40, '24-04-2018', '3:00:00 PM', '24-04-2018', '4:00:00 PM', '100.00', 1, '100.00', '2018-04-20 09:32:42', '2018-04-20 09:32:42', 'Pending', '98L51732AS501480V', 3),
(27, 25, 47, '26-04-2018', '2:00:00 AM', '26-04-2018', '4:00:00 AM', '23.00', 2, '46.00', '2018-04-23 05:11:36', '2018-04-23 05:11:36', 'Pending', '0VT6946947342943P', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `slug` varchar(1000) DEFAULT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `description` text,
  `color` text,
  `trips` bigint(20) DEFAULT '0',
  `price` decimal(8,2) DEFAULT '0.00',
  `conditions` varchar(100) DEFAULT NULL,
  `ava_rating` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `image` varchar(1000) DEFAULT NULL,
  `delivery_details` varchar(500) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `pick_location` varchar(350) DEFAULT NULL,
  `drop_location` varchar(350) DEFAULT NULL,
  `lat` varchar(355) DEFAULT NULL,
  `long` varchar(355) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expired` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `slug`, `name`, `description`, `color`, `trips`, `price`, `conditions`, `ava_rating`, `cat_id`, `image`, `delivery_details`, `status`, `pick_location`, `drop_location`, `lat`, `long`, `created`, `expired`) VALUES
(39, 1, 'new_jet_ski', 'new jet ski', '<p>new jet ski</p>', NULL, 1, '200.00', 'New', 2, 10, '1523260929jet-ski-one.jpg', 'check', 1, NULL, NULL, '30.7333148', '76.7794179', '2018-04-09 08:02:09', NULL),
(40, 1, 'test', 'test', '<p>sdfasdfsdf</p>', NULL, 1, '100.00', 'Old', 0, 10, '1523263110jet-ski-three.jpg', 'asdfsd', 1, NULL, NULL, '30.7333148', '76.7794179', '2018-04-09 08:38:30', NULL),
(41, 1, 'test_34', 'test 34', '<p>adsfdsafa</p>', NULL, 3, '50.00', 'Old', 0, 10, '1523263171jet-ski-two.jpg', '', 1, NULL, NULL, '30.7333148', '76.7794179', '2018-04-09 08:39:31', NULL),
(42, 1, 'boat_12', 'Boat 12', '<p>asdfsadfsdf</p>', NULL, 4, '500.00', 'New', 0, 1, '1523263214boats-three.jpg', '', 1, NULL, NULL, '30.7333148', '76.7794179', '2018-04-09 08:40:14', NULL),
(43, 1, 'boat_new', 'Boat new', '<p>asdfasdf</p>', NULL, 1, '300.00', 'Old', 4, 1, '1523263257boats-one.jpg', '', 1, 'chandigarh', 'chandigarh', '30.7333148', '76.7794179', '2018-04-09 08:40:57', NULL),
(44, 1, 'boat_test', 'Boat test', '<p>dfssdfgdfgds</p>', NULL, 2, '600.00', 'New', 0, 1, '1523263304boats-two.jpg', '', 1, NULL, NULL, '30.7333148', '76.7794179', '2018-04-09 08:41:44', NULL),
(45, 1, 'ski_new2', 'ski new2', '<p>dsafasdf</p>', NULL, 0, '25.00', 'New', 0, 10, '1523270412jet-ski-two.jpg', '', 1, NULL, NULL, '30.7333148', '76.7794179', '2018-04-09 10:40:12', NULL),
(46, 23, 'water_12', 'water 12', '', NULL, 0, '55.00', 'New', 0, 13, '1523270584watersp-one.jpg', '', 1, NULL, NULL, '30.7333148', '76.7794179', '2018-04-09 10:43:04', NULL),
(47, 22, 'water_new', 'water new', '', NULL, 0, '23.00', 'New', 0, 13, '1523270666watersp-three.jpg', '', 1, NULL, NULL, '30.7333148', '76.7794179', '2018-04-09 10:44:26', NULL),
(48, 23, 'water_sport_22', 'water sport 22', '', NULL, 0, '34.00', 'New', 0, 13, '1523270957watersp-two.jpg', '', 1, NULL, NULL, '30.7333148', '76.7794179', '2018-04-09 10:49:17', NULL),
(49, 23, 'yachts23', 'Yachts23', '', NULL, 0, '56.00', 'New', 0, 12, '1523271023yacht-one.jpg', '', 1, NULL, NULL, '30.7333148', '76.7794179', '2018-04-09 10:50:23', NULL),
(50, 25, 'yachts_new', 'Yachts new', '', NULL, 0, '67.00', 'Old', 0, 12, '1523271072yacht-three.jpg', '', 1, NULL, NULL, '30.7333148', '76.7794179', '2018-04-09 10:51:12', NULL),
(51, 22, 'yachts_test', 'Yachts test', '', NULL, 0, '78.00', 'New', 0, 12, '1523271115yacht-two.jpg', '', 1, NULL, NULL, '30.7333148', '76.7794179', '2018-04-09 10:51:55', NULL),
(52, 22, 'fishing_boats_12', 'Fishing boats 12', '', NULL, 0, '200.00', 'New', 0, 11, '1523271231fsboats-one.jpg', '', 1, NULL, NULL, '30.7333148', '76.7794179', '2018-04-09 10:53:51', NULL),
(53, 25, 'fishing_boats_new', 'Fishing boats new', '', NULL, 0, '500.00', 'New', 0, 11, '1523271268fsboats-three.jpg', '', 1, NULL, NULL, '30.7333148', '76.7794179', '2018-04-09 10:54:28', NULL),
(54, 25, 'fishing_boats_test', 'Fishing boats test', '', NULL, 0, '249.99', 'New', 0, 1, '1523271343fsboats-two.jpg', '', 1, NULL, NULL, '30.7333148', '76.7794179', '2018-04-09 10:55:43', NULL),
(55, 25, 'fishing_boats_45', 'Fishing boats 45', '', NULL, 0, '149.99', 'New', 0, 11, '1523271548fsboats-two.jpg', '', 1, NULL, NULL, '30.7270', '76.8456', '2018-04-09 10:59:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(12) NOT NULL,
  `order_id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `review` text NOT NULL,
  `rating` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `order_id`, `product_id`, `user_id`, `review`, `rating`, `status`, `created`, `modified`) VALUES
(15, 19, 43, 25, 'sadfasdfsadf', 5, 0, '2018-04-18 14:06:32', '2018-04-18 14:06:32'),
(14, 20, 43, 27, 'frgdfsgfdgf', 3, 0, '2018-04-18 14:03:43', '2018-04-18 14:03:43'),
(16, 22, 43, 27, 'awesome', 4, 0, '2018-04-19 06:50:21', '2018-04-19 06:50:21'),
(8, 23, 40, 27, 'hjkfsdahfdh', 3, 0, '2018-04-18 13:36:27', '2018-04-18 13:36:27'),
(9, 23, 40, 27, 'hjkfsdahfdh', 3, 0, '2018-04-18 13:36:34', '2018-04-18 13:36:34'),
(17, 21, 39, 25, 'dsfgsdfgsdfg', 5, 0, '2018-04-23 04:30:47', '2018-04-23 04:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `staticpages`
--

CREATE TABLE `staticpages` (
  `id` int(11) NOT NULL,
  `slug` varchar(355) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `title` varchar(355) DEFAULT NULL,
  `image` varchar(355) DEFAULT NULL,
  `content` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staticpages`
--

INSERT INTO `staticpages` (`id`, `slug`, `position`, `title`, `image`, `content`, `status`, `created`, `modified`) VALUES
(4, 'privacy-policy', 'privacy-policy', 'Privacy Policy', '1512989667pp.jpg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 1, '2017-08-17 08:22:56', '2018-04-10 09:41:23'),
(5, 'terms-and-conditions', 'terms-and-conditions', 'Terms and Conditions', '1512989542tc.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2017-08-17 09:27:54', '2018-04-10 07:47:25'),
(6, 'frequently-asked-questions', 'faq', 'Frequently Asked Questions', '1512989796faq.jpg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 1, '2017-12-11 09:27:54', '2018-04-10 09:41:03'),
(12, 'about-us', 'about-us', 'About Us', '1512989667pp.jpg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 1, '2017-08-17 08:22:56', '2018-04-10 09:10:51'),
(13, 'trust-and-safety', 'trust-and-safety', 'Trust and Safety', '1512989667pp.jpg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2017-08-17 08:22:56', '2018-04-10 07:58:30'),
(14, 'how-we-works', 'how-we-works', 'How We Works', '1512989667pp.jpg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 1, '2017-08-17 08:22:56', '2018-04-10 09:39:45'),
(15, 'protections', 'protection', 'Protections', '1512989667pp.jpg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 1, '2017-08-17 08:22:56', '2018-04-10 09:39:33'),
(17, 'owner-tools', 'owner-tools', 'Owner Tools', '1512989667pp.jpg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 1, '2017-08-17 08:22:56', '2018-04-10 09:39:24'),
(18, 'make-money-watercrafts', 'make-money-watercrafts', 'Make money from your water craft', '', '', 1, '2017-08-17 08:22:56', '2018-04-10 09:39:24'),
(19, 'rent-water-crafts', 'rent-water-crafts', 'Rent a water craft', '', '', 1, '2017-08-17 08:22:56', '2018-04-10 09:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(355) DEFAULT NULL,
  `name` varchar(355) DEFAULT NULL,
  `last_name` varchar(355) DEFAULT NULL,
  `email` varchar(355) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(355) DEFAULT NULL,
  `password` varchar(355) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `dob` varchar(355) DEFAULT NULL,
  `about` varchar(1000) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(355) DEFAULT NULL,
  `state` varchar(355) DEFAULT NULL,
  `zip` varchar(355) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `fb_id` varchar(255) DEFAULT NULL,
  `tokenhash` text,
  `status` int(2) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `last_name`, `email`, `username`, `phone`, `password`, `image`, `dob`, `about`, `address`, `country`, `state`, `zip`, `google_id`, `fb_id`, `tokenhash`, `status`, `created`, `modified`) VALUES
(1, 'admin', 'kuldeep', 'Jha', 'kuldeep@avainfotech.com', 'kuldeep@avainfotech.com', '123-454-5412', '$2y$10$.Jw.hSSFXHlnA4NZ7tZE1uuvzaI32HECEZiL/6Jo5kab0fv46OhPu', '1523007424avatar5.png', '12/20/1995', NULL, 'chandigarh', 'India', 'chandigarh', '123654', NULL, NULL, NULL, 1, '2017-12-29 09:20:33', '2017-12-29 09:20:33'),
(20, 'user', 'Simerjit', 'Kaur', 'simerjit@avainfotech.com', 'simerjit@avainfotech.com', NULL, '$2y$10$xkaycNJkhziXTaCqBnldRu5bsxLyEkVlPn8OVbtRl4AgnxdJsL6R.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1888425854819074', NULL, 1, '2018-04-03 09:25:30', '2018-04-03 09:25:30'),
(22, 'user', 'pratek', 'sharma', 'sha@gmail.com', 'sha@gmail.com', NULL, '$2y$10$EdsfEZVewoijS479kaIweuA25ezB6uGyTZMex9Cdbu9SDBR1DQoqW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-04-05 06:57:50', '2018-04-05 06:57:50'),
(23, 'user', 'Diksha', 'Khajuria', 'diksha@avainfotech.com', 'diksha@avainfotech.com', NULL, '$2y$10$Qqj5YQM6dFvAUDtSU53vzeB0gFsZEWpxEV8f7pqpFvsLeyZmFZF9O', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '312151222647137', NULL, 1, '2018-04-05 07:02:36', '2018-04-05 07:02:36'),
(25, 'user', 'kuldeep', 'kumar', 'kuldeepjha@avainfotech.com', 'kuldeepjha@avainfotech.com', '123-456-781', '$2y$10$1QRgbCKuzpBua/bTVse1.u2pP6B2c/datbptvjpMDIy.DKprriZ1S', '1523007424avatar5.png', '', 'test description dfsgdfsg', '10 itpark chandigarh', '', '', '', NULL, NULL, '76e2e8e9893902d92a1d3075baa2b1f1', 1, '2018-04-05 07:23:25', '2018-04-10 12:11:01'),
(26, 'user', 'netin', 'sharma', 'netin@avainfotech.com', 'netin@avainfotech.com', NULL, '$2y$10$W88616bKQYI6YAK6Xc/veOx.jK9BWOkYcgGi4/mOdiXbuNQcWxENW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-04-10 05:06:48', '2018-04-10 05:06:48'),
(27, 'user', 'PRATEEK', 'SHARMA', 'prateek@avainfotech.com', 'prateek@avainfotech.com', '858-585-8585', '$2y$10$WgY3AC0CZ02brg/gBVJDy.36.D4PaNpG/AL9lP6BK1SMkVurJeR3e', '1524200064Lighthouse.jpg', '01/28/1984', 'happy go lucky@bjkfhgfg@hjhjgf****', '8585858', NULL, NULL, NULL, NULL, NULL, '91a0c81aef2c6be73d2b21c2cb0b5a9b', 1, '2018-04-10 06:11:10', '2018-04-20 10:10:03'),
(28, 'user', 'Ramit', 'Singh', 'ramit@avainfotech.com', 'ramit@avainfotech.com', NULL, '$2y$10$Klqx5SoPrjeQtp3gLeoe.e9.fUO8sep/eyQLOS8EjeuocpMDm6Zsa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-04-11 14:51:07', '2018-04-11 14:51:07'),
(29, 'user', 'Future Work', 'Technologies', 'futureworktechnologies@gmail.com', 'futureworktechnologies@gmail.com', NULL, '$2y$10$plqdTt.nllBEyG7y5c3MWOF0UVtjmPaRh0Rd5PqC7VNiFJS.SXW.G', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '108240255279762017880', NULL, NULL, 1, '2018-04-11 15:15:03', '2018-04-11 15:15:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staticpages`
--
ALTER TABLE `staticpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;
--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `staticpages`
--
ALTER TABLE `staticpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
