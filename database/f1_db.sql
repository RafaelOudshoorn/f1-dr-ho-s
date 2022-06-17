-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 17 jun 2022 om 07:31
-- Serverversie: 5.7.31
-- PHP-versie: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `f1_db`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bet`
--

DROP TABLE IF EXISTS `bet`;
CREATE TABLE IF NOT EXISTS `bet` (
  `idBet` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(45) NOT NULL,
  `driver ID` varchar(45) NOT NULL,
  `user_idperson` int(11) NOT NULL,
  PRIMARY KEY (`idBet`),
  KEY `fk_Bet_user1_idx` (`user_idperson`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `construcotors`
--

DROP TABLE IF EXISTS `construcotors`;
CREATE TABLE IF NOT EXISTS `construcotors` (
  `idConstrucotors` int(11) NOT NULL AUTO_INCREMENT,
  `season` int(11) NOT NULL,
  `constructorId` varchar(45) NOT NULL,
  `url` varchar(45) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `nationality` varchar(45) NOT NULL,
  `drivers_IDdrivers` int(11) NOT NULL,
  PRIMARY KEY (`idConstrucotors`),
  KEY `fk_construcotors_drivers1_idx` (`drivers_IDdrivers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `drivers`
--

DROP TABLE IF EXISTS `drivers`;
CREATE TABLE IF NOT EXISTS `drivers` (
  `IDdrivers` int(11) NOT NULL AUTO_INCREMENT,
  `drivername` varchar(45) NOT NULL,
  `permanentNumber` varchar(45) NOT NULL,
  `givenName` varchar(45) NOT NULL,
  `familyName` varchar(45) NOT NULL,
  `dateOfBirth` varchar(45) NOT NULL,
  `nationality` varchar(45) NOT NULL,
  PRIMARY KEY (`IDdrivers`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `drivers`
--

INSERT INTO `drivers` (`IDdrivers`, `drivername`, `permanentNumber`, `givenName`, `familyName`, `dateOfBirth`, `nationality`) VALUES
(1, 'albon', '23', 'Alexander', 'Albon', '1996-03-23', 'Thai'),
(2, 'alonso', '14', 'Fernando', 'Alonso', '1981-07-29', 'Spanish'),
(3, 'bottas', '77', 'Valtteri', 'Bottas', '1989-08-28', 'Finnish'),
(4, 'gasly', '10', 'Pierre', 'Gasly', '1996-02-07', 'French'),
(5, 'hamilton', '44', 'Lewis', 'Hamilton', '1985-01-07', 'British'),
(6, 'hulkenberg', '27', 'Nico', 'HÃ¼lkenberg', '1987-08-19', 'German'),
(7, 'latifi', '6', 'Nicholas', 'Latifi', '1995-06-29', 'Canadian'),
(8, 'leclerc', '16', 'Charles', 'Leclerc', '1997-10-16', 'Monegasque'),
(9, 'kevin_magnussen', '20', 'Kevin', 'Magnussen', '1992-10-05', 'Danish'),
(10, 'norris', '4', 'Lando', 'Norris', '1999-11-13', 'British'),
(11, 'ocon', '31', 'Esteban', 'Ocon', '1996-09-17', 'French'),
(12, 'perez', '11', 'Sergio', 'PÃ©rez', '1990-01-26', 'Mexican'),
(13, 'ricciardo', '3', 'Daniel', 'Ricciardo', '1989-07-01', 'Australian'),
(14, 'russell', '63', 'George', 'Russell', '1998-02-15', 'British'),
(15, 'sainz', '55', 'Carlos', 'Sainz', '1994-09-01', 'Spanish'),
(16, 'mick_schumacher', '47', 'Mick', 'Schumacher', '1999-03-22', 'German'),
(17, 'stroll', '18', 'Lance', 'Stroll', '1998-10-29', 'Canadian'),
(18, 'tsunoda', '22', 'Yuki', 'Tsunoda', '2000-05-11', 'Japanese'),
(19, 'max_verstappen', '33', 'Max', 'Verstappen', '1997-09-30', 'Dutch'),
(20, 'vettel', '5', 'Sebastian', 'Vettel', '1987-07-03', 'German'),
(21, 'zhou', '24', 'Guanyu', 'Zhou', '1999-05-30', 'Chinese');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `driverstandings_lastrace`
--

DROP TABLE IF EXISTS `driverstandings_lastrace`;
CREATE TABLE IF NOT EXISTS `driverstandings_lastrace` (
  `IDdriverStandings_lastrace` int(11) NOT NULL AUTO_INCREMENT,
  `season` varchar(45) NOT NULL,
  `round` varchar(45) NOT NULL,
  `timerace` time NOT NULL,
  `permanentNumber` int(11) NOT NULL,
  `position` varchar(45) NOT NULL,
  `points` varchar(45) NOT NULL,
  `grid` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `time` varchar(45) NOT NULL,
  `Drivers_idDrivers` int(11) NOT NULL,
  `race_idRace` int(11) NOT NULL,
  PRIMARY KEY (`IDdriverStandings_lastrace`),
  KEY `fk_DriverStandings_lastrace_Drivers1_idx` (`Drivers_idDrivers`),
  KEY `fk_driverstandings_lastrace_race1_idx` (`race_idRace`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `driverstandings_lastrace`
--

INSERT INTO `driverstandings_lastrace` (`IDdriverStandings_lastrace`, `season`, `round`, `timerace`, `permanentNumber`, `position`, `points`, `grid`, `status`, `time`, `Drivers_idDrivers`, `race_idRace`) VALUES
(1, '2022', '8', '11:00:00', 33, '1', '25', 3, 'Finished', '1:34:05.941', 19, 8),
(2, '2022', '8', '11:00:00', 11, '2', '19', 2, 'Finished', '+20.823', 12, 8),
(3, '2022', '8', '11:00:00', 63, '3', '15', 5, 'Finished', '+45.995', 14, 8),
(4, '2022', '8', '11:00:00', 44, '4', '12', 7, 'Finished', '+1:11.679', 5, 8),
(5, '2022', '8', '11:00:00', 10, '5', '10', 6, 'Finished', '+1:17.299', 4, 8),
(6, '2022', '8', '11:00:00', 5, '6', '8', 9, 'Finished', '+1:24.099', 20, 8),
(7, '2022', '8', '11:00:00', 14, '7', '6', 10, 'Finished', '+1:28.596', 2, 8),
(8, '2022', '8', '11:00:00', 3, '8', '4', 12, 'Finished', '+1:32.207', 13, 8),
(9, '2022', '8', '11:00:00', 4, '9', '2', 11, 'Finished', '+1:32.556', 10, 8),
(10, '2022', '8', '11:00:00', 31, '10', '1', 13, 'Finished', '+15.628', 11, 8),
(11, '2022', '8', '11:00:00', 77, '11', '0', 15, '+1 Lap', '00:00', 3, 8),
(12, '2022', '8', '11:00:00', 23, '12', '0', 17, '+1 Lap', '00:00', 1, 8),
(13, '2022', '8', '11:00:00', 22, '13', '0', 8, '+1 Lap', '00:00', 18, 8),
(14, '2022', '8', '11:00:00', 47, '14', '0', 20, '+1 Lap', '00:00', 16, 8),
(15, '2022', '8', '11:00:00', 6, '15', '0', 18, '+1 Lap', '00:00', 7, 8),
(16, '2022', '8', '11:00:00', 18, '16', '0', 19, 'Vibrations', '00:00', 17, 8),
(17, '2022', '8', '11:00:00', 20, '17', '0', 16, 'Power Unit', '00:00', 9, 8),
(18, '2022', '8', '11:00:00', 24, '18', '0', 14, 'Technical', '00:00', 21, 8),
(19, '2022', '8', '11:00:00', 16, '19', '0', 1, 'Power Unit', '00:00', 8, 8),
(20, '2022', '8', '11:00:00', 55, '20', '0', 4, 'Brakes', '00:00', 15, 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `driverstandings_overall`
--

DROP TABLE IF EXISTS `driverstandings_overall`;
CREATE TABLE IF NOT EXISTS `driverstandings_overall` (
  `IDdriverStandings_overall` int(11) NOT NULL AUTO_INCREMENT,
  `season` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `wins` int(11) NOT NULL,
  `permanentNumber` int(11) NOT NULL,
  `Drivers_idDrivers` int(11) NOT NULL,
  `race_idRace` int(11) NOT NULL,
  PRIMARY KEY (`IDdriverStandings_overall`),
  KEY `fk_DriverStandings_overall_Drivers_idx` (`Drivers_idDrivers`),
  KEY `fk_driverstandings_overall_race1_idx` (`race_idRace`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `driverstandings_overall`
--

INSERT INTO `driverstandings_overall` (`IDdriverStandings_overall`, `season`, `round`, `position`, `points`, `wins`, `permanentNumber`, `Drivers_idDrivers`, `race_idRace`) VALUES
(1, 2022, 8, 1, 150, 5, 33, 19, 8),
(2, 2022, 8, 2, 129, 1, 11, 12, 8),
(3, 2022, 8, 3, 116, 2, 16, 8, 8),
(4, 2022, 8, 4, 99, 0, 63, 14, 8),
(5, 2022, 8, 5, 83, 0, 55, 15, 8),
(6, 2022, 8, 6, 62, 0, 44, 5, 8),
(7, 2022, 8, 7, 50, 0, 4, 10, 8),
(8, 2022, 8, 8, 40, 0, 77, 3, 8),
(9, 2022, 8, 9, 31, 0, 31, 11, 8),
(10, 2022, 8, 10, 16, 0, 10, 4, 8),
(11, 2022, 8, 11, 16, 0, 14, 2, 8),
(12, 2022, 8, 12, 15, 0, 20, 9, 8),
(13, 2022, 8, 13, 15, 0, 3, 13, 8),
(14, 2022, 8, 14, 13, 0, 5, 20, 8),
(15, 2022, 8, 15, 11, 0, 22, 18, 8),
(16, 2022, 8, 16, 3, 0, 23, 1, 8),
(17, 2022, 8, 17, 2, 0, 18, 17, 8),
(18, 2022, 8, 18, 1, 0, 24, 21, 8),
(19, 2022, 8, 19, 0, 0, 47, 16, 8),
(20, 2022, 8, 20, 0, 0, 27, 6, 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `points`
--

DROP TABLE IF EXISTS `points`;
CREATE TABLE IF NOT EXISTS `points` (
  `idPoints` int(11) NOT NULL,
  `Points` int(11) NOT NULL,
  `race_idRace` int(11) NOT NULL,
  `user_idperson` int(11) NOT NULL,
  PRIMARY KEY (`idPoints`),
  KEY `fk_Points_race1_idx` (`race_idRace`),
  KEY `fk_Points_user1_idx` (`user_idperson`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `qualifying`
--

DROP TABLE IF EXISTS `qualifying`;
CREATE TABLE IF NOT EXISTS `qualifying` (
  `IDqualifying` int(11) NOT NULL AUTO_INCREMENT,
  `season` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `raceName` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `number` int(11) NOT NULL,
  `permanentNumber` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `Q1` time NOT NULL,
  `Q2` time DEFAULT NULL,
  `Q3` time DEFAULT NULL,
  `Drivers_idDrivers` int(11) NOT NULL,
  `race_idRace` int(11) NOT NULL,
  PRIMARY KEY (`IDqualifying`),
  KEY `fk_Qualifying_Drivers1_idx` (`Drivers_idDrivers`),
  KEY `fk_qualifying_race1_idx` (`race_idRace`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `qualifying`
--

INSERT INTO `qualifying` (`IDqualifying`, `season`, `round`, `raceName`, `date`, `time`, `number`, `permanentNumber`, `position`, `Q1`, `Q2`, `Q3`, `Drivers_idDrivers`, `race_idRace`) VALUES
(1, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 16, 16, 1, '01:42:01', '01:42:00', '01:41:00', 8, 8),
(2, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 11, 11, 2, '01:42:01', '01:41:01', '01:41:01', 12, 8),
(3, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 1, 33, 3, '01:42:01', '01:42:00', '01:41:01', 19, 8),
(4, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 55, 55, 4, '01:42:01', '01:42:00', '01:41:01', 15, 8),
(5, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 63, 63, 5, '01:43:01', '01:43:00', '01:42:01', 14, 8),
(6, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 10, 10, 6, '01:43:00', '01:43:00', '01:42:01', 4, 8),
(7, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 44, 44, 7, '01:43:01', '01:43:00', '01:42:01', 5, 8),
(8, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 22, 22, 8, '01:43:01', '01:43:00', '01:43:00', 18, 8),
(9, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 5, 5, 9, '01:43:00', '01:43:00', '01:43:00', 20, 8),
(10, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 14, 14, 10, '01:44:00', '01:43:00', '01:43:00', 2, 8),
(11, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 4, 4, 11, '01:44:00', '01:43:00', '00:00:00', 10, 8),
(12, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 3, 3, 12, '01:44:00', '01:43:01', '00:00:00', 13, 8),
(13, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 31, 31, 13, '01:43:01', '01:43:01', '00:00:00', 11, 8),
(14, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 24, 24, 14, '01:43:01', '01:43:01', '00:00:00', 21, 8),
(15, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 77, 77, 15, '01:44:00', '01:44:00', '00:00:00', 3, 8),
(16, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 20, 20, 16, '01:44:01', '00:00:00', '00:00:00', 9, 8),
(17, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 23, 23, 17, '01:44:01', '00:00:00', '00:00:00', 1, 8),
(18, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 6, 6, 18, '01:45:00', '00:00:00', '00:00:00', 7, 8),
(19, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 18, 18, 19, '01:45:00', '00:00:00', '00:00:00', 17, 8),
(20, 2022, 8, 'Azerbaijan Grand Prix', '2022-06-12', '11:00:00', 47, 47, 20, '01:45:01', '00:00:00', '00:00:00', 16, 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `race`
--

DROP TABLE IF EXISTS `race`;
CREATE TABLE IF NOT EXISTS `race` (
  `IDrace` int(11) NOT NULL AUTO_INCREMENT,
  `season` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `raceName` varchar(45) NOT NULL,
  `circuitid` varchar(45) NOT NULL,
  `circuitName` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `race_date` date NOT NULL,
  `race_time` time NOT NULL,
  `FirstPractice_date` date DEFAULT NULL,
  `FirstPractice_time` time DEFAULT NULL,
  `SecondPractice_date` date DEFAULT NULL,
  `SecondPractice_time` time DEFAULT NULL,
  `ThirdPractice_date` varchar(45) DEFAULT NULL,
  `ThirdPractice_time` varchar(45) DEFAULT NULL,
  `Qualifying_date` date NOT NULL,
  `Qualifying_time` time NOT NULL,
  `Sprint_date` varchar(45) DEFAULT NULL,
  `Sprint_time` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IDrace`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `race`
--

INSERT INTO `race` (`IDrace`, `season`, `round`, `raceName`, `circuitid`, `circuitName`, `country`, `race_date`, `race_time`, `FirstPractice_date`, `FirstPractice_time`, `SecondPractice_date`, `SecondPractice_time`, `ThirdPractice_date`, `ThirdPractice_time`, `Qualifying_date`, `Qualifying_time`, `Sprint_date`, `Sprint_time`) VALUES
(1, 2022, 1, 'Bahrain Grand Prix', 'bahrain', 'Bahrain International Circuit', 'Bahrain', '2022-03-20', '15:00:00', '2022-03-18', '12:00:00', '2022-03-18', '15:00:00', '2022-03-19', '12:00', '2022-03-19', '15:00:00', '0000-00-00', '00:00'),
(2, 2022, 2, 'Saudi Arabian Grand Prix', 'jeddah', 'Jeddah Corniche Circuit', 'Saudi Arabia', '2022-03-27', '17:00:00', '2022-03-25', '14:00:00', '2022-03-25', '17:00:00', '2022-03-26', '14:00', '2022-03-26', '17:00:00', '0000-00-00', '00:00'),
(3, 2022, 3, 'Australian Grand Prix', 'albert_park', 'Albert Park Grand Prix Circuit', 'Australia', '2022-04-10', '05:00:00', '2022-04-08', '03:00:00', '2022-04-08', '06:00:00', '2022-04-09', '03:00', '2022-04-09', '06:00:00', '0000-00-00', '00:00'),
(4, 2022, 4, 'Emilia Romagna Grand Prix', 'imola', 'Autodromo Enzo e Dino Ferrari', 'Italy', '2022-04-24', '13:00:00', '2022-04-22', '11:30:00', '2022-04-23', '10:30:00', '0000-00-00', '00:00', '2022-04-22', '15:00:00', '2022-04-23', '14:30'),
(5, 2022, 5, 'Miami Grand Prix', 'miami', 'Miami International Autodrome', 'USA', '2022-05-08', '19:30:00', '2022-05-06', '18:30:00', '2022-05-06', '21:30:00', '2022-05-07', '17:00', '2022-05-07', '20:00:00', '0000-00-00', '00:00'),
(6, 2022, 6, 'Spanish Grand Prix', 'catalunya', 'Circuit de Barcelona-Catalunya', 'Spain', '2022-05-22', '13:00:00', '2022-05-20', '12:00:00', '2022-05-20', '15:00:00', '2022-05-21', '11:00', '2022-05-21', '14:00:00', '0000-00-00', '00:00'),
(7, 2022, 7, 'Monaco Grand Prix', 'monaco', 'Circuit de Monaco', 'Monaco', '2022-05-29', '13:00:00', '2022-05-27', '12:00:00', '2022-05-27', '15:00:00', '2022-05-28', '11:00', '2022-05-28', '14:00:00', '0000-00-00', '00:00'),
(8, 2022, 8, 'Azerbaijan Grand Prix', 'BAK', 'Baku City Circuit', 'Azerbaijan', '2022-06-12', '11:00:00', '2022-06-10', '11:00:00', '2022-06-10', '14:00:00', '2022-06-11', '11:00', '2022-06-11', '14:00:00', '0000-00-00', '00:00'),
(9, 2022, 9, 'Canadian Grand Prix', 'villeneuve', 'Circuit Gilles Villeneuve', 'Canada', '2022-06-19', '18:00:00', '2022-06-17', '18:00:00', '2022-06-17', '21:00:00', '2022-06-18', '17:00', '2022-06-18', '20:00:00', '0000-00-00', '00:00'),
(10, 2022, 10, 'British Grand Prix', 'silverstone', 'Silverstone Circuit', 'UK', '2022-07-03', '14:00:00', '2022-07-01', '12:00:00', '2022-07-01', '15:00:00', '2022-07-02', '11:00', '2022-07-02', '14:00:00', '0000-00-00', '00:00'),
(11, 2022, 11, 'Austrian Grand Prix', 'red_bull_ring', 'Red Bull Ring', 'Austria', '2022-07-10', '13:00:00', '2022-07-08', '11:30:00', '2022-07-09', '10:30:00', '0000-00-00', '00:00', '2022-07-08', '15:00:00', '2022-07-09', '14:30'),
(12, 2022, 12, 'French Grand Prix', 'ricard', 'Circuit Paul Ricard', 'France', '2022-07-24', '13:00:00', '2022-07-22', '12:00:00', '2022-07-22', '15:00:00', '2022-07-23', '11:00', '2022-07-23', '14:00:00', '0000-00-00', '00:00'),
(13, 2022, 13, 'Hungarian Grand Prix', 'hungaroring', 'Hungaroring', 'Hungary', '2022-07-31', '13:00:00', '2022-07-29', '12:00:00', '2022-07-29', '15:00:00', '2022-07-30', '11:00', '2022-07-30', '15:00:00', '0000-00-00', '00:00'),
(14, 2022, 14, 'Belgian Grand Prix', 'spa', 'Circuit de Spa-Francorchamps', 'Belgium', '2022-08-28', '13:00:00', '2022-08-26', '12:00:00', '2022-08-26', '15:00:00', '2022-08-27', '11:00', '2022-08-27', '14:00:00', '0000-00-00', '00:00'),
(15, 2022, 15, 'Dutch Grand Prix', 'zandvoort', 'Circuit Park Zandvoort', 'Netherlands', '2022-09-04', '13:00:00', '2022-09-02', '12:00:00', '2022-09-02', '15:00:00', '2022-09-03', '11:00', '2022-09-03', '14:00:00', '0000-00-00', '00:00'),
(16, 2022, 16, 'Italian Grand Prix', 'monza', 'Autodromo Nazionale di Monza', 'Italy', '2022-09-11', '13:00:00', '2022-09-09', '12:00:00', '2022-09-09', '15:00:00', '2022-09-10', '11:00', '2022-09-10', '14:00:00', '0000-00-00', '00:00'),
(17, 2022, 17, 'Singapore Grand Prix', 'marina_bay', 'Marina Bay Street Circuit', 'Singapore', '2022-10-02', '12:00:00', '2022-09-30', '10:00:00', '2022-09-30', '13:30:00', '2022-10-01', '10:00', '2022-10-01', '13:00:00', '0000-00-00', '00:00'),
(18, 2022, 18, 'Japanese Grand Prix', 'suzuka', 'Suzuka Circuit', 'Japan', '2022-10-09', '05:00:00', '2022-10-07', '04:00:00', '2022-10-07', '08:00:00', '2022-10-08', '04:00', '2022-10-08', '07:00:00', '0000-00-00', '00:00'),
(19, 2022, 19, 'United States Grand Prix', 'americas', 'Circuit of the Americas', 'USA', '2022-10-23', '19:00:00', '2022-10-21', '19:00:00', '2022-10-21', '22:00:00', '2022-10-22', '19:00', '2022-10-22', '22:00:00', '0000-00-00', '00:00'),
(20, 2022, 20, 'Mexico City Grand Prix', 'rodriguez', 'AutÃ³dromo Hermanos RodrÃ­guez', 'Mexico', '2022-10-30', '20:00:00', '2022-10-28', '18:00:00', '2022-10-28', '21:00:00', '2022-10-29', '17:00', '2022-10-29', '20:00:00', '0000-00-00', '00:00'),
(21, 2022, 21, 'Brazilian Grand Prix', 'interlagos', 'AutÃ³dromo JosÃ© Carlos Pace', 'Brazil', '2022-11-13', '18:00:00', '2022-11-11', '15:30:00', '2022-11-12', '15:30:00', '0000-00-00', '00:00', '2022-11-11', '19:00:00', '2022-11-12', '19:30'),
(22, 2022, 22, 'Abu Dhabi Grand Prix', 'yas_marina', 'Yas Marina Circuit', 'UAE', '2022-11-20', '13:00:00', '2022-11-18', '09:00:00', '2022-11-18', '12:00:00', '2022-11-19', '10:00', '2022-11-19', '13:00:00', '0000-00-00', '00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idperson` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(90) NOT NULL,
  `total_points` int(11) NOT NULL,
  `profile_picture` varchar(200) NOT NULL,
  `is_admin` int(11) NOT NULL,
  PRIMARY KEY (`idperson`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`idperson`, `username`, `firstname`, `lastname`, `email`, `password`, `total_points`, `profile_picture`, `is_admin`) VALUES
(1, 'koen', 'Koen', 'Herrebrugh', 'koen@homus.nl', '$2y$10$XNH7OHbc2ImSJHG8ASUwK.vq5col.0jO95kuhj13UVGIfDPKiRZLa', 0, 'pictures/user_profile.png', 1);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bet`
--
ALTER TABLE `bet`
  ADD CONSTRAINT `fk_Bet_user1` FOREIGN KEY (`user_idperson`) REFERENCES `user` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `construcotors`
--
ALTER TABLE `construcotors`
  ADD CONSTRAINT `fk_construcotors_drivers1` FOREIGN KEY (`drivers_IDdrivers`) REFERENCES `drivers` (`IDdrivers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `driverstandings_lastrace`
--
ALTER TABLE `driverstandings_lastrace`
  ADD CONSTRAINT `fk_DriverStandings_lastrace_Drivers1` FOREIGN KEY (`Drivers_idDrivers`) REFERENCES `drivers` (`IDdrivers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_driverstandings_lastrace_race1` FOREIGN KEY (`race_idRace`) REFERENCES `race` (`IDrace`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `driverstandings_overall`
--
ALTER TABLE `driverstandings_overall`
  ADD CONSTRAINT `fk_DriverStandings_overall_Drivers` FOREIGN KEY (`Drivers_idDrivers`) REFERENCES `drivers` (`IDdrivers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_driverstandings_overall_race1` FOREIGN KEY (`race_idRace`) REFERENCES `race` (`IDrace`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `fk_Points_race1` FOREIGN KEY (`race_idRace`) REFERENCES `race` (`IDrace`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Points_user1` FOREIGN KEY (`user_idperson`) REFERENCES `user` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `qualifying`
--
ALTER TABLE `qualifying`
  ADD CONSTRAINT `fk_Qualifying_Drivers1` FOREIGN KEY (`Drivers_idDrivers`) REFERENCES `drivers` (`IDdrivers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_qualifying_race1` FOREIGN KEY (`race_idRace`) REFERENCES `race` (`IDrace`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
