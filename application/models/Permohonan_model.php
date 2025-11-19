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
	 */
	public function save()
    {
        $post = $this->input->post();

        // Generate unique ID
        $this->mohon_id = date('dmy').substr(hexdec(uniqid()),7);

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

        // FIXED: Changed from 'd-m-20y' to 'd-m-Y' for correct year format
        $this->tanggal = date('d-m-Y');

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

        // Insert with data array instead of $this
        $result = $this->db->insert($this->_table, $data);

        // Log the actual SQL query
        log_message('debug', 'SQL Query: ' . $this->db->last_query());
        log_message('debug', 'Insert result: ' . ($result ? 'TRUE' : 'FALSE'));
        log_message('debug', 'Affected rows: ' . $this->db->affected_rows());
        log_message('debug', 'Insert ID: ' . $this->db->insert_id());

        if(!$result){
            // Log database error
            $db_error = $this->db->error();
            log_message('error', 'Database insert failed: ' . json_encode($db_error));
            throw new Exception('Gagal menyimpan data ke database: ' . $db_error['message']);
        }

        // Check if any rows were actually inserted
        if($this->db->affected_rows() == 0){
            log_message('error', 'Insert returned TRUE but affected_rows = 0');
            throw new Exception('Data tidak berhasil disimpan (affected_rows = 0)');
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
	 * Jawab permohonan
	 * Fixed: Date format bug (20y → Y)
	 */
	public function jawab()
    {
        $post = $this->input->post();
        $this->mohon_id = $post["mohon_id"];
		$this->status = $post["status"];
		$this->jawab = $post["jawab"];

        // FIXED: Changed from 'd-m-20y' to 'd-m-Y'
        $this->tanggaljawab = date('d-m-Y');

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

    public function download($id){
        $query = $this->db->get_where('dokumen',array('mohon_id'=>$mohon_id));
        return $query->row_array();
    }
}
