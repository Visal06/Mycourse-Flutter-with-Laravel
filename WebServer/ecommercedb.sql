-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 11, 2024 at 04:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `title`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Size', NULL, '2024-05-30 23:28:02', '2024-05-30 23:28:02'),
(2, 'Color', NULL, '2024-05-30 23:28:08', '2024-05-30 23:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `values` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attribute_id`, `values`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'S', NULL, '2024-05-30 23:28:17', '2024-05-30 23:28:17'),
(2, 1, 'L', NULL, '2024-05-30 23:28:22', '2024-05-30 23:28:22'),
(3, 1, 'M', NULL, '2024-05-30 23:28:27', '2024-05-30 23:28:27'),
(4, 1, 'Blue', NULL, '2024-05-30 23:28:31', '2024-05-30 23:28:31'),
(5, 1, 'Red', NULL, '2024-05-30 23:28:35', '2024-05-30 23:28:35'),
(6, 1, 'Grey', NULL, '2024-05-30 23:28:40', '2024-05-30 23:28:40'),
(7, 2, 'Gold', NULL, '2024-05-31 03:08:20', '2024-05-31 03:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Computer', NULL, NULL, '2024-05-30 23:27:45', '2024-05-30 23:27:45'),
(2, 'Cloth', NULL, NULL, '2024-05-30 23:27:54', '2024-05-30 23:27:54'),
(3, 'Mobile', NULL, NULL, '2024-05-30 23:29:08', '2024-05-30 23:29:08'),
(4, 'Test 1', NULL, NULL, '2024-05-31 07:30:54', '2024-05-31 07:30:54'),
(5, 'Test 2', NULL, NULL, '2024-05-31 07:31:00', '2024-05-31 07:31:00'),
(6, 'Test 3', NULL, NULL, '2024-05-31 07:31:04', '2024-05-31 07:31:04'),
(7, 'Test 4', NULL, NULL, '2024-05-31 07:31:09', '2024-05-31 07:31:09'),
(8, 'Test 5', NULL, NULL, '2024-05-31 07:31:14', '2024-05-31 07:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_30_134754_create_categories_table', 1),
(5, '2024_05_30_142222_create_attributes_table', 1),
(6, '2024_05_30_143502_create_attribute_values_table', 1),
(7, '2024_05_31_055829_create_products_table', 1),
(8, '2024_05_31_102621_create_personal_access_tokens_table', 1),
(9, '2024_06_06_043803_create_product_gallaries_table', 1),
(10, '2024_06_08_105444_create_payments_table', 1),
(11, '2024_06_08_105454_create_payment_details_table', 1),
(12, '2024_06_09_033042_create_sides_table', 1),
(13, '2024_07_02_014456_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payments_date` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paymentId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'mhm', 'jhj', '2024-07-01 18:54:25', '2024-07-01 18:54:25'),
(2, 'bb', 'moo', NULL, NULL),
(3, 'bb', 'moo', NULL, NULL),
(4, 'bb', 'moo', NULL, NULL),
(5, 'bb', 'moo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryid` int(11) NOT NULL,
  `attributevalueid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `prices` text NOT NULL,
  `description` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categoryid`, `attributevalueid`, `title`, `images`, `prices`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 6, 'Iphone Xs Max', 'jkj', '100', 'df df', '2024-05-31 02:50:01', '2024-05-30 23:29:39', '2024-05-31 02:50:01'),
(2, 1, 1, 'DELL XPS 16 TOUCH', 'post/DTiMUKT747gDFn2TBjtoTJZREdiaKE71NwE7mLsj.png', '500', '<ul>\r\n<li>CPU: Intel&reg; Core&trade; Ultra 9 Processor 185H (24MB Cache, 16cores,Threads22 up to 5.1 GHz )</li>\r\n<li>RAM: 32GB LPDDR5X</li>\r\n<li>Storage: SSD 1TB M2 PCIE</li>\r\n<li>Optical Drive: N/A</li>\r\n<li>Graphic: Intel&reg; graphics</li>\r\n<li>Graphic 1: NVIDIA&reg; GeForce&reg; RTX4060 8GB GDDR6 &nbsp;</li>\r\n<li>Display : 16.3\"UHD ( 3840 x 2400 ) OLED Touch Screen &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</li>\r\n<li>Wi-Fi 7 + Bluetooth 5.4</li>\r\n</ul>\r\n<div><strong>Ports</strong></div>\r\n<div>2 Thunderbolt&trade; 4 Gen 2 Type-C&reg; ports with DisplayPort Alt Mode/USB4 and PowerDelivery<br>1 USB 3.2 Gen 2 Type-C&trade; port with Power Delivery and DisplayPort&trade;</div>\r\n<ul>\r\n<li>Battery : 6 Cell, 99.5Wh</li>\r\n<li>Weight: 2.20kg</li>\r\n<li>OS: Win 11H License</li>\r\n<li>Color: Graphite</li>\r\n</ul>\r\n<div><strong>Warranty</strong></div>\r\n<ul>\r\n<li>2-year hardware &nbsp;</li>\r\n<li>1-year for screen, keyboard 6Month on battery</li>\r\n</ul>', NULL, '2024-05-31 02:48:02', '2024-06-06 08:22:56'),
(3, 1, 1, 'DELL XPS 14 TOUCH', 'post/3QSykMMGLMx0kIfxrUaoTheULYJwZ7UL7XS4FvVv.png', '400', '<ul>\r\n<li>CPU: Intel&reg; Core&trade; Ultra 9 Processor 185H (24MB Cache, 16cores,Threads22 up to 5.1 GHz )</li>\r\n<li>RAM: 32GB LPDDR5X</li>\r\n<li>Storage: SSD 1TB M2 PCIE</li>\r\n<li>Optical Drive: N/A</li>\r\n<li>Graphic: Intel&reg; graphics</li>\r\n<li>Graphic 1: NVIDIA&reg; GeForce&reg; RTX4060 8GB GDDR6 &nbsp;</li>\r\n<li>Display : 16.3\"UHD ( 3840 x 2400 ) OLED Touch Screen &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</li>\r\n<li>Wi-Fi 7 + Bluetooth 5.4</li>\r\n</ul>\r\n<div>Ports<br>2 Thunderbolt&trade; 4 Gen 2 Type-C&reg; ports with DisplayPort Alt Mode/USB4 and PowerDelivery<br>1 USB 3.2 Gen 2 Type-C&trade; port with Power Delivery and DisplayPort&trade;</div>\r\n<ul>\r\n<li>Battery : 6 Cell, 99.5Wh</li>\r\n<li>Weight: 2.20kg</li>\r\n<li>OS: Win 11H License</li>\r\n<li>Color: Graphite</li>\r\n</ul>\r\n<div>Warranty</div>\r\n<ul>\r\n<li>2-year hardware &nbsp;</li>\r\n<li>1-year for screen, keyboard 6Month on battery</li>\r\n</ul>', NULL, '2024-05-31 02:53:31', '2024-06-06 08:23:03'),
(4, 1, 1, 'DELL XPS 13 TOUCH', 'post/19Zwqr7YIq4fwsU9QLyUba4hGx75PIhxtJ5PGo3C.png', '230', '<ul>\r\n<li>CPU: Intel&reg; Core&trade; Ultra 7 Processor 155H (24MB Cache, 16cores,Threads22 up to 4.8 GHz)</li>\r\n<li>RAM: 32GB LPDDR5X</li>\r\n<li>Storage: SSD 1TB M2 PCIE</li>\r\n<li>Optical Drive: N/A</li>\r\n<li>Graphic: Intel&reg; Arc&trade; graphics</li>\r\n<li>Display : 13.4\"QHD ( 2560 x 1600 ) Touch Screen &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</li>\r\n<li>Wi-Fi 7 + Bluetooth 5.4</li>\r\n</ul>\r\n<div>Ports<br>2x Thunderbolt&trade; 4 (40 Gbps) ports with Power Delivery (Type-C&reg;)</div>\r\n<ul>\r\n<li>Battery : 3 Cell, 55Wh</li>\r\n<li>Weight: 1.19kg</li>\r\n<li>OS: Win 11H License</li>\r\n<li>Color: Platinum</li>\r\n</ul>\r\n<div>Warranty</div>\r\n<ul>\r\n<li>2-year hardware &nbsp;</li>\r\n<li>1-year for screen, keyboard 6Month on battery</li>\r\n</ul>', NULL, '2024-05-31 02:56:44', '2024-06-06 08:23:10'),
(5, 3, 1, 'Oppo A60 128GB+8GB', 'post/r08FVtogpk7KRkCnAjgiZH4KkoDPw4iAtuIyNAd2.png', '120', '<ul>\r\n<li>SIM: Dual SIM LTE</li>\r\n<li>Screen Size: 6.67 inches, 107.2 cm2</li>\r\n<li>Storage: 128GB+8GB</li>\r\n<li>OS: Android 14, ColorOS 14</li>\r\n<li>ChipSet: Qualcomm SM6225 Snapdragon 680 4G (6 nm)</li>\r\n<li>CPU: Octa-core (4&times;2.4 GHz Kryo 265 Gold &amp; 4&times;1.9 GHz Kryo 265 Silver)</li>\r\n<li>GPU: Adreno 610</li>\r\n</ul>\r\n<div>Camara Tripple:</div>\r\n<ul>\r\n<li>50 MP, f/1.8, (wide), PDAF</li>\r\n<li>2 MP, f/2.4, (depth)</li>\r\n<li>LED flash, HDR, panorama</li>\r\n<li>Video: 1080p@30fps</li>\r\n</ul>\r\n<div>Front Camara Single:</div>\r\n<ul>\r\n<li>8 MP, f/2.0, (wide)</li>\r\n<li>1080p@30fps</li>\r\n<li>Battery: 5000 mAh, non-removable</li>\r\n<li>Fast charging 45W wired</li>\r\n</ul>', NULL, '2024-05-31 03:01:25', '2024-06-06 08:23:17'),
(6, 3, 1, 'Oppo A38', 'post/ci193873WiIxSzVyL5IoWCR3AjzMC0J0n7t5yyLz.png', '110', '<ul>\r\n<li>128GB|4GB+4GB</li>\r\n<li>Color: Glowing Black, Glowing Gold</li>\r\n<li>1 Year Warranty</li>\r\n</ul>\r\n<div>\r\n<div>Camara Tripple:</div>\r\n<ul>\r\n<li>50 MP, f/1.8, (wide), PDAF</li>\r\n<li>2 MP, f/2.4, (depth)</li>\r\n<li>LED flash, HDR, panorama</li>\r\n<li>Video: 1080p@30fps</li>\r\n</ul>\r\n<div>Front Camara Single:</div>\r\n<ul>\r\n<li>8 MP, f/2.0, (wide)</li>\r\n<li>1080p@30fps</li>\r\n<li>Battery: 5000 mAh, non-removable</li>\r\n<li>Fast charging 45W wired</li>\r\n</ul>\r\n</div>', NULL, '2024-05-31 03:10:06', '2024-06-06 08:23:24'),
(7, 2, 1, 'T-Shirt with Print', 'post/VtbNbAJnon6R1x90iHZpqO1abtCpF5K4DaEOnG1Y.png', '20', '<ul>\r\n<li>Code. 1222403252</li>\r\n<li>Color: red blue and gray</li>\r\n<li>Size: S M X XL</li>\r\n<li>T-shirt featuring short sleeves, with graphic print at the back and crewneck.</li>\r\n<li>Model is 161 cm tall / 43 kg weight and is wearing size XS.</li>\r\n</ul>', NULL, '2024-05-31 03:16:17', '2024-06-06 08:23:29'),
(8, 2, 1, 'T-Shirt With Print Men', 'post/RbH3t3Wx7fWZWSE0usmtBp73y46Nlu0CAVmqkU91.png', '23', '<ul>\r\n<li>Code. 2122402322</li>\r\n<li>Color: Red Green and White</li>\r\n<li>Size: S M L</li>\r\n<li>T-shirt featuring short sleeves, with graphic print at the back and crew neckline.</li>\r\n<li>Model is 177 cm tall / 65kg weight and is wearing size M.</li>\r\n</ul>', NULL, '2024-05-31 03:20:00', '2024-06-06 08:23:34'),
(9, 1, 1, 'TT', 'post/hKZdznELs7tPVfFp0WFkcfWWW33R7BnDqxkkJLP2.jpg', '89', '<ul>\r\n<li>CPU: Intel&reg; Core&trade; Ultra 9 Processor 185H (24MB Cache, 16cores,Threads22 up to 5.1 GHz )</li>\r\n<li>RAM: 32GB LPDDR5X</li>\r\n<li>Storage: SSD 1TB M2 PCIE</li>\r\n<li>Optical Drive: N/A</li>\r\n<li>Graphic: Intel&reg; graphics</li>\r\n<li>Graphic 1: NVIDIA&reg; GeForce&reg; RTX4060 8GB GDDR6 &nbsp;</li>\r\n<li>Display : 16.3\"UHD ( 3840 x 2400 ) OLED Touch Screen &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</li>\r\n<li>Wi-Fi 7 + Bluetooth 5.4</li>\r\n</ul>\r\n<div><strong>Ports</strong></div>\r\n<div>2 Thunderbolt&trade; 4 Gen 2 Type-C&reg; ports with DisplayPort Alt Mode/USB4 and PowerDelivery<br>1 USB 3.2 Gen 2 Type-C&trade; port with Power Delivery and DisplayPort&trade;</div>\r\n<ul>\r\n<li>Battery : 6 Cell, 99.5Wh</li>\r\n<li>Weight: 2.20kg</li>\r\n<li>OS: Win 11H License</li>\r\n<li>Color: Graphite</li>\r\n</ul>\r\n<div><strong>Warranty</strong></div>\r\n<ul>\r\n<li>2-year hardware &nbsp;</li>\r\n<li>1-year for screen, keyboard 6Month on battery</li>\r\n</ul>', '2024-06-05 23:15:00', '2024-06-05 22:01:01', '2024-06-05 23:15:00'),
(10, 1, 1, 'TT', 'post/7XvFryQSVGbtIaQTLM34L87rDWllyzQjDPebSKop.jpg', '89', '<ul>\r\n<li>CPU: Intel&reg; Core&trade; Ultra 9 Processor 185H (24MB Cache, 16cores,Threads22 up to 5.1 GHz )</li>\r\n<li>RAM: 32GB LPDDR5X</li>\r\n<li>Storage: SSD 1TB M2 PCIE</li>\r\n<li>Optical Drive: N/A</li>\r\n<li>Graphic: Intel&reg; graphics</li>\r\n<li>Graphic 1: NVIDIA&reg; GeForce&reg; RTX4060 8GB GDDR6 &nbsp;</li>\r\n<li>Display : 16.3\"UHD ( 3840 x 2400 ) OLED Touch Screen &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</li>\r\n<li>Wi-Fi 7 + Bluetooth 5.4</li>\r\n</ul>\r\n<div><strong>Ports</strong></div>\r\n<div>2 Thunderbolt&trade; 4 Gen 2 Type-C&reg; ports with DisplayPort Alt Mode/USB4 and PowerDelivery<br>1 USB 3.2 Gen 2 Type-C&trade; port with Power Delivery and DisplayPort&trade;</div>\r\n<ul>\r\n<li>Battery : 6 Cell, 99.5Wh</li>\r\n<li>Weight: 2.20kg</li>\r\n<li>OS: Win 11H License</li>\r\n<li>Color: Graphite</li>\r\n</ul>\r\n<div><strong>Warranty</strong></div>\r\n<ul>\r\n<li>2-year hardware &nbsp;</li>\r\n<li>1-year for screen, keyboard 6Month on battery</li>\r\n</ul>', '2024-06-05 23:15:03', '2024-06-05 22:01:25', '2024-06-05 23:15:03'),
(11, 1, 1, 'h bnm gfdg g', 'post/UIrKajCjDerq77PCPdKUW7MkvxyUMw0cmEeY050T.jpg', '578', '<ul>\r\n<li>CPU: Intel&reg; Core&trade; Ultra 9 Processor 185H (24MB Cache, 16cores,Threads22 up to 5.1 GHz )</li>\r\n<li>RAM: 32GB LPDDR5X</li>\r\n<li>Storage: SSD 1TB M2 PCIE</li>\r\n<li>Optical Drive: N/A</li>\r\n<li>Graphic: Intel&reg; graphics</li>\r\n<li>Graphic 1: NVIDIA&reg; GeForce&reg; RTX4060 8GB GDDR6 &nbsp;</li>\r\n<li>Display : 16.3\"UHD ( 3840 x 2400 ) OLED Touch Screen &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</li>\r\n<li>Wi-Fi 7 + Bluetooth 5.4</li>\r\n</ul>\r\n<div><strong>Ports</strong></div>\r\n<div>2 Thunderbolt&trade; 4 Gen 2 Type-C&reg; ports with DisplayPort Alt Mode/USB4 and PowerDelivery<br>1 USB 3.2 Gen 2 Type-C&trade; port with Power Delivery and DisplayPort&trade;</div>\r\n<ul>\r\n<li>Battery : 6 Cell, 99.5Wh</li>\r\n<li>Weight: 2.20kg</li>\r\n<li>OS: Win 11H License</li>\r\n<li>Color: Graphite</li>\r\n</ul>\r\n<div><strong>Warranty</strong></div>\r\n<ul>\r\n<li>2-year hardware &nbsp;</li>\r\n<li>1-year for screen, keyboard 6Month on battery</li>\r\n</ul>', '2024-06-06 06:36:57', '2024-06-05 22:15:23', '2024-06-06 06:36:57'),
(12, 1, 1, 'test', 'post/i0lHfokuJx2zOh0GQaqpLfWyjZWJO2ztGCrRk69g.png', '10', '<div>kjk</div>', '2024-06-06 06:36:55', '2024-06-06 02:57:06', '2024-06-06 06:36:55'),
(13, 1, 1, 'test', 'post/ziIknUsifvDHYGVp3lt2sVTtAdjZeyUjhX3QDfCR.png', '10', '<div>kjk</div>', '2024-06-06 06:36:54', '2024-06-06 02:57:24', '2024-06-06 06:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallaries`
--

CREATE TABLE `product_gallaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_gallaries`
--

INSERT INTO `product_gallaries` (`id`, `product_id`, `images`, `deleted_at`, `created_at`, `updated_at`) VALUES
(69, 1, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(70, 1, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(71, 1, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(72, 1, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(73, 2, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(74, 2, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(75, 2, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(76, 2, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(77, 3, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(78, 3, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(79, 3, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(80, 3, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(81, 4, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(82, 4, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(83, 4, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(84, 4, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(85, 5, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(86, 5, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(87, 5, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(88, 5, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(89, 6, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(90, 6, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(91, 6, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(92, 6, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(93, 7, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(94, 7, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(95, 7, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(96, 7, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(97, 8, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(98, 8, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(99, 8, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(100, 8, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(101, 9, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(102, 9, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(103, 9, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(104, 9, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(105, 10, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(106, 10, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(107, 10, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(108, 10, 'galleries/vbTOJkZCPphsKlQKS355JdoNat0sytQAautjATjM.jpg', NULL, NULL, NULL),
(109, 13, 'galleries/qc3zBGRPjr04wIJjJCY5tPmZjeG0rO9StpiWrhA7.jpg', NULL, '2024-06-06 02:57:24', '2024-06-06 02:57:24'),
(110, 13, 'galleries/HtWWOP3qKeMaHFgDTOWVXnpuImohqByROUgDiWz8.jpg', NULL, '2024-06-06 02:57:24', '2024-06-06 02:57:24'),
(111, 13, 'galleries/IScSnfl0TT0TYwAyxTwRUFVLUF0gKui6DRL3NHkd.jpg', NULL, '2024-06-06 02:57:24', '2024-06-06 02:57:24'),
(112, 13, 'galleries/HlTmhY9rkuXiSWCuZ4UEv7ssn1CK1rAI7w7RD3jd.jpg', NULL, '2024-06-06 02:57:24', '2024-06-06 02:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sides`
--

CREATE TABLE `sides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slideurl` varchar(255) NOT NULL,
  `orderitem` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sides`
--

INSERT INTO `sides` (`id`, `slideurl`, `orderitem`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'post/UK3gD6pdZWu7ONYq6uwV6RMsHpES1VjPzFeBlupq.png', 1, NULL, '2024-06-08 20:58:10', '2024-06-08 20:58:10'),
(2, 'post/2DMQAZLePumSdVKlUYQhFn6bAGFfjMGJAwi2nbYZ.png', 2, NULL, '2024-06-08 20:58:17', '2024-06-08 20:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_gallaries`
--
ALTER TABLE `product_gallaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sides`
--
ALTER TABLE `sides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_gallaries`
--
ALTER TABLE `product_gallaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `sides`
--
ALTER TABLE `sides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
