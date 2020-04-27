-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 02:57 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vcdn`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `company_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` date NOT NULL,
  `website` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starred_by` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `group_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_lead` tinyint(1) NOT NULL DEFAULT 0,
  `lead_status_id` int(11) DEFAULT NULL,
  `owner_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `lead_source_id` int(11) NOT NULL,
  `last_lead_status` text COLLATE utf8_unicode_ci NOT NULL,
  `client_migration_date` date DEFAULT NULL,
  `vat_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disable_online_payment` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `company_name`, `address`, `city`, `state`, `zip`, `country`, `created_date`, `website`, `phone`, `currency_symbol`, `starred_by`, `group_ids`, `deleted`, `is_lead`, `lead_status_id`, `owner_id`, `sort`, `lead_source_id`, `last_lead_status`, `client_migration_date`, `vat_number`, `currency`, `disable_online_payment`) VALUES
(1, 'Demo Client Company', NULL, NULL, NULL, NULL, '', '2018-11-13', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(2, 'Fusionlab', NULL, NULL, NULL, NULL, 'Netherlands', '2018-11-14', 'http://fusionlab.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(3, 'Justpremium', NULL, NULL, NULL, NULL, 'Netherlands', '2018-11-16', ' http://www.justpremium.com', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(4, 'Detailresult', NULL, NULL, NULL, NULL, '', '2018-11-21', 'https://www.detailresult.nl/', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(5, 'Made for Digital', NULL, NULL, NULL, NULL, '', '2018-11-21', 'https://made.for.digital/', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(6, 'TTM', NULL, NULL, NULL, NULL, '', '2018-11-21', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(7, 'AD', NULL, NULL, NULL, NULL, '', '2018-11-21', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(8, 'Merkle Nederland Group B.V. ', NULL, NULL, NULL, NULL, 'Netherlands', '2018-11-21', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(9, 'Connect73', NULL, NULL, NULL, NULL, '', '2018-11-21', 'connect73.com', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(10, 'Cut The Web', NULL, NULL, NULL, NULL, '', '2018-11-21', 'https://www.cuttheweb.nl/', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(11, 'DBom', NULL, NULL, NULL, NULL, '', '2018-11-21', 'https://dbom.nl/nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(12, 'New Skool Media', NULL, NULL, NULL, NULL, 'Netherlands', '2018-11-27', 'www.newskoolmedia.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(13, 'Moon Discovery', NULL, NULL, NULL, NULL, 'Netherlands', '2018-11-28', 'www.moondiscovery.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(14, 'Premiere TV', NULL, NULL, NULL, NULL, '', '2018-11-28', '', NULL, NULL, '', '', 1, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(15, 'Gottmer Uitgevers Groep', NULL, NULL, NULL, NULL, 'Netherlands', '2018-11-29', 'www.zeilen.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(16, 'Cinéart Nederland B.V.', NULL, NULL, NULL, NULL, 'Netherlands', '2018-11-30', 'www.cineart.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(17, 'Premiere TV', NULL, NULL, NULL, NULL, 'Netherlands', '2018-11-30', 'www.premieretv.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(18, 'Eisma Businessmedia BV', NULL, NULL, NULL, NULL, 'Netherlands', '2018-11-30', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(19, 'Eisma Industriemedia BV', NULL, NULL, NULL, NULL, 'Netherlands', '2018-11-30', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(20, 'Eisma Bouwmedia BV', NULL, NULL, NULL, NULL, 'Netherlands', '2018-11-30', 'eisma.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(21, 'Vluchteling', NULL, NULL, NULL, NULL, 'Netherlands', '2018-11-30', 'www.vluchteling.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(22, 'De Persgroep', NULL, NULL, NULL, NULL, 'Netherlands', '2018-11-30', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(23, 'Eisma Horses Media', NULL, NULL, NULL, NULL, 'Netherlands', '2018-12-06', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(24, 'RTL', NULL, NULL, NULL, NULL, '', '2018-12-10', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0),
(25, 'AppetiteCreative', NULL, NULL, NULL, NULL, 'United Kingdom', '2018-12-11', 'www.appetitecreative.com', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(26, 'Jean Mineur Mediavision', NULL, NULL, NULL, NULL, '', '2018-12-11', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(27, 'Madicine Media', NULL, NULL, NULL, NULL, '', '2018-12-17', 'www.madicinemedia.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(28, 'Solmar', NULL, NULL, NULL, NULL, 'Netherlands', '2018-12-18', 'www.solmar.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(29, 'Wildlands', NULL, NULL, NULL, NULL, '', '2018-12-18', 'www.wildlands.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(30, 'Your Social', NULL, NULL, NULL, NULL, '', '2019-01-03', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(31, 'TnlBusiness', NULL, NULL, NULL, NULL, 'Netherlands', '2019-01-15', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(32, 'EMESA', NULL, NULL, NULL, NULL, '', '2019-01-23', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(33, 'Madicine Media', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0),
(34, 'Youfone Nederland BV', NULL, NULL, NULL, NULL, '', '2019-02-06', 'www.youfone.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(35, 'De Persgroup', NULL, NULL, NULL, NULL, '', '2019-02-07', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(36, 'Dutch Film Works', NULL, NULL, NULL, NULL, '', '2019-02-08', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(37, 'Centercom', NULL, NULL, NULL, NULL, '', '2019-02-18', 'www.centercom.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(38, 'Streets Of The World', NULL, NULL, NULL, NULL, 'Netherlands', '2019-03-20', 'www.streetsoftheworld.com', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(39, 'De Media Maatschap', NULL, NULL, NULL, NULL, 'Netherlands', '2019-03-20', 'www.demediamaatschap.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(40, 'Amsterdam & Partners', NULL, NULL, NULL, NULL, 'Netherlands', '2019-03-20', 'www.iamsterdam.com', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(41, 'Veen Magazines', NULL, NULL, NULL, NULL, 'Netherlands', '2019-03-25', 'www.veenmedia.nl  ', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(42, 'Yoursocial.agency', NULL, NULL, NULL, NULL, 'Netherlands', '2019-04-03', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(43, 'FEL', NULL, NULL, NULL, NULL, '', '2019-05-16', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(44, 'VDS Publishers', NULL, NULL, NULL, NULL, '', '2019-05-24', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(45, 'Filminc', NULL, NULL, NULL, NULL, '', '2019-06-20', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0),
(46, 'I Amsterdam', NULL, NULL, NULL, NULL, '', '2019-07-03', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0),
(47, 'Van Dyck Brown', NULL, NULL, NULL, NULL, '', '2019-08-13', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(48, 'RB - Red Button', NULL, NULL, NULL, NULL, 'Netherlands', '2019-08-21', 'https://redbutton.nl/', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(49, 'Diva World Wide', NULL, NULL, NULL, NULL, '', '2019-09-03', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0),
(50, 'ESCAPE BD', NULL, NULL, NULL, NULL, '', '2019-09-04', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(51, 'Mediascience', NULL, NULL, NULL, NULL, '', '2019-09-20', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(52, 'HAK', NULL, NULL, NULL, NULL, '', '2019-09-26', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(53, 'WebLab', NULL, NULL, NULL, NULL, '', '2019-09-26', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(54, 'Spalder Media', NULL, NULL, NULL, NULL, '', '2019-09-26', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(55, 'Pijper Media', NULL, NULL, NULL, NULL, '', '2019-09-26', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(56, 'Veen Magazines', NULL, NULL, NULL, NULL, '', '2019-09-26', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(57, 'Mash Creative', NULL, NULL, NULL, NULL, '', '2019-09-26', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(58, 'APPNEXUS', NULL, NULL, NULL, NULL, '', '2019-09-26', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(59, 'CREATIVE DRIVE', NULL, NULL, NULL, NULL, '', '2019-09-26', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(60, 'Berekenen / onfocusmedia.nl', NULL, NULL, NULL, NULL, '', '2019-09-26', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(61, 'Cineville', NULL, NULL, NULL, NULL, '', '2019-09-26', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(62, 'Inspirerend leven', NULL, NULL, NULL, NULL, '', '2019-09-26', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(63, 'Yieldit / lars hemel', NULL, NULL, NULL, NULL, '', '2019-09-26', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(64, 'FusionLab- nieuwe klanten overzetten', NULL, NULL, NULL, NULL, '', '2019-09-26', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(65, 'VDB - nieuwe klanten overzetten', NULL, NULL, NULL, NULL, '', '2019-09-26', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(66, 'Sneakerjagers', NULL, NULL, NULL, NULL, '', '2019-10-02', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(67, 'TopGear', NULL, NULL, NULL, NULL, 'The Netherlands', '2019-10-03', 'https://topgear.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0),
(68, 'MediaMonks', NULL, NULL, NULL, NULL, 'Netherlands', '2019-10-07', 'www.mediamonks.com', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(69, 'Nieuwe tijds kind.com', NULL, NULL, NULL, NULL, '', '2019-10-08', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(70, 'perfectwedding overige titels', NULL, NULL, NULL, NULL, '', '2019-10-08', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(71, 'filmtotaal ', NULL, NULL, NULL, NULL, '', '2019-10-08', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(72, 'groene fee biosagenda aldo', NULL, NULL, NULL, NULL, '', '2019-10-08', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(73, 'Solve Marketing', NULL, NULL, NULL, NULL, '', '2019-10-16', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(74, 'Kollectif', NULL, NULL, NULL, NULL, 'Netherlands', '2019-10-28', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(75, 'Talpa Network', NULL, NULL, NULL, NULL, 'Netherlands', '2019-11-04', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(76, 'Talpa Ecommerce', NULL, NULL, NULL, NULL, 'Netherlands', '2019-11-05', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(77, 'datumprikker', NULL, NULL, NULL, NULL, '', '2019-11-05', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(78, 'Zoover', NULL, NULL, NULL, NULL, 'The Netherlands', '2019-12-05', 'https://www.zoover.nl/', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(79, 'De Reclame Fabriek', NULL, NULL, NULL, NULL, 'Netherlands', '2019-12-19', 'www.de-reclamefabriek.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(80, 'Memo2', NULL, NULL, NULL, NULL, 'Netherlands', '2020-01-16', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(81, 'GITP', NULL, NULL, NULL, NULL, 'Netherlands', '2020-01-16', 'gitp.nl', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0),
(82, 'Factor Tachtig', NULL, NULL, NULL, NULL, 'Netherlands', '2020-01-17', '', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_request`
--

CREATE TABLE `client_request` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `decide_pre` int(11) NOT NULL DEFAULT 0,
  `sponsor_title` varchar(255) NOT NULL DEFAULT 'true',
  `outstrem_logo` varchar(255) NOT NULL DEFAULT 'true',
  `isAudionOn` varchar(255) DEFAULT NULL,
  `islogoshow` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `url` text NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_accepted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_29_072105_create_players_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `outstrem_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `src` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imaUrl` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `islogoshow` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAudionOn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iframe_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decide_pre` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `client_id`, `name`, `sponsor_title`, `outstrem_logo`, `src`, `imaUrl`, `logo`, `poster`, `width`, `height`, `color`, `islogoshow`, `isAudionOn`, `iframe_code`, `decide_pre`, `status`, `created_at`, `updated_at`) VALUES
(3, NULL, 'asdasdasd', 'true', 'true', 'http://vcdn.planetnine.com/v3.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'http://vcdn.planetnine.com/logo1.png', 'http://vcdn.planetnine.com/poster.png', '1280px', '720px', '#281b1b', 'true', 'false', '<iframe id=\'3\' src=\'https://vcdn-dev.planetnine.com/player/3/3\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 3){ document.getElementById(\"3\").style.display = e.data.dis;document.getElementById(\"3\").style.height = e.data.height; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2019-10-30 09:01:26', '2020-04-27 02:19:04'),
(4, NULL, NULL, 'true', 'true', 'http://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'http://vcdn.planetnine.com/logo1.png', 'http://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'4\' src=\'http://localhost/player/4/4\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 4){ document.getElementById(\"4\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 1, 1, '2019-10-30 09:05:15', '2019-10-30 09:05:15'),
(5, NULL, NULL, 'true', 'true', 'http://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'http://vcdn.planetnine.com/logo1.png', 'http://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'5\' src=\'http://vcdn.planetnine.com/player/5/5\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 5){ document.getElementById(\"5\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 1, 1, '2019-10-30 09:13:29', '2019-10-30 09:13:29'),
(6, NULL, NULL, 'true', 'true', 'http://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/ad_rule_samples&ciu_szs=300x250&ad_rule=1&impl=s&gdfp_req=1&env=vp&output=vmap&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ar%3Dpreonly&cmsid=496&vid=short_onecue&correlator=', 'http://vcdn.planetnine.com/logo1.png', 'http://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'6\' src=\'http://vcdn.planetnine.com/player/6/6\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 6){ document.getElementById(\"6\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 1, 1, '2019-10-30 12:13:15', '2019-10-30 12:13:15'),
(7, NULL, NULL, 'true', 'true', 'http://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'http://vcdn.planetnine.com/logo1.png', 'http://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'7\' src=\'http://vcdn.planetnine.com/player/7/7\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 7){ document.getElementById(\"7\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 1, 1, '2019-10-30 13:24:04', '2019-10-30 13:24:04'),
(8, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'8\' src=\'http://vcdn.planetnine.com/player/8/8\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 8){ document.getElementById(\"8\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 1, 1, '2019-10-30 16:37:20', '2019-10-30 16:37:20'),
(9, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/ad_rule_samples&ciu_szs=300x250&ad_rule=1&impl=s&gdfp_req=1&env=vp&output=vmap&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ar%3Dpreonly&cmsid=496&vid=short_onecue&correlator=', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'9\' src=\'http://vcdn.planetnine.com/player/9/9\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 9){ document.getElementById(\"9\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 1, 1, '2019-10-31 05:42:43', '2019-10-31 05:42:43'),
(10, NULL, 'Chris Player', 'false', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/ad_rule_samples&ciu_szs=300x250&ad_rule=1&impl=s&gdfp_req=1&env=vp&output=vmap&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ar%3Dpreonly&cmsid=496&vid=short_onecue&correlator=', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'10\' src=\'http://vcdn.planetnine.com/player/10/10\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 10){ document.getElementById(\"10\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 2, 1, '2019-10-31 12:10:02', '2019-10-31 12:10:02'),
(11, NULL, 'Chris Player', 'false', 'false', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/ad_rule_samples&ciu_szs=300x250&ad_rule=1&impl=s&gdfp_req=1&env=vp&output=vmap&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ar%3Dpreonly&cmsid=496&vid=short_onecue&correlator=', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'11\' src=\'http://vcdn.planetnine.com/player/11/11\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 11){ document.getElementById(\"11\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 2, 1, '2019-10-31 12:22:41', '2019-10-31 12:22:41'),
(12, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'12\' src=\'http://vcdn.planetnine.com/player/12/12\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 12){ document.getElementById(\"12\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 1, 1, '2019-10-31 12:24:25', '2019-10-31 12:24:25'),
(13, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'13\' src=\'https://vcdn.planetnine.com/player/13/13\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 13){ document.getElementById(\"13\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 1, 1, '2019-10-31 12:25:55', '2019-10-31 12:25:55'),
(14, 159, NULL, 'false', 'false', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '460px', '#281b1b', 'true', 'false', '<iframe id=\'14\' src=\'https://vcdn.planetnine.com/player/14/14\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 14){ document.getElementById(\"14\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 2, 1, '2019-10-31 12:26:16', '2019-10-31 12:28:34'),
(15, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'15\' src=\'https://vcdn.planetnine.com/player/15/15\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 15){ document.getElementById(\"15\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 2, 1, '2019-10-31 12:46:05', '2019-10-31 12:46:05'),
(16, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/ad_rule_samples&ciu_szs=300x250&ad_rule=1&impl=s&gdfp_req=1&env=vp&output=vmap&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ar%3Dpreonly&cmsid=496&vid=short_onecue&correlator=', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'16\' src=\'https://vcdn.planetnine.com/player/16/16\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 16){ document.getElementById(\"16\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 1, 1, '2019-11-01 13:59:23', '2019-11-01 13:59:23'),
(17, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/ad_rule_samples&ciu_szs=300x250&ad_rule=1&impl=s&gdfp_req=1&env=vp&output=vmap&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ar%3Dpreonly&cmsid=496&vid=short_onecue&correlator=', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'17\' src=\'https://vcdn.planetnine.com/player/17/17\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 17){ document.getElementById(\"17\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 2, 1, '2019-11-01 14:00:19', '2019-11-01 14:00:19'),
(18, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'18\' src=\'https://vcdn.planetnine.com/player/18/18\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 18){ document.getElementById(\"18\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 1, 1, '2019-11-04 09:53:40', '2019-11-04 09:53:40'),
(19, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'19\' src=\'https://vcdn.planetnine.com/player/19/19\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 19){ document.getElementById(\"19\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 1, 1, '2019-11-04 13:17:04', '2019-11-04 13:17:04'),
(20, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'20\' src=\'https://vcdn.planetnine.com/player/20/20\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 20){ document.getElementById(\"20\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 1, 1, '2019-11-04 13:17:05', '2019-11-04 13:17:05'),
(21, NULL, 'Desktop', 'false', 'false', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21779842348/vds_topgear/Topgear_ros_outstream_alpha&description_url=[placeholder]&tfcd=0&npa=0&sz=640x480&cust_params=is_test_environment%3Dtrue&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'21\' src=\'https://vcdn.planetnine.com/player/21/21\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 21){ document.getElementById(\"21\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'height:460px;width:100%;\'></iframe>', 1, 1, '2019-11-14 06:32:51', '2019-11-14 06:32:51'),
(22, NULL, 'Mobile', 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21779842348/vds_topgear/Topgear_ros_outstream_alpha&description_url=[placeholder]&tfcd=0&npa=0&sz=400x300&cust_params=is_test_environment%3Dtrue&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '460px', '#281b1b', 'true', 'false', '<iframe id=\'22\' src=\'https://vcdn.planetnine.com/player/22/22\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 22){ document.getElementById(\"22\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:460px;width:100%;\'></iframe>', 1, 1, '2019-11-14 06:38:40', '2019-11-27 11:52:57'),
(23, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', '', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'23\' src=\'https://vcdn.planetnine.com/player/23/23\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 23){ document.getElementById(\"23\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\'display:none !important; height:460px;width:100%;\'></iframe>', 1, 1, '2019-11-27 11:45:34', '2019-11-27 11:45:34'),
(25, NULL, 'test', 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '460px', '#281b1b', 'true', 'false', '<iframe id=\'25\' src=\'https://vcdn.planetnine.com/player/25/25\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 25){ document.getElementById(\"25\").style.display = e.data.dis; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:460px;width:100%;\'></iframe>', 1, 1, '2019-12-09 04:58:36', '2019-12-19 05:29:13'),
(26, NULL, 'VDS - Top gear - ROS - player', 'true', 'false', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21779842348/vds_topgear/Topgear_ros_outstream_alpha&description_url=[placeholder]&tfcd=0&npa=0&sz=400x300%7C640x480&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'26\' src=\'https://vcdn.planetnine.com/player/26/26\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 26){ document.getElementById(\"26\").style.display = e.data.dis;document.getElementById(\"26\").style.height = e.data.height; } }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2019-12-19 11:59:20', '2020-02-14 14:20:43'),
(27, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/ad_rule_samples&ciu_szs=300x250&ad_rule=1&impl=s&gdfp_req=1&env=vp&output=vmap&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ar%3Dpreonly&cmsid=496&vid=short_onecue&correlator=', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', NULL, '#281b1b', 'false', 'false', '<iframe id=\'27\' src=\'https://vcdn.planetnine.com/player/27/27\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 27){ document.getElementById(\"27\").style.display = e.data.dis; document.getElementById(\"27\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2019-12-19 12:01:40', '2019-12-19 12:01:40'),
(28, NULL, 'skakhawat', 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'28\' src=\'https://vcdn.planetnine.com/player/28/28\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 28){ document.getElementById(\"28\").style.display = e.data.dis; document.getElementById(\"28\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2019-12-20 09:20:55', '2019-12-20 09:20:55'),
(29, NULL, 'PS - NLTimes - ROS - player', 'true', 'false', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/140008389/ps_nltimes/NLTimes_ros_outstream_alpha&description_url=[placeholder]&tfcd=0&npa=0&sz=640x480&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'29\' src=\'https://vcdn.planetnine.com/player/29/29\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 29){ document.getElementById(\"29\").style.display = e.data.dis; document.getElementById(\"29\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-01-27 10:28:45', '2020-01-27 10:28:45'),
(30, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'30\' src=\'https://vcdn.planetnine.com/player/30/30\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 30){ document.getElementById(\"30\").style.display = e.data.dis; document.getElementById(\"30\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-02-03 11:29:00', '2020-02-03 11:29:00'),
(31, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'31\' src=\'https://vcdn.planetnine.com/player/31/31\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 31){ document.getElementById(\"31\").style.display = e.data.dis; document.getElementById(\"31\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-02-05 10:02:07', '2020-02-05 10:02:07'),
(32, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'32\' src=\'https://vcdn.planetnine.com/player/32/32\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 32){ document.getElementById(\"32\").style.display = e.data.dis; document.getElementById(\"32\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-02-07 08:59:15', '2020-02-07 08:59:15'),
(33, NULL, 'houi', 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'33\' src=\'https://vcdn.planetnine.com/player/33/33\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 33){ document.getElementById(\"33\").style.display = e.data.dis; document.getElementById(\"33\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-03-05 14:34:16', '2020-03-05 14:34:16'),
(34, 159, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'34\' src=\'https://vcdn.planetnine.com/player/34/34\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 34){ document.getElementById(\"34\").style.display = e.data.dis; document.getElementById(\"34\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-03-12 08:34:59', '2020-03-12 08:34:59'),
(35, NULL, 'test', 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'35\' src=\'https://vcdn.planetnine.com/player/35/35\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 35){ document.getElementById(\"35\").style.display = e.data.dis; document.getElementById(\"35\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-03-12 08:36:28', '2020-03-12 08:36:28'),
(36, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'36\' src=\'https://vcdn.planetnine.com/player/36/36\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 36){ document.getElementById(\"36\").style.display = e.data.dis; document.getElementById(\"36\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-03-17 10:06:38', '2020-03-17 10:06:38'),
(37, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'37\' src=\'https://vcdn.planetnine.com/player/37/37\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 37){ document.getElementById(\"37\").style.display = e.data.dis; document.getElementById(\"37\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-03-17 10:06:43', '2020-03-17 10:06:43'),
(38, NULL, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'38\' src=\'https://vcdn.planetnine.com/player/38/38\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 38){ document.getElementById(\"38\").style.display = e.data.dis; document.getElementById(\"38\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-03-17 10:08:54', '2020-03-17 10:08:54'),
(39, 159, NULL, 'true', 'true', 'https://vcdn.planetnine.com/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'https://vcdn.planetnine.com/logo1.png', 'https://vcdn.planetnine.com/poster.png', '1280px', '720px', '#ffffff', 'false', 'false', '<iframe id=\'39\' src=\'https://vcdn.planetnine.com/player/39/39\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 39){ document.getElementById(\"39\").style.display = e.data.dis; document.getElementById(\"39\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-03-17 10:10:25', '2020-03-17 10:10:25'),
(40, NULL, NULL, 'true', 'true', 'http://localhost:8000/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'http://localhost:8000/logo1.png', 'http://localhost:8000/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'40\' src=\'https://vcdn-dev.planetnine.com/player/40/40\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 40){ document.getElementById(\"40\").style.display = e.data.dis; document.getElementById(\"40\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-04-27 02:45:25', '2020-04-27 02:45:25'),
(41, NULL, NULL, 'true', 'true', 'http://localhost:8000/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'http://localhost:8000/logo1.png', 'http://localhost:8000/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'41\' src=\'https://vcdn-dev.planetnine.com/player/41/41\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 41){ document.getElementById(\"41\").style.display = e.data.dis; document.getElementById(\"41\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-04-27 02:45:25', '2020-04-27 02:45:25'),
(42, NULL, NULL, 'true', 'true', 'http://localhost:8000/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'http://localhost:8000/logo1.png', 'http://localhost:8000/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'42\' src=\'https://vcdn-dev.planetnine.com/player/42/42\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 42){ document.getElementById(\"42\").style.display = e.data.dis; document.getElementById(\"42\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-04-27 02:45:26', '2020-04-27 02:45:26'),
(43, NULL, NULL, 'true', 'true', 'http://localhost:8000/v1.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'http://localhost:8000/logo1.png', 'http://localhost:8000/poster.png', '1280px', '720px', '#281b1b', 'false', 'false', '<iframe id=\'43\' src=\'https://vcdn-dev.planetnine.com/player/43/43\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 43){ document.getElementById(\"43\").style.display = e.data.dis; document.getElementById(\"43\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-04-27 02:45:26', '2020-04-27 02:45:26'),
(44, NULL, NULL, 'true', 'true', 'http://localhost:8000/v3.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/ad_rule_samples&ciu_szs=300x250&ad_rule=1&impl=s&gdfp_req=1&env=vp&output=vmap&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ar%3Dpreonly&cmsid=496&vid=short_onecue&correlator=', 'http://localhost:8000/logo1.png', 'http://localhost:8000/poster.png', '640px', '360px', '#281b1b', 'false', 'false', '<iframe id=\'44\' src=\'https://vcdn-dev.planetnine.com/player/44/44\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 44){ document.getElementById(\"44\").style.display = e.data.dis; document.getElementById(\"44\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-04-27 02:46:57', '2020-04-27 02:46:57'),
(45, NULL, NULL, 'false', 'true', 'http://localhost:8000/v3.mp4', 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1', 'http://localhost:8000/logo1.png', 'http://localhost:8000/poster.png', '640px', '360px', '#281b1b', 'false', 'false', '<iframe id=\'45\' src=\'https://vcdn-dev.planetnine.com/player/45/45\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 45){ document.getElementById(\"45\").style.display = e.data.dis; document.getElementById(\"45\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-04-27 03:56:51', '2020-04-27 03:56:51'),
(46, NULL, NULL, 'false', 'true', 'http://localhost:8000/v3.mp4', 'www.google.com', 'http://localhost:8000/logo1.png', 'http://localhost:8000/poster.png', '640px', '360px', '#281b1b', 'false', 'false', '<iframe id=\'46\' src=\'https://vcdn-dev.planetnine.com/player/46/46\' onload=\'window.addEventListener(\"message\", function(e) {if(e.data.id == 46){ document.getElementById(\"46\").style.display = e.data.dis; document.getElementById(\"46\").style.height = e.data.height;} }, false);\' scrolling=\'no\' allowfullscreen frameborder=\'0\'  style=\' height:1px;width:100%;\'></iframe>', 1, 1, '2020-04-27 03:57:18', '2020-04-27 03:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('staff','client','lead') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'client',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `message_checked_at` datetime DEFAULT NULL,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `notification_checked_at` datetime DEFAULT NULL,
  `is_primary_contact` tinyint(1) NOT NULL DEFAULT 0,
  `job_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Untitled',
  `disable_login` tinyint(1) NOT NULL DEFAULT 0,
  `note` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `alternative_address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alternative_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `ssn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'male',
  `sticky_note` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `enable_web_notification` tinyint(1) NOT NULL DEFAULT 1,
  `enable_email_notification` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `last_online` datetime DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_type`, `is_admin`, `role_id`, `email`, `password`, `image`, `status`, `message_checked_at`, `client_id`, `notification_checked_at`, `is_primary_contact`, `job_title`, `disable_login`, `note`, `address`, `alternative_address`, `phone`, `alternative_phone`, `dob`, `ssn`, `gender`, `sticky_note`, `skype`, `enable_web_notification`, `enable_email_notification`, `created_at`, `updated_at`, `last_online`, `deleted`) VALUES
(1, 'Maarten', 'Roelofs', 'staff', 1, 0, 'maarten@divaww.com', '7d7a4f2231a0cac506d7dd3137e90305', '_file5bfd45cc41eb1-avatar.png', 'active', '2019-12-07 09:30:02', 0, '2019-12-06 10:43:22', 0, 'Admin', 0, NULL, '', '', '', '', '0000-00-00', '', 'male', NULL, '', 1, 1, '2018-11-13 18:05:09', NULL, '2020-01-30 02:31:20', 0),
(3, 'producten', 'using as test', 'staff', 0, 0, 'production@divaww.com', 'a2a2c27b13aaba3a26b905b0d97371cf', NULL, 'active', '2018-11-13 18:32:18', 0, NULL, 0, 'Production Manager', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2018-11-13 18:17:44', NULL, '2018-11-14 10:06:19', 1),
(4, 'maartenroelofs-client role', 'he is a client', 'client', 0, 0, 'maarten.roelofs@gmail.com', 'a2a2c27b13aaba3a26b905b0d97371cf', '_file5beb1b672eaca-avatar.png', 'active', NULL, 1, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-11-13 18:39:44', NULL, '2019-01-23 10:16:33', 0),
(5, 'Renier', 'Oostveen', 'staff', 0, 2, 'renier@divaww.com', '09ec2017be876a5e6bf34008f955e029', NULL, 'active', NULL, 0, NULL, 0, 'Production Manager', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2018-11-13 19:26:41', NULL, NULL, 1),
(7, 'Shah Zobayer', 'Ahmed', 'staff', 0, 1, 'zobayer@divaww.com', '81050a093eb3b69583db0d463a5a365d', '_file5bfd46b35896a-avatar.png', 'active', '2019-07-01 05:59:49', 0, '2019-08-20 06:49:07', 0, 'Sr. Web Developer', 1, NULL, 'shahzobayer@gmail.com', '', '+8801911869695', '+8801911869695', '1992-11-29', '', 'male', NULL, 'speeedsam', 1, 1, '2018-11-14 07:32:02', NULL, '2019-08-27 06:10:55', 1),
(8, 'Nazmus', 'Sakib', 'staff', 0, 1, 'sakib@divaww.com', '039eb4173b7edd07ada5d866707a057c', '_file5bfd4610c0c42-avatar.png', 'active', '2018-11-27 13:50:18', 0, '2018-12-13 13:01:18', 0, 'Sr. Web Developer', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2018-11-14 07:34:19', NULL, '2018-12-13 14:10:09', 1),
(9, 'Sabbir', 'Hosen', 'staff', 0, 1, 'sabbir@divaww.com', '002d438d5627828b16dff9900679df97', '_file5bfd465fb250b-avatar.png', 'active', '2019-07-05 12:38:27', 0, '2019-11-15 15:22:35', 0, 'Front-end Developer', 0, NULL, 'sabbiror@gmail.com', 'Ashkona City Complex,\nDhaka 1230', '01780118222', '01707572431', '1992-02-02', '', 'male', NULL, 'opurno.sabbir1', 1, 1, '2018-11-14 07:35:31', NULL, '2019-11-15 15:30:47', 1),
(10, 'Renier', 'Oostveen', 'staff', 0, 2, 'renier@divaww.com', '5d0665471ad6e6f9a45bee0906f27ac0', '_file5bfd4624965e1-avatar.png', 'active', '2019-09-04 10:36:19', 0, '2019-09-09 13:11:42', 0, 'Project coordinator ', 0, NULL, 'renier@divaww.com', '', '+8801816196814', '0652541666', '1993-11-21', '', 'male', '', 'RenierOostveen', 1, 1, '2018-11-14 08:54:08', NULL, '2019-11-01 17:47:03', 1),
(11, 'Marc', 'Maas', 'client', 0, 0, 'marc@fusionlab.nl', '0240f0917649b7b6f4e36ec0c5e78a21', NULL, 'active', NULL, 2, NULL, 1, 'Director', 0, '', NULL, NULL, '+31645268482', NULL, NULL, NULL, 'male', NULL, 'mghmaas', 1, 1, '2018-11-14 09:01:56', NULL, '2019-01-24 12:29:49', 0),
(12, 'Sumaya', 'Afroza', 'staff', 0, 3, 'sumaya@divaww.com', '8fd76e7e72fea3da16fe6ef93626b320', '_file5bfd475e4d5c2-avatar.png', 'active', '2019-07-09 13:17:45', 0, '2019-08-28 10:32:13', 0, 'Creative Designer', 1, NULL, 'sumaya@divaww.com', 'afrozasumaya@gmail.com', '01675146449', '01742259217', '1993-02-06', '', 'female', '', '', 1, 1, '2018-11-14 09:43:52', NULL, '2019-08-28 10:32:46', 1),
(13, 'Habib', 'Bahar', 'staff', 0, 3, 'habib@divaww.com', 'de44905655d49aac4c39766a99f329ba', '_file5bfd45af7ea68-avatar.png', 'active', NULL, 0, NULL, 0, 'Art Director', 0, NULL, 'habib@divaww.com\n', '', '1516125477', '1516125477', '0000-00-00', '', 'male', NULL, '', 1, 1, '2018-11-14 09:44:54', NULL, '2018-12-13 07:41:25', 1),
(14, 'Md. Hasan Fardous', 'Rubel', 'staff', 0, 1, 'hasan@divaww.com', '1ac08b06e449b6e0bd52bd5b272f3da8', '_file5bfd45f3d0962-avatar.png', 'active', '2019-04-23 06:09:38', 0, '2019-05-14 06:20:35', 0, 'Front-end Developer', 0, NULL, 'Ruhitpur Purba, Ruhitpur,\nKeranigonj, Dhaka.', '', '+8801911120583', '+8801840121483', '1987-03-19', '', 'male', NULL, 'hasan.fardous.ruble', 1, 1, '2018-11-14 09:49:27', NULL, '2019-05-15 14:02:42', 1),
(15, 'Syed', 'Shihab', 'staff', 0, 1, 'shihab@divaww.com', '87042ff95f6681cf58d5174e66bf86c1', '_file5bfd4746c3afb-avatar.png', 'active', '2019-03-25 08:28:32', 0, '2019-06-10 06:18:05', 0, 'Web Developer', 0, NULL, 'Village: Hamsayapur, P/S & P/O: Sherpur, Dist: Bogura', '', '01743949931', '', '1993-04-21', '', 'male', NULL, 'syed.shihab_1', 1, 1, '2018-11-14 09:51:05', NULL, '2019-06-21 14:05:57', 1),
(16, 'Shazzad', 'Hossain', 'staff', 0, 1, 'shazzad@divaww.com', '1ecf02dce4f8ac063bb56c4299beeda8', '_file5bfd472d27c6b-avatar.png', 'active', '2019-09-18 14:00:07', 0, '2019-11-15 14:40:29', 0, 'Front-end Developer', 0, NULL, 'shazzadh97@gmail.com', 'shazzadh97@gmail.com', '0174466462', '01744664462', '1993-01-01', '', 'male', NULL, 'Shazzad Hossain', 1, 1, '2018-11-14 09:52:31', NULL, '2019-11-15 15:39:10', 1),
(17, 'Emma', 'Veldhuis', 'staff', 0, 1, 'emmacveldhuis@gmail.com', 'f5c205079cfb0c2c7e874f9b7032f475', '_file5bfd45dcc3506-avatar.png', 'active', NULL, 0, NULL, 0, 'Coordinator', 1, NULL, '', NULL, '', NULL, NULL, NULL, 'female', NULL, NULL, 1, 1, '2018-11-20 11:23:08', NULL, '2018-11-21 16:13:10', 0),
(18, 'Mara', 'Biristeica', 'client', 0, 0, 'mara.biristeica@justpremium.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 3, NULL, 1, 'Senior traffic manager', 0, '', NULL, NULL, '+31681859405', NULL, NULL, NULL, 'female', NULL, 'mara.bir', 1, 1, '2018-11-20 16:00:32', NULL, NULL, 1),
(19, 'Urszula', 'Pogoda', 'client', 0, 0, 'urszula.pogoda@justpremium.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 3, NULL, 0, 'Preview operator', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, 'urszula.pogoda', 1, 1, '2018-11-20 16:02:52', NULL, NULL, 0),
(20, 'Stefan', 'Ham', 'client', 0, 0, 'sham@detailresult.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 4, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-11-21 09:35:54', NULL, NULL, 0),
(21, 'Sjoerd', 'van Loon', 'client', 0, 0, 'sjoerd@made.for.digital', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 5, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-11-21 09:51:15', NULL, NULL, 0),
(22, 'Yvette', 'van Hal', 'client', 0, 0, 'y.vanhal@eisma.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 6, NULL, 1, 'Accountmanager', 0, '', NULL, NULL, '(088) 2944760', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2018-11-21 09:55:45', NULL, NULL, 0),
(23, 'Dennis', 'de Zwaan', 'client', 0, 0, 'dennis.de.zwaan@ad.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 7, NULL, 1, 'Manager digital marketing', 0, '', NULL, NULL, '06 - 112 653 12', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-11-21 11:33:07', NULL, NULL, 0),
(24, 'Marcel', 'Udo', 'client', 0, 0, 'marcel@connect73.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 9, NULL, 1, '', 0, '', NULL, NULL, '06 29013501', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-11-21 13:49:26', NULL, NULL, 0),
(25, 'Daisy', 'Vroomans-Verhagen', 'client', 0, 0, 'daisy@cuttheweb.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 10, NULL, 1, 'Customer success manager', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2018-11-21 14:15:32', NULL, NULL, 0),
(26, 'Joram', 'Bruins', 'client', 0, 0, 'joram@oogstonline.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 8, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-11-21 14:21:22', NULL, NULL, 0),
(27, 'Duncan', 'Borsboom', 'client', 0, 0, 'duncan@dbom.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 11, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-11-21 14:32:35', NULL, NULL, 0),
(28, 'Rohit', 'Hasan', 'staff', 0, 2, 'rohit@divaww.com', '96e214a5e769f7142dc427cfe8dcceb6', '_file5bfd464353bca-avatar.png', 'active', '2019-10-17 06:28:59', 0, '2020-01-16 13:54:07', 0, 'Data Scientist', 0, NULL, 'hasanrohit123@gmail.com', 'hasan35-1227@diu.edu.bd', '01913990421', '', '1994-12-12', '', 'male', NULL, 'rohit-hasan', 1, 1, '2018-11-21 19:50:53', NULL, '2020-01-21 09:14:08', 0),
(29, 'Janneke', 'de Jong', 'client', 0, 0, 'janneke@cineart.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 16, NULL, 1, '', 0, '', NULL, NULL, '+31 6 22953698', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2018-11-30 12:21:11', NULL, NULL, 0),
(30, 'Erik', 'Schuit', 'client', 0, 0, 'erik@premieretv.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 17, NULL, 1, '', 0, '', NULL, NULL, '0648010788', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-11-30 12:23:56', NULL, NULL, 0),
(31, 'Matthieu', 'van der Heiden', 'client', 0, 0, 'matthieu.van.der.heiden@onebusiness.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 12, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-11-30 12:25:37', NULL, NULL, 0),
(32, 'Taco', 'Stomps', 'client', 0, 0, 'tacostomps@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 13, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-11-30 12:29:38', NULL, NULL, 0),
(33, 'Maarten', 'Roelofs', 'client', 0, 0, 'maarten@moondiscovery.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 13, NULL, 0, '`', 0, '', NULL, NULL, '0614797801', NULL, NULL, NULL, 'male', NULL, 'mjorter', 1, 1, '2018-11-30 12:30:08', NULL, NULL, 0),
(34, 'Maurice', 'Matser', 'client', 0, 0, 'Crediteuren@eisma.nl', 'd41d8cd98f00b204e9800998ecf8427e', '_file5c012dea3f568-avatar.png', 'active', NULL, 19, NULL, 1, '', 0, '', NULL, NULL, ' 06 5243 6062', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-11-30 12:32:04', NULL, NULL, 0),
(35, 'Anouk', 'Boermans', 'client', 0, 0, 'anouk@zeilen.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 15, NULL, 1, '', 0, '', NULL, NULL, '023- 8200106', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-11-30 12:39:12', NULL, NULL, 0),
(36, 'Bernard', 'Hartong', 'client', 0, 0, 'BernardHartong@vluchteling.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 21, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-11-30 12:40:38', NULL, NULL, 0),
(37, 'Joris', 'Timmers', 'client', 0, 0, 'joris.timmers@persgroep.net', '02df0f5871e798a14fed774411971df0', NULL, 'active', NULL, 22, NULL, 1, '', 0, '', NULL, NULL, '0613966603', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-11-30 14:42:14', NULL, '2018-12-06 14:02:46', 0),
(38, 'Taco', 'Stomps', 'staff', 1, 0, 'taco@planetnine.com', 'a2a2c27b13aaba3a26b905b0d97371cf', NULL, 'active', '2019-11-29 13:46:33', 0, NULL, 0, 'Partner', 0, NULL, '', NULL, '06 53459211', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2018-11-30 15:40:49', NULL, '2019-12-10 10:09:51', 1),
(39, 'Safayet-Bin-Azam', 'Prangon', 'staff', 0, 0, 'safayet@divaww.com', '43dee5c5d51cb00e180bde457d0a7d76', NULL, 'active', NULL, 0, NULL, 0, 'Developer', 0, NULL, 'Address: Section-06, Block-C, Road-08, House-01, Mirpur, Dhaka-1216\n', '', '', '', '1994-09-25', '', 'male', NULL, '', 1, 1, '2018-11-30 15:44:07', NULL, NULL, 1),
(40, 'Salma', 'Umme', 'staff', 0, 2, 'sales@divaww.com', '7f55d5802dbd2f7c78e69d52c1528768', '_file5c0e34c0e4b29-avatar.png', 'active', '2019-06-11 10:00:31', 0, '2020-01-30 06:55:11', 0, 'Front-end Developer', 0, NULL, 'Ahmed View\nShahid Harez Shorok,Narda\nDhaka Narda 1212', 'mahiramuhtasim@gmail.com', '01521223331', '01736708837', '1995-06-19', '', 'female', NULL, 'salma muna', 1, 1, '2018-12-03 16:18:33', NULL, '2020-01-30 07:37:31', 0),
(41, 'Ibrahim', 'Faisal', 'staff', 0, 1, 'ibrahim@divaww.com', '36a209caa73f8a0e32440c1af2eb2c4e', '_file5c0e34e3dbe67-avatar.png', 'active', '2019-09-04 12:51:18', 0, '2020-01-29 13:09:24', 0, 'Front-end Developer', 0, NULL, 'Zomoj Road\nJoar Sahara, Vatara Thana \nVatara 1229', 'mifaisal19@gmail.com', '01929210872', '01929210872', '1994-07-02', '', 'male', NULL, 'Ibrahim Faisal', 1, 1, '2018-12-03 16:19:21', NULL, '2020-01-30 07:37:57', 0),
(42, 'Esmé', 'Nikolic ', 'client', 0, 0, 'esme.nikolic@rtl.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 24, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2018-12-10 12:05:01', NULL, NULL, 0),
(43, 'Amber', 'Verweij', 'client', 0, 0, 'amber.verweij@persgroep.net', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 22, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2018-12-10 16:56:17', NULL, NULL, 0),
(44, 'Esmee', 'Siliakus', 'client', 0, 0, 'Esmee.Siliakus@persgroep.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 22, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2018-12-10 16:56:46', NULL, NULL, 0),
(45, 'Tirza', 'Borrenbergs', 'client', 0, 0, 'Tirza.Borrenbergs@rtl.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 24, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2018-12-10 16:58:37', NULL, NULL, 0),
(46, 'Jennifer', 'Stanley', 'client', 0, 0, 'jennifer@appetitecreative.com', '4c46d62c15e18667acc4901d9e016b9d', NULL, 'active', NULL, 25, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, 'ewjstanley', 1, 1, '2018-12-11 06:37:01', NULL, '2019-12-03 16:44:28', 0),
(47, 'Rob', 'Molenaar', 'staff', 0, 2, 'rob.molenaar@madicinemedianomail.nl', 'ac50af05eb23fc88e4296fc93ed4713d', NULL, 'active', NULL, 0, NULL, 0, 'Whatever', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2018-12-14 07:56:07', NULL, '2018-12-17 11:20:38', 1),
(48, 'Rob', 'Molenaar', 'client', 0, 0, 'info@madicinemedia.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 27, NULL, 1, '', 0, '', NULL, NULL, '020 370 1617', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-12-17 10:14:49', NULL, NULL, 0),
(49, 'Maxime', 'Latupeirissa', 'client', 0, 0, 'maxime@solmar.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 28, NULL, 1, 'Online Marketeer', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2018-12-18 13:55:26', NULL, NULL, 0),
(50, 'Martijn', 'van Hoorn', 'client', 0, 0, 'm.vanhoorn@wildlands.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 29, NULL, 1, '', 0, '', NULL, NULL, '0654936766', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-12-18 17:37:12', NULL, NULL, 0),
(51, 'Ripon', 'Hossain', 'staff', 0, 4, 'riponhossain6611@gmail.com', '4c2bff62226c464c5ba6a241ca407791', '_file5c1ba74752b78-avatar.png', 'inactive', '2019-03-29 09:31:22', 0, NULL, 0, 'Jr Accountant and Purchaser', 1, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2018-12-20 13:03:02', NULL, '2019-11-17 05:24:42', 0),
(52, 'Niels', 'Visje', 'client', 0, 0, 'niels@vis.je', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 28, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2018-12-24 14:06:36', NULL, NULL, 0),
(53, 'Lise Lotte', 'Vermeulen', 'client', 0, 0, 'LiseLotte@solmar.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 28, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2018-12-24 14:06:57', NULL, NULL, 0),
(54, 'Safayet-Bin', 'Azam', 'staff', 0, 2, 'safayet@divaww.com', '9759477a348f1df017163bbea94e0e04', '_file5c2b1401dd035-avatar.png', 'active', '2020-01-21 13:39:11', 0, '2020-01-30 07:23:46', 0, 'Web Developer', 0, NULL, 'Section-6,Block-C,Road-08,House-01,Mirpur,Dhaka\nName: Safayet-Bin-Azam\nAccount No. 1641510449230\nBranch: Mirpur-6', '', '01679537677', '', '1994-09-25', '', 'male', '', 'prangonsafayet@gmail.com', 1, 1, '2018-12-31 13:46:59', NULL, '2020-01-30 07:23:23', 0),
(55, 'Anik', 'Paul', 'staff', 0, 3, 'anik@divaww.com', '8ac668bf6a1b60988eee0243e65a1e8a', '_file5c35f96399bb5-avatar.png', 'active', '2020-01-09 13:10:55', 0, '2020-01-29 13:55:10', 0, 'Creative Designer', 0, NULL, 'anikpaul9@gmail.com', 'Anik Paul \nKalachandpur Main Road \nNadda 1212', '01764372712', '', '1990-08-22', '', 'male', NULL, 'live:anik10_4', 1, 0, '2019-01-03 01:12:24', NULL, '2020-01-30 07:37:28', 0),
(56, 'Rick', 'van Roon', 'client', 0, 0, 'rick.van.roon@persgroep.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 22, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-01-09 11:32:00', NULL, NULL, 0),
(57, 'Niels', 'Weberink', 'client', 0, 0, 'n.weberink@tnlbusiness.com', '1222ddfbd4d7b22414871ca54dc55943', NULL, 'active', NULL, 31, NULL, 1, '', 0, '', NULL, NULL, '0646025457', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-01-15 11:00:53', NULL, '2020-01-24 09:40:04', 0),
(58, 'Eveline', 'Davidis', 'client', 0, 0, 'eveline@made.for.digital', '6db3235852bd27aa2aaff89ce7d208da', NULL, 'active', NULL, 5, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-01-22 12:58:31', NULL, '2019-01-22 14:06:13', 0),
(59, 'Chris', 'Beijer', 'staff', 1, 0, 'chris@moondiscovery.nl', '17265caab0228921f248f6e95aeb70ee', NULL, 'active', NULL, 0, NULL, 0, 'Head of DFP', 0, NULL, 'chris@moondiscovery.nl', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2019-01-22 21:12:45', NULL, '2019-12-19 11:20:14', 0),
(60, 'demo', 'roelofs', 'client', 0, 0, 'demo@roelofs.com', 'a2a2c27b13aaba3a26b905b0d97371cf', NULL, 'active', NULL, 31, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-01-23 10:22:40', NULL, '2019-01-23 20:22:53', 1),
(61, 'Rob', 'Molenaar', 'client', 0, 0, 'rob.molenaar@madicinemedia.nl', 'c64481222cf173ccca41e9e65d36555d', NULL, 'active', NULL, 33, NULL, 1, 'Untitled', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2019-01-28 10:44:26', NULL, '2019-01-31 09:44:48', 0),
(62, 'Rob', 'Molenaar nieuw', 'staff', 0, 0, 'rob@roelofs.com', 'd1f483c9eb510c47ae7caa69c6af5d90', NULL, 'active', NULL, 0, NULL, 0, 'relation', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2019-01-28 14:57:15', NULL, '2019-01-28 15:43:50', 1),
(63, 'Rob', 'Molenaar', 'staff', 0, 0, 'rob@roelofs.com', 'd1f483c9eb510c47ae7caa69c6af5d90', NULL, 'active', NULL, 0, NULL, 0, 'Cowboy', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2019-02-01 06:21:19', NULL, '2019-05-24 12:57:56', 1),
(64, 'Maarten', 'van der Gugten', 'client', 0, 0, 'maarten@youfone.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 34, NULL, 1, 'Head of Digital', 0, '', NULL, NULL, '0623914487', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-02-06 15:11:33', NULL, NULL, 0),
(65, 'Robert', 'Vink', 'client', 0, 0, 'robert.vink@persgroep.nl', 'd4e7d7156d2b9cc4d2f04e4726c4a9f0', NULL, 'active', NULL, 35, NULL, 1, '', 0, '', NULL, NULL, '+31645396150', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-02-07 14:16:27', NULL, '2019-07-04 14:48:36', 0),
(66, 'Jeroen', 'Esbeukman', 'client', 0, 0, 'j.esbeukman@tnlbusiness.com', '54f0a4b01ec13de54d2d16fe67393b13', 'a:3:{s:9:\"file_name\";s:29:\"_file5d93474549efd-avatar.png\";s:7:\"file_id\";s:33:\"18iMpbabkRKBF62pLPLJtBj5K-viMjjsL\";s:12:\"service_type\";s:6:\"google\";}', 'active', NULL, 31, '2020-01-13 14:58:37', 0, 'Online Marketeer', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-02-18 15:49:12', NULL, '2020-01-17 08:05:57', 0),
(67, 'Marijn', 'Molenaar', 'staff', 0, 3, 'marijnmolenaar00@gmail.com', '5f5885ae70c81dc97ca655e90351b1fe', NULL, 'active', NULL, 0, NULL, 0, 'Project Manager', 1, NULL, '', '', '', '', '2000-10-24', '', 'male', NULL, '', 1, 1, '2019-03-12 19:37:29', NULL, '2019-05-07 15:29:46', 1),
(68, 'Taco ', 'miss green', 'client', 0, 0, 'taco@missgreen.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 1, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-03-19 19:52:35', NULL, NULL, 0),
(69, 'Angelique', 'Hardeveld', 'client', 0, 0, 'angelique@streetsoftheworld.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 38, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-03-20 09:41:20', NULL, NULL, 0),
(70, 'Tim', 'Koops', 'client', 0, 0, 'tim@demediamaatschap.nl', '2a22a70d391c5b0d4f733e0eb8acbf26', NULL, 'active', NULL, 39, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-03-20 10:05:22', NULL, '2019-05-16 15:08:36', 1),
(71, 'Suzan', 'Huurnink', 'client', 0, 0, 's.huurnink@iamsterdam.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 40, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-03-20 11:02:15', NULL, NULL, 0),
(72, 'Sandra', 'Poelmann', 'client', 0, 0, 's.poelmann@iamsterdam.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 40, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-03-20 11:02:41', NULL, NULL, 0),
(73, 'Alex', 'Sieval', 'client', 0, 0, 'alex.sieval@veenmedia.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 41, NULL, 1, 'Salesmanager', 0, '', NULL, NULL, '06-11380380', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-03-25 12:01:12', NULL, NULL, 0),
(74, 'Melissa', 'Oltmans', 'client', 0, 0, 'moltmans@vbkmedia.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 41, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-03-25 12:02:15', NULL, NULL, 0),
(75, 'Robin', 'Sparnaaij', 'client', 0, 0, 'robin@demediamaatschap.nl', '404086034a17d32d652890bab7fb25c0', NULL, 'active', NULL, 39, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-03-28 14:27:02', NULL, '2020-01-28 11:00:40', 0),
(76, 'Simone', 'Schnabel', 'client', 0, 0, 'simone@yoursocial.agency', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 42, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-04-03 06:26:06', NULL, NULL, 0),
(77, 'Jos', 'Timmer', 'client', 0, 0, 'jtimmer@detailresult.nl', 'a4ee0b3d5471400e0e235e8ede8fe9d2', NULL, 'active', NULL, 4, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-04-09 18:47:26', NULL, '2019-04-10 14:59:50', 0),
(78, 'Eline', 'Kannekens', 'client', 0, 0, 'ekannekens@merkleinc.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 8, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-04-17 10:13:00', NULL, NULL, 0),
(79, 'Rolf', 'Oberink', 'client', 0, 0, 'r.oberink@tnlbusiness.com', 'b0cc6b12bcec8138d54ac8ca8733669f', NULL, 'active', NULL, 31, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-04-26 10:34:37', NULL, '2019-11-27 13:40:59', 0),
(80, 'Bastiaan', 'van der Staay', 'client', 0, 0, 'bastiaan@fel.nl', '81883ac876f3d05434ff0828e17b1096', NULL, 'active', NULL, 43, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-05-16 15:54:21', NULL, NULL, 0),
(81, 'Wouter', 'Fransen', 'client', 0, 0, 'wouter@fel.nl', '447c5e2a21b641a99dcd1af616d4fb09', NULL, 'active', NULL, 43, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-05-16 15:54:43', NULL, NULL, 0),
(82, 'Michel', 'Cuppen', 'client', 0, 0, 'm.cuppen@tnlbusiness.com', '0544205c2e67a61ce79fe7d1cd7bc75c', NULL, 'active', '2019-10-14 10:18:35', 31, '2020-01-21 13:07:08', 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-05-17 07:01:39', NULL, '2020-01-29 16:17:35', 0),
(83, 'Lauren', 'Zonneveld', 'client', 0, 0, 'l.zonneveld@tnlbusiness.com', '9baceecb0db0c3989d7f44eb032f77ac', NULL, 'active', '2019-10-22 08:36:39', 31, '2019-10-22 08:36:41', 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-05-22 10:02:52', NULL, '2019-10-31 12:48:33', 0),
(84, 'Fleur', 'Hendriks', 'client', 0, 0, 'FleurHendriks@vluchteling.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 21, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-07-03 15:13:26', NULL, NULL, 0),
(85, 'Ebn', 'Sina', 'staff', 0, 1, 'es@divaww.com', '52956342857f1c7547ecd66cb1832efd', 'a:3:{s:9:\"file_name\";s:29:\"_file5de6354d9eb5a-avatar.png\";s:7:\"file_id\";s:33:\"10dYJUo_jThlWuMcR-6iAqIX99tGUOnJP\";s:12:\"service_type\";s:6:\"google\";}', 'active', '2019-12-06 10:54:53', 0, '2020-01-28 13:09:15', 0, 'Web Developer', 0, NULL, 'es@divaww.com', 'Joar Sahara\nVatara\n1229 Dhaka', '01831148994', '', '1995-10-10', '', 'male', '\n', 'ebnsina.me_1', 1, 1, '2019-07-04 12:08:28', NULL, '2020-01-30 07:37:59', 0),
(86, 'Mariam', 'Rahman', 'staff', 0, 1, 'mariyam@divaww.com', '8a3bbcbdce5e6dc20d28561170e669ae', 'a:1:{s:9:\"file_name\";s:29:\"_file5d306fc57a6e5-avatar.png\";}', 'active', '2019-10-07 13:38:22', 0, '2020-01-30 03:48:13', 0, 'Web Developer', 0, NULL, 'Road no:9\n House: 4 ,Kallyanpur\nDhaka Kallyanpur 1216', '', '01795370404', '', '1996-06-30', '', 'female', NULL, '', 1, 1, '2019-07-04 12:11:42', NULL, '2020-01-30 03:48:10', 0),
(87, 'Apu', 'Sabbir', 'staff', 0, 3, 'apu@divaww.com', '40e41fc3cf9ce682bd19cc80d4653241', 'a:1:{s:9:\"file_name\";s:29:\"_file5d306f802a914-avatar.png\";}', 'active', '2020-01-16 07:07:19', 0, '2020-01-29 11:48:46', 0, 'Graphic Designer', 0, NULL, 'House-16, Road-4, Block-D, Mirpur-1,Dhaka', 'House-16, \nRoad-4, Block-D, \nSection-1, \nDhakaMirpur', '01708529020', '01620224581', '1986-07-29', '', 'male', NULL, 'sabbirahmed', 1, 1, '2019-07-08 07:59:58', NULL, '2020-01-30 07:37:45', 0),
(88, 'Randy', 'Verschuren', 'client', 0, 0, 'Randy.Verschuren@rtl.nl', 'd2917ab9c6483a251bc6d6a31d180cbd', NULL, 'active', NULL, 24, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-08-29 08:44:43', NULL, '2019-08-29 09:25:30', 0),
(89, 'Melissa', 'ten Hove', 'client', 0, 0, 'Melissa.ten.Hove@rtl.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 24, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-08-29 08:47:02', NULL, NULL, 0),
(90, 'Igo', 'Geurtjens', 'staff', 1, 0, 'igo@divaww.com', '8a742a882439989bcb85aadaf6585a06', NULL, 'active', NULL, 0, '2020-01-07 06:05:02', 0, 'Project Coordinator ', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2019-08-29 09:22:10', NULL, '2020-01-07 06:14:16', 0),
(91, 'Dennis', 'Peekel', 'client', 0, 0, 'dennis.peekel@justpremium.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 3, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-09-03 11:23:25', NULL, NULL, 0),
(92, 'Eric', 'Visser', 'client', 0, 0, 'eric.visser@justpremium.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 3, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-09-03 11:23:42', NULL, NULL, 0),
(93, 'Kees ', 'Kok', 'client', 0, 0, 'kees.kok@rtl.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 24, NULL, 0, '', 0, '', NULL, NULL, '06716038342', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-09-11 08:12:53', NULL, NULL, 0),
(94, 'Willemijn ', 'Boerenkamp', 'client', 0, 0, 'willemijn.Boerenkamp@rtl.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 24, NULL, 0, '', 0, '', NULL, NULL, '0623813421', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-09-11 08:13:46', NULL, NULL, 0),
(95, 'Sandra', 'De Ruijter', 'client', 0, 0, 'sandra@redbutton.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 48, NULL, 0, '', 0, '', NULL, NULL, '06 10 31 10 10 ', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-09-11 08:15:53', NULL, NULL, 0),
(96, 'Benjamin', 'van Rossum', 'client', 0, 0, 'benjamin@redbutton.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 48, NULL, 0, '', 0, '', NULL, NULL, '06 4230 5712', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-09-11 08:16:22', NULL, NULL, 0),
(97, 'Jeroen', 'van Egmond', 'client', 0, 0, 'jeroen@fusionlab.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 2, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-09-13 09:53:41', NULL, NULL, 0),
(98, 'Free', 'Admin', 'staff', 1, 0, 'free@isafeelin.org', 'bf6ca6bab80bd53248c5a7282fc5fc6d', NULL, 'active', NULL, 0, NULL, 0, 'SYSADMIN', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2019-09-13 14:15:47', NULL, '2019-12-03 13:49:46', 0),
(99, 'Tamara ', 'Vorstenbosch', 'client', 0, 0, 'tamara@vandyckbrown.nl', '7839211eae01f45a54cdc7365bec345e', NULL, 'active', '2019-12-16 14:51:03', 47, '2020-01-28 08:04:39', 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-09-18 09:06:50', NULL, '2020-01-27 11:50:28', 0),
(100, 'Linda', 'Balk', 'client', 0, 0, 'linda@vandyckbrown.nl', 'b8b4153f5e14f5f4468fbc379919f1b6', NULL, 'active', '2019-10-11 14:47:20', 47, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-09-18 10:13:38', NULL, '2019-12-20 14:29:36', 0),
(101, 'JP', 'Kroon', 'client', 0, 0, 'jp@vandyckbrown.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 47, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-09-18 10:13:51', NULL, NULL, 0),
(102, 'Sandra', 'Hofstede', 'client', 0, 0, 'sandra.hofstede@mediascience.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 51, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-09-23 13:36:07', NULL, NULL, 0),
(103, 'Eveline', 'Wiegmans', 'client', 0, 0, 'eveline.wiegmans@mediascience.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 51, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-09-23 13:36:42', NULL, NULL, 0),
(104, 'Jasper', 'Spijkstra', 'client', 0, 0, 'Jasper.spijkstra@mediascience.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 51, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-09-23 13:37:01', NULL, NULL, 0),
(105, 'Marcel', 'Strijk', 'client', 0, 0, 'marcel@topgear.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 67, NULL, 1, 'Marketing', 0, '', NULL, NULL, '+31618456796', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-10-03 07:26:41', NULL, NULL, 0),
(106, 'Marleen', 'Koelma', 'client', 0, 0, 'marleen.koelma@mediamonks.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 68, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-10-07 17:32:25', NULL, NULL, 0),
(107, 'Janneke', 'Hekhuis', 'client', 0, 0, 'jhekhuis@merkleinc.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 8, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-10-09 10:44:09', NULL, NULL, 0),
(108, 'Hind', 'Ayachi', 'client', 0, 0, 'hind@vandyckbrown.nl', '38803abae1f572e1af36d682c6d074bb', NULL, 'active', NULL, 47, NULL, 0, 'Untitled', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, 1, 1, '2019-10-14 07:10:28', NULL, '2019-11-19 16:20:46', 0),
(109, 'Martijn ', 'Volger', 'client', 0, 0, 'mvolger@merkleinc.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 8, NULL, 0, '', 0, '', NULL, NULL, '+31623949095', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-10-14 14:43:54', NULL, NULL, 0),
(110, 'Don', 'van Diest', 'client', 0, 0, 'dodiest@merkleinc.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 8, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-10-14 14:44:13', NULL, NULL, 0),
(111, 'Tim', 'Jansen', 'client', 0, 0, 'tjansen@merkleinc.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 8, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-10-14 14:44:31', NULL, NULL, 0),
(112, 'Marieke', 'Bouman', 'client', 0, 0, 'Marieke.Bouman@talpanetwork.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 32, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-10-22 08:07:06', NULL, NULL, 1),
(113, 'Michael', 'Hakvoort', 'client', 0, 0, 'Michael.Hakvoort@emesa.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 32, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-10-22 08:07:23', NULL, NULL, 0),
(114, 'John', 'de Vroede', 'client', 0, 0, 'j.devroede@solvemarketing.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 73, NULL, 1, '', 0, '', NULL, NULL, '+31 (0) 6 430 37000', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-10-24 10:44:17', NULL, NULL, 0),
(115, 'Darren', 'Vroede', 'client', 0, 0, 'studio@solvemarketing.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 73, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-10-24 10:44:42', NULL, NULL, 0),
(116, 'Annette', 'Schellekens', 'client', 0, 0, 'Annette.Schellekens@emesa.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 32, NULL, 0, '', 0, '', NULL, NULL, '+31629601990', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-10-24 14:29:03', NULL, NULL, 0),
(117, 'Anne', 'Jonkers', 'client', 0, 0, 'Anne.Jonkers@talpanetwork.com', 'bc51086b07ab8dfed7b13920e49d9d6d', NULL, 'active', NULL, 74, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-10-28 14:12:35', NULL, '2019-10-29 13:15:00', 0),
(118, 'Marieke ', 'Bouman', 'client', 0, 0, 'Marieke.Bouman@talpanetwork.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 74, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-10-28 14:14:32', NULL, NULL, 0),
(119, 'Willem', 'Keller', 'client', 0, 0, 'willem.keller@talpanetwork.com', '1b0d042ad59a92a3bc97ba27381146bc', NULL, 'active', NULL, 75, NULL, 1, '', 0, '', NULL, NULL, '0613113646', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-11-04 12:22:53', NULL, '2019-11-14 12:18:40', 0),
(120, 'Shakil', 'Tonmoy', 'staff', 0, 4, 'shakil_tonmoy_bd@hotmail.com', 'fa066c4385e0f657786adf0537ac1cf2', NULL, 'active', NULL, 0, NULL, 0, 'Finance', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2019-11-19 13:44:48', NULL, '2019-11-20 12:00:03', 0),
(121, 'Santana', 'Van Maanen', 'client', 0, 0, 'santana@redbutton.nl', '11a8c10d9253e023529f85d9f16b0c65', NULL, 'active', NULL, 48, NULL, 1, '', 0, '', NULL, NULL, '+31628719671', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-11-19 14:03:34', NULL, NULL, 0),
(122, 'Anouk', 'Greveling', 'client', 0, 0, 'agreveling@merckleinc.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 42, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-11-19 14:44:59', NULL, NULL, 0),
(123, 'Eric', 'Honing', 'client', 0, 0, 'ehoning@merkleinc.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 42, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-11-19 14:45:57', NULL, NULL, 0),
(124, 'Hoi-Kin ', 'Li', 'client', 0, 0, 'holi@merkleinc.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 42, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-11-19 14:48:43', NULL, NULL, 0),
(125, 'Nicolle', 'Brisbane', 'client', 0, 0, 'nicolle@appetitecreative.com', '4c46d62c15e18667acc4901d9e016b9d', NULL, 'active', NULL, 25, '2019-12-02 16:36:27', 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-11-23 07:48:53', NULL, '2019-12-02 17:59:39', 0),
(126, 'Cedric', 'Otten', 'client', 0, 0, 'cedric.otten@mediamonks.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 68, NULL, 0, '', 0, '', NULL, NULL, '+31 35 621 21 50', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-11-26 14:23:56', NULL, NULL, 0),
(127, 'fair', 'sketch', 'staff', 1, 0, 'support@fairsketch.com', '75f93550dd42286c28d4dbc21270a3d9', NULL, 'active', NULL, 0, NULL, 0, 'admin', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2019-11-28 19:28:30', NULL, '2019-12-02 20:06:43', 1),
(128, 'fair', 'sketch', 'staff', 1, 0, 'support2@fairsketch.com', '9516dbf85502d40d1e7f82d464ed89bc', NULL, 'active', NULL, 0, NULL, 0, 'admin', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2019-11-28 19:34:09', NULL, NULL, 1),
(129, 'Rafatul', 'Alam', 'staff', 0, 0, 'rafatul@divaww.com', '747d1f79086d149540df1a026261b481', NULL, 'active', NULL, 0, '2020-01-24 15:56:50', 0, 'Developer', 0, NULL, '64/A, RK Mission Road\nMotijheel\nDhaka-1203', '', '', '', '1998-04-17', '', 'male', NULL, '', 1, 1, '2019-12-04 10:10:15', NULL, '2020-01-30 07:38:10', 0),
(130, 'ZZ_Limon', 'Roy', 'staff', 0, 4, 'limon@divaww.com', 'fc8454b4c356ef635ad93ebd341ba36b', NULL, 'active', NULL, 0, NULL, 0, 'Guard', 0, NULL, '', '', '', '', '0000-00-00', '', 'male', NULL, '', 1, 1, '2019-12-04 17:58:54', NULL, '2020-01-06 13:23:13', 0),
(131, 'Linda', 'van Lakwijk', 'client', 0, 0, 'L.vanLakwijk@zoover.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 78, NULL, 1, 'Online Campaign Manager', 0, '', NULL, NULL, '+31610454031', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-12-05 07:52:12', NULL, NULL, 0),
(132, 'maarten', 'roelofs', 'client', 0, 0, 'maarten@planetnine.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 68, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-12-05 13:13:08', NULL, NULL, 0),
(133, 'Govinda', 'Roy', 'staff', 0, 1, 'govinda@divaww.com', '9968b19b01dc2b7974a26ff7ff868946', 'a:3:{s:9:\"file_name\";s:29:\"_file5dee05a2072dc-avatar.png\";s:7:\"file_id\";s:33:\"1IMmnmltlkmnpIKhxiC080MKc3a71fPkd\";s:12:\"service_type\";s:6:\"google\";}', 'active', '2020-01-29 13:48:19', 0, '2020-01-29 08:05:00', 0, 'Developer', 0, NULL, 'Flat A-2 901, Sharkari Sangshad Quarters, Agargaon, Dhaka', '', '+8801682076743', '', '1994-09-01', '', 'male', NULL, 'govinda.roy', 1, 1, '2019-12-06 09:34:31', NULL, '2020-01-30 06:11:43', 0),
(134, 'Taco', 'Stomps', 'staff', 1, 0, 'taco@planetnine.com', 'a2a2c27b13aaba3a26b905b0d97371cf', NULL, 'active', NULL, 0, NULL, 0, 'Admin', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2019-12-10 10:11:31', NULL, '2020-01-21 14:39:10', 0),
(135, 'Production', 'Diva', 'client', 0, 0, 'production@divaww.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 75, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-12-10 10:25:07', NULL, NULL, 0),
(136, 'Bobby', 'Logmans', 'client', 0, 0, 'blogmans@merkleinc.com', '24ed31744087d5cb4992817d5273827e', NULL, 'active', NULL, 8, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-12-11 14:33:30', NULL, NULL, 0),
(137, 'Rubaiya', 'Sharif', 'staff', 0, 3, 'rubaiya@divaww.com', '856c63b0f97a5e1871931394623c46cf', NULL, 'active', '2019-12-17 08:51:05', 0, '2020-01-30 06:21:24', 0, 'Designer', 0, NULL, 'Mohammadia Housing Limited, Road:3, House:73, Dhaka, Bangladesh.', '', '01534653674', '', '1994-03-03', '', 'female', NULL, '', 1, 1, '2019-12-17 07:31:49', NULL, '2020-01-30 06:20:29', 0),
(138, 'Sofie', 'Brand', 'client', 0, 0, 'sofie.brand@de-reclamefabriek.nl', '4cda11516a3872c8f3ab05b1b435e812', NULL, 'active', NULL, 79, NULL, 1, '', 0, '', NULL, NULL, '0627900531', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-12-19 13:24:40', NULL, '2019-12-20 16:24:12', 0),
(139, 'Erik ', 'van de Kleut ', 'client', 0, 0, 'Erik.vandeKleut@de-reclamefabriek.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 79, NULL, 0, '', 0, '', NULL, NULL, '+ 31 (0)6 53 69 1151', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-12-19 13:28:24', NULL, NULL, 0),
(140, 'Marloes', 'Posthuma', 'client', 0, 0, 'marloes.posthuma@de-reclamefabriek.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 79, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-12-20 14:30:56', NULL, NULL, 0),
(141, 'Sophie ', 'Veenstra', 'client', 0, 0, 'sophie.veenstra@de-reclamefabriek.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 79, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-12-20 14:31:17', NULL, NULL, 0),
(142, 'Lisa ', 'Lefeber', 'client', 0, 0, 'lisa.lefeber@de-reclamefabriek.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 79, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-12-20 14:31:39', NULL, NULL, 0),
(143, 'Janet', 'van den Akker', 'client', 0, 0, 'janet.vandenakker@de-reclamefabriek.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 79, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-12-20 14:32:04', NULL, NULL, 0),
(144, 'Josiene', 'van der Willik', 'client', 0, 0, 'josiene.vanderwillik@de-reclamefabriek.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 79, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-12-20 14:32:26', NULL, NULL, 0),
(145, 'Cheryl', 'Powel', 'client', 0, 0, 'cpowel@merkleinc.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 8, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2019-12-23 08:00:52', NULL, NULL, 0),
(146, 'Alexander', 'Boissevain', 'client', 0, 0, 'aboissevain@merkleinc.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 8, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2019-12-27 08:39:46', NULL, NULL, 0),
(147, 'Frederike', 'Rollerman', 'client', 0, 0, 'frederike@fel.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 43, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2020-01-03 13:38:04', NULL, NULL, 0),
(148, 'Sophie', 'Verrilli', 'client', 0, 0, 'Sophie.Verrilli@rtl.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 24, NULL, 0, 'Online Marketeer', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'female', NULL, '', 1, 1, '2020-01-07 13:41:00', NULL, NULL, 0),
(149, 'Renier', 'Oostveen', 'client', 0, 0, 'renier@demediamaatschap.nl', '5af0e598194940eabd1ff26ff2541356', NULL, 'active', NULL, 39, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2020-01-13 10:31:40', NULL, '2020-01-28 09:59:39', 0),
(150, 'Marcel', 'Vogels', 'client', 0, 0, 'marcel@memo2.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 80, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2020-01-16 12:16:23', NULL, NULL, 0),
(151, 'Roy', 'Broertjes', 'client', 0, 0, 'r.broertjes@gitp.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 81, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2020-01-16 13:29:47', NULL, NULL, 0),
(152, 'Jeroen', 'Van IJzendoorn', 'client', 0, 0, 'jeroen@factortachtig.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 82, NULL, 1, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2020-01-17 05:16:47', NULL, NULL, 0),
(153, 'Vincent', 'Marquenie', 'client', 0, 0, 'Vincent@demediamaatschap.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 39, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2020-01-19 08:18:10', NULL, NULL, 0),
(154, 'Vincent', 'Bakker', 'client', 0, 0, 'vincent@zeilen.nl', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 15, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2020-01-21 10:40:14', NULL, NULL, 0),
(155, 'Ted', 'Hartkamp', 'client', 0, 0, 'thartkamp@merkleinc.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 8, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2020-01-27 11:25:13', NULL, NULL, 0),
(156, 'Feye', 'Zuidema', 'client', 0, 0, 'fzuidema@merkleinc.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'active', NULL, 8, NULL, 0, '', 0, '', NULL, NULL, '', NULL, NULL, NULL, 'male', NULL, '', 1, 1, '2020-01-27 11:26:21', NULL, NULL, 0),
(157, 'Maeesha', 'Maliha', 'staff', 0, 1, 'maeesha.maliha22@gmail.com', 'ea48a80d94bfc6272ed0899e7af0facd', NULL, 'active', '2020-01-29 04:41:28', 0, '2020-01-29 04:41:31', 0, 'Developer', 0, NULL, 'House no - 1055/1056, East Shewrapara, Mirpur, Dhaka. ', '', '+8801689853236', '', '1996-05-22', '', 'female', NULL, '', 1, 1, '2020-01-28 20:09:48', NULL, '2020-01-29 05:02:43', 0),
(158, 'test', 'test', 'staff', 0, 0, 'staff@test.com', '16d7a4fca7442dda3ad93c9a726597e4', NULL, 'active', NULL, 0, NULL, 0, 'Untitled', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, 1, 1, NULL, '2020-04-22', NULL, 0),
(159, 'test', 'test', 'client', 0, 0, 'client@test.com', '16d7a4fca7442dda3ad93c9a726597e4', NULL, 'active', NULL, 0, NULL, 0, 'Untitled', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, 1, 1, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_request`
--
ALTER TABLE `client_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type` (`user_type`),
  ADD KEY `email` (`email`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `deleted` (`deleted`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `client_request`
--
ALTER TABLE `client_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
