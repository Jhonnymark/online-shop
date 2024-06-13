-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2024 at 10:42 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `street`, `barangay`, `municipality`) VALUES
(1, 'Dike', 'general esco', 'Naujan'),
(2, 'Dike', 'general esco', 'Naujan'),
(3, 'Dike', 'general esco', 'Naujan'),
(4, 'Dike', 'general esco', 'Naujan'),
(5, 'Dike', 'general esco', 'Naujan'),
(6, 'Dike', 'general esco', 'Naujan'),
(7, 'Dike', 'general esco', 'Naujan'),
(8, 'Dike', 'general esco', 'Naujan'),
(9, 'Dike', 'general esco', 'Naujan'),
(10, 'Dike', 'general esco', 'Naujan'),
(11, 'Dike', 'general esco', 'Naujan'),
(12, 'Centro', 'Inarawan', 'Naujan'),
(13, 'Dike', 'Inarawan', 'Naujan');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int NOT NULL,
  `quantity` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `quantity`, `product_id`, `user_id`) VALUES
(39, 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `category_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Beveragess'),
(2, 'Biscuits'),
(3, 'Canned Goods'),
(4, 'Noodles '),
(5, 'Coffee'),
(6, 'Cigarettes'),
(7, 'Shampoo'),
(8, 'Conditioner'),
(9, 'Detergent'),
(10, 'Candies');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `total_amount` double NOT NULL,
  `user_id` int NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `total_amount`, `user_id`, `order_date`) VALUES
(1, 315, 2, '2024-06-13 13:21:43'),
(2, 15, 1, '2024-06-13 13:27:18'),
(3, 180, 2, '2024-06-13 14:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `status` enum('Pending','Preparing','ToReceive','Completed') NOT NULL DEFAULT 'Pending',
  `received_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `prod_name`, `price`, `quantity`, `status`, `received_date`) VALUES
(1, 1, 2, 'Cheese Cake', 15.00, 1, 'Completed', '2024-06-13'),
(2, 2, 3, 'Coke Mismo', 15.00, 1, 'ToReceive', NULL),
(3, 3, 3, 'Coke Mismo', 15.00, 12, 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `type_code` bigint DEFAULT NULL,
  `prod_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prod_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` double DEFAULT NULL,
  `stock` int NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `expiration_date` date DEFAULT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `type_code`, `prod_desc`, `prod_name`, `price`, `stock`, `photo`, `expiration_date`, `category_id`) VALUES
(1, 4800163000048, 'Ligo Sardines in Tomato with chilli 155g ', 'Ligo Red', 22, 48, 'ligo-red.png', '2024-05-10', 3),
(2, 4809010626332, 'Lemon Square Cheese cake 10x30g', 'Cheese Cake', 15, 9, 'cheese-cake.png', '2024-05-10', 2),
(3, 5449000256805, 'Coke Mismo', 'Coke Mismo', 15, 26, 'coke_mismo.png', '2024-05-10', 1),
(4, 4800361339186, 'Nescafe Classic Instant Coffee 23g', 'Nescafe 23g', 40, 49, 'nescafe_23g.png', '2024-05-10', 5),
(5, 4807770272202, 'Lucky me instant noodles Chicken 55g', 'LM Chicken', 11, 57, 'LM_chicken.png', '2024-05-10', 4),
(6, 4806504710126, 'Mega Sardines in Tomato Sauce with Chili 155g,', 'Mega Red', 24, 19, 'mega-red.png', '2024-05-10', 3),
(7, 4800361393645, 'Nescafe Classic Instant Coffee 46g', 'Nescafe 46g', 42, 32, 'nescafe_46g.png', '2024-05-10', 5),
(8, 4800110026497, 'Homi Instant Mami Noodles Beef Brisket 55g', 'HoMi Beef', 10, 24, 'Homi_Beef.png', '2024-05-10', 4),
(9, 4800110025995, 'Homi Instant Mami Noodles Chicken & Garlic 55g', 'HoMi Chicken', 10, 40, 'Homi_Chicken.png', '2024-05-10', 4),
(10, 4807770270017, 'Lucky me instant noodles Beef 55g', 'LM Beef', 10, 40, 'lucky_me_beef.png', '2024-05-10', 4),
(11, 4800010075526, 'Jack‘N Jill Cream-O Vanilla Cream-Filled Chocolate Sandwich Cookies 33gx10Packs', 'CreamO', 189, 0, 'Cream-O.png', '2024-05-10', 2),
(12, 14800016057073, 'C2 Solo Green Tea Apple 230mlx24', 'C2 Apple', 200, 7, 'c2_apple.png', '2024-05-10', 1),
(13, 4806022901884, 'Homi Instant Mami Chili Garlic Beef 55g', 'HoMi Hot Beef', 10, 40, 'Homi_Hot.png', '2024-05-10', 4),
(14, 4807770272554, 'Lucky Me Pancit Canton Sweet&Spicy', 'Canton Sweet and Spicy', 15, 25, 'P.C._sweet.png', '2024-05-10', 4),
(15, 4800361393683, 'Nescafe Classic Instant Coffee 92g', 'Nescafe 92g', 82, 9, 'nescafe_92g.png', '2024-05-10', 5),
(16, 4800092110528, 'Rebisco Hansel Chocolate Sandwich 32gx10s', 'Hansel Choco', 8, 4, 'hansel-choco.png', '2024-05-10', 2),
(17, 72810293583, 'Ligo Sardines in Tomato Sauce', 'Ligo Green', 23, 30, 'ligo-green.png', '2024-05-10', 3),
(18, 748485801728, 'Lucky 7 Carne Norte 150g', 'Lucky7 150g', 30, 2, 'lucky7-150g.png', '2024-05-10', 3),
(19, 857451000307, 'Mega Sardines in Tomato Sauce', 'Mega Green', 23, 27, 'mega-green.png', '2024-05-10', 3),
(22, 4807770271229, 'Lucky Me Pancit Cantoon Extra Hot', 'Cantoon Extra Hot', 15, 44, 'P.C._extra_hot.png', '2024-05-10', 4),
(23, 4807770270291, 'Lucky Me Pancit Canton Chili Mansi', 'Canton Chili Mansi', 15, 44, 'P.C._chilimansi.png', '2024-05-10', 4),
(24, 4807770270123, 'Lucky Me Pancit Canton Kalamansi', 'Canton Kalamansi', 15, 48, 'P.C._kalamansi.png', '2024-05-10', 4),
(25, 4807770270055, 'Lucky Me Pancit Canton Original', 'Canton Original', 15, 54, 'P.C._original.png', '2024-05-10', 4),
(26, 748485801469, 'Lucky7 Carne Norte 100g', 'Lucky7 100g', 30, 3, 'Lucky7_small.png', '2024-05-10', 3),
(27, 748485803951, 'Lucky7 Carne Norte 210g', 'Lucky7 210g', 40, 12, 'Lucky7_210g.png', '2024-05-10', 3),
(28, 4800092110528, 'Rebisco Hansel Creackers ', 'Hansel Cracker', 180, 8, 'Hansel_cracker.png', '2024-05-10', 2),
(29, 4800092110511, 'Hansel Milk Sandwich 32gx10s', 'Hansel Milk', 180, 8, 'Hansel_milk.png', '2024-05-10', 2),
(30, 4800092118777, 'Hansel Milky Strawberry Sandwich 32gx10s', 'Hansel Strawberry ', 180, 8, 'Hansel_Pink.png', '2024-05-10', 2),
(31, 4800016304019, 'Maxx Cherry Menthol Candy 50\'s', 'Maxx Red', 100, 28, 'Maxx_Red.png', '2025-05-12', 10),
(32, 4800016306013, 'Maxx Candy Honey Lemon 50\'s', 'Maxx Yellow', 100, 20, 'maxx yellow.png', '2025-05-12', 10),
(33, 4800016306016, 'Axx Candy Honeymansi 50\'s ', 'Maxx Green', 110, 25, 'maxx green.png', '2025-05-12', 10),
(34, 4800016303159, 'Maxx Extra Strength Menthol Candy 50\'s', 'Maxx Blue', 100, 27, 'Maxx_Blue.png', '2025-05-12', 10),
(35, 4800016303081, 'Maxx Candy Dalandan Orange 50\'s', 'Maxx Orange', 100, 20, 'maxx orange.png', '2025-05-12', 10),
(55, 4800016303159, 'Sprite Mismo', 'Sprite', 23, 34, 'coke_mismo1.png', '2024-06-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `variation_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `variation_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `discounted_price` decimal(10,2) DEFAULT NULL,
  `retail_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`variation_id`, `product_id`, `variation_type`, `discounted_price`, `retail_price`) VALUES
(1, 1, 'per pcs', 24.50, 27.00),
(2, 2, 'per pack', 75.00, 85.00),
(3, 3, 'per case', 200.00, 210.00),
(4, 4, 'per pcs', 20.50, 23.00),
(5, 5, 'per pcs', 8.75, 11.00),
(6, 6, 'per pcs', 24.50, 27.00),
(7, 7, 'per pcs', 40.00, 45.00),
(8, 8, 'per pcs', 8.50, 10.00),
(9, 9, 'per pcs', 8.50, 10.00),
(10, 10, 'per pcs', 8.75, 11.00),
(11, 11, 'per pack', 74.00, 80.00),
(12, 12, 'per case', 310.00, 320.00),
(13, 13, 'per pcs', 9.60, 10.00),
(14, 14, 'per pcs', 14.00, 17.00),
(15, 15, 'per pcs', 78.50, 85.00),
(16, 16, 'per pack', 60.00, 65.00),
(17, 17, 'per pcs', 24.50, 27.00),
(18, 18, 'per pcs', 21.95, 24.00),
(19, 19, 'per pcs', 24.50, 27.00),
(20, 20, 'per case', 200.00, 210.00),
(21, 21, 'per case', 200.00, 210.00),
(22, 22, 'per pcs', 14.00, 17.00),
(23, 23, 'per pcs', 14.00, 17.00),
(24, 24, 'per pcs', 14.00, 17.00),
(25, 25, 'per pcs', 14.00, 17.00),
(26, 26, 'per pcs', 16.50, 21.00),
(27, 27, 'per pcs', 29.50, 35.00),
(28, 28, 'per pack', 60.00, 65.00),
(29, 29, 'per pack', 60.00, 65.00),
(30, 30, 'per pack', 60.00, 65.00),
(31, 31, 'per pack', 42.00, 47.00),
(32, 32, 'per pack', 42.00, 47.00),
(33, 33, 'per pack', 42.00, 47.00),
(34, 34, 'per pack', 42.00, 47.00),
(35, 35, 'per pack', 42.00, 47.00),
(36, 36, 'per case', 1356.00, 1560.00),
(37, 37, 'half case', 770.00, 816.00),
(48, 38, 'per pcs', 65.00, 70.00),
(49, 39, 'per case', 1467.00, 1560.00),
(50, 40, 'half case', 732.00, 792.00),
(51, 41, 'per pcs', 123.00, 135.00),
(52, 42, 'per pieces', 300.00, 200.00),
(53, 43, 'per pieces', 300.00, 311.00);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'min_spend_for_free_delivery', '100'),
(2, 'delivery_fee', '50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `address_id` int NOT NULL,
  `verification_code` varchar(6) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'not_verified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `phone_number`, `username`, `role`, `address_id`, `verification_code`, `status`) VALUES
(1, 'markjhonperez03@gmail.com', '$2y$10$C9.YLNApAAfqtsrXx/0PV.BGgTAecokZbv/Mtuvbd3GCoIlcmC/t2', 'Mark', 'Perez', '9105411822', 'resident_user', 'Admin', 1, '965923', 'verified'),
(2, 'enriquezjuliuscarl@gmail.com', '$2y$10$SYJ/PgolHsceY/tugj3n7uPulAYIOeZ8qqluDTnpeCvvueYzpl09K', 'Alfred', 'reyes', '9105411822', 'Ally', 'Customer', 2, '148026', 'verified'),
(4, 'fp110722@gmail.com', '$2y$10$qvuVdBu6p4JQ9v4Rheztouh1AzmMx6VoM/oZYnOJUPbvMkJNfQkn.', 'Mark', 'reyes', '912346789', 'serbermz', 'Customer', 4, '445073', 'verified'),
(13, 'bernadethcordero06@gmail.com', '$2y$10$NtTv5iqsik60KXtp4Djn6.waDVOIgCoxblnJn2aTZJVYhYHUop//S', 'Bernadeth', 'Perez', '9105411822', 'Berna', 'Customer', 13, '712283', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `user_id`, `product_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 11),
(5, 2, 12),
(6, 2, 27);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`variation_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `variation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
