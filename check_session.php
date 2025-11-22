<?php
/**
 * CodeIgniter Session Checker
 *
 * Script untuk cek session CodeIgniter yang sebenarnya
 * URL: http://localhost:8080/ppid/check_session.php
 */

// Bootstrap CodeIgniter (minimal)
define('BASEPATH', dirname(__FILE__) . '/system/');
define('APPPATH', dirname(__FILE__) . '/application/');
define('ENVIRONMENT', 'development');

// Load database config
require_once(APPPATH . 'config/database.php');

// Load session config
require_once(APPPATH . 'config/config.php');

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

// Get session driver type
$sess_driver = isset($config['sess_driver']) ? $config['sess_driver'] : 'files';
$sess_cookie_name = isset($config['sess_cookie_name']) ? $config['sess_cookie_name'] : 'ci_session';
$sess_save_path = isset($config['sess_save_path']) ? $config['sess_save_path'] : APPPATH . 'cache';

?>
<!DOCTYPE html>
<html>
<head>
    <title>CodeIgniter Session Check</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            max-width: 900px;
            margin: 0 auto;
        }
        h1 { color: #667eea; margin: 0 0 20px 0; }
        h2 { color: #764ba2; margin: 30px 0 15px 0; border-bottom: 2px solid #667eea; padding-bottom: 5px; }
        .info-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            border-left: 4px solid #667eea;
        }
        .success { background: #d4edda; border-left-color: #28a745; }
        .warning { background: #fff3cd; border-left-color: #ffc107; }
        .error { background: #f8d7da; border-left-color: #dc3545; }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 15px 0;
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
        }
        tr:nth-child(even) { background: #f8f9fa; }
        pre {
            background: #2d3748;
            color: #f7fafc;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-size: 12px;
        }
        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: bold;
            margin: 0 5px;
        }
        .badge-success { background: #28a745; color: white; }
        .badge-danger { background: #dc3545; color: white; }
        .badge-warning { background: #ffc107; color: #333; }
        code {
            background: #e9ecef;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: monospace;
        }
    </style>
    <meta http-equiv="refresh" content="3">
</head>
<body>
    <div class="container">
        <h1>🔍 CodeIgniter Session Checker</h1>
        <p>Auto-refresh setiap 3 detik</p>

        <h2>1. Session Configuration</h2>
        <table>
            <tr>
                <th>Config Key</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Session Driver</td>
                <td><code><?= htmlspecialchars($sess_driver) ?></code></td>
            </tr>
            <tr>
                <td>Session Cookie Name</td>
                <td><code><?= htmlspecialchars($sess_cookie_name) ?></code></td>
            </tr>
            <tr>
                <td>Session Save Path</td>
                <td><code><?= htmlspecialchars($sess_save_path) ?></code></td>
            </tr>
        </table>

        <h2>2. Browser Cookies</h2>
        <?php if (isset($_COOKIE[$sess_cookie_name])): ?>
            <div class="info-box success">
                ✅ <strong>Cookie ditemukan!</strong><br>
                Cookie <code><?= htmlspecialchars($sess_cookie_name) ?></code> ada di browser.
            </div>
            <p><strong>Cookie Value (encrypted):</strong></p>
            <pre><?= htmlspecialchars(substr($_COOKIE[$sess_cookie_name], 0, 200)) ?>...</pre>
        <?php else: ?>
            <div class="info-box error">
                ❌ <strong>Cookie TIDAK ditemukan!</strong><br>
                Cookie <code><?= htmlspecialchars($sess_cookie_name) ?></code> tidak ada di browser.<br>
                <strong>Kemungkinan penyebab:</strong>
                <ul>
                    <li>User belum login</li>
                    <li>Session expired</li>
                    <li>Cookie di-block oleh browser</li>
                </ul>
            </div>
        <?php endif; ?>

        <h2>3. Session Files (if using files driver)</h2>
        <?php if ($sess_driver === 'files'): ?>
            <?php
            $session_path = rtrim($sess_save_path, '/');
            if (is_dir($session_path)) {
                $files = glob($session_path . '/' . $sess_cookie_name . '_*');
                ?>
                <div class="info-box <?= count($files) > 0 ? 'success' : 'warning' ?>">
                    <?= count($files) > 0 ? '✅' : '⚠️' ?>
                    Ditemukan <strong><?= count($files) ?></strong> session file(s) di:<br>
                    <code><?= htmlspecialchars($session_path) ?></code>
                </div>

                <?php if (count($files) > 0): ?>
                    <table>
                        <tr>
                            <th>Session File</th>
                            <th>Modified</th>
                            <th>Size</th>
                        </tr>
                        <?php foreach (array_slice($files, 0, 5) as $file): ?>
                        <tr>
                            <td><code><?= htmlspecialchars(basename($file)) ?></code></td>
                            <td><?= date('Y-m-d H:i:s', filemtime($file)) ?></td>
                            <td><?= filesize($file) ?> bytes</td>
                        </tr>
                        <?php endforeach; ?>
                    </table>

                    <?php if (count($files) > 0): ?>
                    <p><strong>Isi session file terbaru:</strong></p>
                    <?php
                    $latest_file = $files[0];
                    $session_data = file_get_contents($latest_file);
                    ?>
                    <pre><?= htmlspecialchars(substr($session_data, 0, 500)) ?><?= strlen($session_data) > 500 ? '...' : '' ?></pre>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <div class="info-box error">
                    ❌ Session path tidak ditemukan: <code><?= htmlspecialchars($session_path) ?></code>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <h2>4. Database Sessions (if using database driver)</h2>
        <?php if ($sess_driver === 'database'): ?>
            <?php
            $sess_table = isset($config['sess_save_path']) ? $config['sess_save_path'] : 'ci_sessions';
            $result = $mysqli->query("SELECT COUNT(*) as count FROM `{$sess_table}`");
            if ($result) {
                $count = $result->fetch_assoc()['count'];
                ?>
                <div class="info-box <?= $count > 0 ? 'success' : 'warning' ?>">
                    <?= $count > 0 ? '✅' : '⚠️' ?>
                    Ditemukan <strong><?= $count ?></strong> session(s) di database table <code><?= htmlspecialchars($sess_table) ?></code>
                </div>

                <?php if ($count > 0): ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>IP Address</th>
                        <th>Timestamp</th>
                        <th>Data Preview</th>
                    </tr>
                    <?php
                    $sessions = $mysqli->query("SELECT * FROM `{$sess_table}` ORDER BY timestamp DESC LIMIT 5");
                    while ($sess = $sessions->fetch_assoc()):
                    ?>
                    <tr>
                        <td><code><?= htmlspecialchars(substr($sess['id'], 0, 20)) ?>...</code></td>
                        <td><?= htmlspecialchars($sess['ip_address']) ?></td>
                        <td><?= date('Y-m-d H:i:s', $sess['timestamp']) ?></td>
                        <td><code><?= htmlspecialchars(substr($sess['data'], 0, 50)) ?>...</code></td>
                    </tr>
                    <?php endwhile; ?>
                </table>
                <?php endif; ?>
            <?php else: ?>
                <div class="info-box error">
                    ❌ Tabel session tidak ditemukan: <code><?= htmlspecialchars($sess_table) ?></code>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <h2>5. Diagnosis</h2>
        <?php
        $has_cookie = isset($_COOKIE[$sess_cookie_name]);
        $has_session_file = false;

        if ($sess_driver === 'files' && is_dir($sess_save_path)) {
            $files = glob(rtrim($sess_save_path, '/') . '/' . $sess_cookie_name . '_*');
            $has_session_file = count($files) > 0;
        }
        ?>

        <?php if ($has_cookie && $has_session_file): ?>
            <div class="info-box success">
                <h3>✅ Session Berfungsi Normal</h3>
                <p>Cookie ada di browser DAN session file ada di server.</p>
                <p><strong>Jika audit log masih tidak tercatat, masalahnya bukan di session.</strong></p>
            </div>
        <?php elseif (!$has_cookie): ?>
            <div class="info-box error">
                <h3>❌ User Belum Login</h3>
                <p>Cookie session tidak ditemukan di browser.</p>
                <p><strong>Action:</strong> Login ke admin panel terlebih dahulu:</p>
                <p><a href="login" target="_blank" style="color: #007bff;">http://localhost:8080/ppid/login</a></p>
            </div>
        <?php elseif ($has_cookie && !$has_session_file): ?>
            <div class="info-box warning">
                <h3>⚠️ Cookie Ada, Tapi Session File Tidak Ada</h3>
                <p>Kemungkinan session expired atau file terhapus.</p>
                <p><strong>Action:</strong> Logout dan login kembali.</p>
            </div>
        <?php endif; ?>

        <h2>6. Next Steps</h2>
        <div class="info-box">
            <p><strong>Jika session sudah OK tapi audit log masih 0:</strong></p>
            <ol>
                <li>Pastikan Anda sudah login ke admin panel</li>
                <li>Lakukan aksi (hapus/tambah dokumen di admin/dip)</li>
                <li>Cek application/logs/ untuk error messages</li>
                <li>Cek apakah controller benar-benar memanggil audit_model</li>
            </ol>
        </div>

        <hr>
        <p style="color: #666; font-size: 12px;">
            ⚠️ <strong>PENTING:</strong> Hapus file ini setelah testing!<br>
            File: <code>check_session.php</code>
        </p>
    </div>
</body>
</html>
<?php
$mysqli->close();
?>
