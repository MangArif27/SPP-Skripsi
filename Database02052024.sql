-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 05:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tagihan`
--

CREATE TABLE `jenis_tagihan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `spp` varchar(255) NOT NULL,
  `ekstrakurikuler` varchar(255) DEFAULT NULL,
  `sarpras` varchar(255) DEFAULT NULL,
  `buku_lks` varchar(255) DEFAULT NULL,
  `pas` varchar(255) DEFAULT NULL,
  `study_tour` varchar(255) DEFAULT NULL,
  `pentas_seni` varchar(255) DEFAULT NULL,
  `map_rapor` varchar(255) DEFAULT NULL,
  `prakerin` varchar(255) DEFAULT NULL,
  `ldk` varchar(255) DEFAULT NULL,
  `kartu_pelajar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_tagihan`
--

INSERT INTO `jenis_tagihan` (`id`, `tahun_ajaran`, `semester`, `tingkat`, `spp`, `ekstrakurikuler`, `sarpras`, `buku_lks`, `pas`, `study_tour`, `pentas_seni`, `map_rapor`, `prakerin`, `ldk`, `kartu_pelajar`, `created_at`, `updated_at`) VALUES
(1, '2022/2023', 'Semester Genap', 'X', '250000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2022/2023', 'Semester Ganjil', 'X', '200000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2023/2024', 'Semester Ganjil', 'X', '300000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2022/2023', 'Semester Ganjil', 'XI', '200000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_19_132216_create_siswa_table', 2),
(6, '2024_03_19_140943_modify_siswa_table', 3),
(7, '2024_03_24_150128_create_pengaturan_table', 4),
(8, '2024_03_24_150456_create_tahun_ajaran_table', 4),
(9, '2024_03_28_183439_create_jenis_tagihan_table', 5),
(10, '2024_03_28_183905_create_pembayaran_spp_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_spp`
--

CREATE TABLE `pembayaran_spp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `spp_a` date DEFAULT NULL,
  `spp_b` date DEFAULT NULL,
  `spp_c` date DEFAULT NULL,
  `spp_d` date DEFAULT NULL,
  `spp_e` date DEFAULT NULL,
  `spp_f` date DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran_spp`
--

INSERT INTO `pembayaran_spp` (`id`, `nis`, `tahun_ajaran`, `semester`, `tingkat`, `spp_a`, `spp_b`, `spp_c`, `spp_d`, `spp_e`, `spp_f`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '19100198', '2022/2023', 'Semester Ganjil', 'X', '2024-04-30', '2024-05-02', NULL, NULL, NULL, NULL, 'Belum Lunas', '2024-04-30 16:27:51', NULL),
(2, '19300188', '2022/2023', 'Semester Ganjil', 'XI', NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Lunas', '2024-05-01 06:13:30', NULL),
(4, '19100198', '2022/2023', 'Semester Genap', 'X', '2024-04-30', NULL, NULL, NULL, NULL, NULL, 'Belum Lunas', '2024-04-30 16:25:27', NULL),
(7, '19100198', '2023/2024', 'Semester Ganjil', 'X', NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Lunas', '2024-04-30 16:53:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sekolah` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(255) NOT NULL,
  `faximile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `nama_kepsek` varchar(255) NOT NULL,
  `nama_bendahara` varchar(255) NOT NULL,
  `jumlah_kejuruan` varchar(255) NOT NULL,
  `jumlah_gtk` varchar(255) NOT NULL,
  `jumlah_kelas` varchar(255) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `sekolah`, `alamat`, `telpon`, `faximile`, `email`, `website`, `nama_kepsek`, `nama_bendahara`, `jumlah_kejuruan`, `jumlah_gtk`, `jumlah_kelas`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`) VALUES
(20258060, 'SMK Madani Depok', 'cdmlkjashndijeanclas ;,cmdwsocw4ad54e6d416ew54decmsdjcbhuweg', '0000', '-', 'mskamd@gmail.com', 'https://smkndmak.com', 'dedwa', 'dawdawd', '3', '18', '10', '2022/2023', 'Semester Genap', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(255) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `jenis_kelamin`, `alamat`, `agama`, `tingkat`, `kelas`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`) VALUES
(1, '19100198', 'ADI SAPUTRA SITUMORANG SIAHAAN', 'Laki-Laki', 'Cibinong', 'Islam', 'X', 'TKJ 1', '2022/2023', 'Semester Ganjil', '2024-04-30 16:24:37', '2024-04-30 16:24:37'),
(2, '19300188', 'WAHYU', 'Laki-Laki', 'Depok', 'Islam', 'XI', 'TKJ 1', '2022/2023', 'Semester Ganjil', '2024-04-30 16:24:37', '2024-04-30 16:24:37'),
(3, '19566020', 'SAMPER', 'Laki-Laki', 'Sawangan', 'Islam', 'XII', 'TKJ 1', '2022/2023', 'Semester Ganjil', '2024-04-30 16:24:37', '2024-04-30 16:24:37'),
(4, '19100198', 'ADI SAPUTRA SITUMORANG SIAHAAN', 'Laki-Laki', 'Cibinong', 'Islam', 'X', 'TKJ 1', '2022/2023', 'Semester Genap', '2024-04-30 16:24:56', '2024-04-30 16:24:56'),
(5, '19300188', 'WAHYU', 'Laki-Laki', 'Depok', 'Islam', 'XI', 'TKJ 1', '2022/2023', 'Semester Genap', '2024-04-30 16:24:56', '2024-04-30 16:24:56'),
(6, '19566020', 'SAMPER', 'Laki-Laki', 'Sawangan', 'Islam', 'XII', 'TKJ 1', '2022/2023', 'Semester Genap', '2024-04-30 16:24:56', '2024-04-30 16:24:56'),
(7, '19100198', 'ADI SAPUTRA SITUMORANG SIAHAAN', 'Laki-Laki', 'Cibinong', 'Islam', 'X', 'TKJ 1', '2023/2024', 'Semester Ganjil', '2024-04-30 16:52:37', '2024-04-30 16:52:37'),
(8, '19300188', 'WAHYU', 'Laki-Laki', 'Depok', 'Islam', 'XI', 'TKJ 1', '2023/2024', 'Semester Ganjil', '2024-04-30 16:52:37', '2024-04-30 16:52:37'),
(9, '19566020', 'SAMPER', 'Laki-Laki', 'Sawangan', 'Islam', 'XII', 'TKJ 1', '2023/2024', 'Semester Ganjil', '2024-04-30 16:52:37', '2024-04-30 16:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(2, '2022/2023', NULL, NULL),
(1, '2023/2024', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_tagihan`
--
ALTER TABLE `jenis_tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `NIS` (`nis`) USING BTREE;

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`tahun_ajaran`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `nis` (`nis`) USING BTREE;

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`tahun_ajaran`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_tagihan`
--
ALTER TABLE `jenis_tagihan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20258061;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  ADD CONSTRAINT `pembayaran_spp_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD CONSTRAINT `pengaturan_ibfk_1` FOREIGN KEY (`tahun_ajaran`) REFERENCES `tahun_ajaran` (`tahun_ajaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
