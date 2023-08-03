-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2023 pada 16.05
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(50) NOT NULL,
  `deskripsi_event` text NOT NULL,
  `gambar_iklan` text NOT NULL,
  `gambar_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `deskripsi_event`, `gambar_iklan`, `gambar_deskripsi`) VALUES
(20, 'Tempik', 'Mambu', '13.png', 'gambar_deskripsi8.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `eventschedule`
--

CREATE TABLE `eventschedule` (
  `id_schedule` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `tanggal_event` date NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `eventschedule`
--

INSERT INTO `eventschedule` (`id_schedule`, `id_event`, `tanggal_event`, `lokasi`) VALUES
(3, 20, '2023-08-10', 'Jalan tempik\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `eventseat`
--

CREATE TABLE `eventseat` (
  `id_seat` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `seatZone` varchar(20) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `eventseat`
--

INSERT INTO `eventseat` (`id_seat`, `id_event`, `id_schedule`, `seatZone`, `price`) VALUES
(2, 20, 3, 'CA1', 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_orde` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `id_seat` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `eventschedule`
--
ALTER TABLE `eventschedule`
  ADD PRIMARY KEY (`id_schedule`),
  ADD KEY `id_event` (`id_event`);

--
-- Indeks untuk tabel `eventseat`
--
ALTER TABLE `eventseat`
  ADD PRIMARY KEY (`id_seat`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_schedule` (`id_schedule`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orde`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_schedule` (`id_schedule`),
  ADD KEY `id_seat` (`id_seat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `eventschedule`
--
ALTER TABLE `eventschedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `eventseat`
--
ALTER TABLE `eventseat`
  MODIFY `id_seat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orde` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `eventschedule`
--
ALTER TABLE `eventschedule`
  ADD CONSTRAINT `eventschedule_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`);

--
-- Ketidakleluasaan untuk tabel `eventseat`
--
ALTER TABLE `eventseat`
  ADD CONSTRAINT `eventseat_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`),
  ADD CONSTRAINT `eventseat_ibfk_2` FOREIGN KEY (`id_schedule`) REFERENCES `eventschedule` (`id_schedule`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_schedule`) REFERENCES `eventschedule` (`id_schedule`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_seat`) REFERENCES `eventseat` (`id_seat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
