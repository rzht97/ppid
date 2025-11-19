-- ============================================================================
-- PPID Database Setup - Create Database & Tables
-- Date: 2025-01-19
-- Database: ppid
-- Charset: utf8mb4 (support emoji dan international characters)
-- ============================================================================

-- Step 1: Create Database
CREATE DATABASE IF NOT EXISTS `ppid`
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE `ppid`;

-- ============================================================================
-- Table: permohonan (Information Requests)
-- ============================================================================
CREATE TABLE IF NOT EXISTS `permohonan` (
  `mohon_id` VARCHAR(20) NOT NULL COMMENT 'Format: P + DDMMYY + auto increment (contoh: P191125001)',
  `nama` VARCHAR(255) NOT NULL COMMENT 'Nama lengkap pemohon',
  `alamat` TEXT NOT NULL COMMENT 'Alamat lengkap pemohon',
  `nohp` VARCHAR(20) NOT NULL COMMENT 'Nomor HP/telepon',
  `email` VARCHAR(255) NOT NULL COMMENT 'Email pemohon',
  `pekerjaan` VARCHAR(100) NOT NULL COMMENT 'Pekerjaan pemohon',
  `rincian` TEXT NOT NULL COMMENT 'Rincian informasi yang dimohon',
  `tujuan` TEXT NOT NULL COMMENT 'Tujuan penggunaan informasi',
  `caraperoleh` VARCHAR(100) NOT NULL COMMENT 'Cara memperoleh informasi (Melihat/Membaca/Mendengar/Mencatat/Salinan Soft Copy/Salinan Hard Copy)',
  `caramendapat` VARCHAR(100) NOT NULL COMMENT 'Cara mendapat salinan (Mengambil Langsung/Kurir/Pos/Faksimili/Email)',
  `tanggal` DATETIME DEFAULT NULL COMMENT 'Tanggal permohonan diajukan',
  `status` VARCHAR(50) NOT NULL DEFAULT 'Menunggu Verifikasi' COMMENT 'Status: Menunggu Verifikasi, Sedang Diproses, Selesai, Ditolak',
  `jawab` TEXT DEFAULT NULL COMMENT 'Jawaban/tanggapan dari PPID',
  `tanggaljawab` DATETIME DEFAULT NULL COMMENT 'Tanggal jawaban diberikan',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu record dibuat',
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Waktu record terakhir diupdate',

  PRIMARY KEY (`mohon_id`),
  INDEX `idx_email` (`email`),
  INDEX `idx_status` (`status`),
  INDEX `idx_tanggal` (`tanggal`),
  INDEX `idx_created_at` (`created_at`),
  FULLTEXT INDEX `idx_fulltext_search` (`nama`, `rincian`, `tujuan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabel permohonan informasi publik';

-- ============================================================================
-- Table: keberatan (Objections)
-- ============================================================================
CREATE TABLE IF NOT EXISTS `keberatan` (
  `id_keberatan` VARCHAR(20) NOT NULL COMMENT 'Format: K + DDMMYY + auto increment (contoh: K191125001)',
  `mohon_id` VARCHAR(20) NOT NULL COMMENT 'Foreign key ke tabel permohonan',
  `alasan` VARCHAR(255) NOT NULL COMMENT 'Alasan pengajuan keberatan',
  `kronologi` TEXT NOT NULL COMMENT 'Uraian kronologi keberatan secara detail',
  `tanggal` DATETIME DEFAULT NULL COMMENT 'Tanggal dan waktu keberatan diajukan',
  `tanggapan` TEXT DEFAULT NULL COMMENT 'Tanggapan dari PPID terhadap keberatan',
  `putusan` TEXT DEFAULT NULL COMMENT 'Putusan atas keberatan yang diajukan',
  `status` VARCHAR(50) NOT NULL DEFAULT 'Menunggu Verifikasi' COMMENT 'Status: Menunggu Verifikasi, Sedang Diproses, Diterima, Ditolak',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu record dibuat',
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Waktu record terakhir diupdate',

  PRIMARY KEY (`id_keberatan`),
  INDEX `idx_mohon_id` (`mohon_id`) COMMENT 'Index untuk query berdasarkan mohon_id',
  INDEX `idx_status` (`status`) COMMENT 'Index untuk filter berdasarkan status',
  INDEX `idx_tanggal` (`tanggal`) COMMENT 'Index untuk sorting berdasarkan tanggal',
  INDEX `idx_created_at` (`created_at`) COMMENT 'Index untuk sorting berdasarkan waktu dibuat',
  CONSTRAINT `fk_keberatan_permohonan` FOREIGN KEY (`mohon_id`) REFERENCES `permohonan` (`mohon_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabel keberatan atas permohonan informasi publik';

-- ============================================================================
-- Table: user (Admin Users)
-- ============================================================================
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL COMMENT 'Hashed password',
  `nama` VARCHAR(255) NOT NULL COMMENT 'Nama lengkap user',
  `email` VARCHAR(255) NOT NULL,
  `level` ENUM('admin', 'operator', 'viewer') NOT NULL DEFAULT 'operator' COMMENT 'Level akses user',
  `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
  `last_login` DATETIME DEFAULT NULL COMMENT 'Waktu login terakhir',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

  PRIMARY KEY (`id_user`),
  UNIQUE KEY `unique_username` (`username`),
  UNIQUE KEY `unique_email` (`email`),
  INDEX `idx_level` (`level`),
  INDEX `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabel user admin';

-- ============================================================================
-- Insert Default Admin User
-- Username: admin
-- Password: admin123 (HARUS DIGANTI SETELAH LOGIN PERTAMA!)
-- ============================================================================
INSERT INTO `user` (`username`, `password`, `nama`, `email`, `level`, `status`) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin@ppid.sumedangkab.go.id', 'admin', 'active')
ON DUPLICATE KEY UPDATE `username` = `username`;

-- Password hash untuk 'admin123'
-- PENTING: Segera ganti password setelah login pertama!

-- ============================================================================
-- Table: ci_sessions (untuk CodeIgniter session)
-- ============================================================================
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` VARCHAR(128) NOT NULL,
  `ip_address` VARCHAR(45) NOT NULL,
  `timestamp` INT(10) UNSIGNED DEFAULT 0 NOT NULL,
  `data` BLOB NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- Sample Data untuk Testing (Optional - Uncomment jika diperlukan)
-- ============================================================================

-- Sample Permohonan
-- INSERT INTO `permohonan` (`mohon_id`, `nama`, `alamat`, `nohp`, `email`, `pekerjaan`, `rincian`, `tujuan`, `caraperoleh`, `caramendapat`, `tanggal`, `status`) VALUES
-- ('P191125001', 'John Doe', 'Jl. Contoh No. 123, Sumedang', '081234567890', 'john@example.com', 'Wiraswasta', 'Informasi tentang APBD Kabupaten Sumedang 2024', 'Untuk penelitian', 'Salinan Soft Copy', 'Email', NOW(), 'Menunggu Verifikasi');

-- Sample Keberatan
-- INSERT INTO `keberatan` (`id_keberatan`, `mohon_id`, `alasan`, `kronologi`, `tanggal`, `status`) VALUES
-- ('K191125001', 'P191125001', 'Informasi tidak lengkap', 'Permohonan informasi telah diajukan pada tanggal X, namun informasi yang diberikan tidak lengkap...', NOW(), 'Menunggu Verifikasi');

-- ============================================================================
-- Verification Queries
-- ============================================================================

-- Cek semua tabel
SHOW TABLES;

-- Cek struktur tabel permohonan
DESCRIBE `permohonan`;

-- Cek struktur tabel keberatan
DESCRIBE `keberatan`;

-- Cek struktur tabel user
DESCRIBE `user`;

-- Cek default admin user
SELECT `id_user`, `username`, `nama`, `email`, `level`, `status` FROM `user`;

-- ============================================================================
-- END OF DATABASE SETUP
-- ============================================================================
