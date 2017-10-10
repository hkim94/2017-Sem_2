-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2017 at 03:48 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `alertID` int(10) NOT NULL,
  `f_BusID` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `busID` varchar(100) NOT NULL,
  `busno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`busID`, `busno`) VALUES
('12342', '111'),
('3451', '155'),
('56642', '130'),
('56773', '180');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_bus`
--

CREATE TABLE `favourite_bus` (
  `f_BusID` int(10) NOT NULL,
  `busID` varchar(10) NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_stop`
--

CREATE TABLE `favourite_stop` (
  `f_StopID` int(10) NOT NULL,
  `stopNo` int(6) NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gocard`
--

CREATE TABLE `gocard` (
  `gocardno` varchar(20) NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL,
  `balance` decimal(4,2) DEFAULT NULL,
  `conID` varchar(20) DEFAULT NULL,
  `conType` varchar(30) DEFAULT NULL,
  `organisation` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gocard`
--

INSERT INTO `gocard` (`gocardno`, `userID`, `balance`, `conID`, `conType`, `organisation`, `DOB`) VALUES
('4567893425678904', 37, NULL, '34563421568904356', 'senior', 'Centrelink', '1988-12-03'),
('9432145678234678', 29, '23.50', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `userID`) VALUES
('jerry', 'NieQminDE4Ggcewn98nKl3Jhgq7Smn3dLlQ1MyLPswq7njpt8qwsIP4jQ2MR1nhWTQyNMFkwV19g4tPQSBhNeQ==', 29),
('tommy', 'NieQminDE4Ggcewn98nKl3Jhgq7Smn3dLlQ1MyLPswq7njpt8qwsIP4jQ2MR1nhWTQyNMFkwV19g4tPQSBhNeQ==', 37);

-- --------------------------------------------------------

--
-- Table structure for table `stop`
--

CREATE TABLE `stop` (
  `HASTUS_ID` int(6) NOT NULL,
  `TRANSLINK_ID` int(6) NOT NULL,
  `DESCRIPTION` varchar(200) NOT NULL,
  `STREET_NAME` varchar(50) NOT NULL,
  `NEAREST_CROSS_STREET` varchar(50) NOT NULL,
  `EASTING` decimal(6,1) NOT NULL,
  `NORTHING` decimal(7,1) NOT NULL,
  `LATITUDE` decimal(6,6) NOT NULL,
  `LONGITUDE` decimal(6,6) NOT NULL,
  `SUBURB` varchar(50) NOT NULL,
  `BUS_STOP_TYPE` varchar(50) NOT NULL,
  `TACTILE_GROUND_SURF_INDICAT (Y/N)` varchar(10) NOT NULL,
  `BOARDING_POINT` varchar(15) NOT NULL,
  `ROAD_GRADIENT` varchar(15) NOT NULL,
  `CROSS_FALL` varchar(15) NOT NULL,
  `DATE_OF_LAST_AUDIT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stop`
--

INSERT INTO `stop` (`HASTUS_ID`, `TRANSLINK_ID`, `DESCRIPTION`, `STREET_NAME`, `NEAREST_CROSS_STREET`, `EASTING`, `NORTHING`, `LATITUDE`, `LONGITUDE`, `SUBURB`, `BUS_STOP_TYPE`, `TACTILE_GROUND_SURF_INDICAT (Y/N)`, `BOARDING_POINT`, `ROAD_GRADIENT`, `CROSS_FALL`, `DATE_OF_LAST_AUDIT`) VALUES
(1, 306549, 'Herschel St app Nth Quay (r) (Stop 1)', 'HERSCHEL ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(2, 306550, 'Herschel St app Nth Quay (Stop 2)', 'NORTH QUAY', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(3, 306547, 'Turbot St F/S Albert St (Stop 3)', 'TURBOT ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(4, 306512, 'Turbot St F/S Wharf St (Stop 4)', 'Turbot St', 'Wharf St', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Intermediate', 'N', 'Hard', 'Easy', 'Hard', '0000-00-00'),
(5, 306524, 'Ann Street F/S Orient Hotel (Stop 5)', 'Ann St', 'Queen St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Medium', 'Hard', '0000-00-00'),
(6, 306558, 'Ann St app Wharf St (Stop 6)', 'Ann St', 'Creek St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Medium', 'Medium', '0000-00-00'),
(7, 306559, 'Ann St at Anzac Square (Stop 7)', 'Ann St', 'Creek St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(8, 300073, 'Ann St app Edward St (Stop 8)', 'Ann St', 'Edward St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Medium', 'Easy', '0000-00-00'),
(9, 306560, 'Ann St app KGS (Stop 9)', 'Ann St', 'Edward St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Hard', ' ', 'Easy', '0000-00-00'),
(10, 306561, 'Ann St at KGS (Stop 10)', 'Ann St', 'Albert St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Medium', 'Easy', '0000-00-00'),
(11, 306573, 'Ann St Stop 11', 'Ann St', 'George St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'N', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(12, 306558, 'Stop 6A Ann St app Creek St', 'CREEK ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', ' ', '', ' ', ' ', '0000-00-00'),
(14, 701393, 'Ann St @ City Hall Stop 12', 'ADELAIDE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(17, 306585, 'Adelaide St f/s George St (Stop 17)', 'GEORGE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', 'Y', '', ' ', ' ', '0000-00-00'),
(18, 306582, 'Adelaide St at City Hall (Stop 18)', 'Adelaide St', 'George St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Medium', 'Easy', '0000-00-00'),
(19, 307257, 'Adelaide St adj City Hall (Stop 19)', 'Adelaide St', 'Albert St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Premium', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(20, 306580, 'Adelaide St Stop 20 at City Hall', 'Adelaide St', 'Albert St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Premium', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(21, 307255, 'Adelaide St @ Res Bank (Stop 21)', 'Adelaide St', 'Albert St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(22, 307263, 'Adelaide St f/s Res Bank (Stop 22)', 'Adelaide St', 'Albert St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', ' ', 'Medium', '0000-00-00'),
(23, 306591, 'Adelaide St opp DJ''s (Stop 23)', 'Adelaide St', 'Edward St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(24, 306589, 'Adelaide St app Edward St (Stop 24)', 'Adelaide St', 'Edward St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Easy', 'Medium', '0000-00-00'),
(25, 306594, 'Adelaide St F/S Edward St (Stop 25)', 'Adelaide St', 'Edward St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(26, 306595, 'Adelaide St at Anzac Sq (Stop 26)', 'Adelaide St', 'Edward St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(27, 306598, 'Adelaide St F/S Creek St (Stop 27)', 'Adelaide St', 'Creek St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Easy', 'Medium', 'Easy', '0000-00-00'),
(28, 306600, 'Adelaide St app Hutton L (Stop 28)', 'Adelaide St', 'Hutton La', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Medium', 'Easy', '0000-00-00'),
(29, 306521, 'Adelaide St F/S Wharf St (Stop 29)', 'Adelaide St', 'Wharf St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Easy', 'Hard', '0000-00-00'),
(30, 306546, 'Adelaide St @ Macrossan St (St 30)', 'Adelaide St', 'Macrossan', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', '', ' ', ' ', '0000-00-00'),
(31, 307520, 'Creek St app Adelaide St (Stop 149A)', 'CREEK ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', ' ', '', ' ', ' ', '0000-00-00'),
(32, 0, 'Adelaide St - City Glider - (Stop 32)', 'ADELAIDE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(33, 307137, 'Adelaide St app Wharf St (Stop 33)', 'Adelaide St', 'Wharf St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Easy', 'Medium', 'Hard', '0000-00-00'),
(34, 307138, 'Adelaide St Creek St (rear) (Stop 34)', 'Adelaide St', 'Creek St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(35, 306599, 'Adelaide St app Creek St (Stop 35)', 'Adelaide St', 'Creek St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(36, 306597, 'Adelaide St op Anzac Sq (r) (Stop 36)', 'Adelaide St', 'Edward St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Easy', 'Medium', '0000-00-00'),
(37, 306596, 'Adelaide St op Anzac Sq (r) (Stop 37)', 'Adelaide St', 'Edward St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(38, 0, 'Adelaide St f/s Edward St (Stop 38)', 'QUEEN ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(39, 306590, 'Adelaide St Stop 39 at David Jones', 'Adelaide St', 'Edward St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(40, 306593, 'Adelaide St at Broadway (Stop 40)', 'Adelaide St', 'Edward St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Medium', 'Easy', '0000-00-00'),
(41, 307139, 'Adelaide St app Albert St (Stop 41)', 'Adelaide St', 'Albert St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(42, 307178, 'Adelaide St f\\s Albert St (Stop 42)', 'Adelaide St', 'Albert St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(43, 307258, 'Adelaide St opp City Hall (Stop 43)', 'Adelaide St', 'Albert St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(44, 306588, 'Adelaide St opp City Hall (Stop 44)', 'Adelaide St', 'Albert St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(45, 306586, 'Adelaide St opp City Hall (Stop 45)', 'Adelaide St', 'George St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Medium', 'Easy', '0000-00-00'),
(46, 306584, 'Adelaide St opp City Plaza (Stop 46)', 'Adelaide St', 'George St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Medium', 'Easy', '0000-00-00'),
(47, 306585, 'Adelaide St app George St (Stop 47)', 'Adelaide St', 'George St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Medium', 'Medium', '0000-00-00'),
(49, 701642, 'Adelaide St  Stop 31  near Macrossan', 'Adelaide St', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', ' ', '', ' ', ' ', '0000-00-00'),
(50, 0, 'Mary Street Stop 50', 'MARY ST', 'ALBERT ST', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', '3 - Regular with seat', 'Y', 'Easy', 'Medium', 'Easy', '0000-00-00'),
(51, 0, 'Charlotte Street Stop 51', 'CHARLOTTE ST', 'ALBERT ST', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', '4 - Regular', 'Y', 'Easy', 'Easy', 'Medium', '0000-00-00'),
(52, 0, 'Charlotte Street Stop 52', 'CHARLOTTE ST', 'ALBERT ST', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', '4 - Regular', 'Y', 'Easy', 'Easy', 'Medium', '0000-00-00'),
(53, 0, 'Charlotte Street Stop 53', 'CHARLOTTE ST', 'EDWARD ST', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', '3 - Regular with seat', 'Y', 'Easy', '', 'Medium', '0000-00-00'),
(55, 0, 'Post Office Square (Queen St Opposite the G.P.O.)', 'QUEEN ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(56, 306619, 'Queen St F/S Edward St (Stop 56)', 'Queen St', 'Edward St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'N', 'Medium', 'Medium', 'Easy', '0000-00-00'),
(57, 306620, 'Queen St F/S Edward St (Stop 57)', 'Queen St', 'Edward St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Hard', 'Easy', '0000-00-00'),
(58, 306621, 'Queen St F/S Ped Crossing (Stop 58)', 'Queen St', 'Creek St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Easy', 'Easy', 'Medium', '0000-00-00'),
(59, 300074, 'Queen St app Creek St (Stop 59)', 'Queen St', 'Creek St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Easy', 'Easy', 'Medium', '0000-00-00'),
(60, 306603, 'Queen St F/S Creek St (Stop 60)', 'Queen St', 'Creek St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Easy', 'Medium', '0000-00-00'),
(61, 307522, 'Queen St app Wharf St', 'Queen St', 'Wharf St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', 'N', 'Easy', 'Medium', 'Medium', '0000-00-00'),
(62, 0, 'Eagle St f/s Creek St (Stop 62)', 'EAGLE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(63, 0, 'Eagle St app Eagle Lane (Stop 63)', 'EAGLE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Premium', ' ', 'Easy', 'Easy', 'Medium', '0000-00-00'),
(64, 0, 'Eagle St spp Eagle Lane (Stop 64)', 'EAGLE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', ' ', '', ' ', ' ', '0000-00-00'),
(65, 0, 'Eagle St app Queen St (Stop 65)', 'QUEEN ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', ' ', '', ' ', ' ', '0000-00-00'),
(66, 0, 'Queen St app Adelaide St (Stop 66)', 'QUEEN ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(67, 306523, 'Queen St app Ann St (Orient) (St 67)', 'Queen St', 'Ann St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Medium', 'Medium', '0000-00-00'),
(72, 306605, 'Queen St f/s Eagle Lane (stop 72)', 'Queen St', 'Eagle La', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Medium', 'Hard', '0000-00-00'),
(74, 306604, 'Queen St app Creek St (Stop 74)', 'Queen St', 'Creek St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Medium', 'Medium', '0000-00-00'),
(76, 307256, 'Queen St Farside Creek St.', 'Queen St', 'Creek St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'N', 'Easy', 'Medium', 'Medium', '0000-00-00'),
(81, 306628, 'Elizabeth St F/S George St (Stop 81)', 'Elizabeth St', 'George St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Medium', 'Easy', '0000-00-00'),
(82, 306627, 'Elizabeth app Albert St (r) (Stop 82)', 'Elizabeth St', 'Albert St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'N', 'Medium', 'Medium', 'Hard', '0000-00-00'),
(83, 306626, 'Elizabeth St app Albert St (Stop 83)', 'Elizabeth St', 'Albert St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Medium', 'Medium', '0000-00-00'),
(84, 307140, 'Elizabeth St F/S Albert St (Stop 84)', 'Elizabeth St', 'Albert St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'N', 'Easy', 'Medium', 'Medium', '0000-00-00'),
(85, 306625, 'Elizabeth St at Shoe City (Stop 85)', 'Elizabeth St', 'Albert St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'N', 'Easy', 'Easy', 'Easy', '0000-00-00'),
(86, 0, 'Elizabeth St', 'QUEEN ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(87, 306623, 'Elizabeth St app Edward St (Stop 87)', 'Elizabeth St', 'Edward St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(88, 0, 'Elizabeth St far-side Edward St (Stop 88)', 'QUEEN ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(89, 307141, 'Elizabeth St rear of GPO (Stop 89)', 'Albert St', 'Creek St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Easy', 'Hard', '0000-00-00'),
(90, 307253, 'Charlotte St app Market St (Stop 90)', 'Charlotte St', 'Market St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', 'Y', 'Medium', 'Easy', 'Medium', '0000-00-00'),
(91, 307260, 'Charlotte St app George St (Stop 91)', 'Charlotte St', 'George St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', 'Y', 'Medium', 'Hard', 'Medium', '0000-00-00'),
(92, 0, 'Mary St F/S Edward St (stop 92)', 'EDWARD ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(93, 0, 'Alice St app George St (Stop 95A)', 'ALICE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Easy', 'Easy', 'Hard', '0000-00-00'),
(94, 306638, 'Margaret St F/S George St (Stop 94)', 'Margaret St', 'George St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', 'Y', 'Easy', 'Hard', 'Easy', '0000-00-00'),
(95, 306642, 'Alice St app George St (Stop 95)', 'Alice St', 'George St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Easy', 'Hard', 'Hard', '0000-00-00'),
(96, 306643, 'Alice St F/S Edward St (Stop 96)', 'Alice St', 'Edward St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Easy', 'Easy', 'Medium', '0000-00-00'),
(97, 306637, 'Margaret St near Albert St (Stop 97)', 'Margaret St', 'Albert St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', 'Y', 'Medium', 'Easy', 'Hard', '0000-00-00'),
(98, 306612, 'Margaret St F/S Edward St (Stop 98)', 'Margaret St', 'Felix St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', 'Y', 'Medium', 'Easy', 'Hard', '0000-00-00'),
(99, 0, 'City loop Stop Alice St (Stop 96A)', 'ALICE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', ' ', 'Easy', 'Easy', 'Medium', '0000-00-00'),
(100, 0, 'Parliament - Margaret St (Stop 94A)', 'Margaret St', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', 'N', 'Medium', 'Hard', 'Easy', '0000-00-00'),
(106, 0, 'North Quay @ Herschel St (St 106)', 'NORTH QUAY', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(108, 0, 'George St City Precincts (Stop 108)', 'GEORGE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(109, 306564, 'North Quay Island (Stop 109)', 'North Quay', 'Adelaide St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Easy', 'Medium', '0000-00-00'),
(114, 306635, 'George St F/S Alice St (Stop 114)', 'George St', 'Alice St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'N', 'Hard', 'Easy', 'Easy', '0000-00-00'),
(115, 306633, 'George St app Charlotte St (St 115)', 'George St', 'Mary St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Medium', 'Easy', '0000-00-00'),
(116, 0, 'George St app Queen St (Stop 116)', 'QUEEN ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(117, 306575, 'George St app Turbot (r) (Stop 117)', 'George St', 'Turbot St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Easy', 'Medium', '0000-00-00'),
(118, 0, 'George St app Turbot St (Stop 118)', 'GEORGE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(119, 0, 'George St F/S Tank St (Stop 119)', 'GEORGE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(120, 0, 'George St app Herschel St (St 120)', 'GEORGE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(121, 306553, 'Roma St at Police HQ (Stop 121)', 'Roma St', 'Makerston St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Easy', 'Hard', '0000-00-00'),
(122, 306551, 'Roma St app Garrick St (Stop 122)', 'Roma St', 'Garrick St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(123, 306636, 'George St app Alice St (Stop 123)', 'George St', 'Margaret St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'N', 'Medium', 'Easy', 'Hard', '0000-00-00'),
(124, 306552, 'Roma St app Rlwy Stn (r) (Stop 124)', 'Roma St', 'Garrick St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Easy', 'Medium', '0000-00-00'),
(125, 306554, 'Roma St app Transit Cntre (Stop 125)', 'Roma St', 'Markerston St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(126, 0, 'HBL and PRT stop Roma St Station', 'MAKERSTON ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(127, 0, 'Roma St Station', ' ', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(128, 0, 'Roma St Station (OB)', ' ', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(129, 0, 'Albert St app Adelaide St (Stop 129)', 'ADELAIDE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(130, 307254, 'Turbot Street off ramp - 130', 'Magistrates La', 'Roma St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Easy', 'Medium', 'Easy', '0000-00-00'),
(131, 0, 'Wickham Tce @ Lilley St (Stop 131)', 'Wickhan Terrace', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Intermediate', ' ', 'Medium', 'Medium', 'Hard', '0000-00-00'),
(132, 0, 'Wickham Tce @ Gazebo (St 132)', ' ', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(133, 306505, 'Wickham Tce @ Bne Private Hosp (St 133)', 'Wickham Tce', 'Brisbane Private Hospital', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Regular with seat', 'N', 'Medium', 'Hard', 'Hard', '0000-00-00'),
(134, 306506, 'Wickham Tce @ Watkins Place (134)', 'Wickham Tce', 'Bartley St', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Regular with seat', 'N', 'Easy', 'Hard', 'Medium', '0000-00-00'),
(135, 306522, 'Upp Edward St f/s Wickham (St 135)', 'Upper Edward St', 'Wickham Tce', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Intermediate', 'N', 'Hard', 'Medium', 'Hard', '0000-00-00'),
(136, 0, 'Herschell St @ Fitness First', 'NORTH QUAY', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(137, 0, 'Turbot St & Up Edward St @ Jacobs Ladder', 'EDWARD ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(138, 0, 'Roma Street app Ann St (Stop 138)', 'ROMA ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', ' ', '', ' ', ' ', '0000-00-00'),
(139, 0, 'Casino George St f/s Elizabeth St', 'QUEEN ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(140, 306501, 'Upp Edward St @ Wickham (St 140)', 'Upper Edward St', 'Wickham Tce', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Intermediate', 'N', 'Easy', 'Hard', ' ', '0000-00-00'),
(141, 306618, 'Edward St app Ann St (Stop 141)', 'Edward St', 'Ann St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', 'Y', 'Medium', 'Hard', 'Easy', '0000-00-00'),
(142, 306617, 'Edward St F/S Queen St (Stop 142)', 'Edward St', 'Elizabeth St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(143, 306616, 'Edward Street Stop 143 at Elizabeth', 'Edward St', 'Elizabeth St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Hard', 'Easy', 'Easy', '0000-00-00'),
(144, 306615, 'Edward St f/s Elizabeth St (St 144)', 'Edward St', 'Elizabeth St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Medium', 'Hard', '0000-00-00'),
(145, 306614, 'Edward St app Mary St (Stop 145)', 'Edward St', 'Mary St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', 'Y', 'Medium', 'Medium', 'Hard', '0000-00-00'),
(146, 306613, 'Edward St app Margaret St (St 146)', 'Edward St', 'Margaret St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'N', 'Easy', 'Hard', 'Hard', '0000-00-00'),
(147, 0, 'Edward St at Alice St (Stop 147)', ' ', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(148, 306602, 'Riverside Creek St (Stop 148)', 'Creek St', 'Queen St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', 'Y', 'Easy', 'Medium', 'Hard', '0000-00-00'),
(149, 307520, 'Creek St app Adelaide St (Stop 149)', 'Creek St', 'Adelaide St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', 'Y', 'Easy', 'Easy', 'Medium', '0000-00-00'),
(150, 0, 'Riverside Eagle St (Stop 150)', 'EAGLE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(151, 0, 'Eagle St app Eagle Lne (r) (St 151)', 'QUEEN ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(152, 306609, 'Eagle St at Riverside Centre (St 152)', 'Eagle St', 'Eagle La', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', 'N', 'Medium', 'Easy', 'Medium', '0000-00-00'),
(153, 306610, 'Eagle St at Waterfront Pl (Stop 153)', 'Eagle St', 'Charlotte St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular', 'Y', 'Medium', 'Easy', 'Medium', '0000-00-00'),
(155, 306611, 'Eagle St app Charlotte St (Stop 155)', 'Eagle St', 'Charlotte St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(156, 306518, 'Wharf St app Ann St (Stop 156)', 'Wharf St', 'Ann St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Regular with seat', 'Y', 'Medium', 'Medium', 'Easy', '0000-00-00'),
(157, 306516, 'Wickham Tce stand B (Stop 157)', 'Wickham Tce', 'Turbot St', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Regular with seat', 'N', 'Medium', 'Easy', 'Hard', '0000-00-00'),
(158, 306517, 'Wickham Tce stand A (Stop 158)', 'Wickham Tce', 'Turbot St', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Intermediate', 'Y', 'Medium', 'Easy', 'Hard', '0000-00-00'),
(159, 306515, 'Wickham Tce stand C (Stop 159)', 'Wickham Tce', 'Turbot St', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Regular', 'N', 'Medium', 'Easy', 'Hard', '0000-00-00'),
(160, 0, 'Wickham Tce ''D'' (Stop 160)', 'WICKHAM TCE', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', ' ', ' ', 'Medium', 'Medium', 'Hard', '0000-00-00'),
(161, 0, 'Wharf St f/s Ann St', 'ANN ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(162, 306513, 'Wharf St F/S Ann St (Stop 162)', 'Wharf St', 'Turbot St', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Regular with seat', 'Y', 'Medium', 'Easy', 'Hard', '0000-00-00'),
(163, 306510, 'Wharf St app Leichhardt (St 163)', 'Wharf St', 'St Pauls Tce', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Intermediate', 'N', 'Easy', 'Hard', 'Hard', '0000-00-00'),
(164, 0, 'Leichhardt St - The Ridge (Stop 164)', 'LEICHHARDT ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(165, 306471, 'Leichhardt St - The Ridge (Stop 165)', 'Leichardt St', 'Henry St', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Regular with seat', 'N', 'Easy', 'Easy', 'Medium', '0000-00-00'),
(166, 306511, 'Wharf St app Turbot St (Stop 166)', 'Wharf St', 'Turbot St', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Intermediate', 'N', 'Easy', 'Medium', 'Hard', '0000-00-00'),
(167, 0, 'Wharf St fs Astor Terrace', 'WHARF ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(168, 306519, 'Wharf St F/S Adelaide St (Stop 168)', 'Wharf St', 'Rich La', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', 'Intermediate', 'Y', 'Medium', 'Hard', 'Hard', '0000-00-00'),
(172, 306473, 'St Andrews', 'Boundary St', 'Bradley St', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Regular with seat', 'N', 'Easy', 'Medium', 'Hard', '0000-00-00'),
(173, 0, 'Gregory Terrace Zone A turn around', ' ', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(174, 0, 'Albert Park Stop 174', ' ', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(178, 306509, 'Leichhardt Street', 'Little Edward St', 'Leichardt St', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Regular with seat', 'N', 'Medium', 'Hard', 'Medium', '0000-00-00'),
(180, 306472, 'Queensland Transport', 'Boundary St', 'Fortescue St', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Intermediate', 'Y', 'Easy', 'Hard', 'Hard', '0000-00-00'),
(181, 0, 'Windmill/City Sights stop', 'WICKHAM TCE', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', ' ', ' ', 'Medium', 'Hard', 'Hard', '0000-00-00'),
(184, 0, 'Gregory Tce - Zone A turn around', 'GREGORY TCE', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(185, 307429, 'Fortescue Street"""" Spring Hill', 'Fortescue St', 'Boundary St', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Regular', 'N', 'Easy', 'Hard', 'Hard', '0000-00-00'),
(186, 307430, 'Water St"""" Spring Hill', 'Water St', 'Laisby Dr', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Regular', 'N', 'Medium', 'Hard', 'Hard', '0000-00-00'),
(201, 306538, 'Brunswick St @ Alfred St (Stop 201)', 'Brunswick St', 'Alfred St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Regular with seat', 'N', 'Easy', 'Hard', 'Medium', '0000-00-00'),
(202, 307132, 'Brunswick St @ Wickham St (St 202)', 'Brunswick St', 'Wickham St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Regular with seat', 'N', 'Medium', ' ', 'Easy', '0000-00-00'),
(203, 0, 'Warner St fs Wickham (St 203)', 'WARNER ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(204, 300065, 'Warner St mid-block (Stop 204)', 'Warner St', 'Ann St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Intermediate', 'N', 'Medium', 'Easy', 'Medium', '0000-00-00'),
(205, 306533, 'Warner St app Ann St (Stop 205)', 'Warner St', 'Ann St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Premium', 'N', 'Easy', 'Easy', 'Easy', '0000-00-00'),
(206, 306534, 'Ballow St app Ann St (Stop 206)', 'Ballow St', 'Ann St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Intermediate', 'N', 'Easy', 'Medium', 'Hard', '0000-00-00'),
(207, 307133, 'Brunswick St @ McLachlan (207)', 'Brunswick St', 'McLachlan St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Regular with seat', 'Y', 'Easy', 'Medium', ' ', '0000-00-00'),
(210, 0, 'Brunswick St @ Ann St (Stop 210)', 'BRUNSWICK ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(211, 307130, 'Brunswick St f/s Wickham (St 211)', 'Brunswick St', 'Alfred St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Regular with seat', 'N', 'Medium', 'Easy', 'Medium', '0000-00-00'),
(212, 307131, 'Brunswick St @ Alfred St (Stop 212)', 'Brunswick St', 'Alfred St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Regular with seat', 'N', 'Easy', 'Medium', 'Medium', '0000-00-00'),
(215, 0, 'Ann St - Stop 215', 'ANN ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(216, 300066, 'Valley Island (Ann St) (Stop 216)', 'Ann St', 'Gipps St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Intermediate', 'Y', 'Hard', 'Medium', 'Medium', '0000-00-00'),
(217, 306539, 'Valley Island (Ann St) (Stop 217)', 'Ann St', 'Gotha St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Intermediate', 'N', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(218, 306542, 'Ann St - Stop 218', 'Ann St', 'Kemp Pl', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Intermediate', 'N', 'Easy', ' ', 'Hard', '0000-00-00'),
(219, 306540, 'Ann St - Stop 219', 'Ann St', 'Kemp Pl', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Intermediate', 'Y', 'Easy', 'Easy', 'Hard', '0000-00-00'),
(220, 306543, 'Ann St - Stop 220', 'Ann St', 'Dodge La', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Intermediate', 'N', 'Easy', 'Medium', 'Hard', '0000-00-00'),
(221, 0, 'Ann St - Stop 221', 'ANN ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', ' ', ' ', 'Hard', 'Medium', 'Hard', '0000-00-00'),
(222, 0, 'Ann St @ Macrossan (A1) (St 222)', 'QUEEN ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BRISBANE CITY', ' ', ' ', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(225, 306535, 'Wickham St app Little St (Stop 225)', 'Wickham St', 'Little St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Regular with seat', 'N', 'Easy', ' ', 'Hard', '0000-00-00'),
(226, 306537, 'Wickham St app Gotha St (Stop 226)', 'Wickham St', 'Gotha St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Intermediate', 'N', 'Hard', 'Easy', 'Easy', '0000-00-00'),
(227, 306536, 'Wickham St f/s Gotha St (Stop 227)', 'Wickham St', 'Little St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Regular with seat', 'N', 'Medium', 'Easy', 'Medium', '0000-00-00'),
(228, 306531, 'Wickham St f/s Brunswick (St 228)', 'Wickham St', 'Brunswick St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Regular with seat', 'Y', 'Easy', 'Easy', 'Medium', '0000-00-00'),
(229, 0, 'Wickham St @ Warner St (St 229)', 'WICKHAM ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(230, 300067, 'Barry Pde Stop 230 fs Gipps St', 'Barry Pde', 'Gipps St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Regular with seat', 'N', 'Easy', 'Hard', 'Hard', '0000-00-00'),
(231, 306526, 'Gotha St - 231', 'Gotha St', 'Wickham St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Intermediate', 'N', 'Easy', 'Medium', 'Hard', '0000-00-00'),
(232, 300000, 'Fortitude Valley"""" St Paul''s Tce (St 232)', 'St Pauls Tce', 'Amelia St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Intermediate', 'N', 'Easy', 'Easy', 'Medium', '0000-00-00'),
(235, 306499, 'St Pauls Tce app Boundary (St 235)', 'St Pauls Tce', 'Boundary St', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Intermediate', 'N', 'Easy', 'Medium', 'Hard', '0000-00-00'),
(236, 306527, 'Gotha/St Pauls (Stop 236)', 'Gotha St', 'Agnes St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Regular with seat', 'N', 'Easy', 'Hard', 'Hard', '0000-00-00'),
(237, 306494, 'St Pauls Tce app Union (Stop 237)', 'St Pauls Tce', 'Isaac St', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Intermediate', 'N', 'Medium', 'Medium', 'Hard', '0000-00-00'),
(238, 306498, 'St Pauls Terrace (Stop 238)', 'St Pauls Tce', 'Warren St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Intermediate', 'N', 'Hard', 'Hard', 'Medium', '0000-00-00'),
(239, 306495, 'St Pauls Terrace (Stop 239)', 'St Pauls Tce', 'Quarry St', '99999.9', '999999.9', '-0.999999', '0.999999', 'SPRING HILL', 'Regular', 'N', 'Easy', 'Hard', 'Hard', '0000-00-00'),
(240, 306497, 'Fortitude Valley/St Paul''s Terrace (St 240)', 'St Pauls Tce', 'Julia St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Regular', 'N', 'Easy', 'Medium', 'Hard', '0000-00-00'),
(241, 301589, 'Evelyn Street - 10', 'Breakfast Creek Rd', 'Evelyn St', '99999.9', '999999.9', '-0.999999', '0.999999', 'NEWSTEAD', 'Intermediate', 'N', 'Hard', 'Easy', 'Easy', '0000-00-00'),
(242, 0, 'Riverpark - 9', ' ', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'NEWSTEAD', 'Regular with seat', ' ', '', ' ', ' ', '0000-00-00'),
(244, 301562, 'Knapp Street - 8', 'Wickham St', 'Knapp St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Regular with seat', 'N', 'Easy', 'Easy', 'Medium', '0000-00-00'),
(245, 301563, 'Riverpark - 9', 'Breakfast Creek Rd', 'Cowlishaw St', '99999.9', '999999.9', '-0.999999', '0.999999', 'NEWSTEAD', 'Intermediate', 'N', 'Easy', 'Easy', 'Hard', '0000-00-00'),
(246, 301584, 'Evelyn Street - 10', 'Breakfast Creek Rd', 'Evelyn St', '99999.9', '999999.9', '-0.999999', '0.999999', 'NEWSTEAD', 'Intermediate', 'N', 'Easy', 'Easy', 'Hard', '0000-00-00'),
(247, 301585, 'Booroodabin - 11', 'Breakfast Creek Rd', 'Maud St', '99999.9', '999999.9', '-0.999999', '0.999999', 'NEWSTEAD', 'Regular', 'N', 'Hard', 'Easy', 'Hard', '0000-00-00'),
(248, 301586, 'Newstead House - 12', 'Breakfast Creek Rd', 'Halford St', '99999.9', '999999.9', '-0.999999', '0.999999', 'NEWSTEAD', 'Regular with seat', 'N', 'Medium', ' ', 'Easy', '0000-00-00'),
(250, 0, 'Bowen Hills"""" Abbotsford Road', 'FOLKESTONE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BOWEN HILLS', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(251, 0, 'Folkestone Street - 14A', 'FOLKESTONE ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BOWEN HILLS', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(252, 0, 'Folkestone St', 'ABBOTSFORD RD', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'BOWEN HILLS', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(253, 301602, 'Allison Street - 16', 'Abbotsford Rd', 'Allison St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BOWEN HILLS', 'Regular', 'N', '', ' ', ' ', '0000-00-00'),
(256, 301285, 'Allison Street - 16', 'Abbotsford Rd', 'Edmondstone Rd', '99999.9', '999999.9', '-0.999999', '0.999999', 'BOWEN HILLS', 'Regular with seat', 'Y', '', ' ', ' ', '0000-00-00'),
(257, 302360, 'Pickering Bowl - 33', 'Pickering St', 'Bowling St', '99999.9', '999999.9', '-0.999999', '0.999999', 'ENOGGERA', 'Regular', 'Y', 'Easy', 'Easy', 'Easy', '0000-00-00'),
(258, 302367, 'Pickering Bowl - 33', 'Pickering St', 'Bowling St', '99999.9', '999999.9', '-0.999999', '0.999999', 'ENOGGERA', 'Regular', 'Y', 'Easy', 'Easy', 'Hard', '0000-00-00'),
(262, 301604, 'Alexandria Street - 11', 'St Pauls Tce', 'Alexandria St', '99999.9', '999999.9', '-0.999999', '0.999999', 'FORTITUDE VALLEY', 'Intermediate', 'N', 'Easy', 'Medium', 'Easy', '0000-00-00'),
(263, 301284, 'Alexandria Street - 11', 'St Pauls Tce', 'Alexandra St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BOWEN HILLS', 'Regular with seat', 'N', 'Medium', 'Hard', 'Hard', '0000-00-00'),
(265, 301603, 'Montpelier Road - 12/13', 'Abbotsford Rd', 'Edgar St', '99999.9', '999999.9', '-0.999999', '0.999999', 'BOWEN HILLS', 'Intermediate', 'Y', 'Easy', 'Hard', 'Hard', '0000-00-00'),
(266, 304301, 'Auchenflower"""" Coronation Drive', 'Coronation Dr', 'Lang Pde', '99999.9', '999999.9', '-0.999999', '0.999999', 'MILTON', 'Intermediate', 'N', 'Medium', 'Easy', 'Medium', '0000-00-00'),
(267, 304295, 'Auchenflower"""" Coronation Drive', 'Coronation Dr', 'Lang Pde', '99999.9', '999999.9', '-0.999999', '0.999999', 'MILTON', 'Intermediate', 'N', 'Medium', 'Easy', 'Hard', '0000-00-00'),
(268, 304302, 'Park Road - 6', 'Coronation Dr', 'Graham St', '99999.9', '999999.9', '-0.999999', '0.999999', 'MILTON', 'Intermediate', 'N', 'Hard', 'Easy', 'Easy', '0000-00-00'),
(271, 304303, 'Cribb Street"""" Coronation Drive', 'Coronation Dr', 'Park Rd', '99999.9', '999999.9', '-0.999999', '0.999999', 'MILTON', 'Intermediate', 'N', 'Hard', 'Easy', 'Hard', '0000-00-00'),
(272, 0, 'Cribb Street"""" Coronation Drive', ' ', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'MILTON', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(273, 304304, 'Boomerang St"""" Stop 3 Coronation Drive', 'Coronation Dr', 'Cribb St', '99999.9', '999999.9', '-0.999999', '0.999999', 'MILTON', 'Intermediate', 'Y', 'Medium', ' ', 'Easy', '0000-00-00'),
(275, 0, 'Hale Street - 3', ' ', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'MILTON', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(424, 301785, 'Anderson Street - 21', 'Maygar St', 'Anderson St', '99999.9', '999999.9', '-0.999999', '0.999999', 'WINDSOR', 'Regular', 'N', 'Medium', 'Easy', 'Medium', '0000-00-00'),
(425, 301993, 'Anderson Street - 21', 'Maygar St', 'Brook St', '99999.9', '999999.9', '-0.999999', '0.999999', 'WINDSOR', 'Intermediate', 'N', 'Hard', 'Easy', 'Easy', '0000-00-00'),
(426, 0, 'Bank Street - 22', 'MAYGAR ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'WINDSOR', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(427, 0, 'Bank Street - 22', 'MAYGAR ST', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'WINDSOR', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(428, 301787, 'Paling Ave - 23', 'Maygar St', 'Jean St', '99999.9', '999999.9', '-0.999999', '0.999999', 'GRANGE', 'Intermediate', 'N', 'Medium', 'Medium', 'Hard', '0000-00-00'),
(429, 0, 'Paling Ave - 23', 'DAYS RD', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'GRANGE', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(430, 301788, 'Eighth Ave - 24', 'Days Rd', 'Eighth Av', '99999.9', '999999.9', '-0.999999', '0.999999', 'GRANGE', 'Intermediate', 'N', 'Medium', 'Easy', 'Easy', '0000-00-00'),
(431, 0, 'Eighth Ave - 24', 'DAYS RD', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'GRANGE', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(432, 0, 'Uxbridge Street - 25', 'DAYS RD', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'GRANGE', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(433, 0, 'Uxbridge Street - 25', 'DAYS RD', ' ', '99999.9', '999999.9', '-0.999999', '0.999999', 'GRANGE', ' ', ' ', '', ' ', ' ', '0000-00-00'),
(434, 301819, 'Carroll Cr - 25A', 'Days Rd', 'Carroll Cr', '99999.9', '999999.9', '-0.999999', '0.999999', 'GRANGE', 'Regular with seat', 'Y', 'Easy', 'Medium', 'Easy', '0000-00-00'),
(435, 301988, 'Carroll Cr - 25A', 'Days Rd', 'Lanham Av', '99999.9', '999999.9', '-0.999999', '0.999999', 'GRANGE', 'Intermediate', 'Y', 'Easy', 'Easy', 'Medium', '0000-00-00'),
(439, 301994, 'Whish Street - 20', 'Maygar St', 'Whish St', '99999.9', '999999.9', '-0.999999', '0.999999', 'WINDSOR', 'Intermediate', 'N', 'Hard', 'Easy', 'Easy', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) UNSIGNED NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fname`, `lname`, `mobile`, `email`) VALUES
(29, 'Jerry', 'Lee', '0401157894', 'jerry@g.com'),
(37, 'Tom', 'Luisy', '0432567890', 'tom@gm.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`alertID`),
  ADD KEY `f_BusID` (`f_BusID`),
  ADD KEY `f_BusID_2` (`f_BusID`),
  ADD KEY `f_BusID_3` (`f_BusID`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`busID`);

--
-- Indexes for table `favourite_bus`
--
ALTER TABLE `favourite_bus`
  ADD PRIMARY KEY (`f_BusID`),
  ADD KEY `busID` (`busID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `userID_2` (`userID`),
  ADD KEY `busID_2` (`busID`),
  ADD KEY `busno` (`busID`);

--
-- Indexes for table `favourite_stop`
--
ALTER TABLE `favourite_stop`
  ADD PRIMARY KEY (`f_StopID`),
  ADD KEY `stopNo` (`stopNo`),
  ADD KEY `userID` (`userID`),
  ADD KEY `stopNo_2` (`stopNo`),
  ADD KEY `userID_2` (`userID`);

--
-- Indexes for table `gocard`
--
ALTER TABLE `gocard`
  ADD PRIMARY KEY (`gocardno`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `userid` (`userID`) USING BTREE;

--
-- Indexes for table `stop`
--
ALTER TABLE `stop`
  ADD PRIMARY KEY (`HASTUS_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `alertID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `favourite_bus`
--
ALTER TABLE `favourite_bus`
  MODIFY `f_BusID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `favourite_stop`
--
ALTER TABLE `favourite_stop`
  MODIFY `f_StopID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourite_bus`
--
ALTER TABLE `favourite_bus`
  ADD CONSTRAINT `favourite_bus_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `favourite_bus_ibfk_2` FOREIGN KEY (`busID`) REFERENCES `bus` (`busID`);

--
-- Constraints for table `favourite_stop`
--
ALTER TABLE `favourite_stop`
  ADD CONSTRAINT `favourite_stop_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `favourite_stop_ibfk_2` FOREIGN KEY (`stopNo`) REFERENCES `stop` (`HASTUS_ID`);

--
-- Constraints for table `gocard`
--
ALTER TABLE `gocard`
  ADD CONSTRAINT `gocard_ibfk_4` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `abc_fk` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
