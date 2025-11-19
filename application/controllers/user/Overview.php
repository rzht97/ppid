<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
    if($this->session->userdata('status') != "loginuser"){
      redirect(base_url("index.php/pub/login"));
    }

		$this->load->helper('url');
        // $this->load->model("statkec/pendidikan_model");
        //  $this->load->model("statkec/agama_model");
        $this->load->library('form_validation');
	}

	public function index()
	{

     $data['nama_user'] = $this->session->userdata("nama");


        // load view admin/overview.php
          // $x['data']=$this->pendidikan_model->get_data_stok();
          // $x['data']=$this->agama_model->get_data_stok();
        $this->load->view("user/overview",$data);
	}
	
	public function test()
	{
		$this->load->view("user/new/list");
	}



  
}
