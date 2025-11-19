<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Keberatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/login"));
        }
        $this->load->helper('url');
        $this->load->model("Keberatan_model");
        $this->load->model("Permohonan_model");
        $this->load->library('form_validation');
    }

    /**
     * Daftar keberatan
     */
    public function index()
    {
        $data['nama_user'] = $this->session->userdata("nama");

        // Get all keberatan with related permohonan data using JOIN
        $this->db->select('keberatan.*, permohonan.nama, permohonan.email, permohonan.nohp');
        $this->db->from('keberatan');
        $this->db->join('permohonan', 'keberatan.mohon_id = permohonan.mohon_id', 'left');
        $this->db->order_by('keberatan.id_keberatan', 'DESC');
        $data["keberatan"] = $this->db->get()->result();

        $this->load->view("dev/admin/keberatan/view", $data);
    }

    public function detail($id = null)
    {
        if (!isset($id)) redirect('admin/keberatan');

        $data['nama_user'] = $this->session->userdata("nama");

        // Get keberatan with permohonan data
        $this->db->select('keberatan.*, permohonan.*');
        $this->db->from('keberatan');
        $this->db->join('permohonan', 'keberatan.mohon_id = permohonan.mohon_id', 'left');
        $this->db->where('keberatan.id_keberatan', $id);
        $data["keberatan"] = $this->db->get()->row();

        if (!$data["keberatan"]) show_404();

        $this->load->view("dev/admin/keberatan/detail", $data);
    }

    public function verifikasi($id = null)
    {
        if (!isset($id)) redirect('admin/keberatan');

        $keberatan = $this->Keberatan_model;

        // Update status
        $this->db->where('id_keberatan', $id);
        $this->db->update('keberatan', array('status' => 'Sedang Diproses'));

        $this->session->set_flashdata('success', 'Keberatan berhasil diverifikasi');
        redirect(site_url('admin/keberatan'));
    }

    public function proses($id = null)
    {
        if (!isset($id)) redirect('admin/keberatan');

        $keberatan = $this->Keberatan_model;
        $validation = $this->form_validation;

        // Validation for processing
        $validation->set_rules('tanggapan', 'Tanggapan', 'required|min_length[10]');
        $validation->set_rules('putusan', 'Putusan', 'required');
        $validation->set_rules('status', 'Status', 'required|in_list[Diterima,Ditolak]');

        if ($validation->run()) {
            $post = $this->input->post();

            $data = array(
                'status' => $post['status'],
                'tanggapan' => $post['tanggapan'],
                'putusan' => $post['putusan'],
                'tanggal' => date('d-m-Y')
            );

            $result = $this->db->where('id_keberatan', $id)->update('keberatan', $data);

            if($result) {
                $this->session->set_flashdata('success', 'Keberatan berhasil diproses');
            } else {
                $this->session->set_flashdata('error', 'Gagal memproses keberatan');
            }

            redirect(site_url('admin/keberatan'));
        }

        // Get keberatan data
        $this->db->select('keberatan.*, permohonan.*');
        $this->db->from('keberatan');
        $this->db->join('permohonan', 'keberatan.mohon_id = permohonan.mohon_id', 'left');
        $this->db->where('keberatan.id_keberatan', $id);
        $data["keberatan"] = $this->db->get()->row();

        if (!$data["keberatan"]) show_404();

        $data['nama_user'] = $this->session->userdata("nama");
        $this->load->view("dev/admin/keberatan/proses", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if ($this->Keberatan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Keberatan berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus keberatan');
        }

        redirect(site_url('admin/keberatan'));
    }
}
