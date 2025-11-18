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
		$data['ditolak'] = $this->db->query("SELECT count(status) as total FROM permohonan WHERE status = 'Ditolak'")->result();
		$data['jml'] = $this->db->query("SELECT count(status) as total FROM permohonan")->result();
		$data['selesai'] = $this->db->query("SELECT count(status) as total FROM permohonan WHERE status = 'Selesai'")->result();
		$data['done'] = $this->db->query("SELECT * FROM permohonan WHERE status = 'Sudah Diproses'")->result();
		$data['user'] = $this->db->query("SELECT * FROM user");
        // load view admin/overview.php
        $this->load->view("dev/index2", $data);
	}

	public function berita()
  {
        // load view admin/overview.php
		$data["highlight"] = $this->db->query("SELECT * FROM berita ORDER BY tanggal DESC LIMIT 3")->result();
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
       
		$data["highlight"] = $this->db->query("SELECT * FROM berita ORDER BY tanggal DESC LIMIT 3")->result();
        $berita = $this->berita_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }


        $data["berita"] = $berita->getById($id);
        if (!$data["berita"]) show_404();
        
        $this->load->view("dev/berita/detail", $data);
         
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
          $this->load->view("dev/dip", $data);
    }
	
	public function detaildip($id = null)
	{
		      
         $dokumen = $this->dokumen_model;
         $data["dokumen"] = $dokumen->getById($id);
         if (!$data["dokumen"]) show_404();
       
         $this->load->view("dev/detaildip", $data);
		//$this->load->view('dev/admin/permohonanv2/detail',$data);
	}


      public function infoberkala()
    {
        //$data["dokumen"] = $this->dokumen_model->getberkala();
		$data['berkala'] = $this->db->query('SELECT * FROM dokumen WHERE kategori = "Berkala"')->result();
        $this->load->view("dev/infoberkala", $data);
    }

      public function infosertamerta()
    {
        $data['sertamerta'] = $this->db->query('SELECT * FROM dokumen WHERE kategori = "Serta Merta"')->result();
        $this->load->view("dev/infosertamerta", $data);
    }
  public function infosetiapsaat()
    {
        $data['setiapsaat'] = $this->db->query('SELECT * FROM dokumen WHERE kategori = "Setiap Saat"')->result();
        $this->load->view("dev/infosetiapsaat", $data);
    }

    public function regulasi()
    {
        // load view admin/overview.php
        $this->load->view("dev/regulasi");
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
        $this->load->view("dev/layananinformasi/sopinformasi");
    }


    public function carakeberatan()
    {
        // load view admin/overview.php
        $this->load->view("dev/layananinformasi/keberatan.php");
    }
	
	public function carasengketa()
	{
		$this->load->view("dev/layananinformasi/sengketa");
	}
	
	public function pengumuman()
	{
		$this->load->view("dev/error");
	}
	
	public function standarbiaya()
	{
		$this->load->view("dev/layananinformasi/standarbiaya");
	}
	
	public function sop()
	{
		$this->load->view("dev/layananinformasi/sopinfo");
	}
	
	public function dik()
	{
		$this->load->view("dev/dik");
	}
	
	public function skdip()
	{
		$this->load->view("dev/skdip");
	}
	
	public function pejabat()
	{
		$this->load->view("dev/pejabat");
	}
	
	public function laporan()
	{
		$this->load->view("dev/laporan");
	}
	
	public function lhkpn()
	{
		$this->load->view("dev/lhkpn");
	}
	public function lapor()
	{
		$this->load->view("dev/lapor");
	}
	
	public function cc()
	{
		$this->load->view("dev/cc");
	}
	
	public function listpermohonan()
	{
		$data['permohonan'] = $this->db->query('SELECT * FROM permohonan')->result();
		
		$this->load->view('dev/listpemohon',$data);
	}

}