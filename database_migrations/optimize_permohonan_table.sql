-- ============================================================================
-- MIGRATION: Optimize permohonan table for better performance and security
-- Date: 2025-11-19
-- Author: Claude Code Assistant
-- ============================================================================
--
-- IMPORTANT: BACKUP YOUR DATA FIRST!
-- Run this command before executing migration:
-- mysqldump -u username -p database_name permohonan > permohonan_backup_$(date +%Y%m%d).sql
--
-- ============================================================================

-- Step 1: Create backup table
CREATE TABLE IF NOT EXISTS `permohonan_backup` AS SELECT * FROM `permohonan`;

-- Step 2: Drop the old table
DROP TABLE IF EXISTS `permohonan`;

-- Step 3: Create optimized table structure
CREATE TABLE `permohonan` (
  -- Primary identifier with P prefix
  `mohon_id` VARCHAR(20) NOT NULL COMMENT 'Format: P + DDMMYY + auto increment (contoh: P191125001)',

  -- Pemohon identity information
  `nama` VARCHAR(255) NOT NULL COMMENT 'Nama lengkap pemohon',
  `pekerjaan` VARCHAR(100) NOT NULL COMMENT 'Pekerjaan pemohon',
  `alamat` TEXT NOT NULL COMMENT 'Alamat lengkap pemohon',
  `nohp` VARCHAR(20) NOT NULL COMMENT 'Nomor telepon/HP pemohon',
  `email` VARCHAR(255) NOT NULL COMMENT 'Email pemohon untuk notifikasi',

  -- Request details
  `rincian` TEXT NOT NULL COMMENT 'Rincian informasi yang dibutuhkan',
  `tujuan` VARCHAR(255) NOT NULL COMMENT 'Tujuan penggunaan informasi',
  `caraperoleh` VARCHAR(50) NOT NULL COMMENT 'Cara memperoleh informasi (Melihat/Membaca, Mendapat Salinan, dll)',
  `caradapat` VARCHAR(100) NOT NULL COMMENT 'Cara mendapatkan salinan (Mengambil Langsung, Kurir, Pos, Email, dll)',

  -- Attachment
  `ktp` VARCHAR(255) DEFAULT 'Belum Tersedia' COMMENT 'Filename KTP yang diupload',

  -- Status and dates
  `tanggal` DATETIME NOT NULL COMMENT 'Tanggal dan waktu permohonan dibuat',
  `status` VARCHAR(50) NOT NULL DEFAULT 'Menunggu Verifikasi' COMMENT 'Status: Menunggu Verifikasi, Sedang Diproses, Selesai, Ditolak',
  `tanggaljawab` DATETIME DEFAULT NULL COMMENT 'Tanggal dan waktu dijawab',
  `jawab` TEXT DEFAULT NULL COMMENT 'Jawaban/keterangan dari PPID',

  -- Audit trail
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu record dibuat',
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Waktu record terakhir diupdate',

  -- Keys and Indexes
  PRIMARY KEY (`mohon_id`),
  INDEX `idx_email` (`email`) COMMENT 'Index untuk pencarian by email',
  INDEX `idx_status` (`status`) COMMENT 'Index untuk filter by status',
  INDEX `idx_tanggal` (`tanggal`) COMMENT 'Index untuk sorting by tanggal',
  INDEX `idx_created_at` (`created_at`) COMMENT 'Index untuk sorting by created_at',
  INDEX `idx_nohp` (`nohp`) COMMENT 'Index untuk pencarian by nomor HP',
  FULLTEXT INDEX `idx_fulltext_search` (`nama`, `rincian`) COMMENT 'Fulltext search untuk nama dan rincian'

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabel permohonan informasi publik';

-- Step 4: Restore data from backup with data transformation
INSERT INTO permohonan (
  mohon_id, nama, pekerjaan, alamat, nohp, email, rincian, tujuan,
  caraperoleh, caradapat, ktp, tanggal, status, tanggaljawab, jawab
)
SELECT
  -- Add P prefix if not already present
  CASE
    WHEN mohon_id LIKE 'P%' THEN mohon_id
    ELSE CONCAT('P', mohon_id)
  END as mohon_id,
  nama,
  pekerjaan,
  alamat,
  nohp,
  email,
  rincian,
  tujuan,
  caraperoleh,
  caradapat,
  COALESCE(ktp, 'Belum Tersedia') as ktp,
  -- Convert DATE to DATETIME (add 00:00:00 time)
  CAST(tanggal AS DATETIME) as tanggal,
  status,
  -- Convert DATE to DATETIME (nullable)
  CASE
    WHEN tanggaljawab IS NOT NULL THEN CAST(tanggaljawab AS DATETIME)
    ELSE NULL
  END as tanggaljawab,
  jawab
FROM permohonan_backup;

-- Step 5: Verify data migration
SELECT
  COUNT(*) as total_migrated,
  COUNT(CASE WHEN mohon_id LIKE 'P%' THEN 1 END) as with_p_prefix,
  COUNT(CASE WHEN ktp = 'Belum Tersedia' THEN 1 END) as without_ktp
FROM permohonan;

-- Step 6 (OPTIONAL): Drop backup table after verification
-- DROP TABLE IF EXISTS `permohonan_backup`;

-- ============================================================================
-- VERIFICATION QUERIES
-- ============================================================================

-- Check table structure
SHOW CREATE TABLE `permohonan`;

-- Check all indexes
SHOW INDEX FROM `permohonan`;

-- Check column details
SELECT
  COLUMN_NAME,
  DATA_TYPE,
  CHARACTER_MAXIMUM_LENGTH,
  IS_NULLABLE,
  COLUMN_DEFAULT,
  COLUMN_TYPE,
  COLUMN_COMMENT
FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_NAME = 'permohonan'
ORDER BY ORDINAL_POSITION;

-- Sample data check
SELECT * FROM permohonan LIMIT 5;

-- Check for any NULL mohon_id (should be 0)
SELECT COUNT(*) as null_mohon_id FROM permohonan WHERE mohon_id IS NULL;

-- ============================================================================
-- PERFORMANCE TEST QUERIES
-- ============================================================================

-- Test index usage for common queries
EXPLAIN SELECT * FROM permohonan WHERE status = 'Menunggu Verifikasi';
EXPLAIN SELECT * FROM permohonan WHERE email = 'test@example.com';
EXPLAIN SELECT * FROM permohonan WHERE tanggal >= '2025-01-01';
EXPLAIN SELECT * FROM permohonan ORDER BY created_at DESC LIMIT 10;

-- Test fulltext search
SELECT * FROM permohonan
WHERE MATCH(nama, rincian) AGAINST('informasi' IN NATURAL LANGUAGE MODE)
LIMIT 10;

-- ============================================================================
-- ROLLBACK (in case of issues)
-- ============================================================================
-- If you need to rollback:
-- DROP TABLE permohonan;
-- RENAME TABLE permohonan_backup TO permohonan;

-- ============================================================================
-- POST-MIGRATION NOTES
-- ============================================================================
-- 1. All mohon_id values now have P prefix
-- 2. Dates now include time (DATETIME instead of DATE)
-- 3. TEXT fields replace VARCHAR for rincian, alamat, and jawab
-- 4. Indexes created for common query patterns
-- 5. Fulltext index for search functionality
-- 6. Audit timestamps (created_at, updated_at) available
-- 7. Better default values for ktp and status
--
-- Remember to update your application queries if needed!
-- ============================================================================
