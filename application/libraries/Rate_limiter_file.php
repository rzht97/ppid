<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * File-Based Rate Limiter Library
 *
 * Mencegah brute-force dengan tracking per-IP menggunakan file storage.
 * Lebih aman dari session-based karena tidak bisa di-bypass dengan clear cookies.
 *
 * Features:
 * - Track by IP address (not session)
 * - Cannot be bypassed by clearing cookies
 * - Auto-cleanup expired files
 * - No Redis/Memcached required
 * - Perfect for single server, low traffic
 *
 * Use cases:
 * - Admin login brute-force protection
 * - Form submission rate limiting
 * - Download rate limiting
 *
 * @author Claude (Anthropic AI)
 * @created 2025-11-23
 * @version 2.0 (File-based)
 * @security-rating HIGH
 */
class Rate_limiter_file
{
    protected $CI;
    protected $cache_dir;

    public function __construct()
    {
        $this->CI =& get_instance();

        // Cache directory untuk menyimpan rate limit files
        $this->cache_dir = APPPATH . 'cache/rate_limits/';

        // Buat folder jika belum ada
        if (!is_dir($this->cache_dir)) {
            mkdir($this->cache_dir, 0755, true);

            // Protect dengan .htaccess
            $htaccess = $this->cache_dir . '.htaccess';
            if (!file_exists($htaccess)) {
                file_put_contents($htaccess, "Deny from all\n");
            }
        }

        // Auto-cleanup expired files (1% chance setiap request)
        if (mt_rand(1, 100) === 1) {
            $this->cleanup_expired();
        }
    }

    /**
     * Check apakah IP sudah exceed rate limit
     *
     * @param string $action Nama action (e.g., 'login', 'submit_permohonan')
     * @param int $max_attempts Maksimal attempts dalam time window
     * @param int $time_window Time window dalam detik (default 900 = 15 menit)
     * @return array ['allowed' => bool, 'remaining' => int, 'reset_at' => timestamp]
     */
    public function check($action, $max_attempts = 5, $time_window = 900)
    {
        $ip = $this->CI->input->ip_address();
        $file_path = $this->get_file_path($action, $ip);

        $current_time = time();
        $rate_data = $this->read_file($file_path);

        // Jika belum ada data atau sudah expired, reset
        if (!$rate_data || $rate_data['reset_at'] < $current_time) {
            $rate_data = array(
                'attempts' => 0,
                'first_attempt' => $current_time,
                'reset_at' => $current_time + $time_window,
                'ip' => $ip,
                'action' => $action
            );
        }

        // Hitung remaining attempts
        $remaining = max(0, $max_attempts - $rate_data['attempts']);

        // Check apakah masih allowed
        $allowed = $rate_data['attempts'] < $max_attempts;

        return array(
            'allowed' => $allowed,
            'remaining' => $remaining,
            'attempts' => $rate_data['attempts'],
            'reset_at' => $rate_data['reset_at'],
            'wait_time' => $allowed ? 0 : ($rate_data['reset_at'] - $current_time)
        );
    }

    /**
     * Increment attempt counter
     *
     * @param string $action Nama action
     * @param int $time_window Time window dalam detik
     * @return int Current attempt count
     */
    public function increment($action, $time_window = 900)
    {
        $ip = $this->CI->input->ip_address();
        $file_path = $this->get_file_path($action, $ip);

        $current_time = time();
        $rate_data = $this->read_file($file_path);

        // Jika belum ada atau expired, buat baru
        if (!$rate_data || $rate_data['reset_at'] < $current_time) {
            $rate_data = array(
                'attempts' => 1,
                'first_attempt' => $current_time,
                'reset_at' => $current_time + $time_window,
                'ip' => $ip,
                'action' => $action
            );
        } else {
            $rate_data['attempts']++;
            $rate_data['last_attempt'] = $current_time;
        }

        // Save to file
        $this->write_file($file_path, $rate_data);

        // Log untuk audit
        log_message('info', sprintf(
            'Rate limit increment: %s from IP %s - Attempt %d/%d (Reset: %s)',
            $action,
            $ip,
            $rate_data['attempts'],
            5, // default max
            date('Y-m-d H:i:s', $rate_data['reset_at'])
        ));

        return $rate_data['attempts'];
    }

    /**
     * Reset rate limit untuk IP tertentu
     *
     * @param string $action Nama action
     * @param string $ip IP address (optional, default current IP)
     */
    public function reset($action, $ip = null)
    {
        $ip = $ip ?: $this->CI->input->ip_address();
        $file_path = $this->get_file_path($action, $ip);

        if (file_exists($file_path)) {
            unlink($file_path);
            log_message('info', "Rate limit reset: {$action} for IP {$ip}");
        }
    }

    /**
     * Enforce rate limit - show error jika exceeded
     *
     * @param string $action Nama action
     * @param int $max_attempts Maksimal attempts
     * @param int $time_window Time window dalam detik
     * @return bool TRUE jika allowed
     */
    public function enforce($action, $max_attempts = 5, $time_window = 900)
    {
        $check = $this->check($action, $max_attempts, $time_window);

        if (!$check['allowed']) {
            $wait_minutes = ceil($check['wait_time'] / 60);

            // Log security event
            log_message('warning', sprintf(
                'SECURITY: Rate limit exceeded - %s from IP %s (%d attempts)',
                $action,
                $this->CI->input->ip_address(),
                $check['attempts']
            ));

            // Set flashdata error
            $this->CI->session->set_flashdata('error',
                "Terlalu banyak percobaan dari IP Anda. Silakan coba lagi dalam {$wait_minutes} menit."
            );

            return false;
        }

        return true;
    }

    /**
     * Get file path untuk rate limit data
     *
     * @param string $action Action name
     * @param string $ip IP address
     * @return string File path
     */
    protected function get_file_path($action, $ip)
    {
        // Hash IP untuk privacy dan filename safety
        $ip_hash = md5($ip);
        $action_safe = preg_replace('/[^a-z0-9_-]/i', '_', $action);

        return $this->cache_dir . $action_safe . '_' . $ip_hash . '.json';
    }

    /**
     * Read rate limit data dari file
     *
     * @param string $file_path File path
     * @return array|null Rate data atau null jika tidak ada
     */
    protected function read_file($file_path)
    {
        if (!file_exists($file_path)) {
            return null;
        }

        $content = @file_get_contents($file_path);
        if ($content === false) {
            return null;
        }

        $data = json_decode($content, true);
        return is_array($data) ? $data : null;
    }

    /**
     * Write rate limit data ke file
     *
     * @param string $file_path File path
     * @param array $data Rate data
     * @return bool Success status
     */
    protected function write_file($file_path, $data)
    {
        $json = json_encode($data, JSON_PRETTY_PRINT);
        $result = @file_put_contents($file_path, $json, LOCK_EX);

        if ($result === false) {
            log_message('error', 'Failed to write rate limit file: ' . $file_path);
            return false;
        }

        // Set permission
        @chmod($file_path, 0644);

        return true;
    }

    /**
     * Cleanup expired files (untuk maintenance)
     * Dipanggil secara random untuk menghindari overhead
     */
    protected function cleanup_expired()
    {
        $current_time = time();
        $files = glob($this->cache_dir . '*.json');
        $deleted = 0;

        foreach ($files as $file) {
            $data = $this->read_file($file);

            // Hapus jika expired atau corrupt
            if (!$data || (isset($data['reset_at']) && $data['reset_at'] < $current_time)) {
                if (@unlink($file)) {
                    $deleted++;
                }
            }
        }

        if ($deleted > 0) {
            log_message('info', "Rate limiter: Cleaned up {$deleted} expired files");
        }
    }

    /**
     * Get statistics untuk monitoring
     *
     * @return array Statistics
     */
    public function get_stats()
    {
        $files = glob($this->cache_dir . '*.json');
        $current_time = time();

        $stats = array(
            'total_files' => count($files),
            'active_blocks' => 0,
            'expired_files' => 0
        );

        foreach ($files as $file) {
            $data = $this->read_file($file);
            if ($data) {
                if ($data['reset_at'] > $current_time) {
                    $stats['active_blocks']++;
                } else {
                    $stats['expired_files']++;
                }
            }
        }

        return $stats;
    }
}
