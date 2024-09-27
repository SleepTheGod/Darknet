-- phpMyAdmin SQL Dump
-- Version: 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Created on: 27 Oct 2019 at 09:49
-- Server Version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `database`

-- --------------------------------------------------------

-- Table structure for table `content`

CREATE TABLE `content` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `CATEGORY` ENUM(
        'AMPHETAMINE',
        'BENZODIAZEPINE',
        'BARBITURATE',
        'CANNABIS',
        'COCAINE',
        'CRACK',
        'DMT',
        'DRUG',
        'HEROIN',
        'LSD',
        'METHAMPHETAMINE',
        'MDA',
        'MDMA',
        'OPIATES',
        'SEEDS',
        'STEROID',
        'RESEARCH_CHEMICAL'
    ) NOT NULL,
    `PRODUCT` VARCHAR(255) NOT NULL,
    `DESCRIPTION` TEXT NOT NULL,
    `PRICE` DOUBLE NOT NULL,
    `RATING_UP` INT(11) NOT NULL DEFAULT 0,
    `RATING_DOWN` INT(11) NOT NULL DEFAULT 0,
    `AVAILABLE` ENUM('Y', 'N') NOT NULL,
    `VENDOR` VARCHAR(32) NOT NULL,
    `SALES` INT(11) NOT NULL DEFAULT 0,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- Table structure for table `orders`

CREATE TABLE `orders` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `PRICE` DOUBLE NOT NULL,
    `SHIPPING_ADDRESS` TEXT NOT NULL,
    `STATUS` ENUM('PAID', 'UNPAID', 'SHIPPED', 'ABORTED') NOT NULL DEFAULT 'UNPAID',
    `RECEIVE_ADDRESS` VARCHAR(255) NOT NULL,
    `USERNAME` VARCHAR(32) NOT NULL,
    `VENDOR` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- Table structure for table `users`

CREATE TABLE `users` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `USERNAME` VARCHAR(32) NOT NULL UNIQUE,
    `PASSWORD` VARCHAR(64) NOT NULL,
    `PGP` TEXT NOT NULL,
    `STATUS` ENUM('USER', 'VENDOR', 'ADMIN') NOT NULL,
    `RATING_UP` INT(11) NOT NULL DEFAULT 0,
    `RATING_DOWN` INT(11) NOT NULL DEFAULT 0,
    `ADDRESS` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- Indexes for the exported tables

-- Indexes for table `content`
ALTER TABLE `content`
    ADD PRIMARY KEY (`ID`);

-- Indexes for table `orders`
ALTER TABLE `orders`
    ADD PRIMARY KEY (`ID`);

-- Indexes for table `users`
ALTER TABLE `users`
    ADD PRIMARY KEY (`ID`),
    ADD UNIQUE KEY `USERNAME` (`USERNAME`);

-- --------------------------------------------------------

-- AUTO_INCREMENT for exported tables

ALTER TABLE `content` AUTO_INCREMENT = 1000;
ALTER TABLE `orders` AUTO_INCREMENT = 1; -- Reset to start at 1
ALTER TABLE `users` AUTO_INCREMENT = 1000;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
