-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2023 pada 13.18
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$mxmWRzIy5QKT2g27Ro1HxuTUT4xqyxmpY3xZ3.7gZMFekqzeyYNUu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id_cart`, `id_produk`, `id_user`, `jumlah`) VALUES
(231, 16, 0, 1),
(232, 15, 0, 4),
(239, 16, 8, 1),
(264, 22, 14, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pesan` int(50) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesan`, `nama_user`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(11, 31, 'Nauval Sutisna', 'BCA', 12000, '2023-06-19', '202306191043116485791454e0b.jpg'),
(12, 33, 'ngete', 'MANDIRI', 20000000, '2023-06-20', '2023062010555820230618175454abdulrozak.jpg'),
(13, 35, 'dasfs', 'fsfs', 22222, '2023-06-20', '2023062011121720230619072059adkafawaid.jpg'),
(14, 37, 'Nauval Khudzaifi Sutisna', 'BCA', 41000000, '2023-06-20', '20230620142653Screenshot (27).png'),
(15, 38, 'Nauval Khudzaifi Sutisna', 'BCA', 34000000, '2023-06-20', '20230620144711Screenshot (57).png'),
(16, 39, 'Action Figure', 'BRI', 27000000, '2023-06-20', '20230620144857Screenshot (27).png'),
(17, 41, 'pembeli', 'BCA', 26000000, '2023-06-21', '20230621132132350522242_771479684713583_1544329417829261166_n.jpg'),
(18, 44, 'Adit Restu Panda', 'BCA', 20000000, '2023-06-21', '20230621150655Bukti-Transfer-BCA-Mobile.jpg'),
(19, 45, 'Restuditya', 'BCA', 8000000, '2023-06-21', '20230621151058transfer bukti.png'),
(20, 46, 'Adit', 'BCA', 19000000, '2023-06-22', '2023062208185220230621151058transfer bukti.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pesan` int(10) NOT NULL,
  `id_cart` int(10) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `total_harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pesan`, `id_cart`, `id_user`, `id_produk`, `nama_produk`, `harga_produk`, `jumlah`, `total_harga`) VALUES
(231, 41, 257, 14, 25, 'Lenovo Yoga I9', 15000000, 1, 15000000),
(232, 41, 258, 14, 24, 'ASUS VivoBook 15 A516', 11000000, 1, 11000000),
(233, 42, 259, 12, 21, 'ASUS TUF Gaming FA506', 20000000, 2, 40000000),
(234, 43, 255, 13, 25, 'Lenovo Yoga I9', 15000000, 2, 30000000),
(235, 43, 260, 13, 27, 'ASUS VivoBook 14 A416', 8000000, 1, 8000000),
(236, 44, 261, 14, 21, 'ASUS TUF Gaming FA506', 20000000, 1, 20000000),
(237, 45, 263, 14, 27, 'ASUS VivoBook 14 A416', 8000000, 1, 8000000),
(238, 46, 266, 15, 26, 'Lenovo IdeaPad Slim 5', 19000000, 1, 19000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `total_harga_pesan` int(100) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Pending',
  `resi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_user`, `total_harga_pesan`, `tanggal_pesan`, `status_pembelian`, `resi`) VALUES
(41, 14, 26000000, '2023-06-20', 'LUNAS', ''),
(42, 12, 40000000, '2023-06-20', 'Pending', ''),
(43, 13, 38000000, '2023-06-20', 'Pending', ''),
(44, 14, 20000000, '2023-06-21', 'LUNAS', ''),
(45, 14, 8000000, '2023-06-21', 'LUNAS', ''),
(46, 15, 19000000, '2023-06-22', 'Dikirim', 'dsd18234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `kode`, `nama_produk`, `harga`, `gambar`) VALUES
(20, 'Lenovo', 'Lenovo Thinkpad Z16', '12000000', '64916341346ba.png'),
(21, 'AFA506', 'ASUS TUF Gaming FA506', '20000000', '6491639f274d8.png'),
(22, 'AS13', 'ASUS Zenbook S13', '17000000', '649163db614be.png'),
(24, 'AVA516', 'ASUS VivoBook 15 A516', '11000000', '6491643382091.png'),
(25, 'LYI9', 'Lenovo Yoga I9', '15000000', '6491645eca768.png'),
(26, 'LIS5', 'Lenovo IdeaPad Slim 5', '19000000', '649164874b534.png'),
(27, 'AVA516', 'ASUS VivoBook 14 A416', '8000000', '649164b50ce05.png'),
(28, 'AS', 'Laptop', '200000', '6493e90a7853a.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telepon` varchar(200) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `telepon`, `alamat`) VALUES
(12, 'nauvalsutisna003@gmail.com', '$2y$10$eca0KKmb5uyXEXC5Mh1sXOo4CAaCnYCZ4QDPGeGRdM5Gbz2kiLwbC', 'Nauval', '085779123372', 'Perumahan Permata Puri'),
(13, 'dia@gmail.com', '$2y$10$34FSCyqs3CczB7fK3htyy.Ty93nbiT..icQX/b/QQQOo1X0AyfJ1S', 'ephesian jateng', '092272772', 'salatiga bukan salahdua'),
(14, 'aku@gmail.com', '$2y$10$6TfjYl1l.CCFBvYp.mux8OXz/../ifWLfmCh80mwArVEy94oJlMQ2', 'Indra Fias', '08925241718', 'Triharho Gemuh'),
(15, 'kelompok1@gmail.com', '$2y$10$kjV92khM5YmqKhWJWNKyNOuk.4HJWOtNoCnWbb18LY8otSHregdEq', 'Kelompok 1', '09802900210', 'Semarang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
