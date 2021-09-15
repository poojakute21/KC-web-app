-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2021 at 08:33 AM
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
(2, 'GOOGLE_FORM', 'Y'),
(3, 'NATIVE_FORM', 'Y'),
(4, 'ADMIN_PANEL', 'Y'),
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
(1, 'AADHAR', 'N'),
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
  `remark` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_pickup_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_scheduled_on` date NOT NULL,
  `delivered_to` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivered_to_contact` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivered_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivered_by_contact` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivered_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_details`
--

CREATE TABLE `request_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `channel_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_people` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_beneficiary` tinyint(1) NOT NULL,
  `aid_form` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_type` enum('bulk','single') COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_statuses`
--

INSERT INTO `request_statuses` (`id`, `name`, `status`) VALUES
(1, 'PROCESSING', 'Y'),
(2, 'REJECTED', 'Y'),
(3, 'ACCEPTED', 'Y'),
(4, 'COMPLETED', 'Y'),
(5, 'PENDING', 'Y'),
(6, 'FRAUD', 'Y'),
(7, 'INSUFFICIENT_DATA', 'Y'),
(8, 'CLOSED', 'Y'),
(9, 'PROCESSING', 'N'),
(10, 'REJECTED', 'N'),
(11, 'PROCESSINGs', 'Y'),
(12, 'PROCESSING', 'Y'),
(13, 'REJECTED', 'Y'),
(14, 'test', 'Y'),
(15, 'Test-req3', 'N'),
(16, 'Test-req1', 'Y');

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
(4, 'SUPER_ADMIN', 'Y'),
(5, 'OPS_ASSOCIATE', 'Y'),
(6, 'OPS_ASSOCIATE', 'N'),
(7, 'OPS_ADMIN', 'N'),
(8, 'OPS_ADMIN', 'N'),
(9, 'OPS_ADMIN', 'Y'),
(10, 'PLATFORM_ADMIN', 'N'),
(11, 'PLATFORM_ADMIN', 'N'),
(12, 'PLATFORM_ADMIN', 'N'),
(13, 'OPS_ADMIN', 'N'),
(14, 'OPS_ADMIN', 'N'),
(15, 'OPS_ASSOCIATE', 'N'),
(16, 'OPS_ADMIN', 'Y'),
(17, 'OPS_ASSOCIATE', 'N'),
(18, 'OPS_ASSOCIATE', 'N'),
(19, 'PLATFORM_ADMIN', 'Y'),
(20, 'OPS_ADMIN', 'N'),
(21, 'Test-role2', 'N');

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
(11, 7, 1, 'Supriya', 'Supriya@gmail.com', NULL, '$2y$10$qtM7igbxgGgchJEIMLG...05Xin1t1k2HcIRjiBZ6ApDE11ofopby', '4526362536', 'Test 123', '1593-02-21', 'Y', NULL, '2021-09-14 11:36:40', '2021-09-14 11:36:40');

--
-- Indexes for dumped tables
--

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
  ADD KEY `request_details_channel_id_foreign` (`channel_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_details`
--
ALTER TABLE `request_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_progress_statuses`
--
ALTER TABLE `request_progress_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `request_statuses`
--
ALTER TABLE `request_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
