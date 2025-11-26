<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Profil Controller
 * Menampilkan halaman profil PPID
 */
class Profil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Halaman Maklumat Pelayanan
     */
    public function maklumat()
    {
        $this->load->view("dev/profil/maklumat");
    }

    /**
     * Halaman Uraian Tugas
     */
    public function urtug()
    {
        $this->load->view("dev/profil/urtug");
    }

    /**
     * Halaman Visi Misi Kabupaten
     */
    public function visimisikab()
    {
        $this->load->view("dev/profil/visimisikab");
    }

    /**
     * Halaman Struktur Organisasi
     */
    public function strukturorg()
    {
        $this->load->view("dev/profil/strukturorg");
    }

    /**
     * Halaman Visi Misi PPID
     */
    public function visimisippid()
    {
        $this->load->view("dev/profil/visimisippid");
    }

    /**
     * Halaman Profil Pejabat Struktural
     */
    public function pejabat()
    {
        $this->load->view("dev/profil/pejabat");
    }

    /**
     * Halaman Tentang PPID
     */
    public function tentang()
    {
        $this->load->view("dev/profil/tentang");
    }
}