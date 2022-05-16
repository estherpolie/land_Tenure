-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 02:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `land_tenure`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `appId` int(11) NOT NULL,
  `infrastracture_category` text NOT NULL,
  `description` text NOT NULL,
  `investor_id` int(11) NOT NULL,
  `parcel_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`appId`, `infrastracture_category`, `description`, `investor_id`, `parcel_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hotel', 'i need to build hotel', 1, 1047, 'Recorded', '2021-06-07', NULL),
(3, 'School', 'ukfhf', 1, 1047, 'Approved', '2021-06-07', '2021-06-10'),
(4, 'School', 'urwi wieruwi werwgiei wiegriw wiegrwue uwegriw', 6, 1020, 'Paid', '2021-06-10', '2021-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `cell`
--

CREATE TABLE `cell` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cell`
--

INSERT INTO `cell` (`id`, `name`, `sector`) VALUES
(1010101, 'Akabahizi', 10101),
(1010102, 'Akabeza', 10101),
(1010103, 'Gacyamo', 10101),
(1010104, 'Kigarama', 10101),
(1010105, 'Kinyange', 10101),
(1010106, 'Kora', 10101),
(1010201, 'Nyamweru', 10102),
(1010202, 'Nzove', 10102),
(1010203, 'Taba', 10102),
(1010301, 'Kigali', 10103),
(1010302, 'Mwendo', 10103),
(1010303, 'Nyabugogo', 10103),
(1010304, 'Ruriba', 10103),
(1010305, 'Rwesero', 10103),
(1010401, 'Kamuhoza', 10104),
(1010402, 'Katabaro', 10104),
(1010403, 'Kimisagara', 10104),
(1010501, 'Kankuba', 10105),
(1010502, 'Kavumu', 10105),
(1010503, 'Mataba', 10105),
(1010504, 'Ntungamo', 10105),
(1010505, 'Nyarufunzo', 10105),
(1010506, 'Nyarurenzi', 10105),
(1010507, 'Runzenze', 10105),
(1010601, 'Amahoro', 10106),
(1010602, 'Kabasengerezi', 10106),
(1010603, 'Kabeza', 10106),
(1010604, 'Nyabugogo', 10106),
(1010605, 'Rugenge', 10106),
(1010606, 'Tetero', 10106),
(1010607, 'Ubumwe', 10106),
(1010701, 'Munanira I', 10107),
(1010702, 'Munanira Ii', 10107),
(1010703, 'Nyakabanda I', 10107),
(1010704, 'Nyakabanda Ii', 10107),
(1010801, 'Cyivugiza', 10108),
(1010802, 'Gasharu ', 10108),
(1010803, 'Mumena', 10108),
(1010804, 'Rugarama', 10108),
(1010901, 'Agatare', 10109),
(1010902, 'Biryogo', 10109),
(1010903, 'Kiyovu', 10109),
(1010904, 'Rwampara', 10109),
(1011001, 'Kabuguru I', 10110),
(1011002, 'Kabuguru Ii', 10110),
(1011003, 'Rwezamenyo I', 10110),
(1011004, 'Rwezamenyo Ii', 10110),
(1020101, 'Kinyaga', 10201),
(1020102, 'Musave', 10201),
(1020103, 'Mvuzo', 10201),
(1020104, 'Ngara', 10201),
(1020105, 'Nkuzuzu', 10201),
(1020106, 'Nyabikenke', 10201),
(1020107, 'Nyagasozi', 10201),
(1020201, 'Karuruma', 10202),
(1020202, 'Nyamabuye ', 10202),
(1020203, 'Nyamugari', 10202),
(1020301, 'Gasagara', 10203),
(1020302, 'Gicaca', 10203),
(1020303, 'Kibara', 10203),
(1020304, 'Munini ', 10203),
(1020305, 'Murambi', 10203),
(1020401, 'Musezero ', 10204),
(1020402, 'Ruhango', 10204),
(1020501, 'Akamatamu', 10205),
(1020502, 'Bweramvura', 10205),
(1020503, 'Kabuye', 10205),
(1020504, 'Kidashya', 10205),
(1020505, 'Ngiryi', 10205),
(1020601, 'Agateko', 10206),
(1020602, 'Buhiza ', 10206),
(1020603, 'Muko', 10206),
(1020604, 'Nkusi', 10206),
(1020605, 'Nyabuliba', 10206),
(1020606, 'Nyakabungo', 10206),
(1020607, 'Nyamitanga', 10206),
(1020701, 'Kamatamu ', 10207),
(1020702, 'Kamutwa', 10207),
(1020703, 'Kibaza', 10207),
(1020801, 'Kamukina', 10208),
(1020802, 'Kimihurura', 10208),
(1020803, 'Rugando', 10208),
(1020901, 'Bibare', 10209),
(1020902, 'Kibagabaga', 10209),
(1020903, 'Nyagatovu ', 10209),
(1021001, 'Gacuriro', 10210),
(1021002, 'Gasharu', 10210),
(1021003, 'Kagugu', 10210),
(1021004, 'Murama', 10210),
(1021101, 'Bwiza ', 10211),
(1021102, 'Cyaruzinge', 10211),
(1021103, 'Kibenga', 10211),
(1021104, 'Masoro', 10211),
(1021105, 'Mukuyu', 10211),
(1021106, 'Rudashya', 10211),
(1021201, 'Butare', 10212),
(1021202, 'Gasanze', 10212),
(1021203, 'Gasura', 10212),
(1021204, 'Gatunga', 10212),
(1021205, 'Muremure', 10212),
(1021206, 'Sha', 10212),
(1021207, 'Shango', 10212),
(1021301, 'Nyabisindu', 10213),
(1021302, 'Nyarutarama', 10213),
(1021303, 'Rukiri I', 10213),
(1021304, 'Rukiri Ii', 10213),
(1021401, 'Bisenga', 10214),
(1021402, 'Gasagara', 10214),
(1021403, 'Kabuga I', 10214),
(1021404, 'Kabuga Ii', 10214),
(1021405, 'Kinyana', 10214),
(1021406, 'Mbandazi', 10214),
(1021407, 'Nyagahinga', 10214),
(1021408, 'Ruhanga', 10214),
(1021501, 'Gasabo', 10215),
(1021502, 'Indatemwa', 10215),
(1021503, 'Kabaliza', 10215),
(1021504, 'Kacyatwa', 10215),
(1021505, 'Kibenga', 10215),
(1021506, 'Kigabiro', 10215);

-- --------------------------------------------------------

--
-- Table structure for table `claim`
--

CREATE TABLE `claim` (
  `claimId` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` text NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `claim`
--

INSERT INTO `claim` (`claimId`, `person_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'i didn\'t get payment for my land with parcel id 1047 please help me to get paid', 'Solved', '2021-06-09', '2021-06-09'),
(3, 2, 'hello i need help from you', 'Solved', '2021-06-10', '2021-06-10'),
(4, 2, 'hello i need help', 'Not Solved', '2021-06-14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`) VALUES
(100, 'NYARUGENGE'),
(101, 'GASABO'),
(102, 'KICUKIRO');

-- --------------------------------------------------------

--
-- Table structure for table `engineer`
--

CREATE TABLE `engineer` (
  `engineerId` int(11) NOT NULL,
  `workAddress` text NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `engineer`
--

INSERT INTO `engineer` (`engineerId`, `workAddress`, `person_id`) VALUES
(1, 'Gasabo', 4);

-- --------------------------------------------------------

--
-- Table structure for table `investor`
--

CREATE TABLE `investor` (
  `investorId` int(11) NOT NULL,
  `nationality` text NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE `land` (
  `id` int(11) NOT NULL,
  `national_id` varchar(16) NOT NULL,
  `upi` varchar(30) NOT NULL,
  `address` int(11) NOT NULL,
  `parcel_id` int(11) NOT NULL,
  `area` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `land`
--

INSERT INTO `land` (`id`, `national_id`, `upi`, `address`, `parcel_id`, `area`) VALUES
(1, '1199480097143101', '1/02/08/01/1047', 101010102, 1047, 3825),
(2, '1199480097143102', '1/02/08/01/1000', 101010103, 1000, 3000),
(3, '1199480097143103', '1/02/08/01/1001', 101010104, 1001, 3001),
(4, '1199480097143104', '1/02/08/01/1002', 101010105, 1002, 3002),
(5, '1199480097143105', '1/02/08/01/1003', 101010106, 1003, 3003),
(6, '1199480097143106', '1/02/08/01/1004', 101010107, 1004, 3004),
(7, '1199480097143107', '1/02/08/01/1005', 101010108, 1005, 3005),
(8, '1199480097143108', '1/02/08/01/1006', 101010109, 1006, 3006),
(9, '1199480097143109', '1/02/08/01/1007', 101010110, 1007, 3007),
(10, '1199480097143110', '1/02/08/01/1008', 101010111, 1008, 3008),
(11, '1199480097143111', '1/02/08/01/1009', 101010112, 1009, 3009),
(12, '1199480097143112', '1/02/08/01/1010', 101010113, 1010, 3010),
(13, '1199480097143113', '1/02/08/01/1011', 101010114, 1011, 3011),
(14, '1199480097143114', '1/02/08/01/1012', 101010115, 1012, 3012),
(15, '1199480097143115', '1/02/08/01/1013', 101010116, 1013, 3013),
(16, '1199480097143116', '1/02/08/01/1014', 101010117, 1014, 3014),
(17, '1199480097143117', '1/02/08/01/1015', 101010118, 1015, 3015),
(18, '1199480097143118', '1/02/08/01/1016', 101010119, 1016, 3016),
(19, '1199480097143119', '1/02/08/01/1017', 101010120, 1017, 3017),
(20, '1199480097143120', '1/02/08/01/1018', 101010121, 1018, 3018),
(21, '1199480097143121', '1/02/08/01/1019', 101010122, 1019, 3019),
(22, '1199480097143122', '1/02/08/01/1020', 101010123, 1020, 3020),
(23, '1199480097143123', '1/02/08/01/1021', 101010124, 1021, 3021),
(24, '1199480097143124', '1/02/08/01/1022', 101010125, 1022, 3022),
(25, '1199480097143125', '1/02/08/01/1023', 101010126, 1023, 3023),
(26, '1199480097143126', '1/02/08/01/1024', 101010126, 1024, 3024),
(27, '1199480097143127', '1/02/08/01/1025', 101010127, 1025, 3025),
(28, '1199480097143128', '1/02/08/01/1026', 101010128, 1026, 3026),
(29, '1199480097143129', '1/02/08/01/1027', 101010129, 1027, 3027),
(30, '1199480097143130', '1/02/08/01/1028', 101010130, 1028, 3028);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(11) NOT NULL,
  `application_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `personId` int(11) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` int(11) NOT NULL,
  `userType` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL,
  `nationalId` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `passportId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`personId`, `firstName`, `lastName`, `email`, `phone`, `gender`, `address`, `userType`, `status`, `nationalId`, `password`, `passportId`) VALUES
(1, 'baraka', 'christian', 'mukunzichristian@gmail.com', '0782634752', 'Male', 0, 'Investor', 'Active', '19946633465676778787887', '123', ''),
(2, 'babu', 'faustin', 'babu@gmail.com', '0782708003', 'Male', 0, 'Holder', 'Active', '1199480097143101', '123', ''),
(3, 'samu', 'iradukunda', 'sam@gmail.com', '0788701615', 'Male', 0, 'Investor', 'Active', '1199356453222317654432', '123', ''),
(4, 'sando', 'ishimwe', 'sando@gmail.com', '0784849987', 'Female', 0, 'User', 'Active', '119973454565', '123', ''),
(5, 'jojo', 'ketty', 'jojo@gmail.com', '078203236', 'Female', 0, 'Admin', 'Active', '1120003432322', '123', ''),
(6, 'polie', 'esther', 'polie@gmail.com', '0783436264', 'Female', 0, 'Investor', 'Active', '134343535353535', '0000', ''),
(7, 'bebe', 'ineza', 'babe@gmail.com', '07820876874', 'Female', 0, 'Investor', 'Active', '201823434323222212', '123', '201823434323222212');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `propertyId` int(11) NOT NULL,
  `propertyName` varchar(30) NOT NULL,
  `description` longtext NOT NULL,
  `amount` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`propertyId`, `propertyName`, `description`, `amount`, `application_id`, `person_id`, `created_at`, `updated_at`) VALUES
(1, 'house', 'this parcel have a house build with block and so on...', 30000, 3, 4, '2021-06-08', NULL),
(3, 'house', 'a sdhjadva jahdajsh ajhdjas jashvhda', 15000, 4, 4, '2021-06-10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `district` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`id`, `name`, `district`) VALUES
(10101, 'Gitega', 101),
(10102, 'Kanyinya', 101),
(10103, 'Kigali', 101),
(10104, 'Kimisagara', 101),
(10105, 'Mageragere', 101),
(10106, 'Muhima', 101),
(10107, 'Nyakabanda', 101),
(10108, 'Nyamirambo', 101),
(10109, 'Nyarugenge', 101),
(10110, 'Rwezamenyo', 101),
(10201, 'Bumbogo', 102),
(10202, 'Gatsata', 102),
(10203, 'Gikomero', 102),
(10204, 'Gisozi', 102),
(10205, 'Jabana', 102),
(10206, 'Jali', 102),
(10207, 'Kacyiru', 102),
(10208, 'Kimihurura', 102),
(10209, 'Kimironko', 102),
(10210, 'Kinyinya', 102),
(10211, 'Ndera', 102),
(10212, 'Nduba', 102),
(10213, 'Remera', 102),
(10214, 'Rusororo', 102),
(10215, 'Rutunga', 102),
(10301, 'Gahanga', 103),
(10302, 'Gatenga', 103),
(10303, 'Gikondo', 103),
(10304, 'Kagarama', 103),
(10305, 'Kanombe', 103),
(10306, 'Kicukiro', 103),
(10307, 'Kigarama', 103),
(10308, 'Masaka', 103),
(10309, 'Niboye', 103),
(10310, 'Nyarugunga', 103);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `taskId` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`taskId`, `person_id`, `application_id`, `created_at`, `updated_at`) VALUES
(1, 4, 3, '2021-06-07', NULL),
(2, 4, 3, '2021-06-10', NULL),
(3, 4, 4, '2021-06-10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `cell` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`id`, `name`, `cell`) VALUES
(101010102, 'Gihanga', 1010101),
(101010103, 'Iterambere', 1010101),
(101010104, 'Izuba', 1010101),
(101010105, 'Nyaburanga', 1010101),
(101010106, 'Nyenyeri', 1010101),
(101010107, 'Ubukorikori', 1010101),
(101010108, 'Ubumwe', 1010101),
(101010109, 'Ubwiyunge', 1010101),
(101010110, 'Umucyo', 1010101),
(101010111, 'Umurabyo', 1010101),
(101010112, 'Umuseke', 1010101),
(101010113, 'Vugizo', 1010101),
(101010201, 'Akinyambo', 1010102),
(101010202, 'Amayaga', 1010102),
(101010203, 'Gitwa', 1010102),
(101010204, 'Ituze', 1010102),
(101010205, 'Mpazi', 1010102),
(101010301, 'Amahoro', 1010103),
(101010302, 'Impuhwe', 1010103),
(101010303, 'Intsinzi', 1010103),
(101010304, 'Kivumu', 1010103),
(101010305, 'Ubumwe', 1010103),
(101010306, 'Urukundo', 1010103),
(101010307, 'Ururembo', 1010103),
(101010401, 'Ingenzi', 1010104),
(101010402, 'Sangwa', 1010104),
(101010403, 'Umubano', 1010104),
(101010404, 'Umucyo', 1010104),
(101010405, 'Umuhoza', 1010104),
(101010406, 'Umurava', 1010104),
(101010501, 'Akabugenewe', 1010105),
(101010502, 'Ihuriro', 1010105),
(101010503, 'Isangano', 1010105),
(101010504, 'Isano', 1010105),
(101010505, 'Karitasi', 1010105),
(101010506, 'Ubumanzi', 1010105),
(101010507, 'Uburezi', 1010105),
(101010508, 'Ubwiza', 1010105),
(101010509, 'Umucyo', 1010105),
(101010510, 'Umwembe', 1010105),
(101010511, 'Urugano', 1010105),
(101010601, 'Isangano', 1010106),
(101010602, 'Kanunga', 1010106),
(101010603, 'Kinyambo', 1010106),
(101010604, 'Kivumu', 1010106),
(101010605, 'Kora', 1010106),
(101010606, 'Mpazi', 1010106),
(101010607, 'Rugano', 1010106),
(101010608, 'Rugari', 1010106),
(101010609, 'Ubumwe', 1010106),
(101020101, 'Bwimo', 1010201),
(101020102, 'Gatare', 1010201),
(101020103, 'Mubuga', 1010201),
(101020104, 'Nyakirambi', 1010201),
(101020105, 'Nyamweru', 1010201),
(101020106, 'Ruhengeri', 1010201),
(101020201, 'Bibungo', 1010202),
(101020202, 'Bwiza ', 1010202),
(101020203, 'Gateko', 1010202),
(101020204, 'Kagasa', 1010202),
(101020205, 'Nyabihu', 1010202),
(101020206, 'Rutagara I', 1010202),
(101020207, 'Rutagara Ii', 1010202),
(101020208, 'Ruyenzi', 1010202),
(101020301, 'Kagaramira', 1010203),
(101020302, 'Ngendo', 1010203),
(101020303, 'Nyarurama', 1010203),
(101020304, 'Nyarusange', 1010203),
(101020305, 'Rwakivumu', 1010203),
(101020306, 'Taba', 1010203),
(101030101, 'Akirwanda', 1010301),
(101030102, 'Gisenga', 1010301),
(101030103, 'Kadobogo', 1010301),
(101030104, 'Kagarama', 1010301),
(101030105, 'Kibisogi', 1010301),
(101030106, 'Muganza', 1010301),
(101030107, 'Murama', 1010301),
(101030108, 'Rubuye', 1010301),
(101030109, 'Ruhango', 1010301),
(101030110, 'Ryasharangabo', 1010301),
(101030201, 'Agakomeye', 1010302),
(101030202, 'Akagugu', 1010302),
(101030203, 'Amahoro', 1010302),
(101030204, 'Amajyambere', 1010302),
(101030205, 'Birambo', 1010302),
(101030206, 'Isangano', 1010302),
(101030207, 'Kanyabami', 1010302),
(101030208, 'Karambo', 1010302),
(101030209, 'Mwendo', 1010302),
(101030210, 'Ruhuha', 1010302),
(101030211, 'Ubuzima', 1010302),
(101030212, 'Umutekano', 1010302),
(101030301, 'Gakoni', 1010303),
(101030302, 'Gatare', 1010303),
(101030303, 'Giticyinyoni', 1010303),
(101030304, 'Kadobogo', 1010303),
(101030305, 'Kamenge', 1010303),
(101030306, 'Karama', 1010303),
(101030307, 'Kiruhura', 1010303),
(101030308, 'Nyabikoni', 1010303),
(101030309, 'Nyabugogo', 1010303),
(101030310, 'Ruhondo', 1010303),
(101030401, 'Misibya', 1010304),
(101030402, 'Nyabitare', 1010304),
(101030403, 'Ruhango', 1010304),
(101030404, 'Ruharabuge', 1010304),
(101030405, 'Ruriba', 1010304),
(101030406, 'Ruzigimbogo', 1010304),
(101030407, 'Ryamakomari', 1010304),
(101030408, 'Tubungo', 1010304),
(101030501, 'Akanyamirambo', 1010305),
(101030502, 'Akinama', 1010305),
(101030503, 'Makaga', 1010305),
(101030504, 'Musimba', 1010305),
(101030505, 'Ruhogo', 1010305),
(101030506, 'Rwesero', 1010305),
(101030507, 'Rweza', 1010305),
(101030508, 'Vuganyana', 1010305),
(101040101, 'Buhoro', 1010401),
(101040102, 'Busasamana', 1010401),
(101040103, 'Isimbi', 1010401),
(101040104, 'Ituze', 1010401),
(101040105, 'Karama', 1010401),
(101040106, 'Karwarugabo', 1010401),
(101040107, 'Kigabiro', 1010401),
(101040108, 'Mataba', 1010401),
(101040109, 'Munini', 1010401),
(101040110, 'Ntaraga', 1010401),
(101040111, 'Nunga', 1010401),
(101040112, 'Rurama', 1010401),
(101040113, 'Rutunga', 1010401),
(101040114, 'Tetero', 1010401),
(101040201, 'Akamahoro', 1010402),
(101040202, 'Akishinge', 1010402),
(101040203, 'Akishuri', 1010402),
(101040204, 'Amahumbezi', 1010402),
(101040205, 'Inganzo', 1010402),
(101040206, 'Kigarama', 1010402),
(101040207, 'Mpazi', 1010402),
(101040208, 'Mugina', 1010402),
(101040209, 'Ubumwe', 1010402),
(101040210, 'Ubusabane', 1010402),
(101040211, 'Umubano', 1010402),
(101040212, 'Umurinzi', 1010402),
(101040213, 'Uruyange', 1010402),
(101040301, 'Akabeza', 1010403),
(101040302, 'Amahoro', 1010403),
(101040303, 'Birama', 1010403),
(101040304, 'Buhoro', 1010403),
(101040305, 'Bwiza ', 1010403),
(101040306, 'Byimana', 1010403),
(101040307, 'Gakaraza', 1010403),
(101040308, 'Gaseke', 1010403),
(101040309, 'Ihuriro', 1010403),
(101040310, 'Inkurunziza', 1010403),
(101040311, 'Karambi', 1010403),
(101040312, 'Kigina', 1010403),
(101040313, 'Kimisagara ', 1010403),
(101040314, 'Kove', 1010403),
(101040315, 'Muganza', 1010403),
(101040316, 'Nyabugogo', 1010403),
(101040317, 'Nyagakoki', 1010403),
(101040318, 'Nyakabingo ', 1010403),
(101040319, 'Nyamabuye', 1010403),
(101040320, 'Sangwa', 1010403),
(101040321, 'Sano', 1010403),
(101050101, 'Kamatamu', 1010501),
(101050102, 'Kankuba', 1010501),
(101050103, 'Karukina', 1010501),
(101050104, 'Musave', 1010501),
(101050105, 'Nyarumanga', 1010501),
(101050106, 'Rugendabari', 1010501),
(101050201, 'Ayabatanga', 1010502),
(101050202, 'Kankurimba', 1010502),
(101050203, 'Kavumu', 1010502),
(101050204, 'Mubura', 1010502),
(101050205, 'Murondo', 1010502),
(101050206, 'Nyakabingo', 1010502),
(101050207, 'Nyarubuye', 1010502),
(101050301, 'Burema', 1010503),
(101050302, 'Gahombo', 1010503),
(101050303, 'Kabeza', 1010503),
(101050304, 'Karambi', 1010503),
(101050305, 'Kwisanga', 1010503),
(101050306, 'Mageragere', 1010503),
(101050307, 'Mataba', 1010503),
(101050308, 'Rushubi', 1010503),
(101050401, 'Akanakamageragere', 1010504),
(101050402, 'Gatovu', 1010504),
(101050403, 'Nyabitare', 1010504),
(101050404, 'Nyarubande', 1010504),
(101050405, 'Rubungo', 1010504),
(101050406, 'Rwindonyi', 1010504),
(101050501, 'Akabungo', 1010505),
(101050502, 'Akamashinge', 1010505),
(101050503, 'Maya', 1010505),
(101050504, 'Nyarufunzo', 1010505),
(101050505, 'Nyarurama', 1010505),
(101050506, 'Rubete', 1010505),
(101050601, 'Amahoro', 1010506),
(101050602, 'Ayabaramba', 1010506),
(101050603, 'Gikuyu', 1010506),
(101050604, 'Iterambere', 1010506),
(101050605, 'Nyabirondo', 1010506),
(101050606, 'Nyarurenzi', 1010506),
(101050701, 'Gisunzu', 1010507),
(101050702, 'Mpanga', 1010507),
(101050703, 'Nkomero', 1010507),
(101050704, 'Runzenze', 1010507),
(101050705, 'Uwurugenge', 1010507),
(101060101, 'Amahoro', 1010601),
(101060102, 'Amizero', 1010601),
(101060103, 'Inyarurembo', 1010601),
(101060104, 'Kabirizi', 1010601),
(101060105, 'Ubuzima', 1010601),
(101060106, 'Uruhimbi', 1010601);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`appId`);

--
-- Indexes for table `claim`
--
ALTER TABLE `claim`
  ADD PRIMARY KEY (`claimId`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engineer`
--
ALTER TABLE `engineer`
  ADD PRIMARY KEY (`engineerId`);

--
-- Indexes for table `investor`
--
ALTER TABLE `investor`
  ADD PRIMARY KEY (`investorId`);

--
-- Indexes for table `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`personId`),
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD UNIQUE KEY `phone` (`phone`) USING HASH;

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`propertyId`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`taskId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `appId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `claim`
--
ALTER TABLE `claim`
  MODIFY `claimId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `engineer`
--
ALTER TABLE `engineer`
  MODIFY `engineerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `investor`
--
ALTER TABLE `investor`
  MODIFY `investorId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `personId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `propertyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `taskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
