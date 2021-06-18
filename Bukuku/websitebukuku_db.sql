-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2021 pada 13.25
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websitebukuku_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_review`
--

CREATE TABLE `data_review` (
  `id` int(11) NOT NULL,
  `judulBuku` varchar(100) NOT NULL,
  `namaPengarang` varchar(100) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `namaPenerbit` varchar(100) NOT NULL,
  `jumlahHalaman` int(100) NOT NULL,
  `tahunTerbit` int(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `Komentar` varchar(1000) NOT NULL,
  `Gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_review`
--

INSERT INTO `data_review` (`id`, `judulBuku`, `namaPengarang`, `ISBN`, `namaPenerbit`, `jumlahHalaman`, `tahunTerbit`, `user`, `Komentar`, `Gambar`) VALUES
(14, 'The Rose Code', 'Kate Quinn', '978-006-2943-49-1', 'Harper Audio', 440, 2021, 'Michaela', 'Bletchley Park, the mansion where Oxford dons and crossword puzzlers cracked the German Enigma code, was so shrouded in secrecy that mentioning you worked there could land you in prison. In The Rose Code (15.5 hours), historical novelist Kate Quinn vividly conjures Bletchley through the tale of three unlikely friends from very different backgrounds: socialite Osla, social climber Mab and antisocial Beth. Quinn blends rich characterization, fast pacing and meticulous historical research to tell a story of friendship, tragic betrayal and treason. \r\n', 'large.jpg'),
(15, 'The Damage', 'Caitlin Wahrer', '978-059-3296-13-4', 'Pamela Dorman', 459, 2021, 'sally18', 'The Damage stands out for its depiction of the still taboo subject of male rape. Female sexual assault victims are commonplace in thrillers, but there is still a stigma surrounding male victims of sexual violence. Nick is aware of this stigma, and we see him work through the toxic shame surrounding his attack as he struggles to accept that he was not at fault for what happened to him.\r\n\r\nThis study of a family in crisis is empathetic and never gratuitous, but still doesn’t shy away from the realities of sexual violence. The Damage carefully and expertly captures the collective trauma of a close-knit family when one of its members is victimized, and the lengths to which they’ll go to find justice and healing.', 'large2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `namaLengkap` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id`, `namaLengkap`, `username`, `email`, `password`) VALUES
(13, 'Sally Livia Kosasih', 'sally18', 'sally18@gmail.com', '$2y$10$iKxNV2hx/y.FnId4ZxucJOn5XemdovkXTIerMUE1M1Ukqvn/nlbU.'),
(14, 'Michael Angelo', 'Michaela', 'michaela@gmail.com', '$2y$10$.3YLwWCjGpbyW.obnMhCael8L16t67qCoRFWNorgKBWo48dO9Vsxm');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_review`
--
ALTER TABLE `data_review`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_review`
--
ALTER TABLE `data_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
