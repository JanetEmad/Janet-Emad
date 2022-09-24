-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2022 at 11:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nti_ecommerece`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(255) NOT NULL,
  `floor` tinyint(2) NOT NULL,
  `building` smallint(3) NOT NULL,
  `flat` tinyint(4) NOT NULL,
  `notes` mediumtext DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `floor`, `building`, `flat`, `notes`, `user_id`, `region_id`, `created_at`, `updated_at`) VALUES
(2, 'haram', 4, 8, 5, NULL, 13, 1, '2022-09-23 23:09:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` char(11) NOT NULL,
  `image` varchar(64) DEFAULT 'default.jpg',
  `verification_code` mediumint(6) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=> not active, 1=> active',
  `ceeated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `image` varchar(64) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=> not active, 1=> active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_en`, `name_ar`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'التفاحه', 'apple.png', 1, '2022-09-23 18:17:22', NULL),
(2, 'Samsung', 'سامسونج', 'samsung.png', 1, '2022-09-23 18:17:22', NULL),
(3, 'Lenovo', 'لينوفو', 'lenovo.png', 1, '2022-09-23 18:17:22', NULL),
(4, 'LG', 'ال جي', 'lg.png', 1, '2022-09-23 18:17:22', NULL),
(5, 'Asus', 'اسوس', 'asus.png', 1, '2022-09-23 18:17:22', NULL),
(6, 'Oppo', 'اوبو', 'oppo.png', 1, '2022-09-23 18:17:22', NULL),
(7, 'Dell', 'ديل', 'dell.png', 1, '2022-09-23 18:17:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `image` varchar(64) DEFAULT 'default.jpg',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=> not active, 1=> active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_ar`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'الكترونيات', 'Electronics', 'default.jpg', 1, '2022-09-23 18:05:13', '2022-09-23 18:06:39'),
(2, 'سوبرماركت', 'Supermarket', 'default.jpg', 1, '2022-09-23 18:07:28', '2022-09-23 18:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=> not active, 1=> active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_en`, `name_ar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Egypt', 'مصر', 1, '2022-09-23 23:08:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(64) NOT NULL,
  `discount` smallint(6) NOT NULL,
  `discount_type` tinyint(1) NOT NULL COMMENT '0 => percentage 1=> LE',
  `max_discount_value` smallint(3) NOT NULL,
  `max_usage` smallint(3) NOT NULL,
  `max_usage_per_user` tinyint(2) NOT NULL,
  `mini_order` decimal(10,0) NOT NULL,
  `start_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `end_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favs`
--

CREATE TABLE `favs` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `image` varchar(64) NOT NULL DEFAULT 'default.jpg',
  `discount` smallint(6) NOT NULL,
  `discount_type` tinyint(1) NOT NULL COMMENT '	0 => percentage 1=> LE',
  `start_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `end_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title_en`, `title_ar`, `image`, `discount`, `discount_type`, `start_at`, `end_at`, `created_at`, `updated_at`) VALUES
(1, 'Monsters Offer', 'عرض الوحوش', 'offer1.png', 10, 0, '2022-09-24 18:22:30', '2022-09-24 18:22:30', '2022-09-24 12:10:53', '2022-09-24 18:22:30'),
(2, 'Valentine Offer', 'عرض عيد الحب', 'offer2.jpg', 15, 0, '2022-09-24 18:25:53', NULL, '2022-09-24 18:27:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offers_products`
--

CREATE TABLE `offers_products` (
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price_after_discount` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers_products`
--

INSERT INTO `offers_products` (`offer_id`, `product_id`, `price_after_discount`) VALUES
(1, 16, '18000.00'),
(2, 18, '25500.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=> not active, 1=> active',
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `status`, `address_id`, `coupon_id`, `delivered_at`, `created_at`, `updated_at`) VALUES
(1, '40000.00', 1, 2, NULL, NULL, '2022-09-23 23:10:43', NULL),
(2, '30000.00', 1, 2, NULL, NULL, '2022-09-23 23:10:43', NULL),
(3, '25000.00', 1, 2, NULL, '2022-09-24 07:22:07', '2022-09-24 07:20:03', '2022-09-24 07:22:07'),
(4, '10000.00', 1, 2, NULL, NULL, '2022-09-24 07:20:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` smallint(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`order_id`, `product_id`, `price`, `quantity`) VALUES
(1, 18, '30000.00', 1),
(2, 16, '20000.00', 2),
(3, 14, '25000.00', 4),
(4, 17, '10000.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `image` varchar(64) NOT NULL DEFAULT 'default.jpg',
  `quantity` smallint(3) NOT NULL DEFAULT 1,
  `price` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=> not active, 1=> active',
  `details_ar` mediumtext NOT NULL,
  `details_en` mediumtext NOT NULL,
  `product_code` bigint(20) NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_ar`, `name_en`, `image`, `quantity`, `price`, `status`, `details_ar`, `details_en`, `product_code`, `subcategory_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(13, 'موبايل ايه 50', 'Samsung A50', 'a50.jpg', 1, '6000.00', 1, 'ش', 'x', 10, 5, 2, '2022-09-23 18:31:26', NULL),
(14, 'لابتوب ديل', 'Laptop Dell', 'dell.jpg', 1, '25000.00', 1, 'ش', 'x', 20, 6, 7, '2022-09-23 18:31:26', NULL),
(15, 'جبنه', 'Cheese Puck', 'feta.png', 1, '16.00', 1, 'ش', 'x', 30, 7, NULL, '2022-09-23 18:31:26', NULL),
(16, 'ايفون 13', 'Iphone 13', 'iphone13.jpg', 1, '20000.00', 1, 'ش', 'x', 40, 5, 1, '2022-09-23 18:31:26', NULL),
(17, 'اوبو رينو 5', 'Oppo Reno 5', 'reno.jpg', 1, '10000.00', 1, 'ش', 'x', 50, 5, 6, '2022-09-23 18:31:26', NULL),
(18, 'ماك بوك', 'Mac Laptop', 'mac.jpg', 1, '30000.00', 1, 'ش', 'x', 60, 6, 1, '2022-09-23 18:31:26', NULL),
(19, 'لابتوب لينوفو', 'Labtop Lenovo', 'lenovo.jpg', 1, '260000.00', 1, 'ش', 'x', 70, 6, 3, '2022-09-24 07:33:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_specs`
--

CREATE TABLE `products_specs` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `spec_id` bigint(20) UNSIGNED NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_ar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=> not active, 1=> active',
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name_en`, `name_ar`, `status`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'giza', 'الجيزه', 1, 1, '2022-09-23 23:09:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rate` tinyint(4) NOT NULL DEFAULT 0,
  `comment` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_id`, `product_id`, `rate`, `comment`, `created_at`, `updated_at`) VALUES
(13, 13, 5, 'Amazing', '2022-09-23 21:32:43', NULL),
(13, 14, 3, 'very good product', '2022-09-23 21:34:13', NULL),
(13, 15, 1, 'Not Good', '2022-09-24 08:36:49', NULL),
(13, 16, 4, 'This is Beautiful', '2022-09-23 21:32:43', NULL),
(13, 17, 2, 'great', '2022-09-23 22:28:13', NULL),
(13, 18, 5, 'I love it', '2022-09-24 10:22:41', NULL),
(13, 19, 4, 'great laptop', '2022-09-24 09:22:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specs`
--

CREATE TABLE `specs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specs`
--

INSERT INTO `specs` (`id`, `name_en`, `name_ar`) VALUES
(1, 'Weight', 'الوزن'),
(2, 'Rams', 'الذاكره العشوائيه'),
(3, 'Battery', 'البطاريه'),
(4, 'Color', 'اللون');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `image` varchar(64) DEFAULT 'default.jpg',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=> not active, 1=> active',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name_en`, `name_ar`, `image`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 'Mobiles', 'موبايلات', 'default.jpg', 1, 1, '2022-09-23 18:10:24', NULL),
(6, 'Laptops', 'لابتوبات', 'default.jpg', 1, 1, '2022-09-23 18:10:24', NULL),
(7, 'Cheese', 'جبنه', 'default.jpg', 1, 2, '2022-09-23 18:10:24', NULL),
(8, 'Chepsi', 'شيبسي', 'default.jpg', 1, 2, '2022-09-23 18:10:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` char(11) NOT NULL,
  `image` varchar(64) NOT NULL DEFAULT 'default.jpg',
  `gender` enum('m','f') NOT NULL,
  `verification_code` mediumint(6) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=> not active, 1=> active',
  `email_verified_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `image`, `gender`, `verification_code`, `status`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(13, 'Janet', 'Emad', 'janetemad5@gmail.com', '$2y$10$U2LkK/1OP4MBo98BSH8Ufe5J5e1cxlGk/op9./9e6fwfZTIWZLVZe', '01115953142', 'default.jpg', 'f', 642165, 1, '2022-09-24 21:21:46', '2022-09-20 18:31:17', '2022-09-24 21:21:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_regions_FK` (`region_id`),
  ADD KEY `addresses_users_FK` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `carts_products_FK` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favs`
--
ALTER TABLE `favs`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `favs_products_FK` (`product_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD PRIMARY KEY (`offer_id`,`product_id`),
  ADD KEY `offers_products_products_FK` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_addresses_FK` (`address_id`),
  ADD KEY `prders_coupons_FK` (`coupon_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `orders_products_products_FK` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`),
  ADD KEY `products_brands_FK` (`brand_id`),
  ADD KEY `products_subcategories_FK` (`subcategory_id`);

--
-- Indexes for table `products_specs`
--
ALTER TABLE `products_specs`
  ADD PRIMARY KEY (`product_id`,`spec_id`),
  ADD KEY `products_specs_specs_FK` (`spec_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regions_cities_FK` (`city_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `reviews_products_FK` (`product_id`);

--
-- Indexes for table `specs`
--
ALTER TABLE `specs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_categories_FK` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_2` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specs`
--
ALTER TABLE `specs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_regions_FK` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `addresses_users_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_products_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_users_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favs`
--
ALTER TABLE `favs`
  ADD CONSTRAINT `favs_products_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favs_users_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD CONSTRAINT `offers_products_offers_FK` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_products_products_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_addresses_FK` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prders_coupons_FK` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_orders_FK` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_products_products_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brands_FK` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `products_subcategories_FK` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `products_specs`
--
ALTER TABLE `products_specs`
  ADD CONSTRAINT `products_specs_products_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_specs_specs_FK` FOREIGN KEY (`spec_id`) REFERENCES `specs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_cities_FK` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_products_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_users_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_categories_FK` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
