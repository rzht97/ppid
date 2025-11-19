<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_users extends CI_Controller {

    public function index() {
        $this->load->database();

        echo "<h2>Daftar User di Tabel Admin</h2>";
        echo "<pre>";

        // Get all users
        $query = $this->db->query("SELECT id, username, password FROM admin ORDER BY id");

        echo "Total users: " . $query->num_rows() . "\n\n";
        echo "=== LIST OF USERNAMES ===\n";
        echo str_repeat("=", 80) . "\n";
        printf("%-5s | %-30s | %s\n", "ID", "USERNAME", "PASSWORD HASH");
        echo str_repeat("=", 80) . "\n";

        foreach ($query->result() as $row) {
            printf("%-5s | %-30s | %s\n",
                $row->id,
                $row->username,
                substr($row->password, 0, 50) . '...'
            );
        }

        echo str_repeat("=", 80) . "\n\n";

        // Test password untuk setiap user
        echo "=== TEST PASSWORD @Sumedang123# ===\n";
        echo str_repeat("=", 80) . "\n";

        $test_password = '@Sumedang123#';

        foreach ($query->result() as $row) {
            $match = password_verify($test_password, $row->password) ? '✅ MATCH' : '❌ NO MATCH';
            echo "$match | Username: $row->username\n";
        }

        echo str_repeat("=", 80) . "\n";
        echo "</pre>";

        // Form test login
        echo "<h3>Test Login (Copy Username Exact)</h3>";
        echo "<form method='post' action='" . base_url('index.php/login/aksi_login') . "'>";
        echo "<select name='username'>";

        $query = $this->db->query("SELECT username FROM admin ORDER BY username");
        foreach ($query->result() as $row) {
            echo "<option value='" . htmlspecialchars($row->username) . "'>" . htmlspecialchars($row->username) . "</option>";
        }

        echo "</select><br><br>";
        echo "Password: <input type='text' name='password' value='@Sumedang123#'><br><br>";
        echo "<button type='submit'>Login</button>";
        echo "</form>";
    }
}
