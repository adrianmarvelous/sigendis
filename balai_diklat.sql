-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2022 at 07:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balai_diklat`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_header`
--

CREATE TABLE `booking_header` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `peserta_pria` int(10) NOT NULL,
  `peserta_wanita` int(10) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `surat_permohonan` varchar(255) NOT NULL,
  `no_srt_permohonan` varchar(255) NOT NULL,
  `tgl_srt_permohonan` date NOT NULL,
  `perihal_srt_permohonan` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_persetujuan` date DEFAULT NULL,
  `no_srt_persetujuan` varchar(255) DEFAULT NULL,
  `nip_approve` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_header`
--

INSERT INTO `booking_header` (`id`, `nama`, `email`, `telp`, `nama_instansi`, `nama_kegiatan`, `peserta_pria`, `peserta_wanita`, `tgl_mulai`, `tgl_selesai`, `surat_permohonan`, `no_srt_permohonan`, `tgl_srt_permohonan`, `perihal_srt_permohonan`, `status`, `tgl_persetujuan`, `no_srt_persetujuan`, `nip_approve`) VALUES
(1, 'tes acara', '', '', '', '', 0, 0, '2022-11-05', '2022-11-10', '', '', '0000-00-00', '', 1, NULL, NULL, NULL),
(2, 'Adrian', '', '', 'BKPSDM', 'Acara rapat', 0, 0, '2022-11-11', '2022-11-12', '75193592_aaaaaaaaaaaaaa.pdf', '', '0000-00-00', '', 1, NULL, NULL, NULL),
(3, 'Marvel', 'marvel.adrian@yahoo.com', '081216345394', 'BKPSDM', 'Acara rapat', 13, 21, '2022-12-03', '2022-12-06', '84567072_0. SK BENDAHARA 2022.pdf', '', '2022-12-01', '', 1, '2022-12-02', '896/          /436.8.4/2022', '196905101997022001'),
(4, 'Adrian Marvel Ugrasena', 'marvel.adrian@yahoo.com', '081216435394', 'BKPSDM', 'Outbond Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 23, 31, '2022-12-07', '2022-12-08', '21027509_0. SK BENDAHARA 2022.pdf', '', '0000-00-00', '', 0, NULL, NULL, NULL),
(5, 'Adrian Marvel Ugrasena', 'marvel.adrian@yahoo.com', '081216435394', 'BKPSDM', 'Outbond Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 23, 31, '2022-12-07', '2022-12-08', '41928115_0. SK BENDAHARA 2022.pdf', '896/102/436.8.4/2022', '2022-12-04', 'Permohonan Peminjangan Gedung Diklat', 1, '2022-12-05', '896/102/436.8.4/2022', '196905101997022001');

-- --------------------------------------------------------

--
-- Table structure for table `foto_kegiatan_files`
--

CREATE TABLE `foto_kegiatan_files` (
  `id` int(10) NOT NULL,
  `id_header` int(10) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto_kegiatan_files`
--

INSERT INTO `foto_kegiatan_files` (`id`, `id_header`, `foto`) VALUES
(5, 1, '7162647_WhatsApp Image 2022-12-09 at 4.18.03 PM (2).jpeg'),
(6, 1, '61063434_WhatsApp Image 2022-12-09 at 4.18.03 PM (1).jpeg'),
(7, 1, '16900125_WhatsApp Image 2022-12-09 at 4.18.03 PM.jpeg'),
(8, 1, '64729314_WhatsApp Image 2022-12-09 at 4.18.01 PM (2).jpeg'),
(9, 1, '51588465_WhatsApp Image 2022-12-09 at 4.18.01 PM (1).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `foto_kegiatan_header`
--

CREATE TABLE `foto_kegiatan_header` (
  `id` int(10) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto_kegiatan_header`
--

INSERT INTO `foto_kegiatan_header` (`id`, `nama_kegiatan`, `nama_instansi`, `deskripsi`, `tanggal`) VALUES
(1, 'tes nama', 'tes instansi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2022-12-12'),
(2, 'tes', 'tes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2022-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'adrian', '$2y$10$KKV9EREJaASz4hRvtQ1wEOdbu2bIkXzApzeGv/OuqVFiNid3C.qJe', 'admin'),
(4, 'marvel.adrian@yahoo.com', '$2y$10$Jddc78xLC.f3gryE/h2hSO.UqTtk5ah725JVnMe.22uCUDkBiXucW', 'pemohon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_header`
--
ALTER TABLE `booking_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_kegiatan_files`
--
ALTER TABLE `foto_kegiatan_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_kegiatan_header`
--
ALTER TABLE `foto_kegiatan_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_header`
--
ALTER TABLE `booking_header`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foto_kegiatan_files`
--
ALTER TABLE `foto_kegiatan_files`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
