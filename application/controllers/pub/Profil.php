<?php

class Profil extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

		 $this->load->model("berita_model");
		$this->load->model("informasi_model");
		$this->load->model("user_model");
        $this->load->library('form_validation');
        $this->load->model("dokumen_model");
	}

	public function index()
	{
		$data['ditolak'] = $this->db->query("SELECT count(status) as total FROM informasi WHERE status = 'ditolak'")->result();
		$data['jmlpermohonan'] = $this->db->query("SELECT * FROM informasi");
		$data['diproses'] = $this->db->query("SELECT count(status) as total FROM informasi WHERE status = 'sudah diproses'")->result();
		$data['user'] = $this->db->query("SELECT * FROM user");
        // load view admin/overview.php
        $this->load->view("dev/index2", $data);
	}
	public function maklumat()
    {
       $this->load->view("dev/profil/maklumat");
    }
    public function urtug()
    {
        // load view admin/overview.php
        $this->load->view("dev/profil/urtug");
    }
    public function visimisikab()
	{
		$this->load->view("dev/profil/visimisikab");
	}
	public function strukturorg()
	{
		$this->load->view("dev/profil/strukturorg");
	}
	public function visimisippid()
	{
		$this->load->view("dev/profil/visimisippid");
	}
}