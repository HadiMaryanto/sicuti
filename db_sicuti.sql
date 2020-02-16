-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Feb 2020 pada 11.49
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sicuti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sicuti_jabatan`
--

CREATE TABLE `sicuti_jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `jabatan_nama` varchar(225) NOT NULL,
  `jabatan_level` enum('kankemenag kab/kota','sub perencanaan','sub organisasi','sub hukum','sub informasi','sub umum','pendidikan madrasah','pendidikan keagamaan','haji dan umrah','urusan agama','penerangan agama','masyarakat kriten','masyarakat hindu','masyarakat katolik','masyarakat budha','pegawai kankemenag kab/kota','pimpinan','admin','pegawai sub perencanaan','pegawai sub organisasi','pegawai sub hukum','pegawai sub informasi','pegawai sub umum','pegawai pendidikan madrasah','pegawai pendidikan keagamaan','pegawai haji dan umrah','pegawai urusan agama','pegawai penerangan agama','pegawai masyarakat kriten','pegawai masyarakat katolik','pegawai masyarakat hindu','pegawai masyarakat budha') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sicuti_jabatan`
--

INSERT INTO `sicuti_jabatan` (`jabatan_id`, `jabatan_nama`, `jabatan_level`) VALUES
(1, 'pimpinan', 'pimpinan'),
(2, 'Kepala Kantor Kementerian Agama Kabupaten Bengkalis', ''),
(3, 'Kepala Kantor Kementerian Agama Kabupaten Indragiri Hilir', ''),
(4, 'Kepala Kantor Kementerian Agama Kabupaten Indragiri Hulu', ''),
(5, 'Kepala Sub Bagian Perencanaan dan Keuangan', 'sub perencanaan'),
(6, 'Analis Laporan Realisasi Anggaran', ''),
(7, 'Kepala Sub Bagian Organisasi, Tata Laksana, dan Kepegawaian', NULL),
(8, 'Analis Kepegawaian Madya', NULL),
(9, 'Kepala Sub Bagian Informasi dan Hubungan Masyarakat', NULL),
(10, 'Pranata Humas Muda', NULL),
(11, 'Kepala Sub Bagian Umum', NULL),
(12, 'Pengembang Sarana dan Prasarana', NULL),
(13, 'Pengembang Sarana dan Prasarana', NULL),
(14, 'Kepala Bidang Pendidikan Madrasah', NULL),
(15, 'Perencana Pertama', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sicuti_pegawai`
--

CREATE TABLE `sicuti_pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `pegawai_jabatan_id` int(11) NOT NULL,
  `pegawai_unit_id` int(11) NOT NULL,
  `pegawai_nama` varchar(225) NOT NULL,
  `pegawai_nip` varchar(25) NOT NULL,
  `pegawai_golongan` varchar(10) NOT NULL,
  `pegawai_nohp` varchar(15) NOT NULL,
  `pegawai_alamat` text NOT NULL,
  `pegawai_TMT` date NOT NULL,
  `pegawai_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sicuti_pegawai`
--

INSERT INTO `sicuti_pegawai` (`pegawai_id`, `pegawai_jabatan_id`, `pegawai_unit_id`, `pegawai_nama`, `pegawai_nip`, `pegawai_golongan`, `pegawai_nohp`, `pegawai_alamat`, `pegawai_TMT`, `pegawai_date_created`) VALUES
(1, 1, 2, 'SUTEJO SAPUTRA', '11551100566', 'IV/d', '628239138', 'jalan salak gg duri', '2018-12-15', '2019-12-01 20:50:16'),
(2, 5, 5, 'Drs. H. MULIARDI, M.Pd', '196910011997031004', 'IV/a', '2147483647', 'jalan tegal sari ujung', '2010-10-01', '2019-12-04 15:02:45'),
(3, 6, 5, 'VITRIA VIRGONORA, SE', '197908222005012009', 'IV/b', '2147483647', 'jalan satu arah', '1999-03-12', '2019-12-06 09:46:21'),
(4, 7, 6, 'H. EDI TASMAN, S.Ag, M.Si', '197112071997031004', 'IV/a', '2147483647', 'jalan lurus berbelok belok', '2005-03-01', '2019-12-08 19:28:13'),
(5, 8, 6, 'H. R. SUHELMI, S.Sos', '196007101986031004', 'IV/a', '2147483647', 'jalan terjalal kedalam', '2012-05-02', '2019-12-08 19:30:20'),
(6, 9, 8, 'Drs. H. EKA PURBA', '196707281997031001', 'III/d', '089523124598', 'jalan gurami 3', '2018-08-01', '2019-12-09 19:00:51'),
(7, 10, 8, 'H. SYARIANTO, S.Pd.I', '196606141986031004', 'III/d', '082395645676', 'jalan kucing air', '2012-12-09', '2019-12-09 19:02:21'),
(8, 10, 8, 'Nofrian Eka Tresna, ST', '198411172011011006', 'III/d', '082391232123', 'jalan bumi bulat', '2008-05-12', '2020-01-18 11:05:34'),
(9, 8, 10, 'Baksa Hadi', '1231231231231', 'III/a', '1111121212', 'JL durian', '2020-02-15', '2020-02-15 10:52:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sicuti_unit`
--

CREATE TABLE `sicuti_unit` (
  `unit_id` int(11) NOT NULL,
  `unit_kerja` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sicuti_unit`
--

INSERT INTO `sicuti_unit` (`unit_id`, `unit_kerja`) VALUES
(2, 'kepala'),
(3, 'Kantor Kementerian Agama Kabupaten Pelalawan'),
(4, 'Kementerian Agama Kabupaten Kepulauan Meranti'),
(5, 'Sub Bagian Perencanaan dan Keuangan'),
(6, 'Sub Bagian Organisasi, Tata Laksana, dan Kepegawaian'),
(7, 'Sub Bagian Hukum dan Kerukunan Umat Beragama'),
(8, 'Sub Bagian Informasi dan Hubungan Masyarakat'),
(9, 'Sub Bagian Umum'),
(10, 'Bidang Pendidikan Madrasah'),
(11, 'Bidang Pendidikan Agama dan Keagamaan Islam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sicuti_user`
--

CREATE TABLE `sicuti_user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(225) NOT NULL,
  `user_password` varchar(225) NOT NULL,
  `user_pegawai_id` int(11) DEFAULT NULL,
  `user_level` enum('kankemenag kab/kota','perencanaan','organisasi','hukum','informasi','umum','pendidikan madrasah','pendidikan keagamaan','haji dan umrah','urusan agama','penerangan agama','masyarakat kristen','masyarakat hindu','masyarakat katolik','masyarakat budha','pegawai kankemenag kab/kota','pimpinan','admin','pegawai sub perencanaan','pegawai sub organisasi','pegawai sub hukum','pegawai sub informasi','pegawai sub umum','pegawai pendidikan madrasah','pegawai pendidikan keagamaan','pegawai haji dan umrah','pegawai urusan agama','pegawai penerangan agama','pegawai masyarakat kristen','pegawai masyarakat katolik','pegawai masyarakat hindu','pegawai masyarakat budha') NOT NULL,
  `user_level_hubungan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sicuti_user`
--

INSERT INTO `sicuti_user` (`user_id`, `user_username`, `user_password`, `user_pegawai_id`, `user_level`, `user_level_hubungan`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'admin', ''),
(2, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 1, 'pimpinan', ''),
(3, '197908222005012009', '93730b79cba80615b3e9dc79bf154ffb', 3, 'pegawai sub perencanaan', 'perencanaan'),
(4, '196910011997031004', '965dc0a8d93a61fde225fa0c57e9fca8', 2, 'perencanaan', ''),
(5, '196007101986031004', 'dfcc80be669a60df2577c9d153091b3f', 5, 'pegawai sub organisasi', 'organisasi'),
(6, '197112071997031004', '8b2262d2c6e279bba15843cad2747742', 4, 'organisasi', ''),
(7, '196606141986031004', '0189e137792bc18dfe6b8968efc7ab56', 7, 'pegawai sub informasi', 'informasi'),
(8, '196707281997031001', '3f69779ca6a0887459853cb8ea9cf859', 6, 'informasi', ''),
(9, '198411172011011006', 'f502fb70146209da9854ce53d1a4ed44', 8, 'pegawai sub informasi', 'informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cuti`
--

CREATE TABLE `tb_cuti` (
  `cuti_id` int(11) NOT NULL,
  `cuti_pegawai_id` int(11) NOT NULL,
  `cuti_jenis` varchar(225) NOT NULL,
  `cuti_alasan` text NOT NULL,
  `cuti_tahun` year(4) NOT NULL,
  `cuti_tgl_mulai` date NOT NULL,
  `cuti_tgl_selesai` date NOT NULL,
  `cuti_selama` int(11) DEFAULT NULL,
  `cuti_status_pimpinan` enum('disetujui','tidak disetujui','belum','') NOT NULL DEFAULT 'belum',
  `cuti_status_kepala_bidang` enum('disetujui','tidak disetujui','belum','') DEFAULT 'belum',
  `cuti_tanggal_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_cuti`
--

INSERT INTO `tb_cuti` (`cuti_id`, `cuti_pegawai_id`, `cuti_jenis`, `cuti_alasan`, `cuti_tahun`, `cuti_tgl_mulai`, `cuti_tgl_selesai`, `cuti_selama`, `cuti_status_pimpinan`, `cuti_status_kepala_bidang`, `cuti_tanggal_dibuat`) VALUES
(1, 3, 'Cuti Besar', 'pulang kampung', 2019, '2019-12-09', '2019-12-13', 5, 'disetujui', 'disetujui', '2019-12-06 11:03:02'),
(94, 3, 'Cuti Tahunan', 'sfhekhoiwheioh', 2020, '2020-01-22', '2020-01-30', 7, 'disetujui', 'disetujui', '2020-01-22 18:27:37'),
(101, 5, 'Cuti Besar', 'abfkjsbflblbaklb', 2020, '2020-02-10', '2020-02-28', 15, 'disetujui', 'disetujui', '2020-02-05 12:37:28'),
(102, 5, 'Cuti Karena Alasan Penting', 'asasasaaaaasa', 2020, '2020-02-18', '2020-02-25', 6, 'disetujui', 'disetujui', '2020-02-05 13:09:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_izin`
--

CREATE TABLE `tb_izin` (
  `izin_id` int(11) NOT NULL,
  `izin_pegawai_id` int(11) NOT NULL,
  `izin_jenis` varchar(225) NOT NULL,
  `izin_perihal` text NOT NULL,
  `izin_jam_mulai` time NOT NULL,
  `izin_jam_selesai` time NOT NULL,
  `izin_tgl_pengajuan` date NOT NULL,
  `izin_selama` int(11) NOT NULL,
  `izin_status_pimpinan` enum('disetujui','belum','tidak disetujui','') NOT NULL DEFAULT 'belum',
  `izin_status_kepala_bidang` enum('disetujui','belum','tidak disetujui','') NOT NULL DEFAULT 'belum',
  `izin_tanggal_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_izin`
--

INSERT INTO `tb_izin` (`izin_id`, `izin_pegawai_id`, `izin_jenis`, `izin_perihal`, `izin_jam_mulai`, `izin_jam_selesai`, `izin_tgl_pengajuan`, `izin_selama`, `izin_status_pimpinan`, `izin_status_kepala_bidang`, `izin_tanggal_dibuat`) VALUES
(1, 3, 'Terlambat Masuk Kerja', 'mau jemput anak di kebun binatang', '10:11:00', '12:00:00', '2020-02-04', 2, 'disetujui', 'disetujui', '2020-02-03 11:15:29'),
(2, 3, 'Tidak Hadir', 'dfhslkhfslhfkshklg', '11:00:00', '01:00:00', '2020-02-03', 2, 'disetujui', 'disetujui', '2020-02-03 11:24:24'),
(3, 3, 'Pulang Sebelum Waktunya', 'dhgefgkfgwugfiweguui', '12:00:00', '15:00:00', '2020-02-05', 3, 'disetujui', 'disetujui', '2020-02-05 12:23:31'),
(4, 5, 'Terlambat Masuk Kerja', 'mengikuti acara blalaala', '08:00:00', '13:00:00', '2020-02-12', 5, 'disetujui', 'disetujui', '2020-02-12 10:49:04'),
(5, 3, 'Tidak Hadir', 'acara terlalu penting', '08:00:00', '15:00:00', '2020-02-16', 7, 'belum', 'belum', '2020-02-16 17:10:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sicuti_jabatan`
--
ALTER TABLE `sicuti_jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `sicuti_pegawai`
--
ALTER TABLE `sicuti_pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indexes for table `sicuti_unit`
--
ALTER TABLE `sicuti_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `sicuti_user`
--
ALTER TABLE `sicuti_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD PRIMARY KEY (`cuti_id`);

--
-- Indexes for table `tb_izin`
--
ALTER TABLE `tb_izin`
  ADD PRIMARY KEY (`izin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sicuti_jabatan`
--
ALTER TABLE `sicuti_jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sicuti_pegawai`
--
ALTER TABLE `sicuti_pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sicuti_unit`
--
ALTER TABLE `sicuti_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sicuti_user`
--
ALTER TABLE `sicuti_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  MODIFY `cuti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `tb_izin`
--
ALTER TABLE `tb_izin`
  MODIFY `izin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
