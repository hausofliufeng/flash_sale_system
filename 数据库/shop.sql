-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2021 at 07:29 PM
-- Server version: 5.6.49-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_detail`
--

CREATE TABLE IF NOT EXISTS `item_detail` (
  `id` int(16) NOT NULL,
  `name` varchar(32) NOT NULL,
  `price` float NOT NULL,
  `seller` varchar(32) NOT NULL,
  `time_start` int(16) unsigned NOT NULL,
  `time_end` int(16) unsigned NOT NULL,
  `period` int(16) unsigned NOT NULL,
  `stock_origin` int(16) unsigned NOT NULL,
  `stock_left` int(16) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_detail`
--

INSERT INTO `item_detail` (`id`, `name`, `price`, `seller`, `time_start`, `time_end`, `period`, `stock_origin`, `stock_left`) VALUES
(1, '洗衣机', 500, '西门子电器', 1611194400, 1611280800, 86400, 50, 0),
(2, '茅台', 1288, '京东', 1611574808, 1611834008, 259200, 18, 6),
(3, '电风扇', 49, '京东', 1610942027, 1611028427, 86400, 15, 5),
(4, '手机', 1999, '淘宝', 1611295576, 1611381976, 86400, 10, 0),
(5, '电视机', 4399, '京东', 1611273600, 1611360000, 86400, 88, 86),
(6, '电脑', 7500, '京东', 1611273600, 1611532800, 259200, 128, 128),
(7, '汪峰演唱会门票', 1288, '迪丽热巴', 1611457200, 1612321200, 864000, 2000, 2000),
(8, '娃哈哈牛奶', 9.9, '拼多多', 1611619200, 1611878400, 259200, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(10) unsigned NOT NULL,
  `m` varchar(15) NOT NULL,
  `c` varchar(20) NOT NULL,
  `a` varchar(20) NOT NULL,
  `querystring` varchar(255) NOT NULL,
  `userid` mediumint(8) unsigned DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `ip` int(10) NOT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `m`, `c`, `a`, `querystring`, `userid`, `username`, `ip`, `time`) VALUES
(6, 'index', 'Passchange', 'index', '', 2, '拼多多', 2147483647, 1611382601),
(7, 'index', 'Passchange', 'dochange', '?pass_old=654321&pass=123456', 2, '拼多多', 2147483647, 1611382613),
(8, 'index', 'Index', 'index', '', 5, '迪丽热巴', 2147483647, 1611386397),
(9, 'index', 'Index', 'index', '', 5, '迪丽热巴', 2147483647, 1611386401),
(10, 'index', 'Makeitem', 'index', '', 5, '迪丽热巴', 2147483647, 1611386406),
(11, 'index', 'Log', 'index', '', 5, '迪丽热巴', 2147483647, 1611386415),
(12, 'index', 'Log', 'index', '', 5, '迪丽热巴', 2147483647, 1611386456),
(13, 'index', 'Log', 'index', '', 5, '迪丽热巴', 2147483647, 1611386569),
(14, 'index', 'Log', 'index', '', 5, '迪丽热巴', 2147483647, 1611386663),
(15, 'index', 'Log', 'index', '', 5, '迪丽热巴', 2147483647, 1611386687),
(16, 'index', 'Log', 'index', '', 5, '迪丽热巴', 2147483647, 1611396168),
(17, 'index', 'Index', 'index', '', 10, '京东', 2147483647, 1611396936),
(18, 'index', 'Makeitem', 'index', '', 10, '京东', 2147483647, 1611396940),
(19, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611396955),
(20, 'index', 'Makeitem', 'index', '', 11, 'admin', 2147483647, 1611396962),
(21, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611396970),
(22, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611397029),
(23, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611397043),
(24, 'index', 'Makeitem', 'index', '', 11, 'admin', 2147483647, 1611397053),
(25, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611397059),
(26, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611397194),
(27, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611397279),
(28, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611397323),
(29, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611397396),
(30, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611397418),
(31, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611397444),
(32, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611397454),
(33, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611397525),
(34, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611397568),
(35, 'index', 'Log', 'index', '', 11, 'admin', 2147483647, 1611397574),
(36, 'index', 'Index', 'index', '', 10, '京东', 2147483647, 1611397628),
(37, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611397753),
(38, 'index', 'Log', 'index', '', 11, 'admin', 2147483647, 1611397757),
(39, 'index', 'Log', 'index', '', 11, 'admin', 2147483647, 1611397919),
(40, 'index', 'Log', 'index', '', 11, 'admin', 2147483647, 1611398324),
(41, 'index', 'Log', 'index', '', 11, 'admin', 2147483647, 1611400972),
(42, 'index', 'Passchange', 'index', '', 11, 'admin', 2147483647, 1611400975),
(43, 'index', 'Log', 'index', '', 11, 'admin', 2147483647, 1611400980),
(44, 'index', 'Index', 'index', '', 11, 'admin', 2147483647, 1611400983),
(45, 'index', 'Index', 'index', '', 10, '京东', 2147483647, 1611401006),
(46, 'index', 'Passchange', 'index', '', 10, '京东', 2147483647, 1611401010),
(47, 'index', 'Makeitem', 'index', '', 10, '京东', 2147483647, 1611401012),
(48, 'index', 'Makeitem', 'index', '', 10, '京东', 2147483647, 1611401021);

-- --------------------------------------------------------

--
-- Table structure for table `user_buyer`
--

CREATE TABLE IF NOT EXISTS `user_buyer` (
  `user_id` int(10) unsigned NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_token` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_buyer`
--

INSERT INTO `user_buyer` (`user_id`, `user_name`, `user_password`, `user_token`) VALUES
(2, '吴彦祖', '654321', 'e75308e344ca66748db21a508a3652a3'),
(3, '周杰伦', 'zjl123321', '7d3561eb2acd75b51216879d13e7bb0d'),
(4, '林俊杰', 'ljj123321', 'b05e40187b6e9d9e0038acab3bd7e841'),
(1, '蔡依林', '123456', 'c3506744a6095a2b58402bc309c56f6f'),
(5, '迪丽热巴', 'dlrb123321', '45b57683083c1f1569fa072e74d23e80');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE IF NOT EXISTS `user_order` (
  `order_number` varchar(32) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `item_id` int(16) unsigned NOT NULL,
  `count` int(8) unsigned NOT NULL,
  `status` int(4) NOT NULL DEFAULT '0' COMMENT '0抢购失败；1抢购成功待付款；2代发货；3已完成',
  `order_time` int(16) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_number`, `user_id`, `item_id`, `count`, `status`, `order_time`) VALUES
('116112987721', 1, 1, 5, -1, 1611298772),
('116112992161', 1, 1, 15, -1, 1611299216),
('116113000704', 1, 4, 5, 0, 1611300070),
('116113002074', 1, 4, 5, -2, 1611300207),
('116113002102', 1, 2, 3, 1, 1611300210),
('116113160425', 1, 5, 2, 1, 1611316042),
('116113205154', 1, 4, 2, 1, 1611320515),
('116113364994', 1, 4, 1, 1, 1611336499);

-- --------------------------------------------------------

--
-- Table structure for table `user_seller`
--

CREATE TABLE IF NOT EXISTS `user_seller` (
  `user_id` int(10) unsigned NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_role` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '0普通商家；1管理员',
  `user_password` varchar(20) NOT NULL,
  `user_token` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_seller`
--

INSERT INTO `user_seller` (`user_id`, `user_name`, `user_role`, `user_password`, `user_token`) VALUES
(11, 'admin', 1, 'admin', ''),
(10, '京东', 0, '123321', 'b05e40187b6e9d9e0038acab3bd7e5rd5'),
(4, '卖水果的大叔', 0, 'ljj123321', 'b05e40187b6e9d9e0038acab3bd7e841'),
(2, '拼多多', 0, '123456', 'e75308e344ca66748db21a508a3652a3'),
(3, '淘宝', 0, 'zjl123321', '7d3561eb2acd75b51216879d13e7bb0d'),
(1, '王小丫的店铺', 0, '123456', 'c3506744a6095a2b58402bc309c56f6f'),
(5, '迪丽热巴', 0, '123456', '45b57683083c1f1569fa072e74d23e80');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_detail`
--
ALTER TABLE `item_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_buyer`
--
ALTER TABLE `user_buyer`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_number`);

--
-- Indexes for table `user_seller`
--
ALTER TABLE `user_seller`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_detail`
--
ALTER TABLE `item_detail`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `user_buyer`
--
ALTER TABLE `user_buyer`
  MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_seller`
--
ALTER TABLE `user_seller`
  MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
