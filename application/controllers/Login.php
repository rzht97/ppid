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
		$username = $this->input->post('username', TRUE); // XSS clean
		$password = $this->input->post('password'); // Don't XSS clean passwords

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

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/login'));
	}

		function regis(){
		$this->load->view('publik/regis');
	}

	
}