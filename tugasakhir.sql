-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2024 at 11:48 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumens`
--

CREATE TABLE `dokumens` (
  `id` int(11) NOT NULL,
  `judul_dokumen` varchar(255) NOT NULL,
  `deskripsi_dokumen` text NOT NULL,
  `kategori_dokumen` varchar(255) NOT NULL,
  `validasi_dokumen` varchar(255) NOT NULL,
  `tahun_dokumen` year(4) NOT NULL,
  `dokumen_file` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumens`
--

INSERT INTO `dokumens` (`id`, `judul_dokumen`, `deskripsi_dokumen`, `kategori_dokumen`, `validasi_dokumen`, `tahun_dokumen`, `dokumen_file`, `tags`, `status`, `created_at`, `updated_at`) VALUES
(71, 'Dokumen ketiga', 'Deskripsi dokumen ketiga', 'Dokumen Tujuan', 'Ketua Program Studi', 2024, 'UML.pdf', 'tags,edit', 'active', '2024-06-11 23:47:52', '2024-06-12 01:22:58'),
(73, 'Iuran kedua', 'deskripsi iuran', 'Dokumen Iuran', 'Ketua Program Studi', 2024, 'Dokumen Internal.pdf', 'iuran', 'active', '2024-06-11 23:48:28', '2024-06-12 01:20:08'),
(74, 'Kegiatan Penelitian update', 'deskripsi update', 'Dokumen Penelitian', 'Direktur', 2024, 'UML.pdf', 'penelitian', 'active', '2024-06-12 01:01:03', '2024-06-12 01:11:19'),
(76, 'Dokumen Kelengkapan Jurusan', 'Ini adalah deskripsi dokumen', 'Dokumen Sarana Prasarana', 'Direktur', 2024, 'jawaban.pdf', 'sarana, dokumen', 'active', '2024-06-12 01:30:48', '2024-06-12 01:32:18'),
(77, 'Kurikulum TRPL', 'Deskripsi kurikulum', 'Dokumen Pendidikan', 'Ketua Program Studi', 2022, 'Dokumen Internal.pdf', 'kurikulum, dokumen', 'active', '2024-06-12 01:43:44', '2024-06-12 01:43:44'),
(78, 'Proposal Edit', 'deskripsi', 'Dokumen Pengabdian Kepada Masyarakat', 'Ketua Program Studi', 2024, 'Dokumen Internal.pdf', 'penelitian,pengabdian', 'active', '2024-06-12 02:07:21', '2024-06-12 02:07:33'),
(79, 'Dokumen testing', 'Ini adalah deskripsi dokumen testing', 'Dokumen Tujuan', 'Ketua Jurusan', 2023, 'Kartu Pendaftaran DTS.pdf', 'testing, satu, dua', 'active', '2024-06-13 02:00:31', '2024-06-13 02:00:31'),
(80, 'Kurikulum MI', 'Deskripsi kurikulum', 'Dokumen Pendidikan', 'Ketua Program Studi', 2024, 'Dokumen Internal.pdf', 'kurikulum, dokumen, mi', 'active', '2024-06-13 02:17:27', '2024-06-13 02:17:27'),
(81, 'Judul dokumen', 'Ini adalah deskripsi dokume', 'Dokumen Strategi', 'Ketua Jurusan', 2024, '1717333249.pdf', 'tag1', 'active', '2024-06-13 03:07:19', '2024-06-13 03:07:19'),
(84, 'Dokumen Laporan', 'Sertifikat organisasi', 'Dokumen Visi Misi', 'Ketua Jurusan', 2023, '1717425614.pdf', 'tag', 'active', '2024-06-13 05:08:41', '2024-06-13 05:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `draft`
--

CREATE TABLE `draft` (
  `id` int(11) NOT NULL,
  `judul_dokumen` varchar(225) CHARACTER SET utf8mb4 NOT NULL,
  `deskripsi_dokumen` text CHARACTER SET utf8mb4 NOT NULL,
  `kategori_dokumen` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `validasi_dokumen` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `tahun_dokumen` year(4) NOT NULL,
  `dokumen_file` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `status` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `draft`
--

INSERT INTO `draft` (`id`, `judul_dokumen`, `deskripsi_dokumen`, `kategori_dokumen`, `validasi_dokumen`, `tahun_dokumen`, `dokumen_file`, `tags`, `status`, `updated_at`, `created_at`) VALUES
(25, 'Visi Misi TRPL', 'Deskripsi Visi Misi', 'Dokumen Visi Misi', 'Ketua Program Studi', 2023, 'Dokumen Internal.pdf', 'Visi misi', 'draft', '2024-06-13 05:08:25', '2024-06-13 05:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `draft_documents`
--

CREATE TABLE `draft_documents` (
  `id` int(11) NOT NULL,
  `judul_dokumen` varchar(225) CHARACTER SET utf8mb4 NOT NULL,
  `deskripsi_dokumen` text CHARACTER SET utf8mb4 NOT NULL,
  `kategori_dokumen` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `tahun_dokumen` year(4) NOT NULL,
  `dokumen_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `draft_documents`
--

INSERT INTO `draft_documents` (`id`, `judul_dokumen`, `deskripsi_dokumen`, `kategori_dokumen`, `tahun_dokumen`, `dokumen_file`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'Visi Misi TRPL', 'Dokumen berisi tentang visi misi PRODI TRPL', 'jurusan', 0000, '1715863777.pdf', 'dokumen, visi misi, TRPL', '2024-05-16 07:49:02', '2024-05-16 07:49:02'),
(2, 'Dokumen Kerja Sama Jurusan', 'Berisi kerjasama antara jurusan', 'kerjasama', 0000, '1715863891.pdf', 'kerjasama, jurusan', '2024-05-16 07:53:56', '2024-05-16 07:53:56'),
(3, 'Dokumen Keuangan Tahunan', 'Informasi keuangan tahunan', 'keuangan', 0000, '1715871231.pdf', 'dokumen, tahunan, keuangan', '2024-05-16 07:57:23', '2024-05-16 07:57:23'),
(4, 'Dokumen Keuangan Tahunan', 'Informasi keuangan tahunan jurusan', 'jurusan', 0000, '1715871610.pdf', 'dokumen, tahunan, keuangan', '2024-05-16 08:00:21', '2024-05-16 08:00:21'),
(5, 'Dokumen Pemberitahuan', 'dokumen pemberitahuan mahasiswa', 'Dokumen Pendidikan', 2024, '1716198611.pdf', 'pemberitahuan, dokumen', '2024-05-20 03:03:27', '2024-05-20 03:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dokumen_id` int(11) NOT NULL,
  `judul_dokumen` varchar(255) NOT NULL,
  `deskripsi_dokumen` text NOT NULL,
  `kategori_dokumen` varchar(255) NOT NULL,
  `validasi_dokumen` varchar(255) NOT NULL,
  `tahun_dokumen` int(11) NOT NULL,
  `dokumen_file` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `dokumen_id`, `judul_dokumen`, `deskripsi_dokumen`, `kategori_dokumen`, `validasi_dokumen`, `tahun_dokumen`, `dokumen_file`, `tags`, `created_at`, `updated_at`) VALUES
(2, 74, 'Penelitian dosen', 'penelitian', 'Dokumen Penelitian', 'Direktur', 2024, 'Dokumen Internal.pdf', 'penelitian', '2024-06-12 01:10:41', '2024-06-12 01:10:41'),
(3, 74, 'Kegiatan Penelitian', 'deskripsi', 'Dokumen Penelitian', 'Direktur', 2024, 'Dokumen Internal.pdf', 'penelitian', '2024-06-12 01:11:19', '2024-06-12 01:11:19'),
(4, 73, 'Iuran', 'deskripsi', 'Dokumen Iuran', 'Ketua Program Studi', 2024, 'Dokumen Internal.pdf', 'iuran', '2024-06-12 01:20:08', '2024-06-12 01:20:08'),
(5, 71, 'Dokumen Laporan', 'Deskripsi berisi laporan kegiatan', 'Dokumen Visi Misi', 'Kelompok Bidang Keahlian', 2023, 'Use Case Diagram.pdf', 'tags,edit', '2024-06-12 01:21:24', '2024-06-12 01:21:24'),
(6, 71, 'Dokumen', 'Deskripsi dokumen', 'Dokumen Tujuan', 'Ketua Program Studi', 2024, 'Dokumen Internal.pdf', 'tags,edit', '2024-06-12 01:22:57', '2024-06-12 01:22:57'),
(7, 76, 'Dokumen Kelengkapan Kelas', 'Ini adalah deskripsi dokumen', 'Dokumen Sarana Prasarana', 'Direktur', 2024, 'jawaban.pdf', 'sarana, dokumen', '2024-06-12 01:31:07', '2024-06-12 01:31:07'),
(8, 76, 'Dokumen Kelengkapan Jurusan', 'Ini adalah deskripsi dokumen', 'Dokumen Sarana Prasarana', 'Direktur', 2024, 'jawaban.pdf', 'sarana, dokumen', '2024-06-12 01:31:32', '2024-06-12 01:31:32'),
(9, 76, 'Dokumen Kelengkapan Jurusan', 'Ini adalah deskripsi dokumen', 'Dokumen Sarana Prasarana', 'Direktur', 2024, 'Dokumen Internal.pdf', 'sarana, dokumen', '2024-06-12 01:32:18', '2024-06-12 01:32:18'),
(10, 78, 'Proposal', 'deskripsi', 'Dokumen Pengabdian Kepada Masyarakat', 'Ketua Program Studi', 2024, 'Dokumen Internal.pdf', 'penelitian,pengabdian', '2024-06-12 02:07:33', '2024-06-12 02:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2024_05_11_051820_create_dokumens_table', 3),
(8, '2014_10_12_000000_create_users_table', 4),
(9, '2014_10_12_100000_create_password_reset_tokens_table', 4),
(10, '2014_10_12_100000_create_password_resets_table', 4),
(11, '2019_08_19_000000_create_failed_jobs_table', 4),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(13, '2024_05_11_151005_create_dokumens_table', 4),
(14, '2024_05_13_064751_create_roles_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_dokumen` date NOT NULL,
  `dokumen_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super user', 'superuser@example.com', NULL, '$2y$12$3U52mGDwQa42EB7wGtvEoev4OG3WqRFwtggZ1ynhrcg8OVNQfoNQO', '9JFG9uGUCssc9cKVfsh614tELoPcXPwaXNukSrcDhiPdkzrriaqwnYkKN0fv', '2024-05-09 00:52:21', '2024-05-09 00:52:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `draft`
--
ALTER TABLE `draft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `draft_documents`
--
ALTER TABLE `draft_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokumen_id` (`dokumen_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `draft`
--
ALTER TABLE `draft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `draft_documents`
--
ALTER TABLE `draft_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_ibfk_1` FOREIGN KEY (`dokumen_id`) REFERENCES `dokumens` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
