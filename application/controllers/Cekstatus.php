<?php

class Cekstatus extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load models if needed
        $this->load->model("Permohonan_model");
        $this->load->library('form_validation');
    }

    /**
     * Cek status permohonan berdasarkan ID
     * Search hanya di tabel permohonan
     * Updated: Tambahkan validasi dan sanitasi input
     */
    public function index()
    {
        $token = $this->input->post('token', TRUE); // XSS clean

        // Initialize empty results
        $data['caritoken'] = array();
        $data['error'] = null;

        if (!empty($token)) {
            // Sanitize: remove whitespace and convert to uppercase P
            $token = strtoupper(trim($token));

            // Validate format: P + 9 digits (total 10 chars)
            // Format: P + DDMMYY + 3 digit increment (e.g., P221124001)
            if (!preg_match('/^P\d{9}$/', $token)) {
                $data['error'] = 'Format ID Permohonan tidak valid. Format yang benar: P221124001 (P diikuti 9 angka)';
                $this->load->view("dev/cekstatus/index", $data);
                return;
            }

            // Additional sanitization: ensure only alphanumeric (already validated by regex, but extra safety)
            $token = preg_replace('/[^A-Z0-9]/', '', $token);
            // Search di tabel PERMOHONAN
            $permohonan_result = $this->db
                ->select('mohon_id, nama, alamat, nohp, email, rincian, tujuan, tanggal, status, jawab, tanggaljawab')
                ->where('mohon_id', $token)
                ->get('permohonan')
                ->result();

            if ($permohonan_result) {
                // Add type indicator and check if permohonan has keberatan
                foreach ($permohonan_result as $item) {
                    $item->search_type = 'permohonan';

                    // Check if this permohonan already has keberatan
                    $keberatan_check = $this->db
                        ->where('mohon_id', $item->mohon_id)
                        ->get('keberatan')
                        ->row();

                    $item->has_keberatan = ($keberatan_check !== null);

                    // If has keberatan, get the keberatan data
                    if ($item->has_keberatan) {
                        $item->keberatan_data = $this->db
                            ->select('id_keberatan, mohon_id, alasan, kronologi, tanggal, status, tanggapan, putusan')
                            ->where('mohon_id', $item->mohon_id)
                            ->get('keberatan')
                            ->row();
                    }
                }
                $data['caritoken'] = $permohonan_result;
            }
        }

        $this->load->view("dev/cekstatus/index", $data);
    }
}
