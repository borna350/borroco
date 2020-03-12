-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 12:13 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barroco`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_description` longtext COLLATE utf8mb4_unicode_ci,
  `based_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `founded` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_description` longtext COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `about_logo`, `about_description`, `based_in`, `founded`, `about_banner_image`, `banner_title`, `banner_description`, `address`, `email`, `type`, `created_at`, `updated_at`) VALUES
(1, '1575626928_5dea28b021352_logo.jpg', 'Our story starts in the early 2017 in the metropolitan city of Milan. Our founders – after a month spent travelling around Italy and a huge amount of small and medium workshops visited – understood that Craftsmanship needed attention and support. Artisans were struggling making their workshop resist to global crisis. More than 120 thousands Italian workshops closed in the latest 5 years, and SMEs market was and still is the backbone of Italy.', 'Milan', '2017', '1575627463_5dea2ac76b571_banner.jpg', 'Crafsmanship World', 'We decide to dedicate the next years walking with you at our side around the whole “Craftsmanship World”, telling Artisans stories, spreading their passion and providing our know-how, our IT infrastucture and the most efficient customer service possibile to ensure the best experience ever to all our customers.', 'Via Tortona, 33 Milan - Italy', 'info@barrocoitalia.com', 1, '2019-12-06 04:02:11', '2019-12-06 04:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `role` enum('super_admin','admin','craftsman') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'craftsman',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','deactivated') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'deactivated',
  `craft_request` enum('accept','reject','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `slug`, `role`, `name`, `email`, `product_type`, `password`, `avatar`, `phone_number`, `description`, `address`, `status`, `craft_request`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mr-sp-admin', 'super_admin', 'Mr. SP. Admin', 'sp@admin.com', NULL, '$2y$10$dPZeXUjsVeLQmGwoelcAmeqcFSusk.z5nRWhveAcoJOQgLn8K0FfS', NULL, NULL, NULL, NULL, 'active', 'accept', NULL, '2019-11-29 03:43:11', '2019-11-29 03:43:11'),
(2, 'mr-admin', 'admin', 'Mr. Admin', 'admin@admin.com', NULL, '$2y$10$9dI/0uh5Iv0TRoIEUoOh/OAlq3XH.JcvY13rQjSpaPpb4ZdWEJxTy', NULL, NULL, NULL, NULL, 'active', 'accept', NULL, '2019-11-29 03:43:11', '2019-11-29 03:43:11'),
(7, 'alberto-olivero', 'craftsman', 'Alberto Olivero', 'test1@test.com', NULL, '$2y$10$Sl4Wd8sTdwBsQN2yrOXs/OOpur97d05x05YJZT6ww2IWH5W5tQeRG', '1575022377_Alberto Olivero.jpg', NULL, NULL, NULL, 'active', 'pending', NULL, '2019-11-29 04:12:58', '2019-11-29 04:37:55'),
(8, 'test-t', 'craftsman', 'Test T', 'test11@test.com', NULL, '$2y$10$FhuJCqwAZUJbHIgksr0uNOLKnADjBJOkJBG6.n77CLA1D8K0KdR2i', '1575022429_Test T.jpg', NULL, NULL, NULL, 'active', 'reject', NULL, '2019-11-29 04:13:49', '2019-11-29 04:38:06'),
(9, 'ron-artisan', 'craftsman', 'Ron Artisan', 'ron@gmail.com', NULL, '$2y$10$l9OEm1.DuSLQwNK51KmmTuJMRW44L7cKJbMCp2QNuYmym5zEn3zQW', NULL, NULL, NULL, NULL, 'active', 'accept', NULL, '2019-12-06 06:53:40', '2019-12-06 07:08:06'),
(10, 'test', 'craftsman', 'Test', 'test@gmail.com', NULL, '$2y$10$SJCdNx3jIQxjV2OoCgWxdeJtBoNZqFTDoekEP7fDyPu2GZt.i2K1e', NULL, NULL, NULL, NULL, 'active', 'pending', NULL, '2019-12-06 07:05:27', '2019-12-06 07:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_subtitle` text COLLATE utf8mb4_unicode_ci,
  `video_link` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `title`, `image`, `cover_image`, `site_title`, `site_subtitle`, `video_link`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'woman', 'Woman', '1575615370_5de9fb8a9d1cc_Woman.jpg', '1575615361_5de9fb81cef1c_cover.jpg', 'Strong dedication to Italian Leather goods since a Century', 'Leu Locati Master Artisans craft their products in unique manners.', NULL, 'Leu Locati Master Artisans craft their products in unique manners.', 'active', '2019-11-29 05:06:08', '2019-12-06 01:00:17'),
(2, 'man', 'Man', '1575026163_Man.jpg', NULL, NULL, NULL, NULL, NULL, 'active', '2019-11-29 05:07:32', '2019-11-29 05:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `customer_supports`
--

CREATE TABLE `customer_supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow_us`
--

CREATE TABLE `follow_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_media_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follow_us`
--

INSERT INTO `follow_us` (`id`, `social_media_name`, `social_media_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'https://www.facebook.com/', 'active', '2019-12-06 05:51:00', '2019-12-06 05:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `footer_infos`
--

CREATE TABLE `footer_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payments_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `returns_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacts_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `resi_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `type` tinyint(4) DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `logo`, `title`, `subtitle`, `type`, `banner_image`, `created_at`, `updated_at`) VALUES
(1, '1575531245_5de8b2ed3d425_logo.svg', 'The excellence of Italian Craftsmanship', 'We tell about Artisans stories. Learn & Shop from the most skilled Italian Artisans.', 1, '1575531245_5de8b2ed3d993_banner.jpg', '2019-12-04 22:05:23', '2019-12-05 01:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `home_videos`
--

CREATE TABLE `home_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `craftsman_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_videos`
--

INSERT INTO `home_videos` (`id`, `slug`, `craftsman_id`, `title`, `subtitle`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(2, 'camiceria-ambrosiana', 7, 'Camiceria Ambrosiana', 'Today, Franca and his son Alessandro Agostini open the door of the workshop in Sirtori street', '1575531103_5de8b25fc765e_Camiceria Ambrosiana.jpg', 'https://www.youtube.com/watch?time_continue=3&v=Pg5hfbsfnCc&feature=emb_logo', 'active', '2019-12-05 01:31:43', '2019-12-05 01:31:43'),
(3, 'merzaghi-1870', 7, 'Merzaghi 1870', 'Merzaghi’s jewellery was born in 1870, in a small workshop in the historical center of Milan, where Mr. Alfredo Ravasco and Mr. Rino Marzaghi started to create authentic works of art.', '1575531310_5de8b32e6d810_Merzaghi 1870.jpg', 'https://www.youtube.com/watch?v=FEyMTb_axIE&feature=emb_logo', 'active', '2019-12-05 01:35:10', '2019-12-05 01:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `slug`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'lana-tasmania', 'Lana tasmania', NULL, 'active', '2019-12-04 23:55:53', '2019-12-04 23:55:53'),
(3, 'seta', 'Seta', NULL, 'active', '2019-12-04 23:56:03', '2019-12-04 23:58:16'),
(4, 'cachemire', 'Cachemire', NULL, 'active', '2019-12-04 23:57:03', '2019-12-04 23:57:03'),
(5, 'cotton', 'Cotton', NULL, 'active', '2019-12-04 23:57:16', '2019-12-04 23:57:16'),
(6, 'linen', 'Linen', NULL, 'active', '2019-12-04 23:57:29', '2019-12-04 23:57:29'),
(7, 'lycra', 'Lycra', NULL, 'active', '2019-12-04 23:57:38', '2019-12-04 23:57:38'),
(8, 'modal', 'Modal', NULL, 'active', '2019-12-04 23:57:49', '2019-12-04 23:57:49'),
(9, 'silk', 'Silk', NULL, 'active', '2019-12-04 23:58:01', '2019-12-04 23:58:01');

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
(3, '2019_11_27_070533_create_admins_table', 1),
(4, '2019_11_27_114852_create_categories_table', 1),
(5, '2019_11_27_114938_create_subcategories_table', 1),
(6, '2019_11_28_121527_create_products_table', 1),
(7, '2019_12_03_102731_create_teams_table', 2),
(8, '2019_12_04_055359_create_home_banners_table', 3),
(9, '2019_12_04_095710_create_home_videos_table', 3),
(10, '2019_12_05_043722_create_materials_table', 4),
(11, '2019_12_05_054506_create_abouts_table', 5),
(12, '2019_12_05_093032_create_follow_us_table', 5),
(13, '2019_12_06_065445_create_faqs_table', 6),
(14, '2019_12_06_110144_create_customer_supports_table', 6),
(15, '2019_12_07_102108_create_footer_infos_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `craftsman_id` bigint(20) DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) NOT NULL,
  `subcategory_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `tax` double(10,2) DEFAULT NULL,
  `discount_price` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_prescriptions` tinyint(4) DEFAULT '0',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `short_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_production` longtext COLLATE utf8mb4_unicode_ci,
  `thum_image_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thum_image_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_stock` int(11) NOT NULL DEFAULT '0',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `admin_id`, `craftsman_id`, `slug`, `material_id`, `category_id`, `subcategory_id`, `name`, `code`, `price`, `tax`, `discount_price`, `discount_prescriptions`, `description`, `short_note`, `customer_production`, `thum_image_1`, `thum_image_2`, `in_stock`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, NULL, 'accessories-accessories', 0, 1, 2, 'Accessories Accessories', 'PRO-123', 354.00, 24.00, '354', 31, '<p>asdf</p>', NULL, '<p>asd adf ad</p>', '1575284881_5de4f0917b967_thum1_Alessandra Franceschini.jpg', '1575263892_5de49e94a8af4_thum2_Alessandra Franceschini.jpg', 50, 'active', '2019-12-01 23:18:12', '2019-12-02 23:10:09'),
(4, 1, NULL, 'blue-100-wool-overcoat', 2, 2, 6, 'Blue 100% Wool Overcoat', 'PRO-123', 501.00, 410.00, '501', NULL, '<p>Melillo 1970 is well known for its impeccable sartorial workmanship and for the construction of his garments. This coat is an example of this.<br>Cut from a 100% smooth blue Wool it has five horn button placket and two slanted front pockets. On the back a central slit that lightens the construction. The indispensible hand-made steps can certainly be seen in the flat fell seam of the neck, the tank sleeve as well as in the accurate sewing of the buttons.</p><ul><li>Winter Overcoat</li><li>100% Wool</li><li>Fabric made by Drago S.p.a.</li><li>Five Horn-button placket</li><li>Two slanted front pockets</li><li>Handmade steps: flat fell seam of the neck, armhole, buttons, hems</li><li>Unlined</li><li>Two inner pockets</li><li>Made in Italy</li></ul>', 'Scarf is one of the most', '<p><strong>Best Quality Guarantee</strong><br>In addition to the 30 days guarantee for return&nbsp;required by the European law, in case of damaged products or due to manufacturing defects, Barròco provides <strong>an extra&nbsp;1-year quality guarantee</strong>&nbsp;on all our products. We trust in the quality of our products because:</p><p>– All our products and production processes have been inspected by our personnel<br>– All fabrics and leathers are certified and comes from Italy<br>– All our Artisans are worldwide known for their quality products and most of them are at their third or fourth generation</p><p><strong>Best Price Guarantee</strong><br>If you find a better price of the same product and manufacturer elsewhere we will match it.</p>', '1575288985_5de500999a016_thum1_Blue 100% Wool Overcoat.jpg', '1575288985_5de50099bbab5_thum2_Blue 100% Wool Overcoat.jpg', 30, 'active', '2019-12-02 06:16:25', '2019-12-05 00:35:17'),
(5, 1, NULL, 'leather-bag-with-natural-stone', 8, 1, 2, 'Leather bag with natural stone', 'PEO789', 358.00, 293.00, NULL, NULL, '<p>Trapezoidal bag, round handle with jewel clasp, open compartment and open pocket. External in light blue calf skin and black ultraseude lining. Amazzonite natural stone.&nbsp;Gold galvanized custom brass metals.</p><ul><li>Light blue calf&nbsp;leather trapeizodal bag</li><li>Black ultrasuede lining</li><li>Natural stone: Amazzonite</li><li>Gold galvanized custom brass metals</li><li>Size: W 26 cm&nbsp;x&nbsp;H 15 cm x D 7 cm; handle included H 25 cm</li><li>Handmade</li><li>Made in Italy</li></ul>', NULL, '<p><strong>Best Quality Guarantee</strong><br>In addition to the 30 days guarantee for return&nbsp;required by the European law, in case of damaged products or due to manufacturing defects, Barròco provides <strong>an extra&nbsp;1-year quality guarantee</strong>&nbsp;on all our products. We trust in the quality of our products because:</p><p>– All our products and production processes have been inspected by our personnel<br>– All fabrics and leathers are certified and comes from Italy<br>– All our Artisans are worldwide known for their quality products and most of them are at their third or fourth generation</p><p><strong>Best Price Guarantee</strong><br>If you find a better price of the same product and manufacturer elsewhere we will match it.</p>', '1575690568_5deb2148535fc_thum1_KASTUNIS.jpg', '1575690568_5deb2148ab0cf_thum2_KASTUNIS.jpg', 10, 'active', '2019-12-06 21:49:29', '2019-12-06 21:49:29'),
(6, 1, NULL, 'ring-in-a-18ct-gold', 8, 1, 3, 'Ring in a 18Ct Gold', 'PRO-1222', 20.61, 16.90, NULL, NULL, '<p>A 18kt white gold cube encrusted with 2,90ct of sparkling diamonds, set upon a rounded and solid 18kt yellow gold band.</p><ul><li>Ring with Cube in 18kt white Gold</li><li>2.90 Ct Brilliant cut Diamonds</li><li>18Ct. yellow Gold band</li><li>Handmade by Cristiano Pierazzuoli</li><li>Made in Italy</li></ul><p><strong>On request available in sizes from 8 to 25.</strong></p><p>The product will be accompanied by a Certificate of Guarantee, issued by the manufacturer, which attests the authenticity of the precious metal and embedded gems</p>', NULL, '<p><strong>Best Quality Guarantee</strong><br>In addition to the 30 days guarantee for return&nbsp;required by the European law, in case of damaged products or due to manufacturing defects, Barròco provides <strong>an extra&nbsp;1-year quality guarantee</strong>&nbsp;on all our products. We trust in the quality of our products because:</p><p>– All our products and production processes have been inspected by our personnel<br>– All fabrics and leathers are certified and comes from Italy<br>– All our Artisans are worldwide known for their quality products and most of them are at their third or fourth generation</p><p><strong>Best Price Guarantee</strong><br>If you find a better price of the same product and manufacturer elsewhere we will match it.</p>', '1575691298_5deb2422336a8_thum1_CRISTIANO PIERAZZUOLI.jpg', '1575691298_5deb242253cd0_thum2_CRISTIANO PIERAZZUOLI.jpg', 33, 'active', '2019-12-06 22:01:38', '2019-12-06 22:01:38'),
(7, 1, NULL, 'light-denim-shirt-with-pignata-patch-pocket', 5, 2, 8, 'Light Denim Shirt with Pignata patch pocket', 'PRO-12387', 208.00, 170.00, NULL, NULL, '<p>Iervolino’s shirt are excellent items of clothing, distinguishable for the care of every detail. The fabric used for this shirt is made by “Albini” – Italian textile producers.<br>Although Giuseppe take care of every detail in the making process of all his shirts, this item with 12 steps made by hand represents the best sartorial shirt available on the market.&nbsp; Match it with brown highwaisted trousers.</p><ul><li>Denim Shirt</li><li>100%&nbsp; Cotton</li><li>Spread collar</li><li>“Pignata” Patch pocket</li><li>Rounded Wrist</li><li>“Albini” fabric</li><li>Handsewn mother-of-pearl buttons with “crow foot” stitching</li><li>Handsewn Bartacks</li><li>Buttonholes</li><li>Handmade Top stitching of a Box Pleat</li><li>Hand-attached sleeves</li><li>Hand-sewn details on gussets</li></ul><p>Other numerous steps are handmade and make this shirt&nbsp;exclusive</p>', NULL, '<p><strong>Best Quality Guarantee</strong><br>In addition to the 30 days guarantee for return&nbsp;required by the European law, in case of damaged products or due to manufacturing defects, Barròco provides <strong>an extra&nbsp;1-year quality guarantee</strong>&nbsp;on all our products. We trust in the quality of our products because:</p><p>– All our products and production processes have been inspected by our personnel<br>– All fabrics and leathers are certified and comes from Italy<br>– All our Artisans are worldwide known for their quality products and most of them are at their third or fourth generation</p><p><strong>Best Price Guarantee</strong><br>If you find a better price of the same product and manufacturer elsewhere we will match it.</p>', '1575692007_5deb26e780087_thum1_SARTORIA IERVOLINO.jpg', '1575692007_5deb26e7a1bd3_thum2_SARTORIA IERVOLINO.jpg', 55, 'active', '2019-12-06 22:13:27', '2019-12-06 22:13:27'),
(8, 1, NULL, 'purse-in-gray-python-with-white-shades', 2, 1, 1, 'Purse in gray python with white shades', 'Pro-305', 305.00, 250.00, NULL, NULL, '<p>Elegant purse in gray python with white shades created by Davide Albertario. The interior is in gray calf leather and consists of 8 compartments for card holders, a central area with zip closure for the storage of coins and two pockets for banknotes.</p><ul><li>Python purse with zip closure</li><li>Calfskin interior – gray color</li><li>8 card pockets</li><li>Central pocket with zip closure</li><li>Two side pockets for banknotes</li><li>Zip are made in Brass palladium</li><li>Handmade in Italy</li></ul>', NULL, '<p><strong>Best Quality Guarantee</strong><br>In addition to the 30 days guarantee for return&nbsp;required by the European law, in case of damaged products or due to manufacturing defects, Barròco provides <strong>an extra&nbsp;1-year quality guarantee</strong>&nbsp;on all our products. We trust in the quality of our products because:</p><p>– All our products and production processes have been inspected by our personnel<br>– All fabrics and leathers are certified and comes from Italy<br>– All our Artisans are worldwide known for their quality products and most of them are at their third or fourth generation</p><p><strong>Best Price Guarantee</strong><br>If you find a better price of the same product and manufacturer elsewhere we will match it.</p>', '1575713448_5deb7aa8178e8_thum1_DAVIDE ALBERTARIO.jpg', '1575713448_5deb7aa8398c2_thum2_DAVIDE ALBERTARIO.jpg', 5, 'active', '2019-12-07 04:10:48', '2019-12-07 04:10:48'),
(9, 1, NULL, 'women-s-umbrella-with-tartan-lining', 7, 1, 1, 'Women\'s umbrella with tartan lining', 'PRO-12321', 175.00, 143.00, NULL, NULL, '<p>Elegant and versatile women’s umbrella made by Pasotti – a story company based in Matova – in 100% polyester. The handle is in black calfskin, the knob as well.&nbsp;Handcrafted in Italy, it has carbon ribs and manual opening.</p><ul><li>Fabrics: 100% Polyester</li><li>Ribs: Carbon</li><li>Black external fabrics</li><li>Tartan lining</li><li>Shaft Handle: Steel</li><li>Calfskin Knob</li><li>Manual Opening</li><li>Handcrafted Product</li><li>Made in Italy</li></ul>', NULL, '<p><strong>Best Quality Guarantee</strong><br>In addition to the 30 days guarantee for return&nbsp;required by the European law, in case of damaged products or due to manufacturing defects, Barròco provides <strong>an extra&nbsp;1-year quality guarantee</strong>&nbsp;on all our products. We trust in the quality of our products because:</p><p>– All our products and production processes have been inspected by our personnel<br>– All fabrics and leathers are certified and comes from Italy<br>– All our Artisans are worldwide known for their quality products and most of them are at their third or fourth generation</p><p><strong>Best Price Guarantee</strong><br>If you find a better price of the same product and manufacturer elsewhere we will match it.</p>', '1575713675_5deb7b8b45e4d_thum1_PASOTTI.jpg', '1575713675_5deb7b8b6935b_thum2_PASOTTI.jpg', 33, 'active', '2019-12-07 04:14:35', '2019-12-07 04:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `colors` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `colors`, `status`, `created_at`, `updated_at`) VALUES
(38, 3, 'Pink', 'active', NULL, NULL),
(39, 3, 'Red', 'active', NULL, NULL),
(40, 3, 'Blue', 'active', NULL, NULL),
(50, 4, 'Blue', 'active', NULL, NULL),
(51, 4, 'Black', 'active', NULL, NULL),
(52, 4, 'Gray', 'active', NULL, NULL),
(53, 5, 'Green', 'active', NULL, NULL),
(54, 5, 'Pink', 'active', NULL, NULL),
(55, 6, 'Gold', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 3, '1575263893_5de49e950cb24__Alessandra Franceschini.jpg', 'active', NULL, NULL),
(9, 3, '1575283505_5de4eb31a44c6__Alessandra Franceschini.jpg', 'active', NULL, NULL),
(10, 3, '1575283505_5de4eb31dd9da__Alessandra Franceschini.jpg', 'active', NULL, NULL),
(13, 4, '1575288985_5de50099e21db__Blue 100% Wool Overcoat.jpg', 'active', NULL, NULL),
(14, 4, '1575288986_5de5009a3b73a__Blue 100% Wool Overcoat.jpg', 'active', NULL, NULL),
(15, 4, '1575288986_5de5009a9f5e0__Blue 100% Wool Overcoat.jpg', 'active', NULL, NULL),
(16, 4, '1575288986_5de5009af1177__Blue 100% Wool Overcoat.jpg', 'active', NULL, NULL),
(17, 5, '1575690569_5deb21490a85f__KASTUNIS.jpg', 'active', NULL, NULL),
(18, 5, '1575690569_5deb21493ff63__KASTUNIS.jpg', 'active', NULL, NULL),
(19, 5, '1575690569_5deb2149752e5__KASTUNIS.jpg', 'active', NULL, NULL),
(20, 6, '1575691298_5deb24227718f__CRISTIANO PIERAZZUOLI.jpg', 'active', NULL, NULL),
(21, 6, '1575691298_5deb2422ab519__CRISTIANO PIERAZZUOLI.jpg', 'active', NULL, NULL),
(22, 7, '1575692007_5deb26e7c7942__SARTORIA IERVOLINO.jpg', 'active', NULL, NULL),
(23, 7, '1575692008_5deb26e8244d3__SARTORIA IERVOLINO.jpg', 'active', NULL, NULL),
(24, 7, '1575692008_5deb26e87a21f__SARTORIA IERVOLINO.jpg', 'active', NULL, NULL),
(25, 8, '1575713448_5deb7aa85b78c__DAVIDE ALBERTARIO.jpg', 'active', NULL, NULL),
(26, 8, '1575713448_5deb7aa892164__DAVIDE ALBERTARIO.jpg', 'active', NULL, NULL),
(27, 9, '1575713675_5deb7b8b8c96c__PASOTTI.jpg', 'active', NULL, NULL),
(28, 9, '1575713675_5deb7b8bc255d__PASOTTI.jpg', 'active', NULL, NULL),
(29, 9, '1575713676_5deb7b8c08355__PASOTTI.jpg', 'active', NULL, NULL),
(30, 9, '1575713676_5deb7b8c3b44d__PASOTTI.jpg', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_shipping_returns`
--

CREATE TABLE `product_shipping_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `shipping_ue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_extra_ue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `return_policy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_shipping_returns`
--

INSERT INTO `product_shipping_returns` (`id`, `product_id`, `shipping_ue`, `shipping_extra_ue`, `delivery_time`, `return_policy`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '15', NULL, 'Shipping: 3 Working days', '<p>asdfasdf edit</p>', 'active', '2019-12-01 23:18:13', '2019-12-02 04:45:06'),
(3, 4, '10', '15', 'Shipping: 6 working days', '<p>The first Return Request is free, the following are at your expense.<br>For further requests you can contact our <strong>Customer Care</strong> at <a href=\"mailto:info@barrocoitalia.com\">info@barrocoitalia.com</a>.</p>', 'active', '2019-12-02 06:16:27', '2019-12-05 00:29:55'),
(4, 5, '10', '25', 'Shipping: 2 Working days', '<p>The first Return Request is free, the following are at your expense.<br>The Customer has the right of withdraw within 14 days from the receipt of the merchandise, after that period<br>the goods can’t be returned. For further requests you can contact our <strong>Customer Care</strong> at <a href=\"mailto:info@barrocoitalia.com\">info@barrocoitalia.com</a>.</p>', 'active', '2019-12-06 21:49:29', '2019-12-06 21:49:29'),
(5, 6, 'Free', NULL, 'Shipping: 5 working days', '<p>The first Return Request is free, the following are at your expense.<br>For further requests you can contact our <strong>Customer Care</strong> at <a href=\"mailto:info@barrocoitalia.com\">info@barrocoitalia.com</a>.</p>', 'active', '2019-12-06 22:01:38', '2019-12-06 22:01:38'),
(6, 7, '10', '10', 'Shipping: 5 working days', '<p>The first Return Request is free, the following are at your expense.<br>For further requests you can contact our <strong>Customer Care</strong> at <a href=\"mailto:info@barrocoitalia.com\">info@barrocoitalia.com</a>.</p>', 'active', '2019-12-06 22:13:28', '2019-12-06 22:13:28'),
(7, 8, '10', '25', 'Shipping: 2 Working days', '<p>The first Return Request is free, the following are at your expense.<br>The Customer has the right of withdraw within 14 days from the receipt of the merchandise, after that period<br>the goods can’t be returned. For further requests you can contact our <strong>Customer Care</strong> at <a href=\"mailto:info@barrocoitalia.com\">info@barrocoitalia.com</a></p>', 'active', '2019-12-07 04:10:48', '2019-12-07 04:10:48'),
(8, 9, 'Free', 'Free', 'Shipping: 3 Working days', '<p>The first Return Request is free, the following are at your expense.<br>The Customer has the right of withdraw within 14 days from the receipt of the merchandise, after that period<br>the goods can’t be returned. For further requests you can contact our <strong>Customer Care</strong> at <a href=\"mailto:info@barrocoitalia.com\">info@barrocoitalia.com</a>.</p>', 'active', '2019-12-07 04:14:36', '2019-12-07 04:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `size` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size`, `status`, `created_at`, `updated_at`) VALUES
(47, 3, 'S', 'active', NULL, NULL),
(48, 3, 'M', 'active', NULL, NULL),
(49, 3, 'L', 'active', NULL, NULL),
(50, 3, 'XL', 'active', NULL, NULL),
(66, 4, '46', 'active', NULL, NULL),
(67, 4, '47', 'active', NULL, NULL),
(68, 4, '48', 'active', NULL, NULL),
(69, 4, '49', 'active', NULL, NULL),
(70, 4, '50', 'active', NULL, NULL),
(71, 7, '36', 'active', NULL, NULL),
(72, 7, '37', 'active', NULL, NULL),
(73, 7, '38', 'active', NULL, NULL),
(74, 7, '39', 'active', NULL, NULL),
(75, 7, '40', 'active', NULL, NULL),
(76, 7, '41', 'active', NULL, NULL),
(77, 7, '12', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `feature_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_subtitle` text COLLATE utf8mb4_unicode_ci,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `show_home_products` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `slug`, `category_id`, `title`, `image`, `description`, `feature_title`, `feature_subtitle`, `feature_image`, `status`, `show_home_products`, `created_at`, `updated_at`) VALUES
(1, 'accessories', 1, 'ACCESSORIES', '1575539344_5de8d2907f10d_ACCESSORIES.jpg', NULL, NULL, NULL, NULL, 'active', 0, '2019-11-30 01:29:38', '2019-12-05 03:49:04'),
(2, 'bags', 1, 'BAGS', '1575539278_5de8d24ec8005_BAGS.jpg', NULL, 'Overwhelming desire', 'Sophisticated, pink and exclusive accessory!', '1575720995_5deb9823da873_feature.jpg', 'active', 1, '2019-11-30 01:29:51', '2019-12-07 06:16:36'),
(3, 'jewelry', 1, 'JEWELRY', '1575720848_5deb97900000f_JEWELRY.jpg', NULL, 'Federico Primiceri and the art of jewellery', 'Research and creativity, care for the design and the selection of metals and precious stones.', '1575720324_5deb95841b0ae_feature.jpg', 'active', 1, '2019-11-30 01:30:05', '2019-12-07 06:14:08'),
(4, 'shoes', 1, 'SHOES', '1575539402_5de8d2ca40377_SHOES.jpg', NULL, NULL, NULL, NULL, 'active', 0, '2019-11-30 01:30:17', '2019-12-05 03:50:02'),
(5, 'accessories-1', 2, 'ACCESSORIES', NULL, NULL, NULL, NULL, NULL, 'active', 0, '2019-11-30 01:31:03', '2019-11-30 01:31:03'),
(6, 'jackets-and-vests', 2, 'JACKETS AND VESTS', NULL, NULL, 'Federico Primiceri and the art of jewellery', 'Research and creativity, care for the design and the selection of metals and precious stones.', '1575722298_5deb9d3a450c1_feature.jpg', 'active', 1, '2019-11-30 01:42:44', '2019-12-07 06:38:18'),
(7, 'leather-goods', 2, 'LEATHER GOODS', NULL, NULL, NULL, NULL, NULL, 'active', 0, '2019-11-30 01:43:05', '2019-11-30 01:43:05'),
(8, 'shirts', 2, 'SHIRTS', NULL, NULL, 'Overwhelming desire', 'Sophisticated, pink and exclusive accessory!', '1575722368_5deb9d804a941_feature.jpg', 'active', 1, '2019-11-30 01:43:22', '2019-12-07 06:39:28'),
(9, 'shoes-1', 2, 'SHOES', NULL, NULL, NULL, NULL, NULL, 'active', 0, '2019-11-30 01:43:31', '2019-11-30 01:43:31'),
(10, 'sweaters', 2, 'SWEATERS', NULL, NULL, NULL, NULL, NULL, 'active', 0, '2019-11-30 01:43:42', '2019-11-30 01:43:42'),
(11, 'ties', 2, 'TIES', NULL, NULL, NULL, NULL, NULL, 'active', 0, '2019-11-30 01:43:52', '2019-11-30 01:43:52'),
(12, 'trousers', 2, 'TROUSERS', NULL, NULL, NULL, NULL, '1575722233_5deb9cf945765_feature.jpg', 'active', 0, '2019-11-30 01:44:04', '2019-12-07 06:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','deactivated') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'deactivated',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `phone_number`, `avatar`, `address`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr Test', 'User', 'test@test.com', NULL, NULL, NULL, NULL, '$2y$10$frC3xA0B3ljhMk06Q0DEAuz6QMENuOhU.bDV7VzsMwReS0aC1Eqz6', 'active', NULL, '2019-11-29 03:43:11', '2019-11-29 03:43:11'),
(2, NULL, NULL, 'rony@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$0l3EOEacbd./1AxTQC2kfuHTlEJ1guCVFKS01TVyBYl0kHZJCEn4W', 'deactivated', NULL, '2019-12-06 07:03:14', '2019-12-06 07:03:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_supports`
--
ALTER TABLE `customer_supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow_us`
--
ALTER TABLE `follow_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_infos`
--
ALTER TABLE `footer_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_videos`
--
ALTER TABLE `home_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_shipping_returns`
--
ALTER TABLE `product_shipping_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_supports`
--
ALTER TABLE `customer_supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow_us`
--
ALTER TABLE `follow_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_infos`
--
ALTER TABLE `footer_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_videos`
--
ALTER TABLE `home_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product_shipping_returns`
--
ALTER TABLE `product_shipping_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
