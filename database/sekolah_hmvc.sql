-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jan 2024 pada 04.37
-- Versi server: 8.0.30
-- Versi PHP: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah_hmvc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_guru`
--

CREATE TABLE `data_guru` (
  `id` int NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `bidang_keahlian` varchar(100) NOT NULL,
  `gelar` varchar(100) NOT NULL,
  `deleted` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `data_guru`
--

INSERT INTO `data_guru` (`id`, `nama_guru`, `bidang_keahlian`, `gelar`, `deleted`) VALUES
(1, 'Eliya', 'Bahasa Indonesia', 'S.Pd', 1),
(2, 'Darwis', 'Matematika', 'SP.d', 1),
(3, 'Neni', 'Bahasa Inggris', 'SP.d', 1),
(4, 'Luvita', 'Agama Islam', 'SP.d', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelajaran`
--

CREATE TABLE `data_pelajaran` (
  `id` int NOT NULL,
  `nama_pelajaran` varchar(100) NOT NULL,
  `guru_pengajar` varchar(100) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `tingkat` varchar(5) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `deleted` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `data_pelajaran`
--

INSERT INTO `data_pelajaran` (`id`, `nama_pelajaran`, `guru_pengajar`, `nama_kelas`, `tingkat`, `hari`, `jam_mulai`, `jam_selesai`, `deleted`) VALUES
(1, 'Bahasa Indonesia', 'Eliya', 'Desain Komunikasi dan Visual', 'X', 'senin', '07:15:00', '08:15:00', 2),
(2, 'PKN', 'RAAAHHH', 'Rekayasa Perangkat Lunak', 'XI', 'senin', '08:00:00', '10:00:00', 2),
(3, 'Bahasa Inggris', 'Rafli', 'Rekayasa Perangkat Lunak', 'XI', 'selasa', '07:40:00', '21:40:00', 2),
(4, 'Matematika', 'Darwis SP.d', 'Rekayasa Perangkat Lunak', 'XI', 'senin', '07:00:00', '12:00:00', 1),
(5, 'Bahasa Indonesia', 'Eliya S.Pd', 'Rekayasa Perangkat Lunak', 'XI', 'senin', '12:00:00', '13:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `tingkat` varchar(5) NOT NULL,
  `deleted` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nama_siswa`, `nama_kelas`, `tingkat`, `deleted`) VALUES
(1, 'Said Muhammad Naufal', 'Rekayasa Perangkat Lunak', 'XI', 1),
(2, 'Syauqi Bilqisthi', 'Rekayasa Perangkat Lunak', 'XI', 1),
(3, 'Arini Balqis', 'Rekayasa Perangkat Lunak', 'XI', 1),
(4, 'Danis Herlana', 'Rekayasa Perangkat Lunak', 'XI', 1),
(5, 'Harits Nakhlah Putra', 'Rekayasa Perangkat Lunak', 'XI', 1),
(6, 'Ahmad Dzakwan Mubarok', 'Teknik Komputer dan Jaringan', 'XI', 1),
(7, 'M. Jegedesen', 'Teknik Komputer dan Jaringan', 'XI', 1),
(8, 'Hanif Ananda', 'Teknik Komputer dan Jaringan', 'XI', 1),
(9, 'Muhammad Faizun Khoir', 'Desain Komunikasi dan Visual', 'XI', 1),
(10, 'Rafi Ramadan', 'Desain Komunikasi dan Visual', 'XI', 1),
(11, 'Lukmanul Hakim', 'Akuntansi', 'XI', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akun`
--

CREATE TABLE `user_akun` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipe_akun` varchar(50) NOT NULL,
  `status_aktif` int NOT NULL DEFAULT '1',
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user_akun`
--

INSERT INTO `user_akun` (`id`, `username`, `password`, `tipe_akun`, `status_aktif`, `last_update`) VALUES
(1, 'admin', '123', 'admin', 1, '2024-01-29 22:50:59'),
(2, 'said', 'was', 'siswa', 1, '2024-01-29 23:08:42'),
(3, 'Gabriel', 'toor', 'siswa', 2, '2024-01-30 14:26:14'),
(4, 'Kanti Endriati', '12345', 'guru', 1, '2024-01-31 09:29:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pelajaran`
--
ALTER TABLE `data_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_akun`
--
ALTER TABLE `user_akun`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_pelajaran`
--
ALTER TABLE `data_pelajaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_akun`
--
ALTER TABLE `user_akun`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
