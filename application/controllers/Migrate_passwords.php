<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Password Migration Controller
 *
 * SECURITY NOTE: This controller should be removed or protected after migration!
 *
 * Purpose: Migrate existing MD5 passwords to bcrypt
 *
 * Usage:
 * 1. Backup database first!
 * 2. Visit: /index.php/migrate_passwords/convert
 * 3. Enter admin password for confirmation
 * 4. Script will convert all MD5 passwords to bcrypt using DEFAULT password
 * 5. All users must change their password after first login
 *
 * IMPORTANT: Delete this file after migration is complete!
 */
class Migrate_passwords extends CI_Controller {

	private $migration_key = "ppid_migration_2025"; // Change this!

	public function __construct(){
		parent::__construct();

		// Only allow in development environment
		if(ENVIRONMENT === 'production'){
			show_404();
		}
	}

	/**
	 * Show migration form
	 */
	public function index(){
		echo "<!DOCTYPE html>
		<html>
		<head>
			<title>Password Migration</title>
			<style>
				body { font-family: Arial; padding: 50px; background: #f5f5f5; }
				.container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
				h2 { color: #333; }
				.warning { background: #fff3cd; border: 1px solid #ffc107; padding: 15px; margin: 20px 0; border-radius: 5px; }
				.success { background: #d4edda; border: 1px solid #28a745; padding: 15px; margin: 20px 0; border-radius: 5px; }
				.error { background: #f8d7da; border: 1px solid #dc3545; padding: 15px; margin: 20px 0; border-radius: 5px; }
				input[type=password], input[type=text] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
				button { background: #007bff; color: white; padding: 12px 30px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
				button:hover { background: #0056b3; }
				.danger { background: #dc3545; }
				.danger:hover { background: #c82333; }
				ol { line-height: 1.8; }
			</style>
		</head>
		<body>
			<div class='container'>
				<h2>🔒 Password Migration Tool</h2>

				<div class='warning'>
					<strong>⚠️ WARNING:</strong> This will convert all MD5 passwords to bcrypt!
				</div>

				<h3>Before you proceed:</h3>
				<ol>
					<li>✅ Backup your database</li>
					<li>✅ Make sure you're in development environment</li>
					<li>✅ Inform all users to change password after migration</li>
					<li>✅ Delete this file after migration!</li>
				</ol>

				<form method='post' action='".base_url('index.php/migrate_passwords/convert')."' onsubmit='return confirm(\"Are you ABSOLUTELY sure? This cannot be undone!\");'>
					<label><strong>Migration Key:</strong></label>
					<input type='password' name='key' placeholder='Enter migration key' required>

					<label><strong>Default Password (for all users):</strong></label>
					<input type='password' name='default_password' placeholder='Users will use this to login first time' required>

					<br><br>
					<button type='submit' class='danger'>⚠️ START MIGRATION</button>
				</form>

				<hr>
				<h3>Alternative: Manual User Creation</h3>
				<p>Create a single admin user with bcrypt password:</p>
				<form method='post' action='".base_url('index.php/migrate_passwords/create_user')."'>
					<input type='text' name='username' placeholder='Username' required>
					<input type='password' name='password' placeholder='Password' required>
					<button type='submit'>Create User</button>
				</form>
			</div>
		</body>
		</html>";
	}

	/**
	 * Convert all MD5 passwords to bcrypt
	 */
	public function convert(){
		$key = $this->input->post('key');
		$default_password = $this->input->post('default_password');

		// Verify migration key
		if($key !== $this->migration_key){
			$this->show_result(false, "Invalid migration key!");
			return;
		}

		if(empty($default_password)){
			$this->show_result(false, "Default password cannot be empty!");
			return;
		}

		try {
			// Get all admin users
			$users = $this->db->get('admin')->result();

			if(empty($users)){
				$this->show_result(false, "No users found in admin table!");
				return;
			}

			$bcrypt_hash = password_hash($default_password, PASSWORD_BCRYPT, ['cost' => 10]);
			$count = 0;

			foreach($users as $user){
				// Update password to bcrypt
				$this->db->where('id', $user->id);
				$this->db->update('admin', array('password' => $bcrypt_hash));
				$count++;
			}

			$message = "✅ Successfully migrated {$count} user(s)!<br><br>";
			$message .= "<strong>IMPORTANT:</strong><br>";
			$message .= "- All users now have password: <code>{$default_password}</code><br>";
			$message .= "- Instruct all users to change their password immediately<br>";
			$message .= "- DELETE this migration controller file!<br>";
			$message .= "- File to delete: <code>application/controllers/Migrate_passwords.php</code>";

			$this->show_result(true, $message);

		} catch(Exception $e){
			$this->show_result(false, "Migration failed: " . $e->getMessage());
		}
	}

	/**
	 * Create single user with bcrypt password
	 */
	public function create_user(){
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password');

		if(empty($username) || empty($password)){
			$this->show_result(false, "Username and password are required!");
			return;
		}

		// Check if user exists
		$exists = $this->db->get_where('admin', array('username' => $username))->row();
		if($exists){
			$this->show_result(false, "Username already exists!");
			return;
		}

		// Create user dengan bcrypt
		$data = array(
			'username' => $username,
			'password' => password_hash($password, PASSWORD_BCRYPT, ['cost' => 10])
		);

		if($this->db->insert('admin', $data)){
			$this->show_result(true, "User '{$username}' created successfully with bcrypt password!");
		}else{
			$this->show_result(false, "Failed to create user!");
		}
	}

	/**
	 * Show result page
	 */
	private function show_result($success, $message){
		$class = $success ? 'success' : 'error';
		$icon = $success ? '✅' : '❌';

		echo "<!DOCTYPE html>
		<html>
		<head>
			<title>Migration Result</title>
			<style>
				body { font-family: Arial; padding: 50px; background: #f5f5f5; }
				.container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
				.success { background: #d4edda; border: 1px solid #28a745; padding: 20px; margin: 20px 0; border-radius: 5px; color: #155724; }
				.error { background: #f8d7da; border: 1px solid #dc3545; padding: 20px; margin: 20px 0; border-radius: 5px; color: #721c24; }
				a { color: #007bff; text-decoration: none; }
				code { background: #f4f4f4; padding: 2px 6px; border-radius: 3px; }
			</style>
		</head>
		<body>
			<div class='container'>
				<h2>{$icon} Migration Result</h2>
				<div class='{$class}'>
					{$message}
				</div>
				<a href='".base_url('index.php/migrate_passwords')."'>← Back</a> |
				<a href='".base_url('index.php/login')."'>Go to Login</a>
			</div>
		</body>
		</html>";
	}
}
