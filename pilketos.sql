-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Des 2021 pada 07.33
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pilketos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `profil`, `id_role`, `nis`, `id_kelas`, `status`, `date_created`) VALUES
(1, 'admin', '$2y$10$MYNDTmIDcexFHVHOp9woRuDEV.65Ik3vmHiSBQ2QDYHLHxSsb.cD2', 'kagura.png', 1, 17339, 1, 1, '2021-12-28 06:07:10'),
(10, 'NaufalAzizi', '$2y$10$MYNDTmIDcexFHVHOp9woRuDEV.65Ik3vmHiSBQ2QDYHLHxSsb.cD2', '33894da3677a75c38b8b9976b843ee291.jpg', 1, 17355, 1, 1, '2021-12-28 06:06:57'),
(12, 'user', '$2y$10$GxjQEedN/ej7xVBZ9sZ1UepS.vDYCJFRwPBrl8c9tBsBm3Vp5AE/S', '', 2, 17826, 12, 1, '2021-12-28 06:11:11'),
(13, 'gledis', '$2y$10$GxjQEedN/ej7xVBZ9sZ1UepS.vDYCJFRwPBrl8c9tBsBm3Vp5AE/S', '', 2, 17882, 50, 1, '2021-12-28 06:11:36'),
(14, 'jihan', '$2y$10$GxjQEedN/ej7xVBZ9sZ1UepS.vDYCJFRwPBrl8c9tBsBm3Vp5AE/S', '', 2, 17780, 11, 1, '2021-12-28 06:11:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon`
--

CREATE TABLE `calon` (
  `id_calon` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `visi` tinytext NOT NULL,
  `misi` tinytext NOT NULL,
  `moto` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `calon`
--

INSERT INTO `calon` (`id_calon`, `nis`, `id_kelas`, `visi`, `misi`, `moto`, `foto`) VALUES
(1, 17353, 1, 'Mengendalikan Kyubi', 'Menjadi Hokage', 'Jadilah top global rafaela', 'botak.jpg'),
(4, 17347, 1, 'Menyelamatkan Marley', 'Mendapatkan Kebebasan sejati', 'Sono nawa Eren Yaegah', 'btg1.jpg'),
(5, 17350, 1, 'Gacha no ampas', 'Pro player Tetris', 'Hidup seperti Dorry', 'eru.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(199) NOT NULL,
  `is_active` int(11) NOT NULL,
  `token` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `jurusan`, `is_active`, `token`) VALUES
(1, 'XII', 'Rekayasa Perangkat Lunak 1', 1, 'A12RPL11'),
(2, 'XII', 'Rekayasa Perangkat Lunak 2', 0, 'B12RPL12'),
(11, 'XII', 'Akuntansi dan Keuangan Lembaga 1', 0, 'A12AKL51'),
(12, 'XI', 'Akuntansi dan Keuangan Lembaga 2', 1, 'B12AKL52'),
(50, 'X', 'Perbankan Syariah 1', 0, 'A12PBS71'),
(61, 'Guru', 'SMKN 1 Purwokerto', 1, 'G20SMK1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `menu_name`) VALUES
(1, 'Data Management'),
(2, 'Website Management');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meta`
--

CREATE TABLE `meta` (
  `id_website` int(11) NOT NULL,
  `judul_website` varchar(50) NOT NULL,
  `deskripsi_website` tinytext NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `pembuat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meta`
--

INSERT INTO `meta` (`id_website`, `judul_website`, `deskripsi_website`, `favicon`, `logo`, `pembuat`) VALUES
(1, 'Pilketos', 'Pilketos adalah website untuk pemilihan ketua OSIS SMKN1 Purwokerto', 'favicon.png', '', 'Aimar Yudhistira');

-- --------------------------------------------------------

--
-- Struktur dari tabel `navigasi`
--

CREATE TABLE `navigasi` (
  `nav_id` int(11) NOT NULL,
  `nav_name` varchar(255) NOT NULL,
  `nav_link` varchar(255) NOT NULL,
  `nav_icon` varchar(255) NOT NULL,
  `subnav` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `navigasi`
--

INSERT INTO `navigasi` (`nav_id`, `nav_name`, `nav_link`, `nav_icon`, `subnav`, `id_menu`) VALUES
(1, 'Dashboard', 'dashboard', 'fa fa-tachometer-alt', 0, 1),
(2, 'Siswa Management', 'siswa', 'fa fa-user', 0, 1),
(3, 'Kelas Management', 'kelas', 'fa fa-school', 0, 1),
(4, 'Kandidat Management', 'kandidat', 'fa fa-user-secret', 0, 1),
(5, 'Panitia Management', 'panitia', 'fa fa-medal', 0, 1),
(7, 'Menu Management', 'menu', 'fa fa-th-large', 0, 2),
(8, 'Navigasi Management', 'navigasi', 'fa fa-th', 0, 2),
(9, 'Subnav Management', 'subnav', 'fa fa-th-list', 0, 2),
(12, 'Logout', 'auth/logouts', 'fa fa-sign-out-alt', 0, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Panitia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(20) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `ikut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `tgl_lahir`, `tempat_lahir`, `jenis_kelamin`, `id_kelas`, `ikut`) VALUES
(17339, 'Aimar Yudhistira', '2003-03-28', 'Banyumas', 'Laki - Laki', 1, 2),
(17347, 'Bintang Fadilah Ramadhan', '2003-06-03', 'Bekasi', 'Laki - Laki', 1, 2),
(17350, 'Dinda Nawang Wulan', '2004-01-11', 'Banyumas', 'Perempuan', 1, 2),
(17353, 'Ibnu Ilham Manziz', '2003-04-09', 'Banyumas', 'Laki - Laki', 1, 2),
(17355, 'Mohamad Naufal Azizi', '2003-06-15', 'Banyumas', 'Laki - Laki', 1, 2),
(17357, 'Nabil Rinda Al-Bara', '2003-09-20', 'Banyumas', 'Laki - Laki', 1, 1),
(17358, 'Nadya Andri Ananta', '2004-07-14', 'Banyumas', 'Perempuan', 1, 1),
(17359, 'Nurlailafatin', '2002-12-18', 'Banyumas', 'Perempuan', 1, 1),
(17364, 'Taufik Hidayatulloh', '2002-06-13', 'Banyumas', 'Laki - Laki', 1, 1),
(17392, 'Nur Attilah', '2003-02-26', 'Tanjung Pinang', 'Perempuan', 2, 1),
(17395, 'Riska Anggraeni Santoso', '2003-05-22', 'Banyumas', 'Perempuan', 2, 1),
(17398, 'Rizki Muhammad Naufal Irsyad', '2003-08-16', 'Banyumas', 'Laki - Laki', 2, 1),
(17774, ' ELLYNA SEPTIANING TYAS', '2003-09-12', 'Banyumas', 'Perempuan', 11, 1),
(17779, ' ISNA FEBRIYANA ', '2003-03-03', 'Banyumas', 'Perempuan', 11, 1),
(17780, 'JIHAN ADILAH', '2003-08-16', 'Banyumas', 'Perempuan', 11, 2),
(17789, ' PRIYATIN SULANDARI', '2003-07-14', 'Banyumas', 'Perempuan', 11, 1),
(17797, '  Anisa Ramadani', '2003-11-20', 'Banyumas', 'Perempuan', 12, 1),
(17813, '  Neva Laelatul Rokhmah', '2002-11-25', 'Banyumas', 'Perempuan', 12, 1),
(17826, '  Tati Yuningsih', '2003-01-01', 'Banyumas', 'Perempuan', 12, 2),
(17827, '  Tri Rejeki', '2003-03-13', 'Banyumas', 'Perempuan', 12, 1),
(17867, 'Aditia Pangestu', '2003-03-07', 'Banyumas', 'Laki - Laki', 50, 1),
(17882, 'Gledis Puspitasari', '2003-03-30', 'Banyumas', 'Perempuan', 50, 2),
(17887, 'Melani Linda Finanti', '2003-05-08', 'Banyumas', 'Perempuan', 50, 1),
(17888, 'Mufidha Firlie Fauziyah', '2003-04-17', 'Banyumas', 'Perempuan', 50, 1),
(19900905, 'R. Bogi Pranata Wiji', '1990-09-05', 'Purwokerto', 'Laki-Laki', 61, 1),
(19910425, 'Diam Khamdar Manunggal Putra', '1991-04-25', 'BANYUMAS', 'Perempuan', 61, 1),
(19950522, 'Muhammad Rizqi Abdul Aziz', '1995-05-22', 'Banyumas', 'Laki - Laki', 61, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_navigasi`
--

CREATE TABLE `sub_navigasi` (
  `sub_nav_id` int(11) NOT NULL,
  `nav_id` int(11) NOT NULL,
  `sub_nav_name` varchar(255) NOT NULL,
  `sub_nav_link` varchar(255) NOT NULL,
  `sub_nav_icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vote`
--

CREATE TABLE `vote` (
  `id_vote` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_calon` int(11) NOT NULL,
  `tgl_vote` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `done` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `calon`
--
ALTER TABLE `calon`
  ADD PRIMARY KEY (`id_calon`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`id_website`);

--
-- Indeks untuk tabel `navigasi`
--
ALTER TABLE `navigasi`
  ADD PRIMARY KEY (`nav_id`),
  ADD UNIQUE KEY `nav_link` (`nav_link`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `sub_navigasi`
--
ALTER TABLE `sub_navigasi`
  ADD PRIMARY KEY (`sub_nav_id`);

--
-- Indeks untuk tabel `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id_vote`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `calon`
--
ALTER TABLE `calon`
  MODIFY `id_calon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `meta`
--
ALTER TABLE `meta`
  MODIFY `id_website` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `navigasi`
--
ALTER TABLE `navigasi`
  MODIFY `nav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sub_navigasi`
--
ALTER TABLE `sub_navigasi`
  MODIFY `sub_nav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `vote`
--
ALTER TABLE `vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
