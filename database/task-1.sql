-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 21, 2021 at 07:20 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task-1`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `department_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`) VALUES
(1, 'Sales'),
(2, 'Finance'),
(3, 'Corporate');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `salary` int(9) NOT NULL,
  `birthdate` date NOT NULL,
  `joining_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `lastname`, `email`, `mobile`, `department_id`, `salary`, `birthdate`, `joining_date`) VALUES
(1, 'Jackson', 'Oliver', 'Jackson@gmail.com', '7878787878', 1, 28000, '1998-12-05', '2021-09-29'),
(2, 'Vincent', 'Ball', 'Vincentball@gmail.com', '8484848484', 2, 8000, '2001-09-16', '2021-08-26'),
(3, 'Hannibal', 'Fernandez', 'Hannibalfernandez@gmail.com', '7878785578', 2, 9500, '2005-02-05', '2021-09-19'),
(4, 'Spike', 'Lambert', 'Spikelambert@gmail.com', '8484848477', 2, 50500, '2004-09-11', '2021-10-26'),
(5, 'Tilda', 'Cannon', 'Tildacannon@gmail.com', '6523415299', 3, 45000, '1997-09-29', '2021-10-21'),
(6, 'Sapphire', 'Henry', 'Sapphirehenry@gmail.com', '9946565854', 3, 9000, '2002-09-21', '2021-08-21'),
(7, 'Larissa', 'Benson', 'Larissabenson@gmail.com', '9856254123', 1, 58000, '1995-09-21', '2021-10-15'),
(8, 'Theodora', 'Abbott', 'Theodoraabbott@gmail.com', '8542536214', 2, 75000, '2003-09-03', '2021-08-05'),
(9, 'Darren', 'Olson', 'Darrenolson@gmail.com', '7546216485', 3, 8500, '1996-09-30', '2021-08-15'),
(10, 'Prunel', 'Weber', 'Prunelweber@gmail.com', '6578542365', 3, 59500, '1999-12-16', '2021-10-05'),
(11, 'test', 'test', 'this@this.com', '7878787878', 2, 28000, '2021-09-14', '2021-09-22'),
(12, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '7683421125', 2, 5555, '2021-09-23', '2021-09-21'),
(13, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '7683421125', 2, 5555, '2021-09-23', '2021-09-21'),
(14, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '7683421125', 2, 5555, '2021-09-23', '2021-09-21'),
(15, 'h', 'h', 'mohitpip@aliya', '7683421125', 3, 36, '2021-09-16', '2021-09-17'),
(17, 'tim tima', 'tima', 'tima@tima', '3333333333', 3, 33, '2021-09-03', '2021-09-03'),
(18, 'mohit', 'pipaliya', 'mohitpip@aliya', '7683421125', 1, 1111, '2021-09-06', '2021-09-30'),
(19, 'mohit', 'pipaliya', 'mohitpip@aliya', '7683421125', 1, 1111, '2021-09-06', '2021-09-30'),
(20, 'mohit', 'pipaliya', 'mohitpip@aliya', '7683421125', 1, 1111, '2021-09-06', '2021-09-30'),
(21, 'mohit', 'pipaliya', 'mohitpip@aliya', '7683421125', 1, 1111, '2021-09-06', '2021-09-30'),
(22, 'mohit', 'pipaliya', 'mohitpip@aliya', '7683421125', 1, 1111, '2021-09-06', '2021-09-30'),
(23, 'mohit', 'pipaliya', 'mohitpip@aliya', '7683421125', 1, 1111, '2021-09-06', '2021-09-30'),
(24, 'mohitt', 'pipaliy', 'mohitpip@ali', '7683421127', 2, 111, '2021-09-09', '2021-09-08'),
(28, 'mohit', 'pipaliya', 'mohitpip@aliya', '7683421125', 1, 1111, '2021-09-06', '2021-09-30'),
(29, 'mohit', 'pipaliya', 'mohitpip@aliya', '7683421125', 1, 1111, '2021-09-06', '2021-09-30'),
(30, 'mohit', 'pipaliya', 'mohitpip@aliya', '7683421125', 1, 1111, '2021-09-06', '2021-09-30'),
(31, 'mohit', 'pipaliya', 'mohitpip@aliya', '7683421125', 1, 1111, '2021-09-06', '2021-09-30'),
(32, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '7683421125', 2, 8775, '2021-09-25', '2021-09-02'),
(33, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '7683421125', 1, 8775, '2021-09-25', '2021-09-02'),
(34, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '7683421125', 2, 42341, '2021-09-23', '2021-09-12'),
(35, 'm', 'h', 'mohitpip@aliya', '7683421125', 2, 100, '2021-09-23', '2021-09-12'),
(46, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '7683421125', 1, -2, '2021-09-03', '2021-09-18'),
(47, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '7683421125', 1, -2, '2021-09-03', '2021-09-18'),
(48, 'mohit', 'pipaliya', 'mohitpip@aliya', '', 1, 2, '2021-09-12', '2021-09-19'),
(49, 'mohit', 'h', 'mohitpip@aliya', '7683421125', 1, 536553, '2021-09-18', '2021-09-19'),
(50, 'mohit', 'pipaliya', 'mohitpip@aliya', '7683421125', 1, 785, '2021-09-16', '2021-09-11'),
(51, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '1425', 1, 1572, '2021-09-17', '2021-09-12'),
(52, 'mohit', 'pipaliya', 'mohitpip@aliya', '7683421125', 1, 56786, '2021-09-12', '2021-09-10'),
(53, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '777777777', 1, 575, '2021-09-11', '2021-09-17'),
(54, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '777777777', 1, 575, '2021-09-11', '2021-09-17'),
(55, 'mohit', 'pipaliya', 'pipaliyamohit4gmail.com', '768342112', 1, 51, '2021-09-19', '2021-09-19'),
(56, 'mohit', 'pipaliya', 'mohitp', '7683421125', 1, 74, '2021-09-11', '2021-09-12'),
(57, 'mohit', 'pipaliya', 'pipaliyamohit4gmail.com', '7683421125', 1, 232543, '2021-09-15', '2021-10-01'),
(58, 'mohit', 'pipaliya', 'pipaliyamohit4gmail.com', '7683421125', 1, 232543, '2021-09-15', '2021-10-01'),
(59, 'mohit', 'pipaliya', 'pipaliyamohit@4gmail.com', '7683421125', 1, 232543, '2021-09-15', '2021-10-01'),
(60, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '7683421125', 1, 3, '2021-09-14', '2021-09-08'),
(61, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '14255555', 1, 45, '2021-09-12', '2021-09-10'),
(62, 'mohit', 'pipaliya', 'mohitpipaliya', '7683421125', 1, 989, '2021-09-19', '2021-09-10'),
(63, 'mohit', 'pipaliya', 'mohitpipaliya', '7683421125', 1, 989, '2021-09-19', '2021-09-10'),
(64, 'mohit', 'pipaliya', 'mohitpipaliya', '7683421125', 1, 989, '2021-09-19', '2021-09-10'),
(65, 'mohit', 'pipaliya', 'mohitpipaliya', '7683421125', 1, 989, '2021-09-19', '2021-09-10'),
(66, 'mohit', 'pipaliya', 'mohitpipaliya', '7683421125', 1, 989, '2021-09-19', '2021-09-10'),
(67, 'mohit', 'pipaliya', 'mohitpip@aliya', '7683421125', 1, 55555, '2021-09-06', '2021-09-17'),
(68, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '7683421125', 1, 333333, '2021-09-19', '2021-09-17'),
(69, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '7683421125', 1, 254, '2021-09-11', '2021-09-19'),
(72, 'mohit', 'pipaliya', '@jsd.com', '7683421125', 1, 6893, '2021-09-08', '2021-09-04'),
(73, 'mohit', 'pipaliya', 'fghgfh@jsd.cm', '7683421125', 1, 566666666, '2021-09-19', '2021-09-26'),
(74, 'mohit', 'pipaliya', 'mohi@tpipaliya.com', '7683421125', 1, 58745, '2021-09-25', '2021-09-16'),
(75, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '768342112', 1, 456, '2021-09-24', '2021-09-12'),
(76, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '768342112', 1, 456, '2021-09-24', '2021-09-12'),
(77, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '44444ggggg', 1, 4756, '2021-09-18', '2021-09-26'),
(78, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '44444ggggg', 1, 4756, '2021-09-18', '2021-09-26'),
(79, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '14255555hh', 1, 56354, '2021-09-19', '2021-10-03'),
(80, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '14255555hh', 1, 56354, '2021-09-19', '2021-10-03'),
(81, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '14255555hh', 1, 56354, '2021-09-19', '2021-10-03'),
(82, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '14255555hh', 1, 56354, '2021-09-19', '2021-10-03'),
(83, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '768342112g', 1, 41614, '2021-09-05', '2021-09-12'),
(84, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '7683421122', 1, 41614, '2021-12-20', '2021-12-20'),
(85, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '768342112g', 1, 41614, '2021-09-05', '2021-09-12'),
(86, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '7683411255', 1, 4756, '2021-09-19', '2021-09-11'),
(87, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '7683421125', 3, 798, '2021-09-12', '2021-09-23'),
(88, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '7683421125', 3, 798, '2021-09-12', '2021-09-23'),
(89, 'mohit', 'pipaliya', 'pipaliyamohit4g@gmail.com', '768342112a', 3, 798, '2021-09-12', '2021-09-23'),
(90, 'dfgfv', 'cvhbvc', 'mm@ff.com', '7777777777', 1, 555, '2021-09-22', '2021-09-24'),
(91, '', 'cfhvfcv', 'hh@gg.com', '7777777777', 1, 45, '2021-09-19', '2021-09-25'),
(92, '', 'cfhv', 'm@gg.com', '7788998989', 1, 654, '2021-09-11', '2021-10-03'),
(93, 'xdf', 'dgf', 'm@jj.com', '4444444444', 1, 2, '2021-09-19', '2021-09-19'),
(94, 'gg', 'g', 'g@gg.gg', '7878787878', 1, 458, '2021-09-25', '2021-09-22'),
(95, 'xdf', 'dgf', 'm@jj.com', '4444444444', 1, 2, '2021-09-19', '2021-09-19'),
(96, 'xdf', 'dgf', 'm@jj.com', '4444444444', 1, 2, '2021-09-19', '2021-09-19'),
(97, 'ggg', 'cc', 'kk@fd.com', '7487878787', 1, 6584546, '2021-10-06', '2021-09-17'),
(98, 'bvnb', 'vb ', 'gg@gfgf.gma', '1352255555', 2, 654, '2021-09-19', '2021-09-22'),
(99, 'dgcdxb', 'xgcx', 'h@k.vom', '454545454a', 1, 4545, '2021-09-18', '2021-10-01'),
(100, 'hngjbn ', 'df', 'll@s.com', '4444444444', 1, 456, '2021-09-03', '2021-09-18'),
(101, 'hngjbn ', 'df', 'll@s.com', '4444444444', 1, 456, '2021-09-03', '2021-09-18'),
(102, 'fghjnmvbmn', 'vvbnbcnvcn', 'd@gmail.com', '7878787878', 1, 7878, '2021-09-02', '2021-09-09'),
(103, 'fd b', 'gxb', 'bh', 'bh', 1, 1235123, '2021-09-23', '2021-09-11'),
(105, 'sd', 'sdf', 'sdf@cv.von', '7777777777', 2, 45000, '2021-09-17', '2021-09-16'),
(106, 'wfds', 'df', 'wegf@sd.dfs', '4555555555', 2, 652, '2021-09-19', '2021-09-19'),
(107, 'sre', 'e', 'er@sd.cf', '4545454545', 3, 6254, '2021-09-22', '2021-09-22'),
(108, 'dg', 'sdgr', 'sgf@ds.cc', '7894656133', 2, 865314, '2021-09-22', '2021-09-22'),
(109, 'cheak date', 'dhgfd', 'rdt@dshf.dgs', '4561230555', 3, 625, '2021-09-22', '2021-09-22'),
(110, 'rt', 'dftu', 'try@fng.fh', '5323232323', 2, 786, '2021-09-22', '2021-12-31'),
(111, 'rvhn', 'frs', 'sg@fb.gh', '7979797979', 3, 78945, '2021-09-02', '2021-09-22'),
(112, 'fj', 'vg', 'stfg@dg.com', '7979977979', 2, 65124, '2021-09-22', '2021-09-22'),
(113, 'dgfh', 'gfh', 'dff@hf.fd', '4646464646', 2, 5786, '2021-09-02', '2021-09-22'),
(114, 'dgfh', 'gfh', 'dff@hf.fd', '4646464646', 2, 5786, '2021-09-02', '2021-09-22'),
(116, 'sdxfg', 'dfg', 'ddv@sf.sdg', '7878787878', 2, 78986, '1010-12-13', '1010-12-13'),
(117, 'sdaf', 'sdf', 'dv@dfb.dfb', '0878787878', 2, 4658, '2021-09-22', '2021-09-22'),
(118, 'sg', 'xvc', 'sdf@ff.ffd', '7878787870', 1, 9863, '2021-09-22', '2021-09-22'),
(119, 'gdh', 'dfgh', 'fgd@dg.dt', '7878787878', 2, 4798, '2021-12-22', '2021-09-22'),
(120, 'gdh', 'dfgh', 'fgd@dg.dt', '7878787878', 2, 4798, '2021-12-22', '2021-09-22'),
(121, 'gdh', 'dfgh', 'fgd@dg.dt', '7878787878', 2, 4798, '2021-12-22', '2021-09-22'),
(122, 'dfty', 'dfy', 'jh@df.ggf', '7878787878', 2, 4978, '2021-11-22', '2021-09-22'),
(123, 'sas', 'asf', 'afd@sa.as', '7878787878', 3, 78963, '2021-12-22', '2021-09-30'),
(124, 'sdv', 'sde', 'sd@dv.sc', '7676767676', 2, 254, '2021-03-31', '2021-09-22'),
(126, 'erg', 'erg', 'werg@vds.wde', '7878787878', 2, 25140, '2012-12-22', '2012-12-22');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
