<?php

class PublicPermohonan extends CI_Controller {
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
	 * Updated: Better error handling and debugging
	 * Security: Anti-spam protection with session rate limiting, IP throttling, and honeypot
	 */
	public function permohonan()
    {
        $permohonan = $this->Permohonan_model;
        $validation = $this->form_validation;
        $validation->set_rules($permohonan->rules());

        if ($validation->run()) {
            // SECURITY CHECK #1: Honeypot - Detect bot submissions
            $honeypot = $this->input->post('website_url', TRUE);
            if (!empty($honeypot)) {
                log_message('warning', 'Bot detected via honeypot from IP: ' . $this->input->ip_address());
                $this->session->set_flashdata('error', 'Submission failed. Please try again later.');
                redirect('publicpermohonan/permohonan');
                return;
            }

            // SECURITY CHECK #2: Session-based Rate Limiting (Max 3 submissions per 10 minutes)
            $session_key = '_permohonan_submit_count';
            $session_time_key = '_permohonan_first_submit_time';
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
                log_message('warning', 'Session rate limit exceeded from session: ' . session_id());
                $this->session->set_flashdata('error', 'Anda telah mengirim terlalu banyak permohonan. Silakan tunggu ' . $wait_time . ' menit lagi.');
                redirect('publicpermohonan/permohonan');
                return;
            }

            // SECURITY CHECK #3: IP-based Throttling (Max 5 submissions per IP per hour)
            $ip_address = $this->input->ip_address();
            $ip_key = 'permohonan_ip_' . md5($ip_address);
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
                    log_message('warning', 'IP rate limit exceeded from IP: ' . $ip_address);
                    $this->session->set_flashdata('error', 'Terlalu banyak permintaan dari IP Anda. Silakan tunggu ' . $ip_wait_time . ' menit lagi.');
                    redirect('publicpermohonan/permohonan');
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
            try {
                // Save permohonan
                $permohonan->save();

                // Get the inserted ID
                $mohon_id = $permohonan->mohon_id;

                // VERIFY: Check if data really exists in database
                $verify = $this->db->get_where('permohonan', ['mohon_id' => $mohon_id])->row();

                if(!$verify){
                    log_message('error', 'CRITICAL: Insert succeeded but data not found! ID: ' . $mohon_id);
                    throw new Exception('Data tidak ditemukan setelah insert! Mohon hubungi administrator.');
                }

                log_message('debug', 'VERIFICATION SUCCESS: Data found in database with ID: ' . $mohon_id);
                log_message('debug', 'Verified data: ' . json_encode($verify));

                // Set success message
                $this->session->set_flashdata('success', 'Permohonan Anda berhasil dikirim! Nomor permohonan: <strong>' . $mohon_id . '</strong>. Silakan catat nomor ini untuk melacak status permohonan Anda.');

                // Load helper telegram (if exists)
                if(file_exists(APPPATH.'helpers/telegram_helper.php')){
                    $this->load->helper('telegram');

                    // Kirim notifikasi Telegram
                    $nama = $this->input->post('nama', TRUE);
                    $pekerjaan = $this->input->post('pekerjaan', TRUE);
                    $nohp = $this->input->post('nohp', TRUE);
                    $rincian = $this->input->post('rincian', TRUE);
                    $tujuan = $this->input->post('tujuan', TRUE);

                    $pesan = "NOTIFIKASI\nAda Permohonan Informasi Baru\n\n";
                    $pesan .= "ID: {$mohon_id}\n";
                    $pesan .= "Nama: {$nama}\n";
                    $pesan .= "Pekerjaan: {$pekerjaan}\n";
                    $pesan .= "No HP: {$nohp}\n";
                    $pesan .= "Rincian: {$rincian}\n";
                    $pesan .= "Tujuan: {$tujuan}\n\n";
                    $pesan .= "Mohon cek dan segera proses!";

                    // Send telegram (suppress errors)
                    @send_telegram($pesan);
                }

                // Redirect to detail page
                redirect(base_url("index.php/publicpermohonan/detail/".substr($mohon_id, 0, 11)));

            } catch(Exception $e) {
                // Log error
                log_message('error', 'Failed to save permohonan: ' . $e->getMessage());

                // Set error message directly (not flashdata, because we're not redirecting)
                $data['error_message'] = 'Gagal menyimpan permohonan: ' . $e->getMessage();
                $this->load->view("dev/permohonan/form", $data);
                return;
            }
        } else {
            // Validation failed - show form with errors
            // Don't use flashdata here since we're loading view directly, not redirecting
            $data = array();
            if(validation_errors()){
                $data['error_message'] = 'Mohon lengkapi semua field yang wajib diisi dengan benar.';
            }
            $this->load->view("dev/permohonan/form", $data);
            return;
        }

        // Default: load empty form (first time page is accessed)
        $this->load->view("dev/permohonan/form");
    }

	/**
	 * Detail permohonan
	 * Added: Input sanitization
	 */
	public function detail($mohon_id = null)
    {
	   if (!isset($mohon_id)) redirect('publicpermohonan');

	   // Sanitize input
	   $mohon_id = $this->db->escape_str($mohon_id);

       $permohonan = $this->Permohonan_model;
       $data["permohonan"] = $permohonan->getById($mohon_id);
       if (!$data["permohonan"]) show_404();

       $this->load->view("dev/permohonan/detail", $data);
    }

	/**
	 * DEPRECATED: Redirect ke pub/cekstatus
	 * Method lama untuk backward compatibility
	 */
	public function caripermohonan()
	{
		// Redirect ke controller baru
		redirect('cekstatus');
	}


}