-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 09:02 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'fiforeg@gmail.com', 'superadmin', NULL, '$2y$10$XTW6Ipf53MXnJzqiaGzwBe/HHFk7OrziYXbATOqB2dIuJf4AmGdA6', NULL, '2020-10-08 11:14:41', '2020-10-10 03:53:09'),
(2, 'sobuj', 'sobuj@gmail.com', 'abc', NULL, '$2y$10$Q6VoO6cxBQgLAVW0zXZ4EOPYdEwN0tdf4EeqFqtGiV2MGhUl6L7AK', NULL, '2020-10-10 03:22:05', '2020-10-10 04:08:08'),
(4, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$10$JvlMVBcJTAESx2PJY2pBHunLuOGGA6I6C1YKeiAyBXou3yANVp3Zq', NULL, '2020-10-10 05:04:09', '2020-10-10 05:04:09'),
(5, 'Ariful Islam', 'ariful@gmail.com', 'Ariful', NULL, '$2y$10$ONr/mqt7vHIuKqzd/QKMqO9awX1nEPwoUTdXVZR7vnwzSEUlV5BCK', NULL, '2020-10-24 02:37:49', '2020-10-24 02:37:49'),
(7, 'alamin', 'alamin@gmail.com', 'alamin', NULL, '$2y$10$zAAyV325b/PLgNJlbSRl3uGzF.trn2WZ2BMRxHRSvUKoaM4llyKz.', NULL, '2021-04-02 08:27:17', '2021-04-02 08:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Cement', 1, NULL, NULL, '2021-07-01 04:42:48', '2021-07-01 04:42:48'),
(3, 'Rod', 1, NULL, NULL, '2021-07-01 04:44:03', '2021-07-01 04:44:03'),
(4, 'Fridge', 1, NULL, NULL, '2021-07-03 08:59:14', '2021-07-03 08:59:14'),
(5, 'Atta', 1, NULL, NULL, '2021-07-05 11:24:29', '2021-07-05 11:24:29'),
(6, 'Moida', 1, NULL, NULL, '2021-07-05 11:24:41', '2021-07-05 11:24:41'),
(7, 'Siji', 1, NULL, NULL, '2021-07-05 11:24:53', '2021-07-05 11:24:53'),
(8, 'Sugar', 1, NULL, NULL, '2021-07-05 11:25:11', '2021-07-05 11:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile_no`, `address`, `email`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'Salman', '01811223344', 'Dhaka', 'salman@gmail.com', 1, NULL, NULL, '2021-07-05 11:21:29', '2021-07-05 11:21:29'),
(5, 'Hasib', '01812111111', 'Khulna', 'hasib@gmail.com', 1, NULL, NULL, '2021-07-05 11:22:13', '2021-07-05 11:22:13'),
(6, 'Muhaiminul Haque', '01712333333', 'Sylhet', 'mm@gmail.com', 1, NULL, NULL, '2021-07-05 11:22:58', '2021-07-05 11:22:58'),
(7, 'salma', '01973221122', 'Kolkata', 'salma@gmail.com', 1, NULL, NULL, '2021-07-05 11:23:39', '2021-07-05 11:23:39');

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Pending , 1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `date`, `description`, `status`, `created_by`, `approved_by`, `created_at`, `updated_at`) VALUES
(1, '4', '2021-07-27', NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `invoice_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `selling_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Pending , 1=Approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2020_09_20_101516_create_permission_tables', 1),
(14, '2020_10_08_171154_create_admins_table', 2),
(34, '2014_10_12_000000_create_users_table', 12),
(44, '2021_07_01_060456_create_customers_table', 13),
(47, '2021_07_01_094710_create_units_table', 14),
(48, '2021_07_01_103130_create_categories_table', 15),
(52, '2021_06_30_113331_create_suppliers_table', 18),
(54, '2021_07_01_154155_create_products_table', 19),
(55, '2021_07_04_051303_create_purchases_table', 19),
(56, '2021_07_10_123712_create_invoices_table', 20),
(57, '2021_07_10_123802_create_invoice_details_table', 20),
(58, '2021_07_10_123937_create_payments_table', 20),
(59, '2021_07_10_124033_create_payment_details_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 2),
(1, 'App\\User', 2),
(1, 'App\\User', 3),
(1, 'App\\Models\\Admin', 4),
(2, 'App\\Models\\Admin', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(14, 'App\\Models\\Admin', 5),
(16, 'App\\Models\\Admin', 7);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `paid_status` varchar(51) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `current_paid_amount` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'admin', 'dashboard', '2020-10-03 04:28:54', '2020-10-03 04:28:54'),
(2, 'dashboard.edit', 'admin', 'dashboard', '2020-10-03 04:28:54', '2020-10-03 04:28:54'),
(3, 'blog.create', 'admin', 'blog', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(4, 'blog.view', 'admin', 'blog', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(5, 'blog.edit', 'admin', 'blog', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(6, 'blog.delete', 'admin', 'blog', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(7, 'blog.approve', 'admin', 'blog', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(8, 'admin.create', 'admin', 'admin', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(9, 'admin.view', 'admin', 'admin', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(10, 'admin.edit', 'admin', 'admin', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(11, 'admin.delete', 'admin', 'admin', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(12, 'admin.approve', 'admin', 'admin', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(13, 'role.create', 'admin', 'role', '2020-10-03 04:28:56', '2020-10-03 04:28:56'),
(14, 'role.view', 'admin', 'role', '2020-10-03 04:28:56', '2020-10-03 04:28:56'),
(15, 'role.edit', 'admin', 'role', '2020-10-03 04:28:56', '2020-10-03 04:28:56'),
(16, 'role.delete', 'admin', 'role', '2020-10-03 04:28:56', '2020-10-03 04:28:56'),
(17, 'role.approve', 'admin', 'role', '2020-10-03 04:28:56', '2020-10-03 04:28:56'),
(18, 'profile.view', 'admin', 'profile', '2020-10-03 04:28:56', '2020-10-03 04:28:56'),
(19, 'profile.edit', 'admin', 'profile', '2020-10-03 04:28:56', '2020-10-03 04:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `supplier_id`, `category_id`, `unit_id`, `quantity`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Fresh Cement', '2', '1', '2', 4, 1, NULL, NULL, '2021-07-08 00:08:54', '2021-07-08 14:34:06'),
(2, 'Fresh Moida', '2', '6', '1', 222, 1, NULL, NULL, '2021-07-08 00:09:34', '2021-07-08 00:09:34'),
(3, 'Fresh Suji', '2', '7', '1', 500, 1, NULL, NULL, '2021-07-08 00:09:58', '2021-07-08 00:09:58'),
(4, 'Boshundhara Fridge', '1', '4', '2', 100, 1, NULL, NULL, '2021-07-08 00:10:47', '2021-07-08 00:10:47'),
(5, 'Bosundhara Cement', '1', '1', '2', 145, 1, NULL, NULL, '2021-07-08 00:11:11', '2021-07-08 00:11:11'),
(6, 'BSRM TMT 500W', '3', '3', '1', 22, 1, NULL, NULL, '2021-07-08 00:11:38', '2021-07-08 12:52:11'),
(7, 'BSRM TMT 400W', '3', '3', '1', 200, 1, NULL, NULL, '2021-07-08 00:11:58', '2021-07-08 00:11:58'),
(8, 'BSRM TMT 300W', '3', '3', '1', 500, 1, NULL, NULL, '2021-07-08 00:12:17', '2021-07-08 00:12:17'),
(9, 'sss', '1', '1', '1', 210, 1, NULL, NULL, '2021-07-10 06:07:29', '2021-07-10 06:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Pending , 1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `category_id`, `product_id`, `purchase_no`, `date`, `description`, `buying_qty`, `unit_price`, `buying_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', 'qw', '2021-07-08', 'asas', 21, 2300, 48300, 1, NULL, NULL, '2021-07-08 00:14:10', '2021-07-08 00:14:10'),
(4, '2', '6', '2', 'qw', '2021-07-08', 'sdsd', 21, 6000, 126000, 1, NULL, NULL, '2021-07-08 00:14:10', '2021-07-08 00:14:10'),
(6, '3', '3', '7', 'qw', '2021-07-08', 'sdsd', 10, 6000, 60000, 1, NULL, NULL, '2021-07-08 00:14:10', '2021-07-08 00:14:10'),
(8, '2', '1', '1', 'de34', '2021-07-09', NULL, 4, 4500, 18000, 1, NULL, NULL, '2021-07-08 12:30:23', '2021-07-08 12:30:23'),
(9, '3', '3', '6', 'de34', '2021-07-09', NULL, 7, 6000, 42000, 1, NULL, NULL, '2021-07-08 12:30:23', '2021-07-08 12:30:23'),
(10, '3', '3', '6', 'de34', '2021-07-09', NULL, 5, 6500, 32500, 1, NULL, NULL, '2021-07-08 12:30:23', '2021-07-08 12:30:23'),
(11, '1', '1', '1', 'ewr34', '2021-07-10', NULL, 1, 453, 453, 0, NULL, NULL, '2021-07-10 06:09:20', '2021-07-10 06:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2020-10-03 04:28:54', '2020-10-03 04:28:54'),
(2, 'Super Admin', 'admin', '2020-10-03 04:28:54', '2020-10-04 10:01:58'),
(13, 'Client', 'admin', '2020-10-10 03:57:00', '2020-10-10 03:57:00'),
(14, 'Student', 'admin', '2020-10-24 02:36:06', '2020-10-24 02:36:06'),
(15, 'accantant', 'admin', '2021-03-17 10:08:21', '2021-03-17 10:08:21'),
(16, 'Executive', 'admin', '2021-04-02 08:22:47', '2021-04-02 08:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 13),
(2, 2),
(2, 13),
(3, 1),
(3, 2),
(3, 13),
(3, 16),
(4, 1),
(4, 2),
(4, 13),
(4, 16),
(5, 1),
(5, 2),
(5, 13),
(5, 16),
(6, 1),
(6, 2),
(6, 13),
(6, 16),
(7, 1),
(7, 2),
(7, 13),
(7, 16),
(8, 2),
(9, 1),
(9, 2),
(9, 13),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 1),
(14, 2),
(14, 13),
(15, 2),
(16, 2),
(17, 2),
(18, 1),
(18, 2),
(18, 13),
(18, 14),
(18, 15),
(18, 16),
(19, 1),
(19, 2),
(19, 13),
(19, 14),
(19, 15),
(19, 16);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `mobile_no`, `address`, `email`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bosundhara Group', '01915985336', 'Dhaka', 'bosundhara@gmail.com', 1, NULL, NULL, '2021-07-05 12:09:48', '2021-07-05 12:09:48'),
(2, 'Meghna Group', '01917-889900', 'Natore', 'meghna@gmail.com', 1, NULL, NULL, '2021-07-05 12:10:36', '2021-07-05 12:10:36'),
(3, 'BSRM Group', '01716998877', 'Chottogram', 'bsrm@gmail.com', 1, NULL, NULL, '2021-07-05 12:11:13', '2021-07-05 12:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'KG', 1, NULL, NULL, '2021-07-01 04:11:03', '2021-07-01 04:11:03'),
(2, 'Pcs', 1, NULL, NULL, '2021-07-01 04:11:23', '2021-07-01 04:11:23'),
(3, 'Cartoon', 1, NULL, NULL, '2021-07-05 11:23:56', '2021-07-05 11:23:56'),
(4, 'Pack', 1, NULL, NULL, '2021-07-05 11:24:08', '2021-07-05 11:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'student,employee,admin',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'user=employe',
  `join_date` date DEFAULT NULL,
  `designation_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=Active|0=Inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'student', 'Md. Manirul Islam', NULL, NULL, NULL, '01712339046', NULL, 'Male', NULL, 'Azizul Haque', 'Safura Khatun', 'Muslim', '20200001', '2020-10-26', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 15:48:44', '2020-10-24 15:48:44'),
(17, 'student', 'asas', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', NULL, 'asas', 'asas', 'Khristan', '20200017', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 15:49:46', '2020-10-24 15:49:46'),
(18, 'student', 'One', NULL, NULL, NULL, '+8801717514286', NULL, 'Female', NULL, 'Azizul Haque', 'Safura Khatun', 'Hindu', '20200018', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 15:56:52', '2020-10-24 15:56:52'),
(19, 'student', 'sasa', NULL, NULL, NULL, '+8801717514286', NULL, 'Female', NULL, 'Azizul Haque', 'Safura Khatun', 'Hindu', '20200019', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 15:58:45', '2020-10-24 15:58:45'),
(20, 'student', 'Vaggoraz', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', NULL, 'Azizul Haque', 'Safura Khatun', 'Muslim', '20200020', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 16:01:45', '2020-10-24 16:01:45'),
(21, 'student', 'Vaggoraz', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', NULL, 'Azizul Haque', 'Safura Khatun', 'Muslim', '20200021', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 16:04:19', '2020-10-24 16:04:19'),
(22, 'student', 'Vaggoraz', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', NULL, 'Azizul Haque', 'Safura Khatun', 'Hindu', '20200022', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 16:06:57', '2020-10-24 16:06:57'),
(23, 'student', 'Vaggoraz', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', NULL, 'Abdus Salam', 'Safura Khatun', 'Hindu', '20200023', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 16:08:41', '2020-10-24 16:08:41'),
(24, 'student', 'Md.Ataur Rahman', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', '202010280713i14.jpg', 'Abdus Salam', 'Safura Khatun', 'Muslim', '20200024', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 16:10:51', '2020-10-28 01:13:47'),
(25, 'student', 'Vaggoraz', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', NULL, 'Azizul Haque', 'Safura Khatun', 'Muslim', '20200025', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 16:13:37', '2020-10-24 16:13:37'),
(26, 'student', 'Vaggoraz', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', '202010251433fest_2.jpg', 'Azizul Haque', 'Safura Khatun', 'Muslim', '20200026', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-25 08:33:07', '2020-10-25 08:33:07'),
(27, 'student', 'Vaggoraz', NULL, NULL, '$2y$10$QNxFuRbhYf3D/fwvYNZT.uIYrjcrmQkc3cPKGaoczqB1vzeJ0xNYm', '+8801717514286', NULL, 'Male', '202010251449fest_18.jpg', 'Azizul Haque', 'Safura Khatun', 'Hindu', '20200027', '2020-10-25', '9772', NULL, NULL, NULL, NULL, 1, NULL, '2020-10-25 08:49:49', '2020-10-25 08:49:49'),
(28, 'student', 'Md.Ataur Rahma', NULL, NULL, '$2y$10$sShnCNMX1gOcmn6DUmvS0e4prQgCXV5sIKK5B0Cm3C3qAeuJxUCkG', '+8801717514286', NULL, 'Male', '202010281607cosmos3.jpg', 'Abdus Salam', 'Safura Khatun', 'Muslim', '20230028', '2020-10-25', '6383', NULL, NULL, NULL, NULL, 1, NULL, '2020-10-25 11:08:31', '2020-11-01 12:00:42'),
(29, 'student', 'Md. Samuzzoha', NULL, NULL, '$2y$10$wieOUvFLnVI4t1TxeI456Ob5TqOkrSC3rszVKzGz/qelL.1EvXHCm', '+8801717514286', NULL, 'Male', '202010281607h9.jpg', 'Azizul Haque', 'Safura Khatun', 'Muslim', '20230029', '2020-10-25', '9530', NULL, NULL, NULL, NULL, 1, NULL, '2020-10-25 11:09:40', '2020-10-28 10:07:26'),
(30, 'student', 'Md. Sayem Khan', NULL, NULL, '$2y$10$KGv/eqoySqE1Q.1lCBj.gOTvAmJqjcskKPy3twXngM1uuZFdh0akC', '+8801717514286', NULL, 'Male', '202010281605cosmos1.jpg', 'Abdus Salam', 'Safura Khatun', 'Hindu', '20230030', '2020-10-28', '471', NULL, NULL, NULL, NULL, 1, NULL, '2020-10-28 08:29:42', '2020-10-28 10:05:20'),
(32, 'student', NULL, NULL, NULL, '$2y$10$NK8f6tnSnfxsXDAah1aw/.ndGJhNO9ndUTCYzXaBf/Lwk2iPJz7Py', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20230031', '1970-01-01', '6301', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-02 04:32:46', '2020-11-02 04:32:46'),
(33, 'employee', 'Md.Faizur Rahman', 'asdf@gmail.com', NULL, '$2y$10$kRnp99.22tVFhZaftgb.k.IUHPjKhVfMWHmMQy13OirILF2LrYoli', '+8801717514286', 'Dhaka', 'Male', '202011201429h4.jpg', 'Azizul Haque', 'Safura Khatun', 'Muslim', '2020110001', '2020-11-16', '3354', NULL, '2020-11-16', '1', 9000, 1, NULL, '2020-11-15 12:34:29', '2020-11-20 12:14:20'),
(34, 'employee', 'Manirul Islam', 'fiforeg@gmail.com', NULL, '$2y$10$688WjnzhjKVXcMWaWuAYxe9PhWOGbY5kHghms2JwZAVo4Hvfb7Ige', '+8801717514286', 'Dhaka', 'Male', '202011151844fest_6.jpg', 'Azizul Haque', 'Safura Khatun', 'Muslim', '2020110034', '2020-11-16', '3714', NULL, '2020-11-16', '1', 5000, 1, NULL, '2020-11-15 12:44:46', '2020-11-15 12:44:46'),
(35, 'employee', 'Md.Jamil Reza', 'asa@gmail.com', NULL, '$2y$10$Ms6vqD7sNhgaWA2orDEcnubciyBd2pjFbQZbow8.Edy984QA6qugy', '+8801717514286', 'Dhaka', 'Male', '202011201530fest_3.jpg', 'Meshbaul Haque', 'Mahfuza', 'Muslim', '2020110035', '2020-11-20', '8970', NULL, '2020-11-12', '3', 5000, 1, NULL, '2020-11-20 09:30:36', '2020-11-20 09:30:36'),
(36, 'employee', NULL, NULL, NULL, '$2y$10$YjvSfDD2KXtSZGWYWPBG5ebfvZhWPqhDmq9dNdTwK2B0uoRyDT10G', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970010036', '1970-01-01', '2177', NULL, '1970-01-01', NULL, NULL, 1, NULL, '2020-11-20 11:24:26', '2020-11-20 11:24:26'),
(37, 'employee', NULL, NULL, NULL, '$2y$10$ti208a/KSfZvhjiEKltM4OayZfc4P2fjNPTO66YiS7m6.YG4lk.8e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970010037', '1970-01-01', '2217', NULL, '1970-01-01', NULL, NULL, 1, NULL, '2020-11-20 11:27:04', '2020-11-20 11:27:04'),
(38, 'employee', NULL, NULL, NULL, '$2y$10$0I9eQsfGluWABxTBvLjwEOJgtJiJtZaWHs298kOooB6GpRo7pVS76', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970010038', '1970-01-01', '9574', NULL, '1970-01-01', NULL, NULL, 1, NULL, '2020-11-20 11:28:05', '2020-11-20 11:28:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_mobile_no_unique` (`mobile_no`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_mobile_no_unique` (`mobile_no`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
