<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Statkec extends CI_Controller
{
    public function __construct()
    {
        
        parent::__construct();
         if($this->session->userdata('status') != "login"){
      redirect(base_url("index.php/login"));
    }
        $this->load->helper('url');
        $this->load->model("statkec/pendidikan_model");
        $this->load->model("statkec/agama_model");
        $this->load->model("statkec/pekerjaan_model");
        $this->load->library('form_validation');
    }


       public function index()
    {
  
        $this->load->view("admin/overview.php");
    }
    public function index_pendidikan()
    {
        $data["statkec"] = $this->pendidikan_model->getAll();
        $this->load->view("admin/statkec/pendidikan/list", $data);
    }

    public function add_pendidikan()
    {
        $berita = $this->pendidikan_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/statkec/pendidikan/new_form");
    }

    public function edit_pendidikan($id = null)
    {
        if (!isset($id)) redirect('admin/statkec');
       
        $berita = $this->pendidikan_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["statkec"] = $berita->getById($id);
        if (!$data["statkec"]) show_404();
        
        $this->load->view("admin/statkec/pendidikan/edit_form", $data);
    }

    public function delete_pendidikan($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pendidikan_model->delete($id)) {
            redirect(site_url('admin/statkec/index_pendidikan'));
        }
    }

    function grafik_pendidikan(){
        
        $x['data']=$this->pendidikan_model->get_data_stok();
        $this->load->view('admin/statkec/pendidikan/grafik',$x);
    }

// ----bidang agama----


 public function index_agama()
    {
        $data["statkec"] = $this->agama_model->getAll();
        $this->load->view("admin/statkec/agama/list", $data);
    }

    public function add_agama()
    {
        $berita = $this->agama_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/statkec/agama/new_form");
    }

    public function edit_agama($id = null)
    {
        if (!isset($id)) redirect('admin/statkec');
       
        $berita = $this->agama_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["statkec"] = $berita->getById($id);
        if (!$data["statkec"]) show_404();
        
        $this->load->view("admin/statkec/agama/edit_form", $data);
    }

    public function delete_agama($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->agama_model->delete($id)) {
            redirect(site_url('admin/statkec/index_agama'));
        }
    }

    function grafik_agama(){
        
        $x['data']=$this->agama_model->get_data_stok();
        $this->load->view('admin/statkec/agama/grafik',$x);
    }


// ----bidang pendidikan----


 public function index_pekerjaan()
    {
        $data["statkec"] = $this->pekerjaan_model->getAll();
        $this->load->view("admin/statkec/pekerjaan/list", $data);
    }

    public function add_pekerjaan()
    {
        $berita = $this->pekerjaan_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/statkec/pekerjaan/new_form");
    }

    public function edit_pekerjaan($id = null)
    {
        if (!isset($id)) redirect('admin/statkec');
       
        $berita = $this->pekerjaan_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["statkec"] = $berita->getById($id);
        if (!$data["statkec"]) show_404();
        
        $this->load->view("admin/statkec/pekerjaan/edit_form", $data);
    }

    public function delete_pekerjaan($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pekerjaan_model->delete($id)) {
            redirect(site_url('admin/statkec/index_pekerjaan'));
        }
    }

    function grafik_pekerjaan(){
        
        $x['data']=$this->pekerjaan_model->get_data_stok();
        $this->load->view('admin/statkec/pekerjaan/grafik',$x);
    }


}
