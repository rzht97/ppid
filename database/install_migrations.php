<?php
/**
 * Auto Installer for Database Migrations
 *
 * Akses file ini via browser untuk install migrations otomatis:
 * http://localhost:8080/ppid/database/install_migrations.php
 *
 * SECURITY: Hapus file ini setelah migration berhasil!
 */

// Load CodeIgniter bootstrap untuk akses database
require_once __DIR__ . '/../index.php';

// Get database connection dari CodeIgniter
$CI =& get_instance();
$db = $CI->db;

// Check if already installed
$query = $db->query("SHOW TABLES LIKE 'audit_logs'");
if ($query->num_rows() > 0) {
    die('<h2 style="color:green">✅ Table audit_logs sudah ada! Migration tidak perlu dijalankan.</h2>
         <p>Jika ingin reinstall, hapus table dulu dengan query:</p>
         <pre>DROP TABLE audit_logs;</pre>');
}

// Read SQL migration file
$sql_file = __DIR__ . '/migrations/001_create_audit_logs_table.sql';

if (!file_exists($sql_file)) {
    die('<h2 style="color:red">❌ File migration tidak ditemukan!</h2>
         <p>Expected: ' . $sql_file . '</p>');
}

$sql = file_get_contents($sql_file);

// Remove comments and split by semicolon
$sql = preg_replace('/--.*$/m', '', $sql);  // Remove single-line comments
$sql = preg_replace('/\/\*.*?\*\//s', '', $sql);  // Remove multi-line comments
$statements = array_filter(array_map('trim', explode(';', $sql)));

// Execute each statement
$success = true;
$errors = array();

foreach ($statements as $statement) {
    if (empty($statement)) continue;

    if (!$db->query($statement)) {
        $success = false;
        $errors[] = $db->error();
    }
}

// Show result
if ($success) {
    echo '<h2 style="color:green">✅ Migration Berhasil!</h2>';
    echo '<p>Table <strong>audit_logs</strong> berhasil dibuat.</p>';
    echo '<h3>Verifikasi:</h3>';

    // Show table structure
    $result = $db->query("DESCRIBE audit_logs");
    echo '<table border="1" cellpadding="5" style="border-collapse:collapse">';
    echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>';
    foreach ($result->result_array() as $row) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['Field']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Type']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Null']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Key']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Default']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Extra']) . '</td>';
        echo '</tr>';
    }
    echo '</table>';

    echo '<hr>';
    echo '<p style="color:orange"><strong>⚠️ SECURITY WARNING:</strong> Hapus file install_migrations.php setelah selesai!</p>';
    echo '<pre>rm database/install_migrations.php</pre>';

} else {
    echo '<h2 style="color:red">❌ Migration Gagal!</h2>';
    echo '<h3>Errors:</h3>';
    echo '<pre>';
    print_r($errors);
    echo '</pre>';
}
