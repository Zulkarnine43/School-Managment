-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2022 at 12:15 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_employee_salaries`
--

DROP TABLE IF EXISTS `account_employee_salaries`;
CREATE TABLE IF NOT EXISTS `account_employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_other_costs`
--

DROP TABLE IF EXISTS `account_other_costs`;
CREATE TABLE IF NOT EXISTS `account_other_costs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_other_costs`
--

INSERT INTO `account_other_costs` (`id`, `date`, `amount`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '2021-02-04', 900, 'gjh', '202101311157Capture er diagram.PNG', '2021-01-31 05:57:45', '2021-01-31 05:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `account_student_fees`
--

DROP TABLE IF EXISTS `account_student_fees`;
CREATE TABLE IF NOT EXISTS `account_student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `year_id`, `class_id`, `student_id`, `fee_category_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(23, 3, 1, 38, 1, '2020-12', 950, '2021-06-20 20:18:12', '2021-06-20 20:18:12'),
(22, 3, 1, 37, 1, '2020-12', 950, '2021-06-20 20:18:12', '2021-06-20 20:18:12'),
(21, 3, 1, 35, 1, '2020-12', 950, '2021-06-20 20:18:12', '2021-06-20 20:18:12'),
(20, 3, 1, 35, 2, '2021-01', 475, '2021-02-03 01:15:33', '2021-02-03 01:15:33'),
(19, 3, 1, 35, 2, '2021-02', 475, '2021-02-03 01:14:20', '2021-02-03 01:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `subject_name`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'bangla', NULL, NULL, '2021-04-07 01:45:12', '2021-04-07 01:45:12'),
(2, 'bd', NULL, NULL, '2021-04-07 01:55:20', '2021-04-07 01:55:20'),
(3, 'English', NULL, '37', '2021-04-07 01:57:46', '2021-04-07 01:57:46'),
(4, 'bdcrowdfunding', NULL, '37', '2021-04-07 01:58:28', '2021-04-07 01:58:28'),
(5, 'bangla', 'default.png', '37', '2021-04-07 02:17:31', '2021-04-07 02:17:31'),
(6, 'bd', 'default.png', '37', '2021-04-07 02:27:28', '2021-04-07 02:27:28'),
(7, 'bangla', 'default.png', '37', '2021-04-07 02:28:39', '2021-04-07 02:28:39'),
(8, 'English', 'default.png', '37', '2021-04-07 02:48:26', '2021-04-07 02:48:26'),
(9, 'English', 'default.png', '37', '2021-04-07 02:49:39', '2021-04-07 02:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

DROP TABLE IF EXISTS `assign_students`;
CREATE TABLE IF NOT EXISTS `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL COMMENT 'user_id=student_id',
  `roll` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(27, 35, 1, 1, 3, NULL, 1, '2021-02-03 01:07:46', '2021-04-07 13:44:52'),
(28, 37, 2, 1, 3, NULL, 1, '2021-02-03 23:02:38', '2021-04-07 13:44:52'),
(29, 38, 3, 1, 3, NULL, 1, '2021-04-07 13:36:44', '2021-04-07 13:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

DROP TABLE IF EXISTS `assign_subjects`;
CREATE TABLE IF NOT EXISTS `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double(8,2) DEFAULT NULL,
  `pass_mark` double(8,2) DEFAULT NULL,
  `subjective_mark` double(8,2) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(21, 1, 1, 100.00, 33.00, 100.00, 1, NULL, '2021-02-03 01:04:19', '2021-02-03 01:04:19'),
(22, 1, 2, 100.00, 33.00, 100.00, 1, NULL, '2021-02-03 01:04:19', '2021-02-03 01:04:19'),
(23, 1, 3, 100.00, 33.00, 100.00, 1, NULL, '2021-02-03 01:04:19', '2021-02-03 01:04:19'),
(24, 2, 1, 100.00, 33.00, 100.00, 1, NULL, '2021-02-03 01:05:12', '2021-02-03 01:05:12'),
(25, 2, 2, 100.00, 33.00, 100.00, 1, NULL, '2021-02-03 01:05:12', '2021-02-03 01:05:12'),
(26, 2, 3, 100.00, 33.00, 100.00, 1, NULL, '2021-02-03 01:05:12', '2021-02-03 01:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
CREATE TABLE IF NOT EXISTS `designations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `designations_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Principal', 1, 1, NULL, '2020-07-24 01:58:46', '2020-07-24 01:58:46'),
(2, 'Head Master', 1, 1, NULL, '2020-07-24 01:58:56', '2020-07-24 01:58:56'),
(3, 'Assistant Teacher', 1, 1, NULL, '2020-07-24 01:59:05', '2020-07-24 01:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

DROP TABLE IF EXISTS `discount_students`;
CREATE TABLE IF NOT EXISTS `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, '2020-07-24 02:01:15', '2020-07-24 02:01:15'),
(2, 2, 1, 20, '2020-07-24 02:19:56', '2020-07-24 02:19:56'),
(3, 3, 1, 10, '2020-07-24 02:20:36', '2020-07-24 02:20:36'),
(4, 4, 1, 20, '2020-07-24 02:21:01', '2020-07-24 02:21:01'),
(5, 5, 1, 3, '2020-07-24 02:21:54', '2020-07-24 02:21:54'),
(6, 6, 1, 30, '2020-07-24 02:23:01', '2020-07-24 02:23:01'),
(7, 7, 1, 35, '2020-07-24 02:24:01', '2020-07-24 02:24:01'),
(8, 8, 1, 5, '2021-01-28 11:54:12', '2021-01-28 11:54:12'),
(9, 9, 1, 10, '2021-01-28 11:55:29', '2021-01-28 11:55:29'),
(10, 10, 1, 3, '2021-01-29 07:41:43', '2021-01-29 07:41:43'),
(11, 11, 1, 5, '2021-01-30 05:46:01', '2021-01-30 05:46:01'),
(12, 12, 1, 5, '2021-01-30 06:24:25', '2021-01-30 06:24:25'),
(13, 13, 1, 5, '2021-01-30 06:32:49', '2021-01-30 06:32:49'),
(14, 14, 1, 5, '2021-01-30 06:34:37', '2021-01-30 06:34:37'),
(15, 15, 1, 5, '2021-01-30 06:36:16', '2021-01-30 06:36:16'),
(16, 16, 1, 5, '2021-01-30 06:37:26', '2021-01-30 06:37:26'),
(17, 17, 1, 5, '2021-01-30 08:56:09', '2021-01-30 08:56:09'),
(18, 18, 1, 5, '2021-01-30 08:59:12', '2021-01-30 08:59:12'),
(19, 19, 1, 5, '2021-01-30 09:11:59', '2021-01-30 09:11:59'),
(20, 20, 1, 5, '2021-01-30 09:16:10', '2021-01-30 09:16:10'),
(21, 21, 1, 5, '2021-01-30 09:55:46', '2021-01-30 09:55:46'),
(22, 22, 1, 5, '2021-01-30 09:57:43', '2021-01-30 09:57:43'),
(23, 23, 1, 5, '2021-01-30 10:01:47', '2021-01-30 10:01:47'),
(24, 24, 1, 5, '2021-02-01 08:13:40', '2021-02-01 08:13:40'),
(25, 25, 1, 5, '2021-02-01 08:13:42', '2021-02-01 08:13:42'),
(26, 26, 1, 5, '2021-02-02 23:51:27', '2021-02-02 23:51:27'),
(27, 27, 1, 5, '2021-02-03 01:07:46', '2021-02-03 01:07:46'),
(28, 28, 1, 5, '2021-02-03 23:02:38', '2021-02-03 23:02:38'),
(29, 29, 1, 5, '2021-04-07 13:36:44', '2021-04-07 13:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

DROP TABLE IF EXISTS `employee_attendances`;
CREATE TABLE IF NOT EXISTS `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `date` date NOT NULL,
  `attend_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `date`, `attend_status`, `created_at`, `updated_at`) VALUES
(1, 8, '2021-01-29', 'Absent', '2021-01-28 12:03:14', '2021-01-28 12:03:14'),
(2, 9, '2021-01-29', 'Present', '2021-01-28 12:03:14', '2021-01-28 12:03:14'),
(3, 10, '2021-01-29', 'Present', '2021-01-28 12:03:14', '2021-01-28 12:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

DROP TABLE IF EXISTS `employee_leaves`;
CREATE TABLE IF NOT EXISTS `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `leave_purpose_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_purpose_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 8, 2, '2020-07-25', '2020-07-26', '2020-07-24 04:01:33', '2020-07-24 04:01:33'),
(2, 9, 3, '2020-07-30', '2020-07-31', '2020-07-24 04:04:16', '2020-07-24 04:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_logs`
--

DROP TABLE IF EXISTS `employee_salary_logs`;
CREATE TABLE IF NOT EXISTS `employee_salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `previous_salary` double DEFAULT NULL,
  `present_salary` double DEFAULT NULL,
  `increment_salary` double DEFAULT NULL,
  `effected_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary_logs`
--

INSERT INTO `employee_salary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_date`, `created_at`, `updated_at`) VALUES
(1, 8, 3000, 3000, 0, '2019-01-01', '2020-07-24 02:28:45', '2020-07-24 02:28:45'),
(2, 9, 8000, 8000, 0, '2019-01-02', '2020-07-24 02:30:11', '2020-07-24 02:30:11'),
(3, 10, 10000, 10000, 0, '2019-01-03', '2020-07-24 02:31:07', '2020-07-24 02:31:07'),
(4, 8, 3000, 4000, 1000, '2019-12-31', '2020-07-24 02:32:41', '2020-07-24 02:32:41'),
(5, 9, 8000, 9500, 1500, '2019-12-31', '2020-07-24 02:33:11', '2020-07-24 02:33:11'),
(6, 10, 10000, 12000, 2000, '2019-12-31', '2020-07-24 02:33:26', '2020-07-24 02:33:26'),
(7, 28, 9995, 9995, 0, '2021-02-02', '2021-01-31 14:28:50', '2021-01-31 14:28:50'),
(8, 29, 10000, 10000, 0, '2021-02-10', '2021-01-31 15:02:55', '2021-01-31 15:02:55'),
(9, 30, 8000, 8000, 0, '2021-02-10', '2021-02-01 00:36:07', '2021-02-01 00:36:07'),
(10, 31, 9000, 9000, 0, '2021-02-02', '2021-02-01 00:38:27', '2021-02-01 00:38:27'),
(11, 36, 1000, 1000, 0, '2021-02-03', '2021-02-03 10:21:30', '2021-02-03 10:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

DROP TABLE IF EXISTS `exam_types`;
CREATE TABLE IF NOT EXISTS `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `exam_types_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1st Terminal Examination', 1, 1, NULL, '2020-07-24 01:51:59', '2020-07-24 01:51:59'),
(2, '2nd Terminal Examination', 1, 1, NULL, '2020-07-24 01:52:08', '2020-07-24 01:52:08'),
(3, 'Final Examination', 1, 1, NULL, '2020-07-24 01:52:21', '2020-07-24 01:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

DROP TABLE IF EXISTS `fee_categories`;
CREATE TABLE IF NOT EXISTS `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fee_categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Registration Fee', 1, 1, NULL, '2020-07-24 01:48:35', '2020-07-24 01:48:35'),
(2, 'Monthly Fee', 1, 1, NULL, '2020-07-24 01:48:50', '2020-07-24 01:48:50'),
(3, 'Exam Fee', 1, 1, NULL, '2020-07-24 01:49:01', '2020-07-24 01:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `fee_category_amounts`
--

DROP TABLE IF EXISTS `fee_category_amounts`;
CREATE TABLE IF NOT EXISTS `fee_category_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `class_id`, `fee_category_id`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1000.00, 1, 1, '2020-07-24 01:49:51', '2021-02-03 00:30:35'),
(2, 2, 1, 1500.00, 1, 1, '2020-07-24 01:49:51', '2021-02-03 00:30:35'),
(6, 1, 2, 500.00, 1, 1, '2020-07-24 01:50:45', '2021-02-03 00:30:56'),
(7, 2, 2, 1000.00, 1, 1, '2020-07-24 01:50:45', '2021-02-03 00:30:56'),
(11, 1, 3, 300.00, 1, 1, '2020-07-24 01:51:32', '2021-02-03 00:31:10'),
(12, 2, 3, 600.00, 1, 1, '2020-07-24 01:51:32', '2021-02-03 00:31:10'),
(16, 1, 3, 100.00, 1, NULL, '2021-06-20 03:50:22', '2021-06-20 03:50:22'),
(17, 1, 3, 100.00, 1, NULL, '2021-06-20 03:50:22', '2021-06-20 03:50:22'),
(18, 2, 3, 100.00, 1, NULL, '2021-06-20 03:50:22', '2021-06-20 03:50:22'),
(19, 7, 3, 100.00, 1, NULL, '2021-06-20 03:50:22', '2021-06-20 03:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Science', 1, 1, NULL, '2020-07-24 01:47:25', '2020-07-24 01:47:25'),
(2, 'Arts', 1, 1, NULL, '2020-07-24 01:47:39', '2020-07-24 01:47:39'),
(3, 'Commerce', 1, 1, NULL, '2020-07-24 01:47:48', '2020-07-24 01:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `leave_purposes`
--

DROP TABLE IF EXISTS `leave_purposes`;
CREATE TABLE IF NOT EXISTS `leave_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `leave_purposes_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_purposes`
--

INSERT INTO `leave_purposes` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Family Purpose', 1, NULL, '2020-07-24 02:34:12', '2020-07-24 02:34:12'),
(2, 'Personal Purpose', 1, NULL, '2020-07-24 04:01:33', '2020-07-24 04:01:33'),
(3, 'Physical Problem', 1, NULL, '2020-07-24 04:04:16', '2020-07-24 04:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `marks_grades`
--

DROP TABLE IF EXISTS `marks_grades`;
CREATE TABLE IF NOT EXISTS `marks_grades` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks_grades`
--

INSERT INTO `marks_grades` (`id`, `grade_name`, `grade_point`, `start_marks`, `end_marks`, `start_point`, `end_point`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'A+', '5.00', '80', '100', '5.00', '5.00', 'excellent', '2021-01-29 07:52:12', '2021-01-29 07:52:12'),
(2, 'A', '4.00', '70', '79', '4.00', '4.99', 'average', '2021-01-29 22:36:01', '2021-01-29 22:36:01'),
(3, 'A-', '3.50', '60', '69', '3.50', '4.00', 'average', '2021-01-29 22:38:04', '2021-02-03 00:17:24'),
(4, 'B', '3.00', '50', '59', '3.00', '3.49', 'average', '2021-01-29 22:39:18', '2021-01-29 22:39:18'),
(5, 'C', '2.00', '40', '49', '2.00', '2.99', 'Bad', '2021-01-29 22:40:48', '2021-01-29 22:40:48'),
(6, 'D', '1.00', '33', '39', '1.00', '1.99', 'very bad', '2021-01-29 22:45:27', '2021-01-29 22:45:27'),
(7, 'F', '0.00', '0', '32', '0.00', '0.99', 'Fall', '2021-01-29 22:46:28', '2021-01-29 22:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_29_154735_create_student_classes_table', 1),
(5, '2020_06_29_172026_create_years_table', 1),
(6, '2020_06_29_175631_create_groups_table', 1),
(7, '2020_06_30_030524_create_shifts_table', 1),
(8, '2020_06_30_032444_create_fee_categories_table', 1),
(9, '2020_06_30_062418_create_fee_category_amounts_table', 1),
(10, '2020_07_01_042527_create_exam_types_table', 1),
(11, '2020_07_01_044523_create_subjects_table', 1),
(12, '2020_07_13_073320_create_assign_subjects_table', 1),
(13, '2020_07_13_094043_create_designations_table', 1),
(14, '2020_07_22_151054_create_schools_table', 1),
(15, '2020_07_22_154522_create_assign_students_table', 1),
(16, '2020_07_22_154540_create_discount_students_table', 1),
(17, '2020_07_23_134554_create_employee_salary_logs_table', 1),
(18, '2020_07_24_054152_create_leave_purposes_table', 1),
(19, '2020_07_24_054430_create_employee_leaves_table', 1),
(20, '2020_07_29_153136_create_employee_attendances_table', 2),
(22, '2020_08_15_184417_create_marks_grades_table', 2),
(23, '2020_08_28_114733_create_account_student_fees_table', 2),
(24, '2020_08_28_173640_create_account_employee_salaries_table', 2),
(25, '2020_08_29_130927_create_account_other_costs_table', 2),
(26, '2021_01_30_105259_create_roles_table', 3),
(27, '2021_03_23_073131_create_assignments_table', 3),
(28, '2021_04_07_074146_create_userassigs_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `address`, `phone`, `mobile`, `email`, `website`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'School management ', 'dhaka', '01718017757', '01713060135', 'aliabegum@gmail.com', 'School management ', '202007240745202007201451school.png', 1, '2020-07-24 01:45:17', '2020-07-24 01:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

DROP TABLE IF EXISTS `shifts`;
CREATE TABLE IF NOT EXISTS `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shifts_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'A Shift', 1, 1, NULL, '2020-07-24 01:48:06', '2020-07-24 01:48:06'),
(2, 'B Shift', 1, 1, NULL, '2020-07-24 01:48:18', '2020-07-24 01:48:18'),
(3, 'C', 1, 1, NULL, '2021-02-03 22:56:11', '2021-02-03 22:56:11'),
(4, '1', 1, 1, NULL, '2021-02-03 22:56:42', '2021-02-03 22:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

DROP TABLE IF EXISTS `student_classes`;
CREATE TABLE IF NOT EXISTS `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_classes_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'One', 1, 1, NULL, '2020-07-24 01:46:00', '2020-07-24 01:46:00'),
(2, 'Two', 1, 1, NULL, '2020-07-24 01:46:11', '2020-07-24 01:46:11'),
(7, 'three', 1, 1, NULL, '2021-02-03 22:55:52', '2021-02-03 22:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

DROP TABLE IF EXISTS `student_marks`;
CREATE TABLE IF NOT EXISTS `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL COMMENT 'student_id=user_id',
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `assign_subject_id` int(11) DEFAULT NULL,
  `exam_type_id` int(11) DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `id_no`, `year_id`, `class_id`, `assign_subject_id`, `exam_type_id`, `marks`, `created_at`, `updated_at`) VALUES
(39, 35, '20210001', 3, 1, 21, 1, 100, '2021-02-03 09:51:59', '2021-02-03 09:51:59'),
(42, 35, '20210001', 3, 1, 23, 1, 80, '2021-04-07 13:54:17', '2021-04-07 13:54:17'),
(40, 35, '20210001', 3, 1, 22, 1, 100, '2021-02-03 10:08:05', '2021-02-03 10:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subjects_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bangla', 1, 1, NULL, '2020-07-24 01:53:48', '2020-07-24 01:53:48'),
(2, 'English', 1, 1, NULL, '2020-07-24 01:53:58', '2020-07-24 01:53:58'),
(3, 'Mathematics', 1, 1, NULL, '2020-07-24 01:54:08', '2020-07-24 01:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `userassigs`
--

DROP TABLE IF EXISTS `userassigs`;
CREATE TABLE IF NOT EXISTS `userassigs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'student,employee,admin',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin=head of software,operator=computer operator,user=employee',
  `role_id` int(11) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `username`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `role_id`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'aminul islam', 'admin01', 'aminulcub@gmail.com', NULL, '$2y$10$A/JoxU2Swnl3iwk.4hS4LetKQJG9SNkzj7kGVVSwW5kb37tRkaTlG', '01727908089', 'Bangladesh', 'Male', '202007240826img-pro-01.jpg', NULL, NULL, NULL, NULL, NULL, '12345678', '1', 1, NULL, NULL, NULL, 1, NULL, '2020-07-23 18:00:00', '2021-02-03 10:01:05'),
(36, 'employee', 'aminul islam', 'am0002', 'aminulb@gmail.com', NULL, '$2y$10$XI/qA/Ps9tPHz2aur.QGS.Z4t3MeJnq4YEJ8KniXjhOBzjPSPhpA.', '01727908089', 'Bangladesh', 'male', '202102031621Slide1.jpg', 'Father\'s Name', 'Mother\'s', 'islam', '2021020001', '2019-12-29', '2842', NULL, 3, '2021-02-03', 2, 1000, 1, NULL, '2021-02-03 10:21:30', '2021-02-03 10:21:30'),
(37, 'student', 'rafiqul', 'ul0036', 'aminuld@gmail.com', NULL, '$2y$10$FkDy1MvmZm4uyygelNy1YO66fbtSSf8x/Gr3S/WuBVcff0f5zP6fu', '01829139870', 'Bangladesh', 'male', '202102040502Slide1.jpg', 'Father\'s Name', 'Mother\'s', 'islam', '20210036', '2019-01-04', '8110', NULL, 2, NULL, NULL, NULL, 1, NULL, '2021-02-03 23:02:38', '2021-02-03 23:02:38'),
(38, 'student', 'Aminul Islam', 'am0038', 'aminulu@gmail.com', NULL, '$2y$10$SM4Em9I6ksiaQwmPPRMrrekzliM2kyLYzB2gm1xyhJw1BIZnnGgCK', '01727908089', 'Bangladesh', 'male', '202104071936Slide1.jpg', 'khijirul Islam', 'jannatul ferdous', 'islam', '20210038', '1997-01-08', '9592', NULL, 2, NULL, NULL, NULL, 1, NULL, '2021-04-07 13:36:44', '2021-04-07 13:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

DROP TABLE IF EXISTS `years`;
CREATE TABLE IF NOT EXISTS `years` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `years_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '2019', 1, 1, NULL, '2020-07-24 01:46:58', '2020-07-24 01:46:58'),
(2, '2020', 1, 1, NULL, '2020-07-24 01:47:09', '2020-07-24 01:47:09'),
(3, '2021', 1, 1, 1, '2021-01-28 12:18:29', '2021-02-02 15:12:48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
