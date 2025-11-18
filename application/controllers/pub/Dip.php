<?php

class Dip extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

		$this->load->model("informasi_model");
		$this->load->model("user_model");
        $this->load->library('form_validation');
        $this->load->model("dokumen_model");
	}

	public function index()
	{
		
        $ambilkategori = $this->input->post('kategori');
          $data['kategori'] = $this->input->post('kategori');
          if ($ambilkategori != '' ) {
              $data['dokumen'] = $this->db->query("SELECT * FROM dokumen WHERE kategori = '$ambilkategori'")->result();
          } else {
              $data['dokumen'] = $this->dokumen_model->getall();
          }
          $this->load->view("dev/DIP/dip", $data);
        $this->load->view("dev/index2", $data);
	}


      public function dip()
    { 
		  $ambilkategori = $this->input->post('kategori');
          $data['kategori'] = $this->input->post('kategori');
          if ($ambilkategori != '' ) {
              $data['dokumen'] = $this->db->query("SELECT * FROM dokumen WHERE kategori = '$ambilkategori'")->result();
          } else {
              $data['dokumen'] = $this->dokumen_model->getall();
          }
          $this->load->view("dev/DIP/dip", $data);
    }
	
	public function detaildip($id = null)
	{
		      
         $dokumen = $this->dokumen_model;
         $data["dokumen"] = $dokumen->getById($id);
         if (!$data["dokumen"]) show_404();
       
         $this->load->view("dev/DIP/detaildip", $data);
		//$this->load->view('dev/admin/permohonanv2/detail',$data);
	}


}