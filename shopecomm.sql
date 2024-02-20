-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 01:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_trial`
--

CREATE TABLE `audit_trial` (
  `id` int(11) NOT NULL,
  `user_vendor_id` varchar(10) NOT NULL,
  `user_type` enum('Vendor','User') NOT NULL,
  `created_on` datetime NOT NULL,
  `created_ip` varchar(100) NOT NULL,
  `action_performed` varchar(100) NOT NULL,
  `status` enum('Success','Failed') NOT NULL DEFAULT 'Success'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customer_name` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `invoice_id` varchar(25) NOT NULL,
  `product_id` varchar(25) NOT NULL,
  `hsn_code` varchar(25) NOT NULL,
  `mrp` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `gst` int(11) NOT NULL,
  `order_id` varchar(25) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_amunt` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `created_by` varchar(25) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_ip` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complain_cat`
--

CREATE TABLE `complain_cat` (
  `id` int(11) NOT NULL,
  `comp_cat` varchar(15) NOT NULL,
  `comp_name` varchar(15) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `complain_cat`
--

INSERT INTO `complain_cat` (`id`, `comp_cat`, `comp_name`, `modified_on`, `modified_by`) VALUES
(1, 'pay', 'Payment Issue', '2020-12-15 08:41:13', ''),
(2, 'product', 'Product Issue', '2020-12-15 08:41:04', ''),
(3, 'shop', 'Shop Issue', '2020-12-15 08:40:55', ''),
(4, 'vendor', 'Vendor Issue', '2020-12-15 08:40:43', ''),
(5, 'deliver', 'Delivery Issue', '2020-12-15 08:40:29', ''),
(6, 'order', 'Order Issue', '2020-12-15 08:38:30', ''),
(7, 'behaviour', 'Behaviour Issue', '2020-12-15 08:42:55', ''),
(8, 'website', 'Website Issue', '2020-12-15 08:42:55', ''),
(10, 'other', 'Others', '2020-12-15 08:42:55', '');

-- --------------------------------------------------------

--
-- Table structure for table `expence`
--

CREATE TABLE `expence` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expence_name` varchar(25) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `discription` text NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `created_by` varchar(24) NOT NULL,
  `created_on` date NOT NULL,
  `modified_by` varchar(25) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_attempt`
--

CREATE TABLE `log_attempt` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `datetime` datetime NOT NULL,
  `ipaddress` varchar(100) NOT NULL,
  `lock_user` enum('N','Y') NOT NULL,
  `attempt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_area`
--

CREATE TABLE `master_area` (
  `id` int(11) NOT NULL,
  `city_id` int(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_area`
--

INSERT INTO `master_area` (`id`, `city_id`, `name`, `status`) VALUES
(1, 160, 'Ashoka Enclave - 1', '0'),
(2, 160, 'Ashoka Enclave - 2', '0'),
(3, 160, 'Ashoka Enclave - 3', '0'),
(4, 160, 'sec - 91', '0');

-- --------------------------------------------------------

--
-- Table structure for table `master_commission`
--

CREATE TABLE `master_commission` (
  `id` int(11) NOT NULL,
  `commission` varchar(5) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_pincode`
--

CREATE TABLE `master_pincode` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_account_detail`
--

CREATE TABLE `v_account_detail` (
  `id` int(11) NOT NULL,
  `vendor_id` varchar(15) NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `account_no` bigint(20) NOT NULL,
  `ifsc` varchar(8) NOT NULL,
  `account_holder_name` varchar(30) NOT NULL,
  `account_type` enum('Saving','Current') NOT NULL,
  `branch_address` varchar(200) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_ip` varchar(25) NOT NULL,
  `modified_by` varchar(25) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_ip` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_account_detail`
--

INSERT INTO `v_account_detail` (`id`, `vendor_id`, `bank_name`, `account_no`, `ifsc`, `account_holder_name`, `account_type`, `branch_address`, `status`, `created_by`, `created_on`, `created_ip`, `modified_by`, `modified_on`, `modified_ip`) VALUES
(1, '1', 'HDFC', 21365869956, 'hdfc01fd', 'Rakesh Dhar', 'Saving', 'new friends colony new delhi 110001', '0', '', '2021-01-15 07:09:51', '', '', '0000-00-00 00:00:00', ''),
(2, 'GDLNWW2158', 'ICICI Bank', 132563665554, 'ICICI000', 'Ravi Dubey', 'Saving', 'New Friends Colony', '0', 'GDLNWW2158', '2021-01-15 12:58:12', '103.83.129.63', '', '0000-00-00 00:00:00', ''),
(4, 'GDLNWW2158', 'HDFC', 123696854556, 'ICICI222', 'Pankaj', 'Saving', 'sdfasf', '0', 'GDLNWW2158', '2021-01-15 12:59:45', '103.83.129.63', '', '0000-00-00 00:00:00', ''),
(5, 'GDLNWW2158', 'fadsfdsaf', 0, 'sadfasdf', 'asdfasdf', 'Current', 'sdfasdf', '0', 'GDLNWW2158', '2021-01-15 13:11:00', '103.83.129.63', '', '0000-00-00 00:00:00', ''),
(8, 'GHRRAK8524', 'dfasdf', 567678686, 'sdfsadf', 'sdfasdf', 'Saving', 'sdfasdf', '1', 'GHRRAK8524', '2021-01-15 14:33:44', '103.83.129.63', '', '0000-00-00 00:00:00', ''),
(10, 'GUTALM1673', 'fasdfs', 457585454545, 'dfgsdfg', 'dfgdsfg', 'Saving', 'dfgsdfg', '1', 'GUTALM1673', '2021-01-15 16:02:54', '103.83.129.132', '', '0000-00-00 00:00:00', ''),
(11, 'GDLNWW5583', 'ICICI', 3365989852, 'ICICI000', 'Ramesh', 'Saving', 'New friends colony', '1', 'GDLNWW5583', '2021-01-15 16:15:18', '103.83.129.132', '', '0000-00-00 00:00:00', ''),
(12, 'GDLNHW7892', 'ICICI', 136654442253, 'ICICI000', 'Rakesh Dhar', 'Saving', 'New Friends Colony', '1', 'GDLNHW7892', '2021-01-15 22:53:21', '103.83.129.132', '', '0000-00-00 00:00:00', ''),
(13, 'GHRFBD1001', 'Hdfc', 1300022837, 'Icici000', 'Rakesh dhar', 'Saving', 'New friends colony', '1', 'GHRFBD1001', '2021-01-17 10:09:37', '106.210.44.218', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `v_archive`
--

CREATE TABLE `v_archive` (
  `id` int(11) NOT NULL,
  `archive_type` enum('users','vendor','product') NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_banner`
--

CREATE TABLE `v_banner` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(500) NOT NULL,
  `template` varchar(500) NOT NULL,
  `sub_temp` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `ip` varchar(25) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(25) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `v_banner`
--

INSERT INTO `v_banner` (`id`, `name`, `image`, `template`, `sub_temp`, `url`, `status`, `ip`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'Snacks and Beverages', 'jpg_20211113_104734_0000.jpg', '20211108_172108_0000.png', 'From Top Brands', 'snacks_and_beverages', '0', '', '', '2021-01-07 13:00:38', 'admin', '2021-01-24 16:49:07'),
(2, 'Personal, Baby Care', '20211109_205610_0000.jpg', '20211108_173121_0000.png', 'Premium Products', 'personal_care', '0', '', '', '2021-01-07 13:00:38', 'admin', '2021-01-24 16:49:04'),
(3, 'Household Items', '20211108_152032_0000.jpg', '20211108_174337_0000.png', 'Best Products', 'household_items', '0', '', '', '2021-01-07 13:00:38', 'admin', '2021-01-24 16:49:01'),
(4, 'Atta and flour', 'jpg_20211113_104734_0000.jpg', '20211107_193452_0000.png', 'Quality Products', 'grocery/atta_flours', '0', '', '', '2021-01-07 13:00:38', 'admin', '2021-08-27 12:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `v_banner1`
--

CREATE TABLE `v_banner1` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(500) NOT NULL,
  `template` varchar(500) NOT NULL,
  `sub_temp` varchar(50) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `ip` varchar(25) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(25) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `v_banner1`
--

INSERT INTO `v_banner1` (`id`, `name`, `image`, `template`, `sub_temp`, `status`, `ip`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'banner1', 'Main-Banner1.jpg', 'subbanner1.jpg', 'Sub Banner1', '0', '', '', '2021-01-07 13:00:38', 'admin', '2021-01-24 16:49:07'),
(2, 'banner2', 'Main-Banner2.jpg', 'subbanner2.jpg', 'Sub Banner2', '0', '', '', '2021-01-07 13:00:38', 'admin', '2021-01-24 16:49:04'),
(3, 'banner3', 'Main-Banner3.jpg', 'subbanner3.jpg', 'Sub Banner3', '0', '', '', '2021-01-07 13:00:38', 'admin', '2021-01-24 16:49:01'),
(4, 'banner4', 'Main-Banner4.jpg', 'subbanner4.jpg', 'Sub Banner4', '2', '', '', '2021-01-07 13:00:38', 'admin', '2021-01-24 16:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `v_blocked`
--

CREATE TABLE `v_blocked` (
  `id` int(11) NOT NULL,
  `mobile_email_no` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `created_by` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_complain`
--

CREATE TABLE `v_complain` (
  `id` int(11) NOT NULL,
  `order_id` varchar(16) NOT NULL,
  `name` varchar(15) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comp_cat` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(200) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_contact`
--

CREATE TABLE `v_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `message` text NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `ip` varchar(25) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` varchar(25) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `v_contact`
--

INSERT INTO `v_contact` (`id`, `name`, `email`, `phone_no`, `subject`, `message`, `status`, `ip`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'Rakesh Dhar', 'sadfasd@gmail.com', '8899887989', 'asdfasdf', 'Hi, \nThis is rohit saxena  i have to do bussiness with you\nkindly contact me this no.\nRegards\nRohit\n8899887989', '0', '103.83.129.188', 'admin', '2020-12-28 01:53:10', '', '2020-12-29 08:43:56'),
(2, 'Rakesh Dhar', 'sadfasd@gmail.com', '8899887989', 'asdfasdf', 'Hi \nThis is rohit saxena  i have to do bussiness with you\nkindly contact me this no\nRegards\nRohit\n8899887989', '0', '103.83.129.188', 'admin', '2020-12-28 02:19:44', '', '2020-12-29 08:43:56'),
(3, 'Rakesh Dhar', 'sadfasssssd@gmail.com', '8899887977', 'fasdfasfererer', 'Hi \nThis is rohit saxena  i have to do bussiness with you\nkindly contact me this no\nRegards\nRohit\n8899887989', '0', '103.83.129.188', 'admin', '2020-12-28 02:22:36', 'admin', '2020-12-29 14:14:59'),
(4, 'Raavi Kumar', 'rakeshdhar202@gmail.com', '8080805454', 'sdfasdf', 'sdfasdfasdf', '0', '103.83.129.168', 'admin', '2020-12-29 13:58:19', 'admin', '2020-12-29 14:14:56'),
(5, 'Spidey', 'deepak1999mehta@gmail.com', '1234217278', 'Subjecys', 'Gbdbvdbdbbc', '0', '157.37.186.160', 'admin', '2021-03-17 13:14:41', '', '2021-03-17 07:44:41'),
(6, 'Spidey', 'deepak1999mehta@gmail.com', '6666666666', 'Gsvdvvdbdvdvv', 'Gxvvxvxvvdvdbcvvxbdbdhdhbsbsbsbzbbsbshb', '0', '157.37.186.160', 'admin', '2021-03-17 13:14:58', '', '2021-03-17 07:44:58'),
(7, 'Rakesh Dhar', 'rakeshd55502@gmail.com', '7799669988', 'sdfasdfsadfa', 'fasdfasdfasdfasjdfasjdfl asdlfjaklsjdflas dflkasj dfsadjfla sdfasjdfal;sjdf', '0', '103.83.129.124', 'admin', '2021-05-01 01:15:44', '', '2021-04-30 19:45:44'),
(8, 'Chirag ', 'chirag1999@gmail.com', '8787930986', 'Apni na chuda', 'Lund zesi website hai baap ko bol bna dengeee', '0', '157.37.138.24', 'admin', '2022-08-30 21:25:23', '', '2022-08-30 15:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `v_enquiry`
--

CREATE TABLE `v_enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `message` text NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_faq`
--

CREATE TABLE `v_faq` (
  `id` int(11) NOT NULL,
  `faq_cat` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `created_by` varchar(25) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `v_faq`
--

INSERT INTO `v_faq` (`id`, `faq_cat`, `description`, `status`, `created_by`, `created_on`, `modified_on`, `modified_by`) VALUES
(1, 'How do I order at Gomores?', 'Placing an order is very simple. Just register on the Grocery Factory website/mobile application, pick your choice of products with a wide range of product selection in the online store and proceed to checkout or just call customer care and place an order i.e. 7982607328.', '2', '', '2022-02-07 05:12:09', '2022-02-07 10:42:09', 'admin'),
(2, 'What about the home delivery services in COVID-19 lockdown time?', 'We are giving our best to deliver the groceries on time, but because of Covid-19 rules, the delivery time may delay by a day.', '0', '', '2021-11-08 03:15:30', '2021-11-08 08:45:30', 'GHRFBD1001'),
(3, 'Where do you deliver?', 'At the present time, Grocery Factory delivers only in Faridabad city.', '0', 'admin', '2021-11-08 03:14:38', '2021-11-08 08:44:38', 'GHRFBD1001'),
(4, 'How do I cancel an order?', 'You can cancel an order online within & days of the order placed. You may call +917982607328 for cancellation before the final process (Billing & dispatch) of your order.', '2', 'GHRFBD1001', '2022-02-07 05:12:17', '2022-02-07 10:42:17', 'admin'),
(5, 'Is there any additional charge if I cancel an order?', 'NO, we don\'t charge anything extra.', '0', 'GHRFBD1001', '2021-11-08 08:54:23', '2021-11-08 03:24:23', ''),
(6, 'How do I know what time I will receive my delivery?', 'Our representative will call you before delivery. We aim to deliver your order between 6 am to 9 pm every day of the previous day\'s order.', '0', 'GHRFBD1001', '2021-11-08 08:54:57', '2021-11-08 03:24:57', ''),
(7, 'Are you open every day?', 'We are open 365days and deliver in allotted time every day; exceptional days would be Strikes & Natural calamity.', '0', 'GHRFBD1001', '2021-11-08 08:55:36', '2021-11-08 03:25:36', ''),
(8, 'What do I do if I forget my password?', 'Click the gomores log-in page, click on \"forgot password?\" You will then be given a chance to enter your e-mail/registered phone no. and have sms sent to you for the new password.', '0', 'GHRFBD1001', '2021-11-08 08:56:58', '2021-11-08 03:26:58', ''),
(9, 'What are the modes of payment?', 'Cash on Delivery, Swipe your card on delivery, or Online Payment.', '0', 'GHRFBD1001', '2021-11-08 08:58:28', '2021-11-08 03:28:28', ''),
(10, 'How I will get my money back if I canceled the order?', 'Once you cancel the order, you will get the confirmation mail from Gomores and within 6 - 8 working days your amount will refund in your source account through you did the payment.', '0', 'GHRFBD1001', '2021-11-08 08:59:28', '2021-11-08 03:29:28', ''),
(11, 'Are there any delivery charges or minimum order quantity?', 'Order for Rs.999/- and above are delivered free. We charge nominal delivery charges of Rs.30/- for orders below Rs.999/-.', '0', 'GHRFBD1001', '2021-11-08 09:00:33', '2021-11-08 03:30:33', ''),
(12, 'Can I return the products that are ordered?', 'Yes, you can! You will have 7 days from the time of order placed to return the products. Packed item will be return, open packed item not return or replace.', '0', 'GHRFBD1001', '2021-11-08 09:03:11', '2021-11-08 03:33:11', ''),
(13, 'What About COVID-19 related precautions?fff', 'We take special precautions while packaging and delivery of products and it\'s on our high priority to take all precautions first. we maintain the special distancing while packaging and delivering to users\' doorsteps.', '2', 'GHRFBD1001', '2022-02-07 05:12:23', '2022-02-07 10:42:23', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `v_master_category`
--

CREATE TABLE `v_master_category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL,
  `dop` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0= active, 1 = In active, 2 = Delete',
  `created_by` varchar(25) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(25) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_master_category`
--

INSERT INTO `v_master_category` (`id`, `name`, `url`, `dop`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(20, 'Grocery and Staples', 'grocery', 0, '0', 'GHRFBD1001', '2021-10-29 21:11:01', '', '2021-10-29 15:41:01'),
(21, 'Snacks and Beverages', 'snacks_and_beverages', 0, '0', 'GHRFBD1001', '2021-10-29 21:13:57', '', '2021-10-29 15:43:57'),
(39, 'Packaged  Food', 'packaged_food', 0, '0', 'GHRFBD1001', '2021-10-30 09:32:02', '', '2021-10-30 04:02:02'),
(46, 'Personal, Baby Care', 'personal_care', 0, '0', 'GHRFBD1001', '2021-10-30 09:34:11', '', '2021-10-30 04:04:11'),
(47, 'Household Items', 'household_items', 0, '0', 'GHRFBD1001', '2021-10-30 09:34:32', 'GHRFBD1001', '2021-10-30 19:08:18'),
(52, 'Dairy ,Eggs', 'dairy_items', 0, '0', 'GHRFBD1001', '2021-10-30 09:37:37', 'GHRFBD1001', '2021-11-03 15:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `v_master_city`
--

CREATE TABLE `v_master_city` (
  `id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `tag_name` varchar(10) NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `v_master_city`
--

INSERT INTO `v_master_city` (`id`, `state_id`, `name`, `tag_name`, `status`) VALUES
(505, 31, 'Kanyakumari', 'Kay', '0'),
(504, 31, 'Kanchipuram', 'Kac', '0'),
(503, 31, 'Erode', 'Ero', '0'),
(502, 31, 'Dindigul', 'Did', '0'),
(501, 31, 'Dharmapuri', 'Dhr', '0'),
(500, 31, 'Cuddalore', 'Cua', '0'),
(499, 31, 'Coimbatore', 'Coi', '0'),
(498, 31, 'Chennai', 'Che', '0'),
(497, 31, 'Ariyalur', 'Ari', '0'),
(496, 30, 'West Sikkim', 'Wsi', '0'),
(495, 30, 'South Sikkim', 'Sos', '0'),
(494, 30, 'North Sikkim', 'Nos', '0'),
(493, 30, 'East Sikkim', 'Esi', '0'),
(492, 29, 'Udaipur', 'Udi', '0'),
(491, 29, 'Tonk', 'Ton', '0'),
(490, 29, 'Sirohi', 'Sio', '0'),
(489, 29, 'Sawai Madhopur', 'Saw', '0'),
(488, 29, 'Sikar', 'Sik', '0'),
(487, 29, 'Rajsamand', 'Rrr', '0'),
(486, 29, 'Pratapgarh', 'Prt', '0'),
(485, 29, 'Pali', 'Pai', '0'),
(484, 29, 'Nagaur', 'Naa', '0'),
(483, 29, 'Kota', 'Koa', '0'),
(482, 29, 'Karauli', 'Kaa', '0'),
(481, 29, 'Jhalawar', 'Jhl', '0'),
(480, 29, 'Jaisalmer', 'Jaa', '0'),
(479, 29, 'Jaipur', 'Jap', '0'),
(478, 29, 'Jodhpur', 'Jod', '0'),
(477, 29, 'Jalore', 'Joo', '0'),
(476, 29, 'Jhunjhunu', 'Jhu', '0'),
(475, 29, 'Hanumangarh', 'Han', '0'),
(474, 29, 'Ganganagar', 'Gaa', '0'),
(473, 29, 'Dungapur', 'Dun', '0'),
(472, 29, 'Dholpur', 'Dho', '0'),
(471, 29, 'Dausa', 'Dau', '0'),
(470, 29, 'Chittorgarh', 'Cht', '0'),
(469, 29, 'Churu', 'Chr', '0'),
(468, 29, 'Bhilwara', 'Bhw', '0'),
(467, 29, 'Bundi', 'Bun', '0'),
(466, 29, 'Bara', 'Baa', '0'),
(465, 29, 'Bharatpur', 'Bhh', '0'),
(464, 29, 'Banswara', 'Baw', '0'),
(463, 29, 'Barmer', 'Bam', '0'),
(462, 29, 'Bikaner', 'Bik', '0'),
(461, 29, 'Alwar', 'Alw', '0'),
(460, 29, 'Ajmer', 'Ajm', '0'),
(459, 28, 'Tarn Tara', 'Tar', '0'),
(458, 28, 'Shahid Bhagat Singh Nagar', 'Shb', '0'),
(457, 28, 'Sangrur', 'Sau', '0'),
(456, 28, 'Ajitgarh (Mohali);', 'Aji', '0'),
(455, 28, 'Rupnagar', 'Rup', '0'),
(454, 28, 'Patiala', 'Paa', '0'),
(453, 28, 'Pathankot', 'Pah', '0'),
(452, 28, 'Sri Muktsar Sahib', 'Srm', '0'),
(451, 28, 'Moga', 'Mog', '0'),
(450, 28, 'Mansa', 'Maa', '0'),
(449, 28, 'Ludhiana', 'Lud', '0'),
(448, 28, 'Kapurthala', 'Kap', '0'),
(447, 28, 'Jalandhar', 'Jrr', '0'),
(446, 28, 'Hoshiarpur', 'Hor', '0'),
(445, 28, 'Gurdaspur', 'Gup', '0'),
(444, 28, 'Fazilka', 'Faz', '0'),
(443, 28, 'Fatehgarh Sahib', 'Fas', '0'),
(442, 28, 'Faridkot', 'Fak', '0'),
(441, 28, 'Firozpur', 'Fiz', '0'),
(440, 28, 'Bathinda', 'Bat', '0'),
(439, 28, 'Barnala', 'Bnn', '0'),
(438, 28, 'Amritsar', 'Amt', '0'),
(437, 27, 'Yanam', 'Yan', '0'),
(436, 27, 'Pondicherry', 'Pon', '0'),
(435, 27, 'Mahe', 'Mae', '0'),
(434, 27, 'Karaikal', 'Kak', '0'),
(433, 26, 'Sundergarh', 'Sun', '0'),
(432, 26, 'Subarnapur (Sonepur);', 'Sub', '0'),
(431, 26, 'Sambalpur', 'Suu', '0'),
(430, 26, 'Rayagada', 'Ray', '0'),
(429, 26, 'Puri', 'Pri', '0'),
(428, 26, 'Nayagarh', 'Nay', '0'),
(427, 26, 'Nuapada', 'Nua', '0'),
(426, 26, 'Nabarangpur', 'Nab', '0'),
(425, 26, 'Mayurbhanj', 'May', '0'),
(424, 26, 'Malkangiri', 'Mri', '0'),
(423, 26, 'Kendrapara', 'Krr', '0'),
(422, 26, 'Koraput', 'Kuu', '0'),
(421, 26, 'Kandhamal', 'Kll', '0'),
(420, 26, 'Kalahandi', 'Kal', '0'),
(419, 26, 'Kendujhar (Keonjhar);', 'Kro', '0'),
(418, 26, 'Khordha', 'Kha', '0'),
(417, 26, 'Jagatsinghpur', 'Jag', '0'),
(416, 26, 'Jajpur', 'Jaj', '0'),
(415, 26, 'Jharsuguda', 'Jda', '0'),
(414, 26, 'Gajapati', 'Gaj', '0'),
(413, 26, 'Ganjam', 'Gam', '0'),
(412, 26, 'Dhenkanal', 'Dal', '0'),
(411, 26, 'Debagarh (Deogarh);', 'Deb', '0'),
(410, 26, 'Cuttack', 'Cut', '0'),
(409, 26, 'Balasore', 'Bre', '0'),
(408, 26, 'Bargarh (Baragarh);', 'Bbr', '0'),
(407, 26, 'Balangir', 'Bii', '0'),
(406, 26, 'Bhadrak', 'Bkk', '0'),
(405, 26, 'Boudh (Bauda);', 'Bou', '0'),
(404, 26, 'Angul', 'Ang', '0'),
(403, 25, 'Zunheboto', 'Zun', '0'),
(402, 25, 'Wokha', 'Wok', '0'),
(401, 25, 'Tuensang', 'Tue', '0'),
(400, 25, 'Phek', 'Phe', '0'),
(399, 25, 'Pere', 'Pre', '0'),
(398, 25, 'Mo', 'Mo', '0'),
(397, 25, 'Mokokchung', 'Mok', '0'),
(396, 25, 'Longleng', 'Lon', '0'),
(395, 25, 'Kohima', 'Koh', '0'),
(394, 25, 'Kiphire', 'Kip', '0'),
(393, 25, 'Dimapur', 'Duu', '0'),
(392, 24, 'Serchhip', 'Sip', '0'),
(391, 24, 'Saiha', 'Sai', '0'),
(390, 24, 'Mamit', 'Mam', '0'),
(389, 24, 'Lunglei', 'Lun', '0'),
(388, 24, 'Lawngtlai', 'Law', '0'),
(387, 24, 'Kolasib', 'Kib', '0'),
(386, 24, 'Champhai', 'Cai', '0'),
(385, 24, 'Aizawl', 'Aiz', '0'),
(384, 23, 'West Khasi Hills', 'Wll', '0'),
(383, 23, 'West Garo Hills', 'Wss', '0'),
(382, 23, 'South Garo Hills', 'Sls', '0'),
(381, 23, 'Ri Bhoi', 'Ri', '0'),
(380, 23, 'Jaintia Hills', 'Jls', '0'),
(379, 23, 'East Khasi Hills', 'Ell', '0'),
(378, 23, 'East Garo Hills', 'Ess', '0'),
(377, 22, 'Imphal West', 'Iss', '0'),
(376, 22, 'Ukhrul', 'Ukh', '0'),
(375, 22, 'Thoubal', 'Tal', '0'),
(374, 22, 'Tamenglong', 'Tam', '0'),
(373, 22, 'Senapati', 'Sen', '0'),
(372, 22, 'Imphal East', 'Ist', '0'),
(371, 22, 'Chandel', 'Cel', '0'),
(370, 22, 'Churachandpur', 'Cuu', '0'),
(369, 22, 'Bishnupur', 'Bis', '0'),
(368, 21, 'Yavatmal', 'Yav', '0'),
(367, 21, 'Washim', 'Was', '0'),
(366, 21, 'Wardha', 'Wha', '0'),
(365, 21, 'Thane', 'Tne', '0'),
(364, 21, 'Solapur', 'Stt', '0'),
(363, 21, 'Sindhudurg', 'Srg', '0'),
(362, 21, 'Satara', 'Spp', '0'),
(361, 21, 'Sangli', 'Sqq', '0'),
(360, 21, 'Ratnagiri', 'Rss', '0'),
(359, 21, 'Raigad', 'Rad', '0'),
(358, 21, 'Pune', 'Pun', '0'),
(357, 21, 'Parbhani', 'Par', '0'),
(356, 21, 'Osmanabad', 'Osm', '0'),
(355, 21, 'Nashik', 'Nas', '0'),
(354, 21, 'Nagpur', 'Nuu', '0'),
(353, 21, 'Nandurbar', 'Nar', '0'),
(352, 21, 'Nanded', 'Ned', '0'),
(351, 21, 'Mumbai suburba', 'Mbb', '0'),
(350, 21, 'Mumbai City', 'Mty', '0'),
(349, 21, 'Latur', 'Luu', '0'),
(348, 21, 'Kolhapur', 'Klz', '0'),
(347, 21, 'Jalna', 'Jna', '0'),
(346, 21, 'Jalgao', 'Jao', '0'),
(345, 21, 'Hingoli', 'Hin', '0'),
(344, 21, 'Gondia', 'Gia', '0'),
(343, 21, 'Gadchiroli', 'Gli', '0'),
(342, 21, 'Dhule', 'Dle', '0'),
(341, 21, 'Chandrapur', 'Cuz', '0'),
(340, 21, 'Buldhana', 'Bna', '0'),
(339, 21, 'Bhandara', 'Brz', '0'),
(338, 21, 'Beed', 'Bee', '0'),
(337, 21, 'Aurangabad', 'Aaz', '0'),
(336, 21, 'Amravati', 'Ati', '0'),
(335, 21, 'Akola', 'Ako', '0'),
(334, 21, 'Ahmednagar', 'Aay', '0'),
(333, 20, 'Vidisha', 'Vid', '0'),
(332, 20, 'Umaria', 'Uma', '0'),
(331, 20, 'Ujjai', 'Ujj', '0'),
(330, 20, 'Tikamgarh', 'Tik', '0'),
(329, 20, 'Singrauli', 'Slz', '0'),
(328, 20, 'Sidhi', 'Shz', '0'),
(327, 20, 'Shivpuri', 'Sri', '0'),
(326, 20, 'Sheopur', 'Suz', '0'),
(325, 20, 'Shajapur', 'Suy', '0'),
(324, 20, 'Shahdol', 'Sol', '0'),
(323, 20, 'Seoni', 'Seo', '0'),
(322, 20, 'Sehore', 'Seh', '0'),
(321, 20, 'Satna', 'Sna', '0'),
(320, 20, 'Sagar', 'Sag', '0'),
(319, 20, 'Rewa', 'Rwa', '0'),
(318, 20, 'Ratlam', 'Raz', '0'),
(317, 20, 'Rajgarh', 'Rrz', '0'),
(316, 20, 'Raise', 'Rse', '0'),
(315, 20, 'Panna', 'Pnz', '0'),
(314, 20, 'Neemuch', 'Nee', '0'),
(313, 20, 'Narsinghpur', 'Nuz', '0'),
(312, 20, 'Morena', 'Mna', '0'),
(311, 20, 'Mandsaur', 'Muz', '0'),
(310, 20, 'Mandla', 'Mla', '0'),
(309, 20, 'Khargone (West Nimar)', 'Kse', '0'),
(308, 20, 'Khandwa (East Nimar)', 'Kst', '0'),
(307, 20, 'Katni', 'Kni', '0'),
(306, 20, 'Jhabua', 'Jua', '0'),
(305, 20, 'Jabalpur', 'Jab', '0'),
(304, 20, 'Indore', 'Ind', '0'),
(303, 20, 'Hoshangabad', 'Had', '0'),
(302, 20, 'Harda', 'Hda', '0'),
(301, 20, 'Gwalior', 'Gwa', '0'),
(300, 20, 'Guna', 'Gna', '0'),
(299, 20, 'Dindori', 'Drz', '0'),
(298, 20, 'Dhar', 'Daz', '0'),
(297, 20, 'Dewas', 'Dew', '0'),
(296, 20, 'Datia', 'Dat', '0'),
(295, 20, 'Damoh', 'Doh', '0'),
(294, 20, 'Chhindwara', 'Crz', '0'),
(293, 20, 'Chhatarpur', 'Cuy', '0'),
(292, 20, 'Burhanpur', 'Bur', '0'),
(291, 20, 'Bhopal', 'Baz', '0'),
(290, 20, 'Bhind', 'Bnd', '0'),
(289, 20, 'Betul', 'Bet', '0'),
(288, 20, 'Barwani', 'Bnz', '0'),
(287, 20, 'Balaghat', 'Bay', '0'),
(286, 20, 'Ashok Nagar', 'Ash', '0'),
(285, 20, 'Anuppur', 'Anu', '0'),
(284, 20, 'Alirajpur', 'Auz', '0'),
(283, 20, 'Agar', 'Aga', '0'),
(282, 19, 'Lakshadweep', 'Lep', '0'),
(281, 18, 'Wayanad', 'Way', '0'),
(280, 18, 'Thiruvananthapuram', 'Thi', '0'),
(279, 18, 'Thrissur', 'Thr', '0'),
(278, 18, 'Pathanamthitta', 'Ptz', '0'),
(277, 18, 'Palakkad', 'Pad', '0'),
(276, 18, 'Malappuram', 'Maz', '0'),
(275, 18, 'Kozhikode', 'Koz', '0'),
(274, 18, 'Kottayam', 'Kaz', '0'),
(273, 18, 'Kollam', 'Kax', '0'),
(272, 18, 'Kasaragod', 'Kas', '0'),
(271, 18, 'Kannur', 'Kuz', '0'),
(270, 18, 'Idukki', 'Idu', '0'),
(269, 18, 'Ernakulam', 'Ern', '0'),
(268, 18, 'Alappuzha', 'Ala', '0'),
(267, 17, 'Yadgir', 'Yad', '0'),
(266, 17, 'Ramanagara', 'Rra', '0'),
(265, 17, 'Uttara Kannada', 'Uda', '0'),
(264, 17, 'Udupi', 'Udu', '0'),
(263, 17, 'Tumkur', 'Tum', '0'),
(262, 17, 'Shimoga', 'Sgz', '0'),
(261, 17, 'Raichur', 'Ruz', '0'),
(260, 17, 'Mysore', 'Mys', '0'),
(259, 17, 'Mandya', 'Mya', '0'),
(258, 17, 'Koppal', 'Kop', '0'),
(257, 17, 'Kolar', 'Kaq', '0'),
(256, 17, 'Kodagu', 'Kgu', '0'),
(255, 17, 'Haveri', 'Hav', '0'),
(254, 17, 'Hassa', 'Has', '0'),
(253, 17, 'Gulbarga', 'Gul', '0'),
(252, 17, 'Gadag', 'Gag', '0'),
(251, 17, 'Dakshina Kannada', 'Ddz', '0'),
(250, 17, 'Dharwad', 'Daq', '0'),
(249, 17, 'Davanagere', 'Dav', '0'),
(248, 17, 'Chitradurga', 'Cga', '0'),
(247, 17, 'Chikkaballapur', 'Cur', '0'),
(246, 17, 'Chikkamagaluru', 'Cru', '0'),
(245, 17, 'Chamarajnagar', 'Car', '0'),
(244, 17, 'Bijapur', 'Buz', '0'),
(243, 17, 'Bidar', 'Bid', '0'),
(242, 17, 'Bellary', 'Bry', '0'),
(241, 17, 'Belgaum', 'Bum', '0'),
(240, 17, 'Bangalore Urba', 'Bba', '0'),
(239, 17, 'Bangalore Rural', 'Bal', '0'),
(238, 17, 'Bagalkot', 'Bot', '0'),
(237, 16, 'West Singhbhum', 'Wum', '0'),
(236, 16, 'Simdega', 'Sim', '0'),
(235, 16, 'Seraikela Kharsawa', 'Swa', '0'),
(234, 16, 'Sahibganj', 'Snj', '0'),
(233, 16, 'Ranchi', 'Rhi', '0'),
(232, 16, 'Ramgarh', 'Rrq', '0'),
(231, 16, 'Palamu', 'Pmu', '0'),
(230, 16, 'Pakur', 'Pak', '0'),
(229, 16, 'Lohardaga', 'Lga', '0'),
(228, 16, 'Latehar', 'Lar', '0'),
(227, 16, 'Koderma', 'Kma', '0'),
(226, 16, 'Khunti', 'Khu', '0'),
(225, 16, 'Jamtara', 'Jra', '0'),
(224, 16, 'Hazaribag', 'Haz', '0'),
(223, 16, 'Gumla', 'Gum', '0'),
(222, 16, 'Godda', 'God', '0'),
(221, 16, 'Giridih', 'Gir', '0'),
(220, 16, 'Garhwa', 'Gar', '0'),
(219, 16, 'East Singhbhum', 'Eum', '0'),
(218, 16, 'Dumka', 'Dum', '0'),
(217, 16, 'Dhanbad', 'Dax', '0'),
(216, 16, 'Deoghar', 'Dar', '0'),
(215, 16, 'Chatra', 'Cra', '0'),
(214, 16, 'Bokaro', 'Bok', '0'),
(213, 15, 'Udhampur', 'Uux', '0'),
(212, 15, 'Srinagar', 'Sax', '0'),
(211, 15, 'Shopia', 'Sho', '0'),
(210, 15, 'Samba', 'Sba', '0'),
(209, 15, 'Reasi', 'Rea', '0'),
(208, 15, 'Ramba', 'Rba', '0'),
(207, 15, 'Rajouri', 'Rrx', '0'),
(206, 15, 'Pulwama', 'Pul', '0'),
(205, 15, 'Poonch', 'Poo', '0'),
(204, 15, 'Leh', 'Leh', '0'),
(203, 15, 'Kulgam', 'Kxx', '0'),
(202, 15, 'Kupwara', 'Kup', '0'),
(200, 15, 'Kishtwar', 'Ktz', '0'),
(199, 15, 'Kathua', 'Kua', '0'),
(198, 15, 'Kargil', 'Kil', '0'),
(197, 15, 'Jammu', 'Jmu', '0'),
(196, 15, 'Ganderbal', 'Gal', '0'),
(195, 15, 'Doda', 'Dod', '0'),
(194, 15, 'Baramulla', 'Bla', '0'),
(193, 15, 'Bandipora', 'Brx', '0'),
(192, 15, 'Badgam', 'Bad', '0'),
(191, 15, 'Anantnag', 'Aag', '0'),
(190, 14, 'Una', 'Una', '0'),
(189, 14, 'Sola', 'Slx', '0'),
(188, 14, 'Sirmaur', 'Sux', '0'),
(187, 14, 'Shimla', 'Sla', '0'),
(186, 14, 'Mandi', 'Mdi', '0'),
(185, 14, 'Lahaul and Spiti', 'Lah', '0'),
(184, 14, 'Kullu', 'Klu', '0'),
(183, 14, 'Kinnaur', 'Kin', '0'),
(182, 14, 'Kangra', 'Krx', '0'),
(181, 14, 'Hamirpur', 'Hux', '0'),
(180, 14, 'Chamba', 'Cba', '0'),
(179, 14, 'Bilaspur', 'Buq', '0'),
(178, 13, 'Yamuna Nagar', 'Yam', '0'),
(177, 13, 'Sonipat', 'Saq', '0'),
(176, 13, 'Sirsa', 'Ssq', '0'),
(175, 13, 'Rohtak', 'Rak', '0'),
(174, 13, 'Rewari', 'Rri', '0'),
(173, 13, 'Panipat', 'Pat', '0'),
(172, 13, 'Panchkula', 'Pla', '0'),
(171, 13, 'Palwal', 'Paq', '0'),
(170, 13, 'Mewat', 'Mew', '0'),
(169, 13, 'Mahendragarh', 'Mrh', '0'),
(168, 13, 'Kurukshetra', 'Kra', '0'),
(167, 13, 'Kaithal', 'Kqz', '0'),
(166, 13, 'Karnal', 'Kzq', '0'),
(165, 13, 'Jind', 'Jin', '0'),
(164, 13, 'Jhajjar', 'Jqq', '0'),
(163, 13, 'Hissar', 'His', '0'),
(162, 13, 'Gurgaon', 'Gon', '0'),
(161, 13, 'Fatehabad', 'Fzq', '0'),
(160, 13, 'Faridabad', 'Fqz', '0'),
(159, 13, 'Bhiwani', 'Bni', '0'),
(158, 13, 'Ambala', 'Azz', '0'),
(157, 12, 'Valsad', 'Val', '0'),
(156, 12, 'Vadodara', 'Vad', '0'),
(155, 12, 'Tapi', 'Tap', '0'),
(154, 12, 'Surat', 'Sat', '0'),
(153, 12, 'Surendranagar', 'Szz', '0'),
(152, 12, 'Sabarkantha', 'Sab', '0'),
(151, 12, 'Rajkot', 'Rot', '0'),
(150, 12, 'Porbandar', 'Por', '0'),
(149, 12, 'Panchmahal', 'Pal', '0'),
(148, 12, 'Pata', 'Pta', '0'),
(147, 12, 'Navsari', 'Nav', '0'),
(146, 12, 'Narmada', 'Nzz', '0'),
(145, 12, 'Mehsana', 'Meh', '0'),
(144, 12, 'Kheda', 'Khe', '0'),
(143, 12, 'Kutch', 'Kut', '0'),
(142, 12, 'Junagadh', 'Jun', '0'),
(141, 12, 'Jamnagar', 'Jar', '0'),
(140, 12, 'Gandhinagar', 'Gzz', '0'),
(139, 12, 'Dang', 'Dnz', '0'),
(138, 12, 'Dahod', 'Dah', '0'),
(137, 12, 'Bhavnagar', 'Bzz', '0'),
(136, 12, 'Bharuch', 'Bch', '0'),
(135, 12, 'Banaskantha', 'Bha', '0'),
(134, 12, 'Aravalli', 'Alp', '0'),
(133, 12, 'Anand', 'And', '0'),
(132, 12, 'Amreli', 'Ali', '0'),
(131, 12, 'Ahmedabad', 'Aap', '0'),
(130, 11, 'South Goa', 'Soa', '0'),
(129, 11, 'North Goa', 'Noa', '0'),
(128, 10, 'West Delhi', 'Whi', '0'),
(127, 10, 'South West Delhi', 'Sww', '0'),
(126, 10, 'South Delhi', 'Shw', '0'),
(125, 10, 'North West Delhi', 'Nww', '0'),
(124, 10, 'North East Delhi', 'Nhw', '0'),
(123, 10, 'North Delhi', 'Nhy', '0'),
(122, 10, 'New Delhi', 'New', '0'),
(121, 10, 'East Delhi', 'Ehi', '0'),
(120, 10, 'Central Delhi', 'Cen', '0'),
(119, 9, 'Diu', 'Diu', '0'),
(118, 9, 'Dama', 'Dma', '0'),
(117, 8, 'Dadra and Nagar Haveli', 'Dad', '0'),
(116, 7, 'Surajpur', 'Syy', '0'),
(115, 7, 'Raipur', 'Ruy', '0'),
(114, 7, 'Rajnandgao', 'Rao', '0'),
(113, 7, 'Raigarh', 'Rrh', '0'),
(112, 7, 'Narayanpur', 'Nur', '0'),
(111, 7, 'Mahasamund', 'Mnd', '0'),
(110, 7, 'Kabirdham (formerly Kawardha);', 'Kab', '0'),
(109, 7, 'Kanker', 'Ker', '0'),
(108, 7, 'Koriya', 'Kya', '0'),
(107, 7, 'Korba', 'Kba', '0'),
(106, 7, 'Janjgir-Champa', 'Jan', '0'),
(105, 7, 'Jashpur', 'Jas', '0'),
(104, 7, 'Durg', 'Dur', '0'),
(103, 7, 'Dhamtari', 'Dqz', '0'),
(102, 7, 'Dantewada', 'Dda', '0'),
(101, 7, 'Bilaspur', 'Bqq', '0'),
(100, 7, 'Bijapur', 'Bzq', '0'),
(99, 7, 'Bastar', 'Bwz', '0'),
(98, 6, 'Chandigarh', 'Crh', '0'),
(97, 5, 'West Champara', 'Wqq', '0'),
(96, 5, 'Vaishali', 'Vai', '0'),
(95, 5, 'Supaul', 'Sup', '0'),
(94, 5, 'Siwa', 'Siw', '0'),
(93, 5, 'Sitamarhi', 'Shi', '0'),
(92, 5, 'Sheohar', 'Szq', '0'),
(91, 5, 'Sheikhpura', 'Swz', '0'),
(90, 5, 'Sara', 'Sar', '0'),
(89, 5, 'Samastipur', 'Szw', '0'),
(88, 5, 'Saharsa', 'Ssa', '0'),
(87, 5, 'Rohtas', 'Ras', '0'),
(86, 5, 'Purnia', 'Pzq', '0'),
(85, 5, 'Patna', 'Pna', '0'),
(84, 5, 'Nawada', 'Naw', '0'),
(83, 5, 'Nalanda', 'Nwz', '0'),
(82, 5, 'Muzaffarpur', 'Mzq', '0'),
(81, 5, 'Munger', 'Mun', '0'),
(80, 5, 'Madhubani', 'Mni', '0'),
(79, 5, 'Madhepura', 'Mra', '0'),
(78, 5, 'Lakhisarai', 'Lai', '0'),
(77, 5, 'Kishanganj', 'Kze', '0'),
(76, 5, 'Khagaria', 'Kia', '0'),
(75, 5, 'Katihar', 'Kzt', '0'),
(74, 5, 'Kaimur', 'Kzu', '0'),
(73, 5, 'Jehanabad', 'Jeh', '0'),
(72, 5, 'Jamui', 'Jui', '0'),
(71, 5, 'Gopalganj', 'Gop', '0'),
(70, 5, 'Gaya', 'Gay', '0'),
(69, 5, 'East Champara', 'Era', '0'),
(68, 5, 'Darbhanga', 'Dga', '0'),
(67, 5, 'Buxar', 'Bux', '0'),
(66, 5, 'Bhojpur', 'Bzg', '0'),
(65, 5, 'Bhagalpur', 'Bzh', '0'),
(64, 5, 'Begusarai', 'Beg', '0'),
(63, 5, 'Banka', 'Bka', '0'),
(62, 5, 'Aurangabad', 'Aad', '0'),
(61, 5, 'Arwal', 'Arw', '0'),
(60, 5, 'Araria', 'Aia', '0'),
(59, 4, 'Udalguri', 'Uzn', '0'),
(58, 4, 'Tinsukia', 'Tin', '0'),
(57, 4, 'Sonitpur', 'Sur', '0'),
(56, 4, 'Sivasagar', 'Szm', '0'),
(55, 4, 'Nalbari', 'Nri', '0'),
(54, 4, 'Nagao', 'Nao', '0'),
(53, 4, 'Morigao', 'Mao', '0'),
(52, 4, 'Lakhimpur', 'Lur', '0'),
(51, 4, 'Kokrajhar', 'Kok', '0'),
(50, 4, 'Karimganj', 'Knj', '0'),
(49, 4, 'Karbi Anglong', 'Kzm', '0'),
(48, 4, 'Kamrup Metropolita', 'Kzp', '0'),
(47, 4, 'Kamrup', 'Kzl', '0'),
(46, 4, 'Jorhat', 'Jor', '0'),
(45, 4, 'Hailakandi', 'Hai', '0'),
(44, 4, 'Golaghat', 'Gol', '0'),
(43, 4, 'Goalpara', 'Goa', '0'),
(42, 4, 'Dibrugarh', 'Drh', '0'),
(41, 4, 'Dhubri', 'Dri', '0'),
(40, 4, 'Dima Hasao', 'Dao', '0'),
(39, 4, 'Dhemaji', 'Dji', '0'),
(38, 4, 'Darrang', 'Dzl', '0'),
(37, 4, 'Chirang', 'Czl', '0'),
(36, 4, 'Cachar', 'Cac', '0'),
(35, 4, 'Bongaigao', 'Bon', '0'),
(34, 4, 'Barpeta', 'Bta', '0'),
(33, 4, 'Baksa', 'Bak', '0'),
(32, 3, 'West Siang', 'Wgn', '0'),
(31, 3, 'West Kameng', 'Wng', '0'),
(30, 3, 'Upper Subansiri', 'Uri', '0'),
(29, 3, 'Upper Siang', 'Ung', '0'),
(28, 3, 'Dibang Valley', 'Dey', '0'),
(27, 3, 'Tirap', 'Tzu', '0'),
(26, 3, 'Tawang', 'Taw', '0'),
(25, 3, 'Papum Pare', 'Pap', '0'),
(24, 3, 'Lower Subansiri', 'Luh', '0'),
(23, 3, 'Lower Dibang Valley', 'Ley', '0'),
(22, 3, 'Lohit', 'Lit', '0'),
(21, 3, 'Kurung Kumey', 'Key', '0'),
(20, 3, 'East Kameng', 'Egn', '0'),
(19, 3, 'East Siang', 'Eng', '0'),
(18, 3, 'Changlang', 'Cng', '0'),
(17, 3, 'Anjaw', 'Anj', '0'),
(16, 2, 'Cudappah', 'Cah', '0'),
(15, 2, 'West Godavari', 'Wri', '0'),
(14, 2, 'Vizianagaram', 'Viz', '0'),
(13, 2, 'Vishakhapatnam', 'Vis', '0'),
(12, 2, 'Sri Potti Sri Ramulu Nellore', 'Sre', '0'),
(11, 2, 'Srikakulam', 'Sam', '0'),
(10, 2, 'Prakasam', 'Pam', '0'),
(9, 2, 'Kurnool', 'Kol', '0'),
(8, 2, 'Krishna', 'Kna', '0'),
(7, 2, 'Guntur', 'Gzm', '0'),
(6, 2, 'East Godavari', 'Eri', '0'),
(5, 2, 'Chittoor', 'Cor', '0'),
(4, 2, 'Anantapur', 'Aur', '0'),
(3, 1, 'Nicobar', 'Nic', '0'),
(2, 1, 'South Andama', 'Sma', '0'),
(1, 1, 'North and Middle Andama', 'Nma', '0'),
(506, 31, 'Karur', 'Kur', '0'),
(507, 31, 'Krishnagiri', 'Kri', '0'),
(508, 31, 'Madurai', 'Mzm', '0'),
(509, 31, 'Nagapattinam', 'Nzm', '0'),
(510, 31, 'Nilgiris', 'Nil', '0'),
(511, 31, 'Namakkal', 'Nam', '0'),
(512, 31, 'Perambalur', 'Pmm', '0'),
(513, 31, 'Pudukkottai', 'Pud', '0'),
(514, 31, 'Ramanathapuram', 'Ram', '0'),
(515, 31, 'Salem', 'Sal', '0'),
(516, 31, 'Sivaganga', 'Sga', '0'),
(517, 31, 'Tirupur', 'Tzm', '0'),
(518, 31, 'Tiruchirappalli', 'Tpp', '0'),
(519, 31, 'Theni', 'The', '0'),
(520, 31, 'Tirunelveli', 'Tli', '0'),
(521, 31, 'Thanjavur', 'Tza', '0'),
(522, 31, 'Thoothukudi', 'Tdi', '0'),
(523, 31, 'Tiruvallur', 'Tll', '0'),
(524, 31, 'Tiruvarur', 'Tur', '0'),
(525, 31, 'Tiruvannamalai', 'Tai', '0'),
(526, 31, 'Vellore', 'Vel', '0'),
(527, 31, 'Viluppuram', 'Vil', '0'),
(528, 31, 'Virudhunagar', 'Vir', '0'),
(529, 32, 'Adilabad', 'Adi', '0'),
(530, 32, 'Hyderabad', 'Hyd', '0'),
(531, 32, 'Karimnagar', 'Kar', '0'),
(532, 32, 'Khammam', 'Kam', '0'),
(533, 32, 'Mahbubnagar', 'Mzw', '0'),
(534, 32, 'Medak', 'Med', '0'),
(535, 32, 'Nalgonda', 'Nda', '0'),
(536, 32, 'Nizamabad', 'Niz', '0'),
(537, 32, 'Ranga Reddy', 'Rdy', '0'),
(538, 32, 'Warangal', 'Wal', '0'),
(539, 33, 'Dhalai', 'Dai', '0'),
(540, 33, 'North Tripura', 'Nra', '0'),
(541, 33, 'South Tripura', 'Szp', '0'),
(542, 33, 'Khowai', 'Kai', '0'),
(543, 33, 'West Tripura', 'Wra', '0'),
(544, 35, 'Agra', 'Agr', '0'),
(545, 35, 'Aligarh', 'Arh', '0'),
(546, 35, 'Allahabad', 'All', '0'),
(547, 35, 'Ambedkar Nagar', 'Aar', '0'),
(548, 35, 'Auraiya', 'Aya', '0'),
(549, 35, 'Azamgarh', 'Aza', '0'),
(550, 35, 'Bagpat', 'Bza', '0'),
(551, 35, 'Bahraich', 'Bah', '0'),
(552, 35, 'Ballia', 'Bia', '0'),
(553, 35, 'Balrampur', 'Bzu', '0'),
(554, 35, 'Banda', 'Bda', '0'),
(555, 35, 'Barabanki', 'Bki', '0'),
(556, 35, 'Bareilly', 'Bly', '0'),
(557, 35, 'Basti', 'Bti', '0'),
(558, 35, 'Bijnor', 'Bor', '0'),
(559, 35, 'Budau', 'Bud', '0'),
(560, 35, 'Bulandshahr', 'Bhr', '0'),
(561, 35, 'Chandauli', 'Cza', '0'),
(562, 35, 'Amethi (Chhatrapati Shahuji Maharaj Nagar)', 'Ame', '0'),
(563, 35, 'Chitrakoot', 'Cot', '0'),
(564, 35, 'Deoria', 'Dia', '0'),
(565, 35, 'Etah', 'Eor', '0'),
(566, 35, 'Etawah', 'Eah', '0'),
(567, 35, 'Faizabad', 'Fai', '0'),
(568, 35, 'Farrukhabad', 'Frr', '0'),
(569, 35, 'Fatehpur', 'Fur', '0'),
(570, 35, 'Firozabad', 'Fad', '0'),
(571, 35, 'Gautam Buddh Nagar', 'Gau', '0'),
(572, 35, 'Ghaziabad', 'Gad', '0'),
(573, 35, 'Ghazipur', 'Gur', '0'),
(574, 35, 'Gonda', 'Gda', '0'),
(575, 35, 'Gorakhpur', 'Gor', '0'),
(576, 35, 'Hamirpur', 'Hur', '0'),
(577, 35, 'Hardoi', 'Hoi', '0'),
(578, 35, 'Hathras (Mahamaya Nagar);', 'Hat', '0'),
(579, 35, 'Jalau', 'Jza', '0'),
(580, 35, 'Jaunpur', 'Jau', '0'),
(581, 35, 'Jhansi', 'Jsi', '0'),
(582, 35, 'Jyotiba Phule Nagar', 'Jyo', '0'),
(583, 35, 'Kannauj', 'Kuj', '0'),
(584, 35, 'Kanpur Dehat (Ramabai Nagar);', 'Kht', '0'),
(585, 35, 'Kanpur Nagar', 'Kng', '0'),
(586, 35, 'Kanshi Ram Nagar', 'Kss', '0'),
(587, 35, 'Kaushambi', 'Kau', '0'),
(588, 35, 'Kushinagar', 'Kus', '0'),
(589, 35, 'Lakhimpur Kheri', 'Lri', '0'),
(590, 35, 'Lalitpur', 'Lal', '0'),
(591, 35, 'Lucknow', 'Luc', '0'),
(592, 35, 'Maharajganj', 'Mnj', '0'),
(593, 35, 'Mahoba', 'Mba', '0'),
(594, 35, 'Mainpuri', 'Mai', '0'),
(595, 35, 'Mathura', 'Mat', '0'),
(596, 35, 'Mau', 'Mau', '0'),
(597, 35, 'Meerut', 'Mee', '0'),
(598, 35, 'Mirzapur', 'Mir', '0'),
(599, 35, 'Moradabad', 'Mad', '0'),
(600, 35, 'Muzaffarnagar', 'Mar', '0'),
(601, 35, 'Panchsheel Nagar (Hapur);', 'Pee', '0'),
(602, 35, 'Pilibhit', 'Pil', '0'),
(603, 35, 'Pratapgarh', 'Prh', '0'),
(604, 35, 'Raebareli', 'Rae', '0'),
(605, 35, 'Rampur', 'Rur', '0'),
(606, 35, 'Saharanpur', 'Szv', '0'),
(607, 35, 'Sambhal(Bheem Nagar);', 'Sbh', '0'),
(608, 35, 'Sant Kabir Nagar', 'Svi', '0'),
(609, 35, 'Sant Ravidas Nagar', 'Szn', '0'),
(610, 35, 'Shahjahanpur', 'Szf', '0'),
(611, 35, 'Shamli', 'Sli', '0'),
(612, 35, 'Shravasti', 'Shr', '0'),
(613, 35, 'Siddharthnagar', 'Sth', '0'),
(614, 35, 'Sitapur', 'Sta', '0'),
(615, 35, 'Sonbhadra', 'Sra', '0'),
(616, 35, 'Sultanpur', 'Sul', '0'),
(617, 35, 'Unnao', 'Unn', '0'),
(618, 35, 'Varanasi', 'Var', '0'),
(619, 34, 'Almora', 'Alm', '0'),
(620, 34, 'Bageshwar', 'Bar', '0'),
(621, 34, 'Chamoli', 'Cli', '0'),
(622, 34, 'Champawat', 'Cat', '0'),
(623, 34, 'Dehradu', 'Deh', '0'),
(624, 34, 'Haridwar', 'Har', '0'),
(625, 34, 'Nainital', 'Nai', '0'),
(626, 34, 'Pauri Garhwal', 'Pau', '0'),
(627, 34, 'Pithoragarh', 'Pit', '0'),
(628, 34, 'Rudraprayag', 'Rud', '0'),
(629, 34, 'Tehri Garhwal', 'Teh', '0'),
(630, 34, 'Udham Singh Nagar', 'Uar', '0'),
(631, 34, 'Uttarkashi', 'Uhi', '0'),
(632, 36, 'Bankura', 'Bra', '0'),
(633, 36, 'Bardhama', 'Bma', '0'),
(634, 36, 'Birbhum', 'Bir', '0'),
(635, 36, 'Cooch Behar', 'Coo', '0'),
(636, 36, 'Dakshin Dinajpur', 'Duz', '0'),
(637, 36, 'Darjeeling', 'Dng', '0'),
(638, 36, 'Hooghly', 'Hoo', '0'),
(639, 36, 'Howrah', 'How', '0'),
(640, 36, 'Jalpaiguri', 'Jri', '0'),
(641, 36, 'Kolkata', 'Kta', '0'),
(642, 36, 'Maldah', 'Mah', '0'),
(643, 36, 'Murshidabad', 'Mur', '0'),
(644, 36, 'Nadia', 'Nad', '0'),
(645, 36, 'North 24 Parganas', 'Nzg', '0'),
(646, 36, 'Paschim Medinipur', 'Pas', '0'),
(647, 36, 'Purba Medinipur', 'Pur', '0'),
(648, 36, 'Purulia', 'Pia', '0'),
(649, 36, 'South 24 Parganas', 'Sas', '0'),
(650, 36, 'Uttar Dinajpur', 'Uur', '0');

-- --------------------------------------------------------

--
-- Table structure for table `v_master_state`
--

CREATE TABLE `v_master_state` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `tag_name` varchar(10) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `v_master_state`
--

INSERT INTO `v_master_state` (`id`, `name`, `tag_name`, `status`) VALUES
(23, 'Meghalaya', 'MG', '0'),
(22, 'Manipur', 'MN', '0'),
(21, 'Maharashtra', 'MH', '0'),
(20, 'Madhya Pradesh', 'MP', '0'),
(19, 'Lakshadweep (UT)', 'LK', '0'),
(18, 'Kerala', 'KE', '0'),
(17, 'Karnataka', 'KR', '0'),
(16, 'Jharkhand', 'JH', '0'),
(15, 'Jammu and Kashmir', 'JK', '0'),
(14, 'Himachal Pradesh', 'HP', '0'),
(13, 'Haryana', 'HR', '0'),
(12, 'Gujarat', 'GU', '0'),
(11, 'Goa', 'GA', '0'),
(10, 'Delhi (NCT)', 'DL', '0'),
(9, 'Daman and Diu (UT)', 'DD', '0'),
(8, 'Dadra and Nagar Haveli (UT)', 'DN', '0'),
(7, 'Chhattisgarh', 'CT', '0'),
(6, 'Chandigarh (UT)', 'CH', '0'),
(5, 'Bihar', 'BI', '0'),
(4, 'Assam', 'AS', '0'),
(3, 'Arunachal Pradesh', 'AR', '0'),
(2, 'Andhra Pradesh', 'AP', '0'),
(1, 'Andaman and Nicobar Island (UT)', 'AN', '0'),
(24, 'Mizoram', 'MZ', '0'),
(25, 'Nagaland', 'NG', '0'),
(26, 'Odisha', 'OD', '0'),
(27, 'Puducherry (UT)', 'PU', '0'),
(28, 'Punjab', 'PN', '0'),
(29, 'Rajastha', 'RJ', '0'),
(30, 'Sikkim', 'SK', '0'),
(31, 'Tamil Nadu', 'TN', '0'),
(32, 'Telangana', 'TE', '0'),
(33, 'Tripura', 'TR', '0'),
(34, 'Uttarakhand', 'UT', '0'),
(35, 'Uttar Pradesh', 'UP', '0'),
(36, 'West Bengal', 'WB', '0');

-- --------------------------------------------------------

--
-- Table structure for table `v_master_sub_category`
--

CREATE TABLE `v_master_sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(25) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_master_sub_category`
--

INSERT INTO `v_master_sub_category` (`id`, `category_id`, `name`, `url`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(48, 20, 'Dals , Pulses , Others', 'dals', '0', 'GHRFBD1001', '2021-10-30 09:47:06', 'GHRFBD1001', '2021-11-28 18:34:29'),
(49, 20, 'Ghee , Oils', 'ghee_Oils', '0', 'GHRFBD1001', '2021-10-30 09:48:03', 'GHRFBD1001', '2021-11-03 15:34:58'),
(50, 20, 'Atta , Flours', 'atta_flours', '0', 'GHRFBD1001', '2021-10-30 09:48:45', 'GHRFBD1001', '2021-10-30 09:53:11'),
(51, 20, 'Masalas Spices', 'msalas_spices', '0', 'GHRFBD1001', '2021-10-30 09:49:17', 'admin', '2021-10-31 09:52:48'),
(52, 20, 'Rice , Rice Products', 'rice_product', '0', 'GHRFBD1001', '2021-10-30 09:49:56', 'GHRFBD1001', '2021-11-03 15:35:36'),
(53, 20, 'Sugar , Salt', 'sugar_salt', '0', 'GHRFBD1001', '2021-10-30 09:51:53', 'GHRFBD1001', '2021-11-03 15:36:04'),
(54, 21, 'Chips , Namkeen , Snacks', 'chipsnamkeensnacks', '0', 'GHRFBD1001', '2021-10-30 10:11:18', 'GHRFBD1001', '2021-11-03 15:36:25'),
(55, 21, 'Tea', 'tea', '0', 'GHRFBD1001', '2021-10-30 10:12:23', 'GHRFBD1001', '2021-10-30 10:19:17'),
(56, 21, 'Coffee', 'coffee', '0', 'GHRFBD1001', '2021-10-30 10:12:45', 'GHRFBD1001', '2021-10-30 10:19:25'),
(57, 21, 'Juices', 'juices', '0', 'GHRFBD1001', '2021-10-30 10:13:10', 'GHRFBD1001', '2021-10-30 10:19:06'),
(58, 21, 'Health , Drink , Mix', 'health_drink_mix', '0', 'GHRFBD1001', '2021-10-30 10:15:16', 'GHRFBD1001', '2021-11-03 15:36:54'),
(59, 21, 'Soft Drinks', 'soft_drinks', '0', 'GHRFBD1001', '2021-10-30 10:16:53', 'GHRFBD1001', '2021-10-30 10:19:00'),
(60, 21, 'Biscuits , Others', 'biscuits', '0', 'GHRFBD1001', '2021-10-30 10:18:42', 'GHRFBD1001', '2021-11-29 14:15:25'),
(61, 39, 'Noodles , Pasta', 'noodles', '0', 'GHRFBD1001', '2021-10-30 12:20:41', 'GHRFBD1001', '2021-11-03 15:37:18'),
(62, 39, 'Breakfast , Cereals', 'breakfast_cereals', '0', 'GHRFBD1001', '2021-10-30 12:21:47', 'GHRFBD1001', '2021-11-03 15:37:37'),
(63, 39, 'Jams , Honey', 'jams_honey', '0', 'GHRFBD1001', '2021-10-30 12:27:57', '', '0000-00-00 00:00:00'),
(64, 39, 'Ketchups , Spreads', 'ketchups_spreads', '0', 'GHRFBD1001', '2021-10-30 12:29:21', '', '0000-00-00 00:00:00'),
(65, 39, 'Pickles , Chutney', 'pickles_chutney', '0', 'GHRFBD1001', '2021-10-30 12:31:12', '', '0000-00-00 00:00:00'),
(66, 46, 'Hair Care', 'hair_care', '0', 'GHRFBD1001', '2021-10-30 12:35:31', '', '0000-00-00 00:00:00'),
(67, 46, 'Oral Care', 'oral_care', '0', 'GHRFBD1001', '2021-10-30 12:37:11', '', '0000-00-00 00:00:00'),
(68, 46, 'Deos , Perfums , talc', 'deos_perfums_talc', '0', 'GHRFBD1001', '2021-10-30 12:38:50', 'GHRFBD1001', '2021-11-03 15:38:14'),
(69, 46, 'Creams , Lotions , Skin Care', 'creams_lotions_skin_care', '0', 'GHRFBD1001', '2021-10-30 12:39:56', '', '0000-00-00 00:00:00'),
(70, 46, 'Baby Food', 'baby_food', '0', 'GHRFBD1001', '2021-10-30 12:40:28', 'GHRFBD1001', '2021-10-30 12:42:15'),
(71, 46, 'Baby Bath , Baby Skin Care , O', 'Baby_Bath_BabySkin_care', '0', 'GHRFBD1001', '2021-10-30 12:40:57', 'GHRFBD1001', '2021-12-04 13:31:52'),
(72, 47, 'Utensil Cleaner', 'Utensil Cleaner', '0', 'GHRFBD1001', '2021-10-30 12:43:42', '', '0000-00-00 00:00:00'),
(73, 47, 'Floor  , Other Cleaners', 'Floor_other_cleaners', '0', 'GHRFBD1001', '2021-10-30 12:44:44', 'GHRFBD1001', '2021-10-30 12:46:24'),
(75, 47, 'Repellants , Freshners', 'repellants_freshners', '0', 'GHRFBD1001', '2021-10-30 12:48:09', '', '0000-00-00 00:00:00'),
(76, 47, 'Pooja Needs', 'pooja_needs', '0', 'GHRFBD1001', '2021-10-30 12:49:16', '', '0000-00-00 00:00:00'),
(77, 47, 'Shoe Care', 'shoe_care', '0', 'GHRFBD1001', '2021-10-30 12:50:00', 'GHRFBD1001', '2021-10-30 12:51:12'),
(81, 52, 'Eggs', 'Eggs', '0', 'GHRFBD1001', '2021-10-30 12:53:24', '', '0000-00-00 00:00:00'),
(82, 52, 'Butter Curd', 'butter_Curd', '0', 'GHRFBD1001', '2021-10-30 12:54:17', '', '0000-00-00 00:00:00'),
(83, 52, 'Paneer', 'paneer', '0', 'GHRFBD1001', '2021-10-30 12:54:31', 'GHRFBD1001', '2021-10-30 16:01:13'),
(84, 52, 'Cheese', 'cheese', '0', 'GHRFBD1001', '2021-10-30 16:02:21', '', '0000-00-00 00:00:00'),
(85, 46, 'Soaps , BodyWash', 'soaps_BodyWash', '0', 'GHRFBD1001', '2021-10-30 18:49:23', 'GHRFBD1001', '2021-11-03 15:38:37'),
(86, 47, 'Detergent , Laundry', 'detergent_laundry', '0', 'GHRFBD1001', '2021-10-30 18:53:06', 'GHRFBD1001', '2021-10-30 19:47:39'),
(99, 21, 'Chocolates , Candies', 'Chocolates', '0', 'GHRFBD1001', '2021-11-26 18:24:52', 'GHRFBD1001', '2021-11-28 15:38:03'),
(100, 46, 'Health Care', 'Healthcare', '0', 'GHRFBD1001', '2021-11-28 16:44:56', '', '0000-00-00 00:00:00'),
(101, 20, 'Dry Fruits , Nuts', 'Dry_Fruits', '0', 'GHRFBD1001', '2021-12-03 16:56:54', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `v_menu`
--

CREATE TABLE `v_menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(40) NOT NULL,
  `url` varchar(50) NOT NULL,
  `parent_url` varchar(30) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `parent_id` int(11) NOT NULL,
  `parent` enum('0','1') NOT NULL,
  `icon` varchar(50) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(25) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_menu`
--

INSERT INTO `v_menu` (`id`, `menu_name`, `url`, `parent_url`, `status`, `parent_id`, `parent`, `icon`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'Dashboard', '', 'dashboard', '0', 0, '0', 'home', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(2, 'Vendors', '', 'vendor', '0', 0, '0', 'users', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(3, 'Users', '', 'user', '0', 0, '0', 'user', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(4, 'Products', '', 'product', '0', 0, '0', 'copy', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(5, 'Carts', '', 'cart', '0', 0, '0', 'color-sampler', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(6, 'Vendor List', 'dashboard/vendor_list', '0', '0', 2, '1', 'history', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(7, 'Vendor Shop List', 'dashboard/vendor_shop_list', '0', '0', 2, '1', 'gift', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(8, 'User List', 'dashboard/user_list', '0', '0', 3, '1', 'copy', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(9, 'Product List', 'dashboard/product_list', '0', '0', 4, '1', 'database', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(10, 'Cart List', 'dashboard/cart_list', '0', '0', 5, '1', 'road', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(12, 'Product Image', 'dashboard/product_image', '0', '0', 4, '1', 'bookmark', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(13, 'Product Order', 'dashboard/product_order', '0', '0', 4, '1', 'copy', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(14, 'Product Review', 'dashboard/product_review', '0', '0', 4, '1', 'briefcase', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(15, 'Vendor Review', 'dashboard/vendor_review', '0', '0', 2, '1', 'copy', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(16, 'Vendor Account Details', 'dashboard/vendor_account_detail', '0', '0', 2, '1', 'pencil', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(17, 'Master Category', 'dashboard/master_category', '0', '0', 21, '1', 'copy', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(18, 'Master Sub Category', 'dashboard/master_sub_category', '0', '0', 21, '1', 'book', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(19, 'Menu', 'dashboard/vendor_menu', '0', '0', 21, '1', 'coffee', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(20, 'OTP', 'dashboard/vendor_otp', '0', '0', 21, '1', 'envelope', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(21, 'Admin Tools', '', 'tools', '0', 0, '0', 'cog', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(22, 'Pages', 'dashboard/pages', '0', '0', 1, '1', 'pencil', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(23, 'Faq', 'dashboard/faq', '0', '0', 1, '1', 'coffee', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(24, 'Enquiry', 'dashboard/enquiry', '0', '0', 1, '1', 'envelope', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(25, 'Complain', 'dashboard/complain', '0', '0', 1, '1', 'briefcase', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(26, 'Contact', 'dashboard/contact', '0', '0', 1, '1', 'bookmark', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(27, 'Shop Image', 'dashboard/vendor_image', '0', '0', 2, '1', 'bookmark', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(28, 'Banner', 'dashboard/banner', '0', '0', 1, '1', 'users', 'GHRFBD1001', '2021-01-06 23:57:42', 'GHRFBD1001', '2021-01-07 20:46:54'),
(30, 'User Order', 'dashboard/user_order', '0', '0', 3, '1', 'gift', 'GHRFBD1001', '2021-01-09 19:12:47', '', '2021-01-09 13:42:47'),
(31, 'Product Review', 'dashboard/product_review', '0', '0', 3, '0', 'road', 'GHRFBD1001', '2021-01-09 19:13:52', '', '2021-01-09 13:43:52'),
(32, 'Party', 'dashboard/party', '0', '0', 1, '1', 'pencil', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22'),
(33, 'Sale Report', 'dashboard/sale_report', '0', '0', 1, '1', 'pencil', '', '2021-01-06 18:27:22', '', '2021-01-06 18:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `v_mobile_blocked`
--

CREATE TABLE `v_mobile_blocked` (
  `id` int(11) NOT NULL,
  `status` enum('Blocked','Un-blocked') NOT NULL DEFAULT 'Blocked',
  `mobile_no` varchar(100) NOT NULL,
  `created_ip` varchar(30) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_mobile_blocked`
--

INSERT INTO `v_mobile_blocked` (`id`, `status`, `mobile_no`, `created_ip`, `created_on`, `created_by`) VALUES
(1, 'Blocked', '7042205444', '', '2021-10-16 12:26:22', 'admin'),
(5, 'Un-blocked', '7042205441', '', '2021-10-23 11:51:35', 'admin'),
(6, 'Un-blocked', '8076995929', '', '2021-10-25 09:27:24', 'admin'),
(11, 'Un-blocked', '7042205441', '', '2022-02-01 23:50:16', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `v_order`
--

CREATE TABLE `v_order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(16) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `size_id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` enum('0','2') NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `created_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_order`
--

INSERT INTO `v_order` (`id`, `order_id`, `product_id`, `size_id`, `user_id`, `quantity`, `status`, `created_on`, `created_by`, `created_ip`) VALUES
(139, '974120276', 'G1031814682', 0, 'G374808', 1, '0', '2021-10-01 21:55:22', 'admin', ''),
(156, '182293670', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-03 21:26:57', 'admin', ''),
(157, '1318548312', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-03 23:23:53', 'admin', ''),
(158, '995328611', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-04 10:01:41', 'admin', ''),
(159, '271444016', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-05 11:46:16', 'admin', ''),
(160, '633688824', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-07 18:57:51', 'admin', ''),
(161, '557142097', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-07 19:03:32', 'admin', ''),
(162, '700581611', 'G0132222745', 0, 'G213634', 1, '0', '2021-10-09 12:16:07', 'admin', ''),
(163, '485366012', 'G0132222745', 0, 'G213634', 1, '0', '2021-10-09 12:38:52', 'admin', ''),
(164, '1420394478', 'G0132222745', 0, 'G213634', 1, '0', '2021-10-09 12:55:30', 'admin', ''),
(165, '863398384', 'G0132222745', 0, 'G213634', 1, '0', '2021-10-09 13:14:00', 'admin', ''),
(166, '957447405', 'G1031814682', 0, 'G213634', 2, '0', '2021-10-09 16:02:25', 'admin', ''),
(167, '1990994485', 'G0132222745', 0, 'G213634', 1, '0', '2021-10-09 16:16:51', 'admin', ''),
(169, '412676523', 'G0132222745', 0, 'G213634', 1, '0', '2021-10-09 20:00:33', 'admin', ''),
(170, '1533917862', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-11 09:26:51', 'admin', ''),
(174, 's7kIO6B8uPbJ', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-11 11:46:06', 'admin', ''),
(175, 'eygkls2rHQOC', 'G0132222745', 0, 'G374808', 2, '0', '2021-10-11 11:48:58', 'admin', ''),
(176, 'dhIHRPoYjnZ8', 'G0132222745', 0, 'G374808', 2, '0', '2021-10-11 11:50:38', 'admin', ''),
(177, '4SNEV0OiYZ1J', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-11 11:54:26', 'admin', ''),
(178, '358sexXurZQy', 'G1031353470', 0, 'G374808', 1, '0', '2021-10-11 12:46:03', 'admin', ''),
(179, '358sexXurZQy', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-11 12:46:03', 'admin', ''),
(183, 'aIxOs07qvyhX', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-11 18:03:42', 'admin', ''),
(184, 'Ean3etcZHArO', 'G0132222745', 0, 'G374808', 2, '0', '2021-10-11 18:05:01', 'admin', ''),
(185, '3JpkrKNE4YBc', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-11 18:05:38', 'admin', ''),
(189, 'cOUohNw9SExL', 'G0132222745', 0, 'G763743', 1, '0', '2021-10-05 11:48:37', 'admin', ''),
(190, 'ry6XdnRa3zG9', 'G0132222745', 0, 'G763743', 1, '0', '2021-10-12 07:33:49', 'admin', ''),
(191, 'ry6XdnRa3zG9', 'G1031353470', 0, 'G763743', 1, '0', '2021-10-12 08:33:49', 'admin', ''),
(192, 'n09G4pic8O2U', 'G1031353470', 0, 'G763743', 1, '0', '2021-10-06 12:40:50', 'admin', ''),
(193, 'n09G4pic8O2U', 'G0132222745', 0, 'G763743', 1, '0', '2021-10-12 12:40:50', 'admin', ''),
(194, 'PrZR3kvdpIo9', 'G0132222745', 0, 'G763743', 1, '0', '2021-10-12 12:46:12', 'admin', ''),
(195, 'lVhWnJUEXDvx', 'G1031353470', 0, 'G763743', 1, '0', '2021-10-07 12:47:20', 'admin', ''),
(196, 'lVhWnJUEXDvx', 'G0132222745', 0, 'G763743', 1, '0', '2021-10-12 16:47:20', 'admin', ''),
(197, 'GPi5OuMCTVar', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-12 13:58:10', 'admin', ''),
(198, 'edYown2W9cJv', 'G0132222745', 0, 'G763743', 1, '0', '2021-10-12 16:02:57', 'admin', ''),
(199, 'Zqf7xAvLU8El', 'G0132222745', 0, 'G763743', 1, '0', '2021-10-12 21:55:34', 'admin', ''),
(200, 'SxbDzRPyNlCX', 'G1031335093', 0, 'G374808', 1, '0', '2021-10-14 17:22:37', 'admin', ''),
(201, 'Si2fw6mo9xAF', 'G1031335093', 0, 'G374808', 1, '0', '2021-10-14 17:29:01', 'admin', ''),
(202, 'KuoCTBG428Ok', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-15 16:07:37', 'admin', ''),
(203, 'KuoCTBG428Ok', 'G1031814682', 0, 'G374808', 1, '0', '2021-10-15 16:07:37', 'admin', ''),
(204, 'KuoCTBG428Ok', 'G1031337678', 0, 'G374808', 1, '0', '2021-10-15 16:07:37', 'admin', ''),
(205, 'MERfdpbuY5nL', 'G1031337678', 0, 'G374808', 1, '0', '2021-10-15 16:10:49', 'admin', ''),
(206, 'MERfdpbuY5nL', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-15 16:10:49', 'admin', ''),
(207, 'MERfdpbuY5nL', 'G1031335093', 0, 'G374808', 1, '0', '2021-10-15 16:10:49', 'admin', ''),
(208, 'XHbykCJl3VuA', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-17 17:00:47', 'admin', ''),
(209, '4n79ZvlCpLsa', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-18 19:31:11', 'admin', ''),
(210, 'EoQMHaI5YRTL', 'G0132222745', 0, 'G374808', 1, '0', '2021-10-18 19:47:58', 'admin', ''),
(211, 'd4UBM250qZkr', 'G0132222745', 0, 'G763743', 1, '0', '2021-10-19 11:03:20', 'admin', ''),
(212, 'umJZxGFNthia', 'G1031814682', 0, 'G763743', 1, '0', '2021-10-19 11:33:49', 'admin', ''),
(213, '5rXstwERg7FC', 'G1031335093', 0, 'G763743', 1, '0', '2021-10-19 11:35:06', 'admin', ''),
(214, 'vHZtQT8rW6y3', 'G0132222745', 0, 'G763743', 1, '0', '2021-10-19 11:55:06', 'admin', ''),
(215, 'ldPj7t3hy4J8', 'G1031814682', 0, 'G763743', 1, '0', '2021-10-19 12:28:13', 'admin', ''),
(216, 'ldPj7t3hy4J8', 'G1031335093', 0, 'G763743', 1, '0', '2021-10-19 12:28:13', 'admin', ''),
(217, 'AsR5iM1jcoml', 'G0132222745', 0, 'G763743', 1, '0', '2021-10-19 23:02:35', 'admin', ''),
(218, 'mWZRjdA5JfqK', 'G0132222745', 0, 'G763743', 1, '0', '2021-10-20 14:35:05', 'admin', ''),
(219, 'cAznux6lOo4e', 'G0132222745', 0, 'G763743', 1, '0', '2021-10-20 15:16:54', 'admin', ''),
(220, 'oMw8GnOUIDR4', 'G0101513292', 0, 'G374808', 1, '0', '2021-10-25 18:22:55', 'admin', ''),
(221, 'oMw8GnOUIDR4', 'G0101441894', 0, 'G374808', 1, '0', '2021-10-25 18:22:55', 'admin', ''),
(222, 'FNrHuXpWBEei', 'G0101513292', 0, 'G561732', 7, '0', '2021-10-25 19:55:48', 'admin', ''),
(223, 'Vq3ue2kSXJh9', 'G4666125941', 0, 'G774195', 1, '0', '2021-11-01 12:44:08', 'admin', ''),
(224, 'zAw24XJpe3yq', 'G2049527614', 0, 'G284631', 1, '0', '2021-11-02 18:29:43', 'admin', ''),
(225, 'kx0Ko6EWlz9G', 'G2051693613', 3, 'G284631', 2, '0', '2021-11-03 16:31:40', 'admin', ''),
(226, 'kx0Ko6EWlz9G', 'G2051693613', 4, 'G284631', 5, '0', '2021-11-03 16:31:40', 'admin', ''),
(227, 'kx0Ko6EWlz9G', 'G2051693613', 5, 'G284631', 4, '0', '2021-11-03 16:31:40', 'admin', ''),
(228, 'jtryIXbSxdgz', 'G2051693613', 5, 'G284631', 5, '0', '2021-11-03 16:47:35', 'admin', ''),
(229, 'SfvKpZAucaOX', 'G2051693613', 5, 'G284631', 5, '0', '2021-11-03 16:55:41', 'admin', ''),
(230, 'SfvKpZAucaOX', 'G2051693613', 4, 'G284631', 4, '0', '2021-11-03 16:55:41', 'admin', ''),
(231, 'SfvKpZAucaOX', 'G2051693613', 3, 'G284631', 3, '0', '2021-11-03 16:55:41', 'admin', ''),
(232, 'CDcAmIz2BM9d', 'G2154245957', 10, 'G284631', 1, '0', '2021-11-06 12:08:38', 'admin', ''),
(233, 'PbSQH0CfxyDl', 'G3964855558', 54, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(234, 'PbSQH0CfxyDl', 'G2053342490', 55, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(235, 'PbSQH0CfxyDl', 'G4773576920', 56, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(236, 'PbSQH0CfxyDl', 'G3964658204', 57, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(237, 'PbSQH0CfxyDl', 'G4666125941', 58, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(238, 'PbSQH0CfxyDl', 'G4667614327', 59, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(239, 'PbSQH0CfxyDl', 'G4667659738', 60, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(240, 'PbSQH0CfxyDl', 'G4666405077', 62, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(241, 'PbSQH0CfxyDl', 'G4669106096', 63, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(242, 'PbSQH0CfxyDl', 'G4669458672', 64, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(243, 'PbSQH0CfxyDl', 'G4775307118', 65, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(244, 'PbSQH0CfxyDl', 'G4666205232', 66, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(245, 'PbSQH0CfxyDl', 'G4666524784', 67, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(246, 'PbSQH0CfxyDl', 'G4786999013', 32, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(247, 'PbSQH0CfxyDl', 'G4786460101', 35, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(248, 'PbSQH0CfxyDl', 'G4776184073', 68, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(249, 'PbSQH0CfxyDl', 'G2155786135', 69, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(250, 'PbSQH0CfxyDl', 'G4786438942', 70, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(251, 'PbSQH0CfxyDl', 'G4786852063', 33, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(252, 'PbSQH0CfxyDl', 'G4786173296', 27, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(253, 'PbSQH0CfxyDl', 'G2051117718', 21, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(254, 'PbSQH0CfxyDl', 'G4786974277', 24, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(255, 'PbSQH0CfxyDl', 'G4786230603', 25, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(256, 'PbSQH0CfxyDl', 'G4786530134', 26, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(257, 'PbSQH0CfxyDl', 'G2051608230', 20, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(258, 'PbSQH0CfxyDl', 'G2051973527', 71, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(259, 'PbSQH0CfxyDl', 'G2051750098', 17, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(260, 'PbSQH0CfxyDl', 'G2051779307', 16, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(261, 'PbSQH0CfxyDl', 'G2051995348', 15, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(262, 'PbSQH0CfxyDl', 'G2051953741', 12, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(263, 'PbSQH0CfxyDl', 'G4777594528', 53, 'G284631', 2, '0', '2021-11-06 16:52:51', 'admin', ''),
(264, 'PbSQH0CfxyDl', 'G2050809786', 52, 'G284631', 3, '0', '2021-11-06 16:52:51', 'admin', ''),
(265, 'PbSQH0CfxyDl', 'G4773539167', 51, 'G284631', 2, '0', '2021-11-06 16:52:51', 'admin', ''),
(266, 'PbSQH0CfxyDl', 'G2052488418', 50, 'G284631', 2, '0', '2021-11-06 16:52:51', 'admin', ''),
(267, 'PbSQH0CfxyDl', 'G2052320110', 49, 'G284631', 3, '0', '2021-11-06 16:52:51', 'admin', ''),
(268, 'PbSQH0CfxyDl', 'G2052162766', 48, 'G284631', 2, '0', '2021-11-06 16:52:51', 'admin', ''),
(269, 'PbSQH0CfxyDl', 'G2052254573', 47, 'G284631', 2, '0', '2021-11-06 16:52:51', 'admin', ''),
(270, 'PbSQH0CfxyDl', 'G2052254466', 46, 'G284631', 2, '0', '2021-11-06 16:52:51', 'admin', ''),
(271, 'PbSQH0CfxyDl', 'G4666942805', 72, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(272, 'PbSQH0CfxyDl', 'G4666603329', 45, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(273, 'PbSQH0CfxyDl', 'G2049527614', 44, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(274, 'PbSQH0CfxyDl', 'G4685687348', 43, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(275, 'PbSQH0CfxyDl', 'G2154996928', 42, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(276, 'PbSQH0CfxyDl', 'G2154955329', 41, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(277, 'PbSQH0CfxyDl', 'G2154205309', 40, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(278, 'PbSQH0CfxyDl', 'G2154556208', 39, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(279, 'PbSQH0CfxyDl', 'G2154966955', 38, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(280, 'PbSQH0CfxyDl', 'G2154567185', 37, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(281, 'PbSQH0CfxyDl', 'G2154699758', 36, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(282, 'PbSQH0CfxyDl', 'G2154245957', 10, 'G284631', 1, '0', '2021-11-06 16:52:51', 'admin', ''),
(283, 'PbSQH0CfxyDl', 'G4667966559', 61, 'G284631', 2, '0', '2021-11-06 16:52:51', 'admin', ''),
(284, 'PbSQH0CfxyDl', 'G2051877654', 14, 'G284631', 2, '0', '2021-11-06 16:52:51', 'admin', ''),
(285, 'PbSQH0CfxyDl', 'G2051571495', 13, 'G284631', 2, '0', '2021-11-06 16:52:51', 'admin', ''),
(286, 'PbSQH0CfxyDl', 'G2051693613', 11, 'G284631', 3, '0', '2021-11-06 16:52:51', 'admin', ''),
(287, 'TWirhD5Hqj8o', 'G2154567185', 37, 'G760359', 1, '0', '2021-11-07 23:05:25', 'admin', ''),
(288, 'bs0m3liMdq14', 'G4685687348', 43, 'G284631', 1, '0', '2021-11-12 19:39:33', 'admin', ''),
(289, '9yFjgltn2RuX', 'G2154556208', 39, 'G284631', 3, '0', '2021-11-13 15:03:46', 'admin', ''),
(290, '9yFjgltn2RuX', 'G2051750098', 17, 'G284631', 5, '0', '2021-11-13 15:03:46', 'admin', ''),
(291, '9yFjgltn2RuX', 'G2052162766', 48, 'G284631', 1, '0', '2021-11-13 15:03:46', 'admin', ''),
(292, '9yFjgltn2RuX', 'G2051693613', 75, 'G284631', 9, '0', '2021-11-13 15:03:46', 'admin', ''),
(293, '9yFjgltn2RuX', 'G2051693613', 76, 'G284631', 19, '0', '2021-11-13 15:03:46', 'admin', ''),
(294, '9yFjgltn2RuX', 'G2051693613', 11, 'G284631', 10, '0', '2021-11-13 15:03:46', 'admin', ''),
(295, '9yFjgltn2RuX', 'G2154567185', 37, 'G284631', 2, '0', '2021-11-13 15:03:46', 'admin', ''),
(296, '9yFjgltn2RuX', 'G2051953741', 12, 'G284631', 1, '0', '2021-11-13 15:03:46', 'admin', ''),
(297, '9yFjgltn2RuX', 'G4685687348', 43, 'G284631', 1, '0', '2021-11-13 15:03:46', 'admin', ''),
(298, 'ueNhOPXQlRGm', 'G2051693613', 76, 'G760359', 1, '0', '2021-11-13 17:29:03', 'admin', ''),
(299, 'ueNhOPXQlRGm', 'G2051693613', 75, 'G760359', 1, '0', '2021-11-13 17:29:03', 'admin', ''),
(300, 'OF3C2ajnMrch', 'G4685687348', 43, 'G284631', 2, '0', '2021-11-13 20:33:01', 'admin', ''),
(301, 'ndlSmx43PA9g', 'G2052254466', 46, 'G205431', 1, '0', '2021-11-13 20:56:20', 'admin', ''),
(302, 'ndlSmx43PA9g', 'G2052254573', 47, 'G205431', 1, '0', '2021-11-13 20:56:20', 'admin', ''),
(303, 'ndlSmx43PA9g', 'G4666942805', 72, 'G205431', 1, '0', '2021-11-13 20:56:20', 'admin', ''),
(304, '8UbVrl6k1JsL', 'G2049527614', 44, 'G760359', 18, '0', '2021-11-15 10:22:24', 'admin', ''),
(305, 'wz5IG4UFAf6t', 'G2051693613', 11, 'G284631', 1, '0', '2021-11-21 16:53:47', 'admin', ''),
(306, 'wz5IG4UFAf6t', 'G4666942805', 72, 'G284631', 2, '0', '2021-11-21 16:53:47', 'admin', ''),
(307, 'wz5IG4UFAf6t', 'G2049527614', 44, 'G284631', 2, '0', '2021-11-21 16:53:47', 'admin', ''),
(308, 'wz5IG4UFAf6t', 'G4685687348', 43, 'G284631', 3, '0', '2021-11-21 16:53:47', 'admin', ''),
(309, 'gXYGle6F4WUz', 'G4685687348', 43, 'G284631', 1, '0', '2021-11-21 17:00:03', 'admin', ''),
(310, 'Gwhu36T0F8fb', 'G3964855558', 54, 'G284631', 1, '0', '2021-11-21 20:01:34', 'admin', ''),
(311, 's9Onomp4VjFd', 'G2053342490', 55, 'G104695', 1, '0', '2021-11-22 15:19:42', 'admin', ''),
(312, 'GhpMftVNIU4O', 'G4685687348', 43, 'G777046', 1, '0', '2021-11-22 15:28:07', 'admin', ''),
(313, 'wkbSW1BgHmMJ', 'G2154205309', 40, 'G104695', 1, '0', '2021-11-22 15:30:51', 'admin', ''),
(314, 'qc9Oz7MdQPbS', 'G2053342490', 55, 'G104695', 1, '0', '2021-11-25 20:55:07', 'admin', ''),
(315, 'wHIVWe4T9AdO', 'G3964855558', 54, 'G104695', 1, '0', '2021-11-26 17:23:34', 'admin', ''),
(316, 'IB2dkvJYSseO', 'G3964855558', 54, 'G284631', 1, '0', '2021-11-26 17:27:29', 'admin', ''),
(317, 'RK15uj6S9fDl', 'G3964855558', 54, 'G284631', 1, '0', '2021-11-27 15:00:30', 'admin', ''),
(318, '6pKD7WcRJAhO', 'G3964855558', 54, 'G284631', 1, '0', '2021-11-27 15:14:08', 'admin', ''),
(319, 'lbZSJszPGXtr', 'G2051934619', 84, 'G284631', 1, '0', '2021-11-27 16:02:46', 'admin', ''),
(320, 'lbZSJszPGXtr', 'G5284953434', 92, 'G284631', 2, '0', '2021-11-27 16:02:46', 'admin', ''),
(321, 'lbZSJszPGXtr', 'G5284941384', 91, 'G284631', 1, '0', '2021-11-27 16:02:46', 'admin', ''),
(322, 'lbZSJszPGXtr', 'G2051876778', 88, 'G284631', 3, '0', '2021-11-27 16:02:46', 'admin', ''),
(323, 'lbZSJszPGXtr', 'G5284846946', 93, 'G284631', 2, '0', '2021-11-27 16:02:46', 'admin', ''),
(324, 'lbZSJszPGXtr', 'G2199681340', 94, 'G284631', 3, '0', '2021-11-27 16:02:46', 'admin', ''),
(325, 'lbZSJszPGXtr', 'G2051373827', 86, 'G284631', 2, '0', '2021-11-27 16:02:46', 'admin', ''),
(326, 'aVosFTdI4piL', 'G2199783871', 97, 'G205431', 1, '0', '2021-11-29 18:45:03', 'admin', ''),
(327, 'aVosFTdI4piL', 'G2199453718', 96, 'G205431', 1, '0', '2021-11-29 18:45:03', 'admin', ''),
(328, 'aVosFTdI4piL', 'G3963760574', 119, 'G205431', 5, '0', '2021-11-29 18:45:03', 'admin', ''),
(329, 'aVosFTdI4piL', 'G2049589186', 118, 'G205431', 1, '0', '2021-11-29 18:45:03', 'admin', ''),
(330, 'aVosFTdI4piL', 'G2050584678', 117, 'G205431', 1, '0', '2021-11-29 18:45:03', 'admin', ''),
(331, 'opz93fcy8Yk0', 'G2052175423', 132, 'G760359', 1, '0', '2021-12-31 17:00:01', 'admin', ''),
(332, 'b2Fwe4DyKJj7', 'G2048403002', 116, 'G760359', 1, '0', '2022-01-30 16:21:58', 'admin', ''),
(333, 'b2Fwe4DyKJj7', 'G2048948253', 109, 'G760359', 1, '0', '2022-01-30 16:21:58', 'admin', ''),
(334, 'b2Fwe4DyKJj7', 'G2051494302', 105, 'G760359', 1, '0', '2022-01-30 16:21:58', 'admin', ''),
(335, 'b2Fwe4DyKJj7', 'G2051373827', 86, 'G760359', 1, '0', '2022-01-30 16:21:58', 'admin', ''),
(336, 'b2Fwe4DyKJj7', 'G2052254466', 46, 'G760359', 1, '0', '2022-01-30 16:21:58', 'admin', ''),
(337, 'b2Fwe4DyKJj7', 'G2051995348', 15, 'G760359', 1, '0', '2022-01-30 16:21:58', 'admin', ''),
(338, 'b2Fwe4DyKJj7', 'G2051750098', 17, 'G760359', 1, '0', '2022-01-30 16:21:58', 'admin', ''),
(339, 'b2Fwe4DyKJj7', 'G2051953741', 12, 'G760359', 1, '0', '2022-01-30 16:21:58', 'admin', ''),
(340, 'b2Fwe4DyKJj7', 'G2051693613', 11, 'G760359', 1, '0', '2022-01-30 16:21:58', 'admin', ''),
(341, 'ByWhwFQ7Xx4L', 'G3964855558', 54, 'G124968', 2, '0', '2022-02-20 14:08:57', 'admin', ''),
(342, 'ByWhwFQ7Xx4L', 'G2049700099', 126, 'G124968', 1, '0', '2022-02-20 14:08:57', 'admin', ''),
(343, 'fokBrRCFJmsz', 'G2049700099', 126, 'G904765', 8, '0', '2022-03-04 09:03:38', 'admin', ''),
(344, 'eWIZiPu0lKzJ', 'G2049700099', 126, 'G904765', 20, '0', '2022-03-04 09:59:35', 'admin', ''),
(345, 'UNs1o62KeP0d', 'G2049700099', 126, 'G904765', 20, '0', '2022-03-04 11:14:14', 'admin', ''),
(346, 'QvKolFjHOy9w', 'G2049981893', 127, 'G422878', 1, '0', '2022-03-12 08:14:45', 'admin', ''),
(347, 'OA5rcToLnkZ4', 'G2048905196', 131, 'G617965', 1, '0', '2022-07-17 12:01:56', 'admin', ''),
(348, 'gjO1GwMPlWF8', 'G2053294470', 138, 'G617965', 1, '0', '2022-07-17 12:10:36', 'admin', ''),
(349, 'QfXuBarNMv4z', 'G2052175423', 132, 'G617965', 2, '0', '2022-08-16 20:52:17', 'admin', ''),
(350, 'QrlDd4OUN5cW', 'G2052175423', 132, 'G617965', 2, '0', '2022-08-16 20:56:11', 'admin', ''),
(351, 'GHDl0gmTdifx', 'G2052175423', 132, 'G617965', 2, '0', '2022-08-16 21:01:13', 'admin', ''),
(352, 'Hviu7bQ1yqpD', 'G2052175423', 132, 'G617965', 2, '0', '2022-08-16 21:02:37', 'admin', ''),
(353, '9QVdNWax8XkH', 'G2052175423', 132, 'G617965', 1, '0', '2022-08-16 21:21:47', 'admin', ''),
(354, 'zsO9HpvBf6jn', 'G2048905196', 131, 'G617965', 1, '0', '2022-08-20 10:48:14', 'admin', ''),
(355, 'Y7n8rR0Jbz9V', 'G2049700099', 126, 'G617965', 1, '0', '2022-08-20 13:05:01', 'admin', ''),
(356, 'Y7n8rR0Jbz9V', 'G2049981893', 127, 'G617965', 1, '0', '2022-08-20 13:05:01', 'admin', ''),
(357, 'Y7n8rR0Jbz9V', 'G2053294470', 138, 'G617965', 1, '0', '2022-08-20 13:05:01', 'admin', ''),
(358, 'Y7n8rR0Jbz9V', 'G2048905196', 131, 'G617965', 1, '0', '2022-08-20 13:05:01', 'admin', ''),
(359, 'Y7n8rR0Jbz9V', 'G2052175423', 132, 'G617965', 1, '0', '2022-08-20 13:05:01', 'admin', ''),
(360, '9SCjbWul0RE1', 'G2053294470', 138, 'G871008', 3, '0', '2022-08-25 11:32:31', 'admin', ''),
(361, '9SCjbWul0RE1', 'G2052175423', 132, 'G871008', 3, '0', '2022-08-25 11:32:31', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `v_otp`
--

CREATE TABLE `v_otp` (
  `id` int(11) NOT NULL,
  `user_type` enum('Vendor','User') NOT NULL,
  `otp_no` int(6) NOT NULL,
  `status` enum('Failed','Success','Pending') NOT NULL DEFAULT 'Pending',
  `mobile_email_no` varchar(100) NOT NULL,
  `email_mobile_type` enum('Mobile','Email') NOT NULL,
  `failed_count` int(11) NOT NULL DEFAULT 0,
  `created_ip` varchar(30) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `modified_by` varchar(30) NOT NULL,
  `modified_on` varchar(30) NOT NULL,
  `modified_ip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_otp`
--

INSERT INTO `v_otp` (`id`, `user_type`, `otp_no`, `status`, `mobile_email_no`, `email_mobile_type`, `failed_count`, `created_ip`, `created_on`, `created_by`, `modified_by`, `modified_on`, `modified_ip`) VALUES
(120, 'User', 323950, 'Pending', '7042205441', 'Mobile', 0, '', '2022-02-05 11:05:41', 'admin', '', '', ''),
(121, 'User', 747742, 'Success', '8076995929', 'Mobile', 0, '', '2022-02-05 11:06:57', 'admin', 'admin', '2022-02-05 11:07:12', ''),
(122, 'User', 158683, 'Success', '8076995929', 'Mobile', 0, '', '2022-02-05 11:09:44', 'admin', 'admin', '2022-02-05 11:09:55', ''),
(123, 'User', 517841, 'Success', '8076995929', 'Mobile', 0, '', '2022-02-05 11:21:14', 'admin', 'admin', '2022-02-05 11:21:29', ''),
(124, 'User', 388076, 'Success', '8076995929', 'Mobile', 0, '', '2022-02-05 11:27:14', 'admin', 'admin', '2022-02-05 11:27:25', ''),
(125, 'User', 519220, 'Pending', '9958508156', 'Mobile', 0, '', '2022-02-05 11:28:47', 'admin', '', '', ''),
(126, 'User', 236858, 'Pending', '9958508156', 'Mobile', 0, '', '2022-02-05 11:28:49', 'admin', '', '', ''),
(127, 'User', 361429, 'Success', '9958508156', 'Mobile', 0, '', '2022-02-05 11:28:50', 'admin', 'admin', '2022-02-05 11:29:27', ''),
(128, 'User', 896214, 'Success', '8528227297', 'Mobile', 0, '', '2022-02-14 12:49:50', 'admin', 'admin', '2022-02-14 12:50:08', ''),
(129, 'User', 337070, 'Pending', '7042116072', 'Mobile', 0, '', '2022-02-15 13:39:03', 'admin', '', '', ''),
(130, 'User', 365910, 'Pending', '7042116078', 'Mobile', 0, '', '2022-02-15 13:39:05', 'admin', '', '', ''),
(131, 'User', 882247, 'Success', '9992020922', 'Mobile', 0, '', '2022-02-20 13:48:43', 'admin', 'admin', '2022-02-20 13:48:53', ''),
(132, 'User', 423775, 'Success', '8708152765', 'Mobile', 0, '', '2022-02-20 13:56:34', 'admin', 'admin', '2022-02-20 13:56:51', ''),
(133, 'User', 659519, 'Pending', '8168607358', 'Mobile', 0, '', '2022-02-27 13:32:10', 'admin', '', '', ''),
(134, 'User', 854250, 'Success', '8168607359', 'Mobile', 0, '', '2022-02-27 13:32:37', 'admin', 'admin', '2022-02-27 13:32:48', ''),
(135, 'User', 828286, 'Success', '8168607359', 'Mobile', 0, '', '2022-02-27 13:33:14', 'admin', 'admin', '2022-02-27 13:33:19', ''),
(136, 'User', 438024, 'Success', '9915959846', 'Mobile', 0, '', '2022-02-28 20:26:11', 'admin', 'admin', '2022-02-28 20:26:30', ''),
(137, 'User', 701424, 'Success', '9306311686', 'Mobile', 0, '', '2022-03-04 08:43:59', 'admin', 'admin', '2022-03-04 08:44:08', ''),
(138, 'User', 209280, 'Success', '9306311686', 'Mobile', 0, '', '2022-03-04 08:51:33', 'admin', 'admin', '2022-03-04 08:51:40', ''),
(139, 'User', 948330, 'Success', '9306311686', 'Mobile', 0, '', '2022-03-04 08:52:59', 'admin', 'admin', '2022-03-04 08:53:41', ''),
(140, 'User', 880589, 'Success', '8882787976', 'Mobile', 0, '', '2022-03-12 08:02:44', 'admin', 'admin', '2022-03-12 08:03:00', ''),
(141, 'User', 480029, 'Pending', '1798260732', 'Mobile', 0, '', '2022-03-13 11:58:54', 'admin', '', '', ''),
(142, 'User', 753083, 'Success', '9958508156', 'Mobile', 0, '', '2022-03-13 11:59:37', 'admin', 'admin', '2022-03-13 11:59:51', ''),
(143, 'User', 536068, 'Success', '8805727892', 'Mobile', 0, '', '2022-03-15 12:07:04', 'admin', 'admin', '2022-03-15 12:07:23', ''),
(144, 'User', 281810, 'Success', '9899467212', 'Mobile', 0, '', '2022-03-18 10:38:00', 'admin', 'admin', '2022-03-18 10:38:40', ''),
(145, 'User', 431958, 'Pending', '7042116078', 'Mobile', 0, '', '2022-03-18 10:39:37', 'admin', '', '', ''),
(146, 'User', 907554, 'Success', '9899467212', 'Mobile', 0, '', '2022-03-18 10:42:06', 'admin', 'admin', '2022-03-18 10:42:44', ''),
(147, 'User', 162094, 'Success', '7042116078', 'Mobile', 0, '', '2022-03-18 10:44:17', 'admin', 'admin', '2022-03-18 10:44:53', ''),
(148, 'User', 793882, 'Success', '9960148899', 'Mobile', 0, '', '2022-03-29 12:36:57', 'admin', 'admin', '2022-03-29 12:37:13', ''),
(149, 'User', 752205, 'Success', '9953189043', 'Mobile', 0, '', '2022-03-29 21:03:03', 'admin', 'admin', '2022-03-29 21:03:25', ''),
(150, 'User', 166606, 'Success', '7351958733', 'Mobile', 0, '', '2022-04-09 18:21:17', 'admin', 'admin', '2022-04-09 18:21:29', ''),
(151, 'User', 789000, 'Success', '7536883193', 'Mobile', 0, '', '2022-04-11 22:59:11', 'admin', 'admin', '2022-04-11 22:59:35', ''),
(152, 'User', 986011, 'Pending', '7351958733', 'Mobile', 0, '', '2022-04-12 18:18:04', 'admin', '', '', ''),
(153, 'User', 265362, 'Pending', '7351958733', 'Mobile', 0, '', '2022-04-12 18:20:37', 'admin', '', '', ''),
(154, 'User', 969932, 'Success', '7536883193', 'Mobile', 0, '', '2022-04-12 20:12:59', 'admin', 'admin', '2022-04-12 20:13:16', ''),
(155, 'User', 619199, 'Success', '7466805350', 'Mobile', 0, '', '2022-04-18 12:26:14', 'admin', 'admin', '2022-04-18 12:26:48', ''),
(156, 'User', 225733, 'Success', '7466805350', 'Mobile', 0, '', '2022-04-19 13:49:37', 'admin', 'admin', '2022-04-19 13:49:50', ''),
(157, 'User', 525705, 'Pending', '7366805350', 'Mobile', 0, '', '2022-04-19 13:50:34', 'admin', '', '', ''),
(158, 'User', 643332, 'Success', '7466805350', 'Mobile', 0, '', '2022-04-24 08:31:04', 'admin', 'admin', '2022-04-24 08:31:16', ''),
(159, 'User', 430201, 'Success', '7466805350', 'Mobile', 0, '', '2022-04-24 12:51:38', 'admin', 'admin', '2022-04-24 12:51:58', ''),
(160, 'User', 745586, 'Pending', '7451958733', 'Mobile', 0, '', '2022-04-25 11:57:51', 'admin', '', '', ''),
(161, 'User', 176596, 'Success', '7351958733', 'Mobile', 0, '', '2022-04-25 11:58:47', 'admin', 'admin', '2022-04-25 11:59:12', ''),
(162, 'User', 433906, 'Success', '7351958733', 'Mobile', 0, '', '2022-04-28 11:50:49', 'admin', 'admin', '2022-04-28 11:51:03', ''),
(163, 'User', 407818, 'Pending', '8802347411', 'Mobile', 0, '', '2022-05-02 08:36:37', 'admin', '', '', ''),
(164, 'User', 656152, 'Pending', '8802347411', 'Mobile', 0, '', '2022-05-02 08:37:29', 'admin', '', '', ''),
(165, 'User', 156404, 'Pending', '8801958577', 'Mobile', 0, '', '2022-06-05 02:20:03', 'admin', '', '', ''),
(166, 'User', 352008, 'Success', '7042205441', 'Mobile', 0, '', '2022-07-17 11:37:01', 'admin', 'admin', '2022-07-17 11:37:21', ''),
(167, 'User', 935748, 'Success', '8802263916', 'Mobile', 0, '', '2022-08-19 17:49:35', 'admin', 'admin', '2022-08-19 17:49:49', ''),
(168, 'User', 789362, 'Success', '9667120096', 'Mobile', 0, '', '2022-08-25 11:26:28', 'admin', 'admin', '2022-08-25 11:27:21', ''),
(169, 'User', 125641, 'Pending', '1572826732', 'Mobile', 0, '', '2022-09-05 06:13:50', 'admin', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `v_pages`
--

CREATE TABLE `v_pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(200) NOT NULL,
  `page_url` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `keywards` varchar(500) NOT NULL,
  `meta_tag` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `short_description` text NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `ip` varchar(25) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(25) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `v_pages`
--

INSERT INTO `v_pages` (`id`, `page_name`, `page_url`, `title`, `keywards`, `meta_tag`, `description`, `short_description`, `status`, `ip`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(2, 'About Us', 'https://gomores.com/aboutus', 'Gomores.com|Gomores|local to vocal shop|online shoping|online shoping near me|online wish shoping', 'Gomroes.com, Gomores,online shoping, online shoping shop,online shoping store,online dress shoping, online shoping vendors, online ecommerce platform', 'text/html;charset=utf-8', 'Gomores.com is online shoping portal which is based on made in india, local shop to vocal shop objetives with high determination., online shoping, online shoping shop, online shoping store,online dress shoping', 'Gomores.com is online shoping portal which is based on made in india, local shop to vocal shop objetives with high determination.,', '0', '', '2021-12-08 07:23:49', '', '2020-12-16 17:01:59', 'admin'),
(4, 'Contact Us', 'https://gomores.com/contactus', 'Contact Us|Gomores.com|Gomores', 'Gomores.com, Gomores, Contact us online shoping, online shoping shop,online shoping store,online dress shoping, online shoping vendors, online ecommerce platform', 'text/html;charset=utf-8', 'Gomores.com is online shoping portal you can feel free to contact us, online shoping, online shoping shop, online shoping store,online dress shoping', 'Gomores.com is online shoping portal you can feel free to contact us, online shoping, online shoping shop, online shoping store,online dress shoping', '0', '', '2021-12-08 07:23:46', 'admin', '0000-00-00 00:00:00', ''),
(5, 'Security Policy', 'https://gomores.com/termcondition', 'Security Policy|Gomores.com|Gomores', 'online shoping, shoping shop,shoping store,dress shoping,Gomores, Gomores.com', 'text/html;charset=utf-8', 'Gomores is online shoping portal which is based on made in india, local shop to vocal shop objetives with high determination.,Gomores.com, online shoping, shoping shop,shoping store,dress shoping', 'Gomores is online shoping portal which is based on made in india, local shop to vocal shop objetives with high determination.,Gomores.com, online shoping, shoping shop,shoping store,dress shoping', '0', '', '2021-12-08 07:18:42', 'admin', '2020-12-22 18:34:21', 'admin'),
(6, 'Index', 'https://gomores.com/', 'Best Grocery Products in Faridabad | Fast Delivery | Gomores', 'Grocery|Product|Gomores|Gomores.com', 'Grocery|Product|Gomores|Gomores.com', 'Are You finding best quality products ? Gomores deliver products in just few easy step. Easy to find product with best deal. We provide the best customer experience.', 'Are You finding best quality products ? Gomores deliver products in just few easy step. Easy to find product with best deal. We provide the best customer experience.', '0', '103.83.129.188', '2021-12-08 07:43:25', 'admin', '2021-12-08 13:13:25', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `v_party`
--

CREATE TABLE `v_party` (
  `id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `invoice_no` varchar(25) NOT NULL,
  `party_name` varchar(100) NOT NULL,
  `invoice_date` date NOT NULL,
  `total_purc_price` decimal(7,2) NOT NULL,
  `description` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_by` varchar(25) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `v_party`
--

INSERT INTO `v_party` (`id`, `order_id`, `invoice_no`, `party_name`, `invoice_date`, `total_purc_price`, `description`, `status`, `created_by`, `created_on`) VALUES
(1, 'ODA0W7G2WMEG07', 'SGHA175PWPPA47', 'Granary Wholesale Private Limited', '2021-10-02', '2147.85', '', '0', 'admin', '0000-00-00 00:00:00'),
(2, 'sdfas', 'fgdfsdz', 'dgdsfgdf', '1993-10-03', '5555.00', 'sdfasdfasdf', '0', 'admin', '2022-02-07 10:40:40'),
(3, 'ODA0M7RJB3NO8V', '1', 'GRANARY WHOLESALE PRIVATE LIMITED', '2021-11-12', '2055.72', '1.Tata Tea (Agni Regular Tea250 gm India) (Pack of 1 /Set 1)\n2.Tata Tea Elaichi Chai Tea  75 gm(Pack of 1 (Set 12)\n3.Badshah Rajwari Atta (9kg Set 1)\n4.Badshah Rajwari Atta (4.5kg Set 1)\n ', '0', 'admin', '2022-02-07 10:41:08'),
(4, 'ODA0M7RJB3NO8V', '1', 'GRANARY WHOLESALE PRIVATE LIMITED', '2021-11-12', '2055.72', '1.Tata Tea (Agni Regular Tea250 gm India) (Pack of 1 /Set 1)\n2.Tata Tea Elaichi Chai Tea  75 gm(Pack of 1 (Set 12)\n3.Badshah Rajwari Atta (9kg Set 1)\n4.Badshah Rajwari Atta (4.5kg Set 1)\n ', '0', 'admin', '2022-02-07 10:41:08'),
(5, 'ODA0M7RJB3NO8V', '1', 'GRANARY WHOLESALE PRIVATE LIMITED', '2021-11-12', '2055.72', '1.Tata Tea (Agni Regular Tea250 gm India) (Pack of 1 /Set 1)\n2.Tata Tea Elaichi Chai Tea  75 gm(Pack of 1 (Set 12)\n3.Badshah Rajwari Atta (9kg Set 1)\n4.Badshah Rajwari Atta (4.5kg Set 1)\n ', '0', 'admin', '2022-02-07 10:41:09'),
(6, 'ODA0M7RJB3NO8V', '1', 'GRANARY WHOLESALE PRIVATE LIMITED', '2021-11-12', '2055.72', '1.Tata Tea (Agni Regular Tea250 gm India) (Pack of 1 /Set 1)\n2.Tata Tea Elaichi Chai Tea  75 gm(Pack of 1 (Set 12)\n3.Badshah Rajwari Atta (9kg Set 1)\n4.Badshah Rajwari Atta (4.5kg Set 1)\n ', '0', 'admin', '2022-02-07 10:41:09'),
(7, 'ODA0M7RJB3NO8V', '1', 'GRANARY WHOLESALE PRIVATE LIMITED', '2021-11-12', '2055.72', '1.Tata Tea (Agni Regular Tea250 gm India) (Pack of 1 /Set 1)\n2.Tata Tea Elaichi Chai Tea  75 gm(Pack of 1 (Set 12)\n3.Badshah Rajwari Atta (9kg Set 1)\n4.Badshah Rajwari Atta (4.5kg Set 1)\n ', '0', 'admin', '2022-02-07 10:41:09'),
(8, 'ODA0M7RJB3NO8V', '1', 'GRANARY WHOLESALE PRIVATE LIMITED', '2021-11-12', '2055.72', '1.Tata Tea (Agni Regular Tea250 gm India) (Pack of 1 /Set 1)\n2.Tata Tea Elaichi Chai Tea  75 gm(Pack of 1 (Set 12)\n3.Badshah Rajwari Atta (9kg Set 1)\n4.Badshah Rajwari Atta (4.5kg Set 1)\n ', '0', 'admin', '2022-02-07 10:41:09'),
(9, 'ODA0M7RJB3NO8V', '1', 'GRANARY WHOLESALE PRIVATE LIMITED', '2021-11-12', '2055.72', '1.Tata Tea (Agni Regular Tea250 gm India) (Pack of 1 /Set 1)\n2.Tata Tea Elaichi Chai Tea  75 gm(Pack of 1 (Set 12)\n3.Badshah Rajwari Atta (9kg Set 1)\n4.Badshah Rajwari Atta (4.5kg Set 1)\n ', '0', 'admin', '2022-02-07 10:41:09'),
(10, 'ODA0M7RJB3NO8V', '1', 'GRANARY WHOLESALE PRIVATE LIMITED', '2021-11-12', '2055.72', '1.Tata Tea (Agni Regular Tea250 gm India) (Pack of 1 /Set 1)\n2.Tata Tea Elaichi Chai Tea  75 gm(Pack of 1 (Set 12)\n3.Badshah Rajwari Atta (9kg Set 1)\n4.Badshah Rajwari Atta (4.5kg Set 1)\n ', '0', 'admin', '2022-02-07 10:41:09'),
(11, 'ODA0M7RJB3NO8V', '1', 'GRANARY WHOLESALE PRIVATE LIMITED', '2021-11-12', '2055.72', '1.Tata Tea (Agni Regular Tea250 gm India) (Pack of 1 /Set 1)\n2.Tata Tea Elaichi Chai Tea  75 gm(Pack of 1 (Set 12)\n3.Badshah Rajwari Atta (9kg Set 1)\n4.Badshah Rajwari Atta (4.5kg Set 1)\n ', '0', 'admin', '2022-02-07 10:41:09'),
(12, 'ODA0M7RJB3NO8V', '1', 'GRANARY WHOLESALE PRIVATE LIMITED', '2021-11-12', '2055.72', '1.Tata Tea (Agni Regular Tea250 gm India) (Pack of 1 /Set 1)\n2.Tata Tea Elaichi Chai Tea  75 gm(Pack of 1 (Set 12)\n3.Badshah Rajwari Atta (9kg Set 1)\n4.Badshah Rajwari Atta (4.5kg Set 1)\n ', '0', 'admin', '2022-02-07 10:41:09'),
(13, 'ODA0M7RJB3NO8V', '1', 'GRANARY WHOLESALE PRIVATE LIMITED', '2021-11-12', '2055.72', '1.Tata Tea (Agni Regular Tea250 gm India) (Pack of 1 /Set 1)\n2.Tata Tea Elaichi Chai Tea  75 gm(Pack of 1 (Set 12)\n3.Badshah Rajwari Atta (9kg Set 1)\n4.Badshah Rajwari Atta (4.5kg Set 1)\n ', '0', 'admin', '2022-02-07 10:41:10'),
(14, 'SLAFLR9220077341', '2', 'WALMART INDIA PRIVATE LIMITED ', '2021-10-04', '2503.00', '1.GPA Chana Dal (10kg)\n2.GPA Chana DAl (10kg)\n3.Godrej No.1 Sandal and Turmerk (100g pack of 4)\n4.Great Value Combo (1ltr)', '0', 'admin', '2022-02-07 10:49:10'),
(15, 'ODA0979LNYPYKV', '2', ' UDAAN (GRANARY WHOLESALE PRIVATE LIMITED', '2021-12-08', '1971.25', '1.Sanskriti Rice Pramal 25kg Set 1\n2.Double Parrot Rice Mansoori Mota 25kg Set 1\n3.Sn Nath Bhog Rice Basmati 25kg Set 1\n', '0', 'admin', '2022-02-07 10:59:05'),
(16, 'ODA03VY3GO9POA', '3', 'UDAAN (gRANARY WHOLESALE PRIVATE LIMITED', '2021-02-21', '1987.00', '1.Bajaj Hindusthan Sugar 50kg', '0', 'admin', '2022-02-07 11:04:14'),
(17, 'ODA0W7G2WMEG07', '4', 'UDAAN (GRANARY WHOLESALE PRIVATED LIMITED', '2021-10-02', '2147.85', 'Pansari Kachhi Ghani Mustard Oil (1ltr)', '0', 'admin', '2022-02-07 11:07:42'),
(18, 'ODA0OV444043RBV', '5', 'UDAAN (GRANARY WHOLESALE PRIVATE LIMITED', '2021-09-09', '3114.04', '1.Colin 2x More shine Glass Cleaner (Pack of 1 Rs.60(set 1)\n2.Tide Natural Detergent Powder Lemon & Chandan (Pack of 1 Rs.62 1kg (set 1)\n3.Vim Dish Wash Bar Lemon 420gm (Pack of 4 Rs30 (set of 20)', '0', 'admin', '2022-02-07 11:16:40'),
(19, 'ODA09792Y66P9A', '6', 'UDAAN ( GRANARY WHOLESALE PRIVATE LIMITED', '2021-10-16', '2671.98', '1.Maggi Rich Tomato Ketchup Sauce (200gm Pack of 1 Set 1)\n2.Mggie Rich Tomato Ketchup Sauce (1kg )\n3.Ruchi Gold Refined Oil (1ltr set of 10 )\n4.Masoor Dal (10kg)', '0', 'admin', '2022-02-07 11:26:55'),
(20, 'ODA0PV6P4ZQZE7', '7', 'UDAAN (GRANARY WHOLESALE PRIVATE LIMITED', '2021-10-23', '3815.00', '1.Too Yumm Kurkure (Pack of 1 Set of 12)\n2.Pansari Kachhi Ghani Mustard Oil 1Ltr (Set 12)\n3.Fena Superwash Germ clean 1kg (Pack of 1 )\n4.Fena Super wash 500gm\n5.Head & Shoulder Smooth  72Ml (Set of 1)\n6.Clinic Plus Strong (80ml Set of 7)\n', '0', 'admin', '2022-02-07 11:35:05'),
(21, 'ODA0OV4XLYDEGV', '8', 'UDAAN (GRANARY WHOLESALE PRIVATE LIMITED ', '2021-12-06', '1088.20', '1.Tide Natural Detergent Powder (500gm Qty 4 )\n2.Tide Naturals Detergent Powder (1kg)\n3.Fena Superwash Detergent Powder (85gm)\n4.Nihar Naturals Shanti Hair oil Badam Amla 34ml  (set of 12)', '0', 'admin', '2022-02-07 11:40:33'),
(22, 'ODA0OAXB20E9LV', '9', 'UDAAN (GRANARY WHOLESALE PRIVATE LIMITED ', '2021-09-07', '3794.00', '1.Godrej Expert Rich Cream (Natural Black 20gm+20gm)(set of 8)\n2.Bajaj Amla OIl (34ml pack of 1 )\n3.Taj Mahal Best Quality Parmal Rice (25kg)\n4.Ashirvad Shudh Wheat Flour (weight 5kg)\n5.Bajaj Amla Aloe Vera (80ml Set of 6)\n6.Parachute Coconut Oil (175ml Pack of 1)', '0', 'admin', '2022-02-07 11:51:57'),
(23, 'ODA0Q7ENMQOLK7', '9', 'UDAAN (GRANARY WHOLESALE PRIVATE LIMITED', '2021-11-24', '2220.00', '1.Fortune Premium Kachi Ghani Mustard Oil (Set of 12)\n2.Eagle Chicken Masala (12gm set of 10)', '0', 'admin', '2022-02-07 12:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `v_product`
--

CREATE TABLE `v_product` (
  `id` int(11) NOT NULL,
  `product_id` varchar(11) NOT NULL,
  `vendor_id` varchar(10) NOT NULL,
  `category_id` int(3) NOT NULL,
  `sub_category_id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `short_name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `MRP_price` int(11) NOT NULL,
  `description` text NOT NULL,
  `short_description` text NOT NULL,
  `hsn_code` varchar(50) NOT NULL,
  `total_availability` int(3) NOT NULL,
  `left_quantity` int(3) NOT NULL,
  `total_quantity` int(3) NOT NULL,
  `related_product_id` varchar(1000) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `product_type` enum('Latest','Top','Featured','Normal') NOT NULL DEFAULT 'Normal',
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `created_ip` varchar(100) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` varchar(10) NOT NULL,
  `modified_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_product`
--

INSERT INTO `v_product` (`id`, `product_id`, `vendor_id`, `category_id`, `sub_category_id`, `name`, `short_name`, `price`, `MRP_price`, `description`, `short_description`, `hsn_code`, `total_availability`, `left_quantity`, `total_quantity`, `related_product_id`, `brand_name`, `image`, `image2`, `product_type`, `status`, `created_on`, `created_by`, `created_ip`, `modified_on`, `modified_by`, `modified_ip`) VALUES
(69, 'G2051693613', 'GHRFBD1001', 20, 51, 'MDH Laal Mirch  Powder', 'Laal Mirch', 41, 46, 'Exotic Kashmiri Mirch is a special blend of medium hot quality Red Pepper that is used for Tandoori (Clay oven) preparations. When used in curry it imparts bright red colour making food more appealing and palatable. It is added to marinade for marinating and to frying onions along with chopped tomatoes while preparing curries.', ' Exotic Kashmiri Mirch is a special blend of medium hot quality Red Pepper that is used for Tandoori (Clay oven) preparations.', '', 7, 7, 7, 'G2051608230', 'MDH', '', '', 'Top', '0', '2021-10-30 10:21:12', 'admin', '', '2021-11-13 12:00:15', 'admin', ''),
(70, 'G2051953741', 'GHRFBD1001', 20, 51, 'MDH Haldi Powder (100 GM)', 'Haldi (100g) ', 30, 34, 'One of the magical spices in Indian cuisine MDH Turmeric Powder/Haldi makes your recipes delicious. Its golden color gives a rich and vibrant look to your dishes. Loaded with anti-bacterial properties, it can used in almost all curries and gravies. Known for medicinal properties and is a natural cure for skin problems. Has a mild and earthy flavour, changes the look of the dish with just a pinch. Can be used for dry brines. ', 'One of the magical spices in Indian cuisine MDH Turmeric Powder/Haldi makes your recipes delicious.', '', 6, 6, 6, 'G2051973527', 'MDH', '', '', 'Top', '0', '2021-10-30 10:45:59', 'admin', '', '2021-11-06 13:16:47', 'admin', ''),
(71, 'G2051571495', 'GHRFBD1001', 20, 51, 'MDH Dhaniya Powder (100 GM)', ' Dhaniya (100g)', 30, 34, 'MDH Coriander Powder/Dhania is a perfect blend of garden fresh aroma and natural green colour. MDH Coriander Powder is widely used to give Indian curries a distinct flavour. Prevents intestinal issues including bloating, gastric, diarrhea, nausea etc.', 'MDH Coriander Powder/Dhania is a perfect blend of garden fresh aroma and natural green colour.', '', 3, 3, 3, '', 'MDH', '', '', 'Top', '0', '2021-10-30 11:03:25', 'admin', '', '2021-11-06 13:21:51', 'admin', ''),
(72, 'G2051877654', 'GHRFBD1001', 20, 51, 'MDH Jeera Powder (100 GM)', 'Jeera (100g)', 55, 61, 'Jeera Powder Has An Aromatic, And Is A Key Element In Many Indian Dishes. Jeera Powder Is Normally Added In Indian Food Like Vegetables, Lentils, Raitas, Pulaos Etc. The Powder Gives A Nice Taste And Flavor To The Food.\n', 'Jeera Powder Has An Aromatic, And Is A Key Element In Many Indian Dishes. Jeera Powder Is Normally Added In Indian Food Like Vegetables, Lentils, Raitas, Pulaos Etc. The Powder Gives A Nice Taste And Flavor To The Food.\n', '', 10, 10, 10, 'G2051608230', 'MDH', '', '', 'Top', '0', '2021-10-30 11:23:33', 'admin', '', '2021-11-06 13:24:14', 'admin', ''),
(73, 'G2051995348', 'GHRFBD1001', 20, 51, 'MDH Garam Masala (100g)', 'Garam Masala ', 70, 78, 'It is a powdered blend of highly aromatic spices & Black Pepper to make it hot. It is sprinkled in small quantity, when the dish is nearly ready, be it curried or dry, lentils, meat or vegetables, to pep up the spicy aroma for which Indian food is renowned all over the world.', 'It is a powdered blend of highly aromatic spices & Black Pepper to make it hot.', '', 8, 8, 8, 'G2051973527', 'MDH', '', '', 'Top', '0', '2021-10-30 11:29:10', 'admin', '', '2021-11-06 13:29:05', 'admin', ''),
(74, 'G2051779307', 'GHRFBD1001', 20, 88, 'MDH Degi Mirch (100 GM)', 'Degi Mirch', 70, 78, 'Deggi Mirch is a unique, age old blend, processed from special varieties of colourful Indian red chillies. It is mild-hot and imparts glowing natural red colour to curried dishes making them attractive and more palatable', 'Deggi Mirch is a unique, age old blend, processed from special varieties of colourful Indian red chillies. It is mild-hot and imparts glowing natural red colour to curried dishes making them attractive and more palatable', '', 8, 8, 8, 'G2051693613', 'MDH', '', '', 'Top', '0', '2021-10-30 12:05:02', 'admin', '', '2021-10-31 09:55:16', 'admin', ''),
(75, 'G2051750098', 'GHRFBD1001', 20, 51, 'Chicken Masala (100 GM)', 'Chicken Masala', 63, 70, 'Coriander seeds, Red Chillies, Turmeric, Cumin, Iodised Salt, Black Pepper, Fenugreek Leaves, Mustard, Dried Ginger, Cassia, Cardamom Amomum, Cloves, Nutmeg, Mace, Asafoetida.', 'Coriander seeds, Red Chillies, Turmeric, Cumin, Iodised Salt, Black Pepper, Fenugreek Leaves, Mustard, Dried Ginger, Cassia, Cardamom Amomum, Cloves, Nutmeg, Mace, Asafoetida.', '', 7, 7, 7, 'G2051995348', 'MDH', '', '', 'Top', '0', '2021-10-30 12:11:12', 'admin', '', '2021-11-02 18:29:45', 'admin', ''),
(76, 'G2051973527', 'GHRFBD1001', 20, 88, 'MDH Sahi Paneer (100 GM)', 'Sahi Paneer', 73, 82, 'Coriander seeds, Red Chillies, Iodised Salt, Black Pepper, Turmeric, Garlic, Cassia, Dried Ginger, Fennel Seeds, Cardamom Amomum, Cloves, Nutmeg, Mace.', 'Coriander seeds, Red Chillies, Iodised Salt, Black Pepper, Turmeric, Garlic, Cassia, Dried Ginger, Fennel Seeds, Cardamom Amomum, Cloves, Nutmeg, Mace.', '', 9, 9, 9, 'G2051779307', 'MDH', '', '', 'Top', '0', '2021-10-30 18:15:50', 'admin', '', '2021-10-31 09:54:48', 'admin', ''),
(77, 'G2051608230', 'GHRFBD1001', 20, 88, 'MDH Super Hing (10g)', 'Super Hing', 61, 68, 'A major ingredient used to provide an authentic taste to your food, MDH Compounded Hing Powder is a must-have in the kitchen. It imparts a strong aroma to your food and makes sure you can enjoy a hearty meal. ... Adds fragrance to your dishes and makes sure you can enjoy a hearty meal', 'A major ingredient used to provide an authentic taste to your food, MDH Compounded Hing Powder is a must-have in the kitchen. It imparts a strong aroma to your food and makes sure you can enjoy a hearty meal. ... Adds fragrance to your dishes and makes sure you can enjoy a hearty meal', '', 10, 10, 10, 'G2051877654', 'MDH', '', '', 'Top', '0', '2021-10-30 18:21:31', 'admin', '', '2021-10-31 09:54:36', 'admin', ''),
(78, 'G2051117718', 'GHRFBD1001', 46, 85, 'Dettol Soap(72g)', 'Soap (72g)', 25, 30, 'Dettol original soap with classic Dettol fragrance provides Dettol\'s trusted germ protection from a wide range of unseen germs. It cleanses and protects your skin keeping you healthy. ... Poor personal hygiene can cause infection, skin complaints, unpleasant smells and skin infections', 'Dettol original soap with classic Dettol fragrance provides Dettol\'s trusted germ protection from a wide range of unseen germs. It cleanses and protects your skin keeping you healthy. ... Poor personal hygiene can cause infection, skin complaints, unpleasant smells and skin infections', '', 3, 3, 3, '', 'Dettol', '', '', 'Top', '0', '2021-10-30 18:42:51', 'admin', '', '2021-11-06 16:37:02', 'admin', ''),
(79, 'G4786974277', 'GHRFBD1001', 47, 86, 'Vim Dishwasher Liquid (250g)', 'Dishwasher Liquid', 42, 45, 'Vim Dishwash Liquid Gel deep cleans the utensils and does not leave any white residue behind unlike dishwash bars. ... It has a superior fragrance that lasts long after rinsing utensils. It is soft on hands. It can safely be used to clean expensive crockery and cookware as it does not leave scratches.', 'Vim Dishwash Liquid Gel deep cleans the utensils and does not leave any white residue behind unlike dishwash bars. ... It has a superior fragrance that lasts long after rinsing utensils. It is soft on hands. It can safely be used to clean expensive crockery and cookware as it does not leave scratches.', '', 7, 7, 7, 'G2051117718', 'Vim', '', '', 'Top', '0', '2021-10-30 18:56:31', 'admin', '', '2021-11-06 16:36:07', 'admin', ''),
(80, 'G4786230603', 'GHRFBD1001', 47, 86, 'Tide Detergent Powder (1kg)', 'Detergent (1kg)', 59, 62, 'Tide\'s detergent soap is a specially created formulation without any phosphates. Giving the right amount of foaming to clean away the dirt and stains, Tide\'s detergent bar can make sure you get spectacular results from your laundry.\n', 'Tide\'s detergent soap is a specially created formulation without any phosphates. Giving the right amount of foaming to clean away the dirt and stains, Tide\'s detergent bar can make sure you get spectacular results from your laundry.\n', '', 4, 4, 4, 'G4786974277', 'Tide', '', '', 'Top', '0', '2021-10-30 19:00:01', 'admin', '', '2021-11-06 16:35:18', 'admin', ''),
(81, 'G4786530134', 'GHRFBD1001', 47, 86, 'Fena Detergent  (1KG)', 'Detergent (1KG)', 58, 60, 'Fena Superwash GermClean Detergent Powder designed to give you a premium washing experience with Rose & Chandan perfume, dirt and stain removing active ingredients, & optical brightener for dazzling whiteness.', 'Fena Superwash GermClean Detergent Powder designed to give you a premium washing experience with Rose & Chandan perfume, dirt and stain removing active ingredients, & optical brightener for dazzling whiteness.', '', 4, 4, 4, 'G4786230603', 'Fena', '', '', 'Top', '0', '2021-10-30 19:05:41', 'admin', '', '2021-11-06 16:34:31', 'admin', ''),
(82, 'G4786173296', 'GHRFBD1001', 47, 86, 'Nip Dishwasher Powder (1KG)', 'Dishwasher (1kg)', 20, 21, 'NIP NATURE & SHAKTI DISHWASH POWDER with \'Nature\' implies fragrance of Lemon, Chandan & Neem and \'Shakti\' of powerful formulation which not only cleans oil & grease but removes the invisible germs from utensils. Its superior quality and unique fragrance makes dishwashing a pleasant experience.', 'NIP NATURE & SHAKTI DISHWASH POWDER with \'Nature\' implies fragrance of Lemon, Chandan & Neem and \'Shakti\' of powerful formulation which not only cleans oil & grease but removes the invisible germs from utensils. Its superior quality and unique fragrance makes dishwashing a pleasant experience.', '', 5, 5, 5, 'G4786530134', 'NIP', '', '', 'Top', '0', '2021-10-30 19:12:39', 'admin', '', '2021-11-06 16:33:44', 'admin', ''),
(83, 'G4786852063', 'GHRFBD1001', 47, 86, 'Vim Pack of 3 (105g)', 'Bar Pack (105G) ', 33, 35, 'Vim Dishwash Bar has the power of 100 lemons(power refers to the cleaning benefits of lemons) which helps in the fastest removal of burnt food(as per the independent lab test conducted on burnt food stains). ... It provides a pleasant cleaning experience with its refreshing lemon fragrance during dishwash.', 'Vim Dishwash Bar has the power of 100 lemons(power refers to the cleaning benefits of lemons) which helps in the fastest removal of burnt food(as per the independent lab test conducted on burnt food stains). ... It provides a pleasant cleaning experience with its refreshing lemon fragrance during dishwash.', '', 20, 20, 20, 'G4786173296', 'Vim', '', '', 'Top', '0', '2021-10-30 19:18:26', 'admin', '', '2021-11-06 16:32:36', 'admin', ''),
(84, 'G4786438942', 'GHRFBD1001', 47, 86, 'Rin Bar (250g)', 'Bar (250g)', 15, 16, 'Rin Bar removes the dirt from the toughest places like cuff and colour with just one stroke. It also leaves your clothes with a pleasant fragrance to keep you feeling fresh all day long. With Rin Bar by your side, let your confidence shine as bright as your clothes do! Rin Detergent Bar is extremely easy to use.', 'Rin Bar removes the dirt from the toughest places like cuff and colour with just one stroke. It also leaves your clothes with a pleasant fragrance to keep you feeling fresh all day long. With Rin Bar by your side, let your confidence shine as bright as your clothes do! Rin Detergent Bar is extremely easy to use.', '', 5, 5, 5, 'G4786852063', 'Rin', '', '', 'Top', '0', '2021-10-30 19:22:32', 'admin', '', '2021-11-06 16:30:29', 'admin', ''),
(85, 'G2155786135', 'GHRFBD1001', 21, 55, 'Tata Tea (250G) Premium', 'Tea (250G)', 122, 125, 'Premium Quality', 'Premium Quality', '', 4, 4, 4, '', 'Tata', '', '', 'Top', '0', '2021-10-30 19:40:06', 'admin', '', '2021-11-06 16:29:07', 'admin', ''),
(86, 'G4786999013', 'GHRFBD1001', 47, 86, 'Vim Bar (250g)', 'Bar (250g)', 19, 20, 'Vim bar, with the power of 100 lemons removes the toughest grease and gives you a pleasant cleaning experience with its refreshing lemon fragrance. The \'Best Ever\' Vim bar was launched in 2016 and is the fastest to remove burnt food stains from utensils', 'Vim bar, with the power of 100 lemons removes the toughest grease and gives you a pleasant cleaning experience with its refreshing lemon fragrance. The \'Best Ever\' Vim bar was launched in 2016 and is the fastest to remove burnt food stains from utensils', '', 7, 7, 7, 'G4786852063', 'Vim', '', '', 'Top', '0', '2021-10-30 19:49:47', 'admin', '', '2021-11-06 16:27:06', 'admin', ''),
(87, 'G4786460101', 'GHRFBD1001', 47, 86, 'Sani Fresh Toilet Cleaner (200G)', 'Toilet Cleaner', 33, 35, 'These products are made from optimum quality component and under the assistance of highly skilled professionals.', 'These products are made from optimum quality component and under the assistance of highly skilled professionals.', '', 12, 12, 12, 'G4786173296', 'Sani', '', '', 'Latest', '0', '2021-10-31 15:38:28', 'admin', '', '2021-11-06 15:04:04', 'admin', ''),
(88, 'G4776184073', 'GHRFBD1001', 47, 76, 'MangalDeep Agarbatti ', 'Agarbatti ', 14, 15, 'Mangaldeep Dhoop sticks have a pure and rich natural aroma. ... Main Ingredients: Mangaldeep Sambrani Dhoop Sticks contain a unique and mesmerizing fragrance developed with Amber, and a touch of Musk, Sandalwood and Geranium.', 'Mangaldeep Dhoop sticks have a pure and rich natural aroma. ... Main Ingredients: Mangaldeep Sambrani Dhoop Sticks contain a unique and mesmerizing fragrance developed with Amber, and a touch of Musk, Sandalwood and Geranium.', '', 20, 20, 20, '', 'MANGALDEEP', '', '', 'Latest', '0', '2021-10-31 15:43:31', 'admin', '', '2021-11-06 16:25:42', 'admin', ''),
(89, 'G3961230141', 'GHRFBD1001', 39, 61, 'Maggi  2 Minute Masala Noodles  (70G)', 'Masala Noodles', 12, 12, 'Maggi noodles are dried noodles fused with oil, and sold with a packet of flavorings. These noodles are usually eaten after being cooked in boiling water for 3 to 5 minutes or eaten straight from the packet.', 'Maggi noodles are dried noodles fused with oil, and sold with a packet of flavorings. These noodles are usually eaten after being cooked in boiling water for 3 to 5 minutes or eaten straight from the packet.', '', 20, 20, 20, 'G2051973527', 'Maggie', '', '', 'Top', '0', '2021-10-31 15:55:40', 'admin', '', '2021-11-06 16:24:28', 'admin', ''),
(90, 'G4666524784', 'GHRFBD1001', 46, 66, 'Parachute Coconut Oil (175ml)', 'Coconut Oil', 70, 73, 'Parachute Coconut oil- India\'s No. 1 coconut oil contains only the goodness of 100% pure coconut oil. ... A tamper proof seal ensures that the rich aroma of raw coconuts is preserved for a long time. It contains no added chemicals, scent, additives or preservatives and lasts fresh & safe for up to 18 months.\n', 'Parachute Coconut oil- India\'s No. 1 coconut oil contains only the goodness of 100% pure coconut oil. ... A tamper proof seal ensures that the rich aroma of raw coconuts is preserved for a long time. It contains no added chemicals, scent, additives or preservatives and lasts fresh & safe for up to 18 months.\n', '', 4, 4, 4, 'G4776184073', 'Parachute ', '', '', 'Top', '0', '2021-10-31 15:59:32', 'admin', '', '0000-00-00 00:00:00', '', ''),
(91, 'G4666205232', 'GHRFBD1001', 46, 66, 'Parachut Jasmine Hair Oil  (90ml)', 'Jasmine Hair Oil ', 35, 38, 'With a non-sticky base, this hair oil also comes with the essence of jasmine which leaves your hair fragrant, light and fresh', 'With a non-sticky base, this hair oil also comes with the essence of jasmine which leaves your hair fragrant, light and fresh', '', 5, 5, 5, 'G4666524784', 'Parachut', '', '', 'Top', '0', '2021-10-31 16:05:00', 'admin', '', '2021-11-06 16:22:19', 'admin', ''),
(92, 'G4775307118', 'GHRFBD1001', 47, 75, 'Mortein Mosquito Coil', 'Mosquito Coil', 28, 30, 'Mortein power guard coil Mosquito Repellent contains a special feature that allows fighting mosquitoes in large open spaces', 'Mortein power guard coil Mosquito Repellent contains a special feature that allows fighting mosquitoes in large open spaces', '', 4, 4, 4, 'G4776184073', 'MORTEIN', '', '', 'Top', '0', '2021-10-31 16:21:25', 'admin', '', '2021-11-06 16:21:26', 'admin', ''),
(93, 'G4669458672', 'GHRFBD1001', 46, 69, 'Nivea Men ALL in one  (Face Wash)(100G)', 'Face Wash', 200, 250, 'This face wash prevents skin breakouts, blackheads, whiteheads and acne and gives you clear and healthy skin by reducing acne causing bacteria', 'This face wash prevents skin breakouts, blackheads, whiteheads and acne and gives you clear and healthy skin by reducing acne causing bacteria', '', 2, 2, 2, 'G4666524784', 'NIVEA', '', '', 'Latest', '0', '2021-10-31 16:25:40', 'admin', '', '2021-11-06 16:18:52', 'admin', ''),
(94, 'G4669106096', 'GHRFBD1001', 46, 69, 'Nivea Men Refreshing (150G)', 'Face Wash ', 140, 175, 'NIVEA Refreshing Wash Gel is enriched with highly purified water and sacred lotus flower. It cleanses your face and neck area deeply and removes daily impurities. In addition, the refreshing wash gel refreshes your skin while caring for it. The refreshing wash gel maintains your skin\'s natural moisture balance.', 'NIVEA Refreshing Wash Gel is enriched with highly purified water and sacred lotus flower. It cleanses your face and neck area deeply and removes daily impurities. In addition, the refreshing wash gel refreshes your skin while caring for it. The refreshing wash gel maintains your skin\'s natural moisture balance.', '', 1, 1, 1, 'G4669458672', 'NIVEA', '', '', 'Latest', '0', '2021-10-31 17:17:38', 'admin', '', '2021-11-06 16:17:03', 'admin', ''),
(95, 'G4666405077', 'GHRFBD1001', 46, 66, 'Godrej Expert Rich Creme (50G) BLACK', 'Rich Cream', 35, 38, 'Godrej Expert Rich Crème Hair Colour now in a new multi-application pack. ... Enriched with Aloe Vera & Milk Protein that keeps your hair unbelievably soft and shiny. Getting beautiful coloured hair just got simpler!  BLACK', 'Godrej Expert Rich Crème Hair Colour now in a new multi-application pack. ... Enriched with Aloe Vera & Milk Protein that keeps your hair unbelievably soft and shiny. Getting beautiful coloured hair just got simpler!  BLACK', '', 20, 20, 20, 'G4669458672', 'Godrej', '', '', 'Top', '0', '2021-10-31 17:26:54', 'admin', '', '2021-11-06 16:15:27', 'admin', ''),
(96, 'G4667966559', 'GHRFBD1001', 46, 67, 'DantKanti Toothpaste (100G)', 'DantKanti Toothpaste', 42, 45, 'Patanjali Dantkanti Dental Cream is a dental care herbal product offering for the protection of your teeth and gums. Brought to you from the stable of Patanjali brand of products, this herbal dental care cream helps tighten gums and fights germs.', 'Patanjali Dantkanti Dental Cream is a dental care herbal product offering for the protection of your teeth and gums. Brought to you from the stable of Patanjali brand of products, this herbal dental care cream helps tighten gums and fights germs.', '', 8, 8, 8, 'G4669106096', 'PATANJALI', '', '', 'Top', '0', '2021-10-31 17:32:39', 'admin', '', '2021-11-06 15:42:46', 'admin', ''),
(97, 'G4667659738', 'GHRFBD1001', 46, 67, 'ColgateToothpaste(100G)', 'Toothpaste (100g)', 52, 54, 'Good Quality', 'Good Quality', '', 20, 20, 20, 'G4667966559', 'COLGATE', '', '', 'Top', '0', '2021-10-31 18:06:05', 'admin', '', '2021-11-06 15:42:08', 'admin', ''),
(98, 'G4669771144', 'GHRFBD1001', 46, 69, 'Clean and clear Face wash (20ml)', 'Face Wash (20ml)', 18, 20, 'Clean & Clear Foaming Face Wash is specially designed for young skin - to remove excess oil, while its special ingredients help prevent pimples. Its liquid formula cleans deep without causing dryness, and is gentle enough to use every day, for clean and clear skin that glows.', 'Clean & Clear Foaming Face Wash is specially designed for young skin - to remove excess oil, while its special ingredients help prevent pimples. Its liquid formula cleans deep without causing dryness, and is gentle enough to use every day, for clean and clear skin that glows.', '', 10, 10, 10, 'G4669106096', 'CLEAN AND CLEAR', '', '', 'Top', '0', '2021-10-31 18:15:26', 'admin', '', '2021-11-06 15:41:29', 'admin', ''),
(99, 'G4667614327', 'GHRFBD1001', 46, 67, 'Colgate Plax mouth Freshner Masala (60ml)', 'Mouth Freshner', 28, 30, 'Use Colgate Plax twice a day after brushing for a cleaner, fresher, healthier mouth Contains natural tea extracts for a refreshing and pleasant tea aroma Removes over 99 percent germs 24X7 bad breath protection (when used twice daily) Provides long lasting fresh breath and prevents cavities Alcohol free formulation Colgate Plax Fresh Tea Mouthwash contains natural tea extracts for a refreshing and pleasant tea aroma. This mouthwash removes upto 99.9% germs thereby providing 12 hour protection against Plaque and Germs.', 'Use Colgate Plax twice a day after brushing for a cleaner, fresher, healthier mouth Contains natural tea extracts for a refreshing and pleasant tea aroma Removes over 99 percent germs 24X7 bad breath protection (when used twice daily) Provides long lasting fresh breath and prevents cavities Alcohol free formulation Colgate Plax Fresh Tea Mouthwash contains natural tea extracts for a refreshing and pleasant tea aroma. This mouthwash removes upto 99.9% germs thereby providing 12 hour protection against Plaque and Germs.', '', 1, 1, 1, 'G4667659738', 'COLGATE', '', '', 'Top', '1', '2021-10-31 18:20:55', 'admin', '', '2022-08-25 11:15:55', 'admin', ''),
(100, 'G4666125941', 'GHRFBD1001', 46, 66, 'Bajaj Amla Hair oil (80ml)', 'Amla Hair Oil', 18, 20, 'ajaj Amla Aloe Vera Hair Oil is a non-sticky hair oil that gives 3x softer* hair.\nIt is enriched with goodness of Amla and Aloe Vera extracts.\nThese ingredients are known to strengthen the hair, maintain natural color, makes the hair soft and impart shine to the hair, among other benefits.', 'ajaj Amla Aloe Vera Hair Oil is a non-sticky hair oil that gives 3x softer* hair.\nIt is enriched with goodness of Amla and Aloe Vera extracts.\nThese ingredients are known to strengthen the hair, maintain natural color, makes the hair soft and impart shine to the hair, among other benefits.', '', 5, 5, 5, 'G4666524784', 'Bajaj ', '', '', 'Top', '0', '2021-10-31 18:24:27', 'admin', '', '2021-11-06 15:38:09', 'admin', ''),
(101, 'G3964658204', 'GHRFBD1001', 39, 64, 'Maggi Rich Tomato Ketchup (1KG)', 'Tomato Ketchup', 135, 150, 'Nestle Maggi Tomato Ketchup is made with tomatoes and a combination of spices to create a truly lip-smacking flavour that everyone loves. ... Water, Sugar, Tomato Paste (23. 7%), Salt, Acidity Regulator (260), Thickening Agents (1422 And 415), Dehydrated Onion, Dehydrated Garlic, Preservative (211) And Mixed Spices', 'Nestle Maggi Tomato Ketchup is made with tomatoes and a combination of spices to create a truly lip-smacking flavour that everyone loves. ... Water, Sugar, Tomato Paste (23. 7%), Salt, Acidity Regulator (260), Thickening Agents (1422 And 415), Dehydrated Onion, Dehydrated Garlic, Preservative (211) And Mixed Spices', '', 2, 2, 2, 'G3961230141', 'Maggi', '', '', 'Top', '0', '2021-11-01 20:26:44', 'admin', '', '2021-11-06 15:36:50', 'admin', ''),
(102, 'G4773576920', 'GHRFBD1001', 47, 73, 'Colin Shine (250ml)', 'Shine (250ml)', 58, 60, 'Colin Glass Cleaner contains the power of shine boosters\nIt removes dirt and dust and also gives \"2 times more shine*” than regular cleaners\nCan be used across glass and shiny surfaces, such as tabletops, mirrors, glass', 'Colin Glass Cleaner contains the power of shine boosters\nIt removes dirt and dust and also gives \"2 times more shine*” than regular cleaners\nCan be used across glass and shiny surfaces, such as tabletops, mirrors, glass', '', 4, 4, 4, 'G4667614327', 'Colin', '', '', 'Top', '0', '2021-11-01 20:34:45', 'admin', '', '2021-11-06 15:34:48', 'admin', ''),
(103, 'G2053342490', 'GHRFBD1001', 20, 53, 'Tata Namak (1KG)', 'Namak (1kg)', 20, 22, ' Every pack of Tata Salt comes with a promise of purity a promise that is ensured through its vacuum-evaporation manufacturing process Vacuum Evaporated Iodised Salt. The promise of Purity Vacuum Evaporation manufacturing technology. Hygienic product that is untouched by hands and free from any impurities.', ' Every pack of Tata Salt comes with a promise of purity a promise that is ensured through its vacuum-evaporation manufacturing process Vacuum Evaporated Iodised Salt. The promise of Purity Vacuum Evaporation manufacturing technology. Hygienic product that is untouched by hands and free from any impurities.', '', 8, 8, 8, 'G3964658204', 'TATA', '', '', 'Top', '0', '2021-11-01 20:56:04', 'admin', '', '2021-11-06 15:33:33', 'admin', ''),
(104, 'G3964855558', 'GHRFBD1001', 39, 63, 'Kisan Jam(100G)', 'Jam(100g)', 18, 20, 'Kissan Mixed Fruit Jam is a delicious blend of 8 different fruits Pineapple, Orange, Apple, Grape, Mango, Pear, Papaya, and Banana.', 'Kissan Mixed Fruit Jam is a delicious blend of 8 different fruits Pineapple, Orange, Apple, Grape, Mango, Pear, Papaya, and Banana.', '', 3, 3, 3, 'G3964658204', 'KISAN', '', '', 'Top', '0', '2021-11-02 10:36:47', 'admin', '', '2021-11-06 15:32:18', 'admin', ''),
(105, 'G4777594528', 'GHRFBD1001', 47, 77, 'Shoe Cleaner  Cherry (40G) TAN', 'Shoe Cleaner ', 51, 59, 'For tan shoes', 'For tan shoes', '', 5, 5, 5, 'G4773576920', 'CHERRY', '', '', 'Latest', '0', '2021-11-02 16:34:42', 'admin', '', '2021-11-06 16:43:07', 'admin', ''),
(106, 'G2050809786', 'GHRFBD1001', 20, 50, 'Rajdhani Besan (1KG)', 'Besan (1kg)', 90, 139, 'We provide Rajdhani besan which is used for making varied food items. It is a fine, pale yellow color flour which is made from roasted chana. Our superior quality besan has got a rich amount of carbohydrate, which is suitable for gluten free diets.', 'We provide Rajdhani besan which is used for making varied food items. It is a fine, pale yellow color flour which is made from roasted chana. Our superior quality besan has got a rich amount of carbohydrate, which is suitable for gluten free diets.', '', 5, 5, 5, '', 'RAJDHANI', '', '', 'Top', '0', '2021-11-02 16:41:24', 'admin', '', '2022-08-27 11:48:49', 'admin', ''),
(107, 'G2050540971', 'GHRFBD1001', 20, 50, 'Fortune Besan (1kg)', 'Besan (1kg)', 97, 120, 'Fortune Besan is hygienic made from 100% chana dal and passes through more than 25 quality checks and processed with advanced grinding technology which retains the flavors and aroma of natural chana dal.\n', 'Fortune Besan is hygienic made from 100% chana dal and passes through more than 25 quality checks and processed with advanced grinding technology which retains the flavors and aroma of natural chana dal.', '', 1, 1, 1, 'G2050809786', 'FORTUNE', '', '', 'Top', '0', '2021-11-02 16:47:06', 'admin', '', '2021-11-06 16:48:56', 'admin', ''),
(108, 'G4773539167', 'GHRFBD1001', 20, 50, 'Ashirwaad Atta(5KG)', 'ATTA (5KG)', 170, 193, 'This atta is a blend of whole wheat and \'Natural Grain Mix\' including methi and oats which ensures that the atta is rich in protein and fibre with low Glycaemic index (GI) without compromising on taste.', 'This atta is a blend of whole wheat and \'Natural Grain Mix\' including methi and oats which ensures that the atta is rich in protein and fibre with low Glycaemic index (GI) without compromising on taste.', '', 7, 7, 7, 'G2050540971', 'Ashirwad', '', '', 'Top', '0', '2021-11-02 16:49:48', 'admin', '', '2021-11-06 15:25:27', 'admin', ''),
(109, 'G2050905700', 'GHRFBD1001', 20, 50, 'Badshah Atta (5KG)', 'Badshah Atta', 250, 260, 'Best Quality atta', 'Best Quality atta', '', 1, 1, 1, 'G4773539167', 'Badshah', '', '', 'Top', '2', '2021-11-02 16:58:12', 'admin', '', '2021-11-02 17:00:43', 'admin', ''),
(110, 'G2052488418', 'GHRFBD1001', 20, 52, 'IndiaGate Rice Dubar  (5KG)', 'Dubar Rice', 484, 605, 'ndia Gate Basmati Rice Dubar is long and thin grain basmati rice. It is aromatic and tastes good and can be served on special occasions. It can be used to prepare various rice cuisines like Biryani, panchratan pulav and even desserts like kheer, burfi or payasam. India gate is the product of KRBL Ltd, a heritage group that is in existence from last 120 years.\nIngredient Description', 'ndia Gate Basmati Rice Dubar is long and thin grain basmati rice. It is aromatic and tastes good and can be served on special occasions. It can be used to prepare various rice cuisines like Biryani, panchratan pulav and even desserts like kheer, burfi or payasam. India gate is the product of KRBL Ltd, a heritage group that is in existence from last 120 years.\nIngredient Description', '', 4, 4, 4, 'G4773539167', 'Indiagate', '', '', 'Top', '0', '2021-11-02 17:05:26', 'admin', '', '2021-11-02 17:53:31', 'admin', ''),
(111, 'G2052320110', 'GHRFBD1001', 20, 52, 'India Gate Rice TIBER (5kg)', 'Tibar Rice', 508, 635, 'India Gate Basmati Rice Tibar is long and thin grain basmati rice. It is aromatic and tastes good and can be served on special occasions. It can be used to prepare various rice cuisines like Biryani, Panchratan Pulav and even desserts like kheer, burfi or payasam', 'India Gate Basmati Rice Tibar is long and thin grain basmati rice. It is aromatic and tastes good and can be served on special occasions. It can be used to prepare various rice cuisines like Biryani, Panchratan Pulav and even desserts like kheer, burfi or payasam', '', 4, 4, 4, 'G2052488418', 'India Gate', '', '', 'Top', '0', '2021-11-02 17:13:56', 'admin', '', '2021-11-02 17:53:09', 'admin', ''),
(112, 'G2052162766', 'GHRFBD1001', 20, 52, 'Indiagate Rice Rozzana (5kg)', 'Rozzana Rice', 380, 475, 'India Gate Feast Rozzana Rice is aged Basmati rice for daily use\nPearlescent white grains that do not stick to each other or break when cooked\nSlender grains with good elongation', 'India Gate Feast Rozzana Rice is aged Basmati rice for daily use\nPearlescent white grains that do not stick to each other or break when cooked\nSlender grains with good elongation', '', 4, 4, 4, 'G2052320110', 'IndiaGate', '', '', 'Top', '0', '2021-11-02 17:33:24', 'admin', '', '2021-11-02 17:52:45', 'admin', ''),
(113, 'G2052254573', 'GHRFBD1001', 20, 52, 'Indiagate Rice Regular choice (10kg)', 'Regular Choice', 600, 750, 'India Gate Regular Choice Rice is aged Basmati rice for daily use. Has Pearlescent white grains that do not stick to each other or break when cooked. Has a distinct Basmati aroma. Slender grains with good elongation.', 'India Gate Regular Choice Rice is aged Basmati rice for daily use. Has Pearlescent white grains that do not stick to each other or break when cooked. Has a distinct Basmati aroma. Slender grains with good elongation.', '', 2, 2, 2, 'G2052162766', 'Indiagate', '', '', 'Top', '0', '2021-11-02 17:45:32', 'admin', '', '2021-11-02 17:52:24', 'admin', ''),
(114, 'G2052254466', 'GHRFBD1001', 20, 52, 'Indiagate Rice Mogra (10kg)', 'Mogra Rice', 472, 590, 'National brand Used finest quality basmati Suitable for all food India Gate Basmati Rice Mini Mogra is cultivated in the Terai region of the North-Western Himalaya. The highest quality harvest of the region is tested, procured and then sent for ageing for a minimum period of one year in the most conducive environment of the company owned storage. The length of this rice is 1/4th of a full length Basmati rice.', 'National brand Used finest quality basmati Suitable for all food India Gate Basmati Rice Mini Mogra is cultivated in the Terai region of the North-Western Himalaya. The highest quality harvest of the region is tested, procured and then sent for ageing for a minimum period of one year in the most conducive environment of the company owned storage. The length of this rice is 1/4th of a full length Basmati rice.', '', 2, 2, 2, 'G2052254573', 'Indiagate', '', '', 'Top', '0', '2021-11-02 17:50:08', 'admin', '', '2021-11-02 17:55:30', 'admin', ''),
(115, 'G4666942805', 'GHRFBD1001', 46, 66, 'Head and shoulder sampoo (72ml)', 'Sampoo (72ml)', 65, 68, 'Get Rid Of Dandruff In One Wash With The Best Anti-Dandruff Shampoo From Head & Shoulders. Leave Your Dandruff Worries Away With The Best Anti-Dandruff Shampoo - Head & Shoulders. Best Dandruff Solution. Clinically Proven. Clean Dandruff in 1 wash', 'Get Rid Of Dandruff In One Wash With The Best Anti-Dandruff Shampoo From Head & Shoulders. Leave Your Dandruff Worries Away With The Best Anti-Dandruff Shampoo - Head & Shoulders. Best Dandruff Solution. Clinically Proven. Clean Dandruff in 1 wash', '', 4, 4, 4, 'G4666125941', 'Head and shoulder', '', '', 'Top', '0', '2021-11-02 17:59:26', 'admin', '', '2021-11-06 15:20:31', 'admin', ''),
(116, 'G4666603329', 'GHRFBD1001', 46, 66, 'Clinic Plus sampoo (80ml)', 'Sampoo (80ml)', 50, 52, 'Clinic Plus Strong & Long Health Shampoo, in the net quantity of 80ml, is enriched with Milk Protein. This helps nourish the hair, strengthening it from the root to the tip. It prevents hair fall, promoting hair growth. ... This shampoo also moisturizes the hair, making it soft, smooth and silky.', 'Clinic Plus Strong & Long Health Shampoo, in the net quantity of 80ml, is enriched with Milk Protein. This helps nourish the hair, strengthening it from the root to the tip. It prevents hair fall, promoting hair growth. ... This shampoo also moisturizes the hair, making it soft, smooth and silky.', '', 6, 6, 6, 'G4666942805', 'Clinic Plus', '', '', 'Top', '0', '2021-11-02 18:02:51', 'admin', '', '2021-11-06 15:31:41', 'admin', ''),
(117, 'G2049527614', 'GHRFBD1001', 20, 49, 'Pansari mustard Mustard Oil (1ltr)', 'Mustard Oil', 188, 253, 'Pansari Shudh Kachi Ghani Mustard Oil is a healthy choice for cooking your meals. The oil is prepared from the choicest of seeds to keep the quality fresh and pure. Strong aroma and pungent flavour, ideal for preserving pickles and also gives them a strong taste.', 'Pansari Shudh Kachi Ghani Mustard Oil is a healthy choice for cooking your meals. The oil is prepared from the choicest of seeds to keep the quality fresh and pure. Strong aroma and pungent flavour, ideal for preserving pickles and also gives them a strong taste.', '', 12, 12, 12, 'G2050540971', 'Pansari', '', '', 'Top', '0', '2021-11-02 18:06:35', 'admin', '', '2021-11-06 15:18:34', 'admin', ''),
(118, 'G4685687348', 'GHRFBD1001', 46, 85, 'Godrej No.1 Soap  4+1', 'soap (100g)', 88, 90, 'Use Godrej No.1 soap Sandal and Turmeric for healthy and clear skin that glows with nourishment.\n\n    Enriched with sandal and turmeric.\n    Cleans skin to remove impurities.\n    Adds a healthy glow.\n    For all skin types.', 'Use Godrej No.1 soap Sandal and Turmeric for healthy and clear skin that glows with nourishment.\n\n    Enriched with sandal and turmeric.\n    Cleans skin to remove impurities.\n    Adds a healthy glow.\n    For all skin types.', '', 10, 10, 10, 'G4669106096', 'Godrej NO.1', '', '', 'Top', '0', '2021-11-02 18:15:43', 'admin', '', '2021-11-06 15:20:53', 'admin', ''),
(119, 'G4773673188', 'GHRFBD1001', 47, 73, 'MDH Jeera Powder (100 GM)', 'fff', 5, 5, 'ff', 'ff', '', 0, 5, 5, 'G4685687348', 'd', '', '', '', '2', '2021-11-02 20:34:55', 'admin', '', '2021-11-02 20:35:32', 'admin', ''),
(120, 'G2154996928', 'GHRFBD1001', 21, 54, 'Navratan Mix, 400 g', 'Navratan Mix', 93, 109, 'Very special Bikano Navratan Mixture is now available at your doorstep. This ready to eat snack is a delicious hot and spicy blend of savoury noodles, lentils, peanuts, rice flakes and sun dried potato chips. Bikano Navratan Mixture is healthy, has zero cholestrol, , and has no onion and garlic', 'Very special Bikano Navratan Mixture is now available at your doorstep. This ready to eat snack is a delicious hot and spicy blend of savoury noodles, lentils, peanuts, rice flakes and sun dried potato chips. Bikano Navratan Mixture is healthy, has zero cholestrol, , and has no onion and garlic', '', 2, 2, 2, 'G3961230141', 'Bicano', '', '', 'Latest', '0', '2021-11-03 15:44:39', 'admin', '', '2021-11-06 15:13:44', 'admin', ''),
(121, 'G2154955329', 'GHRFBD1001', 21, 54, 'Aloo Bhujia Namkeen (400g)', 'Aloo Bhujia', 89, 91, 'A snack food similar to spiced potato strings. Made from potatoes, palm oil, gram flour, tapary beans flour, mint, salt, spices in mild flavor Wonderful in taste, try it!', 'A snack food similar to spiced potato strings. Made from potatoes, palm oil, gram flour, tapary beans flour, mint, salt, spices in mild flavor Wonderful in taste, try it!', '', 2, 2, 2, 'G2154996928', 'Haldiram', '', '', 'Latest', '0', '2021-11-03 16:03:29', 'admin', '', '2021-11-04 09:39:03', 'admin', ''),
(122, 'G2154205309', 'GHRFBD1001', 21, 54, 'Navrattan, 200g+20g Free', ' Navrattan', 42, 44, 'Haldirams Navrattan is a delicious, hot and spicy blend of savoury noodles, lentils, peanuts, puffed rice and sun dried potato chips. With zero cholesterol, this mix of ingredients make for a hearty and healthy treat to binge on!', 'Haldirams Navrattan is a delicious, hot and spicy blend of savoury noodles, lentils, peanuts, puffed rice and sun dried potato chips. With zero cholesterol, this mix of ingredients make for a hearty and healthy treat to binge on!', '', 2, 2, 2, 'G2154996928', 'Haldiram', '', '', 'Latest', '0', '2021-11-03 16:17:36', 'admin', '', '2021-11-06 15:10:26', 'admin', ''),
(123, 'G2154556208', 'GHRFBD1001', 21, 54, 'Salted Peanuts Namkeen (200g)', 'Salted Peanuts ', 46, 48, 'Haldiram\'s Classic Salted Peanuts, a classic combination of roasted peanuts with the right amount of salt. A perfect crunchy snack to binge on anytime of the day.', 'Haldiram\'s Classic Salted Peanuts, a classic combination of roasted peanuts with the right amount of salt. A perfect crunchy snack to binge on anytime of the day.', '', 2, 2, 2, 'G2154205309', 'Haldiram', '', '', 'Latest', '0', '2021-11-03 16:23:32', 'admin', '', '2021-11-06 15:09:12', 'admin', ''),
(124, 'G2154966955', 'GHRFBD1001', 21, 54, 'Bhujia Namkeen (400g)', 'Bhujia Namkeen', 109, 119, 'Bikano Bikaneri Bhujia is made up of fried spicy noodles of dew gram flour and gram flour.It is hygienically processed and specially packed in zip lock for long shelf life and freshness of flavour.', 'Bikano Bikaneri Bhujia is made up of fried spicy noodles of dew gram flour and gram flour.It is hygienically processed and specially packed in zip lock for long shelf life and freshness of flavour.', '', 2, 2, 2, 'G2154996928', 'Bicano', '', '', 'Latest', '0', '2021-11-03 16:40:12', 'admin', '', '2021-11-04 09:38:14', 'admin', ''),
(125, 'G2154567185', 'GHRFBD1001', 21, 54, 'Moong Dal, [200g ]', 'Moong Dal', 49, 55, 'Desh ka namkeen\nCrunchy green gram\nStore in cool and dry place,away from direct sunlight\nGood taste', 'Desh ka namkeen\nCrunchy green gram\nStore in cool and dry place,away from direct sunlight\nGood taste', '', 2, 2, 2, 'G2154966955', 'Bicano', '', '', 'Latest', '1', '2021-11-03 16:48:59', 'admin', '', '2021-11-24 19:48:02', 'admin', ''),
(126, 'G2154699758', 'GHRFBD1001', 21, 54, 'Bikano Aloo Bhujia Namkeen spicy (200G)', 'Aloo Bhujia', 49, 55, 'ikaneri Aloo Bhujia Is Prepared From Potatoes And Special Spice, This Snack Has A Nice Highly Spiced Flavour. The Tastes Enormous With Any Food You Have. Carry A Small Suitable Pack To Your Office And Have Something To Munch On When Hungry.', 'ikaneri Aloo Bhujia Is Prepared From Potatoes And Special Spice, This Snack Has A Nice Highly Spiced Flavour. The Tastes Enormous With Any Food You Have. Carry A Small Suitable Pack To Your Office And Have Something To Munch On When Hungry.', '', 2, 2, 2, 'G2154567185', 'Bicano', '', '', 'Latest', '1', '2021-11-03 16:57:59', 'admin', '', '2021-11-24 19:47:42', 'admin', ''),
(127, 'G2154245957', 'GHRFBD1001', 21, 54, 'Bikano Khatta Meetha  (200 g)', ' Khatta Meetha', 49, 55, 'Bikaneri Khatta Meetha Has Sugary Pronunciations With Golden Raisins, A Tart Spice Flavoring And Salty Chickpea Flour Strings. And This Mild Highly Spiced Snack Is Prepared Of Main Ingredients Like Green , Gram Flour Noodles And Boondi', 'Bikaneri Khatta Meetha Has Sugary Pronunciations With Golden Raisins, A Tart Spice Flavoring And Salty Chickpea Flour Strings. And This Mild Highly Spiced Snack Is Prepared Of Main Ingredients Like Green , Gram Flour Noodles And Boondi', '', 2, 2, 2, 'G2154699758', 'Bicano', '', '', 'Latest', '0', '2021-11-03 17:04:59', 'admin', '', '2021-11-06 15:06:05', 'admin', ''),
(128, 'G2051330334', 'GHRFBD1001', 20, 51, 'Everest \'Meat Masala Jaar', 'Masala Jaar ', 143, 147, 'Everest Meat Masala is one such masala to arrange the delectable tasty meat. A pepper-coriander-chilli based combine that imparts a dark tan and a hot taste to non-veg dishes, particularly meat. Since Indians loves their meat actually spiced up, a fair amount of flavoring spices lend this merge a sweet-smelling chorus.', 'Everest Meat Masala is one such masala to arrange the delectable tasty meat. A pepper-coriander-chilli based combine that imparts a dark tan and a hot taste to non-veg dishes, particularly meat. Since Indians loves their meat actually spiced up, a fair amount of flavoring spices lend this merge a sweet-smelling chorus.', '', 5, 5, 5, '', 'Everest \'Meat', '', '', 'Top', '0', '2021-11-25 20:33:21', 'admin', '', '2021-11-26 12:59:05', 'admin', ''),
(129, 'G2051943457', 'GHRFBD1001', 20, 51, 'Everest Pani Puri ', 'Puri (50gm)', 31, 31, 'A perfect blend of pure spices\nEnhances the taste of your dish\nPani in Hindi means water. Puri is a fried hollow ball made from wheat flour. The Puri is punctured open on one side and stuffed with delicious fillings and topped with Pani. The Puri is then eaten in a mouth full. This is one of Indias most popular outdoor snacks.\nBlack Pepper, Tamarind, and Dry Ginger combine together to give a sharp twinkle to this Everest Blend that spices the Pani.', 'A perfect blend of pure spices\nEnhances the taste of your dish\nPani in Hindi means water. Puri is a fried hollow ball made from wheat flour. The Puri is punctured open on one side and stuffed with delicious fillings and topped with Pani. The Puri is then eaten in a mouth full. This is one of Indias most popular outdoor snacks.\nBlack Pepper, Tamarind, and Dry Ginger combine together to give a sharp twinkle to this Everest Blend that spices the Pani.', '', 5, 5, 5, 'G2051330334', 'Everest Pani', '', '', 'Top', '0', '2021-11-26 12:37:16', 'admin', '', '2021-11-26 12:58:56', 'admin', ''),
(130, 'G2051934619', 'GHRFBD1001', 20, 51, 'Everest Pav Bhaji Masala', 'Bhaji Masala', 35, 37, 'Everest Pav Bhaji Masala is a special blend of spices used to prepare everyone’s favourite street-snack Pav Bhaji. Add a teaspoon of this masala to the mashed vegetables (bhaji) and serve with hot pavs (buns) with loads of extra butter. Buy this product online in Ranchi today.', 'Everest Pav Bhaji Masala is a special blend of spices used to prepare everyone’s favourite street-snack Pav Bhaji. Add a teaspoon of this masala to the mashed vegetables (bhaji) and serve with hot pavs (buns) with loads of extra butter. Buy this product online in Ranchi today.', '', 5, 5, 5, 'G2051943457', 'Everest Pav', '', '', 'Top', '0', '2021-11-26 12:50:46', 'admin', '', '2021-11-26 12:58:39', 'admin', ''),
(131, 'G2051116531', 'GHRFBD1001', 20, 51, 'Patanjali Garam Masala ', 'Masala (100g)', 70, 70, 'Garam Masala is a blend of basic spices some of which include cumin, cloves, black and white peppercorns, cardamom, coriander seeds etc. It is used in small quantities in combination with some other spices or alone. It can be added during the early part of the cooking process or towards the end when the dish is ready and still hot. Just half a spoon of this spice mix will give your alu matar, rongi and paneer curry a mouth-watering flavour!\n\n', 'Garam Masala is a blend of basic spices some of which include cumin, cloves, black and white peppercorns, cardamom, coriander seeds etc. It is used in small quantities in combination with some other spices or alone. It can be added during the early part of the cooking process or towards the end when the dish is ready and still hot. Just half a spoon of this spice mix will give your alu matar, rongi and paneer curry a mouth-watering flavour!\n\n', '', 5, 5, 5, 'G2051330334', 'Patanjali Garam ', '', '', 'Top', '0', '2021-11-26 13:10:57', 'admin', '', '2022-08-27 11:46:52', 'admin', ''),
(132, 'G2051373827', 'GHRFBD1001', 20, 51, 'Everest Tikhalal Chili Powder ', 'Chili Powder ', 260, 260, 'Made from finest chilly to give best taste                                                                                                                                                                                                                                                                                                                                  The spicy taste of Indian food can be likened with the Paprika bearing Mexican cuisine that sets your palate on appetising fire! Everest is a brand that has been well known for qualitative spices and spice mixes as well. This spice blend is one that brings in the fiery magic of red chillies, well known in India!', 'Made from finest chilly to give best taste                                                                                                                                                                                                                                                                                                                                  The spicy taste of Indian food can be likened with the Paprika bearing Mexican cuisine that sets your palate on appetising fire! Everest is a brand that has been well known for qualitative spices and spice mixes as well. This spice blend is one that brings in the fiery magic of red chillies, well known in India!', '', 10, 10, 10, 'G2051116531', 'Everest Tikhalal', '', '', 'Top', '0', '2021-11-26 15:53:32', 'admin', '', '2022-08-27 11:46:31', 'admin', ''),
(133, 'G2051402764', 'GHRFBD1001', 20, 51, 'Everest Hingraj ', 'Hingraj 100g', 240, 240, 'This spice is used as a digestive aid, in food as a condiment, and in pickling. It plays a critical flavouring role in Indian vegetarian cuisine by acting as an umami enhancer. Used along with turmeric, it is a standard component of lentil curries such as dal, sambar as well as in numerous vegetable dishes, especially those based on potato and cauliflower.', 'This spice is used as a digestive aid, in food as a condiment, and in pickling. It plays a critical flavouring role in Indian vegetarian cuisine by acting as an umami enhancer. Used along with turmeric, it is a standard component of lentil curries such as dal, sambar as well as in numerous vegetable dishes, especially those based on potato and cauliflower.', '', 5, 5, 5, 'G2051330334', 'Everest', '', '', 'Top', '0', '2021-11-26 16:15:41', 'admin', '', '2022-08-27 11:46:09', 'admin', ''),
(134, 'G2051876778', 'GHRFBD1001', 20, 51, 'Everest Coriander / Dhaniya ', 'Dhaniya 200 g ', 84, 84, 'Everest Coriander Powder is a perfect blend of garden-fresh aroma and a natural green colour that thickens gravies and gives it an authentic taste. It widely used to give Indian curries a distinct flavour. It is used for thickening gravies and curries.', 'Everest Coriander Powder is a perfect blend of garden-fresh aroma and a natural green colour that thickens gravies and gives it an authentic taste. It widely used to give Indian curries a distinct flavour. It is used for thickening gravies and curries.', '', 10, 10, 10, 'G2051116531', 'Everest Coriander', '', '', 'Top', '0', '2021-11-26 16:51:44', 'admin', '', '2022-08-27 11:45:33', 'admin', ''),
(135, 'G5284941384', 'GHRFBD1001', 52, 84, 'Dreamery Cheese Slices (Pack) ', ' Slices (200gm)', 120, 140, 'Dreamery Cheese Slices are made from the goodness of cow\'s milk and are high in protein and calcium. Its lip-smacking taste will want you to add cheese in everything you eat. It makes your food yummier and healthy. ... Contains the goodness of Cow Milk.', 'Dreamery Cheese Slices are made from the goodness of cow\'s milk and are high in protein and calcium. Its lip-smacking taste will want you to add cheese in everything you eat. It makes your food yummier and healthy. ... Contains the goodness of Cow Milk.', '', 5, 5, 5, 'G3964855558', 'DREAMERY Cheese', '', '', 'Top', '1', '2021-11-26 17:13:54', 'admin', '', '2022-08-25 11:19:47', 'admin', ''),
(136, 'G5284953434', 'GHRFBD1001', 52, 84, 'Britannia Cheese Spreadz', 'Spreadz (180gm)', 95, 110, 'Britannia Cheese proudly offers the widest range of cheese in India- Slices, Cubes, Blocks, Spreads, Pizza Cheese, Low-fat cheese and Cream Cheese.\n', 'Britannia Cheese proudly offers the widest range of cheese in India- Slices, Cubes, Blocks, Spreads, Pizza Cheese, Low-fat cheese and Cream Cheese.\n', '', 5, 5, 5, 'G5284941384', 'Britannia Cheese', '', '', 'Top', '1', '2021-11-26 18:03:51', 'admin', '', '2022-08-25 11:19:28', 'admin', ''),
(137, 'G5284846946', 'GHRFBD1001', 52, 84, 'Amul Plain Cheese Spread', 'Cheese Spread', 85, 90, 'Amul is the leading brand in India for its food products and the beverage products and is known for high quality milk and milk products\nAmul Cheese spread\n\nAmul cheese spread is 100% vegeterian\nIt can be used as garnish or can be eaten alone\nNet weight of the pack is 200gms\nNutrient content\n\nEnriched with protein\nThe product contains low calorie and cholesterol content', 'Amul is the leading brand in India for its food products and the beverage products and is known for high quality milk and milk products\nAmul Cheese spread\n\nAmul cheese spread is 100% vegeterian\nIt can be used as garnish or can be eaten alone\nNet weight of the pack is 200gms\nNutrient content\n\nEnriched with protein\nThe product contains low calorie and cholesterol content', '', 5, 5, 5, 'G5284953434', 'Amul Plain ', '', '', 'Top', '1', '2021-11-26 18:13:43', 'admin', '', '2022-08-25 11:16:19', 'admin', '');
INSERT INTO `v_product` (`id`, `product_id`, `vendor_id`, `category_id`, `sub_category_id`, `name`, `short_name`, `price`, `MRP_price`, `description`, `short_description`, `hsn_code`, `total_availability`, `left_quantity`, `total_quantity`, `related_product_id`, `brand_name`, `image`, `image2`, `product_type`, `status`, `created_on`, `created_by`, `created_ip`, `modified_on`, `modified_by`, `modified_ip`) VALUES
(138, 'G2199681340', 'GHRFBD1001', 21, 99, 'Cadbury Dairy Milk Chocolate ', 'Milk Chocolate ', 10, 10, 'Sugar, Cocoa Butter, Cocoa Mass, Vegetable Fats (Palm, Shea), Emulsifiers (E442, E476), Flavourings, **The equivalent of 426 ml of Fresh Liquid Milk in every 227 g of Milk Chocolate, Milk Solids 20 % minimum, actual 23 %, Cocoa Solids 20 % minimum, Contains Vegetable Fats in addition to Cocoa Butter', 'Sugar, Cocoa Butter, Cocoa Mass, Vegetable Fats (Palm, Shea), Emulsifiers (E442, E476), Flavourings, **The equivalent of 426 ml of Fresh Liquid Milk in every 227 g of Milk Chocolate, Milk Solids 20 % minimum, actual 23 %, Cocoa Solids 20 % minimum, Contains Vegetable Fats in addition to Cocoa Butter', '', 10, 10, 10, 'G5284846946', 'Cadbury Dairy', '', '', 'Top', '0', '2021-11-26 18:28:31', 'admin', '', '2021-11-26 18:36:38', 'admin', ''),
(139, 'G2199338837', 'GHRFBD1001', 21, 99, 'Cadbury Celebration Pack (186.6g)', 'Celebration Pack', 150, 199, 'It is specially designed to give you an unforgettable and delightful experience with your loved one and it also offers you a reason to celebrate every small and big occasion with happiness.', 'It is specially designed to give you an unforgettable and delightful experience with your loved one and it also offers you a reason to celebrate every small and big occasion with happiness.', '', 10, 10, 199, 'G2199681340', 'Cadbury', '', '', 'Top', '1', '2021-11-28 15:24:09', 'admin', '', '2022-08-25 11:20:49', 'admin', ''),
(140, 'G2199453718', 'GHRFBD1001', 21, 99, 'Parley Kaccha Mango Bite Toffee 1 packet (100pcs)', 'Mango Toffee', 50, 50, '\nExperience the natural and tanginess of a raw mango with the Parle Kaccha Mango Bite Candy, which we provide. It is the only candy where you get the taste of your favourite mangoes. Having a natural flavor, these Parle Kaccha Mango Bite Candies are properly and hygienically packed.', 'Experience the natural and tanginess of a raw mango with the Parle Kaccha Mango Bite Candy, which we provide. It is the only candy where you get the taste of your favourite mangoes. Having a natural flavor, these Parle Kaccha Mango Bite Candies are properly and hygienically packed.', '', 10, 10, 10, 'G2199338837,G2199681340', 'Parley Kaccha', '', '', 'Top', '0', '2021-11-28 15:42:59', 'admin', '', '0000-00-00 00:00:00', '', ''),
(141, 'G2199783871', 'GHRFBD1001', 21, 99, 'KitKat Dessert Delight Truffle  Wafer Chocolate bar', 'Wafer Chocolate', 50, 55, 'With rich cream- caramel milk chocolate coating over cocoa wafer cubes Nestlé KITKAT Dessert Delight Choco Pudding gives you a delectable dessert experience anytime you want. This divine choco pudding is the ideal delightful treat when you’re in mood for something fun and unique. \n\nEnjoying dessert delight choco pudding, wafer coated with milk chocolate as part of a balanced diet is one of life’s little pleasures and this KITKAT makes a perfect delicious treat with only approx. 55 calories per serving (3 cubes). So, break your way to delicious KITKAT wafer recipes or simply open up for delight in every bite! HAVE A BREAK, HAVE A KITKAT.', 'With rich cream- caramel milk chocolate coating over cocoa wafer cubes Nestlé KITKAT Dessert Delight Choco Pudding gives you a delectable dessert experience anytime you want. This divine choco pudding is the ideal delightful treat when you’re in mood for something fun and unique. \n\nEnjoying dessert delight choco pudding, wafer coated with milk chocolate as part of a balanced diet is one of life’s little pleasures and this KITKAT makes a perfect delicious treat with only approx. 55 calories per serving (3 cubes). So, break your way to delicious KITKAT wafer recipes or simply open up for delight in every bite! HAVE A BREAK, HAVE A KITKAT.', '', 10, 10, 10, 'G2199453718,G2199338837,G2199681340', 'KitKat Dessert', '', '', 'Top', '0', '2021-11-28 15:55:10', 'admin', '', '0000-00-00 00:00:00', '', ''),
(142, 'G2199825430', 'GHRFBD1001', 21, 99, 'Cadbury Dairy Milk Paan Jeer chocolate', 'Milk chocolate', 45, 45, 'Cadbury Dairy Milk Paan Jeer Madbury Chocolate Bar, 36g ', 'Cadbury Dairy Milk Paan Jeer Madbury Chocolate Bar, 36g ', '', 10, 10, 10, 'G2199783871,G2199453718,G2199338837,G2199681340', 'Cadbury Dairy', '', '', 'Top', '0', '2021-11-28 16:07:26', 'admin', '', '0000-00-00 00:00:00', '', ''),
(143, 'G2199727722', 'GHRFBD1001', 21, 99, 'KitKat Wafer Chocolate 55 g', 'Chocolate', 40, 40, 'A delicious wafer bar to make your breaks worth it KitKat is suitable for vegetarians\nIngredients\nSugar, Milk Solids, Refined Wheat Flour (Maida), Hydrogenated Vegetable Fats (Contain Sesame Oil), Edible Vegetable Fats, Cocoa Solids (4.4 %), Emulsifier (Soya Lecithin), Raising Agent (500(ii)), Yeast, Flour Treatment Agents 516 And 1101(i)) & Iodized Salt.', 'A delicious wafer bar to make your breaks worth it KitKat is suitable for vegetarians\nIngredients\nSugar, Milk Solids, Refined Wheat Flour (Maida), Hydrogenated Vegetable Fats (Contain Sesame Oil), Edible Vegetable Fats, Cocoa Solids (4.4 %), Emulsifier (Soya Lecithin), Raising Agent (500(ii)), Yeast, Flour Treatment Agents 516 And 1101(i)) & Iodized Salt.', '', 10, 10, 10, 'G2199825430,G2199783871,G2199453718,G2199338837,G2199681340', 'KitKat Wafer', '', '', 'Latest', '0', '2021-11-28 16:20:23', 'admin', '', '0000-00-00 00:00:00', '', ''),
(144, 'G2199145231', 'GHRFBD1001', 21, 99, 'Cadbury 5 Star 3D Chocolate Bar 42g', 'Star Chocolate', 30, 30, 'About Product description\nSmooth textured chocolate with crunchy wheat crispies surrounded in flowing caramel. Get lost in the chocolate cream centre and share the delight.', 'About Product description\nSmooth textured chocolate with crunchy wheat crispies surrounded in flowing caramel. Get lost in the chocolate cream centre and share the delight.', '', 10, 10, 10, 'G2199727722,G2199825430,G2199783871,G2199453718,G2199338837,G2199681340', 'Cadbury 5', '', '', 'Latest', '0', '2021-11-28 16:33:42', 'admin', '', '0000-00-00 00:00:00', '', ''),
(145, 'G2051804863', 'GHRFBD1001', 20, 51, ' Chataka Cumin Seed/ Jeera', 'Jeera', 60, 109, 'Good Quality product', 'Good Quality product', '', 10, 10, 10, 'G2051876778,G2051402764,G2051373827,G2051116531,G2051934619,G2051943457,G2051330334,G2154205309', 'Chataka ', '', '', 'Top', '0', '2021-11-28 17:52:58', 'admin', '', '2021-11-28 18:00:09', 'admin', ''),
(146, 'G2051490221', 'GHRFBD1001', 20, 51, 'Elaichi Choti Loose 10g', '  Loose 10g', 35, 35, 'Good Quality', 'Good Quality', '', 10, 10, 10, 'G2051804863,G2051876778,G2051402764,G2051373827,G2051116531,G2051934619', 'Elaichi Choti', '', '', 'Featured', '0', '2021-11-28 18:05:51', 'admin', '', '0000-00-00 00:00:00', '', ''),
(147, 'G2053751267', 'GHRFBD1001', 20, 53, 'Fortune Sugar Chini 1kg', 'Sugar', 60, 60, 'Best Quality', 'Best Quality', '', 10, 10, 10, 'G2052254466,G2052254573,G2052162766,G2052320110,G2052488418,G4773539167,G2050540971', 'Fortune', '', '', 'Featured', '0', '2021-11-28 18:16:26', 'admin', '', '0000-00-00 00:00:00', '', ''),
(148, 'G2051310272', 'GHRFBD1001', 20, 51, 'Haldi Powder Loose ', 'Loose 100g', 22, 30, 'Best Quality Product', 'Best Quality Product', '', 10, 10, 10, 'G2051876778,G2051402764,G2051373827,G2051116531,G2051330334', 'Haldi Powder', '', '', 'Top', '0', '2021-11-28 18:23:30', 'admin', '', '2021-11-28 18:27:55', 'admin', ''),
(149, 'G2048718351', 'GHRFBD1001', 20, 48, 'Gari / Coconut Gola ', 'Gari/Gola ', 24, 28, 'Best Quality Product', 'Best Quality Product', '', 10, 10, 10, 'G2052162766,G2052320110,G2052488418,G4773539167,G2050540971', 'Coconut', '', '', 'Top', '1', '2021-11-28 19:05:44', 'admin', '', '2022-08-25 11:13:16', 'admin', ''),
(150, 'G2051494302', 'GHRFBD1001', 20, 51, 'Black Pepper / Kali Mirch Loose 50g', 'Kali Mirch', 76, 76, 'Black pepper is a flowering vine in the family Piperaceae, cultivated for its fruit, known as a peppercorn, which is usually dried and used as a spice and seasoning. The fruit is drupe which is about 5 mm in diameter, dark red, and contains a stone which encloses a single pepper seed', 'Black pepper is a flowering vine in the family Piperaceae, cultivated for its fruit, known as a peppercorn, which is usually dried and used as a spice and seasoning. The fruit is drupe which is about 5 mm in diameter, dark red, and contains a stone which encloses a single pepper seed', '', 10, 10, 10, 'G2051876778,G2051373827,G2051116531', 'Black Pepper', '', '', 'Top', '0', '2021-11-28 19:39:40', 'admin', '', '2022-08-27 11:43:40', 'admin', ''),
(151, 'G2048776596', 'GHRFBD1001', 20, 48, 'Almond/ Badam Loose 250g', 'Loose 250g', 250, 250, 'Best Quality Product', 'Best Quality Product', '', 10, 10, 10, 'G2048718351,G2053751267,G2199145231', 'Almond Badam', '', '', 'Featured', '1', '2021-11-28 19:48:40', 'admin', '', '2022-08-25 11:12:46', 'admin', ''),
(152, 'G2051369063', 'GHRFBD1001', 20, 51, 'Dalchini Loose 10g', 'Loose 10g', 10, 10, 'Good Quality Product', 'Good Quality Product', '', 10, 10, 10, 'G2048776596,G2051494302,G2048718351,G2051310272,G2051490221,G2051804863', 'Dalchini ', '', '', 'Featured', '0', '2021-11-29 11:25:21', 'admin', '', '0000-00-00 00:00:00', '', ''),
(153, 'G2048948253', 'GHRFBD1001', 20, 48, 'Soyabean Bari Loose ', 'Bari Loose', 8, 10, 'Good Quality Product', 'Good Quality Product', '', 10, 10, 10, 'G2051369063,G2048776596,G2051494302,G2048718351,G2051310272,G2053751267,G2051490221,G2051804863', 'Soyabean', '', '', 'Top', '0', '2021-11-29 11:34:48', 'admin', '', '0000-00-00 00:00:00', '', ''),
(154, 'G2048716115', 'GHRFBD1001', 20, 48, 'Chana Dal (Loose) 500g', '(Loose) 500g', 35, 37, 'Best Quality Product', 'Best Quality Product', '', 10, 10, 10, 'G2048948253,G2051369063,G2048776596,G2051494302,G2048718351,G2051310272,G2053751267,G2051490221,G2051804863,G2051402764,G2051373827', 'Chana Dal', '', '', 'Top', '0', '2021-11-29 11:49:15', 'admin', '', '0000-00-00 00:00:00', '', ''),
(155, 'G2048936959', 'GHRFBD1001', 20, 48, 'Masoor Dal Loose 500g', 'Loose 500g', 45, 48, 'Good Quality Product', 'Good Quality Product', '', 10, 10, 10, 'G2048716115,G2048948253,G2051369063,G2048776596,G2051494302,G2048718351,G2051310272,G2053751267,G2051490221,G2051804863', 'Masoor Dal', '', '', 'Top', '0', '2021-11-29 11:59:32', 'admin', '', '0000-00-00 00:00:00', '', ''),
(156, 'G2048282425', 'GHRFBD1001', 20, 48, 'Arhar Dal Loose 1kg', 'Loose 1kg', 95, 98, 'Best Quality Product', 'Best Quality Product', '', 10, 10, 10, 'G2048936959,G2048716115,G2048948253,G2051369063,G2048776596,G2051494302,G2048718351,G2051310272,G2051490221', 'Arhar Dal', '', '', 'Top', '0', '2021-11-29 12:19:30', 'admin', '', '2021-11-29 12:24:46', 'admin', ''),
(157, 'G2048375003', 'GHRFBD1001', 20, 48, 'Rai Mahin Loose 100g', 'mustard Loose', 15, 18, 'Good Quality Product', 'Good Quality Product', '', 10, 10, 10, 'G2048282425,G2048936959,G2048716115,G2048948253,G2051369063,G2048776596,G2051494302,G2048718351,G2051310272', 'Rai Mahin', '', '', 'Top', '1', '2021-11-29 12:30:46', 'admin', '', '2022-08-25 11:12:13', 'admin', ''),
(158, 'G2048648009', 'GHRFBD1001', 20, 48, 'Dhaniya Sabut Loose 100g', 'Loose 100g', 16, 20, 'Good Quality Product', 'Good Quality Product', '', 10, 10, 10, 'G2048375003,G2048282425,G2048936959,G2048716115,G2048948253,G2051369063,G2048776596,G2051494302,G2048718351,G2051310272,G2051490221', 'Dhaniya Sabut', '', '', 'Top', '0', '2021-11-29 12:42:12', 'admin', '', '0000-00-00 00:00:00', '', ''),
(159, 'G2048403002', 'GHRFBD1001', 20, 48, 'Lijjat Papad 200Gm', 'Papad 200Gm', 72, 72, 'Good Quality Product', 'Good Quality Product', '', 10, 10, 10, 'G2048648009,G2048375003,G2048282425,G2048936959,G2048716115,G2048948253,G2051369063,G2048776596,G2051494302,G2048718351', 'Lijjat Papad ', '', '', 'Featured', '0', '2021-11-29 12:51:34', 'admin', '', '0000-00-00 00:00:00', '', ''),
(160, 'G2050584678', 'GHRFBD1001', 20, 50, 'Atta Loose 1kg', 'Loose 1kg', 25, 25, 'Traditionally ground, the Chakki Atta is a wholesome product that helps you prepare soft and healthy chapatis and parathas. Prepared from the finest quality grains that are plucked from the premium wheat fields. Contains zero addition of maida, thus providing you with 100% whole wheat flour. Has a rich aroma that wafts all over the house from fluffy chapatis. The whole wheat formulation has added fibres and proteins that prevent weight gain.', 'Traditionally ground, the Chakki Atta is a wholesome product that helps you prepare soft and healthy chapatis and parathas. Prepared from the finest quality grains that are plucked from the premium wheat fields. Contains zero addition of maida, thus providing you with 100% whole wheat flour. Has a rich aroma that wafts all over the house from fluffy chapatis. The whole wheat formulation has added fibres and proteins that prevent weight gain.', '', 10, 10, 10, 'G2048403002,G2048648009,G2048375003,G2048282425,G2048936959,G2048716115,G2048948253,G2051369063,G2048776596,G2051494302,G2048718351', 'Atta ', '', '', 'Top', '0', '2021-11-29 13:53:00', 'admin', '', '0000-00-00 00:00:00', '', ''),
(161, 'G2048257349', 'GHRFBD1001', 21, 60, 'Chana Bhuna (Loose) 500g', '(Loose) 500g', 60, 60, 'Good Quality Product', 'Good Quality Product', '', 10, 10, 10, 'G2050584678,G2048403002,G2048648009,G2048375003,G2048282425,G2048936959,G2048716115,G2048948253,G2051369063,G2048776596', 'Chana Bhuna', '', '', 'Latest', '1', '2021-11-29 14:08:02', 'admin', '', '2022-08-25 11:11:36', 'admin', ''),
(162, 'G2049589186', 'GHRFBD1001', 20, 49, 'Amul Pure Ghee 1L', 'Ghee 1L', 480, 520, 'Filled with so many Health Benefits.\nDaily One spoon ghee makes you fit and energetic always.\nIt is Good for digestion\nImproves Muscle Movement, strengthen the sense Organ.', 'Filled with so many Health Benefits.\nDaily One spoon ghee makes you fit and energetic always.\nIt is Good for digestion\nImproves Muscle Movement, strengthen the sense Organ.', '', 10, 10, 10, 'G2199338837,G2199681340,G5284846946,G5284953434,G5284941384', 'Amul Pure', '', '', 'Top', '0', '2021-11-29 14:58:10', 'admin', '', '0000-00-00 00:00:00', '', ''),
(163, 'G3963760574', 'GHRFBD1001', 39, 63, 'Dabur Honey 1kg', 'Honey 1kg', 395, 430, 'One tablespoon of Dabur honey with warm water daily morning will help you in managing weight and reducing one size in 90 days (clinically tested)\n100% purity guarantee\nProved to be good for heart health\nRich source of nutrition for you and your family\nGreat remedy for cough & cold when mixed with ginger\nBoosts your energy and keeps you active', 'One tablespoon of Dabur honey with warm water daily morning will help you in managing weight and reducing one size in 90 days (clinically tested)\n100% purity guarantee\nProved to be good for heart health\nRich source of nutrition for you and your family\nGreat remedy for cough & cold when mixed with ginger\nBoosts your energy and keeps you active', '', 10, 10, 10, 'G2049589186,G2048257349,G2050584678,G2048403002,G2048648009,G2048375003,G2048282425,G2048936959,G2048716115,G2048948253,G2051369063', 'Dabur', '', '', 'Top', '0', '2021-11-29 15:20:18', 'admin', '', '0000-00-00 00:00:00', '', ''),
(164, 'G2048489917', 'GHRFBD1001', 20, 48, 'Nutrela Soya Granules Chura ', 'Granules Chura', 58, 60, 'Good Quality Product', 'Good Quality Product', '', 10, 10, 10, 'G2048648009,G2048282425,G2048936959,G2048716115', 'Nutrela Soya', '', '', 'Top', '0', '2021-12-03 15:13:59', 'admin', '', '2022-08-27 11:43:16', 'admin', ''),
(165, 'G2010118619', 'GHRFBD1001', 20, 101, 'Kaju Loose 250g', 'Loose 250g', 250, 250, 'Good Quality Product', 'Good Quality Product', '', 10, 10, 10, 'G2048489917,G3963760574,G2049589186,G2048257349,G2050584678,G2048403002,G2048648009,G2048375003,G2048282425,G2048936959,G2048716115,G2048948253,G2051369063,G2048776596', 'Kaju', '', '', 'Featured', '1', '2021-12-03 16:59:17', 'admin', '', '2022-08-25 11:10:03', 'admin', ''),
(166, 'G2049700099', 'GHRFBD1001', 20, 49, 'Fortune Refined Soyabean Oil 1L', 'Soyabean Oil', 164, 175, 'Fortune Soya Health Oil is processed with next-generation High Absorbent Refining Technology (H.A.R.T). So your everyday meals not only taste better but also make your Bones stronger and your Heart & Eyes healthier.', 'Fortune Soya Health Oil is processed with next-generation High Absorbent Refining Technology (H.A.R.T). So your everyday meals not only taste better but also make your Bones stronger and your Heart & Eyes healthier.', '', 10, 10, 10, 'G2048489917,G3963760574,G2049589186,G2050584678,G2048403002,G2048648009,G2048282425,G2048936959,G2048716115,G2048948253,G2051369063,G2051494302,G2051310272,G2053751267,G2051490221,G2051804863', 'Fortune Refined', '', '', 'Top', '0', '2021-12-03 17:16:41', 'admin', '', '2022-08-27 11:43:00', 'admin', ''),
(167, 'G2049981893', 'GHRFBD1001', 20, 49, 'Fortune Refined Soyabean Oil Can 5L', 'Oil 5L', 680, 705, 'Fortified\nContains vitamin a and vitamin D\nZero cholesterol\nZero trans fat\nCountry of Origin: India', 'Fortified\nContains vitamin a and vitamin D\nZero cholesterol\nZero trans fat\nCountry of Origin: India', '', 10, 10, 10, 'G2049700099,G2010118619,G2048489917,G3963760574,G2049589186,G2048257349,G2050584678,G2048403002,G2048648009,G2048375003,G2048282425,G2048936959,G2048716115,G2048948253,G2051369063,G2048776596,G2051494302', 'Fortune Refined', '', '', 'Top', '1', '2021-12-03 17:30:50', 'admin', '', '2022-08-25 11:09:44', 'admin', ''),
(168, 'G2051858596', 'GHRFBD1001', 20, 51, 'Lal Mircha Sabut Loose', 'Sabut Loose', 27, 35, 'Good Quality Product', 'Good Quality Product', '', 10, 10, 10, 'G2049981893,G2049700099,G2010118619,G2048489917,G3963760574,G2049589186,G2048257349,G2050584678,G2048403002,G2048648009,G2048375003,G2048282425', 'Lal Mircha', '', '', 'Top', '0', '2021-12-03 17:36:55', 'admin', '', '0000-00-00 00:00:00', '', ''),
(169, 'G2048686114', 'GHRFBD1001', 20, 51, 'Ajwain 100g', 'loose 100g', 30, 36, 'Active enzymes in ajwain improve the flow of stomach acids, which can help to relieve indigestion, bloating, and gas. The plant can also help to treat peptic ulcers as well as sores in the esophagus, stomach, and intestines', 'Active enzymes in ajwain improve the flow of stomach acids, which can help to relieve indigestion, bloating, and gas. The plant can also help to treat peptic ulcers as well as sores in the esophagus, stomach, and intestines', '', 10, 10, 10, 'G2051858596,G2049981893,G2049700099,G2010118619,G2048489917,G3963760574,G2049589186,G2048257349,G2050584678,G2048403002,G2048648009,G2048375003,G2048282425', 'Ajwain', '', '', 'Featured', '0', '2021-12-04 12:16:09', 'admin', '', '2021-12-04 12:24:57', 'admin', ''),
(170, 'G2051996835', 'GHRFBD1001', 20, 51, 'Long 10g', 'loose  (10g)', 10, 10, 'Good Quality Product', 'Good Quality Product', '', 10, 10, 10, 'G2048686114,G2051858596,G2049981893,G2049700099,G2010118619,G2048489917,G3963760574,G2049589186,G2048257349,G2050584678,G2048403002,G2048648009,G2048375003,G2048282425,G2048936959,G2048716115', 'Long', '', '', 'Featured', '0', '2021-12-04 12:29:34', 'admin', '', '0000-00-00 00:00:00', '', ''),
(171, 'G2053294470', 'GHRFBD1001', 20, 53, 'Sugar Loose (1kg)', ' Loose (1kg)', 40, 42, 'Best Quality Product', 'Best Quality Product', '', 10, 10, 10, 'G2051996835,G2048686114,G2051858596,G2049981893,G2049700099,G2010118619,G2048489917,G3963760574,G2049589186,G2048257349,G2050584678,G2048403002,G2048648009,G2048375003,G2048282425,G2048936959,G2048716115,G2048948253,G2051369063,G2048776596', 'Sugar', '', '', 'Top', '0', '2021-12-04 12:37:08', 'admin', '', '0000-00-00 00:00:00', '', ''),
(172, 'G2048905196', 'GHRFBD1001', 20, 48, 'Baking Soda 100gm', 'Soda 100gm', 39, 45, 'Good Quality Product ', 'Good Quality Product', '', 10, 10, 10, 'G2053294470,G2051996835,G2048686114,G2051858596,G2049700099,G2048489917,G3963760574,G2049589186,G2050584678,G2048403002,G2048648009,G2048282425,G2048936959,G2048716115', 'Baking', '', '', 'Top', '1', '2021-12-04 12:55:45', 'admin', '', '2022-08-27 11:42:18', 'admin', ''),
(173, 'G2052175423', 'GHRFBD1001', 20, 52, 'India Gate Basmati Brown Rice 1kg', 'Rice 1kg', 160, 175, 'The India Gate Brown Basmati Rice cooks up into a wonderfully long, slender, and fluffy grain. This basmati rice is ideal for pilafs and biryanis.\n', 'The India Gate Brown Basmati Rice cooks up into a wonderfully long, slender, and fluffy grain. This basmati rice is ideal for pilafs and biryanis.\n', '', 10, 10, 10, 'G2048905196,G2053294470,G2051996835,G2048686114,G2051858596,G2049981893,G2049700099,G2010118619,G2048489917,G3963760574,G2049589186,G2048257349', 'Basmati Brown', '', '', 'Top', '0', '2021-12-04 13:04:39', 'admin', '', '0000-00-00 00:00:00', '', ''),
(174, 'G4671162811', 'GHRFBD1001', 46, 71, 'Himalaya Baby Powder 200g', 'Powder 200g', 176, 235, 'Himalaya Baby Powder in the net quantity 200gms is amongst the specially formulated herbal baby care Himalaya products, which helps in keeping the baby\'s skin cool and helps in removing the dryness. Enriched with Olive Oil, Almond Oil, Khus Grass and Natural Zinc, the powder is mild and soothing on the baby\'s skin.', 'Himalaya Baby Powder in the net quantity 200gms is amongst the specially formulated herbal baby care Himalaya products, which helps in keeping the baby\'s skin cool and helps in removing the dryness. Enriched with Olive Oil, Almond Oil, Khus Grass and Natural Zinc, the powder is mild and soothing on the baby\'s skin.', '', 10, 10, 10, 'G2199727722,G2199825430,G2199783871,G2199453718,G2199681340', 'Himalaya Baby', '', '', 'Latest', '0', '2021-12-04 13:21:31', 'admin', '', '2022-08-27 11:41:05', 'admin', ''),
(175, 'G4671205107', 'GHRFBD1001', 46, 71, 'Dabur Lal Tel 500 ml', 'Tail (500ml)', 360, 400, 'Dabur Lal Tail - Ayurvedic Baby Massage Oil 500ml (Pack of 2). Contains Shankhapushpi, Masha, Ratanjot, Karpura, Saral taila, Tila tail Manufactured by Dabur India Limited Indications: Regular massage with Dabur Lal Tail helps to make bones and muscles stronger. It is clinically proven 2X faster physical growth', 'Dabur Lal Tail - Ayurvedic Baby Massage Oil 500ml (Pack of 2). Contains Shankhapushpi, Masha, Ratanjot, Karpura, Saral taila, Tila tail Manufactured by Dabur India Limited Indications: Regular massage with Dabur Lal Tail helps to make bones and muscles stronger. It is clinically proven 2X faster physical growth', '', 10, 10, 10, 'G4671162811,G2199825430,G2199783871,G2199453718,G2199338837', 'Dabur Lal', '', '', 'Latest', '0', '2021-12-04 13:36:50', 'admin', '', '0000-00-00 00:00:00', '', ''),
(176, 'G4671785353', 'GHRFBD1001', 46, 71, 'Himalaya Gentle Baby Shampoo 200ml', 'Baby Shampoo (400 ML', 240, 320, 'Himalaya Gentle Baby Shampoo in the net quantity 200ml is a mild, herbally formulated \'no tears\' shampoo that is specially designed to enhance the texture of the baby\'s hair, making it silky, shiny and lustrous. This shampoo is mild to be used on the baby\'s hair, while also being effective as it cleanses, nourishes and conditions the baby\'s hair. The special \'no tears\' formula protects the baby\'s eyes from burning should the shampoo come into contact with the eye area while bathing.', 'Himalaya Gentle Baby Shampoo in the net quantity 200ml is a mild, herbally formulated \'no tears\' shampoo that is specially designed to enhance the texture of the baby\'s hair, making it silky, shiny and lustrous. This shampoo is mild to be used on the baby\'s hair, while also being effective as it cleanses, nourishes and conditions the baby\'s hair. The special \'no tears\' formula protects the baby\'s eyes from burning should the shampoo come into contact with the eye area while bathing.', '', 10, 10, 10, 'G4671162811,G2199783871,G2199453718,G2199681340', 'Himalaya Gentle', '', '', 'Latest', '0', '2021-12-04 13:45:37', 'admin', '', '2022-08-27 11:40:43', 'admin', ''),
(177, 'G4671134515', 'GHRFBD1001', 46, 71, 'Dabur Janma Ghutti 125ml', 'Ghutti 125ml', 75, 150, 'Dabur Janma Ghunti, in the net quantity of 125ml, is an Ayurvedic medicine that acts as an effective remedy for the infants who suffer from stomach conditions that arise from teething – such as, flatulence, diarrhoea, constipation, nausea, etc. This Ayurvedic medicine is enriched with ingredients like Anjeer, Kishmish, Ajwain, Vach, Amaltas and Sanai, which help in expelling the intestinal worms and strengthening the digestive system of the body.\n\n', 'Dabur Janma Ghunti, in the net quantity of 125ml, is an Ayurvedic medicine that acts as an effective remedy for the infants who suffer from stomach conditions that arise from teething – such as, flatulence, diarrhoea, constipation, nausea, etc. This Ayurvedic medicine is enriched with ingredients like Anjeer, Kishmish, Ajwain, Vach, Amaltas and Sanai, which help in expelling the intestinal worms and strengthening the digestive system of the body.\n\n', '', 10, 10, 10, 'G4671785353,G4671205107,G4671162811', 'Dabur Janma', '', '', 'Latest', '1', '2021-12-04 13:53:51', 'admin', '', '2022-08-25 11:08:31', 'admin', ''),
(178, 'G4671248714', 'GHRFBD1001', 46, 71, 'Himalaya baby lotion 200ml', 'Baby lotion', 225, 300, 'Himalaya\'s Baby Lotion keeps your baby\'s skin soft and supple and protects it from infection. It combines naturally derived ingredients to gently moisturize delicate skin to pure baby softness. It also moisturizes baby\'s skin, leaving it feeling soft all day. Clinically proven to be mild, it is gentle enough for newborns.', 'Himalaya\'s Baby Lotion keeps your baby\'s skin soft and supple and protects it from infection. It combines naturally derived ingredients to gently moisturize delicate skin to pure baby softness. It also moisturizes baby\'s skin, leaving it feeling soft all day. Clinically proven to be mild, it is gentle enough for newborns.', '', 10, 10, 10, 'G4671785353,G4671205107,G4671162811,G3963760574,G2199145231,G2199727722,G2199825430,G2199783871,G2199453718,G2199681340', 'Himalaya', '', '', 'Latest', '0', '2021-12-07 19:54:32', 'admin', '', '2022-08-27 11:40:12', 'admin', ''),
(179, 'G4671730511', 'GHRFBD1001', 46, 71, 'Johnson\'s Baby Powder 400g', 'Baby Powder ', 235, 260, 'Johnson & Johnson Baby Powder is specially made to be gentle to your baby’s skin and eliminates friction. It contains tiny, round, slippery plates that easily glide onto the baby’s skin and eases skin irritation due to coarse talcum powder. It helps protect the baby’s skin from excess moisture and also makes it soft, smooth, and cool.', 'Johnson & Johnson Baby Powder is specially made to be gentle to your baby’s skin and eliminates friction. It contains tiny, round, slippery plates that easily glide onto the baby’s skin and eases skin irritation due to coarse talcum powder. It helps protect the baby’s skin from excess moisture and also makes it soft, smooth, and cool.', '', 10, 10, 10, 'G4671248714,G4671785353,G4671205107,G4671162811,G2199145231,G2199727722,G2199825430,G2199783871,G2199453718,G2199681340', 'Johnson\'s', '', '', 'Latest', '0', '2021-12-07 20:08:55', 'admin', '', '2022-08-27 11:39:06', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `v_product_cart`
--

CREATE TABLE `v_product_cart` (
  `id` int(11) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `session_user_id` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `created_ip` varchar(100) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` varchar(10) NOT NULL,
  `modified_ip` varchar(100) NOT NULL,
  `status` enum('0','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_product_cart`
--

INSERT INTO `v_product_cart` (`id`, `product_id`, `user_id`, `session_user_id`, `quantity`, `size_id`, `created_on`, `created_by`, `created_ip`, `modified_on`, `modified_by`, `modified_ip`, `status`) VALUES
(9, 'G2051693613', '636086236', '636086236', 2, 4, '2021-11-03 16:58:55', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(10, 'G2051693613', '636086236', '636086236', 2, 3, '2021-11-03 16:59:00', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(11, 'G2051693613', '104859512', '104859512', 1, 4, '2021-11-03 18:15:51', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(12, 'G2051693613', '104859512', '104859512', 1, 3, '2021-11-03 18:16:01', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(13, 'G2051693613', '104859512', '104859512', 1, 5, '2021-11-03 18:16:08', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(14, 'G2154699758', '859752937', '859752937', 1, 0, '2021-11-03 18:23:24', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(15, 'G2154245957', '1152903928', '1152903928', 0, 9, '2021-11-03 18:25:13', 'admin', '', '2021-11-03 19:34:49', 'admin', '', '2'),
(16, 'G2154245957', '1022583799', '1022583799', 1, 9, '2021-11-03 18:25:58', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(17, 'G2051693613', '1152903928', '1152903928', 4, 3, '2021-11-03 19:36:10', 'admin', '', '2021-11-03 19:36:29', 'admin', '', '0'),
(18, 'G2051693613', '1152903928', '1152903928', 4, 4, '2021-11-03 19:36:37', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(19, 'G2051693613', '1152903928', '1152903928', 4, 5, '2021-11-03 19:36:41', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(20, 'G2154245957', '1310448077', '1310448077', 2, 10, '2021-11-04 16:57:32', 'admin', '', '2021-11-04 16:57:39', 'admin', '', '0'),
(21, 'G2154245957', '931476940', '931476940', 1, 10, '2021-11-05 11:41:34', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(22, 'G2154245957', '1272744020', '1272744020', 1, 10, '2021-11-05 11:41:48', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(23, 'G2051693613', '675618627', '675618627', 3, 3, '2021-11-05 19:31:25', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(24, 'G2051693613', '675618627', '675618627', 3, 4, '2021-11-05 19:31:32', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(25, 'G2051693613', '675618627', '675618627', 1, 5, '2021-11-05 19:31:40', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(26, 'G2154245957', '1813092044', '1813092044', 1, 10, '2021-11-05 19:54:59', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(82, 'G2154955329', '1890506414', '1890506414', 1, 41, '2021-11-07 23:03:09', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(84, 'G2154245957', '177261502', '177261502', 0, 10, '2021-11-08 10:34:02', 'admin', '', '2021-11-08 10:55:53', 'admin', '', '2'),
(85, 'G2154245957', '186824814', '186824814', 1, 10, '2021-11-08 10:34:30', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(86, 'G2154699758', '801179350', '801179350', 1, 36, '2021-11-08 21:26:50', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(87, 'G2154966955', '801179350', '801179350', 1, 38, '2021-11-08 21:26:53', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(88, 'G4786230603', '370012771', '370012771', 51, 25, '2021-11-11 12:58:59', 'admin', '', '2021-11-11 12:59:15', 'admin', '', '0'),
(89, 'G2049527614', '206899331', '206899331', 0, 44, '2021-11-11 18:37:21', 'admin', '', '2021-11-11 19:39:44', 'admin', '', '2'),
(90, 'G4666942805', '206899331', '206899331', 0, 72, '2021-11-11 18:40:52', 'admin', '', '2021-11-11 19:39:41', 'admin', '', '2'),
(91, 'G2052254573', '206899331', '206899331', 0, 47, '2021-11-11 18:40:55', 'admin', '', '2021-11-11 19:39:33', 'admin', '', '2'),
(92, 'G2050540971', '206899331', '206899331', 0, 74, '2021-11-11 19:39:01', 'admin', '', '2021-11-11 19:39:28', 'admin', '', '2'),
(93, 'G4685687348', '2080378742', '2080378742', 1, 43, '2021-11-11 19:47:46', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(94, 'G2052254573', '682935617', '682935617', 2, 47, '2021-11-12 14:11:36', 'admin', '', '2021-11-12 14:11:38', 'admin', '', '0'),
(98, 'G2049527614', '857363873', '857363873', 1, 44, '2021-11-13 10:43:39', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(99, 'G4685687348', '857363873', '857363873', 1, 43, '2021-11-13 10:43:55', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(118, 'G2051693613', '496628838', '496628838', 6, 76, '2021-11-13 15:07:00', 'admin', '', '2021-11-13 16:04:36', 'admin', '', '0'),
(119, 'G2154567185', '496628838', '496628838', 5, 37, '2021-11-13 15:07:04', 'admin', '', '2021-11-13 16:04:44', 'admin', '', '0'),
(120, 'G4685687348', '1202214788', '1202214788', 2, 43, '2021-11-13 15:33:38', 'admin', '', '2021-11-13 15:33:51', 'admin', '', '0'),
(121, 'G2049527614', '2110239495', '2110239495', 1, 44, '2021-11-13 16:06:21', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(124, 'G2051693613', '1674368864', '1674368864', 9, 11, '2021-11-13 17:29:37', 'admin', '', '2021-11-13 17:57:03', 'admin', '', '0'),
(125, 'G2051693613', '1674368864', '1674368864', 12, 75, '2021-11-13 17:29:43', 'admin', '', '2021-11-13 17:56:59', 'admin', '', '0'),
(126, 'G2051693613', '1674368864', '1674368864', 12, 76, '2021-11-13 17:29:48', 'admin', '', '2021-11-13 17:56:46', 'admin', '', '0'),
(127, 'G4685687348', '44666316', '44666316', 2, 43, '2021-11-13 17:48:31', 'admin', '', '2021-11-13 17:48:41', 'admin', '', '0'),
(128, 'G2052254573', '497485598', '497485598', 9, 47, '2021-11-13 17:50:40', 'admin', '', '2021-11-13 17:51:18', 'admin', '', '0'),
(133, 'G2052320110', '291939087', '291939087', 2, 49, '2021-11-13 23:30:54', 'admin', '', '2021-11-13 23:31:03', 'admin', '', '0'),
(134, 'G2052254573', '1034459416', '1034459416', 1, 47, '2021-11-13 23:33:38', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(136, 'G4685687348', '682370239', '682370239', 3, 43, '2021-11-16 17:20:28', 'admin', '', '2021-11-16 17:21:03', 'admin', '', '0'),
(137, 'G4685687348', '716637073', '716637073', 2, 43, '2021-11-20 18:37:05', 'admin', '', '2021-11-20 18:37:20', 'admin', '', '0'),
(138, 'G4685687348', '1168333047', '1168333047', 1, 43, '2021-11-20 18:37:32', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(139, 'G2049527614', '1702174292', '1702174292', 0, 44, '2021-11-21 10:45:15', 'admin', '', '2021-11-21 10:45:56', 'admin', '', '2'),
(140, 'G4685687348', '1702174292', '1702174292', 0, 43, '2021-11-21 10:45:25', 'admin', '', '2021-11-21 10:46:32', 'admin', '', '2'),
(141, 'G4685687348', '1577779644', '1577779644', 2, 43, '2021-11-21 10:45:36', 'admin', '', '2021-11-21 10:46:26', 'admin', '', '0'),
(142, 'G4666603329', '705850560', '705850560', 1, 45, '2021-11-21 10:47:47', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(143, 'G4685687348', '705850560', '705850560', 1, 43, '2021-11-21 10:48:05', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(144, 'G2051693613', '453743637', '453743637', 1, 11, '2021-11-21 10:48:35', 'admin', '', '2021-11-21 10:48:35', 'admin', '', '0'),
(145, 'G2051693613', '1481977044', '1481977044', 1, 11, '2021-11-21 10:49:52', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(154, 'G4666603329', '7752990', '7752990', 1, 45, '2021-11-21 15:55:03', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(157, 'G2155786135', '1890941806', '1890941806', 1, 69, '2021-11-21 19:15:49', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(158, 'G2053342490', '1085315235', '1085315235', 1, 55, '2021-11-21 19:56:26', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(159, 'G2053342490', '1304219112', '1304219112', 1, 55, '2021-11-21 19:58:26', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(161, 'G2053342490', '2016508233', '2016508233', 1, 55, '2021-11-21 21:16:45', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(162, 'G2049527614', '439840674', '439840674', 1, 44, '2021-11-22 10:26:01', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(163, 'G2051953741', '1902365375', '1902365375', 1, 12, '2021-11-22 10:34:39', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(164, 'G4685687348', '1902365375', '1902365375', 1, 43, '2021-11-22 10:34:44', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(165, 'G3964658204', '1902365375', '1902365375', 1, 57, '2021-11-22 10:35:01', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(166, 'G3964855558', '1902365375', '1902365375', 1, 54, '2021-11-22 10:35:13', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(170, 'G4685687348', '957849342', '957849342', 1, 43, '2021-11-22 17:42:25', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(171, 'G4666942805', '957849342', '957849342', 1, 72, '2021-11-22 17:42:41', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(172, 'G2155786135', '247533804', '247533804', 1, 69, '2021-11-22 18:17:46', 'admin', '', '2021-11-22 18:31:22', 'admin', '', '0'),
(173, 'G2155786135', '1215472418', '1215472418', 5, 69, '2021-11-22 18:18:09', 'admin', '', '2021-11-22 18:57:53', 'admin', '', '0'),
(174, 'G2050540971', '1847681814', '1847681814', 1, 74, '2021-11-22 18:20:07', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(175, 'G2050809786', '1847681814', '1847681814', 1, 52, '2021-11-22 18:20:11', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(176, 'G4685687348', '247533804', '247533804', 7, 43, '2021-11-22 18:25:50', 'admin', '', '2021-11-22 18:29:04', 'admin', '', '0'),
(177, 'G3961230141', '247533804', '247533804', 2, 0, '2021-11-22 18:34:54', 'admin', '', '2021-11-22 18:34:59', 'admin', '', '0'),
(178, 'G4685687348', '955491936', '955491936', 0, 43, '2021-11-22 18:50:46', 'admin', '', '2021-11-22 18:55:54', 'admin', '', '2'),
(179, 'G2155786135', '955491936', '955491936', 0, 69, '2021-11-22 18:51:03', 'admin', '', '2021-11-22 18:55:50', 'admin', '', '2'),
(180, 'G2050809786', '1215472418', '1215472418', 1, 52, '2021-11-22 18:58:11', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(181, 'G2154245957', '737341296', '737341296', 1, 10, '2021-11-22 19:02:35', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(182, 'G2154966955', '737341296', '737341296', 1, 38, '2021-11-22 19:02:38', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(183, 'G2051693613', '737341296', '737341296', 0, 11, '2021-11-22 19:06:15', 'admin', '', '2021-11-22 19:06:23', 'admin', '', '2'),
(184, 'G4685687348', '1225119350', '1225119350', 1, 43, '2021-11-25 20:17:56', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(185, 'G2049527614', '1225119350', '1225119350', 1, 81, '2021-11-25 20:18:00', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(186, 'G4666603329', '1225119350', '1225119350', 1, 45, '2021-11-25 20:18:02', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(188, 'G2052254466', '1350179898', '1350179898', 1, 46, '2021-11-25 22:12:07', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(189, 'G2051943457', '2038488297', '2038488297', 1, 83, '2021-11-26 12:44:56', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(190, 'G2051330334', '2038488297', '2038488297', 1, 82, '2021-11-26 12:44:59', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(191, 'G2051116531', '2028712392', '2028712392', 1, 85, '2021-11-26 13:26:09', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(192, 'G2051116531', '1784795735', '1784795735', 1, 85, '2021-11-26 13:26:43', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(193, 'G2051116531', '788868444', '788868444', 1, 85, '2021-11-26 13:26:51', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(194, 'G2051876778', '623989357', '623989357', 5, 89, '2021-11-26 16:59:21', 'admin', '', '2021-11-26 17:00:06', 'admin', '', '0'),
(197, 'G2051373827', '623989357', '623989357', 1, 86, '2021-11-26 18:35:08', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(198, 'G2051876778', '1736237019', '1736237019', 1, 88, '2021-11-26 21:19:42', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(199, 'G2199681340', '1780304243', '1780304243', 1, 94, '2021-11-26 21:19:49', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(200, 'G2199681340', '233155878', '233155878', 1, 94, '2021-11-26 21:20:09', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(201, 'G2199681340', '789854578', '789854578', 1, 94, '2021-11-26 21:20:20', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(202, 'G2199681340', '1762249243', '1762249243', 1, 94, '2021-11-26 21:21:05', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(203, 'G2199681340', '1117069403', '1117069403', 1, 94, '2021-11-26 21:21:18', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(204, 'G5284953434', '1117069403', '1117069403', 1, 92, '2021-11-26 21:21:35', 'admin', '', '2021-11-26 21:21:38', 'admin', '', '0'),
(215, 'G5284846946', '350551957', '350551957', 1, 93, '2021-11-27 16:03:53', 'admin', '', '2021-11-27 17:26:48', 'admin', '', '0'),
(216, 'G2199681340', '350551957', '350551957', 1, 94, '2021-11-27 17:20:56', 'admin', '', '2021-11-27 17:26:43', 'admin', '', '0'),
(217, 'G2051693613', '350551957', '350551957', 0, 11, '2021-11-27 17:24:54', 'admin', '', '2021-11-27 17:26:27', 'admin', '', '2'),
(218, 'G5284953434', '350551957', '350551957', 1, 92, '2021-11-27 17:26:45', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(219, 'G4773539167', '350551957', '350551957', 1, 51, '2021-11-27 17:27:07', 'admin', '', '2021-11-27 17:27:10', 'admin', '', '0'),
(220, 'G2154556208', '1553974481', '1553974481', 4, 39, '2021-11-28 08:36:27', 'admin', '', '2021-11-28 08:37:21', 'admin', '', '0'),
(221, 'G2051876778', '562590336', '562590336', 1, 88, '2021-11-28 08:57:38', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(222, 'G2199783871', '1515495054', '1515495054', 1, 97, '2021-11-28 20:40:00', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(223, 'G2048948253', '1523978129', '1523978129', 1, 109, '2021-11-29 11:43:11', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(224, 'G2051494302', '1523978129', '1523978129', 1, 105, '2021-11-29 11:43:12', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(225, 'G2048718351', '1523978129', '1523978129', 1, 104, '2021-11-29 11:43:16', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(226, 'G2051310272', '1523978129', '1523978129', 1, 103, '2021-11-29 11:43:17', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(227, 'G2199825430', '1523978129', '1523978129', 1, 98, '2021-11-29 11:43:20', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(228, 'G2051804863', '1523978129', '1523978129', 1, 101, '2021-11-29 11:43:22', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(229, 'G2199783871', '1523978129', '1523978129', 1, 97, '2021-11-29 11:43:25', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(230, 'G2199453718', '1523978129', '1523978129', 1, 96, '2021-11-29 11:43:27', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(231, 'G2199145231', '1523978129', '1523978129', 1, 100, '2021-11-29 11:43:32', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(232, 'G2199727722', '1523978129', '1523978129', 1, 99, '2021-11-29 11:43:34', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(233, 'G2154245957', '1523978129', '1523978129', 1, 10, '2021-11-29 11:43:37', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(234, 'G2154966955', '1523978129', '1523978129', 1, 38, '2021-11-29 11:43:38', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(235, 'G2154556208', '1523978129', '1523978129', 1, 39, '2021-11-29 11:43:41', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(236, 'G2154205309', '1523978129', '1523978129', 1, 40, '2021-11-29 11:43:43', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(237, 'G2199338837', '1523978129', '1523978129', 1, 95, '2021-11-29 11:43:52', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(238, 'G2199681340', '1523978129', '1523978129', 2, 94, '2021-11-29 11:43:56', 'admin', '', '2021-11-29 11:43:58', 'admin', '', '0'),
(239, 'G5284846946', '1523978129', '1523978129', 1, 93, '2021-11-29 11:44:03', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(240, 'G5284953434', '1523978129', '1523978129', 1, 92, '2021-11-29 11:44:07', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(241, 'G5284941384', '1523978129', '1523978129', 1, 91, '2021-11-29 11:44:10', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(242, 'G2051876778', '1523978129', '1523978129', 1, 88, '2021-11-29 11:44:12', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(243, 'G2051402764', '1523978129', '1523978129', 1, 87, '2021-11-29 11:44:15', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(244, 'G2051373827', '1523978129', '1523978129', 1, 86, '2021-11-29 11:44:18', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(245, 'G2051116531', '1523978129', '1523978129', 1, 85, '2021-11-29 11:44:26', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(246, 'G2051934619', '1523978129', '1523978129', 1, 84, '2021-11-29 11:44:29', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(247, 'G2051943457', '1523978129', '1523978129', 1, 83, '2021-11-29 11:44:32', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(248, 'G2051330334', '1523978129', '1523978129', 1, 82, '2021-11-29 11:44:34', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(249, 'G4685687348', '1523978129', '1523978129', 1, 43, '2021-11-29 11:44:37', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(250, 'G2049527614', '1523978129', '1523978129', 1, 81, '2021-11-29 11:44:40', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(251, 'G2048936959', '1523978129', '1523978129', 1, 111, '2021-11-29 12:11:28', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(252, 'G2049589186', '923679558', '923679558', 1, 118, '2021-11-29 15:28:49', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(258, 'G2050584678', '1541027060', '1541027060', 1, 117, '2021-11-29 18:50:24', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(259, 'G3963760574', '1541027060', '1541027060', 1, 119, '2021-11-29 18:50:34', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(260, 'G3963760574', '658372101', '658372101', 1, 119, '2021-11-29 21:54:01', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(261, 'G2049589186', '658372101', '658372101', 1, 118, '2021-11-29 21:54:03', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(262, 'G2050584678', '658372101', '658372101', 1, 117, '2021-11-29 21:54:05', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(263, 'G2048375003', '658372101', '658372101', 1, 113, '2021-11-29 21:54:11', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(264, 'G2048282425', '658372101', '658372101', 1, 112, '2021-11-29 21:54:12', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(265, 'G2048936959', '658372101', '658372101', 1, 111, '2021-11-29 21:54:15', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(266, 'G2048716115', '658372101', '658372101', 1, 110, '2021-11-29 21:54:17', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(267, 'G2048948253', '658372101', '658372101', 1, 109, '2021-11-29 21:54:21', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(268, 'G2051494302', '658372101', '658372101', 1, 105, '2021-11-29 21:54:23', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(269, 'G2048718351', '658372101', '658372101', 1, 104, '2021-11-29 21:54:25', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(270, 'G2051310272', '658372101', '658372101', 1, 103, '2021-11-29 21:54:27', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(271, 'G2051804863', '658372101', '658372101', 1, 101, '2021-11-29 21:54:30', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(272, 'G2199825430', '658372101', '658372101', 1, 98, '2021-11-29 21:54:32', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(273, 'G2199783871', '658372101', '658372101', 1, 97, '2021-11-29 21:54:35', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(274, 'G2199453718', '658372101', '658372101', 1, 96, '2021-11-29 21:54:36', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(275, 'G2199338837', '658372101', '658372101', 1, 95, '2021-11-29 21:54:41', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(276, 'G2199681340', '658372101', '658372101', 1, 94, '2021-11-29 21:54:44', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(277, 'G3963760574', '829809345', '829809345', 1, 119, '2021-12-01 16:09:29', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(278, 'G3964855558', '829809345', '829809345', 1, 54, '2021-12-01 16:09:33', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(279, 'G2048282425', '1963620112', '1963620112', 2, 112, '2021-12-01 17:20:25', 'admin', '', '2021-12-01 17:20:49', 'admin', '', '0'),
(280, 'G2050584678', '825566923', '825566923', 4, 117, '2021-12-01 22:26:26', 'admin', '', '2021-12-01 22:27:18', 'admin', '', '0'),
(281, 'G2048257349', '825566923', '825566923', 0, 117, '2021-12-01 22:26:34', 'admin', '', '2021-12-01 22:27:16', 'admin', '', '2'),
(282, 'G2048403002', '825566923', '825566923', 4, 116, '2021-12-01 22:26:43', 'admin', '', '2021-12-01 22:27:23', 'admin', '', '0'),
(283, 'G2048648009', '765814598', '765814598', 0, 0, '2021-12-02 14:17:30', 'admin', '', '2021-12-02 14:17:58', 'admin', '', '2'),
(284, 'G2051693613', '1165769243', '1165769243', 1, 11, '2021-12-03 14:54:17', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(285, 'G2051953741', '1165769243', '1165769243', 1, 12, '2021-12-03 14:54:20', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(286, 'G2051571495', '1165769243', '1165769243', 1, 13, '2021-12-03 14:54:22', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(287, 'G2051877654', '1165769243', '1165769243', 1, 14, '2021-12-03 14:54:25', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(288, 'G2051995348', '1165769243', '1165769243', 1, 15, '2021-12-03 14:54:27', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(289, 'G2051779307', '1165769243', '1165769243', 1, 16, '2021-12-03 14:54:30', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(290, 'G2051750098', '1165769243', '1165769243', 1, 17, '2021-12-03 14:54:32', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(291, 'G2051973527', '1165769243', '1165769243', 1, 71, '2021-12-03 14:54:35', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(292, 'G2051608230', '1165769243', '1165769243', 1, 20, '2021-12-03 14:54:39', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(293, 'G2053342490', '1165769243', '1165769243', 1, 55, '2021-12-03 14:54:43', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(294, 'G2050540971', '1165769243', '1165769243', 1, 74, '2021-12-03 14:55:25', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(295, 'G4773539167', '1165769243', '1165769243', 1, 51, '2021-12-03 14:55:27', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(296, 'G2052488418', '1165769243', '1165769243', 1, 50, '2021-12-03 14:55:30', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(297, 'G2052320110', '1165769243', '1165769243', 1, 49, '2021-12-03 14:55:33', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(298, 'G2052162766', '1165769243', '1165769243', 1, 48, '2021-12-03 14:55:35', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(299, 'G2052254573', '1165769243', '1165769243', 1, 47, '2021-12-03 14:55:37', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(300, 'G2052254466', '1165769243', '1165769243', 1, 46, '2021-12-03 14:55:40', 'admin', '', '2021-12-03 14:56:01', 'admin', '', '0'),
(301, 'G2049527614', '1165769243', '1165769243', 1, 81, '2021-12-03 14:56:03', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(302, 'G2051330334', '1165769243', '1165769243', 1, 82, '2021-12-03 14:56:06', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(303, 'G2051943457', '1165769243', '1165769243', 1, 83, '2021-12-03 14:56:08', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(304, 'G2051934619', '1165769243', '1165769243', 1, 84, '2021-12-03 14:56:13', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(305, 'G2051116531', '1165769243', '1165769243', 1, 85, '2021-12-03 14:56:16', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(306, 'G2051373827', '1165769243', '1165769243', 1, 86, '2021-12-03 14:56:19', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(307, 'G2051402764', '1165769243', '1165769243', 1, 87, '2021-12-03 14:56:21', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(308, 'G2051876778', '1165769243', '1165769243', 1, 88, '2021-12-03 14:56:24', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(309, 'G2051804863', '1165769243', '1165769243', 1, 101, '2021-12-03 14:56:35', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(310, 'G2051490221', '1165769243', '1165769243', 1, 102, '2021-12-03 14:56:38', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(311, 'G2053751267', '1165769243', '1165769243', 1, 120, '2021-12-03 14:57:32', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(312, 'G2051310272', '1165769243', '1165769243', 1, 103, '2021-12-03 14:57:36', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(313, 'G2048718351', '1165769243', '1165769243', 1, 104, '2021-12-03 14:57:40', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(314, 'G2051494302', '1165769243', '1165769243', 1, 105, '2021-12-03 14:57:42', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(315, 'G2048776596', '1165769243', '1165769243', 1, 107, '2021-12-03 14:57:45', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(316, 'G2051369063', '1165769243', '1165769243', 1, 108, '2021-12-03 14:57:49', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(317, 'G2048948253', '1165769243', '1165769243', 1, 109, '2021-12-03 14:57:52', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(318, 'G2048716115', '1165769243', '1165769243', 1, 110, '2021-12-03 14:57:54', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(319, 'G2048936959', '1165769243', '1165769243', 1, 111, '2021-12-03 14:57:56', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(320, 'G2048282425', '1165769243', '1165769243', 1, 112, '2021-12-03 14:58:01', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(321, 'G2048375003', '1165769243', '1165769243', 1, 113, '2021-12-03 14:58:03', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(322, 'G2048648009', '1165769243', '1165769243', 1, 121, '2021-12-03 14:58:49', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(323, 'G2048403002', '1165769243', '1165769243', 1, 116, '2021-12-03 14:58:52', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(324, 'G2050584678', '1165769243', '1165769243', 1, 117, '2021-12-03 14:58:56', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(325, 'G2049589186', '1165769243', '1165769243', 1, 118, '2021-12-03 14:58:59', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(326, 'G2155786135', '1165769243', '1165769243', 1, 69, '2021-12-03 15:00:18', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(327, 'G2154996928', '1165769243', '1165769243', 1, 42, '2021-12-03 15:00:20', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(328, 'G2154955329', '1165769243', '1165769243', 1, 41, '2021-12-03 15:00:22', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(329, 'G2154205309', '1165769243', '1165769243', 1, 40, '2021-12-03 15:00:25', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(330, 'G2154556208', '1165769243', '1165769243', 1, 39, '2021-12-03 15:00:28', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(331, 'G2154966955', '1165769243', '1165769243', 1, 38, '2021-12-03 15:00:30', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(332, 'G2154245957', '1165769243', '1165769243', 1, 10, '2021-12-03 15:00:32', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(333, 'G2199681340', '1165769243', '1165769243', 1, 94, '2021-12-03 15:00:35', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(334, 'G2199338837', '1165769243', '1165769243', 1, 95, '2021-12-03 15:00:38', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(335, 'G2199453718', '1165769243', '1165769243', 1, 96, '2021-12-03 15:00:41', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(336, 'G2199783871', '1165769243', '1165769243', 1, 97, '2021-12-03 15:00:43', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(337, 'G2199825430', '1165769243', '1165769243', 1, 98, '2021-12-03 15:00:45', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(338, 'G2199727722', '1165769243', '1165769243', 1, 99, '2021-12-03 15:00:48', 'admin', '', '2021-12-03 15:02:45', 'admin', '', '0'),
(339, 'G2199145231', '1165769243', '1165769243', 1, 100, '2021-12-03 15:02:47', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(340, 'G2048257349', '1165769243', '1165769243', 1, 122, '2021-12-03 15:03:48', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(341, 'G3964658204', '1165769243', '1165769243', 1, 57, '2021-12-03 15:04:43', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(342, 'G3964855558', '1165769243', '1165769243', 1, 54, '2021-12-03 15:04:46', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(343, 'G3963760574', '1165769243', '1165769243', 1, 119, '2021-12-03 15:04:48', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(344, 'G2051117718', '1165769243', '1165769243', 1, 21, '2021-12-03 15:04:57', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(345, 'G4666524784', '1165769243', '1165769243', 1, 67, '2021-12-03 15:05:03', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(346, 'G4666205232', '1165769243', '1165769243', 1, 66, '2021-12-03 15:05:06', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(347, 'G4669458672', '1165769243', '1165769243', 1, 64, '2021-12-03 15:05:08', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(348, 'G4669106096', '1165769243', '1165769243', 1, 63, '2021-12-03 15:05:11', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(349, 'G4666405077', '1165769243', '1165769243', 1, 62, '2021-12-03 15:05:13', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(350, 'G4667966559', '1165769243', '1165769243', 1, 61, '2021-12-03 15:05:16', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(351, 'G4667659738', '1165769243', '1165769243', 1, 60, '2021-12-03 15:05:18', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(352, 'G4669771144', '1165769243', '1165769243', 1, 73, '2021-12-03 15:05:22', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(353, 'G4667614327', '1165769243', '1165769243', 1, 59, '2021-12-03 15:05:24', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(354, 'G4666125941', '1165769243', '1165769243', 1, 58, '2021-12-03 15:05:26', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(355, 'G4666942805', '1165769243', '1165769243', 1, 72, '2021-12-03 15:05:29', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(356, 'G4666603329', '1165769243', '1165769243', 1, 45, '2021-12-03 15:05:34', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(357, 'G4685687348', '1165769243', '1165769243', 1, 43, '2021-12-03 15:05:37', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(358, 'G4786974277', '1165769243', '1165769243', 1, 24, '2021-12-03 15:05:46', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(359, 'G4786230603', '1165769243', '1165769243', 1, 25, '2021-12-03 15:05:49', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(360, 'G4786530134', '1165769243', '1165769243', 1, 26, '2021-12-03 15:05:51', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(361, 'G4786173296', '1165769243', '1165769243', 1, 27, '2021-12-03 15:05:53', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(362, 'G4786852063', '1165769243', '1165769243', 1, 33, '2021-12-03 15:05:56', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(363, 'G4786438942', '1165769243', '1165769243', 1, 70, '2021-12-03 15:05:58', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(364, 'G4786999013', '1165769243', '1165769243', 1, 32, '2021-12-03 15:06:01', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(365, 'G4786460101', '1165769243', '1165769243', 1, 35, '2021-12-03 15:06:03', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(366, 'G4776184073', '1165769243', '1165769243', 1, 68, '2021-12-03 15:06:06', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(367, 'G4775307118', '1165769243', '1165769243', 1, 65, '2021-12-03 15:06:09', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(368, 'G4773576920', '1165769243', '1165769243', 1, 56, '2021-12-03 15:06:11', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(369, 'G4777594528', '1165769243', '1165769243', 1, 53, '2021-12-03 15:06:14', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(370, 'G5284941384', '1165769243', '1165769243', 1, 91, '2021-12-03 15:06:25', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(371, 'G5284953434', '1165769243', '1165769243', 1, 92, '2021-12-03 15:06:28', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(372, 'G5284846946', '1165769243', '1165769243', 1, 93, '2021-12-03 15:06:31', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(373, 'G2010118619', '1972573438', '1972573438', 1, 125, '2021-12-03 17:10:59', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(374, 'G2051858596', '1972573438', '1972573438', 1, 128, '2021-12-03 17:40:28', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(375, 'G2049981893', '1099328392', '1099328392', 1, 127, '2021-12-03 19:32:22', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(376, 'G2049700099', '1099328392', '1099328392', 2, 126, '2021-12-03 19:32:41', 'admin', '', '2021-12-03 19:33:01', 'admin', '', '0'),
(377, 'G2048905196', '595582337', '595582337', 3, 131, '2021-12-06 18:54:02', 'admin', '', '2021-12-06 18:56:36', 'admin', '', '0'),
(378, 'G2154955329', '1766113204', '1766113204', 1, 41, '2021-12-07 12:08:35', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(379, 'G2052175423', '622635413', '622635413', 1, 132, '2021-12-07 13:41:13', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(380, 'G2052175423', '1473419851', '1473419851', 1, 132, '2021-12-07 13:41:30', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(381, 'G2155786135', '1620224191', '1620224191', 3, 69, '2021-12-09 18:49:07', 'admin', '', '2021-12-09 18:50:51', 'admin', '', '0'),
(382, 'G2154996928', '1620224191', '1620224191', 0, 42, '2021-12-09 18:49:12', 'admin', '', '2021-12-09 18:49:38', 'admin', '', '2'),
(383, 'G2051693613', '1620224191', '1620224191', 1, 11, '2021-12-09 18:59:43', 'admin', '', '2021-12-09 19:01:43', 'admin', '', '0'),
(384, 'G2050540971', '1152068433', '1152068433', 4, 74, '2021-12-11 07:39:45', 'admin', '', '2021-12-11 07:45:56', 'admin', '', '0'),
(385, 'G4773539167', '1152068433', '1152068433', 10, 51, '2021-12-11 07:46:13', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(386, 'G2051995348', '1152068433', '1152068433', 9, 15, '2021-12-11 07:47:08', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(387, 'G2053342490', '1152068433', '1152068433', 22, 55, '2021-12-11 07:47:27', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(388, 'G2052175423', '850385161', '850385161', 0, 132, '2021-12-11 07:51:49', 'admin', '', '2021-12-11 07:52:11', 'admin', '', '2'),
(389, 'G2048718351', '850385161', '850385161', 3, 104, '2021-12-11 07:53:48', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(390, 'G2048718351', '2109735642', '2109735642', 5, 104, '2021-12-11 09:02:05', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(391, 'G2052175423', '2109735642', '2109735642', 1, 132, '2021-12-11 09:02:30', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(392, 'G2051494302', '1668175493', '1668175493', 1, 105, '2021-12-11 17:39:48', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(393, 'G2051858596', '410678321', '410678321', 1, 128, '2021-12-11 17:40:00', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(394, 'G2049981893', '410678321', '410678321', 1, 127, '2021-12-11 17:40:03', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(395, 'G2051693613', '1948274901', '1948274901', 1, 11, '2021-12-12 18:16:32', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(396, 'G2051953741', '1948274901', '1948274901', 1, 12, '2021-12-12 18:16:34', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(397, 'G2051571495', '1948274901', '1948274901', 1, 13, '2021-12-12 18:16:37', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(398, 'G2051877654', '1948274901', '1948274901', 1, 14, '2021-12-12 18:16:39', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(399, 'G2051995348', '1948274901', '1948274901', 1, 15, '2021-12-12 18:16:43', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(400, 'G2051779307', '1948274901', '1948274901', 1, 16, '2021-12-12 18:16:45', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(401, 'G2051750098', '1948274901', '1948274901', 1, 17, '2021-12-12 18:16:48', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(402, 'G2051973527', '1948274901', '1948274901', 1, 71, '2021-12-12 18:16:50', 'admin', '', '2021-12-12 18:24:53', 'admin', '', '0'),
(403, 'G2051608230', '1948274901', '1948274901', 1, 20, '2021-12-12 18:16:53', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(404, 'G2053342490', '1948274901', '1948274901', 1, 55, '2021-12-12 18:17:02', 'admin', '', '2021-12-12 18:17:06', 'admin', '', '0'),
(405, 'G2050540971', '1948274901', '1948274901', 1, 74, '2021-12-12 18:17:02', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(406, 'G4773539167', '1948274901', '1948274901', 1, 51, '2021-12-12 18:17:09', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(407, 'G2052488418', '1948274901', '1948274901', 1, 50, '2021-12-12 18:17:12', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(408, 'G2052320110', '1948274901', '1948274901', 1, 49, '2021-12-12 18:17:14', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(409, 'G2052162766', '1948274901', '1948274901', 1, 48, '2021-12-12 18:17:17', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(410, 'G2052254573', '1948274901', '1948274901', 1, 47, '2021-12-12 18:17:19', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(411, 'G2052254466', '1948274901', '1948274901', 1, 46, '2021-12-12 18:17:23', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(412, 'G2049527614', '1948274901', '1948274901', 1, 81, '2021-12-12 18:17:25', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(413, 'G2051330334', '1948274901', '1948274901', 1, 82, '2021-12-12 18:17:28', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(414, 'G2051943457', '1948274901', '1948274901', 1, 83, '2021-12-12 18:17:30', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(415, 'G2051934619', '1948274901', '1948274901', 1, 84, '2021-12-12 18:17:33', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(416, 'G2051116531', '1948274901', '1948274901', 1, 85, '2021-12-12 18:17:36', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(417, 'G2051373827', '1948274901', '1948274901', 1, 86, '2021-12-12 18:17:38', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(418, 'G2051402764', '1948274901', '1948274901', 1, 87, '2021-12-12 18:17:40', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(419, 'G2051876778', '1948274901', '1948274901', 1, 88, '2021-12-12 18:20:12', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(420, 'G2051804863', '1948274901', '1948274901', 1, 101, '2021-12-12 18:20:15', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(421, 'G2051490221', '1948274901', '1948274901', 1, 102, '2021-12-12 18:20:17', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(422, 'G2053751267', '1948274901', '1948274901', 1, 120, '2021-12-12 18:20:19', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(423, 'G2051310272', '1948274901', '1948274901', 1, 103, '2021-12-12 18:20:22', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(424, 'G2048718351', '1948274901', '1948274901', 1, 104, '2021-12-12 18:20:26', 'admin', '', '2021-12-12 18:20:37', 'admin', '', '0'),
(425, 'G2051494302', '1948274901', '1948274901', 1, 105, '2021-12-12 18:20:39', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(426, 'G2048776596', '1948274901', '1948274901', 1, 107, '2021-12-12 18:20:42', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(427, 'G2051369063', '1948274901', '1948274901', 1, 108, '2021-12-12 18:20:45', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(428, 'G2048948253', '1948274901', '1948274901', 1, 109, '2021-12-12 18:20:48', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(429, 'G2048716115', '1948274901', '1948274901', 1, 110, '2021-12-12 18:20:51', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(430, 'G2048936959', '1948274901', '1948274901', 1, 111, '2021-12-12 18:20:53', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(431, 'G2048282425', '1948274901', '1948274901', 1, 112, '2021-12-12 18:20:58', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(432, 'G2048375003', '1948274901', '1948274901', 1, 113, '2021-12-12 18:21:00', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(433, 'G2048648009', '1948274901', '1948274901', 1, 121, '2021-12-12 18:21:03', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(434, 'G2048403002', '1948274901', '1948274901', 1, 116, '2021-12-12 18:21:07', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(435, 'G2050584678', '1948274901', '1948274901', 1, 117, '2021-12-12 18:21:11', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(436, 'G2049589186', '1948274901', '1948274901', 1, 118, '2021-12-12 18:21:13', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(437, 'G2048489917', '1948274901', '1948274901', 1, 124, '2021-12-12 18:21:15', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(438, 'G2010118619', '1948274901', '1948274901', 1, 125, '2021-12-12 18:21:17', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(439, 'G2049700099', '1948274901', '1948274901', 1, 126, '2021-12-12 18:21:22', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(440, 'G2049981893', '1948274901', '1948274901', 1, 127, '2021-12-12 18:21:24', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(441, 'G2051858596', '1948274901', '1948274901', 1, 128, '2021-12-12 18:21:26', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(442, 'G2048686114', '1948274901', '1948274901', 1, 129, '2021-12-12 18:21:28', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(443, 'G2051996835', '1948274901', '1948274901', 1, 130, '2021-12-12 18:21:32', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(444, 'G2048905196', '1948274901', '1948274901', 2, 131, '2021-12-12 18:23:30', 'admin', '', '2021-12-12 18:28:15', 'admin', '', '0'),
(445, 'G2052175423', '1948274901', '1948274901', 3, 132, '2021-12-12 18:23:32', 'admin', '', '2021-12-12 18:41:19', 'admin', '', '0'),
(446, 'G4671730511', '1948274901', '1948274901', 1, 137, '2021-12-12 18:23:35', 'admin', '', '2021-12-12 18:26:07', 'admin', '', '0'),
(447, 'G2155786135', '1948274901', '1948274901', 1, 69, '2021-12-12 18:23:51', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(448, 'G2154996928', '1948274901', '1948274901', 1, 42, '2021-12-12 18:23:54', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(449, 'G2154955329', '1948274901', '1948274901', 1, 41, '2021-12-12 18:23:56', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(450, 'G2154205309', '1948274901', '1948274901', 1, 40, '2021-12-12 18:23:58', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(451, 'G2154556208', '1948274901', '1948274901', 1, 39, '2021-12-12 18:24:02', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(452, 'G2154966955', '1948274901', '1948274901', 1, 38, '2021-12-12 18:24:04', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(453, 'G2154245957', '1948274901', '1948274901', 1, 10, '2021-12-12 18:24:06', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(454, 'G2199681340', '1948274901', '1948274901', 1, 94, '2021-12-12 18:24:08', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(455, 'G2199338837', '1948274901', '1948274901', 1, 95, '2021-12-12 18:24:13', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(456, 'G2199453718', '1948274901', '1948274901', 1, 96, '2021-12-12 18:24:15', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(457, 'G2199783871', '1948274901', '1948274901', 1, 97, '2021-12-12 18:24:17', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(458, 'G2199825430', '1948274901', '1948274901', 1, 98, '2021-12-12 18:24:19', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(459, 'G2199727722', '1948274901', '1948274901', 1, 99, '2021-12-12 18:24:22', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(460, 'G2199145231', '1948274901', '1948274901', 1, 100, '2021-12-12 18:24:24', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(461, 'G2048257349', '1948274901', '1948274901', 1, 122, '2021-12-12 18:24:27', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(462, 'G3961230141', '1948274901', '1948274901', 1, 123, '2021-12-12 18:24:40', 'admin', '', '2021-12-12 18:30:02', 'admin', '', '0'),
(463, 'G3964658204', '1948274901', '1948274901', 1, 57, '2021-12-12 18:24:42', 'admin', '', '2021-12-12 18:30:13', 'admin', '', '0'),
(464, 'G3964855558', '1948274901', '1948274901', 1, 54, '2021-12-12 18:24:44', 'admin', '', '2021-12-12 18:30:07', 'admin', '', '0'),
(465, 'G3963760574', '1948274901', '1948274901', 1, 119, '2021-12-12 18:25:03', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(466, 'G2051117718', '1948274901', '1948274901', 1, 21, '2021-12-12 18:25:36', 'admin', '', '2021-12-12 18:27:03', 'admin', '', '0'),
(467, 'G4666524784', '1948274901', '1948274901', 1, 67, '2021-12-12 18:25:38', 'admin', '', '2021-12-12 18:27:05', 'admin', '', '0'),
(468, 'G4666205232', '1948274901', '1948274901', 1, 66, '2021-12-12 18:25:41', 'admin', '', '2021-12-12 18:27:07', 'admin', '', '0'),
(469, 'G4671248714', '1948274901', '1948274901', 1, 136, '2021-12-12 18:26:16', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(470, 'G4671205107', '1948274901', '1948274901', 1, 134, '2021-12-12 18:26:18', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(471, 'G4671162811', '1948274901', '1948274901', 1, 133, '2021-12-12 18:26:21', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(472, 'G4685687348', '1948274901', '1948274901', 1, 43, '2021-12-12 18:26:24', 'admin', '', '2021-12-12 18:26:36', 'admin', '', '0'),
(473, 'G4666603329', '1948274901', '1948274901', 1, 45, '2021-12-12 18:26:39', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(474, 'G4669771144', '1948274901', '1948274901', 1, 73, '2021-12-12 18:26:42', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(475, 'G4667614327', '1948274901', '1948274901', 1, 59, '2021-12-12 18:26:44', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(476, 'G4666125941', '1948274901', '1948274901', 1, 58, '2021-12-12 18:26:47', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(477, 'G4666942805', '1948274901', '1948274901', 1, 72, '2021-12-12 18:26:49', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(478, 'G4669106096', '1948274901', '1948274901', 1, 63, '2021-12-12 18:26:53', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(479, 'G4666405077', '1948274901', '1948274901', 1, 62, '2021-12-12 18:26:55', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(480, 'G4667966559', '1948274901', '1948274901', 1, 61, '2021-12-12 18:26:57', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(481, 'G4667659738', '1948274901', '1948274901', 1, 60, '2021-12-12 18:27:00', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(482, 'G4669458672', '1948274901', '1948274901', 1, 64, '2021-12-12 18:27:09', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(483, 'G4786974277', '1948274901', '1948274901', 1, 24, '2021-12-12 18:27:28', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(484, 'G4786230603', '1948274901', '1948274901', 1, 25, '2021-12-12 18:27:30', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(485, 'G4786530134', '1948274901', '1948274901', 1, 26, '2021-12-12 18:27:33', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(486, 'G4786852063', '1948274901', '1948274901', 1, 33, '2021-12-12 18:27:46', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(487, 'G4786438942', '1948274901', '1948274901', 1, 70, '2021-12-12 18:27:49', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(488, 'G4786999013', '1948274901', '1948274901', 1, 32, '2021-12-12 18:27:51', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(489, 'G4786460101', '1948274901', '1948274901', 1, 35, '2021-12-12 18:27:53', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(490, 'G4776184073', '1948274901', '1948274901', 1, 68, '2021-12-12 18:27:56', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(491, 'G4775307118', '1948274901', '1948274901', 1, 65, '2021-12-12 18:27:59', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(492, 'G4773576920', '1948274901', '1948274901', 1, 56, '2021-12-12 18:28:01', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(493, 'G2053294470', '1948274901', '1948274901', 1, 138, '2021-12-12 18:28:19', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(494, 'G5284941384', '1948274901', '1948274901', 1, 91, '2021-12-12 18:30:30', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(495, 'G2051693613', '1803034613', '1803034613', 5, 11, '2021-12-12 18:31:56', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(496, 'G4666205232', '1803034613', '1803034613', 4, 66, '2021-12-12 18:32:09', 'admin', '', '2021-12-12 18:32:12', 'admin', '', '0'),
(497, 'G4667659738', '1803034613', '1803034613', 0, 60, '2021-12-12 18:32:27', 'admin', '', '2021-12-12 18:32:47', 'admin', '', '2'),
(498, 'G4666125941', '1803034613', '1803034613', 0, 58, '2021-12-12 18:32:35', 'admin', '', '2021-12-12 18:32:42', 'admin', '', '2'),
(499, 'G2052175423', '714424866', '714424866', 7, 132, '2021-12-13 18:30:07', 'admin', '', '2021-12-13 18:32:23', 'admin', '', '0'),
(500, 'G2048905196', '714424866', '714424866', 2, 131, '2021-12-13 18:31:34', 'admin', '', '2021-12-13 18:32:26', 'admin', '', '0'),
(501, 'G2050540971', '775148857', '775148857', 1, 74, '2021-12-14 11:59:30', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(502, 'G2048648009', '762013867', '762013867', 0, 121, '2021-12-16 12:22:26', 'admin', '', '2021-12-16 12:23:28', 'admin', '', '2'),
(503, 'G2048375003', '762013867', '762013867', 0, 113, '2021-12-16 12:22:34', 'admin', '', '2021-12-16 12:31:14', 'admin', '', '2'),
(504, 'G4775307118', '762013867', '762013867', 0, 65, '2021-12-16 12:31:00', 'admin', '', '2021-12-16 12:31:18', 'admin', '', '2'),
(505, 'G2052175423', '2122228303', '2122228303', 1, 132, '2021-12-27 11:18:52', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(506, 'G2048905196', '2122228303', '2122228303', 1, 131, '2021-12-27 11:18:59', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(507, 'G4671730511', '2122228303', '2122228303', 1, 137, '2021-12-27 11:19:08', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(508, 'G2052175423', '651378917', '651378917', 1, 132, '2021-12-31 16:51:48', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(509, 'G2052175423', '1820964156', '1820964156', 1, 132, '2021-12-31 16:52:21', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(511, 'G2154955329', '436470430', '436470430', 3, 41, '2021-12-31 21:03:21', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(512, 'G2048905196', '274891472', '274891472', 1, 131, '2022-01-07 17:31:17', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(513, 'G2051858596', '910854695', '910854695', 1, 128, '2022-01-10 20:20:30', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(514, 'G3963760574', '1904632651', '1904632651', 1, 119, '2022-01-10 20:57:38', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(515, 'G2048905196', '271870205', '271870205', 1, 131, '2022-01-11 12:57:49', 'admin', '', '0000-00-00 00:00:00', '', '', '0');
INSERT INTO `v_product_cart` (`id`, `product_id`, `user_id`, `session_user_id`, `quantity`, `size_id`, `created_on`, `created_by`, `created_ip`, `modified_on`, `modified_by`, `modified_ip`, `status`) VALUES
(516, 'G2051858596', '271870205', '271870205', 1, 128, '2022-01-11 12:57:52', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(517, 'G2049700099', '271870205', '271870205', 1, 126, '2022-01-11 12:57:54', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(518, 'G2050540971', '754515441', '754515441', 1, 74, '2022-01-11 18:46:38', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(519, 'G2052175423', '1650529134', '1650529134', 1, 132, '2022-01-13 11:39:23', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(520, 'G2052175423', '1268451894', '1268451894', 1, 132, '2022-01-16 11:23:33', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(521, 'G2052175423', '1456074811', '1456074811', 1, 132, '2022-01-16 11:23:49', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(522, 'G2052175423', '2023578957', '2023578957', 2, 132, '2022-01-17 11:07:31', 'admin', '', '2022-01-17 11:07:35', 'admin', '', '0'),
(523, 'G2053294470', '1831021834', '1831021834', 8, 138, '2022-01-17 14:15:04', 'admin', '', '2022-01-17 14:16:24', 'admin', '', '0'),
(524, 'G2048403002', '1577581637', '1577581637', 1, 116, '2022-01-17 14:17:26', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(525, 'G2052175423', '1099119745', '1099119745', 1, 132, '2022-01-17 14:18:32', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(526, 'G2048905196', '1099119745', '1099119745', 1, 131, '2022-01-17 14:18:35', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(527, 'G2052175423', '2033234752', '2033234752', 1, 132, '2022-01-18 12:28:01', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(528, 'G2048905196', '2033234752', '2033234752', 1, 131, '2022-01-18 12:28:06', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(529, 'G2052175423', '161214536', '161214536', 1, 132, '2022-01-20 12:21:07', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(530, 'G2052175423', '1366579707', '1366579707', 1, 132, '2022-01-20 12:22:34', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(531, 'G2049981893', '1676607770', '1676607770', 1, 127, '2022-01-22 15:07:52', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(532, 'G4671785353', '316159248', '316159248', 2, 135, '2022-01-22 15:07:57', 'admin', '', '2022-01-22 15:08:02', 'admin', '', '0'),
(533, 'G2049981893', '744933020', '744933020', 1, 127, '2022-01-22 15:08:09', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(534, 'G2048257349', '316159248', '316159248', 1, 122, '2022-01-22 15:08:09', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(535, 'G2052175423', '1285686900', '1285686900', 0, 132, '2022-01-22 15:08:30', 'admin', '', '2022-01-22 15:09:01', 'admin', '', '2'),
(536, 'G2053294470', '1641041407', '1641041407', 1, 138, '2022-01-25 11:05:39', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(537, 'G2048905196', '2055143028', '2055143028', 1, 131, '2022-01-27 17:56:53', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(538, 'G3963760574', '1586897787', '1586897787', 1, 119, '2022-01-27 20:05:43', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(539, 'G2049700099', '1586897787', '1586897787', 1, 126, '2022-01-27 20:05:50', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(540, 'G2048905196', '1586897787', '1586897787', 1, 131, '2022-01-27 20:06:20', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(541, 'G2052175423', '1586897787', '1586897787', 1, 132, '2022-01-27 20:06:42', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(542, 'G2052175423', '1002009533', '1002009533', 0, 132, '2022-01-27 20:07:08', 'admin', '', '2022-01-27 20:08:40', 'admin', '', '2'),
(543, 'G4671248714', '290945301', '290945301', 2, 136, '2022-01-28 00:05:13', 'admin', '', '2022-01-28 00:07:06', 'admin', '', '0'),
(544, 'G2052175423', '383439254', '383439254', 2, 132, '2022-01-28 08:45:23', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(545, 'G2048905196', '993392900', '993392900', 1, 131, '2022-01-28 08:46:11', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(546, 'G4671785353', '1920586908', '1920586908', 2, 135, '2022-01-28 08:59:21', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(547, 'G4671162811', '1920586908', '1920586908', 1, 133, '2022-01-28 08:59:24', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(548, 'G2048905196', '1920586908', '1920586908', 1, 131, '2022-01-28 08:59:27', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(549, 'G4671248714', '1920586908', '1920586908', 1, 136, '2022-01-28 08:59:30', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(550, 'G2048905196', '1933253576', '1933253576', 1, 131, '2022-01-28 13:56:24', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(551, 'G2052175423', '849229184', '849229184', 1, 132, '2022-01-30 12:38:29', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(561, 'G2053294470', '1495038600', '1495038600', 1, 138, '2022-02-02 10:10:44', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(562, 'G2048489917', '403194574', '403194574', 1, 124, '2022-02-11 21:31:22', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(563, 'G2049700099', '403194574', '403194574', 0, 126, '2022-02-11 21:31:29', 'admin', '', '2022-02-11 21:31:40', 'admin', '', '2'),
(564, 'G2048282425', '1100403524', '1100403524', 1, 112, '2022-02-15 13:40:48', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(565, 'G2052175423', '1333267327', '1333267327', 1, 132, '2022-02-19 20:43:59', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(566, 'G4775307118', '1337450924', '1337450924', 1, 65, '2022-02-20 13:50:47', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(567, 'G4786460101', '1337450924', '1337450924', 1, 35, '2022-02-20 13:50:50', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(570, 'G2049700099', '2019636238', '2019636238', 1, 126, '2022-02-27 13:30:31', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(571, 'G2049700099', '672128701', '672128701', 1, 126, '2022-02-27 13:30:45', 'admin', '', '2022-02-27 13:30:57', 'admin', '', '0'),
(572, 'G2049700099', '1386639373', '1386639373', 2, 126, '2022-03-04 08:43:00', 'admin', '', '2022-03-04 08:43:18', 'admin', '', '0'),
(576, 'G2050584678', '1754469521', '1754469521', 5, 117, '2022-03-07 09:08:02', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(577, 'G2049700099', '1097078843', '1097078843', 2, 126, '2022-03-12 08:00:59', 'admin', '', '2022-03-12 08:01:03', 'admin', '', '0'),
(580, 'G2052175423', '744703411', '744703411', 1, 132, '2022-03-13 11:57:31', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(581, 'G2052175423', '1803781840', '1803781840', 1, 132, '2022-03-13 11:57:57', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(582, 'G2048905196', '200940272', '200940272', 2, 131, '2022-03-13 11:58:16', 'admin', '', '2022-03-13 11:58:17', 'admin', '', '0'),
(583, 'G2053294470', '1234799902', '1234799902', 1, 138, '2022-03-15 11:50:29', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(584, 'G2049700099', '1071197010', '1071197010', 1, 126, '2022-03-15 11:55:16', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(585, 'G2053294470', '1071197010', '1071197010', 1, 138, '2022-03-15 11:55:58', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(586, 'G2052175423', '2137119234', '2137119234', 1, 132, '2022-03-15 16:29:46', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(587, 'G3963760574', '76985249', '76985249', 1, 119, '2022-03-15 16:31:08', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(588, 'G2049700099', '1602809389', '1602809389', 2, 126, '2022-03-16 17:00:03', 'admin', '', '2022-03-16 17:00:04', 'admin', '', '0'),
(589, 'G2049700099', '2069711708', '2069711708', 10, 126, '2022-03-16 17:00:21', 'admin', '', '2022-03-16 17:02:28', 'admin', '', '0'),
(590, 'G2049700099', '1490055024', '1490055024', 1, 126, '2022-03-16 22:42:54', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(591, 'G2049700099', '1442907758', '1442907758', 1, 126, '2022-03-16 22:43:16', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(592, 'G2049700099', '1158605455', '1158605455', 0, 126, '2022-03-16 23:02:48', 'admin', '', '2022-03-16 23:03:07', 'admin', '', '2'),
(593, 'G2049700099', '462344742', '462344742', 1, 126, '2022-03-18 10:35:32', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(594, 'G2049700099', '1215313420', '1215313420', 1, 126, '2022-03-18 10:35:57', 'admin', '', '2022-03-18 10:48:56', 'admin', '', '0'),
(595, 'G2049700099', '1787875541', '1787875541', 2, 126, '2022-03-20 17:10:04', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(596, 'G4786230603', '1499025525', '1499025525', 10, 25, '2022-03-29 12:36:20', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(597, 'G4786530134', '1499025525', '1499025525', 10, 26, '2022-03-29 12:36:24', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(598, 'G2049700099', '46250932', '46250932', 1, 126, '2022-03-29 20:33:56', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(599, 'G4667966559', '300288097', '300288097', 1, 61, '2022-03-29 21:00:14', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(600, 'G4786438942', '300288097', '300288097', 1, 70, '2022-03-29 21:01:33', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(601, 'G2049700099', '300288097', '300288097', 2, 126, '2022-03-29 21:02:17', 'admin', '', '2022-03-29 21:16:17', 'admin', '', '0'),
(602, 'G2049700099', '1678956911', '1678956911', 1, 126, '2022-03-30 18:17:47', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(603, 'G2049700099', '556658137', '556658137', 3, 126, '2022-04-09 18:16:33', 'admin', '', '2022-04-09 18:16:38', 'admin', '', '0'),
(604, 'G2049700099', '1436650446', '1436650446', 2, 126, '2022-04-09 18:17:03', 'admin', '', '2022-04-09 18:19:17', 'admin', '', '0'),
(605, 'G2049700099', '1883509888', '1883509888', 1, 126, '2022-04-11 22:55:55', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(606, 'G2049700099', '1450917257', '1450917257', 1, 126, '2022-04-11 22:56:11', 'admin', '', '2022-04-11 22:57:45', 'admin', '', '0'),
(607, 'G2049700099', '701693438', '701693438', 1, 126, '2022-04-12 08:53:28', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(608, 'G2049700099', '526186248', '526186248', 1, 126, '2022-04-12 18:19:44', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(609, 'G2049700099', '1656151241', '1656151241', 1, 126, '2022-04-12 20:15:04', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(610, 'G2049700099', '1004113273', '1004113273', 1, 126, '2022-04-18 12:21:12', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(611, 'G2049700099', '289351298', '289351298', 4, 126, '2022-04-18 12:21:29', 'admin', '', '2022-04-18 12:24:41', 'admin', '', '0'),
(612, 'G2049700099', '523886412', '523886412', 2, 126, '2022-04-19 12:12:19', 'admin', '', '2022-04-19 13:47:56', 'admin', '', '0'),
(613, 'G2049700099', '1206248309', '1206248309', 2, 126, '2022-04-19 12:15:19', 'admin', '', '2022-04-19 12:15:24', 'admin', '', '0'),
(614, 'G2051858596', '1445871994', '1445871994', 2, 128, '2022-04-20 08:40:02', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(615, 'G2048905196', '2086776503', '2086776503', 1, 131, '2022-04-20 08:40:54', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(616, 'G5284941384', '2086776503', '2086776503', 1, 91, '2022-04-20 08:41:26', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(617, 'G4671785353', '1722959680', '1722959680', 1, 135, '2022-04-20 08:51:57', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(618, 'G2053294470', '1722959680', '1722959680', 1, 138, '2022-04-20 08:52:11', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(619, 'G4671730511', '1552898998', '1552898998', 1, 137, '2022-04-20 08:53:52', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(620, 'G2052175423', '1552898998', '1552898998', 1, 132, '2022-04-20 08:56:09', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(621, 'G2053294470', '1552898998', '1552898998', 1, 138, '2022-04-20 08:56:13', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(622, 'G4786230603', '1552898998', '1552898998', 1, 25, '2022-04-20 08:56:23', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(623, 'G2049589186', '324772496', '324772496', 2, 118, '2022-04-20 10:47:14', 'admin', '', '2022-04-20 10:47:47', 'admin', '', '0'),
(624, 'G2048905196', '324772496', '324772496', 1, 131, '2022-04-20 10:48:00', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(625, 'G2053294470', '324772496', '324772496', 1, 138, '2022-04-20 10:48:08', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(626, 'G2051858596', '324772496', '324772496', 1, 128, '2022-04-20 10:48:15', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(627, 'G3963760574', '324772496', '324772496', 1, 119, '2022-04-20 10:48:21', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(628, 'G2048489917', '324772496', '324772496', 1, 124, '2022-04-20 10:48:32', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(629, 'G2051693613', '859975482', '859975482', 1, 11, '2022-04-20 11:09:53', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(630, 'G2049700099', '83069694', '83069694', 1, 126, '2022-04-24 08:28:38', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(631, 'G2049700099', '873766829', '873766829', 2, 126, '2022-04-24 08:28:53', 'admin', '', '2022-04-24 08:29:34', 'admin', '', '0'),
(632, 'G2049700099', '221585712', '221585712', 1, 126, '2022-04-24 12:50:38', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(633, 'G2049700099', '1323871687', '1323871687', 1, 126, '2022-04-24 12:50:49', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(634, 'G2049700099', '1693804206', '1693804206', 1, 126, '2022-04-25 11:55:59', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(635, 'G2049700099', '1237337851', '1237337851', 1, 126, '2022-04-25 11:56:13', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(636, 'G2049700099', '1220576300', '1220576300', 2, 126, '2022-04-28 11:48:35', 'admin', '', '2022-04-28 11:48:44', 'admin', '', '0'),
(637, 'G2049700099', '1339454786', '1339454786', 1, 126, '2022-04-28 11:48:58', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(638, 'G2049700099', '238551961', '238551961', 1, 126, '2022-05-02 07:30:59', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(639, 'G2049700099', '211761215', '211761215', 16, 126, '2022-05-02 08:13:35', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(640, 'G2048905196', '1198258921', '1198258921', 5, 131, '2022-05-02 08:14:22', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(641, 'G2049700099', '1198258921', '1198258921', 16, 126, '2022-05-02 08:17:58', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(642, 'G2049700099', '1543321541', '1543321541', 2, 126, '2022-05-14 16:58:51', 'admin', '', '2022-05-14 17:04:25', 'admin', '', '0'),
(643, 'G2049700099', '1341481724', '1341481724', 2, 126, '2022-06-12 16:52:30', 'admin', '', '2022-06-12 16:53:21', 'admin', '', '0'),
(644, 'G2051117718', '207834226', '207834226', 0, 21, '2022-06-28 09:07:46', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(645, 'G2052175423', '1738874490', '1738874490', 1, 132, '2022-06-28 23:12:03', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(646, 'G2048905196', '1738874490', '1738874490', 1, 131, '2022-06-28 23:12:05', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(647, 'G2052175423', '3327939', '3327939', 1, 132, '2022-07-10 18:37:48', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(649, 'G2048905196', '2066870840', '2066870840', 1, 131, '2022-07-17 11:53:59', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(650, 'G2048905196', '1883781741', '1883781741', 1, 131, '2022-07-17 11:54:10', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(652, 'G4685687348', '1947249191', '1947249191', 1, 43, '2022-07-27 14:30:34', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(653, 'G2048905196', '1683590587', '1683590587', 1, 131, '2022-07-28 11:28:18', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(654, 'G2049700099', '141703835', '141703835', 3, 126, '2022-07-28 11:28:49', 'admin', '', '2022-07-28 11:29:44', 'admin', '', '0'),
(655, 'G4671134515', '141703835', '141703835', 3, 126, '2022-07-28 11:29:31', 'admin', '', '2022-07-28 11:29:47', 'admin', '', '0'),
(656, 'G2052175423', '336716550', '336716550', 1, 132, '2022-08-12 08:58:39', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(657, 'G2052175423', '344956409', '344956409', 1, 132, '2022-08-12 09:59:03', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(660, 'G2053294470', '974986031', '974986031', 1, 138, '2022-08-19 17:46:05', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(661, 'G2052175423', '625056228', '625056228', 1, 132, '2022-08-19 17:47:49', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(662, 'G2048905196', '625056228', '625056228', 1, 131, '2022-08-19 17:47:51', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(663, 'G2053294470', '625056228', '625056228', 1, 138, '2022-08-19 17:48:03', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(664, 'G2049981893', '625056228', '625056228', 1, 127, '2022-08-19 17:48:10', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(665, 'G2049589186', '625056228', '625056228', 1, 118, '2022-08-19 17:48:19', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(666, 'G2048282425', '625056228', '625056228', 1, 112, '2022-08-19 17:48:40', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(667, 'G2048936959', '625056228', '625056228', 1, 111, '2022-08-19 17:48:40', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(668, 'G2048716115', '625056228', '625056228', 1, 110, '2022-08-19 17:48:42', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(669, 'G2048948253', '625056228', '625056228', 1, 109, '2022-08-19 17:48:43', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(671, 'G2052175423', '268963485', '268963485', 1, 132, '2022-08-20 13:01:58', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(672, 'G2049981893', '268963485', '268963485', 1, 127, '2022-08-20 13:02:02', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(673, 'G2053294470', '268963485', '268963485', 1, 138, '2022-08-20 13:02:07', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(674, 'G2049700099', '268963485', '268963485', 1, 126, '2022-08-20 13:02:10', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(675, 'G2052175423', '393798509', '393798509', 1, 132, '2022-08-20 13:03:37', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(676, 'G2048905196', '393798509', '393798509', 1, 131, '2022-08-20 13:03:37', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(677, 'G2053294470', '393798509', '393798509', 1, 138, '2022-08-20 13:03:41', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(678, 'G2049981893', '393798509', '393798509', 1, 127, '2022-08-20 13:03:43', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(686, 'G2052175423', '481915967', '481915967', 0, 132, '2022-08-25 12:01:22', 'admin', '', '2022-08-25 12:01:51', 'admin', '', '2'),
(687, 'G3961230141', '1406074385', '1406074385', 1, 123, '2022-08-25 22:00:29', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(688, 'G2053294470', '151835048', '151835048', 1, 138, '2022-08-26 14:46:22', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(689, 'G2049589186', '87134426', '87134426', 1, 118, '2022-08-27 12:07:18', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(690, 'G2051858596', '70797436', '70797436', 1, 128, '2022-08-27 15:36:20', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(691, 'G2049700099', '70797436', '70797436', 1, 126, '2022-08-27 15:36:21', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(692, 'G2052175423', '70797436', '70797436', 1, 132, '2022-08-27 15:36:25', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(693, 'G2052175423', '605903186', '605903186', 1, 132, '2022-08-27 15:36:35', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(694, 'G2048648009', '605903186', '605903186', 1, 121, '2022-08-27 15:36:41', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(695, 'G2048282425', '605903186', '605903186', 1, 112, '2022-08-27 15:36:41', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(696, 'G2048716115', '605903186', '605903186', 1, 110, '2022-08-27 15:36:42', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(697, 'G2052175423', '738323345', '738323345', 1, 132, '2022-09-05 06:01:33', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(698, 'G2052175423', '341242155', '341242155', 1, 132, '2022-09-05 06:14:53', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(699, 'G2053294470', '341242155', '341242155', 1, 138, '2022-09-05 06:14:55', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(700, 'G2049700099', '341242155', '341242155', 2, 126, '2022-09-05 06:15:01', 'admin', '', '2022-09-05 06:15:02', 'admin', '', '0'),
(701, 'G2051858596', '341242155', '341242155', 1, 128, '2022-09-05 06:15:04', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(702, 'G2053294470', '2035679030', '2035679030', 1, 138, '2022-09-05 06:15:20', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(703, 'G2052175423', '2035679030', '2035679030', 1, 132, '2022-09-05 06:15:23', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(704, 'G2050584678', '947580186', '947580186', 0, 117, '2024-02-20 10:22:33', 'admin', '', '2024-02-20 10:23:10', 'admin', '', '2'),
(705, 'G2052175423', '947580186', '947580186', 3, 132, '2024-02-20 10:24:03', 'admin', '', '2024-02-20 10:24:13', 'admin', '', '0'),
(706, 'G2048282425', '947580186', '947580186', 1, 112, '2024-02-20 11:12:33', 'admin', '', '0000-00-00 00:00:00', '', '', '0'),
(707, 'G4671248714', '947580186', '947580186', 1, 136, '2024-02-20 11:12:59', 'admin', '', '0000-00-00 00:00:00', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `v_product_color_size`
--

CREATE TABLE `v_product_color_size` (
  `id` int(11) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `left_quantity` int(11) NOT NULL,
  `total_availability` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `purchaseing_price` decimal(7,2) NOT NULL,
  `MRP_price` decimal(7,2) NOT NULL,
  `color` enum('Red','Green','Blue','White','Black','Brown','Pink','Sky','Yellow','Orange') NOT NULL,
  `size` enum('50GM','100GM','200GM','250GM','300GM','350GM','400GM','450GM','500GM','1KG','5KG','10KG') NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `created_ip` varchar(100) NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `modified_by` varchar(10) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_product_color_size`
--

INSERT INTO `v_product_color_size` (`id`, `product_id`, `left_quantity`, `total_availability`, `total_quantity`, `price`, `purchaseing_price`, `MRP_price`, `color`, `size`, `status`, `created_on`, `created_ip`, `created_by`, `modified_by`, `modified_on`, `modified_ip`) VALUES
(3, 'G2051693613', 12, 12, 10, '1200.00', '0.00', '1400.00', 'Orange', '50GM', '2', '2021-11-03 12:48:04', '', 'admin', 'admin', '2021-11-06 12:50:44', ''),
(4, 'G2051693613', 23, 34, 122, '1400.00', '0.00', '1800.00', 'White', '250GM', '2', '2021-11-03 12:48:04', '', 'admin', 'admin', '2021-11-06 12:49:45', ''),
(5, 'G2051693613', 322, 345, 34, '1600.00', '0.00', '2000.00', 'Green', '1KG', '2', '2021-11-03 12:48:04', '', 'admin', 'admin', '2021-11-06 12:49:48', ''),
(6, 'G2154245957', 10, 12, 12, '49.00', '0.00', '55.00', 'Green', '250GM', '2', '2021-11-03 18:22:16', '', 'admin', 'admin', '2021-11-03 18:23:45', ''),
(7, 'G2154245957', 10, 12, 12, '49.00', '0.00', '55.00', 'Green', '250GM', '2', '2021-11-03 18:22:23', '', 'admin', 'admin', '2021-11-03 18:23:43', ''),
(8, 'G2154245957', 10, 12, 12, '49.00', '0.00', '55.00', 'Green', '250GM', '2', '2021-11-03 18:22:28', '', 'admin', 'admin', '2021-11-03 18:23:40', ''),
(9, 'G2154245957', 10, 12, 12, '49.00', '0.00', '55.00', 'Green', '250GM', '2', '2021-11-03 18:22:44', '', 'admin', 'admin', '2021-11-06 15:06:12', ''),
(10, 'G2154245957', 10, 12, 12, '49.00', '0.00', '55.00', 'Yellow', '200GM', '0', '2021-11-03 18:38:07', '', 'admin', '', '0000-00-00 00:00:00', ''),
(11, 'G2051693613', 6, 6, 6, '41.00', '0.00', '46.00', 'Red', '100GM', '0', '2021-11-06 13:11:53', '', 'admin', '', '0000-00-00 00:00:00', ''),
(12, 'G2051953741', 6, 6, 6, '30.00', '0.00', '34.00', 'Yellow', '100GM', '0', '2021-11-06 13:19:00', '', 'admin', '', '0000-00-00 00:00:00', ''),
(13, 'G2051571495', 6, 6, 6, '30.00', '0.00', '34.00', '', '100GM', '0', '2021-11-06 13:22:48', '', 'admin', '', '0000-00-00 00:00:00', ''),
(14, 'G2051877654', 6, 6, 6, '55.00', '0.00', '61.00', '', '100GM', '0', '2021-11-06 13:25:51', '', 'admin', '', '0000-00-00 00:00:00', ''),
(15, 'G2051995348', 8, 8, 8, '70.00', '0.00', '78.00', '', '100GM', '0', '2021-11-06 13:28:06', '', 'admin', '', '0000-00-00 00:00:00', ''),
(16, 'G2051779307', 8, 8, 8, '70.00', '0.00', '78.00', 'Red', '100GM', '0', '2021-11-06 13:30:15', '', 'admin', '', '0000-00-00 00:00:00', ''),
(17, 'G2051750098', 8, 8, 8, '63.00', '0.00', '70.00', '', '100GM', '0', '2021-11-06 13:31:20', '', 'admin', '', '0000-00-00 00:00:00', ''),
(18, 'G2051973527', 8, 8, 8, '72.00', '0.00', '82.00', '', '100GM', '2', '2021-11-06 13:32:08', '', 'admin', 'admin', '2021-11-06 16:38:25', ''),
(19, 'G2051608230', 15, 15, 15, '61.00', '0.00', '68.00', '', '', '2', '2021-11-06 13:33:58', '', 'admin', 'admin', '2021-11-06 13:51:53', ''),
(20, 'G2051608230', 15, 15, 15, '61.00', '0.00', '68.00', '', '', '0', '2021-11-06 13:51:41', '', 'admin', '', '0000-00-00 00:00:00', ''),
(21, 'G2051117718', 4, 4, 4, '25.00', '0.00', '30.00', '', '', '0', '2021-11-06 14:44:42', '', 'admin', '', '0000-00-00 00:00:00', ''),
(22, 'G4786974277', 4, 4, 4, '42.00', '0.00', '45.00', '', '', '2', '2021-11-06 14:45:22', '', 'admin', 'admin', '2021-11-06 14:45:48', ''),
(23, 'G4786974277', 0, 0, 0, '0.00', '0.00', '0.00', '', '250GM', '2', '2021-11-06 14:45:34', '', 'admin', 'admin', '2021-11-06 14:45:45', ''),
(24, 'G4786974277', 4, 4, 4, '42.00', '0.00', '45.00', '', '250GM', '0', '2021-11-06 14:46:16', '', 'admin', '', '0000-00-00 00:00:00', ''),
(25, 'G4786230603', 4, 4, 4, '59.00', '0.00', '62.00', '', '1KG', '0', '2021-11-06 14:47:51', '', 'admin', '', '0000-00-00 00:00:00', ''),
(26, 'G4786530134', 4, 4, 4, '58.00', '0.00', '60.00', '', '1KG', '0', '2021-11-06 14:48:28', '', 'admin', '', '0000-00-00 00:00:00', ''),
(27, 'G4786173296', 4, 4, 4, '20.00', '0.00', '21.00', '', '1KG', '0', '2021-11-06 14:49:13', '', 'admin', '', '0000-00-00 00:00:00', ''),
(28, 'G4786852063', 12, 12, 12, '35.00', '0.00', '35.00', '', '', '2', '2021-11-06 14:49:58', '', 'admin', 'admin', '2021-11-06 14:59:32', ''),
(29, 'G4786438942', 10, 10, 10, '16.00', '0.00', '16.00', '', '250GM', '2', '2021-11-06 14:50:33', '', 'admin', 'admin', '2021-11-06 14:55:52', ''),
(30, 'G2155786135', 4, 4, 4, '122.00', '0.00', '125.00', '', '250GM', '2', '2021-11-06 14:51:00', '', 'admin', 'admin', '2021-11-06 16:28:32', ''),
(31, 'G4786999013', 10, 10, 10, '19.00', '0.00', '20.00', '', '', '2', '2021-11-06 14:54:17', '', 'admin', 'admin', '2021-11-06 14:54:46', ''),
(32, 'G4786999013', 10, 10, 10, '19.00', '0.00', '20.00', '', '250GM', '0', '2021-11-06 14:55:04', '', 'admin', '', '0000-00-00 00:00:00', ''),
(33, 'G4786852063', 10, 10, 10, '33.00', '0.00', '35.00', '', '', '0', '2021-11-06 15:00:22', '', 'admin', '', '0000-00-00 00:00:00', ''),
(34, 'G4786438942', 10, 10, 10, '14.00', '0.00', '16.00', '', '250GM', '2', '2021-11-06 15:01:22', '', 'admin', 'admin', '2021-11-06 16:31:25', ''),
(35, 'G4786460101', 10, 10, 10, '33.00', '0.00', '35.00', '', '100GM', '0', '2021-11-06 15:02:19', '', 'admin', '', '0000-00-00 00:00:00', ''),
(36, 'G2154699758', 2, 2, 2, '49.00', '0.00', '55.00', '', '200GM', '0', '2021-11-06 15:07:05', '', 'admin', '', '0000-00-00 00:00:00', ''),
(37, 'G2154567185', 2, 2, 2, '49.00', '0.00', '55.00', '', '200GM', '0', '2021-11-06 15:07:35', '', 'admin', '', '0000-00-00 00:00:00', ''),
(38, 'G2154966955', 2, 2, 2, '109.00', '0.00', '119.00', '', '400GM', '0', '2021-11-06 15:08:17', '', 'admin', '', '0000-00-00 00:00:00', ''),
(39, 'G2154556208', 2, 2, 2, '46.00', '0.00', '48.00', '', '200GM', '0', '2021-11-06 15:09:27', '', 'admin', '', '0000-00-00 00:00:00', ''),
(40, 'G2154205309', 2, 2, 2, '42.00', '0.00', '44.00', '', '200GM', '0', '2021-11-06 15:10:56', '', 'admin', '', '0000-00-00 00:00:00', ''),
(41, 'G2154955329', 2, 2, 2, '89.00', '0.00', '91.00', '', '400GM', '0', '2021-11-06 15:11:30', '', 'admin', '', '0000-00-00 00:00:00', ''),
(42, 'G2154996928', 2, 2, 2, '93.00', '0.00', '109.00', '', '400GM', '0', '2021-11-06 15:14:45', '', 'admin', '', '0000-00-00 00:00:00', ''),
(43, 'G4685687348', 4, 4, 4, '88.00', '0.00', '90.00', '', '100GM', '0', '2021-11-06 15:16:54', '', 'admin', '', '0000-00-00 00:00:00', ''),
(44, 'G2049527614', 8, 8, 8, '188.00', '0.00', '253.00', '', '', '1', '2021-11-06 15:18:15', '', 'admin', 'admin', '2021-11-24 19:50:15', ''),
(45, 'G4666603329', 4, 4, 4, '50.00', '0.00', '52.00', '', '', '0', '2021-11-06 15:19:53', '', 'admin', '', '0000-00-00 00:00:00', ''),
(46, 'G2052254466', 2, 2, 2, '472.00', '0.00', '590.00', '', '10KG', '0', '2021-11-06 15:21:40', '', 'admin', '', '0000-00-00 00:00:00', ''),
(47, 'G2052254573', 2, 2, 2, '600.00', '0.00', '750.00', '', '10KG', '0', '2021-11-06 15:22:18', '', 'admin', '', '0000-00-00 00:00:00', ''),
(48, 'G2052162766', 4, 4, 4, '380.00', '0.00', '475.00', '', '5KG', '0', '2021-11-06 15:23:07', '', 'admin', '', '0000-00-00 00:00:00', ''),
(49, 'G2052320110', 5, 5, 5, '508.00', '0.00', '635.00', '', '5KG', '0', '2021-11-06 15:23:43', '', 'admin', '', '0000-00-00 00:00:00', ''),
(50, 'G2052488418', 4, 4, 4, '484.00', '0.00', '605.00', '', '5KG', '0', '2021-11-06 15:24:16', '', 'admin', '', '0000-00-00 00:00:00', ''),
(51, 'G4773539167', 6, 6, 6, '170.00', '0.00', '193.00', '', '10KG', '0', '2021-11-06 15:25:59', '', 'admin', '', '0000-00-00 00:00:00', ''),
(52, 'G2050809786', 4, 4, 4, '90.00', '0.00', '139.00', '', '1KG', '0', '2021-11-06 15:27:41', '', 'admin', '', '0000-00-00 00:00:00', ''),
(53, 'G4777594528', 5, 5, 5, '51.00', '0.00', '59.00', '', '', '0', '2021-11-06 15:29:25', '', 'admin', '', '0000-00-00 00:00:00', ''),
(54, 'G3964855558', 3, 3, 3, '18.00', '0.00', '20.00', '', '100GM', '0', '2021-11-06 15:32:43', '', 'admin', '', '0000-00-00 00:00:00', ''),
(55, 'G2053342490', 8, 8, 8, '20.00', '0.00', '22.00', '', '1KG', '0', '2021-11-06 15:34:07', '', 'admin', '', '0000-00-00 00:00:00', ''),
(56, 'G4773576920', 4, 4, 4, '58.00', '0.00', '60.00', '', '250GM', '0', '2021-11-06 15:35:22', '', 'admin', '', '0000-00-00 00:00:00', ''),
(57, 'G3964658204', 2, 2, 2, '135.00', '0.00', '150.00', '', '1KG', '0', '2021-11-06 15:37:22', '', 'admin', '', '0000-00-00 00:00:00', ''),
(58, 'G4666125941', 5, 5, 5, '18.00', '0.00', '20.00', '', '', '0', '2021-11-06 15:38:56', '', 'admin', '', '0000-00-00 00:00:00', ''),
(59, 'G4667614327', 1, 1, 1, '25.00', '0.00', '30.00', '', '', '0', '2021-11-06 15:40:36', '', 'admin', '', '0000-00-00 00:00:00', ''),
(60, 'G4667659738', 20, 20, 20, '52.00', '0.00', '54.00', '', '100GM', '0', '2021-11-06 15:42:30', '', 'admin', '', '0000-00-00 00:00:00', ''),
(61, 'G4667966559', 8, 8, 8, '42.00', '0.00', '45.00', '', '100GM', '0', '2021-11-06 15:43:04', '', 'admin', '', '0000-00-00 00:00:00', ''),
(62, 'G4666405077', 20, 20, 20, '35.00', '0.00', '38.00', '', '50GM', '0', '2021-11-06 16:15:56', '', 'admin', '', '0000-00-00 00:00:00', ''),
(63, 'G4669106096', 1, 1, 1, '140.00', '0.00', '175.00', '', '100GM', '0', '2021-11-06 16:18:21', '', 'admin', '', '0000-00-00 00:00:00', ''),
(64, 'G4669458672', 1, 1, 1, '200.00', '0.00', '250.00', '', '100GM', '0', '2021-11-06 16:19:21', '', 'admin', '', '0000-00-00 00:00:00', ''),
(65, 'G4775307118', 3, 3, 3, '28.00', '0.00', '30.00', '', '', '0', '2021-11-06 16:21:51', '', 'admin', '', '0000-00-00 00:00:00', ''),
(66, 'G4666205232', 5, 5, 5, '35.00', '0.00', '38.00', '', '', '0', '2021-11-06 16:22:43', '', 'admin', '', '0000-00-00 00:00:00', ''),
(67, 'G4666524784', 4, 4, 4, '70.00', '0.00', '73.00', '', '', '0', '2021-11-06 16:23:39', '', 'admin', '', '0000-00-00 00:00:00', ''),
(68, 'G4776184073', 20, 20, 20, '14.00', '0.00', '15.00', '', '', '0', '2021-11-06 16:26:17', '', 'admin', '', '0000-00-00 00:00:00', ''),
(69, 'G2155786135', 4, 4, 4, '122.00', '0.00', '125.00', '', '250GM', '0', '2021-11-06 16:29:32', '', 'admin', '', '0000-00-00 00:00:00', ''),
(70, 'G4786438942', 5, 5, 5, '15.00', '0.00', '16.00', '', '250GM', '0', '2021-11-06 16:31:26', '', 'admin', '', '0000-00-00 00:00:00', ''),
(71, 'G2051973527', 8, 8, 8, '73.00', '0.00', '82.00', '', '100GM', '0', '2021-11-06 16:38:27', '', 'admin', '', '0000-00-00 00:00:00', ''),
(72, 'G4666942805', 4, 4, 4, '65.00', '0.00', '68.00', '', '', '0', '2021-11-06 16:41:58', '', 'admin', '', '0000-00-00 00:00:00', ''),
(73, 'G4669771144', 10, 10, 10, '18.00', '0.00', '20.00', '', '', '0', '2021-11-06 16:47:39', '', 'admin', '', '0000-00-00 00:00:00', ''),
(74, 'G2050540971', 1, 1, 1, '97.00', '0.00', '120.00', '', '1KG', '0', '2021-11-06 16:49:35', '', 'admin', 'admin', '2021-12-03 14:55:09', ''),
(75, 'G2051693613', 200, 200, 200, '98.00', '0.00', '111.00', 'Green', '200GM', '0', '2021-11-13 11:56:19', '', 'admin', '', '0000-00-00 00:00:00', ''),
(76, 'G2051693613', 345, 342, 200, '298.00', '0.00', '333.00', 'Blue', '500GM', '0', '2021-11-13 11:56:19', '', 'admin', '', '0000-00-00 00:00:00', ''),
(77, 'G2051693613', 200, 200, 200, '98.00', '0.00', '111.00', 'Green', '200GM', '1', '2021-11-13 11:56:28', '', 'admin', 'admin', '2021-11-13 11:57:20', ''),
(78, 'G2051693613', 345, 342, 200, '298.00', '0.00', '333.00', 'Blue', '500GM', '1', '2021-11-13 11:56:28', '', 'admin', 'admin', '2021-11-13 11:57:23', ''),
(79, 'G2051693613', 200, 200, 200, '98.00', '0.00', '111.00', 'Green', '200GM', '1', '2021-11-13 11:56:45', '', 'admin', 'admin', '2021-11-13 11:57:25', ''),
(80, 'G2051693613', 345, 342, 200, '298.00', '0.00', '333.00', 'Blue', '500GM', '1', '2021-11-13 11:56:45', '', 'admin', 'admin', '2021-11-13 11:57:27', ''),
(81, 'G2049527614', 1, 1, 1, '188.00', '0.00', '253.00', '', '1KG', '0', '2021-11-24 19:50:07', '', 'admin', '', '0000-00-00 00:00:00', ''),
(82, 'G2051330334', 5, 5, 5, '143.00', '0.00', '147.00', '', '200GM', '0', '2021-11-25 20:34:11', '', 'admin', '', '0000-00-00 00:00:00', ''),
(83, 'G2051943457', 5, 5, 5, '31.00', '0.00', '31.00', '', '50GM', '0', '2021-11-26 12:37:42', '', 'admin', '', '0000-00-00 00:00:00', ''),
(84, 'G2051934619', 5, 5, 5, '35.00', '0.00', '37.00', '', '50GM', '0', '2021-11-26 12:57:10', '', 'admin', '', '0000-00-00 00:00:00', ''),
(85, 'G2051116531', 5, 5, 5, '65.00', '0.00', '65.00', '', '100GM', '0', '2021-11-26 13:19:16', '', 'admin', '', '0000-00-00 00:00:00', ''),
(86, 'G2051373827', 10, 10, 10, '185.00', '0.00', '235.00', '', '500GM', '0', '2021-11-26 16:01:21', '', 'admin', '', '0000-00-00 00:00:00', ''),
(87, 'G2051402764', 5, 5, 5, '160.00', '0.00', '175.00', '', '100GM', '0', '2021-11-26 16:37:59', '', 'admin', '', '0000-00-00 00:00:00', ''),
(88, 'G2051876778', 10, 10, 10, '135.00', '0.00', '160.00', '', '500GM', '0', '2021-11-26 16:57:36', '', 'admin', '', '0000-00-00 00:00:00', ''),
(89, 'G2051876778', 10, 10, 10, '56.00', '0.00', '64.00', '', '200GM', '0', '2021-11-26 16:58:42', '', 'admin', '', '0000-00-00 00:00:00', ''),
(90, 'G2051876778', 10, 10, 10, '27.00', '0.00', '32.00', '', '100GM', '0', '2021-11-26 17:01:55', '', 'admin', '', '0000-00-00 00:00:00', ''),
(91, 'G5284941384', 5, 5, 5, '120.00', '0.00', '140.00', '', '200GM', '0', '2021-11-26 17:20:37', '', 'admin', '', '0000-00-00 00:00:00', ''),
(92, 'G5284953434', 5, 5, 5, '95.00', '0.00', '110.00', '', '', '0', '2021-11-26 18:07:33', '', 'admin', '', '0000-00-00 00:00:00', ''),
(93, 'G5284846946', 5, 5, 5, '85.00', '0.00', '90.00', '', '200GM', '0', '2021-11-26 18:18:11', '', 'admin', '', '0000-00-00 00:00:00', ''),
(94, 'G2199681340', 10, 10, 10, '10.00', '0.00', '10.00', '', '', '0', '2021-11-26 18:28:52', '', 'admin', '', '0000-00-00 00:00:00', ''),
(95, 'G2199338837', 10, 10, 10, '150.00', '0.00', '199.00', '', '', '0', '2021-11-28 15:30:27', '', 'admin', '', '0000-00-00 00:00:00', ''),
(96, 'G2199453718', 10, 10, 10, '50.00', '0.00', '50.00', '', '', '0', '2021-11-28 15:47:58', '', 'admin', '', '0000-00-00 00:00:00', ''),
(97, 'G2199783871', 10, 10, 10, '50.00', '0.00', '55.00', '', '50GM', '0', '2021-11-28 15:57:44', '', 'admin', '', '0000-00-00 00:00:00', ''),
(98, 'G2199825430', 10, 10, 10, '45.00', '0.00', '45.00', '', '', '0', '2021-11-28 16:07:56', '', 'admin', '', '0000-00-00 00:00:00', ''),
(99, 'G2199727722', 10, 10, 10, '40.00', '0.00', '40.00', '', '', '0', '2021-11-28 16:23:11', '', 'admin', '', '0000-00-00 00:00:00', ''),
(100, 'G2199145231', 10, 10, 10, '30.00', '0.00', '30.00', '', '', '0', '2021-11-28 16:36:21', '', 'admin', '', '0000-00-00 00:00:00', ''),
(101, 'G2051804863', 10, 10, 10, '60.00', '0.00', '109.00', '', '200GM', '0', '2021-11-28 17:58:07', '', 'admin', '', '0000-00-00 00:00:00', ''),
(102, 'G2051490221', 10, 10, 10, '35.00', '0.00', '35.00', '', '', '0', '2021-11-28 18:11:18', '', 'admin', '', '0000-00-00 00:00:00', ''),
(103, 'G2051310272', 10, 10, 10, '22.00', '0.00', '30.00', '', '100GM', '0', '2021-11-28 18:28:34', '', 'admin', '', '0000-00-00 00:00:00', ''),
(104, 'G2048718351', 10, 10, 10, '24.00', '0.00', '28.00', '', '100GM', '0', '2021-11-28 19:09:43', '', 'admin', '', '0000-00-00 00:00:00', ''),
(105, 'G2051494302', 10, 10, 10, '35.00', '0.00', '37.00', '', '50GM', '0', '2021-11-28 19:40:12', '', 'admin', '', '0000-00-00 00:00:00', ''),
(106, 'G2051494302', 10, 10, 10, '250.00', '0.00', '250.00', '', '', '0', '2021-11-28 19:48:58', '', 'admin', '', '0000-00-00 00:00:00', ''),
(107, 'G2048776596', 10, 10, 10, '250.00', '0.00', '250.00', '', '', '0', '2021-11-28 19:50:02', '', 'admin', '', '0000-00-00 00:00:00', ''),
(108, 'G2051369063', 10, 10, 10, '10.00', '0.00', '10.00', '', '', '0', '2021-11-29 11:30:22', '', 'admin', '', '0000-00-00 00:00:00', ''),
(109, 'G2048948253', 10, 10, 10, '8.00', '0.00', '10.00', '', '100GM', '0', '2021-11-29 11:43:03', '', 'admin', '', '0000-00-00 00:00:00', ''),
(110, 'G2048716115', 10, 10, 10, '35.00', '0.00', '37.00', '', '500GM', '0', '2021-11-29 11:56:18', '', 'admin', '', '0000-00-00 00:00:00', ''),
(111, 'G2048936959', 10, 10, 10, '45.00', '0.00', '47.00', '', '500GM', '0', '2021-11-29 11:59:56', '', 'admin', '', '0000-00-00 00:00:00', ''),
(112, 'G2048282425', 10, 10, 10, '95.00', '0.00', '98.00', '', '1KG', '0', '2021-11-29 12:20:08', '', 'admin', '', '0000-00-00 00:00:00', ''),
(113, 'G2048375003', 10, 10, 10, '15.00', '0.00', '18.00', '', '100GM', '0', '2021-11-29 12:31:24', '', 'admin', '', '0000-00-00 00:00:00', ''),
(114, 'G2048375003', 10, 10, 10, '15.00', '0.00', '18.00', '', '100GM', '0', '2021-11-29 12:31:24', '', 'admin', '', '0000-00-00 00:00:00', ''),
(115, 'G2048375003', 10, 10, 10, '15.00', '0.00', '18.00', '', '100GM', '0', '2021-11-29 12:31:27', '', 'admin', '', '0000-00-00 00:00:00', ''),
(116, 'G2048403002', 10, 10, 10, '72.00', '0.00', '72.00', '', '200GM', '0', '2021-11-29 12:52:07', '', 'admin', '', '0000-00-00 00:00:00', ''),
(117, 'G2050584678', 10, 10, 10, '25.00', '0.00', '25.00', '', '1KG', '0', '2021-11-29 13:53:32', '', 'admin', '', '0000-00-00 00:00:00', ''),
(118, 'G2049589186', 10, 10, 10, '480.00', '0.00', '520.00', '', '', '0', '2021-11-29 15:05:34', '', 'admin', '', '0000-00-00 00:00:00', ''),
(119, 'G3963760574', 10, 10, 10, '395.00', '0.00', '430.00', '', '', '0', '2021-11-29 15:20:50', '', 'admin', '', '0000-00-00 00:00:00', ''),
(120, 'G2053751267', 5, 5, 5, '60.00', '0.00', '60.00', '', '1KG', '0', '2021-12-03 14:57:26', '', 'admin', '', '0000-00-00 00:00:00', ''),
(121, 'G2048648009', 10, 10, 10, '16.00', '0.00', '20.00', '', '100GM', '0', '2021-12-03 14:58:40', '', 'admin', '', '0000-00-00 00:00:00', ''),
(122, 'G2048257349', 10, 10, 10, '60.00', '0.00', '60.00', '', '500GM', '0', '2021-12-03 15:03:33', '', 'admin', '', '0000-00-00 00:00:00', ''),
(123, 'G3961230141', 10, 10, 10, '12.00', '0.00', '12.00', '', '', '0', '2021-12-03 15:04:35', '', 'admin', '', '0000-00-00 00:00:00', ''),
(124, 'G2048489917', 10, 10, 10, '45.00', '0.00', '45.00', '', '200GM', '0', '2021-12-03 15:23:01', '', 'admin', '', '0000-00-00 00:00:00', ''),
(125, 'G2010118619', 10, 10, 10, '250.00', '0.00', '250.00', '', '250GM', '0', '2021-12-03 17:10:07', '', 'admin', '', '0000-00-00 00:00:00', ''),
(126, 'G2049700099', 10, 10, 10, '135.00', '0.00', '170.00', '', '', '0', '2021-12-03 17:17:12', '', 'admin', '', '0000-00-00 00:00:00', ''),
(127, 'G2049981893', 10, 10, 10, '607.00', '0.00', '705.00', '', '', '0', '2021-12-03 17:31:28', '', 'admin', '', '0000-00-00 00:00:00', ''),
(128, 'G2051858596', 10, 10, 10, '27.00', '0.00', '35.00', '', '100GM', '0', '2021-12-03 17:37:17', '', 'admin', '', '0000-00-00 00:00:00', ''),
(129, 'G2048686114', 10, 10, 10, '30.00', '0.00', '36.00', '', '100GM', '0', '2021-12-04 12:16:32', '', 'admin', '', '0000-00-00 00:00:00', ''),
(130, 'G2051996835', 10, 10, 10, '10.00', '0.00', '10.00', '', '', '0', '2021-12-04 12:34:41', '', 'admin', '', '0000-00-00 00:00:00', ''),
(131, 'G2048905196', 10, 10, 10, '20.00', '0.00', '38.00', '', '100GM', '0', '2021-12-04 12:56:03', '', 'admin', '', '0000-00-00 00:00:00', ''),
(132, 'G2052175423', 10, 10, 10, '160.00', '0.00', '175.00', '', '1KG', '0', '2021-12-04 13:05:15', '', 'admin', '', '0000-00-00 00:00:00', ''),
(133, 'G4671162811', 10, 10, 10, '120.00', '0.00', '180.00', '', '200GM', '0', '2021-12-04 13:22:00', '', 'admin', '', '0000-00-00 00:00:00', ''),
(134, 'G4671205107', 10, 10, 10, '360.00', '0.00', '400.00', '', '500GM', '0', '2021-12-04 13:41:21', '', 'admin', '', '0000-00-00 00:00:00', ''),
(135, 'G4671785353', 10, 10, 10, '160.00', '0.00', '170.00', '', '200GM', '0', '2021-12-04 13:50:13', '', 'admin', '', '0000-00-00 00:00:00', ''),
(136, 'G4671248714', 10, 10, 10, '155.00', '0.00', '165.00', '', '200GM', '0', '2021-12-07 20:03:40', '', 'admin', '', '0000-00-00 00:00:00', ''),
(137, 'G4671730511', 10, 10, 10, '225.00', '0.00', '235.00', '', '400GM', '0', '2021-12-07 20:18:59', '', 'admin', '', '0000-00-00 00:00:00', ''),
(138, 'G2053294470', 10, 10, 10, '40.00', '0.00', '42.00', '', '1KG', '0', '2021-12-12 18:23:21', '', 'admin', '', '0000-00-00 00:00:00', ''),
(139, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:29:51', '', 'admin', '', '0000-00-00 00:00:00', ''),
(140, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:29:54', '', 'admin', '', '0000-00-00 00:00:00', ''),
(141, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:29:54', '', 'admin', '', '0000-00-00 00:00:00', ''),
(142, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:29:55', '', 'admin', '', '0000-00-00 00:00:00', ''),
(143, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:29:55', '', 'admin', '', '0000-00-00 00:00:00', ''),
(144, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:02', '', 'admin', '', '0000-00-00 00:00:00', ''),
(145, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:03', '', 'admin', '', '0000-00-00 00:00:00', ''),
(146, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:03', '', 'admin', '', '0000-00-00 00:00:00', ''),
(147, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:03', '', 'admin', '', '0000-00-00 00:00:00', ''),
(148, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:03', '', 'admin', '', '0000-00-00 00:00:00', ''),
(149, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:04', '', 'admin', '', '0000-00-00 00:00:00', ''),
(150, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:04', '', 'admin', '', '0000-00-00 00:00:00', ''),
(151, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:04', '', 'admin', '', '0000-00-00 00:00:00', ''),
(152, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:04', '', 'admin', '', '0000-00-00 00:00:00', ''),
(153, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:04', '', 'admin', '', '0000-00-00 00:00:00', ''),
(154, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:05', '', 'admin', '', '0000-00-00 00:00:00', ''),
(155, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:05', '', 'admin', '', '0000-00-00 00:00:00', ''),
(156, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:05', '', 'admin', '', '0000-00-00 00:00:00', ''),
(157, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:06', '', 'admin', '', '0000-00-00 00:00:00', ''),
(158, 'G4671134515', 12, 1, 1, '250.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:06', '', 'admin', '', '0000-00-00 00:00:00', ''),
(159, 'G4671134515', 12, 1, 1, '500.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:11', '', 'admin', '', '0000-00-00 00:00:00', ''),
(160, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:14', '', 'admin', '', '0000-00-00 00:00:00', ''),
(161, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:14', '', 'admin', '', '0000-00-00 00:00:00', ''),
(162, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:15', '', 'admin', '', '0000-00-00 00:00:00', ''),
(163, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:15', '', 'admin', '', '0000-00-00 00:00:00', ''),
(164, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:15', '', 'admin', '', '0000-00-00 00:00:00', ''),
(165, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:15', '', 'admin', '', '0000-00-00 00:00:00', ''),
(166, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:15', '', 'admin', '', '0000-00-00 00:00:00', ''),
(167, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:19', '', 'admin', '', '0000-00-00 00:00:00', ''),
(168, 'G4671134515', 0, 0, 0, '0.00', '0.00', '0.00', '', '', '0', '2024-02-20 12:30:19', '', 'admin', '', '0000-00-00 00:00:00', ''),
(169, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:19', '', 'admin', '', '0000-00-00 00:00:00', ''),
(170, 'G4671134515', 0, 0, 0, '0.00', '0.00', '0.00', '', '', '0', '2024-02-20 12:30:19', '', 'admin', '', '0000-00-00 00:00:00', ''),
(171, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:19', '', 'admin', '', '0000-00-00 00:00:00', ''),
(172, 'G4671134515', 0, 0, 0, '0.00', '0.00', '0.00', '', '', '0', '2024-02-20 12:30:19', '', 'admin', '', '0000-00-00 00:00:00', ''),
(173, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:19', '', 'admin', '', '0000-00-00 00:00:00', ''),
(174, 'G4671134515', 0, 0, 0, '0.00', '0.00', '0.00', '', '', '0', '2024-02-20 12:30:19', '', 'admin', '', '0000-00-00 00:00:00', ''),
(175, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:20', '', 'admin', '', '0000-00-00 00:00:00', ''),
(176, 'G4671134515', 0, 0, 0, '0.00', '0.00', '0.00', '', '', '0', '2024-02-20 12:30:20', '', 'admin', '', '0000-00-00 00:00:00', ''),
(177, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:23', '', 'admin', '', '0000-00-00 00:00:00', ''),
(178, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:23', '', 'admin', '', '0000-00-00 00:00:00', ''),
(179, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:24', '', 'admin', '', '0000-00-00 00:00:00', ''),
(180, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:24', '', 'admin', '', '0000-00-00 00:00:00', ''),
(181, 'G4671134515', 12, 1, 1, '55.00', '0.00', '150.00', 'Blue', '50GM', '0', '2024-02-20 12:30:27', '', 'admin', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `v_product_image`
--

CREATE TABLE `v_product_image` (
  `id` int(11) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `pages` varchar(25) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `created_ip` varchar(100) NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `modified_by` varchar(10) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_product_image`
--

INSERT INTO `v_product_image` (`id`, `product_id`, `pages`, `image`, `status`, `created_on`, `created_ip`, `created_by`, `modified_by`, `modified_on`, `modified_ip`) VALUES
(105, 'G1031335093', '', 'pro_86.jpg', '0', '2021-10-23 17:29:27', '103.199.114.233', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(106, '', '', 'pro_861.jpg', '0', '2021-10-23 18:01:03', '103.199.114.233', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(107, 'G1031335093', '', 'degi.jpg', '0', '2021-10-23 18:02:38', '103.199.114.233', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(108, 'G1031335093', '', 'pro_862.jpg', '0', '2021-10-23 18:03:44', '103.199.114.233', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(109, 'G0101441894', '', 'jeera-powder.jpg', '2', '2021-10-23 19:32:47', '103.199.114.233', 'GHRFBD1001', 'admin', '2021-10-27 13:00:54', ''),
(110, 'G0101441894', '', '40019862-3_2-mdh-powder-jeera.jpg', '2', '2021-10-23 19:33:21', '103.199.114.233', 'GHRFBD1001', 'admin', '2021-10-27 13:00:52', ''),
(111, 'G0101441894', '', 'jeera-powder1.jpg', '2', '2021-10-23 19:33:21', '103.199.114.233', 'GHRFBD1001', 'admin', '2021-10-27 13:00:47', ''),
(112, 'G0101441894', '', 'mdh-jeera-powder-packet-350x220.jpg', '2', '2021-10-23 19:33:21', '103.199.114.233', 'GHRFBD1001', 'admin', '2021-10-23 19:33:57', ''),
(113, 'G0101441894', '', 'Organic_Rajma_Chita_-600x450.jpg', '0', '2021-10-27 12:59:04', '103.199.112.86', 'GHRFBD1001', 'admin', '2021-10-27 13:12:59', ''),
(114, 'G0101441894', '', 'rajma-chitra-500g3.jpg', '0', '2021-10-27 13:06:15', '103.199.112.86', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(115, 'G2051693613', '', '716kcH2hj7L__SL1500_-600x600.jpg', '2', '2021-10-30 10:22:27', '103.119.165.182', 'GHRFBD1001', 'admin', '2021-10-30 10:25:36', ''),
(116, 'G2051693613', '', '716kcH2hj7L__SL1500_-600x6001.jpg', '0', '2021-10-30 10:24:06', '103.119.165.182', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(117, 'G2051693613', '', '71-4zTdwJiL__SL1500_.jpg', '2', '2021-10-30 10:24:20', '103.119.165.182', 'GHRFBD1001', 'admin', '2021-10-30 10:24:53', ''),
(118, 'G2051693613', '', '716kcH2hj7L__SL1500_-600x6002.jpg', '2', '2021-10-30 10:25:02', '103.119.165.182', 'GHRFBD1001', 'admin', '2021-10-30 10:27:59', ''),
(119, 'G2051693613', '', '71-4zTdwJiL__SL1500_1.jpg', '2', '2021-10-30 10:26:00', '103.119.165.182', 'GHRFBD1001', 'admin', '2021-10-30 10:27:51', ''),
(120, 'G2051693613', '', '716kcH2hj7L__SL1500_-600x6003.jpg', '0', '2021-10-30 10:28:47', '103.119.165.182', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(121, 'G2051953741', '', 'mdh_haldi_2.jpg', '0', '2021-10-30 10:47:46', '157.119.214.206', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(122, 'G2051953741', '', 'mdh_haldi_21.jpg', '0', '2021-10-30 10:47:58', '157.119.214.206', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(123, 'G2051571495', '', '91l5hGrWzEL__SL1500_.jpg', '2', '2021-10-30 11:05:47', '157.119.214.206', 'GHRFBD1001', 'admin', '2021-10-30 11:09:55', ''),
(124, 'G2051571495', '', '91l5hGrWzEL__SL1500_1.jpg', '2', '2021-10-30 11:06:00', '157.119.214.206', 'GHRFBD1001', 'admin', '2021-10-30 11:09:36', ''),
(125, 'G2051571495', '', 'MDH-Dhania.jpg', '0', '2021-10-30 11:09:45', '157.119.214.206', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(126, 'G2051571495', '', 'MDH-Dhania1.jpg', '0', '2021-10-30 11:10:02', '157.119.214.206', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(127, 'G2051877654', '', 'jeera-powder2.jpg', '0', '2021-10-30 11:24:08', '157.119.214.206', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(128, 'G2051877654', '', 'jeera-powder3.jpg', '0', '2021-10-30 11:24:27', '157.119.214.206', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(129, 'G2051995348', '', 'mdh-garam-masala-100gm-500x500.jpg', '2', '2021-10-30 11:34:29', '157.119.214.206', 'GHRFBD1001', 'admin', '2021-10-30 11:36:21', ''),
(130, 'G2051995348', '', 'mdh-garam-masala-100gm-500x5001.jpg', '2', '2021-10-30 11:34:41', '157.119.214.206', 'GHRFBD1001', 'admin', '2021-10-30 11:36:24', ''),
(131, 'G2051995348', '', '161954205911.jpeg', '2', '2021-10-30 11:36:35', '157.119.214.206', 'GHRFBD1001', 'admin', '2021-10-30 11:37:58', ''),
(132, 'G2051995348', '', 'Mdh_Masala_-_Garam,_100_gm_Carton-750x750.png', '0', '2021-10-30 11:37:21', '157.119.214.206', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(133, 'G2051995348', '', '1619542059111.jpeg', '2', '2021-10-30 11:38:06', '157.119.214.206', 'GHRFBD1001', 'admin', '2021-10-30 11:38:36', ''),
(134, 'G2051995348', '', 'Mdh_Masala_-_Garam,_100_gm_Carton-750x7501.png', '0', '2021-10-30 11:38:53', '157.119.214.206', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(135, 'G2051779307', '', 'pro_863.jpg', '0', '2021-10-30 12:06:40', '157.119.214.206', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(136, 'G2051779307', '', 'pro_864.jpg', '0', '2021-10-30 12:06:53', '157.119.214.206', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(137, 'G2051750098', '', '260798_4-mdh-masala-chicken.jpg', '0', '2021-10-30 12:15:35', '157.119.214.206', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(138, 'G2051750098', '', '260798_4-mdh-masala-chicken1.jpg', '0', '2021-10-30 12:15:48', '157.119.214.206', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(139, 'G2051973527', '', '100004547_1-mdh-masala-shahi-paneer.png', '0', '2021-10-30 18:16:54', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(140, 'G2051973527', '', '100004547_1-mdh-masala-shahi-paneer1.png', '0', '2021-10-30 18:17:19', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(141, 'G2051608230', '', 'MDHHing_10gCartonPack_600x600.jpg', '0', '2021-10-30 18:25:58', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(142, 'G2051608230', '', 'MDHHing_10gCartonPack_600x6001.jpg', '0', '2021-10-30 18:26:24', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(143, 'G2051117718', '', 'dettol-bath-soap-500x500.jpg', '0', '2021-10-30 18:43:57', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(144, 'G2051117718', '', 'dettol-bath-soap-500x5001.jpg', '0', '2021-10-30 18:44:32', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(145, 'G4786974277', '', 'vim-liquid-dish-wash-500x500.png', '0', '2021-10-30 18:57:14', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(146, 'G4786974277', '', 'vim-liquid-dish-wash-500x5001.png', '0', '2021-10-30 18:57:25', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(147, 'G4786230603', '', 'lemon-800-naturals-lemon-chandan-detergent-powder-800g-tide-original-imafhyg7nmtfa48q.jpeg', '2', '2021-10-30 19:00:55', '103.212.130.17', 'GHRFBD1001', 'admin', '2021-10-30 19:03:22', ''),
(148, 'G4786230603', '', 'unnamed.jpg', '0', '2021-10-30 19:03:13', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(149, 'G4786230603', '', 'unnamed1.jpg', '0', '2021-10-30 19:03:57', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(150, 'G4786530134', '', 'fena-washing-powder-500x500.jpg', '0', '2021-10-30 19:06:13', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(151, 'G4786530134', '', 'fena-washing-powder-500x5001.jpg', '0', '2021-10-30 19:09:02', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(152, 'G4786173296', '', 'nip-dishwash-powder.jpg', '0', '2021-10-30 19:13:56', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(153, 'G4786173296', '', 'nip-dishwash-powder1.jpg', '0', '2021-10-30 19:14:34', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(154, 'G4786852063', '', 'download.jpg', '0', '2021-10-30 19:19:18', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(155, 'G4786852063', '', 'download1.jpg', '0', '2021-10-30 19:19:30', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(156, 'G4786438942', '', '51epMbXlUDL.jpg', '2', '2021-10-30 19:31:45', '103.212.130.17', 'GHRFBD1001', 'admin', '2021-11-01 20:04:42', ''),
(157, 'G4786438942', '', '51epMbXlUDL1.jpg', '2', '2021-10-30 19:32:00', '103.212.130.17', 'GHRFBD1001', 'admin', '2021-11-01 20:04:23', ''),
(158, 'G2155786135', '', '61z40Qqq-eL__SL1000_.jpg', '2', '2021-10-30 19:40:49', '103.212.130.17', 'GHRFBD1001', 'admin', '2021-10-30 19:41:07', ''),
(159, 'G2155786135', '', 'pro_110767.jpg', '2', '2021-10-30 19:41:17', '103.212.130.17', 'GHRFBD1001', 'admin', '2021-10-30 19:42:40', ''),
(160, 'G2155786135', '', 'tata-tea-haryana.png', '2', '2021-10-30 19:42:50', '103.212.130.17', 'GHRFBD1001', 'admin', '2021-11-01 20:07:03', ''),
(161, 'G2155786135', '', 'tata-tea-haryana1.png', '2', '2021-10-30 19:44:16', '103.212.130.17', 'GHRFBD1001', 'admin', '2021-11-01 20:06:59', ''),
(162, 'G4786999013', '', 'Vim-Extra-Anti-Smell-Dishwash-Bar-1619688380-10033593-1.jpg', '0', '2021-10-30 19:51:45', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(163, 'G4786999013', '', 'Vim-Extra-Anti-Smell-Dishwash-Bar-1619688380-10033593-11.jpg', '0', '2021-10-30 19:52:00', '103.212.130.17', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(164, 'G4786438942', '', 'rinbar.jpg', '2', '2021-10-31 10:26:07', '103.212.130.219', 'GHRFBD1001', 'admin', '2021-11-01 20:00:50', ''),
(165, 'G4786438942', '', 'rinbar1.jpg', '2', '2021-10-31 10:27:50', '103.212.130.219', 'GHRFBD1001', 'admin', '2021-11-01 20:00:52', ''),
(166, 'G4786852063', '', 'vim-bar-500g-500x500.jpg', '0', '2021-10-31 10:30:41', '103.212.130.219', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(167, 'G4786852063', '', 'vim-bar-500g-500x5001.jpg', '0', '2021-10-31 10:31:00', '103.212.130.219', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(168, 'G4786460101', '', '40178522_1-sanifresh-ultrashine-toilet-cleaner.jpg', '0', '2021-10-31 15:39:22', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(169, 'G4786460101', '', '40178522_1-sanifresh-ultrashine-toilet-cleaner1.jpg', '0', '2021-10-31 15:39:37', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(170, 'G4776184073', '', 'Mangaldeep-Mogra-Dhoop.jpg', '0', '2021-10-31 15:45:24', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(171, 'G4776184073', '', 'Mangaldeep-Mogra-Dhoop1.jpg', '0', '2021-10-31 15:45:52', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(172, 'G3961230141', '', 'masala_cdn_3dsm.png', '0', '2021-10-31 15:57:02', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(173, 'G3961230141', '', 'masala_cdn_3dsm1.png', '0', '2021-10-31 15:57:13', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(174, 'G4666524784', '', 'parachute-coconut-hair-oil-bottle-of-600-ml-2-1608302186.jpg', '0', '2021-10-31 16:01:34', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(175, 'G4666524784', '', 'parachute-coconut-hair-oil-bottle-of-600-ml-2-16083021861.jpg', '0', '2021-10-31 16:02:02', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(176, 'G4666205232', '', 'parachute_advanced_jasmine_coconut_hair_oil_100.jpg', '0', '2021-10-31 16:06:56', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(177, 'G4666205232', '', 'parachute_advanced_jasmine_coconut_hair_oil_1001.jpg', '0', '2021-10-31 16:07:25', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(178, 'G4775307118', '', 'mortein-mosquito-repellent-coil-power-booster-1613917563.png', '0', '2021-10-31 16:22:06', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(179, 'G4775307118', '', 'mortein-mosquito-repellent-coil-power-booster-16139175631.png', '0', '2021-10-31 16:22:08', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(180, 'G4669458672', '', 'Nivea_Men_Charcol_Facewash_50_g_600x600.jpg', '0', '2021-10-31 16:28:23', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(181, 'G4669458672', '', 'Nivea_Men_Charcol_Facewash_50_g_600x6001.jpg', '0', '2021-10-31 16:28:45', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(182, 'G4669106096', '', '12785-1-1000.jpg', '0', '2021-10-31 17:18:59', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(183, 'G4669106096', '', '12785-1-10001.jpg', '0', '2021-10-31 17:19:19', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(184, 'G4666405077', '', 'godrej_expert_rich_creme_black_colour_20_gm_20_ml_8_s_0.jpg', '0', '2021-10-31 17:28:31', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(185, 'G4666405077', '', 'godrej_expert_rich_creme_black_colour_20_gm_20_ml_8_s_01.jpg', '0', '2021-10-31 17:29:10', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(186, 'G4667966559', '', '0006922_patanjali-dant-kanti-natural-toothpaste-100g_510.jpeg', '0', '2021-10-31 17:34:40', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(187, 'G4667966559', '', '0006922_patanjali-dant-kanti-natural-toothpaste-100g_5101.jpeg', '0', '2021-10-31 17:34:52', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(188, 'G4667659738', '', 'colgate-toothpaste-1575957266-5200645.jpeg', '2', '2021-10-31 18:08:34', '157.119.214.225', 'GHRFBD1001', 'admin', '2021-10-31 18:10:38', ''),
(189, 'G4667659738', '', 'colgate-toothpaste-1575957266-52006451.jpeg', '2', '2021-10-31 18:08:49', '157.119.214.225', 'GHRFBD1001', 'admin', '2021-10-31 18:10:21', ''),
(190, 'G4667659738', '', 'colgate_strong_teeth_with_cavity_protection_toothpaste_200_gm_0.jpg', '0', '2021-10-31 18:10:30', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(191, 'G4667659738', '', 'colgate_strong_teeth_with_cavity_protection_toothpaste_200_gm_01.jpg', '0', '2021-10-31 18:10:45', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(192, 'G4669771144', '', 'FCWDW3Z3EFZ7WBZD_image.jpeg', '0', '2021-10-31 18:17:12', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(193, 'G4669771144', '', 'FCWDW3Z3EFZ7WBZD_image1.jpeg', '0', '2021-10-31 18:17:37', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(194, 'G4667614327', '', 'colgate-plax-peppermint-fresh-mouthwash-60ml-bottle_1581460444.jpg', '0', '2021-10-31 18:22:16', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(195, 'G4667614327', '', 'colgate-plax-peppermint-fresh-mouthwash-60ml-bottle_15814604441.jpg', '0', '2021-10-31 18:22:28', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(196, 'G4666125941', '', 'download2.jpg', '0', '2021-10-31 18:26:31', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(197, 'G4666125941', '', 'download3.jpg', '0', '2021-10-31 18:26:41', '157.119.214.225', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(198, 'G4786438942', '', 'RIN-BAR-250GM-16.jpg', '0', '2021-11-01 20:05:15', '103.119.165.95', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(199, 'G2155786135', '', 'tata-tea-haryana2.png', '2', '2021-11-01 20:08:14', '103.119.165.95', 'GHRFBD1001', 'admin', '2021-11-01 20:10:05', ''),
(200, 'G2155786135', '', 'Tata-Tea-Premium-500gm.jpg', '0', '2021-11-01 20:10:20', '103.119.165.95', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(201, 'G3964658204', '', 'maggi-rich-tomato-ketchup-1-kg.jpg', '2', '2021-11-01 20:29:07', '103.119.165.95', 'GHRFBD1001', 'admin', '2021-11-01 20:38:47', ''),
(202, 'G3964658204', '', 'maggi-rich-tomato-ketchup-1-kg1.jpg', '2', '2021-11-01 20:29:20', '103.119.165.95', 'GHRFBD1001', 'admin', '2021-11-01 20:38:44', ''),
(203, 'G4773576920', '', 'Colin-Glass-Cleaner-1605858620-10038867-1.jpg', '0', '2021-11-01 20:36:49', '103.119.165.95', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(204, 'G4773576920', '', 'Colin-Glass-Cleaner-1605858620-10038867-11.jpg', '0', '2021-11-01 20:37:00', '103.119.165.95', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(205, 'G3964658204', '', 'maggi-rich-tomato-ketchup-1-kg2.jpg', '2', '2021-11-01 20:39:08', '103.119.165.95', 'GHRFBD1001', 'admin', '2021-11-01 20:40:59', ''),
(206, 'G3964658204', '', 'maggi-rich-tomato-ketchup-1-kg3.jpg', '2', '2021-11-01 20:39:23', '103.119.165.95', 'GHRFBD1001', 'admin', '2021-11-01 20:41:15', ''),
(207, 'G3964658204', '', '41El3o1oV2L.jpg', '2', '2021-11-01 20:41:24', '103.119.165.95', 'GHRFBD1001', 'admin', '2021-11-25 15:25:16', ''),
(208, 'G3964658204', '', '41El3o1oV2L1.jpg', '2', '2021-11-01 20:41:38', '103.119.165.95', 'GHRFBD1001', 'admin', '2021-11-25 15:25:12', ''),
(209, 'G2053342490', '', 'tatasalt_og.jpg', '2', '2021-11-01 20:56:43', '103.119.165.95', 'GHRFBD1001', 'admin', '2021-11-02 10:48:44', ''),
(210, 'G2053342490', '', 'tatasalt_og1.jpg', '2', '2021-11-01 21:01:32', '103.119.165.95', 'GHRFBD1001', 'admin', '2021-11-02 10:48:47', ''),
(211, 'G3964855558', '', 'kissan-mf-100g.jpg', '0', '2021-11-02 10:42:40', '103.199.114.128', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(212, 'G3964855558', '', 'kissan-mf-100g1.jpg', '0', '2021-11-02 10:42:51', '103.199.114.128', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(213, 'G2053342490', '', 'tata-salt-500x500.jpg', '0', '2021-11-02 10:48:32', '103.199.114.128', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(214, 'G2053342490', '', 'tata-salt-500x5001.jpg', '0', '2021-11-02 10:48:53', '103.199.114.128', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(215, 'G4777594528', '', 'download4.jpg', '0', '2021-11-02 16:35:06', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(216, 'G4777594528', '', 'download5.jpg', '0', '2021-11-02 16:35:18', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(217, 'G2050809786', '', 'Rajdhani-Besan-Gram-Flour-1-Kg-Pack__1621586157_106_211_46_85.jpg', '0', '2021-11-02 16:44:45', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(218, 'G2050809786', '', 'Rajdhani-Besan-Gram-Flour-1-Kg-Pack__1621586157_106_211_46_851.jpg', '0', '2021-11-02 16:44:57', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(219, 'G2050540971', '', 'pro_13.jpg', '0', '2021-11-02 16:47:27', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(220, 'G2050540971', '', 'pro_131.jpg', '0', '2021-11-02 16:47:38', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(221, 'G4773539167', '', 'download6.jpg', '0', '2021-11-02 16:52:19', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(222, 'G4773539167', '', 'download7.jpg', '0', '2021-11-02 16:52:39', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(223, 'G2052488418', '', 'india-gate-dubar-basmati-rice-500x500.jpg', '0', '2021-11-02 17:06:00', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(224, 'G2052488418', '', 'india-gate-dubar-basmati-rice-500x5001.jpg', '0', '2021-11-02 17:06:10', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(225, 'G2052320110', '', 'product-jpeg-500x500.jpg', '0', '2021-11-02 17:14:21', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(226, 'G2052320110', '', 'product-jpeg-500x5001.jpg', '0', '2021-11-02 17:14:33', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(227, 'G2052162766', '', 'IMG_20191008_223600-removebg-preview.png', '0', '2021-11-02 17:36:33', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(228, 'G2052162766', '', 'IMG_20191008_223600-removebg-preview1.png', '0', '2021-11-02 17:36:47', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(229, 'G2052254573', '', 'download8.jpg', '0', '2021-11-02 17:47:18', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(230, 'G2052254573', '', 'download9.jpg', '0', '2021-11-02 17:47:29', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(231, 'G2052254466', '', '51vzrrr+bPL.jpg', '0', '2021-11-02 17:56:11', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(232, 'G2052254466', '', '51vzrrr+bPL1.jpg', '0', '2021-11-02 17:56:24', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(233, 'G4666942805', '', '267963-2_7-head-shoulders-anti-dandruff-shampoo-smooth-silky.jpg', '0', '2021-11-02 18:00:37', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(234, 'G4666942805', '', '267963-2_7-head-shoulders-anti-dandruff-shampoo-smooth-silky1.jpg', '0', '2021-11-02 18:00:48', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(235, 'G4666603329', '', '266628_5-clinic-plus-strong-long-health-shampoo.jpg', '0', '2021-11-02 18:04:06', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(236, 'G4666603329', '', '266628_5-clinic-plus-strong-long-health-shampoo1.jpg', '0', '2021-11-02 18:04:16', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(237, 'G2049527614', '', '73.jpg', '0', '2021-11-02 18:07:43', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(238, 'G2049527614', '', '731.jpg', '0', '2021-11-02 18:07:53', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(239, 'G4685687348', '', '60-gm-godrej-no1-soap-500x500.jpg', '0', '2021-11-02 18:16:45', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(240, 'G4685687348', '', '60-gm-godrej-no1-soap-500x5001.jpg', '0', '2021-11-02 18:17:03', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(241, 'G2155786135', '', 'Tata-Tea-Premium-500gm1.jpg', '0', '2021-11-02 18:51:00', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(242, 'G4786438942', '', 'rinbar2.jpg', '0', '2021-11-02 18:52:02', '14.102.188.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(243, 'G2154996928', '', 'Bicano.jpg', '0', '2021-11-03 15:46:10', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(244, 'G2154996928', '', 'Bicano1.jpg', '0', '2021-11-03 15:46:20', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(245, 'G2154955329', '', 'alu_bhujia.jpg', '0', '2021-11-03 16:09:18', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(246, 'G2154955329', '', 'alu_bhujia1.jpg', '0', '2021-11-03 16:09:32', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(247, 'G2154205309', '', 'NAVRATAN-220GM.jpg', '0', '2021-11-03 16:18:40', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(248, 'G2154205309', '', 'NAVRATAN-220GM1.jpg', '0', '2021-11-03 16:19:15', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(249, 'G2154556208', '', 'penuts.jpg', '0', '2021-11-03 16:28:12', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(250, 'G2154556208', '', 'penuts1.jpg', '0', '2021-11-03 16:28:24', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(251, 'G2154966955', '', 'bhujia.jpg', '0', '2021-11-03 16:41:20', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(252, 'G2154966955', '', 'bhujia1.jpg', '0', '2021-11-03 16:41:31', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(253, 'G2154567185', '', 'moong_daal.jpg', '0', '2021-11-03 16:50:23', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(254, 'G2154567185', '', 'moong_daal1.jpg', '0', '2021-11-03 16:50:35', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(255, 'G2154699758', '', 'aloo_spicy_bhujia.jpg', '0', '2021-11-03 17:00:36', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(256, 'G2154699758', '', 'aloo_spicy_bhujia1.jpg', '0', '2021-11-03 17:00:47', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(257, 'G2154245957', '', 'khata_meetha.jpg', '0', '2021-11-03 17:06:06', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(258, 'G2154245957', '', 'khata_meetha1.jpg', '0', '2021-11-03 17:06:24', '103.119.164.21', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(259, 'G3964658204', '', 'png_20211125_151529_0000.png', '2', '2021-11-25 15:24:58', '103.199.112.186', 'GHRFBD1001', 'admin', '2021-11-27 16:36:44', ''),
(260, 'G4685687348', '', '20211125_170238_0000.png', '2', '2021-11-25 17:24:11', '103.119.165.27', 'GHRFBD1001', 'admin', '2021-11-25 17:29:51', ''),
(261, 'G4685687348', '', '20211125_172631_0000.jpg', '2', '2021-11-25 17:28:08', '103.119.165.27', 'GHRFBD1001', 'admin', '2021-11-25 17:29:45', ''),
(262, 'G2051330334', '', '20211125_204901_0000.jpg', '0', '2021-11-25 20:50:02', '103.212.130.228', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(263, 'G2051330334', '', '20211125_204901_00001.jpg', '0', '2021-11-25 20:50:21', '103.212.130.228', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(264, 'G2051943457', '', '20211126_124254_0000.jpg', '0', '2021-11-26 12:44:08', '103.119.165.244', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(265, 'G2051943457', '', '20211126_124254_00001.jpg', '0', '2021-11-26 12:44:19', '103.119.165.244', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(266, 'G2051934619', '', '20211126_125550_0000.jpg', '0', '2021-11-26 12:57:24', '103.119.165.244', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(267, 'G2051934619', '', '20211126_125550_00001.jpg', '0', '2021-11-26 12:57:34', '103.119.165.244', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(268, 'G2051116531', '', '20211126_131819_0000.jpg', '0', '2021-11-26 13:19:27', '103.119.165.244', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(269, 'G2051116531', '', '20211126_131819_00001.jpg', '0', '2021-11-26 13:19:38', '103.119.165.244', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(270, 'G2051373827', '', 'jpg_20211126_155837_0000.jpg', '0', '2021-11-26 16:00:05', '103.199.112.9', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(271, 'G2051373827', '', 'jpg_20211126_155837_00001.jpg', '0', '2021-11-26 16:00:19', '103.199.112.9', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(272, 'G2051402764', '', '20211126_163534_0000.jpg', '0', '2021-11-26 16:36:32', '103.199.112.9', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(273, 'G2051402764', '', '20211126_163534_00001.jpg', '0', '2021-11-26 16:36:46', '103.199.112.9', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(274, 'G2051876778', '', 'jpg_20211126_165513_0000.jpg', '0', '2021-11-26 16:56:44', '103.199.112.9', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(275, 'G2051876778', '', 'jpg_20211126_165513_00001.jpg', '0', '2021-11-26 16:56:57', '103.199.112.9', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(276, 'G5284941384', '', 'hh.jpg', '2', '2021-11-26 17:19:36', '47.31.179.211', 'GHRFBD1001', 'admin', '2021-11-26 17:22:55', ''),
(277, 'G5284941384', '', '20211126_172224_0000.jpg', '0', '2021-11-26 17:22:45', '47.31.179.211', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(278, 'G5284941384', '', '20211126_172224_00001.jpg', '0', '2021-11-26 17:23:03', '47.31.179.211', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(279, 'G5284953434', '', '20211126_180631_0000.jpg', '0', '2021-11-26 18:07:48', '103.119.164.200', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(280, 'G5284953434', '', '20211126_180631_00001.jpg', '0', '2021-11-26 18:08:02', '103.119.164.200', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(281, 'G5284846946', '', '20211126_181631_0000.jpg', '0', '2021-11-26 18:17:07', '103.119.164.200', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(282, 'G5284846946', '', '20211126_181631_00001.jpg', '0', '2021-11-26 18:17:39', '103.119.164.200', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(283, 'G2199681340', '', '20211126_183336_0000.jpg', '0', '2021-11-26 18:35:41', '103.119.164.200', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(284, 'G2199681340', '', '20211126_183336_00001.jpg', '0', '2021-11-26 18:35:58', '103.119.164.200', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(285, 'G3964658204', '', '20211127_163509_0000.jpg', '0', '2021-11-27 16:36:55', '47.31.175.40', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(286, 'G3964658204', '', '20211127_163509_00001.jpg', '0', '2021-11-27 16:37:16', '47.31.175.40', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(287, 'G2199338837', '', 'jpg_20211128_152855_0000.jpg', '0', '2021-11-28 15:29:26', '47.31.159.210', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(288, 'G2199338837', '', 'jpg_20211128_152855_00001.jpg', '0', '2021-11-28 15:29:50', '47.31.159.210', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(289, 'G2199453718', '', '20211128_154713_0000.jpg', '0', '2021-11-28 15:47:22', '47.31.159.210', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(290, 'G2199453718', '', '20211128_154713_00001.jpg', '0', '2021-11-28 15:47:36', '47.31.159.210', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(291, 'G2199783871', '', 'jpg_20211128_155713_0000.jpg', '0', '2021-11-28 15:58:00', '47.31.159.210', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(292, 'G2199783871', '', 'jpg_20211128_155713_00001.jpg', '0', '2021-11-28 15:58:16', '47.31.159.210', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(293, 'G2199825430', '', 'jpg_20211128_161016_0000.jpg', '0', '2021-11-28 16:10:43', '47.31.159.210', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(294, 'G2199825430', '', 'jpg_20211128_161016_00001.jpg', '0', '2021-11-28 16:10:55', '47.31.159.210', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(295, 'G2199727722', '', '20211128_162230_0000.jpg', '0', '2021-11-28 16:23:22', '47.31.159.210', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(296, 'G2199727722', '', '20211128_162230_00001.jpg', '0', '2021-11-28 16:23:42', '47.31.159.210', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(297, 'G2199145231', '', '20211128_163550_0000.jpg', '0', '2021-11-28 16:36:54', '47.31.159.210', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(298, 'G2199145231', '', '20211128_163550_00001.jpg', '0', '2021-11-28 16:37:05', '47.31.159.210', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(299, 'G2051804863', '', 'jpg_20211128_175733_0000.jpg', '0', '2021-11-28 17:58:28', '47.31.138.195', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(300, 'G2051804863', '', 'jpg_20211128_175733_00001.jpg', '0', '2021-11-28 17:58:42', '47.31.138.195', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(301, 'G2051490221', '', '20211128_181048_0000.jpg', '0', '2021-11-28 18:11:32', '47.31.138.195', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(302, 'G2051490221', '', '20211128_181048_00001.jpg', '0', '2021-11-28 18:11:47', '47.31.138.195', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(303, 'G2053751267', '', '20211128_181830_0000.jpg', '0', '2021-11-28 18:18:56', '47.31.138.195', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(304, 'G2053751267', '', '20211128_181830_00001.jpg', '0', '2021-11-28 18:19:14', '47.31.138.195', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(305, 'G2051310272', '', '20211128_182737_0000.jpg', '0', '2021-11-28 18:28:47', '47.31.138.195', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(306, 'G2051310272', '', '20211128_182737_00001.jpg', '0', '2021-11-28 18:29:07', '47.31.138.195', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(307, 'G2048718351', '', '20211128_190906_0000.jpg', '0', '2021-11-28 19:10:10', '47.31.138.195', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(308, 'G2048718351', '', '20211128_190906_00001.jpg', '0', '2021-11-28 19:10:20', '47.31.138.195', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(309, 'G2051494302', '', '20211128_194249_0000.jpg', '0', '2021-11-28 19:43:20', '47.31.138.195', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(310, 'G2051494302', '', '20211128_194249_00001.jpg', '0', '2021-11-28 19:43:51', '47.31.138.195', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(311, 'G2048776596', '', 'jpg_20211128_195546_0000.jpg', '0', '2021-11-28 19:57:30', '47.31.138.195', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(312, 'G2048776596', '', 'jpg_20211128_195546_00001.jpg', '0', '2021-11-28 19:57:42', '47.31.138.195', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(313, 'G2051369063', '', 'jpg_20211129_112943_0000.jpg', '0', '2021-11-29 11:30:36', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(314, 'G2051369063', '', 'jpg_20211129_112943_00001.jpg', '0', '2021-11-29 11:30:52', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(315, 'G2048948253', '', 'jpg_20211129_114127_0000.jpg', '0', '2021-11-29 11:41:47', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(316, 'G2048948253', '', 'jpg_20211129_114127_00001.jpg', '0', '2021-11-29 11:42:02', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(317, 'G2048716115', '', '20211129_115529_0000.jpg', '0', '2021-11-29 11:56:38', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(318, 'G2048716115', '', '20211129_115529_00001.jpg', '0', '2021-11-29 11:56:49', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(319, 'G2048936959', '', '20211129_121103_0000.jpg', '0', '2021-11-29 12:11:54', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(320, 'G2048936959', '', '20211129_121103_00001.jpg', '0', '2021-11-29 12:12:32', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(321, 'G2048282425', '', '20211129_122259_0000.jpg', '0', '2021-11-29 12:23:21', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(322, 'G2048282425', '', '20211129_122259_00001.jpg', '0', '2021-11-29 12:23:34', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(323, 'G2048375003', '', '20211129_123803_0000.jpg', '0', '2021-11-29 12:38:15', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(324, 'G2048375003', '', '20211129_123803_00001.jpg', '0', '2021-11-29 12:38:29', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(325, 'G2048648009', '', '20211129_124620_0000.jpg', '2', '2021-11-29 12:46:38', '47.31.135.13', 'GHRFBD1001', 'admin', '2021-11-29 12:47:26', ''),
(326, 'G2048648009', '', '20211129_124713_0000.jpg', '0', '2021-11-29 12:47:32', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(327, 'G2048648009', '', '20211129_124713_00001.jpg', '0', '2021-11-29 12:47:47', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(328, 'G2048403002', '', '20211129_125609_0000.jpg', '0', '2021-11-29 12:56:35', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(329, 'G2048403002', '', '20211129_125609_00001.jpg', '0', '2021-11-29 12:56:50', '47.31.135.13', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(330, 'G2050584678', '', '20211129_135656_0000.jpg', '0', '2021-11-29 13:57:21', '47.31.147.198', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(331, 'G2050584678', '', '20211129_135656_00001.jpg', '0', '2021-11-29 13:57:37', '47.31.147.198', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(332, 'G2048257349', '', '20211129_141119_0000.jpg', '0', '2021-11-29 14:11:53', '47.31.147.198', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(333, 'G2048257349', '', '20211129_141119_00001.jpg', '0', '2021-11-29 14:12:07', '47.31.147.198', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(334, 'G2049589186', '', 'jpg_20211129_150437_0000.jpg', '0', '2021-11-29 15:05:44', '47.31.147.198', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(335, 'G2049589186', '', 'jpg_20211129_150437_00001.jpg', '0', '2021-11-29 15:06:05', '47.31.147.198', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(336, 'G3963760574', '', 'jpg_20211129_152717_0000.jpg', '0', '2021-11-29 15:27:43', '47.31.147.198', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(337, 'G3963760574', '', 'jpg_20211129_152717_00001.jpg', '0', '2021-11-29 15:27:54', '47.31.147.198', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(338, 'G2048489917', '', '0001-13737313334_20211203_152505_0000.jpg', '0', '2021-12-03 15:26:09', '103.199.115.252', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(339, 'G2048489917', '', '0001-13737313334_20211203_152505_00001.jpg', '0', '2021-12-03 15:26:32', '103.199.115.252', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(340, 'G2010118619', '', '0001-13742775708_20211203_170938_0000.jpg', '0', '2021-12-03 17:10:17', '157.37.136.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(341, 'G2010118619', '', '0001-13742775708_20211203_170938_00001.jpg', '0', '2021-12-03 17:10:32', '157.37.136.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(342, 'G2049700099', '', '0001-13743543444_20211203_172308_0000.jpg', '0', '2021-12-03 17:23:42', '157.37.136.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(343, 'G2049700099', '', '0001-13743543444_20211203_172308_00001.jpg', '0', '2021-12-03 17:23:54', '157.37.136.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(344, 'G2049981893', '', '0001-13744127392_20211203_173308_0000.jpg', '0', '2021-12-03 17:33:31', '157.37.136.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(345, 'G2049981893', '', '0001-13744127392_20211203_173308_00001.jpg', '0', '2021-12-03 17:33:42', '157.37.136.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(346, 'G2051858596', '', '0001-13744524464_20211203_173951_0000.jpg', '0', '2021-12-03 17:40:04', '157.37.136.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(347, 'G2051858596', '', '0001-13744524464_20211203_173951_00001.jpg', '0', '2021-12-03 17:40:17', '157.37.136.134', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(348, 'G2048686114', '', '0001-13805123585_20211204_122157_0000.jpg', '0', '2021-12-04 12:22:47', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(349, 'G2048686114', '', '0001-13805123585_20211204_122157_00001.jpg', '0', '2021-12-04 12:22:56', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(350, 'G2051996835', '', '0001-13805464734_20211204_123248_0000.jpg', '0', '2021-12-04 12:33:36', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(351, 'G2051996835', '', '0001-13805464734_20211204_123248_00001.jpg', '0', '2021-12-04 12:33:45', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(352, 'G2053294470', '', '20211204_125011_0000.jpg', '0', '2021-12-04 12:51:24', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(353, 'G2053294470', '', '20211204_125011_00001.jpg', '0', '2021-12-04 12:51:46', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(354, 'G2048905196', '', 'jpg_20211204_125948_0000.jpg', '0', '2021-12-04 13:00:41', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(355, 'G2048905196', '', 'jpg_20211204_125948_00001.jpg', '0', '2021-12-04 13:00:56', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(356, 'G2052175423', '', '20211204_131332_0000.jpg', '0', '2021-12-04 13:14:41', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(357, 'G2052175423', '', '20211204_131332_00001.jpg', '0', '2021-12-04 13:14:55', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(358, 'G4671162811', '', '20211204_132524_0000.jpg', '0', '2021-12-04 13:26:06', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(359, 'G4671162811', '', '20211204_132524_00001.jpg', '0', '2021-12-04 13:26:19', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(360, 'G4671205107', '', '20211204_134021_0000.jpg', '0', '2021-12-04 13:41:43', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(361, 'G4671205107', '', '20211204_134021_00001.jpg', '0', '2021-12-04 13:42:09', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(362, 'G4671785353', '', '20211204_134910_0000.jpg', '0', '2021-12-04 13:50:52', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(363, 'G4671785353', '', '20211204_134910_00001.jpg', '0', '2021-12-04 13:51:04', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(364, 'G4671134515', '', 'jpg_20211204_135857_0000.jpg', '0', '2021-12-04 13:59:49', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(365, 'G4671134515', '', 'jpg_20211204_135857_00001.jpg', '0', '2021-12-04 14:00:10', '103.212.130.24', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(366, 'G4671248714', '', '20211207_200139_0000.jpg', '0', '2021-12-07 20:04:44', '103.199.114.37', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(367, 'G4671248714', '', '20211207_200139_00001.jpg', '0', '2021-12-07 20:04:58', '103.199.114.37', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(368, 'G4671730511', '', '20211207_201741_0000.jpg', '0', '2021-12-07 20:19:16', '103.199.114.37', 'GHRFBD1001', '', '0000-00-00 00:00:00', ''),
(369, 'G4671730511', '', '20211207_201741_00001.jpg', '0', '2021-12-07 20:19:47', '103.199.114.37', 'GHRFBD1001', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `v_product_order`
--

CREATE TABLE `v_product_order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(16) NOT NULL,
  `invoice_id` varchar(16) NOT NULL,
  `total_price` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `pay_status` enum('In-Process','Failed','Completed','Pending','Cancel') NOT NULL DEFAULT 'Pending',
  `order_status` enum('In-Progress','Confirmed','Delivered') NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment` varchar(500) NOT NULL,
  `coupon_code` varchar(16) NOT NULL,
  `coupon_discount` varchar(10) NOT NULL,
  `commission` varchar(10) NOT NULL,
  `biling_type` varchar(20) NOT NULL,
  `delivery_type` varchar(20) NOT NULL,
  `biling_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `shipping_method` varchar(10) NOT NULL,
  `shipping_method_comment` varchar(200) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `payment_method_comment` varchar(200) NOT NULL,
  `payment_method_agree` varchar(5) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `created_ip` varchar(100) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` varchar(10) NOT NULL,
  `modified_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_product_order`
--

INSERT INTO `v_product_order` (`id`, `order_id`, `invoice_id`, `total_price`, `user_id`, `pay_status`, `order_status`, `order_date`, `comment`, `coupon_code`, `coupon_discount`, `commission`, `biling_type`, `delivery_type`, `biling_id`, `delivery_id`, `shipping_method`, `shipping_method_comment`, `payment_method`, `payment_method_comment`, `payment_method_agree`, `status`, `created_on`, `created_by`, `created_ip`, `modified_on`, `modified_by`, `modified_ip`) VALUES
(1, 'Y7n8rR0Jbz9V', 'Lum8VvzhsKBn', 962, 'G617965', 'Pending', 'Delivered', '2022-08-20 07:38:42', '', '', '', '', 'undefined', 'existing', 3, 3, 'undefined', '', 'COD', '', '', '', '2022-08-20 13:05:01', 'admin', '', '2022-08-20 13:08:42', 'admin', ''),
(2, '9SCjbWul0RE1', 'X6Nc1jOtx7wJ', 600, 'G871008', 'Pending', 'Delivered', '2022-08-25 06:04:20', '', '', '', '', 'undefined', 'existing', 4, 4, 'undefined', '', 'COD', '', '', '', '2022-08-25 11:32:31', 'admin', '', '2022-08-25 11:34:20', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `v_product_review`
--

CREATE TABLE `v_product_review` (
  `id` int(11) NOT NULL,
  `product_id` varchar(25) NOT NULL,
  `user_id` varchar(16) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `rating` int(1) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_by` varchar(25) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_product_review`
--

INSERT INTO `v_product_review` (`id`, `product_id`, `user_id`, `full_name`, `comment`, `rating`, `status`, `created_by`, `created_on`, `created_ip`) VALUES
(1, 'G1031335093', 'G374808', '', 'this is good masala', 4, '0', 'admin', '2021-10-18 19:33:27', '157.37.196.81'),
(4, 'G0101513292', 'G774195', '', 'This is good product', 3, '0', 'admin', '2021-10-29 18:25:21', '103.199.112.106');

-- --------------------------------------------------------

--
-- Table structure for table `v_sale_report`
--

CREATE TABLE `v_sale_report` (
  `id` int(11) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `invoice_id` varchar(20) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_mob` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` int(20) NOT NULL,
  `city` int(20) NOT NULL,
  `pincode` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `v_sale_report`
--

INSERT INTO `v_sale_report` (`id`, `order_id`, `invoice_id`, `cust_name`, `cust_mob`, `email`, `address`, `state`, `city`, `pincode`, `status`, `created_on`, `created_by`) VALUES
(1, '5LAFYn3uV0ZW', '5LAFYn3uV0ZW', 'dsfgsdf', 2147483647, 'fdsgsdfgd@gmail.com', 'dgfaskdfjl', 13, 173, 121002, '0', '2022-02-05 16:23:50', 'GHRFBD1001'),
(2, 'A9rU5DuPCG3f', 'A9rU5DuPCG3f', 'sdfas', 2147483647, 'sdkjfalsdjfklasd@gmail.com', 'jaslkfjlskj', 13, 160, 121002, '0', '2022-02-05 16:48:14', 'GHRFBD1001'),
(3, 'hjnR03GwDxP7', 'hjnR03GwDxP7', 'Mukesh Dhar', 2147483647, 'rakeshdhar910@gmail.com', 'house no. 7a, bhopani mor, ', 13, 160, 121002, '0', '2022-03-03 12:17:14', 'GHRFBD1001');

-- --------------------------------------------------------

--
-- Table structure for table `v_shop_vendor`
--

CREATE TABLE `v_shop_vendor` (
  `id` int(11) NOT NULL,
  `vendor_id` varchar(11) NOT NULL,
  `category_id` varchar(20) NOT NULL,
  `shop_image` varchar(200) NOT NULL,
  `shop_image_2` varchar(200) NOT NULL,
  `v_shop_name` varchar(200) NOT NULL,
  `v_shop_address` varchar(1000) NOT NULL,
  `v_shop_state` int(2) NOT NULL,
  `v_shop_city` int(2) NOT NULL,
  `v_shop_pincode` int(6) NOT NULL,
  `v_shop_area` int(2) NOT NULL,
  `shop_id` varchar(6) NOT NULL,
  `open_time` varchar(15) NOT NULL,
  `closing_time` varchar(15) NOT NULL,
  `lat_log` varchar(100) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `created_by` varchar(15) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_ip` varchar(25) NOT NULL,
  `modified_by` varchar(15) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_ip` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `v_shop_vendor`
--

INSERT INTO `v_shop_vendor` (`id`, `vendor_id`, `category_id`, `shop_image`, `shop_image_2`, `v_shop_name`, `v_shop_address`, `v_shop_state`, `v_shop_city`, `v_shop_pincode`, `v_shop_area`, `shop_id`, `open_time`, `closing_time`, `lat_log`, `status`, `created_by`, `created_on`, `created_ip`, `modified_by`, `modified_on`, `modified_ip`) VALUES
(27, 'GUPAAR4987', '10', 'Resturant.jpeg', 'Resturant.jpeg', 'Gomores', 'Shop No 3', 13, 160, 121002, 0, 'G32199', '08:00', '10:00', '2km', '0', 'GHRFBD1001', '2021-08-23 12:17:02', '106.198.225.97', '', '0000-00-00 00:00:00', ''),
(28, 'GHRFBD1001', '10', 'Resturant.jpeg', 'Resturant.jpeg', 'Gomoresc', 'Shop No 3', 13, 160, 121002, 0, 'G32191', '08:00', '10:00', '2km', '0', 'GHRFBD1001', '2021-08-23 12:17:02', '106.198.225.97', '', '0000-00-00 00:00:00', ''),
(29, 'GHRFBD1001', '10', 'Resturant.jpeg', 'Resturant.jpeg', 'Gomorescs', 'Shop No 3', 13, 160, 121002, 0, 'G32110', '08:00', '10:00', '2km', '0', 'GHRFBD1001', '2021-08-23 12:17:02', '106.198.225.97', '', '0000-00-00 00:00:00', ''),
(30, 'GHRFQZ5365', '10', 'Resturant.jpeg', 'Resturant.jpeg', 'Gomorescsw', 'Shop No 3', 13, 160, 121002, 0, 'G32113', '08:00', '10:00', '2km', '0', 'GHRFBD1001', '2021-08-23 12:17:02', '106.198.225.97', '', '0000-00-00 00:00:00', ''),
(31, 'GUPAAR1508', '10', 'Resturant.jpeg', 'Resturant.jpeg', 'Gomorss', 'Shop No 3', 13, 160, 121002, 0, 'G32117', '08:00', '10:00', '2km', '0', 'GHRFBD1001', '2021-08-23 12:17:02', '106.198.225.97', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `v_users`
--

CREATE TABLE `v_users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `cust_type` enum('Reseller','Customer') NOT NULL DEFAULT 'Customer',
  `f_name` varchar(15) NOT NULL,
  `l_name` varchar(15) NOT NULL,
  `primary_mobile` varchar(10) NOT NULL,
  `mobile_status` enum('0','1') NOT NULL,
  `email_status` enum('0','1') NOT NULL,
  `password` varchar(200) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `gender` enum('None','Male','Female','Other') NOT NULL,
  `dob` date DEFAULT NULL,
  `user_image` varchar(200) NOT NULL,
  `tags_user_id` varchar(20) NOT NULL,
  `use_referral_code` varchar(20) NOT NULL,
  `referral_code` varchar(20) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_ip` varchar(500) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_ip` varchar(500) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_by` varchar(16) NOT NULL,
  `subscription_status` enum('0','1') NOT NULL,
  `modified_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_users`
--

INSERT INTO `v_users` (`id`, `user_id`, `cust_type`, `f_name`, `l_name`, `primary_mobile`, `mobile_status`, `email_status`, `password`, `email_id`, `gender`, `dob`, `user_image`, `tags_user_id`, `use_referral_code`, `referral_code`, `created_on`, `created_ip`, `modified_on`, `modified_ip`, `status`, `created_by`, `subscription_status`, `modified_by`) VALUES
(1, 'G617965', 'Customer', 'Rakesh', 'Dhar', '7042205441', '1', '0', '$2y$10$LwNEwruhDy30Hhr7GLqXaubNr4OZaYUf.aN74U0Ahm7qHPI3T/WBi', 'rakeshdhar910@gmail.com', 'None', NULL, '', '', '', '', '2022-07-17 11:37:38', '47.31.97.239', '0000-00-00 00:00:00', '', '0', 'admin', '0', ''),
(2, 'G745467', 'Customer', 'Manish', 'Kumar', '8802263916', '1', '0', '$2y$10$0sW5XwfC2oCOs2VoFfmYxujJC1/NUYb3IRNh1kmIVj0BCxsyEUI.y', 'maishkumar.optif@gmail.com', 'None', NULL, '', '', '', '', '2022-08-19 17:50:01', '47.31.163.12', '0000-00-00 00:00:00', '', '0', 'admin', '0', ''),
(3, 'G871008', 'Customer', 'Basant', 'Kumar', '9667120096', '1', '0', '$2y$10$Hgp9eZ23go09sRg0I/XCpuGpu4IT3I8jOb6L7D5XanxxdQUDTdt8q', 'kumarbasant7363@gmail.com', 'None', NULL, '', '', '', '', '2022-08-25 11:29:06', '103.119.164.210', '0000-00-00 00:00:00', '', '0', 'admin', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `v_users_address`
--

CREATE TABLE `v_users_address` (
  `id` int(11) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `product_id` varchar(25) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `address_type` enum('1','2') NOT NULL DEFAULT '1' COMMENT ' 1 is biling address, 2 is delivery address',
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `created_by` varchar(15) NOT NULL,
  `created_on` varchar(20) NOT NULL,
  `created_ip` varchar(30) NOT NULL,
  `modified_by` varchar(15) NOT NULL,
  `modified_on` varchar(20) NOT NULL,
  `modified_ip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `v_users_address`
--

INSERT INTO `v_users_address` (`id`, `user_id`, `product_id`, `address1`, `address2`, `state`, `city`, `pincode`, `address_type`, `status`, `created_by`, `created_on`, `created_ip`, `modified_by`, `modified_on`, `modified_ip`) VALUES
(1, 'G617965', '', 'House No. 7a', 'Bhupani mor', 13, 160, 121002, '2', '2', 'admin', '2022-07-17 11:49:38', '', 'admin', '2022-08-20 10:49:56', ''),
(2, 'G617965', 'G2048905196', 'House NO. 89', 'rajendar flat', 0, 0, 121002, '1', '1', 'G617965', '2022-07-17 12:01:56', '47.31.97.239', '', '', ''),
(3, 'G617965', 'G2048905196', 'House No. 7A Uday Chandra Enclave  ', 'jasana road', 0, 0, 121002, '2', '1', 'G617965', '2022-08-20 10:48:14', '47.31.147.161', '', '', ''),
(4, 'G871008', '', 'house.no. 66 old bhupani', 'jasana road', 13, 160, 121002, '2', '1', 'admin', '2022-08-25 11:30:49', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `v_users_demo`
--

CREATE TABLE `v_users_demo` (
  `id` int(11) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(50) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_users_demo`
--

INSERT INTO `v_users_demo` (`id`, `role`, `username`, `password`, `name`, `email`, `mobile`, `created_by`, `created_on`, `modified_by`, `modified_on`, `ip`) VALUES
(1, '', 'admin', 'admin', 'Admin', 'admin@gmail.com', '750379011', 'own', '2020-09-23 03:24:10', 'own', '2020-09-23 03:24:10', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `v_vendor`
--

CREATE TABLE `v_vendor` (
  `id` int(11) NOT NULL,
  `vendor_id` varchar(10) NOT NULL,
  `category_id` varchar(500) NOT NULL,
  `sub_category_id` varchar(50) NOT NULL,
  `vendor_type` enum('Admin','Vendor','Vendor_Emp') NOT NULL,
  `vendor_category_type` varchar(500) NOT NULL,
  `menu_access` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(20) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `dob` varchar(25) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `email_status` enum('0','1') NOT NULL,
  `primary_mobile` varchar(11) NOT NULL,
  `mobile_status` enum('0','1') NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL DEFAULT 'Male',
  `v_address` varchar(100) NOT NULL,
  `v_state` int(2) NOT NULL,
  `v_city` int(2) NOT NULL,
  `v_pincode` int(6) NOT NULL,
  `v_area` varchar(25) NOT NULL,
  `shop_status` enum('0','1') NOT NULL DEFAULT '1',
  `kyc_status` enum('0','1') NOT NULL DEFAULT '1',
  `acc_status` enum('0','1') NOT NULL DEFAULT '1',
  `term_con` enum('Yes','No') NOT NULL DEFAULT 'No',
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `created_by` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_ip` varchar(50) NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `v_vendor`
--

INSERT INTO `v_vendor` (`id`, `vendor_id`, `category_id`, `sub_category_id`, `vendor_type`, `vendor_category_type`, `menu_access`, `username`, `f_name`, `l_name`, `dob`, `email_id`, `email_status`, `primary_mobile`, `mobile_status`, `password`, `gender`, `v_address`, `v_state`, `v_city`, `v_pincode`, `v_area`, `shop_status`, `kyc_status`, `acc_status`, `term_con`, `status`, `created_by`, `created_on`, `created_ip`, `modified_by`, `modified_on`, `modified_ip`) VALUES
(1, 'GHRFBD1001', '{\"20\":[\"48\",\"49\",\"50\",\"51\",\"52\",\"53\"],\"21\":[\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\"],\"39\":[\"61\",\"62\",\"63\",\"64\",\"65\"],\"46\":[\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"85\"],\"47\":[\"86\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\"],\"52\":[\"81\",\"82\",\"83\",\"84\"]}', '1,2,3,4,5', 'Vendor', 'Top,Recommended,Specials', '{\"1\":[\"22\",\"23\",\"24\",\"25\",\"26\",\"28\",\"32\",\"33\"],\"2\":[\"6\",\"7\",\"15\",\"16\",\"27\"],\"3\":[\"8\",\"30\",\"31\"],\"4\":[\"9\",\"12\",\"13\",\"14\"],\"5\":[\"10\"],\"21\":[\"17\",\"18\",\"19\",\"20\"]}', 'admin', 'Admin', '', '', 'rakeshdhar910@gmail.com', '0', '2147483647', '0', 'Rhd@2021', 'Male', 'House No. 7A, Sector 89, Near Durga Dharam Kantha', 13, 160, 121002, 'Bhopani Mor', '0', '0', '0', 'Yes', '0', '', '0000-00-00 00:00:00', '', 'GHRFBD1001', '2021-11-29 11:19:26', '103.199.114.199'),
(27, 'GHRFQZ5365', '', '', 'Vendor', 'Specials', '', '8076995929', 'Mukesh', 'Dhar', '1993-03-17', 'mukeshdhar202@gmail.com', '0', '8076995929', '0', 'Rhd@2020', '', 'House No. 2', 13, 160, 121002, '', '1', '1', '1', 'Yes', '1', 'from site', '2021-11-11 12:01:31', '103.199.114.225', '', '2021-11-11 06:31:31', ''),
(28, 'GUPAAR1508', '', '', 'Vendor', 'Specials', '', '7042205443', 'raviss', 'kumarss', '1993-03-10', 'sdfadffghjhfsdd@gmail.com', '0', '7042205443', '0', 'Rhd@2020', '', 'sdafsdfa', 35, 547, 121333, '', '1', '1', '1', 'Yes', '2', 'from site', '2021-11-28 14:27:36', '103.119.164.248', 'admin', '2024-02-20 05:41:32', ''),
(31, 'GUPAAR4987', '', '', 'Vendor', 'Specials', '', '7042205441', 'dfgsdf', 'gsdfgsd', '1993-03-10', 'asdfasdfashfg@gmail.com', '0', '7042205441', '0', 'Rhd@2020', '', 'dfad', 35, 547, 223232, 'sdfasdf', '1', '1', '1', 'Yes', '2', 'from site', '2021-11-28 14:47:35', '103.199.112.243', 'admin', '2024-02-20 05:41:21', '');

-- --------------------------------------------------------

--
-- Table structure for table `v_vendor_image`
--

CREATE TABLE `v_vendor_image` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `img_name` varchar(25) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `ip` varchar(25) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(25) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `v_vendor_image`
--

INSERT INTO `v_vendor_image` (`id`, `image`, `img_name`, `status`, `ip`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(1, 'Resturant.jpeg', 'Resturant', '0', '', '2020-12-27 08:48:35', '', '0000-00-00 00:00:00', ''),
(2, 'FurnitureStore2.jpeg', 'Furniture Store', '0', '', '2020-12-27 08:48:35', '', '0000-00-00 00:00:00', ''),
(3, 'ToyStore.jpeg', 'Toy Store', '0', '', '2020-12-27 08:48:35', '', '0000-00-00 00:00:00', ''),
(4, 'BakeryStore.jpeg', 'Bakery Store.', '0', '', '2020-12-27 08:48:35', '', '0000-00-00 00:00:00', ''),
(5, 'Cafestore.jpeg', 'Cafe store', '0', '', '2020-12-27 08:48:35', '', '0000-00-00 00:00:00', ''),
(6, 'ComputerStore.jpeg', 'Computer Store', '0', '', '2020-12-27 08:48:35', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `v_vendor_kyc`
--

CREATE TABLE `v_vendor_kyc` (
  `id` int(11) NOT NULL,
  `vendor_id` varchar(25) NOT NULL,
  `aadhar_card` varchar(18) NOT NULL,
  `pancard` varchar(18) NOT NULL,
  `gst_no` varchar(25) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_on` varchar(25) NOT NULL,
  `created_ip` varchar(20) NOT NULL,
  `modified_by` varchar(25) NOT NULL,
  `modified_on` varchar(25) NOT NULL,
  `modified_ip` varchar(20) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_vendor_review`
--

CREATE TABLE `v_vendor_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` varchar(10) NOT NULL,
  `review_star` int(1) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_ip` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_vendor_review`
--

INSERT INTO `v_vendor_review` (`id`, `product_id`, `user_id`, `vendor_id`, `review_star`, `comment`, `created_on`, `created_ip`, `status`) VALUES
(1, 1021021222, 1021021222, 'GHRFBD1005', 4, 'gasdgadgs dfgsdfasfdsad', '2020-10-07 03:54:16', '192.1.12.213', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_trial`
--
ALTER TABLE `audit_trial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_id` (`invoice_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `complain_cat`
--
ALTER TABLE `complain_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expence`
--
ALTER TABLE `expence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_attempt`
--
ALTER TABLE `log_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_area`
--
ALTER TABLE `master_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_commission`
--
ALTER TABLE `master_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pincode`
--
ALTER TABLE `master_pincode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_account_detail`
--
ALTER TABLE `v_account_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- Indexes for table `v_archive`
--
ALTER TABLE `v_archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_banner`
--
ALTER TABLE `v_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_banner1`
--
ALTER TABLE `v_banner1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_blocked`
--
ALTER TABLE `v_blocked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_complain`
--
ALTER TABLE `v_complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_contact`
--
ALTER TABLE `v_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_enquiry`
--
ALTER TABLE `v_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_faq`
--
ALTER TABLE `v_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_master_category`
--
ALTER TABLE `v_master_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `v_master_city`
--
ALTER TABLE `v_master_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_master_state`
--
ALTER TABLE `v_master_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_master_sub_category`
--
ALTER TABLE `v_master_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `v_menu`
--
ALTER TABLE `v_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_mobile_blocked`
--
ALTER TABLE `v_mobile_blocked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_order`
--
ALTER TABLE `v_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_otp`
--
ALTER TABLE `v_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_pages`
--
ALTER TABLE `v_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_party`
--
ALTER TABLE `v_party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_product`
--
ALTER TABLE `v_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_product_cart`
--
ALTER TABLE `v_product_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_product_color_size`
--
ALTER TABLE `v_product_color_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_product_image`
--
ALTER TABLE `v_product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_product_order`
--
ALTER TABLE `v_product_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_product_review`
--
ALTER TABLE `v_product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_sale_report`
--
ALTER TABLE `v_sale_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_shop_vendor`
--
ALTER TABLE `v_shop_vendor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shop_id` (`shop_id`);

--
-- Indexes for table `v_users`
--
ALTER TABLE `v_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `primary_mobile` (`primary_mobile`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `v_users_address`
--
ALTER TABLE `v_users_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_users_demo`
--
ALTER TABLE `v_users_demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_vendor`
--
ALTER TABLE `v_vendor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD UNIQUE KEY `primary_mobile` (`primary_mobile`);

--
-- Indexes for table `v_vendor_image`
--
ALTER TABLE `v_vendor_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_vendor_kyc`
--
ALTER TABLE `v_vendor_kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_vendor_review`
--
ALTER TABLE `v_vendor_review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_trial`
--
ALTER TABLE `audit_trial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complain_cat`
--
ALTER TABLE `complain_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `expence`
--
ALTER TABLE `expence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_attempt`
--
ALTER TABLE `log_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_area`
--
ALTER TABLE `master_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_commission`
--
ALTER TABLE `master_commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_pincode`
--
ALTER TABLE `master_pincode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `v_account_detail`
--
ALTER TABLE `v_account_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `v_archive`
--
ALTER TABLE `v_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `v_banner`
--
ALTER TABLE `v_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `v_banner1`
--
ALTER TABLE `v_banner1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `v_blocked`
--
ALTER TABLE `v_blocked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `v_complain`
--
ALTER TABLE `v_complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `v_contact`
--
ALTER TABLE `v_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `v_enquiry`
--
ALTER TABLE `v_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `v_faq`
--
ALTER TABLE `v_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `v_master_category`
--
ALTER TABLE `v_master_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `v_master_city`
--
ALTER TABLE `v_master_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=651;

--
-- AUTO_INCREMENT for table `v_master_state`
--
ALTER TABLE `v_master_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `v_master_sub_category`
--
ALTER TABLE `v_master_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `v_menu`
--
ALTER TABLE `v_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `v_mobile_blocked`
--
ALTER TABLE `v_mobile_blocked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `v_order`
--
ALTER TABLE `v_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT for table `v_otp`
--
ALTER TABLE `v_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `v_pages`
--
ALTER TABLE `v_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `v_party`
--
ALTER TABLE `v_party`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `v_product`
--
ALTER TABLE `v_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `v_product_cart`
--
ALTER TABLE `v_product_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=708;

--
-- AUTO_INCREMENT for table `v_product_color_size`
--
ALTER TABLE `v_product_color_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `v_product_image`
--
ALTER TABLE `v_product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;

--
-- AUTO_INCREMENT for table `v_product_order`
--
ALTER TABLE `v_product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `v_product_review`
--
ALTER TABLE `v_product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `v_sale_report`
--
ALTER TABLE `v_sale_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `v_shop_vendor`
--
ALTER TABLE `v_shop_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `v_users`
--
ALTER TABLE `v_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `v_users_address`
--
ALTER TABLE `v_users_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `v_users_demo`
--
ALTER TABLE `v_users_demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `v_vendor`
--
ALTER TABLE `v_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `v_vendor_image`
--
ALTER TABLE `v_vendor_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `v_vendor_kyc`
--
ALTER TABLE `v_vendor_kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `v_vendor_review`
--
ALTER TABLE `v_vendor_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
