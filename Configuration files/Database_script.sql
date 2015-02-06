-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2015 alle 19:14
-- Versione del server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clinica`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `calendario`
--

CREATE TABLE IF NOT EXISTS `calendario` (
  `start` datetime NOT NULL,
  `id` int(10) NOT NULL,
  `CodiceFiscalePrenotazione` varchar(16) NOT NULL,
  `title` text NOT NULL,
`SerialNumber` bigint(20) unsigned NOT NULL,
  `end` datetime NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `pazienti`
--

CREATE TABLE IF NOT EXISTS `pazienti` (
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `Sesso` char(1) NOT NULL,
  `DataNascita` date NOT NULL,
  `Codice Fiscale` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE IF NOT EXISTS `utenti` (
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Codice Fiscale` varchar(16) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Medico` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contiene gli utenti registrati al sito  ';

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`Nome`, `Cognome`, `Codice Fiscale`, `Email`, `Username`, `Password`, `Medico`) VALUES
('ADMIN', 'ADMIN', '0000000000000000', 'admin@admin.com', 'admin', 'adminPass1234', 1);
--va aggiunta anche l'entry del medico insieme a quella dell'admin

-- --------------------------------------------------------

--
-- Struttura della tabella `visite`
--

CREATE TABLE IF NOT EXISTS `visite` (
  `Codice Fiscale` char(16) NOT NULL,
  `DataVisita` date NOT NULL,
  `Anamnesi` text NOT NULL,
  `Esame Obiettivo` text NOT NULL,
  `Conclusione` text NOT NULL,
  `Prescrizione Esami` text NOT NULL,
  `Terapia` text NOT NULL,
  `Controllo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendario`
--
ALTER TABLE `calendario`
 ADD PRIMARY KEY (`SerialNumber`), ADD UNIQUE KEY `UniqueID` (`SerialNumber`);

--
-- Indexes for table `pazienti`
--
ALTER TABLE `pazienti`
 ADD PRIMARY KEY (`Codice Fiscale`), ADD KEY `Codice Fiscale` (`Codice Fiscale`), ADD KEY `Codice Fiscale_2` (`Codice Fiscale`), ADD FULLTEXT KEY `Nome` (`Nome`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
 ADD PRIMARY KEY (`Username`), ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `visite`
--
ALTER TABLE `visite`
 ADD PRIMARY KEY (`Codice Fiscale`,`DataVisita`), ADD KEY `Codice Fiscale` (`Codice Fiscale`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendario`
--
ALTER TABLE `calendario`
MODIFY `SerialNumber` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
