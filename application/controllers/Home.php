<?php

class Home extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

	        $this->load->library('form_validation');
        $this->load->model("dokumen_model");
	}

	/**
	 * Public homepage dengan statistik
	 * Fixed: SQL injection, optimized queries
	 */
	public function index()
	{
		// Redirect /home to / for clean URL
		if ($this->uri->segment(1) === 'home' && !$this->uri->segment(2)) {
			redirect(base_url(), 'location', 301);
		}

		// Optimized: Gabung query statistik
		$stats = $this->db->select('
			COUNT(*) as total,
			SUM(CASE WHEN status = "Ditolak" THEN 1 ELSE 0 END) as ditolak,
			SUM(CASE WHEN status = "Selesai" THEN 1 ELSE 0 END) as selesai
		')
		->from('permohonan')
		->get()
		->row();

		$data['ditolak'] = array((object)array('total' => $stats->ditolak));
		$data['jml'] = array((object)array('total' => $stats->total));
		$data['selesai'] = array((object)array('total' => $stats->selesai));

		// Fixed: Gunakan query builder dan select specific columns
		$data['done'] = $this->db->select('mohon_id, nama, tanggal, status')
		                         ->where('status', 'Sudah Diproses')
		                         ->get('permohonan')
		                         ->result();

		$data['user'] = $this->db->select('user_id, username, nama, email')
		                         ->get('user')
		                         ->result();

        // load view admin/overview.php
        $this->load->view("dev/index2", $data);
	}

	/**
	 * Tampilkan daftar berita
	 * Fixed: SQL injection, select specific columns
	 */
	public function berita()
  {
        // Fixed: Gunakan query builder dan select specific columns
		$data["highlight"] = $this->db->select('berita_id, judul, tanggal, isi, gambar, slug, kategori')
		                              ->from('berita')
		                              ->order_by('tanggal', 'DESC')
		                              ->limit(3)
		                              ->get()
		                              ->result();
        $data["berita"] = $this->db->select('berita_id, judul, tanggal, isi, gambar, slug, kategori')
                                     ->from('berita')
                                     ->order_by('tanggal', 'DESC')
                                     ->get()
                                     ->result();
        $this->load->view("dev/berita/berita", $data);
  }


    public function galeri()
  {
        // load view admin/overview.php
        $data["berita"] = $this->db->select('berita_id, judul, tanggal, isi, gambar, slug, kategori')
                                     ->from('berita')
                                     ->order_by('tanggal', 'DESC')
                                     ->get()
                                     ->result();
        $this->load->view("publik/galeri", $data);
  }

  	/**
	 * Detail berita
	 * Fixed: SQL injection vulnerability
	 */
	public function detail($id = null)
    {
        if (!isset($id)) redirect('overview/berita');

        // Sanitize input
        $id = $this->db->escape_str($id);

		// Fixed: Query builder
		$data["highlight"] = $this->db->select('berita_id, judul, tanggal, isi, gambar, slug')
		                              ->from('berita')
		                              ->order_by('tanggal', 'DESC')
		                              ->limit(3)
		                              ->get()
		                              ->result();

        // Get berita by ID using query builder
        $data["berita"] = $this->db->select('berita_id, judul, tanggal, isi, gambar, slug, kategori')
                                   ->from('berita')
                                   ->where('berita_id', $id)
                                   ->get()
                                   ->row();
        if (!$data["berita"]) show_404();

        $this->load->view("dev/berita/detail", $data);

    }


      /**
	 * DIP dengan filter kategori
	 * Fixed: CRITICAL SQL Injection vulnerability!
	 * Added: Input validation dan sanitization
	 */
	public function dip()
    {
		  $ambilkategori = $this->input->post('kategori', TRUE); // XSS clean
          $data['kategori'] = $ambilkategori;

          if ($ambilkategori != '' ) {
              // Fixed: Gunakan query builder yang aman
              // Sanitize input
              $kategori_clean = $this->db->escape_str($ambilkategori);

              $data['dokumen'] = $this->db->select('id_dokumen, judul, kategori, tanggal, image, deskripsi')
                                          ->where('kategori', $kategori_clean)
                                          ->get('dokumen')
                                          ->result();
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


      /**
	 * Informasi Berkala
	 * Fixed: SQL injection
	 */
	public function infoberkala()
    {
		$data['berkala'] = $this->db->select('id_dokumen as id, judul, kategori, tanggal, image, deskripsi, pejabat, pjinformasi, bentukinfo, jangkawaktu, sumberdata')
		                            ->where('kategori', 'Berkala')
		                            ->get('dokumen')
		                            ->result();
        $this->load->view("dev/infoberkala", $data);
    }

      /**
	 * Informasi Serta Merta
	 * Fixed: SQL injection
	 */
	public function infosertamerta()
    {
        $data['sertamerta'] = $this->db->select('id_dokumen as id, judul, kategori, tanggal, image, deskripsi, pejabat, pjinformasi, bentukinfo, jangkawaktu, sumberdata')
                                       ->where('kategori', 'Serta Merta')
                                       ->get('dokumen')
                                       ->result();
        $this->load->view("dev/infosertamerta", $data);
    }

	/**
	 * Informasi Setiap Saat
	 * Fixed: SQL injection
	 */
	public function infosetiapsaat()
    {
        $data['setiapsaat'] = $this->db->select('id_dokumen as id, judul, kategori, tanggal, image, deskripsi, pejabat, pjinformasi, bentukinfo, jangkawaktu, sumberdata')
                                       ->where('kategori', 'Setiap Saat')
                                       ->get('dokumen')
                                       ->result();
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
	
	/**
	 * List semua permohonan
	 * Fixed: SQL injection, select specific columns
	 */
	public function listpermohonan()
	{
		$data['permohonan'] = $this->db->select('mohon_id, nama, alamat, email, nohp, tanggal, status')
		                               ->order_by('mohon_id', 'DESC')
		                               ->get('permohonan')
		                               ->result();

		$this->load->view('dev/listpemohon',$data);
	}

}