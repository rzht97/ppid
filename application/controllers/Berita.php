<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[AllowDynamicProperties]  // PHP 8.2 compatibility
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

        // Ambil detail berita dari API list, lalu filter by slug
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
            $data['error'] = "cURL Error: " . $error_msg;
            $this->load->view('dev/berita/detail', $data);
            return;
        }

        curl_close($curl);
        $result = json_decode($response, true);

        log_message('debug', 'API Detail Response: ' . print_r($result, true));

        if (isset($result['status']) && $result['status'] === 200 && isset($result['news'])) {
            // Cari berita berdasarkan slug
            $found = null;
            foreach ($result['news'] as $item) {
                if (isset($item['title_slug']) && $item['title_slug'] === $title_slug) {
                    $found = $item;
                    break;
                }
            }
            if ($found) {
                $data['news'] = $found;
            } else {
                $data['error'] = 'Berita tidak ditemukan.';
            }
        } else {
            $data['error'] = 'Maaf, detail berita tidak dapat ditampilkan. Silakan coba beberapa saat lagi.';
        }

        $this->load->view('dev/berita/detail', $data);
    }
}
