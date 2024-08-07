-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 04:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Kilei', 'kilei12@gmail.com', '$2y$10$WjkfCA4EOFxOgMNfUeIZeO/CZvplkzN8s8FdX.RypaQVSnFB1087e');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `item_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_title`) VALUES
(1, 'Weddings'),
(2, 'Conferences'),
(3, 'Parties & Ceremonies'),
(4, 'Concerts & Festivals'),
(5, 'Network Events'),
(6, 'Tradeshows & Product Launches');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_title` varchar(100) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `scale_id` int(11) NOT NULL,
  `item_image1` varchar(255) NOT NULL,
  `item_image2` varchar(255) NOT NULL,
  `item_image3` varchar(255) NOT NULL,
  `item_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_title`, `item_description`, `product_id`, `categories_id`, `scale_id`, `item_image1`, `item_image2`, `item_image3`, `item_price`, `date`, `status`) VALUES
(1, 'Digital Mixer', 'Available in all sizes.', 1, 2, 1, 'digital mixer.jpg', 'digital mixer 2.jpg', 'digital mixer 3.jpg', '5500', '2024-05-30 14:51:38', 'true'),
(2, 'Bose s1 Pro', 'Ultimate all in one PA.', 1, 1, 2, 'bose1.webp', 'bose2.webp', 'bose 3.webp', '8000 ', '2024-05-30 14:51:56', 'true'),
(3, 'Yamaha  Stage PA', 'Suitable for every event.', 1, 1, 2, 'yamaha 1.jpg', 'yamaha 2.jpg', 'yamaha3.jpg', '10000', '2024-05-30 14:52:15', 'true'),
(4, ' Handheld Microphone', 'Gives top-tier audio technology for your event.', 1, 1, 2, 'mic wedding 1.jpg', 'mic weedding 2.webp', 'mic wedding 3.webp', '1500 ', '2024-05-30 14:52:31', 'true'),
(5, 'Lavalier Microphone', 'Provides unmatched convenience and clarity for speakers and performers.', 1, 1, 2, 'lavalier 1.jpg', 'lavalier 2.jpg', 'lavalier 3.webp', '500 ', '2024-05-30 14:52:51', 'true'),
(6, 'Neuropower Amplifier', ' Magnifies sound with precision and power to ensure every note and word resonates clearly with the audience.', 1, 1, 2, 'amplifier 1 w.jpg', 'amplifier 2 w.jpg', 'amplifier 3 w.jpg', '6000 ', '2024-05-30 14:53:07', 'true'),
(7, 'Four Channel Audio Mixer', 'Seamlessly blending multiple audio sources into a harmonious output.', 1, 1, 2, 'mixer w 1.jpg', 'mixer w 2.jpg', 'mixer w 3.jpg', '7500', '2024-05-30 14:53:33', 'true'),
(8, 'Qsc k Series', 'Redefines performance and reliability in portable sound and comes with its own stands.', 1, 2, 1, 'qsc 3.jpg', 'qsc 2.jpg', 'qsc 1.jpg', '12000', '2024-05-30 14:53:51', 'true'),
(9, 'Wireless Lavalier Microphones', 'Allows for hands-free operation and discreet placement while delivering professional-grade sound quality.', 1, 2, 1, 'lavalier conf 3.jpg', 'lavalier conf 2.jpg', 'lavalier conf 1.jpg', '800 ', '2024-05-30 14:54:35', 'true'),
(11, 'Headset Microphone', 'Suitable for conference room events.', 1, 2, 1, 'headset con 1.jpg', 'headset con 2.webp', 'headset con 3.jpg', '550 ', '2024-05-30 14:54:50', 'true'),
(13, 'Table Wireless Microphones', 'Perfect for meetings and conferences where clear communication and seamless setup are essential.', 1, 2, 1, 'table mics con 1.jpg', 'table mics con 2.jpg', 'table mics con 3.jpg', '3500', '2024-06-01 16:01:03', 'true'),
(14, 'Bose L1 Compact', 'Suitable for both indoors and outdoors parties.', 1, 3, 3, 'bose l1 1.jpg', 'bose l1 2.jpg', 'bose l1 3.jpg', '5000', '2024-06-01 16:07:20', 'true'),
(15, 'Jbl One', 'Comes along with wireless microphones', 1, 3, 3, 'jbl 1.webp', 'jbl 2.webp', 'jbl 3.webp', '7000', '2024-06-01 16:26:49', 'true'),
(16, 'Dj Mixer', 'Transforming any venue into a pulsating dance floor with its powerful mix of sound, creativity, and energy.', 1, 3, 3, 'Dj mixer 1.webp', 'dj mixer 2.webp', 'dj mixer 3.webp', '4500', '2024-06-01 16:30:03', 'true'),
(17, 'Qsc Kla 12', 'It comes along with its stands', 1, 4, 1, 'qsc 2.jpg', 'qsc 1.jpg', 'qsc 3.jpg', '15000', '2024-06-01 16:45:48', 'true'),
(18, 'Wired Microphones', 'Offer unmatched reliability and sound quality', 1, 4, 1, 'wired mic 3.jpg', 'wired mic 1.jpg', 'wired mic 2.webp', '2000', '2024-06-01 16:52:28', 'true'),
(19, 'Stage Monitors', 'Delivers crystal-clear sound and real-time feedback that ensure every note and word is heard perfectly.', 1, 4, 1, 'stage monitor 1.webp', 'stage monitor 2.webp', 'stage monitor 3.jpg', '9000', '2024-06-02 19:38:01', 'true'),
(20, 'Samson Expedition', 'Suitable for any network event', 1, 5, 2, 'samson exp 1.webp', 'samson exp 2.webp', 'samson exp 3.webp', '12000', '2024-06-05 20:26:23', 'true'),
(21, 'Live U Solo Video/Audio Encoder', 'Ensures your content reaches audiences with exceptional quality and reliability.', 1, 5, 2, 'liveu 1.webp', 'liveu 2.webp', 'live u 3.webp', '1000', '2024-06-01 17:32:18', 'true'),
(22, 'Electro Voice', 'Sets the standard for audio excellence.', 1, 6, 1, 'electo voice 1.jfif', 'electro voice 2.jpg', 'electro voice 3.jfif', '14000', '2024-06-01 17:42:34', 'true'),
(23, 'Projector', 'Transforms any room into a vibrant visual experience.', 1, 6, 1, 'projector 1.jpg', 'projector 2.jpg', 'projector 3.webp', '2500', '2024-06-02 19:44:53', 'true'),
(24, 'Projector Screen', ' Provides a crisp and clear display that enhances every detail of your presentations and entertainment.', 1, 6, 1, 'projection screen 1.webp', 'projection screen 2.webp', 'projection screen 3.webp', '1200', '2024-06-01 18:01:24', 'true'),
(25, 'XLR Cables', 'Suitable for Audio.', 1, 1, 2, 'xlr wed 1.webp', 'xlr wed2.webp', 'xlr 3.jpg', '300', '2024-06-02 19:47:38', 'true'),
(26, 'VGA', ' Ensure compatibility and performance with our top-grade VGA solutions.', 1, 2, 1, 'vga conf 1.jpg', 'vga conf 2.jfif', 'vga conf 3.webp', '450', '2024-06-02 16:02:09', 'true'),
(27, 'Ethernet Cable', 'For secure, high-speed network connections.', 1, 2, 1, 'cat5e cable.jpg', 'cat 5 2.avif', 'cat 5 3.webp', '600', '2024-06-05 21:14:59', 'true'),
(28, 'Extension Cord', 'For flexible, dependable power solutions.', 1, 3, 3, 'extension cord party1.jpg', 'ext party 2.avif', 'ext party 3.webp', '250', '2024-06-02 16:11:27', 'true'),
(29, 'DMX Cable', 'For reliable, high-performance lighting and stage effects control.', 1, 4, 1, 'dmx cable.jpg', 'dmx 2.jpg', 'dmx 3.jpg', '750', '2024-06-02 16:13:58', 'true'),
(30, 'Speakon Cables', 'Delivers high-quality signal transmission and secure, robust connections.', 1, 4, 1, 'speakon cable.jpg', 'speakon 2.webp', 'speakon 3.webp', '800', '2024-06-02 19:51:06', 'true'),
(31, 'HDMI Cable', 'For crystal-clear, high-definition video and audio connections.', 1, 5, 2, 'hdmi cable 1.jfif', 'hdmi 2.jfif', 'hdmi 3.jpg', '150', '2024-06-02 16:23:16', 'true'),
(32, 'USB C Cable', 'For fast, versatile connectivity.', 1, 6, 1, 'usb c cable 1.jpg', 'usb c 2.jfif', 'usb c3.jfif', '200', '2024-06-02 16:28:50', 'true'),
(33, 'Wedding Light Decor', 'Create a magical ambiance on your special day.', 2, 1, 2, 'light wedding 3.jpg', 'light wedding 2.webp', 'light wedding 1.jpg', '12000', '2024-06-02 17:18:49', 'true'),
(34, 'Conference  Light Decor', 'To illuminate your events with clarity and sophistication.', 2, 2, 1, 'conference 1.webp', 'conference 2.jpg', 'conference3.webp', '10000', '2024-06-02 17:34:49', 'true'),
(35, 'Party Light Decor', 'Lease our dynamic party and ceremony lighting to elevate your events to the next level of excitement and elegance.', 2, 3, 3, 'parties lght 2.jpg', 'party light 2.jpg', 'party light 3.jpg', '1500', '2024-06-02 17:47:05', 'true'),
(36, 'Concerts & Festival Light Decor', 'Ignites the stage with energy and spectacle.', 2, 4, 1, 'concert lighting 1.jpg', 'concert lighting 2.jpg', 'concert lighting 3.jpg', '20000', '2024-06-02 17:50:44', 'true'),
(37, 'Network Event Light Decor', 'Lease our sophisticated network event lighting to illuminate your gatherings with professionalism and flair.', 2, 5, 2, 'network lght 2.jpg', 'network lght 3.jpg', 'network lght 1.jpg', '13000', '2024-06-02 17:56:41', 'true'),
(38, 'Tradeshow & Product Launches Light Decor', 'Lease our innovative tradeshow and product launch lighting to showcase your brand with brilliance and style.', 2, 6, 1, 'ts lght 3.jpg', 'ts lght 2.jpg', 'ts lght 1.jpg', '18000', '2024-06-02 18:01:29', 'true'),
(39, 'Wedding Backdrop Decor', 'Create the perfect backdrop for your special day.', 2, 1, 2, 'wed backdrop 1.jpg', 'wed backdrop 2.jpg', 'wed backdrop 3.jpg', '14000', '2024-06-02 19:15:52', 'true'),
(40, 'Parties & Ceremonies Backdrop Decor', 'Just Get it.', 2, 3, 3, 'party backdrop 3.jpg', 'party backdrop 2.jpg', 'party backdrop 1.jpg', '10000', '2024-06-05 20:46:45', 'true'),
(41, 'Wedding Table & Chair Decor', 'Fits your special day perfectly', 2, 1, 2, 'table decor 3.jpg', 'table decor 4.jpg', 'table decor 2.jpg', '25000', '2024-06-05 20:48:48', 'true'),
(42, 'Conference Table & Chair Decor', 'Suitable for any type of professional meeting.', 2, 2, 1, 'table  decor 1.jpg', 'conference table1.jpg', 'conference table 2.jpg', '20000', '2024-06-02 18:55:10', 'true'),
(43, 'Parties & Ceremonies  Table & Chair Decor', 'Makes your event elegant', 2, 3, 3, 'party tc 3.jpg', 'party tc 2.jpg', 'party tc 1.jpg', '12000', '2024-06-05 21:22:59', 'true'),
(44, 'Network Events Table & Chair Decor', 'Elegant', 2, 5, 2, 'network tc 1.jpg', 'network tc 2.jpg', 'furniture 1.jpg', '14500', '2024-06-05 21:06:29', 'true'),
(45, 'Tradeshow Table & Chair Decor', 'Perfect and Comfortable', 2, 6, 1, 'trade tc1.jpg', 'trade tc 2.jpg', 'furniture 4.jpg', '17000', '2024-06-05 21:10:23', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `item_id`, `quantity`, `order_status`) VALUES
(1, 2, 1108256955, 44, 1, 'Pending'),
(2, 2, 834234225, 22, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`) VALUES
(1, 'PA systems'),
(2, 'Decor');

-- --------------------------------------------------------

--
-- Table structure for table `scale`
--

CREATE TABLE `scale` (
  `scale_id` int(11) NOT NULL,
  `scale_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scale`
--

INSERT INTO `scale` (`scale_id`, `scale_title`) VALUES
(1, 'Large-Scale'),
(2, 'Medium-Scale'),
(3, 'Small-Scale');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_items` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_items`, `order_date`, `order_status`) VALUES
(1, 2, 14500, 1108256955, 1, '2024-07-29 19:02:33', 'Pending'),
(2, 2, 14000, 834234225, 1, '2024-07-29 19:30:35', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_delivery` varchar(500) NOT NULL,
  `user_info` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_image`, `user_password`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, 'Lynnet', 'lyn12@gmail.com', 'admin lady 2.jpg', '$2y$10$N7hE2rtNBrWxaFbOsqSjWuIbktmCN2vjQZzBrD14j.zk9ZSQCaUKa', '::1', 'mombasa', '0739318940');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `scale`
--
ALTER TABLE `scale`
  ADD PRIMARY KEY (`scale_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scale`
--
ALTER TABLE `scale`
  MODIFY `scale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
