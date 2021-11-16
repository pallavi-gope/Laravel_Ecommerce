-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 04:19 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2021-11-01 03:35:53', '$2y$10$Vk4hCI5pAoe4HfUET.WtbOL/gD.R162VnBM1yzIfdRwnE8wo7VSs2', 'ObiRFaew46', NULL, NULL, '2021-11-01 03:35:54', '2021-11-01 03:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_hin`, `brand_slug_en`, `brand_slug_hin`, `brand_image`, `created_at`, `updated_at`) VALUES
(4, 'Samsung', 'सैमसंग', 'samsung', 'सैमसंग', 'upload/brand_images/1715305112634754.png', NULL, NULL),
(5, 'Apples', 'एप्पल', 'apples', 'एप्पल', 'upload/brand_images/1715307654258210.png', NULL, '2021-11-02 03:50:54'),
(6, 'Xiaomi', 'शाओमी', 'xiaomi', 'शाओमी', 'upload/brand_images/1715305371698015.png', NULL, NULL),
(7, 'Oppo', 'ओप्पो', 'oppo', 'ओप्पो', 'upload/brand_images/1715305404973890.png', NULL, NULL),
(8, 'Vivo', 'वीवो', 'vivo', 'वीवो', 'upload/brand_images/1715305433508578.png', NULL, NULL),
(9, 'Huawei', 'हुवाई', 'huawei', 'हुवाई', 'upload/brand_images/1715305462048462.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_hin`, `category_slug_en`, `category_slug_hin`, `category_icon`, `created_at`, `updated_at`) VALUES
(7, 'Fashion', 'फैशन', 'fashion', 'फैशन', 'fa fa-shopping-bag', NULL, '2021-11-08 03:20:58'),
(8, 'Electronics', 'इलेक्ट्रानिक्स', 'electronics', 'इलेक्ट्रानिक्स', 'fa fa-laptop', NULL, '2021-11-08 03:19:38'),
(9, 'Sweet Home', 'प्यारा घर', 'sweet-home', 'प्यारा-घर', 'fa fa-home', NULL, NULL),
(10, 'Appliances', 'उपकरण', 'appliances', 'उपकरण', 'fa fa-paper-plane', NULL, '2021-11-08 03:19:12'),
(11, 'Beauty', 'सुंदरता', 'beauty', 'सुंदरता', 'fa fa-envira', NULL, '2021-11-08 03:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'COUP987', 40, '2021-11-30', 1, '2021-11-15 08:24:23', NULL),
(3, 'COUN', 45, '2021-11-26', 1, '2021-11-15 08:27:19', NULL),
(4, 'FASJ', 12, '2021-11-14', 1, '2021-11-15 08:41:55', '2021-11-15 08:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(5, '2019_08_19_000000_create_failed_jobs_table', 2),
(6, '2021_02_02_203839_create_sessions_table', 3),
(7, '2021_10_25_073635_create_admins_table', 4),
(8, '2021_11_01_085014_create_brands_table', 5),
(9, '2021_11_03_065829_create_categories_table', 6),
(10, '2021_11_03_080503_create_subcategories_table', 7),
(11, '2021_11_05_064738_create_sub_subcategories_table', 8),
(12, '2021_11_06_071108_create_products_table', 9),
(13, '2021_11_06_072450_create_product_images_table', 9),
(14, '2021_11_07_134139_create_sliders_table', 10),
(15, '2021_11_15_064406_create_wishlists_table', 11),
(16, '2021_11_15_133729_create_coupons_table', 12),
(17, '2021_11_16_071600_create_shipdivisions_table', 13),
(18, '2021_11_16_074720_create_ship_districts_table', 14),
(19, '2021_11_16_082959_create_ship_states_table', 15);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) NOT NULL,
  `product_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc_hin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_hin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deal` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_hin`, `product_slug_en`, `product_slug_hin`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_hin`, `product_size_en`, `product_size_hin`, `product_color_en`, `product_color_hin`, `selling_price`, `discount_price`, `short_desc_en`, `short_desc_hin`, `long_desc_en`, `long_desc_hin`, `product_thumbnail`, `hot_deal`, `featured`, `special_offer`, `special_deal`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 7, 10, 8, 'Striped Men Hooded Neck Red, Black T-Shirt', 'स्ट्राइप्ड मेन हुडेड नेक रेड, ब्लैक टी-शर्ट', 'striped-men-hooded-neck-red,-black-t-shirt', 'स्ट्राइप्ड-मेन-हुडेड-नेक-रेड,-ब्लैक-टी-शर्ट', 'PROD123', '0', 'tshirt', 'tshirt', 'Small, Medium, Large', 'Small, Medium, Large', 'Red, Black', 'Red,Black', '599', '379', 'Lorem Ipsum is simply dummy text of the printing', 'लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p>लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है। लोरेम इप्सम 1500 के दशक के बाद से उद्योग का मानक डमी टेक्स्ट रहा है, जब एक अज्ञात प्रिंटर ने एक प्रकार की गैली ली और इसे एक प्रकार की नमूना पुस्तक बनाने के लिए हाथापाई की। यह न केवल पांच शताब्दियों तक जीवित रहा है, बल्कि इलेक्ट्रॉनिक टाइपसेटिंग में भी छलांग लगाई है, जो अनिवार्य रूप से अपरिवर्तित है। इसे 1960 के दशक में लोरम इप्सम पैसेज वाले लेट्रासेट शीट्स के रिलीज के साथ लोकप्रिय किया गया था, और हाल ही में एल्डस पेजमेकर जैसे डेस्कटॉप प्रकाशन सॉफ्टवेयर के साथ लोरेम इप्सम के संस्करण भी शामिल थे।</p>', 'upload/products/thumbnails/1715683869483138.jpeg', 1, 1, NULL, NULL, 1, '2021-11-06 07:30:42', '2021-11-12 04:53:49'),
(3, 4, 7, 10, 8, 'Printed Men Hooded Neck White T-Shirt', 'प्रिंटेड मेन हूडेड नेक व्हाइट टी-शर्ट', 'printed-men-hooded-neck-white-t-shirt', 'प्रिंटेड-मेन-हूडेड-नेक-व्हाइट-टी-शर्ट', 'PROD321', '300', 'tshirt', 'tshirt', 'Small, Medium, Large', 'Small, Medium, Large', 'Red, Black', 'Red,Black', '698', '599', 'Lorem Ipsum is simply dummy text of the printing', 'लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p>लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है। लोरेम इप्सम 1500 के दशक के बाद से उद्योग का मानक डमी टेक्स्ट रहा है, जब एक अज्ञात प्रिंटर ने एक प्रकार की गैली ली और इसे एक प्रकार की नमूना पुस्तक बनाने के लिए हाथापाई की। यह न केवल पांच शताब्दियों तक जीवित रहा है, बल्कि इलेक्ट्रॉनिक टाइपसेटिंग में भी छलांग लगाई है, जो अनिवार्य रूप से अपरिवर्तित है। इसे 1960 के दशक में लोरम इप्सम पैसेज वाले लेट्रासेट शीट्स के रिलीज के साथ लोकप्रिय किया गया था, और हाल ही में एल्डस पेजमेकर जैसे डेस्कटॉप प्रकाशन सॉफ्टवेयर के साथ लोरेम इप्सम के संस्करण भी शामिल थे।</p>', 'upload/products/thumbnails/1715684037049587.jpeg', NULL, NULL, 1, NULL, 1, '2021-11-06 07:33:21', NULL),
(4, 4, 8, 14, 20, 'Samsung Multicolor Monitor', 'सैमसंग मल्टीकलर मॉनिटर', 'samsung-multicolor-monitor', 'सैमसंग-मल्टीकलर-मॉनिटर', 'PROD990', '500', 'samsung', 'samsung', NULL, NULL, 'Red, Black,multicolor', 'Red,Black,multicolor', '5000', '4500', 'Lorem Ipsum is simply dummy text of the printing', 'लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. asd</p>', '<p>लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है। लोरेम इप्सम 1500 के दशक के बाद से उद्योग का मानक डमी टेक्स्ट रहा है, जब एक अज्ञात प्रिंटर ने एक प्रकार की गैली ली और इसे एक प्रकार की नमूना पुस्तक बनाने के लिए हाथापाई की। यह न केवल पांच शताब्दियों तक जीवित रहा है, बल्कि इलेक्ट्रॉनिक टाइपसेटिंग में भी छलांग लगाई है, जो अनिवार्य रूप से अपरिवर्तित है। इसे 1960 के दशक में लोरम इप्सम पैसेज वाले लेट्रासेट शीट्स के रिलीज के साथ लोकप्रिय किया गया था, और हाल ही में एल्डस पेजमेकर जैसे डेस्कटॉप प्रकाशन सॉफ्टवेयर के साथ लोरेम इप्सम के संस्करण भी शामिल थे। शामिल थे।</p>', 'upload/products/thumbnails/1715691678115451.jpeg', 1, 1, 1, NULL, 1, '2021-11-06 07:48:59', '2021-11-12 04:29:01'),
(6, 4, 7, 12, 14, 'Floral Print Buttoned', 'पुष्प प्रिंट बटन', 'floral-print-buttoned', 'पुष्प-प्रिंट-बटन', 'PROD099', '100', 'floral casual', 'floral casual', 'Small, Medium, Large', 'Small, Medium, Large', 'Red, Black', 'Red,Black', '800', NULL, 'Lorem ipsum dolor sit amet, consectetur', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '<p>लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट। ड्यूस ऑउट इर्यू डोलर इन रिप्रेहेंडरिट इन वॉलुप्टेट वेलिट एसएसई सिलम डोलोरे ईयू फुगियाट नाला परियातुर। एक्सेप्युर सिंट ओसीकैट कपिडैटैट नॉन प्रोडेंट, सन्ट इन कल्पा क्वी ऑफिसिया डिसेरुंट मोलिट एनिम आईडी इस्ट लेबरम। लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट।</p>', 'upload/products/thumbnails/1715853199258219.jpeg', 1, NULL, NULL, NULL, 1, '2021-11-08 04:22:16', NULL),
(7, 4, 7, 10, 8, 'Floral Print Buttoned', 'पुष्प प्रिंट बटन', 'floral-print-buttoned', 'पुष्प-प्रिंट-बटन', 'PORD091', '200', 'lorem', 'lorem', 'Small, Medium, Large', 'Small, Medium, Large', 'Red, Black', 'Red,Black', '1000', '800', 'Lorem ipsum dolor sit amet, consectetur', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '<p>लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट। ड्यूस ऑउट इर्यू डोलर इन रिप्रेहेंडरिट इन वॉलुप्टेट वेलिट एसएसई सिलम डोलोरे ईयू फुगियाट नाला परियातुर। एक्सेप्युर सिंट ओसीकैट कपिडैटैट नॉन प्रोडेंट, सन्ट इन कल्पा क्वी ऑफिसिया डिसेरुंट मोलिट एनिम आईडी इस्ट लेबरम। लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट।</p>', 'upload/products/thumbnails/1715853371006199.jpeg', NULL, NULL, NULL, NULL, 1, '2021-11-08 04:24:51', NULL),
(8, 4, 10, 20, 34, 'Samsung Smart TV', 'सैमसंग स्मार्ट टीवी', 'samsung-smart-tv', 'सैमसंग-स्मार्ट-टीवी', 'PROD778', '555', 'lorem', 'lorem', 'Small, Medium, Large', 'Small, Medium, Large', 'Red, Black', 'Red,Black', '80000', '79990', 'Lorem ipsum dolor sit amet, consectetur', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '<p>लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट। ड्यूस ऑउट इर्यू डोलर इन रिप्रेहेंडरिट इन वॉलुप्टेट वेलिट एसएसई सिलम डोलोरे ईयू फुगियाट नाला परियातुर। एक्सेप्युर सिंट ओसीकैट कपिडैटैट नॉन प्रोडेंट, सन्ट इन कल्पा क्वी ऑफिसिया डिसेरुंट मोलिट एनिम आईडी इस्ट लेबरम। लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट।</p>', 'upload/products/thumbnails/1715853505535349.jpeg', NULL, NULL, 1, NULL, 1, '2021-11-08 04:26:59', NULL),
(9, 4, 10, 20, 35, 'Medium Screen Smart TV', 'मध्यम स्क्रीन स्मार्ट टीवी', 'medium-screen-smart-tv', 'मध्यम-स्क्रीन-स्मार्ट-टीवी', 'PROD556', '600', 'lorem', 'lorem', 'Small, Medium, Large', 'Small, Medium, Large', 'Red, Black', 'Red,Black', '69999', NULL, 'Lorem ipsum dolor sit amet, consectetur', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '<p>लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट। ड्यूस ऑउट इर्यू डोलर इन रिप्रेहेंडरिट इन वॉलुप्टेट वेलिट एसएसई सिलम डोलोरे ईयू फुगियाट नाला परियातुर। एक्सेप्युर सिंट ओसीकैट कपिडैटैट नॉन प्रोडेंट, सन्ट इन कल्पा क्वी ऑफिसिया डिसेरुंट मोलिट एनिम आईडी इस्ट लेबरम। लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट।</p>', 'upload/products/thumbnails/1715853641357915.jpeg', NULL, 1, NULL, 1, 1, '2021-11-08 04:29:08', '2021-11-12 04:15:27'),
(10, 9, 8, 14, 19, 'Best Printer', 'सर्वश्रेष्ठ प्रिंटर', 'best-printer', 'सर्वश्रेष्ठ-प्रिंटर', 'PROD223', '400', 'lorem', 'lorem', 'Small, Medium, Large', 'Small, Medium, Large', 'Red, Black', 'Red,Black', '5999', '5799', 'Lorem ipsum dolor sit amet, consectetur', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '<p>लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट। ड्यूस ऑउट इर्यू डोलर इन रिप्रेहेंडरिट इन वॉलुप्टेट वेलिट एसएसई सिलम डोलोरे ईयू फुगियाट नाला परियातुर। एक्सेप्युर सिंट ओसीकैट कपिडैटैट नॉन प्रोडेंट, सन्ट इन कल्पा क्वी ऑफिसिया डिसेरुंट मोलिट एनिम आईडी इस्ट लेबरम। लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट।</p>', 'upload/products/thumbnails/1715853827195727.jpeg', NULL, 1, 1, 1, 1, '2021-11-08 04:32:05', '2021-11-12 04:15:05'),
(11, 5, 7, 10, 8, 'Men Casual Tshirt', 'पुरुषों की आरामदायक टीशर्ट', 'men-casual-tshirt', 'पुरुषों-की-आरामदायक-टीशर्ट', 'PROD775', '600', 'lorem', 'lorem', 'Small, Medium, Large', 'Small, Medium, Large', 'Red, Black', 'Red,Black', '699', '550', 'Lorem ipsum dolor sit amet, consectetur', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '<p>लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट। ड्यूस ऑउट इर्यू डोलर इन रिप्रेहेंडरिट इन वॉलुप्टेट वेलिट एसएसई सिलम डोलोरे ईयू फुगियाट नाला परियातुर। एक्सेप्युर सिंट ओसीकैट कपिडैटैट नॉन प्रोडेंट, सन्ट इन कल्पा क्वी ऑफिसिया डिसेरुंट मोलिट एनिम आईडी इस्ट लेबरम। लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट।</p>', 'upload/products/thumbnails/1715853940115678.jpeg', NULL, NULL, NULL, NULL, 1, '2021-11-08 04:33:53', NULL),
(12, 4, 9, 19, 33, 'Lorem Ipsum dolor', 'लोरेम इप्सम डोलोर', 'lorem-ipsum-dolor', 'लोरेम-इप्सम-डोलोर', 'PROD555', '700', 'ipsum', 'ipsum', 'Small, Medium, Large', 'Small, Medium, Large', 'Red, Black', 'Red,Black', '499', NULL, 'Lorem ipsum dolor sit amet, consectetur', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '<p>लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट। ड्यूस ऑउट इर्यू डोलर इन रिप्रेहेंडरिट इन वॉलुप्टेट वेलिट एसएसई सिलम डोलोरे ईयू फुगियाट नाला परियातुर। एक्सेप्युर सिंट ओसीकैट कपिडैटैट नॉन प्रोडेंट, सन्ट इन कल्पा क्वी ऑफिसिया डिसेरुंट मोलिट एनिम आईडी इस्ट लेबरम। लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट।</p>', 'upload/products/thumbnails/1715854101668017.jpg', NULL, NULL, NULL, NULL, 1, '2021-11-08 04:36:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(3, 2, 'upload/products/images/1715683871345088.jpeg', '2021-11-06 07:30:43', NULL),
(4, 2, 'upload/products/images/1715683872325193.jpeg', '2021-11-06 07:30:44', NULL),
(5, 2, 'upload/products/images/1715683872847091.jpeg', '2021-11-06 07:30:44', NULL),
(6, 2, 'upload/products/images/1715683873328142.jpeg', '2021-11-06 07:30:45', NULL),
(7, 3, 'upload/products/images/1715684037521573.jpeg', '2021-11-06 07:33:22', NULL),
(8, 3, 'upload/products/images/1715684037980961.jpeg', '2021-11-06 07:33:22', NULL),
(9, 3, 'upload/products/images/1715684039027700.jpeg', '2021-11-06 07:33:23', NULL),
(10, 3, 'upload/products/images/1715684039450155.jpeg', '2021-11-06 07:33:23', NULL),
(11, 3, 'upload/products/images/1715684039826499.jpeg', '2021-11-06 07:33:24', NULL),
(12, 4, 'upload/products/images/1715690553902093.jpeg', '2021-11-06 07:48:59', '2021-11-06 09:16:58'),
(14, 4, 'upload/products/images/1715690589440078.jpeg', '2021-11-06 07:49:00', '2021-11-06 09:17:31'),
(15, 4, 'upload/products/images/1715685021889888.jpeg', '2021-11-06 07:49:00', NULL),
(20, 6, 'upload/products/images/1715853209790647.jpeg', '2021-11-08 04:22:17', NULL),
(21, 6, 'upload/products/images/1715853211380992.jpeg', '2021-11-08 04:22:18', NULL),
(22, 6, 'upload/products/images/1715853212119424.jpeg', '2021-11-08 04:22:19', NULL),
(23, 6, 'upload/products/images/1715853213215316.jpeg', '2021-11-08 04:22:21', NULL),
(24, 7, 'upload/products/images/1715853371650726.jpeg', '2021-11-08 04:24:51', NULL),
(25, 7, 'upload/products/images/1715853372102819.jpeg', '2021-11-08 04:24:52', NULL),
(26, 8, 'upload/products/images/1715853506114157.jpeg', '2021-11-08 04:26:59', NULL),
(27, 8, 'upload/products/images/1715853506510617.jpeg', '2021-11-08 04:27:00', NULL),
(28, 8, 'upload/products/images/1715853507158677.jpeg', '2021-11-08 04:27:00', NULL),
(29, 9, 'upload/products/images/1715853641837633.jpeg', '2021-11-08 04:29:09', NULL),
(30, 9, 'upload/products/images/1715853642397083.jpeg', '2021-11-08 04:29:09', NULL),
(31, 9, 'upload/products/images/1715853642807182.jpeg', '2021-11-08 04:29:10', NULL),
(32, 9, 'upload/products/images/1715853643535142.jpeg', '2021-11-08 04:29:11', NULL),
(33, 10, 'upload/products/images/1715853827602679.jpeg', '2021-11-08 04:32:06', NULL),
(34, 10, 'upload/products/images/1715853827986854.jpeg', '2021-11-08 04:32:06', NULL),
(35, 10, 'upload/products/images/1715853828468041.jpeg', '2021-11-08 04:32:07', NULL),
(36, 10, 'upload/products/images/1715853829000597.jpeg', '2021-11-08 04:32:07', NULL),
(37, 11, 'upload/products/images/1715853940687240.jpeg', '2021-11-08 04:33:54', NULL),
(38, 11, 'upload/products/images/1715853941271785.jpeg', '2021-11-08 04:33:55', NULL),
(39, 11, 'upload/products/images/1715853941948379.jpeg', '2021-11-08 04:33:55', NULL),
(40, 11, 'upload/products/images/1715853942396604.jpeg', '2021-11-08 04:33:56', NULL),
(41, 12, 'upload/products/images/1715854102031651.jpg', '2021-11-08 04:36:28', NULL),
(42, 12, 'upload/products/images/1715854102624287.jpg', '2021-11-08 04:36:28', NULL),
(43, 12, 'upload/products/images/1715854103360119.jpg', '2021-11-08 04:36:29', NULL),
(44, 12, 'upload/products/images/1715854103775057.jpg', '2021-11-08 04:36:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('APtmgDtZvTYv0F6pcgxDOMDjvjmcC58kB81ww5p3', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoibUlSalZXR2ZvSEpZU2NMaTFkdklxRW5xbE1HenhCYXE4OVJ5akpGSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGVja291dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoiY2FydCI7YToxOntzOjc6ImRlZmF1bHQiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjE6e3M6MzI6IjQ1ZmExOTdhYTM4YjMxMDE4ZmEwOGQxODNiYmU3YzRlIjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6MTA6e3M6NToicm93SWQiO3M6MzI6IjQ1ZmExOTdhYTM4YjMxMDE4ZmEwOGQxODNiYmU3YzRlIjtzOjI6ImlkIjtzOjI6IjEwIjtzOjM6InF0eSI7czoxOiIxIjtzOjQ6Im5hbWUiO3M6MTI6IkJlc3QgUHJpbnRlciI7czo1OiJwcmljZSI7ZDo1Nzk5O3M6Njoid2VpZ2h0IjtkOjE7czo3OiJvcHRpb25zIjtPOjM5OiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbU9wdGlvbnMiOjI6e3M6ODoiACoAaXRlbXMiO2E6Mzp7czo1OiJpbWFnZSI7czo0ODoidXBsb2FkL3Byb2R1Y3RzL3RodW1ibmFpbHMvMTcxNTg1MzgyNzE5NTcyNy5qcGVnIjtzOjU6ImNvbG9yIjtzOjEyOiJDaG9vc2UgQ29sb3IiO3M6NDoic2l6ZSI7czoxMToiQ2hvb3NlIFNpemUiO31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6NzoidGF4UmF0ZSI7aTowO3M6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO047czo0NjoiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGRpc2NvdW50UmF0ZSI7aTowO319czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRiUUZlQ2p2V0Y4ZUFwbXdlbVNlZVZPL25lNThGaGpPcmFtcVMwV2lkM1VETkp1TzljNk9VcSI7fQ==', 1637074980);

-- --------------------------------------------------------

--
-- Table structure for table `shipdivisions`
--

CREATE TABLE `shipdivisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipdivisions`
--

INSERT INTO `shipdivisions` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(2, 'Jamshedpur', '2021-11-16 01:59:09', NULL),
(3, 'Ranchi', '2021-11-16 01:59:16', '2021-11-16 02:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `ship_districts`
--

CREATE TABLE `ship_districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_districts`
--

INSERT INTO `ship_districts` (`id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Dimna', '2021-11-16 02:34:24', '2021-11-16 02:54:17'),
(2, 2, 'Mango', '2021-11-16 02:53:54', '2021-11-16 02:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `ship_states`
--

CREATE TABLE `ship_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_states`
--

INSERT INTO `ship_states` (`id`, `division_id`, `district_id`, `state_name`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'Jharkhand', '2021-11-16 04:04:15', '2021-11-16 04:21:32'),
(3, 2, 2, 'fasdf', '2021-11-16 04:21:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/sliders/1715778540608792.jpg', 'Slider 1', 'slider description', 1, '2021-11-07 08:35:28', NULL),
(2, 'upload/sliders/1715778582238947.jpg', 'Slider 2', 'slider description', 1, '2021-11-07 08:36:06', NULL),
(3, 'upload/sliders/1715778606286780.jpg', 'Slider 3', 'slider description', 1, '2021-11-07 08:36:29', NULL),
(4, 'upload/sliders/1715778643209042.jpg', 'Slider 4', 'slider description', 1, '2021-11-07 08:37:04', NULL),
(5, 'upload/sliders/1715778663312459.jpg', 'Slider 5', 'slider description', 1, '2021-11-07 08:37:24', NULL),
(7, 'upload/sliders/1715780283323501.jpg', NULL, NULL, 0, '2021-11-07 08:38:08', '2021-11-07 09:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name_en`, `subcategory_name_hin`, `subcategory_slug_en`, `subcategory_slug_hin`, `created_at`, `updated_at`) VALUES
(10, 7, 'Mans Top Ware', 'मैंस टॉप वेयर', 'mans-top-ware', '', NULL, NULL),
(11, 7, 'Mans Bottom Ware', 'मैन्स बॉटम वेयर', 'mans-bottom-ware', '', NULL, NULL),
(12, 7, 'Mans Footwear', 'मैन्स फुटवियर', 'mans-footwear', '', NULL, NULL),
(13, 7, 'Women Footwear', 'महिलाओं के जूते', 'women-footwear', '', NULL, NULL),
(14, 8, 'Computer Peripherals', 'कंप्यूटर पेरिफेरल्स', 'computer-peripherals', '', NULL, NULL),
(15, 8, 'Mobile Accessory', 'मोबाइल एक्सेसरी', 'mobile-accessory', '', NULL, NULL),
(16, 8, 'Gaming', 'गेमिंग', 'gaming', '', NULL, NULL),
(17, 9, 'Home Furnishings', 'घर का सामान', 'home-furnishings', '', NULL, NULL),
(18, 9, 'Living Room', 'लिविंग रूम', 'living-room', '', NULL, NULL),
(19, 9, 'Home Decor', 'गृह सज्जा', 'home-decor', '', NULL, NULL),
(20, 10, 'Televisions', 'टेलीविजन', 'televisions', '', NULL, NULL),
(21, 10, 'Washing Machines', 'वाशिंग मशीन', 'washing-machines', '', NULL, NULL),
(22, 10, 'Refrigerators', 'रेफ्रिजरेटर', 'refrigerators', '', NULL, NULL),
(23, 11, 'Beauty and Personal Care', 'सौंदर्य और व्यक्तिगत देखभाल', 'beauty-and-personal-care', '', NULL, NULL),
(24, 11, 'Food and Drinks', 'खाद्य और पेय', 'food-and-drinks', '', NULL, NULL),
(25, 11, 'Baby Care', 'बेबी केयर', 'baby-care', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_subcategories`
--

CREATE TABLE `sub_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_subcategories`
--

INSERT INTO `sub_subcategories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_en`, `subsubcategory_name_hin`, `subsubcategory_slug_en`, `subsubcategory_slug_hin`, `created_at`, `updated_at`) VALUES
(7, 7, 12, 'Mans Tshirt', 'मैंस टीशर्ट', 'mans-tshirt', 'मैंस-टीशर्ट', NULL, NULL),
(8, 7, 10, 'Mans Casual Shirts', 'मैंस कैजुअल शर्ट्स', 'mans-casual-shirts', 'मैंस-कैजुअल-शर्ट्स', NULL, NULL),
(9, 7, 10, 'Mans Kurtas', 'मन्स कुर्ता', 'mans-kurtas', 'मन्स-कुर्ता', NULL, NULL),
(10, 7, 11, 'Mans Jeans', 'मैंस जीन्स', 'mans-jeans', 'मैंस-जीन्स', NULL, NULL),
(11, 7, 11, 'Mans Trousers', 'मैन्स ट्राउजर', 'mans-trousers', 'मैन्स-ट्राउजर', NULL, NULL),
(12, 7, 11, 'Mans Cargos', 'मैंस कार्गो', 'mans-cargos', 'मैंस-कार्गो', NULL, NULL),
(13, 7, 12, 'Mans Sports Shoes', 'मैन्स स्पोर्ट्स शूज़', 'mans-sports-shoes', 'मैन्स-स्पोर्ट्स-शूज़', NULL, NULL),
(14, 7, 12, 'Mans Casual Shoes', 'मैंस कैजुअल शूज़', 'mans-casual-shoes', 'मैंस-कैजुअल-शूज़', NULL, NULL),
(15, 7, 12, 'Mans Formal Shoes', 'मैंस औपचारिक जूते', 'mans-formal-shoes', 'मैंस-औपचारिक-जूते', NULL, NULL),
(16, 7, 13, 'Women Flats', 'महिला फ्लैट', 'women-flats', 'महिला-फ्लैट', NULL, NULL),
(17, 7, 13, 'Women Heels', 'महिला ऊँची एड़ी के जूते', 'women-heels', 'महिला-ऊँची-एड़ी-के-जूते', NULL, NULL),
(18, 7, 13, 'Woman Sheakers', 'महिला शेकर्स', 'woman-sheakers', 'महिला-शेकर्स', NULL, NULL),
(19, 8, 14, 'Printers', 'प्रिंटर', 'printers', 'प्रिंटर', NULL, NULL),
(20, 8, 14, 'Monitors', 'मॉनिटर्स', 'monitors', 'मॉनिटर्स', NULL, NULL),
(21, 8, 14, 'Projectors', 'प्रोजेक्टर', 'projectors', 'प्रोजेक्टर', NULL, NULL),
(22, 8, 15, 'Plain Cases', 'सादा मामले', 'plain-cases', 'सादा-मामले', NULL, NULL),
(23, 8, 15, 'Designer Cases', 'डिजाइनर मामले', 'designer-cases', 'डिजाइनर-मामले', NULL, NULL),
(24, 8, 15, 'Screen Guards', 'स्क्रीन गार्ड', 'screen-guards', 'स्क्रीन-गार्ड', NULL, NULL),
(25, 9, 17, 'Bed Liners', 'बेड लाइनर्स', 'bed-liners', 'बेड-लाइनर्स', NULL, NULL),
(26, 9, 17, 'Bedsheets', 'बेडशीट', 'bedsheets', 'बेडशीट', NULL, NULL),
(27, 9, 17, 'Blankets', 'कंबल', 'blankets', 'कंबल', NULL, NULL),
(28, 9, 18, 'Tv Units', 'टीवी इकाइयां', 'tv-units', 'टीवी-इकाइयां', NULL, NULL),
(29, 9, 18, 'Dining Sets', 'डाइनिंग सेट', 'dining-sets', 'डाइनिंग-सेट', NULL, NULL),
(30, 9, 18, 'Coffee Tables', 'कॉफी टेबल', 'coffee-tables', 'कॉफी-टेबल', NULL, NULL),
(31, 9, 19, 'Lightings', 'लाइटिंग्स', 'lightings', 'लाइटिंग्स', NULL, NULL),
(32, 9, 17, 'Clocks', 'घड़ियां', 'clocks', 'घड़ियां', NULL, NULL),
(33, 9, 19, 'Wall Decor', 'दीवार की सजावट', 'wall-decor', 'दीवार-की-सजावट', NULL, NULL),
(34, 10, 20, 'Big Screen TVs', 'बिग स्क्रीन टीवी', 'big-screen-tvs', 'बिग-स्क्रीन-टीवी', NULL, NULL),
(35, 10, 20, 'Smart TVs', 'स्मार्ट टीवी', 'smart-tvs', 'स्मार्ट-टीवी', NULL, NULL),
(36, 10, 22, 'OLED TVs', 'ओ एल ई डी टीवी', 'oled-tvs', 'ओ-एल-ई-डी-टीवी', NULL, NULL),
(37, 10, 21, 'Washer Dryers', 'वॉशर ड्रायर्स', 'washer-dryers', 'वॉशर-ड्रायर्स', NULL, NULL),
(38, 10, 21, 'Washer Only', 'केवल वॉशर', 'washer-only', 'केवल-वॉशर', NULL, NULL),
(39, 10, 21, 'Energy Efficient', 'ऊर्जा कुशल', 'energy-efficient', 'ऊर्जा-कुशल', NULL, NULL),
(40, 10, 22, 'Single Door', 'सिंगल डोर', 'single-door', 'सिंगल-डोर', NULL, NULL),
(41, 10, 22, 'Double Door', 'डबल डोर', 'double-door', 'डबल-डोर', NULL, NULL),
(42, 10, 22, 'Mini Rerigerators', 'मिनी रेफ्रिजरेटर', 'mini-rerigerators', 'मिनी-रेफ्रिजरेटर', NULL, NULL),
(43, 11, 23, 'Eys Makeup', 'आई मेकअप', 'eys-makeup', 'आई-मेकअप', NULL, NULL),
(44, 11, 23, 'Lip Makeup', 'होंठ मेकअप', 'lip-makeup', 'होंठ-मेकअप', NULL, NULL),
(45, 11, 23, 'Hair Care', 'बालों की देखभाल', 'hair-care', 'बालों-की-देखभाल', NULL, NULL),
(46, 11, 24, 'Beverages', 'पेय पदार्थ', 'beverages', 'पेय-पदार्थ', NULL, NULL),
(47, 11, 24, 'Chocolates', 'चॉकलेट', 'chocolates', 'चॉकलेट', NULL, NULL),
(48, 11, 24, 'Snacks', 'स्नैक्स', 'snacks', 'स्नैक्स', NULL, NULL),
(49, 11, 25, 'Baby Diapers', 'बेबी डायपर', 'baby-diapers', 'बेबी-डायपर', NULL, NULL),
(50, 11, 25, 'Baby Wipes', 'बेबी वाइप्स', 'baby-wipes', 'बेबी-वाइप्स', NULL, NULL),
(51, 11, 25, 'Baby Food', 'बेबी फ़ूड', 'baby-food', 'बेबी-फ़ूड', NULL, NULL),
(52, 8, 16, 'Gaming Keyboard', 'गेमिंग कीबोर्ड', 'gaming-keyboard', 'गेमिंग-कीबोर्ड', NULL, NULL),
(53, 8, 16, 'Gaming Monitor', 'गेमिंग मॉनिटर', 'gaming-monitor', 'गेमिंग-मॉनिटर', NULL, NULL),
(54, 8, 16, 'Gaming Mouse', 'गेमिंग माउस', 'gaming-mouse', 'गेमिंग-माउस', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', '9876543210', NULL, '$2y$10$bQFeCjvWF8eApmwemSeeVO/ne58FhjOramqS0Wid3UDNJuO9c6OUq', NULL, NULL, NULL, NULL, NULL, '2021-11-01 03:26:00', '2021-11-01 03:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(5, 1, 4, '2021-11-15 01:50:56', NULL),
(9, 1, 7, '2021-11-15 02:00:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipdivisions`
--
ALTER TABLE `shipdivisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_districts`
--
ALTER TABLE `ship_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_states`
--
ALTER TABLE `ship_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_subcategories`
--
ALTER TABLE `sub_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `shipdivisions`
--
ALTER TABLE `shipdivisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ship_districts`
--
ALTER TABLE `ship_districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ship_states`
--
ALTER TABLE `ship_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sub_subcategories`
--
ALTER TABLE `sub_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
