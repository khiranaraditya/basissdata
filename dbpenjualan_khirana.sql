-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2025 pada 04.28
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpenjualan_khirana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tambah_produk`
--

CREATE TABLE `tambah_produk` (
  `kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tambah_produk`
--

INSERT INTO `tambah_produk` (`kategori`) VALUES
(''),
(''),
(''),
('');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbcart`
--

CREATE TABLE `tbcart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbcartitem`
--

CREATE TABLE `tbcartitem` (
  `id` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbdetailpenjualan`
--

CREATE TABLE `tbdetailpenjualan` (
  `idpenjualan` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `subtotal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpenjualan`
--

CREATE TABLE `tbpenjualan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `status` enum('pending','proses','selesai','dibatalkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbproduk`
--

CREATE TABLE `tbproduk` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbproduk`
--

INSERT INTO `tbproduk` (`id`, `nama`, `harga`, `deskripsi`, `foto`, `kategori`) VALUES
(1, 'cheescake', 6000, 'rasa yang pas dan harga yang recomend', 'cheesecake.jpg', 'manis'),
(2, 'minuman', 8000, 'minuman yang manis', 'minuman coklat.jpg', 'minuman dingin & manis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('customer','admin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`id`, `username`, `password`, `role`) VALUES
(8, 'tyaa', '$2y$10$/reZi5TXxfW5/BqENrqtQuNwQECuPFLvTWaEEsWvtsgZZ9178ujFS', 'customer'),
(25, 'ianaaaa', '$2y$10$LbotDA7X.t/Zg3pfP9Z4ZeOnvjqi0YgoVrW5GCrE4CzouMkxxDL36', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbcart`
--
ALTER TABLE `tbcart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbcartitem`
--
ALTER TABLE `tbcartitem`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbdetailpenjualan`
--
ALTER TABLE `tbdetailpenjualan`
  ADD PRIMARY KEY (`idpenjualan`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indeks untuk tabel `tbpenjualan`
--
ALTER TABLE `tbpenjualan`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id` (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbproduk`
--
ALTER TABLE `tbproduk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbcart`
--
ALTER TABLE `tbcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbdetailpenjualan`
--
ALTER TABLE `tbdetailpenjualan`
  ADD CONSTRAINT `tbdetailpenjualan_ibfk_1` FOREIGN KEY (`idproduk`) REFERENCES `tbproduk` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbpenjualan`
--
ALTER TABLE `tbpenjualan`
  ADD CONSTRAINT `tbpenjualan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tbdetailpenjualan` (`idpenjualan`),
  ADD CONSTRAINT `tbpenjualan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbuser` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
