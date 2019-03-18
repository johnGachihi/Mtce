-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 06:22 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maintenance`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `activity_name`) VALUES
(1, 'Inspection'),
(2, 'Testing'),
(3, 'Servicing'),
(4, 'Repair'),
(5, 'Installation'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `airport_id` int(11) NOT NULL,
  `airport_name` varchar(45) NOT NULL,
  `airport_icao` varchar(45) DEFAULT NULL,
  `airport_iata` varchar(45) DEFAULT NULL,
  `airportcol` varchar(45) DEFAULT NULL,
  `airportcol1` varchar(45) DEFAULT NULL,
  `airportcol2` varchar(45) DEFAULT NULL,
  `airportcol3` varchar(45) DEFAULT NULL,
  `airportcol4` varchar(45) DEFAULT NULL,
  `airportcol5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `component_id` int(11) NOT NULL,
  `component_name` varchar(255) DEFAULT NULL,
  `facility_id` int(11) DEFAULT NULL,
  `mtce_freq` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`component_id`, `component_name`, `facility_id`, `mtce_freq`) VALUES
(1, 'Generator 1 - SSB', 1, 'D'),
(2, 'Generator 2 - SSB', 1, 'D'),
(3, 'Generator 3 - SSA', 1, 'W'),
(4, 'Generator 4 - SSC', 1, 'W'),
(5, 'Other', 1, NULL),
(6, 'CCR', 8, 'M'),
(7, 'Primary Cables', 8, 'H'),
(8, 'Secondary Cables', 8, 'H'),
(9, 'Transformers', 8, 'H'),
(10, 'Runway Lights', 8, 'D'),
(11, 'Approach Lights', 8, 'W'),
(12, 'PAPI', 8, 'D'),
(13, 'Threshold/End Lights', 8, 'D'),
(14, 'Taxiway Lights', 8, 'D'),
(15, 'Apron Lights', 8, 'M'),
(16, 'Wind Sock', 8, 'W'),
(17, 'AGL SCADA', 8, 'M'),
(18, 'Buldings Lighting', 21, 'D'),
(19, 'Streetlighting', 21, 'D'),
(20, 'Carparks Lighting', 21, 'D'),
(21, 'MV Switchgear', 25, 'M'),
(22, 'MV Cables', 25, 'Y'),
(23, 'MV Transformers', 25, 'Y'),
(24, 'MV SCADA', 25, NULL),
(25, 'Others', 25, NULL),
(26, 'Substation UPS', 21, NULL),
(27, 'Fans', 21, NULL),
(28, 'Sockets', 21, NULL),
(29, 'Bay 3', 34, NULL),
(30, 'Bay 4', 34, NULL),
(31, 'Bay 5', 34, NULL),
(32, 'Extensions', 49, NULL),
(33, 'Telephone Cables', 49, NULL),
(34, 'Check-in Eqpt', 50, NULL),
(35, 'Cabin Luggage', 50, NULL),
(36, 'Hand Held', 52, NULL),
(37, 'Mobile Radios', 52, NULL),
(38, 'Base Radios', 52, NULL),
(39, 'Antennae', 52, NULL),
(40, 'Hand Held', 50, NULL),
(41, 'Walkthrough', 50, NULL),
(42, 'Speakers', 51, NULL),
(43, 'Microphones', 51, NULL),
(44, 'Cables', 51, NULL),
(45, 'Management System', 51, NULL),
(46, 'Generator 1 - SSB', 36, NULL),
(47, 'Detectors', 77, 'M'),
(48, 'Control Panel', 77, 'M'),
(49, 'Call Points', 77, 'M'),
(50, 'Sounders', 77, 'M'),
(51, 'Mercedes Benz Fire 3', 87, NULL),
(52, 'Mercedes Benz Fire 5', 87, NULL),
(53, 'Renault Sides GKU005 Fire 6', 87, NULL),
(54, 'Command Car KBG095C', 91, NULL),
(55, 'Ambulance KBT 230N', 91, NULL),
(56, 'KCP 178K', 91, NULL),
(57, 'KCP 186K', 91, NULL),
(58, 'KCP 179K', 91, NULL),
(59, 'KCP 103K', 91, NULL),
(60, 'KBU 797T', 91, NULL),
(61, 'KBU 047T', 91, NULL),
(62, 'KBT 373N', 91, NULL),
(63, 'KAV 308V Follow Me', 91, NULL),
(64, 'KBN 814E Bird Scout', 91, NULL),
(65, 'KBL 382G', 91, NULL),
(66, 'KAL 062L Tractor', 104, NULL),
(67, 'KAG 957 Tipper', 104, NULL),
(68, 'Grader', 104, NULL),
(69, 'Ravo Sweeper', 104, NULL),
(70, 'Air Compressor', 104, NULL),
(71, 'PABX Equipment', 49, NULL),
(72, 'T1 Arrivals Belt 1', 35, NULL),
(73, 'T1 Arrivals Belt 2', 35, NULL),
(74, 'T1 Departure Line 1', 35, NULL),
(75, 'T1 Departure Line 2', 35, NULL),
(76, 'T2 Departure', 35, NULL),
(77, 'Runwat 03/26', 119, NULL),
(78, 'Runway 15/33', 119, NULL),
(79, 'Taxiway A', 120, NULL),
(80, 'Taxiway B', 120, NULL),
(81, 'Taxiway C', 120, NULL),
(82, 'Taxiway D', 120, NULL),
(83, 'Taxiway E', 120, NULL),
(84, 'Taxiway F', 120, NULL),
(85, 'Taxiway K', 120, NULL),
(86, 'Taxiway L', 120, NULL),
(87, 'Taxiway M', 120, NULL),
(88, 'Apron 1', 121, NULL),
(89, 'Apron 2', 121, NULL),
(90, 'Airside', 122, NULL),
(91, 'Landside', 122, NULL),
(92, 'Airside', 123, NULL),
(93, 'Landside', 123, NULL),
(94, 'Boundary', 124, NULL),
(95, 'Security', 124, NULL),
(96, 'Gates 1-13', 125, NULL),
(97, 'Int, Arrivals', 111, NULL),
(98, 'Domestic Arrivals', 111, NULL),
(99, 'Int. Departures', 111, NULL),
(100, 'Domestic Departure', 111, NULL),
(101, 'Arrivals', 112, NULL),
(102, 'Departures', 112, NULL),
(103, 'Offices', 112, NULL),
(104, 'All Areas', 113, NULL),
(105, 'All Areas', 114, NULL),
(106, 'Substation A', 115, NULL),
(107, 'Substation B', 115, NULL),
(108, 'Substation C', 115, NULL),
(109, 'Water Distribution', 116, NULL),
(110, 'Plumbing', 116, NULL),
(111, 'Airside', 117, NULL),
(112, 'Landside', 117, NULL),
(113, 'Senior Staff (Nyole Est.)', 118, NULL),
(114, 'Junior Staff', 118, NULL),
(115, 'Roads', 126, NULL),
(116, 'Car Parks', 126, NULL),
(117, 'ATC', 53, NULL),
(118, 'Substation B', 53, NULL),
(119, 'Substation A', 53, NULL),
(120, 'Substation C', 53, NULL),
(121, 'Generator 2 - SSB', 36, NULL),
(122, 'Generator 3 - SSA', 36, NULL),
(123, 'Generator 4 - SSC', 36, NULL),
(124, 'Pumps', 37, NULL),
(125, 'Piping', 37, NULL),
(126, 'Storage', 37, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` int(11) NOT NULL,
  `facility_name` varchar(45) NOT NULL,
  `section_id` int(2) NOT NULL,
  `mtce_freq` varchar(2) DEFAULT NULL,
  `facilitiescol1` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `facilitiescol2` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `facilitiescol3` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `facilitiescol4` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `facilitiescol5` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facility_id`, `facility_name`, `section_id`, `mtce_freq`, `facilitiescol1`, `facilitiescol2`, `facilitiescol3`, `facilitiescol4`, `facilitiescol5`) VALUES
(1, 'Generators', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'AGL', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'General Lighting & Power', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Power Distribution', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Passenger Boarding Bridges', 5, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Baggage Handling Eqpt', 5, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Generators', 5, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Water Pumping', 5, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Air Conditioners', 5, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Lifts', 5, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Escalators', 5, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'PABX', 4, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Screening Eqpt', 4, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Public Address System', 4, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Radios', 4, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'AGL SCADA', 4, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'Fire Alarm System', 4, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'Fire Trucks', 6, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'Utility Vehicles', 6, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'Plant & Equipment', 6, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'Terminal 1', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'Terminal 2', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'General Aviation', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'Fire Station', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'Substations', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'Water Supply', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'Sewage System', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'Staff Houses', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'Runways', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'Taxiways', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'Aprons', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'Airside Access Roads', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'Drainage Systems', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'Fences', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'Crash Gates', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'Landside Roads', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'Environment', 2, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(2) NOT NULL,
  `section_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`) VALUES
(1, 'Buildings'),
(2, 'Civil'),
(3, 'Electrical'),
(4, 'Electronics'),
(5, 'Electro-Mechanical'),
(6, 'Mechanical');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(2) NOT NULL,
  `staff_name` varchar(45) NOT NULL,
  `section_id` int(2) NOT NULL,
  `staff_user` varchar(45) DEFAULT NULL,
  `staff_pw` varchar(45) NOT NULL DEFAULT 'pw',
  `staff_lv` int(2) NOT NULL DEFAULT '1',
  `pers_number` int(11) DEFAULT NULL,
  `staffcol` varchar(45) DEFAULT NULL,
  `staffcol1` varchar(45) DEFAULT NULL,
  `staffscol2` varchar(45) DEFAULT NULL,
  `staffcol3` varchar(45) DEFAULT NULL,
  `staffcol4` varchar(45) DEFAULT NULL,
  `staffcol5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `section_id`, `staff_user`, `staff_pw`, `staff_lv`, `pers_number`, `staffcol`, `staffcol1`, `staffscol2`, `staffcol3`, `staffcol4`, `staffcol5`) VALUES
(1, 'Andrew Maina', 4, 'andrew.maina', 'zz', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Charles Ndone', 3, 'charles.ndone', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Daniel Asibiko', 6, 'daniel.asibiko', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Daniel Bonyo', 4, 'daniel.bonyo', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Daniel Kichwen', 1, 'daniel.kichwen', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'David Chikanda', 6, 'david.chikanda', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Eugene Juma', 5, 'eugene.juma', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Francis Malingu', 3, 'francis.malingu', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Geofrey Gathura', 3, 'geofrey.gathura', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'James Ndua', 2, 'james.ndua', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'John Mzawai', 3, 'john.mzawai', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Jonathan Ndula', 1, 'jonathan.ndula', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Joseph Kimonyi', 4, 'joseph.kimonyi', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Joseph Talam', 3, 'joseph.talam', 'pw', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Joshua Kimilu', 3, 'joshua.kimilu', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Josphat Kiplimo', 3, 'josphat.kiplimo', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Julius Muteka', 2, 'julius.muteka', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Juma Hassan', 3, 'juma.hassan', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Keith Kirwa', 5, 'keth.kirwa', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Kennedy Nyaga', 3, 'kenneth.nyaga', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Mbuthia Njoroge', 5, 'mbuthia.njoroge', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Mwijaa  Kombo', 1, 'mwijaa.kombo', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Patrick Ndubi', 1, 'patrick.ndubi', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Samwel Onduso', 6, 'samwel.onduso', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Samwel Rimba', 5, 'samwel.rimba', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Seth Oogo', 5, 'seth.oogo', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Stephen Korugari', 5, 'stephen.korugari', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Weldon Ngeno', 4, 'weldon.ngeno', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Wesley Wanjala', 6, 'wesley.wanjala', 'pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Owen Waithaka', 0, 'owen.waithaka', 'pw', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `facility_id` int(2) DEFAULT NULL,
  `task_name` varchar(45) NOT NULL,
  `task_result` varchar(45) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `facility_avail` int(3) DEFAULT NULL,
  `taskscol` varchar(45) DEFAULT NULL,
  `taskscol1` varchar(45) DEFAULT NULL,
  `taskscol2` varchar(45) DEFAULT NULL,
  `taskscol3` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `facility_id`, `task_name`, `task_result`, `date_time`, `facility_avail`, `taskscol`, `taskscol1`, `taskscol2`, `taskscol3`) VALUES
(1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'ble', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_activity_mapper`
--

CREATE TABLE `task_activity_mapper` (
  `task_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_activity_mapper`
--

INSERT INTO `task_activity_mapper` (`task_id`, `activity_id`) VALUES
(1, 3),
(2, 1),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(5, 1),
(5, 3),
(6, 4),
(7, 4),
(8, 1),
(8, 2),
(14, 1),
(14, 3),
(14, 5),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(16, 1),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 1),
(20, 5),
(20, 6),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(21, 5),
(21, 6),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(22, 5),
(22, 6),
(23, 1),
(23, 2),
(23, 3),
(23, 4),
(23, 5),
(23, 6),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(24, 5),
(24, 6),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(26, 3),
(27, 1),
(27, 2),
(27, 3),
(28, 1),
(29, 2),
(30, 2),
(30, 3),
(30, 4),
(31, 1),
(31, 2),
(32, 2),
(32, 3),
(32, 6),
(33, 3),
(34, 4),
(35, 2),
(36, 2),
(37, 2),
(38, 6),
(39, 2),
(40, 2),
(41, 1),
(41, 2),
(42, 2),
(42, 3),
(42, 4),
(43, 2),
(43, 3),
(43, 4),
(44, 1),
(44, 2),
(44, 3),
(45, 2),
(45, 3),
(45, 4),
(46, 2),
(46, 3),
(46, 4),
(47, 2),
(47, 3),
(47, 4),
(47, 5),
(47, 6),
(48, 2),
(48, 3),
(49, 6),
(50, 5),
(50, 6),
(51, 3),
(51, 4),
(52, 3),
(52, 4),
(53, 3),
(53, 4),
(54, 3),
(54, 4),
(55, 3),
(55, 4),
(56, 3),
(56, 4),
(57, 3),
(57, 4),
(58, 6),
(59, 1),
(60, 2),
(61, 5),
(61, 6);

-- --------------------------------------------------------

--
-- Table structure for table `task_reports`
--

CREATE TABLE `task_reports` (
  `task_Id` int(11) NOT NULL,
  `facility_Id` int(3) NOT NULL,
  `component_Id` int(3) NOT NULL,
  `message` text NOT NULL,
  `availability` int(3) NOT NULL,
  `user_Id` int(2) NOT NULL,
  `date_inserted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_reports`
--

INSERT INTO `task_reports` (`task_Id`, `facility_Id`, `component_Id`, `message`, `availability`, `user_Id`, `date_inserted`) VALUES
(1, 8, 9, 'Ok', 100, 14, '2018-10-16 14:01:13'),
(2, 1, 2, 'Serviceable', 100, 14, '2018-10-16 19:38:47'),
(3, 34, 41, 'sdfasdf qer tqert agdfg sdfgsdfg sdfgsdfg sdfgsdfg sdfgsdfg ', 100, 26, '2018-10-18 10:41:37'),
(4, 91, 94, 'sdfadsfasd asdfasdf adfgafg dsfgsdf', 100, 3, '2018-10-30 20:35:56'),
(5, 8, 15, 'Relamping and calibration', 100, 18, '2018-11-29 11:59:23'),
(6, 50, 65, 'Repaired a faulty screening machine for international departures.', 90, 28, '2018-11-29 12:14:57'),
(7, 50, 65, 'Faulty screening machine for int departures was repaired', 90, 28, '2018-11-29 12:17:44'),
(8, 1, 2, 'asdf', 12, 2, '2019-01-07 10:46:51'),
(9, 1, 2, 'asdf', 12, 2, '2019-01-07 12:22:05'),
(14, 1, 2, 'asdfgg', 12, 2, '2019-01-07 12:51:57'),
(15, 37, 181, 'asdfghjkl', 1, 7, '2019-01-07 17:33:01'),
(16, 1, 2, 'ble', 1, 7, '2019-01-09 23:06:33'),
(17, 1, 2, '1', 1, 2, '2019-01-09 23:23:10'),
(18, 1, 2, '12', 122, 2, '2019-01-10 11:20:15'),
(19, 1, 2, '12', 122, 2, '2019-01-10 12:19:09'),
(20, 8, 9, 'Did somethings.', 1, 2, '2019-01-10 15:10:55'),
(21, 21, 24, 'Did things', 1, 2, '2019-01-10 16:18:49'),
(22, 25, 29, 'Checked MV SCADA', 90, 2, '2019-01-11 14:46:36'),
(23, 8, 10, 'Checked MV SCADA', 90, 2, '2019-01-11 14:53:43'),
(24, 8, 10, 'Checked MV SCADA', 90, 2, '2019-01-11 14:53:48'),
(25, 25, 26, 'Worked on power distribution', 12, 2, '2019-01-11 16:13:57'),
(26, 21, 31, 'Worked on substation UPS', 12, 2, '2019-01-11 16:16:33'),
(27, 21, 31, 'Worked on substation UPS', 12, 2, '2019-01-11 16:18:55'),
(28, 8, 9, '12334', 12, 2, '2019-01-11 16:21:06'),
(29, 8, 9, '1', 1, 2, '2019-01-11 16:25:02'),
(30, 8, 9, '1', 1, 2, '2019-01-11 16:28:19'),
(31, 8, 9, '1', 1, 2, '2019-01-11 16:33:56'),
(32, 1, 2, '1', 1, 2, '2019-01-11 16:35:40'),
(33, 1, 2, 'servicing', 12, 2, '2019-01-11 16:38:12'),
(34, 21, 22, 'e', 8, 2, '2019-01-11 16:40:26'),
(35, 1, 2, 'k', 0, 2, '2019-01-11 16:44:40'),
(36, 1, 2, 'k', 0, 2, '2019-01-11 16:47:28'),
(37, 1, 2, 'asd', 11, 2, '2019-01-11 16:49:08'),
(38, 1, 2, 'k', 0, 2, '2019-01-11 17:10:55'),
(39, 1, 2, 'sdf', 0, 2, '2019-01-11 17:51:59'),
(40, 1, 2, 'sdf', 0, 2, '2019-01-11 17:53:09'),
(41, 1, 2, '12', 12, 2, '2019-01-11 18:10:28'),
(42, 1, 2, 'ssdf', 0, 2, '2019-01-11 18:48:46'),
(43, 1, 2, 'ssdfadfadfasdfasfdasdfasdfafdsadsf asdfadfasdf', 0, 2, '2019-01-11 18:49:12'),
(44, 1, 3, 'Worked on the generator', 100, 2, '2019-01-11 18:52:45'),
(45, 1, 2, 'Testing servicing repair', 123, 2, '2019-01-11 21:06:23'),
(46, 1, 2, '1234', 123455, 2, '2019-01-11 21:12:02'),
(47, 8, 9, '2345', 123455, 2, '2019-01-11 21:14:20'),
(48, 1, 2, 'adsf', 0, 2, '2019-01-11 21:16:50'),
(49, 1, 2, '6', 12, 2, '2019-01-11 21:18:55'),
(50, 21, 22, 'hamalalalalhalahalahalhal', 20, 2, '2019-01-11 21:23:11'),
(51, 87, 88, 'Serviced and repaired Mercedes Benz Fire Â£', 100, 3, '2019-01-11 21:31:55'),
(52, 87, 88, 'ble ble ble', 100, 3, '2019-01-12 09:20:35'),
(53, 91, 92, 'Servicing and repair on command car kbg 095c', 100, 3, '2019-01-12 10:13:37'),
(54, 104, 107, 'Serviced and repaired the grader.', 70, 3, '2019-01-12 10:32:21'),
(55, 104, 107, 'Serviced and repaired the grader.', 70, 3, '2019-01-12 10:32:58'),
(56, 104, 107, 'Serviced and repaired the grader.', 70, 3, '2019-01-12 10:39:28'),
(57, 87, 90, 'Servicing Repair ', 100, 3, '2019-01-12 10:52:44'),
(58, 104, 108, 'Did other', 100, 3, '2019-01-12 10:54:55'),
(59, 87, 88, 'Inspected', 100, 3, '2019-01-12 11:34:34'),
(60, 1, 3, 'asdf', 12, 2, '2019-02-24 11:05:34'),
(61, 8, 6, 'Did this and that.', 100, 2, '2019-02-24 11:22:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`airport_id`),
  ADD UNIQUE KEY `airport_id_UNIQUE` (`airport_id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`component_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`),
  ADD UNIQUE KEY `facilities_id_UNIQUE` (`facility_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`),
  ADD UNIQUE KEY `section_id_UNIQUE` (`section_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `idtechnicians_UNIQUE` (`staff_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD UNIQUE KEY `task_id_UNIQUE` (`task_id`);

--
-- Indexes for table `task_activity_mapper`
--
ALTER TABLE `task_activity_mapper`
  ADD KEY `task_id` (`task_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `task_reports`
--
ALTER TABLE `task_reports`
  ADD PRIMARY KEY (`task_Id`),
  ADD UNIQUE KEY `taskId_UNIQUE` (`task_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `airport_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task_reports`
--
ALTER TABLE `task_reports`
  MODIFY `task_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task_activity_mapper`
--
ALTER TABLE `task_activity_mapper`
  ADD CONSTRAINT `task_activity_mapper_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task_reports` (`task_Id`),
  ADD CONSTRAINT `task_activity_mapper_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`activity_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
