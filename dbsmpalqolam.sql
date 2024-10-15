-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jan 2024 pada 09.50
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsmpalqolam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(15, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(21, 'dinda', '594280c6ddc94399a392934cac9d80d5'),
(30, 'fazryan', 'b80a920daeccc74e2bfe795f21b14b15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `id_keterangan` int(11) NOT NULL,
  `id_pendaftaran` varchar(15) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` varchar(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(12) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `sekolah_asal` varchar(100) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telepon` varchar(13) NOT NULL,
  `pdf_ijazah` varchar(100) NOT NULL,
  `pdf_akta` varchar(100) NOT NULL,
  `pdf_kk` varchar(100) NOT NULL,
  `pdf_ktp` varchar(100) NOT NULL,
  `pdf_nisn` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tgl_pendaftaran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nama_lengkap`, `nik`, `nisn`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `sekolah_asal`, `agama`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat`, `nomor_telepon`, `pdf_ijazah`, `pdf_akta`, `pdf_kk`, `pdf_ktp`, `pdf_nisn`, `foto`, `tgl_pendaftaran`, `status`) VALUES
('PEND0001', 'Mayasari', '3506125911198564', '0013190612', 'Perempuan', 'Tasikmalaya', '12 Agustus 2018', 'SDN 1 Kertaharja', 'Islam', 'Endang Kusuma', 'Ai Mulyati', 'Wirausaha', 'Ibu Rumah Tangga', 'Tasikmalaya', '085223424195', '../fileupload/ijazah_mayasari.pdf', '../fileupload/akta_mayasari.pdf', '../fileupload/kk_mayasari.pdf', '', '../fileupload/nisn_mayasari.pdf', '../fileupload/foto_mayasari.jpg', '2023-12-28 03:43:11', 1),
('PEND0002', 'Aditya Rofi', '3506125911198564', '0013190612', 'Laki-laki', 'Ciamis', '2 Maret 2001', 'SDN 1 Maleber', 'kristen', 'Dani Irawan', 'Sumiasih', 'PNS', 'Ibu Rumah Tangga', 'Maleber Ciamis', '085223434212', '../fileupload/ijazah_adit.pdf', '../fileupload/akta_adit.pdf', '../fileupload/kk_adit.pdf', '../fileupload/ktp_adit.pdf', '../fileupload/nisn_adit.pdf', '../fileupload/foto_adit.jpg', '2024-01-22 08:07:19', 1),
('PEND0003', 'Dewi Sri', '4320060072', '342312342', 'Perempuan', 'Banjarsari', '2 Maret 2001', 'SDN 1 Sindangraja', 'Islam', 'Dedi Kusnandang', 'Eli Sumiati', 'Guru', 'Ibu Rumah Tangga', 'Banjarsari', '085223626123', '../fileupload/ijazah_dewi.pdf', '../fileupload/akta_dewi.pdf', '../fileupload/kk_dewi.pdf', '../fileupload/ktp_dewi.pdf', '../fileupload/nisn_dewi.pdf', '../fileupload/dewi.jpeg', '2024-01-22 08:44:40', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppdb`
--

CREATE TABLE `ppdb` (
  `id` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ppdb`
--

INSERT INTO `ppdb` (`id`, `status`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_pendaftaran` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_pendaftaran`, `username`, `password`) VALUES
(3, 'PEND0001', 'Mayasari', '12345678'),
(4, 'PEND0002', 'Aditya Rofi', '12345678'),
(5, 'PEND0003', 'Dewi Sri', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id_keterangan`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `ppdb`
--
ALTER TABLE `ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `ppdb`
--
ALTER TABLE `ppdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
