-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2020 pada 05.46
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekrutmen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `status_nikah` varchar(10) DEFAULT NULL,
  `no_npwp` varchar(20) DEFAULT NULL,
  `pendidikan_terakhir` varchar(5) DEFAULT NULL,
  `nomor_telepon` varchar(15) DEFAULT NULL,
  `warga_negara` varchar(50) DEFAULT NULL,
  `file_ktp` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `surat_lamaran` varchar(255) DEFAULT NULL,
  `ijazah` varchar(255) DEFAULT NULL,
  `persetujuan` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`id`, `user_id`, `nama_lengkap`, `jenis_kelamin`, `agama`, `alamat`, `kode_pos`, `tempat_lahir`, `tanggal_lahir`, `status_nikah`, `no_npwp`, `pendidikan_terakhir`, `nomor_telepon`, `warga_negara`, `file_ktp`, `cv`, `surat_lamaran`, `ijazah`, `persetujuan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gusti Wahyu Putra', 'L', 'Islam', '', '', 'Jakarta', '1996-09-18', 'Single', '', '0', '085718834083', 'Warga Negara Indonesia', 'img049.jpg', NULL, NULL, NULL, NULL, NULL, '2020-11-13 01:12:02', '2020-11-16 01:51:08'),
(2, 3, 'Adiat Aprirazi', 'L', 'Islam', NULL, NULL, 'Jakarta', '1991-04-28', 'Menikah', NULL, 'D3', '08132123243', 'Warga Negara Indonesia', 'KTP-ADIAT.jpg', NULL, NULL, NULL, NULL, 'Ditolak', '2020-11-13 01:12:02', '2020-11-30 01:44:35'),
(4, 23, 'Dhimas Arya Putra', 'L', 'Islam', 'Jl Cilandak Barat No.58', '13751', 'Jakarta', '1996-05-02', 'Single', '01010101', 'S1', '0854711515122', 'Warga Negara Indonesia', 'img055.jpg', 'img098.pdf', '2018-10-12-0002.pdf', 'img046.pdf', '[\"setuju\",\"setuju\"]', 'Diterima', '2020-11-18 19:21:43', '2020-12-01 23:24:29'),
(5, 24, 'Dwi Rahmat Hamdana', 'L', 'Islam', 'Komseko', '13751', 'Makasar', '1995-01-01', 'Single', '01010101', 'S1', '085718834083', 'Warga Negara Indonesia', NULL, NULL, NULL, NULL, NULL, 'waiting', '2020-11-19 02:28:14', '2020-11-30 23:22:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `level` varchar(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `email verified at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `melamar_sebagai` varchar(50) NOT NULL,
  `satker` varchar(100) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nip`, `no_ktp`, `username`, `level`, `email`, `email verified at`, `image`, `password`, `confirm_password`, `melamar_sebagai`, `satker`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1410512033', '', 'gusti', 'admin', 'gusti@gmail.com', NULL, 'default.jpg', '$2y$10$psUX5o3FigsLbqdsIJE6v.jG6w.4l/GovMQM3vab5tem.7r.ovc/W', '', '', 'UPT Lab Terpadu', 'XwyepSzz4Pw5jU03frluOt0z7JsN7v8fATAmhIjyUAPyAVAZmhEk93UmFC2n', '2020-11-09 23:38:29', '2020-11-09 23:38:29'),
(3, '1101242001', '15151512111', 'adiat', 'user', 'adiat@gmail.com', NULL, 'transkrip 2.jpg', '$2y$10$4aqJw1LPACj3omgxIcMRAeMlil0G4rf0I7VruG7tKMUQqPsSrjLda', '', 'Programmer', 'UPT TEKNOLOGI INFORMASI', 'Akxwc3G6ed4kkc78J4hvlyOqYHfI9TuAh6rZMZAAiZEhX8jITjObhmLtubw8', '2020-11-12 21:28:24', '2020-11-18 18:53:58'),
(23, '', '51515111', 'bob', 'user', 'bob@gmail.com', NULL, 'img057 (2).jpg', '$2y$10$vdjWmiKWpT1Tdw7sl6wJ5.4ZURjrxpCu/ck9UAANtQF31nnso4TCa', '$2y$10$uRB57W.i4BC0LM6dRSO0H..63AwergOPFhRabVN0/6qsWy0Vfc0rW', 'Graphic Design', NULL, 'fBEjljW9b82V6FT2OG4CIH1wH1mVh7yZvX7e0c3mghDKckc6bL8AUr4PvW9P', '2020-11-18 19:21:43', '2020-12-01 21:06:12'),
(24, '', '455451', 'rahmat', 'user', 'rahmat@gmail.com', NULL, 'Foto Berjas.jpg', '$2y$10$/ScJuOCJYwe51tk1thwn..lF1dIvgs/D7gu6CFQ87WA8U6NGjP6Y.', '$2y$10$D6MsV9WRln8klLqJLn4iF.ah94LdGu./GeH4YXwbDw/DKCL8KtMbK', 'Data Science', NULL, 'hMXAOr5bTELa817zonXDtcNbNWIXLGDo6kOGXYd5xL22LmCawmfIJ04kNeKk', '2020-11-19 02:28:14', '2020-11-30 23:22:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
