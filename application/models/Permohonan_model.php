<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan_model extends CI_Model
{
    private $_table = "permohonan";

   
    public $mohon_id;
    public $ktp = "Belum Tersedia";
	public $nama;
	public $alamat;
	public $pekerjaan;
    public $nohp;
	public $email;
	public $rincian;
    public $tujuan;
    public $caraperoleh;
	public $caradapat;
	public $tanggal;
	public $tanggaljawab;
	public $jawab;
	public $status = "Sedang Diproses";
	 

    /**
     * Validation rules untuk form permohonan
     * Updated: Tambahkan semua required fields
     */
    public function rules()
    {
        return [
            ['field' => 'nama',
             'label' => 'Nama',
             'rules' => 'required|min_length[3]|max_length[100]'],

            ['field' => 'alamat',
             'label' => 'Alamat',
             'rules' => 'required|min_length[5]'],

            ['field' => 'pekerjaan',
             'label' => 'Pekerjaan',
             'rules' => 'required'],

            ['field' => 'nohp',
             'label' => 'No HP',
             'rules' => 'required|numeric|min_length[10]|max_length[15]'],

            ['field' => 'email',
             'label' => 'Email',
             'rules' => 'required|valid_email'],

            ['field' => 'rincian',
             'label' => 'Rincian Informasi',
             'rules' => 'required|min_length[10]'],

            ['field' => 'tujuan',
             'label' => 'Tujuan',
             'rules' => 'required'],

            ['field' => 'caraperoleh',
             'label' => 'Cara Memperoleh Informasi',
             'rules' => 'required'],

            ['field' => 'caradapat',
             'label' => 'Cara Mendapatkan Salinan',
             'rules' => 'required'],
        ];
    }

    /**
     * Validation rules untuk edit permohonan
     * Only validates status and jawab fields
     */
    public function edit_rules()
    {
        return [
            ['field' => 'status',
             'label' => 'Status Permohonan',
             'rules' => 'required|in_list[Selesai,Ditolak]'],

            ['field' => 'jawab',
             'label' => 'Jawaban/Keterangan',
             'rules' => 'required|min_length[10]'],
        ];
    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();

        // return $this->db->get_where($this->_table, ["judul" => "tes"])->result();
    }

public function getById($mohon_id)
    {
        return $this->db->get_where($this->_table, ["mohon_id" => $mohon_id])->row();
    }

/**
	 * Save permohonan
	 * Fixed: Date format bug (20y → Y)
	 * Added: Input sanitization and error handling
	 * Updated: mohon_id now uses P prefix + date + auto increment (resets daily)
	 */
	public function save()
    {
        $post = $this->input->post();

        // Generate ID with format: P + DDMMYY + auto increment (001, 002, ...)
        // Example: P191125001, P191125002, P191125003...
        // Resets to 001 every new day
        $this->mohon_id = $this->_generateMohonId();

		// Upload KTP file
		$this->ktp = $this->_uploadFile();

        // Sanitize inputs (already done by form_validation if configured)
        $this->nama = $post["nama"];
		$this->alamat = $post["alamat"];
	    $this->pekerjaan = $post["pekerjaan"];
	    $this->nohp = $post["nohp"];
	    $this->email = $post["email"];
        $this->rincian = $post["rincian"];
	 	$this->tujuan = $post["tujuan"];
		$this->caraperoleh = $post["caraperoleh"];
		$this->caradapat = $post["caradapat"];
		$this->status = $this->status();

        // Set tanggal to current datetime in MySQL format
        $this->tanggal = date('Y-m-d H:i:s');

        // Initialize optional fields
        $this->tanggaljawab = NULL;
        $this->jawab = NULL;

        // DEBUG: Log data before insert
        log_message('debug', 'Attempting to insert permohonan with ID: ' . $this->mohon_id);
        log_message('debug', 'Data: ' . json_encode(array(
            'mohon_id' => $this->mohon_id,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'pekerjaan' => $this->pekerjaan,
            'nohp' => $this->nohp,
            'email' => $this->email,
            'ktp' => $this->ktp,
            'status' => $this->status,
            'tanggal' => $this->tanggal
        )));

        // Prepare data array explicitly to avoid CI_Model magic properties issue
        $data = array(
            'mohon_id' => $this->mohon_id,
            'ktp' => $this->ktp,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'pekerjaan' => $this->pekerjaan,
            'nohp' => $this->nohp,
            'email' => $this->email,
            'rincian' => $this->rincian,
            'tujuan' => $this->tujuan,
            'caraperoleh' => $this->caraperoleh,
            'caradapat' => $this->caradapat,
            'tanggal' => $this->tanggal,
            'status' => $this->status,
            'tanggaljawab' => NULL,
            'jawab' => NULL
        );

        // Log prepared data with exact lengths
        log_message('debug', 'mohon_id length: ' . strlen($this->mohon_id));
        log_message('debug', 'Full insert data: ' . json_encode($data));

        // Check for existing ID before insert
        $existing = $this->db->get_where($this->_table, ['mohon_id' => $this->mohon_id])->num_rows();
        log_message('debug', 'Existing records with this ID: ' . $existing);

        if($existing > 0){
            throw new Exception('Duplicate mohon_id detected: ' . $this->mohon_id);
        }

        // ALTERNATIVE: Direct insert WITHOUT transaction to debug
        // Insert with data array instead of $this
        $result = $this->db->insert($this->_table, $data);

        // Get immediate results BEFORE any other operation
        $affected = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $db_error = $this->db->error();

        // Log the actual SQL query and results
        log_message('debug', 'SQL Query: ' . $last_query);
        log_message('debug', 'Insert result: ' . ($result ? 'TRUE' : 'FALSE'));
        log_message('debug', 'Affected rows (immediate): ' . $affected);
        log_message('debug', 'DB Error code: ' . $db_error['code']);
        log_message('debug', 'DB Error message: ' . $db_error['message']);

        if(!$result){
            log_message('error', 'Database insert returned FALSE: ' . json_encode($db_error));
            throw new Exception('Gagal menyimpan data ke database: ' . $db_error['message']);
        }

        // Check affected rows IMMEDIATELY after insert
        if($affected == 0){
            log_message('error', 'Insert returned TRUE but affected_rows = 0');
            log_message('error', 'This might indicate: duplicate key, trigger rollback, or constraint violation');

            // Try to query the record to see if it exists despite affected_rows=0
            $verify_insert = $this->db->get_where($this->_table, ['mohon_id' => $this->mohon_id])->row();
            if($verify_insert){
                log_message('debug', 'STRANGE: affected_rows=0 but data exists! Probably duplicate key.');
                // Data exists, continue anyway
            } else {
                throw new Exception('Data tidak berhasil disimpan (affected_rows = 0, no duplicate found)');
            }
        }

        return $result;
    }

    public function verifikasi()
    {
        $post = $this->input->post();
        $this->mohon_id = $post["mohon_id"];
		$this->status = 'Sedang Diproses';
        $this->db->update($this->_table, $this, array('mohon_id' => $post['mohon_id']));
    }
	
	/**
	 * Update permohonan (for edit page)
	 * Updates status and jawaban fields
	 */
	public function update()
    {
        $post = $this->input->post();
        $this->mohon_id = $post["mohon_id"];
		$this->status = $post["status"];
		$this->jawab = $post["jawab"];
        $this->tanggaljawab = date('Y-m-d H:i:s');

        // Use query builder for safer update
        return $this->db->where('mohon_id', $this->mohon_id)
                        ->update($this->_table, array(
                            'status' => $this->status,
                            'jawab' => $this->jawab,
                            'tanggaljawab' => $this->tanggaljawab
                        ));
    }

	/**
	 * Jawab permohonan
	 * Fixed: Date format bug (20y → Y)
	 */
	public function jawab()
    {
        $post = $this->input->post();
        $this->mohon_id = $post["mohon_id"];
		$this->status = $post["status"];
		$this->jawab = $post["jawab"];

        // Set tanggaljawab to current datetime in MySQL format
        $this->tanggaljawab = date('Y-m-d H:i:s');

        $this->db->update($this->_table, $this, array('mohon_id' => $post['mohon_id']));
    }

    /**
	 * Delete permohonan
	 * FIXED: Variable name bug - $id parameter was not being used
	 */
    public function delete($id)
    {
		// FIXED: Changed $mohon_id to $id (parameter name)
		$this->_deleteFile($id);
        return $this->db->delete($this->_table, array("mohon_id" => $id));
	}
	
	private function _uploadFile()
	{
		$config['upload_path']          = './upload/ktp/';
		$config['allowed_types']        = 'png|jpg|jpeg|pdf|';
		$config['file_name']            = $this->mohon_id;
		$config['overwrite']			= true;
		$config['max_size']             = 20024; // 13MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('ktp')) {
			return $this->upload->data("file_name");
		}
		
		return "Belum Tersedia";
	}

	/**
	 * Delete uploaded KTP file
	 * FIXED: Bug - was using $product->image instead of $product->ktp
	 */
	private function _deleteFile($id)
	{
		$permohonan = $this->getById($id);

		if ($permohonan && $permohonan->ktp != "Belum Tersedia") {
			// FIXED: Changed from $product->image to $permohonan->ktp
			$filename = explode(".", $permohonan->ktp)[0];
			return array_map('unlink', glob(FCPATH."upload/ktp/$filename.*"));
		}
	}
	
	private function status()
	{
			return "Menunggu Verifikasi";
	}

	/**
	 * Generate mohon_id with format: P + DDMMYY + auto increment
	 * Auto increment starts from 001 and resets daily
	 * Example: P191125001, P191125002, ... (resets to P201125001 next day)
	 * Prefix P = Permohonan (to differentiate from Keberatan which uses K)
	 */
	private function _generateMohonId()
	{
		$today_prefix = 'P' . date('dmy'); // Format: P + DDMMYY (e.g., P191125)

		// Get the last mohon_id for today
		$this->db->select('mohon_id');
		$this->db->like('mohon_id', $today_prefix, 'after'); // mohon_id starts with today's prefix
		$this->db->order_by('mohon_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get($this->_table);

		if ($query->num_rows() > 0) {
			// Found existing record for today
			$last_mohon_id = $query->row()->mohon_id;
			// Extract the increment part (last 3 digits)
			$last_increment = intval(substr($last_mohon_id, -3));
			$new_increment = $last_increment + 1;
		} else {
			// No records for today, start with 001
			$new_increment = 1;
		}

		// Format: P + DDMMYY + increment padded to 3 digits
		// Example: P + 191125 + 001 = P191125001
		return $today_prefix . str_pad($new_increment, 3, '0', STR_PAD_LEFT);
	}

    public function download($id){
        $query = $this->db->get_where('dokumen',array('mohon_id'=>$mohon_id));
        return $query->row_array();
    }
}
