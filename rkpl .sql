-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2019 at 11:13 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rkpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `ID_ACTIVITIES` int(11) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `CONTENT` text NOT NULL,
  `DATE` date NOT NULL,
  `ID_LABLE` int(11) NOT NULL,
  `ID_IMAGE` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`ID_ACTIVITIES`, `TITLE`, `CONTENT`, `DATE`, `ID_LABLE`, `ID_IMAGE`) VALUES
(1, 'menacari apa aja', 'sadjoadjiksdjajdiojdiaosdjiosjdioadjiosjdojaoisdjiodjoadjsiodjioasdjioajsojdioajdiosjdioaojsaiodjsoaidjiojdijio iosja djsaiodjaio sjdiosaj doisj iojao josijdo jsodj oijsdao joiad jsiodjjaiosj dojsodjosdjoijsadiosjd ioasjdiojasdjoasjdjsaiojosidjios j jsodjosa j ijdios iojdjaoj sojoj soj ojs sj jod sjdo jsoajd ojdo jsoj josdjoidjs oj osaj osajs iojdos jidj saiodjosaidjoisjd oaj', '2019-01-15', 1, '12121'),
(2, 'tea party', 'asdasddaad', '2019-01-14', 1, '12121'),
(3, 'tes', 'aoasodkaosdkoa', '2019-01-02', 2, '34343'),
(11, 'sadsadsadad', 'sadsadsd', '2019-01-14', 1, ''),
(12, 'sadada', 'dasdasdsad', '2019-01-14', 1, ''),
(13, 'asdada', 'asdadsad', '2019-01-14', 1, ''),
(14, 'asdasd', 'sadadasd', '2019-01-14', 1, ''),
(15, 'asdasda', 'sddasdadd', '2019-01-14', 1, ''),
(16, 'asdada', 'sdasdsada', '2019-01-14', 1, ''),
(17, 'sadsadsad', 'sadadsad', '2019-01-14', 1, ''),
(18, 'sdasd', 'asdad', '2019-01-14', 1, ''),
(19, 'sadda', 'sdasdasdasd', '2019-01-14', 1, ''),
(20, 'asdad', 'sadsadsad', '2019-01-14', 1, ''),
(21, 'asdadad', 'sadsaddsad', '2019-01-14', 1, ''),
(22, 'sadsadsad', 'sadsadadsad', '2019-01-14', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_USER` int(11) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PASS` varchar(256) NOT NULL,
  `REGISTERED` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_USER`, `EMAIL`, `NAME`, `PASS`, `REGISTERED`) VALUES
(1, 'muammar.clasic@gmail.com', 'zik', 'kode-48MZA', '2018-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `ID_GALLERY` int(11) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `ID_LABLE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `ID_IMAGE` int(11) NOT NULL,
  `ID_GALLERY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Label`
--

CREATE TABLE `Label` (
  `Id_Label` int(11) NOT NULL,
  `Label` varchar(100) NOT NULL,
  `Make` date NOT NULL,
  `Category` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Label`
--

INSERT INTO `Label` (`Id_Label`, `Label`, `Make`, `Category`) VALUES
(1, 'Andika', '2019-01-16', 'Activity'),
(2, 'Zikri', '2019-01-15', 'Activity'),
(3, 'tes', '2019-01-13', ''),
(4, 'andika2', '2019-01-13', 'Activity');

-- --------------------------------------------------------

--
-- Table structure for table `Label_Activity`
--

CREATE TABLE `Label_Activity` (
  `Id_Label` int(11) NOT NULL,
  `Label` varchar(100) NOT NULL,
  `Make` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Label_Activity`
--

INSERT INTO `Label_Activity` (`Id_Label`, `Label`, `Make`) VALUES
(1, 'Andika', '2019-01-16'),
(2, 'Zikri', '2019-01-15'),
(5, 'andika', '2019-01-17'),
(8, 'testing', '2019-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `Label_News`
--

CREATE TABLE `Label_News` (
  `Id_Label` int(11) NOT NULL,
  `Label` varchar(100) NOT NULL,
  `Make` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `ID_NEWS` int(11) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `DATE` date NOT NULL,
  `ID_LABLE` varchar(100) NOT NULL,
  `ID_IMAGE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`ID_ACTIVITIES`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_USER`),
  ADD UNIQUE KEY `EMAIL_U` (`EMAIL`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ID_IMAGE`);

--
-- Indexes for table `Label`
--
ALTER TABLE `Label`
  ADD PRIMARY KEY (`Id_Label`);

--
-- Indexes for table `Label_Activity`
--
ALTER TABLE `Label_Activity`
  ADD PRIMARY KEY (`Id_Label`);

--
-- Indexes for table `Label_News`
--
ALTER TABLE `Label_News`
  ADD PRIMARY KEY (`Id_Label`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID_NEWS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `ID_ACTIVITIES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `ID_IMAGE` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Label`
--
ALTER TABLE `Label`
  MODIFY `Id_Label` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Label_Activity`
--
ALTER TABLE `Label_Activity`
  MODIFY `Id_Label` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Label_News`
--
ALTER TABLE `Label_News`
  MODIFY `Id_Label` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `ID_NEWS` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
