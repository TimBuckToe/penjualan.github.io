-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 04:02 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpenjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbarang`
--

CREATE TABLE `tbarang` (
  `idbarang` int(11) NOT NULL,
  `nmbarang` varchar(50) NOT NULL,
  `idjenis` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `iddist` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbarang`
--

INSERT INTO `tbarang` (`idbarang`, `nmbarang`, `idjenis`, `stok`, `harga`, `iddist`, `status`) VALUES
(20220001, 'Topi Nike Jordan', 68, 10, 2000000, 5, '1'),
(20220002, 'adsfjhjdash', 68, 29, 2147483647, 5, '1'),
(20220003, 'dsdff', 69, 33, 333, 5, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tcustomer`
--

CREATE TABLE `tcustomer` (
  `idcust` int(11) NOT NULL,
  `nmcust` varchar(35) NOT NULL,
  `jenkel` enum('Perempuan','Laki-laki') NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(13) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tcustomer`
--

INSERT INTO `tcustomer` (`idcust`, `nmcust`, `jenkel`, `tgllahir`, `alamat`, `notelp`, `status`) VALUES
(6, 'Roger Sumatera', 'Laki-laki', '2021-12-26', 'safsadfdasf', '12342342', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tdistributor`
--

CREATE TABLE `tdistributor` (
  `iddist` int(11) NOT NULL,
  `nmdist` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdistributor`
--

INSERT INTO `tdistributor` (`iddist`, `nmdist`, `alamat`, `notelp`) VALUES
(5, 'gadaf', '3242sdaasdf', '234242');

-- --------------------------------------------------------

--
-- Table structure for table `tjenis`
--

CREATE TABLE `tjenis` (
  `idjenis` int(11) NOT NULL,
  `jenisbarang` varchar(35) NOT NULL,
  `ket` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tjenis`
--

INSERT INTO `tjenis` (`idjenis`, `jenisbarang`, `ket`) VALUES
(68, 'Topi', 'Ready'),
(69, 'adsfafasf', 'dsfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `tjual`
--

CREATE TABLE `tjual` (
  `idjual` int(11) NOT NULL,
  `tgljual` date NOT NULL,
  `idbarang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jmlbarang` int(11) NOT NULL,
  `idcust` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `idpetugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tjual`
--

INSERT INTO `tjual` (`idjual`, `tgljual`, `idbarang`, `harga`, `jmlbarang`, `idcust`, `totalharga`, `bayar`, `kembali`, `idpetugas`) VALUES
(312220001, '2022-12-03', 20220001, 0, 6, 6, 480000, 500000, 20000, 10),
(312220002, '0000-00-00', 20220001, 0, 1, 6, 1000000, 1000000, 0, 10),
(312220003, '0000-00-00', 0, 2147483647, 2, 6, 2147483647, 2147483647, 705032701, 10),
(312220004, '2022-12-03', 0, 2000000, 2, 6, 4000000, 4999992, 999992, 10),
(312220005, '2022-12-03', 0, 2000000, 2, 6, 4000000, 5000000, 1000000, 10),
(312220006, '0000-00-00', 20220001, 2000000, 2, 6, 4000000, 5000000, 1000000, 10);

--
-- Triggers `tjual`
--
DELIMITER $$
CREATE TRIGGER `tgrjual` AFTER INSERT ON `tjual` FOR EACH ROW UPDATE tbarang SET stok=stok-new.jmlbarang
WHERE idbarang=new.idbarang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tpetugas`
--

CREATE TABLE `tpetugas` (
  `idpetugas` int(11) NOT NULL,
  `nmpetugas` varchar(50) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(13) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpetugas`
--

INSERT INTO `tpetugas` (`idpetugas`, `nmpetugas`, `tgllahir`, `alamat`, `notelp`, `iduser`) VALUES
(10, 'Maman Griezmann', '2004-01-08', 'Paris', '2934720470237', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `iduser` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hakakses` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`iduser`, `username`, `password`, `hakakses`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vbarang`
-- (See below for the actual view)
--
CREATE TABLE `vbarang` (
`idbarang` int(11)
,`nmbarang` varchar(50)
,`jenisbarang` varchar(35)
,`stok` int(11)
,`harga` int(11)
,`nmdist` varchar(35)
,`status` enum('0','1')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vjual`
-- (See below for the actual view)
--
CREATE TABLE `vjual` (
`idjual` int(11)
,`tgljual` date
,`nmbarang` varchar(50)
,`harga` int(11)
,`jmlbarang` int(11)
,`nmcust` varchar(35)
,`totalharga` int(11)
,`bayar` int(11)
,`kembali` int(11)
,`nmpetugas` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `vbarang`
--
DROP TABLE IF EXISTS `vbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vbarang`  AS SELECT `tbarang`.`idbarang` AS `idbarang`, `tbarang`.`nmbarang` AS `nmbarang`, `tjenis`.`jenisbarang` AS `jenisbarang`, `tbarang`.`stok` AS `stok`, `tbarang`.`harga` AS `harga`, `tdistributor`.`nmdist` AS `nmdist`, `tbarang`.`status` AS `status` FROM ((`tbarang` join `tjenis` on(`tbarang`.`idjenis` = `tjenis`.`idjenis`)) join `tdistributor` on(`tbarang`.`iddist` = `tdistributor`.`iddist`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vjual`
--
DROP TABLE IF EXISTS `vjual`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vjual`  AS SELECT `tjual`.`idjual` AS `idjual`, `tjual`.`tgljual` AS `tgljual`, `tbarang`.`nmbarang` AS `nmbarang`, `tbarang`.`harga` AS `harga`, `tjual`.`jmlbarang` AS `jmlbarang`, `tcustomer`.`nmcust` AS `nmcust`, `tjual`.`totalharga` AS `totalharga`, `tjual`.`bayar` AS `bayar`, `tjual`.`kembali` AS `kembali`, `tpetugas`.`nmpetugas` AS `nmpetugas` FROM (((`tjual` join `tbarang` on(`tjual`.`idbarang` = `tbarang`.`idbarang`)) join `tcustomer` on(`tjual`.`idcust` = `tcustomer`.`idcust`)) join `tpetugas` on(`tjual`.`idpetugas` = `tpetugas`.`idpetugas`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbarang`
--
ALTER TABLE `tbarang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `tcustomer`
--
ALTER TABLE `tcustomer`
  ADD PRIMARY KEY (`idcust`);

--
-- Indexes for table `tdistributor`
--
ALTER TABLE `tdistributor`
  ADD PRIMARY KEY (`iddist`);

--
-- Indexes for table `tjenis`
--
ALTER TABLE `tjenis`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indexes for table `tjual`
--
ALTER TABLE `tjual`
  ADD PRIMARY KEY (`idjual`);

--
-- Indexes for table `tpetugas`
--
ALTER TABLE `tpetugas`
  ADD PRIMARY KEY (`idpetugas`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tcustomer`
--
ALTER TABLE `tcustomer`
  MODIFY `idcust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tdistributor`
--
ALTER TABLE `tdistributor`
  MODIFY `iddist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tjenis`
--
ALTER TABLE `tjenis`
  MODIFY `idjenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tpetugas`
--
ALTER TABLE `tpetugas`
  MODIFY `idpetugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
