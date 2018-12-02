-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2018 pada 10.56
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memollage`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_kelas`
--

CREATE TABLE `chat_kelas` (
  `id_kelas` int(11) NOT NULL,
  `email_dosen` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `tanggal_penambahan` date NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_univ` int(11) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `id_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` int(11) NOT NULL,
  `akses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id_akses`, `akses`) VALUES
(1, 'admin'),
(2, 'dosen'),
(3, 'komisaris'),
(4, 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kelas`
--

CREATE TABLE `jadwal_kelas` (
  `id_kelas` int(11) NOT NULL,
  `email_dosen` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `tanggal_penambahan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_user`
--

CREATE TABLE `jadwal_user` (
  `email_dosen` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `nama_jadwal` varchar(100) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `tanggal_penambahan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `email_dosen` varchar(100) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `tanggal_pembuatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `id_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `Dosen` varchar(250) NOT NULL,
  `Komentar` text NOT NULL,
  `comment_status` int(1) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `Dosen`, `Komentar`, `comment_status`, `status`, `waktu`) VALUES
(1, 'jiad', 'yuhu', 1, 'hadir', '2018-06-13 00:00:00'),
(2, 'avsava', 'savsavasv', 1, 'hadir', '2018-06-13 15:19:11'),
(3, 'zik', 'zik', 1, 'tidak hadir', '2018-06-13 15:31:10'),
(4, 'aavav', 'vaav', 1, 'tidak hadir', '2018-06-13 15:32:31'),
(5, 'gilang', 'sabang', 1, 'tidak hadir', '2018-06-13 15:53:13'),
(6, 'uhuy', 'nani', 1, 'hadir', '2018-06-13 15:55:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `universitas`
--

CREATE TABLE `universitas` (
  `id` int(11) NOT NULL,
  `nama_univ` varchar(100) NOT NULL,
  `email_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `universitas`
--

INSERT INTO `universitas` (`id`, `nama_univ`, `email_at`) VALUES
(1, 'informatika_usk', 'mhs.unsyiah.ac.id');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chat_kelas`
--
ALTER TABLE `chat_kelas`
  ADD KEY `fk_id_kelas_p` (`id_kelas`),
  ADD KEY `fk_id_dosen_p` (`email_dosen`),
  ADD KEY `fk_id_user_p` (`email_user`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`email`),
  ADD KEY `fk_id_univ` (`id_univ`),
  ADD KEY `fk_id_akses` (`id_akses`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  ADD KEY `fk_id_kelas` (`id_kelas`),
  ADD KEY `fk_email_user_k` (`email_user`),
  ADD KEY `fk_email_dosen_k` (`email_dosen`);

--
-- Indeks untuk tabel `jadwal_user`
--
ALTER TABLE `jadwal_user`
  ADD KEY `fk_email_dosen_j` (`email_dosen`),
  ADD KEY `fk_email_user_j` (`email_user`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `fk_email_dosen` (`email_dosen`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`email`),
  ADD KEY `fk_id_hak_akses` (`id_akses`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indeks untuk tabel `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_at` (`email_at`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `chat_kelas`
--
ALTER TABLE `chat_kelas`
  ADD CONSTRAINT `fk_id_dosen_p` FOREIGN KEY (`email_dosen`) REFERENCES `dosen` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_kelas_p` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user_p` FOREIGN KEY (`email_user`) REFERENCES `mahasiswa` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `fk_id_akses` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`),
  ADD CONSTRAINT `fk_id_univ` FOREIGN KEY (`id_univ`) REFERENCES `universitas` (`id`);

--
-- Ketidakleluasaan untuk tabel `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  ADD CONSTRAINT `fk_email_dosen_k` FOREIGN KEY (`email_dosen`) REFERENCES `dosen` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_email_user_k` FOREIGN KEY (`email_user`) REFERENCES `mahasiswa` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_user`
--
ALTER TABLE `jadwal_user`
  ADD CONSTRAINT `fk_email_dosen_j` FOREIGN KEY (`email_dosen`) REFERENCES `dosen` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_email_user_j` FOREIGN KEY (`email_user`) REFERENCES `mahasiswa` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk_email_dosen` FOREIGN KEY (`email_dosen`) REFERENCES `dosen` (`email`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_id_hak_akses` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
