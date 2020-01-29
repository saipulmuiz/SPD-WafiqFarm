-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2020 pada 12.31
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_peternakan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ayam`
--

CREATE TABLE `tbl_ayam` (
  `id_ayam` varchar(64) NOT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ayam`
--

INSERT INTO `tbl_ayam` (`id_ayam`, `jenis`, `jumlah`, `foto`) VALUES
('5df8df7255776', 'Ayam Kalkun Super', 123, '5df8df72557761.png'),
('5df8dff094d0c', 'Ayam Petelur Majalengka', 60, '5df8dff094d0c1.png'),
('5df8ea41ef1af', 'Ayam Petelur Panjalu', 300, '5df8ea41ef1af1.png'),
('5e200eb26542f', 'Ayam Ayaman', 20, 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ayam_masuk`
--

CREATE TABLE `tbl_ayam_masuk` (
  `id_input` varchar(64) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `id_supplier` varchar(64) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `umur` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `total_harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ayam_masuk`
--

INSERT INTO `tbl_ayam_masuk` (`id_input`, `jenis`, `id_kandang`, `id_supplier`, `tgl_masuk`, `umur`, `jumlah`, `harga`, `total_harga`) VALUES
('5dee5ce5c81c6', 'Ayam Kalkun Super', 42, '489289289', '2019-12-09', 14, 90, 14500, 1305000),
('5def44fe601de', 'Ayam Kalkun Super', 42, '5829583985938', '2019-12-10', 13, 30, 13000, 390000),
('5df8cd3cf0f6f', 'Ayam Kalkun Super', 42, '489289289', '2019-12-17', 10, 120, 3500, 420000),
('5df8e02b0473d', 'Ayam Kalkun Super', 42, '4902842828', '2019-12-17', 15, 10, 4500, 45000),
('5e2c6b6f83747', 'Ayam Kalkun Super', 0, '5829583985938', '2020-01-25', 20, 20, 14000, 280000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ayam_mati`
--

CREATE TABLE `tbl_ayam_mati` (
  `id_input` varchar(64) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `id_supplier` varchar(64) NOT NULL,
  `tgl_mati` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ayam_mati`
--

INSERT INTO `tbl_ayam_mati` (`id_input`, `jenis`, `id_kandang`, `id_supplier`, `tgl_mati`, `jumlah`) VALUES
('5de9cf41445b7', 'Ayam Petelur Panjalu', 42, '489289289', '2019-12-06', 20),
('5def61e8bc216', 'Ayam Kalkun Super', 42, '489289289', '2019-12-10', 5),
('5def6273eb05f', 'Ayam Kalkun Super', 42, '489289289', '2019-12-10', 5),
('5def629d12f22', 'Ayam Kalkun Super', 42, '489289289', '2019-12-10', 5),
('5df8e25a260d2', 'Ayam Kalkun Super', 42, '489289289', '2019-12-17', 5),
('5e2c6fa67f70b', 'Ayam Kalkun Super', 42, '489289289', '2020-01-25', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_doc`
--

CREATE TABLE `tbl_doc` (
  `id_input` varchar(64) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `id_supplier` varchar(64) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `umur` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `total_harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_doc`
--

INSERT INTO `tbl_doc` (`id_input`, `jenis`, `id_supplier`, `tgl_masuk`, `umur`, `jumlah`, `harga`, `total_harga`) VALUES
('5de34263c92d4', 'DOC Broiler', '4902842828', '2019-12-01', 10, 30, 2500, 75000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kandang`
--

CREATE TABLE `tbl_kandang` (
  `id_kandang` int(11) NOT NULL,
  `nama_kandang` varchar(100) NOT NULL,
  `kapasitas` int(11) NOT NULL DEFAULT 0,
  `jml_ayam` int(11) NOT NULL DEFAULT 0,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kandang`
--

INSERT INTO `tbl_kandang` (`id_kandang`, `nama_kandang`, `kapasitas`, `jml_ayam`, `tgl_update`) VALUES
(42, 'Kandang A', 1200, 248, '2020-01-25 23:42:28'),
(43, 'Kandang B', 1000, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelola`
--

CREATE TABLE `tbl_kelola` (
  `id_kelola` int(11) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `id_pegawai` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pakan`
--

CREATE TABLE `tbl_pakan` (
  `id_pakan` varchar(64) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `id_supplier` varchar(64) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pakan`
--

INSERT INTO `tbl_pakan` (`id_pakan`, `merk`, `id_supplier`, `stok`, `tgl_update`) VALUES
('5de7310bd2bd3', 'ABX01', '4902842828', 110, '2020-01-25 23:19:10'),
('5de7d20d31551', 'ABX02', '5829583985938', 150, '2019-12-08 11:03:25'),
('5e200e3b07d0e', 'ABT01', '5e094dfd7a95f', 200, '2020-01-16 14:17:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pakan_harian`
--

CREATE TABLE `tbl_pakan_harian` (
  `id_input` varchar(64) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tgl_input` date NOT NULL,
  `waktu_input` time NOT NULL,
  `id_user` varchar(64) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pakan_harian`
--

INSERT INTO `tbl_pakan_harian` (`id_input`, `merk`, `tgl_input`, `waktu_input`, `id_user`, `id_kandang`, `jumlah`) VALUES
('5de92de62a88e', 'ABX01', '2019-12-05', '11:16:05', '5de1b2c6d81cc', 42, 20),
('5de93011261d2', 'ABX02', '2019-12-05', '23:27:45', '5de1b2c6d81cc', 43, 20),
('5de9334029638', 'ABX01', '2019-12-05', '23:41:26', '5de1b2c6d81cc', 42, 30),
('5de9334d7979e', 'ABX02', '2019-12-05', '23:41:36', '5de1b2c6d81cc', 42, 20),
('5de9337726322', 'ABX01', '2019-12-05', '23:42:22', '5de1b2c6d81cc', 43, 30),
('5dec7c55ed9e0', 'ABX02', '2019-12-08', '11:30:01', '5de1b2c6d81cc', 42, 5),
('5dec7cb398a24', 'ABX01', '2019-12-08', '11:30:14', '5de1b2c6d81cc', 42, 5),
('5dec7cd6a3193', 'ABX01', '2019-12-08', '11:31:58', '5de1b2c6d81cc', 42, 5),
('5ded0ecb3806b', 'ABX01', '2019-12-08', '21:54:55', '5de1b2c6d81cc', 42, 10),
('5e2c6a88c5c44', 'ABX01', '2020-01-25', '23:19:10', '5de1b2c6d81cc', 42, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pakan_masuk`
--

CREATE TABLE `tbl_pakan_masuk` (
  `id_input` varchar(64) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `id_supplier` varchar(64) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `total_harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pakan_masuk`
--

INSERT INTO `tbl_pakan_masuk` (`id_input`, `merk`, `id_supplier`, `tgl_masuk`, `jumlah`, `harga`, `total_harga`) VALUES
('5de73138ead97', 'ABX02', '489289289', '2019-12-04', 30, 3000, 90000),
('5de84f97debac', 'ABX02', '4902842828', '2019-12-05', 10, 3000, 30000),
('5e2c69bf96491', 'ABX01', '5e094dfd7a95f', '2020-01-25', 15, 4000, 60000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` varchar(64) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama`, `alamat`, `no_hp`) VALUES
('5ddff3e1092f2', 'Shella Sariyanti', 'Jln. Gunung Daning 44 Setiajaya Cibeureum', '0811211255'),
('5ddff5d06a50d', 'Saipul Muiz', 'St. Simpang Tiga, Sindangherang, Panumbangan.', '081312962137'),
('5de0c9ec52d76', 'Dede', 'Jalan Simpang Tiga, Dusun Warudoyong, RT.01/RW.04, Desa Sindangherang.', '940594059'),
('5e093b6f2a7ab', 'Uji', 'Sindangherang', '0894834');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` varchar(64) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `jenis_supply` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nama`, `alamat`, `no_telp`, `jenis_supply`) VALUES
('489289289', 'Shella Sariyanti', 'Jln. Gunung Daning 44 Setiajaya Cibeureum', '0811211255', 'Pakan Ayam'),
('4902842828', 'Saipul Muiz', 'St. Simpang Tiga, Sindangherang, Panumbangan.', '081312962137', 'Pakan Ayam'),
('5829583985938', 'Rizki Amalia Oktisah', 'Jln.Budi Dharma no. 69, Rt.05, Rw.01, Kecamatan Karimun', '085795769489', 'Vaksin/Vitamin'),
('5e094dfd7a95f', 'Kokom Komariah', 'Jln.Budi Dharma no. 69, Rt.05, Rw.01, Kecamatan Karimun', '08577454', 'Pakan Ayam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_telur`
--

CREATE TABLE `tbl_telur` (
  `berat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_telur`
--

INSERT INTO `tbl_telur` (`berat`, `jumlah`) VALUES
(210, 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_telur_harian2`
--

CREATE TABLE `tbl_telur_harian2` (
  `id_input` varchar(64) NOT NULL,
  `tgl_input` date NOT NULL,
  `id_user` varchar(64) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `telur_sehat` int(11) NOT NULL,
  `telur_cacat` int(11) NOT NULL,
  `kalkulasi_butir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_telur_harian2`
--

INSERT INTO `tbl_telur_harian2` (`id_input`, `tgl_input`, `id_user`, `id_kandang`, `jumlah`, `telur_sehat`, `telur_cacat`, `kalkulasi_butir`) VALUES
('5de3972395c94', '2019-12-01', '5de1b2c6d81cc', 43, 100, 50, 34, 84),
('5de770ad84a23', '2019-12-04', '5de1b2c6d81cc', 42, 50, 50, 35, 85),
('5df99def86d53', '2019-12-18', '5de1b2c6d81cc', 42, 30, 5, 25, 30),
('5e20114a8dcd9', '2020-01-16', '5de1b2c6d81cc', 42, 30, 25, 15, 40),
('5e21566fd8e06', '2020-01-17', '5de1b2c6d81cc', 42, 50, 30, 25, 55),
('5e26a3885d958', '2020-01-21', '5de1b2c6d81cc', 43, 50, 30, 35, 65),
('5e2c6afd85e59', '2020-01-25', '5de1b2c6d81cc', 42, 50, 25, 27, 52);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(64) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `level`, `foto`) VALUES
('5de1b2c6d81cc', 'Saipul Muiz', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '5de1b2c6d81cc.png'),
('5de27af394b00', 'Dede Saepulloh', 'dede12', '5df1bf9278e5fd1b897eb41e6f6e220b', 2, '5de27af394b00.jpg'),
('5e08509e7b3e4', 'Shella Sariyanti', 'ipul', '21232f297a57a5a743894a0e4a801fc3', 1, '5e08509e7b3e4.jpg'),
('5e093c66680f8', 'Kankan', 'kankan12', '21232f297a57a5a743894a0e4a801fc3', 2, '5e093c66680f8.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_vitamin`
--

CREATE TABLE `tbl_vitamin` (
  `id_vitamin` varchar(64) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `id_supplier` varchar(64) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_vitamin`
--

INSERT INTO `tbl_vitamin` (`id_vitamin`, `merk`, `id_supplier`, `stok`, `tgl_update`) VALUES
('5deae9a56b3d8', 'ADS15', '4902842828', 120, '2020-01-25 23:13:42'),
('5e20104c2f21a', 'VIT-X01', '5829583985938', 50, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_vitamin_masuk`
--

CREATE TABLE `tbl_vitamin_masuk` (
  `id_input` varchar(64) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `id_supplier` varchar(64) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `harga` bigint(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_vitamin_masuk`
--

INSERT INTO `tbl_vitamin_masuk` (`id_input`, `merk`, `id_supplier`, `tgl_masuk`, `harga`, `jumlah`, `total_harga`) VALUES
('5deaecb0b511e', 'Senorita12', '4902842828', '2019-12-07', 3000, 30, 90000),
('5defb3922f3e7', 'Senorita12', '4902842828', '2019-12-10', 3000, 10, 30000),
('5defb478b1dad', 'Senorita12', '489289289', '2019-12-10', 3000, 3, 9000),
('5e2c65fe3c0e3', 'ADS15', '489289289', '2020-01-25', 25000, 20, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_vitamin_pakai`
--

CREATE TABLE `tbl_vitamin_pakai` (
  `id_input` varchar(64) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tgl_input` date NOT NULL,
  `waktu_input` time NOT NULL,
  `id_user` varchar(64) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_vitamin_pakai`
--

INSERT INTO `tbl_vitamin_pakai` (`id_input`, `merk`, `tgl_input`, `waktu_input`, `id_user`, `id_kandang`, `jumlah`) VALUES
('5deaf83a46188', 'Senorita12', '2019-12-07', '07:54:08', '5de1b2c6d81cc', 42, 30),
('5defb65054b70', 'Senorita12', '2019-12-10', '22:14:14', '5de1b2c6d81cc', 42, 2),
('5e2c6780b1c59', 'ADS15', '2020-01-25', '23:05:22', '5de1b2c6d81cc', 42, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_ayam`
--
ALTER TABLE `tbl_ayam`
  ADD PRIMARY KEY (`id_ayam`);

--
-- Indeks untuk tabel `tbl_ayam_masuk`
--
ALTER TABLE `tbl_ayam_masuk`
  ADD PRIMARY KEY (`id_input`);

--
-- Indeks untuk tabel `tbl_ayam_mati`
--
ALTER TABLE `tbl_ayam_mati`
  ADD PRIMARY KEY (`id_input`);

--
-- Indeks untuk tabel `tbl_doc`
--
ALTER TABLE `tbl_doc`
  ADD PRIMARY KEY (`id_input`),
  ADD KEY `fk_idsup_doc` (`id_supplier`);

--
-- Indeks untuk tabel `tbl_kandang`
--
ALTER TABLE `tbl_kandang`
  ADD PRIMARY KEY (`id_kandang`);

--
-- Indeks untuk tabel `tbl_kelola`
--
ALTER TABLE `tbl_kelola`
  ADD PRIMARY KEY (`id_kelola`),
  ADD KEY `fk_idkandang` (`id_kandang`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `tbl_pakan`
--
ALTER TABLE `tbl_pakan`
  ADD PRIMARY KEY (`id_pakan`),
  ADD KEY `fk_idsup_pakan` (`id_supplier`);

--
-- Indeks untuk tabel `tbl_pakan_harian`
--
ALTER TABLE `tbl_pakan_harian`
  ADD PRIMARY KEY (`id_input`),
  ADD KEY `fk_kandang2` (`id_kandang`),
  ADD KEY `id_user` (`id_user`,`id_kandang`) USING BTREE;

--
-- Indeks untuk tabel `tbl_pakan_masuk`
--
ALTER TABLE `tbl_pakan_masuk`
  ADD PRIMARY KEY (`id_input`),
  ADD KEY `fk_idsup_pakan` (`id_supplier`);

--
-- Indeks untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tbl_vitamin`
--
ALTER TABLE `tbl_vitamin`
  ADD PRIMARY KEY (`id_vitamin`),
  ADD KEY `fk_idsup_pakan` (`id_supplier`);

--
-- Indeks untuk tabel `tbl_vitamin_masuk`
--
ALTER TABLE `tbl_vitamin_masuk`
  ADD PRIMARY KEY (`id_input`),
  ADD KEY `fk_idsup_vitamin` (`id_supplier`);

--
-- Indeks untuk tabel `tbl_vitamin_pakai`
--
ALTER TABLE `tbl_vitamin_pakai`
  ADD PRIMARY KEY (`id_input`),
  ADD KEY `fk_kandang2` (`id_kandang`),
  ADD KEY `id_user` (`id_user`,`id_kandang`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_kandang`
--
ALTER TABLE `tbl_kandang`
  MODIFY `id_kandang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelola`
--
ALTER TABLE `tbl_kelola`
  MODIFY `id_kelola` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_doc`
--
ALTER TABLE `tbl_doc`
  ADD CONSTRAINT `fk_idsup_doc` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_supplier` (`id_supplier`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kelola`
--
ALTER TABLE `tbl_kelola`
  ADD CONSTRAINT `fk_idkandang` FOREIGN KEY (`id_kandang`) REFERENCES `tbl_kandang` (`id_kandang`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_kelola_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_pegawai` (`id_pegawai`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pakan`
--
ALTER TABLE `tbl_pakan`
  ADD CONSTRAINT `fk_idsup_pakan` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_supplier` (`id_supplier`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pakan_harian`
--
ALTER TABLE `tbl_pakan_harian`
  ADD CONSTRAINT `fk_kandang2` FOREIGN KEY (`id_kandang`) REFERENCES `tbl_kandang` (`id_kandang`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pakan_masuk`
--
ALTER TABLE `tbl_pakan_masuk`
  ADD CONSTRAINT `fk_idsup_pakan2` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_supplier` (`id_supplier`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_vitamin_masuk`
--
ALTER TABLE `tbl_vitamin_masuk`
  ADD CONSTRAINT `fk_idsup_vitamin` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_supplier` (`id_supplier`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
