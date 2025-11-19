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

        // Form test login dengan DEBUG
        echo "<h3>Test Login (Copy Username Exact)</h3>";
        echo "<p><strong>Form ini akan menampilkan detail setiap step login</strong></p>";

        // Get all usernames for dropdown
        $query = $this->db->query("SELECT username FROM admin ORDER BY username");
        ?>

        <form method="POST" action="<?php echo base_url('index.php/login/aksi_login_debug'); ?>">
            <label>Username:</label><br>
            <select name="username" required style="padding: 5px; font-size: 14px;">
                <?php foreach ($query->result() as $row): ?>
                    <option value="<?php echo htmlspecialchars($row->username); ?>">
                        <?php echo htmlspecialchars($row->username); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>

            <label>Password:</label><br>
            <input type="text" name="password" value="@Sumedang123#" style="padding: 5px; font-size: 14px;" required>
            <br><br>

            <button type="submit" style="padding: 10px 20px; font-size: 14px; background: #007bff; color: white; border: none; cursor: pointer;">
                Test Login (DEBUG MODE)
            </button>
        </form>

        <hr>
        <p><strong>Atau test dengan form login asli:</strong></p>
        <a href="<?php echo base_url('index.php/login'); ?>" target="_blank">Buka Form Login</a>
        <?php
    }
}
