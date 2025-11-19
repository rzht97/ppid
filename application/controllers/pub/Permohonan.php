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
	 * Updated: Better error handling and debugging
	 */
	public function permohonan()
    {
        $permohonan = $this->Permohonan_model;
        $validation = $this->form_validation;
        $validation->set_rules($permohonan->rules());

        if ($validation->run()) {
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
                $this->session->set_flashdata('success', 'Permohonan berhasil disimpan dengan ID: ' . $mohon_id . ' | Database: ' . $this->db->database);

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
                redirect(base_url("index.php/pub/permohonan/detail/".substr($mohon_id, 0, 11)));

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