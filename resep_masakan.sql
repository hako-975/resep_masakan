-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2023 pada 20.51
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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Makanan Pembuka'),
(2, 'Makanan Utama'),
(3, 'Makanan Vegetarian'),
(4, 'Makanan Penutup'),
(5, 'Roti dan Kue'),
(6, 'Makanan Tradisional'),
(7, 'Makanan Internasional'),
(8, 'Sup'),
(9, 'Salad'),
(10, 'Pasta'),
(11, 'Jus Segar'),
(12, 'Smoothie'),
(13, 'Teh'),
(14, 'Kopi'),
(15, 'Minuman Soda'),
(16, 'Es Krim'),
(17, 'Cokelat Panas'),
(18, 'Lassi');

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
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`id_resep`, `nama_resep`, `deskripsi_resep`, `bahan`, `langkah`, `foto_resep`, `tanggal_resep_dibuat`, `id_kategori`, `id_user`) VALUES
(1, 'Mie goreng', 'Mie Goreng dengan bumbu sederhana', '- bawang merah 3 siung<br />\r\n- bawang putih 2 siung<br />\r\n- mie indomie goreng<br />\r\n- air mineral 200ml', '- buat mie seperti biasa hingga matang<br />\r\n- tumis bawang merah dan putih yang telah dihaluskan<br />\r\n- tambahkan air 200ml<br />\r\n- masukkan mie goreng yang telah direbus dan bumbu kemasannya<br />\r\n- aduk hingga air menjadi asat<br />\r\n- mie siap disajikan', '647f47aeeecf864543ce5454e9download.jpg', '2023-06-06 21:50:22', 2, 1),
(2, 'Pudding Gula Merah', 'Menurut saya ini pudingnya manisnya pas. Apalagi dimakan dingin2.. seger banget. Lumutnya jg cantik, ga mengendap.', '150 gr gula merah (kalau suka lebih manis bisa ditambahkan gulanya ya)<br />\r\n650 ml air<br />\r\n1 lembar daun pandan<br />\r\n1/2 sdt garam<br />\r\n1/2 sdt vanilla extract<br />\r\n65 ml / 1 bks santan instan<br />\r\n1 bks agar-agar tanpa rasa<br />\r\n1 butir telur yang besar', 'Langkah 1<br />\r\nSisir halus gula merah. Masak bersama air & daun pandan cukup sampai gula merahnya larut saja. Tidak perlu sampai mendidih. Sisihkan.<br />\r\n<br />\r\nLangkah 2<br />\r\nDi wadah lain masukkan bubuk agar-agar, garam, santan, vanilla & telur yang sudah dikocok dulu sebelumnya. Aduk-aduk sampai bubuk agar-agarnya larut.<br />\r\n<br />\r\nLangkah 3<br />\r\nTuang & saring larutan gula merah yang telah dimasak sebelumnya kedalam adonan agar-agar tadi. Aduk hingga rata.<br />\r\n<br />\r\nLangkah 4<br />\r\nMasak dengan api sedang cenderung kecil sambil sesekali diaduk. Kalau sudah mulai panas, jangan terlalu sering diaduk agar lumutnya keluar.<br />\r\n<br />\r\nLangkah 5<br />\r\nJika sudah mendidih, angkat. Sisihkan & tunggu hingga benar-benar dingin.<br />\r\nLangkah 6<br />\r\nPastikan agar-agar sudah tidak panas lagi. Kemudian tuang agar-agar ke cetakan. Diamkan hingga set.', '647f7dcab06206455065ceda22Capture.PNG', '2023-06-07 01:41:14', 4, 7),
(3, 'Ikan tongkol', 'Ikan tongkol', 'ikan tongkol<br />\r\nminyak goreng<br />\r\nbawang merah<br />\r\nbawang putih', 'panaskan minyak goreng<br />\r\ntumis bawang<br />\r\ngoreng tongkol', '647f7e0c514326454a1b64eb79download.jpg', '2023-06-07 01:42:20', 6, 5),
(4, 'Nasi Goreng', 'Nasi goreng kecap<br />\r\n<br />\r\n', '1 piring nasi sisa (agak munjung)<br />\r\n2 siung bawang putih<br />\r\n3 siung bawang merah<br />\r\n1 buah tomat (bisa diganti saos tomat)<br />\r\n1 cubit terasi matang<br />\r\n2-3 sdm kecap manis (sesuai selera)<br />\r\n1/4 sdt @gula + garam + kaldu bubuk<br />\r\n5-6 sdm minyak goreng (agak banyak dr menumis)<br />\r\nTopping (suka-suka): taburan bawang goreng, telur ceplok, irisan tomat', 'Langkah 1<br />\r\nSiapkan bahan2nya. Haluskan duo bawang +tomat +terasi +gula +garam +kaldu bubuk<br />\r\n<br />\r\nLangkah 2<br />\r\nPanaskan minyak. Tumis bumbu halus sampai harum. Masukkan nasi dan aduk rata (kecilkan api, biar gk gosong/kering)<br />\r\n<br />\r\nLangkah 3<br />\r\nTambahkan kecap manis. Kalo mau pekat boleh ditambah (me: 3 sdm). Aduk sampai benar2 rata.<br />\r\n<br />\r\nLangkah 4<br />\r\nBila semua sdh tercampur rata, besarkan api sedikit. Aduk & test rasa. Aduk lagi sebentar biarkan tanak. Angkat dan siapkan dipiring, beri taburan bawang goreng Nasi goreng siap disajikan bersama lauk kesukaan.<br />\r\nEnjoy😍 Selamat mencoba😉<br />\r\n<br />\r\n', '647f7e413723d6454a6d2d9aceCapture.PNG', '2023-06-07 01:43:13', 2, 6),
(5, 'Bakso Goreng', 'Bakso goreng mudah dibuat<br />\r\n<br />\r\n', '150 gram nasi<br />\r\n250 gram tepung tapioka<br />\r\n2 sdm tepung terigu<br />\r\n1 butir telur<br />\r\n50 ml air biasa<br />\r\n1 sdm kaldu bubuk<br />\r\n1 sdt lada halus<br />\r\n1 sdt garam<br />\r\n3 sdm minyak', 'Langkah 1<br />\r\nCampur nasi dengan 50 ml air<br />\r\nLalu chopper. Gak perlu terlaku halus ya. Campur jadi satu semua bahan lainnya. Masukkan telur ke dalam nasi yanh sudah dihaluskan<br />\r\n<br />\r\nLangkah 2<br />\r\nAduk samoai tercampur raya kemudian masukkan semua bahan dan aduk kembali. Didihkan air. Tambahkan 3 sdm minyak. Setelah mwbdidih, bulat2 kan adonan masukkan ke dalam air mendidih. Setelah mengapung, tunggu 1 menit lalu angkat<br />\r\n<br />\r\nLangkah 3<br />\r\nTiriskan. Bulatan bakso nasi dibelah sampai bawah, jangan sampai putus ya. Panaskan minyak, lalu goreng sampai kuning. Angkat dan tiriskan<br />\r\n<br />\r\nLangkah 4<br />\r\nTara.....bakso goreng nasi siap dinikmati', '647f7e8438dd36454a6295a971Capture.PNG', '2023-06-07 01:44:20', 1, 2);

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
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
