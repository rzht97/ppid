
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller
{
    public function __construct()
    {
        
        parent::__construct();
         if($this->session->userdata('status') != "loginuser"){
      redirect(base_url("index.php/publik/login"));
    }
        $this->load->helper('url');
        $this->load->model("informasi_model");
        $this->load->library('form_validation');
    }

     
    public function index()
    {
         $data["info"] = $this->informasi_model->getInformasi();
        $this->load->view("user/info/list", $data);
    }

     public function list()
    {
        $data["info"] = $this->informasi_model->getInformasi();
        $this->load->view("user/info/list", $data);
    }

    public function add()
    {
        $berita = $this->informasi_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->save();
            $this->session->set_flashdata('success', 'Berhasil diajukan');
        }

        $this->load->view("user/info/new_form");
    }

    public function detail($id = null)
    {
        if (!isset($id)) redirect('user/informasi/list');
       
        $berita = $this->informasi_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["berita"] = $berita->getById($id);
        if (!$data["berita"]) show_404();
        
        $this->load->view("user/info/detail", $data);
    }
    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->informasi_model->delete($id)) {
            redirect(site_url('user/informasi/list'));
        }
    }


public function download($id){
    $this->load->helper('download');
    $fileinfo = $this->berita_model->download($id);
    $file = 'upload/product/'.$fileinfo['image'];
    force_download($file, NULL);
}
    

}
