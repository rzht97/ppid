<?php

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('M_login', 'm_login');
		// SECURITY: Load file-based rate limiter (track by IP, cannot bypass)
		$this->load->library('rate_limiter_file');
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
	 * Added: File-based rate limiting (track by IP, brute-force protection)
	 */
	function aksi_login(){
		// SECURITY: Check rate limit BEFORE processing login (track by IP)
		if (!$this->rate_limiter_file->enforce('login', 5, 900)) {
			// Rate limit exceeded - redirect with error
			$check = $this->rate_limiter_file->check('login', 5, 900);
			$remaining = ceil($check['wait_time'] / 60);

			$this->session->set_flashdata('error',
				'Terlalu banyak percobaan login gagal dari IP Anda. ' .
				'Silakan coba lagi dalam ' . $remaining . ' menit.'
			);

			log_message('warning', sprintf(
				'SECURITY: Login blocked - IP %s exceeded rate limit (%d attempts)',
				$this->input->ip_address(),
				$check['attempts']
			));

			redirect(base_url("login"));
			return;
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
				// SECURITY: Reset rate limit on successful login
				$this->rate_limiter_file->reset('login');

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
				log_message('info', sprintf(
					'SECURITY: Login success - User %s from IP %s',
					$username,
					$this->input->ip_address()
				));

				redirect(base_url("admin"));
			}else{
				// SECURITY: Increment failed attempts (track by IP)
				$this->handle_failed_login($username);
			}
		}else{
			// SECURITY: Increment failed attempts for non-existent user
			$this->handle_failed_login($username);
		}
	}

	/**
	 * Handle failed login attempt
	 * Increment counter and show appropriate message
	 * Uses file-based rate limiter (track by IP, not session)
	 *
	 * @param string $username Username yang dicoba
	 */
	private function handle_failed_login($username){
		// Increment rate limit counter (by IP)
		$attempts = $this->rate_limiter_file->increment('login', 900); // 15 minutes

		// Log security event
		log_message('warning', sprintf(
			'SECURITY: Failed login attempt #%d - Username: %s, IP: %s',
			$attempts,
			$username,
			$this->input->ip_address()
		));

		// Get current rate limit status
		$check = $this->rate_limiter_file->check('login', 5, 900);

		if (!$check['allowed']) {
			// Blocked - exceeded max attempts
			$wait_minutes = ceil($check['wait_time'] / 60);

			log_message('error', sprintf(
				'SECURITY: Login blocked - IP %s exceeded %d attempts. Blocked until: %s',
				$this->input->ip_address(),
				$attempts,
				date('Y-m-d H:i:s', $check['reset_at'])
			));

			$this->session->set_flashdata('error',
				'Terlalu banyak percobaan login gagal. ' .
				'IP Anda diblokir selama ' . $wait_minutes . ' menit untuk keamanan.'
			);
		} else {
			// Still allowed - show remaining attempts
			$remaining = $check['remaining'];

			$this->session->set_flashdata('error',
				'Username atau password salah! (' . $remaining . ' percobaan tersisa)'
			);
		}

		redirect(base_url("login"));
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
