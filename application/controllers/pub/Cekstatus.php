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
     * Cek status permohonan ATAU keberatan berdasarkan ID
     * Search di kedua tabel (permohonan DAN keberatan)
     * Type indicator untuk membedakan hasil
     */
    public function index()
    {
        $token = $this->input->post('token', TRUE); // XSS clean

        // Initialize empty results
        $data['caritoken'] = array();
        $data['carikeberatan'] = array();

        if (!empty($token)) {
            // Search di tabel PERMOHONAN
            $permohonan_result = $this->db
                ->select('mohon_id, nama, alamat, nohp, email, rincian, tujuan, tanggal, status, jawab, tanggaljawab')
                ->where('mohon_id', $token)
                ->get('permohonan')
                ->result();

            if ($permohonan_result) {
                // Add type indicator
                foreach ($permohonan_result as $item) {
                    $item->search_type = 'permohonan';
                }
                $data['caritoken'] = $permohonan_result;
            }

            // Search di tabel KEBERATAN
            $keberatan_result = $this->db
                ->select('keberatan.id_keberatan, keberatan.mohon_id, keberatan.alasan, keberatan.kronologi,
                          keberatan.tanggal, keberatan.status, keberatan.tanggapan, keberatan.putusan,
                          permohonan.nama, permohonan.alamat, permohonan.nohp, permohonan.email')
                ->from('keberatan')
                ->join('permohonan', 'permohonan.mohon_id = keberatan.mohon_id', 'left')
                ->where('keberatan.id_keberatan', $token)
                ->or_where('keberatan.mohon_id', $token)
                ->get()
                ->result();

            if ($keberatan_result) {
                // Add type indicator
                foreach ($keberatan_result as $item) {
                    $item->search_type = 'keberatan';
                }
                $data['carikeberatan'] = $keberatan_result;
            }
        }

        $this->load->view("dev/cekstatus/index", $data);
    }
}
