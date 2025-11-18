<?php

class Overview extends CI_Controller {
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
        $this->load->view("publik/home", $data);
	}
    public function profil()
    {
        // load view admin/overview.php
        $this->load->view("publik/profil");
    }

	public function berita()
  {
        // load view admin/overview.php
        $data["berita"] = $this->berita_model->getAll();
        $this->load->view("dev/berita/berita", $data);
  }


    public function galeri()
  {
        // load view admin/overview.php
        $data["berita"] = $this->berita_model->getAll();
        $this->load->view("publik/galeri", $data);
  }

  	   public function detail($id = null)
    {
        if (!isset($id)) redirect('overview/berita');
       
        $berita = $this->berita_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }


        $data["berita"] = $berita->getById($id);
        if (!$data["berita"]) show_404();
        
        $this->load->view("publik/detail", $data);
         
    }


      public function inpub()
    { 
		  $ambilkategori = $this->input->post('kategori');
          $data['kategori'] = $this->input->post('kategori');
          if ($ambilkategori != '' ) {
              $data['dokumen'] = $this->db->query("SELECT * FROM dokumen WHERE kategori = '$ambilkategori'")->result();
          } else {
              $data['dokumen'] = $this->dokumen_model->getall();
          }
          $this->load->view("publik/download", $data);
    }



      public function berkala()
    {
        $data["dokumen"] = $this->dokumen_model->getberkala();
        $this->load->view("publik/infoberkala", $data);
    }

      public function sertamerta()
    {
        $data["dokumen"] = $this->dokumen_model->getsertamerta();
        $this->load->view("publik/infosertamerta", $data);
    }
  public function setiapsaat()
    {
        $data["dokumen"] = $this->dokumen_model->getsetiapsaat();
        $this->load->view("publik/infosetiapsaat", $data);
    }

      public function dikecualikan()
    {
        $data["dokumen"] = $this->dokumen_model->getdikecualikan();
        $this->load->view("publik/download", $data);
    }

      public function ditolak()
    {
        $data["dokumen"] = $this->dokumen_model->getditolak();
        $this->load->view("publik/download", $data);
    }

      public function keberatan()
    {
        $data["dokumen"] = $this->dokumen_model->getkeberatan();
        $this->load->view("publik/download", $data);
    }

    public function regulasi()
    {
        // load view admin/overview.php
        $this->load->view("publik/regulasi");
    }

       public function detaildok($id = null)
    {
        if (!isset($id)) redirect('overview/berita');
       
        $berita = $this->dokumen_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }


        $data["dokumen"] = $berita->getById($id);
        if (!$data["dokumen"]) show_404();
        
        $this->load->view("publik/detaildok", $data);
         
    }

    public function download($id){
    $this->load->helper('download');
    $fileinfo = $this->dokumen_model->download($id);
    $file = 'upload/dokumen/'.$fileinfo['image'];
    force_download($file, NULL);
}
    

// golongan informasi

    public function caradapatinfo()
    {
        // load view admin/overview.php
        $this->load->view("publik/caradapatinfo");
    }


    public function carakeberatan()
    {
        // load view admin/overview.php
        $this->load->view("publik/carakeberatan");
    }


    public function sop()
    {
        // load view admin/overview.php
        $this->load->view("publik/sop");
    }


    public function alasantolakpermintaan()
    {
        // load view admin/overview.php
        $this->load->view("publik/alasantolakpermintaan");
    }


    public function tidakpuaskeberatan()
    {
        // load view admin/overview.php
        $this->load->view("publik/tidakpuaskeberatan");
    }
	public function maklumat()
    {
        // load view admin/overview.php
        $this->load->view("publik/maklumat");
    }
    public function urtug()
    {
        // load view admin/overview.php
        $this->load->view("publik/urtug");
    }
    public function visimisi()
	{
		$this->load->view("publik/visimisi");
	}
	
	public function sengketa()
	{
		$this->load->view("publik/sengketa");
	}
	
	public function perjanjian()
	{
		$this->load->view("publik/perjanjian");
	}
	public function lhkpn()
	{
		$this->load->view("publik/lhkpn");
	}
}