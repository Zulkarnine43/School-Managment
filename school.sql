-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 12:22 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'user_id=student_id',
  `roll` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, NULL, NULL, '2020-07-24 02:01:15', '2020-07-24 02:24:32'),
(2, 3, 1, 2, 1, NULL, NULL, '2020-07-24 02:19:56', '2020-07-24 02:24:47'),
(3, 2, 1, 2, 2, NULL, NULL, '2020-07-24 02:20:36', '2020-07-24 02:25:14'),
(4, 3, 1, 3, 2, NULL, NULL, '2020-07-24 02:21:01', '2020-07-24 02:25:27'),
(5, 4, 1, 1, 2, NULL, NULL, '2020-07-24 02:21:54', '2020-07-24 02:25:03'),
(6, 5, 1, 4, 2, NULL, NULL, '2020-07-24 02:23:01', '2020-07-24 02:25:38'),
(7, 6, 1, 5, 2, NULL, NULL, '2020-07-24 02:24:01', '2020-07-24 02:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double(8,2) DEFAULT NULL,
  `pass_mark` double(8,2) DEFAULT NULL,
  `subjective_mark` double(8,2) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(17, 5, 1, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:58:23', '2020-07-24 01:58:23'),
(18, 5, 2, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:58:23', '2020-07-24 01:58:23'),
(19, 5, 3, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:58:23', '2020-07-24 01:58:23'),
(20, 5, 4, 100.00, 33.00, 100.00, 1, NULL, '2020-07-24 01:58:24', '2020-07-24 01:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, 7, 1, 35, '2020-07-24 02:24:01', '2020-07-24 02:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `leave_purpose_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `employee_salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `previous_salary` double DEFAULT NULL,
  `present_salary` double DEFAULT NULL,
  `increment_salary` double DEFAULT NULL,
  `effected_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary_logs`
--

INSERT INTO `employee_salary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_date`, `created_at`, `updated_at`) VALUES
(1, 8, 3000, 3000, 0, '2019-01-01', '2020-07-24 02:28:45', '2020-07-24 02:28:45'),
(2, 9, 8000, 8000, 0, '2019-01-02', '2020-07-24 02:30:11', '2020-07-24 02:30:11'),
(3, 10, 10000, 10000, 0, '2019-01-03', '2020-07-24 02:31:07', '2020-07-24 02:31:07'),
(4, 8, 3000, 4000, 1000, '2019-12-31', '2020-07-24 02:32:41', '2020-07-24 02:32:41'),
(5, 9, 8000, 9500, 1500, '2019-12-31', '2020-07-24 02:33:11', '2020-07-24 02:33:11'),
(6, 10, 10000, 12000, 2000, '2019-12-31', '2020-07-24 02:33:26', '2020-07-24 02:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `fee_category_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `class_id`, `fee_category_id`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1000.00, 1, NULL, '2020-07-24 01:49:51', '2020-07-24 01:49:51'),
(2, 2, 1, 1500.00, 1, NULL, '2020-07-24 01:49:51', '2020-07-24 01:49:51'),
(3, 3, 1, 2000.00, 1, NULL, '2020-07-24 01:49:51', '2020-07-24 01:49:51'),
(4, 4, 1, 2500.00, 1, NULL, '2020-07-24 01:49:52', '2020-07-24 01:49:52'),
(5, 5, 1, 3000.00, 1, NULL, '2020-07-24 01:49:52', '2020-07-24 01:49:52'),
(6, 1, 2, 500.00, 1, NULL, '2020-07-24 01:50:45', '2020-07-24 01:50:45'),
(7, 2, 2, 1000.00, 1, NULL, '2020-07-24 01:50:45', '2020-07-24 01:50:45'),
(8, 3, 2, 1500.00, 1, NULL, '2020-07-24 01:50:45', '2020-07-24 01:50:45'),
(9, 4, 2, 2000.00, 1, NULL, '2020-07-24 01:50:45', '2020-07-24 01:50:45'),
(10, 5, 2, 2500.00, 1, NULL, '2020-07-24 01:50:45', '2020-07-24 01:50:45'),
(11, 1, 3, 300.00, 1, NULL, '2020-07-24 01:51:32', '2020-07-24 01:51:32'),
(12, 2, 3, 600.00, 1, NULL, '2020-07-24 01:51:32', '2020-07-24 01:51:32'),
(13, 3, 3, 900.00, 1, NULL, '2020-07-24 01:51:32', '2020-07-24 01:51:32'),
(14, 4, 3, 1200.00, 1, NULL, '2020-07-24 01:51:32', '2020-07-24 01:51:32'),
(15, 5, 3, 1500.00, 1, NULL, '2020-07-24 01:51:32', '2020-07-24 01:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `leave_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_purposes`
--

INSERT INTO `leave_purposes` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Family Purpose', 1, NULL, '2020-07-24 02:34:12', '2020-07-24 02:34:12'),
(2, 'Personal Purpose', 1, NULL, '2020-07-24 04:01:33', '2020-07-24 04:01:33'),
(3, 'Physical Problem', 1, NULL, '2020-07-24 04:04:16', '2020-07-24 04:04:16');

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
(19, '2020_07_24_054430_create_employee_leaves_table', 1);

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
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `address`, `phone`, `mobile`, `email`, `website`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Alia Begum Modern School', 'Kushtia Sadar, Kushtia-7000', '01718017757', '01713060135', 'aliabegum@gmail.com', 'https:\\\\www.aliabegum.com', '202007240745202007201451school.png', 1, '2020-07-24 01:45:17', '2020-07-24 01:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'One', 1, 1, NULL, '2020-07-24 01:46:00', '2020-07-24 01:46:00'),
(2, 'Two', 1, 1, NULL, '2020-07-24 01:46:11', '2020-07-24 01:46:11'),
(3, 'Three', 1, 1, NULL, '2020-07-24 01:46:24', '2020-07-24 01:46:24'),
(4, 'Four', 1, 1, NULL, '2020-07-24 01:46:36', '2020-07-24 01:46:36'),
(5, 'Five', 1, 1, NULL, '2020-07-24 01:46:45', '2020-07-24 01:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bangla', 1, 1, NULL, '2020-07-24 01:53:48', '2020-07-24 01:53:48'),
(2, 'English', 1, 1, NULL, '2020-07-24 01:53:58', '2020-07-24 01:53:58'),
(3, 'Mathematics', 1, 1, NULL, '2020-07-24 01:54:08', '2020-07-24 01:54:08'),
(4, 'Islamic Static', 1, 1, NULL, '2020-07-24 01:54:35', '2020-07-24 01:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Md.Saiful Islam', 'admin@gmail.com', NULL, '$2y$10$VZZlpvYJNG74PhWZiWqyUeXKAmJJLKSsZW9ZeuaE7FkWG7n1RYNJC', '01718017757', 'Kacharipara, Bheramara, Kushtia-7000', 'Male', '202007240826img-pro-01.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, NULL, NULL, 1, NULL, '2020-07-23 18:00:00', '2020-07-24 02:26:45'),
(2, 'student', 'Lenore Strong', 'fazawop@mailinator.com', NULL, '$2y$10$jgvNhQaz1oRXu42ItY4rIeC0uNo6P9cMbppvW2Y/CcBgdo519pKsm', '01718017757', 'Ad illo aliqua Dolo', 'male', '202007240801img-3.jpg', 'Callie Sawyer', 'Lucian Graves', 'islam', '20190001', '2010-01-01', '8247', NULL, NULL, NULL, NULL, 1, NULL, '2020-07-24 02:01:15', '2020-07-24 02:01:15'),
(3, 'student', 'Brynn Sears', 'xocizunu@mailinator.com', NULL, '$2y$10$polSNUuZSY7o5XVgQPxibu2zfgWHCu2m3TmSNxuXeSX6H20hlCCT.', '01718017757', 'Reiciendis quisquam', 'female', '202007240819big-img-01.jpg', 'Ulysses Price', 'Lamar Whitney', 'atheist', '20190003', '2010-01-02', '9129', NULL, NULL, NULL, NULL, 1, NULL, '2020-07-24 02:19:56', '2020-07-24 02:19:56'),
(4, 'student', 'Demetrius Oliver', 'hyge@mailinator.com', NULL, '$2y$10$yCUbvwy0UesAus5pPkwysO8081ihdx5ly/TtRmxwRQ5ioIzfm0MrO', '01718017757', 'Ut voluptates volupt', 'female', '202007240821img-2.jpg', 'Melissa Lambert', 'Chase Campbell', 'islam', '20200004', '2010-01-03', '2084', NULL, NULL, NULL, NULL, 1, NULL, '2020-07-24 02:21:54', '2020-07-24 02:21:54'),
(5, 'student', 'Blaze Vang', 'fugir@mailinator.com', NULL, '$2y$10$YnJcXG33tWfa4hUHj7H9V.EAdpk0v0lyJ97RS8rc2cziml8e4w7tq', '01718017757', 'Delectus consequatu', 'male', '202007240823img-pro-01.jpg', 'Jemima Barker', 'Avram Acevedo', 'christian', '20200005', '2010-01-04', '1495', NULL, NULL, NULL, NULL, 1, NULL, '2020-07-24 02:23:01', '2020-07-24 02:23:01'),
(6, 'student', 'Wang Ratliff', 'kiguj@mailinator.com', NULL, '$2y$10$dLepVk.q/C.wdN1k69VUSeeQKzZEmRr3BtccDPCx5tbzLrlNHrLLa', '01718017757', 'Reiciendis maxime bl', 'female', '202007240824banner-03.jpg', 'Lucian Gray', 'Willa Ross', 'islam', '20200006', '2010-01-05', '1419', NULL, NULL, NULL, NULL, 1, NULL, '2020-07-24 02:24:01', '2020-07-24 02:24:01'),
(7, 'admin', 'Md.Shahinur Rahman', 'sajib@gmail.com', NULL, '$2y$10$JBIs/7tA2BRBHP5atFW.RO/MFcmwVn.rwjaBRK30HDZGf4LmSlEoy', '01718017757', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6315', 'operator', NULL, NULL, NULL, 1, NULL, '2020-07-24 02:27:20', '2020-07-24 02:27:20'),
(8, 'employee', 'Doris Robinson', 'vyxyjile@mailinator.com', NULL, '$2y$10$wlkQUD7AM08u/Pwi7H2LNuVLDbINjpvZQkVI8hm7x/L0EhCfyRqG2', '01718017757', 'Accusamus excepteur', 'male', '202007240828img-1.jpg', 'Cade Garza', 'Zeph Cole', 'islam', '2019010001', '1973-11-09', '4127', NULL, '2019-01-01', 3, 4000, 1, NULL, '2020-07-24 02:28:45', '2020-07-24 02:32:41'),
(9, 'employee', 'Knox Robles', 'tygun@mailinator.com', NULL, '$2y$10$S1je9cj2P/VmHAV7dt19uObGXupovFwqSsZlNVDCX2GjkEOnK.Fsi', '01718017757', 'Incididunt non repud', 'male', '202007240830img-3.jpg', 'Malcolm Moon', 'Kyle Weber', 'hindu', '2019010009', '1998-08-20', '6976', NULL, '2019-01-02', 2, 9500, 1, NULL, '2020-07-24 02:30:11', '2020-07-24 02:33:11'),
(10, 'employee', 'Elmo Oneill', 'lefa@mailinator.com', NULL, '$2y$10$sZLSQ/FxEAyGGLPmVeDq7.1OmNcCN87nsBsRs/P.O3.UYXHEdSJFS', '01718017757', 'Aute molestiae id al', 'female', '202007240831img-2.jpg', 'Bruce Barton', 'Tarik Hewitt', 'islam', '2019010010', '1990-03-09', '8936', NULL, '2019-01-03', 1, 12000, 1, NULL, '2020-07-24 02:31:07', '2020-07-24 02:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '2019', 1, 1, NULL, '2020-07-24 01:46:58', '2020-07-24 01:46:58'),
(2, '2020', 1, 1, NULL, '2020-07-24 01:47:09', '2020-07-24 01:47:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_categories_name_unique` (`name`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_purposes_name_unique` (`name`);

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
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shifts_name_unique` (`name`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `years_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
