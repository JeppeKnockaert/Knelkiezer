-- phpMyAdmin SQL Dump
-- version 2.11.9.6
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 15, 2012 at 10:03 PM
-- Server version: 5.5.25
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `knelkiezer`
--

-- --------------------------------------------------------

--
-- Table structure for table `beroepen`
--

CREATE TABLE IF NOT EXISTS `beroepen` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `beroep` text NOT NULL,
  `Naam` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `beroepen`
--

INSERT INTO `beroepen` (`id`, `beroep`, `Naam`) VALUES
(1, 'ict', 'Programmeur'),
(2, 'hout', 'Metser'),
(3, 'verpleeg', 'Verple(e)g(st)er'),
(4, 'metaal', 'Lasser'),
(5, 'vrachtwagen', 'Vrachtwagenchauffeur');

-- --------------------------------------------------------

--
-- Table structure for table `coeff`
--

CREATE TABLE IF NOT EXISTS `coeff` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `ict` tinyint(4) NOT NULL DEFAULT '0',
  `hout` tinyint(4) NOT NULL DEFAULT '0',
  `verpleeg` tinyint(4) NOT NULL DEFAULT '0',
  `metaal` tinyint(4) NOT NULL DEFAULT '0',
  `vrachtwagen` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `coeff`
--

INSERT INTO `coeff` (`id`, `ict`, `hout`, `verpleeg`, `metaal`, `vrachtwagen`) VALUES
(1, -1, 1, 1, 1, 0),
(2, -1, 0, 1, 0, 0),
(3, 1, 1, -1, 1, -1),
(4, 1, 0, -1, 1, 1),
(5, -1, 1, 0, 0, 0),
(6, 1, 0, 0, 1, 0),
(7, -1, 1, -1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vragen`
--

CREATE TABLE IF NOT EXISTS `vragen` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `vraag` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `vragen`
--

INSERT INTO `vragen` (`id`, `vraag`) VALUES
(1, 'Ik kan niet stilzitten'),
(2, 'Ik doe graag een praatje'),
(3, 'Ik maak graag dingen'),
(4, 'Ik hou van techniek'),
(5, 'Ik doe liever dan ik denk'),
(6, 'Voor elk probleem vind ik een oplossing'),
(7, 'Ik ben liever buiten dan binnen');
