<?php

class Keberatan extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

		$this->load->model("Permohonan_model");
		$this->load->model("Keberatan_model");
		$this->load->model("user_model");
        $this->load->library('form_validation');
	}

	public function index($id_keberatan = null)
	{
		$token = $this->input->post('token');
		$validation = $this->form_validation;
		$permohonan = $this->Permohonan_model;
		$data['caritoken'] = $this->db->query("SELECT * FROM permohonan WHERE mohon_id = '$token'")->result();
		
		$this->load->view("dev/keberatan/cari",$data);
	}
	
	public function save($id_keberatan = null)
	{
		$keberatan = $this->Keberatan_model;
	
            $keberatan->save();
           	$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(base_url("index.php/keberatan/detail/".substr($keberatan->id_keberatan,0,11), $data));
        
		//$data['caritoken'] = $permohonan->getById($data['token']);
	}
	
	public function detail($id_keberatan = null)
    {
       $permohonan = $this->Permohonan_model;
	   $keberatan = $this->Keberatan_model;
       $data["keberatan"] = $this->db->query("SELECT keberatan.id_keberatan, permohonan.nama, permohonan.alamat, permohonan.nohp, permohonan.pekerjaan, keberatan.alasan, keberatan.kronologi, keberatan.tanggal FROM permohonan INNER JOIN keberatan ON permohonan.mohon_id = keberatan.mohon_id")->result();
       $this->load->view("dev/keberatan/detail", $data);
    }
	
	public function carikeberatan()
	{
		$token = $this->input->post('token');
		$permohonan = $this->Permohonan_model;
		$data['caritoken'] = $this->db->query("SELECT keberatan.id_keberatan, permohonan.nama, permohonan.alamat, permohonan.nohp, permohonan.pekerjaan, keberatan.alasan, keberatan.kronologi, keberatan.tanggal FROM permohonan INNER JOIN keberatan ON permohonan.mohon_id = keberatan.mohon_id WHERE id_keberatan = '$token'")->result();
	}

}