-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2020 at 05:25 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.3.7-2+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mff-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_payment_methods`
--

CREATE TABLE `a_payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attributes` json DEFAULT NULL,
  `redirect_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `a_payment_methods`
--

INSERT INTO `a_payment_methods` (`id`, `title`, `attributes`, `redirect_url`, `created_at`, `updated_at`) VALUES
(1, 'PayPal', '[{\"name\": \"emailid\", \"type\": \"text\", \"placeholder\": \"Enter Paypal emailid\"}, {\"name\": \"accountId\", \"type\": \"number\", \"placeholder\": \"Enter Accountid\"}]', '/payment/paypal', NULL, NULL),
(2, 'Wire Transfer', '[{\"name\": \"emailid\", \"type\": \"text\", \"placeholder\": \"Enter Paypal emailid\"}, {\"name\": \"accountId\", \"type\": \"number\", \"placeholder\": \"Enter Accountid\"}]', '/payment/wire-transfer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `user_id`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"city\": \"sfddddddddd\", \"state\": \"fds\", \"_token\": \"yFPg2yk7JR68pKwSIT9E1FnakmtLivtr685TgIcW\", \"street\": \"Enter Street/Building/Locality detailsfsssssssssssss\", \"country\": \"sggggggggg\", \"street2\": \"Enter Street/Building/Locality detailsfdssssssssssss\", \"zip_code\": \"3444434\"}', '2020-03-16 00:41:51', '2020-03-16 00:41:51'),
(2, 1, '{\"city\": \"ewddddd\", \"state\": \"ewdddddd\", \"_token\": \"yFPg2yk7JR68pKwSIT9E1FnakmtLivtr685TgIcW\", \"street\": \"2st address\", \"country\": \"ffffffff\", \"street2\": \"Enter Street/Building/Locality details\", \"zip_code\": \"322222\"}', '2020-03-16 06:11:01', '2020-03-16 06:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `cart_m_s`
--

CREATE TABLE `cart_m_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `attributes` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_m_s`
--

INSERT INTO `cart_m_s` (`id`, `product_id`, `user_id`, `quantity`, `attributes`, `created_at`, `updated_at`) VALUES
(1, 10, 6, 1, '\"[]\"', '2020-02-28 00:50:45', '2020-02-28 00:50:45'),
(59, 21, 1, 1, '\"[]\"', '2020-03-06 23:10:39', '2020-03-18 00:09:04'),
(60, 38, 1, 1, '\"[]\"', '2020-03-06 23:12:10', '2020-03-18 00:09:06'),
(61, 7, 1, 1, '\"[]\"', '2020-03-21 05:41:43', '2020-03-21 05:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `invoice_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `store_id`, `product_id`, `order_id`, `amount`, `invoice_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 21, 2, 2844, '', '2020-03-21 04:29:30', '2020-03-21 04:29:30'),
(2, 1, 1, 38, 3, 1901, '', '2020-03-21 04:29:30', '2020-03-21 04:29:30'),
(3, 1, 1, 21, 4, 2844, '', '2020-03-21 04:33:51', '2020-03-21 04:33:51'),
(4, 1, 1, 38, 5, 1901, '', '2020-03-21 04:33:51', '2020-03-21 04:33:51'),
(5, 1, 1, 21, 6, 2844, '', '2020-03-21 05:41:58', '2020-03-21 05:41:58'),
(6, 1, 1, 38, 7, 1901, '', '2020-03-21 05:41:58', '2020-03-21 05:41:58'),
(7, 1, 6, 7, 8, 0, '', '2020-03-21 05:41:58', '2020-03-21 05:41:58'),
(8, 1, 1, 21, 9, 2844, '', '2020-03-21 06:22:45', '2020-03-21 06:22:45'),
(9, 1, 1, 38, 10, 1901, '', '2020-03-21 06:22:45', '2020-03-21 06:22:45'),
(10, 1, 6, 7, 11, 3675, '', '2020-03-21 06:22:45', '2020-03-21 06:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `title`, `url`, `order`, `created_at`, `updated_at`) VALUES
(1, 0, 'Home', '/', 1, NULL, NULL),
(2, 0, 'Products', '/products', 2, NULL, NULL),
(3, 0, 'Services', '/services', 3, NULL, NULL),
(4, 0, 'About Us', '/about', 4, NULL, NULL),
(5, 0, 'Contact Us', '/contact', 5, NULL, NULL),
(6, 2, 'Elctronics', '/products/electronics', 1, NULL, NULL),
(7, 2, 'Mechanical', '/products/mechanical', 2, NULL, NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2020_02_11_090043_create_vendors_table', 2),
(5, '2020_02_15_083757_create_stores_table', 3),
(6, '2020_02_17_043144_create_menus_table', 4),
(18, '2020_02_18_065028_create_products_photos_table', 6),
(20, '2020_02_17_084146_create_products_table', 7),
(21, '2020_02_26_102216_create_product_categories_table', 8),
(23, '2020_02_28_045732_create_cart_m_s_table', 9),
(26, '2014_10_12_000000_create_users_table', 10),
(27, '2020_03_13_044315_create_billings_table', 11),
(28, '2020_03_16_090817_create_shippings_table', 12),
(31, '2020_03_17_103949_create_transactions_table', 13),
(32, '2020_03_18_070835_create_a_payment_methods_table', 13),
(36, '2020_03_19_044056_create_store_pay_accounts_table', 15),
(37, '2020_03_18_071054_create_v_pay_accounts_table', 16),
(42, '2020_03_17_103934_create_invoices_table', 18),
(43, '2020_03_17_101429_create_orders_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `paypal_token` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `a_payment_methods_id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `paypal_token`, `status`, `invoice_id`, `store_id`, `shipping_id`, `billing_id`, `a_payment_methods_id`, `transaction_id`, `created_at`, `updated_at`) VALUES
(2, 1, 21, NULL, 0, 0, 1, 1, 1, 1, NULL, '2020-03-21 04:29:30', '2020-03-21 04:29:30'),
(3, 1, 38, NULL, 0, 0, 1, 1, 1, 1, NULL, '2020-03-21 04:29:30', '2020-03-21 04:29:30'),
(4, 1, 21, NULL, 0, 0, 1, 1, 1, 1, NULL, '2020-03-21 04:33:51', '2020-03-21 04:33:51'),
(5, 1, 38, NULL, 0, 0, 1, 1, 1, 1, NULL, '2020-03-21 04:33:51', '2020-03-21 04:33:51'),
(6, 1, 21, NULL, 0, 0, 1, 1, 1, 0, NULL, '2020-03-21 05:41:58', '2020-03-21 05:41:58'),
(7, 1, 38, NULL, 0, 0, 1, 1, 1, 0, NULL, '2020-03-21 05:41:58', '2020-03-21 05:41:58'),
(8, 1, 7, NULL, 0, 0, 6, 1, 1, 0, NULL, '2020-03-21 05:41:58', '2020-03-21 05:41:58'),
(9, 1, 21, NULL, 0, 0, 1, 1, 1, 0, NULL, '2020-03-21 06:22:45', '2020-03-21 06:22:45'),
(10, 1, 38, NULL, 0, 0, 1, 1, 1, 0, NULL, '2020-03-21 06:22:45', '2020-03-21 06:22:45'),
(11, 1, 7, NULL, 0, 0, 6, 1, 1, 0, NULL, '2020-03-21 06:22:45', '2020-03-21 06:22:45');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight_measure_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_measure_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_desc` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `description2` longtext COLLATE utf8mb4_unicode_ci,
  `description3` longtext COLLATE utf8mb4_unicode_ci,
  `in_stock` int(11) NOT NULL,
  `stock_measurement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_id` int(11) DEFAULT NULL,
  `faq_id` int(11) DEFAULT NULL,
  `queans_id` int(11) DEFAULT NULL,
  `varient_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sold` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `store_id`, `name`, `bname`, `manufacturer`, `s_desc`, `item_weight`, `weight_measure_unit`, `volume`, `volume_measure_unit`, `warranty_desc`, `description`, `description2`, `description3`, `in_stock`, `stock_measurement`, `product_category_id`, `price`, `discount_price`, `currency`, `review_id`, `faq_id`, `queans_id`, `varient_id`, `status`, `tag`, `sort`, `sold`, `created_at`, `updated_at`) VALUES
(1, 6, 'Stewart Wunsch', 'Miss Maiya Bartoletti V', 'Mrs. Fay Marquardt', 'Odit quam id optio rem nam sed. Ut qui incidunt assumenda modi sit ad quia. Ex consequatur ut ducimus molestiae quidem.', NULL, NULL, NULL, NULL, NULL, NULL, 'In this example, the results of the query will be cached for ten minutes. While the results are cached, the query will not be run against the database, and the results will be loaded from the default cache driver specified for your application.', NULL, 5474, NULL, 1, '6630', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(2, 6, 'Darius Langosh', 'Andy Murazik', 'Valentine Lesch', 'Ipsa et sit quo voluptas et. Ut et velit quia ipsum. Est velit voluptate perspiciatis in nihil unde nemo.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8872, NULL, 1, '1993', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(3, 6, 'Mrs. Dahlia Schmeler V', 'Amie Cartwright III', 'Prof. Lilyan Aufderhar III', 'Molestiae eaque quod ducimus ea rem aut. Voluptate blanditiis libero eos illum. Asperiores voluptate voluptatem perspiciatis adipisci qui omnis architecto. Aut officiis magni aspernatur incidunt.', NULL, NULL, NULL, NULL, NULL, NULL, 'In this example, the results of the query will be cached for ten minutes. While the results are cached, the query will not be run against the database, and the results will be loaded from the default cache driver specified for your application.', NULL, 5466, NULL, 1, '4661', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(4, 6, 'Sandy Hahn', 'Anthony Gleason', 'Alessandra Dietrich II', 'Quibusdam laboriosam occaecati maiores laudantium animi optio nostrum. Voluptatem tempore reprehenderit similique nisi a consectetur. Eum ex optio velit distinctio. Maxime ipsa porro ad id.', NULL, NULL, NULL, NULL, NULL, NULL, 'In this example, the results of the query will be cached for ten minutes. While the results are cached, the query will not be run against the database, and the results will be loaded from the default cache driver specified for your application. In this example, the results of the query will be cached for ten minutes. While the results are cached, the query will not be run against the database, and the results will be loaded from the default cache driver specified for your application.', NULL, 3700, NULL, 1, '8152', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(5, 6, 'Mr. Elias Spinka III', 'Alisha Lindgren', 'Ms. Bridie Lehner I', 'Qui dolor libero aut harum enim occaecati. Ratione esse sed culpa et similique sunt.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1666, NULL, 1, '6950', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'top3', NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(6, 6, 'Taryn Nitzsche PhD', 'Prof. Maria Hermiston Sr.', 'Laila Ritchie', 'Vel numquam dolorum optio molestias. Molestiae distinctio tenetur quia voluptas et ut omnis. Qui eaque nesciunt et ipsa. Ipsum totam rerum at sapiente.', NULL, NULL, NULL, NULL, NULL, NULL, 'In this example, the results of the query will be cached for ten minutes. While the results are cached, the query will not be run against the database, and the results will be loaded from the default cache driver specified for your application.', NULL, 7251, NULL, 2, '3217', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(7, 6, 'Liliana Dietrich', 'Antonette Stanton', 'Sabina Bednar DVM', 'Aliquam magnam rem dolores vero placeat. Labore cum tenetur ut et rerum dolorem voluptatem. Sint qui labore eveniet impedit pariatur. Est nostrum enim ipsam explicabo.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1945, NULL, 2, '3675', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(8, 6, 'Soledad Murazik', 'Dr. Yvonne Heaney MD', 'Jacey Marvin', 'Architecto doloremque in quam fugit et blanditiis distinctio. Eaque nostrum consequuntur porro ipsa. Atque et dolorem voluptas facilis magni quia vitae. Est in voluptatem odit nisi voluptatem enim ducimus.', NULL, NULL, NULL, NULL, NULL, NULL, 'In this example, the results of the query will be cached for ten minutes. While the results are cached, the query will not be run against the database, and the results will be loaded from the default cache driver specified for your application.', NULL, 4761, NULL, 2, '2072', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(9, 6, 'Prof. Nicole Ortiz', 'Mr. Watson Daugherty I', 'Rachel Carter', 'Maxime quas nesciunt quibusdam eum enim et fugit ipsam. Similique veniam eum placeat ut temporibus. Nemo vitae voluptates aut rerum temporibus pariatur unde similique. Id voluptas ea reiciendis id dolores iste praesentium officiis.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5505, NULL, 3, '6851', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(10, 6, 'Misty Predovic II hassan deckow', 'Hassan Deckow', 'Domenica Dicki', 'Veritatis ut explicabo tempore distinctio consectetur. Sit tempore ea omnis. Eaque quae architecto et aliquid rem ut non. Nemo cum consequatur omnis velit. Qui excepturi placeat illum doloremque exercitationem dolorem consequatur.', NULL, NULL, NULL, NULL, NULL, NULL, 'description2', NULL, 0, NULL, 3, '5893', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(11, 6, 'Prof. Orlando Murray I', 'Devante Reichert', 'Franco Gibson V', 'Occaecati eveniet accusantium possimus qui omnis. Sapiente placeat quis voluptatem ut mollitia dolorum. Optio accusantium non consequatur ut molestias beatae. Rerum quam eligendi saepe qui iure amet omnis.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3376, NULL, 3, '7008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(12, 6, 'Araceli Gottlieb', 'Nigel Wolff', 'Leland Williamson', 'Et tempore hic qui quia error. Asperiores a maxime nobis sequi sint nobis. Dolor ipsam suscipit magni quo excepturi omnis.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5155, NULL, 3, '6596', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(13, 6, 'Toney Vandervort', 'Dewayne Batz I', 'Seamus Frami Sr.', 'Ut ipsum tempora quia cum officia repudiandae magnam. Quod similique ipsum veritatis et. Rerum sit ut nostrum dolorem consectetur laboriosam. Nihil voluptatem debitis illum illo et qui aut.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1848, NULL, 3, '5023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(14, 6, 'Nigel Fisher', 'Ms. Katelynn Walker Jr.', 'Mrs. Adell Feeney Sr.', 'Officiis ipsam est autem exercitationem nam culpa. Laboriosam rerum nam quia et. Pariatur praesentium ab omnis quis quam. Eos unde et molestiae quis molestiae architecto est.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4022, NULL, 3, '8578', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(15, 6, 'Lera Reynolds', 'Ava Schaefer', 'Dell Mohr PhD', 'Dicta voluptatem dicta culpa nostrum deleniti tenetur corporis. Sit rerum ratione at vitae optio sunt rerum. Dolorem veniam eius accusantium fugiat modi. Autem aut sed rerum impedit commodi et.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3226, NULL, 3, '4006', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(16, 6, 'Presley Stehr', 'Ayden Witting III', 'Rashawn Windler Sr.', 'Voluptas rem est aut suscipit. Iusto culpa quo eligendi ea sed qui provident. Non optio eum dolore ipsam dolorem quaerat exercitationem.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1151, NULL, 3, '3785', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(17, 6, 'Mr. Colin Waters', 'Prof. Janae O\'Kon', 'Brandon Klocko', 'Quasi molestiae non autem mollitia dolores. Aut dolor vero repellat assumenda ut blanditiis dicta. Iure consequuntur velit cumque amet cumque voluptatibus. In dolor modi aut commodi.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1318, NULL, 4, '7391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'top3', NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(18, 6, 'Ms. Caroline Ruecker DVM', 'Jeanne Corwin', 'Genoveva Mosciski DDS', 'Quam unde nobis quo dolores aspernatur unde. Necessitatibus officia voluptas et debitis itaque. Quisquam a aut cumque illum.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2741, NULL, 4, '8778', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:18', '2020-02-26 00:42:18'),
(19, 6, 'Omer Hyatt III', 'Moshe Beahan', 'Jaclyn Zieme', 'Magnam exercitationem qui est eius aut explicabo laudantium. Tenetur et excepturi eos rerum. A id error libero quidem aspernatur beatae qui. Vel reprehenderit expedita officia laborum eos ad illum.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4424, NULL, 4, '1871', '800', NULL, NULL, NULL, NULL, NULL, NULL, 'weeklydeals', NULL, NULL, '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(20, 6, 'Randi Dibbert', 'Jeramy Hegmann', 'Jake Hand', 'Voluptates quidem quam est ad. Iusto incidunt aut ut eaque eaque sequi. In sint illum esse aut id.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7950, NULL, 4, '8166', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(21, 1, 'Florida Hahn', 'Dr. Garth Kilback Jr.', 'Ottis Feeney', 'Et doloremque et ut ab repellendus tempora. Eligendi eos voluptas minima commodi quo officiis. Est est dicta molestiae laudantium illum nostrum non eveniet. Natus at doloremque est velit.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3800, NULL, 4, '2844', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'weeklydeals', NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(22, 1, 'Granville Hagenes', 'Dianna Keebler', 'Cristal Botsford', 'Sit et eum est quia ratione voluptas. Sed nostrum minus saepe ad dolorem. Et esse et quia neque odio consequuntur totam.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4629, NULL, 4, '3806', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(23, 1, 'Maverick Littel', 'Dr. Vincent Haley Jr.', 'Felicity Sawayn', 'Animi quod doloremque labore dolor aut consequatur ipsam. Consectetur deserunt vel natus non facere magni dicta. Molestias animi unde esse autem. Dolorem et temporibus quaerat quis enim perspiciatis.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4130, NULL, 4, '5252', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(24, 1, 'Saul Gislason III', 'Miss Kiana Turner', 'Johanna Hickle III', 'Error eaque repudiandae vel consequatur vero veritatis illo. Aut sapiente amet commodi inventore sapiente cupiditate. Eligendi et dolorem vel optio eligendi ducimus.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7574, NULL, 4, '4351', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(25, 1, 'Mr. Janick Schultz II', 'Prof. Orland Ankunding', 'Ezequiel Willms', 'Sit ipsum est facere quia dolores perferendis. Recusandae delectus totam quo. Quis illum ullam esse voluptatem. Dolor atque doloribus enim.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7952, NULL, 4, '2780', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'top3', NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(26, 1, 'Bradley Reichel', 'Shaniya Emard', 'Dr. Brody Spinka', 'Deserunt et et repudiandae at et dolor aperiam. Neque exercitationem et atque aut rerum. Voluptatem qui fuga quidem occaecati sit minus.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8288, NULL, 4, '1149', '500', NULL, NULL, NULL, NULL, NULL, NULL, 'weeklydeals', NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(27, 1, 'Angelica Simonis', 'Kelton Spinka', 'Jerrold Ritchie', 'Amet deserunt exercitationem sed a. Consequuntur et expedita consectetur iste. Maiores ut architecto consequuntur ea.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6354, NULL, 4, '6234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(28, 1, 'Leatha Bins', 'King Johns MD', 'Dr. Reece Schmidt III', 'Eos illo aliquid ullam dolorem fugiat dolores. Est fugit omnis nobis ut sunt mollitia.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7384, NULL, 5, '6205', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(29, 1, 'Lavina Thompson IV', 'Isai Larson', 'Edgardo Stoltenberg', 'Praesentium ducimus est hic nihil molestiae. Sed corrupti officia voluptas asperiores et quia. Esse autem accusantium quia alias beatae necessitatibus. Aut reiciendis quia quo dolor placeat.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5256, NULL, 5, '5809', '4000', NULL, NULL, NULL, NULL, NULL, NULL, 'weeklydeals', NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(30, 1, 'Gladys Prosacco', 'Kendrick Rogahn', 'Camylle Herman', 'Harum architecto nihil totam doloribus sequi ad. Architecto occaecati voluptates dolor quis esse omnis. Excepturi nihil quasi aut nisi et corrupti qui mollitia. Neque voluptas amet cumque quae cupiditate doloribus accusamus voluptatum.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6356, NULL, 5, '3941', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(31, 1, 'Eve Walker', 'Lucinda Nicolas', 'Christy Williamson', 'Quo ipsum similique iusto qui. Voluptas consectetur ipsum eos maxime nihil deserunt quis qui. Voluptas omnis et tenetur et nihil omnis sunt.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3266, NULL, 5, '5703', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(32, 1, 'Miss Hassie Schowalter', 'Matteo Harvey', 'Kirk Armstrong', 'Magni et impedit voluptatem ea. Officia facere quis aut eos vitae dolorem. Incidunt dolores dolor voluptatem velit consectetur reiciendis. Unde aut voluptatem illo saepe quasi eius veritatis maiores.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4530, NULL, 5, '5948', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(33, 1, 'Clementine Lang', 'Prof. Jaqueline Lemke', 'Mrs. Kassandra Armstrong MD', 'Velit beatae dolore fuga et sapiente quia impedit reprehenderit. Architecto quia consequatur optio excepturi non molestiae. Quasi impedit et voluptates odio aspernatur quis exercitationem. Quaerat quod nostrum debitis et sit adipisci.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1804, NULL, 5, '5908', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'weeklydeals', NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(34, 1, 'Bennie Tremblay', 'Stanley Nicolas', 'Arno Lemke', 'Asperiores sit sunt sed. Et quasi officia iusto qui. Vitae porro sit temporibus odit.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7777, NULL, 5, '7111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(35, 1, 'Elwyn Green', 'Ari Littel', 'Otha Kohler', 'Aperiam alias quia sed a eos ad consequatur sed. Error quibusdam illum facere possimus. Nihil modi dolores error distinctio. Tempora nemo corporis voluptatem vel quia deserunt enim qui.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6392, NULL, 5, '6390', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(36, 1, 'Keon Davis', 'Roderick Ward', 'Lawrence Roob IV', 'Quod tenetur non sunt ullam rerum ut ducimus. Sunt cum asperiores ipsa sed voluptatem. Facilis commodi est consequatur eos laborum. Et aut aperiam adipisci.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3443, NULL, 5, '3090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(37, 1, 'Jeromy Schowalter', 'Finn Beahan', 'Mr. Tate Hand', 'Odit in repudiandae qui accusamus voluptate vel dicta voluptas. Voluptatibus maiores dolorem nobis reiciendis sed quibusdam ullam. Eum sit sit at voluptatem. Repellendus sed consequatur consectetur impedit unde. Voluptas provident mollitia quae.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4460, NULL, 5, '2797', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(38, 1, 'Marcos Toy Sr.', 'Rodolfo Ullrich', 'Aryanna Schinner', 'Id porro consequatur ut placeat. Et ut molestiae beatae eaque sit amet rerum.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5739, NULL, 5, '1901', '800', NULL, NULL, NULL, NULL, NULL, NULL, 'weeklydeals', NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(39, 1, 'Libby O\'Conner', 'Kailyn Feil', 'Lavinia Rippin', 'Rem recusandae impedit qui unde quod ipsam. Enim ut in quae delectus a. Quia et quidem sunt sint assumenda. Exercitationem placeat ex tenetur error.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5335, NULL, 5, '8787', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31'),
(40, 1, 'Theresia Feest', 'Kaley Toy', 'Jaydon Bartoletti', 'Perferendis nesciunt quo sapiente non maiores minus. Aut magni illum debitis animi. Possimus dolorum qui ex rerum. Dolore nostrum quasi quae possimus. Ad culpa atque totam aut consequuntur quaerat ab.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2829, NULL, 5, '7254', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-26 00:42:31', '2020-02-26 00:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `products_photos`
--

CREATE TABLE `products_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_photos`
--

INSERT INTO `products_photos` (`id`, `product_id`, `filename`, `created_at`, `updated_at`) VALUES
(56, 1, 'p16.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(57, 2, 'p1.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(58, 3, 'p10.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(59, 4, 'p8.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(60, 5, 'p11.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(61, 6, 'p5.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(62, 7, 'p17.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(63, 8, 'p12.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(64, 9, 'p17.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(65, 10, 'p16.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(66, 11, 'p19.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(67, 12, 'p7.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(68, 13, 'p11.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(69, 14, 'p15.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(70, 15, 'p9.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(71, 16, 'p16.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(72, 17, 'p6.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(73, 18, 'p15.jpg', '2020-02-26 00:42:19', '2020-02-26 00:42:19'),
(74, 19, 'p10.jpg', '2020-02-26 00:42:20', '2020-02-26 00:42:20'),
(75, 20, 'p17.jpg', '2020-02-26 00:42:20', '2020-02-26 00:42:20'),
(76, 21, 'p17.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(77, 22, 'p6.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(78, 23, 'p13.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(79, 24, 'p2.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(80, 25, 'p6.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(81, 26, 'p6.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(82, 27, 'p2.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(83, 28, 'p10.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(84, 29, 'p12.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(85, 30, 'p2.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(86, 31, 'p9.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(87, 32, 'p18.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(88, 33, 'p15.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(89, 34, 'p5.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(90, 35, 'p13.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(91, 36, 'p8.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(92, 37, 'p6.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(93, 38, 'p5.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(94, 39, 'p4.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32'),
(95, 40, 'p4.jpg', '2020-02-26 00:42:32', '2020-02-26 00:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `parent_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 0, 'first', NULL, NULL),
(2, 0, 'second', NULL, NULL),
(3, 0, 'third', NULL, NULL),
(4, 0, 'four', NULL, NULL),
(5, 0, 'fifth', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `user_id`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"city\": \"ffffffffffff\", \"state\": \"dfssssss\", \"_token\": \"yFPg2yk7JR68pKwSIT9E1FnakmtLivtr685TgIcW\", \"street\": \"Enter Street/Building/Locality details\", \"country\": \"fsddddddd\", \"street2\": \"Enter Street/Building/Locality details\", \"zip_code\": \"3333333\"}', '2020-03-16 06:11:47', '2020-03-16 06:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `payment_information` json DEFAULT NULL,
  `business_information` json DEFAULT NULL,
  `shipping_information` json DEFAULT NULL,
  `tax_information` json DEFAULT NULL,
  `info` json DEFAULT NULL,
  `security` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `store_name`, `user_id`, `description`, `payment_information`, `business_information`, `shipping_information`, `tax_information`, `info`, `security`, `created_at`, `updated_at`) VALUES
(1, 'first', 1, 'I added the above to my controller and now I see an error saying \"Fatal error: Class \'User\' not found\". All of my namespaces are correct.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'test3 store', 2, 'Write Short Description...', NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-21 03:58:52', '2020-02-21 03:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `store_v_pay_accounts`
--

CREATE TABLE `store_v_pay_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_pay_accounts_id` int(11) NOT NULL,
  `attributes` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_v_pay_accounts`
--

INSERT INTO `store_v_pay_accounts` (`id`, `store_id`, `title`, `v_pay_accounts_id`, `attributes`, `created_at`, `updated_at`) VALUES
(2, 1, 'title', 1, '\"_token=8oXbf4RhlunymjS9ZEaYUizCe23ksUipe2N4zKDR&emailid=agoussec%40gmail.com&accountId=3232332\"', '2020-03-18 00:32:50', '2020-03-18 00:32:50'),
(3, 1, 'title', 1, '\"_token=8oXbf4RhlunymjS9ZEaYUizCe23ksUipe2N4zKDR&emailid=agoussec%40gmail.com&accountId=3232332\"', '2020-03-18 00:41:34', '2020-03-18 00:41:34'),
(4, 1, 'title', 1, '\"_token=8oXbf4RhlunymjS9ZEaYUizCe23ksUipe2N4zKDR&emailid=agoussec%40gmail.com&accountId=2222222222\"', '2020-03-18 00:42:43', '2020-03-18 00:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_info` json DEFAULT NULL,
  `payment_method` json DEFAULT NULL,
  `personal_info` json DEFAULT NULL,
  `is_seller` int(11) NOT NULL DEFAULT '0',
  `history_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `billing_info`, `payment_method`, `personal_info`, `is_seller`, `history_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shamsh', 'agoussec@gmail.com', NULL, '$2y$10$UElfe7wrzsvbYRXkZ/J8AO4dMkOA4yyJvpSR7YYxHFKYkkJsJaXEC', NULL, NULL, NULL, 1, NULL, 'tslbEiITQG8iVqAxaF6jgx6XkGUcirneOh52JhHeV8cwQEmgOvu8wc3bNcAG', '2020-02-17 06:29:02', '2020-02-17 06:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `store_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'shamsh', 'teststore', 'agoussec@rediffmail.com', NULL, '$2y$10$wG/DxpnB8bFabGAjrCTd6Of1WmsOQiRNkAyQbsk246JmMWaIBIHhi', NULL, '2020-02-13 03:57:23', '2020-02-13 03:57:23'),
(8, 'shamsh', 'test3', 'agoussec@gmail.com', NULL, '$2y$10$xhRRMJE0aza1.XiPLSidr.exbldojmxlak8NFgC1mMrX7muK791nC', NULL, '2020-02-15 00:53:22', '2020-02-15 00:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `v_pay_accounts`
--

CREATE TABLE `v_pay_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_payment_methods_id` int(11) NOT NULL,
  `attributes` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `v_pay_accounts`
--

INSERT INTO `v_pay_accounts` (`id`, `store_id`, `title`, `a_payment_methods_id`, `attributes`, `created_at`, `updated_at`) VALUES
(15, 1, 'title', 1, '{\"emailid\": \"agoussec@gmail.com\", \"accountId\": \"1233123123\"}', '2020-03-19 05:09:59', '2020-03-19 05:09:59'),
(16, 1, 'title', 2, '{\"emailid\": \"agoussec@gmail.com\", \"accountId\": \"1233123123\"}', '2020-03-19 05:09:59', '2020-03-19 05:09:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_payment_methods`
--
ALTER TABLE `a_payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_m_s`
--
ALTER TABLE `cart_m_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `products_photos`
--
ALTER TABLE `products_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_v_pay_accounts`
--
ALTER TABLE `store_v_pay_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- Indexes for table `v_pay_accounts`
--
ALTER TABLE `v_pay_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_payment_methods`
--
ALTER TABLE `a_payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cart_m_s`
--
ALTER TABLE `cart_m_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `products_photos`
--
ALTER TABLE `products_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `store_v_pay_accounts`
--
ALTER TABLE `store_v_pay_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `v_pay_accounts`
--
ALTER TABLE `v_pay_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
