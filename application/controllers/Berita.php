<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load API configuration
        $this->load->config('api');
    }

    public function index()
    {
        // PERFORMANCE: Cache news data for 5 minutes to reduce API calls
        $this->load->driver('cache', array('adapter' => 'file'));
        $cache_key = 'news_list_data';
        $news = $this->cache->get($cache_key);

        if (!$news) {
            // Cache miss - fetch from API
            $news = $this->get_news();
            // Cache for 300 seconds (5 minutes)
            $this->cache->save($cache_key, $news, 300);
        }

        $data['news'] = $news;
        $data['news2'] = $news;

        // Ambil hanya 3 berita untuk sidebar
        if (isset($data['news2']) && is_array($data['news2']) && !isset($data['news2']['error'])) {
            $data['news2'] = array_slice($data['news2'], 0, 3);
        }

        $this->load->view('dev/berita/berita2', $data);
    }

    private function get_news()
    {
        // SECURITY: Get API config from config file (not hardcoded)
        $api_config = $this->config->item('news_api');
        $api_url = $api_config['url'];
        $api_key = $api_config['key'];
        $timeout = $api_config['timeout'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'X-API-KEY: ' . $api_key
            ),
            // SECURITY: SSL verification enabled (default, explicitly set for clarity)
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
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
        // SECURITY: Validate and sanitize slug parameter
        if (empty($title_slug)) {
            redirect('berita');
        }

        // Sanitize: allow only alphanumeric, dash, and underscore
        $title_slug = preg_replace('/[^a-z0-9\-_]/i', '', $title_slug);

        // Validate length (reasonable slug length)
        if (strlen($title_slug) < 3 || strlen($title_slug) > 200) {
            show_404();
        }

        // PERFORMANCE: Use cache for sidebar news
        $this->load->driver('cache', array('adapter' => 'file'));
        $cache_key = 'news_list_data';
        $news_data = $this->cache->get($cache_key);

        if (!$news_data) {
            $news_data = $this->get_news();
            $this->cache->save($cache_key, $news_data, 300);
        }

        // Ambil berita populer untuk sidebar
        $data['news2'] = $news_data;
        if (isset($data['news2']) && is_array($data['news2']) && !isset($data['news2']['error'])) {
            $data['news2'] = array_slice($data['news2'], 0, 3);
        }

        // SECURITY: Get API config from config file (not hardcoded)
        $api_config = $this->config->item('news_api');

        // Ambil detail berita dari API list, lalu filter by slug
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_config['url'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => $api_config['timeout'],
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'X-API-KEY: ' . $api_config['key']
            ),
            // SECURITY: SSL verification enabled
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
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
