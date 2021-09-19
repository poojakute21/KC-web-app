-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 02:55 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khaana-chahiye`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulk_request_details`
--

CREATE TABLE `bulk_request_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `channel_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_people` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_duplicated` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `channel_types`
--

CREATE TABLE `channel_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channel_types`
--

INSERT INTO `channel_types` (`id`, `name`, `status`) VALUES
(1, 'WHATSAPP', 'Y'),
(2, 'GOOGLE FORM', 'Y'),
(3, 'NATIVE FORM', 'Y'),
(4, 'ADMIN PANEL', 'Y'),
(6, 'Test123', 'Y'),
(7, 'test', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `name`, `status`) VALUES
(1, 'AADHAR', 'Y'),
(2, 'PAN', 'Y'),
(3, 'VOTER_ID', 'Y'),
(4, 'DRIVING_LICENSE', 'Y'),
(5, 'LIGHTBILL', 'Y'),
(6, 'Test-doc3', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `request_delivery_details`
--

CREATE TABLE `request_delivery_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `request_status_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `approve_people_count` mediumint(9) NOT NULL,
  `verification_status` enum('Y','P','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'P',
  `scheduling_status` enum('P','Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'P',
  `scheduling_remark` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_pickup_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_scheduled_on` date NOT NULL,
  `delivered_to` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivered_to_contact` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivered_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivered_by_contact` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_status` enum('P','Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivered_on` timestamp NULL DEFAULT NULL,
  `delivery_remark` int(11) NOT NULL,
  `last_updated_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_delivery_details`
--

INSERT INTO `request_delivery_details` (`id`, `request_id`, `request_status_id`, `user_id`, `approve_people_count`, `verification_status`, `scheduling_status`, `scheduling_remark`, `delivery_pickup_point`, `delivery_scheduled_on`, `delivered_to`, `delivery_location`, `delivered_to_contact`, `delivered_by`, `delivered_by_contact`, `delivery_status`, `delivered_on`, `delivery_remark`, `last_updated_on`) VALUES
(1, 11, 9, 0, 1, 'P', 'P', 'Test', 'Thane', '2021-09-18', 'ABhsihek', 'Mumbai', '7858965896', 'Pooja', '78596589658', 'P', '2021-09-23 18:30:00', 0, '0000-00-00 00:00:00'),
(3, 1, 4, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(4, 3, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(5, 4, 9, 0, 2, 'P', 'P', '', 'Thane', '2021-09-30', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(6, 5, 4, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(7, 6, 4, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(8, 7, 4, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(9, 8, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(10, 9, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(11, 10, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(12, 11, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(13, 12, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(14, 13, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(15, 14, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(16, 15, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(17, 16, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(18, 17, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(19, 18, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(20, 19, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(21, 20, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(22, 21, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(23, 22, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(24, 23, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(25, 24, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(26, 25, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(27, 26, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(28, 27, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(29, 28, 11, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(30, 29, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(31, 30, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(32, 31, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(33, 32, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(34, 33, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(35, 34, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(36, 35, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(37, 36, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(38, 37, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(39, 38, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(40, 39, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(41, 40, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(42, 41, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(43, 42, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(44, 43, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(45, 44, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(46, 45, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(47, 46, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(48, 47, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(49, 48, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(50, 49, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(51, 50, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', '0000-00-00 00:00:00', 0, NULL),
(52, 51, 5, 0, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(54, 52, 5, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(55, 53, 5, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(56, 54, 5, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(57, 55, 5, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(58, 56, 11, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(59, 57, 11, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(60, 58, 11, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(61, 59, 11, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(62, 60, 11, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(63, 61, 11, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(64, 63, 11, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(65, 64, 11, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(66, 65, 11, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(67, 66, 11, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(68, 67, 11, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(69, 68, 11, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(70, 69, 11, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(71, 70, 11, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL),
(72, 71, 11, 1, 0, 'P', 'P', '', '', '0000-00-00', '', '', '', '', '', 'P', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_details`
--

CREATE TABLE `request_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `channel_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_people` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_beneficiary` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `aid_form` bigint(20) UNSIGNED NOT NULL,
  `request_type` enum('bulk','single') COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_duplicated` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_details`
--

INSERT INTO `request_details` (`id`, `document_id`, `channel_id`, `name`, `address`, `contact_no`, `document_no`, `email`, `gender`, `no_of_people`, `is_beneficiary`, `aid_form`, `request_type`, `latitude`, `longitude`, `remark`, `is_duplicated`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Abhishek Uday Kute', '12 24 Padwal Nagar Thane-400604', '7575757575', '7585 8585 8585', 'poojakute21@gmail.com', '', '2', 'N', 2, 'single', 'latitude', 'longitude', 'remark', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, 'Nitin Tendolkar', '', '9503572922', '1234 1234 1234', 'No', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 2, 'Hasnain', '', '7977128379', '7585 8585 8585', 'saqlainshiledar786@gmail.com', '', '3', 'Y', 2, 'single', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 2, 'Nabem khan', '', '8828522309', '4545 4545 4545', 'Govandi', '', '5', 'Y', 1, 'single', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 2, 'Shehnaz Syed', '', '7718933030', 'ABCD1245G', '??????', '', '1', 'Y', 2, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 2, 'Rashida bano', '', '8655527738', '4545 4545 4545', 'Mankhudh', '', '2', 'Y', 1, 'single', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 2, 'Heena Sheikh', '', '8591474398', '', '??????', '', '2', 'Y', 1, 'single', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 2, 'Rajesh Mishra', '', '9004575657', '', 'susantsingh557@gmail.com', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 0, 2, 'Hajra', '', '9321753174', '', 'salimacoatwala@gmail.com', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 2, 'Shabnam', '', '7304791158', '', 'amcoatwala786@gmail.com', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 2, 'Ravindra Shedekar', '', '9820489640', '', 'ravishedekar@gmail.com', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 2, 'Ravindra Shedekar', '', '9820489640', '', 'ravishedekar@gmail.com', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 2, 'Lata Ghodvinde', '', '8080832196', '', 'avghodvinde1991@gmail.com', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 2, 'Jhon Subesing Kagda', '', '7378907993', '', 's', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 2, 'Sayyedistihkar ahmad', '', '9821260759', '', 'Gowandi', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 1, 2, 'Priyanka madan kuril', '', '8169527947', '', 'susantsingh557@gmail.com', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 2, 'Mohammed Rafiq Khan', '', '8928475655', '', 'Govandi', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 1, 2, 'Siddiqe basha sayad', '', '9594479419', '', 'Govandi', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 1, 2, 'Siddiqe basha sayyad', '', '9594479419', '', 'Govnbi', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 3, 2, 'Wavell Dsouza', '', '8450939900', '', 'No', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 3, 2, 'Laxman Datta Jadhav', '', '9920323049', '', 'laxmanchujadhav@gmail.com', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 3, 2, '????? ???? ???', '', '9152334021', '', 'Govandi', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 3, 2, 'Rafiq shabina', '', '9372789475', '', 'Govandi', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 3, 2, 'Firdous Shaikh', '', '9136875242', '', 'Govandi', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 3, 2, 'Aasiya ansair', '', '9619455938', '', '?????', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 3, 2, 'Taranumm firoz khan', '', '9619990013', '', 'Govandi', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 3, 2, 'nilam pilankar', '', '8692933286', '', 'nilamp25@gmail.com', '', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 3, 2, 'Melroy Fernandes', '', '9920557416', '', 'Melroyfernandes3@gmail.com', '', '30', 'Y', 1, 'bulk', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 3, 2, 'Pooja Mishra', '', '9967993107', '', 'mahendra090979@gmail.com', '', '40', 'Y', 1, 'bulk', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 3, 2, 'Vanita Raju Pawar', '', '9076379903', '', 'suchitashetye75@gmail.com', '', '50', 'Y', 1, 'bulk', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 3, 2, 'Santhoshi Keshav Rakte', '', '7039150993', '', 'suchitashetye75@gmail.com', '', '60', 'Y', 1, 'bulk', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 3, 2, 'Shalan Sundam Kamble', '', '9156879923', '', 'suchitashetye75@gmail.com', '', '25', 'Y', 1, 'bulk', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 3, 2, 'Laxmi Narayan Gavade', '', '8828279992', '', 'suchitashetye75@gmail.com', '', '10', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 2, 2, 'Krushna Digambar Kambli', '', '9769720282', '', 'suchitashetye75@gmail.com', '', '15', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 2, 2, 'Prashant Vijay Narakar', '', '8928494562', '', 'suchitashetye75@gmail.com', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 2, 2, 'Deepak Sharad Torsakar', '', '9920565281', '', 'suchitashetye75@gmail.com', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 2, 2, 'Balu chavhan', '', '8108783265', '', 'suchitashetye75@gmail.com', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 2, 2, 'Anjana Gulab Nivangune', '', '9867043494', '', 'suchitashetye75@gmail.com', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 2, 2, 'Sakshi Sanjay Rane', '', '9769610185', '', 'suchitashetye75@gmail.com', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 2, 2, 'Shankar Rathod', '', '9967362050', '', 'Govindchavan208@mail.com', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 2, 2, 'Kumar pawar', '', '9987786440', '', 'Govindchavan208@mail.com', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 2, 2, 'Suman Prajapati', '', '9819952085', '', 'Sumanprajpati@gmail.com', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 2, 2, 'Dinesh Prajapati', '', '8779910135', '', 'nageshprajapati1216@gmail.com', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 2, 2, 'Chanulal Prajapati', '', '8268285850', '', 'Savita.prajapati1507@gmail.com', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 2, 2, 'Sunita das', '', '8652151728', '', 'sd7715410@gmail.com', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 2, 2, 'Narbadi nikum', '', '9594695789', '', 'Kalwa', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 2, 2, 'Manish nikum', '', '9967158730', '', 'vijaynikum34@gmail.com', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 2, 2, 'Vikas Kumar Srivastava', '', '9807901867', '', 'aryamedical6@gmail.com', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 2, 2, 'Gayasuddin Ansari', '', '9769245529', '', 'gayasuddin.ansari9769@gmail.com', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 2, 2, 'Sunil manu pawar', '', '9309781433', '', 'sunilpawar5296@gmail.com', '', '6', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 1, 4, 'Pooja Uday Kute', 'wagle estate thane 400601', '8989898989', '1452 2563 2563', 'poojakute21@gmail.com', 'M', '8', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', NULL),
(52, 1, 4, 'Pooja Uday Kute', 'Wagle estate Thane 400604', '8785965896', '2563 2563 3636', 'poojakute21@gmail.com', 'M', '8', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', NULL),
(53, 1, 4, 'Pooja Kute', 'Thane 400604', '8785968596', '1212 1212 1212', 'test@gmail.com', 'M', '2', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', NULL),
(54, 1, 4, 'Pooja Kute', 'Thane 400604', '4526235232', '1213 1212 1212', 'test@gmail.com', 'M', '25', 'Y', 2, 'bulk', '', '', '', 'N', '0000-00-00 00:00:00', NULL),
(55, 1, 4, 'Pooja Kute', 'Thane 400604', '7859659659', '1214 1212 1212', 'test@gmail.com', 'M', '3', 'Y', 1, 'single', '', '', '', 'N', '0000-00-00 00:00:00', NULL),
(56, 1, 4, 'Pooja Kute', 'Thane 400604', '8785968596', '1212 1212 1212', 'test@gmail.com', 'M', '2', 'Y', 1, 'single', '', '', '', 'Y', '0000-00-00 00:00:00', NULL),
(57, 1, 4, 'Pooja Kute', 'Thane 400604', '4526235232', '1213 1212 1212', 'test@gmail.com', 'M', '25', 'Y', 2, 'bulk', '', '', '', 'Y', '0000-00-00 00:00:00', NULL),
(58, 1, 4, 'Pooja Kute', 'Thane 400604', '7859659659', '1214 1212 1212', 'test@gmail.com', 'M', '3', 'Y', 1, 'single', '', '', '', 'Y', '0000-00-00 00:00:00', NULL),
(59, 1, 4, 'Pooja Kute', 'Thane 400604', '8785968596', '1212 1212 1212', 'test@gmail.com', 'M', '2', 'Y', 1, 'single', '', '', '', 'Y', '0000-00-00 00:00:00', NULL),
(60, 1, 4, 'Pooja Kute', 'Thane 400604', '4526235232', '1213 1212 1212', 'test@gmail.com', 'M', '25', 'Y', 2, 'bulk', '', '', '', 'Y', '0000-00-00 00:00:00', NULL),
(61, 1, 4, 'Pooja Kute', 'Thane 400604', '7859659659', '1214 1212 1212', 'test@gmail.com', 'M', '3', 'Y', 1, 'single', '', '', '', 'Y', '0000-00-00 00:00:00', NULL),
(63, 1, 4, 'Pooja Kute', 'Thane 400604', '8785968596', '1212 1212 1212', 'test@gmail.com', 'M', '2', 'Y', 1, 'single', '', '', '', 'Y', '0000-00-00 00:00:00', NULL),
(64, 1, 4, 'Pooja Kute', 'Thane 400604', '4526235232', '1213 1212 1212', 'test@gmail.com', 'M', '25', 'Y', 2, 'bulk', '', '', '', 'Y', '0000-00-00 00:00:00', NULL),
(65, 1, 4, 'Pooja Kute', 'Thane 400604', '7859659659', '1214 1212 1212', 'test@gmail.com', 'M', '3', 'Y', 1, 'single', '', '', '', 'Y', '0000-00-00 00:00:00', NULL),
(66, 1, 4, 'Pooja Kute', 'Thane 400604', '8785968596', '1212 1212 1212', 'test@gmail.com', 'M', '2', 'Y', 1, 'single', '', '', '', 'Y', '0000-00-00 00:00:00', NULL),
(67, 1, 4, 'Pooja Kute', 'Thane 400604', '4526235232', '1213 1212 1212', 'test@gmail.com', 'M', '25', 'Y', 2, 'bulk', '', '', '', 'Y', '0000-00-00 00:00:00', NULL),
(68, 1, 4, 'Pooja Kute', 'Thane 400604', '7859659659', '1214 1212 1212', 'test@gmail.com', 'M', '3', 'Y', 1, 'single', '', '', '', 'Y', '0000-00-00 00:00:00', NULL),
(69, 1, 4, 'Pooja Kute', 'Thane 400604', '8785968596', '1212 1212 1212', 'test@gmail.com', 'M', '2', 'Y', 1, 'single', '', '', '', 'Y', '0000-00-00 00:00:00', NULL),
(70, 1, 4, 'Pooja Kute', 'Thane 400604', '4526235232', '1213 1212 1212', 'test@gmail.com', 'M', '25', 'Y', 2, 'bulk', '', '', '', 'Y', '0000-00-00 00:00:00', NULL),
(71, 1, 4, 'Pooja Kute', 'Thane 400604', '7859659659', '1214 1212 1212', 'test@gmail.com', 'M', '3', 'Y', 1, 'single', '', '', '', 'Y', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_progress_statuses`
--

CREATE TABLE `request_progress_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_progress_statuses`
--

INSERT INTO `request_progress_statuses` (`id`, `name`, `progress`) VALUES
(1, 'REQUEST_FORM_FILL_IN_PROGRESS', 'Y'),
(2, 'REQUEST_FORM_SUBMITTED', 'Y'),
(3, 'VERIFICATION_IN_PROGRESS', 'Y'),
(4, 'VERIFICATION_COMPLETED', 'Y'),
(5, 'SCHEDULING_IN_PROGRESS', 'Y'),
(6, 'SCHEDULING_COMPLETED', 'Y'),
(7, 'DELIVERY_IN_PROGRESS', 'Y'),
(8, 'DELIVERY_COMPLETED', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `request_statuses`
--

CREATE TABLE `request_statuses` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `used_in` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_statuses`
--

INSERT INTO `request_statuses` (`id`, `name`, `used_in`, `status`) VALUES
(1, 'DELIVERY PROCESSING', 'DEL_FORM', 'Y'),
(2, 'REJECTED', 'VERIF_FORM', 'Y'),
(3, 'ACCEPTED', 'DUP_FORM', 'Y'),
(4, 'VERIFICATION COMPLETED', 'VERIF_FORM', 'Y'),
(5, 'PENDING', 'VERIF_FORM', 'Y'),
(6, 'FRAUD', 'VERIF_FORM', 'Y'),
(7, 'INSUFFICIENT_DATA', 'VERIF_FORM', 'Y'),
(8, 'SCHEDULING PENDING', 'SCHED_FORM', 'Y'),
(9, 'SCHEDULING COMPLETED', 'SCHED_FORM', 'Y'),
(10, 'CLOSED', 'DEL_FORM', 'Y'),
(11, 'DUPLICATED', 'DUP_FORM', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `request_types`
--

CREATE TABLE `request_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_types`
--

INSERT INTO `request_types` (`id`, `name`, `status`) VALUES
(1, 'GROCERY KITS', 'Y'),
(2, 'COOKED MEALS', 'Y'),
(3, 'HEALTH SUPPLIERTS(Masks, Sanitizers)', 'Y'),
(4, 'Test-type2', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`) VALUES
(1, 'OPS_ASSOCIATE', 'Y'),
(2, 'OPS_ADMIN', 'Y'),
(3, 'PLATFORM_ADMIN', 'Y'),
(4, 'SUPER_ADMIN', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `added_by`, `name`, `email`, `email_verified_at`, `password`, `contact_no`, `address`, `date_of_birth`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, 'pooja kute', 'poojakute21@gmail.com', NULL, 'e4c4c79bdd5bdc35bd893a7720ab504c', NULL, NULL, NULL, 'Y', NULL, '2021-08-20 13:07:34', '2021-08-20 13:07:34'),
(2, 1, 1, 'Test', 'test@gmail.com', NULL, '$2y$10$4wpIBEWVM58vl9Q9Be1vmeGQo4zlIiRbKWLSAMJxeGiVzCkObRlcG', '89896859685', 'Test', '2021-08-26', 'Y', NULL, '2021-08-26 10:56:28', '2021-08-26 10:56:28'),
(7, 2, 1, 'Test', 'test12@gmail.com', NULL, '$2y$10$MS7F249SiJIsh/7.s0sD5effb426KCz.O8g.OQ49i2eYCv4Exvid2', '8787878787', 'Test, 123', '2021-08-07', 'Y', NULL, '2021-08-26 10:58:50', '2021-08-27 03:19:19'),
(8, 2, 1, 'pooja', 'pooja21@gmail.com', NULL, '$2y$10$NlVYgp9IVjpWotEn.6CT7eMf5T/NqZj.SROnG4HcqsTGJWdxY6BTK', '87878589659', 'test 123445', '2021-08-06', 'Y', NULL, '2021-08-26 11:01:30', '2021-08-26 11:01:30'),
(9, 3, 1, 'abhishek', 'abhishek@123', NULL, '$2y$10$Q7Tv/KHd.s4M7.j0MS3CPO6k8ONircnQR1tJkDjELyd/CTA0ttGIu', '7858968596', 'abhishek@123', '2021-08-08', 'N', NULL, '2021-08-26 11:21:22', '2021-08-27 03:19:08'),
(10, 4, 1, 'pooja', 'pooja.kute@gmail.com', NULL, '$2y$10$N5wrV1VNzOfzCrNZq4GD5e4Ru4OczE0UedTP.giK1W0xmGIh/iQgW', '8778558961', 'test@67890pp', '2021-08-08', 'Y', NULL, '2021-08-26 11:31:27', '2021-08-26 11:31:27'),
(11, 7, 1, 'Supriya', 'Supriya@gmail.com', NULL, '$2y$10$qtM7igbxgGgchJEIMLG...05Xin1t1k2HcIRjiBZ6ApDE11ofopby', '4526362536', 'Test 123', '1593-02-21', 'Y', NULL, '2021-09-14 11:36:40', '2021-09-14 11:36:40'),
(12, 1, 0, 'Abhishek Kute', 'abhishek25@gmail.com', NULL, '2e60e42598a808e665cab041ec917dc9', '88796985692', 'Test', '0000-00-00', 'Y', NULL, '0000-00-00 00:00:00', NULL),
(13, 2, 4, 'Pooja Uday Kute', 'pooja211094kute@gmail.com', NULL, '2e60e42598a808e665cab041ec917dc9', '9896989658', 'Test-12245-test 12563', '2021-09-16', 'N', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 4, 'pooja', 'poojakute', NULL, '2e60e42598a808e665cab041ec917dc9', '89258965896589558', 'Test', '2021-09-09', 'Y', NULL, '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulk_request_details`
--
ALTER TABLE `bulk_request_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_details_document_id_foreign` (`document_id`),
  ADD KEY `request_details_channel_id_foreign` (`channel_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `channel_types`
--
ALTER TABLE `channel_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_delivery_details`
--
ALTER TABLE `request_delivery_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_delivery_details_request_id_foreign` (`request_id`),
  ADD KEY `request_delivery_details_request_status_id_foreign` (`request_status_id`),
  ADD KEY `request_delivery_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `request_details`
--
ALTER TABLE `request_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_details_document_id_foreign` (`document_id`),
  ADD KEY `request_details_channel_id_foreign` (`channel_id`),
  ADD KEY `aid_form` (`aid_form`);

--
-- Indexes for table `request_progress_statuses`
--
ALTER TABLE `request_progress_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_statuses`
--
ALTER TABLE `request_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_types`
--
ALTER TABLE `request_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_added_by_foreign` (`added_by`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulk_request_details`
--
ALTER TABLE `bulk_request_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `channel_types`
--
ALTER TABLE `channel_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `request_delivery_details`
--
ALTER TABLE `request_delivery_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `request_details`
--
ALTER TABLE `request_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `request_progress_statuses`
--
ALTER TABLE `request_progress_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `request_statuses`
--
ALTER TABLE `request_statuses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `request_types`
--
ALTER TABLE `request_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bulk_request_details`
--
ALTER TABLE `bulk_request_details`
  ADD CONSTRAINT `request_id` FOREIGN KEY (`request_id`) REFERENCES `request_details` (`id`);

--
-- Constraints for table `request_details`
--
ALTER TABLE `request_details`
  ADD CONSTRAINT `request_details_ibfk_1` FOREIGN KEY (`aid_form`) REFERENCES `request_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
