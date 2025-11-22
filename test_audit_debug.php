<?php
/**
 * Audit Logs Debug & Test Script
 *
 * Script untuk test dan debug audit logging system
 * Akses: http://localhost/ppid/test_audit_debug.php
 *
 * PENTING: Hapus file ini setelah testing!
 */

// Define BASEPATH constant (required by CodeIgniter config)
if (!defined('BASEPATH')) {
    define('BASEPATH', dirname(__FILE__) . '/system/');
}

// Load database config
$config_file = dirname(__FILE__) . '/application/config/database.php';
if (!file_exists($config_file)) {
    die("<h1>❌ Database config file not found!</h1><p>File: {$config_file}</p>");
}
require_once($config_file);

if (!isset($db) || !isset($db['default'])) {
    die("<h1>❌ Database configuration error!</h1><p>Variable \$db not found in config file.</p>");
}

// Connect to database
$mysqli = new mysqli(
    $db['default']['hostname'],
    $db['default']['username'],
    $db['default']['password'],
    $db['default']['database']
);

if ($mysqli->connect_error) {
    die("❌ Database connection failed: " . $mysqli->connect_error);
}

echo "<h1>🔍 Audit Logs Debug Report</h1>";
echo "<style>
    body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
    .success { color: green; font-weight: bold; }
    .error { color: red; font-weight: bold; }
    .warning { color: orange; font-weight: bold; }
    pre { background: #fff; padding: 15px; border-radius: 5px; border: 1px solid #ddd; }
    table { border-collapse: collapse; width: 100%; background: #fff; margin: 20px 0; }
    th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
    th { background: #667eea; color: white; }
    .section { background: #fff; padding: 20px; margin: 20px 0; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
</style>";

// Test 1: Check if table exists
echo "<div class='section'>";
echo "<h2>Test 1: Cek Tabel audit_logs</h2>";
$result = $mysqli->query("SHOW TABLES LIKE 'audit_logs'");
if ($result->num_rows > 0) {
    echo "<p class='success'>✅ Tabel 'audit_logs' DITEMUKAN</p>";

    // Get table structure
    echo "<h3>Struktur Tabel:</h3>";
    $structure = $mysqli->query("DESCRIBE audit_logs");
    echo "<table><tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th></tr>";
    while ($row = $structure->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['Field']}</td>";
        echo "<td>{$row['Type']}</td>";
        echo "<td>{$row['Null']}</td>";
        echo "<td>{$row['Key']}</td>";
        echo "<td>{$row['Default']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p class='error'>❌ Tabel 'audit_logs' TIDAK DITEMUKAN!</p>";
    echo "<p class='warning'>⚠️ Anda perlu menjalankan migration terlebih dahulu:</p>";
    echo "<pre>Akses: http://localhost:8080/ppid/database/install_audit_logs.php</pre>";
    echo "<p>Atau manual via phpMyAdmin dengan file:<br><code>database/migrations/001_create_audit_logs_table.sql</code></p>";
    echo "</div>";
    exit;
}
echo "</div>";

// Test 2: Check if table is empty
echo "<div class='section'>";
echo "<h2>Test 2: Cek Data di Tabel</h2>";
$count_result = $mysqli->query("SELECT COUNT(*) as total FROM audit_logs");
$count = $count_result->fetch_assoc()['total'];
echo "<p>Total records: <strong>{$count}</strong></p>";

if ($count == 0) {
    echo "<p class='warning'>⚠️ Tabel masih KOSONG - belum ada audit log tercatat</p>";
} else {
    echo "<p class='success'>✅ Ada {$count} audit logs tercatat</p>";

    // Show recent logs
    echo "<h3>10 Log Terbaru:</h3>";
    $logs = $mysqli->query("SELECT * FROM audit_logs ORDER BY created_at DESC LIMIT 10");
    echo "<table>";
    echo "<tr><th>ID</th><th>User</th><th>Action</th><th>Table</th><th>Record ID</th><th>IP</th><th>Created</th></tr>";
    while ($log = $logs->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$log['id']}</td>";
        echo "<td>{$log['username']}</td>";
        echo "<td>{$log['action']}</td>";
        echo "<td>{$log['table_name']}</td>";
        echo "<td>{$log['record_id']}</td>";
        echo "<td>{$log['ip_address']}</td>";
        echo "<td>{$log['created_at']}</td>";
        echo "</tr>";
    }
    echo "</table>";
}
echo "</div>";

// Test 3: Manual insert test
echo "<div class='section'>";
echo "<h2>Test 3: Manual Insert ke audit_logs</h2>";
$test_data = array(
    'user_id' => 999,
    'username' => 'test_user',
    'action' => 'test',
    'table_name' => 'test_table',
    'record_id' => 'TEST001',
    'old_values' => null,
    'new_values' => json_encode(['test' => 'data']),
    'description' => 'Test manual insert from debug script',
    'ip_address' => $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1',
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'Debug Script',
    'created_at' => date('Y-m-d H:i:s')
);

$fields = implode(', ', array_keys($test_data));
$placeholders = implode(', ', array_fill(0, count($test_data), '?'));
$stmt = $mysqli->prepare("INSERT INTO audit_logs ($fields) VALUES ($placeholders)");

if (!$stmt) {
    echo "<p class='error'>❌ Prepare failed: " . $mysqli->error . "</p>";
} else {
    $types = str_repeat('s', count($test_data)); // all strings
    $values = array_values($test_data);
    $stmt->bind_param($types, ...$values);

    if ($stmt->execute()) {
        echo "<p class='success'>✅ Manual insert BERHASIL!</p>";
        echo "<p>Insert ID: {$stmt->insert_id}</p>";
        echo "<p>Ini berarti tabel berfungsi dengan baik.</p>";

        // Delete test record
        $mysqli->query("DELETE FROM audit_logs WHERE username = 'test_user' AND action = 'test'");
        echo "<p class='warning'>ℹ️ Test record sudah dihapus</p>";
    } else {
        echo "<p class='error'>❌ Execute failed: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
echo "</div>";

// Test 4: Check if Audit_model file exists
echo "<div class='section'>";
echo "<h2>Test 4: Cek Audit_model</h2>";
$model_path = dirname(__FILE__) . '/application/models/Audit_model.php';
if (file_exists($model_path)) {
    echo "<p class='success'>✅ File Audit_model.php DITEMUKAN</p>";
    echo "<p>Path: <code>{$model_path}</code></p>";

    // Check if model has table_exists check
    $model_content = file_get_contents($model_path);
    if (strpos($model_content, 'table_exists') !== false) {
        echo "<p class='success'>✅ Model memiliki table_exists() check</p>";
    } else {
        echo "<p class='warning'>⚠️ Model tidak memiliki table_exists() check</p>";
    }
} else {
    echo "<p class='error'>❌ File Audit_model.php TIDAK DITEMUKAN!</p>";
}
echo "</div>";

// Test 5: Check which controllers load audit_model
echo "<div class='section'>";
echo "<h2>Test 5: Cek Controllers yang Load audit_model</h2>";
$controllers = [
    'admin/Permohonan.php',
    'admin/Keberatan.php',
    'admin/Dip.php'
];

echo "<table><tr><th>Controller</th><th>Status</th><th>Load Model?</th></tr>";
foreach ($controllers as $controller) {
    $path = dirname(__FILE__) . '/application/controllers/' . $controller;
    $exists = file_exists($path);
    $loads_model = false;

    if ($exists) {
        $content = file_get_contents($path);
        $loads_model = (strpos($content, 'audit_model') !== false);
    }

    echo "<tr>";
    echo "<td>{$controller}</td>";
    echo "<td>" . ($exists ? "✅ Exists" : "❌ Not found") . "</td>";
    echo "<td>" . ($loads_model ? "✅ Yes" : "❌ No") . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";

// Test 6: Check session data
echo "<div class='section'>";
echo "<h2>Test 6: Cek Session Data (untuk Admin Login)</h2>";
session_start();
echo "<p>Session ID: <code>" . session_id() . "</code></p>";

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    echo "<p class='success'>✅ User LOGIN sebagai: <strong>{$_SESSION['username']}</strong> (ID: {$_SESSION['id']})</p>";
    echo "<p>Audit logging akan menggunakan username ini.</p>";
} else {
    echo "<p class='error'>❌ User TIDAK LOGIN!</p>";
    echo "<p class='warning'>⚠️ Audit logging memerlukan user login di session.</p>";
    echo "<p>Silakan login sebagai admin di: <a href='login'>http://localhost:8080/ppid/login</a></p>";
}

echo "<h3>All Session Data:</h3>";
echo "<pre>" . print_r($_SESSION, true) . "</pre>";
echo "</div>";

// Test 7: Check logs directory
echo "<div class='section'>";
echo "<h2>Test 7: Cek Application Logs</h2>";
$log_path = dirname(__FILE__) . '/application/logs/';
if (is_dir($log_path)) {
    echo "<p class='success'>✅ Logs directory exists</p>";

    // Find latest log file
    $log_files = glob($log_path . 'log-*.php');
    if (!empty($log_files)) {
        rsort($log_files);
        $latest_log = $log_files[0];
        echo "<p>Latest log file: <code>" . basename($latest_log) . "</code></p>";

        // Check for audit-related errors
        $log_content = file_get_contents($latest_log);
        if (strpos($log_content, 'audit') !== false || strpos($log_content, 'Audit') !== false) {
            echo "<p class='warning'>⚠️ Ada log entries terkait audit:</p>";
            // Show last 20 lines
            $lines = explode("\n", $log_content);
            $audit_lines = array_filter($lines, function($line) {
                return stripos($line, 'audit') !== false;
            });
            if (!empty($audit_lines)) {
                echo "<pre>" . implode("\n", array_slice($audit_lines, -10)) . "</pre>";
            }
        } else {
            echo "<p>ℹ️ Tidak ada error terkait audit di log file</p>";
        }
    } else {
        echo "<p>ℹ️ Tidak ada log files</p>";
    }
} else {
    echo "<p class='warning'>⚠️ Logs directory tidak ditemukan</p>";
}
echo "</div>";

// Recommendations
echo "<div class='section'>";
echo "<h2>📝 Diagnosis & Rekomendasi</h2>";

$issues = [];

if ($result->num_rows == 0) {
    $issues[] = "Tabel audit_logs belum dibuat - install via http://localhost:8080/ppid/database/install_audit_logs.php";
}

if ($count == 0 && $result->num_rows > 0) {
    $issues[] = "Tabel ada tapi kosong - kemungkinan audit_model tidak dipanggil atau session tidak ada";
}

if (!isset($_SESSION['id'])) {
    $issues[] = "User belum login - audit logging memerlukan session user admin";
}

if (empty($issues)) {
    echo "<p class='success'>✅ Tidak ada masalah yang terdeteksi!</p>";
    echo "<p>Jika masih belum ada log:</p>";
    echo "<ol>";
    echo "<li>Login sebagai admin</li>";
    echo "<li>Lakukan aksi (tambah/edit/hapus) di admin panel</li>";
    echo "<li>Refresh halaman ini untuk cek apakah log tercatat</li>";
    echo "</ol>";
} else {
    echo "<p class='error'>Masalah yang ditemukan:</p>";
    echo "<ol>";
    foreach ($issues as $issue) {
        echo "<li>{$issue}</li>";
    }
    echo "</ol>";
}

echo "<h3>Langkah Selanjutnya:</h3>";
echo "<ol>";
echo "<li>Pastikan tabel audit_logs sudah dibuat</li>";
echo "<li>Login sebagai admin di <a href='login'>http://localhost:8080/ppid/login</a></li>";
echo "<li>Lakukan aksi di admin panel (contoh: hapus dokumen DIP)</li>";
echo "<li>Refresh halaman debug ini untuk cek log</li>";
echo "<li>Jika masih tidak ada log, cek application/logs/ untuk error</li>";
echo "</ol>";
echo "</div>";

echo "<div class='section'>";
echo "<p style='color: #dc3545; font-weight: bold;'>⚠️ PENTING: Hapus file ini setelah selesai testing!</p>";
echo "<p>File: <code>test_audit_debug.php</code></p>";
echo "</div>";

$mysqli->close();
?>
