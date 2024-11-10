-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 10, 2024 lúc 03:53 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `assets`
--

CREATE TABLE `assets` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `location_id` bigint UNSIGNED NOT NULL,
  `condition_id` bigint UNSIGNED NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_id` bigint UNSIGNED NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `warranty_months` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `is_added` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `assets`
--

INSERT INTO `assets` (`id`, `name`, `category_id`, `location_id`, `condition_id`, `notes`, `manufacture_id`, `model_id`, `serial`, `date`, `warranty_months`, `price`, `supplier_id`, `is_added`, `created_at`, `updated_at`) VALUES
(1, 'ABC123', 4, 65, 2, 'OK OK', 8, 7, '112BBC', '2024-07-13', 3, 15250000.00, 7, 1, '2024-07-21 11:36:26', '2024-11-10 08:52:19'),
(2, 'PHong', 5, 54, 4, 'sddsv', 6, 7, '112BBC', '2024-07-20', 1, 15000000.00, 11, 0, '2024-07-22 00:56:39', '2024-11-10 08:52:14'),
(3, 'Asset 1', 1, 60, 1, 'This is a sample asset', 1, 1, 'ABC123', '2022-01-01', 12, 45000000.00, 1, 0, '2024-07-22 00:56:53', '2024-09-18 23:41:11'),
(4, 'Asset 2', 2, 70, 2, 'Another sample asset', 2, 2, 'DEF456', '2022-02-01', 3, 36000000.00, 2, 0, '2024-07-22 00:56:53', '2024-07-22 00:56:53'),
(5, 'Asset 3', 3, 53, 3, 'Yet another sample asset', 3, 3, 'GHI789', '2022-03-01', 6, 10000000.00, 3, 0, '2024-07-22 00:56:53', '2024-11-10 08:52:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";s:1:\"j\";s:11:\"description\";}s:11:\"permissions\";a:16:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"view user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:11:\"create user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"edit user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"delete user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:9:\"view role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:11:\"create role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:5;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:9:\"edit role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:5;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:11:\"delete role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:13:\"view location\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:15:\"create location\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:13:\"edit location\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:15:\"delete location\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:10:\"view asset\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:12:\"create asset\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:10:\"edit asset\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:12:\"delete asset\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}}s:5:\"roles\";a:4:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"j\";N;s:1:\"c\";s:3:\"web\";}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:11:\"super-admin\";s:1:\"j\";N;s:1:\"c\";s:3:\"web\";}i:2;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:9:\"Test Role\";s:1:\"j\";s:4:\"AAAA\";s:1:\"c\";s:3:\"web\";}i:3;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:8:\"Employee\";s:1:\"j\";s:3:\"AAA\";s:1:\"c\";s:3:\"web\";}}}', 1731339457);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'quos', '2024-07-17 02:49:59', '2024-07-17 02:49:59'),
(2, 'repellat', '2024-07-17 02:49:59', '2024-07-17 02:49:59'),
(3, 'vel', '2024-07-17 02:49:59', '2024-07-17 02:49:59'),
(4, 'voluptate', '2024-07-17 02:49:59', '2024-07-17 02:49:59'),
(5, 'atque', '2024-07-17 02:49:59', '2024-07-17 02:49:59'),
(6, 'sapiente', '2024-07-17 02:49:59', '2024-07-17 02:49:59'),
(7, 'magnam', '2024-07-17 02:49:59', '2024-07-17 02:49:59'),
(8, 'cupiditate', '2024-07-17 02:49:59', '2024-07-17 02:49:59'),
(9, 'sed', '2024-07-17 02:49:59', '2024-07-17 02:49:59'),
(10, 'dicta', '2024-07-17 02:49:59', '2024-07-17 02:49:59'),
(11, 'iusto', '2024-07-17 02:49:59', '2024-07-17 02:49:59'),
(12, 'facilis', '2024-07-17 02:49:59', '2024-07-17 02:49:59'),
(13, 'est', '2024-07-17 02:49:59', '2024-07-17 02:49:59'),
(14, 'voluptas', '2024-07-17 02:49:59', '2024-07-17 02:49:59'),
(15, 'recusandae', '2024-07-17 02:49:59', '2024-07-17 02:49:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `conditions`
--

CREATE TABLE `conditions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `conditions`
--

INSERT INTO `conditions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'non-existent', 'Asset abandoned or no longer exist', '2024-07-19 02:32:08', '2024-07-19 02:32:08'),
(2, 'very good', 'Only normal maintenance required', '2024-07-19 02:32:08', '2024-07-19 02:32:08'),
(3, 'good', 'Minor maintenance required (5%)', '2024-07-19 02:32:08', '2024-07-19 02:32:08'),
(4, 'fair', 'significant maintence required (10-20%)', '2024-07-19 02:32:08', '2024-07-19 02:32:08'),
(5, 'requires renewal', 'significant renewal/upgrade required (20-40%)', '2024-07-19 02:32:08', '2024-07-19 02:32:08'),
(6, 'unserviceable', 'Over 50% of asset requires replacement', '2024-07-19 02:32:08', '2024-07-19 02:32:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor` int DEFAULT NULL,
  `unit` int DEFAULT NULL,
  `building` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `floor`, `unit`, `building`, `street_address`, `city`, `state`, `country`, `zip_code`, `created_at`, `updated_at`) VALUES
(2, 'Tenetur reiciendis', 4, 2, 'Jast Turnpike', '89897 Heller Estate', 'New Hazel', 'Alaska', 'Equatorial Guinea', 751060, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(3, 'Harum nulla', 6, 4, 'Anika Stream', '8765 Christiansen Street', 'South Karellefort', 'Nebraska', 'French Southern Territories', 565915, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(4, 'Non aut', 6, 33, 'Hickle Fields', '7034 Solon Passage', 'West Piper', 'Kentucky', 'Oman', 395584, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(5, 'Sequi sed', 7, 43, 'Mellie Canyon', '391 Alena Streets Apt. 107', 'Jeramiechester', 'Alaska', 'Puerto Rico', 549540, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(6, 'Qui nostrum', 8, 44, 'Maia Track', '61089 Dickinson Rue', 'Flaviechester', 'New Jersey', 'Zambia', 247446, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(7, 'Aspernatur ipsa', 3, 35, 'O\'Keefe Mission', '3580 Collier Stravenue Suite 547', 'Port Alessiastad', 'Rhode Island', 'Christmas Island', 590616, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(8, 'Dolorem cum', 4, 18, 'Elwyn Wall', '577 Catherine Square Suite 401', 'Port Eldon', 'Kansas', 'Tanzania', 895135, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(9, 'Et possimus', 5, 18, 'Karley Court', '4891 Weissnat Vista Suite 415', 'East Louvenia', 'Utah', 'Heard Island and McDonald Islands', 660800, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(10, 'Numquam mollitia', 9, 33, 'Spinka Plain', '63550 Walsh Street Apt. 777', 'Bernitashire', 'Nebraska', 'Ecuador', 134683, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(11, 'Aut quo', 9, 14, 'Jenkins Unions', '7484 Schinner Meadow', 'Robertland', 'West Virginia', 'Afghanistan', 527152, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(12, 'Dolorem repellat', 6, 33, 'Melyna Forges', '17509 Smith Court Suite 005', 'New Anastaciofort', 'Kansas', 'Korea', 983461, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(13, 'Maiores veniam', 9, 2, 'Jamison Meadows', '99537 Hirthe Extension', 'Baumbachshire', 'Louisiana', 'Bahrain', 118831, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(14, 'Corrupti saepe', 3, 22, 'Jaskolski Hills', '62957 Auer Station', 'Greenfelderstad', 'Colorado', 'Anguilla', 414736, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(15, 'Accusamus vero', 2, 11, 'Klein Isle', '7938 Louie Pines Apt. 892', 'West Timmy', 'Massachusetts', 'Syrian Arab Republic', 323109, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(16, 'Tempore corporis', 4, 44, 'Julio Passage', '18223 Runte Drives', 'Oranside', 'Nebraska', 'Isle of Man', 402134, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(17, 'Blanditiis qui', 7, 37, 'Chase Shoal', '644 Eichmann Ports', 'Nikolasfurt', 'Indiana', 'Luxembourg', 902127, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(18, 'Cumque velit', 10, 45, 'Spencer Well', '1307 Nikko Gateway Suite 332', 'South Eino', 'Oklahoma', 'Liechtenstein', 759655, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(19, 'Laborum quo', 1, 48, 'Kayla Motorway', '4220 Reynolds Villages Apt. 897', 'Cummingsport', 'Utah', 'Bermuda', 939875, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(20, 'Officia ut', 1, 20, 'Mable Rapids', '16266 Jaycee Meadow', 'East Ernestina', 'Kansas', 'Georgia', 301694, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(21, 'Illo nisi', 1, 32, 'Sawayn Rue', '97380 Syble Parkway Suite 209', 'Port Ollie', 'North Carolina', 'Montserrat', 645886, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(22, 'Atque debitis', 4, 43, 'Deven Mountains', '9398 Bernhard Rapids', 'Ernestinemouth', 'Arkansas', 'Barbados', 543730, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(23, 'Laboriosam atque', 8, 39, 'Asia Gardens', '5844 Armani Ports Suite 822', 'Kautzerport', 'Wisconsin', 'Honduras', 559789, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(24, 'Voluptatibus nulla', 1, 44, 'Konopelski Glens', '4278 Agustin Throughway', 'North Aniyaside', 'Florida', 'Korea', 793824, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(25, 'Voluptas rerum', 2, 14, 'Brown Cliff', '31575 Helga Flats', 'Marjoriemouth', 'Kentucky', 'Malawi', 561802, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(26, 'Minima dolor', 3, 28, 'Bobbie Lights', '3166 Schuyler Knoll', 'Hallieshire', 'South Dakota', 'Macedonia', 473267, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(27, 'Perferendis ullam', 4, 37, 'Hill Streets', '61894 Huel Burgs Suite 186', 'North Addisonbury', 'Tennessee', 'United Arab Emirates', 264351, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(28, 'Consequuntur voluptate', 1, 4, 'Nat Garden', '878 Brooklyn Rapids Suite 197', 'East Golda', 'Louisiana', 'San Marino', 856511, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(29, 'Debitis harum', 8, 4, 'Bailey Rue', '77155 Susanna Island', 'Port Royal', 'South Carolina', 'Qatar', 182739, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(30, 'Iure atque', 7, 5, 'Langworth Corners', '474 Felix Garden', 'South Johnson', 'Nebraska', 'Mongolia', 480981, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(31, 'Id voluptatum', 7, 40, 'Mohamed Rapids', '5932 Isabell Prairie', 'Oscarshire', 'Maine', 'Taiwan', 547461, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(32, 'Ullam laudantium', 10, 22, 'Dell Orchard', '151 Gaylord Turnpike Apt. 826', 'Hirthestad', 'Washington', 'Namibia', 870121, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(33, 'Nisi quis', 3, 36, 'Donnelly Circle', '5491 Fernando Common', 'Barrowsfort', 'Maryland', 'Romania', 799034, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(34, 'Aliquam culpa', 8, 2, 'Hugh Brook', '273 Prohaska Pass Suite 342', 'Abshireville', 'New Jersey', 'Panama', 315383, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(35, 'Numquam maxime', 4, 21, 'Kiehn Forges', '64445 King Overpass', 'Legroshaven', 'Wisconsin', 'Chile', 552385, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(36, 'Labore voluptatem', 1, 5, 'Alycia Square', '614 Wyman Cliffs Apt. 187', 'New Dayneshire', 'Illinois', 'Namibia', 801993, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(37, 'Velit occaecati', 1, 36, 'Herminia Via', '14380 Bennie Track', 'Hiltonhaven', 'North Carolina', 'Monaco', 513784, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(38, 'Fugiat ut', 6, 3, 'Darien Union', '45202 Philip Trafficway Apt. 622', 'Perryville', 'North Carolina', 'Uzbekistan', 200263, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(39, 'Et est', 6, 19, 'Ryan Island', '5719 Wisozk Street Suite 405', 'Andersonton', 'Texas', 'Uzbekistan', 147670, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(40, 'Necessitatibus quam', 1, 2, 'Sedrick Canyon', '6202 Santino Vista Apt. 599', 'Cedrickshire', 'Rhode Island', 'Sweden', 254740, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(41, 'Vel quasi', 6, 21, 'Ferry Spurs', '73208 Vella Village', 'Crystelmouth', 'South Carolina', 'Netherlands Antilles', 120206, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(42, 'Sed eveniet', 7, 34, 'Zboncak Path', '8038 Walton Ferry Apt. 570', 'New Chelsiefurt', 'Hawaii', 'Zimbabwe', 628110, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(43, 'Magnam aperiam', 1, 43, 'Kub Brook', '2838 Peggie Locks', 'North Pete', 'New Mexico', 'Martinique', 597012, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(44, 'Quaerat at', 4, 7, 'Antwon Squares', '122 Grant Garden Apt. 975', 'Rempelberg', 'North Dakota', 'British Virgin Islands', 259522, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(45, 'In et', 6, 42, 'Dicki Haven', '44144 Rudy Pines Apt. 043', 'North Cielo', 'Utah', 'Jamaica', 278103, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(46, 'Voluptates sunt', 3, 3, 'Floyd Heights', '44581 Davin Landing Suite 475', 'South Kaychester', 'Hawaii', 'Luxembourg', 818209, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(47, 'Officiis quod', 4, 6, 'Drake Forest', '92827 Hahn Dam', 'Port Andy', 'Florida', 'Central African Republic', 977663, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(48, 'Quia harum', 2, 29, 'Smith Rapid', '73034 Grimes View', 'South Bentonside', 'Florida', 'Mauritania', 485279, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(49, 'Soluta qui', 7, 21, 'Veum Causeway', '18299 Alford Wells', 'North Jenningsville', 'California', 'Tonga', 796319, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(50, 'Rerum voluptas', 3, 44, 'Carlotta Dale', '235 Darryl Harbors', 'North Elliott', 'Ohio', 'Heard Island and McDonald Islands', 978609, '2024-07-17 21:03:47', '2024-07-17 21:03:47'),
(51, 'Ut possimus', 10, 9, 'Torp Motorway', '440 O\'Keefe Gateway', 'Evanport', 'Florida', 'San Marino', 674913, '2024-07-17 21:03:47', '2024-07-17 21:03:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` bigint UNSIGNED NOT NULL,
  `asset_id` bigint UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `asset_id`, `file_name`, `file_path`, `mime_type`, `size`, `created_at`, `updated_at`) VALUES
(7, 1, '1721590115_669d6163ea106.png', 'public/images/1721590115_669d6163ea106.png', 'image/png', 4135, '2024-07-21 12:28:35', '2024-07-21 12:28:35'),
(8, 1, '1721590115_669d6163ef8b7.png', 'public/images/1721590115_669d6163ef8b7.png', 'image/png', 4137, '2024-07-21 12:28:35', '2024-07-21 12:28:35'),
(9, 1, '1721590115_669d6163eff48.png', 'public/images/1721590115_669d6163eff48.png', 'image/png', 4137, '2024-07-21 12:28:35', '2024-07-21 12:28:35'),
(10, 1, '1721635226_669e119a30370.png', 'public/images/1721635226_669e119a30370.png', 'image/png', 15410, '2024-07-22 01:00:26', '2024-07-22 01:00:26'),
(11, 1, '1721635226_669e119a88725.png', 'public/images/1721635226_669e119a88725.png', 'image/png', 20782, '2024-07-22 01:00:26', '2024-07-22 01:00:26'),
(12, 1, '1721635226_669e119a88db9.png', 'public/images/1721635226_669e119a88db9.png', 'image/png', 23235, '2024-07-22 01:00:26', '2024-07-22 01:00:26'),
(16, 2, '1721648260_669e448435e4e.png', 'public/images/1721648260_669e448435e4e.png', 'image/png', 4135, '2024-07-22 04:37:40', '2024-07-22 04:37:40'),
(17, 2, '1721648260_669e448439319.png', 'public/images/1721648260_669e448439319.png', 'image/png', 4137, '2024-07-22 04:37:40', '2024-07-22 04:37:40'),
(18, 2, '1721648260_669e448439935.png', 'public/images/1721648260_669e448439935.png', 'image/png', 4137, '2024-07-22 04:37:40', '2024-07-22 04:37:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"4d0ce694-46be-418e-97a4-224692bc374b\",\"displayName\":\"App\\\\Jobs\\\\ResendVerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ResendVerificationEmail\",\"command\":\"O:32:\\\"App\\\\Jobs\\\\ResendVerificationEmail\\\":2:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-07-16 03:06:06.355867\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1721099166, 1721099106),
(2, 'default', '{\"uuid\":\"3f6fea68-2068-48c4-a45b-fb6a80826b51\",\"displayName\":\"App\\\\Jobs\\\\ResendVerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ResendVerificationEmail\",\"command\":\"O:32:\\\"App\\\\Jobs\\\\ResendVerificationEmail\\\":2:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-07-18 04:15:35.916524\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1721276135, 1721276076),
(3, 'default', '{\"uuid\":\"462e1b4b-54a1-4cac-ab21-1937869dc792\",\"displayName\":\"App\\\\Jobs\\\\ResendVerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ResendVerificationEmail\",\"command\":\"O:32:\\\"App\\\\Jobs\\\\ResendVerificationEmail\\\":2:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-07-22 07:42:37.128413\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1721634157, 1721634098),
(4, 'default', '{\"uuid\":\"934fdaaf-90ef-4aad-8a9a-c056d044faac\",\"displayName\":\"App\\\\Jobs\\\\ResendVerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ResendVerificationEmail\",\"command\":\"O:32:\\\"App\\\\Jobs\\\\ResendVerificationEmail\\\":2:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-19 06:40:19.044444\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1726728019, 1726727960);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `locations`
--

CREATE TABLE `locations` (
  `id` bigint UNSIGNED NOT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `locations`
--

INSERT INTO `locations` (`id`, `department_id`, `location_name`, `notes`, `created_at`, `updated_at`) VALUES
(51, 50, 'Hamill-Parisian', 'Quibusdam eum reiciendis aut laborum ipsa aut ullam cumque.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(52, 44, 'Davis-Gottlieb', 'Quos maiores molestiae ipsam perspiciatis repellat.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(53, 46, 'Rowe Group', 'Asperiores esse nulla magni eos ratione.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(54, 14, 'Kris, Jenkins and Hickle', 'Nulla et totam labore voluptate voluptatem quaerat ut.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(55, 31, 'Barrows-Block', 'Ab suscipit et sed et.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(56, 7, 'Roob LLC', 'Magnam aut officia iste cupiditate.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(57, 15, 'Stracke Group', 'Error fuga est et facilis iure ad voluptatibus.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(58, 45, 'Towne Ltd', 'Ut non libero ut recusandae voluptates non aliquam architecto.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(59, 23, 'McLaughlin LLC', 'Esse quos iusto totam dolores adipisci beatae cupiditate.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(60, 33, 'Murray Ltd', 'Vero omnis qui odio ex dolorem omnis.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(61, 8, 'Parisian-Stehr', 'Ut cupiditate sed cupiditate esse impedit sapiente natus.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(62, 6, 'Leffler, Pacocha and White', 'Non cumque voluptates commodi provident.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(63, 10, 'Greenholt, Reilly and Murphy', 'Alias aliquam veritatis officia tempora quos quae.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(64, 17, 'Roob-Medhurst', 'Accusantium neque est id asperiores.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(65, 5, 'Nitzsche, White and Waters', 'Ut aut sequi saepe pariatur.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(66, 27, 'Yost, Ziemann and McClure', 'Illo quia laudantium nobis accusantium eos adipisci repellat.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(67, 25, 'Streich, Powlowski and Auer', 'Aspernatur ea corrupti dolorum voluptas facilis tempore ab ex.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(68, 31, 'Keeling, Yost and Daugherty', 'Ut quia illum qui rerum.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(69, 51, 'Roberts-Willms', 'Neque nesciunt quia quia.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(70, 29, 'Sporer LLC', 'Aut recusandae voluptas a reprehenderit omnis illo placeat.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(71, 14, 'Douglas, Gleason and Howe', 'Dolore voluptatem recusandae quo.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(72, 16, 'Dietrich, Glover and Hauck', 'Id hic qui dolor ipsam accusamus fuga.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(73, 2, 'Leuschke-Wilderman', 'Harum autem ut itaque placeat quo dolores ipsam.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(74, 23, 'Abshire, Sanford and Farrell', 'Inventore sit magni incidunt.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(75, 35, 'Homenick LLC', 'Qui tempora non eligendi beatae.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(76, 18, 'Donnelly-Koelpin', 'Optio possimus ipsa optio et expedita.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(77, 32, 'McDermott, Christiansen and Smitham', 'Rerum dolores consectetur eligendi beatae.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(78, 26, 'Kuphal, Ferry and Jakubowski', 'Rerum occaecati tempore sed.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(79, 7, 'Heaney Inc', 'Sint provident temporibus at et magni qui.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(80, 16, 'Gibson, O\'Hara and Larkin', 'Ut voluptas sapiente occaecati optio.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(81, 21, 'King, Bashirian and Aufderhar', 'Voluptatibus est voluptatem ipsa.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(82, 4, 'Purdy, Becker and Williamson', 'At voluptatem dolor sed esse aut numquam.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(83, 40, 'Fisher-Schroeder', 'Itaque ea qui et eaque dicta ipsa.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(84, 24, 'Trantow Ltd', 'Quae sunt aut libero alias nesciunt est et.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(85, 18, 'Bartell, Bogan and Leffler', 'Aut odit deleniti odit facere.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(86, 29, 'Stroman Inc', 'Rerum occaecati incidunt voluptas soluta cumque occaecati.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(87, 3, 'Hammes, Hansen and Schroeder', 'Voluptate dolore enim accusantium vero.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(88, 48, 'Gerlach, Yost and Rogahn', 'Voluptates vero facere quasi et est.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(89, 46, 'Metz, Kutch and Kreiger', 'Cumque quisquam numquam ut beatae quisquam corporis.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(90, 43, 'Rutherford, Lesch and Halvorson', 'Et assumenda est provident repudiandae perspiciatis.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(92, 39, 'Metz, Abbott and Ondricka', 'Asperiores enim ut error est tempora reprehenderit.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(93, 21, 'Kilback-Cassin', 'Delectus quia voluptas ex consequatur at quia.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(94, 11, 'Grant Ltd', 'Alias iste cupiditate quo pariatur deleniti distinctio.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(95, 3, 'Heller LLC', 'Et sequi atque vel consequuntur ipsum.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(96, 28, 'Eichmann, Blanda and Schoen', 'Doloremque quos ducimus molestiae.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(97, 31, 'Fahey-Johnson', 'Rerum dicta esse dicta.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(98, 6, 'Herman-Homenick', 'Rerum facere perferendis facere non.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(99, 4, 'Gusikowski, Brekke and Friesen', 'Deleniti vel quod in maxime quasi tempora.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(100, 49, 'Gaylord, Kuhic and Jast', 'Quidem sint itaque libero rerum quia mollitia velit.', '2024-07-17 21:04:12', '2024-07-17 21:04:12'),
(101, 14, 'Meeting room', 'AAA', '2024-07-17 22:19:30', '2024-07-17 22:19:30'),
(102, 50, 'Hamill-Parisian (Copy)', 'Quibusdam eum reiciendis aut laborum ipsa aut ullam cumque.', '2024-07-17 22:23:41', '2024-07-17 22:23:41'),
(103, 9, 'Meeting room 2333', 'OK', '2024-07-22 00:48:38', '2024-07-22 00:48:38'),
(105, 2, 'Location A', 'Notes for Location A', '2024-07-22 00:51:40', '2024-07-22 00:51:40'),
(106, 3, 'Location B', 'Notes for Location B', '2024-07-22 00:51:40', '2024-07-22 00:51:40'),
(107, 4, 'Location C', 'Notes for Location C', '2024-07-22 00:51:40', '2024-07-22 00:51:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'dolores', '2024-07-18 19:46:17', '2024-07-18 19:46:17'),
(2, 'ipsam', '2024-07-18 19:46:17', '2024-07-18 19:46:17'),
(3, 'quis', '2024-07-18 19:46:17', '2024-07-18 19:46:17'),
(4, 'sit', '2024-07-18 19:46:17', '2024-07-18 19:46:17'),
(5, 'quo', '2024-07-18 19:46:17', '2024-07-18 19:46:17'),
(6, 'ipsa', '2024-07-18 19:46:17', '2024-07-18 19:46:17'),
(7, 'neque', '2024-07-18 19:46:17', '2024-07-18 19:46:17'),
(8, 'ab', '2024-07-18 19:46:17', '2024-07-18 19:46:17'),
(9, 'et', '2024-07-18 19:46:17', '2024-07-18 19:46:17'),
(10, 'fugit', '2024-07-18 19:46:17', '2024-07-18 19:46:17'),
(11, 'similique', '2024-07-18 19:46:17', '2024-07-18 19:46:17'),
(12, 'quo', '2024-07-18 19:46:17', '2024-07-18 19:46:17'),
(13, 'eum', '2024-07-18 19:46:17', '2024-07-18 19:46:17'),
(14, 'debitis', '2024-07-18 19:46:17', '2024-07-18 19:46:17'),
(15, 'eum', '2024-07-18 19:46:17', '2024-07-18 19:46:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '0001_01_01_000001_create_cache_table', 1),
(14, '0001_01_01_000002_create_jobs_table', 2),
(22, '2024_07_17_085806_create_categories_table', 8),
(23, '2024_07_17_085950_create_conditions_table', 9),
(24, '2024_07_17_090228_create_manufacturers_table', 10),
(25, '2024_07_17_090315_create_models_table', 11),
(27, '2024_07_17_091945_create_suppliers_table', 12),
(31, '2024_07_16_023953_create_permission_tables', 16),
(32, '2024_07_12_033836_create_table_departments_table', 17),
(33, '2024_07_12_033607_create_table_locations_table', 18),
(34, '0001_01_01_000000_create_users_table', 19),
(36, '2024_07_18_041814_add_must_change_password_to_users_table', 21),
(38, '2024_07_17_092600_create_assets_table', 22),
(39, '2024_07_17_092439_create_images_table', 23),
(40, '2024_07_24_093247_add_is_added_to_assets_table', 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `models`
--

CREATE TABLE `models` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `models`
--

INSERT INTO `models` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'est', '2024-07-18 19:49:41', '2024-07-18 19:49:41'),
(2, 'odio', '2024-07-18 19:49:41', '2024-07-18 19:49:41'),
(3, 'et', '2024-07-18 19:49:41', '2024-07-18 19:49:41'),
(4, 'alias', '2024-07-18 19:49:41', '2024-07-18 19:49:41'),
(5, 'quas', '2024-07-18 19:49:41', '2024-07-18 19:49:41'),
(6, 'nisi', '2024-07-18 19:49:41', '2024-07-18 19:49:41'),
(7, 'laborum', '2024-07-18 19:49:41', '2024-07-18 19:49:41'),
(8, 'eum', '2024-07-18 19:49:41', '2024-07-18 19:49:41'),
(9, 'optio', '2024-07-18 19:49:41', '2024-07-18 19:49:41'),
(10, 'voluptas', '2024-07-18 19:49:41', '2024-07-18 19:49:41'),
(11, 'possimus', '2024-07-18 19:49:41', '2024-07-18 19:49:41'),
(12, 'commodi', '2024-07-18 19:49:41', '2024-07-18 19:49:41'),
(13, 'consequatur', '2024-07-18 19:49:41', '2024-07-18 19:49:41'),
(14, 'iusto', '2024-07-18 19:49:41', '2024-07-18 19:49:41'),
(15, 'natus', '2024-07-18 19:49:41', '2024-07-18 19:49:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 7),
(1, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view user', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(2, 'create user', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(3, 'edit user', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(4, 'delete user', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(5, 'view role', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(6, 'create role', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(7, 'edit role', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(8, 'delete role', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(9, 'view location', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(10, 'create location', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(11, 'edit location', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(12, 'delete location', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(13, 'view asset', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(14, 'create asset', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(15, 'edit asset', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(16, 'delete asset', 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(2, 'super-admin', NULL, 'web', '2024-07-18 00:47:05', '2024-07-18 00:47:05'),
(3, 'Employee', 'AAA', 'web', '2024-07-18 00:49:03', '2024-07-18 00:49:03'),
(5, 'Test Role', 'AAAA', 'web', '2024-07-25 19:51:49', '2024-07-25 19:51:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(5, 1),
(9, 1),
(12, 1),
(13, 1),
(16, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(13, 3),
(5, 5),
(6, 5),
(7, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AYO6FVeYDjrMwCSnfG68LzYilVSNuLvIFB31gnMt', '1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicEtYZmVSWkJVR25oVGNmY25WemRYR1NnZXhKNVJFMmw5VndEUzhDSyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaG93LXByaW50P2Fzc2V0X2NvZGU9MiZhc3NldF9uYW1lPTEmZGF0ZV9wdXJjaGFzZWQ9MyZ0ZW1wbGF0ZT10ZW1wbGF0ZTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6OToidXNlcl9uYW1lIjtzOjIxOiJOZ3V54buFbiBUdeG6pW4gUGhvbmciO30=', 1731253951);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'architecto', '2024-07-18 19:50:57', '2024-07-18 19:50:57'),
(2, 'laboriosam', '2024-07-18 19:50:57', '2024-07-18 19:50:57'),
(3, 'aut', '2024-07-18 19:50:57', '2024-07-18 19:50:57'),
(4, 'hic', '2024-07-18 19:50:57', '2024-07-18 19:50:57'),
(5, 'laudantium', '2024-07-18 19:50:57', '2024-07-18 19:50:57'),
(6, 'recusandae', '2024-07-18 19:50:57', '2024-07-18 19:50:57'),
(7, 'id', '2024-07-18 19:50:57', '2024-07-18 19:50:57'),
(8, 'et', '2024-07-18 19:50:57', '2024-07-18 19:50:57'),
(9, 'veritatis', '2024-07-18 19:50:57', '2024-07-18 19:50:57'),
(10, 'sit', '2024-07-18 19:50:57', '2024-07-18 19:50:57'),
(11, 'animi', '2024-07-18 19:50:57', '2024-07-18 19:50:57'),
(12, 'architecto', '2024-07-18 19:50:57', '2024-07-18 19:50:57'),
(13, 'nihil', '2024-07-18 19:50:57', '2024-07-18 19:50:57'),
(14, 'id', '2024-07-18 19:50:57', '2024-07-18 19:50:57'),
(15, 'blanditiis', '2024-07-18 19:50:57', '2024-07-18 19:50:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `location_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `must_change_password` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `location_id`, `name`, `company`, `email`, `phone`, `status`, `email_verified_at`, `password`, `must_change_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 100, 'Nguyễn Tuấn Phong', 'Apps Cyclone', 'phong@gmail.com', NULL, 1, '2024-07-17 21:14:42', '$2y$12$6D3qp4zIuiT42pXmq5m0meBQRJsKxd520.3svX8UPyrYB2UKDOh8m', 1, NULL, '2024-07-17 21:14:26', '2024-07-17 21:14:42'),
(7, 60, 'Phạm Nhi', 'fpoly', 'ptn3221@gmail.com', '+84328414771', 1, NULL, '$2y$12$rBBQlvEgQ4sZ5oUzLrIA5eBrBTSbsG0Gdsirjw95eplCSVTgfm0rC', 1, NULL, '2024-07-18 02:51:11', '2024-07-22 00:24:29'),
(8, NULL, 'Nguyễn Tuấn Phong', 'Apps Cyclone', 'phong123@gmail.com', NULL, 1, '2024-07-22 00:41:55', '$2y$12$jydjKy/90j8SDLEf8Se2re/JuTmlV/hhHXLzQ46DyYiVlfiiY8K9i', 1, NULL, '2024-07-22 00:41:30', '2024-07-22 00:41:55'),
(9, 63, 'Phạm Nhi', 'fpoly', 'pppp@gmail.com', '03056156185', 1, NULL, '$2y$12$ohkszdBwOe4r0xhJWovOQ.a.yRVmM9KFQlDnQoRgJlwqLbIC9lN..', 1, NULL, '2024-07-25 19:55:32', '2024-07-25 19:57:26'),
(10, NULL, 'Phạm Nhi', 'Apps Cyclone', 'phong445@gmail.com', NULL, 1, NULL, '$2y$12$CeAc3UGlmjkSgFF/rsb67OHe6dIUNBLf/BtLWnNO5n5CJL8lbq75C', 1, NULL, '2024-09-18 23:39:07', '2024-09-18 23:39:07');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assets_category_id_foreign` (`category_id`),
  ADD KEY `assets_location_id_foreign` (`location_id`),
  ADD KEY `assets_condition_id_foreign` (`condition_id`),
  ADD KEY `assets_manufacture_id_foreign` (`manufacture_id`),
  ADD KEY `assets_model_id_foreign` (`model_id`),
  ADD KEY `assets_supplier_id_foreign` (`supplier_id`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Chỉ mục cho bảng `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_asset_id_foreign` (`asset_id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_department_id_foreign` (`department_id`);

--
-- Chỉ mục cho bảng `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_location_id_index` (`location_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT cho bảng `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assets_condition_id_foreign` FOREIGN KEY (`condition_id`) REFERENCES `conditions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assets_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assets_manufacture_id_foreign` FOREIGN KEY (`manufacture_id`) REFERENCES `manufacturers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assets_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assets_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
