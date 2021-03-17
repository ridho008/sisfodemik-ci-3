-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 17, 2021 at 03:02 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfodemik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn` int(11) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kelamin` enum('L','P') NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` int(11) NOT NULL,
  `foto_dosen` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn`, `nama_dosen`, `alamat`, `kelamin`, `email`, `telepon`, `foto_dosen`) VALUES
(1, 12345, 'Susanti M.Kom', 'Rumbai', 'P', 'susanti@gmail.com', 8656564, 'avatar-4.png'),
(2, 34543456, 'Sandhika', 'Bandung', 'P', 'dika@gmail.com', 8767651, 'avatar-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE `hubungi` (
  `id_hubungi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `pesan`, `status`) VALUES
(2, 'Harun Saputra', 'harun@gmail.com', 'Ok', 1),
(3, 'Ridho Surya', 'ciuyy12@gmail.com', 'Berhasil dikirim melalui smtp', 1),
(4, 'Juki', 'gaul@gmail.com', 'your welcome', 0);

-- --------------------------------------------------------

--
-- Table structure for table `idenditas`
--

CREATE TABLE `idenditas` (
  `id_identitas` int(11) NOT NULL,
  `nama_web` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idenditas`
--

INSERT INTO `idenditas` (`id_identitas`, `nama_web`, `alamat`, `email`, `telepon`) VALUES
(1, 'STMIK AMIK RIAU', 'Jl.Purwodadi Ujung, Pekanbaru, Riau. \r\nKecamatan Panam', 'smtik@gmail.com', 8765654);

-- --------------------------------------------------------

--
-- Table structure for table `info_kampus`
--

CREATE TABLE `info_kampus` (
  `id_info` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `judul_info` varchar(40) NOT NULL,
  `isi_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info_kampus`
--

INSERT INTO `info_kampus` (`id_info`, `icon`, `judul_info`, `isi_info`) VALUES
(1, 'fa fa-graduation-cap', 'E-Learning', 'Belajar Online'),
(2, 'fa fa-university', 'Penerimaan Mahasiswa/i Baru', 'Penerimaan Mahasiswa/Mahasiswi Baru Gelombang II Pada Tanggal 17 Agustus 2020'),
(3, 'fa fa-wallet', 'Pembayaran Uang Kuliah', 'Pembayaran Mulai Tanggal 14 Juni 2020'),
(4, 'fa fa-user-graduate', 'Jadwal Wisuda', 'Gelombang I Pada Tanggal 16 April 2023'),
(5, 'fa fa-file-invoice', 'Bimbingan Skripsi', 'Skripsi Tugas Akhir Pada Tanggal 20 Januari 2023'),
(7, 'fa fa-phone-square', 'Kontak Kami', 'TELP. (0761) 7047091, 589561\r\nHP. 08117577702');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `kode_jurusan` varchar(20) NOT NULL,
  `nama_jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `kode_jurusan`, `nama_jurusan`) VALUES
(1, 'SI', 'Sistem Informatika'),
(2, 'TI', 'Teknik Informatika'),
(3, 'MI', 'Management Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `id_tahun_aka` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kode_matkul` varchar(20) NOT NULL,
  `nilai` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id_krs`, `id_tahun_aka`, `nim`, `kode_matkul`, `nilai`) VALUES
(17, 1, '62538723', 'MKK01', 'A'),
(18, 1, '62538723', 'MKK02', 'F'),
(19, 1, '62538723', 'MKK03', 'C'),
(20, 1, '12345', 'MKK01', 'A'),
(21, 1, '54321', 'MKK02', 'A'),
(22, 1, '12345', 'MKK02', 'C'),
(23, 1, '12345', 'MKK03', 'D'),
(24, 1, '54321', 'MKK03', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `icon` varchar(10) NOT NULL,
  `judul_layanan` varchar(20) NOT NULL,
  `des_layanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `icon`, `judul_layanan`, `des_layanan`) VALUES
(1, 'fa fa-book', 'E-SKRIPSI', 'Sistem Pengolahan Tugas Akhir Mahasiswa'),
(2, 'fa fa-univ', 'Elibrary', 'Perpustakaan Online'),
(3, 'fa fa-file', 'Jurnal', 'Sains dan Teknologi Informasi'),
(4, 'fa fa-home', 'E-Learning', 'E-Learning'),
(6, 'fa fa-news', 'E-KTM', 'Kartu Tanda Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` int(12) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` int(15) NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kelamin` enum('L','P') NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama_lengkap`, `alamat`, `email`, `telepon`, `tmp_lahir`, `tgl_lahir`, `kelamin`, `id_prodi`, `foto`) VALUES
(4, 12345, 'Ridho Surya', 'Pandau Permai', 'ridho@gmail.com', 87676546, 'Pekanbaru,Kampar', '2020-09-07', 'L', 5, 'avatar-1.png'),
(5, 54321, 'Harun Saputra', 'Jl.Tranmisi', 'harun@gmail.com', 87676565, 'Jakarta, Banten', '2020-09-14', 'L', 5, 'avatar-2.png'),
(6, 9876, 'Rehan', 'JL. Handayani', 'rehan@gmail.com', 8767654, 'Bandung', '2020-09-03', 'L', 5, 'avatar-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `kode_matkul` varchar(10) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `sks` int(5) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`kode_matkul`, `nama_matkul`, `sks`, `semester`, `id_prodi`) VALUES
('MKK01', 'Algoritma Dasar', 5, 1, 5),
('MKK02', 'Programming Web', 3, 3, 5),
('MKK03', 'Agama Islam', 3, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `kode_prodi` varchar(20) NOT NULL,
  `nama_prodi` varchar(20) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `kode_prodi`, `nama_prodi`, `id_jurusan`) VALUES
(5, 'SI', 'Sistem Informasi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_aka`
--

CREATE TABLE `tahun_aka` (
  `id_tahun_aka` int(11) NOT NULL,
  `tahun_aka` varchar(20) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `status` enum('Tidak Aktif','Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_aka`
--

INSERT INTO `tahun_aka` (`id_tahun_aka`, `tahun_aka`, `semester`, `status`) VALUES
(1, '2018/2019', 'Ganjil', 'Aktif'),
(2, '2019/2020', 'Genap', 'Tidak Aktif'),
(3, '2020/2021', 'Ganjil', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_kampus`
--

CREATE TABLE `tentang_kampus` (
  `id_tentang` int(11) NOT NULL,
  `sejarah` text NOT NULL,
  `visi` varchar(150) NOT NULL,
  `misi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tentang_kampus`
--

INSERT INTO `tentang_kampus` (`id_tentang`, `sejarah`, `visi`, `misi`) VALUES
(1, 'Sekolah Tinggi Manajemen Informatika dan Komputer Amik Riau (STMIK Amik Riau) merupakan penggabungan dari dua perguruantinggi komputer pertama di Provinsi Riau, yakni Sekolah Tinggi Manajemen Informatika dan Komputer Riau (STMIK Riau) dan Akademi Manajemen Informatika Komputer Riau (AMIK Riau). Kedua perguruan tinggi ini didirikan oleh Yayasan Komputasi Riau (YKR).\r\n\r\nAMIK Riau didirikan pada tahun 1990, sebagai jawaban atas kebutuhan tenagakerja bidang komputer di Provinsi Riau, dengan jenjang pendidikan Diploma III Jurusan Manajemen Informatika (izin Mendikbud RI No.0233/0/1990). Pada 1992, AMIK Riau membuka program Diploma I (izinMendikbud RI No.0443/Dikti/Kep1992). AMIK Riau terakreditasi pada 2005 dengan SK.No.014/BAN-PT/Ak-V/DpI-III/XII/2005.\r\n\r\nSTMIK Riau didirikan pada tahun 1996 untuk menyelenggarakan jenjang pendidikan Strata I JurusanTeknikInformatika (izinMendikbud RI No.52/D/0/1996). Pada 2005, STMIK Riau terakreditasi dengan SK.No.023/BAN/-PT/Ak-IX/SI/XII/2005.\r\n\r\nUntuk meningkatan efisiensi, efektifitas, dan mutu pelayanan, pada 2006 dilakukan penggabungan kedua lembaga menjadi satu institusi, yakni STMIK Amik Riau, berdasarkan Keputusan Mendiknas RI No.40/D/O/2006 yang terdiri atas dua jurusan/program studi: Teknik Informatika (Strata I) da nManajemen Informatika (D.III). Kedua program studi ini telah terakreditasi sejak 2005.\r\n\r\nPeningkatan status akreditasi telah dilakukan untuk kedua program studipada 2011, dan hasilnya telah dikeluarkan berdasarkan Surat Keputusan Badan Akreditasi Nasional Direktur Jenderal PendidikanTinggiNomor 019/BAN-PT/Ak-XIV/S1/VIII/2011 tanggal 12 Agustus 2011 untuk Program Studi Teknik Informatika, dan Nomor 007/BAN-PT/Ak-XI/Dpl-III/VII/2011 tanggal 21 Juli 2011 untuk Program Studi ManajemenInformatika.', 'Menjadi Perguruan Tinggi Komputer Unggul di Sumatera pada 2030.', 'Menyelenggarakan ok tridharma perguruan tinggi yang berkualitas dan relevan dengan kebutuhan masyarakat.');

-- --------------------------------------------------------

--
-- Table structure for table `transkrip_nilai`
--

CREATE TABLE `transkrip_nilai` (
  `id_transkrip` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  `nilai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transkrip_nilai`
--

INSERT INTO `transkrip_nilai` (`id_transkrip`, `nim`, `kode_matkul`, `nilai`) VALUES
(2, 54321, 'MKK02', 'A'),
(3, 12345, 'MKK01', 'A'),
(4, 12345, 'MKK02', 'C'),
(5, 12345, 'MKK03', 'D'),
(6, 54321, 'MKK03', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `id_session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `level`, `blokir`, `id_session`) VALUES
(1, 'ridho123', '$2y$10$kEhM/r5STUtOUS7OUDp91.YzYLPRi1S72nrT/aUfXyHIboPqjOfMW', 'ridhosurya71@gmail.com', 'admin', 'N', '1'),
(2, 'rozi123', '$2y$10$3GabFbG9LsGlzvrJGlLgw.4sDfbiUhCKorFCccF7OKhDzEIw1s2MG', 'rozi@gmail.com', 'user', 'N', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indexes for table `idenditas`
--
ALTER TABLE `idenditas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `info_kampus`
--
ALTER TABLE `info_kampus`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kode_matkul`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `tahun_aka`
--
ALTER TABLE `tahun_aka`
  ADD PRIMARY KEY (`id_tahun_aka`);

--
-- Indexes for table `tentang_kampus`
--
ALTER TABLE `tentang_kampus`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indexes for table `transkrip_nilai`
--
ALTER TABLE `transkrip_nilai`
  ADD PRIMARY KEY (`id_transkrip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `id_hubungi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `idenditas`
--
ALTER TABLE `idenditas`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `info_kampus`
--
ALTER TABLE `info_kampus`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tahun_aka`
--
ALTER TABLE `tahun_aka`
  MODIFY `id_tahun_aka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tentang_kampus`
--
ALTER TABLE `tentang_kampus`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transkrip_nilai`
--
ALTER TABLE `transkrip_nilai`
  MODIFY `id_transkrip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON UPDATE CASCADE;

--
-- Constraints for table `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `matkul_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON UPDATE CASCADE;

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
