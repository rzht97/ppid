<?php

#[AllowDynamicProperties]  // PHP 8.2 compatibility
class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('M_login', 'm_login');

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
	 * Added: Rate limiting to prevent brute force attacks
	 */
	function aksi_login(){
		// RATE LIMITING: Check if user is blocked due to too many failed attempts
		$blocked_until = $this->session->userdata('login_blocked_until');
		if($blocked_until && time() < $blocked_until){
			$remaining = ceil(($blocked_until - time()) / 60);
			$this->session->set_flashdata('error', 'Terlalu banyak percobaan login gagal. Coba lagi dalam ' . $remaining . ' menit.');
			log_message('warning', 'Blocked login attempt - still in timeout period');
			redirect(base_url("login"));
			return;
		}

		// Clear block if timeout has passed
		if($blocked_until && time() >= $blocked_until){
			$this->session->unset_userdata('login_blocked_until');
			$this->session->unset_userdata('login_attempts');
		}

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
				// RATE LIMITING: Reset failed attempts on successful login
				$this->session->unset_userdata('login_attempts');
				$this->session->unset_userdata('login_blocked_until');

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

				redirect(base_url("admin"));
			}else{
				// RATE LIMITING: Increment failed attempts
				$this->increment_failed_attempts($username);
			}
		}else{
			// RATE LIMITING: Increment failed attempts for non-existent user
			$this->increment_failed_attempts($username);
		}
	}

	/**
	 * Rate limiting helper: Increment failed login attempts
	 * Block user after 5 failed attempts for 15 minutes
	 */
	private function increment_failed_attempts($username){
		$attempts = $this->session->userdata('login_attempts') ?: 0;
		$attempts++;

		$this->session->set_userdata('login_attempts', $attempts);

		// Log failed login attempt
		log_message('warning', 'Failed login attempt #' . $attempts . ' for username: ' . $username);

		// Block after 5 attempts
		if($attempts >= 5){
			$block_until = time() + (15 * 60); // Block for 15 minutes
			$this->session->set_userdata('login_blocked_until', $block_until);

			log_message('warning', 'User blocked after ' . $attempts . ' failed attempts. Blocked until: ' . date('Y-m-d H:i:s', $block_until));

			$this->session->set_flashdata('error', 'Terlalu banyak percobaan login gagal. Akun diblokir selama 15 menit untuk keamanan.');
		}else{
			$remaining = 5 - $attempts;
			$this->session->set_flashdata('error', 'Username atau password salah! (' . $remaining . ' percobaan tersisa)');
		}

		redirect(base_url("login"));
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}