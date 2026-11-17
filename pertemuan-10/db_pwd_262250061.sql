-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2026 at 01:31 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd_262250061`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kontak_2622500061`
--

CREATE TABLE `tbl_kontak_2622500061` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `semester` tinyint NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_pesan` varchar(20) NOT NULL,
  `minat` varchar(50) NOT NULL,
  `prodi` varchar(2) NOT NULL,
  `pesan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kontak_2622500061`
--

INSERT INTO `tbl_kontak_2622500061` (`id`, `nama`, `email`, `semester`, `tanggal`, `jenis_pesan`, `minat`, `prodi`, `pesan`) VALUES
(1, 'TITUT GIGI OMPONG', 'TITUT@atmaluhur.ac.id', 2, '2026-11-15', 'saran', 'HTML, CSS', 'SI', 'MATEMATIKA ILMU YANG MEMATIKAAAAAA,JANGAN SAMPAI GAK BELAJAR MATEMATIKA'),
(6, 'daska besek', 'daska@atmaluhur.ac.id', 2, '2026-11-17', 'saran', 'HTML, CSS', 'SI', 'aku suka dia tapi dia suka yang lain'),
(7, 'bagus spitank', 'bagus@atmaluhur.ac.id', 2, '2026-11-04', 'saran', 'HTML, CSS', 'SI', 'BAGUS SUKA SPITANK'),
(8, 'EGY DRAG', 'EGY@atmaluhur.ac.id', 2, '2026-11-03', 'saran', 'HTML, CSS', 'SI', 'EGY TUKANG DRAG'),
(9, 'PANJI PANJAT PINANG', 'PANJI@atmaluhur.ac.id', 2, '2026-11-10', 'saran', 'HTML, CSS', 'SI', 'PANJI SOSOK ASLI PANJAT POHON');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kontak_2622500061`
--
ALTER TABLE `tbl_kontak_2622500061`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kontak_2622500061`
--
ALTER TABLE `tbl_kontak_2622500061`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
