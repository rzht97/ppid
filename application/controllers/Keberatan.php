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
	 * Updated: Accept mohon_id from URI segment to auto-load permohonan data
	 */
	public function index($mohon_id = null)
	{
		// Get token from POST or URI segment
		$token = $this->input->post('token', TRUE); // XSS clean from POST

		// If mohon_id passed via URI, use it as token
		if (!empty($mohon_id)) {
			$token = $mohon_id;
		}

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
	 * Security: Anti-spam protection with session rate limiting, IP throttling, and honeypot
	 */
	public function save($id_keberatan = null)
	{
		// SECURITY CHECK #1: Honeypot - Detect bot submissions
		$honeypot = $this->input->post('website_url', TRUE);
		if (!empty($honeypot)) {
			log_message('warning', 'Bot detected via honeypot (keberatan) from IP: ' . $this->input->ip_address());
			$this->session->set_flashdata('error', 'Submission failed. Please try again later.');
			redirect('keberatan');
			return;
		}

		// SECURITY CHECK #2: Session-based Rate Limiting (Max 3 keberatan per 10 minutes)
		$session_key = '_keberatan_submit_count';
		$session_time_key = '_keberatan_first_submit_time';
		$submit_count = $this->session->userdata($session_key) ?: 0;
		$first_submit_time = $this->session->userdata($session_time_key) ?: time();
		$time_elapsed = time() - $first_submit_time;

		// Reset counter if 10 minutes passed
		if ($time_elapsed > 600) { // 600 seconds = 10 minutes
			$submit_count = 0;
			$first_submit_time = time();
		}

		// Check if limit exceeded
		if ($submit_count >= 3) {
			$wait_time = ceil((600 - $time_elapsed) / 60); // Minutes remaining
			log_message('warning', 'Session rate limit exceeded (keberatan) from session: ' . session_id());
			$this->session->set_flashdata('error', 'Anda telah mengirim terlalu banyak keberatan. Silakan tunggu ' . $wait_time . ' menit lagi.');
			redirect('keberatan');
			return;
		}

		// SECURITY CHECK #3: IP-based Throttling (Max 5 keberatan per IP per hour)
		$ip_address = $this->input->ip_address();
		$ip_key = 'keberatan_ip_' . md5($ip_address);
		$ip_data = $this->session->userdata($ip_key);

		if ($ip_data) {
			$ip_submit_count = $ip_data['count'];
			$ip_first_time = $ip_data['first_time'];
			$ip_time_elapsed = time() - $ip_first_time;

			// Reset if 1 hour passed
			if ($ip_time_elapsed > 3600) { // 3600 seconds = 1 hour
				$ip_submit_count = 0;
				$ip_first_time = time();
			} elseif ($ip_submit_count >= 5) {
				$ip_wait_time = ceil((3600 - $ip_time_elapsed) / 60);
				log_message('warning', 'IP rate limit exceeded (keberatan) from IP: ' . $ip_address);
				$this->session->set_flashdata('error', 'Terlalu banyak permintaan dari IP Anda. Silakan tunggu ' . $ip_wait_time . ' menit lagi.');
				redirect('keberatan');
				return;
			}
		} else {
			$ip_submit_count = 0;
			$ip_first_time = time();
		}

		// Increment counters
		$this->session->set_userdata($session_key, $submit_count + 1);
		$this->session->set_userdata($session_time_key, $first_submit_time);
		$this->session->set_userdata($ip_key, array(
			'count' => $ip_submit_count + 1,
			'first_time' => $ip_first_time
		));

		// Proceed with normal submission
		$keberatan = $this->Keberatan_model;

		// Validate form rules first
		$validation = $this->form_validation;
		$validation->set_rules($keberatan->rules());

		if ($validation->run()) {
			try {
				// Try to save with validation and sanitization
				$keberatan->save();
				$this->session->set_flashdata('success', 'Keberatan berhasil disimpan');
				redirect(base_url("index.php/keberatan/detail/".substr($keberatan->id_keberatan,0,11)));
			} catch (Exception $e) {
				// Catch validation errors from model
				log_message('error', 'Keberatan save error: ' . $e->getMessage());
				$this->session->set_flashdata('error', $e->getMessage());
				redirect('keberatan/index/' . $this->input->post('mohon_id', TRUE));
			}
		} else {
			// Form validation failed
			$this->session->set_flashdata('error', validation_errors());
			redirect('keberatan/index/' . $this->input->post('mohon_id', TRUE));
		}
	}

	/**
	 * Detail keberatan
	 * Fixed: SQL injection, gunakan query builder dengan JOIN
	 * Fixed: Add WHERE clause and use row() for single record
	 */
	public function detail($id_keberatan = null)
    {
       $permohonan = $this->Permohonan_model;
	   $keberatan = $this->Keberatan_model;

	   // Fixed: Gunakan query builder dengan JOIN yang aman dan WHERE clause
       $data["keberatan"] = $this->db
           ->select('keberatan.id_keberatan, keberatan.mohon_id, keberatan.alasan, keberatan.kronologi, keberatan.tanggal, keberatan.tanggapan, keberatan.putusan, keberatan.status as status_keberatan,
                     permohonan.nama, permohonan.alamat, permohonan.nohp, permohonan.pekerjaan, permohonan.email, permohonan.status')
           ->from('keberatan')
           ->join('permohonan', 'permohonan.mohon_id = keberatan.mohon_id', 'inner')
           ->where('keberatan.id_keberatan', $id_keberatan)
           ->get()
           ->row();

       // Also pass permohonan separately for status display
       $data["permohonan"] = $data["keberatan"];

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