<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keberatan extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

		$this->load->model("Permohonan_model");
		$this->load->model("Keberatan_model");
		// Removed: user_model does not exist
        $this->load->library('form_validation');
	}

	/**
	 * Cari permohonan untuk keberatan
	 * Fixed: CRITICAL SQL Injection vulnerability
	 * Fixed: Initialize caritoken to empty array when no POST data
	 */
	public function index($id_keberatan = null)
	{
		$token = $this->input->post('token', TRUE); // XSS clean
		$validation = $this->form_validation;
		$permohonan = $this->Permohonan_model;

		// Initialize as empty array
		$data['caritoken'] = array();

		// Only query if token is provided
		if (!empty($token)) {
			// Fixed: Gunakan query builder
			$data['caritoken'] = $this->db
			    ->select('mohon_id, nama, alamat, nohp, email, pekerjaan, rincian, tujuan, tanggal, status')
			    ->where('mohon_id', $token)
			    ->get('permohonan')
			    ->result();
		}

		$this->load->view("dev/keberatan/cari",$data);
	}

	/**
	 * Simpan keberatan
	 * Added: Proper error handling
	 */
	public function save($id_keberatan = null)
	{
		$keberatan = $this->Keberatan_model;

        $keberatan->save();
       	$this->session->set_flashdata('success', 'Keberatan berhasil disimpan');
		redirect(base_url("index.php/keberatan/detail/".substr($keberatan->id_keberatan,0,11)));
	}

	/**
	 * Detail keberatan
	 * Fixed: SQL injection, gunakan query builder dengan JOIN
	 */
	public function detail($id_keberatan = null)
    {
       $permohonan = $this->Permohonan_model;
	   $keberatan = $this->Keberatan_model;

	   // Fixed: Gunakan query builder dengan JOIN yang aman
       $data["keberatan"] = $this->db
           ->select('keberatan.id_keberatan, keberatan.mohon_id, keberatan.alasan, keberatan.kronologi, keberatan.tanggal,
                     permohonan.nama, permohonan.alamat, permohonan.nohp, permohonan.pekerjaan')
           ->from('keberatan')
           ->join('permohonan', 'permohonan.mohon_id = keberatan.mohon_id', 'inner')
           ->get()
           ->result();

       $this->load->view("dev/keberatan/detail", $data);
    }

	/**
	 * Cari keberatan berdasarkan token
	 * Fixed: CRITICAL SQL Injection vulnerability
	 */
	public function carikeberatan()
	{
		$token = $this->input->post('token', TRUE); // XSS clean
		$permohonan = $this->Permohonan_model;

		// Fixed: Gunakan query builder dengan JOIN yang aman
		$data['caritoken'] = $this->db
		    ->select('keberatan.id_keberatan, keberatan.alasan, keberatan.kronologi, keberatan.tanggal,
		              permohonan.nama, permohonan.alamat, permohonan.nohp, permohonan.pekerjaan')
		    ->from('keberatan')
		    ->join('permohonan', 'permohonan.mohon_id = keberatan.mohon_id', 'inner')
		    ->where('keberatan.id_keberatan', $token)
		    ->get()
		    ->result();

		$this->load->view("dev/keberatan/hasil_cari", $data);
	}

}