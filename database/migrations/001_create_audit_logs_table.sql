-- =====================================================
-- Audit Logs Table Migration
-- Created: 2025-11-22
-- Purpose: Track all admin activities for security
-- =====================================================

CREATE TABLE IF NOT EXISTS `audit_logs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) DEFAULT NULL COMMENT 'ID admin yang melakukan aksi (dari session)',
  `username` VARCHAR(100) DEFAULT NULL COMMENT 'Username admin',
  `action` VARCHAR(100) NOT NULL COMMENT 'Jenis aksi: create, update, delete, verify, process',
  `table_name` VARCHAR(50) NOT NULL COMMENT 'Nama tabel yang terpengaruh',
  `record_id` VARCHAR(100) DEFAULT NULL COMMENT 'ID record yang terpengaruh',
  `old_values` TEXT DEFAULT NULL COMMENT 'Data lama sebelum perubahan (JSON)',
  `new_values` TEXT DEFAULT NULL COMMENT 'Data baru setelah perubahan (JSON)',
  `description` VARCHAR(255) DEFAULT NULL COMMENT 'Deskripsi singkat aktivitas',
  `ip_address` VARCHAR(45) NOT NULL COMMENT 'IP address admin',
  `user_agent` VARCHAR(255) DEFAULT NULL COMMENT 'Browser/device admin',
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu aktivitas',
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_action` (`action`),
  KEY `idx_table_name` (`table_name`),
  KEY `idx_record_id` (`record_id`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Log semua aktivitas admin untuk audit trail';

-- =====================================================
-- Contoh Query untuk Melihat Log
-- =====================================================

-- Melihat semua aktivitas admin hari ini:
-- SELECT * FROM audit_logs WHERE DATE(created_at) = CURDATE() ORDER BY created_at DESC;

-- Melihat aktivitas delete:
-- SELECT * FROM audit_logs WHERE action = 'delete' ORDER BY created_at DESC LIMIT 50;

-- Melihat aktivitas untuk record tertentu:
-- SELECT * FROM audit_logs WHERE table_name = 'permohonan' AND record_id = 'P221125001' ORDER BY created_at DESC;

-- Melihat aktivitas user tertentu:
-- SELECT * FROM audit_logs WHERE username = 'admin' ORDER BY created_at DESC LIMIT 100;
