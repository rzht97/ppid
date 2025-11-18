<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_model extends CI_Model
{
    private $_table = "informasi";

    public $informasi_id;
    public $judul;
    public $image = "default.jpg";
    public $deskripsi;
	public $tujuan;
	public $caraperoleh;
	public $caradapatsalinan;
    public $status;
    public $jawab;
    public $tanggal;
    public $pengaju;
    

    public function rules()
    {
        return [
            ['field' => 'judul',
            'label' => 'Judul',
            'rules' => 'required']

        ];

    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();

        // return $this->db->get_where($this->_table, ["judul" => "tes"])->result();
    }

      public function getInformasi()
    {
     

        return $this->db->get_where($this->_table, ["pengaju" => $this->session->userdata("nama")])->result();
    }

    
      public function getbelumproses()
    {
     

        return $this->db->get_where($this->_table, ["status" => "belum di proses"])->result();
    }     


    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["informasi_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->informasi_id = uniqid();
        $this->judul = $post["judul"];
        $this->deskripsi = $post["deskripsi"];
		$this->tujuan = $post["tujuan"];
		$this->caraperoleh = $post["caraperoleh"];
		$this->caradapatsalinan = $post["caradapatsalinan"];
		$this->image = $this->_uploadImage();
        $this->tanggal = date('d-m-20y'); 
        $this->status = "belum di proses";
        $this->pengaju = $this->session->userdata("nama");       
        $this->jawab = "belum di jawab";
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->informasi_id = uniqid();
        $this->judul = $post["judul"];
        $this->deskripsi = $post["deskripsi"];
		$this->tujuan = $post["tujuan"];
		$this->caraperoleh = $post["caraperoleh"];
		$this->caradapatsalinan = $post["caradapatsalinan"];
        $this->image = $this->_uploadImage();
        $this->tanggal = date('d-m-20y'); 
        $this->status = "belum di proses";
        $this->pengaju = $this->session->userdata("nama");       
        $this->jawab = "belum di jawab";
		
		if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
		}

       
            
        $this->db->update($this->_table, $this, array('informasi_id' => $post['id']));
    }

    public function updatx()
    {
        $post = $this->input->post();
        $this->informasi_id = $post["id"];
        $this->judul = $post["judul"];
        $this->deskripsi = $post["deskripsi"];
        $this->tanggal = $post["tangal"]; 
        $this->status = $post["status"];
        $this->pengaju = $post["pengaju"];      
        $this->jawab = $post["jawab"];
        
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }

       
            
        $this->db->update($this->_table, $this, array('informasi_id' => $post['id']));
    }
    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("informasi_id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/pengajuan/';
		$config['allowed_types']        = 'gif|jpg|png|docx|doc|pdf';
		$config['file_name']            = $this->informasi_id;
		$config['overwrite']			= true;
		$config['max_size']             = 5024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$product = $this->getById($id);
		if ($product->image != "default.jpg") {
			$filename = explode(".", $product->image)[0];
			return array_map('unlink', glob(FCPATH."upload/pengajuan/$filename.*"));
		}
	}


public function download($id){
        $query = $this->db->get_where('berita',array('berita_id'=>$id));
        return $query->row_array();
    }
}
