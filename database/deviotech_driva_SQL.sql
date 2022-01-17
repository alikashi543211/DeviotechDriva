-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 07:29 AM
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
-- Database: `deviotech_driva`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertising_transactions`
--

CREATE TABLE `advertising_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `garage_profile_id` bigint(20) UNSIGNED NOT NULL,
  `garage_advertising_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertising_transactions`
--

INSERT INTO `advertising_transactions` (`id`, `garage_profile_id`, `garage_advertising_id`, `payment_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 'PAYID-MAFMHGA8TV14590MG198494K', 2500.00, 'approved', '2021-01-22 07:23:13', '2021-01-22 07:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consumer_vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `consumer_profile_id` bigint(20) UNSIGNED NOT NULL,
  `garage_profile_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('cancel','pending','inspection','complete','in_progress') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `completion_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspection_mileag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspection_quotation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspection_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `progress_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extend_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension_status` enum('null','pending','accepted','declined') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decline_reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `consumer_vehicle_id`, `consumer_profile_id`, `garage_profile_id`, `description`, `price`, `status`, `created_at`, `updated_at`, `completion_time`, `inspection_mileag`, `inspection_quotation`, `inspection_description`, `progress_description`, `extend_date`, `extension_status`, `decline_reason`, `cancelled_date`, `completed_date`) VALUES
(1, 2, 1, 1, 'Please Book', '150', 'complete', '2020-09-21 06:39:26', '2020-09-21 06:45:42', '2020-10-01', '1200', '150', '<div>Something about the inspection.</div><div><b>Here are some pics</b></div>', '<div>This is some progress of garage boooking</div>', '2020-10-01', 'accepted', '', '', '2020-09-21 11:45:42'),
(2, 4, 5, 4, 'I want services from your garage. I want services from your garage. I want services from your garage. I want services from your garage. I want services from your garage. I want services from your garage. I want services from your garage. I want services from your garage. I want services from your garage.', '200', 'inspection', '2021-02-17 06:32:43', '2021-03-02 06:45:03', '2021-03-21', '10', '200', '<span style=\"letter-spacing: 0.14px;\">In progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">In progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">In progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">In progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">In progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">In progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">In progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">In progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">In progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">In progress description&nbsp;</span><br>', '<span style=\"letter-spacing: 0.14px;\">in progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">in progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">in progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">in progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">in progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">in progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">in progress description&nbsp;</span><span style=\"letter-spacing: 0.14px;\">in progress description&nbsp;</span><br>', NULL, NULL, NULL, NULL, '2021-03-02 11:45:03'),
(3, 5, 5, 1, 'I want services from your company..', '80', 'complete', '2020-11-10 07:49:35', '2021-03-05 06:37:54', '2021-03-29', '10', '80', '<span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><br>', '<span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><br>', '2021-03-05', 'pending', NULL, '2021-03-05 11:15:07', '2021-03-05 11:37:54'),
(4, 5, 5, 1, 'I want services from your company..', '80', 'complete', '2021-03-02 08:04:04', '2021-03-05 06:37:54', '2021-03-29', '10', '80', '<span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><span style=\"letter-spacing: 0.14px;\">Inspection description.&nbsp;</span><br>', '<span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><span style=\"letter-spacing: 0.14px;\">progress description here..&nbsp;</span><br>', '2021-03-05', 'pending', NULL, '2021-03-05 11:15:07', '2021-03-05 11:37:54'),
(5, 5, 5, 2, 'lkskjflksjdlfjsld', '0', 'complete', '2021-03-19 02:01:55', '2021-03-19 02:01:55', '2021-03-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_images`
--

CREATE TABLE `booking_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `booking_step` enum('inspection','in_progress') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_images`
--

INSERT INTO `booking_images` (`id`, `image`, `created_at`, `updated_at`, `booking_id`, `booking_step`) VALUES
(1, 'inspection-galleries/19039352701/1600688495-banner-23.jpg', '2020-09-21 06:41:35', '2020-09-21 06:41:35', 1, 'inspection'),
(2, 'inspection-galleries/10778025771/1600688495-banner-24.jpg', '2020-09-21 06:41:35', '2020-09-21 06:41:35', 1, 'inspection'),
(3, 'inspection-galleries/17172268891/1600688495-banner-25.jpg', '2020-09-21 06:41:35', '2020-09-21 06:41:35', 1, 'inspection'),
(4, 'in_progress-galleries/3959885371/1600688602-banner-37.jpg', '2020-09-21 06:43:22', '2020-09-21 06:43:22', 1, 'in_progress'),
(5, 'in_progress-galleries/7713476471/1600688602-banner-38.jpg', '2020-09-21 06:43:22', '2020-09-21 06:43:22', 1, 'in_progress'),
(6, 'in_progress-galleries/15235093621/1600688602-banner-39.jpg', '2020-09-21 06:43:22', '2020-09-21 06:43:22', 1, 'in_progress'),
(7, 'inspection-galleries/6626930982/1614685423-download-(1).jpg', '2021-03-02 06:43:43', '2021-03-02 06:43:43', 2, 'inspection'),
(8, 'inspection-galleries/20966957452/1614685423-download-(2).jpg', '2021-03-02 06:43:43', '2021-03-02 06:43:43', 2, 'inspection'),
(9, 'inspection-galleries/21189741702/1614685423-download-(3).jpg', '2021-03-02 06:43:43', '2021-03-02 06:43:43', 2, 'inspection'),
(10, 'inspection-galleries/11634613612/1614685423-download-(5).jpg', '2021-03-02 06:43:43', '2021-03-02 06:43:43', 2, 'inspection'),
(11, 'inspection-galleries/17091741252/1614685423-download.jpg', '2021-03-02 06:43:43', '2021-03-02 06:43:43', 2, 'inspection'),
(12, 'in_progress-galleries/9602030562/1614685469-download-(1).jpg', '2021-03-02 06:44:29', '2021-03-02 06:44:29', 2, 'in_progress'),
(13, 'in_progress-galleries/15982801362/1614685469-download-(2).jpg', '2021-03-02 06:44:29', '2021-03-02 06:44:29', 2, 'in_progress'),
(14, 'in_progress-galleries/13826107202/1614685469-download-(3).jpg', '2021-03-02 06:44:29', '2021-03-02 06:44:29', 2, 'in_progress'),
(15, 'in_progress-galleries/12848131282/1614685469-download.jpg', '2021-03-02 06:44:29', '2021-03-02 06:44:29', 2, 'in_progress'),
(16, 'inspection-galleries/3278866843/1614943676-download-(1).jpg', '2021-03-05 06:27:56', '2021-03-05 06:27:56', 3, 'inspection'),
(17, 'inspection-galleries/19854787613/1614943676-download-(2).jpg', '2021-03-05 06:27:56', '2021-03-05 06:27:56', 3, 'inspection'),
(18, 'inspection-galleries/19582512833/1614943676-download-(3).jpg', '2021-03-05 06:27:56', '2021-03-05 06:27:56', 3, 'inspection'),
(19, 'inspection-galleries/1509211393/1614943676-download-(4).jpg', '2021-03-05 06:27:56', '2021-03-05 06:27:56', 3, 'inspection'),
(20, 'inspection-galleries/2748279743/1614943676-download-(5).jpg', '2021-03-05 06:27:56', '2021-03-05 06:27:56', 3, 'inspection'),
(21, 'inspection-galleries/11192950113/1614943676-download.jpg', '2021-03-05 06:27:56', '2021-03-05 06:27:56', 3, 'inspection'),
(22, 'in_progress-galleries/710367723/1614944106-download-(1).jpg', '2021-03-05 06:35:06', '2021-03-05 06:35:06', 3, 'in_progress'),
(23, 'in_progress-galleries/8694395753/1614944106-download-(2).jpg', '2021-03-05 06:35:06', '2021-03-05 06:35:06', 3, 'in_progress'),
(24, 'in_progress-galleries/16127649323/1614944106-download-(3).jpg', '2021-03-05 06:35:06', '2021-03-05 06:35:06', 3, 'in_progress'),
(25, 'in_progress-galleries/3682460553/1614944106-download-(5).jpg', '2021-03-05 06:35:06', '2021-03-05 06:35:06', 3, 'in_progress'),
(26, 'in_progress-galleries/28830303/1614944106-download.jpg', '2021-03-05 06:35:06', '2021-03-05 06:35:06', 3, 'in_progress');

-- --------------------------------------------------------

--
-- Table structure for table `booking_services`
--

CREATE TABLE `booking_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_services`
--

INSERT INTO `booking_services` (`id`, `booking_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-09-21 06:39:26', '2020-09-21 06:39:26'),
(2, 1, 2, '2020-09-21 06:39:26', '2020-09-21 06:39:26'),
(3, 1, 3, '2020-09-21 06:39:26', '2020-09-21 06:39:26'),
(4, 2, 1, '2021-03-02 06:32:43', '2021-03-02 06:32:43'),
(5, 2, 2, '2021-03-02 06:32:43', '2021-03-02 06:32:43'),
(6, 2, 3, '2021-03-02 06:32:43', '2021-03-02 06:32:43'),
(7, 3, 1, '2021-03-05 06:09:17', '2021-03-05 06:09:17'),
(8, 5, 3, '2021-03-19 02:01:55', '2021-03-19 02:01:55'),
(9, 5, 4, '2021-03-19 02:01:55', '2021-03-19 02:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consumer_profiles`
--

CREATE TABLE `consumer_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_long` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uk_postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `available_status` enum('available','away') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consumer_profiles`
--

INSERT INTO `consumer_profiles` (`id`, `user_id`, `display_name`, `address`, `address_lat`, `address_long`, `uk_postcode`, `contact_number`, `picture`, `created_at`, `updated_at`, `available_status`) VALUES
(1, 2, 'mirzafuzail773', 'M A, 46 Cobden House, Cobden Street, LEICESTER, LE1 2LB, UNITED KINGDOM', '52.641', '-1.1168', NULL, NULL, NULL, '2020-09-21 01:32:52', '2020-09-21 01:33:23', 'available'),
(2, 7, 'shahzadahmad420', NULL, NULL, NULL, NULL, NULL, 'consumer_profile-pictures/shahzad-ahmad/1604554895-consumer.png', '2020-10-24 01:35:04', '2020-11-05 00:42:41', 'available'),
(3, 8, 'kashifali957', NULL, NULL, NULL, NULL, NULL, 'consumer_profile-pictures/kashif-ali/1603970304-87ea30af8b657b290c1bebded4b290ee.jpg', '2020-10-29 06:10:22', '2020-10-29 07:06:20', 'available'),
(4, 11, 'testingconsumer766', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-02 00:15:48', '2021-02-02 00:15:48', 'available'),
(5, 12, 'kashifali671', NULL, NULL, NULL, NULL, NULL, 'consumer_profile-pictures/kashif-ali/1614943341-consumer.png', '2021-02-22 05:24:15', '2021-04-08 04:15:50', 'away'),
(6, 17, 'testredirection174', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-08 07:46:42', '2021-04-08 07:46:42', 'available'),
(7, 18, 'testredirection283', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-08 07:50:39', '2021-04-08 07:50:39', 'available'),
(8, 19, 'testredirection283', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-08 07:51:32', '2021-04-08 07:51:32', 'available'),
(9, 21, 'testtest143', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-27 03:00:44', '2021-04-27 03:00:44', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `consumer_vehicles`
--

CREATE TABLE `consumer_vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consumer_profile_id` bigint(20) UNSIGNED NOT NULL,
  `vrm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `make` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colour` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consumer_vehicles`
--

INSERT INTO `consumer_vehicles` (`id`, `consumer_profile_id`, `vrm`, `make`, `model`, `engine_size`, `body_type`, `colour`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'ABC123', 'FORD', 'FIESTA DIESEL SVP', '1753', 'HATCHBACK', NULL, 'https://cdn2.vdicheck.com/VehicleImages/Image.ashx?Id=E32DB51D-5917-44B3-A019-34D51C2734EF', '2020-09-21 01:33:36', '2020-09-21 01:33:36'),
(2, 1, 'ABD123', 'TOYOTA', 'YARIS T SPIRIT AUTO', '1299', 'HATCHBACK', NULL, 'https://cdn2.vdicheck.com/VehicleImages/Image.ashx?Id=C58AC267-DFE9-46EB-991C-AB8A64C10972', '2020-09-21 01:34:07', '2020-09-21 01:34:07'),
(3, 1, 'ABD234', 'SCOTT', 'UNKNOWN', '596', NULL, NULL, 'https://cdn2.vdicheck.com/VehicleImages/Image.ashx?Id=67E0406D-540E-4355-8BC4-2C5DFA6692F9', '2020-09-21 07:18:31', '2020-09-21 07:18:31'),
(4, 5, 'AFC123', 'ROLLS-ROYCE', 'OTHER', '4566', NULL, 'WHITE', 'consumer-vehicle-images/kashif-ali-AFC123-ROLLS-ROYCE.jpg', '2021-03-02 06:32:11', '2021-03-02 06:32:11'),
(5, 5, 'AB12', 'MERCEDES-BENZ', 'A 220 AMG LINE PREMIUM +', '1991', 'HATCHBACK', 'WHITE', 'consumer-vehicle-images/kashif-ali-AB12-MERCEDES-BENZ.jpg', '2021-03-05 05:52:56', '2021-03-05 05:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `customer_facilities`
--

CREATE TABLE `customer_facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_facilities`
--

INSERT INTO `customer_facilities` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Waiting Area', 'customer_facility-images/1598005226-waiting_area.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04'),
(2, 'Viewing Area', 'customer_facility-images/1598005234-viewing_area.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04'),
(3, 'WiFi', 'customer_facility-images/1598005242-wifi.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04'),
(4, 'Restrooms', 'customer_facility-images/1598005249-restrooms.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04'),
(5, 'Refreshments', 'customer_facility-images/1598005323-refreshments.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `garage_profile_id` bigint(20) UNSIGNED NOT NULL,
  `services` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','expired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `garage_profile_id`, `services`, `message`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, '1,2', 'Hey Fellas, Here is our discount package, let enjoy', '22-01-2021', 'active', '2021-01-19 06:14:00', '2021-01-19 06:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_types`
--

CREATE TABLE `enquiry_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiry_types`
--

INSERT INTO `enquiry_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'General', '2020-09-21 01:31:04', '2020-09-21 01:31:04'),
(2, 'Account', '2020-09-21 01:31:04', '2020-09-21 01:31:04');

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
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `stars` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `booking_id`, `stars`, `created_at`, `updated_at`) VALUES
(2, 2, 4, '2021-03-02 07:06:32', '2021-03-02 07:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `garage_advertisings`
--

CREATE TABLE `garage_advertisings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `garage_profile_id` bigint(20) UNSIGNED NOT NULL,
  `plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','ended') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `garage_advertisings`
--

INSERT INTO `garage_advertisings` (`id`, `garage_profile_id`, `plan`, `days`, `amount`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(3, 4, 'district', '7', 2500.00, '22-01-2021', '10-03-2021', 'active', '2021-01-22 07:23:13', '2021-03-09 00:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `garage_customer_facilities`
--

CREATE TABLE `garage_customer_facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `garage_profile_id` bigint(20) UNSIGNED NOT NULL,
  `customer_facility_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `garage_customer_facilities`
--

INSERT INTO `garage_customer_facilities` (`id`, `garage_profile_id`, `customer_facility_id`, `created_at`, `updated_at`) VALUES
(7, 1, 1, '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(8, 1, 2, '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(9, 1, 3, '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(10, 2, 1, '2020-10-12 05:27:53', '2020-10-12 05:27:53'),
(11, 2, 2, '2020-10-12 05:27:53', '2020-10-12 05:27:53'),
(12, 2, 3, '2020-10-12 05:27:53', '2020-10-12 05:27:53'),
(13, 3, 2, '2020-10-13 05:26:21', '2020-10-13 05:26:21'),
(14, 4, 1, '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(15, 4, 2, '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(16, 4, 3, '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(17, 4, 4, '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(18, 4, 5, '2021-01-18 06:26:49', '2021-01-18 06:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `garage_images`
--

CREATE TABLE `garage_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `garage_profile_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `garage_images`
--

INSERT INTO `garage_images` (`id`, `garage_profile_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'garage-galleries/mirza-motorworks/1600671197-01.jpg', '2020-09-21 01:53:17', '2020-09-21 01:53:17'),
(2, 1, 'garage-galleries/mirza-motorworks/1600671197-02.jpg', '2020-09-21 01:53:17', '2020-09-21 01:53:17'),
(3, 1, 'garage-galleries/mirza-motorworks/1600671197-03.jpg', '2020-09-21 01:53:17', '2020-09-21 01:53:17'),
(4, 1, 'garage-galleries/mirza-motorworks/1600671197-04.jpg', '2020-09-21 01:53:17', '2020-09-21 01:53:17'),
(5, 1, 'garage-galleries/mirza-motorworks/1600671197-05.jpg', '2020-09-21 01:53:17', '2020-09-21 01:53:17'),
(6, 1, 'garage-galleries/mirza-motorworks/1600671197-06.jpg', '2020-09-21 01:53:17', '2020-09-21 01:53:17'),
(7, 2, 'garage-galleries/shamal-motorworks/1602498533-content-img-1.jpg', '2020-10-12 05:28:53', '2020-10-12 05:28:53'),
(8, 2, 'garage-galleries/shamal-motorworks/1602498533-content-img-2.jpg', '2020-10-12 05:28:53', '2020-10-12 05:28:53'),
(9, 2, 'garage-galleries/shamal-motorworks/1602498533-content-img-3.jpg', '2020-10-12 05:28:53', '2020-10-12 05:28:53'),
(10, 2, 'garage-galleries/shamal-motorworks/1602498533-content-img-4.jpg', '2020-10-12 05:28:53', '2020-10-12 05:28:53'),
(11, 2, 'garage-galleries/shamal-motorworks/1602498533-faq.jpg', '2020-10-12 05:28:53', '2020-10-12 05:28:53'),
(12, 2, 'garage-galleries/shamal-motorworks/1602498533-search-result.jpg', '2020-10-12 05:28:53', '2020-10-12 05:28:53'),
(13, 4, 'garage-galleries/stark-industries/1610969429-01.jpg', '2021-01-18 06:30:29', '2021-01-18 06:30:29'),
(14, 4, 'garage-galleries/stark-industries/1610969429-02.jpg', '2021-01-18 06:30:29', '2021-01-18 06:30:29'),
(15, 4, 'garage-galleries/stark-industries/1610969429-03.jpg', '2021-01-18 06:30:29', '2021-01-18 06:30:29'),
(16, 4, 'garage-galleries/stark-industries/1610969429-04.jpg', '2021-01-18 06:30:29', '2021-01-18 06:30:29'),
(17, 4, 'garage-galleries/stark-industries/1610969429-05.jpg', '2021-01-18 06:30:29', '2021-01-18 06:30:29'),
(18, 4, 'garage-galleries/stark-industries/1610969429-06.jpg', '2021-01-18 06:30:29', '2021-01-18 06:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `garage_keywords`
--

CREATE TABLE `garage_keywords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `garage_profile_id` bigint(20) UNSIGNED NOT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `garage_keywords`
--

INSERT INTO `garage_keywords` (`id`, `garage_profile_id`, `keyword`, `created_at`, `updated_at`) VALUES
(1, 1, 'MOT', '2020-09-21 01:45:27', '2020-09-21 01:45:27'),
(2, 1, 'Garage Services', '2020-09-21 01:45:27', '2020-09-21 01:45:27'),
(3, 1, 'Tyres', '2020-09-21 01:45:27', '2020-09-21 01:45:27'),
(4, 1, 'Waiting Area', '2020-09-21 01:45:27', '2020-09-21 01:45:27'),
(5, 1, 'WiFi', '2020-09-21 01:45:27', '2020-09-21 01:45:27'),
(6, 1, 'MOT', '2020-09-21 01:59:13', '2020-09-21 01:59:13'),
(7, 1, 'Garage Services', '2020-09-21 01:59:13', '2020-09-21 01:59:13'),
(8, 1, 'Tyres', '2020-09-21 01:59:13', '2020-09-21 01:59:13'),
(9, 1, 'Waiting Area', '2020-09-21 01:59:13', '2020-09-21 01:59:13'),
(10, 1, 'WiFi', '2020-09-21 01:59:13', '2020-09-21 01:59:13'),
(11, 1, 'MOT', '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(12, 1, 'Garage Services', '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(13, 1, 'Tyres', '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(14, 1, 'Waiting Area', '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(15, 1, 'WiFi', '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(16, 1, 'MOT', '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(17, 1, 'Garage Services', '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(18, 1, 'Tyres', '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(19, 1, 'Waiting Area', '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(20, 1, 'WiFi', '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(21, 2, 'MOT', '2020-10-12 05:27:53', '2020-10-12 05:27:53'),
(22, 2, 'Services', '2020-10-12 05:27:53', '2020-10-12 05:27:53'),
(23, 2, 'Garage', '2020-10-12 05:27:53', '2020-10-12 05:27:53'),
(24, 2, 'Shamal', '2020-10-12 05:27:53', '2020-10-12 05:27:53'),
(25, 3, 'MOT', '2020-10-13 05:26:21', '2020-10-13 05:26:21'),
(26, 3, 'Services', '2020-10-13 05:26:21', '2020-10-13 05:26:21'),
(27, 4, 'MOT', '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(28, 4, 'Services', '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(29, 4, 'Garage', '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(30, 4, 'Tyres', '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(31, 4, 'Body Work', '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(32, 4, 'Tony', '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(33, 4, 'Stark', '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(34, 4, 'Tony Stark', '2021-01-18 06:26:49', '2021-01-18 06:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `garage_payment_types`
--

CREATE TABLE `garage_payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `garage_profile_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `garage_payment_types`
--

INSERT INTO `garage_payment_types` (`id`, `garage_profile_id`, `payment_type_id`, `created_at`, `updated_at`) VALUES
(5, 1, 1, '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(6, 1, 2, '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(7, 2, 1, '2020-10-12 05:27:53', '2020-10-12 05:27:53'),
(8, 2, 2, '2020-10-12 05:27:53', '2020-10-12 05:27:53'),
(9, 3, 1, '2020-10-13 05:26:21', '2020-10-13 05:26:21'),
(10, 3, 2, '2020-10-13 05:26:21', '2020-10-13 05:26:21'),
(11, 4, 1, '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(12, 4, 2, '2021-01-18 06:26:49', '2021-01-18 06:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `garage_profiles`
--

CREATE TABLE `garage_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_long` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pretty_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Owner contact number',
  `contact_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Garage contact number',
  `contact_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Garage optional contact number',
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','in_revision','suspended','submitted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `registration_step` enum('personal_info','garage_profile','services_and_facilities','working_hours','gallery','done') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'garage_profile',
  `uk_postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_status` enum('available','away') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `no_of_views` int(11) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `search_radius` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `garage_profiles`
--

INSERT INTO `garage_profiles` (`id`, `user_id`, `name`, `slug`, `address`, `address_lat`, `address_long`, `pretty_address`, `user_contact`, `contact_1`, `contact_2`, `website`, `registration_number`, `vat_no`, `description`, `logo`, `verification_code`, `status`, `created_at`, `updated_at`, `registration_step`, `uk_postcode`, `available_status`, `picture`, `is_verified`, `no_of_views`, `is_featured`, `search_radius`) VALUES
(1, 3, 'Mirza Motorworks', 'mirza-motorworks', 'London, UK', '51.5073509', '-0.1277583', NULL, '03069387974', '03157118755', '03069388306', 'www.mirza-ali.com', '123456', NULL, 'Hello,\r\nWelcome to my garage. We are expert in this. Welcome to my garage. We are expert in this. Welcome to my garage. We are expert in this.', 'garage-logos/mirza-motorworks/1600671197-avatar-s-5.jpg', '92957750', 'approved', '2020-09-21 01:40:12', '2020-10-07 08:49:19', 'done', '00', 'available', NULL, 1, 0, 0, '0'),
(2, 4, 'Shamal Motorworks', 'shamal-motorworks', 'City of London, London, UK', '51.5123443', '-0.0909852', NULL, '', '03069387974', NULL, 'https://www.google.com', '12345678', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'garage-logos/shamal-motorworks/1602498533-avatar-s-14.jpg', NULL, 'approved', '2020-10-12 04:17:35', '2020-10-12 05:29:00', 'done', 'DY10 1EJ', 'available', NULL, 0, 0, 0, '0'),
(3, 5, 'Mali Motorworks', 'mali-motorworks', 'Li, Arnisdale, KYLE, IV40 8JJ, UNITED KINGDOM', '57.1074', '-5.5795', 'Li\r\nArnisdale\r\nKYLE\r\nIV40 8JJ\r\nUNITED KINGDOM', '', '03069387974', NULL, NULL, '12345678', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, NULL, 'approved', '2020-10-13 00:38:38', '2020-10-13 05:26:28', 'gallery', '00', 'available', NULL, 0, 0, 0, '0'),
(4, 10, 'Stark Industries', 'stark-industries', 'London, UK', '51.5073509', '-0.1277583', NULL, '', '03069387974', NULL, 'https://www.google.com', '01234567', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'garage-logos/stark-industries/1610969429-Stark_Industries_Design_Square_a2531bcc-0660-4cf1-af84-17aa2e51a3a0_1024x1024.jpg', '56160119', 'approved', '2021-01-18 06:21:43', '2021-03-09 00:37:24', 'done', '00', 'available', NULL, 1, 0, 1, '50'),
(8, 15, '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-03-08 06:06:58', '2021-03-08 06:06:58', 'garage_profile', NULL, 'available', NULL, 0, 0, 0, '0'),
(9, 16, 'Test garage', 'test-garage', 'SE1 Bodywork, Abbey Street, London, UK', '51.4981765', '-0.07361369999999999', NULL, '', '88888888888', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-03-16 01:23:04', '2021-03-16 02:04:01', 'services_and_facilities', NULL, 'available', NULL, 0, 0, 0, '0'),
(10, 20, 'Autopix Garage', 'autopix-garage', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-04-15 11:27:36', '2021-04-15 11:27:36', 'garage_profile', NULL, 'available', NULL, 0, 0, 0, '0'),
(11, 22, 'Test Application Garage', 'test-application-garage', 'London, Bridge, London', NULL, NULL, NULL, '', '87889898989', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-05-25 23:09:03', '2021-05-25 23:10:35', 'services_and_facilities', NULL, 'available', NULL, 0, 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `garage_profile_views`
--

CREATE TABLE `garage_profile_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `garage_profile_id` bigint(20) UNSIGNED NOT NULL,
  `no_of_views` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `garage_profile_views`
--

INSERT INTO `garage_profile_views` (`id`, `garage_profile_id`, `no_of_views`, `created_at`, `updated_at`, `ip`, `agent`) VALUES
(1, 1, 4, '2020-10-24 02:49:23', '2020-10-24 02:50:57', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36'),
(2, 1, 1, '2020-10-29 07:16:40', '2020-10-29 07:16:40', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `garage_services`
--

CREATE TABLE `garage_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `garage_profile_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `garage_services`
--

INSERT INTO `garage_services` (`id`, `garage_profile_id`, `service_id`, `created_at`, `updated_at`) VALUES
(9, 1, 1, '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(10, 1, 2, '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(11, 1, 3, '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(12, 1, 4, '2020-09-21 02:00:24', '2020-09-21 02:00:24'),
(13, 2, 1, '2020-10-12 05:27:53', '2020-10-12 05:27:53'),
(14, 2, 2, '2020-10-12 05:27:53', '2020-10-12 05:27:53'),
(15, 2, 3, '2020-10-12 05:27:53', '2020-10-12 05:27:53'),
(16, 2, 4, '2020-10-12 05:27:53', '2020-10-12 05:27:53'),
(17, 2, 5, '2020-10-12 05:27:53', '2020-10-12 05:27:53'),
(18, 3, 2, '2020-10-13 05:26:21', '2020-10-13 05:26:21'),
(19, 4, 1, '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(20, 4, 2, '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(21, 4, 3, '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(22, 4, 4, '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(23, 4, 5, '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(24, 4, 6, '2021-01-18 06:26:49', '2021-01-18 06:26:49'),
(25, 4, 7, '2021-01-18 06:26:49', '2021-01-18 06:26:49');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_17_124839_create_notifications_table', 1),
(5, '2020_07_07_110001_create_services_table', 1),
(6, '2020_07_07_110015_create_customer_facilities_table', 1),
(7, '2020_07_07_110052_create_payment_types_table', 1),
(8, '2020_07_07_110834_create_garage_profiles_table', 1),
(9, '2020_07_07_110847_create_garage_services_table', 1),
(10, '2020_07_07_110907_create_garage_customer_facilities_table', 1),
(11, '2020_07_07_120728_create_garage_keywords_table', 1),
(12, '2020_07_07_120822_create_garage_payment_types_table', 1),
(13, '2020_07_07_120843_create_working_hours_table', 1),
(14, '2020_07_07_120903_create_garage_images_table', 1),
(15, '2020_07_08_080740_add_registration_step_in_garage_profiles', 1),
(16, '2020_07_09_120221_add_uk_postcode_in_garage_profiles', 1),
(17, '2020_08_21_065558_alter_garage_profiles_table_for_address', 1),
(18, '2020_08_26_084311_create_consumer_profiles_table', 1),
(19, '2020_08_27_051727_create_consumer_vehicles_table', 1),
(20, '2020_09_03_044557_alter_garage_profiles_for_status', 1),
(21, '2020_09_09_091655_add_image_field_into_consumer_profiles_table', 1),
(22, '2020_09_11_071603_add_address_fields_in_consumer_profiles_table', 1),
(23, '2020_09_14_072117_alter_consumer_profile_for_uk_postcode', 1),
(24, '2020_09_14_103448_create_enquiry_types_table', 1),
(25, '2020_09_14_103619_create_tickets_table', 1),
(26, '2020_09_14_104117_create_comments_table', 1),
(27, '2020_09_16_101354_create_bookings_table_migration', 1),
(28, '2020_09_16_103041_create_booking_services_table', 1),
(29, '2020_09_16_121052_change_status_field_in_bookings_table', 1),
(30, '2020_09_16_122108_change_status_field_to_enum_bookings_table', 1),
(31, '2020_09_17_080859_change_bookings_table_with_new_field_of_price', 1),
(32, '2020_09_18_043759_create_estimate_completion_time_in_booking_table', 1),
(33, '2020_09_18_103645_change_the_bookings_table_with_new_fields', 1),
(34, '2020_09_21_042802_create_booking_images_table', 1),
(35, '2020_09_21_043742_add_booking_id_column_to_bookings_images_table', 2),
(36, '2020_09_21_044618_change_booking_images_table_with_column_of_booking_status', 2),
(37, '2020_09_21_044805_change_booking_images_table_with_column_of_booking_status_two', 2),
(38, '2020_09_21_070401_alter_garage_profiles_table_for_enum', 2),
(39, '2020_09_21_071610_add_extend_date_column_into_bookings_table', 2),
(40, '2020_09_21_080954_change_bookings_table', 2),
(41, '2020_09_21_081105_change_bookings_table_add_extension_status', 2),
(42, '2020_09_21_101810_add_declined_reason_field_to_bookings_table', 2),
(43, '2020_09_21_111406_add_cancelled_date_field_to_bookings_table', 2),
(44, '2020_09_21_121258_alter_consumer_vehicles_table_for_vrm_column', 3),
(45, '2020_09_22_072842_create_reports_table', 4),
(46, '2020_09_22_075309_alter_table_of_report_to_del_report_by', 4),
(47, '2020_09_22_075410_alter_table_of_report_to_add_status', 4),
(48, '2020_09_23_045725_alter_table_of_report_add_status', 4),
(49, '2020_09_23_050017_change_reports_table_to_add_status_column', 4),
(50, '2020_09_30_053809_change_consumer_vehicles_table_add_colour_field', 5),
(51, '2020_10_01_073827_change_users_table_add_email_verified_column', 5),
(52, '2020_10_03_143519_change_consumer_profiles_with_availability', 6),
(54, '2020_10_07_072922_change_garage_profiles_table_add_vat_number_column', 7),
(55, '2020_10_07_082021_change_garage_profiles_table', 7),
(56, '2020_10_07_092305_change_garage_profiles_table_add_picture', 7),
(57, '2020_10_07_133423_alter_garage_profiles_table_for_is_verified', 8),
(58, '2020_10_12_124825_create_visitors_table2', 9),
(59, '2020_10_13_063815_alter_garage_profiles_table_for_pretty_address', 10),
(60, '2020_10_14_093520_change_users_table_with_two_fields3', 11),
(61, '2020_10_15_060714_change_users_table_add_two_roles_and_parent_id_fields', 12),
(62, '2020_10_15_061100_change_users_table_drop_role_column', 12),
(63, '2020_10_15_061153_change_users_table_add_role_column_again', 12),
(64, '2020_10_15_080017_change_garage_profiles_table_add_views_column', 12),
(65, '2020_10_15_125446_create_garage_profile_views_detail', 12),
(66, '2020_10_15_131053_change_garage_profile_views_table', 12),
(67, '2020_10_21_060755_change_users_table_add_two_fector_auth', 13),
(68, '2020_10_21_062619_change_users_table_add_two_step_login', 13),
(69, '2020_10_21_071049_add_new_column_into_users_table', 13),
(70, '2020_11_09_093035_alter_tickets_table_with_new_fields', 14),
(71, '2020_11_09_094927_create_ticket_attachments_table', 14),
(72, '2020_11_09_100436_alter_tickets_table_third_time', 14),
(73, '2020_11_09_101543_alter_tickets_table_fourth_time', 14),
(74, '2020_11_09_131119_alter_ticket_attachments_table_first_time', 14),
(75, '2020_11_16_072631_alter_bookings_table_alter_extend_date_field', 15),
(76, '2020_12_18_052048_alter_garage_profiles_table_for_slug', 16),
(77, '2020_12_23_063412_create_saved_garages_table', 17),
(78, '2021_01_02_062414_create_feedback_table', 18),
(79, '2021_01_02_063751_create_feedback_comments_table', 18),
(80, '2021_01_19_100810_create_discounts_table', 19),
(81, '2021_01_20_081722_create_settings_table', 20),
(82, '2021_01_20_124655_create_garage_advertisings_table', 21),
(83, '2021_01_21_051528_alter_garage_advertisings_table_for_amount_column', 22),
(84, '2021_01_21_051848_alter_garage_profiles_table_for_is_featured_column', 23),
(85, '2021_01_22_121556_create_advertising_transactions_table', 24),
(88, '2021_03_02_121754_create_reviews_table', 25),
(89, '2021_03_03_041349_drop_feedback_and_comments_table', 26),
(92, '2021_03_08_132629_alter_garage_profiles_table_for_radius', 27);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('23c2a2d0-4060-4e38-9aea-36fec5ef77e9', 'App\\Notifications\\RegisterUser', 'App\\User', 3, '{\"msg\":\"You have been registered successfully\"}', '2021-03-05 06:33:24', '2021-03-05 06:33:14', '2021-03-05 06:33:24'),
('24042e58-7bcb-4386-914d-5c134e1ca49c', 'App\\Notifications\\UpdateBooking', 'App\\User', 3, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"Booking #3 has an update\"}', '2021-03-09 00:42:13', '2021-03-05 06:34:28', '2021-03-09 00:42:13'),
('298a7055-b7f7-4b51-8b3d-bebc2b686684', 'App\\Notifications\\RegisterUser', 'App\\User', 12, '{\"msg\":\"You have been registered successfully\"}', '2021-02-22 05:53:18', '2021-02-22 05:24:21', '2021-02-22 05:53:18'),
('2cab5aaa-3de0-4e1e-913e-6311083be326', 'App\\Notifications\\AcceptBookingRequest', 'App\\User', 3, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"You have accepted booking request from consumer Kashif Ali\"}', '2021-03-05 06:33:24', '2021-03-05 06:13:54', '2021-03-05 06:33:24'),
('331ba64e-4e58-4dc3-bb14-47ac9552547b', 'App\\Notifications\\RegisterUser', 'App\\User', 11, '{\"msg\":\"You have been registered successfully\"}', '2021-02-02 00:16:05', '2021-02-02 00:15:57', '2021-02-02 00:16:05'),
('35c7f97f-88f2-49fd-842f-9158008d1560', 'App\\Notifications\\NewBookingRequest', 'App\\User', 12, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"Your booking request with Mirza Motorworks has been sent\"}', NULL, '2021-03-05 06:09:17', '2021-03-05 06:09:17'),
('4458ad1b-ccf3-45f6-8fba-222002deee69', 'App\\Notifications\\CompleteBooking', 'App\\User', 10, '{\"garage_name\":\"Stark Industries\",\"booking_id\":2,\"msg\":\"Booking #2 has been completed\"}', NULL, '2021-03-02 06:45:03', '2021-03-02 06:45:03'),
('4635ba90-5637-4490-9562-e9a3c92abb85', 'App\\Notifications\\RegisterUser', 'App\\User', 16, '{\"msg\":\"You have been registered successfully\"}', NULL, '2021-03-16 01:23:29', '2021-03-16 01:23:29'),
('4ebacd68-9432-45a9-986f-a42f35fa048d', 'App\\Notifications\\RegisterUser', 'App\\User', 13, '{\"msg\":\"You have been registered successfully\"}', '2021-03-05 01:41:47', '2021-03-05 01:34:58', '2021-03-05 01:41:47'),
('4f72837b-902c-4313-92de-25bdd8bbf7ae', 'App\\Notifications\\NewBookingRequest', 'App\\User', 10, '{\"garage_name\":\"Stark Industries\",\"booking_id\":2,\"msg\":\"You have recieved booking request from consumer Kashif Ali\"}', '2021-03-02 06:37:35', '2021-03-02 06:32:44', '2021-03-02 06:37:35'),
('50586fcd-b84c-4375-b1b1-a18b5482ca00', 'App\\Notifications\\AcceptBookingRequest', 'App\\User', 12, '{\"garage_name\":\"Stark Industries\",\"booking_id\":2,\"msg\":\"Your booking request with Stark Industries has been accepted\"}', '2021-03-02 06:38:26', '2021-03-02 06:37:51', '2021-03-02 06:38:26'),
('50a5dc63-1aa9-48ff-9cf1-48dfab90252f', 'App\\Notifications\\AcceptBookingRequest', 'App\\User', 12, '{\"garage_name\":\"Stark Industries\",\"booking_id\":2,\"msg\":\"Your booking request with Stark Industries has been accepted\"}', '2021-03-05 05:57:21', '2021-03-02 06:38:02', '2021-03-05 05:57:21'),
('51e0a686-bc44-4114-bd11-5e6016df16ba', 'App\\Notifications\\RegisterUser', 'App\\User', 18, '{\"msg\":\"You have been registered successfully\"}', NULL, '2021-04-08 07:50:43', '2021-04-08 07:50:43'),
('51f91710-eed1-4bad-b4c2-1c7b4a1d2581', 'App\\Notifications\\RegisterUser', 'App\\User', 17, '{\"msg\":\"You have been registered successfully\"}', NULL, '2021-04-08 07:46:48', '2021-04-08 07:46:48'),
('56ab9f4c-8e62-4668-a555-5a0573b08a3f', 'App\\Notifications\\NewBookingRequest', 'App\\User', 12, '{\"garage_name\":\"Shamal Motorworks\",\"booking_id\":5,\"msg\":\"Your booking request with Shamal Motorworks has been sent\"}', NULL, '2021-03-19 02:01:56', '2021-03-19 02:01:56'),
('57024595-b1c1-4e53-bd0b-96f64ef4d818', 'App\\Notifications\\CompleteBooking', 'App\\User', 12, '{\"garage_name\":\"Stark Industries\",\"booking_id\":2,\"msg\":\"Booking #2 has been completed\"}', '2021-03-04 23:53:33', '2021-03-02 06:45:03', '2021-03-04 23:53:33'),
('5b932e15-5efa-4c26-9fec-ac2fd20f974e', 'App\\Notifications\\NewBookingRequest', 'App\\User', 4, '{\"garage_name\":\"Shamal Motorworks\",\"booking_id\":5,\"msg\":\"You have recieved booking request from consumer Kashif Ali\"}', NULL, '2021-03-19 02:01:56', '2021-03-19 02:01:56'),
('5c97a9db-83c8-40cc-be0c-5468b4a4b6ed', 'App\\Notifications\\AcceptBookingRequest', 'App\\User', 12, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"Your booking request with Mirza Motorworks has been accepted\"}', NULL, '2021-03-05 06:13:15', '2021-03-05 06:13:15'),
('5cc726f9-68e4-42ec-974f-1427f01c2475', 'App\\Notifications\\UpdateBooking', 'App\\User', 12, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"Booking #3 has an update\"}', NULL, '2021-03-05 06:15:52', '2021-03-05 06:15:52'),
('62ab8e4d-b1e9-454f-b705-22e070e25726', 'App\\Notifications\\UpdateBooking', 'App\\User', 10, '{\"garage_name\":\"Stark Industries\",\"booking_id\":2,\"msg\":\"Booking #2 has an update\"}', NULL, '2021-03-02 06:43:59', '2021-03-02 06:43:59'),
('6bfc33de-1c12-4dc0-94e4-fd094e89096f', 'App\\Notifications\\RegisterUser', 'App\\User', 19, '{\"msg\":\"You have been registered successfully\"}', NULL, '2021-04-08 07:51:35', '2021-04-08 07:51:35'),
('734ea37a-95cc-4ebc-9f8b-c76d1c0f391f', 'App\\Notifications\\UpdateBooking', 'App\\User', 3, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"Booking #3 has an update\"}', '2021-03-09 00:42:13', '2021-03-05 06:33:53', '2021-03-09 00:42:13'),
('7c64b1f5-d693-439e-91bb-80142581b450', 'App\\Notifications\\RegisterUser', 'App\\User', 9, '{\"msg\":\"You have been registered successfully\"}', '2021-01-18 06:20:34', '2021-01-18 06:19:07', '2021-01-18 06:20:34'),
('817e6005-ba37-4b0b-95c4-375587675a39', 'App\\Notifications\\AcceptBookingRequest', 'App\\User', 3, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"You have accepted booking request from consumer Kashif Ali\"}', '2021-03-05 06:33:24', '2021-03-05 06:12:31', '2021-03-05 06:33:24'),
('82c1b4db-f9ff-493c-a458-acf973e1860a', 'App\\Notifications\\UpdateBooking', 'App\\User', 12, '{\"garage_name\":\"Stark Industries\",\"booking_id\":2,\"msg\":\"Booking #2 has an update\"}', '2021-03-05 00:35:22', '2021-03-02 06:43:59', '2021-03-05 00:35:22'),
('88a9c605-9557-4806-91f4-fdb6c5a503ac', 'App\\Notifications\\RegisterUser', 'App\\User', 20, '{\"msg\":\"You have been registered successfully\"}', NULL, '2021-04-15 11:27:52', '2021-04-15 11:27:52'),
('8c79d54e-c3fe-448c-8995-c76235d9fbf2', 'App\\Notifications\\UpdateBooking', 'App\\User', 3, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"Booking #3 has an update\"}', '2021-03-09 00:42:13', '2021-03-05 06:34:13', '2021-03-09 00:42:13'),
('8f5e2ffc-3a07-4e36-96ef-5c967dc4e5f1', 'App\\Notifications\\RegisterUser', 'App\\User', 7, '{\"msg\":\"You have been registered successfully\"}', '2020-10-24 02:21:22', '2020-10-24 02:20:31', '2020-10-24 02:21:22'),
('92b6ccf2-3e41-433e-bf75-0c7414bba2a1', 'App\\Notifications\\NewBookingRequest', 'App\\User', 3, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"You have recieved booking request from consumer Kashif Ali\"}', '2021-03-05 06:33:24', '2021-03-05 06:09:17', '2021-03-05 06:33:24'),
('937db292-a88a-4471-bb6f-8b0eb74c0304', 'App\\Notifications\\AcceptBookingRequest', 'App\\User', 12, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"Your booking request with Mirza Motorworks has been accepted\"}', NULL, '2021-03-05 06:13:54', '2021-03-05 06:13:54'),
('944ab5fb-fedb-4eb3-ac18-c36f65fe759c', 'App\\Notifications\\RegisterUser', 'App\\User', 8, '{\"msg\":\"You have been registered successfully\"}', '2020-10-29 06:32:45', '2020-10-29 06:32:10', '2020-10-29 06:32:45'),
('95502492-73ea-4406-91ae-680101b7830a', 'App\\Notifications\\RegisterUser', 'App\\User', 22, '{\"msg\":\"You have been registered successfully\"}', NULL, '2021-05-25 23:09:43', '2021-05-25 23:09:43'),
('966dada4-9d4a-4b15-bc1a-360a87f77c82', 'App\\Notifications\\DeclineBookingRequest', 'App\\User', 12, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"Booking #3 has been cancelled\"}', NULL, '2021-03-05 06:15:07', '2021-03-05 06:15:07'),
('a30c5bf9-b950-4c2b-ad99-aa902a4f54cc', 'App\\Notifications\\AcceptBookingRequest', 'App\\User', 10, '{\"garage_name\":\"Stark Industries\",\"booking_id\":2,\"msg\":\"You have accepted booking request from consumer Kashif Ali\"}', '2021-03-02 06:40:55', '2021-03-02 06:38:10', '2021-03-02 06:40:55'),
('b18468a3-056d-4354-bdde-05763a7c0b27', 'App\\Notifications\\RegisterUser', 'App\\User', 21, '{\"msg\":\"You have been registered successfully\"}', NULL, '2021-04-27 03:00:49', '2021-04-27 03:00:49'),
('b31ce76b-753d-4a6a-b221-460e291ee84a', 'App\\Notifications\\AcceptBookingRequest', 'App\\User', 3, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"You have accepted booking request from consumer Kashif Ali\"}', '2021-03-05 06:33:24', '2021-03-05 06:13:15', '2021-03-05 06:33:24'),
('b76678c6-50da-4a05-9747-fdf44a355c7f', 'App\\Notifications\\AcceptBookingRequest', 'App\\User', 10, '{\"garage_name\":\"Stark Industries\",\"booking_id\":2,\"msg\":\"You have accepted booking request from consumer Kashif Ali\"}', '2021-03-02 06:40:55', '2021-03-02 06:38:03', '2021-03-02 06:40:55'),
('b981ba82-0171-43b0-bde2-eb79e4b09333', 'App\\Notifications\\UpdateBooking', 'App\\User', 10, '{\"garage_name\":\"Stark Industries\",\"booking_id\":2,\"msg\":\"Booking #2 has an update\"}', '2021-03-02 06:40:55', '2021-03-02 06:38:34', '2021-03-02 06:40:55'),
('bb5c4a7e-0e93-49ae-9393-eb605b2925ab', 'App\\Notifications\\UpdateBooking', 'App\\User', 3, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"Booking #3 has an update\"}', '2021-03-05 06:33:24', '2021-03-05 06:15:52', '2021-03-05 06:33:24'),
('bdb5bed5-dab8-4a6e-aa6a-e4caa2e65911', 'App\\Notifications\\AcceptBookingRequest', 'App\\User', 12, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"Your booking request with Mirza Motorworks has been accepted\"}', NULL, '2021-03-05 06:12:31', '2021-03-05 06:12:31'),
('c004c9db-4e66-47b3-a53d-4e386ed08237', 'App\\Notifications\\NewBookingRequest', 'App\\User', 12, '{\"garage_name\":\"Stark Industries\",\"booking_id\":2,\"msg\":\"Your booking request with Stark Industries has been sent\"}', '2021-03-05 05:57:29', '2021-03-02 06:32:44', '2021-03-05 05:57:29'),
('c4d3160a-169e-4bf4-9f6a-085ca482ab61', 'App\\Notifications\\AcceptBookingRequest', 'App\\User', 12, '{\"garage_name\":\"Stark Industries\",\"booking_id\":2,\"msg\":\"Your booking request with Stark Industries has been accepted\"}', '2021-03-04 23:56:06', '2021-03-02 06:38:10', '2021-03-04 23:56:06'),
('c5cc1748-facd-404b-9654-43b0e9cf6c7a', 'App\\Notifications\\UpdateBooking', 'App\\User', 12, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"Booking #3 has an update\"}', NULL, '2021-03-05 06:34:28', '2021-03-05 06:34:28'),
('c6c080de-6519-450c-8a88-f98e201783d9', 'App\\Notifications\\RegisterUser', 'App\\User', 14, '{\"msg\":\"You have been registered successfully\"}', '2021-03-08 05:44:27', '2021-03-08 05:39:29', '2021-03-08 05:44:27'),
('cb8712d2-b143-4d9f-9729-f856ae716d9b', 'App\\Notifications\\UpdateBooking', 'App\\User', 12, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"Booking #3 has an update\"}', NULL, '2021-03-05 06:34:13', '2021-03-05 06:34:13'),
('cd18bc54-22ed-4017-a26f-7c5fabf5088b', 'App\\Notifications\\DeclineBookingRequest', 'App\\User', 3, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"You have cancelled booking with consumer Kashif Ali\"}', '2021-03-05 06:33:24', '2021-03-05 06:15:07', '2021-03-05 06:33:24'),
('cfa82d26-5a28-4b90-b93a-c4932ea85d74', 'App\\Notifications\\CompleteBooking', 'App\\User', 3, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"Booking #3 has been completed\"}', '2021-03-09 00:42:12', '2021-03-05 06:37:54', '2021-03-09 00:42:12'),
('d637666e-e88e-40af-8a4b-b0dbb7884ade', 'App\\Notifications\\UpdateBooking', 'App\\User', 12, '{\"garage_name\":\"Stark Industries\",\"booking_id\":2,\"msg\":\"Booking #2 has an update\"}', '2021-03-05 05:53:33', '2021-03-02 06:38:34', '2021-03-05 05:53:33'),
('da3d31b7-c736-47fb-9e49-c3342691e53a', 'App\\Notifications\\RegisterUser', 'App\\User', 15, '{\"msg\":\"You have been registered successfully\"}', '2021-03-08 06:06:10', '2021-03-08 05:59:45', '2021-03-08 06:06:10'),
('e3ec615a-a80d-40ba-86b9-e0f5ec9d1d9d', 'App\\Notifications\\UpdateBooking', 'App\\User', 12, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"Booking #3 has an update\"}', NULL, '2021-03-05 06:33:53', '2021-03-05 06:33:53'),
('e46ed1d9-a87f-4777-b3eb-79ae644ffa76', 'App\\Notifications\\CompleteBooking', 'App\\User', 12, '{\"garage_name\":\"Mirza Motorworks\",\"booking_id\":3,\"msg\":\"Booking #3 has been completed\"}', NULL, '2021-03-05 06:37:54', '2021-03-05 06:37:54'),
('fef2872d-0db5-45f6-a07c-6d112596f0ff', 'App\\Notifications\\RegisterUser', 'App\\User', 10, '{\"msg\":\"You have been registered successfully\"}', '2021-01-18 06:32:53', '2021-01-18 06:21:58', '2021-01-18 06:32:53'),
('ff5d0688-1e10-44ec-92a6-363ff4247a0b', 'App\\Notifications\\AcceptBookingRequest', 'App\\User', 10, '{\"garage_name\":\"Stark Industries\",\"booking_id\":2,\"msg\":\"You have accepted booking request from consumer Kashif Ali\"}', '2021-03-02 06:40:55', '2021-03-02 06:37:51', '2021-03-02 06:40:55');

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
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 'payment_type-images/1598005928-cash.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04'),
(2, 'Credit Card', 'payment_type-images/1598005936-credit_card.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04'),
(3, 'BACS', 'payment_type-images/1598005943-bacs.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04'),
(4, 'Other', 'payment_type-images/1598005952-other.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('open','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `booking_id`, `user_id`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, 3, 12, 'test description report ', '2021-03-01 12:50:58', '2021-03-01 12:50:58', 'open'),
(2, 2, 12, 'test description report ', '2021-03-01 12:50:58', '2021-03-01 12:50:58', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consumer_profile_id` bigint(20) UNSIGNED NOT NULL,
  `garage_profile_id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `consumer_profile_id`, `garage_profile_id`, `booking_id`, `user_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(2, 5, 4, 2, 12, '3', 'Good work', '2021-03-02 07:47:49', '2021-03-02 07:47:49'),
(3, 5, 4, 2, 10, '2', 'I m very satisfied with this consumer.', '2021-03-02 07:58:14', '2021-03-02 07:58:14'),
(4, 5, 1, 3, 3, NULL, 'Very good consumer . I have good experience with this consumer.', '2021-03-05 06:38:40', '2021-03-05 06:38:40'),
(5, 5, 1, 3, 12, '3', 'I have good experience with this consumer.', '2021-03-05 06:39:32', '2021-03-05 06:39:32'),
(6, 5, 2, 5, 12, '4', 'sdklfdsjl', '2021-03-19 02:03:11', '2021-03-19 02:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `saved_garages`
--

CREATE TABLE `saved_garages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consumer_profile_id` bigint(20) UNSIGNED NOT NULL,
  `garage_profile_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saved_garages`
--

INSERT INTO `saved_garages` (`id`, `consumer_profile_id`, `garage_profile_id`, `created_at`, `updated_at`) VALUES
(4, 5, 1, '2021-03-05 06:00:26', '2021-03-05 06:00:26'),
(10, 5, 4, '2021-05-07 05:35:39', '2021-05-07 05:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'MOT', 'services-images/1598004326-mot.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04'),
(2, 'Servicing', 'services-images/1598004372-servicing.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04'),
(3, 'Repairs', 'services-images/1598004385-repairs.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04'),
(4, 'Tyres', 'services-images/1598004401-tyres.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04'),
(5, 'Bodywork', 'services-images/1598004420-bodywork.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04'),
(6, 'Electrical', 'services-images/1598004430-electrical.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04'),
(7, 'Recovery', 'services-images/1598004438-recovery.svg', '2020-09-21 01:31:04', '2020-09-21 01:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'city_radius', '20', '2021-01-20 04:39:32', '2021-01-20 04:39:32'),
(2, 'district_radius', '50', '2021-01-20 04:39:32', '2021-01-20 04:39:32'),
(3, 'three_days_price', '10', '2021-01-20 07:15:00', '2021-01-20 07:15:00'),
(4, 'five_days_price', '25', '2021-01-20 07:15:00', '2021-01-20 07:15:00'),
(5, 'seven_days_price', '50', '2021-01-20 07:15:00', '2021-01-20 07:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('open','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_attachments`
--

CREATE TABLE `ticket_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('new_ticket','comment') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new_ticket'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_status` enum('not_verified','verified') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_verified',
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('admin','garage','consumer','sub_admin','sub_garage') COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_expires_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_login` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `two_factor_verified_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `email_status`, `phone_no`, `picture`, `parent_id`, `role`, `two_factor_code`, `two_factor_expires_at`, `two_factor_login`, `two_factor_verified_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$moekOk2.FRsVp4mwq6TY3OzvEFbrfDaRaWK0XjvO54a/b2m3BI4XC', NULL, NULL, NULL, 'not_verified', NULL, NULL, 0, 'admin', NULL, NULL, '0', NULL),
(2, 'Mirza Fuzail', 'mirzafuzail@gmail.com', '2020-10-06 19:00:00', '$2y$10$xzgtih077Rkq5wjnyHkgzebw62jyYEUS0Uk4FKoW7hZeCAOQiHNIm', NULL, '2020-09-21 01:32:52', '2020-10-07 08:18:55', 'verified', NULL, NULL, 0, 'garage', NULL, NULL, '0', NULL),
(3, 'Mirza Ali', 'mali70162@gmail.com', '2021-03-05 06:33:14', '$2y$10$DhBPpBqT5SCj0i5Y9MdYGO2KJPxRh1Pz0a87zDaAEvxvguEeX.PQq', NULL, '2020-09-21 01:40:12', '2021-03-05 06:33:14', 'verified', NULL, NULL, 0, 'garage', NULL, NULL, '0', NULL),
(4, 'Ali Shamal', 'mirzaalishamal@gmail.com', '2020-10-11 19:00:00', '$2y$10$j3u9qaEE/yhVkldJHm6Oue1JkCpWnlyFhbTIIFMsuyOvjjnti0SXK', NULL, '2020-10-12 04:17:35', '2020-10-12 04:18:32', 'verified', NULL, NULL, 0, 'garage', NULL, NULL, '0', NULL),
(5, 'Mirza Yameen', 'mirzayameen@gmail.com', '2020-10-12 19:00:00', '$2y$10$8wcTx4xEletpeCEIimd2deE8zIB7mpesDLsxXGwTRa.cVCzu/91O2', NULL, '2020-10-13 00:38:38', '2020-10-13 01:01:56', 'verified', NULL, NULL, 0, 'garage', NULL, NULL, '0', NULL),
(6, 'Nano Yameen', 'nano@gmail.com', NULL, '$2y$10$jDy1o8tqCt2i1dti0bRQ4.k8.uwKkhN.O26hnb/sQpwavV6tHr3.e', NULL, '2020-10-15 01:04:16', '2020-10-15 01:04:16', 'not_verified', NULL, NULL, 0, 'admin', NULL, NULL, '0', NULL),
(7, 'Shahzad Ahmad', 'shahazad@gmail.com', '2020-10-24 02:20:30', '$2y$10$6abXJ7swuXwgC4omtcESg.izKk/DcgAST9AkTNvfQSqIpE3R6OPju', NULL, '2020-10-24 01:35:04', '2020-10-24 02:20:30', 'not_verified', NULL, NULL, 0, 'consumer', NULL, NULL, '0', NULL),
(8, 'Kashif Ali', 'kashif@gmail.com', '2020-10-29 06:32:09', '$2y$10$6abXJ7swuXwgC4omtcESg.izKk/DcgAST9AkTNvfQSqIpE3R6OPju', NULL, '2020-10-29 06:10:22', '2020-10-29 06:32:09', 'verified', NULL, NULL, 0, 'consumer', NULL, NULL, '0', NULL),
(10, 'Tony Stark', 'demoprojects.testing@gmail.com', '2021-01-18 06:21:58', '$2y$10$6abXJ7swuXwgC4omtcESg.izKk/DcgAST9AkTNvfQSqIpE3R6OPju', NULL, '2021-01-18 06:21:43', '2021-01-18 06:21:58', 'verified', NULL, NULL, 0, 'garage', NULL, NULL, '0', NULL),
(11, 'Testing Consumer', 'demoprojects.testing+consumer@gmail.com', '2021-02-02 01:24:21', '$2y$10$6abXJ7swuXwgC4omtcESg.izKk/DcgAST9AkTNvfQSqIpE3R6OPju', NULL, '2021-02-02 00:15:48', '2021-02-02 01:24:21', 'verified', NULL, NULL, 0, 'consumer', NULL, NULL, '0', NULL),
(12, 'Kashif Ali', 'alikashi54321@gmail.com', '2021-03-02 06:30:27', '$2y$10$6abXJ7swuXwgC4omtcESg.izKk/DcgAST9AkTNvfQSqIpE3R6OPju', NULL, '2021-02-22 05:24:15', '2021-03-02 06:30:27', 'verified', NULL, NULL, 0, 'consumer', NULL, NULL, '0', NULL),
(15, 'Test Test', 'testtest@hotmail.com', '2021-03-08 05:59:45', '$2y$10$DhBPpBqT5SCj0i5Y9MdYGO2KJPxRh1Pz0a87zDaAEvxvguEeX.PQq', NULL, '2021-03-08 05:59:28', '2021-03-08 05:59:45', 'verified', NULL, NULL, 0, 'garage', NULL, NULL, '0', NULL),
(16, 'test test garage', 'testgarage@gmail.com', '2021-03-16 01:23:28', '$2y$10$qwOPQie0KkWZd34LdUQvSeHP4zq8adNrfT7Z3BNWl8FSJB.GxnrDq', NULL, '2021-03-16 01:23:04', '2021-03-16 01:23:28', 'verified', NULL, NULL, 0, 'garage', NULL, NULL, '0', NULL),
(17, 'Test Redirection', 'test@redirection.com', NULL, '$2y$10$ryw6TD4OGbg7igi5aGA6/.XZ1K40Y/YzBxl2yJuk.66rVKB7YzTm2', NULL, '2021-04-08 07:46:42', '2021-04-08 07:46:42', 'not_verified', NULL, NULL, 0, 'consumer', NULL, NULL, '0', NULL),
(18, 'Test Redirection', 'test2@redirection.com', NULL, '$2y$10$XH3KSbITd3SAuP5CVyH2/OhJSvMqji/1vUP6rRMwkKXypjz0015he', NULL, '2021-04-08 07:50:39', '2021-04-08 07:50:39', 'not_verified', NULL, NULL, 0, 'consumer', NULL, NULL, '0', NULL),
(19, 'Test Redirection', 'test2@redirection2.com', NULL, '$2y$10$41WBgwK7W9Lc77nBprMeC.AWF0Zer7qF79WeeXiAklxkq.fhnR8z.', NULL, '2021-04-08 07:51:32', '2021-04-08 07:51:32', 'not_verified', NULL, NULL, 0, 'consumer', NULL, NULL, '0', NULL),
(20, 'John Doe', 'alexandar@gmail.com', '2021-04-15 11:27:51', '$2y$10$d9ukVg0JutPR5Evag5XT3OdaX.DrypNvFSemfi4hc2zQq8o1DsSI6', NULL, '2021-04-15 11:27:36', '2021-04-15 11:27:51', 'verified', NULL, NULL, 0, 'garage', NULL, NULL, '0', NULL),
(21, 'Test Test', 'tmohamad.zimama@rapidprotect.ml', NULL, '$2y$10$t3fHdPKA0XzOCRFxrRlCGOMHk3HruPjifSWskQNTNMm5KFU/gDerG', NULL, '2021-04-27 03:00:44', '2021-04-27 03:00:44', 'not_verified', NULL, NULL, 0, 'consumer', NULL, NULL, '0', NULL),
(22, 'Test Garage', 'test@garage.com', '2021-05-25 23:09:42', '$2y$10$FEeRwbYc0nDN6FyqHB/sTuY427eFpRtYWgTU9CwX0YgjZ/L/q4U8e', NULL, '2021-05-25 23:09:03', '2021-05-25 23:09:42', 'verified', NULL, NULL, 0, 'garage', NULL, NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_visits` int(11) NOT NULL DEFAULT 0,
  `agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `no_of_visits`, `agent`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', '2020-10-13 01:03:21', '2020-10-13 01:03:21'),
(2, '127.0.0.1', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', '2020-10-14 08:42:26', '2020-10-14 08:42:26'),
(3, '127.0.0.1', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', '2020-10-24 02:21:03', '2020-10-24 02:21:03'),
(4, '127.0.0.1', 3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', '2020-10-29 06:06:31', '2020-10-29 07:34:23'),
(5, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', '2020-11-04 07:58:43', '2021-06-04 01:22:02'),
(6, '127.0.0.1', 9, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', '2020-11-04 23:24:34', '2021-03-05 06:33:24'),
(7, '127.0.0.1', 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', '2021-01-12 02:09:29', '2021-01-12 02:30:37'),
(8, '127.0.0.1', 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', '2021-01-16 03:19:43', '2021-04-16 06:11:13'),
(9, '127.0.0.1', 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', '2021-01-18 06:20:33', '2021-01-18 06:22:16'),
(10, '127.0.0.1', 9, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', '2021-01-19 04:43:56', '2021-04-19 02:50:39'),
(11, '127.0.0.1', 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', '2021-01-20 02:57:19', '2021-01-20 07:16:17'),
(12, '127.0.0.1', 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', '2021-01-20 23:57:50', '2021-01-21 04:35:12'),
(13, '127.0.0.1', 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', '2021-01-22 01:25:29', '2021-01-22 06:37:23'),
(14, '127.0.0.1', 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-02 01:24:39', '2021-03-02 06:37:35'),
(15, '127.0.0.1', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', '2021-03-01 04:16:56', '2021-03-01 04:16:56'),
(16, '127.0.0.1', 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', '2021-03-02 23:52:29', '2021-03-03 06:32:54'),
(17, '127.0.0.1', 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', '2021-03-07 23:11:33', '2021-04-08 04:57:37'),
(18, '127.0.0.1', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', '2021-03-09 00:42:12', '2021-03-09 00:42:12'),
(19, '127.0.0.1', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', '2021-04-15 11:28:19', '2021-04-15 11:28:19'),
(20, '127.0.0.1', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36', '2021-05-07 05:27:31', '2021-05-07 05:27:31'),
(21, '127.0.0.1', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '2021-05-25 04:28:33', '2021-05-25 04:28:33'),
(22, '127.0.0.1', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '2021-05-25 23:09:56', '2021-05-25 23:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `working_hours`
--

CREATE TABLE `working_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `garage_profile_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_closed` tinyint(1) NOT NULL DEFAULT 0,
  `is_24` tinyint(1) NOT NULL DEFAULT 0,
  `opening_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closing_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `working_hours`
--

INSERT INTO `working_hours` (`id`, `garage_profile_id`, `day`, `is_closed`, `is_24`, `opening_time`, `closing_time`, `created_at`, `updated_at`) VALUES
(22, 1, 'Monday', 0, 1, '00:00', '23:59', '2020-09-21 02:00:36', '2020-09-21 02:00:36'),
(23, 1, 'Tuesday', 0, 1, '00:00', '23:59', '2020-09-21 02:00:36', '2020-09-21 02:00:36'),
(24, 1, 'Wednesday', 0, 1, '00:00', '23:59', '2020-09-21 02:00:36', '2020-09-21 02:00:36'),
(25, 1, 'Thursday', 0, 1, '00:00', '23:59', '2020-09-21 02:00:36', '2020-09-21 02:00:36'),
(26, 1, 'Friday', 0, 1, '00:00', '23:59', '2020-09-21 02:00:36', '2020-09-21 02:00:36'),
(27, 1, 'Saturday', 0, 1, '00:00', '23:59', '2020-09-21 02:00:36', '2020-09-21 02:00:36'),
(28, 1, 'Sunday', 1, 0, '00:00', '23:59', '2020-09-21 02:00:36', '2020-09-21 02:00:36'),
(29, 2, 'Monday', 0, 1, '00:00', '23:59', '2020-10-12 05:28:01', '2020-10-12 05:28:01'),
(30, 2, 'Tuesday', 0, 1, '00:00', '23:59', '2020-10-12 05:28:01', '2020-10-12 05:28:01'),
(31, 2, 'Wednesday', 0, 1, '00:00', '23:59', '2020-10-12 05:28:01', '2020-10-12 05:28:01'),
(32, 2, 'Thursday', 0, 1, '00:00', '23:59', '2020-10-12 05:28:01', '2020-10-12 05:28:01'),
(33, 2, 'Friday', 0, 1, '00:00', '23:59', '2020-10-12 05:28:01', '2020-10-12 05:28:01'),
(34, 2, 'Saturday', 0, 1, '00:00', '23:59', '2020-10-12 05:28:01', '2020-10-12 05:28:01'),
(35, 2, 'Sunday', 0, 1, '00:00', '23:59', '2020-10-12 05:28:01', '2020-10-12 05:28:01'),
(36, 3, 'Monday', 0, 0, '00:00', '23:59', '2020-10-13 05:26:28', '2020-10-13 05:26:28'),
(37, 3, 'Tuesday', 0, 0, '00:00', '23:59', '2020-10-13 05:26:28', '2020-10-13 05:26:28'),
(38, 3, 'Wednesday', 0, 0, '00:00', '23:59', '2020-10-13 05:26:28', '2020-10-13 05:26:28'),
(39, 3, 'Thursday', 0, 0, '00:00', '23:59', '2020-10-13 05:26:28', '2020-10-13 05:26:28'),
(40, 3, 'Friday', 0, 0, '00:00', '23:59', '2020-10-13 05:26:28', '2020-10-13 05:26:28'),
(41, 3, 'Saturday', 0, 0, '00:00', '23:59', '2020-10-13 05:26:28', '2020-10-13 05:26:28'),
(42, 3, 'Sunday', 0, 0, '00:00', '23:59', '2020-10-13 05:26:28', '2020-10-13 05:26:28'),
(43, 4, 'Monday', 1, 0, '09:00', '21:00', '2021-01-18 06:27:46', '2021-01-18 06:27:46'),
(44, 4, 'Tuesday', 0, 1, '00:00', '23:59', '2021-01-18 06:27:46', '2021-01-18 06:27:46'),
(45, 4, 'Wednesday', 0, 1, '00:00', '23:59', '2021-01-18 06:27:46', '2021-01-18 06:27:46'),
(46, 4, 'Thursday', 0, 1, '00:00', '23:59', '2021-01-18 06:27:46', '2021-01-18 06:27:46'),
(47, 4, 'Friday', 0, 0, '00:00', '23:59', '2021-01-18 06:27:46', '2021-01-18 06:27:46'),
(48, 4, 'Saturday', 0, 1, '00:00', '23:59', '2021-01-18 06:27:46', '2021-01-18 06:27:46'),
(49, 4, 'Sunday', 0, 1, '00:00', '23:59', '2021-01-18 06:27:46', '2021-01-18 06:27:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertising_transactions`
--
ALTER TABLE `advertising_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertising_transactions_garage_profile_id_foreign` (`garage_profile_id`),
  ADD KEY `advertising_transactions_garage_advertising_id_foreign` (`garage_advertising_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_consumer_vehicle_id_foreign` (`consumer_vehicle_id`),
  ADD KEY `bookings_consumer_profile_id_foreign` (`consumer_profile_id`),
  ADD KEY `bookings_garage_profile_id_foreign` (`garage_profile_id`);

--
-- Indexes for table `booking_images`
--
ALTER TABLE `booking_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_images_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `booking_services`
--
ALTER TABLE `booking_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_services_service_id_foreign` (`service_id`),
  ADD KEY `booking_services_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `consumer_profiles`
--
ALTER TABLE `consumer_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consumer_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `consumer_vehicles`
--
ALTER TABLE `consumer_vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consumer_vehicles_consumer_profile_id_foreign` (`consumer_profile_id`);

--
-- Indexes for table `customer_facilities`
--
ALTER TABLE `customer_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discounts_garage_profile_id_foreign` (`garage_profile_id`);

--
-- Indexes for table `enquiry_types`
--
ALTER TABLE `enquiry_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `garage_advertisings`
--
ALTER TABLE `garage_advertisings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `garage_advertisings_garage_profile_id_foreign` (`garage_profile_id`);

--
-- Indexes for table `garage_customer_facilities`
--
ALTER TABLE `garage_customer_facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `garage_customer_facilities_garage_profile_id_foreign` (`garage_profile_id`);

--
-- Indexes for table `garage_images`
--
ALTER TABLE `garage_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `garage_images_garage_profile_id_foreign` (`garage_profile_id`);

--
-- Indexes for table `garage_keywords`
--
ALTER TABLE `garage_keywords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `garage_keywords_garage_profile_id_foreign` (`garage_profile_id`);

--
-- Indexes for table `garage_payment_types`
--
ALTER TABLE `garage_payment_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `garage_payment_types_garage_profile_id_foreign` (`garage_profile_id`);

--
-- Indexes for table `garage_profiles`
--
ALTER TABLE `garage_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `garage_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `garage_profile_views`
--
ALTER TABLE `garage_profile_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `garage_profile_views_garage_profile_id_foreign` (`garage_profile_id`);

--
-- Indexes for table `garage_services`
--
ALTER TABLE `garage_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `garage_services_garage_profile_id_foreign` (`garage_profile_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_booking_id_foreign` (`booking_id`),
  ADD KEY `reports_user_id_foreign` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_consumer_profile_id_foreign` (`consumer_profile_id`),
  ADD KEY `reviews_garage_profile_id_foreign` (`garage_profile_id`),
  ADD KEY `reviews_booking_id_foreign` (`booking_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `saved_garages`
--
ALTER TABLE `saved_garages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saved_garages_consumer_profile_id_foreign` (`consumer_profile_id`),
  ADD KEY `saved_garages_garage_profile_id_foreign` (`garage_profile_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_ticket_id_unique` (`ticket_id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_attachments_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_attachments_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_hours`
--
ALTER TABLE `working_hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `working_hours_garage_profile_id_foreign` (`garage_profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertising_transactions`
--
ALTER TABLE `advertising_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking_images`
--
ALTER TABLE `booking_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `booking_services`
--
ALTER TABLE `booking_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consumer_profiles`
--
ALTER TABLE `consumer_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `consumer_vehicles`
--
ALTER TABLE `consumer_vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_facilities`
--
ALTER TABLE `customer_facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enquiry_types`
--
ALTER TABLE `enquiry_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `garage_advertisings`
--
ALTER TABLE `garage_advertisings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `garage_customer_facilities`
--
ALTER TABLE `garage_customer_facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `garage_images`
--
ALTER TABLE `garage_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `garage_keywords`
--
ALTER TABLE `garage_keywords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `garage_payment_types`
--
ALTER TABLE `garage_payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `garage_profiles`
--
ALTER TABLE `garage_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `garage_profile_views`
--
ALTER TABLE `garage_profile_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `garage_services`
--
ALTER TABLE `garage_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `saved_garages`
--
ALTER TABLE `saved_garages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `working_hours`
--
ALTER TABLE `working_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertising_transactions`
--
ALTER TABLE `advertising_transactions`
  ADD CONSTRAINT `advertising_transactions_garage_advertising_id_foreign` FOREIGN KEY (`garage_advertising_id`) REFERENCES `garage_advertisings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advertising_transactions_garage_profile_id_foreign` FOREIGN KEY (`garage_profile_id`) REFERENCES `garage_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_consumer_profile_id_foreign` FOREIGN KEY (`consumer_profile_id`) REFERENCES `consumer_profiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_consumer_vehicle_id_foreign` FOREIGN KEY (`consumer_vehicle_id`) REFERENCES `consumer_vehicles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_garage_profile_id_foreign` FOREIGN KEY (`garage_profile_id`) REFERENCES `garage_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_images`
--
ALTER TABLE `booking_images`
  ADD CONSTRAINT `booking_images_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_services`
--
ALTER TABLE `booking_services`
  ADD CONSTRAINT `booking_services_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `consumer_profiles`
--
ALTER TABLE `consumer_profiles`
  ADD CONSTRAINT `consumer_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `consumer_vehicles`
--
ALTER TABLE `consumer_vehicles`
  ADD CONSTRAINT `consumer_vehicles_consumer_profile_id_foreign` FOREIGN KEY (`consumer_profile_id`) REFERENCES `consumer_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_garage_profile_id_foreign` FOREIGN KEY (`garage_profile_id`) REFERENCES `garage_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `garage_advertisings`
--
ALTER TABLE `garage_advertisings`
  ADD CONSTRAINT `garage_advertisings_garage_profile_id_foreign` FOREIGN KEY (`garage_profile_id`) REFERENCES `garage_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `garage_customer_facilities`
--
ALTER TABLE `garage_customer_facilities`
  ADD CONSTRAINT `garage_customer_facilities_garage_profile_id_foreign` FOREIGN KEY (`garage_profile_id`) REFERENCES `garage_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `garage_images`
--
ALTER TABLE `garage_images`
  ADD CONSTRAINT `garage_images_garage_profile_id_foreign` FOREIGN KEY (`garage_profile_id`) REFERENCES `garage_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `garage_keywords`
--
ALTER TABLE `garage_keywords`
  ADD CONSTRAINT `garage_keywords_garage_profile_id_foreign` FOREIGN KEY (`garage_profile_id`) REFERENCES `garage_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `garage_payment_types`
--
ALTER TABLE `garage_payment_types`
  ADD CONSTRAINT `garage_payment_types_garage_profile_id_foreign` FOREIGN KEY (`garage_profile_id`) REFERENCES `garage_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `garage_profiles`
--
ALTER TABLE `garage_profiles`
  ADD CONSTRAINT `garage_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `garage_profile_views`
--
ALTER TABLE `garage_profile_views`
  ADD CONSTRAINT `garage_profile_views_garage_profile_id_foreign` FOREIGN KEY (`garage_profile_id`) REFERENCES `garage_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `garage_services`
--
ALTER TABLE `garage_services`
  ADD CONSTRAINT `garage_services_garage_profile_id_foreign` FOREIGN KEY (`garage_profile_id`) REFERENCES `garage_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_consumer_profile_id_foreign` FOREIGN KEY (`consumer_profile_id`) REFERENCES `consumer_profiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_garage_profile_id_foreign` FOREIGN KEY (`garage_profile_id`) REFERENCES `garage_profiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `saved_garages`
--
ALTER TABLE `saved_garages`
  ADD CONSTRAINT `saved_garages_consumer_profile_id_foreign` FOREIGN KEY (`consumer_profile_id`) REFERENCES `consumer_profiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `saved_garages_garage_profile_id_foreign` FOREIGN KEY (`garage_profile_id`) REFERENCES `consumer_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  ADD CONSTRAINT `ticket_attachments_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_attachments_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `working_hours`
--
ALTER TABLE `working_hours`
  ADD CONSTRAINT `working_hours_garage_profile_id_foreign` FOREIGN KEY (`garage_profile_id`) REFERENCES `garage_profiles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
