<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	/**
	 * Homepage dengan statistik permohonan
	 * Menggunakan query builder untuk keamanan
	 */
	public function index()
	{
		// Optimized: Gabung jadi 1 query dengan agregasi
		$stats = $this->db->select('
			COUNT(*) as total,
			SUM(CASE WHEN status = "Ditolak" THEN 1 ELSE 0 END) as ditolak,
			SUM(CASE WHEN status = "Selesai" THEN 1 ELSE 0 END) as selesai
		')
		->from('permohonan')
		->get()
		->row();

		$data['ditolak'] = array((object)array('total' => $stats->ditolak));
		$data['jml'] = array((object)array('total' => $stats->total));
		$data['selesai'] = array((object)array('total' => $stats->selesai));

        // load view admin/overview.php
        $this->load->view("dev/index2", $data);
	}
}
