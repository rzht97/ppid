<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_session extends CI_Controller {

    public function index() {
        echo "<h2>Test Session Functionality</h2>";
        echo "<pre>";

        // 1. Cek PHP session
        echo "=== PHP SESSION INFO ===\n";
        echo "Session started: " . (session_status() == PHP_SESSION_ACTIVE ? 'YES' : 'NO') . "\n";
        echo "Session ID: " . session_id() . "\n";
        echo "Session save path: " . session_save_path() . "\n";
        echo "Session name: " . session_name() . "\n\n";

        // 2. Test write session
        echo "=== TEST WRITE SESSION ===\n";
        $_SESSION['test_key'] = 'test_value_' . time();
        echo "Written to \$_SESSION['test_key']: " . $_SESSION['test_key'] . "\n";

        // 3. Test CI session
        echo "\n=== CI SESSION TEST ===\n";
        $this->session->set_userdata('ci_test_key', 'ci_test_value_' . time());
        echo "Written via CI session: " . $this->session->userdata('ci_test_key') . "\n";

        // 4. Cek semua session data
        echo "\n=== ALL SESSION DATA ===\n";
        print_r($_SESSION);

        // 5. Cek file session
        echo "\n=== SESSION FILES ===\n";
        $sess_path = $this->config->item('sess_save_path');
        if (is_dir($sess_path)) {
            $files = scandir($sess_path);
            $session_files = array_filter($files, function($file) {
                return strpos($file, 'ppid_session') !== false || strpos($file, 'ci_session') !== false;
            });

            if (empty($session_files)) {
                echo "❌ NO SESSION FILES FOUND in $sess_path\n";
                echo "This means sessions are not being saved to disk!\n\n";

                // Cek permission
                echo "Directory permissions:\n";
                $perms = fileperms($sess_path);
                echo "  Readable: " . (is_readable($sess_path) ? 'YES' : 'NO') . "\n";
                echo "  Writable: " . (is_writable($sess_path) ? 'YES' : 'NO') . "\n";
                echo "  Owner: " . posix_getpwuid(fileowner($sess_path))['name'] . "\n";
                echo "  Group: " . posix_getgrgid(filegroup($sess_path))['name'] . "\n";

                // Cek current user
                echo "\nCurrent process:\n";
                echo "  User: " . posix_getpwuid(posix_geteuid())['name'] . "\n";
                echo "  UID: " . posix_geteuid() . "\n";

            } else {
                echo "✅ Found " . count($session_files) . " session files:\n";
                foreach ($session_files as $file) {
                    echo "  - $file\n";
                }
            }
        }

        echo "</pre>";

        echo "<p><a href='" . base_url('index.php/test_session') . "'>Refresh Page</a></p>";
    }
}
