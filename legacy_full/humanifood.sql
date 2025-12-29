-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Des 2025 pada 14.46
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `humanifood`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `order_id` int(10) NOT NULL,
  `sender` varchar(15) NOT NULL,
  `text` varchar(4096) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`id`, `order_id`, `sender`, `text`, `timestamp`) VALUES
(1, 4, '0', 'aGxvbw0K', 1690861234);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `submitted` int(10) NOT NULL,
  `fullname` varchar(512) NOT NULL,
  `email` varchar(512) NOT NULL,
  `subject` varchar(512) NOT NULL,
  `message` varchar(5120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `submitted`, `fullname`, `email`, `subject`, `message`) VALUES
(1, 1690825873, 'SWJudSBNYXMndWQ=', 'aWJudW1hc3VkQGdtYWlsLmNvbQ==', 'TG9yZW0gSXBzdW0=', 'TG9yZW0gSXBzdW0gRG9sb3Igc2l0IEFtZXQ=');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `name` varchar(512) NOT NULL,
  `phone` varchar(512) NOT NULL,
  `address` mediumtext NOT NULL,
  `order_date` varchar(512) NOT NULL,
  `note` mediumtext NOT NULL,
  `total_cost` int(11) NOT NULL,
  `payment` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ordered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `name`, `phone`, `address`, `order_date`, `note`, `total_cost`, `payment`, `status`, `ordered`) VALUES
(5, 16, 1, 'RmFyb3MgRmFkaWxsYWggUm9iaW5zb24=', 'MDg5NjA0MTU0MTMy', 'SmwuSC5Tb20gUnQwMS9SdzAxIFBvbmRvayBQdWN1bmcsUG9uZG9rIEFyZW4=', 'MjAyNS0xMi0yOFQyMDozNQ==', 'c2VzdWFpIHBlc2FuYW4=', 55000000, '', 0, 1766928937);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `title` varchar(64) NOT NULL,
  `photo` varchar(64) NOT NULL,
  `content` text NOT NULL,
  `hpp` int(10) NOT NULL,
  `minimum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `slug`, `title`, `photo`, `content`, `hpp`, `minimum`) VALUES
(1, 'paket-ulang-tahun', 'Paket Ulang Tahun', 'package-two.jpg', 'PGRpdj5QYWtldCBjYXRlcmluZyB1bGFuZyB0YWh1biBhZGFsYWggbGF5YW5hbiBtZW51IHVudHVrIGhpZGFuZ2FuIGFjYXJhIHBlc3RhIHVsYW5nIHRhaHVuLiBCYWlrIHVudHVrIG1lbnUgbWFrYW5hbiB1bGFuZyB0YWh1biBkZXdhc2EgYXRhdXB1biBtZW51IG1ha2FuYW4gcGVzdGEgdWxhbmcgdGFodW4gYW5hay4gTGF5YW5hbiBjYXRlcmluZyBwZXN0YSB1bGFuZyB0YWh1biBpbmkgbWVueWVkaWFrYW4gYmVyYWdhbSBtZW51IG1ha2FuYW4gcHJhc21hbmFuIHVsYW5nIHRhaHVuIHlhbmcgdmFyaWF0aWYuIEthbWkgbWVueWVkaWFrYW4gbWVudSB1bHRhaCBhbmFrIG1hdXB1biBkZXdhc2Egc2VwZXJ0aSBtZW51IHBlc3RhIHVsYW5nIHRhaHVuIGtlIDE3IGF0YXUgcGVzdGEgdWxhbmcgdGFodW4gcGVya2F3aW5hbi48L2Rpdj48ZGl2Pjxicj48L2Rpdj48ZGl2PlJheWFrYW4gaGFyaSB1bGFuZyB0YWh1biBBbmRhIGRlbmdhbiBwZW51aCBrZWdlbWJpcmFhbiBkYW4gc2VtYW5nYXQgZGlsZW5na2FwaSBkZW5nYW4gYmVyYmFnYWkgcGlsaWhhbiBtZW51IG1ha2FuYW4geWFuZyBsZXphdCBkYW4gaGlnaWVuaXMuIFBha2V0IGNhdGVyaW5nIHVsYW5nIHRhaHVuIG1lbGF5YW5pIGRhZXJhaCBKYWthcnRhIHlhbmcgbWVsaXB1dGkgSmFrYXJ0YSBCYXJhdCwgSmFrYXJ0YSBVdGFyYSwgSmFrYXJ0YSBTZWxhdGFuLCBKYWthcnRhIFRpbXVyIGRhbiBKYWthcnRhIFB1c2F0LiBQYWtldCBwcmFzbWFuYW4gdWxhbmcgdGFodW4gaW5pIGp1Z2EgZGFwYXQgZGlwZXNhbiBkaSB3aWxheWFoIEJla2FzaSwgRGVwb2ssIFRhbmdlcmFuZywgU2VyYW5nIGRhbiBCb2dvci4gS2FtaSBqdWdhIG1lbnllZGlha2FuIG5hc2kga3VuaW5nIHNlcnRhIG5hc2kgdHVtcGVuZyBrdW5pbmcgc2ViYWdhaSBzeWFyYXQgcGVyYXlhYW4gdWx0YWguIFNlbGFpbiBpdHUgbWVudSBtYWthbmFuIHBlc3RhIGluaSBqdWdhIHRlcnNlZGlhIGRhbGFtIGZvcm1hdCBuYXNpIGJveCAvIG5hc2kga290YWsuIFNlYmFnYWkgcGVsZW5na2FwIGRlbWkgc2VtYXJha255YSBhY2FyYSwgbWVudSBwb25kb2thbiBhZGEgYmVyYWdhbSB2YXJpYXNpIG1lbnUuPC9kaXY+', 55000, 50),
(2, 'paket-catering-prasmanan', 'Paket Catering Prasmanan', 'package-one.jpg', 'PGRpdj48c3BhbiBzdHlsZT0iZm9udC1zaXplOiAxcmVtOyI+S2FtaSBtZW55ZWRpYWthbiBsYXlhbmFuIENhdGVyaW5nIFByYXNtYW5hbiBkZW5nYW4gYmFueWFrIHBpbGloYW4gbWVudSBjYXRlcmluZyB5YW5nIHNhbmdndXAga2FtaSBvbGFoIG1lbmphZGkgbWFpbiBjb3Vyc2UgdW50dWsgdGFtdS10YW11IGlzdGltZXdhIGFuZGEsIHRlbnR1bnlhIGRlbmdhbiBwZW5la2FuYW4gbXV0dSB5YW5nIHRlcmphZ2EgYmVyc2FtYSBoYXJnYSB5YW5nIG11cmFoLjwvc3Bhbj48YnI+PC9kaXY+PGRpdj48c3BhbiBzdHlsZT0iZm9udC1zaXplOiAxcmVtOyI+PGJyPjwvc3Bhbj48L2Rpdj48ZGl2PjxzcGFuIHN0eWxlPSJmb250LXNpemU6IDFyZW07Ij5LYW1pIG1lbnllZGlha2FuIGxheWFuYW4gY2F0ZXJpbmcgcHJhc21hbmFuIHlhbmcgZGlzZXN1YWlrYW4gZGVuZ2FuIGtlYnV0dWhhbiBBbmRhLCBiZXJhcGEgYmFueWFrIHlhbmcgaW5naW4gQW5kYSBiZWxhbmpha2FuLCBhcGEgeWFuZyBBbmRhIGluZ2lua2FuIGRhbiBkaSBtYW5hIHNhamEgZGkgd2lsYXlhaCBKYWthcnRhIGRhbiBCZWthc2kuPC9zcGFuPjwvZGl2PjxkaXY+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZTogMXJlbTsiPjxicj48L3NwYW4+PC9kaXY+PGRpdj48c3BhbiBzdHlsZT0iZm9udC1zaXplOiAxcmVtOyI+UGVzYW4gc2VnZXJhIG1ha2Ega2FtaSBha2FuIG1lbnlhamlrYW4gaGlkYW5nYW4gbGV6YXQgZGFuIG1lbmFyaWsgeWFuZyBkaWphbWluIG1lbWJ1YXQgaGFyaSBBbmRhIG1lbmphZGkgc2VwZXJ0aSBzZWhhcnVzbnlhOiBzYW50YWksIGJhaGFnaWEgZGFuIHRhayB0ZXJsdXBha2FuLjwvc3Bhbj48L2Rpdj4=', 50000, 100),
(7, 'paket-khitanan', 'Paket Khitanan', '427c5b335ad5b13b4964b57d9b35be41.jpg', 'PHA+TWVtaWxpa2kgYW5hayBsYWtpLWxha2kgbWVtaWxpa2kgc2F0dSBrZWJhbmdnYWFuIHRlcnNlbmRpcmkuIFRlcmxlYmloIGppa2EgdGliYSBzYWF0bnlhIGFuYWsgaGFydXMgZGlraGl0YW4gYXRhdSBkaXN1bmF0LG1ha2Egb3JhbmcgdHVhIGFrYW4gYmVyYmVzYXIgaGF0aSBtZXJheWFrYW5ueWEuIEFjYXJhIHN1bmF0YW4gcGF0dXQgZGltZXJpYWhrYW4gdW50dWsgbWVtYmVyaWthbiBrZWJhaGFnaWFhbiBidWF0IGFuYWsgeWFuZyB0ZWxhaCBzZWxlc2FpIGRpc3VuYXQuIEthcmVuYSBhbmFrIHlhbmcgZGkgc3VuYXQgcGFudGFzIG1lbXBlcm9sZWggcGVuZ2hhcmdhYW4gYXRhcyBrZWJlcmFuaWFubnlhIG1lbGFrdWthbiBraGl0YW4uPC9wPjxwPjxzcGFuIHN0eWxlPSJmb250LXNpemU6IDFyZW07Ij5LYW1pIG1lbWlsaWtpIFBha2V0IEtoaXRhbiBMZW5na2FwIGRpIEdlZHVuZyBkYW4gZGkgUnVtYWggeWFuZyB0ZXJkaXJpIGRhcmkgcGFrZXQgY2F0ZXJpbmcgdW50dWsgc3VuYXRhbiBhdGF1IGNhdGVyaW5nIGtoaXRhbmFuLCBidXNhbmEgZGFuIHRhdGEgcmlhcywgZGVrb3Jhc2ksIHBlbGFtaW5hbiwgbWMsIGZvdG8gdmlkZW8sIG9yZ2FuIHR1bmdnYWwsIHRlbmRhIGRhbiBwZXJhbGF0YW4gcGVzdGEgdW50dWsgYWNhcmEga2hpdGFuYW4gZGkgamFrYXJ0YSwgYmVrYXNpIGRhbiB0YW5nZXJhbmcuIFN1ZGFoIGxlbmdrYXAgeWEgYmFwYWsgaWJ1LCBqYWRpIGRlbmdhbiBwYWtldCBraGl0YW4gc3Blc2lhbCBpbmksIGRhbGFtIGFjYXJhIHdhbGltYXR1bCBraGl0YW4sIGtlbHVhcmdhIHRpbmdnYWwgdGVyaW1hIGJlcnNpaC48L3NwYW4+PGJyPjwvcD4=', 48000, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `nomor_handphone` varchar(32) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `nomor_handphone`, `role`) VALUES
(16, 'faros', 'faros', 'Faros Fadillah Robinson', '089604154132', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
