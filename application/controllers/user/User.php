<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        
        parent::__construct();
         if($this->session->userdata('status') != "loginuser"){
      redirect(base_url("index.php/publik/login"));
    }
        $this->load->helper('url');
        $this->load->model("m_loginuser");
        $this->load->library('form_validation');
    }


     
    public function index()

    {
     
        $data["admin"] = $this->m_login->getAll();
        $this->load->view("user/user/list", $data);
    }



    public function edit($id = null)
    {
        $id =$this->session->userdata("nama");
        if (!isset($id)) redirect('user/user');
       
        $berita = $this->m_loginuser;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["berita"] = $berita->getById($id);
        if (!$data["berita"]) show_404();
        
        $this->load->view("user/user/edit_form", $data);
    }
}