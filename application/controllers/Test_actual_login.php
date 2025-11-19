<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_actual_login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_login');
    }

    public function index() {
        echo "<h2>Test Actual Login Process</h2>";
        echo "<form method='post' action='" . base_url('index.php/test_actual_login/do_login') . "'>";

        // IMPORTANT: Add CSRF token field (required when csrf_protection is enabled)
        echo "<input type='hidden' name='" . $this->security->get_csrf_token_name() . "' value='" . $this->security->get_csrf_hash() . "'>";

        echo "Username: <input type='text' name='username' value='PPIDUtama'><br><br>";
        echo "Password: <input type='password' name='password' value='@Sumedang123#'><br><br>";
        echo "<button type='submit'>Test Login</button>";
        echo "</form>";
    }

    public function do_login() {
        echo "<pre>";
        echo "=== TESTING ACTUAL LOGIN FLOW ===\n\n";

        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password');

        echo "Step 1: Input received\n";
        echo "  Username: {$username}\n";
        echo "  Password: " . str_repeat('*', strlen($password)) . "\n\n";

        // Get user
        echo "Step 2: Fetching user from database\n";
        $user = $this->m_login->get_by_username($username);

        if (!$user) {
            echo "  ❌ User NOT FOUND!\n";
            echo "  Check if username exists in admin table\n";
            return;
        }

        echo "  ✅ User found\n";
        echo "  User object:\n";
        foreach ($user as $key => $value) {
            if ($key === 'password') {
                echo "    {$key}: " . substr($value, 0, 20) . "...\n";
            } else {
                echo "    {$key}: {$value}\n";
            }
        }
        echo "\n";

        // Test password
        echo "Step 3: Password verification\n";
        $password_valid = false;

        if (password_verify($password, $user->password)) {
            echo "  ✅ BCRYPT verification: SUCCESS\n";
            $password_valid = true;
        } else {
            echo "  ❌ BCRYPT verification: FAILED\n";
        }

        if ($user->password === md5($password)) {
            echo "  ✅ MD5 verification: SUCCESS\n";
            $password_valid = true;
        } else {
            echo "  ❌ MD5 verification: FAILED\n";
        }
        echo "\n";

        if (!$password_valid) {
            echo "  ❌ PASSWORD INVALID!\n";
            return;
        }

        // Session regeneration
        echo "Step 4: Session regeneration\n";
        try {
            $this->session->sess_regenerate(TRUE);
            echo "  ✅ Session regenerated\n\n";
        } catch (Exception $e) {
            echo "  ❌ Session regeneration failed: {$e->getMessage()}\n\n";
        }

        // Set session data
        echo "Step 5: Setting session data\n";
        $data_session = array(
            'id' => isset($user->id) ? $user->id : null,
            'nama' => isset($user->username) ? $user->username : null,
            'status' => "login",
            'login_time' => time()
        );

        echo "  Session data to set:\n";
        foreach ($data_session as $key => $value) {
            echo "    {$key}: {$value}\n";
        }
        echo "\n";

        try {
            $this->session->set_userdata($data_session);
            echo "  ✅ Session data set\n\n";
        } catch (Exception $e) {
            echo "  ❌ Session set failed: {$e->getMessage()}\n\n";
        }

        // Verify session was saved
        echo "Step 6: Verify session was saved\n";
        $saved_status = $this->session->userdata('status');
        $saved_nama = $this->session->userdata('nama');
        $saved_id = $this->session->userdata('id');

        if ($saved_status === 'login') {
            echo "  ✅ Session verified - status: {$saved_status}\n";
            echo "  ✅ Session verified - nama: {$saved_nama}\n";
            echo "  ✅ Session verified - id: {$saved_id}\n\n";

            echo "=== LOGIN SUCCESSFUL ===\n\n";
            echo "You should now be able to access: " . base_url('index.php/admin') . "\n";
            echo "<a href='" . base_url('index.php/admin') . "'>Go to Admin Page</a>\n\n";

            echo "Check session:\n";
            echo "<a href='" . base_url('index.php/test_actual_login/check_session') . "'>Check Current Session</a>\n";

        } else {
            echo "  ❌ Session NOT saved!\n";
            echo "  Expected status: 'login'\n";
            echo "  Actual status: " . ($saved_status ? $saved_status : 'NULL') . "\n\n";

            echo "=== SESSION SAVE FAILED ===\n\n";

            echo "Possible issues:\n";
            echo "1. Session path not writable: " . $this->config->item('sess_save_path') . "\n";
            echo "2. Session driver issue: " . $this->config->item('sess_driver') . "\n";
            echo "3. Cookie settings preventing session storage\n\n";

            // Check session config
            echo "Current session config:\n";
            echo "  sess_driver: " . $this->config->item('sess_driver') . "\n";
            echo "  sess_save_path: " . $this->config->item('sess_save_path') . "\n";
            echo "  sess_cookie_name: " . $this->config->item('sess_cookie_name') . "\n";
            echo "  sess_expiration: " . $this->config->item('sess_expiration') . "\n";
            echo "  cookie_secure: " . ($this->config->item('cookie_secure') ? 'TRUE' : 'FALSE') . "\n";
            echo "  cookie_httponly: " . ($this->config->item('cookie_httponly') ? 'TRUE' : 'FALSE') . "\n";
        }

        echo "</pre>";
    }

    public function check_session() {
        echo "<pre>";
        echo "=== CURRENT SESSION STATUS ===\n\n";

        $status = $this->session->userdata('status');
        $nama = $this->session->userdata('nama');
        $id = $this->session->userdata('id');
        $login_time = $this->session->userdata('login_time');

        if ($status === 'login') {
            echo "✅ YOU ARE LOGGED IN!\n\n";
            echo "Session data:\n";
            echo "  Status: {$status}\n";
            echo "  Nama: {$nama}\n";
            echo "  ID: {$id}\n";
            echo "  Login time: " . ($login_time ? date('Y-m-d H:i:s', $login_time) : 'N/A') . "\n\n";

            echo "Try accessing admin page:\n";
            echo "<a href='" . base_url('index.php/admin') . "'>Go to Admin Dashboard</a>\n";
        } else {
            echo "❌ NOT LOGGED IN\n\n";
            echo "Session status: " . ($status ? $status : 'NULL') . "\n\n";
            echo "<a href='" . base_url('index.php/test_actual_login') . "'>Try login again</a>\n";
        }

        echo "</pre>";
    }
}
