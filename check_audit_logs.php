<?php
/**
 * Quick Audit Logs Checker
 *
 * Simple script to check audit_logs table contents
 * URL: http://localhost:8080/ppid/check_audit_logs.php
 */

// Define constants
if (!defined('BASEPATH')) {
    define('BASEPATH', dirname(__FILE__) . '/system/');
}

if (!defined('ENVIRONMENT')) {
    define('ENVIRONMENT', 'development');
}

// Load database config
$config_file = dirname(__FILE__) . '/application/config/database.php';
$db = null;
require_once($config_file);

// Connect to database
$mysqli = new mysqli(
    $db['default']['hostname'],
    $db['default']['username'],
    $db['default']['password'],
    $db['default']['database']
);

if ($mysqli->connect_error) {
    die("Database connection failed: " . $mysqli->connect_error);
}

// Check total logs
$count_result = $mysqli->query("SELECT COUNT(*) as total FROM audit_logs");
$count = $count_result->fetch_assoc()['total'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Audit Logs Quick Check</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            max-width: 1000px;
            margin: 0 auto;
        }
        h1 { color: #667eea; margin: 0 0 20px 0; }
        .count {
            font-size: 48px;
            font-weight: bold;
            color: #667eea;
            margin: 20px 0;
        }
        .success { color: #28a745; }
        .warning { color: #ffc107; }
        .error { color: #dc3545; }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #667eea;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) { background: #f8f9fa; }
        tr:hover { background: #e9ecef; }
        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: bold;
        }
        .badge-create { background: #28a745; color: white; }
        .badge-update { background: #007bff; color: white; }
        .badge-delete { background: #dc3545; color: white; }
        .badge-verify { background: #17a2b8; color: white; }
        .badge-process { background: #ffc107; color: #333; }
        .refresh-btn {
            display: inline-block;
            padding: 10px 20px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
        }
        .refresh-btn:hover {
            background: #5568d3;
        }
        pre {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
            font-size: 12px;
        }
    </style>
    <meta http-equiv="refresh" content="5">
</head>
<body>
    <div class="container">
        <h1>📊 Audit Logs Quick Check</h1>
        <p>Auto-refresh setiap 5 detik | Database: <strong><?= htmlspecialchars($db['default']['database']) ?></strong></p>

        <hr>

        <h2>Total Audit Logs:</h2>
        <div class="count <?= $count > 0 ? 'success' : 'warning' ?>">
            <?= $count ?>
        </div>

        <?php if ($count == 0): ?>
            <p class="warning">⚠️ <strong>Tidak ada audit logs tercatat!</strong></p>
            <p>Kemungkinan penyebab:</p>
            <ul>
                <li>User belum login sebagai admin</li>
                <li>Belum ada aksi yang dilakukan (create/update/delete)</li>
                <li>Audit logging tidak dipanggil di controller</li>
            </ul>
            <p><strong>Langkah test:</strong></p>
            <ol>
                <li>Login ke admin: <a href="login" target="_blank">http://localhost:8080/ppid/login</a></li>
                <li>Buka halaman DIP: <a href="admin/dip" target="_blank">http://localhost:8080/ppid/admin/dip</a></li>
                <li>Hapus atau tambah satu dokumen DIP</li>
                <li>Refresh halaman ini (auto-refresh setiap 5 detik)</li>
            </ol>
        <?php else: ?>
            <p class="success">✅ <strong>Audit logging berfungsi dengan baik!</strong></p>

            <h3>10 Log Terbaru:</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Waktu</th>
                    <th>User</th>
                    <th>Action</th>
                    <th>Table</th>
                    <th>Record ID</th>
                    <th>Description</th>
                    <th>IP</th>
                </tr>
                <?php
                $logs = $mysqli->query("SELECT * FROM audit_logs ORDER BY created_at DESC LIMIT 10");
                while ($log = $logs->fetch_assoc()):
                    $action_class = 'badge-' . $log['action'];
                ?>
                <tr>
                    <td><?= htmlspecialchars($log['id']) ?></td>
                    <td><?= htmlspecialchars($log['created_at']) ?></td>
                    <td><strong><?= htmlspecialchars($log['username']) ?></strong></td>
                    <td><span class="badge <?= $action_class ?>"><?= strtoupper(htmlspecialchars($log['action'])) ?></span></td>
                    <td><?= htmlspecialchars($log['table_name']) ?></td>
                    <td><?= htmlspecialchars($log['record_id']) ?></td>
                    <td><?= htmlspecialchars($log['description']) ?></td>
                    <td><?= htmlspecialchars($log['ip_address']) ?></td>
                </tr>
                <?php endwhile; ?>
            </table>

            <h3>Breakdown by Action:</h3>
            <?php
            $stats = $mysqli->query("SELECT action, COUNT(*) as count FROM audit_logs GROUP BY action ORDER BY count DESC");
            ?>
            <table style="width: auto;">
                <tr>
                    <th>Action</th>
                    <th>Count</th>
                </tr>
                <?php while ($stat = $stats->fetch_assoc()): ?>
                <tr>
                    <td><span class="badge badge-<?= $stat['action'] ?>"><?= strtoupper($stat['action']) ?></span></td>
                    <td><strong><?= $stat['count'] ?></strong></td>
                </tr>
                <?php endwhile; ?>
            </table>
        <?php endif; ?>

        <hr>
        <a href="<?= $_SERVER['PHP_SELF'] ?>" class="refresh-btn">🔄 Manual Refresh</a>
        <p style="color: #666; font-size: 12px; margin-top: 20px;">
            ⚠️ <strong>PENTING:</strong> Hapus file ini setelah testing selesai untuk keamanan!<br>
            File: <code>check_audit_logs.php</code>
        </p>
    </div>
</body>
</html>
<?php
$mysqli->close();
?>
