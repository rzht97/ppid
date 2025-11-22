<?php
/**
 * Audit Logs Table Installer
 *
 * Akses file ini via browser untuk membuat tabel audit_logs
 * URL: http://localhost/ppid/database/install_audit_logs.php
 *
 * PENTING: Hapus file ini setelah instalasi selesai!
 *
 * @created 2025-11-22
 */

// Define BASEPATH constant (required by CodeIgniter config files)
if (!defined('BASEPATH')) {
    define('BASEPATH', dirname(__DIR__) . '/system/');
}

// Load CodeIgniter database configuration
$config_file = dirname(__DIR__) . '/application/config/database.php';

if (!file_exists($config_file)) {
    die("
    <!DOCTYPE html>
    <html>
    <head>
        <title>Config File Not Found</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 50px; background: #f5f5f5; }
            .error { background: #fff; padding: 30px; border-radius: 10px; border-left: 5px solid #dc3545; }
            h1 { color: #dc3545; margin: 0 0 20px 0; }
            code { background: #f8f9fa; padding: 2px 6px; border-radius: 3px; }
        </style>
    </head>
    <body>
        <div class='error'>
            <h1>❌ Configuration File Not Found</h1>
            <p>File tidak ditemukan: <code>{$config_file}</code></p>
        </div>
    </body>
    </html>
    ");
}

require_once($config_file);

// Verify $db variable is loaded
if (!isset($db) || !isset($db['default'])) {
    die("
    <!DOCTYPE html>
    <html>
    <head>
        <title>Database Config Error</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 50px; background: #f5f5f5; }
            .error { background: #fff; padding: 30px; border-radius: 10px; border-left: 5px solid #dc3545; }
            h1 { color: #dc3545; margin: 0 0 20px 0; }
            code { background: #f8f9fa; padding: 2px 6px; border-radius: 3px; }
        </style>
    </head>
    <body>
        <div class='error'>
            <h1>❌ Database Configuration Error</h1>
            <p>Variable <code>\$db</code> not found in database config file.</p>
            <p>Pastikan file <code>application/config/database.php</code> sudah benar.</p>
        </div>
    </body>
    </html>
    ");
}

// Get database configuration
$db_config = $db['default'];

// Connect to database
$mysqli = new mysqli(
    $db_config['hostname'],
    $db_config['username'],
    $db_config['password'],
    $db_config['database']
);

// Check connection
if ($mysqli->connect_error) {
    die("
    <!DOCTYPE html>
    <html>
    <head>
        <title>Database Connection Error</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 50px; background: #f5f5f5; }
            .error { background: #fff; padding: 30px; border-radius: 10px; border-left: 5px solid #dc3545; }
            h1 { color: #dc3545; margin: 0 0 20px 0; }
            code { background: #f8f9fa; padding: 2px 6px; border-radius: 3px; }
        </style>
    </head>
    <body>
        <div class='error'>
            <h1>❌ Database Connection Failed</h1>
            <p><strong>Error:</strong> {$mysqli->connect_error}</p>
            <p>Pastikan konfigurasi database di <code>application/config/database.php</code> sudah benar.</p>
        </div>
    </body>
    </html>
    ");
}

// Check if table already exists
$result = $mysqli->query("SHOW TABLES LIKE 'audit_logs'");
if ($result->num_rows > 0) {
    echo "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Table Already Exists</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 50px; background: #f5f5f5; }
            .info { background: #fff; padding: 30px; border-radius: 10px; border-left: 5px solid #17a2b8; }
            h1 { color: #17a2b8; margin: 0 0 20px 0; }
            .btn { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; }
            .btn:hover { background: #0056b3; }
            code { background: #f8f9fa; padding: 2px 6px; border-radius: 3px; }
        </style>
    </head>
    <body>
        <div class='info'>
            <h1>ℹ️ Tabel Sudah Ada</h1>
            <p>Tabel <code>audit_logs</code> sudah ada di database.</p>
            <p>Audit logging sudah siap digunakan!</p>
            <a href='../admin/dip' class='btn'>← Kembali ke Admin</a>
        </div>
    </body>
    </html>
    ";
    $mysqli->close();
    exit;
}

// SQL to create audit_logs table
$sql = "
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
";

// Execute SQL
if ($mysqli->query($sql)) {
    echo "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Installation Success</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 50px; background: #f5f5f5; }
            .success { background: #fff; padding: 30px; border-radius: 10px; border-left: 5px solid #28a745; }
            h1 { color: #28a745; margin: 0 0 20px 0; }
            ul { margin: 20px 0; line-height: 2; }
            .btn { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; }
            .btn:hover { background: #0056b3; }
            .btn-danger { background: #dc3545; }
            .btn-danger:hover { background: #c82333; }
            code { background: #f8f9fa; padding: 2px 6px; border-radius: 3px; }
            .warning { background: #fff3cd; padding: 15px; border-radius: 5px; border-left: 5px solid #ffc107; margin-top: 20px; }
        </style>
    </head>
    <body>
        <div class='success'>
            <h1>✅ Instalasi Berhasil!</h1>
            <p>Tabel <code>audit_logs</code> berhasil dibuat di database <code>{$db_config['database']}</code>.</p>

            <h3>Fitur Audit Logging yang Aktif:</h3>
            <ul>
                <li>✅ Tracking penambahan data (CREATE)</li>
                <li>✅ Tracking perubahan data (UPDATE)</li>
                <li>✅ Tracking penghapusan data (DELETE)</li>
                <li>✅ Tracking verifikasi (VERIFY)</li>
                <li>✅ Tracking pemrosesan (PROCESS)</li>
            </ul>

            <h3>Lokasi Logging:</h3>
            <ul>
                <li>Admin Permohonan (create, update, delete, verify)</li>
                <li>Admin Keberatan (create, update, delete, process)</li>
                <li>Admin DIP (create, update, delete)</li>
            </ul>

            <div class='warning'>
                <strong>⚠️ PENTING - Security:</strong><br>
                Hapus file ini setelah instalasi untuk keamanan:<br>
                <code>database/install_audit_logs.php</code>
            </div>

            <a href='../admin/dip' class='btn'>← Kembali ke Admin</a>
        </div>
    </body>
    </html>
    ";
} else {
    echo "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Installation Failed</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 50px; background: #f5f5f5; }
            .error { background: #fff; padding: 30px; border-radius: 10px; border-left: 5px solid #dc3545; }
            h1 { color: #dc3545; margin: 0 0 20px 0; }
            code { background: #f8f9fa; padding: 2px 6px; border-radius: 3px; display: block; margin: 10px 0; padding: 10px; }
        </style>
    </head>
    <body>
        <div class='error'>
            <h1>❌ Instalasi Gagal</h1>
            <p><strong>Error:</strong> {$mysqli->error}</p>
            <p>Silakan coba lagi atau install manual via phpMyAdmin.</p>
            <p>File SQL: <code>database/migrations/001_create_audit_logs_table.sql</code></p>
        </div>
    </body>
    </html>
    ";
}

$mysqli->close();
?>
