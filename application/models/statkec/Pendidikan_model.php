<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan_model extends CI_Model
{
    private $_table = "stat_kec";


    public $stat_id;
    public $desa;
    public $kategori;
    public $jumlah;

    public function rules()
    {
        return [
            ['field' => 'desa',
            'label' => 'Desa',
            'rules' => 'required'],

            
            ['field' => 'kategori',
            'label' => 'kategori',
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
        return $this->db->get_where($this->_table, ["stat_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->stat_id = uniqid();
        $this->desa = $post["desa"];
		$this->kategori = $post["kategori"];
        $this->jumlah = $post["jumlah"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->stat_id = $post["id"];
        $this->desa = $post["desa"];
		$this->kategori = $post["kategori"];
            $this->jumlah = $post["jumlah"];
        $this->db->update($this->_table, $this, array('stat_id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("stat_id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/product/';
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
			return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
		}
	}


public function download($id){
        $query = $this->db->get_where('berita',array('berita_id'=>$id));
        return $query->row_array();
    }


        function get_data_stok(){
            
        $query = $this->db->query("SELECT kategori,SUM(jumlah) AS jumlah FROM stat_kec GROUP BY kategori ");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
