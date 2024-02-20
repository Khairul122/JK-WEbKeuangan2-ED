-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2024 pada 09.41
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `pass`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `arus_kas`
--

CREATE TABLE `arus_kas` (
  `id_arus_kas` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `sumber` varchar(150) DEFAULT NULL,
  `jumlah` int(30) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `id_user` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `arus_kas`
--

INSERT INTO `arus_kas` (`id_arus_kas`, `tanggal`, `sumber`, `jumlah`, `status`, `id_user`) VALUES
(7, '2024-02-12', 'Uang Jalan', 100000, 1, 1),
(8, '2024-02-12', 'Uang Jalan', 100000, 1, 1),
(9, '2024-02-12', 'APBD', 20000, 2, 1),
(10, '2024-02-12', 'ABC', 200, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `posisi` varchar(40) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `umur` int(11) NOT NULL,
  `kontak` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `posisi`, `alamat`, `umur`, `kontak`) VALUES
(1, 'saiful', 'ketua', 'mns.aron', 19, '0888888'),
(6, 'Riza', 'Bendahara', 'Aceh', 19, '08333333333');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laba_rugi`
--

CREATE TABLE `laba_rugi` (
  `id_laba_rugi` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `sumber` varchar(100) DEFAULT NULL,
  `jumlah` int(30) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laba_rugi`
--

INSERT INTO `laba_rugi` (`id_laba_rugi`, `tanggal`, `sumber`, `jumlah`, `status`, `id_user`) VALUES
(1, '2024-02-12', 'ABC', 100, 1, 1),
(2, '2024-02-12', 'ABC', 500, 1, 1),
(3, '2024-02-12', 'ABC', 200, 2, 1),
(4, '2024-02-12', 'ABC', 100, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `neraca_saldo`
--

CREATE TABLE `neraca_saldo` (
  `id_neraca_saldo` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_akun` varchar(100) DEFAULT NULL,
  `saldo_awal_debit` int(30) DEFAULT NULL,
  `saldo_awal_kredit` int(30) DEFAULT NULL,
  `pergerakan_debit` int(30) DEFAULT NULL,
  `pergerakan_kredit` int(30) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `neraca_saldo`
--

INSERT INTO `neraca_saldo` (`id_neraca_saldo`, `tanggal`, `nama_akun`, `saldo_awal_debit`, `saldo_awal_kredit`, `pergerakan_debit`, `pergerakan_kredit`, `status`, `id_user`) VALUES
(1, '2024-02-12', 'ABC', 100, 200, 100, 200, '1', 1),
(2, '2024-02-12', 'ABC2', 100, 200, 100, 200, '2', 1),
(3, '2024-02-12', 'ABC3', 100, 200, 100, 200, '3', 1),
(4, '2024-02-12', 'ABC4', 100, 200, 100, 200, '4', 1),
(5, '2024-02-12', 'ABC5', 100, 200, 100, 200, '5', 1),
(6, '2024-02-12', 'ABC', 500, 500, 500, 500, '2', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `tgl_pemasukan` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sumber` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `tgl_pemasukan`, `jumlah`, `sumber`, `status`) VALUES
(1, '2024-01-20', 200000, 'APBD1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sumber` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `jumlah`, `sumber`, `status`) VALUES
(1, '2024-01-19', 30000, 'Beli buku12', 2),
(22, '2024-01-20', 10000, 'Uang bensin', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `arus_kas`
--
ALTER TABLE `arus_kas`
  ADD PRIMARY KEY (`id_arus_kas`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `laba_rugi`
--
ALTER TABLE `laba_rugi`
  ADD PRIMARY KEY (`id_laba_rugi`);

--
-- Indeks untuk tabel `neraca_saldo`
--
ALTER TABLE `neraca_saldo`
  ADD PRIMARY KEY (`id_neraca_saldo`);

--
-- Indeks untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `arus_kas`
--
ALTER TABLE `arus_kas`
  MODIFY `id_arus_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `laba_rugi`
--
ALTER TABLE `laba_rugi`
  MODIFY `id_laba_rugi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `neraca_saldo`
--
ALTER TABLE `neraca_saldo`
  MODIFY `id_neraca_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
