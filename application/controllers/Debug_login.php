<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debug_login extends CI_Controller {

    public function index() {
        // Check if we can connect to database
        echo "<pre>";
        echo "=== LOGIN DEBUG INFO ===\n\n";

        // Check database connection
        if ($this->db->conn_id) {
            echo "✅ Database connected\n\n";
        } else {
            echo "❌ Database NOT connected\n\n";
            return;
        }

        // Check if admin table exists
        $tables = $this->db->list_tables();
        echo "Available tables:\n";
        foreach ($tables as $table) {
            echo "  - {$table}\n";
        }
        echo "\n";

        if (in_array('admin', $tables)) {
            echo "✅ Table 'admin' exists\n\n";

            // Show structure
            echo "=== TABLE STRUCTURE ===\n";
            $fields = $this->db->field_data('admin');
            foreach ($fields as $field) {
                echo sprintf("%-20s %-20s\n", $field->name, $field->type);
            }
            echo "\n";

            // Count users
            $count = $this->db->count_all('admin');
            echo "Total users: {$count}\n\n";

            if ($count > 0) {
                // List users
                echo "=== USERS IN ADMIN TABLE ===\n";
                $users = $this->db->get('admin')->result();

                foreach ($users as $user) {
                    echo str_repeat('-', 60) . "\n";
                    foreach ($user as $field => $value) {
                        if ($field === 'password') {
                            $len = strlen($value);
                            $preview = substr($value, 0, 20);
                            echo "password: {$preview}... [{$len} chars]\n";

                            // Detect format
                            if ($len == 32 && ctype_xdigit($value)) {
                                echo "  → Format: MD5 ⚠️\n";
                            } elseif ($len == 60 && substr($value, 0, 4) === '$2y$') {
                                echo "  → Format: BCRYPT ✅\n";

                                // Test common passwords
                                $test_passwords = ['admin', 'admin123', 'password'];
                                foreach ($test_passwords as $pwd) {
                                    if (password_verify($pwd, $value)) {
                                        echo "  → Password is: '{$pwd}'\n";
                                    }
                                }
                            } else {
                                echo "  → Format: UNKNOWN\n";
                            }
                        } else {
                            echo "{$field}: {$value}\n";
                        }
                    }
                }
                echo str_repeat('-', 60) . "\n\n";

            } else {
                echo "❌ NO USERS FOUND!\n\n";

                echo "Creating test admin user...\n";
                $password_hash = password_hash('admin123', PASSWORD_BCRYPT);
                $data = [
                    'username' => 'admin',
                    'password' => $password_hash
                ];

                if ($this->db->insert('admin', $data)) {
                    echo "✅ Admin user created successfully!\n";
                    echo "Username: admin\n";
                    echo "Password: admin123\n\n";
                } else {
                    echo "❌ Failed to create admin user\n";
                    echo "Error: " . $this->db->error()['message'] . "\n\n";
                }
            }

        } else {
            echo "❌ Table 'admin' NOT FOUND\n\n";
            echo "Creating admin table...\n";

            $this->load->dbforge();

            $fields = [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ],
                'username' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'unique' => TRUE
                ],
                'password' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255'
                ],
                'created_at' => [
                    'type' => 'TIMESTAMP',
                    'null' => TRUE,
                    'default' => NULL
                ]
            ];

            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', TRUE);

            if ($this->dbforge->create_table('admin', TRUE)) {
                echo "✅ Table 'admin' created successfully!\n\n";

                // Insert default admin
                $password_hash = password_hash('admin123', PASSWORD_BCRYPT);
                $data = [
                    'username' => 'admin',
                    'password' => $password_hash
                ];

                if ($this->db->insert('admin', $data)) {
                    echo "✅ Default admin user created!\n";
                    echo "Username: admin\n";
                    echo "Password: admin123\n\n";
                }
            } else {
                echo "❌ Failed to create admin table\n\n";
            }
        }

        echo "=== END DEBUG ===\n";
        echo "</pre>";
    }

    public function test_login() {
        echo "<h2>Test Login</h2>";
        echo "<form method='post' action='" . base_url('index.php/debug_login/do_test') . "'>";
        echo "Username: <input type='text' name='username' value='admin'><br>";
        echo "Password: <input type='password' name='password' value='admin123'><br>";
        echo "<button type='submit'>Test Login</button>";
        echo "</form>";
    }

    public function do_test() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        echo "<pre>";
        echo "=== LOGIN TEST ===\n\n";
        echo "Username: {$username}\n";
        echo "Password: {$password}\n\n";

        // Get user
        $user = $this->db->get_where('admin', ['username' => $username])->row();

        if ($user) {
            echo "✅ User found in database\n";
            echo "Stored password: " . substr($user->password, 0, 30) . "...\n\n";

            // Test bcrypt
            if (password_verify($password, $user->password)) {
                echo "✅ BCRYPT VERIFICATION: SUCCESS\n";
                echo "Login should work!\n";
            } else {
                echo "❌ BCRYPT VERIFICATION: FAILED\n";
            }

            // Test MD5
            if ($user->password === md5($password)) {
                echo "✅ MD5 VERIFICATION: SUCCESS\n";
                echo "Password needs migration to bcrypt\n";
            } else {
                echo "❌ MD5 VERIFICATION: FAILED\n";
            }

        } else {
            echo "❌ User NOT found in database\n";
        }

        echo "\n<a href='" . base_url('index.php/debug_login') . "'>Back to debug</a>\n";
        echo "<a href='" . base_url('index.php/debug_login/test_login') . "'>Test again</a>\n";
        echo "</pre>";
    }
}
