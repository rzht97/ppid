
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller
{
    public function __construct()
    {
        
        parent::__construct();
         if($this->session->userdata('status') != "login"){
      redirect(base_url("index.php/login"));
    }
        $this->load->helper('url');
        $this->load->model("permohonan_model");
        $this->load->library('form_validation');
    }


     
    public function index()
    {
		$data['nama_user'] = $this->session->userdata("nama");
        $data["permohonan"] = $this->db->query("SELECT * FROM permohonan ORDER BY DATE_FORMAT(STR_TO_DATE(tanggal,'%d-%m-%Y'), '%Y-%m-%d') DESC;")->result();
        $this->load->view("dev/admin/permohonanv2/view2", $data);
    }

    public function verifikasi($mohon_id = null)
    {
        if (!isset($mohon_id)) redirect('admin/info');
		$this->db->query("UPDATE permohonan SET status = 'Sedang Diproses' WHERE mohon_id = '$mohon_id' ");
		redirect(site_url(admin/permohonan));
    }
	
	public function jawab($mohon_id = null)
	{
		if (!isset($mohon_id)) redirect('admin/info');
       
        $permohonan = $this->permohonan_model;
        $validation = $this->form_validation;
        $validation->set_rules($permohonan->rules());

        if ($validation->run()) {
            $permohonan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url(admin/permohonan));
        }
        $data['nama_user'] = $this->session->userdata("nama");
        $data["permohonan"] = $permohonan->getById($mohon_id);
        if (!$data["permohonan"]) show_404();
	}
	
	public function add()
    {
		$data['nama_user'] = $this->session->userdata("nama");
        $permohonan = $this->permohonan_model;
        $validation = $this->form_validation;
        $validation->set_rules($permohonan->rules());

        if ($validation->run()) {
            $permohonan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("dev/admin/permohonanv2/add", $data);
    }
	
	public function edit($id = null)
    {
         if (!isset($id)) redirect('admin/permohonan');

       
         $permohonan = $this->permohonan_model;
         $validation = $this->form_validation;
         $validation->set_rules($permohonan->rules());

         if ($validation->run()) {
             $permohonan->update();
             $this->session->set_flashdata('success', 'Berhasil disimpan');
         }
         $data['nama_user'] = $this->session->userdata("nama");
         $data["permohonan"] = $permohonan->getById($id);
         if (!$data["permohonan"]) show_404();
       
         $this->load->view("dev/admin/permohonanv2/edit", $data);
    }
	
	public function detail($id = null)
	{
		if (!isset($id)) redirect('admin/permohonan');

       
         $permohonan = $this->permohonan_model;
         $data['nama_user'] = $this->session->userdata("nama");
         $data["permohonan"] = $permohonan->getById($id);
         if (!$data["permohonan"]) show_404();
       
         $this->load->view("dev/admin/permohonanv2/detail2", $data);
		//$this->load->view('dev/admin/permohonanv2/detail',$data);
	}
    

}
