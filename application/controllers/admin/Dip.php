<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dip extends CI_Controller
{
    public function __construct()
    {
        
        parent::__construct();
         if($this->session->userdata('status') != "login"){
      redirect(base_url("index.php/login"));
    }
        $this->load->helper('url');
        $this->load->model("dokumen_model");
        $this->load->library('form_validation');
    }


     
    public function index()
    {
		$data['nama_user'] = $this->session->userdata("nama");
        $data['id'] = $this->session->userdata("id");
		$id = $this->session->userdata("id");
		$data['status'] = $this->session->userdata("status");
		if ($id != '0'){
			$data["dokumen"] = $this->db->query("SELECT * FROM dokumen WHERE id_skpd = '$id'")->result();
		
		}else{
			$data["dokumen"] = $this->dokumen_model->getAll();
		}
		$data['id'] = $id;
        $this->load->view("dev/admin/dip/view", $data);
    }

    public function add()
    {
		$data['nama_user'] = $this->session->userdata("nama");
        $dokumen = $this->dokumen_model;
        $validation = $this->form_validation;
        $validation->set_rules($dokumen->rules());

        if ($validation->run()) {
            $dokumen->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("dev/admin/dip/add", $data);
    }

    public function edit($id = null)
    {
         if (!isset($id)) redirect('admin/dip');

       
         $dokumen = $this->dokumen_model;
         $validation = $this->form_validation;
         $validation->set_rules($dokumen->rules());

         if ($validation->run()) {
             $dokumen->update();
             $this->session->set_flashdata('success', 'Berhasil disimpan');
         }
         $data['nama_user'] = $this->session->userdata("nama");
         $data["dokumen"] = $dokumen->getById($id);
         if (!$data["dokumen"]) show_404();
       
         $this->load->view("dev/admin/dip/edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->dokumen_model->delete($id)) {
            redirect(site_url('admin/dokumen'));
        }
    }


	public function download($id){
    	$this->load->helper('download');
    	$fileinfo = $this->dokumen_model->download($id);
    	$file = 'upload/dokumen/'.$fileinfo['image'];
    	force_download($file, NULL);
	}
	
	public function testadd(){
		$this->load->view("dev/admin/dip/add");

	}
    public function test(){
		$this->load->view("dev/admin/dip/edit");

	}

}
