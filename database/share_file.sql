-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Des 2022 pada 01.51
-- Versi server: 5.7.33
-- Versi PHP: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `share_file`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_bidang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bidang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`id`, `kode_bidang`, `nama_bidang`, `created_at`, `updated_at`) VALUES
('030dcf28-8763-41c2-9359-26a36e8a814b', 'BPKAD-Sek6', 'Sekretariat', '2022-10-22 00:46:09', '2022-10-22 00:46:09'),
('08d960e7-9df0-4f22-8f1f-cc2dc124bb60', 'BPKAD-SBT6', 'Sub Bagian TU', '2022-10-16 07:32:02', '2022-10-16 07:39:22'),
('2238f70e-2ed2-4ff4-a7a6-f63485ba9909', 'BPKAD-UPPA', 'UPTB Pelayanan Pemanfaatan Aset', '2022-10-16 07:35:57', '2022-10-16 07:39:34'),
('332c016c-95aa-4319-a985-540074eaee8e', 'BPKAD-UP63', 'UPTB Perbendaharaan', '2022-10-16 07:35:44', '2022-10-16 07:39:41'),
('5c17284e-7efe-4c7d-b653-bb9b7a566c58', 'BPKAD-Ku63', 'Keuangan', '2022-11-13 01:32:34', '2022-11-13 01:32:34'),
('76a67c8c-1cad-4108-a6e0-a0765536f90b', 'BPKAD-A634', 'Akutansi', '2022-10-16 07:35:04', '2022-10-16 07:39:49'),
('82252c02-5b56-46fe-91d5-00549bc691dc', 'BPKAD-BEKk', 'Bina Evaluasi Kabupaten kota', '2022-10-16 07:35:33', '2022-10-16 07:35:33'),
('838cc7c1-526b-11ed-8b5e-9c2976f36af1', 'BPKAD-126', 'Sub Bagian Program', NULL, NULL),
('b4d9e1c9-e319-47fe-9f11-1fc435656bc7', 'BPKAD-A634', 'Arsip', '2022-10-16 07:36:03', '2022-10-16 07:40:04'),
('bca38a19-13c9-4492-93ed-1a4c993db5c1', 'BPKAD-BA63', 'Bidang Anggaran', '2022-10-16 07:34:57', '2022-12-01 10:47:53'),
('e25f6439-f100-4b14-b4cd-2a2031e5da0d', 'BPKAD-BMD6', 'Barang Milik Daerah', '2022-10-16 07:35:22', '2022-10-16 07:35:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `files`
--

CREATE TABLE `files` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_files` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('biasa','rapat') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'biasa',
  `bidang_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diupload_oleh` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `files`
--

INSERT INTO `files` (`id`, `nama_files`, `kategori`, `bidang_id`, `diupload_oleh`, `created_at`, `updated_at`) VALUES
('d2422bb9-8bfe-4f09-9857-a75ebf883334', 'berkas/biasa-spek laptop dan all in one - Copy.xlsx', 'biasa', '030dcf28-8763-41c2-9359-26a36e8a814b', 'BPKAD-PROGRAM', '2022-12-28 17:48:35', '2022-12-28 17:48:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_12_28_201520_create_bidangs_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_12_28_201530_create_files_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `bidang_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_bidang_id_index` (`bidang_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_bidang_id_index` (`bidang_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
