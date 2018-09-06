-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 04:07 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salate_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(45) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `detalji_porudzbine`
--

CREATE TABLE `detalji_porudzbine` (
  `id_detalji` int(11) NOT NULL,
  `kolicina` int(5) NOT NULL,
  `iznos_stavki` decimal(10,0) NOT NULL,
  `proizvod_idproizvod` int(11) NOT NULL,
  `porudzbina_idporudzbina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `detalji_porudzbine`
--

INSERT INTO `detalji_porudzbine` (`id_detalji`, `kolicina`, `iznos_stavki`, `proizvod_idproizvod`, `porudzbina_idporudzbina`) VALUES
(21, 3, '897', 5, 16),
(22, 4, '796', 6, 16),
(23, 3, '897', 5, 17),
(24, 4, '796', 6, 17),
(25, 1, '199', 8, 17),
(26, 3, '897', 5, 18),
(27, 4, '796', 6, 18),
(28, 1, '199', 8, 18),
(30, 1, '199', 8, 19),
(31, 1, '249', 2, 20),
(32, 1, '249', 3, 20),
(33, 1, '213123', 10, 21),
(34, 1, '199', 7, 22),
(35, 1, '199', 7, 23),
(36, 2, '398', 8, 23);

--
-- Triggers `detalji_porudzbine`
--
DELIMITER $$
CREATE TRIGGER `after_detalji_porudzbine_insert` AFTER INSERT ON `detalji_porudzbine` FOR EACH ROW BEGIN

	
	UPDATE porudzbina SET ukupan_iznos=ukupan_iznos+NEW.iznos_stavki WHERE idporudzbina=NEW.porudzbina_idporudzbina;
   
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `idkategorija` int(11) NOT NULL,
  `naziv_kategorije` varchar(45) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`idkategorija`, `naziv_kategorije`) VALUES
(1, 'Obrok Salate'),
(2, 'Desert Salate'),
(3, 'Energy Salate');

-- --------------------------------------------------------

--
-- Table structure for table `kupac`
--

CREATE TABLE `kupac` (
  `idkupac` int(11) NOT NULL,
  `ime` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `ulica_broj` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `mesto` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `post_broj` int(5) NOT NULL,
  `code` varchar(45) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kupac`
--

INSERT INTO `kupac` (`idkupac`, `ime`, `email`, `password`, `ulica_broj`, `mesto`, `post_broj`, `code`) VALUES
(1, 'Stefan Popic', 'stefan9720@gmail.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Oslobodjenja 66', 'Stanisic', 25284, '1'),
(2, 'Stefan Popic', 'demo.laravel@labs64.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Oslobodjenja 66', 'Stanisic', 25284, '1'),
(3, 'Pera Zdera', 'novi@novi.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Oslobodjenja 66', 'Stanisic', 25284, '1'),
(4, 'Bilja Bilja', 'bilja@bilja.biki', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Sandorska 12', 'Sandor', 826367, '1'),
(5, 'Bilja 2', 'bikica@biljana.biki', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Sandorska 123', 'Sandor', 12345, '1'),
(6, 'P P Njegos', 'novi2@novi.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Oslobodjenja 66', 'Stanisic', 25284, '30454da1ebdd3ba019a0344ac8a867ba'),
(7, 'Aca Lukas', 'novi@novi3.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Oslobodjenja 66', 'Stanisic', 25284, 'c994710ca98a6c2cd9e5e5c45af27038'),
(8, 'A novi bre', 'novi@novi.com2', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Oslobodjenja 66', 'Stanisic', 25284, '53500f7b39aec5f7b33e0d2e75bff92c'),
(9, 'Stefan Popic', '45a@stefan.22', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Oslobodjenja 66', 'Stanisic', 25284, '8c4253ce6aba862d5a7c61b052be34cc'),
(10, 'Stefan Popic', 'admin.laravel@labs624.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Oslobodjenja 66', 'Stanisic', 25284, '012acf8733b064290f9ba58fd5b4d9fc'),
(11, 'Stefan Popic', 'asdasd#@sad', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Oslobodjenja 66', 'Stanisic', 25284, '6dceff114e4062535de9100eb7485639'),
(12, 'asdasda das sdaad', 'novi@novi.co2323m', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Oslobodjenja 66', 'Stanisic', 25284, '1'),
(13, 'asdasda das sdaad', 'novi@novi.co2323m', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Oslobodjenja 66', 'Stanisic', 25284, 'c572a54566b0e70a98f45f5c149e99cb'),
(14, 'Najnoviji', 'novi@n23123ovi.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Oslobodjenja 66', 'Stanisic', 25284, '4a9a95ad841122d2ccdfca0c26685a06'),
(15, 'Najnoviji', 'novi@n23123ovi.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Oslobodjenja 66', 'Stanisic', 25284, '4a9a95ad841122d2ccdfca0c26685a06');

-- --------------------------------------------------------

--
-- Table structure for table `porudzbina`
--

CREATE TABLE `porudzbina` (
  `idporudzbina` int(11) NOT NULL,
  `status` enum('1','2','3') COLLATE latin1_general_ci NOT NULL,
  `broj_posiljke` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `datum_porudzbine` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `ukupan_iznos` decimal(10,0) DEFAULT NULL,
  `kupac_idkupac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `porudzbina`
--

INSERT INTO `porudzbina` (`idporudzbina`, `status`, `broj_posiljke`, `datum_porudzbine`, `ukupan_iznos`, `kupac_idkupac`) VALUES
(16, '3', 'dbfc52172f5736d1dea3a360920fad16', '2018-09-05 23:23:37', '1693', 3),
(17, '3', '73b464e05f0056a1318144668cc0883a', '2018-09-06 00:03:58', '1892', 3),
(18, '3', '80746829cfc216ef28badaf2bc9de14f', '2018-09-06 00:16:28', '1892', 3),
(19, '2', 'f57b752d509be4169be95cdb48fa52b1', '2018-09-06 01:07:59', '199', 3),
(20, '1', '1ac631f040224560a1d625fc23571599', '2018-09-06 01:13:19', '498', 3),
(21, '1', '33b0012438ad94ffe48b767a795ee509', '2018-09-06 03:26:00', '213123', 3),
(22, '1', 'f290224d924172388cf4c3ee47903813', '2018-09-06 03:34:36', '199', 3),
(23, '1', 'ee9a5f870aa774b95fffdec273d64a86', '2018-09-06 03:56:39', '597', 3);

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `idproizvod` int(11) NOT NULL,
  `naziv_proizvoda` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `opis` varchar(1000) COLLATE latin1_general_ci DEFAULT NULL,
  `stanje` enum('da','ne') COLLATE latin1_general_ci NOT NULL,
  `cena` decimal(10,0) NOT NULL,
  `tezina` decimal(10,0) NOT NULL,
  `postan` enum('da','ne') COLLATE latin1_general_ci DEFAULT NULL,
  `image` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `kategorija_idkategorija` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`idproizvod`, `naziv_proizvoda`, `opis`, `stanje`, `cena`, `tezina`, `postan`, `image`, `kategorija_idkategorija`) VALUES
(1, 'Choco Cake', 'NEKI OPIS', 'da', '249', '180', 'ne', 'images/dezert/choco_cake.jpeg', 2),
(2, 'Home Made Cake', 'FANTASTIACN OPIS', 'da', '249', '150', 'ne', 'images/dezert/home_made_cake.jpeg', 2),
(3, 'Homeroche', 'OPIS OPIS', 'da', '249', '150', 'ne', 'images/dezert/homeroche.jpeg', 2),
(4, 'Monaliza', 'MA OPIS', 'da', '249', '150', 'da', 'images/dezert/monaliza_posno.jpeg', 2),
(5, 'Cream Beam', NULL, 'da', '299', '270', 'da', 'images/obrok/cream_beam.jpeg', 1),
(6, 'Bacon Salad', NULL, 'da', '199', '320', 'ne', 'images/obrok/bacon_salad.jpeg', 1),
(7, 'Beetroot Chicken', NULL, 'da', '199', '330', 'ne', 'images/obrok/beetroot_salad.jpeg', 1),
(8, 'Chicken And Broccoli', NULL, 'da', '199', '300', 'ne', 'images/obrok/chicken_and_brokoli.jpeg', 1),
(9, 'Coolen Salad', NULL, 'da', '249', '310', 'ne', 'images/obrok/coolen_salad.jpeg', 1),
(10, 'asdasdasd', '', 'da', '213123', '1221', NULL, 'images/obrok/cream_beam.jpeg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `detalji_porudzbine`
--
ALTER TABLE `detalji_porudzbine`
  ADD PRIMARY KEY (`id_detalji`),
  ADD KEY `fk_detalji_porudzbine_proizvod1_idx` (`proizvod_idproizvod`),
  ADD KEY `fk_detalji_porudzbine_porudzbina1_idx` (`porudzbina_idporudzbina`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`idkategorija`);

--
-- Indexes for table `kupac`
--
ALTER TABLE `kupac`
  ADD PRIMARY KEY (`idkupac`);

--
-- Indexes for table `porudzbina`
--
ALTER TABLE `porudzbina`
  ADD PRIMARY KEY (`idporudzbina`),
  ADD KEY `fk_porudzbina_kupac1_idx` (`kupac_idkupac`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`idproizvod`),
  ADD KEY `fk_proizvod_kategorija1_idx` (`kategorija_idkategorija`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detalji_porudzbine`
--
ALTER TABLE `detalji_porudzbine`
  MODIFY `id_detalji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `idkategorija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kupac`
--
ALTER TABLE `kupac`
  MODIFY `idkupac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `porudzbina`
--
ALTER TABLE `porudzbina`
  MODIFY `idporudzbina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `idproizvod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detalji_porudzbine`
--
ALTER TABLE `detalji_porudzbine`
  ADD CONSTRAINT `fk_detalji_porudzbine_porudzbina1` FOREIGN KEY (`porudzbina_idporudzbina`) REFERENCES `porudzbina` (`idporudzbina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalji_porudzbine_proizvod1` FOREIGN KEY (`proizvod_idproizvod`) REFERENCES `proizvod` (`idproizvod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `porudzbina`
--
ALTER TABLE `porudzbina`
  ADD CONSTRAINT `fk_porudzbina_kupac1` FOREIGN KEY (`kupac_idkupac`) REFERENCES `kupac` (`idkupac`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `fk_proizvod_kategorija1` FOREIGN KEY (`kategorija_idkategorija`) REFERENCES `kategorija` (`idkategorija`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
