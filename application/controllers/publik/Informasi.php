
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        
        parent::__construct();
         if($this->session->userdata('status') != "login"){
      redirect(base_url("index.php/login"));
    }
        $this->load->helper('url');
        $this->load->model("berita_model");
        $this->load->library('form_validation');
    }


     
    public function index()
    {
        $data["berita"] = $this->berita_model->getAll();
        $this->load->view("admin/berita/list", $data);
    }

    public function add()
    {
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
        if (!isset($id)) redirect('admin/berita');
       
        $berita = $this->berita_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["berita"] = $berita->getById($id);
        if (!$data["berita"]) show_404();
        
        $this->load->view("admin/berita/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->berita_model->delete($id)) {
            redirect(site_url('admin/berita'));
        }
    }


public function download($id){
    $this->load->helper('download');
    $fileinfo = $this->berita_model->download($id);
    $file = 'upload/product/'.$fileinfo['image'];
    force_download($file, NULL);
}
    

}
