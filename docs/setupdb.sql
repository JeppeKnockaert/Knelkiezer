-- phpMyAdmin SQL Dump
-- version 2.11.9.6
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generatie Tijd: 14 Sept 2012 om 13:13
-- Server versie: 5.5.25
-- PHP Versie: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `knelkiezer`
--
DROP DATABASE `knelkiezer`;
CREATE DATABASE `knelkiezer` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `knelkiezer`;

-- --------------------------------------------------------

--
-- Tabel structuur voor tabel `coeff`
--

CREATE TABLE IF NOT EXISTS `coeff` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `ict` tinyint(4) NOT NULL DEFAULT '0',
  `hout` tinyint(4) NOT NULL DEFAULT '0',
  `verpleeg` tinyint(4) NOT NULL DEFAULT '0',
  `metaal` tinyint(4) NOT NULL DEFAULT '0',
  `vrachtwagen` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `coeff`
--


-- --------------------------------------------------------

--
-- Tabel structuur voor tabel `vragen`
--

CREATE TABLE IF NOT EXISTS `vragen` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `vraag` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `vragen`
--

