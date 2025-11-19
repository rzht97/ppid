<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('dev/login');
	}

	/**
	 * Login authentication
	 * Fixed: Support both bcrypt and MD5 passwords for migration
	 * Fixed: Removed password from session
	 * Added: Session regeneration for security
	 * Added: Auto-migration from MD5 to bcrypt on successful login
	 */
	function aksi_login(){
		// TEMPORARY FIX: Bypass CI input class and use raw $_POST
		// CI input->post() is returning NULL, but $_POST works in pure PHP
		$username = isset($_POST['username']) ? trim(strip_tags($_POST['username'])) : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';  // Don't strip password

		// Log for debugging
		log_message('debug', 'Login attempt - Username: ' . $username . ', POST count: ' . count($_POST));

		// Get user by username only
		$user = $this->m_login->get_by_username($username);

		if($user){
			$password_valid = false;

			// Try bcrypt verification first (new format)
			if(password_verify($password, $user->password)){
				$password_valid = true;
			}
			// Fallback to MD5 for old passwords
			elseif($user->password === md5($password)){
				$password_valid = true;

				// Auto-migrate MD5 password to bcrypt
				$this->m_login->migrate_password($username, $password);
				log_message('info', 'Password migrated from MD5 to bcrypt for user: ' . $username);
			}

			if($password_valid){
				// Regenerate session ID to prevent fixation
				$this->session->sess_regenerate(TRUE);

				$data_session = array(
					'id' => $user->id,
					'nama' => $user->username,
					'status' => "login",
					'login_time' => time()
				);

				$this->session->set_userdata($data_session);

				// Log successful login
				log_message('info', 'User ' . $username . ' logged in successfully');

				redirect(base_url("index.php/admin"));
			}else{
				// Log failed login attempt
				log_message('warning', 'Failed login attempt for username: ' . $username);

				$this->session->set_flashdata('error', 'Username atau password salah!');
				redirect(base_url("index.php/login"));
			}
		}else{
			// Log failed login - user not found
			log_message('warning', 'Login attempt for non-existent user: ' . $username);

			$this->session->set_flashdata('error', 'Username atau password salah!');
			redirect(base_url("index.php/login"));
		}
	}

	/**
	 * Debug version of aksi_login - shows detailed output
	 */
	function aksi_login_debug(){
		echo "<h2>DEBUG LOGIN PROCESS</h2><pre>";

		// Step 1: Get POST data
		echo "STEP 1: Get POST Data\n";
		echo str_repeat("=", 80) . "\n";

		// Use raw $_POST instead of CI input class
		$username = isset($_POST['username']) ? trim($_POST['username']) : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';

		echo "Raw \$_POST array:\n";
		print_r($_POST);
		echo "\n";

		echo "Username received: [$username]\n";
		echo "Username length: " . strlen($username) . "\n";
		echo "Password received: [" . str_repeat('*', strlen($password)) . "]\n";
		echo "Password length: " . strlen($password) . "\n";
		echo "\n";

		if(empty($username) || empty($password)){
			echo "❌ FAILED: Username or password is empty!\n";
			echo "</pre>";
			return;
		}

		// Step 2: Query database
		echo "\nSTEP 2: Query Database\n";
		echo str_repeat("=", 80) . "\n";
		$user = $this->m_login->get_by_username($username);

		if(!$user){
			echo "❌ FAILED: User not found in database\n";
			echo "Username searched: [$username]\n";
			echo "</pre>";
			return;
		}

		echo "✅ User found!\n";
		echo "User ID: $user->id\n";
		echo "Username: $user->username\n";
		echo "Password hash: " . substr($user->password, 0, 60) . "...\n";
		echo "\n";

		// Step 3: Verify password
		echo "\nSTEP 3: Verify Password\n";
		echo str_repeat("=", 80) . "\n";

		$bcrypt_match = password_verify($password, $user->password);
		echo "Bcrypt verify result: " . ($bcrypt_match ? '✅ MATCH' : '❌ NO MATCH') . "\n";

		$md5_hash = md5($password);
		$md5_match = ($user->password === $md5_hash);
		echo "MD5 verify result: " . ($md5_match ? '✅ MATCH' : '❌ NO MATCH') . "\n";
		echo "\n";

		$password_valid = $bcrypt_match || $md5_match;

		if(!$password_valid){
			echo "❌ FAILED: Password verification failed\n";
			echo "</pre>";
			return;
		}

		// Step 4: Session regeneration
		echo "\nSTEP 4: Session Regeneration\n";
		echo str_repeat("=", 80) . "\n";
		echo "Old session ID: " . session_id() . "\n";
		$this->session->sess_regenerate(TRUE);
		echo "New session ID: " . session_id() . "\n";
		echo "✅ Session regenerated\n\n";

		// Step 5: Set session data
		echo "\nSTEP 5: Set Session Data\n";
		echo str_repeat("=", 80) . "\n";
		$data_session = array(
			'id' => $user->id,
			'nama' => $user->username,
			'status' => "login",
			'login_time' => time()
		);

		echo "Data to be stored in session:\n";
		print_r($data_session);

		$this->session->set_userdata($data_session);
		echo "✅ Session data set\n\n";

		// Step 6: Verify session was saved
		echo "\nSTEP 6: Verify Session Data\n";
		echo str_repeat("=", 80) . "\n";
		echo "Current session data:\n";
		print_r($this->session->userdata());

		$status = $this->session->userdata('status');
		if($status == 'login'){
			echo "\n✅✅✅ LOGIN SUCCESSFUL! ✅✅✅\n";
			echo "\nRedirect to: " . base_url("index.php/admin") . "\n";
			echo "\n<a href='" . base_url("index.php/admin") . "'>Click here to go to Admin</a>\n";
		}else{
			echo "\n❌ FAILED: Session status not set to 'login'\n";
		}

		echo "</pre>";
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/login'));
	}

		function regis(){
		$this->load->view('publik/regis');
	}

	
}