-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 26, 2024 alle 10:38
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portale_ospedale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `appuntamento`
--

CREATE TABLE `appuntamento` (
  `Id_Appuntamento` int(11) NOT NULL,
  `CodFisc` varchar(16) NOT NULL,
  `Id_Visita` int(50) NOT NULL,
  `Data` date NOT NULL,
  `Orario` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `CodFisc` varchar(16) NOT NULL,
  `Cognome` varchar(100) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Indirizzo` varchar(150) NOT NULL,
  `Comune` varchar(50) NOT NULL,
  `Provincia` varchar(5) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`CodFisc`, `Cognome`, `Nome`, `Indirizzo`, `Comune`, `Provincia`, `Password`) VALUES
('???', 'Admin', 'Admin', 'Indirizzo Admin ', 'Comune Admin', 'PV Ad', '$2y$10$JsXQNyVROwWS5nyE9g4hi./BXTjbH5GYit4hc.tKp5I5XVhn6j.jS'),
('AAA', 'Pasquin', 'Tommaso', 'Terranegra 21 ', 'Legnago', 'Veron', '$2y$10$YagyJ2L00nUlG4yr5PolEO4lRnbJJMwkbaF0O0AP8o4VHKlbExSHa');

-- --------------------------------------------------------

--
-- Struttura della tabella `visita`
--

CREATE TABLE `visita` (
  `Id_Visita` int(50) NOT NULL,
  `Tipologia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `visita`
--

INSERT INTO `visita` (`Id_Visita`, `Tipologia`) VALUES
(1, 'Cardiologia'),
(2, 'Odotoiatria');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `appuntamento`
--
ALTER TABLE `appuntamento`
  ADD PRIMARY KEY (`Id_Appuntamento`),
  ADD KEY `Id_Appuntamento` (`Id_Appuntamento`,`CodFisc`,`Id_Visita`) USING BTREE,
  ADD KEY `CodFisc` (`CodFisc`),
  ADD KEY `Id_Visita` (`Id_Visita`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`CodFisc`);

--
-- Indici per le tabelle `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`Id_Visita`),
  ADD KEY `Id_Visita` (`Id_Visita`) USING BTREE;

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `visita`
--
ALTER TABLE `visita`
  MODIFY `Id_Visita` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `appuntamento`
--
ALTER TABLE `appuntamento`
  ADD CONSTRAINT `appuntamento_ibfk_1` FOREIGN KEY (`CodFisc`) REFERENCES `utenti` (`CodFisc`),
  ADD CONSTRAINT `appuntamento_ibfk_2` FOREIGN KEY (`Id_Visita`) REFERENCES `visita` (`Id_Visita`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
