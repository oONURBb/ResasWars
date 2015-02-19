-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2015 at 08:11 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `resaswars`
--
CREATE DATABASE IF NOT EXISTS `resaswars` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `resaswars`;

-- --------------------------------------------------------

--
-- Table structure for table `itens`
--

DROP TABLE IF EXISTS `itens`;
CREATE TABLE IF NOT EXISTS `itens` (
`cod_item` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itens`
--

INSERT INTO `itens` (`cod_item`, `descricao`, `tipo`) VALUES
(1, 'sofa', 'espera'),
(2, 'tv', 'stamina'),
(3, 'passadeira', 'forca'),
(4, 'xadrez', 'estrategia');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `enable` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `email`, `enable`) VALUES
('admin', 'admin', 'admin@admin.pt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `cod_user` int(11) NOT NULL,
  `forca` int(11) NOT NULL DEFAULT '10',
  `estrategia` int(11) NOT NULL DEFAULT '10',
  `defesa` int(11) NOT NULL DEFAULT '10',
  `pupgrade` int(11) NOT NULL DEFAULT '0',
  `stamina` int(11) NOT NULL DEFAULT '100',
  `xp` int(11) NOT NULL DEFAULT '0',
  `xpnec` int(11) NOT NULL DEFAULT '200',
  `nivel` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_itens`
--

DROP TABLE IF EXISTS `users_itens`;
CREATE TABLE IF NOT EXISTS `users_itens` (
  `cod_user` int(11) NOT NULL,
  `cod_item` int(11) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itens`
--
ALTER TABLE `itens`
 ADD PRIMARY KEY (`cod_item`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`cod_user`);

--
-- Indexes for table `users_itens`
--
ALTER TABLE `users_itens`
 ADD PRIMARY KEY (`cod_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itens`
--
ALTER TABLE `itens`
MODIFY `cod_item` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
