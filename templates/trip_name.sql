-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 02:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `static_pages`
--

-- --------------------------------------------------------

--
-- Table structure for table `trip_name`
--

CREATE TABLE `trip_name` (
  `uid` int(4) NOT NULL,
  `place` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip_name`
--

INSERT INTO `trip_name` (`uid`, `place`) VALUES
(1, 'Hampi'),
(2, 'Haridwar'),
(3, 'Kerala Backwaters'),
(4, 'Lakshadeep Island'),
(5, 'Pushkar Fair'),
(6, 'Varanasi Ghats'),
(7, 'Cheraman Juma Masjid'),
(8, 'Jama Mosque'),
(9, 'Mecca Masjid'),
(10, 'Old Juma Masjid'),
(11, 'Ziarat Shareef'),
(12, 'Adina Masjid'),
(13, ' Charminar'),
(14, 'Ajanta Ellora'),
(15, 'Charminar'),
(16, 'Fatehpur Sikri'),
(17, 'Gateway of India'),
(18, 'Humayun\'s Tomb'),
(19, 'India Gate'),
(20, 'Qutub Minar'),
(21, 'Taj Mahal'),
(22, 'Basilica of Bom Jesus'),
(23, 'Chapel of St. Catherine'),
(24, 'Gundala Church'),
(25, 'Holy Trinity Church'),
(26, 'Our Lady of the Rosary\'s Church'),
(27, 'Reis Magos Church'),
(28, 'St. Joseph\'s Cathedral'),
(29, 'St. Francis of Assissi\'s Church'),
(30, 'St. Mary\'s Church'),
(31, 'The Cross of Miracles\'s Church'),
(32, 'The Sacred Heart\'s Church'),
(33, 'Adventure Islands'),
(34, 'Entertainment City'),
(35, 'Essel World'),
(36, 'Fun n Food Village'),
(37, 'Gujarat Science City'),
(38, 'Kingdom of Dreams'),
(39, 'Nicco Park'),
(40, 'Ocean Park'),
(41, 'Veega Land'),
(42, 'Wonder La'),
(43, 'Baba Amarnath Temple'),
(44, 'Golden Temple'),
(45, 'Lord Jagannath Temple'),
(46, 'Kashi Vishwanath Temple'),
(47, 'Khajuraho Temples'),
(48, 'Konark Sun Temple'),
(49, 'Ranakpur Jain Temples'),
(50, 'Shri Meenakshi - Sundareshwarar Temple'),
(51, 'Siddhivinayak Temple'),
(52, 'Somnath Temple'),
(53, 'Thanjavur Temple'),
(54, 'Venkataswara Tirupati Balaji Templ'),
(55, 'Brindavan Garden'),
(56, 'Chambal Garden'),
(57, 'Chashme Shahi Garden'),
(58, 'Indian Botanical Garden'),
(59, 'Lal Bagh Gardens'),
(60, 'Lodhi Garden Mughal Gardens'),
(61, 'Pinjore Garden'),
(62, 'Rock Garden'),
(63, 'Shalimar Bagh'),
(64, 'Alisagar Deer Park'),
(65, 'Bandhavgarh National Park'),
(66, 'Bori Wildlife Sanctuary'),
(67, 'Gir National Park and Sanctuary'),
(68, 'Hazaribagh Sanctuary'),
(69, 'Kaziranga National Park'),
(70, 'Manas Wildlife Sanctuary'),
(71, 'Keoladeo National Park'),
(72, 'Nanda Devi National Park'),
(73, 'Sundarbans National Par'),
(74, 'Barehipani Waterfalls'),
(75, 'Dudhsagar Waterfalls'),
(76, 'Jog Waterfalls'),
(77, 'Jonha Waterfalls'),
(78, 'Kunchikal Waterfalls'),
(79, 'Kune Waterfalls'),
(80, 'Langshiang Waterfalls'),
(81, 'Meenmutty Waterfalls'),
(82, 'Nohkalikai Waterfalls'),
(83, 'Shivanasamudra Waterfalls'),
(84, 'Chandratal Lake'),
(85, 'Dal Lake'),
(86, 'Hussain Sagar Lake'),
(87, 'Loktak Lake'),
(88, 'Osman Sagar Lake'),
(89, 'Pushkar Lake'),
(90, 'Roopkund Lake'),
(91, 'Vembanad Lake'),
(92, 'Wular Lake'),
(93, 'Bhimtal Lake'),
(94, 'Chilka Lake'),
(95, 'Dal Lake'),
(96, 'Darjeeling'),
(97, 'Dehradun'),
(98, 'Gangtok'),
(99, 'Kodaikanal'),
(100, 'Kullu and Manali'),
(101, 'Mount Abu'),
(102, 'Mussoorie'),
(103, 'Ooty'),
(104, 'Shillong'),
(105, 'Shimla'),
(106, 'Srinagar'),
(107, 'Agra Fort'),
(108, 'Amber Fort'),
(109, 'Chittorgarh Fort'),
(110, 'Fort William'),
(111, 'Golconda Fort'),
(112, 'Jaisalmer Fort'),
(113, 'Kangra Fort'),
(114, 'Red Fort or Lal Qila'),
(115, 'Qila Mubarak'),
(116, 'Ranthambhore Fort'),
(117, 'Bir Singh Palace'),
(118, 'Chail Palace'),
(119, 'Jaipur City Palace'),
(120, 'Jaivilas Palace'),
(121, 'Jal Mahal'),
(122, 'Lake Palace'),
(123, 'Lalgarh Palace'),
(124, 'Salim Singh ki Haveli'),
(125, 'Udaipur City Palace'),
(126, 'Umaid Bhawan Palace'),
(127, 'Lonavala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trip_name`
--
ALTER TABLE `trip_name`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trip_name`
--
ALTER TABLE `trip_name`
  MODIFY `uid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
