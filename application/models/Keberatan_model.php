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
        $this->id_keberatan = date('dmy').substr(hexdec(uniqid()),7);
        $this->mohon_id = $post["mohon_id"];
		$this->kronologi = $post["kronologi"];
		$this->alasan = $post["alasan"];
		$this->status = "Menunggu Verifikasi";
		$this->tanggapan = "";
		$this->tanggal = "";
		$this->putusan = "";
	    
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
}
