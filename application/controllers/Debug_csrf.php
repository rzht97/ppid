<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debug_csrf extends CI_Controller {

    public function index() {
        echo "<h2>CSRF & Session Debug Info</h2>";
        echo "<pre>";

        // 1. Cek CSRF config
        echo "=== CSRF CONFIGURATION ===\n";
        echo "CSRF Protection: " . ($this->config->item('csrf_protection') ? 'ENABLED' : 'DISABLED') . "\n";
        echo "CSRF Token Name: " . $this->config->item('csrf_token_name') . "\n";
        echo "CSRF Cookie Name: " . $this->config->item('csrf_cookie_name') . "\n";
        echo "CSRF Expire: " . $this->config->item('csrf_expire') . " seconds\n\n";

        // 2. Cek session config
        echo "=== SESSION CONFIGURATION ===\n";
        echo "Session Driver: " . $this->config->item('sess_driver') . "\n";
        echo "Session Save Path: " . $this->config->item('sess_save_path') . "\n";
        echo "Session Cookie Name: " . $this->config->item('sess_cookie_name') . "\n\n";

        // 3. Cek apakah /tmp writable
        echo "=== SESSION DIRECTORY CHECK ===\n";
        $sess_path = $this->config->item('sess_save_path');
        echo "Path: $sess_path\n";
        echo "Exists: " . (is_dir($sess_path) ? 'YES' : 'NO') . "\n";
        echo "Writable: " . (is_writable($sess_path) ? 'YES' : 'NO') . "\n";
        echo "Readable: " . (is_readable($sess_path) ? 'YES' : 'NO') . "\n\n";

        // 4. Cek current CSRF token
        echo "=== CURRENT CSRF TOKEN ===\n";
        try {
            echo "Token Name: " . $this->security->get_csrf_token_name() . "\n";
            echo "Token Hash: " . $this->security->get_csrf_hash() . "\n\n";
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage() . "\n\n";
        }

        // 5. Cek session data
        echo "=== SESSION DATA ===\n";
        echo "Session ID: " . session_id() . "\n";
        echo "All Session Data:\n";
        print_r($this->session->userdata());
        echo "\n";

        // 6. Cek cookies
        echo "=== COOKIES ===\n";
        print_r($_COOKIE);
        echo "\n";

        // 7. Test form dengan CSRF
        echo "</pre>";
        echo "<h3>Test Form (dengan CSRF Token)</h3>";
        echo "<form method='post' action='" . base_url('index.php/debug_csrf/test_post') . "'>";
        echo "<input type='hidden' name='" . $this->security->get_csrf_token_name() . "' value='" . $this->security->get_csrf_hash() . "'>";
        echo "Test Input: <input type='text' name='test_field' value='test123'><br><br>";
        echo "<button type='submit'>Submit Test</button>";
        echo "</form>";

        echo "<hr>";
        echo "<h3>Lihat Source Code Form Login</h3>";
        echo "<a href='" . base_url('index.php/debug_csrf/view_login_source') . "'>View Login Form Source</a>";
    }

    public function test_post() {
        echo "<h2>Test POST Result</h2>";
        echo "<pre>";

        echo "=== POST DATA ===\n";
        print_r($_POST);
        echo "\n";

        echo "=== CI INPUT ===\n";
        echo "test_field: " . $this->input->post('test_field') . "\n";
        echo "CSRF token received: " . $this->input->post($this->security->get_csrf_token_name()) . "\n";

        echo "\n<a href='" . base_url('index.php/debug_csrf') . "'>Back</a>";
        echo "</pre>";
    }

    public function view_login_source() {
        // Load login view dan tampilkan source code
        $this->load->view('dev/login');
    }
}
