<?php

class Permohonan extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

		 $this->load->model("Permohonan_model");
		$this->load->model("informasi_model");
		//$this->load->model("user_model");
        $this->load->library('form_validation');
        $this->load->model("dokumen_model");
	}


	/**
	 * Form permohonan informasi
	 * Includes: Telegram notification integration
	 */
	public function permohonan()
    {
        $permohonan = $this->Permohonan_model;
        $validation = $this->form_validation;
        $validation->set_rules($permohonan->rules());

        if ($validation->run()) {
            $permohonan->save();
            $this->session->set_flashdata('success', 'Permohonan berhasil disimpan');

			// Load helper telegram
        	$this->load->helper('telegram');

			// Kirim notifikasi Telegram
        	$nama = $this->input->post('nama', TRUE);
			$pekerjaan = $this->input->post('pekerjaan', TRUE);
			$nohp = $this->input->post('nohp', TRUE);
			$rincian = $this->input->post('rincian', TRUE);
			$tujuan = $this->input->post('tujuan', TRUE);
			$id = substr($permohonan->mohon_id, 0, 11);
			$pesan = "NOTIFIKASI\nAda Permohonan Informasi dari
			\nNama: {$nama} \nPekerjaan: {$pekerjaan}\nNo HP: {$nohp} \nPermohonan Informasi: {$rincian} \nTujuan: {$tujuan} \n\nMohon cek dan segera proses!";
			send_telegram($pesan);

			redirect(base_url("index.php/pub/permohonan/detail/".substr($permohonan->mohon_id,0,11)));
        }

        $this->load->view("dev/permohonan/form");
    }

	/**
	 * Detail permohonan
	 * Added: Input sanitization
	 */
	public function detail($mohon_id = null)
    {
	   if (!isset($mohon_id)) redirect('pub/permohonan');

	   // Sanitize input
	   $mohon_id = $this->db->escape_str($mohon_id);

       $permohonan = $this->Permohonan_model;
       $data["permohonan"] = $permohonan->getById($mohon_id);
       if (!$data["permohonan"]) show_404();

       $this->load->view("dev/permohonan/detail", $data);
    }

	/**
	 * Cari permohonan berdasarkan token/ID
	 * Fixed: SQL injection vulnerability (already fixed)
	 * Added: Specific column selection
	 */
	public function caripermohonan()
	{
    	$token = $this->input->post('token', TRUE); // XSS clean

    	// Fixed: Query builder dengan select spesifik
    	$data['caritoken'] = $this->db
    	    ->select('mohon_id, nama, alamat, nohp, email, rincian, tujuan, tanggal, status, jawab, tanggaljawab')
        	->where('mohon_id', $token)
        	->get('permohonan')
        	->result();

    	$this->load->view("dev/permohonan/cari", $data);
	}


}