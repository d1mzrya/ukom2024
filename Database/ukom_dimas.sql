-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 10:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukom_dimas`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(5, 'Buddha'),
(4, 'Hindu'),
(1, 'Islam'),
(3, 'Katolik'),
(6, 'Kong Hu Chu'),
(2, 'Protestan');

-- --------------------------------------------------------

--
-- Table structure for table `bagi_kelas`
--

CREATE TABLE `bagi_kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_tahunajaran` int(11) NOT NULL,
  `nis` int(15) NOT NULL,
  `no_presensi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` int(15) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` set('L','P') NOT NULL,
  `agama` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `alamat`) VALUES
(1, 1234567890, 'Budiman', 'Jakarta Selatan', '1990-06-07', 'L', 'Islam', 'Bulak Kapal'),
(3, 67890, 'Gracy', 'Bali', '1993-05-23', 'P', 'Buddha', 'Summarecon'),
(4, 345478, 'Sutisna', 'Malang', '1980-07-19', 'L', 'Katolik', 'Harapan Gading 3'),
(6, 4753845, 'Budi', 'Jakarta', '2024-03-08', 'L', 'Hindu', 'VIP');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `Id_kelas` int(11) NOT NULL,
  `id_tahunajaran` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `hari` set('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, '10 RPL 1'),
(2, '10 RPL 2'),
(3, '10 RPL 3'),
(4, '11 RPL 1'),
(5, '11 RPL 2'),
(6, '11 RPL 3'),
(7, '12 RPL 1'),
(8, '12 RPL 2'),
(9, '12 RPL 3');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `mapel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_tahunajaran` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nis` int(15) NOT NULL,
  `semester` int(1) NOT NULL,
  `nilai_iot` int(3) NOT NULL,
  `nilai_kjd` int(3) NOT NULL,
  `nilai_ddg` int(3) NOT NULL,
  `nilai_pmd` int(3) NOT NULL,
  `nilai_siskom` int(3) NOT NULL,
  `nilai_pbo` int(3) NOT NULL,
  `nilai_bd` int(3) NOT NULL,
  `nilai_pweb` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` int(15) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` set('L','P') NOT NULL,
  `kelas` varchar(12) NOT NULL,
  `agama` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `kelas`, `agama`, `alamat`) VALUES
(1, 76634, 'Isan', 'Tasikmalaya', '2006-08-17', 'L', '12 RPL 2', 'Islam', 'VIP'),
(2, 4567, 'Daffa', 'Sukabumi', '2005-05-23', 'L', '11 RPL 1', 'Protestan', 'Wisma Asri'),
(3, 345345, 'Bunga', 'Semarang', '2006-10-20', 'L', '10 RPL 2', 'Islam', 'Karang Satria'),
(4, 83463, 'Bobi', 'Bogor', '2007-11-19', 'L', '11 RPL 1', 'Kong Hu Chu', 'Perjuangan');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahunajaran` int(11) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `level`) VALUES
(1, 'Super Admin', 'admin@setting.com', '$2y$10$2BNwV3y.Jb719V4BWuVMBe9CwTPiuY8nAxskFUwMd0Cd4h7Tb..RW', 1),
(2, 'Guru', 'guru@email.com', '$2y$10$OQGWbdGldL2KsRlGHJ5TTuob3yg2WKdywbFWSFUsZxiym34uwj7TO', 2),
(3, 'Siswa', 'siswa@email.com', '$2y$10$0fsfynhow6qbxZXXW6uhJ.krJ8HVlLu1BNDMmPmulcNqseRAommtS', 3),
(4, 'Staff Admin', 'staff@setting.com', '$2y$10$m4ewmaPlNS6e3lFtL/mW9eREfveZFGI7zoErqQxeDbXJj2zPm2D16', 4),
(5, 'Admin Sekolah', 'school@sch.com', '$2y$10$9mcK8vTQ.1bgsb8vZH7TJOjiaX3qmcA5n3OCHZKg7FDprGSLQuFXy', 5),
(6, 'Orang Tua', 'parent@email.com', '$2y$10$QbnSX3hWCFnIqQctiVyy7eF0qMoHQAHSCGNxE9iNvqtcnB4Z34af2', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`),
  ADD UNIQUE KEY `agama` (`agama`);

--
-- Indexes for table `bagi_kelas`
--
ALTER TABLE `bagi_kelas`
  ADD KEY `FK_bg_kelas` (`id_kelas`),
  ADD KEY `FK_bg_tahun` (`id_tahunajaran`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `FK_guru_agama` (`agama`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD KEY `FK_jadwal_kelas` (`Id_kelas`),
  ADD KEY `FK_jadwal_tahun` (`id_tahunajaran`),
  ADD KEY `FL_jadwal_mapel` (`id_mapel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `kelas` (`kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD KEY `FK_nilai_tahun` (`id_tahunajaran`),
  ADD KEY `FK_nilai_kelas` (`id_kelas`),
  ADD KEY `FK_nilai_siswa` (`nis`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `FK_siswa_agama` (`agama`),
  ADD KEY `FK_siswa_kelas` (`kelas`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahunajaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahunajaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bagi_kelas`
--
ALTER TABLE `bagi_kelas`
  ADD CONSTRAINT `FK_bg_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `FK_bg_tahun` FOREIGN KEY (`id_tahunajaran`) REFERENCES `tahun_ajaran` (`id_tahunajaran`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `FK_guru_agama` FOREIGN KEY (`agama`) REFERENCES `agama` (`agama`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `FK_jadwal_kelas` FOREIGN KEY (`Id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `FK_jadwal_tahun` FOREIGN KEY (`id_tahunajaran`) REFERENCES `tahun_ajaran` (`id_tahunajaran`),
  ADD CONSTRAINT `FL_jadwal_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `FK_nilai_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `FK_nilai_siswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `FK_nilai_tahun` FOREIGN KEY (`id_tahunajaran`) REFERENCES `tahun_ajaran` (`id_tahunajaran`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK_siswa_agama` FOREIGN KEY (`agama`) REFERENCES `agama` (`agama`),
  ADD CONSTRAINT `FK_siswa_kelas` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
