-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2020 pada 04.55
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel8ticket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2020_11_27_121751_create_stations_table', 1),
(12, '2020_12_05_174213_create_trains_table', 1),
(13, '2020_12_06_075655_create_passangers_table', 2),
(16, '2020_12_07_110140_create_tickets_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `passangers`
--

CREATE TABLE `passangers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_identity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `passangers`
--

INSERT INTO `passangers` (`id`, `user_id`, `no_identity`, `name`, `address`, `number`, `created_at`, `updated_at`) VALUES
(3, 2, '233228339', 'Adi Sugma', 'Dago', '0829292923', '2020-12-07 06:37:27', '2020-12-07 06:37:27'),
(4, 2, '233228322', 'Ricky', 'Cicalengka', '0822292923', '2020-12-08 23:08:17', '2020-12-08 23:08:17'),
(5, 2, '233228388', 'Viqi', 'Subang', '0822292911', '2020-12-08 23:08:38', '2020-12-08 23:08:38'),
(6, 2, '233228398', 'Aprian', 'Tanjunglaya', '08215933037', '2020-12-09 01:25:57', '2020-12-09 01:25:57'),
(7, 2, '71234567', 'Rocky SBY', 'Sumedang', '082159330878', '2020-12-09 01:45:12', '2020-12-09 01:46:33'),
(9, 1, '23109900', 'Depras nur yadi', 'bandung', '08929292', '2020-12-09 21:37:57', '2020-12-16 06:49:24'),
(10, 4, '12345232', 'Depras Nur Yadi', 'Bandung', '0892929292', '2020-12-16 06:17:07', '2020-12-16 06:17:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stations`
--

CREATE TABLE `stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `station_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stations`
--

INSERT INTO `stations` (`id`, `station_name`, `class`, `created_at`, `updated_at`) VALUES
(2, 'Jakarta', '1', '2020-12-10 01:51:17', NULL),
(3, 'Surabaya', '1', '2020-12-05 19:02:35', '2020-12-08 06:42:00'),
(6, 'Semarang', '1', '2020-12-06 00:43:36', '2020-12-06 00:43:36'),
(7, 'Solo', '1', '2020-12-06 00:43:49', '2020-12-06 00:43:49'),
(8, 'Cirebon', '1', '2020-12-06 00:43:55', '2020-12-06 00:43:55'),
(9, 'Madiun', '1', '2020-12-06 00:44:06', '2020-12-06 00:44:06'),
(10, 'Jember', '1', '2020-12-06 00:44:11', '2020-12-06 00:44:11'),
(11, 'Bekasi', '3', '2020-12-07 08:09:44', '2020-12-07 08:09:44'),
(15, 'Padalarang', '2', '2020-12-08 23:00:43', '2020-12-08 23:00:43'),
(16, 'Bandung', '1', '2020-12-08 23:02:08', '2020-12-08 23:03:22'),
(17, 'Purwokerto', '1', '2020-12-09 00:33:36', '2020-12-09 00:33:36'),
(18, 'Jakarta Pasar Senen', '2', '2020-12-09 00:34:03', '2020-12-09 00:34:03'),
(19, 'Surabaya Gubeng', '1', '2020-12-09 00:44:59', '2020-12-09 00:44:59'),
(20, 'Gambir', '1', '2020-12-09 00:48:55', '2020-12-09 00:48:55'),
(21, 'Surabaya Pasarturi', '1', '2020-12-09 00:49:33', '2020-12-09 00:49:33'),
(22, 'Solo Balapan', '1', '2020-12-09 00:50:16', '2020-12-09 00:50:16'),
(23, 'Semarang Tawang', '1', '2020-12-09 00:53:47', '2020-12-09 00:53:47'),
(24, 'Cirebon Prujakan', '2', '2020-12-09 00:56:58', '2020-12-09 01:14:57'),
(25, 'Malang', '1', '2020-12-09 01:01:34', '2020-12-09 01:01:34'),
(27, 'Cilacap', '1', '2020-12-09 01:05:37', '2020-12-09 01:05:37'),
(28, 'Blitar', '1', '2020-12-09 01:08:45', '2020-12-09 01:08:45'),
(29, 'Jember', '1', '2020-12-09 01:13:23', '2020-12-09 01:13:23'),
(30, 'Banyuwangi Ketapang', '1', '2020-12-09 01:15:30', '2020-12-09 01:15:30'),
(31, 'Jombang', '2', '2020-12-09 01:16:53', '2020-12-09 01:40:04'),
(32, 'Bandung Kiaracondong', '2', '2020-12-09 01:22:47', '2020-12-09 01:22:47'),
(33, 'Kutoarjo', '1', '2020-12-09 01:24:25', '2020-12-09 01:24:25'),
(34, 'Tegal', '1', '2020-12-09 01:39:14', '2020-12-09 01:39:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_booking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `train_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passanger_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `seat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tickets`
--

INSERT INTO `tickets` (`id`, `code_booking`, `user_id`, `train_id`, `passanger_id`, `date`, `seat`, `created_at`, `updated_at`) VALUES
(32, 'fgXKe5', 1, '38', '9', '2020-12-17', '1 A', '2020-12-16 06:50:34', '2020-12-16 06:50:34'),
(33, 'fk1r76', 1, '38', '9', '2020-12-17', '2 B', '2020-12-16 06:50:47', '2020-12-16 06:50:47'),
(34, 'xHuvaC', 1, '37', '9', '2020-12-18', '11 C', '2020-12-16 06:54:27', '2020-12-16 06:54:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trains`
--

CREATE TABLE `trains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure` time NOT NULL,
  `arrival` time NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `trains`
--

INSERT INTO `trains` (`id`, `name`, `departure`, `arrival`, `from`, `to`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(8, 'Serayu', '10:00:00', '18:00:00', '18', '17', 63000, 99, '2020-12-07 06:38:00', '2020-12-16 06:46:37'),
(10, 'Argo Wilis', '14:45:00', '09:46:00', '16', '19', 150000, 100, '2020-12-09 00:46:35', '2020-12-09 00:46:35'),
(11, 'Argo Bromo Anggrek', '15:50:00', '08:56:00', '20', '21', 56000, 100, '2020-12-09 00:51:18', '2020-12-09 00:51:18'),
(12, 'Argo Lawu', '16:51:00', '03:56:00', '20', '22', 100000, 100, '2020-12-09 00:52:12', '2020-12-09 00:52:12'),
(13, 'Argo Dwipangga', '02:52:00', '20:58:00', '22', '20', 200000, 100, '2020-12-09 00:53:18', '2020-12-09 00:53:18'),
(14, 'Argo Sindoro', '03:54:00', '22:54:00', '20', '23', 250000, 100, '2020-12-09 00:55:42', '2020-12-09 00:55:42'),
(15, 'Argo Muria', '04:55:00', '22:56:00', '23', '20', 200000, 100, '2020-12-09 00:56:29', '2020-12-09 00:56:29'),
(16, 'Argo Cheribon', '03:57:00', '17:57:00', '20', '24', 135000, 100, '2020-12-09 00:57:52', '2020-12-09 00:57:52'),
(17, 'Argo Parahyangan Excellence', '16:58:00', '21:58:00', '16', '20', 125000, 100, '2020-12-09 00:58:52', '2020-12-09 00:58:52'),
(18, 'Argo Parahyangan', '02:59:00', '06:59:00', '20', '16', 140000, 100, '2020-12-09 00:59:55', '2020-12-09 00:59:55'),
(19, 'Bima', '17:00:00', '07:00:00', '19', '20', 250000, 100, '2020-12-09 01:01:04', '2020-12-09 01:01:04'),
(20, 'Gajayana', '05:01:00', '15:01:00', '25', '20', 300000, 100, '2020-12-09 01:02:46', '2020-12-09 01:02:46'),
(21, 'Turangga', '19:03:00', '07:03:00', '19', '16', 250000, 100, '2020-12-09 01:03:30', '2020-12-09 01:03:30'),
(23, 'Purwojaya', '17:05:00', '00:05:00', '27', '20', 210000, 100, '2020-12-09 01:06:27', '2020-12-09 01:06:27'),
(24, 'Mutiara Selatan', '20:06:00', '06:06:00', '19', '16', 170000, 100, '2020-12-09 01:07:20', '2020-12-09 01:07:20'),
(25, 'Malabar', '18:07:00', '06:07:00', '16', '25', 180000, 100, '2020-12-09 01:08:06', '2020-12-09 01:08:06'),
(26, 'Singasari', '20:09:00', '09:09:00', '28', '18', 350000, 100, '2020-12-09 01:09:38', '2020-12-09 01:09:38'),
(27, 'Gaya Baru Malam Selatan', '19:14:00', '06:10:00', '18', '19', 235000, 100, '2020-12-09 01:10:58', '0000-00-00 00:00:00'),
(28, 'Jayabaya', '20:16:00', '05:11:00', '18', '25', 180000, 100, '2020-12-09 01:11:48', '2020-12-09 01:11:48'),
(29, 'Brantas', '03:12:00', '16:12:00', '28', '18', 150000, 100, '2020-12-09 01:12:47', '2020-12-09 01:12:47'),
(30, 'Ranggajati', '17:13:00', '05:13:00', '29', '8', 140000, 100, '2020-12-09 01:14:14', '2020-12-09 01:14:14'),
(31, 'Wijayakusuma', '15:16:00', '06:16:00', '30', '27', 300000, 100, '2020-12-09 01:16:31', '2020-12-09 01:16:31'),
(32, 'Anjasmoro', '17:17:00', '09:17:00', '31', '18', 200000, 100, '2020-12-09 01:17:51', '2020-12-09 01:17:51'),
(33, 'Harina', '06:18:00', '16:19:00', '21', '16', 175000, 100, '2020-12-09 01:18:30', '2020-12-09 01:18:30'),
(34, 'Gumarang', '15:18:00', '07:18:00', '18', '21', 190000, 100, '2020-12-09 01:19:21', '2020-12-09 01:19:21'),
(35, 'Ciremai', '03:20:00', '15:23:00', '16', '23', 200000, 100, '2020-12-09 01:20:39', '2020-12-09 01:20:39'),
(36, 'Lodaya', '03:21:00', '15:21:00', '16', '22', 180000, 100, '2020-12-09 01:21:51', '2020-12-09 01:21:51'),
(37, 'Pasundan', '10:23:00', '22:23:00', '32', '19', 200000, 99, '2020-12-09 01:24:00', '2020-12-16 06:54:27'),
(38, 'Kutojaya Selatan', '08:24:00', '20:41:00', '32', '33', 175000, 98, '2020-12-09 01:25:07', '2020-12-16 06:50:47'),
(39, 'Tegal Express', '04:41:00', '17:31:00', '34', '18', 300000, 99, '2020-12-09 01:41:52', '2020-12-16 06:44:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$8Vx4rtqqChYE/P9tLUcBIOuawedmGnXzrg8f1c5T.MzDo2nYip05C', NULL, NULL, NULL, '2020-12-05 10:53:16', '2020-12-05 10:53:16'),
(2, 'Ricky', 'Aprian', 'rickyaprian123@gmail.com', NULL, '$2y$10$tb8al41TmVFCr49193i5E.ySrIydap0yFX58MzgPGmRcXwqeiNMfK', NULL, NULL, NULL, '2020-12-09 01:34:18', '2020-12-09 02:10:18'),
(3, 'Suganda', 'Saefuloh', 'sugandaadi97@gmail.com', NULL, '$2y$10$EtAVdQzVxXpXRjspujcQduAGtBVcaD9ceu6bwSL4YrLQVV/ZKEDiO', NULL, NULL, NULL, '2020-12-09 01:36:53', '2020-12-09 01:59:58'),
(4, 'depras', 'depras', 'depras@gmail.com', NULL, '$2y$10$iCH5ZNFgn8tP/0kc4anEYOXSp.PsgUv2l7pD36XUc6ZnJfVY//kLi', NULL, NULL, NULL, '2020-12-09 21:50:07', '2020-12-09 21:50:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `passangers`
--
ALTER TABLE `passangers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `passangers`
--
ALTER TABLE `passangers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `stations`
--
ALTER TABLE `stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `trains`
--
ALTER TABLE `trains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
