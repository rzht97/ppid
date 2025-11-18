<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    private $_table = "berita";

    public $berita_id;
    public $judul;
    public $tanggal;
	public $isi;
	public $sumber;
	public $penulis;
	public $tag;
    public $gambar = "default.jpg";
	public $slug;
	public $status;
    public $waktu_tayang;
    

    public function rules()
    {
        return [
            ['field' => 'judul',
            'label' => 'Judul',
            'rules' => 'required'],

            
            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required']
        ];

    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();

        // return $this->db->get_where($this->_table, ["judul" => "tes"])->result();
    }

      public function getSenBud()
    {
     

        return $this->db->get_where($this->_table, ["kategori" => "seni budaya"])->result();
    }

     public function getMaKas()
    {
     

        return $this->db->get_where($this->_table, ["kategori" => "makanan khas"])->result();
    }
    

     public function getUMKM()
    {
     

        return $this->db->get_where($this->_table, ["kategori" => "PRODUK UNGGULAN"])->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["berita_id" => $id])->row();
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
        $this->berita_id = $post["id"];
        $this->judul = $post["judul"];
		$this->tanggal = $post["tanggal"];
		
		
		if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
		}

        $this->description = $post["description"];
            
        $this->db->update($this->_table, $this, array('berita_id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("berita_id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/product/';
		$config['allowed_types']        = 'gif|jpg|png|docx|pdf';
		$config['file_name']            = $this->berita_id;
		$config['overwrite']			= true;
		$config['max_size']             = 12024; // 12MB
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
			return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
		}
	}


public function download($id){
        $query = $this->db->get_where('berita',array('berita_id'=>$id));
        return $query->row_array();
    }
}
