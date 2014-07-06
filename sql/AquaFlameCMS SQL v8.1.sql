-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.27 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla website.comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `newsid` INT(10) NOT NULL,
  `comment` TEXT NOT NULL,
  `accountId` INT(10) NOT NULL DEFAULT '1337',
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply` INT(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.comments: 3 rows
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Volcando estructura para tabla website.contacts
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` INT(11) UNSIGNED DEFAULT NULL COMMENT 'Account ID',
  `country` VARCHAR(50) DEFAULT NULL COMMENT 'The Country of Residence',
  `date` DATE DEFAULT NULL COMMENT 'Date of Birth',
  `year` YEAR(4) DEFAULT NULL COMMENT 'Year of Birth',
  `security_question` CHAR(4) DEFAULT NULL COMMENT 'Security Question from the Registration',
  `answer` VARCHAR(50) DEFAULT NULL COMMENT 'Answer of the Security Question',
  `name` VARCHAR(50) DEFAULT NULL COMMENT 'User''s Name',
  `lastname` VARCHAR(50) DEFAULT NULL COMMENT 'User''s Last Name'
) ENGINE=MYISAM DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.contacts: 0 rows
DELETE FROM `contacts`;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;


-- Volcando estructura para tabla website.country
DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `iso` CHAR(2) NOT NULL,
  `name` VARCHAR(80) NOT NULL,
  `printable_name` VARCHAR(80) NOT NULL,
  `iso3` CHAR(3) DEFAULT NULL,
  `numcode` SMALLINT(6) DEFAULT NULL,
  PRIMARY KEY (`iso`),
  UNIQUE KEY `id` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla website.country: ~239 rows (aproximadamente)
DELETE FROM `country`;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` (`id`, `iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES
	(1, 'AD', 'ANDORRA', 'Andorra', 'AND', 20),
	(2, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784),
	(3, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4),
	(4, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28),
	(5, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660),
	(6, 'AL', 'ALBANIA', 'Albania', 'ALB', 8),
	(7, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51),
	(8, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530),
	(9, 'AO', 'ANGOLA', 'Angola', 'AGO', 24),
	(10, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL),
	(11, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32),
	(12, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16),
	(13, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40),
	(14, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36),
	(15, 'AW', 'ARUBA', 'Aruba', 'ABW', 533),
	(16, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31),
	(17, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70),
	(18, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52),
	(19, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50),
	(20, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56),
	(21, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854),
	(22, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100),
	(23, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48),
	(24, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108),
	(25, 'BJ', 'BENIN', 'Benin', 'BEN', 204),
	(26, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60),
	(27, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96),
	(28, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68),
	(29, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76),
	(30, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44),
	(31, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64),
	(32, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL),
	(33, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72),
	(34, 'BY', 'BELARUS', 'Belarus', 'BLR', 112),
	(35, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84),
	(36, 'CA', 'CANADA', 'Canada', 'CAN', 124),
	(37, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL),
	(38, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180),
	(39, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140),
	(40, 'CG', 'CONGO', 'Congo', 'COG', 178),
	(41, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756),
	(42, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384),
	(43, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184),
	(44, 'CL', 'CHILE', 'Chile', 'CHL', 152),
	(45, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120),
	(46, 'CN', 'CHINA', 'China', 'CHN', 156),
	(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170),
	(48, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188),
	(49, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL),
	(50, 'CU', 'CUBA', 'Cuba', 'CUB', 192),
	(51, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132),
	(52, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL),
	(53, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196),
	(54, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203),
	(55, 'DE', 'GERMANY', 'Germany', 'DEU', 276),
	(56, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262),
	(57, 'DK', 'DENMARK', 'Denmark', 'DNK', 208),
	(58, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212),
	(59, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214),
	(60, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12),
	(61, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218),
	(62, 'EE', 'ESTONIA', 'Estonia', 'EST', 233),
	(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818),
	(64, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732),
	(65, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232),
	(66, 'ES', 'SPAIN', 'Spain', 'ESP', 724),
	(67, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231),
	(68, 'FI', 'FINLAND', 'Finland', 'FIN', 246),
	(69, 'FJ', 'FIJI', 'Fiji', 'FJI', 242),
	(70, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238),
	(71, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583),
	(72, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234),
	(73, 'FR', 'FRANCE', 'France', 'FRA', 250),
	(74, 'GA', 'GABON', 'Gabon', 'GAB', 266),
	(75, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826),
	(76, 'GD', 'GRENADA', 'Grenada', 'GRD', 308),
	(77, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268),
	(78, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254),
	(79, 'GH', 'GHANA', 'Ghana', 'GHA', 288),
	(80, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292),
	(81, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304),
	(82, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270),
	(83, 'GN', 'GUINEA', 'Guinea', 'GIN', 324),
	(84, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312),
	(85, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226),
	(86, 'GR', 'GREECE', 'Greece', 'GRC', 300),
	(87, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL),
	(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320),
	(89, 'GU', 'GUAM', 'Guam', 'GUM', 316),
	(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624),
	(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328),
	(92, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344),
	(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL),
	(94, 'HN', 'HONDURAS', 'Honduras', 'HND', 340),
	(95, 'HR', 'CROATIA', 'Croatia', 'HRV', 191),
	(96, 'HT', 'HAITI', 'Haiti', 'HTI', 332),
	(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348),
	(98, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360),
	(99, 'IE', 'IRELAND', 'Ireland', 'IRL', 372),
	(100, 'IL', 'ISRAEL', 'Israel', 'ISR', 376),
	(101, 'IN', 'INDIA', 'India', 'IND', 356),
	(102, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL),
	(103, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368),
	(104, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364),
	(105, 'IS', 'ICELAND', 'Iceland', 'ISL', 352),
	(106, 'IT', 'ITALY', 'Italy', 'ITA', 380),
	(107, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388),
	(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400),
	(109, 'JP', 'JAPAN', 'Japan', 'JPN', 392),
	(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404),
	(111, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417),
	(112, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116),
	(113, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296),
	(114, 'KM', 'COMOROS', 'Comoros', 'COM', 174),
	(115, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659),
	(116, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408),
	(117, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410),
	(118, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414),
	(119, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136),
	(120, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398),
	(121, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418),
	(122, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422),
	(123, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662),
	(124, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438),
	(125, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144),
	(126, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430),
	(127, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426),
	(128, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440),
	(129, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442),
	(130, 'LV', 'LATVIA', 'Latvia', 'LVA', 428),
	(131, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434),
	(132, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504),
	(133, 'MC', 'MONACO', 'Monaco', 'MCO', 492),
	(134, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498),
	(135, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450),
	(136, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584),
	(137, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807),
	(138, 'ML', 'MALI', 'Mali', 'MLI', 466),
	(139, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104),
	(140, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496),
	(141, 'MO', 'MACAO', 'Macao', 'MAC', 446),
	(142, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580),
	(143, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474),
	(144, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478),
	(145, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500),
	(146, 'MT', 'MALTA', 'Malta', 'MLT', 470),
	(147, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480),
	(148, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462),
	(149, 'MW', 'MALAWI', 'Malawi', 'MWI', 454),
	(150, 'MX', 'MEXICO', 'Mexico', 'MEX', 484),
	(151, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458),
	(152, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508),
	(153, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516),
	(154, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540),
	(155, 'NE', 'NIGER', 'Niger', 'NER', 562),
	(156, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574),
	(157, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566),
	(158, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558),
	(159, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528),
	(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578),
	(161, 'NP', 'NEPAL', 'Nepal', 'NPL', 524),
	(162, 'NR', 'NAURU', 'Nauru', 'NRU', 520),
	(163, 'NU', 'NIUE', 'Niue', 'NIU', 570),
	(164, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554),
	(165, 'OM', 'OMAN', 'Oman', 'OMN', 512),
	(166, 'PA', 'PANAMA', 'Panama', 'PAN', 591),
	(167, 'PE', 'PERU', 'Peru', 'PER', 604),
	(168, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258),
	(169, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598),
	(170, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608),
	(171, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586),
	(172, 'PL', 'POLAND', 'Poland', 'POL', 616),
	(173, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666),
	(174, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612),
	(175, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630),
	(176, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL),
	(177, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620),
	(178, 'PW', 'PALAU', 'Palau', 'PLW', 585),
	(179, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600),
	(180, 'QA', 'QATAR', 'Qatar', 'QAT', 634),
	(181, 'RE', 'REUNION', 'Reunion', 'REU', 638),
	(182, 'RO', 'ROMANIA', 'Romania', 'ROM', 642),
	(183, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643),
	(184, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646),
	(185, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682),
	(186, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90),
	(187, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690),
	(188, 'SD', 'SUDAN', 'Sudan', 'SDN', 736),
	(189, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752),
	(190, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702),
	(191, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654),
	(192, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705),
	(193, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744),
	(194, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703),
	(195, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694),
	(196, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674),
	(197, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686),
	(198, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706),
	(199, 'SR', 'SURINAME', 'Suriname', 'SUR', 740),
	(200, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678),
	(201, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222),
	(202, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760),
	(203, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748),
	(204, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796),
	(205, 'TD', 'CHAD', 'Chad', 'TCD', 148),
	(206, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL),
	(207, 'TG', 'TOGO', 'Togo', 'TGO', 768),
	(208, 'TH', 'THAILAND', 'Thailand', 'THA', 764),
	(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762),
	(210, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772),
	(211, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL),
	(212, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795),
	(213, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788),
	(214, 'TO', 'TONGA', 'Tonga', 'TON', 776),
	(215, 'TR', 'TURKEY', 'Turkey', 'TUR', 792),
	(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780),
	(217, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798),
	(218, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158),
	(219, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834),
	(220, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804),
	(221, 'UG', 'UGANDA', 'Uganda', 'UGA', 800),
	(222, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL),
	(223, 'US', 'UNITED STATES', 'United States', 'USA', 840),
	(224, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858),
	(225, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860),
	(226, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336),
	(227, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670),
	(228, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862),
	(229, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92),
	(230, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850),
	(231, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704),
	(232, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548),
	(233, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876),
	(234, 'WS', 'SAMOA', 'Samoa', 'WSM', 882),
	(235, 'YE', 'YEMEN', 'Yemen', 'YEM', 887),
	(236, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL),
	(237, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710),
	(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894),
	(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;


-- Volcando estructura para tabla website.forum_blizzposts
DROP TABLE IF EXISTS `forum_blizzposts`;
CREATE TABLE IF NOT EXISTS `forum_blizzposts` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(255) DEFAULT NULL,
  `author` VARCHAR(255) DEFAULT NULL,
  `postid` INT(10) DEFAULT NULL,
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.forum_blizzposts: 8 rows
DELETE FROM `forum_blizzposts`;
/*!40000 ALTER TABLE `forum_blizzposts` DISABLE KEYS */;
INSERT INTO `forum_blizzposts` (`id`, `type`, `author`, `postid`, `date`) VALUES
	(1, 'thread', '1', 7, '2013-08-11 17:53:36'),
	(2, 'thread', '1', 8, '2013-08-11 17:55:24'),
	(3, 'thread', '1', 9, '2013-08-12 00:21:42'),
	(4, 'thread', '1', 10, '2013-08-12 00:22:10'),
	(5, 'reply', '1', 34, '2013-08-12 00:22:38'),
	(6, 'thread', '1', 11, '2013-08-12 00:36:22'),
	(7, 'thread', '1', 12, '2013-08-12 00:36:56'),
	(8, 'thread', '1', 13, '2013-08-12 00:37:15');
/*!40000 ALTER TABLE `forum_blizzposts` ENABLE KEYS */;


-- Volcando estructura para tabla website.forum_categ
DROP TABLE IF EXISTS `forum_categ`;
CREATE TABLE IF NOT EXISTS `forum_categ` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `num` INT(10) DEFAULT NULL,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.forum_categ: 4 rows
DELETE FROM `forum_categ`;
/*!40000 ALTER TABLE `forum_categ` DISABLE KEYS */;
INSERT INTO `forum_categ` (`id`, `num`, `name`) VALUES
	(1, 1, 'General'),
	(2, 2, 'Server Support'),
	(3, 3, 'Free Chat'),
	(4, 4, 'Community');
/*!40000 ALTER TABLE `forum_categ` ENABLE KEYS */;


-- Volcando estructura para tabla website.forum_forums
DROP TABLE IF EXISTS `forum_forums`;
CREATE TABLE IF NOT EXISTS `forum_forums` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `num` int(10) NOT NULL,
  `categ` int(10) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `locked` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.forum_forums: 9 rows
DELETE FROM `forum_forums`;
/*!40000 ALTER TABLE `forum_forums` DISABLE KEYS */;
INSERT INTO `forum_forums` (`id`, `num`, `categ`, `status`, `name`, `image`, `description`, `locked`) VALUES
	(1, 1, 1, '[Limited]', 'Announcement', 'blizzard', 'Important messages, announcements, informations regarding our server will be posted here.', 1),
	(2, 2, 1, '[Read-Only]', 'General Talk', 'general', 'You can talk for anything that you want. Similar to Free Chat but cooler.', 0),
	(3, 3, 1, '[Limited]', 'Bugs', 'bugs', 'Here you can post for world problems that you encounter, except Quests.', 0),
	(4, 4, 1, '[Read-Only]', 'Suggestions', 'suggestions', 'Post here your ideas regarding WoWFailureCMS.', 0),
	(5, 5, 2, '', 'Free Topic', 'support', 'Here you can post for any problems that you encounter in our server. We would be much obliged to know our errors.', 0),
	(6, 6, 2, '', 'Quest Related', 'cs', 'Here you can post for problems that you encounter with our Quests or any other problem related to them.', 0),
	(7, 7, 3, '', 'Free Chat', 'blood', 'Post whatever you like. Forum is open free to even offtopic.', 0),
	(8, 8, 4, '', 'French', 'france', 'This part of the forum is for French only.', 0),
	(9, 9, 4, '', 'German', 'germany', 'This part of the forum is for German only.', 0);
/*!40000 ALTER TABLE `forum_forums` ENABLE KEYS */;


-- Volcando estructura para tabla website.forum_posts
DROP TABLE IF EXISTS `forum_posts`;
CREATE TABLE IF NOT EXISTS `forum_posts` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `type` INT(2) NOT NULL DEFAULT '0',
  `postid` INT(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.forum_posts: 8 rows
DELETE FROM `forum_posts`;
/*!40000 ALTER TABLE `forum_posts` DISABLE KEYS */;
INSERT INTO `forum_posts` (`id`, `type`, `postid`) VALUES
	(38, 1, 7),
	(39, 1, 8),
	(40, 1, 9),
	(41, 1, 10),
	(42, 2, 34),
	(43, 1, 11),
	(44, 1, 12),
	(45, 1, 13);
/*!40000 ALTER TABLE `forum_posts` ENABLE KEYS */;


-- Volcando estructura para tabla website.forum_replies
DROP TABLE IF EXISTS `forum_replies`;
CREATE TABLE IF NOT EXISTS `forum_replies` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `threadid` INT(10) NOT NULL,
  `content` TEXT NOT NULL,
  `author` INT(10) NOT NULL,
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `forumid` INT(10) NOT NULL,
  `name` VARCHAR(255) DEFAULT NULL,
  `edited` INT(1) NOT NULL DEFAULT '0',
  `editedby` INT(10) NOT NULL DEFAULT '0',
  `last_date` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.forum_replies: 1 rows
DELETE FROM `forum_replies`;
/*!40000 ALTER TABLE `forum_replies` DISABLE KEYS */;
INSERT INTO `forum_replies` (`id`, `threadid`, `content`, `author`, `date`, `forumid`, `name`, `edited`, `editedby`, `last_date`) VALUES
	(34, 10, 'I was the 1.000.000th visitor on a site, but no prize yet?', 1, '2013-08-11 23:22:38', 2, 'Do we even care? Just Lift!', 0, 0, '2013-08-11 23:22:38');
/*!40000 ALTER TABLE `forum_replies` ENABLE KEYS */;


-- Volcando estructura para tabla website.forum_threads
DROP TABLE IF EXISTS `forum_threads`;
CREATE TABLE IF NOT EXISTS `forum_threads` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `forumid` INT(10) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `author` INT(10) NOT NULL,
  `replies` INT(10) NOT NULL DEFAULT '0',
  `views` INT(10) NOT NULL DEFAULT '0',
  `date` TIMESTAMP NULL DEFAULT NULL,
  `content` TEXT NOT NULL,
  `locked` TINYINT(1) DEFAULT '0',
  `has_blizz` TINYINT(1) DEFAULT '0',
  `prefix` VARCHAR(255) NOT NULL DEFAULT 'none',
  `last_date` DATETIME NOT NULL,
  `edited` INT(1) NOT NULL DEFAULT '0',
  `editedby` INT(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.forum_threads: 7 rows
DELETE FROM `forum_threads`;
/*!40000 ALTER TABLE `forum_threads` DISABLE KEYS */;
INSERT INTO `forum_threads` (`id`, `forumid`, `name`, `author`, `replies`, `views`, `date`, `content`, `locked`, `has_blizz`, `prefix`, `last_date`, `edited`, `editedby`) VALUES
	(7, 2, 'Feels good?', 1, 0, 0, '2013-08-11 16:53:36', 'Oh! It does not!<br />\r\nNOOBS!', 0, 1, 'none', '2013-08-11 16:53:36', 0, 0),
	(8, 2, 'Sometimes we don\\\'t care!', 1, 0, 0, '2013-08-11 16:55:24', 'It is true that some times we don\\\'t care what happens to our fellow friends! <br />\r\nWell if a private server dies it dies! That\\\'s all, the end! Even if a server has the best fixes and better playability players don\\\'t care they just play on the server that they got used to and they don\\\'t even want to test anything else. This is bad for the private servers community!', 0, 1, 'none', '2013-08-11 16:55:24', 0, 0),
	(9, 2, 'This is no fun!', 1, 0, 0, '2013-08-11 23:21:42', 'Haha such a fucked up topic!', 0, 1, 'none', '2013-08-11 23:21:42', 0, 0),
	(10, 2, 'Do we even care? Just Lift!', 1, 1, 3, '2013-08-11 23:22:10', 'I was so lucky. My grandson showed me how to use the internet, and the very first website I go to tells me I won! Now all I have to do is wait, but does anyone know for how long?', 0, 1, 'none', '2013-08-11 23:22:38', 0, 0),
	(11, 2, 'This got to get fixed!', 1, 0, 2, '2013-08-11 23:36:22', 'Really?!', 0, 1, 'none', '2013-08-11 23:36:22', 0, 0),
	(12, 3, 'Super Bugs! Section denied!', 1, 0, 1, '2013-08-11 23:36:56', 'YEAH!', 0, 1, 'none', '2013-08-11 23:36:56', 0, 0),
	(13, 4, 'Another damn post in Suggestions!', 1, 0, 4, '2013-08-11 23:37:15', 'Suggestions: 0', 0, 1, 'none', '2013-08-11 23:37:15', 0, 0);
/*!40000 ALTER TABLE `forum_threads` ENABLE KEYS */;


-- Volcando estructura para tabla website.items
DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` INT(11) DEFAULT NULL,
  `entry` INT(11) DEFAULT NULL,
  `bind` VARCHAR(50) DEFAULT NULL,
  `name` VARCHAR(50) DEFAULT NULL,
  `type` VARCHAR(50) DEFAULT NULL,
  `speed` INT(11) DEFAULT NULL,
  `stats` VARCHAR(50) DEFAULT NULL,
  `str` INT(11) DEFAULT NULL,
  `agi` INT(11) DEFAULT NULL,
  `int` INT(11) DEFAULT NULL,
  `sprt` INT(11) DEFAULT NULL,
  `haste` INT(11) DEFAULT NULL,
  `crit` INT(11) DEFAULT NULL,
  `mast` INT(11) DEFAULT NULL,
  `spellp` INT(11) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8 COMMENT='This is the items table for the item DB from CMS 1.5';

-- Volcando datos para la tabla website.items: ~1 rows (aproximadamente)
DELETE FROM `items`;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `entry`, `bind`, `name`, `type`, `speed`, `stats`, `str`, `agi`, `int`, `sprt`, `haste`, `crit`, `mast`, `spellp`) VALUES
	(1, 24448, 'Binds on Pickup', 'Test Sword', 'Sword', 1, 'str,agi,crit,mast', 320, 287, 0, 0, 0, 1032, 980, 0);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;


-- Volcando estructura para tabla website.links
DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id` INT(11) DEFAULT NULL,
  `name` VARCHAR(50) DEFAULT NULL,
  `link` VARCHAR(50) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.links: ~1 rows (aproximadamente)
DELETE FROM `links`;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` (`id`, `name`, `link`) VALUES
	(1, 'ClientDownload', 'Yourdownloadlink.torrent');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;


-- Volcando estructura para tabla website.logs
DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` INT(11) DEFAULT NULL,
  `date` DATETIME DEFAULT NULL,
  `txn_id` VARCHAR(32) DEFAULT NULL,
  `payer_email` VARCHAR(64) DEFAULT NULL,
  `amount` FLOAT DEFAULT NULL,
  `info` BLOB,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.logs: 0 rows
DELETE FROM `logs`;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;


-- Volcando estructura para tabla website.media
DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `author` INT(10) NOT NULL DEFAULT '0',
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_url` VARCHAR(30) NOT NULL DEFAULT '0' COMMENT 'Just Youtube Videos',
  `title` TEXT,
  `description` TEXT,
  `comments` INT(10) DEFAULT '0',
  `link` VARCHAR(255) DEFAULT '#',
  `visible` INT(2) NOT NULL DEFAULT '0',
  `type` INT(2) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0 video - 1 wallpapapers - 2 screenshots - 3 artwork - 4 comics',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.media: 4 rows
DELETE FROM `media`;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` (`id`, `author`, `date`, `id_url`, `title`, `description`, `comments`, `link`, `visible`, `type`) VALUES
	(16, 1, '2014-04-06 17:55:47', '-E5M3X-1KP0', 'CATACLYSM (Español - España) - World of Warcraft', 'Trailer of the third World of Warcraft Expansion.</br>This expansion supouse a big change for Azeroth, all the known world will change and the Deathwing`s rage will change the curse of the life.', 0, 'http://www.youtube.com/watch?v=-E5M3X-1KP0', 1, 0),
	(17, 1, '2013-09-18 02:09:54', 'CARC72zF7UI', 'World of Warcraft - Cinemáticas', 'Normal Video', 0, 'http://www.youtube.com/watch?v=CARC72zF7UI', 1, 0),
	(18, 1, '2013-09-18 02:09:54', 'dYK_Gqyf48Y', 'World of Warcraft - Cinematic Trailer', 'Some Trailers', 0, 'http://www.youtube.com/watch?v=dYK_Gqyf48Y', 1, 0),
	(19, 1, '2013-09-18 02:09:55', 'IBHL_-biMrQ', 'World of Warcraft: The Burning Crusade', 'TBC Trailer', 0, 'http://www.youtube.com/watch?v=IBHL_-biMrQ', 1, 0);
/*!40000 ALTER TABLE `media` ENABLE KEYS */;


-- Volcando estructura para tabla website.media_comments
DROP TABLE IF EXISTS `media_comments`;
CREATE TABLE IF NOT EXISTS `media_comments` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `mediaid` INT(10) NOT NULL,
  `comment` TEXT NOT NULL,
  `accountId` INT(10) NOT NULL,
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.media_comments: 0 rows
DELETE FROM `media_comments`;
/*!40000 ALTER TABLE `media_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_comments` ENABLE KEYS */;


-- Volcando estructura para tabla website.messages
DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `author` VARCHAR(255) NOT NULL DEFAULT 'FailZorD',
  `class` VARCHAR(255) NOT NULL DEFAULT 'Administrator',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.messages: 0 rows
DELETE FROM `messages`;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;


-- Volcando estructura para tabla website.motd
DROP TABLE IF EXISTS `motd`;
CREATE TABLE IF NOT EXISTS `motd` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `day` INT(11) NOT NULL,
  `image` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.motd: ~1 rows (aproximadamente)
DELETE FROM `motd`;
/*!40000 ALTER TABLE `motd` DISABLE KEYS */;
INSERT INTO `motd` (`id`, `day`, `image`) VALUES
	(1, 25, 0);
/*!40000 ALTER TABLE `motd` ENABLE KEYS */;


-- Volcando estructura para tabla website.news
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `author` INT(10) NOT NULL DEFAULT '0',
  `date` DATETIME NOT NULL,
  `content` TEXT,
  `contentlnk` TEXT,
  `title` TEXT,
  `comments` INT(10) DEFAULT '0',
  `image` VARCHAR(255) DEFAULT 'staff',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.news: 2 rows
DELETE FROM `news`;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `author`, `date`, `content`, `contentlnk`, `title`, `comments`, `image`) VALUES
	(1, 1, '0000-00-00 00:00:00', 'World of Warcraft Patch 4.3: Hour of Twilight nears, and with it, Deathwingï¿½s reign of terror will finally come to an end. Featuring a new raid, unexplored dungeons, a legendary rogue quest line, the latest raid tier armor sets, major story developments, the Transmogrification and Void Storage features, and much more, Hour of Twilight has something for everyone..\r\n<div id="center"><br>\r\n	<div class="ctextheadline">\r\n		<img src="http://eu.media4.battle.net/cms/gallery/RC2CO4SNOMFT1320833523998.jpg" style="width: 580px; height: 45px;">\r\n		<h1>\r\n			Content &amp; Features</h1>\r\n	</div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media5.battle.net/cms/blog_thumbnail/6UI3J2B2ZLHI1317321685765.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Raid Finder</span><br>\r\n		<span class="summarytext">Enjoy our brand-new grouping feature that works much like the Dungeon Finder.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media4.battle.net/cms/blog_thumbnail/SOHDLM4OWJF71313585059916.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Transmogrification</span><br>\r\n		<span class="summarytext">Customize the appearance of your weapons and armor like never before.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media4.battle.net/cms/blog_thumbnail/6XAVNMWID70C1313660227876.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Void Storage</span><br>\r\n		<span class="summarytext">Characters of all levels will be able to take advantage of this brand-new technology, which will open up 80 slots of long-term storage space.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media5.battle.net/cms/blog_thumbnail/S8BLQAJZL9301317746259756.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Valor Changes</span><br>\r\n		<span class="summarytext">With patch 4.3, we\'ll be introducing some changes to the way Valor Points are obtained, as well as the items they can be exchanged for.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media2.battle.net/cms/blog_thumbnail/TF5FWQJV66MF1317210321396.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Fangs of the Father</span><br>\r\n		<span class="summarytext">Attention rogues! Play a central role in the fate of Azeroth by doing what you do best: manipulating key events from the shadows.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/P9VUT605DXAZ1314262079585.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">The All-New Darkmoon Faire</span><br>\r\n		<span class="summarytext">Youï¿½ll be dazzled. Youï¿½ll be amazed! You arenï¿½t prepared for the Darkmoon Faire, ï¿½cause itï¿½s like nothing youï¿½ve seen before!</span></a></div>\r\n	<p style="clear: both;">&nbsp;</p>\r\n	<div class="ctextheadline">\r\n		<img src="http://eu.media5.battle.net/cms/gallery/OVXWRHAJZJ4P1320833656835.jpg" style="width: 580px; height: 45px;">\r\n		<h1>\r\n			Tier 13 Sets and Visual Retrospective</h1>\r\n	</div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media3.battle.net/cms/blog_thumbnail/W1C83D9578F71315579410079.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Warlock Tier Set</span><br>\r\n		<span class="summarytext">The warlock set has the flavor of the Old Gods about it, full of dark and warped aesthetics. General Vezax from the Ulduar raid was used as a reference point.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/XTSGMRFB7ZF41317987453789.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Hunter Tier Set</span><br>\r\n		<span class="summarytext">A dragon-head helm and chained leathery wings around the shoulders -- the set gives the impression of a skeletal dragon crouching over the hunter\'s upper body.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media4.battle.net/cms/blog_thumbnail/0AP817VT773C1316103167706.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Mage Tier Set</span><br>\r\n		<span class="summarytext">The combination of moving cogs, quilted fabric, and buckled straps give the set an intriguing "techno-mage" flavor.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media3.battle.net/cms/blog_thumbnail/95KFX579H9261315935561322.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Druid Tier Set</span><br>\r\n		<span class="summarytext">Twisting, organic shapes are often key elements of a druid set, and this tier is no exception, with writhing plant roots providing a frame for the glowing clusters of fungi.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/7J7DWPT5WW2M1316014013476.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Shaman Tier Set</span><br>\r\n		<span class="summarytext">The shaman set combines huge wolf-skull shoulder pads, bone fetishes, and fur with glowing shards of amber crystal: a mix of the animal and the elemental.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media5.battle.net/cms/blog_thumbnail/WZBWZUQSA6UG1315511140272.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Warrior Tier Set</span><br>\r\n		<span class="summarytext">Gnarled dragon horn and angular elementium plating with burning fire behind it were the key ingredients.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media2.battle.net/cms/blog_thumbnail/MZLJSYVI6GKI1316629978030.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Paladin Tier Set</span><br>\r\n		<span class="summarytext">The ï¿½featheredï¿½ plate mail, rendered in silver and gold, creates an aggressive, yet sweeping and powerful silhouette for the paladin.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/MKP8J0HP9B1V1316527703712.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Rogue Tier Set</span><br>\r\n		<span class="summarytext">A close-fitting mask, collar, and cowl helps reinforce the rogue\'s sneaky silhouette, despite the sharp, bladed details.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/FV1PBVSBVI8S1317203740617.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Priest Tier Set</span><br>\r\n		<span class="summarytext">Creepy, soulless black eyes and a spiked, setting sun motif create the bold two-tone priest set.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/VO7DROA9BVXD1319724579692.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Death Knight Tier Set</span><br>\r\n		<span class="summarytext">The Necrotic Boneplate set features bones stretched and twisted into unnatural shapes by sorcerous means.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media2.battle.net/cms/gallery/HG43KVD56T0C1320658241819.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Tier Set Bonuses</span><br>\r\n		<span class="summarytext">With all the visuals of the tier sets, letï¿½s not forget the magic that lays imbued betwixt their stitches and plating!</span></a></div>\r\n	<p style="clear: both;">&nbsp;</p>\r\n	<div class="ctextheadline">\r\n		<img src="http://eu.media3.battle.net/cms/gallery/GT6C6FTS92F51320833637514.jpg" style="width: 580px; height: 45px;">\r\n		<h1>\r\n			Raids &amp; Dungeons</h1>\r\n	</div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/RFXF4JIWWNTT1288709394829.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Raid Preview: Dragon Soul</span><br>\r\n		<span class="summarytext">Assist Thrall and the Dragon Aspects as they seek to bring an end to the Black Dragonflight once and for all.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media4.battle.net/cms/blog_thumbnail/4X5B4WE74Q001316422569592.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Dungeons Preview: End Time</span><br>\r\n		<span class="summarytext">Deathwing roams the skies of Azeroth, wreaking havoc on the land and its people -- how can you stop him?</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/V9OA0INVOZHK1316422710831.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Dungeons Preview: Well of Eternity</span><br>\r\n		<span class="summarytext">Witness one of the most catastrophic events in Azerothï¿½s history: the War of the Ancients!</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media2.battle.net/cms/blog_thumbnail/RASNKQG5BHE11316426431395.jpg"></a> <a class="cteasersummary" target="_blank"><span class="headline">Dungeons Preview: Hour of Twilight</span><br>\r\n		<span class="summarytext">A most dangerous task awaits you: Escort Thrall and the Dragon Soul safely to Wyrmrest Temple, for the assault on Deathwing.</span></a></div>\r\n	<p style="clear: both;">&nbsp;</p>\r\n	\r\n	\r\n	\r\n	\r\n			\r\n				\r\n<!-- repeat for every media coverage link you have -->					\r\n						\r\n<!-- repeat until here for every media coverage link you have -->				\r\n			\r\n		\r\n	<p style="clear: both;">&nbsp;</p>\r\n</div>\r\n<style type="text/css">\r\n#blog .detail #center {\r\nwidth: 590px;\r\nmargin: 0px auto;\r\n}\r\n#blog .detail div.ctextheadline {\r\nposition: relative;\r\ndisplay: block;\r\ntext-decoration: none;\r\nline-height:1 !important;\r\nfont-family: Arial !important;\r\nmargin-left: 3px;\r\n}\r\n#blog .detail div.ctextheadline h1 {\r\nposition: absolute;\r\ntop: 13px;\r\nleft: 30px;\r\ncolor: #ffb001 !important;\r\nfont-size: 23px !important;\r\n}\r\n#blog .detail div.cteaser, #blog .detail img, #blog .detail div.cteaserg {\r\n-moz-border-radius:4px;\r\n-webkit-border-radius:4px;\r\nborder-radius:4px;\r\n-moz-box-shadow:0 0 20px #000000;\r\n-webkit-box-shadow:0 0 20px #000000;\r\nbox-shadow:0 0 20px #000000;\r\nborder: 1px solid #372511;\r\npadding: 1px;\r\n}\r\n#blog .detail div.cteaser, #blog .detail div.cteaserg {\r\nwidth: 285px;\r\nheight: 144px;\r\nmargin: 8px 3px 0px 3px;\r\npadding-top: 5px;\r\nbackground-color: #1D100A;\r\nfloat:left;\r\n}\r\n#blog .detail div.cteaser:hover {\r\nborder: 1px solid #CD9000;\r\nbackground-color: #40200d;\r\n}\r\n#blog .detail .cteaser a.cteaserimg, #blog .detail .cteaserg div.cteaserimg {\r\ndisplay: block;\r\nwidth: 125px;\r\nheight: 140px;\r\ntext-align: center;\r\nfloat: left;\r\n}\r\n#blog .detail .cteaser a.cteaserimg img, #blog .detail .cteaserg div.cteaserimg img {\r\n-moz-border-radius:10px;\r\n-webkit-border-radius:10px;\r\nborder-radius:10px;\r\n-moz-box-shadow:0 0 20px #000000;\r\n-webkit-box-shadow:0 0 20px #000000;\r\nbox-shadow:0 0 20px #000000;\r\nborder: 1px solid #1D100A;\r\nvertical-align: middle;\r\nwidth: 109px;\r\nheight: 109px;\r\nmargin-top: 10px;\r\npadding: 1px;\r\n}\r\n#blog .detail .cteaser a.cteasersummary, #blog .detail .cteaserg div.cteasersummary {\r\ndisplay: block;\r\npadding-right: 3px;\r\nline-height: 1.4 !important;\r\nwidth: 157px;\r\nheight: 140px;\r\nfloat: left;\r\n}\r\n#blog .detail .cteaser a.cteasersummary span.headline, #blog .detail .cteaserg div.cteasersummary span.headline {\r\ncolor: #d19205 !important;\r\nfont-size: 17px !important;\r\ntext-weight: bold !important;\r\n}\r\n#blog .detail .cteaser a.cteasersummary span.summarytext, #blog .detail .cteaserg div.cteasersummary span.summarytext {\r\ncolor: #ad8460 !important;\r\nfont-size: 12px !important;\r\n}\r\n.top-list tr:nth-child(2) td {\r\ncolor: #F0E29A;\r\nbackground-color: transparent;\r\n}\r\n.top-list-interior table tbody tr td {\r\nbackground-color: none !important;\r\ncolor: #EFC9A0 !important;\r\nfont-weight: normal !important;\r\nvertical-align: top;\r\n}\r\n.top-list-interior table tbody tr:hover td {\r\ncolor: #fff !important;\r\n}</style>\r\n\r\n\r\n					\r\nHope you enjoy, and we will let you know what is fixed and what is not.', '1', 'Patch 4.3: Hour of Twilight', 3, 'update');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Volcando estructura para tabla website.prices
DROP TABLE IF EXISTS `prices`;
CREATE TABLE IF NOT EXISTS `prices` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `service` VARCHAR(255) NOT NULL,
  `type` VARCHAR(255) NOT NULL DEFAULT 'vote',
  `vp` INT(10) DEFAULT '0',
  `dp` INT(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla website.prices: 6 rows
DELETE FROM `prices`;
/*!40000 ALTER TABLE `prices` DISABLE KEYS */;
INSERT INTO `prices` (`id`, `service`, `type`, `vp`, `dp`) VALUES
	(1, 'name-change', 'vote', 300, 0),
	(2, 'race-change', 'vote', 500, 0),
	(3, 'appear-change', 'vote', 400, 0),
	(4, 'faction-change', 'vote', 600, 10),
	(5, 'chars-unst', 'vote', 600, 0),
	(6, 'chars-trans', 'vote', 200, 0);
/*!40000 ALTER TABLE `prices` ENABLE KEYS */;


-- Volcando estructura para tabla website.pve_mode
DROP TABLE IF EXISTS `pve_mode`;
CREATE TABLE IF NOT EXISTS `pve_mode` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thumb` VARCHAR(50) NOT NULL,
  `group-name` VARCHAR(50) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `link` VARCHAR(255) DEFAULT '#',
  UNIQUE KEY `id` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla website.pve_mode: ~9 rows (aproximadamente)
DELETE FROM `pve_mode`;
/*!40000 ALTER TABLE `pve_mode` DISABLE KEYS */;
INSERT INTO `pve_mode` (`id`, `thumb`, `group-name`, `description`, `link`) VALUES
	(1, 'thumb-gate-of-the-setting-sun', 'Gate of the Setting Sun', '', '#'),
	(2, 'thumb-mogushan-palace', 'Mogu\'shan Palace', '', '#'),
	(3, 'thumb-scarlet-halls', 'Scarlet Halls', '', '#'),
	(4, 'thumb-scarlet-monastery', 'Scarlet Monastery', '', '#'),
	(5, 'thumb-scholomance', 'Scholomance', '', '#'),
	(6, 'thumb-shadopan-monastery', 'Shado-Pan Monastery', '', '#'),
	(7, 'thumb-siege-of-niuzao-temple', 'Siege of Niuzao Temple', '', '#'),
	(8, 'thumb-stormstout-brewery', 'Stormstout Brewery', '', '#'),
	(9, 'thumb-temple-of-the-jade-serpent', 'Temple of the Jade Serpent', '', '#');
/*!40000 ALTER TABLE `pve_mode` ENABLE KEYS */;


-- Volcando estructura para tabla website.pvp_mode
DROP TABLE IF EXISTS `pvp_mode`;
CREATE TABLE IF NOT EXISTS `pvp_mode` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thumb` VARCHAR(50) NOT NULL,
  `group-name` VARCHAR(50) DEFAULT NULL,
  `description` VARCHAR(255) DEFAULT NULL,
  `link` VARCHAR(255) DEFAULT '#',
  UNIQUE KEY `id` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla website.pvp_mode: ~5 rows (aproximadamente)
DELETE FROM `pvp_mode`;
/*!40000 ALTER TABLE `pvp_mode` DISABLE KEYS */;
INSERT INTO `pvp_mode` (`id`, `thumb`, `group-name`, `description`, `link`) VALUES
	(1, 'thumb-pvp-overview', 'PvP Overview', 'Top players, specs, and teams', '#'),
	(2, 'thumb-battlegrounds', 'Battlegrounds', NULL, '#'),
	(3, 'thumb-arena-2v2', 'Arena 2v2', NULL, 'pvp/arena/2v2.php'),
	(4, 'thumb-arena-3v3', 'Arena 3v3', NULL, 'pvp/arena/3v3.php'),
	(5, 'thumb-arena-5v5', 'Arena 5v5', NULL, 'pvp/arena/5v5.php');
/*!40000 ALTER TABLE `pvp_mode` ENABLE KEYS */;


-- Volcando estructura para tabla website.realms
DROP TABLE IF EXISTS `realms`;
CREATE TABLE IF NOT EXISTS `realms` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `realmid` INT(10) DEFAULT NULL,
  `world_db` VARCHAR(255) NOT NULL DEFAULT 'world',
  `char_db` VARCHAR(255) NOT NULL DEFAULT 'characters',
  `version` VARCHAR(15) NOT NULL DEFAULT '4.0.6a',
  `drop_rate` VARCHAR(5) NOT NULL DEFAULT '1x',
  `exp_rate` VARCHAR(5) NOT NULL DEFAULT '1x',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla website.realms: 1 rows
DELETE FROM `realms`;
/*!40000 ALTER TABLE `realms` DISABLE KEYS */;
INSERT INTO `realms` (`id`, `realmid`, `world_db`, `char_db`, `version`, `drop_rate`, `exp_rate`) VALUES
	(1, 1, 'World', 'characters', '4.3.4a', '1x', '1x');
/*!40000 ALTER TABLE `realms` ENABLE KEYS */;


-- Volcando estructura para tabla website.servers
DROP TABLE IF EXISTS `servers`;
CREATE TABLE IF NOT EXISTS `servers` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(32) NOT NULL,
  `host` VARCHAR(32) NOT NULL,
  `username` VARCHAR(32) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `database` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.servers: 1 rows
DELETE FROM `servers`;
/*!40000 ALTER TABLE `servers` DISABLE KEYS */;
INSERT INTO `servers` (`id`, `name`, `host`, `username`, `password`, `database`) VALUES
	(1, 'AquaFlameCMS', '127.0.0.1', 'roots', 'password', 'world');
/*!40000 ALTER TABLE `servers` ENABLE KEYS */;


-- Volcando estructura para tabla website.shop_items
DROP TABLE IF EXISTS `shop_items`;
CREATE TABLE IF NOT EXISTS `shop_items` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `server` INT(10) UNSIGNED NOT NULL,
  `name` VARCHAR(50) CHARACTER SET utf8 NOT NULL,
  `item` INT(10) UNSIGNED NOT NULL,
  `price` FLOAT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.shop_items: 9 rows
DELETE FROM `shop_items`;
/*!40000 ALTER TABLE `shop_items` DISABLE KEYS */;
INSERT INTO `shop_items` (`id`, `server`, `name`, `item`, `price`) VALUES
	(1, 1, 'Amani War Bear', 33809, 200),
	(2, 1, 'Swift Zhevra', 37719, 200),
	(3, 1, 'Reins of the Swift Spectral Tiger', 49284, 200),
	(4, 1, 'Peep\'s Whistle', 25596, 200),
	(5, 1, 'X-51 Nether-Rocket', 49286, 200),
	(6, 1, 'Mimiron\'s Head', 45693, 200),
	(7, 1, 'The Horseman\'s Reins', 37012, 200),
	(8, 1, 'Pandaren Monk', 49665, 100),
	(9, 1, 'Gryphon Hatchling', 49662, 100);
/*!40000 ALTER TABLE `shop_items` ENABLE KEYS */;


-- Volcando estructura para tabla website.shop_log
DROP TABLE IF EXISTS `shop_log`;
CREATE TABLE IF NOT EXISTS `shop_log` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` INT(10) DEFAULT NULL,
  `date` DATETIME DEFAULT NULL,
  `item_id` INT(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla website.shop_log: 11 rows
DELETE FROM `shop_log`;
/*!40000 ALTER TABLE `shop_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_log` ENABLE KEYS */;


-- Volcando estructura para tabla website.sidebars
DROP TABLE IF EXISTS `sidebars`;
CREATE TABLE IF NOT EXISTS `sidebars` (
  `enabled` INT(11) DEFAULT NULL,
  `name` VARCHAR(50) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.sidebars: ~1 rows (aproximadamente)
DELETE FROM `sidebars`;
/*!40000 ALTER TABLE `sidebars` DISABLE KEYS */;
INSERT INTO `sidebars` (`enabled`, `name`) VALUES
	(1, 'ServerInfo');
/*!40000 ALTER TABLE `sidebars` ENABLE KEYS */;


-- Volcando estructura para tabla website.slideshows
DROP TABLE IF EXISTS `slideshows`;
CREATE TABLE IF NOT EXISTS `slideshows` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  `description` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  `image` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  `link` VARCHAR(255) CHARACTER SET utf8 DEFAULT '#',
  `duration` VARCHAR(2) CHARACTER SET utf8 NOT NULL DEFAULT '7',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.slideshows: 2 rows
DELETE FROM `slideshows`;
/*!40000 ALTER TABLE `slideshows` DISABLE KEYS */;
INSERT INTO `slideshows` (`id`, `title`, `description`, `image`, `link`, `duration`) VALUES
	(2, 'Patch 4.3', 'Cataclysm Version 4.3.4 Supported!', '4.3.jpg', '#', '7'),
	(1, 'Patch 4.2', 'Cataclysm Version 4.2.0 Supported!', '4.2.jpg', '#', '7');
/*!40000 ALTER TABLE `slideshows` ENABLE KEYS */;


-- Volcando estructura para tabla website.themes
DROP TABLE IF EXISTS `themes`;
CREATE TABLE IF NOT EXISTS `themes` (
  `id` INT(11) DEFAULT NULL,
  `author` VARCHAR(50) DEFAULT NULL,
  `vs_info` VARCHAR(50) DEFAULT NULL,
  `active` INT(10) DEFAULT NULL,
  `name` VARCHAR(50) DEFAULT NULL,
  `description` VARCHAR(250) DEFAULT NULL,
  `css_link` VARCHAR(50) DEFAULT NULL,
  `creation_date` DATE DEFAULT NULL,
  `development_crew` VARCHAR(50) DEFAULT NULL,
  `development_linkback` LONGTEXT,
  `website` VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla website.themes: ~3 rows (aproximadamente)
DELETE FROM `themes`;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
INSERT INTO `themes` (`id`, `author`, `vs_info`, `active`, `name`, `description`, `css_link`, `creation_date`, `development_crew`, `development_linkback`, `website`) VALUES
	(1, 'FailzorD', '1.0', 1, 'AquaFlame Cata Edition', 'The AquaFlame Cata Theme', 'DefaultAFCMS', '2013-11-09', 'AquaFlame', NULL, 'http://localhost/'),
	(2, 'FailzorD', '1.0', 0, 'AquaFlame Wrath Edition', 'The AquaFlame Wrath Theme', 'Wrath', '2013-11-09', 'AquaFlame', NULL, 'http://localhost/'),
	(3, 'FailzorD', '1.0', 0, 'AquaFlame', 'AquaFlame Default Theme', 'Default', '2013-11-12', 'AquaFlame', NULL, 'http://localhost/');
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;


-- Volcando estructura para tabla website.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(10) NOT NULL,
  `avatar` VARCHAR(255) CHARACTER SET utf8 NOT NULL DEFAULT '0-0.jpg',
  `blizz` TINYINT(1) DEFAULT '0',
  `class` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  `firstName` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  `lastName` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  `character` INT(10) NOT NULL DEFAULT '0',
  `vote_points` INT(10) NOT NULL DEFAULT '0',
  `char_realm` INT(10) NOT NULL DEFAULT '1',
  `registerIp` VARCHAR(30) CHARACTER SET utf8 NOT NULL DEFAULT '127.0.0.1',
  `country` VARCHAR(20) CHARACTER SET utf8 DEFAULT NULL,
  `birth` DATE DEFAULT NULL,
  `quest1` INT(2) NOT NULL DEFAULT '0',
  `ans1` VARCHAR(50) CHARACTER SET utf8 NOT NULL DEFAULT 'undefined',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM DEFAULT CHARSET=latin1;

-- Volcando estructura para tabla website.version
DROP TABLE IF EXISTS `version`;
CREATE TABLE IF NOT EXISTS `version` (
  `Name` TEXT,
  `Number` VARCHAR(10) DEFAULT NULL,
  `Revision` CHAR(50) DEFAULT NULL,
  `DB_Version` VARCHAR(50) DEFAULT NULL,
  `Updates` VARCHAR(50) DEFAULT NULL
) ENGINE=MYISAM DEFAULT CHARSET=latin1 COMMENT='This here shows you what Version of AquaFlameCMS you have.';

-- Volcando datos para la tabla website.version: 1 rows
DELETE FROM `version`;
/*!40000 ALTER TABLE `version` DISABLE KEYS */;
INSERT INTO `version` (`Name`, `Number`, `Revision`, `DB_Version`, `Updates`) VALUES
	('AquaFlameCMS', 'v1.5', '7a0c13fc18cffa06e569685b5a9275910c3c93ce', 'v8', '152');
/*!40000 ALTER TABLE `version` ENABLE KEYS */;


-- Volcando estructura para tabla website.vote
DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID has to be from 1 to 5',
  `Name` VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'This is the Name of the Voting Site.',
  `Link` TEXT CHARACTER SET utf8 COMMENT 'It must have http:// to work properly',
  `Description` TEXT CHARACTER SET utf8 COMMENT 'Add the Description for the Voting',
  PRIMARY KEY (`ID`)
) ENGINE=MYISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='This Table is all about the Infortmation for the Vote Panel.';

-- Volcando datos para la tabla website.vote: 2 rows
DELETE FROM `vote`;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
INSERT INTO `vote` (`ID`, `Name`, `Link`, `Description`) VALUES
	(1, 'Google', 'http://google.gr', 'Vote me jackass!'),
	(2, 'AquaFlame', 'http://aquaflame.org', 'Just click me for cookies!');
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;


-- Volcando estructura para tabla website.votes_log
DROP TABLE IF EXISTS `votes_log`;
CREATE TABLE IF NOT EXISTS `votes_log` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` INT(10) DEFAULT NULL,
  `date` DATETIME DEFAULT NULL,
  `voteid` INT(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla website.votes_log: 2 rows
DELETE FROM `votes_log`;
/*!40000 ALTER TABLE `votes_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `votes_log` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
