<?php

defined('BASEPATH') OR exit('No direct script access allowed');

#[AllowDynamicProperties]  // PHP 8.2 compatibility
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


    /**
	 * Daftar DIP berdasarkan SKPD user
	 * Fixed: SQL injection vulnerability
	 */
    public function index()
    {
		$data['nama_user'] = $this->session->userdata("nama");
        $data['id'] = $this->session->userdata("id");
		$id = $this->session->userdata("id");
		$data['status'] = $this->session->userdata("status");

		if ($id != '0'){
			// Fixed: Gunakan query builder yang aman
			$data["dokumen"] = $this->db
			    ->select('id_dokumen, judul, kategori, tanggal, image, deskripsi, id_skpd')
			    ->where('id_skpd', $id)
			    ->order_by('tanggal', 'DESC')
			    ->get('dokumen')
			    ->result();
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
            $result = $dokumen->save();

            if($result) {
                $this->session->set_flashdata('success', 'Informasi berhasil ditambahkan');
                $this->session->set_flashdata('success_target', 'admin/dip');
                redirect(site_url('admin/dip'));
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan informasi');
                $this->session->set_flashdata('error_target', 'admin/dip');
            }
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
             $result = $dokumen->update();

             if($result) {
                 $this->session->set_flashdata('success', 'Informasi berhasil diperbarui');
                 $this->session->set_flashdata('success_target', 'admin/dip');
             } else {
                 $this->session->set_flashdata('error', 'Gagal memperbarui informasi');
                 $this->session->set_flashdata('error_target', 'admin/dip');
             }

             // Redirect to list page after successful update
             redirect(site_url('admin/dip'));
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
            $this->session->set_flashdata('success', 'Informasi berhasil dihapus');
            $this->session->set_flashdata('success_target', 'admin/dip');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus informasi');
            $this->session->set_flashdata('error_target', 'admin/dip');
        }

        redirect(site_url('admin/dip'));
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
