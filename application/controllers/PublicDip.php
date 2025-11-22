<?php

#[AllowDynamicProperties]  // PHP 8.2 compatibility
class PublicDip extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model("dokumen_model");
	}

	/**
	 * DIP Index
	 * Fixed: CRITICAL SQL Injection vulnerability
	 */
	public function index()
	{
        $ambilkategori = $this->input->post('kategori', TRUE); // XSS clean
        $data['kategori'] = $ambilkategori;

        if ($ambilkategori != '' ) {
            // Fixed: Gunakan query builder yang aman
            $kategori_clean = $this->db->escape_str($ambilkategori);
            $data['dokumen'] = $this->db->select('id_dokumen, judul, kategori, tanggal, image, deskripsi')
                                        ->where('kategori', $kategori_clean)
                                        ->get('dokumen')
                                        ->result();
        } else {
            $data['dokumen'] = $this->dokumen_model->getall();
        }
        $this->load->view("dev/DIP/dip", $data);
	}


    /**
	 * DIP dengan filter
	 * Fixed: CRITICAL SQL Injection vulnerability
	 */
    public function dip()
    {
		  $ambilkategori = $this->input->post('kategori', TRUE); // XSS clean
          $data['kategori'] = $ambilkategori;

          if ($ambilkategori != '' ) {
              // Fixed: Gunakan query builder yang aman
              $kategori_clean = $this->db->escape_str($ambilkategori);
              $data['dokumen'] = $this->db->select('id_dokumen, judul, kategori, tanggal, image, deskripsi')
                                          ->where('kategori', $kategori_clean)
                                          ->get('dokumen')
                                          ->result();
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