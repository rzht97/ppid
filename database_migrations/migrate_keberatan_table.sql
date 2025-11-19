-- ============================================================================
-- MIGRATION: Restructure keberatan table for improved security and efficiency
-- Date: 2025-11-19
-- Author: Claude Code Assistant
-- ============================================================================
--
-- IMPORTANT: BACKUP YOUR DATA FIRST!
-- Run this command before executing migration:
-- mysqldump -u username -p database_name keberatan > keberatan_backup.sql
--
-- ============================================================================

-- Step 1: Create backup table
CREATE TABLE IF NOT EXISTS `keberatan_backup` AS SELECT * FROM `keberatan`;

-- Step 2: Drop the old table
DROP TABLE IF EXISTS `keberatan`;

-- Step 3: Create new table with improved structure
CREATE TABLE `keberatan` (
  `id_keberatan` VARCHAR(20) NOT NULL COMMENT 'Format: K + DDMMYY + auto increment (contoh: K191125001)',
  `mohon_id` VARCHAR(20) NOT NULL COMMENT 'Format: P + DDMMYY + auto increment (contoh: P191125001)',
  `alasan` VARCHAR(255) NOT NULL COMMENT 'Alasan pengajuan keberatan',
  `kronologi` TEXT NOT NULL COMMENT 'Uraian kronologi keberatan secara detail',
  `tanggal` DATETIME DEFAULT NULL COMMENT 'Tanggal dan waktu keberatan diajukan',
  `tanggapan` TEXT DEFAULT NULL COMMENT 'Tanggapan dari PPID terhadap keberatan',
  `putusan` TEXT DEFAULT NULL COMMENT 'Putusan atas keberatan yang diajukan',
  `status` VARCHAR(50) NOT NULL DEFAULT 'Menunggu Verifikasi' COMMENT 'Status: Menunggu Verifikasi, Sedang Diproses, Selesai, Ditolak',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu record dibuat',
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Waktu record terakhir diupdate',

  PRIMARY KEY (`id_keberatan`),
  INDEX `idx_mohon_id` (`mohon_id`) COMMENT 'Index untuk query berdasarkan mohon_id',
  INDEX `idx_status` (`status`) COMMENT 'Index untuk filter berdasarkan status',
  INDEX `idx_tanggal` (`tanggal`) COMMENT 'Index untuk sorting berdasarkan tanggal',
  INDEX `idx_created_at` (`created_at`) COMMENT 'Index untuk sorting berdasarkan waktu dibuat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabel keberatan atas permohonan informasi publik';

-- Step 4 (OPTIONAL): Restore data from backup if needed
-- If you have old data with INT format, you'll need to convert it
-- This is just an example - adjust based on your actual data
-- INSERT INTO keberatan (id_keberatan, mohon_id, alasan, kronologi, status, tanggal)
-- SELECT
--   CONCAT('K', id_keberatan),  -- Convert INT to VARCHAR with K prefix
--   CONCAT('P', mohon_id),      -- Convert INT to VARCHAR with P prefix
--   alasan,
--   kronologi,
--   status,
--   tanggal
-- FROM keberatan_backup;

-- Step 5 (OPTIONAL): Drop backup table after verification
-- DROP TABLE IF EXISTS `keberatan_backup`;

-- ============================================================================
-- VERIFICATION QUERIES
-- ============================================================================

-- Check table structure
SHOW CREATE TABLE `keberatan`;

-- Check indexes
SHOW INDEX FROM `keberatan`;

-- Count records
SELECT COUNT(*) as total_records FROM `keberatan`;

-- ============================================================================
-- ROLLBACK (in case of issues)
-- ============================================================================
-- If you need to rollback:
-- DROP TABLE keberatan;
-- RENAME TABLE keberatan_backup TO keberatan;

-- ============================================================================
-- END OF MIGRATION
-- ============================================================================
