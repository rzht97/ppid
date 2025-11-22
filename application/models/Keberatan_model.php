<?php defined('BASEPATH') OR exit('No direct script access allowed');

#[AllowDynamicProperties]  // PHP 8.2 compatibility
class Keberatan_model extends CI_Model
{
    private $_table = "keberatan";

   
    public $mohon_id;
    public $id_keberatan;
	public $kronologi;
	public $alasan;
	public $tanggal;
	public $tanggapan;
	public $putusan;
	 

    public function rules()
    {
        return [
            ['field' => 'mohon_id',
             'label' => 'ID Permohonan',
             'rules' => 'required|min_length[10]|max_length[10]|regex_match[/^P\d{9}$/]'],

            ['field' => 'alasan',
             'label' => 'Alasan Keberatan',
             'rules' => 'required|in_list[Permohonan Informasi Publik Ditolak,Informasi Berkala Tidak Disediakan,Permohonan Informasi Tidak Ditanggapi,Permohonan Informasi Tidak Ditanggapi Sebagaimana Diminta,Permintaan Informasi Tidak Dipenuhi,Biaya yang Dikenakan Tidak Wajar,Informasi disampaikan Melebihi Jangka Waktu yang Ditentukan]'],

            ['field' => 'kronologi',
             'label' => 'Kronologi/Uraian Keberatan',
             'rules' => 'required|min_length[20]|max_length[2000]|regex_match[/^[a-zA-Z0-9\s\.,\?\!\:\;\(\)\/\-\'\"\n\r]+$/]'],
        ];

    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();

        // return $this->db->get_where($this->_table, ["judul" => "tes"])->result();
    }

public function getById($id_keberatan)
    {
        return $this->db->get_where($this->_table, ["id_keberatan" => $id_keberatan])->row();
    }

public function save()
    {
        $post = $this->input->post();

        // ===== VALIDASI & SANITASI mohon_id =====

        // Step 1: Sanitasi - bersihkan input
        $mohon_id = strtoupper(trim($post["mohon_id"]));
        $mohon_id = preg_replace('/[^A-Z0-9]/', '', $mohon_id);

        // Step 2: Format validation - regex
        if (!preg_match('/^P\d{9}$/', $mohon_id)) {
            throw new Exception('Format ID Permohonan tidak valid. Harus P diikuti 9 angka.');
        }

        // Step 3: Database validation - cek apakah mohon_id exist di tabel permohonan
        $permohonan = $this->db->get_where('permohonan', ['mohon_id' => $mohon_id])->row();
        if (!$permohonan) {
            throw new Exception('ID Permohonan tidak ditemukan di sistem. Pastikan Anda menggunakan ID yang benar.');
        }

        // Step 4: Database validation - cek apakah sudah ada keberatan untuk mohon_id ini
        $existing_keberatan = $this->db->get_where($this->_table, ['mohon_id' => $mohon_id])->num_rows();
        if ($existing_keberatan > 0) {
            throw new Exception('Permohonan ini sudah memiliki keberatan yang diajukan sebelumnya. Satu permohonan hanya bisa memiliki satu keberatan.');
        }


        // ===== VALIDASI & SANITASI alasan =====

        // Sanitasi
        $alasan = strip_tags(trim($post["alasan"]));

        // Whitelist validation (sudah ada di rules(), tapi double check untuk keamanan)
        $valid_alasan = [
            'Permohonan Informasi Publik Ditolak',
            'Informasi Berkala Tidak Disediakan',
            'Permohonan Informasi Tidak Ditanggapi',
            'Permohonan Informasi Tidak Ditanggapi Sebagaimana Diminta',
            'Permintaan Informasi Tidak Dipenuhi',
            'Biaya yang Dikenakan Tidak Wajar',
            'Informasi disampaikan Melebihi Jangka Waktu yang Ditentukan'
        ];

        if (!in_array($alasan, $valid_alasan)) {
            throw new Exception('Alasan keberatan tidak valid. Silakan pilih dari opsi yang tersedia.');
        }


        // ===== VALIDASI & SANITASI kronologi =====

        // Step 1: Sanitasi - strip HTML tags
        $kronologi = strip_tags(trim($post["kronologi"]));

        // Step 2: Character encoding validation - ensure UTF-8
        if (!mb_check_encoding($kronologi, 'UTF-8')) {
            $kronologi = mb_convert_encoding($kronologi, 'UTF-8', 'auto');
            log_message('info', 'Konversi encoding kronologi ke UTF-8 untuk mohon_id: ' . $mohon_id);
        }

        // Step 3: Remove non-printable characters (kecuali \n \r \t)
        // \x00-\x08: control chars sebelum tab
        // \x0B-\x0C: vertical tab dan form feed
        // \x0E-\x1F: control chars setelah carriage return
        // \x7F: delete character
        $kronologi = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $kronologi);

        // Step 4: Normalize line breaks - convert \r\n dan \r ke \n
        $kronologi = str_replace(["\r\n", "\r"], "\n", $kronologi);

        // Step 5: Length validation
        if (strlen($kronologi) < 20) {
            throw new Exception('Kronologi terlalu pendek. Minimal 20 karakter.');
        }
        if (strlen($kronologi) > 2000) {
            throw new Exception('Kronologi terlalu panjang. Maksimal 2000 karakter.');
        }

        // Generate unique id_keberatan with retry mechanism for race conditions
        $max_retries = 10;
        $retry_count = 0;
        $unique_id_found = false;
        $use_fallback = false;

        while (!$unique_id_found && $retry_count < $max_retries) {
            // Generate ID with format: K + DDMMYY + auto increment (001, 002, ...)
            // After 5 retries, add random component for development/high-load scenarios
            if ($retry_count >= 5) {
                $use_fallback = true;
                $this->id_keberatan = $this->_generateIdKeberatanWithFallback();
            } else {
                $this->id_keberatan = $this->_generateIdKeberatan();
            }

            // Check if ID already exists
            $existing = $this->db->get_where($this->_table, ['id_keberatan' => $this->id_keberatan])->num_rows();

            if ($existing == 0) {
                $unique_id_found = true;
                log_message('debug', 'Unique id_keberatan generated: ' . $this->id_keberatan . ($use_fallback ? ' (using fallback)' : ''));
            } else {
                $retry_count++;
                log_message('debug', 'Duplicate id_keberatan detected: ' . $this->id_keberatan . ', retry #' . $retry_count);
                // Increase delay with each retry (exponential backoff)
                usleep(10000 * $retry_count); // 10ms, 20ms, 30ms, etc.
            }
        }

        if (!$unique_id_found) {
            // Last resort: generate with microsecond timestamp
            $this->id_keberatan = $this->_generateIdKeberatanWithTimestamp();
            $existing = $this->db->get_where($this->_table, ['id_keberatan' => $this->id_keberatan])->num_rows();

            if ($existing > 0) {
                throw new Exception('Gagal generate id_keberatan unik setelah ' . $max_retries . ' percobaan. Silakan coba lagi dalam beberapa detik.');
            }

            log_message('info', 'Used timestamp fallback for id_keberatan: ' . $this->id_keberatan);
        }

        // Set sanitized values
        $this->mohon_id = $mohon_id;
		$this->kronologi = $kronologi;
		$this->alasan = $alasan;
		$this->status = "Menunggu Verifikasi";
		$this->tanggal = date('Y-m-d H:i:s'); // Current datetime
		// tanggapan and putusan will be NULL by default (set when answered)

        $this->db->insert($this->_table, $this);
    }

    public function verifikasi()
    {
        $post = $this->input->post();
        $this->id_keberatan = $post["id_keberatan"];
		$this->status = 'Sedang Diproses';
        $this->db->update($this->_table, $this, array('id_keberatan' => $post['id_keberatan']));
    }
	
	public function jawab()
    {
        $post = $this->input->post();
        $this->id_keberatan = $post["id_keberatan"];
		$this->status = $post["status"];
		$this->tanggapan = $post["tanggapan"];
		$this->putusan = $post["putusan"];
        $this->db->update($this->_table, $this, array('id_keberatan' => $post['id_keberatan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_keberatan" => $id));
	}

	/**
	 * Generate id_keberatan with format: K + DDMMYY + auto increment
	 * Auto increment starts from 001 and resets daily
	 * Example: K191125001, K191125002, ... (resets to K201125001 next day)
	 * Prefix K = Keberatan (to differentiate from Permohonan which uses P)
	 */
	private function _generateIdKeberatan()
	{
		$today_prefix = 'K' . date('dmy'); // Format: K + DDMMYY (e.g., K191125)

		// Get the last id_keberatan for today
		$this->db->select('id_keberatan');
		$this->db->like('id_keberatan', $today_prefix, 'after'); // id_keberatan starts with today's prefix
		$this->db->order_by('id_keberatan', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get($this->_table);

		if ($query->num_rows() > 0) {
			// Found existing record for today
			$last_id = $query->row()->id_keberatan;
			// Extract the increment part (last 3 digits)
			$last_increment = intval(substr($last_id, -3));
			$new_increment = $last_increment + 1;
		} else {
			// No records for today, start with 001
			$new_increment = 1;
		}

		// Format: K + DDMMYY + increment padded to 3 digits
		// Example: K + 191125 + 001 = K191125001
		return $today_prefix . str_pad($new_increment, 3, '0', STR_PAD_LEFT);
	}

	/**
	 * Generate id_keberatan with random component (fallback for high contention)
	 * Format: K + DDMMYY + (count + random 2 digits)
	 * Example: K191125523 (where 523 = count 5 + random 23)
	 */
	private function _generateIdKeberatanWithFallback()
	{
		$today_prefix = 'K' . date('dmy');

		// Get count of records for today
		$this->db->like('id_keberatan', $today_prefix, 'after');
		$count = $this->db->count_all_results($this->_table);

		// Add random 2 digits to reduce collision in development
		$random_suffix = str_pad(mt_rand(0, 99), 2, '0', STR_PAD_LEFT);

		// Increment count to get next number
		$increment = $count + 1;

		// Format: K + DDMMYY + (single digit count) + (2 random digits)
		// Example: K191125123 where 1=count, 23=random
		return $today_prefix . substr($increment, -1) . $random_suffix;
	}

	/**
	 * Generate id_keberatan with microsecond timestamp (last resort)
	 * Format: K + DDMMYY + (last 3 digits of microtime)
	 * Example: K191125847 (where 847 from microsecond timestamp)
	 */
	private function _generateIdKeberatanWithTimestamp()
	{
		$today_prefix = 'K' . date('dmy');

		// Get microsecond component
		list($usec, $sec) = explode(" ", microtime());
		$usec_3digit = substr(str_replace('0.', '', $usec), 0, 3);

		// Format: K + DDMMYY + last 3 digits of microsecond
		return $today_prefix . $usec_3digit;
	}
}
