<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Info_model extends CI_Model
{
    private $_table = "informasi";

    public $informasi_id;
    public $judul;
    public $image = "default.jpg";
    public $deskripsi;
    public $status;
    public $jawab;
    public $tanggal;
    public $pengaju;
    

    public function rules()
    {
        return [
            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required'],

            
            ['field' => 'jawab',
            'label' => 'Jawab',
            'rules' => 'required']
        ];

    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();

        // return $this->db->get_where($this->_table, ["judul" => "tes"])->result();
    }

      public function getbelum()
    {
     

        return $this->db->get_where($this->_table, ["status" => "belum di proses"])->result();
    }

     public function getsedang()
    {
     

        return $this->db->get_where($this->_table, ["status" => "sedang diproses"])->result();
    }
    

     public function getsudah()
    {
     

        return $this->db->get_where($this->_table, ["status" => "sudah diproses"])->result();
    }
      public function getditolak()
    {
     

        return $this->db->get_where($this->_table, ["status" => "ditolak"])->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["informasi_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->berita_id = uniqid();
        $this->judul = $post["judul"];
		$this->tanggal = $post["tanggal"];
		$this->image = $this->_uploadImage();
        $this->description = $post["description"];        
        
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->informasi_id = $post["id"];
        $this->judul = $post["judul"];
		$this->tanggal = $post["tanggal"];
		
		
		if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
		}

        $this->deskripsi = $post["deskripsi"];
        $this->status = $post["status"];
         $this->jawab = $post["jawab"];
          $this->pengaju = $post["pengaju"];    
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
		$config['allowed_types']        = 'gif|jpg|png|docx';
		$config['file_name']            = $this->berita_id;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
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
			return array_map('unlink', glob(FCPATH."upload/pengaju/$filename.*"));
		}
	}


public function download($id){
        $query = $this->db->get_where('informasi',array('informasi_id'=>$id));
        return $query->row_array();
    }
}
