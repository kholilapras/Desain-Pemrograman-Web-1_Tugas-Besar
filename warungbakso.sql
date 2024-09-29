-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2024 pada 10.48
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
-- Database: `warungbakso`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('Kasir','Super Admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama_lengkap`, `no_telp`, `email`, `password`, `role`, `created_at`) VALUES
(9, 'apip', '08121257899', 'apip@gmail.com', '$2y$10$7BZ2jzt3fkVqUQI3IaBou.RcKshoCBBwX0tCE46oKIBnKxJ/5N7Zm', 'Super Admin', '2024-06-14 09:53:52'),
(11, 'Prasetiyo', '0812341234111', 'pras@example.com', '$2y$10$e4t9aYN0zWCElqVAcIZAR.pt9ltELbRUUGH5Mbtpa98vgJJRwM1BS', 'Kasir', '2024-06-18 12:21:54'),
(13, 'fifa', '0812133412241', 'fifa@gmail.com', '$2y$10$mWwbzZMcOns5uFrZso3rA..mgwFaNeq9MoEiJJs2QOApOfVly46KS', 'Kasir', '2024-06-18 12:25:39'),
(14, 'Pegi', '081243217890', 'pegi@ex.com', '$2y$10$eaE1YoaMtxenNWkGuwjryOP1TSNWlwYG5zO0QSIXjCmk2BOy4Gc..', 'Kasir', '2024-06-19 02:01:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_banner_teks`
--

CREATE TABLE `cms_banner_teks` (
  `banner_id` int(11) NOT NULL,
  `kalimat` varchar(200) DEFAULT NULL,
  `penjelasan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cms_banner_teks`
--

INSERT INTO `cms_banner_teks` (`banner_id`, `kalimat`, `penjelasan`) VALUES
(9, 'Bakso Lezat, Harga Bersahabat !', 'Datang dan nikmati bakso spesial kami yang kenyal dan gurih. Harga terjangkau untuk semua kalangan!'),
(10, 'Bakso Sehat, Tanpa Pengawet!', 'Kami menyajikan bakso yang dibuat dari bahan-bahan alami dan berkualitas tinggi, tanpa bahan pengawet. Sehat dan lezat!'),
(11, 'Promo Spesial Minggu Ini!', 'Dapatkan diskon 0,1% untuk semua menu bakso kami. Jangan lewatkan kesempatan ini, hanya di minggu ini!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_beranda_carousel`
--

CREATE TABLE `cms_beranda_carousel` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `subjudul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cms_beranda_carousel`
--

INSERT INTO `cms_beranda_carousel` (`id`, `gambar`, `judul`, `subjudul`) VALUES
(17, 'uploads/carousel/17.jpg', 'Bakso Iga Sapi', 'Bakso dengan isian iga sapi yang empuk dan kaya rasa'),
(18, 'uploads/carousel/18.jpg', 'Bakso Mercon', 'Bakso pedas dengan potongan cabai rawit di dalamnya, cocok untuk pecinta pedas'),
(19, 'uploads/carousel/19.jpg', 'Bakso Ceker Babat', 'Terdiri dari bola-bola daging sapi, kaki ayam, dan babat yang disajikan dalam kuah kaldu gurih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_gallery`
--

CREATE TABLE `cms_gallery` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cms_gallery`
--

INSERT INTO `cms_gallery` (`id`, `gambar`) VALUES
(6, 'uploads/gallery/6.jpg'),
(7, 'uploads/gallery/7.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_menu`
--

CREATE TABLE `cms_menu` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nama_menu` varchar(250) DEFAULT NULL,
  `detail` varchar(250) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cms_menu`
--

INSERT INTO `cms_menu` (`id`, `gambar`, `nama_menu`, `detail`, `harga`) VALUES
(7, 'uploads/menu/7.jpg', 'Bakso Ceker Babat', 'Terdiri dari bola-bola daging sapi, kaki ayam, dan babat yang disajikan dalam kuah kaldu gurih', 'Rp 20.000'),
(8, 'uploads/menu/8.jpg', 'Bakso Mercon', 'Bakso pedas dengan potongan cabai rawit di dalamnya, cocok untuk pecinta pedas', 'Rp 18.000'),
(9, 'uploads/menu/9.png', 'Bakso Sapi Original', 'Bakso daging sapi klasik dengan rasa autentik yang lezat', 'Rp 15.000'),
(10, 'uploads/menu/10.jpg', 'Ice Tea Lemon', 'Minuman dingin terbuat dari teh dengan tambahan lemon dan rasa yang manis', 'Rp 4.000'),
(11, 'uploads/menu/11.jpg', 'Es Teh Tawar Dingin', 'minuman menyegarkan teh tanpa gula yang disajikan dengan es batu', 'Rp 3.000'),
(12, 'uploads/menu/12.jpg', 'Bakso Iga Sapi', 'Bakso dengan isian iga sapi yang empuk dan kaya rasa', 'Rp 25.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `detail_id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_web`
--

CREATE TABLE `info_web` (
  `id_info` int(11) NOT NULL,
  `nama_website` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `whatsapp_link` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `gmaps` text DEFAULT NULL,
  `shopeefood` varchar(255) DEFAULT NULL,
  `grabfood` varchar(255) DEFAULT NULL,
  `gofood` varchar(255) DEFAULT NULL,
  `sejarah` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `info_web`
--

INSERT INTO `info_web` (`id_info`, `nama_website`, `whatsapp`, `whatsapp_link`, `facebook`, `instagram`, `alamat`, `gmaps`, `shopeefood`, `grabfood`, `gofood`, `sejarah`) VALUES
(1, 'Bakso Bu Timin', '0896 - 6937 - 5553', 'https://wa.me/qr/J3FGACDO2GXEE1', 'https://www.facebook.com/profile.php?id=61560872037893', ' https://www.instagram.com/baksobutimin/ ', 'Jl. Letnan Akhmadi No.38, Bancar, Kec. Purbalingga, Kabupaten Purbalingga, Jawa Tengah 53316', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.29164589762487!2d109.37609599999998!3d-7.391235199999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6559ea4c54e975%3A0x96f9068a03d60720!2sBakso%20Ibu%20Timin%20Bancar!5e0!3m2!1sid!2sid!4v1718087467540!5m2!1sid!2sid\" width=\"100%\" height=\"400px\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '#shopeefood', '#grabfood', '#gofood', 'Bisnis bakso Bu Timin di Bancar, Purbalingga, bermula pada tahun 1980. Berawal dari modal yang sangat kecil, hanya Rp 5.000, Bu Timin memulai usahanya menjual bakso keliling di daerah Purbalingga. Bakso yang mengedepankan cita rasa kuah yang unik dan lezat, serta dengan 100% bakso asli daging sapi, dijamin enak dan halal.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_masuk`
--

CREATE TABLE `kontak_masuk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kontak_masuk`
--

INSERT INTO `kontak_masuk` (`id`, `nama`, `email`, `telp`, `pesan`, `timestamp`) VALUES
(3, 'tes', 'ere@dn.com', '0813814214221', 'enakkkk nyoo', '2024-06-18 02:38:55'),
(4, 'kdewk', 'waduh@gmail.com', '08124124344323', 'tidak', '2024-06-18 15:18:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`menu_id`, `nama_menu`, `harga`) VALUES
(3, 'Bakso Ceker Babat', 20000.00),
(4, 'Bakso Iga Sapi', 25000.00),
(5, 'Bakso Sapi Original', 15000.00),
(6, 'Bakso Mercon', 18000.00),
(7, 'Es Teh Tawar Dingin', 3000.00),
(8, 'Ice Tea Lemon', 4000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `diskon` decimal(10,2) DEFAULT 0.00,
  `uang_bayar` decimal(10,2) NOT NULL,
  `kembalian` decimal(10,2) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `total`, `diskon`, `uang_bayar`, `kembalian`, `tanggal`) VALUES
(1, 250000.00, 10000.00, 300000.00, 50000.00, '2024-06-17 15:34:43'),
(2, 250000.00, 10000.00, 300000.00, 50000.00, '2024-06-17 15:34:47'),
(3, 135000.00, 5000.00, 150000.00, 15000.00, '2024-06-17 15:36:34'),
(4, 85000.00, 0.00, 0.00, -85000.00, '2024-06-17 15:50:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_operasional`
--

CREATE TABLE `waktu_operasional` (
  `id` int(11) NOT NULL,
  `senin` varchar(50) DEFAULT NULL,
  `selasa` varchar(50) DEFAULT NULL,
  `rabu` varchar(50) DEFAULT NULL,
  `kamis` varchar(50) DEFAULT NULL,
  `jumat` varchar(50) DEFAULT NULL,
  `sabtu` varchar(50) DEFAULT NULL,
  `minggu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `waktu_operasional`
--

INSERT INTO `waktu_operasional` (`id`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`, `sabtu`, `minggu`) VALUES
(1, 'Tutup', '09:00 - 20:00 WIB', '09:00 - 20:00 WIB', '09:00 - 21:00 WIB', '09:00 - 21:00 WIB', '09:00 - 22:00 WIB', '09:00 - 22:00 WIB');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `cms_banner_teks`
--
ALTER TABLE `cms_banner_teks`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indeks untuk tabel `cms_beranda_carousel`
--
ALTER TABLE `cms_beranda_carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_gallery`
--
ALTER TABLE `cms_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_menu`
--
ALTER TABLE `cms_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `transaksi_id` (`transaksi_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `info_web`
--
ALTER TABLE `info_web`
  ADD PRIMARY KEY (`id_info`);

--
-- Indeks untuk tabel `kontak_masuk`
--
ALTER TABLE `kontak_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indeks untuk tabel `waktu_operasional`
--
ALTER TABLE `waktu_operasional`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `cms_banner_teks`
--
ALTER TABLE `cms_banner_teks`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `cms_beranda_carousel`
--
ALTER TABLE `cms_beranda_carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `cms_gallery`
--
ALTER TABLE `cms_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `cms_menu`
--
ALTER TABLE `cms_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `info_web`
--
ALTER TABLE `info_web`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kontak_masuk`
--
ALTER TABLE `kontak_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `waktu_operasional`
--
ALTER TABLE `waktu_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`transaksi_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
