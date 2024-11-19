-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Nov 2024 pada 07.28
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
-- Database: `testcafe`
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
(2, 'Kopi', 'Kopi Amerika buat sigmain orang', 12000, 2, 'americano.webp'),
(3, 'Nasi Goreng Sigma', 'Nasi Goreng Terenak di Bumi', 12000, 1, 'nasi-goreng.jpg'),
(9, 'Kentang Goreng Sigma', 'Krenyes Menggoda', 10000, 3, 'kentang goreng.jpg'),
(10, 'Mie Goreng', 'Mie😋😋', 12000, 1, 'mie.jpeg'),
(11, 'Matcha Latte', 'Rasa Rumput', 15000, 2, 'matcha.webp'),
(12, 'Caramel Macchiatho', 'enak😋😋😋', 16000, 2, 'caramel-machiato.jpg'),
(13, 'Kopi Susu Gula Aren', 'Kacaw Rasaya', 12000, 2, 'kpi-gulaaren.jpeg');

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
(14, 46000, '2024-11-18 08:56:27', 'FaRIS', '23232', 'aaa', 'Credit Card'),
(15, 46000, '2024-11-18 09:19:44', 'Salman', '738251', 'ihla', 'Cash'),
(16, 90000, '2024-11-18 10:00:47', 'Imam', '0836622121', 'TOlong Cepatkan', 'Bank Transfer'),
(17, 34000, '2024-11-18 11:38:28', 'Imam', '07011212', 'Annajyaa', 'Cash'),
(18, 20000, '2024-11-19 04:18:31', 'arji', '839638', 'Kasih kriuk', 'Credit Card'),
(19, 34000, '2024-11-19 04:32:29', 'Rheza', '0836622121', 'uohaada', 'Cash');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `quantity`, `price`, `subtotal`, `nama_menu`) VALUES
(24, 14, 3, 12000, 36000, 'Kopi'),
(25, 14, 1, 10000, 10000, 'Ice Cream Sigma'),
(26, 15, 3, 12000, 36000, 'Kopi'),
(27, 15, 1, 10000, 10000, 'Ice Cream Sigma'),
(28, 16, 3, 12000, 36000, 'Kopi'),
(29, 16, 2, 12000, 24000, 'Nasi Goreng Sigma'),
(30, 16, 3, 10000, 30000, 'Kentang Goreng Sigma'),
(31, 17, 2, 12000, 24000, 'Kopi'),
(32, 17, 1, 10000, 10000, 'Kentang Goreng Sigma'),
(33, 18, 2, 10000, 20000, 'Kentang Goreng Sigma'),
(34, 19, 2, 12000, 24000, 'Kopi'),
(35, 19, 1, 10000, 10000, 'Kentang Goreng Sigma');

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
  ADD KEY `id_order` (`id_order`);

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
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
