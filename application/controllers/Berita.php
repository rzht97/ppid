<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

  	public function index() {
    	$data['news'] = $this->get_news();
		$data['news2'] = $this->get_news();
		// Ambil hanya 3 berita
        if (isset($data['news2']) && is_array($data['news2'])) {
            $data['news2'] = array_slice($data['news2'], 0, 3); // Mengambil 3 berita pertama
        }

		
           $this->load->view('dev/berita/berita2', $data);
    }
    private function get_news() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sumedangkab.go.id/api/news',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'X-API-KEY: Sumedang#3211',
                'Cookie: sumedangkab_session=4e4nvaa13ntpahlsad1ihtuh5s9bou6i'
            ),
            CURLOPT_SSL_VERIFYPEER => false, // Nonaktifkan verifikasi SSL (hanya untuk pengujian)
        ));

        $response = curl_exec($curl);

        // Cek jika terjadi kesalahan
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            return ['error' => "cURL Error: " . $error_msg];
        }

        curl_close($curl);
        $result = json_decode($response, true); // Mengembalikan data dalam format array

        // Memeriksa status dan mengembalikan data berita
        if ($result['status'] === 200) {
            return $result['news']; // Mengembalikan array berita
        } else {
            return ['error' => $result['message']];
        }
    }
	
	    public function detail($title_slug) {
		$data['news'] = $this->get_news($title_slug);
		
		$data['news2'] = $this->get_news();
		// Ambil hanya 3 berita
        if (isset($data['news2']) && is_array($data['news2'])) {
            $data['news2'] = array_slice($data['news2'], 0, 3); // Mengambil 3 berita pertama
        }
			
			
		$curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sumedangkab.go.id/api/news/detail' . $title_slug,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'X-API-KEY: Sumedang#3211',
                'Cookie: sumedangkab_session=4e4nvaa13ntpahlsad1ihtuh5s9bou6i'
            ),
            CURLOPT_SSL_VERIFYPEER => false,
        ));
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            return ['error' => "cURL Error: " . $error_msg];
        }
        curl_close($curl);
        $result = json_decode($response, true);
        if ($result['status'] === 200) {
            $data['news'] = is_array($result['news']) ? $result['news'][0] : $result['news']; // Mengembalikan detail berita
            $this->load->view('dev/berita/detail', $data); // Menampilkan view detail
        } else {
            $data['error'] = $result['message'];
            $this->load->view('dev/berita/error', $data); // Menampilkan view error
        }
    }
}
?>
