<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        
        parent::__construct();
         if($this->session->userdata('status') != "login"){
      redirect(base_url("index.php/login"));
    }
        $this->load->helper('url');
        $this->load->model("regis_model");

        $this->load->model("user_model");

        $this->load->library('form_validation');
    }


     
    public function index()
    {
		$data['nama_user'] = $this->session->userdata("nama");
        //$data["berita"] = $this->berita_model->getAll();
        $this->load->view("admin/berita/list", $data);
    }
     public function tempuser()
    {
		$data['nama_user'] = $this->session->userdata("nama");
        $data["user"] = $this->regis_model->getAll();
        $this->load->view("dev/admin/tempuser/view", $data);
    }

     public function user()
    {
		$data['nama_user'] = $this->session->userdata("nama");
        $data["user"] = $this->user_model->getAll();
        $this->load->view("dev/admin/user/view", $data);
    }

    public function edit($id = null)
    {
		$data['nama_user'] = $this->session->userdata("nama");
        if (!isset($id)) redirect('admin/user/tempuser');
       
        $berita = $this->user_model;
        $data["berita"] = $berita->getById($id);
        if (!$data["berita"]) show_404();
        
        $this->load->view("admin/tempuser/edit_form", $data);
    }

      public function detail($id = null)
    {
		$data['nama_user'] = $this->session->userdata("nama");
        if (!isset($id)) redirect('admin/user/user');
       
        $berita = $this->user_model;
        $data["berita"] = $berita->getByIdu($id);
        if (!$data["berita"]) show_404();
        
        $this->load->view("dev/admin/user/detail", $data);
    }



    public function update()
    {
        $data['nama_user'] = $this->session->userdata("nama");
        $berita = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

      $data["user"] = $this->regis_model->getAll();
    $this->load->view("admin/tempuser/list2", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->user_model->delete($id)) {
            redirect(site_url('admin/user/user'));
        }
    }

public function download($id){
    $this->load->helper('download');
    $fileinfo = $this->berita_model->download($id);
    $file = 'upload/product/'.$fileinfo['image'];
    force_download($file, NULL);
}
    

}
