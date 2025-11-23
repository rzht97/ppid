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
        $this->load->model("audit_model");  // ADDED: Audit logging
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
                // AUDIT LOG: Catat penambahan dokumen DIP
                $new_data = array(
                    'judul' => $this->input->post('judul'),
                    'kategori' => $this->input->post('kategori')
                );
                $this->audit_model->log_create('dokumen', $result, $new_data, 'Menambahkan dokumen DIP baru');

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
             // Get old data before update
             $old_data = $dokumen->getById($id);

             $result = $dokumen->update();

             if($result) {
                 // AUDIT LOG: Catat perubahan dokumen DIP
                 $new_data = array(
                     'judul' => $this->input->post('judul'),
                     'kategori' => $this->input->post('kategori')
                 );
                 $this->audit_model->log_update('dokumen', $id, $old_data, $new_data, 'Update dokumen DIP');

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

        // Get data before delete for audit log
        $old_data = $this->dokumen_model->getById($id);

        if ($this->dokumen_model->delete($id)) {
            // AUDIT LOG: Catat penghapusan dokumen DIP
            $this->audit_model->log_delete('dokumen', $id, $old_data, 'Menghapus dokumen DIP');

            $this->session->set_flashdata('success', 'Informasi berhasil dihapus');
            $this->session->set_flashdata('success_target', 'admin/dip');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus informasi');
            $this->session->set_flashdata('error_target', 'admin/dip');
        }

        redirect(site_url('admin/dip'));
    }


	/**
	 * Download file dokumen dengan validasi keamanan
	 * SECURITY FIX: Added path traversal protection
	 */
	public function download($id){
		$this->load->helper('download');

		// Validate ID is numeric
		if (!is_numeric($id)) {
			show_404();
			return;
		}

		// Get file info from database
		$fileinfo = $this->dokumen_model->download($id);

		// Check if file info exists
		if (!$fileinfo || !isset($fileinfo['image'])) {
			show_404();
			return;
		}

		// Sanitize filename (prevent directory traversal)
		$filename = basename($fileinfo['image']);
		$file_path = 'upload/dokumen/' . $filename;

		// Validate file exists
		if (!file_exists($file_path)) {
			show_404();
			return;
		}

		// Validate file is within allowed directory (prevent path traversal)
		$real_path = realpath($file_path);
		$allowed_dir = realpath('upload/dokumen/');

		if ($real_path === false || strpos($real_path, $allowed_dir) !== 0) {
			log_message('error', 'Path traversal attempt detected by admin: ' . $file_path);
			show_404();
			return;
		}

		// All checks passed, download file
		force_download($file_path, NULL);
	}
	
	public function testadd(){
		$this->load->view("dev/admin/dip/add");

	}
    public function test(){
		$this->load->view("dev/admin/dip/edit");

	}

}
