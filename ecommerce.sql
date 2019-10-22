-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 12:06 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `title`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, '1570249777.jpg', 't-shift', 'product/t-shirt', 1, '2019-10-04 21:59:37', '2019-10-04 21:59:37'),
(2, '1570249956.jpg', 'sale-top', 'products', 1, '2019-10-04 22:02:37', '2019-10-04 22:02:37'),
(3, '1570249987.jpg', 'flat', 'products', 1, '2019-10-04 22:03:07', '2019-10-04 22:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `product_name`, `product_code`, `product_color`, `size`, `price`, `quantity`, `user_email`, `session_id`, `created_at`, `updated_at`) VALUES
(8, 25, 'Gucci', 'GC10001', 'blue', 'Large', '55000', 2, '', '4XevCN5rd2q9D9YRZzhEf2jsfpMysuhIreL5qBWi', '2019-09-23 02:57:04', '2019-09-23 02:57:04'),
(9, 33, 'Nike', 'MK10004', 'black', 'Extra Large', '65000', 2, '', '4XevCN5rd2q9D9YRZzhEf2jsfpMysuhIreL5qBWi', '2019-09-23 03:08:11', '2019-09-23 03:08:11'),
(13, 25, 'Gucci', 'GC10001', 'blue', 'Medium', '50000', 2, 'thihazaw111@gmail.com', 'BAxr4bihLe3mKsg0hziEbs4Z51w54c74z2nWTzaf', '2019-09-23 21:12:12', '2019-10-22 01:17:51'),
(15, 41, 'Adidas', 'AD10008', 'white', 'Medium', '80000', 1, 'thihazaw111@gmail.com', 'ikjtCUf3ynDMZ1tExIkhH3f2F0E8YBs9wvOg9z2K', '2019-10-02 01:35:37', '2019-10-21 22:49:52'),
(16, 25, 'Gucci', 'GC10001', 'blue', 'Small', '45000', 1, 'thihazaw111@gmail.com', 'ikjtCUf3ynDMZ1tExIkhH3f2F0E8YBs9wvOg9z2K', '2019-10-21 22:46:58', '2019-10-21 22:49:52'),
(17, 41, 'Adidas', 'AD10008', 'white', 'Small', '75000', 1, 'thihazaw111@gmail.com', 'BAxr4bihLe3mKsg0hziEbs4Z51w54c74z2nWTzaf', '2019-10-22 01:11:31', '2019-10-22 01:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `url`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 0, 'Clothes', 'This is clothes', 'clothes', 1, NULL, '2019-07-29 03:11:07', '2019-08-09 01:29:15'),
(17, 0, 'Hard Disk', 'This is hard disk', 'harddisk', 0, NULL, '2019-07-29 03:12:01', '2019-07-29 03:12:01'),
(23, 15, 'Tshirt', 'This is Tshirt', 'tshirt', 1, NULL, '2019-08-02 01:33:42', '2019-08-09 01:29:02'),
(24, 15, 'Shoe', 'This is Shoe', 'shoe', 1, NULL, '2019-08-02 01:34:27', '2019-08-09 01:40:54'),
(25, 0, 'Electronics', 'This is Electronic', 'electronic', 1, NULL, '2019-08-06 23:02:11', '2019-08-09 01:41:28'),
(26, 25, 'Laptop', 'This is laptop', 'laptop', 1, NULL, '2019-08-06 23:02:52', '2019-08-09 01:41:57'),
(27, 15, 'Bag', 'This is bag', 'bag', 0, NULL, '2019-08-06 23:03:39', '2019-08-06 23:03:39'),
(28, 25, 'Mobille', 'This is mobile phone', 'mobile', 0, NULL, '2019-08-09 01:24:32', '2019-08-09 01:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(4, 'A999', 6565, 'Fixed', '2200-06-30', 0, '2019-09-26 01:06:53', '2019-09-30 22:29:35'),
(6, 'ADF', 10, 'Percentage', '2019-10-18', 1, '2019-09-30 22:10:15', '2019-09-30 22:10:15'),
(7, 'ASDFH', 4000, 'Fixed', '2019-10-30', 1, '2019-09-30 22:11:41', '2019-09-30 22:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `deliver_address`
--

CREATE TABLE `deliver_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliver_address`
--

INSERT INTO `deliver_address` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 6, 'thihazaw111@gmail.com', 'Thihazaw', 'Zeyar', 'Sagaing', 'Sagaing', 'Myanmar', '097777', '0983758735', '2019-10-21 09:48:50', '2019-10-21 03:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_06_24_064236_create_categories_table', 1),
(8, '2019_07_30_095104_create_products_table', 2),
(9, '2019_08_05_071306_create_product_attributes_table', 3),
(10, '2019_09_07_072704_create_product_images_table', 4),
(11, '2019_09_13_094110_create_carts_table', 5),
(13, '2019_09_26_040824_create_coupons_table', 6),
(14, '2019_10_04_072214_create_banners_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `care` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_code`, `product_color`, `description`, `care`, `price`, `image`, `status`, `created_at`, `updated_at`) VALUES
(22, 23, 'Adidas', 'AD10001', 'red', 'This is Adidas Product', '', 36000.00, '1565155687.jpg', 1, '2019-08-03 00:43:08', '2019-08-06 22:58:08'),
(23, 23, 'Adidas', 'AD10004', 'black', 'This is adidas product', 'This is care of Tshirt', 35000.00, '1567150008.jpg', 0, '2019-08-03 00:46:56', '2019-09-13 01:47:54'),
(25, 23, 'Gucci', 'GC10001', 'blue', 'This is Gucci Tshirt', '', 55000.00, '1564976863.jpg', 1, '2019-08-04 21:17:43', '2019-08-04 21:56:22'),
(26, 27, 'Bag Boy', 'bb10001', 'black', 'This is bag product', '', 45000.00, '1565156407.jpg', 1, '2019-08-06 23:05:44', '2019-08-06 23:10:07'),
(27, 27, 'Adidas', 'AD20001', 'wooden', 'This is adidas bag', '', 70000.00, '1565156261.jpg', 1, '2019-08-06 23:07:41', '2019-08-06 23:07:41'),
(28, 27, 'Bellino', 'BL10001', 'grey', 'This is bellino bag', '', 50000.00, '1565156335.jpg', 1, '2019-08-06 23:08:55', '2019-08-06 23:08:55'),
(33, 23, 'Nike', 'MK10004', 'black', 'This is product of Nike', 'This is material and care of Nike', 50000.00, '1567150084.jpg', 1, '2019-08-29 21:37:58', '2019-08-30 00:58:06'),
(36, 23, 'Adidas', 'AD10005', 'yellow', 'Adidas', 'Adidas', 25000.00, '1567846590.jpg', 1, '2019-09-07 02:26:30', '2019-09-07 02:26:30'),
(37, 23, 'Adidas', 'AD10006', 'blue', 'Adidas', 'Adidas', 34000.00, '1567848911.jpg', 1, '2019-09-07 03:05:11', '2019-09-07 03:05:11'),
(38, 23, 'Shark', 'sh10004', 'black', 'Shark', 'Shark', 3000.00, '1567849120.jpg', 1, '2019-09-07 03:08:40', '2019-09-07 03:08:40'),
(39, 24, 'Adidas', 'AD10007', 'black', 'Adidas', 'Adidas', 45000.00, '1567849517.jpg', 1, '2019-09-07 03:15:18', '2019-09-07 03:15:18'),
(41, 24, 'Adidas', 'AD10008', 'white', 'Adidas', 'Adidas', 80000.00, '1567849925.jpg', 1, '2019-09-07 03:22:05', '2019-09-07 03:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(9, 25, 'Gu10001 sm', 'Small', 45000.00, 10, '2019-08-06 02:39:56', '2019-08-06 02:39:56'),
(10, 25, 'Gu10001 md', 'Medium', 50000.00, 20, '2019-08-06 02:39:56', '2019-08-06 02:39:56'),
(11, 25, 'Gucci xl', 'Large', 55000.00, 5, '2019-08-06 02:39:56', '2019-08-06 02:39:56'),
(13, 31, 'Asus AS10001 1400', '1400', 800000.00, 10, '2019-08-06 23:18:40', '2019-08-06 23:18:40'),
(14, 31, 'Asus AS10001 1600', '1600', 900000.00, 10, '2019-08-06 23:18:40', '2019-08-06 23:18:40'),
(15, 33, 'NK10004-S', 'Small', 50000.00, 10, '2019-08-30 00:00:57', '2019-08-30 00:00:57'),
(16, 33, 'MK10004-M', 'Medium', 55000.00, 10, '2019-08-30 00:00:57', '2019-08-30 00:00:57'),
(17, 33, 'MK10004-L', 'Large', 60000.00, 10, '2019-08-30 00:00:57', '2019-08-30 00:00:57'),
(18, 33, 'MK10004-XL', 'Extra Large', 65000.00, 10, '2019-08-30 00:00:57', '2019-08-30 00:00:57'),
(19, 41, 'AD10008-sm', 'Small', 75000.00, 20, '2019-09-07 03:24:42', '2019-09-10 02:05:31'),
(20, 41, 'AD10008-md', 'Medium', 80000.00, 10, '2019-09-07 03:24:42', '2019-09-07 03:24:42'),
(21, 41, 'AD10008-lg', 'Large', 85000.00, 0, '2019-09-07 03:24:42', '2019-09-12 22:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(19, 36, '1567848563.jpg', '2019-09-07 02:59:24', '2019-09-07 02:59:24'),
(20, 36, '1567848578.jpg', '2019-09-07 02:59:38', '2019-09-07 02:59:38'),
(21, 36, '1567848588.jpg', '2019-09-07 02:59:48', '2019-09-07 02:59:48'),
(22, 37, '1567848927.jpg', '2019-09-07 03:05:28', '2019-09-07 03:05:28'),
(23, 37, '1567848935.jpg', '2019-09-07 03:05:35', '2019-09-07 03:05:35'),
(24, 37, '1567848955.jpg', '2019-09-07 03:05:55', '2019-09-07 03:05:55'),
(25, 38, '1567849135.jpg', '2019-09-07 03:08:56', '2019-09-07 03:08:56'),
(26, 38, '1567849145.jpg', '2019-09-07 03:09:05', '2019-09-07 03:09:05'),
(27, 38, '1567849154.jpg', '2019-09-07 03:09:14', '2019-09-07 03:09:14'),
(28, 38, '1567849247.jpg', '2019-09-07 03:10:47', '2019-09-07 03:10:47'),
(29, 39, '1567849532.jpg', '2019-09-07 03:15:33', '2019-09-07 03:15:33'),
(30, 39, '1567849542.jpg', '2019-09-07 03:15:42', '2019-09-07 03:15:42'),
(31, 39, '1567849551.jpg', '2019-09-07 03:15:51', '2019-09-07 03:15:51'),
(36, 41, '1567849952.jpg', '2019-09-07 03:22:32', '2019-09-07 03:22:32'),
(37, 41, '1567849964.jpg', '2019-09-07 03:22:44', '2019-09-07 03:22:44'),
(38, 41, '1567849973.jpg', '2019-09-07 03:22:54', '2019-09-07 03:22:54'),
(39, 41, '1567849982.jpg', '2019-09-07 03:23:03', '2019-09-07 03:23:03'),
(40, 23, '1569225665.jpg', '2019-09-23 01:31:06', '2019-09-23 01:31:06'),
(41, 23, '1569225679.jpg', '2019-09-23 01:31:20', '2019-09-23 01:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Thihazaw', NULL, NULL, NULL, NULL, NULL, NULL, 'thihazaw777@gmail.com', NULL, '$2y$10$.PWQ26nNPyVU4yOKVnQsDORNvzPDauCFq/BnRc9Rdm4OJ1Z/FCwtG', 1, NULL, '2019-07-26 01:24:52', '2019-07-27 03:25:25'),
(3, 'Thiha', NULL, NULL, NULL, NULL, NULL, NULL, 'thiha@gmail.com', NULL, '$2y$10$EM5OL39Ih7Tvsb5gd1W2i.pIKRuZM0CekZMncNWXLmHS682ZKUROK', 0, NULL, '2019-07-26 02:02:15', '2019-07-26 02:02:15'),
(4, 'Thihazaw', NULL, NULL, NULL, NULL, NULL, NULL, 'thihazaw@gmail.com', NULL, '$2y$10$4uqkKN41Th.4JIXvcDxZZeOoDnzEVXLl/sR5WBwKr1P3p5VjOfcDe', 0, NULL, '2019-10-08 02:01:47', '2019-10-08 02:01:47'),
(5, 'Thihazaw', NULL, NULL, NULL, NULL, NULL, NULL, 'thihazawww@gmail.com', NULL, '$2y$10$G.Nr7mCyHPiPPae07AIRnuNBDgr.7khAKTznKP6VNkOBuiafSeIZ.', 0, NULL, '2019-10-09 21:58:56', '2019-10-09 21:58:56'),
(6, 'Thihazaw', 'Zeyar', 'Sagaing', 'Sagaing', 'Myanmar', '097777', '0983758735', 'thihazaw111@gmail.com', NULL, '$2y$10$RskxNrToK9IrJGySy9pbFevRZOYMLffqr.D9nj6Lp7s1blAccR5SS', 0, NULL, '2019-10-15 21:23:25', '2019-10-21 03:18:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliver_address`
--
ALTER TABLE `deliver_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deliver_address`
--
ALTER TABLE `deliver_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
