-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 27, 2018 alle 12:56
-- Versione del server: 10.1.32-MariaDB
-- Versione PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mondiali`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `squadre`
--

CREATE TABLE `squadre` (
  `id_squadra` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `squadre`
--

INSERT INTO `squadre` (`id_squadra`, `nome`) VALUES
(1, 'Russia'),
(2, 'Arabia Saudita'),
(3, 'Egitto'),
(4, 'Uruguay'),
(5, 'Portogallo'),
(6, 'Spagna'),
(7, 'Marocco'),
(8, 'Iran'),
(9, 'Belgio'),
(10, 'Francia'),
(11, 'Australia'),
(12, 'Peru'),
(13, 'Danimarca'),
(14, 'Argentina'),
(15, 'Islanda'),
(16, 'Croazia'),
(17, 'Nigeria'),
(18, 'Brasile'),
(19, 'Svizzera'),
(20, 'Costa Rica'),
(21, 'Serbia'),
(22, 'Germania'),
(23, 'Messico'),
(24, 'Svezia'),
(25, 'Corea del Sud'),
(26, 'Panama'),
(27, 'Tunisia'),
(28, 'Inghilterra'),
(29, 'Polonia'),
(30, 'Senegal'),
(31, 'Colombia'),
(32, 'Giappone');

-- --------------------------------------------------------

--
-- Struttura della tabella `studenti`
--

CREATE TABLE `studenti` (
  `id_studente` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `studenti`
--

INSERT INTO `studenti` (`id_studente`, `nome`, `password`) VALUES
(1, 'Giovanni', 'Drago'),
(2, 'Daniele', 'Fanti'),
(3, 'Lorenzo', 'Senis'),
(4, 'Claudio', 'Grosso'),
(5, 'Andrea', 'Pontrandolfo'),
(6, 'Alessandro', 'Lopresti'),
(7, 'Simone', 'Russo'),
(8, 'Simone', 'Bruscolini'),
(9, 'Riccardo', 'Petti'),
(10, 'Alexandru', 'Leorda'),
(11, 'Valentina', 'Cuccu'),
(12, 'Simona', 'Greco'),
(13, 'Lorenzo', 'Scebba'),
(14, 'Gabriel', 'Paquola'),
(15, 'Mirco', 'Barison'),
(16, 'Davide', 'Dolce'),
(17, 'Emmanuel', 'Maiorana'),
(18, 'Alberto', 'Dalponte'),
(19, 'Alexandru', 'Pop'),
(20, 'Fabio', 'Stella'),
(21, 'Umberto', 'Casa'),
(22, 'Giulio', 'Madlena'),
(23, 'Elia', 'Remondino'),
(24, 'Luca', 'Fornerone'),
(25, 'JeanPierre', 'Miccoli'),
(26, 'Denerit', 'Xhafaj'),
(27, 'Edoardo', 'Pero');

-- --------------------------------------------------------

--
-- Struttura della tabella `voti`
--

CREATE TABLE `voti` (
  `id_studente` int(11) NOT NULL,
  `id_squadra` int(11) NOT NULL,
  `posizione` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `voti`
--

INSERT INTO `voti` (`id_studente`, `id_squadra`, `posizione`, `ip`) VALUES
(2, 1, 1, '::1'),
(2, 5, 1, '::1'),
(2, 6, 1, '::1'),
(2, 10, 1, '::1');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `squadre`
--
ALTER TABLE `squadre`
  ADD PRIMARY KEY (`id_squadra`);

--
-- Indici per le tabelle `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`id_studente`);

--
-- Indici per le tabelle `voti`
--
ALTER TABLE `voti`
  ADD PRIMARY KEY (`id_studente`,`id_squadra`),
  ADD KEY `id_squadra` (`id_squadra`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `squadre`
--
ALTER TABLE `squadre`
  MODIFY `id_squadra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT per la tabella `studenti`
--
ALTER TABLE `studenti`
  MODIFY `id_studente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `voti`
--
ALTER TABLE `voti`
  ADD CONSTRAINT `voti_ibfk_1` FOREIGN KEY (`id_squadra`) REFERENCES `squadre` (`id_squadra`),
  ADD CONSTRAINT `voti_ibfk_2` FOREIGN KEY (`id_studente`) REFERENCES `studenti` (`id_studente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
