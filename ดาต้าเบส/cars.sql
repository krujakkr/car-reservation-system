-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2025 at 03:45 PM
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
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminpr`
--

CREATE TABLE `adminpr` (
  `idadmin` int(11) NOT NULL,
  `uadmin` varchar(20) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `padmin` varchar(20) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `uname` varchar(50) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `adminpr`
--

INSERT INTO `adminpr` (`idadmin`, `uadmin`, `padmin`, `uname`, `status`) VALUES
(1, 'admin', 'admin', 'อภิสิทธิ์ เปี่ยมน้อย', 1),
(2, 'user1', 'user1', 'ทดสอบ', 1),
(3, 'user2', 'user2', 'กรรมการ', 1),
(1, 'admin', 'admin', 'อภิสิทธิ์ เปี่ยมน้อย', 1),
(2, 'user1', 'user1', 'ทดสอบ', 1),
(3, 'user2', 'user2', 'กรรมการ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `object` varchar(255) NOT NULL DEFAULT '',
  `locate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `timego` datetime NOT NULL DEFAULT current_timestamp(),
  `timeback` datetime DEFAULT NULL,
  `typecar` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `driver` varchar(10) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=tis620 COLLATE=tis620_thai_ci PACK_KEYS=0;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `name`, `object`, `locate`, `timego`, `timeback`, `typecar`, `driver`) VALUES
(6, 'นายสุวิชัย  โกศัยยะวัฒน์', 'ศึกษาดูงาน', 'ศึกษาดูงาน', '2010-12-14 12:30:00', '2010-12-14 18:00:00', '40-0770', 'ภิญโญ'),
(3, 'สำนักคอมพิวเตอร์', 'โครงการอบรมสัมมนาจัดทำแผน/ตัวชี้วัด', 'โรงแรมอิงธาร รีสอร์ท จ.นครนายก', '2010-12-17 06:00:00', '2010-12-17 21:30:00', '40-0770', 'ภิญโญ'),
(0, 'นายจักรพงษ์ แผ่นทอง', 'ทดสอบ', 'ดีมาก', '2025-08-16 15:49:00', '2025-08-22 15:49:00', 'นค7118', 'ภิญโญ'),
(0, 'นายธีรภัทร์', 'ไปขนนักเรียน', 'กทม', '2025-08-16 15:57:00', '2025-08-26 15:57:00', '40-0770', 'ภิญโญ'),
(5, 'นส.กชนุช  เจริญผล', 'ประชุมเปลี่ยนแบบแปลนคณะศึกษา', 'วสท. กทม.', '2010-12-07 14:30:00', '2010-12-07 21:00:00', 'รถเช่า', 'เช่า');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
