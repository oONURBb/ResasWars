-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Fev-2015 às 01:19
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

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
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `imagem` varchar(50) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
  `cod_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`cod_user`, `username`, `password`, `email`, `enable`) VALUES
(17, 'abc', '$2y$10$eusVlOuX5LtK3NrUaYFdOusvPTzm3FAtXZgSWOJla7jQpG4whOzf6', 'dada@dsa.pt', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posses`
--

DROP TABLE IF EXISTS `posses`;
CREATE TABLE IF NOT EXISTS `posses` (
  `id_posse` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `pu_nextlvl` int(11) NOT NULL,
  PRIMARY KEY (`id_posse`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `posses`
--

INSERT INTO `posses` (`id_posse`, `id_user`, `id_item`, `nivel`, `pu_nextlvl`) VALUES
(23, 17, 4, 3, 800),
(22, 17, 3, 2, 400),
(21, 17, 2, 3, 800),
(20, 17, 1, 2, 400);

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
  `nivel` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cod_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`cod_user`, `forca`, `estrategia`, `defesa`, `pupgrade`, `stamina`, `xp`, `xpnec`, `nivel`) VALUES
(0, 10, 10, 10, 0, 100, 0, 200, 1),
(17, 10, 10, 10, 0, 100, 0, 200, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_itens`
--

DROP TABLE IF EXISTS `users_itens`;
CREATE TABLE IF NOT EXISTS `users_itens` (
  `cod_user` int(11) NOT NULL,
  `cod_item` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`cod_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
