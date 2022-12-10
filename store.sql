-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: dec. 10, 2022 la 01:01 PM
-- Versiune server: 10.4.25-MariaDB
-- Versiune PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `store`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `angajati`
--

CREATE TABLE `angajati` (
  `id` int(6) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nume` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `functie` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data_angajare` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `angajati`
--

INSERT INTO `angajati` (`id`, `username`, `password`, `email`, `nume`, `functie`, `data_angajare`) VALUES
(1, 'gabiii', '0000', 'gabriela.tatar07@gmail.com', 'Tatar Gabriela', 'admin', '2022-09-01 19:48:04'),
(2, 'emiliaan', 'b61e564b', 'emilian@gmail.com', 'Emilian Mihăilescu', 'operator', '2022-09-09 19:00:04'),
(5, 'lidinu', 'e1a13c1a', 'lidia@gmail.com', 'Lidia Găbureanu ', 'call center', '2022-09-02 11:48:04'),
(6, 'deliacita', '5be0f3cb', 'delia@gmail.com', 'Delia Chiriţă', 'call center', '2022-09-02 18:18:04'),
(7, 'lidiascu', 'f0978439', 'lidia@gmail.com', 'Lidia Vîlculescu', 'programator', '2022-09-01 19:19:04'),
(8, 'andreii', 'f19d2f00', 'andrei@gmail.com', 'Andrei Manole', 'programator', '2022-09-01 19:00:08'),
(9, 'alexanta', '440b7490', 'alexandru@gmail.com', 'Alexandru Negoiță', 'designer', '2022-09-03 10:10:09'),
(10, 'monivel', '45be4a5d', 'monica@gmail.com', 'Monica Pavel', 'manager', '2022-09-01 09:10:04'),
(12, 'Alex', 'Alex07', 'alex@gmail.com', 'Alexx', '', '0000-00-00 00:00:00'),
(15, 'Vosi', '$2y$10$BhVbGl0gI9dv/', 'vosi@gmail.com', '', '', '0000-00-00 00:00:00'),
(17, 'Gabriela', 'Gabriela01', 'gabriela@gmail.com', 'Gabriela', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `clienti`
--

CREATE TABLE `clienti` (
  `id` int(6) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nume` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tara` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cod_postal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `numar_card` int(100) NOT NULL,
  `tip_card` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `numar_inregistrare` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `clienti`
--

INSERT INTO `clienti` (`id`, `username`, `password`, `nume`, `email`, `tara`, `cod_postal`, `numar_card`, `tip_card`, `numar_inregistrare`) VALUES
(1234, 'deliaG', 'f8e4ac3b', 'Delia Grigorita', 'esima@gmail.com', 'Romania', '739094 ', 55467264, 'visa', 1590),
(2345, 'andredor', '7da68c8c', 'Andrei Tudor', 'rada88@gmail.com', 'Romania', '108459', 53466192, 'visa', 2189),
(3456, 'codruttei', '39bb451a', 'Codrut Matei', 'codrut@yahoo.com', 'Romania', '524012', 34332947, 'mastercard', 3820),
(4567, 'robecu', 'b620aecb', 'Robert Andreescu', 'andreescu@yahoo.ro', 'Romania', '953820', 45396264, 'classic', 4160),
(5678, 'massiina', '80b112df', 'Massimo Farina', 'massimo@gmail.com', 'Italia', '-', 40240071, 'mastercard', 5475),
(6789, 'elizaer', '2b458a84', 'Eliza Peter ', 'eliza@gmail.com', 'Moldova', '8280 ', 37187001, 'visa', 6198),
(7891, 'juliemer', '0233dec4', 'Julie Meier', 'jmeier@gmail.com', 'Germania', '-', 44857120, 'mastercard', 7222),
(9131, 'Andreea', '$2y$10$g1lr39S.5ZuIpxrPFiUvre5', '', 'andreea@gmail.com', '', '', 0, '', 0),
(9132, 'Emil', '$2y$10$A5XB3x6E.bR26.qdL5QaJeD', '', 'emil@yahoo.ro', '', '', 0, '', 0),
(9133, 'Paul', '$2y$10$t0fymMXF1gWkhOmHbtNEnOd', '', 'paul@gmail.com', '', '', 0, '', 0),
(9134, 'Nicoleta', '$2y$10$BUKjL0h8O2iDMdoOE0ZjcOg', '', 'nicoleta@gmail.com', '', '', 0, '', 0),
(9137, 'Alin', '$2y$10$lxTBTk0OGe7HbEVPOntYEe2', '', 'alin@gmail.com', '', '', 0, '', 0),
(9138, 'Alex', '$2y$10$rozkJZLJqH0R1Ioz1i4BBen', '', 'alex@gmail.com', '', '', 0, '', 0),
(9140, 'Lavinia', '$2y$10$IjmWd.QIHknhaBhdQW6ZLeI', '', 'lavinia@gmail.com', '', '', 0, '', 0),
(9144, 'Iulian', '$2y$10$/nrnyDt9uWdTNKEHFXuZsOz', '', 'iulian@gmail.com', '', '', 0, '', 0),
(9149, 'Gabriela', 'Gabriela01', '', 'gabriela@gmail.com', '', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cos`
--

CREATE TABLE `cos` (
  `id` int(6) NOT NULL,
  `clientID` int(10) NOT NULL,
  `produsID` int(10) NOT NULL,
  `cantitate` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `cos`
--

INSERT INTO `cos` (`id`, `clientID`, `produsID`, `cantitate`) VALUES
(6, 5678, 6666, 8),
(7, 6789, 7777, 6),
(60, 7891, 7777, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produse`
--

CREATE TABLE `produse` (
  `id` int(6) NOT NULL,
  `nume` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pret` float NOT NULL,
  `imagine` text COLLATE utf8_unicode_ci NOT NULL,
  `categorie` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descriere` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `stare` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `angajatiID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `produse`
--

INSERT INTO `produse` (`id`, `nume`, `pret`, `imagine`, `categorie`, `descriere`, `stare`, `angajatiID`) VALUES
(1111, 'Dior', 557, 'parfumf2.png', 'Parfum', 'Miss Dior Eau De Parfum 50 ml', 'nou', 2),
(4444, 'Lash Paradise mascara black ', 61.95, 'mascara.png', 'Machiaj ', 'Peria specială este ideală pentru aplicare precisă, ultra catifelată și senzorială. Formulă  îmbogățită cu ulei floral. Alungește genele și accentuează privirea. Oferă un volum intens și definire genelor. Pigmenți intenși de culoare.', 'buna', 5),
(5555, 'Ulei pentru barbă ', 54.9, 'barba.png', 'Ingrijire ', 'Special creat pentru barba lungă. Netezește și protejează barba. Este ușor de aplicat, puneți 20-25 de picături în palmă și masați ușor pe barba umedă. Are o aromă plăcuta.', 'resigilat', 6),
(6666, 'Unt cu efect reparator și absorbție rapidă Body Superfood pentru corp ', 49.95, 'unt.png', 'Ingrijire ', 'Este recomandat persoanelor cu piele foarte uscată, pentru hidratarea acesteia în profunzime. Are un efect reparator și o absorptie rapidă. Formulă îmbogățită cu unt de cacao, foarte concentrat în nutrienți super hrănitori și ceramide.', 'buna', 7),
(7777, 'Rouge Velvet Ink ruj lichid  ', 77.99, 'ruj.png', 'Machiaj ', 'Aplicare precisă. Rezistență la transfer. Textură lejeră, confortabilă. Purtare îndelungată, de până la 24 de ore\r\n8 nuanțe intense ,super-saturate cu efect mat.', 'nou', 8),
(8888, 'Miracle Glow iluminator', 69.99, 'iluminator.png', 'Machiaj', 'Accentuează trăsăturile în mod natural. Strălucire delicată. Formulă ușoară și nelipicioasă. Pigmenț ce reflectă lumina.', 'resigilat', 9),
(9999, 'Serum cu vitamina C pentru față ', 45.95, 'ser.png', 'Ingrijire', 'Efect de strălucire, cu vitamina C, cu niacinamide, cu acid salicilic, cu extractul de lămâie. ', 'buna', 10),
(10012, 'Yves Saint Laurent Libre', 239, 'parfumf.png', 'Parfum', 'Un parfum floral, cu acorduri de lavandă. Pentru femeia puternică și sigură pe sine. Ideal pentru ocazii speciale.', 'nou', 2);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `angajati`
--
ALTER TABLE `angajati`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `cos`
--
ALTER TABLE `cos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produsID` (`produsID`),
  ADD KEY `clientID` (`clientID`);

--
-- Indexuri pentru tabele `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee` (`angajatiID`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `angajati`
--
ALTER TABLE `angajati`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pentru tabele `clienti`
--
ALTER TABLE `clienti`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9150;

--
-- AUTO_INCREMENT pentru tabele `cos`
--
ALTER TABLE `cos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT pentru tabele `produse`
--
ALTER TABLE `produse`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10013;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `cos`
--
ALTER TABLE `cos`
  ADD CONSTRAINT `cos_ibfk_1` FOREIGN KEY (`produsID`) REFERENCES `produse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cos_ibfk_2` FOREIGN KEY (`clientID`) REFERENCES `clienti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `produse`
--
ALTER TABLE `produse`
  ADD CONSTRAINT `produse_ibfk_1` FOREIGN KEY (`angajatiID`) REFERENCES `angajati` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
