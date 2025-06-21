-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 08:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yureka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `admin_Name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_Name`, `email`, `password`) VALUES
(1, 'vivek', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventid` int(100) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `event_cid` int(255) NOT NULL,
  `event_type_id` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `winner_Regno` varchar(255) NOT NULL,
  `runner_Regno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`, `ename`, `event_cid`, `event_type_id`, `gender`, `winner_Regno`, `runner_Regno`) VALUES
(1, '100mts', 1, '1', 'Male and Female', 'YBC17158', 'MCM18123'),
(2, 'free style', 2, '3', 'Male and Female', 'MCM18123', 'ybc17151');

-- --------------------------------------------------------

--
-- Table structure for table `event_coordinator`
--

CREATE TABLE `event_coordinator` (
  `event_cid` int(100) NOT NULL,
  `Coname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_coordinator`
--

INSERT INTO `event_coordinator` (`event_cid`, `Coname`, `email`, `password`, `phoneno`) VALUES
(1, 'chandana', 'chandana@gmail.com', '123', '1234567890'),
(2, 'geethanjali', 'geethanjali@gmail.com', '123', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `event_type_id` int(100) NOT NULL,
  `event_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`event_type_id`, `event_type_name`) VALUES
(1, 'sports(Individual)'),
(2, 'sports(Group)'),
(3, 'dance(Individual)');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `id` int(255) NOT NULL,
  `Reg_no` varchar(255) NOT NULL,
  `eventid` int(255) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`id`, `Reg_no`, `eventid`, `status`) VALUES
(1, 'YBC17158', 1, 1),
(2, 'YBC17158', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `pono` int(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`pono`, `photo`) VALUES
(2, 'poster_photos/1660843788328.jpeg'),
(3, 'poster_photos/1660843797558.jpeg'),
(4, 'poster_photos/1660843808362.jpeg'),
(5, 'poster_photos/1660843816615.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `Reg_no` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `sem` int(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `college` varchar(255) NOT NULL,
  `cource` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `Reg_no`, `name`, `email`, `gender`, `password`, `photo`, `sem`, `phone`, `college`, `cource`) VALUES
(1, 'YBC17158', 'Vivek R Venkatesh', 'vivekrvenkatesh96@gmail.com', 'Male', '123', 'student_photos/1660492654317.jpg', 2, '9480208270', 'yuvarajs college of mysore', 'bca'),
(2, 'ybc17151', 'shreyas', 'shreyas@gmail.com', 'Male', '123', 'student_photos/1660492724233.jpg', 2, '1234567890', 'yuvarajas college of mysore', 'BCA'),
(3, 'MCM18123', 'Harsha', 'harsha@gmail.com', 'Male', '123', 'student_photos/1660492765311.jpg', 4, '123456789', 'MAHARAJA INSTITUTE OF TECHNOLOGY MYSORE', 'mca'),
(5, 'YBC17160', 'chandana', 'chandana1@gmail.com', 'Female', '123', 'student_photos/1660674998936.jpg', 2, '123456789', 'yuvarajas college of mysore', 'bca'),
(6, 'qw12334', 'abc', 'abc@gmail.com', 'Male', '123', 'student_photos/1660675055364.jpg', 2, '2435678', 'yuvarajas college of mysore', 'bca'),
(7, '1', 'Chaithra R', 'EXAMPL@GMAIL.COM', 'Male', '123', 'student_photos/1660847106950.jpg', 2, '1234567789', 'yuvarajas college of mysore', 'BCA'),
(8, '12', 'Yashwanth Rao.T', 'v96@gmail.com', 'Male', '123', 'student_photos/1660847218631.jpg', 2, '1234567890', 'yuvarajas college of mysore', 'mca');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v1`
-- (See below for the actual view)
--
CREATE TABLE `v1` (
`eventid` int(100)
,`ename` varchar(255)
,`event_type_id` varchar(255)
,`event_type_name` varchar(255)
,`Reg_no` varchar(11)
,`name` varchar(255)
,`sem` int(255)
,`college` varchar(255)
,`phone` varchar(10)
,`photo` varchar(255)
,`status` int(255)
,`email` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v2`
-- (See below for the actual view)
--
CREATE TABLE `v2` (
`eventid` int(100)
,`ename` varchar(255)
,`event_type_id` varchar(255)
,`event_type_name` varchar(255)
,`Reg_no` varchar(11)
,`name` varchar(255)
,`sem` int(255)
,`college` varchar(255)
,`phone` varchar(10)
,`photo` varchar(255)
,`status` int(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v3`
-- (See below for the actual view)
--
CREATE TABLE `v3` (
`eventid` int(100)
,`ename` varchar(255)
,`event_type_id` varchar(255)
,`event_type_name` varchar(255)
,`Reg_no` varchar(11)
,`name` varchar(255)
,`sem` int(255)
,`phone` varchar(10)
,`status` int(255)
,`Coname` varchar(255)
,`email` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v4`
-- (See below for the actual view)
--
CREATE TABLE `v4` (
`ename` varchar(255)
,`winner_Regno` varchar(255)
,`runner_Regno` varchar(255)
,`name` varchar(255)
,`photo` varchar(255)
,`college` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v7`
-- (See below for the actual view)
--
CREATE TABLE `v7` (
`ename` varchar(255)
,`event_type_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v8`
-- (See below for the actual view)
--
CREATE TABLE `v8` (
`ename` varchar(255)
,`event_type_name` varchar(255)
,`event_type_id` int(100)
);

-- --------------------------------------------------------

--
-- Structure for view `v1`
--
DROP TABLE IF EXISTS `v1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v1`  AS   (select `e`.`eventid` AS `eventid`,`e`.`ename` AS `ename`,`e`.`event_type_id` AS `event_type_id`,`et`.`event_type_name` AS `event_type_name`,`s`.`Reg_no` AS `Reg_no`,`s`.`name` AS `name`,`s`.`sem` AS `sem`,`s`.`college` AS `college`,`s`.`phone` AS `phone`,`s`.`photo` AS `photo`,`p`.`status` AS `status`,`ec`.`email` AS `email` from ((((`events` `e` join `student` `s`) join `participant` `p`) join `event_type` `et`) join `event_coordinator` `ec`) where `e`.`event_type_id` = `et`.`event_type_id` and `p`.`Reg_no` = `s`.`Reg_no` and `p`.`eventid` = `e`.`eventid`)  ;

-- --------------------------------------------------------

--
-- Structure for view `v2`
--
DROP TABLE IF EXISTS `v2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v2`  AS   (select `e`.`eventid` AS `eventid`,`e`.`ename` AS `ename`,`e`.`event_type_id` AS `event_type_id`,`et`.`event_type_name` AS `event_type_name`,`s`.`Reg_no` AS `Reg_no`,`s`.`name` AS `name`,`s`.`sem` AS `sem`,`s`.`college` AS `college`,`s`.`phone` AS `phone`,`s`.`photo` AS `photo`,`p`.`status` AS `status` from (((`events` `e` join `student` `s`) join `participant` `p`) join `event_type` `et`) where `e`.`event_type_id` = `et`.`event_type_id` and `p`.`Reg_no` = `s`.`Reg_no` and `p`.`eventid` = `e`.`eventid`)  ;

-- --------------------------------------------------------

--
-- Structure for view `v3`
--
DROP TABLE IF EXISTS `v3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v3`  AS   (select `e`.`eventid` AS `eventid`,`e`.`ename` AS `ename`,`e`.`event_type_id` AS `event_type_id`,`et`.`event_type_name` AS `event_type_name`,`s`.`Reg_no` AS `Reg_no`,`s`.`name` AS `name`,`s`.`sem` AS `sem`,`s`.`phone` AS `phone`,`p`.`status` AS `status`,`ev`.`Coname` AS `Coname`,`ev`.`email` AS `email` from ((((`events` `e` join `student` `s`) join `participant` `p`) join `event_type` `et`) join `event_coordinator` `ev`) where `e`.`event_type_id` = `et`.`event_type_id` and `p`.`Reg_no` = `s`.`Reg_no` and `p`.`eventid` = `e`.`eventid` and `e`.`event_cid` = `ev`.`event_cid`)  ;

-- --------------------------------------------------------

--
-- Structure for view `v4`
--
DROP TABLE IF EXISTS `v4`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v4`  AS   (select `e`.`ename` AS `ename`,`e`.`winner_Regno` AS `winner_Regno`,`e`.`runner_Regno` AS `runner_Regno`,`s`.`name` AS `name`,`s`.`photo` AS `photo`,`s`.`college` AS `college` from (`events` `e` join `student` `s`) where `e`.`runner_Regno` = `s`.`Reg_no` and `e`.`winner_Regno` = `s`.`Reg_no`)  ;

-- --------------------------------------------------------

--
-- Structure for view `v7`
--
DROP TABLE IF EXISTS `v7`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v7`  AS SELECT `events`.`ename` AS `ename`, `event_type`.`event_type_name` AS `event_type_name` FROM (`events` join `event_type` on(`events`.`event_type_id` = `event_type`.`event_type_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `v8`
--
DROP TABLE IF EXISTS `v8`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v8`  AS SELECT `events`.`ename` AS `ename`, `event_type`.`event_type_name` AS `event_type_name`, `event_type`.`event_type_id` AS `event_type_id` FROM (`events` join `event_type` on(`events`.`event_type_id` = `event_type`.`event_type_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventid`),
  ADD UNIQUE KEY `foreign key` (`event_cid`);

--
-- Indexes for table `event_coordinator`
--
ALTER TABLE `event_coordinator`
  ADD PRIMARY KEY (`event_cid`),
  ADD UNIQUE KEY `foreign key` (`email`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`event_type_id`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`pono`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `Reg_no` (`Reg_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_coordinator`
--
ALTER TABLE `event_coordinator`
  MODIFY `event_cid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `event_type_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `poster`
--
ALTER TABLE `poster`
  MODIFY `pono` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
