
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


    /**
     * Tampilkan daftar permohonan
     * Fixed: SQL injection, optimized query, added specific columns
     */
    public function index()
    {
		$data['nama_user'] = $this->session->userdata("nama");
        // Fixed: Gunakan query builder, select specific columns (including ktp)
        $data["permohonan"] = $this->db->select('mohon_id, nama, alamat, pekerjaan, nohp, email, rincian, ktp, status, tanggal, tanggaljawab')
            ->from('permohonan')
            ->order_by('mohon_id', 'DESC')
            ->get()
            ->result();
        $this->load->view("dev/admin/permohonanv2/view2", $data);
    }

    /**
     * Verifikasi permohonan
     * Fixed: SQL injection menggunakan query builder
     * Added: Input validation
     */
    public function verifikasi($mohon_id = null)
    {
        if (!isset($mohon_id)) redirect('admin/permohonan');

        // Sanitize input
        $mohon_id = $this->db->escape_str($mohon_id);

        // Fixed: Gunakan query builder yang aman
        $this->db->where('mohon_id', $mohon_id)
                 ->update('permohonan', array('status' => 'Sedang Diproses'));

        $this->session->set_flashdata('success', 'Permohonan berhasil diverifikasi');
		redirect(site_url('admin/permohonan'));
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
			redirect(site_url('admin/permohonan'));
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
            $result = $permohonan->save();

            if($result) {
                $this->session->set_flashdata('success', 'Permohonan berhasil ditambahkan');
                redirect(site_url('admin/permohonan'));
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan data permohonan');
            }
        }

        $this->load->view("dev/admin/permohonanv2/add", $data);
    }
	
	public function edit($id = null)
    {
         if (!isset($id)) redirect('admin/permohonan');


         $permohonan = $this->permohonan_model;
         $validation = $this->form_validation;

         // Use edit_rules() instead of rules() - only validates status and jawab
         $validation->set_rules($permohonan->edit_rules());

         if ($validation->run()) {
             $result = $permohonan->update();

             if($result) {
                 $this->session->set_flashdata('success', 'Permohonan berhasil diproses dan disimpan');
             } else {
                 $this->session->set_flashdata('error', 'Gagal menyimpan perubahan');
             }

             // Redirect to list page after successful update
             redirect(site_url('admin/permohonan'));
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
