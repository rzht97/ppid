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


	public function permohonan()
    {
		
        $permohonan = $this->Permohonan_model;
        $validation = $this->form_validation;
        $validation->set_rules($permohonan->rules());
		
        if ($validation->run()) {
            $permohonan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
			
			// Load helper telegram
        	$this->load->helper('telegram'); 
			
			// Kirim notifikasi Telegram
        	$nama = $this->input->post('nama');
			$pekerjaan = $this->input->post('pekerjaan');
			$nohp = $this->input->post('nohp');
			$rincian = $this->input->post('rincian');
			$tujuan = $this->input->post('tujuan');
			$id = substr($permohonan->mohon_id, 0, 11);
			$pesan = "NOTIFIKASI\nAda Permohonan Informasi dari
			\nNama: {$nama} \nPekerjaan: {$pekerjaan}\nNo HP: {$nohp} \nPermohonan Informasi: {$rincian} \nTujuan: {$tujuan} \n\nMohon cek dan segera proses!";
			send_telegram($pesan);
				

			redirect(base_url("index.php/pub/permohonan/detail/".substr($permohonan->mohon_id,0,11), $data));
        }

        $this->load->view("dev/permohonan/form");
    }
	
	public function detail($mohon_id = null)
    {
	   if (!isset($mohon_id)) redirect('pub/permohonan');
       $permohonan = $this->Permohonan_model;
       $data["permohonan"] = $permohonan->getById($mohon_id);
       $this->load->view("dev/permohonan/detail", $data);
    }
	
	/* public function caripermohonan()
	{
		$token = $this->input->post('token');
		$permohonan = $this->Permohonan_model;
		$data['caritoken'] = $this->db->query("SELECT * FROM permohonan WHERE mohon_id = '$token'")->result();
		//$data['caritoken'] = $permohonan->getById($data['token']);
		$this->load->view("dev/permohonan/cari",$data);
	} */
	
	public function caripermohonan()
	{
    	$token = $this->input->post('token', TRUE);
    	$data['caritoken'] = $this->db
        	->where('mohon_id', $token)
        	->get('permohonan')
        	->result();

    	$this->load->view("dev/permohonan/cari", $data);
	}


}