<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fix_password extends CI_Controller {

    public function index() {
        echo "<pre>";
        echo "=== PASSWORD FIX TOOL ===\n\n";

        $correct_password = '@Sumedang123#';

        // Get one user to test
        $test_user = $this->db->get('admin', 1)->row();

        if ($test_user) {
            echo "Testing with user: {$test_user->username}\n";
            echo "Current hash: " . substr($test_user->password, 0, 30) . "...\n\n";

            // Test if current password works
            if (password_verify($correct_password, $test_user->password)) {
                echo "✅ PASSWORD ALREADY CORRECT!\n";
                echo "Current hash is valid for password: @Sumedang123#\n\n";
                echo "Login should work. If not, check:\n";
                echo "1. Session configuration\n";
                echo "2. Redirect after login\n";
                echo "3. Browser cookies\n";
            } else {
                echo "❌ PASSWORD HASH MISMATCH\n";
                echo "Current hash does NOT match password: @Sumedang123#\n\n";

                echo "Would you like to update all passwords? (This is a simulation)\n\n";

                // Generate correct hash
                $correct_hash = password_hash($correct_password, PASSWORD_BCRYPT);
                echo "New hash would be: " . substr($correct_hash, 0, 40) . "...\n\n";

                echo "To actually update, access:\n";
                echo base_url('index.php/fix_password/update_all') . "\n";
            }
        }

        echo "\n=== END ===\n";
        echo "</pre>";
    }

    public function update_all() {
        echo "<pre>";
        echo "=== UPDATING ALL PASSWORDS ===\n\n";

        $correct_password = '@Sumedang123#';
        $correct_hash = password_hash($correct_password, PASSWORD_BCRYPT);

        echo "New password: @Sumedang123#\n";
        echo "New hash: " . substr($correct_hash, 0, 40) . "...\n\n";

        // Update all users
        $data = ['password' => $correct_hash];
        $this->db->update('admin', $data);

        $affected = $this->db->affected_rows();

        if ($affected > 0) {
            echo "✅ SUCCESS!\n";
            echo "Updated {$affected} users\n\n";

            echo "All admin users now have password: @Sumedang123#\n\n";

            echo "You can now login with:\n";
            $users = $this->db->select('username')->get('admin', 5)->result();
            foreach ($users as $user) {
                echo "  Username: {$user->username}\n";
                echo "  Password: @Sumedang123#\n";
                echo "  ---\n";
            }

            echo "\n⚠️  IMPORTANT: Delete this controller after use!\n";
            echo "Delete: application/controllers/Fix_password.php\n";
            echo "Delete: application/controllers/Debug_login.php\n";

        } else {
            echo "❌ No rows updated\n";
        }

        echo "\n=== END ===\n";
        echo "</pre>";
    }

    public function update_user($username = null) {
        if (!$username) {
            echo "Usage: /fix_password/update_user/USERNAME";
            return;
        }

        echo "<pre>";
        echo "=== UPDATING SINGLE USER ===\n\n";

        $correct_password = '@Sumedang123#';
        $correct_hash = password_hash($correct_password, PASSWORD_BCRYPT);

        $this->db->where('username', $username);
        $this->db->update('admin', ['password' => $correct_hash]);

        if ($this->db->affected_rows() > 0) {
            echo "✅ Password updated for user: {$username}\n";
            echo "Password: @Sumedang123#\n";
        } else {
            echo "❌ User not found or no changes made\n";
        }

        echo "</pre>";
    }
}
