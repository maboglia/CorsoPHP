-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 27, 2018 alle 21:43
-- Versione del server: 10.1.30-MariaDB
-- Versione PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mondiale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `squadre`
--

CREATE TABLE `squadre` (
  `idSquadra` int(11) NOT NULL,
  `nomeSquadra` varchar(50) NOT NULL,
  `bandiera` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `squadre`
--

INSERT INTO `squadre` (`idSquadra`, `nomeSquadra`, `bandiera`) VALUES
(1, 'Uruguay', 'http://www.macedoniabari.com/shop/image/cache/data/bandiere%20nazioni/Uruguay.-500x500.png'),
(2, 'Russia', 'https://www.aremitaliashop.com/1836-thickbox/patch-bandiera-russia-termoadesive.jpg'),
(3, 'Spagna', 'https://www.aremitaliashop.com/1830-large/327.jpg'),
(4, 'Portogallo', 'https://www.aremitaliashop.com/1824-large/321.jpg'),
(5, 'Francia', 'https://www.aremitaliashop.com/1802-large/299.jpg'),
(6, 'Danimarca', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Flag_of_Denmark.svg/2000px-Flag_of_Denmark.svg.png'),
(7, 'croazia', 'https://www.camoglicartenautiche.com/image/cache/catalog/bandiere/nazioni/croazia-800x600.png'),
(8, 'Argentina', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Flag_of_Argentina.svg/2000px-Flag_of_Argentina.svg.png'),
(9, 'Brasile', 'https://www.aremitaliashop.com/1897-large/381.jpg'),
(10, 'Svizzera', 'https://www.vendita-bandiere.it/pics/svizzera-1383b.gif'),
(11, 'Messico', 'https://www.aremitaliashop.com/1952-thickbox/patch-bandiera-messico-termoadesive.jpg'),
(12, 'Germania', 'https://www.aremitaliashop.com/1803-large/300.jpg'),
(13, 'Inghilterra', 'https://www.vendita-bandiere.it/media/catalog/product/cache/5/image/1500x1500/d85928ae9244e89f5b12e4bae4295607/1/4/bandiera-inghilterra-st-george-30-x-45-cm.png'),
(14, 'Belgio', 'https://www.cosepercrescere.it/wp-content/uploads/2014/07/BELGIO.jpg'),
(15, 'Giappone', 'https://www.vendita-bandiere.it/media/catalog/product/cache/5/image/1500x1500/dfb643cb520904239fd2b94f55776751/1/5/bandiera-giappone-30-x-45-cm.png'),
(16, 'Colombia', 'https://www.aremitaliashop.com/1899-thickbox/patch-bandiera-colombia-termoadesive.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `studenti`
--

CREATE TABLE `studenti` (
  `idStudente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `studenti`
--

INSERT INTO `studenti` (`idStudente`, `nome`, `password`) VALUES
(1, 'alex', 'alex'),
(2, 'fabio', 'fabio'),
(3, 'alberto', 'alberto'),
(4, 'giovanni', 'giovanni'),
(5, 'riccardo', 'riccardo'),
(6, 'jean', 'jean'),
(7, 'davide', 'davide'),
(8, 'giulio', 'giulio'),
(9, 'edoardo', 'edoardo'),
(10, 'simone', 'simone'),
(11, 'lorenzo', 'lorenzo'),
(12, 'claudio', 'claudio'),
(13, 'gabriel', 'gabriel'),
(14, 'alessandro', 'alessandro'),
(16, 'patrizia', 'patrizia');

-- --------------------------------------------------------

--
-- Struttura della tabella `voti`
--

CREATE TABLE `voti` (
  `idStud` int(11) NOT NULL,
  `idSquad` int(11) NOT NULL,
  `posizione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `voti`
--

INSERT INTO `voti` (`idStud`, `idSquad`, `posizione`) VALUES
(1, 3, 2),
(1, 5, 4),
(1, 9, 1),
(1, 14, 3),
(3, 6, 2),
(3, 7, 4),
(3, 13, 3),
(3, 15, 1),
(4, 9, 1),
(4, 12, 2),
(4, 15, 4),
(4, 16, 3),
(6, 8, 2),
(6, 9, 1),
(6, 10, 3),
(6, 15, 4),
(8, 5, 4),
(8, 11, 3),
(8, 13, 2),
(8, 14, 1),
(13, 4, 2),
(13, 5, 1),
(13, 12, 3),
(13, 14, 4),
(14, 5, 2),
(14, 9, 1),
(14, 12, 3),
(14, 15, 4),
(16, 2, 3),
(16, 8, 2),
(16, 9, 1),
(16, 15, 4);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `squadre`
--
ALTER TABLE `squadre`
  ADD PRIMARY KEY (`idSquadra`);

--
-- Indici per le tabelle `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`idStudente`);

--
-- Indici per le tabelle `voti`
--
ALTER TABLE `voti`
  ADD PRIMARY KEY (`idStud`,`idSquad`,`posizione`),
  ADD KEY `idSquad` (`idSquad`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `squadre`
--
ALTER TABLE `squadre`
  MODIFY `idSquadra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `studenti`
--
ALTER TABLE `studenti`
  MODIFY `idStudente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `voti`
--
ALTER TABLE `voti`
  ADD CONSTRAINT `voti_ibfk_1` FOREIGN KEY (`idStud`) REFERENCES `studenti` (`idStudente`),
  ADD CONSTRAINT `voti_ibfk_2` FOREIGN KEY (`idSquad`) REFERENCES `squadre` (`idSquadra`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
