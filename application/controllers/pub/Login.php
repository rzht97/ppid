
<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('regis_model');
		$this->load->model('m_loginuser');
   		$this->load->helper('url');
        $this->load->library('form_validation');


	}

	function index(){
		$this->load->view("dev/user/login");
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_loginuser->cek_login("user",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'nama' => $username,
				'password' => $password,
				'status' => "loginuser"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("index.php/user"));

		}else{
			echo "Username dan password salah !";
			redirect(base_url("index.php/pub/login"));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/pub/login'));
	}
		function regis(){
		$this->load->view('dev/user/daftar');
	}


	  public function add()
    {
        $dokumen = $this->regis_model;
        $validation = $this->form_validation;
        $validation->set_rules($dokumen->rules());

        if ($validation->run()) {
            $dokumen->save();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan dan dalam proses verifikasi, cek e-mail yang didaftarkan secara berkala untuk informasi selanjutnya.');
        }

        $this->load->view("dev/user/daftar");
    }
}