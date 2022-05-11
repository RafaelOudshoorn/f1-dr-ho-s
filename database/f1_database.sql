-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 11 mei 2022 om 19:46
-- Serverversie: 5.7.31
-- PHP-versie: 7.3.21

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
  PRIMARY KEY (`idConstrucotors`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `construcotors_has_drivers`
--

DROP TABLE IF EXISTS `construcotors_has_drivers`;
CREATE TABLE IF NOT EXISTS `construcotors_has_drivers` (
  `Construcotors_idConstrucotors` int(11) NOT NULL,
  `Drivers_idDrivers` int(11) NOT NULL,
  PRIMARY KEY (`Construcotors_idConstrucotors`,`Drivers_idDrivers`),
  KEY `fk_Construcotors_has_Drivers_Drivers1_idx` (`Drivers_idDrivers`),
  KEY `fk_Construcotors_has_Drivers_Construcotors1_idx` (`Construcotors_idConstrucotors`)
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
  `idDriverStandings_lastrace` int(11) NOT NULL AUTO_INCREMENT,
  `season` varchar(45) NOT NULL,
  `round` varchar(45) NOT NULL,
  `position` varchar(45) NOT NULL,
  `points` varchar(45) NOT NULL,
  `wins` varchar(45) NOT NULL,
  `Drivers_idDrivers` int(11) NOT NULL,
  PRIMARY KEY (`idDriverStandings_lastrace`),
  KEY `fk_DriverStandings_lastrace_Drivers1_idx` (`Drivers_idDrivers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `driverstandings_overall`
--

DROP TABLE IF EXISTS `driverstandings_overall`;
CREATE TABLE IF NOT EXISTS `driverstandings_overall` (
  `idDriverStandings_overall` int(11) NOT NULL AUTO_INCREMENT,
  `season` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `wins` int(11) NOT NULL,
  `Drivers_idDrivers` int(11) NOT NULL,
  PRIMARY KEY (`idDriverStandings_overall`),
  KEY `fk_DriverStandings_overall_Drivers_idx` (`Drivers_idDrivers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `qualifying`
--

DROP TABLE IF EXISTS `qualifying`;
CREATE TABLE IF NOT EXISTS `qualifying` (
  `idqualifying` int(11) NOT NULL AUTO_INCREMENT,
  `season` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `raceName` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `time` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `Q1` int(11) NOT NULL,
  `Q2` int(11) NOT NULL,
  `Q3` int(11) NOT NULL,
  `Drivers_idDrivers` int(11) NOT NULL,
  PRIMARY KEY (`idqualifying`),
  KEY `fk_Qualifying_Drivers1_idx` (`Drivers_idDrivers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `race`
--

DROP TABLE IF EXISTS `race`;
CREATE TABLE IF NOT EXISTS `race` (
  `idRace` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`idRace`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `race`
--

INSERT INTO `race` (`idRace`, `season`, `round`, `raceName`, `circuitid`, `circuitName`, `country`, `race_date`, `race_time`, `FirstPractice_date`, `FirstPractice_time`, `SecondPractice_date`, `SecondPractice_time`, `ThirdPractice_date`, `ThirdPractice_time`, `Qualifying_date`, `Qualifying_time`, `Sprint_date`, `Sprint_time`) VALUES
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
  `idperson` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(90) NOT NULL,
  PRIMARY KEY (`idperson`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `construcotors_has_drivers`
--
ALTER TABLE `construcotors_has_drivers`
  ADD CONSTRAINT `fk_Construcotors_has_Drivers_Construcotors1` FOREIGN KEY (`Construcotors_idConstrucotors`) REFERENCES `construcotors` (`idConstrucotors`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Construcotors_has_Drivers_Drivers1` FOREIGN KEY (`Drivers_idDrivers`) REFERENCES `drivers` (`IDdrivers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `driverstandings_lastrace`
--
ALTER TABLE `driverstandings_lastrace`
  ADD CONSTRAINT `fk_DriverStandings_lastrace_Drivers1` FOREIGN KEY (`Drivers_idDrivers`) REFERENCES `drivers` (`IDdrivers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `driverstandings_overall`
--
ALTER TABLE `driverstandings_overall`
  ADD CONSTRAINT `fk_DriverStandings_overall_Drivers` FOREIGN KEY (`Drivers_idDrivers`) REFERENCES `drivers` (`IDdrivers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `qualifying`
--
ALTER TABLE `qualifying`
  ADD CONSTRAINT `fk_Qualifying_Drivers1` FOREIGN KEY (`Drivers_idDrivers`) REFERENCES `drivers` (`IDdrivers`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
