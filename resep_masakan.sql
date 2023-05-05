-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2023 pada 15.36
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resep_masakan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL,
  `nama_resep` varchar(100) NOT NULL,
  `deskripsi_resep` text NOT NULL,
  `bahan` text NOT NULL,
  `langkah` text NOT NULL,
  `foto_resep` text DEFAULT NULL,
  `tanggal_resep_dibuat` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`id_resep`, `nama_resep`, `deskripsi_resep`, `bahan`, `langkah`, `foto_resep`, `tanggal_resep_dibuat`, `id_user`) VALUES
(7, 'Mie Goreng', 'mie goreng cabai', 'mie goreng indomie <br />\r\nbawang merah<br />\r\nbawang putih<br />\r\ntelur<br />\r\nminyak goreng<br />\r\ncabai rawit', 'langkah 1<br />\r\nmie direbus hingga matang<br />\r\ntiriskan<br />\r\n<br />\r\nlangkah 2<br />\r\nuleg cabai, bawang merah, bawang putih<br />\r\n<br />\r\nlangkah 3<br />\r\npanaskan minyak goreng<br />\r\ntumis bumbu langkah 2<br />\r\n<br />\r\nlangkah 4<br />\r\nmasukan mie<br />\r\n<br />\r\nlangkah 5<br />\r\nmie goreng cabai siap disajikan', '64543ce5454e9download.jpg', '2023-05-05 06:14:31', 2),
(9, 'Ikan tongkol ', 'ikan tongkol berasal dari', 'ikan tongkol<br />\r\nminyak goreng<br />\r\nbawang merah<br />\r\nbawang putih<br />\r\nminyak goreng', 'panaskan minyak goreng<br />\r\ntumis bawang<br />\r\ngoreng tongkol', '6454a1b64eb79download.jpg', '2023-05-05 13:27:02', 5),
(10, 'Bakso Goreng', 'Bakso goreng mudah dibuat', '150 gram nasi<br />\r\n250 gram tepung tapioka<br />\r\n2 sdm tepung terigu<br />\r\n1 butir telur<br />\r\n50 ml air biasa<br />\r\n1 sdm kaldu bubuk<br />\r\n1 sdt lada halus<br />\r\n1 sdt garam<br />\r\n3 sdm minyak', 'Langkah 1<br />\r\nCampur nasi dengan 50 ml air<br />\r\nLalu chopper. Gak perlu terlaku halus ya. Campur jadi satu semua bahan lainnya. Masukkan telur ke dalam nasi yanh sudah dihaluskan<br />\r\n<br />\r\nLangkah 2<br />\r\nAduk samoai tercampur raya kemudian masukkan semua bahan dan aduk kembali. Didihkan air. Tambahkan 3 sdm minyak. Setelah mwbdidih, bulat2 kan adonan masukkan ke dalam air mendidih. Setelah mengapung, tunggu 1 menit lalu angkat<br />\r\n<br />\r\nLangkah 3<br />\r\nTiriskan. Bulatan bakso nasi dibelah sampai bawah, jangan sampai putus ya. Panaskan minyak, lalu goreng sampai kuning. Angkat dan tiriskan<br />\r\n<br />\r\nLangkah 4<br />\r\nTara.....bakso goreng nasi siap dinikmati<br />\r\n', '6454a6295a971Capture.PNG', '2023-05-05 13:46:01', 6),
(11, 'Nasi Goreng ', 'Nasi goreng kecap', '1 piring nasi sisa (agak munjung)<br />\r\n2 siung bawang putih<br />\r\n3 siung bawang merah<br />\r\n1 buah tomat (bisa diganti saos tomat)<br />\r\n1 cubit terasi matang<br />\r\n2-3 sdm kecap manis (sesuai selera)<br />\r\n1/4 sdt @gula + garam + kaldu bubuk<br />\r\n5-6 sdm minyak goreng (agak banyak dr menumis)<br />\r\nTopping (suka-suka): taburan bawang goreng, telur ceplok, irisan tomat', 'Langkah 1<br />\r\nSiapkan bahan2nya. Haluskan duo bawang +tomat +terasi +gula +garam +kaldu bubuk<br />\r\n<br />\r\nLangkah 2<br />\r\nPanaskan minyak. Tumis bumbu halus sampai harum. Masukkan nasi dan aduk rata (kecilkan api, biar gk gosong/kering)<br />\r\n<br />\r\nLangkah 3<br />\r\nTambahkan kecap manis. Kalo mau pekat boleh ditambah (me: 3 sdm). Aduk sampai benar2 rata.<br />\r\n<br />\r\nLangkah 4<br />\r\nBila semua sdh tercampur rata, besarkan api sedikit. Aduk & test rasa. Aduk lagi sebentar biarkan tanak. Angkat dan siapkan dipiring, beri taburan bawang goreng Nasi goreng siap disajikan bersama lauk kesukaan.<br />\r\nEnjoyðŸ˜ Selamat mencobaðŸ˜‰', '6454a6d2d9aceCapture.PNG', '2023-05-05 13:48:50', 6),
(14, 'Pudding Gula Merah', 'Menurut saya ini pudingnya manisnya pas. Apalagi dimakan dingin2.. seger banget. Lumutnya jg cantik, ga mengendap.', '150 gr gula merah (kalau suka lebih manis bisa ditambahkan gulanya ya)<br />\r\n650 ml air<br />\r\n1 lembar daun pandan<br />\r\n1/2 sdt garam<br />\r\n1/2 sdt vanilla extract<br />\r\n65 ml / 1 bks santan instan<br />\r\n1 bks agar-agar tanpa rasa<br />\r\n1 butir telur yang besar', 'Langkah 1<br />\r\nSisir halus gula merah. Masak bersama air & daun pandan cukup sampai gula merahnya larut saja. Tidak perlu sampai mendidih. Sisihkan.<br />\r\n<br />\r\nLangkah 2<br />\r\nDi wadah lain masukkan bubuk agar-agar, garam, santan, vanilla & telur yang sudah dikocok dulu sebelumnya. Aduk-aduk sampai bubuk agar-agarnya larut.<br />\r\n<br />\r\nLangkah 3<br />\r\nTuang & saring larutan gula merah yang telah dimasak sebelumnya kedalam adonan agar-agar tadi. Aduk hingga rata.<br />\r\n<br />\r\nLangkah 4<br />\r\nMasak dengan api sedang cenderung kecil sambil sesekali diaduk. Kalau sudah mulai panas, jangan terlalu sering diaduk agar lumutnya keluar.<br />\r\n<br />\r\nLangkah 5<br />\r\nJika sudah mendidih, angkat. Sisihkan & tunggu hingga benar-benar dingin.<br />\r\nLangkah 6<br />\r\nPastikan agar-agar sudah tidak panas lagi. Kemudian tuang agar-agar ke cetakan. Diamkan hingga set.', '6455065ceda22Capture.PNG', '2023-05-05 20:36:28', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', '$2y$10$31EDjuUanl.fM5yWE07.2eQzk96TnnJfDKOzBT0B0trak4okcC4zi', 'Admin'),
(2, 'andri123', '$2y$10$bRqPC.8YW4.qS9rFADNp7et15coxg/OYmEULGzcL..jQcyMnl24CK', 'Andri Firman Saputra'),
(5, 'fiki123', '$2y$10$p1s09dOUBZxNYbEooMbzh.zxHbNwQI1xpU9Qj4WO9M.v7y3VV8uHS', 'Fiki Aji Panuntun'),
(6, 'riski123', '$2y$10$FYVq.0vCgone6JIAtmALFOb1RqSIkvASfOm4VDNnXI.esmwYN5klG', 'Riski Febriansyah'),
(7, 'amanda123', '$2y$10$Oycsg3GVVxX74xDkC1i2J.0.904W2cAN4Wpm7wW5c6oOJ0Ww215R6', 'Amanda Dwi Cahyani Putri');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
