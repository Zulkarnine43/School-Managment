-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 05, 2021 at 03:06 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_employee_salaries`
--

INSERT INTO `account_employee_salaries` (`id`, `employee_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 15, '2020-11', 1353.3333333333, '2020-11-03 14:20:24', '2020-11-03 14:20:24'),
(2, 16, '2020-11', 1000, '2020-11-03 14:20:24', '2020-11-03 14:20:24');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_other_costs`
--

INSERT INTO `account_other_costs` (`id`, `date`, `amount`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, '2020-11-01', 5000, 'Note Book and marker pen', NULL, '2020-11-03 14:21:10', '2020-11-03 14:21:10');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `year_id`, `class_id`, `student_id`, `fee_category_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 12, 1, '2020-11', 700, '2020-11-03 14:18:56', '2020-11-03 14:18:56'),
(2, 2, 1, 13, 1, '2020-11', 1000, '2020-11-03 14:18:56', '2020-11-03 14:18:56'),
(3, 2, 1, 14, 1, '2020-11', 1000, '2020-11-03 14:18:56', '2020-11-03 14:18:56'),
(4, 2, 1, 12, 2, '2020-10', 140, '2020-11-03 14:19:38', '2020-11-03 14:19:38'),
(5, 2, 1, 13, 2, '2020-10', 200, '2020-11-03 14:19:38', '2020-11-03 14:19:38'),
(6, 2, 1, 14, 2, '2020-10', 200, '2020-11-03 14:19:38', '2020-11-03 14:19:38');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 1, 2, NULL, NULL, '2020-10-19 11:29:50', '2020-11-03 14:05:01'),
(2, 13, 2, 1, 2, NULL, NULL, '2020-10-19 11:30:53', '2020-11-03 14:05:01'),
(3, 14, 3, 1, 2, NULL, NULL, '2020-10-19 11:31:48', '2020-11-03 14:05:01');

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:55:38', '2020-07-24 01:55:38'),
(2, 1, 2, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:55:38', '2020-07-24 01:55:38'),
(3, 1, 3, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:55:38', '2020-07-24 01:55:38'),
(4, 1, 4, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:55:38', '2020-07-24 01:55:38'),
(5, 2, 1, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:56:20', '2020-07-24 01:56:20'),
(6, 2, 2, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:56:20', '2020-07-24 01:56:20'),
(7, 2, 3, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:56:20', '2020-07-24 01:56:20'),
(8, 2, 4, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:56:21', '2020-07-24 01:56:21'),
(9, 3, 1, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:57:01', '2020-07-24 01:57:01'),
(10, 3, 2, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:57:01', '2020-07-24 01:57:01'),
(11, 3, 3, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:57:01', '2020-07-24 01:57:01'),
(12, 3, 4, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:57:01', '2020-07-24 01:57:01'),
(13, 4, 1, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:57:39', '2020-07-24 01:57:39'),
(14, 4, 2, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:57:39', '2020-07-24 01:57:39'),
(15, 4, 3, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:57:39', '2020-07-24 01:57:39'),
(16, 4, 4, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:57:39', '2020-07-24 01:57:39'),
(26, 5, 1, 100.00, 33.00, 100.00, 1, NULL, '2020-11-03 14:01:28', '2020-11-03 14:01:28'),
(27, 5, 2, 100.00, 33.00, 100.00, 1, NULL, '2020-11-03 14:01:28', '2020-11-03 14:01:28'),
(28, 5, 3, 100.00, 33.00, 100.00, 1, NULL, '2020-11-03 14:01:29', '2020-11-03 14:01:29'),
(29, 5, 4, 100.00, 33.00, 100.00, 1, NULL, '2020-11-03 14:01:29', '2020-11-03 14:01:29');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(8, 8, 1, 25, '2020-08-09 07:32:49', '2020-08-09 07:32:49'),
(9, 1, 1, 30, '2020-10-19 11:29:50', '2020-10-19 11:29:50'),
(10, 2, 1, 0, '2020-10-19 11:30:53', '2020-10-19 11:30:53'),
(11, 3, 1, 0, '2020-10-19 11:31:48', '2020-10-19 11:31:48');

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
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `date`, `attend_status`, `created_at`, `updated_at`) VALUES
(48, 17, '2020-11-04', 'Present', '2020-11-03 14:13:48', '2020-11-03 14:13:48'),
(47, 16, '2020-11-04', 'Present', '2020-11-03 14:13:48', '2020-11-03 14:13:48'),
(46, 15, '2020-11-04', 'Present', '2020-11-03 14:13:48', '2020-11-03 14:13:48'),
(42, 17, '2020-11-03', 'Present', '2020-11-03 14:12:53', '2020-11-03 14:12:53'),
(41, 16, '2020-11-03', 'Present', '2020-11-03 14:12:53', '2020-11-03 14:12:53'),
(40, 15, '2020-11-03', 'Absent', '2020-11-03 14:12:53', '2020-11-03 14:12:53'),
(39, 17, '2020-11-02', 'Present', '2020-11-03 14:12:28', '2020-11-03 14:12:28'),
(38, 16, '2020-11-02', 'Present', '2020-11-03 14:12:28', '2020-11-03 14:12:28'),
(37, 15, '2020-11-02', 'Present', '2020-11-03 14:12:28', '2020-11-03 14:12:28'),
(45, 15, '2020-11-01', 'Present', '2020-11-03 14:13:35', '2020-11-03 14:13:35'),
(44, 16, '2020-11-01', 'Present', '2020-11-03 14:13:35', '2020-11-03 14:13:35'),
(43, 17, '2020-11-01', 'Leave', '2020-11-03 14:13:35', '2020-11-03 14:13:35');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_purpose_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(3, 15, 4, '2020-11-01', '2020-11-01', '2020-11-03 14:11:13', '2020-11-03 14:11:13');

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
(7, 15, 1000, 1000, 0, '2020-09-01', '2020-10-23 22:39:25', '2020-10-23 22:39:25'),
(8, 16, 1000, 1000, 0, '2020-09-01', '2020-10-23 22:40:03', '2020-10-23 22:40:03'),
(9, 17, 1000, 1000, 0, '2020-09-01', '2020-10-23 22:43:58', '2020-10-23 22:43:58'),
(10, 15, 1000, 1200, 200, '2020-11-01', '2020-11-03 14:08:53', '2020-11-03 14:08:53'),
(11, 15, 1200, 1400, 200, '2020-12-01', '2020-11-03 14:09:56', '2020-11-03 14:09:56');

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `class_id`, `fee_category_id`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(37, 1, 1, 1000.00, 1, 1, '2020-08-11 02:27:33', '2020-08-11 02:27:33'),
(38, 2, 1, 1500.00, 1, 1, '2020-08-11 02:27:33', '2020-08-11 02:27:33'),
(39, 3, 1, 2000.00, 1, 1, '2020-08-11 02:27:33', '2020-08-11 02:27:33'),
(40, 4, 1, 2500.00, 1, 1, '2020-08-11 02:27:33', '2020-08-11 02:27:33'),
(41, 5, 1, 3000.00, 1, 1, '2020-08-11 02:27:33', '2020-08-11 02:27:33'),
(42, 1, 2, 200.00, 1, 1, '2020-11-03 13:26:43', '2020-11-03 13:26:52'),
(43, 2, 2, 200.00, 1, 1, '2020-11-03 13:26:43', '2020-11-03 13:26:52'),
(44, 3, 2, 300.00, 1, 1, '2020-11-03 13:26:43', '2020-11-03 13:26:52'),
(45, 4, 2, 300.00, 1, 1, '2020-11-03 13:26:43', '2020-11-03 13:26:52'),
(46, 5, 2, 500.00, 1, 1, '2020-11-03 13:26:43', '2020-11-03 13:26:52'),
(47, 1, 3, 200.00, 1, NULL, '2020-11-03 13:58:13', '2020-11-03 13:58:13'),
(48, 2, 3, 200.00, 1, NULL, '2020-11-03 13:58:13', '2020-11-03 13:58:13'),
(49, 3, 3, 300.00, 1, NULL, '2020-11-03 13:58:13', '2020-11-03 13:58:13'),
(50, 4, 3, 300.00, 1, NULL, '2020-11-03 13:58:13', '2020-11-03 13:58:13'),
(51, 5, 3, 500.00, 1, NULL, '2020-11-03 13:58:13', '2020-11-03 13:58:13');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_purposes`
--

INSERT INTO `leave_purposes` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Family Problem', 1, 1, '2020-07-24 02:34:12', '2020-07-25 03:03:52'),
(2, 'Personal Problem', 1, 1, '2020-07-24 04:01:33', '2020-07-25 03:04:01'),
(4, 'Physical Problem', 1, NULL, '2020-11-03 14:11:13', '2020-11-03 14:11:13');

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
(1, 'A+', '5', '80', '99', '5', '5', 'Excellent', '2020-08-15 13:02:43', '2020-08-15 13:05:33'),
(2, 'A', '4', '70', '79', '4', '4.99', 'Very Good', '2020-08-15 13:06:42', '2020-08-15 13:06:42'),
(3, 'A-', '3.5', '60', '69', '3.5', '4', 'Good', '2020-08-15 13:07:21', '2020-08-15 13:07:21'),
(4, 'B', '3', '50', '59', '3', '3.49', 'Average', '2020-08-15 13:08:11', '2020-08-15 13:08:11'),
(5, 'C', '2', '40', '49', '2', '2.99', 'Disappoint', '2020-08-15 13:08:50', '2020-08-15 13:08:50'),
(6, 'D', '1', '33', '39', '1', '1.99', 'Bad', '2020-08-15 13:09:21', '2020-08-15 13:09:21'),
(7, 'F', '0', '00', '32', '0', '0.99', 'Fail', '2020-08-15 13:10:09', '2020-08-15 13:10:09');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(21, '2020_07_29_153136_create_employee_attendances_table', 2),
(22, '2020_08_09_143733_create_student_marks_table', 3),
(25, '2020_08_15_184417_create_marks_grades_table', 4),
(28, '2020_08_28_114733_create_account_student_fees_table', 5),
(29, '2020_08_28_173640_create_account_employee_salaries_table', 6),
(31, '2020_08_29_130927_create_account_other_costs_table', 7);

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
(1, 'Alia Begum Modern School', 'Kushtia Sadar, Kushtia-7000', '01718017757', '01713060135', 'aliabegum@gmail.com', 'https:\\\\www.aliabegum.com', '202007240745202007201451school.png', 1, '2020-07-24 01:45:17', '2020-07-24 01:45:17');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'A Shift', 1, 1, NULL, '2020-07-24 01:48:06', '2020-07-24 01:48:06'),
(2, 'B Shift', 1, 1, NULL, '2020-07-24 01:48:18', '2020-07-24 01:48:18');

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
(3, 'Three', 1, 1, NULL, '2020-07-24 01:46:24', '2020-07-24 01:46:24'),
(4, 'Four', 1, 1, NULL, '2020-07-24 01:46:36', '2020-07-24 01:46:36'),
(5, 'Five', 1, 1, NULL, '2020-07-24 01:46:45', '2020-07-24 01:46:45'),
(6, 'Sixe', 1, 1, NULL, '2020-11-03 13:54:49', '2020-11-03 13:54:49'),
(7, 'Ten', 1, 1, NULL, '2020-11-06 05:09:51', '2020-11-06 05:09:51');

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `id_no`, `year_id`, `class_id`, `assign_subject_id`, `exam_type_id`, `marks`, `created_at`, `updated_at`) VALUES
(3, 14, '20200014', 2, 1, 1, 1, 81, '2020-10-19 11:38:22', '2020-10-19 11:38:22'),
(2, 13, '20200013', 2, 1, 1, 1, 65, '2020-10-19 11:38:22', '2020-10-19 11:38:22'),
(1, 12, '20200001', 2, 1, 1, 1, 32, '2020-10-19 11:38:22', '2020-10-19 11:38:22'),
(4, 12, '20200001', 2, 1, 2, 1, 80, '2020-10-19 11:36:08', '2020-10-19 11:36:08'),
(5, 13, '20200013', 2, 1, 2, 1, 33, '2020-10-19 11:36:08', '2020-10-19 11:36:08'),
(6, 14, '20200014', 2, 1, 2, 1, 85, '2020-10-19 11:36:08', '2020-10-19 11:36:08'),
(7, 12, '20200001', 2, 1, 3, 1, 92, '2020-10-19 11:36:29', '2020-10-19 11:36:29'),
(8, 13, '20200013', 2, 1, 3, 1, 80, '2020-10-19 11:36:29', '2020-10-19 11:36:29'),
(9, 14, '20200014', 2, 1, 3, 1, 90, '2020-10-19 11:36:29', '2020-10-19 11:36:29'),
(10, 12, '20200001', 2, 1, 4, 1, 80, '2020-10-19 11:37:05', '2020-10-19 11:37:05'),
(11, 13, '20200013', 2, 1, 4, 1, 74, '2020-10-19 11:37:05', '2020-10-19 11:37:05'),
(12, 14, '20200014', 2, 1, 4, 1, 40, '2020-10-19 11:37:05', '2020-10-19 11:37:05'),
(18, 14, '20200014', 2, 1, 1, 3, 70, '2020-11-03 14:16:56', '2020-11-03 14:16:56'),
(17, 13, '20200013', 2, 1, 1, 3, 60, '2020-11-03 14:16:56', '2020-11-03 14:16:56'),
(16, 12, '20200001', 2, 1, 1, 3, 55, '2020-11-03 14:16:56', '2020-11-03 14:16:56');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bangla', 1, 1, NULL, '2020-07-24 01:53:48', '2020-07-24 01:53:48'),
(2, 'English', 1, 1, NULL, '2020-07-24 01:53:58', '2020-07-24 01:53:58'),
(3, 'Mathematics', 1, 1, NULL, '2020-07-24 01:54:08', '2020-07-24 01:54:08'),
(4, 'Islam & Moral Studies', 1, 1, 1, '2020-07-24 01:54:35', '2020-11-06 05:11:57'),
(5, 'Physics', 1, 1, NULL, '2020-11-06 05:11:31', '2020-11-06 05:11:31'),
(6, 'Chemistry', 1, 1, NULL, '2020-11-06 05:12:23', '2020-11-06 05:12:23'),
(7, 'Biology', 1, 1, NULL, '2020-11-06 05:12:36', '2020-11-06 05:12:36'),
(8, 'Higher Math', 1, 1, NULL, '2020-11-06 05:12:49', '2020-11-06 05:12:49'),
(9, 'Bangladesh & Global Studies', 1, 1, NULL, '2020-11-06 05:13:41', '2020-11-06 05:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'student,employee,admin',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Md. Asadullah Galib', 'asadullahkpi@gmail.com', NULL, '$2y$10$soLPIICLH4iC.bL2r2gK6Od0p9UO0Fa85/Oh.qhEblxaegD6UFkYa', '01928511049', 'Uttar-badda, dhaka', 'Male', '202011031953term result (1).JPG', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, NULL, NULL, 1, NULL, '2020-07-23 18:00:00', '2020-11-03 13:53:29'),
(12, 'student', 'Sayem', NULL, NULL, '$2y$10$16.bSmWvEJvUJlwi4xzV/eHCYDrVyNTRp7ewKuczTK4jfoHwQ/qwe', '01718017757', 'Uttar-badda, dhaka', 'male', '2020101917292f79fc577e20f45331ae3b8d88a1ce6d.jpg', 'Abdul Korim', 'Fatima', 'islam', '20200001', '2020-10-19', '3828', NULL, NULL, NULL, NULL, 1, NULL, '2020-10-19 11:29:49', '2020-10-19 11:29:49'),
(13, 'student', 'Rahim', NULL, NULL, '$2y$10$6yH.bXSmZL/7cmi1M0olmuPAMcVL3zfIuF5DSCfB7X6g8HcJDYPie', '01718017757', 'Uttar-badda, dhaka', 'male', '2020101917302f79fc577e20f45331ae3b8d88a1ce6d.jpg', 'Abdul Korim', 'Fatima', 'islam', '20200013', '2020-10-19', '5932', NULL, NULL, NULL, NULL, 1, NULL, '2020-10-19 11:30:53', '2020-10-19 11:30:53'),
(14, 'student', 'Halima', NULL, NULL, '$2y$10$2tv160KTk.8SlMMDM6hmSeURmbFwzmYa6S5DjuY..CFV0i05JJBf2', '01718017757', 'Uttar-badda, dhaka', 'male', '2020101917317d4d3c8f55b9fa506f93452ff66ab808.jpg', 'Abdul Korim', 'Fatima', 'islam', '20200014', '2020-10-19', '9875', NULL, NULL, NULL, NULL, 1, NULL, '2020-10-19 11:31:48', '2020-10-19 11:31:48'),
(15, 'employee', 'Akash', 'akash@gmail.com', NULL, '$2y$10$1bqH4qDgiKsEy.km2ahatuXXv8uDabH1sKCwJnebfPDIZyjjI7ox6', '01718017757', 'Uttar-badda, dhaka', 'male', '2020102404390236f471120f1d74620e9bbaef765a0b.jpg', 'Jamil', 'Rahima', 'islam', '2020090001', '2020-10-15', '6828', NULL, '2020-09-01', 3, 1400, 1, NULL, '2020-10-23 22:39:24', '2020-11-03 14:09:56'),
(16, 'employee', 'Subhan', 'subhan@gmail.com', NULL, '$2y$10$RmHVGI8KsFWFacK81EVMtu10MSbIkvM2Vnut6OjRkHyQcDI/llBne', '01718017757', 'Uttar-badda, dhaka', 'male', '202010240640bdc0a60c918845b657d6d3ef5fbd146c.jpg', 'Abdul Kader', 'Jamila', 'islam', '2020090016', '2020-10-15', '5161', NULL, '2020-09-01', 3, 1000, 1, NULL, '2020-10-23 22:40:03', '2020-10-24 00:40:51'),
(17, 'employee', 'Rahman', 'rahman@gmail.com', NULL, '$2y$10$66nXO9b9glq0/3gVq3hB8un2kAVe9uK8BKe8hfj9Bd2C.9SxWKZAq', '01718017757', 'Uttar-badda, dhaka', 'male', '202010240641ac1dc06d1fda59591e1294247e2a05bb.jpg', 'Md. Abdul Korim', 'Khaleda begum', 'islam', '2020090017', '2020-10-15', '2646', NULL, '2020-09-01', 3, 1000, 1, NULL, '2020-10-23 22:43:58', '2020-10-24 00:41:06'),
(18, 'admin', 'Sayem', 'sayem@gmail.com', NULL, '$2y$10$mqXDyd4R5Z4JTNorqdrbbeLzcUbNfon0IPco8gxoZWunJmWE9gIUS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6249', 'admin', NULL, NULL, NULL, 1, NULL, '2020-11-03 13:23:12', '2020-11-03 13:23:12');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '2019', 1, 1, NULL, '2020-07-24 01:46:58', '2020-07-24 01:46:58'),
(2, '2020', 1, 1, NULL, '2020-07-24 01:47:09', '2020-07-24 01:47:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
