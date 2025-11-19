-- ============================================================================
-- MIGRATION: Add P and K prefix to existing IDs without prefix
-- Date: 2025-11-19
-- Description: Updates old format IDs to new format with prefix
-- ============================================================================
--
-- This script updates:
-- - permohonan.mohon_id: 191125410 → P191125410
-- - keberatan.id_keberatan: 191125410 → K191125410
-- - keberatan.mohon_id references: 191125410 → P191125410
--
-- ============================================================================

-- Step 1: Backup tables
CREATE TABLE IF NOT EXISTS `permohonan_backup_prefix` AS SELECT * FROM `permohonan`;
CREATE TABLE IF NOT EXISTS `keberatan_backup_prefix` AS SELECT * FROM `keberatan`;

-- Step 2: Show data that will be updated
SELECT
    'PERMOHONAN' as table_name,
    mohon_id as old_id,
    CONCAT('P', mohon_id) as new_id,
    nama,
    email
FROM permohonan
WHERE mohon_id NOT LIKE 'P%'
  AND mohon_id REGEXP '^[0-9]+$'
ORDER BY mohon_id DESC
LIMIT 10;

SELECT
    'KEBERATAN' as table_name,
    id_keberatan as old_id,
    CONCAT('K', id_keberatan) as new_id,
    mohon_id as old_mohon_id,
    CONCAT('P', mohon_id) as new_mohon_id
FROM keberatan
WHERE id_keberatan NOT LIKE 'K%'
  AND id_keberatan REGEXP '^[0-9]+$'
ORDER BY id_keberatan DESC
LIMIT 10;

-- Step 3: Confirmation message
SELECT 'Please review the above data. If correct, execute the UPDATE statements below.' as message;

-- ============================================================================
-- IMPORTANT: Review the SELECT results above before running UPDATEs!
-- ============================================================================

-- Step 4: Update permohonan table - add P prefix
UPDATE permohonan
SET mohon_id = CONCAT('P', mohon_id)
WHERE mohon_id NOT LIKE 'P%'
  AND mohon_id REGEXP '^[0-9]+$';

-- Step 5: Update keberatan table - add K prefix to id_keberatan
UPDATE keberatan
SET id_keberatan = CONCAT('K', id_keberatan)
WHERE id_keberatan NOT LIKE 'K%'
  AND id_keberatan REGEXP '^[0-9]+$';

-- Step 6: Update keberatan table - add P prefix to mohon_id references
UPDATE keberatan
SET mohon_id = CONCAT('P', mohon_id)
WHERE mohon_id NOT LIKE 'P%'
  AND mohon_id REGEXP '^[0-9]+$';

-- Step 7: Verify updates
SELECT
    'AFTER UPDATE - PERMOHONAN' as status,
    COUNT(*) as total_records,
    COUNT(CASE WHEN mohon_id LIKE 'P%' THEN 1 END) as with_p_prefix,
    COUNT(CASE WHEN mohon_id NOT LIKE 'P%' THEN 1 END) as without_prefix
FROM permohonan;

SELECT
    'AFTER UPDATE - KEBERATAN' as status,
    COUNT(*) as total_records,
    COUNT(CASE WHEN id_keberatan LIKE 'K%' THEN 1 END) as with_k_prefix,
    COUNT(CASE WHEN id_keberatan NOT LIKE 'K%' THEN 1 END) as without_prefix
FROM keberatan;

-- Step 8: Show sample updated records
SELECT 'Updated permohonan records:' as message;
SELECT mohon_id, nama, email, tanggal
FROM permohonan
WHERE mohon_id LIKE 'P%'
ORDER BY tanggal DESC
LIMIT 5;

SELECT 'Updated keberatan records:' as message;
SELECT id_keberatan, mohon_id, alasan, tanggal
FROM keberatan
WHERE id_keberatan LIKE 'K%'
ORDER BY tanggal DESC
LIMIT 5;

-- ============================================================================
-- ROLLBACK (if needed)
-- ============================================================================
-- If something goes wrong, restore from backup:
-- DROP TABLE permohonan;
-- RENAME TABLE permohonan_backup_prefix TO permohonan;
-- DROP TABLE keberatan;
-- RENAME TABLE keberatan_backup_prefix TO keberatan;

-- ============================================================================
-- CLEANUP (after verification)
-- ============================================================================
-- After verifying everything is correct, drop backup tables:
-- DROP TABLE IF EXISTS permohonan_backup_prefix;
-- DROP TABLE IF EXISTS keberatan_backup_prefix;

-- ============================================================================
-- END OF MIGRATION
-- ============================================================================
