<?php defined('BASEPATH') OR exit('No direct script access allowed');

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

            ['field' => 'kronologi',
            'label' => 'nama',
            'rules' => 'required'],

            
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

        // Generate ID with format: K + DDMMYY + auto increment (001, 002, ...)
        // Example: K191125001, K191125002, K191125003...
        // Resets to 001 every new day
        $this->id_keberatan = $this->_generateIdKeberatan();

        $this->mohon_id = $post["mohon_id"];
		$this->kronologi = $post["kronologi"];
		$this->alasan = $post["alasan"];
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
		$this->_deleteFile($mohon_id);
        return $this->db->delete($this->_table, array("mohon_id" => $mohon_id));
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
}
