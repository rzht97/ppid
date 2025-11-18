<?php

class Berita extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

		 $this->load->model("berita_model");
		$this->load->model("informasi_model");
		$this->load->model("user_model");
        $this->load->library('form_validation');
        $this->load->model("dokumen_model");
		$this->load->database('db2',TRUE);
	}

	public function index()
	{
		// load view admin/overview.php
		$data["berita"] = $this->db2->query("SELECT * FROM t_berita ORDER BY tanggal DESC LIMIT 10")->result();
		$this->load->view("dev/berita/berita", $data);
		
	}

	public function berita()
  {
        
  }



}