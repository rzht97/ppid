
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller
{
    public function __construct()
    {
        
        parent::__construct();
         if($this->session->userdata('status') != "login"){
      redirect(base_url("index.php/login"));
    }
        $this->load->helper('url');
        $this->load->model("info_model");
        $this->load->library('form_validation');
    }


     
    public function index()
    {
		$data['nama_user'] = $this->session->userdata("nama");
        $data["berita"] = $this->info_model->getAll();
        $this->load->view("dev/admin/permohonan/view", $data);
    }

    public function add()
    {
		$data['nama_user'] = $this->session->userdata("nama");
        $berita = $this->berita_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/berita/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/info');
       
        $berita = $this->info_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data['nama_user'] = $this->session->userdata("nama");
        $data["berita"] = $berita->getById($id);
        if (!$data["berita"]) show_404();
        
        $this->load->view("dev/admin/permohonan/edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->info_model->delete($id)) {
            redirect(site_url('admin/info'));
        }
    }


public function download($id){
    $this->load->helper('download');
    $fileinfo = $this->info_model->download($id);
    $file = 'upload/pengajuan/'.$fileinfo['image'];
    force_download($file, NULL);
}
    

}
