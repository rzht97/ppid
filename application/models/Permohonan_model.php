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
	 

    public function rules()
    {
        return [

            ['field' => 'nama',
            'label' => 'nama',
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

public function save()
    {
		
         // $user =echo $this->session->userdata("nama");
        $post = $this->input->post();
        $this->mohon_id = date('dmy').substr(hexdec(uniqid()),7);
		$this->ktp = $this->_uploadFile();
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
        $this->tanggal = date('d-m-20y');
	    
        $this->db->insert($this->_table, $this);
    }

    public function verifikasi()
    {
        $post = $this->input->post();
        $this->mohon_id = $post["mohon_id"];
		$this->status = 'Sedang Diproses';
        $this->db->update($this->_table, $this, array('mohon_id' => $post['mohon_id']));
    }
	
	public function jawab()
    {
        $post = $this->input->post();
        $this->mohon_id = $post["mohon_id"];
		$this->status = $post["status"];
		$this->jawab = $post["jawab"];
        $this->tanggaljawab = date('d-m-20y');
        $this->db->update($this->_table, $this, array('mohon_id' => $post['mohon_id']));
    }

    public function delete($id)
    {
		$this->_deleteFile($mohon_id);
        return $this->db->delete($this->_table, array("mohon_id" => $mohon_id));
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

	private function _deleteFile($id)
	{
		$product = $this->getById($id);
		if ($product->ktp != "Belum Tersedia") {
			$filename = explode(".", $product->image)[0];
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
