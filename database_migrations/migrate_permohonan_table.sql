-- ============================================================================
-- MIGRATION: Update permohonan table for VARCHAR mohon_id
-- Date: 2025-11-19
-- Author: Claude Code Assistant
-- ============================================================================
--
-- IMPORTANT: BACKUP YOUR DATA FIRST!
-- Run this command before executing migration:
-- mysqldump -u username -p database_name permohonan > permohonan_backup.sql
--
-- Note: This migration changes mohon_id from INT to VARCHAR to support
--       the new format: P + DDMMYY + auto increment (e.g., P191125001)
--
-- ============================================================================

-- Step 1: Check current structure
DESCRIBE `permohonan`;

-- Step 2: Alter mohon_id column type
-- WARNING: Make sure no other tables have foreign key constraints to this column
ALTER TABLE `permohonan`
  MODIFY COLUMN `mohon_id` VARCHAR(20) NOT NULL COMMENT 'Format: P + DDMMYY + auto increment (contoh: P191125001)';

-- Step 3: Add indexes for better performance (if not already exist)
ALTER TABLE `permohonan`
  ADD INDEX IF NOT EXISTS `idx_mohon_id` (`mohon_id`),
  ADD INDEX IF NOT EXISTS `idx_status` (`status`),
  ADD INDEX IF NOT EXISTS `idx_tanggal` (`tanggal`),
  ADD INDEX IF NOT EXISTS `idx_email` (`email`);

-- Step 4: Update charset to utf8mb4 for better character support
ALTER TABLE `permohonan`
  CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Step 5 (OPTIONAL): Add timestamp columns for tracking if not exist
-- Uncomment if you want to add these fields:
-- ALTER TABLE `permohonan`
--   ADD COLUMN IF NOT EXISTS `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--   ADD COLUMN IF NOT EXISTS `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

-- ============================================================================
-- VERIFICATION QUERIES
-- ============================================================================

-- Check table structure
SHOW CREATE TABLE `permohonan`;

-- Check indexes
SHOW INDEX FROM `permohonan`;

-- Count records
SELECT COUNT(*) as total_records FROM `permohonan`;

-- Check mohon_id format (should show VARCHAR)
SELECT
  COLUMN_NAME,
  DATA_TYPE,
  CHARACTER_MAXIMUM_LENGTH,
  COLUMN_TYPE
FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_NAME = 'permohonan' AND COLUMN_NAME = 'mohon_id';

-- ============================================================================
-- NOTES
-- ============================================================================
-- After this migration:
-- - Old numeric mohon_id values will remain as-is (e.g., "191125001")
-- - New mohon_id values will have P prefix (e.g., "P191125001")
-- - Both formats will work, but new entries will use the P prefix
-- - Consider updating old records if you want consistency:
--   UPDATE permohonan SET mohon_id = CONCAT('P', mohon_id)
--   WHERE mohon_id NOT LIKE 'P%' AND LENGTH(mohon_id) = 9;
-- ============================================================================
