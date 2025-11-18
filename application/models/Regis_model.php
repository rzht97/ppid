<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Regis_model extends CI_Model
{
    private $_table = "temp_user";

    public $user_id;
    public $username;
    public $password;
    public $image = "default.jpg";
    public $nama;
    public $alamat;
    public $tanggal;
    public $pekerjaan;
    public $email;    

    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'username',
            'rules' => 'required'],

            
            ['field' => 'password',
            'label' => 'password',
            'rules' => 'required']
        ];

    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();

        // return $this->db->get_where($this->_table, ["judul" => "tes"])->result();
    }

  
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["user_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->user_id = uniqid();
        $this->username = $post["username"];
		$this->password = md5($post["password"]);
		$this->image = $this->_uploadImage();
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->tanggal = $post["tanggal"];
        $this->pekerjaan = $post["pekerjaan"];
        $this->email = $post["email"];        
        
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
		$config['upload_path']          = './upload/ktp/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']            = $this->user_id;
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
			return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
		}
	}


public function download($id){
        $query = $this->db->get_where('berita',array('berita_id'=>$id));
        return $query->row_array();
    }
}
