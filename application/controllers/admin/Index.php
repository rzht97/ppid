<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
    if($this->session->userdata('status') != "login"){
      redirect(base_url("index.php/login"));
    }

		$this->load->helper('url');
        $this->load->model("permohonan_model");
        $this->load->model("keberatan_model");
        $this->load->library('form_validation');
	}

	public function index()
	{

        $data['nama_user'] = $this->session->userdata("nama");

        // Ambil semua data
        $all_permohonan = $this->permohonan_model->getAll();
        $all_keberatan = $this->keberatan_model->getAll();

        // Statistik Permohonan
        $data['total_permohonan'] = count($all_permohonan);
        $data['permohonan_verifikasi'] = count(array_filter($all_permohonan, function($p) { return $p->status == 'Menunggu Verifikasi'; }));
        $data['permohonan_proses'] = count(array_filter($all_permohonan, function($p) { return $p->status == 'Sedang Diproses'; }));
        $data['permohonan_selesai'] = count(array_filter($all_permohonan, function($p) { return $p->status == 'Selesai'; }));
        $data['permohonan_ditolak'] = count(array_filter($all_permohonan, function($p) { return $p->status == 'Ditolak'; }));

        // Statistik Keberatan
        $data['total_keberatan'] = count($all_keberatan);
        $data['keberatan_verifikasi'] = count(array_filter($all_keberatan, function($k) { return $k->status == 'Menunggu Verifikasi'; }));
        $data['keberatan_proses'] = count(array_filter($all_keberatan, function($k) { return $k->status == 'Sedang Diproses'; }));
        $data['keberatan_diterima'] = count(array_filter($all_keberatan, function($k) { return $k->status == 'Diterima'; }));
        $data['keberatan_ditolak'] = count(array_filter($all_keberatan, function($k) { return $k->status == 'Ditolak'; }));

        // Data terbaru (5 item terakhir dari masing-masing)
        $data['permohonan_terbaru'] = array_slice(array_reverse($all_permohonan), 0, 5);
        $data['keberatan_terbaru'] = array_slice(array_reverse($all_keberatan), 0, 5);

        // Load view dashboard
        $this->load->view("dev/admin/dashboard/index",$data);
	}




}
