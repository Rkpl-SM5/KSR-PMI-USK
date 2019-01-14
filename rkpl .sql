-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2019 at 06:05 PM
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
  `ID_IMAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `ID_LABLE` int(11) NOT NULL,
  `MAKE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `ID_IMAGE` varchar(255) NOT NULL,
  `ID_GALLERY` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL
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
(7, '', '0000-00-00');

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

-- --------------------------------------------------------

--
-- Table structure for table `pendonor`
--

CREATE TABLE `pendonor` (
  `ID` int(11) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `KONTAK` varchar(255) NOT NULL,
  `ALAMAT` varchar(255) NOT NULL,
  `JENIS_KELAMIN` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `KEGIATAN` varchar(255) NOT NULL,
  `TANGGAL` date NOT NULL,
  `GOLONGAN_DARAH` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendonor`
--

INSERT INTO `pendonor` (`ID`, `NAMA`, `KONTAK`, `ALAMAT`, `JENIS_KELAMIN`, `EMAIL`, `KEGIATAN`, `TANGGAL`, `GOLONGAN_DARAH`) VALUES
(6, 'zikri', '088', 'linke', 'L', 'muammar.clasic@gmail.com', 'sds', '2019-01-01', 'A-');

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
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`ID_GALLERY`),
  ADD KEY `fk_id_lable` (`ID_LABLE`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ID_IMAGE`),
  ADD KEY `fk_id_gallery` (`ID_GALLERY`);

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
-- Indexes for table `pendonor`
--
ALTER TABLE `pendonor`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `ID_ACTIVITIES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `ID_GALLERY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `Label`
--
ALTER TABLE `Label`
  MODIFY `Id_Label` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `Label_Activity`
--
ALTER TABLE `Label_Activity`
  MODIFY `Id_Label` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
--
-- AUTO_INCREMENT for table `pendonor`
--
ALTER TABLE `pendonor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_id_lable` FOREIGN KEY (`ID_LABLE`) REFERENCES `Label` (`Id_Label`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_id_gallery` FOREIGN KEY (`ID_GALLERY`) REFERENCES `gallery` (`ID_GALLERY`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
