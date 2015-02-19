-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Fev-2015 às 16:34
-- Versão do servidor: 5.6.21
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
-- Estrutura da tabela `itens`
--

DROP TABLE IF EXISTS `itens`;
CREATE TABLE IF NOT EXISTS `itens` (
`item_id` int(10) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `imagem` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`item_id`, `nome`, `tipo`, `imagem`) VALUES
(1, 'sofa', 'espera', '_sofa.png'),
(2, 'televisao', 'stamina', '_televisao.png'),
(3, 'passadeira', 'forca', '_passadeira.png'),
(4, 'mesa', 'estrategia', '_mesa.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
`cod_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `enable` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`cod_user`, `username`, `password`, `email`, `enable`) VALUES
(6, 'teste1', '$2y$10$Ybf07C/cATjrbEeqesTLA.n0lWxdxnWaCTaNhif8nk0mnbVk0xOtW', 'teste1@hotmail.com', 0),
(5, 'abc', '$2y$10$dQV9cBEx3xTnTZzjLhS/aOr53UKgRZJx8Q11xrpHHjmAY8fgIu15q', 'abc@hotmail.com', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posses`
--

DROP TABLE IF EXISTS `posses`;
CREATE TABLE IF NOT EXISTS `posses` (
`id_posse` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_item` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posses`
--

INSERT INTO `posses` (`id_posse`, `id_user`, `id_item`) VALUES
(75, 5, 1),
(76, 5, 3),
(77, 5, 4),
(78, 5, 2),
(79, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
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
-- Estrutura da tabela `users_itens`
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
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`cod_user`);

--
-- Indexes for table `posses`
--
ALTER TABLE `posses`
 ADD PRIMARY KEY (`id_posse`), ADD KEY `id_user` (`id_user`), ADD KEY `id_item` (`id_item`);

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
MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `cod_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `posses`
--
ALTER TABLE `posses`
MODIFY `id_posse` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
