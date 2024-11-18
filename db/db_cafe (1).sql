-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 17 Nov 2024 pada 14.08
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cafe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id_category`, `name`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Snack');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` bigint(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `name`, `description`, `price`, `category_id`, `image`) VALUES
(2, 'Kopi', 'Kopi Amerika buat sigmain orang', 12000, 1, 'americano.webp'),
(3, 'Nasi Goreng Sigma', 'Nasi Goreng Membuat Orang Sakaw Menjadi Alpha Sigma Male', 12000, 1, 'nasi-goreng.jpg'),
(7, 'Ice Cream Sigma', 'FREZEEE', 10000, 2, 'isee.jpeg'),
(8, 'Kentang Goreng Sigma', 'Kriuk Krenyes', 10000, 3, 'kentang.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `total_amount` int(20) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama_pemesan` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `notes` text NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_order`, `total_amount`, `order_date`, `nama_pemesan`, `no_hp`, `notes`, `jenis_pembayaran`) VALUES
(7, 48000, '2024-11-13 11:42:52', 'imam', '0836622121', 'JAWAAA', 'Cash'),
(9, 94000, '2024-11-13 11:59:41', 'FaRIS', '083565632', 'Tolong Cepatkan', 'Credit Card'),
(10, 68000, '2024-11-13 12:52:10', 'adi', '79112321', 'anjay', 'Bank Transfer'),
(11, 92000, '2024-11-13 13:14:03', 'Imam', '7', 'Es sedikit', 'Bank Transfer'),
(12, 120000, '2024-11-17 12:42:14', 'Salman', '79112321', 'Tolong Cepatka', 'Bank Transfer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_menu`, `quantity`, `price`, `subtotal`) VALUES
(11, 9, 2, 4, 12000, 48000),
(12, 9, 3, 3, 12000, 36000),
(13, 9, 7, 1, 10000, 10000),
(14, 10, 3, 4, 12000, 48000),
(15, 10, 7, 2, 10000, 20000),
(16, 11, 2, 3, 12000, 36000),
(17, 11, 3, 3, 12000, 36000),
(18, 11, 7, 2, 10000, 20000),
(19, 12, 2, 2, 12000, 24000),
(20, 12, 3, 3, 12000, 36000),
(21, 12, 7, 3, 10000, 30000),
(22, 12, 8, 3, 10000, 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id_category`);

--
-- Ketidakleluasaan untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
