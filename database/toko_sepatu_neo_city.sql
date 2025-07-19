-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jan 2021 pada 21.16
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_sepatu_neo_city`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` varchar(12) NOT NULL,
  `total_harga` int(50) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pembeli` varchar(10) DEFAULT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Pending',
  `bank` varchar(100) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `no_resi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faktur`
--

INSERT INTO `faktur` (`id_faktur`, `total_harga`, `tanggal`, `id_pembeli`, `status_pembelian`, `bank`, `tanggal_pembayaran`, `bukti_pembayaran`, `no_resi`) VALUES
('NEOCITY11714', 1797974, '2020-12-29', 'CITY117', 'Selesai', 'MANDIRI', '2020-12-29', '202012291444303726392.jpg', 'ABC123456'),
('NEOCITY11756', 1500000, '2020-12-26', 'CITY117', 'Selesai', 'BCA', '2020-12-29', '202012291110383726392.jpg', 'ABC123456'),
('NEOCITY18442', 2828461, '2020-12-28', 'CITY184', 'Selesai', 'MANDIRI', '2020-12-28', '202012281555303583687.jpg', ''),
('NEOCITY18483', 11306373, '2020-12-30', 'CITY184', 'Pending', '', '0000-00-00', '', ''),
('NEOCITY53013', 1500000, '2020-12-26', 'CITY530', 'pending', '', '0000-00-00', '', ''),
('NEOCITY53084', 500000, '2020-12-26', 'CITY530', 'pending', '', '0000-00-00', '', ''),
('NEOCUST00219', 2729045, '2020-12-27', 'CUST002', 'pending', '', '0000-00-00', '', ''),
('NEOcust01606', 975959, '2020-12-27', 'cust01', 'pending', '', '0000-00-00', '', ''),
('NEOCUST94519', 4304420, '2020-12-28', 'CUST945', 'Selesai', 'MANDIRI', '2020-12-28', '20201228085706fcd6264c1e3a4f1de5c7fb56d9fde0bc.jpg', 'ABC123456'),
('NEOCUST94550', 3768791, '2020-12-29', 'CUST945', 'Selesai', 'BCA', '2020-12-29', '202012290747415220.jpg', 'ABC123456'),
('NEOCUST94556', 3804420, '2020-12-30', 'CUST945', 'Selesai', 'MANDIRI', '2020-12-30', '202012301503371.jpg', 'ABC123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_sepatu`
--

CREATE TABLE `jenis_sepatu` (
  `id_jenis` varchar(10) NOT NULL,
  `nama_jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_sepatu`
--

INSERT INTO `jenis_sepatu` (`id_jenis`, `nama_jenis`) VALUES
('jenis01', 'women'),
('jenis02', 'men');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk_sepatu`
--

CREATE TABLE `merk_sepatu` (
  `id_merk` varchar(10) NOT NULL,
  `nama_merk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `merk_sepatu`
--

INSERT INTO `merk_sepatu` (`id_merk`, `nama_merk`) VALUES
('merk01', 'adidas'),
('merk02', 'nike'),
('merk03', 'skechers');

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_sepatu`
--

CREATE TABLE `model_sepatu` (
  `id_model` varchar(10) NOT NULL,
  `nama_model` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `model_sepatu`
--

INSERT INTO `model_sepatu` (`id_model`, `nama_model`) VALUES
('model01', 'slip-on'),
('model02', 'sneaker'),
('model03', 'boots');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` varchar(7) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email_cust` varchar(100) NOT NULL,
  `password_cust` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama`, `alamat`, `no_telp`, `email_cust`, `password_cust`) VALUES
('CITY117', 'lala', 'Palembang', '0812345678', 'lala@gmail.com', '123'),
('CITY184', 'Hendery', 'Jakarta', '0812345678', 'hendery@gmail.com', 'nct'),
('CITY530', 'bila', 'nmfs', '123', 'bila@gmail.com', '123'),
('CUST002', 'cia', 'batam', '0895323208', 'cia@gmail.com', '123'),
('cust01', 'farasya', 'palembang', '12345678', 'farasya@gmail.com', '123456789'),
('CUST945', 'jae', 'neo', '123', 'jae@gmail.com', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sepatu`
--

CREATE TABLE `sepatu` (
  `id_sepatu` varchar(20) NOT NULL,
  `nama_sepatu` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_jenis` varchar(10) NOT NULL,
  `id_merk` varchar(10) NOT NULL,
  `id_model` varchar(10) NOT NULL,
  `id_ukuran` varchar(10) NOT NULL,
  `id_warna` varchar(10) NOT NULL,
  `gambar_sepatu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sepatu`
--

INSERT INTO `sepatu` (`id_sepatu`, `nama_sepatu`, `harga`, `stok`, `id_jenis`, `id_merk`, `id_model`, `id_ukuran`, `id_warna`, `gambar_sepatu`) VALUES
('S003', 'Nike Sneaker Women', 876543, 20, 'jenis01', 'merk02', 'model02', 'ukuran02', 'warna04', 'item-2.jpg'),
('S004', 'Adidas Slip-On Women', 500000, 20, 'jenis01', 'merk01', 'model01', 'ukuran03', 'warna04', 'item-15.jpg'),
('S005', 'Skechers Boots Women', 975959, 20, 'jenis01', 'merk03', 'model03', 'ukuran02', 'warna01', 'item-1.jpg'),
('S006', 'Skechers Boots Men', 975959, 20, 'jenis02', 'merk03', 'model03', 'ukuran04', 'warna06', 'item-13.jpg'),
('S007', 'Adidas Sneaker Women', 1343656, 20, 'jenis01', 'merk01', 'model02', 'ukuran03', 'warna04', 'item-3.jpg'),
('S008', 'Adidas Boots Men', 1797974, 20, 'jenis02', 'merk01', 'model03', 'ukuran05', 'warna05', 'item-6.jpg'),
('S009', 'Skechers Sneaker Women', 3768791, 17, 'jenis01', 'merk03', 'model02', 'ukuran04', 'warna04', 'item-12.jpg'),
('S010', 'Nike Boots Men', 3689100, 20, 'jenis02', 'merk02', 'model03', 'ukuran03', 'warna05', 'item-16.jpg'),
('S011', 'Nike Boots Men', 2839399, 20, 'jenis02', 'merk02', 'model03', 'ukuran04', 'warna06', 'item-17.jpg'),
('S012', 'Adidas Slip On Men', 2859929, 20, 'jenis02', 'merk01', 'model01', 'ukuran05', 'warna05', 'item-18.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_sepatu` varchar(20) NOT NULL,
  `id_faktur` varchar(12) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `jumlah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_sepatu`, `id_faktur`, `harga`, `jumlah`) VALUES
('S004', 'NEOCITY53013', '1500000', '3'),
('S004', 'NEOCITY53084', '500000', '1'),
('S004', 'NEOCITY11756', '1500000', '3'),
('S005', 'NEOCITY11756', '975959', '1'),
('S005', 'NEOcust01606', '975959', '1'),
('S005', 'NEOCUST00219', '1753086', '1'),
('S003', 'NEOCUST00219', '1753086', '2'),
('S004', 'NEOCUST94519', '2927877', '1'),
('S003', 'NEOCUST94519', '2927877', '1'),
('S006', 'NEOCUST94519', '2927877', '3'),
('S005', 'NEOCITY18442', '876543', '2'),
('S003', 'NEOCITY18442', '876543', '1'),
('S009', 'NEOCUST94550', '3768791', '1'),
('S008', 'NEOCITY11714', '1797974', '1'),
('S005', 'NEOCUST94556', '876543', '3'),
('S003', 'NEOCUST94556', '876543', '1'),
('S009', 'NEOCITY18483', '11306373', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran_sepatu`
--

CREATE TABLE `ukuran_sepatu` (
  `id_ukuran` varchar(10) NOT NULL,
  `jenis_ukuran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ukuran_sepatu`
--

INSERT INTO `ukuran_sepatu` (`id_ukuran`, `jenis_ukuran`) VALUES
('ukuran01', '36'),
('ukuran02', '38'),
('ukuran03', '40'),
('ukuran04', '41'),
('ukuran05', '42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `level`) VALUES
('farasya', 'neocity', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warna_sepatu`
--

CREATE TABLE `warna_sepatu` (
  `id_warna` varchar(10) NOT NULL,
  `jenis_warna` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `warna_sepatu`
--

INSERT INTO `warna_sepatu` (`id_warna`, `jenis_warna`) VALUES
('warna01', 'biru'),
('warna02', 'merah'),
('warna03', 'hijau'),
('warna04', 'Putih'),
('warna05', 'Hitam'),
('warna06', 'Coklat');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id_faktur`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indeks untuk tabel `jenis_sepatu`
--
ALTER TABLE `jenis_sepatu`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `merk_sepatu`
--
ALTER TABLE `merk_sepatu`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indeks untuk tabel `model_sepatu`
--
ALTER TABLE `model_sepatu`
  ADD PRIMARY KEY (`id_model`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `sepatu`
--
ALTER TABLE `sepatu`
  ADD PRIMARY KEY (`id_sepatu`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_merk` (`id_merk`),
  ADD KEY `id_model` (`id_model`),
  ADD KEY `id_ukuran` (`id_ukuran`),
  ADD KEY `id_warna` (`id_warna`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `id_sepatu` (`id_sepatu`),
  ADD KEY `id_faktur` (`id_faktur`);

--
-- Indeks untuk tabel `ukuran_sepatu`
--
ALTER TABLE `ukuran_sepatu`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `warna_sepatu`
--
ALTER TABLE `warna_sepatu`
  ADD PRIMARY KEY (`id_warna`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `faktur_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sepatu`
--
ALTER TABLE `sepatu`
  ADD CONSTRAINT `sepatu_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_sepatu` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sepatu_ibfk_2` FOREIGN KEY (`id_merk`) REFERENCES `merk_sepatu` (`id_merk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sepatu_ibfk_3` FOREIGN KEY (`id_model`) REFERENCES `model_sepatu` (`id_model`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sepatu_ibfk_4` FOREIGN KEY (`id_ukuran`) REFERENCES `ukuran_sepatu` (`id_ukuran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sepatu_ibfk_5` FOREIGN KEY (`id_warna`) REFERENCES `warna_sepatu` (`id_warna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_sepatu`) REFERENCES `sepatu` (`id_sepatu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_faktur`) REFERENCES `faktur` (`id_faktur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
