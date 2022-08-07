-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 04:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_daqu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter_admin`
--

CREATE TABLE `tb_dokter_admin` (
  `id` int(11) NOT NULL,
  `kta` varchar(100) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dokter_admin`
--

INSERT INTO `tb_dokter_admin` (`id`, `kta`, `nama_dokter`, `username`, `email`, `keterangan`, `password`, `last_login`) VALUES
(1, 'gigi1111', 'Suryanto Ramadhan', 'doktergigi1', 'rama@gmail.com', 'poligigi', 'd74b497cd1f374e0efba1c0a8ab1749d', 0),
(2, 'dokter1111', 'Rangga Bayu Prasetyo', 'dokterumum1', 'rangga@gmain.com', 'dokter', '128f20b0d69d3394598917d63b61a48a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_foto`
--

CREATE TABLE `tb_foto` (
  `kta` varchar(100) NOT NULL,
  `nama_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien_resepsionis`
--

CREATE TABLE `tb_pasien_resepsionis` (
  `perawatan` varchar(20) NOT NULL,
  `no_rm` varchar(100) NOT NULL,
  `no_bpjs` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `status_menikah` varchar(20) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `domisili` varchar(100) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `suhu_badan` int(11) NOT NULL,
  `sistole` int(11) NOT NULL,
  `diastole` int(11) NOT NULL,
  `poli` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `golongan_darah` varchar(5) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `nama_pengguna`, `username`, `password`, `keterangan`) VALUES
(1, 'Muksin Maghfuri', '404muksin', 'halodaqu', 'resepsionis'),
(2, 'Pardi Stark', 'starkpardi1', 'daqusehat', 'admin'),
(3, 'Suryanto Ramadhan', 'ramadhansur', 'rama123.', 'dokter'),
(4, 'Rangga Puja Asmara', 'rangga55', 'rangga123', 'lab'),
(5, 'Lisa Pink Panther', 'lisatok', 'lisa123.', 'KIA'),
(6, 'Dicky Pangestu', 'dickskuy', 'dicky123', 'poligigi'),
(7, 'Noer Melda Marissa', 'meldamarissa', 'melda123', 'farmasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_admin`
--

CREATE TABLE `tb_user_admin` (
  `id` int(11) NOT NULL,
  `kta` varchar(100) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `last_login` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_admin`
--

INSERT INTO `tb_user_admin` (`id`, `kta`, `nama_pengguna`, `email`, `username`, `password`, `keterangan`, `last_login`) VALUES
(1, 'adm123', 'Admin', 'adm.daqusehat@gmail.com', 'admin', '0192023a7bbd73250516f069df18b500', 'admin', 0),
(2, 'lab123', 'Rangga Bayu Prasetyo', 'rangga123@gmail.com', 'ranggabayu', '5f16b7574a0a4c3496731dd9398b3840', 'lab', 0),
(3, 'res123', 'Suryanto Ramadhan', 'ramadhansuryanto44@gmail.com', 'surya123', '8c3a9f08696af482a53e1dd8db0ef40f', 'resepsionis', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter_admin`
--
ALTER TABLE `tb_dokter_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pasien_resepsionis`
--
ALTER TABLE `tb_pasien_resepsionis`
  ADD PRIMARY KEY (`no_rm`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_admin`
--
ALTER TABLE `tb_user_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dokter_admin`
--
ALTER TABLE `tb_dokter_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user_admin`
--
ALTER TABLE `tb_user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
