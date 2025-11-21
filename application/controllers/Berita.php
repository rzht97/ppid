<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['news'] = $this->get_news();
        $data['news2'] = $this->get_news();

        // Ambil hanya 3 berita untuk sidebar
        if (isset($data['news2']) && is_array($data['news2']) && !isset($data['news2']['error'])) {
            $data['news2'] = array_slice($data['news2'], 0, 3);
        }

        $this->load->view('dev/berita/berita2', $data);
    }

    private function get_news()
    {
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
                'X-API-KEY: Sumedang#3211'
            ),
            CURLOPT_SSL_VERIFYPEER => false,
        ));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            curl_close($curl);
            return ['error' => "cURL Error: " . $error_msg];
        }

        curl_close($curl);
        $result = json_decode($response, true);

        if (isset($result['status']) && $result['status'] === 200) {
            return $result['news'];
        } else {
            $error_message = $result['message'] ?? 'Gagal mengambil data berita';
            log_message('error', 'API Berita Error: ' . $error_message);
            return ['error' => 'Maaf, data berita sementara tidak dapat ditampilkan. Silakan coba beberapa saat lagi.'];
        }
    }

    public function detail($title_slug = '')
    {
        if (empty($title_slug)) {
            redirect('berita');
        }

        // Ambil berita populer untuk sidebar
        $data['news2'] = $this->get_news();
        if (isset($data['news2']) && is_array($data['news2']) && !isset($data['news2']['error'])) {
            $data['news2'] = array_slice($data['news2'], 0, 3);
        }

        // Ambil detail berita
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sumedangkab.go.id/api/news/detail/' . $title_slug,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'X-API-KEY: Sumedang#3211'
            ),
            CURLOPT_SSL_VERIFYPEER => false,
        ));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            curl_close($curl);
            $data['error'] = "cURL Error: " . $error_msg;
            $this->load->view('dev/berita/detail', $data);
            return;
        }

        curl_close($curl);
        $result = json_decode($response, true);

        log_message('debug', 'API Detail Response: ' . print_r($result, true));

        if (isset($result['status']) && $result['status'] === 200 && isset($result['news'])) {
            // Handle both array and single object response
            if (isset($result['news'][0])) {
                $data['news'] = $result['news'][0];
            } else {
                $data['news'] = $result['news'];
            }
        } else {
            $error_message = $result['message'] ?? 'Berita tidak ditemukan';
            log_message('error', 'API Berita Detail Error: ' . $error_message . ' | Response: ' . print_r($result, true));
            $data['error'] = 'Maaf, detail berita tidak dapat ditampilkan. Silakan coba beberapa saat lagi.';
        }

        $this->load->view('dev/berita/detail', $data);
    }
}
